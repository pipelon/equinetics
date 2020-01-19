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
                                $_POST["form"]["nombre"]);
                        $nmYegua = strtolower($nmYegua);
                        $nmYegua = trim($nmYegua);
                        //TODA LA DATA DE LA YEGUA
                        $yeguas[get_current_user_id()][$nmYegua] = [
                            'nombre' => $_POST["form"]["nombre"],
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
                $countVars = 0;
                foreach ($_POST["var"] as $value) {
                    $countVars += (int) $value > 1;
                }
                $countVars += isset($_POST["chk"]) ? count($_POST["chk"]) : 0;

                $products = $this->getHorses($_POST["var"], $_POST["chk"], $_POST['andar']);
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

        private function getHorses($variables, $mejoras, $categoy) {



            //SETTINGS
            $settings = Buscador_equinetics()->get_settings();

            //VARIABLES GLOBALES
            global $woocommerce, $woocommerce_loop;

            //CATEGORIA SELECCIONADA
            $selectedCat = trim($categoy);

            // ARGUMENTOS DE ORDENAMIENTO
            $ordering_args = $woocommerce->query->get_catalog_ordering_args('title', 'asc');

            //QUERY DE BUSQUEDA
            $meta_query = $this->getVariables($variables, $mejoras);

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
            //$res = new WP_Query($args);
            //echo $res->request;
            return new WP_Query($args);
        }

        private function getVariables($variables, $mejoras) {
            $meta_query = [];
            foreach ($mejoras as $mejora) {
                $nmVariable = substr($mejora, 4);
                $func = "get_" . $nmVariable;
                $searchValues = $this->$func($variables[$nmVariable]);
                $meta_query[] = [
                    'relation' => 'AND',
                    [
                        'key' => 'varsara_' . $nmVariable,
                        'value' => $searchValues,
                        'compare' => 'IN',
                    ]
                ];
            }
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
                    $arrValores = [1, 2, 3];
                    break;
                case 2:
                    $arrValores = [2, 3];
                    break;
                case 3:
                    $arrValores = [3];
                    break;
                default:
                    $arrValores = [1, 2, 3];
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
                case 2:
                    $arrValores = [2, 3];
                    break;
                case 3:
                    $arrValores = [3];
                    break;
                default:
                    $arrValores = [2, 3];
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
                    $arrValores = [2, 3];
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
                case 2:
                case 3:
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
            return [$valor];
        }
        
        /**
         * Funcion encargada de buscar ejemplares para linea superior longitud cuello
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_lineaSuperior_cabeza($valor) {            
            return [$valor];
        }
        
        /**
         * Funcion encargada de buscar ejemplares para aplomos
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_aplomos_anteriores_frente($valor) {            
            return [2];
        }
        
        /**
         * Funcion encargada de buscar ejemplares para aplomos
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_aplomos_anteriores_lateralmente($valor) {            
            return [2];
        }
        
        /**
         * Funcion encargada de buscar ejemplares para aplomos
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_aplomos_posteriores_atras($valor) {            
            return [2];
        }
        
        /**
         * Funcion encargada de buscar ejemplares para aplomos
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_aplomos_posteriores_lateralmente($valor) {            
            return [2];
        }
        
        /**
         * Funcion encargada de buscar ejemplares para la estatura
         * @param int $valor
         * @param string $nmVariable
         * @return array
         */
        private function get_alzada_estatura($valor) {            
            return [$valor];
        }

    }

    

    

    

    

        

endif;