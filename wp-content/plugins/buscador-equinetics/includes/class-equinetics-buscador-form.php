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
            //SETTINGS
            $settings = Buscador_equinetics()->get_settings();

            //SI HUBO POST
            if (!empty($_POST)) {

                //SI SE SELECCIONO EL BOTON GUARDAR
                if (isset($_POST["guardar"])) {

                    echo "<pre>";
                    var_dump($_POST);
                    exit;

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

                //VARIABLES GLOBALES
                global $woocommerce, $woocommerce_loop;

                //VALORES SELECCIONADOS
                $values1 = 'L';
                $values2 = 'Negro';

                // Default ordering args
                $ordering_args = $woocommerce->query->get_catalog_ordering_args('title', 'asc');

                //FOREACH POST
                $ArrTerms = [];
//                $ArrTerms[] = [
//                    'taxonomy' => 'pa_tallas',
//                    'terms' => explode(",", $values1),
//                    'field' => 'slug',
//                    'operator' => 'IN'
//                ];
//                $ArrTerms[] = [
//                    'taxonomy' => 'pa_color',
//                    'terms' => explode(",", $values2),
//                    'field' => 'slug',
//                    'operator' => 'IN'
//                ];
                // Define Query Arguments
                $args = array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'product_cat' => 'caballos',
                    'ignore_sticky_posts' => 1,
                    'orderby' => $ordering_args['orderby'],
                    'order' => $ordering_args['order'],
                    'posts_per_page' => $settings["result_per_page"],
//                    'tax_query' => array(
//                        'relation' => 'AND',
//                        $ArrTerms
//                    )
                );
                ob_start();
                $products = new WP_Query($args);
            }

            //SELECTOR DE YEGUAS GUARDADAS SOLO PARA USUARIOS REGISTRADOS
            if (is_user_logged_in()) {
                $infoYeguas = get_option('buscador_equinetics_yeguas');
                $infoYeguas = $infoYeguas[get_current_user_id()];
            }

            //CATEGORIAS
            $taxonomy = 'product_cat';
            $orderby = 'name';
            $show_count = 0;      // 1 for yes, 0 for no
            $pad_counts = 0;      // 1 for yes, 0 for no
            $hierarchical = 1;      // 1 for yes, 0 for no  
            $title = '';
            $empty = 0;

            $args = array(
                'taxonomy' => $taxonomy,
                'orderby' => $orderby,
                'show_count' => $show_count,
                'pad_counts' => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li' => $title,
                'hide_empty' => $empty,
                'parent' => 26,
            );
            $categories = get_categories($args);

            $template = dirname(__FILE__) . '/views/buscador-form.php';

            if (file_exists($template)) {
                include $template;
            }
        }

    }

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

endif;