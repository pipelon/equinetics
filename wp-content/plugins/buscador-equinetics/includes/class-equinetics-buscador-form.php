<?php

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('FormularioBuscador')) :

    /**
     * Class for plugin search action
     */
    class FormularioBuscador {
        /*
         * Generate search box markup
         */

        public function buscador() {

            $products = null;
            $settings = Buscador_equinetics()->get_settings();

            //SI HUBO POST
            if (!empty($_POST)) {

                //SI SE SELECCIONO EL BOTON GUARDAR
                if (isset($_POST["guardar"])) {

                    $yeguas = get_option('buscador_equinetics_yeguas');
                    if (!$yeguas) {
                        add_option('buscador_equinetics_yeguas', [], '', 'yes');
                    } else {
                        //NOMBRE DEL REGISTRO GUARDADO
                        $nmYegua = str_replace(
                                [" ", "á", "Á", "é", "É", "í", "Í", "ó", "Ó", "ú", "Ú", "ñ", "Ñ"],
                                ["_", "a", "A", "e", "E", "i", "I", "o", "O", "u", "U", "n", "N"],
                                $_POST["form"]["nombre_yegua"]);
                        $nmYegua = strtolower($nmYegua);
                        $nmYegua = trim($nmYegua);
                        //TODA LA DATA DE LA YEGUA
                        $yeguas[get_current_user_id()][$nmYegua] = [
                            'nombre_yegua' => $_POST["form"]["nombre_yegua"],
                            'andar' => $_POST["form"]["andar"],
                            'registro' => $_POST["form"]["registro"],
                            'padre' => $_POST["form"]["padre"],
                            'madre' => $_POST["form"]["madre"],
                            'abuelo_materno' => $_POST["form"]["abuelo_materno"],
                            'var' => $_POST["var"],
                            'chk' => $_POST["chk"]
                        ];
                        //ALMACENO LA DATA DE LA YEGUA GUARDADA
                        update_option('buscador_equinetics_yeguas', $yeguas);
                        //CAMBIO LA LLEGUA SELECCIONADA POR LA QUE SE ACABA DE GUARDAR
                        $_POST["selectedYegua"] = $nmYegua;
                    }
                }

                //BUSCO LA YEGUA SELECCIONDA
                if (isset($_POST["selectedYegua"]) && is_user_logged_in()) {
                    $selectedYegua = get_option('buscador_equinetics_yeguas');
                    $selectedYegua = $selectedYegua[get_current_user_id()]
                            [trim($_POST["selectedYegua"])];
                }

                /*
                 * *************************************************************
                 * A PARTIR DE ACA ES TODO EL PROCESO DE BUSQUEDA
                 * *************************************************************
                 */

                //CONTAR VARIABLES PARA EL MENSAJE EN PANTALLA
                /*$countVars = 0;
                foreach ($_POST["var"] as $value) {
                    $countVars += (int) $value > 1;
                }
                $countVars += isset($_POST["chk"]) ? count($_POST["chk"]) : 0;*/      
                
                $priority = explode(",", $_POST['priority']);   
                $lblpriority =  implode(",",$priority);         
                if(count($priority) >= 5){                    
                    array_pop($priority);  
                    $lblpriority90 =  implode(",",$priority);                 
                    $products90 = $this->getHorses($_POST["var"], $_POST["chk"], $_POST['andar'], implode(",",$priority));
                    array_pop($priority);   
                    $lblpriority80 =  implode(",",$priority);                 
                    $products80 = $this->getHorses($_POST["var"], $_POST["chk"], $_POST['andar'], implode(",",$priority));                    
                }

                $products = $this->getHorses($_POST["var"], $_POST["chk"], $_POST['andar'], $_POST['priority']);                

            }

            //SELECTOR DE YEGUAS GUARDADAS SOLO PARA USUARIOS REGISTRADOS
            if (is_user_logged_in()) {
                $infoYeguas = get_option('buscador_equinetics_yeguas');
                $infoYeguas = $infoYeguas[get_current_user_id()];
            }

            //CATEGORIAS            
            $categories = [
                "46" => "Paso fino",
                "47" => "Trocha",
                "48" => "Trocha y galope",
                "49" => "Trote y galope"
            ];

            $template = dirname(__FILE__) . '/views/buscador-form.php';

            if (file_exists($template)) {
                include $template;
            }
        }

        private function getHorses($variables, $mejoras, $categoy, $priority) {

            //SETTINGS
            $settings = Buscador_equinetics()->get_settings();

            //VARIABLES GLOBALES
            global $woocommerce, $woocommerce_loop;

            //CATEGORIA SELECCIONADA
            $selectedCat = trim($categoy);

            // ARGUMENTOS DE ORDENAMIENTO
            $ordering_args = $woocommerce->query->get_catalog_ordering_args('title', 'asc');

            //QUERY DE BUSQUEDA
            $meta_query = $this->getVariables($variables, $mejoras, $selectedCat, $priority);

            //BUSCO POR LA CATEGORIA SELECCIONADA Y POR LAS VARIABLES
            $args = array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'ignore_sticky_posts' => 1,
                'orderby' => $ordering_args['orderby'],
                'order' => $ordering_args['order'],
                'posts_per_page' => $settings["result_per_page"],
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                        'terms' => $selectedCat, //CATEGORIA DEL ANDAR
                        'operator' => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
                    ),
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'term_id',
                        'terms' => 52, //CATEGORIA DEL SOLO MACHOS
                        'operator' => 'AND'
                    ),
                ),
                'meta_query' => $meta_query
            );
            ob_start();
            //echo "<pre>"; print_r($args);echo "</pre>";
            //$res = new WP_Query($args);
            //echo $res->found_posts;
            return new WP_Query($args);
        }

        private function getVariables($variables, $mejoras, $selectedCat, $priority) {            

            $mejorasPriorizadas = explode(",", $priority);            
            $meta_query = [];
            $boolDorsoPlusCruz = false;
            foreach ($mejorasPriorizadas as $mejora) {
                $nmVariable = substr($mejora, 4);
                $func = "get_" . $nmVariable;               

                //Si las variables dependen de la categoria
                if ($nmVariable == 'espalda_tamano' || $nmVariable == 'espalda_orientacion' || $nmVariable == 'movimiento_velocidad' || $nmVariable == 'movimiento_pisada' || $nmVariable == 'movimiento_elevacion_posterior' || $nmVariable == 'movimiento_elevacion_anterior') {
                    $searchValues = $this->$func($variables[$nmVariable], $selectedCat);
                } elseif ($nmVariable == 'lineaSuperior_cruz' || $nmVariable == 'dorso_tamano') {
                    //Caso especial de cruz + dorso
                    if (!$boolDorsoPlusCruz) {
                        $searchValues = $this->get_dorso_cruz($variables['lineaSuperior_cruz'], $variables['dorso_tamano']);
                        foreach ($searchValues as $searchValue) {
                            $meta_querytmp = [
                                'relation' => 'AND',
                                [
                                    'key' => 'varsara_lineaSuperior_cruz',
                                    'value' => $searchValue['lineaSuperior_cruz'],
                                    'compare' => '='
                                ],
                                [
                                    'key' => 'varsara_varsara_dorso_tamano',
                                    'value' => $searchValue['dorso_tamano'],
                                    'compare' => '='
                                ]
                            ];
                            array_push($meta_query, $meta_querytmp);
                        }
                        $meta_query['relation'] = 'OR';
                        $boolDorsoPlusCruz = true;
                    }
                    continue;
                } else {
                    //resto de variables
                    $searchValues = $this->$func($variables[$nmVariable]);
                }
                $meta_query[] = [
                    'relation' => 'AND',
                    [
                        'key' => 'varsara_' . $nmVariable,
                        'value' => $searchValues,
                        'compare' => 'IN',
                    ]
                ];
            }
            //echo "<pre>"; print_r($meta_query); echo "</pre>";
            return $meta_query;
        }

        /**
         * Funcion encargada de buscar ejemplares para geometria y figur
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_geometria_figura($valor) {
            switch ($valor) {
                case 1:
                    $arrValores = [3];
                    break;
                case 2:
                    $arrValores = [1, 3];
                    break;
                case 3:
                    $arrValores = [1];
                    break;
                default:
                    $arrValores = [3];
                    break;
            }
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para geometria y orientacion
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_geometria_orientacion($valor) {
            switch ($valor) {
                case 1:
                case 3:
                    $arrValores = [3];
                    break;
                case 2:
                    $arrValores = [3, 2];
                    break;
                default:
                    $arrValores = [3, 2];
                    break;
            }
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para balance horizontal
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_balance_horizontal($valor) {
            switch ($valor) {
                case 1:
                    $arrValores = [3];
                    break;
                case 2:
                    $arrValores = [3, 2];
                    break;
                case 3:
                    $arrValores = [3];
                    break;
                default:
                    $arrValores = [3];
                    break;
            }
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para linea superior pecho
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_lineaSuperior_pecho($valor) {
            switch ($valor) {
                case 1:
                case 3:
                    $arrValores = [3];
                    break;
                case 2:
                    $arrValores = [3, 2];
                    break;
                default:
                    $arrValores = [3];
                    break;
            }
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para linea superior longitud cuello
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_lineaSuperior_longitud_cuello($valor) {
            switch ($valor) {
                case 1:
                    $arrValores = [3];
                    break;
                case 2:
                    $arrValores = [1, 3, 2];
                    break;
                case 3:
                    $arrValores = [1];
                    break;
                default:
                    $arrValores = [3];
                    break;
            }
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para linea superior longitud cuello
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_lineaSuperior_cabeza($valor) {
            switch ($valor) {
                case 1:
                case 3:
                    $arrValores = [3];
                    break;
                case 2:
                    $arrValores = [3, 2];
                    break;
                default:
                    $arrValores = [3];
                    break;
            }
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para linea superior cruz + dorso
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_dorso_cruz($lineaSuperior_cruz, $dorso_tamano) {
            switch (true) {
                case ($lineaSuperior_cruz == 1 && $dorso_tamano == 1):
                    $arrValores = [
                        [
                            'lineaSuperior_cruz' => 1,
                            'dorso_tamano' => 1
                        ],
                        [
                            'lineaSuperior_cruz' => 2,
                            'dorso_tamano' => 2
                        ],
                    ];
                    break;
                case ($lineaSuperior_cruz == 1 && $dorso_tamano == 2):
                    $arrValores = [
                        [
                            'lineaSuperior_cruz' => 1,
                            'dorso_tamano' => 2
                        ],
                        [
                            'lineaSuperior_cruz' => 2,
                            'dorso_tamano' => 2
                        ],
                    ];
                    break;
                case ($lineaSuperior_cruz == 1 && $dorso_tamano == 3):
                    $arrValores = [
                        [
                            'lineaSuperior_cruz' => 3,
                            'dorso_tamano' => 2
                        ],
                        [
                            'lineaSuperior_cruz' => 2,
                            'dorso_tamano' => 2
                        ],
                        [
                            'lineaSuperior_cruz' => 1,
                            'dorso_tamano' => 1
                        ],
                    ];
                    break;
                case ($lineaSuperior_cruz == 2 && $dorso_tamano == 2):
                    $arrValores = [
                        [
                            'lineaSuperior_cruz' => 2,
                            'dorso_tamano' => 2
                        ]
                    ];
                    break;
                case ($lineaSuperior_cruz == 2 && $dorso_tamano == 1):
                    $arrValores = [
                        [
                            'lineaSuperior_cruz' => 2,
                            'dorso_tamano' => 2
                        ],
                        [
                            'lineaSuperior_cruz' => 3,
                            'dorso_tamano' => 2
                        ],
                        [
                            'lineaSuperior_cruz' => 3,
                            'dorso_tamano' => 3
                        ]
                    ];
                    break;
                case ($lineaSuperior_cruz == 2 && $dorso_tamano == 3):
                    $arrValores = [
                        [
                            'lineaSuperior_cruz' => 2,
                            'dorso_tamano' => 2
                        ],
                        [
                            'lineaSuperior_cruz' => 2,
                            'dorso_tamano' => 3
                        ],
                        [
                            'lineaSuperior_cruz' => 2,
                            'dorso_tamano' => 1
                        ]
                    ];
                    break;
                case ($lineaSuperior_cruz == 3 && $dorso_tamano == 3):
                    $arrValores = [
                        [
                            'lineaSuperior_cruz' => 3,
                            'dorso_tamano' => 3
                        ],
                        [
                            'lineaSuperior_cruz' => 2,
                            'dorso_tamano' => 2
                        ]
                    ];
                    break;
                case ($lineaSuperior_cruz == 3 && $dorso_tamano == 1):
                    $arrValores = [
                        [
                            'lineaSuperior_cruz' => 2,
                            'dorso_tamano' => 2
                        ],
                        [
                            'lineaSuperior_cruz' => 3,
                            'dorso_tamano' => 3
                        ]
                    ];
                    break;
                case ($lineaSuperior_cruz == 3 && $dorso_tamano == 2):
                    $arrValores = [
                        [
                            'lineaSuperior_cruz' => 2,
                            'dorso_tamano' => 2
                        ],
                        [
                            'lineaSuperior_cruz' => 3,
                            'dorso_tamano' => 3
                        ]
                    ];
                    break;
                default:
                    $arrValores = [
                        [
                            'lineaSuperior_cruz' => 1,
                            'dorso_tamano' => 1
                        ],
                        [
                            'lineaSuperior_cruz' => 2,
                            'dorso_tamano' => 2
                        ],
                    ];
                    break;
            }
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para aplomos
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_aplomos_anteriores_frente($valor) {
            switch ($valor) {
                case 1:
                case 2:
                case 3:
                default:
                    $arrValores = [2];
                    break;
            }
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para aplomos
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_aplomos_anteriores_lateralmente($valor) {
            switch ($valor) {
                case 1:
                case 2:
                case 3:
                default:
                    $arrValores = [2];
                    break;
            }
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para aplomos
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_aplomos_posteriores_atras($valor) {
            switch ($valor) {
                case 1:
                case 2:
                case 3:
                default:
                    $arrValores = [2];
                    break;
            }
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para aplomos
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_aplomos_posteriores_lateralmente($valor) {
            switch ($valor) {
                case 1:
                case 2:
                case 3:
                default:
                    $arrValores = [2];
                    break;
            }
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para la estatura
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_alzada_estatura($valor) {
            switch ($valor) {
                case 1:
                    $arrValores = [3, 2];
                    break;
                case 2:
                    $arrValores = [3];
                    break;
                case 3:
                    $arrValores = [2, 1];
                    break;
                default:
                    $arrValores = [3, 2];
                    break;
            }
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para la morfometria
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_morfometria_cana_anterior($valor) {
            switch ($valor) {
                case 1:
                case 2:
                    $arrValores = [1, 2];
                    break;
                case 3:
                    $arrValores = [1];
                    break;
                default:
                    $arrValores = [1, 2];
                    break;
            }
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para la morfometria
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_morfometria_cuartilla_anterior($valor) {
            switch ($valor) {
                case 1:
                    $arrValores = [1, 2];
                    break;
                case 2:
                case 3:
                    $arrValores = [1];
                    break;
                default:
                    $arrValores = [1, 2];
                    break;
            }
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para la morfometria
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_morfometria_femur($valor) {
            switch ($valor) {
                case 1:
                case 3:
                    $arrValores = [3];
                    break;
                case 2:
                    $arrValores = [3, 2];
                    break;
                default:
                    $arrValores = [3];
                    break;
            }
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para la morfometria
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_morfometria_cana_posterior($valor) {
            switch ($valor) {
                case 1:
                case 2:
                    $arrValores = [1, 2];
                    break;
                case 3:
                    $arrValores = [1];
                    break;
                default:
                    $arrValores = [1, 2];
                    break;
            }
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para la morfometria
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_morfometria_cuartilla_posterior($valor) {
            switch ($valor) {
                case 1:
                    $arrValores = [1, 2];
                    break;
                case 2:
                case 3:
                    $arrValores = [1];
                    break;
                default:
                    $arrValores = [1, 2];
                    break;
            }
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para espalda
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_espalda_orientacion($valor, $category) {
            switch ($valor) {
                case 1:
                    $arrValores = $category == '46' ? [1] : [3];
                    break;
                case 2:
                    $arrValores = $category == '46' ? [1, 2] : [3, 2];
                    break;
                case 3:
                    $arrValores = $category == '46' ? [1] : [3, 2];
                    break;
                default:
                    $arrValores = [1];
                    break;
            }
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para movimiento
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_movimiento_velocidad($valor, $category) {
            switch ($valor) {
                case 1:
                    $arrValores = $category == '49' ? [1, 2] : [3];
                    break;
                case 2:
                    $arrValores = $category == '49' ? [1, 2] : [3, 2];
                    break;
                case 3:
                    $arrValores = $category == '49' ? [1] : [3];
                    break;
                default:
                    $arrValores = [1];
                    break;
            }
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para movimiento
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_movimiento_elevacion_anterior($valor, $category) {
            switch ($valor) {
                case 1:
                    $arrValores = $category == '46' ? [1, 2] : [3];
                    break;
                case 2:
                    $arrValores = $category == '46' ? [2, 1] : [3, 2];
                    break;
                case 3:
                    $arrValores = $category == '46' ? [1] : [3];
                    break;
                default:
                    $arrValores = [1];
                    break;
            }
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para movimiento
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_movimiento_elevacion_posterior($valor, $category) {
            switch ($valor) {
                case 1:
                    $arrValores = $category == '46' ? [3, 2] : [3];
                    break;
                case 2:
                    $arrValores = $category == '46' ? [2] : [3, 2];
                    break;
                case 3:
                    $arrValores = $category == '46' ? [1, 2] : [3, 2];
                    break;
                default:
                    $arrValores = [1];
                    break;
            }
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para movimiento
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_movimiento_pisada($valor, $category) {
            switch ($valor) {
                case 1:
                    $arrValores = $category == '46' ? [3] : [3];
                    break;
                case 2:
                    $arrValores = $category == '46' ? [3, 2] : [3, 2];
                    break;
                case 3:
                    $arrValores = $category == '46' ? [2, 3] : [2, 3];
                    break;
                default:
                    $arrValores = [1];
                    break;
            }
            return $arrValores;
        }

    }

    

    

            

endif;