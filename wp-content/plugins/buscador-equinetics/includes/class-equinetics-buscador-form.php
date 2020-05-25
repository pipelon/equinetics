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

        private $variablesPrioritySaraSuggestion = [
            'chk_movimiento_velocidad',
            'chk_movimiento_elevacion_anterior',
            'chk_movimiento_elevacion_posterior',
            'chk_movimiento_pisada',
            'chk_morfometria_cana_anterior',
            'chk_morfometria_cuartilla_anterior',
            'chk_morfometria_cana_posterior',
            'chk_morfometria_cuartilla_posterior',
            'chk_alzada_estatura',
            'chk_balance_horizontal',
            'chk_aplomos_anteriores_frente',
            'chk_aplomos_anteriores_lateralmente',
            'chk_aplomos_posteriores_atras',
            'chk_aplomos_posteriores_lateralmente'
        ];
        //Variables a tener en cuenta para Paso Fino (Buenas y malas)
        private $variablesSaraSuggestion46 = [
            'geometria_orientacion' => ['1', '3'],
            'balance_horizontal' => ['1', '3'],
            'lineaSuperior_pecho' => ['1', '3'],
            'aplomos_anteriores_frente' => ['1', '2', '3'],
            'aplomos_anteriores_lateralmente' => ['1', '2', '3'],
            'aplomos_posteriores_atras' => ['1', '2', '3'],
            'aplomos_posteriores_lateralmente' => ['1', '2', '3'],
            'morfometria_cana_anterior' => ['1', '3'],
            'morfometria_cuartilla_anterior' => ['1', '3'],
            'morfometria_femur' => ['1', '3'],
            'morfometria_cana_posterior' => ['1', '3'],
            'morfometria_cuartilla_posterior' => ['1', '3'],
            'movimiento_velocidad' => ['1', '3'],
            'movimiento_pisada' => ['1', '2', '3'],
        ];
        //Variables a tener en cuenta para Trocha (Buenas y malas)
        private $variablesSaraSuggestion47 = [
            'geometria_orientacion' => ['1', '3'],
            'balance_horizontal' => ['1', '3'],
            'lineaSuperior_pecho' => ['1', '3'],
            'aplomos_anteriores_frente' => ['1', '2', '3'],
            'aplomos_anteriores_lateralmente' => ['1', '2', '3'],
            'aplomos_posteriores_atras' => ['1', '2', '3'],
            'aplomos_posteriores_lateralmente' => ['1', '2', '3'],
            'morfometria_cana_anterior' => ['1', '3'],
            'morfometria_cuartilla_anterior' => ['1', '3'],
            'morfometria_femur' => ['2', '3'],
            'morfometria_cana_posterior' => ['1', '3'],
            'morfometria_cuartilla_posterior' => ['1', '3'],
            'movimiento_velocidad' => ['1', '3'],
            'movimiento_pisada' => ['1', '3'],
        ];
        //Variables a tener en cuenta para Trocha y galope (Buenas y malas)
        private $variablesSaraSuggestion48 = [
            'geometria_orientacion' => ['1', '3'],
            'balance_horizontal' => ['1', '3'],
            'lineaSuperior_pecho' => ['1', '3'],
            'aplomos_anteriores_frente' => ['1', '2', '3'],
            'aplomos_anteriores_lateralmente' => ['1', '2', '3'],
            'aplomos_posteriores_atras' => ['1', '2', '3'],
            'aplomos_posteriores_lateralmente' => ['1', '2', '3'],
            'morfometria_cana_anterior' => ['1', '3'],
            'morfometria_cuartilla_anterior' => ['1', '3'],
            'morfometria_femur' => ['1', '3'],
            'morfometria_cana_posterior' => ['1', '3'],
            'morfometria_cuartilla_posterior' => ['1', '3'],
            'movimiento_velocidad' => ['1', '3'],
            'movimiento_pisada' => ['1', '3'],
        ];
        //Variables a tener en cuenta para Trote y galope (Buenas y malas)
        private $variablesSaraSuggestion49 = [
            'geometria_orientacion' => ['1', '3'],
            'balance_horizontal' => ['1', '3'],
            'lineaSuperior_pecho' => ['1', '3'],
            'aplomos_anteriores_frente' => ['1', '2', '3'],
            'aplomos_anteriores_lateralmente' => ['1', '2', '3'],
            'aplomos_posteriores_atras' => ['1', '2', '3'],
            'aplomos_posteriores_lateralmente' => ['1', '2', '3'],
            'morfometria_cana_anterior' => ['1', '3'],
            'morfometria_cuartilla_anterior' => ['2', '3'],
            'morfometria_femur' => ['1', '3'],
            'morfometria_cana_posterior' => ['1', '3'],
            'morfometria_cuartilla_posterior' => ['2', '3'],
            'movimiento_velocidad' => ['1', '3'],
            'movimiento_pisada' => ['1', '3'],
        ];

        public function buscador() {

            $products = null;
            $settings = Buscador_equinetics()->get_settings();

            //SI HUBO POST
            if (!empty($_POST)) {

//                 echo "<pre>";
//                var_dump($_POST);
//                  echo "</pre>"; 
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
                            'andar' => $_POST["andar"],
                            'registro' => $_POST["form"]["registro"],
                            'padre' => $_POST["form"]["padre"],
                            'madre' => $_POST["form"]["madre"],
                            'abuelo_materno' => $_POST["form"]["abuelo_materno"],
                            'var' => $_POST["var"],
                            'chk' => $_POST["chk"],
                            'priority' => $_POST["priority"]
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

                //SI SE SOLICITO BUSCAR O BUSCAR Y GUARDAR      
                if (isset($_POST["buscar"]) || isset($_POST["guardar"])) {
                    $isSaraResults = false;
                    $priority = explode(",", $_POST['priority']);
                    $lblpriority = implode(",", $priority);
                    if (count($priority) >= 5) {
                        array_pop($priority);
                        $lblpriority90 = implode(",", $priority);
                        $products90 = $this->getHorses($_POST["var"], $_POST["chk"], $_POST['andar'], implode(",", $priority));
                        array_pop($priority);
                        $lblpriority80 = implode(",", $priority);
                        $products80 = $this->getHorses($_POST["var"], $_POST["chk"], $_POST['andar'], implode(",", $priority));
                    }

                    $products = $this->getHorses($_POST["var"], $_POST["chk"], $_POST['andar'], $_POST['priority']);
                }

                //SI SE PRESIONO EL BOTON DE SUGERENCIAS SARA
                if (isset($_POST["sugerencia"])) {
                    //$lblpriority = implode(",", $this->variablesPrioritySaraSuggestion);
                    $isSaraResults = true;
                    $products = $this->getHorsesSaraSuggestions($_POST["var"], $_POST['andar'], $this->variablesPrioritySaraSuggestion);

                    if ($products->post_count <= 0) {
                        $prioritySara = $this->variablesPrioritySaraSuggestion;
                        //ELIMINO TODOS LOS APLOMOS
                        array_pop($prioritySara);
                        array_pop($prioritySara);
                        array_pop($prioritySara);
                        array_pop($prioritySara);
                        $products = $this->getHorsesSaraSuggestions($_POST["var"], $_POST['andar'], $prioritySara);
                    }
                }
            }

            //SELECTOR DE YEGUAS GUARDADAS SOLO PARA USUARIOS REGISTRADOS
            if (is_user_logged_in()) {
                $infoYeguasTmp = get_option('buscador_equinetics_yeguas');
                $infoYeguas = $infoYeguasTmp[get_current_user_id()];
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

        private function getHorsesSaraSuggestions($variables, $categoy, $priority) {

            //SETTINGS
            $settings = Buscador_equinetics()->get_settings();

            //VARIABLES GLOBALES
            global $woocommerce, $woocommerce_loop;

            //CATEGORIA SELECCIONADA
            $selectedCat = trim($categoy);

            //QUERY DE BUSQUEDA
            $meta_query = $this->getVariablesSaraSuggestion($variables, $selectedCat, $priority);
            $wasEmpty = false;
            //SI ME DEVUELVE VACIO EL META QUERY INVENTO UNA CONSULTA PARA QUE FALLE           
            if (empty($meta_query)) {
                $wasEmpty = true;
                $meta_query[] = [
                    'relation' => 'AND',
                    [
                        'key' => 'varsara_geometria_orientacion',
                        'value' => [100],
                        'compare' => 'IN',
                    ]
                ];
            }

            //SI ES EA Y EP DEBO PARTIR LAS CONSULTAS EN VARIAS
            if ($variables['movimiento_elevacion_anterior'] !== '' &&
                    $variables['movimiento_elevacion_posterior'] !== '' &&
                    !$wasEmpty) {

                return $this->setQuerybyParts($meta_query, $settings, $selectedCat, 'compensacion');
                //SI ES CRUZ Y DORSO DEBO PARTIR LAS CONSULTAS EN VARIAS    
            } else if ($variables['lineaSuperior_cruz'] !== '' &&
                    $variables['dorso_tamano'] !== '' &&
                    !$wasEmpty) {

                return $this->setQuerybyParts($meta_query, $settings, $selectedCat, 'cruz_dorso');
            } else {
                //BUSCO POR LA CATEGORIA SELECCIONADA Y POR LAS VARIABLES
                $args = array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'ignore_sticky_posts' => 1,
                    //'orderby' => $ordering_args['orderby'],
                    //'order' => $ordering_args['order'],
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
                return new WP_Query($args);
            }
        }

        private function setQuerybyParts($meta_query, $settings, $selectedCat, $type) {
            $meta_query_final = $meta_query_final_temp = $meta_query_compensacion = [];

            //OBTENGO SOLO LAS COMPENSACIONES Y EL RESTO SEPARADOS
            foreach ($meta_query as $mq) {
                if (isset($mq['type']) && $mq['type'] == $type) {
                    $meta_query_compensacion[] = $mq[0];
                } else {
                    $meta_query_final_temp[] = $mq;
                }
            }

            //ARMO LOS META QUERYS SEPARADOS CON LAS COMPENSACIONES
            foreach ($meta_query_compensacion as $mqc) {
                $array = $meta_query_final_temp;
                array_push($array, $mqc);
                $meta_query_final[] = $array;
            }

            //AHORA EJECUTOR LOS QUERYS SEPARADOS QUE OBTUVE
            $productstemp = $products = $pd_posts = [];
            $i = 1;
            foreach ($meta_query_final as $mqf) {
                $args = array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'ignore_sticky_posts' => 1,
                    //'orderby' => $ordering_args['orderby'],
                    //'order' => $ordering_args['order'],
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
                    'meta_query' => $mqf
                );
                ob_start();
                $productstemp = new WP_Query($args);

                if ($i == 1) {
                    $products = $productstemp;
                    $pd_posts = $products->posts;
                } else {
                    $pd_posts = array_merge($pd_posts, $productstemp->posts);
                }
                $i++;
            }
            if (!empty($pd_posts)) {
                $products->posts = $pd_posts;
                $products->post_count = count($pd_posts);
                $products->found_posts = count($pd_posts);
            }

            return $products;
        }

        private function getHorses($variables, $mejoras, $categoy, $priority) {

            //SETTINGS
            $settings = Buscador_equinetics()->get_settings();

            //VARIABLES GLOBALES
            global $woocommerce, $woocommerce_loop;

            //CATEGORIA SELECCIONADA
            $selectedCat = trim($categoy);

            // ARGUMENTOS DE ORDENAMIENTO
            //$ordering_args = $woocommerce->query->get_catalog_ordering_args('title', 'asc');
            //QUERY DE BUSQUEDA
            $meta_query = $this->getVariables($variables, $mejoras, $selectedCat, $priority);
            $wasEmpty = false;
            //SI ME DEVUELVE VACIO EL META QUERY INVENTO UNA CONSULTA PARA QUE FALLE           
            if (empty($meta_query)) {
                $wasEmpty = true;
            }

            //SI ES EA Y EP DEBO PARTIR LAS CONSULTAS EN VARIAS
            if ($variables['movimiento_elevacion_anterior'] !== '' &&
                    $variables['movimiento_elevacion_posterior'] !== '' &&
                    !$wasEmpty) {
                return $this->setQuerybyParts($meta_query, $settings, $selectedCat, 'compensacion');
            } else {
                //BUSCO POR LA CATEGORIA SELECCIONADA Y POR LAS VARIABLES
                $args = array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'ignore_sticky_posts' => 1,
                    //'orderby' => $ordering_args['orderby'],
                    //'order' => $ordering_args['order'],
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
        }

        private function getVariablesSaraSuggestion($variables, $selectedCat, $priority) {

            $meta_query = [];
            $boolCompensacion = false;
            foreach ($priority as $mejora) {
                $nmVariable = substr($mejora, 4);

                //SI LA VARIABLE ESTA VACIA O NO EXISTE BUSCO EL NUEVO REGISTRO
                if (!isset($variables[$nmVariable]) ||
                        $variables[$nmVariable] == '') {
                    continue;
                }

                //VALIDO QUE LAS VARAIBLES A MEJORAR SEAN IDEALES O NEGATIVAS
                /* if ($nmVariable != 'movimiento_elevacion_anterior' &&
                  $nmVariable != 'movimiento_elevacion_posterior') {
                  $variablesSaraSuggestion = 'variablesSaraSuggestion' . $selectedCat;
                  if (!in_array($variables[$nmVariable], $this->$variablesSaraSuggestion[$nmVariable])) {
                  continue;
                  }
                  } */
                $func = "get_" . $nmVariable;

                //CASO DE MOVIMIENTO Y PISADA QUE DEPENDE DEL ANDAR
                if ($nmVariable == 'movimiento_pisada' ||
                        $nmVariable == 'movimiento_velocidad' ||
                        $nmVariable == 'geometria_orientacion' ||
                        $nmVariable == 'alzada_estatura' ||
                        $nmVariable == 'morfometria_cuartilla_anterior' ||
                        $nmVariable == 'morfometria_cuartilla_posterior' ||
                        $nmVariable == 'morfometria_cana_anterior' ||
                        $nmVariable == 'morfometria_cana_posterior') {
                    $searchValues = $this->$func($variables[$nmVariable], $selectedCat);

                    //CASO ESPECIAL DE LAS ELEVACIONES
                } elseif ($nmVariable == 'movimiento_elevacion_anterior' ||
                        $nmVariable == 'movimiento_elevacion_posterior') {

                    if (!$boolCompensacion) {

                        $searchValues = $this->get_compensacion_sara_suggestion($variables['movimiento_elevacion_anterior'],
                                $variables['movimiento_elevacion_posterior'],
                                $selectedCat);
                        if (!$searchValues) {
                            continue;
                        }

                        foreach ($searchValues as $searchValue) {
                            $meta_querytmp = [];
                            $meta_querytmp['type'] = 'compensacion';
                            $meta_querytmp[] = [
                                'relation' => 'AND',
                                [
                                    'key' => 'varsara_movimiento_elevacion_anterior',
                                    'value' => $searchValue['movimiento_elevacion_anterior'],
                                    'compare' => '='
                                ],
                                [
                                    'key' => 'varsara_movimiento_elevacion_posterior',
                                    'value' => $searchValue['movimiento_elevacion_posterior'],
                                    'compare' => '='
                                ]
                            ];
                            array_push($meta_query, $meta_querytmp);
                        }
                        //$meta_query['relation'] = 'OR';
                        $boolCompensacion = true;
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

        private function getVariables($variables, $mejoras, $selectedCat, $priority) {

            $mejorasPriorizadas = explode(",", $priority);
            $meta_query = [];
            $boolDorsoPlusCruz = $boolCompensacion = false;
            foreach ($mejorasPriorizadas as $mejora) {
                $nmVariable = substr($mejora, 4);
                $func = "get_" . $nmVariable;

                //Si las variables dependen de la categoria
                if ($nmVariable == 'espalda_tamano' ||
                        $nmVariable == 'espalda_orientacion' ||
                        $nmVariable == 'movimiento_velocidad' ||
                        $nmVariable == 'movimiento_pisada' ||
                        $nmVariable == 'geometria_orientacion' ||
                        $nmVariable == 'alzada_estatura' ||
                        $nmVariable == 'movimiento_elevacion_anterior' ||
                        $nmVariable == 'movimiento_elevacion_posterior' ||
                        $nmVariable == 'morfometria_cana_anterior' ||
                        $nmVariable == 'morfometria_cana_posterior' ||
                        $nmVariable == 'morfometria_cuartilla_anterior' ||
                        $nmVariable == 'morfometria_cuartilla_posterior') {
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
                                    'key' => 'varsara_dorso_tamano',
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
                    //Caso especial compensacion
                } elseif ($nmVariable == 'movimiento_compensacion') {

                    if (!$boolCompensacion) {

                        $searchValues = $this->get_compensacion_sara_suggestion($variables['movimiento_elevacion_anterior'],
                                $variables['movimiento_elevacion_posterior'],
                                $selectedCat);
                        if (!$searchValues) {
                            continue;
                        }

                        foreach ($searchValues as $searchValue) {
                            $meta_querytmp = [];
                            $meta_querytmp['type'] = 'compensacion';
                            $meta_querytmp[] = [
                                'relation' => 'AND',
                                [
                                    'key' => 'varsara_movimiento_elevacion_anterior',
                                    'value' => $searchValue['movimiento_elevacion_anterior'],
                                    'compare' => '='
                                ],
                                [
                                    'key' => 'varsara_movimiento_elevacion_posterior',
                                    'value' => $searchValue['movimiento_elevacion_posterior'],
                                    'compare' => '='
                                ]
                            ];
                            array_push($meta_query, $meta_querytmp);
                        }
                        //$meta_query['relation'] = 'OR';
                        $boolCompensacion = true;
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
//            echo "<pre>";
//            print_r($meta_query);
//            echo "</pre>";
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
                    $arrValores = [3, 2];
                    break;
                case 2:
                    $arrValores = [1, 3];
                    break;
                case 3:
                    $arrValores = [1, 2];
                    break;
                default:
                    $arrValores = [3, 2];
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
        private function get_geometria_orientacion($valor, $category) {
            switch ($valor) {
                case 1:
                    $arrValores = $category == '46' ? [2, 3] : [3];
                    break;
                case 2:
                    $arrValores = [3, 2];
                    break;
                case 3:
                    $arrValores = [3];
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
                    $arrValores = [3, 2];
                    break;
                case 2:
                    $arrValores = [3];
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
                    $arrValores = [3, 2];
                    break;
                case 2:
                    $arrValores = [3];
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
         * Funcion encargada de buscar ejemplares para linea superior longitud cuello
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_lineaSuperior_longitud_cuello($valor) {
            switch ($valor) {
                case 1:
                    $arrValores = [3, 2];
                    break;
                case 2:
                    $arrValores = [1, 3];
                    break;
                case 3:
                    $arrValores = [1, 2];
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
                    $arrValores = [3, 2];
                    break;
                case 2:
                    $arrValores = [3];
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

            //var_dump($lineaSuperior_cruz, $dorso_tamano, $arrValores);
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para linea superior cruz + dorso
         * @param string $lineaSuperior_cruz
         * @param string $dorso_tamano
         * @return array
         */
        private function get_dorso_cruz_sara_suggestion($lineaSuperior_cruz, $dorso_tamano) {

            if ($lineaSuperior_cruz == "0" || $dorso_tamano == "0") {
                return false;
            }

            if (($lineaSuperior_cruz == "1" && $dorso_tamano == "2") ||
                    ($lineaSuperior_cruz == "2" && $dorso_tamano == "1") ||
                    ($lineaSuperior_cruz == "2" && $dorso_tamano == "3") ||
                    ($lineaSuperior_cruz == "3" && $dorso_tamano == "2")) {
                return false;
            }


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

            //var_dump($lineaSuperior_cruz, $dorso_tamano, $arrValores);
            return $arrValores;
        }

        /**
         * Funcion encargada de buscar ejemplares para linea superior cruz + dorso
         * @param string $lineaSuperior_cruz
         * @param string $dorso_tamano
         * @return array
         */
        private function get_compensacion_sara_suggestion($movimiento_elevacion_anterior, $movimiento_elevacion_posterior, $category) {

            if ($movimiento_elevacion_anterior == "" || $movimiento_elevacion_posterior == "") {
                return false;
            }

            //BUSQUEDAS PARA TROCHA, TROCHA y GALOPE
            if ($category == '47' || $category == '48') {
                switch (true) {
                    case ($movimiento_elevacion_anterior == 0 && $movimiento_elevacion_posterior == 0):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 0 && $movimiento_elevacion_posterior == 1):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 2
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 0 && $movimiento_elevacion_posterior == 2):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ]
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 0 && $movimiento_elevacion_posterior == 3):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 2
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 1 && $movimiento_elevacion_posterior == 0):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ]
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 1 && $movimiento_elevacion_posterior == 1):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 1,
                                'movimiento_elevacion_posterior' => 1
                            ],
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 1 && $movimiento_elevacion_posterior == 2):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 1 && $movimiento_elevacion_posterior == 3):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ]
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 2 && $movimiento_elevacion_posterior == 0):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 3
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 2 && $movimiento_elevacion_posterior == 1):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 2 && $movimiento_elevacion_posterior == 2):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ]
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 2 && $movimiento_elevacion_posterior == 3):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ]
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 3 && $movimiento_elevacion_posterior == 0):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 2
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 3 && $movimiento_elevacion_posterior == 1):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                        ];
                        break;

                    case ($movimiento_elevacion_anterior == 3 && $movimiento_elevacion_posterior == 2):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 3 && $movimiento_elevacion_posterior == 3):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ]
                        ];
                        break;

                    default:
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                        ];
                        break;
                }
            }
            //BUSQUEDAS TROTE y GALOPE
            if ($category == '49') {
                switch (true) {
                    case ($movimiento_elevacion_anterior == 0 && $movimiento_elevacion_posterior == 0):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ]
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 0 && $movimiento_elevacion_posterior == 1):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ]
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 0 && $movimiento_elevacion_posterior == 2):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ]
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 0 && $movimiento_elevacion_posterior == 3):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 1 && $movimiento_elevacion_posterior == 0):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ]
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 1 && $movimiento_elevacion_posterior == 1):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 1,
                                'movimiento_elevacion_posterior' => 1
                            ],
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ]
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 1 && $movimiento_elevacion_posterior == 2):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 1 && $movimiento_elevacion_posterior == 3):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 2
                            ]
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 2 && $movimiento_elevacion_posterior == 0):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 2 && $movimiento_elevacion_posterior == 1):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 2 && $movimiento_elevacion_posterior == 2):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ]
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 2 && $movimiento_elevacion_posterior == 3):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ]
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 3 && $movimiento_elevacion_posterior == 0):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 2
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 3 && $movimiento_elevacion_posterior == 1):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                        ];
                        break;

                    case ($movimiento_elevacion_anterior == 3 && $movimiento_elevacion_posterior == 2):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 3 && $movimiento_elevacion_posterior == 3):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ]
                        ];
                        break;

                    default:
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                        ];
                        break;
                }
            }
            //BUSQUEDA PARA PASO FINO
            if ($category == '46') {
                switch (true) {
                    case ($movimiento_elevacion_anterior == 0 && $movimiento_elevacion_posterior == 0):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 1,
                                'movimiento_elevacion_posterior' => 1
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 0 && $movimiento_elevacion_posterior == 1):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 1,
                                'movimiento_elevacion_posterior' => 1
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 0 && $movimiento_elevacion_posterior == 2):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 1,
                                'movimiento_elevacion_posterior' => 1
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 0 && $movimiento_elevacion_posterior == 3):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 1,
                                'movimiento_elevacion_posterior' => 1
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 1 && $movimiento_elevacion_posterior == 0):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 1,
                                'movimiento_elevacion_posterior' => 1
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 1 && $movimiento_elevacion_posterior == 1):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 1,
                                'movimiento_elevacion_posterior' => 1
                            ]
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 1 && $movimiento_elevacion_posterior == 2):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 1,
                                'movimiento_elevacion_posterior' => 1
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ]
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 1 && $movimiento_elevacion_posterior == 3):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 1,
                                'movimiento_elevacion_posterior' => 1
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 3
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 2 && $movimiento_elevacion_posterior == 0):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 1,
                                'movimiento_elevacion_posterior' => 1
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 2 && $movimiento_elevacion_posterior == 1):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 1,
                                'movimiento_elevacion_posterior' => 1
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 2 && $movimiento_elevacion_posterior == 2):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ]
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 2 && $movimiento_elevacion_posterior == 3):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 1,
                                'movimiento_elevacion_posterior' => 1
                            ]
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 3 && $movimiento_elevacion_posterior == 0):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 1,
                                'movimiento_elevacion_posterior' => 1
                            ]
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 3 && $movimiento_elevacion_posterior == 1):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 1,
                                'movimiento_elevacion_posterior' => 1
                            ],
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 3 && $movimiento_elevacion_posterior == 2):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 1,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                        ];
                        break;
                    case ($movimiento_elevacion_anterior == 3 && $movimiento_elevacion_posterior == 3):
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 1,
                                'movimiento_elevacion_posterior' => 1
                            ],
                            [
                                'movimiento_elevacion_anterior' => 3,
                                'movimiento_elevacion_posterior' => 3
                            ],
                        ];
                        break;
                    default:
                        $arrValores = [
                            [
                                'movimiento_elevacion_anterior' => 2,
                                'movimiento_elevacion_posterior' => 2
                            ],
                            [
                                'movimiento_elevacion_anterior' => 1,
                                'movimiento_elevacion_posterior' => 1
                            ],
                        ];
                        break;
                }
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
        private function get_alzada_estatura($valor, $category) {
            switch ($valor) {
                case 1:
                    $arrValores = [3, 2];
                    break;
                case 2:
                    $arrValores = [3];
                    break;
                case 3:
                    $arrValores = ($category == '46' || $category == '47') ? [2, 1] : [2, 3];
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
        private function get_morfometria_cana_anterior($valor, $category) {
            switch ($valor) {
                case 1:
                    $arrValores = ($category == '46' || $category == '47') ? [1] : [1, 2];
                    break;
                case 2:
                    $arrValores = ($category == '46' || $category == '47') ? [1, 2] : [1];
                    break;
                case 3:
                    $arrValores = ($category == '46' || $category == '47') ? [1, 2] : [1, 2];
                    break;
                case 4:
                    $arrValores = ($category == '46' || $category == '47') ? [1] : [1];
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
        private function get_morfometria_cuartilla_anterior($valor, $category) {
            switch ($valor) {
                case 1:
                    $arrValores = ($category == '49') ? [1, 2] : [1];
                    break;
                case 2:
                    $arrValores = ($category == '49') ? [1] : [1, 1];
                    break;
                case 3:
                    $arrValores = ($category == '49') ? [1, 2] : [1, 2];
                    break;
                case 4:
                    $arrValores = ($category == '49') ? [1] : [1];
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
                case 0:
                    $arrValores = [3];
                    break;
                case 1:
                    $arrValores = [3, 2];
                    break;
                case 2:
                    $arrValores = [3];
                    break;
                case 3:
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
        private function get_morfometria_cana_posterior($valor, $category) {
            switch ($valor) {
                case 1:
                    $arrValores = ($category == '46' || $category == '47') ? [1] : [1, 2];
                    break;
                case 2:
                    $arrValores = ($category == '46' || $category == '47') ? [1, 2] : [1];
                    break;
                case 3:
                    $arrValores = ($category == '46' || $category == '47') ? [1, 2] : [1, 2];
                    break;
                case 4:
                    $arrValores = ($category == '46' || $category == '47') ? [1] : [1];
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
        private function get_morfometria_cuartilla_posterior($valor, $category) {
            switch ($valor) {
                case 1:
                    $arrValores = ($category == '49') ? [1, 2] : [1];
                    break;
                case 2:
                    $arrValores = ($category == '49') ? [1] : [1, 2];
                    break;
                case 3:
                    $arrValores = ($category == '49') ? [1, 2] : [1, 2];
                    break;
                case 4:
                    $arrValores = ($category == '49') ? [1] : [1];
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
                case 0:
                    $arrValores = $category == '49' ? [1, 2] : [3];
                    break;
                case 1:
                    $arrValores = $category == '49' ? [1] : [3, 2];
                    break;
                case 2:
                    $arrValores = $category == '49' ? [1, 2] : [3];
                    break;
                case 3:
                    $arrValores = $category == '49' ? [1] : [3, 2];
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
            //Si es trocha, trocha y galope 
            if ($category == '47' || $category == '48') {
                switch ($valor) {
                    case 0:
                        $arrValores = [3];
                        break;
                    case 1:
                        $arrValores = [3, 2];
                        break;
                    case 2:
                        $arrValores = [3];
                        break;
                    case 3:
                        $arrValores = [3, 2];
                        break;
                    default:
                        $arrValores = [1];
                        break;
                }
            }
            //Si es paso fino
            if ($category == '46') {
                switch ($valor) {
                    case 0:
                        $arrValores = [3];
                        break;
                    case 1:
                        $arrValores = [1, 2, 3];
                        break;
                    case 2:
                        $arrValores = [2, 1];
                        break;
                    case 3:
                        $arrValores = [1, 2];
                        break;
                    default:
                        $arrValores = [1];
                        break;
                }
            }
            //Si es trote y galope
            if ($category == '49') {
                switch ($valor) {
                    case 0:
                        $arrValores = [3];
                        break;
                    case 1:
                        $arrValores = [3];
                        break;
                    case 2:
                        $arrValores = [3, 2];
                        break;
                    case 3:
                        $arrValores = [3, 2];
                        break;
                    default:
                        $arrValores = [1];
                        break;
                }
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
            //Si es trocha, trocha y galope 
            if ($category == '47' || $category == '48') {
                switch ($valor) {
                    case 0:
                        $arrValores = [3];
                        break;
                    case 1:
                        $arrValores = [3, 2];
                        break;
                    case 2:
                        $arrValores = [3];
                        break;
                    case 3:
                        $arrValores = [3, 2];
                        break;
                    default:
                        $arrValores = [1];
                        break;
                }
            }
            //Si es paso fino
            if ($category == '46') {
                switch ($valor) {
                    case 0:
                        $arrValores = [3];
                        break;
                    case 1:
                        $arrValores = [1, 2, 3];
                        break;
                    case 2:
                        $arrValores = [2, 1];
                        break;
                    case 3:
                        $arrValores = [1, 2];
                        break;
                    default:
                        $arrValores = [1];
                        break;
                }
            }
            //Si es trote y galope
            if ($category == '49') {
                switch ($valor) {
                    case 0:
                        $arrValores = [3];
                        break;
                    case 1:
                        $arrValores = [3];
                        break;
                    case 2:
                        $arrValores = [3, 2];
                        break;
                    case 3:
                        $arrValores = [3, 2];
                        break;
                    default:
                        $arrValores = [1];
                        break;
                }
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
                case 0:
                    $arrValores = $category == '46' ? [3] : [3];
                    break;
                case 1:
                    $arrValores = $category == '46' ? [3, 2] : [3, 2];
                    break;
                case 2:
                    $arrValores = $category == '46' ? [3] : [3];
                    break;
                case 3:
                    $arrValores = $category == '46' ? [2] : [3, 2];
                    break;
                default:
                    $arrValores = [1];
                    break;
            }
            return $arrValores;
        }

    }

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    
    
endif;