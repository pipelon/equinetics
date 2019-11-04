<?php

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('ReportsEquineticsView')) {

    /**
     * Class for plugin search action
     */
    class ReportsEquineticsView {

        public $colors = [
            "Corrección de ondas y ganchos" => "#FE5043",
            "Extracción del Diente de Lobo" => "#3C5ECC",
            "Limado de dientes" => "#F7BE68",
            "Reducción de caninos" => "#D7CFC4"
        ];

        /*
         * Generate search box markup
         */

        public function viewReport() {

            global $woocommerce, $woocommerce_loop, $wpdb;

            $cu = wp_get_current_user();
            $id_product = esc_attr(get_the_author_meta('id_product', $cu->ID));

            //TOTAL DE VENTAS DEL PRODUCTO
            $ventasTotales = $this->getTotalSales($id_product);

            //TOTAL DE VENTAS DEL ULTIMO MES
            $ventasUltimoMes = $this->getTotalSales($id_product, date('Y-m-01'), date('Y-m-d'));

            //TOTAL DE VENTAS AL DIA
            $ventasUltimoAnio = $this->getTotalSales($id_product, date('Y-01-01'), date('Y-m-d'));

            //GRAFICO DE TORTAS
            $round_chart = $this->round_chart($id_product);

            //GRAFICO DE TENDENCIA
            $trend_graph = $this->bar_trend_graph($id_product);
            
            //VENTAS MENSUALES
            $monthlySales = $this->monthlySales($id_product, date('Y-01-01'), date('Y-m-d'));

            //GRAFICO DE BARRAS
            //$bar_graph = $this->bar_trend_graph($id_product);

            $template = dirname(__FILE__) . '/views/view-report.php';

            if (file_exists($template)) {
                include $template;
            }
        }

        private function bar_trend_graph($id_product) {
            global $wpdb;
            $sql = "SELECT terms.name, order_id, fecha, COUNT(*) AS total, MONTH(fecha) AS mes
                    FROM (
                    SELECT itemmeta.order_item_id AS order_item_id, items.order_id AS order_id, posts.post_date AS fecha
                    FROM {$wpdb->prefix}woocommerce_order_itemmeta AS itemmeta 
                    INNER JOIN {$wpdb->prefix}woocommerce_order_items AS items ON itemmeta.order_item_id = items.order_item_id 
                    INNER JOIN {$wpdb->posts} AS posts ON posts.ID = items.order_id 
                    WHERE itemmeta.meta_key = '_product_id' 
                    AND itemmeta.meta_value = '" . $id_product . "' 
                    AND posts.post_status IN ( 'wc-completed', 'wc-processing', 'wc-on-hold' ) 
                    ) AS itemsOrder 
                    INNER JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS itemmeta2 ON itemmeta2.order_item_id = itemsOrder.order_item_id 
                    INNER JOIN {$wpdb->terms} AS terms ON terms.slug = itemmeta2.meta_value 
                    WHERE itemmeta2.meta_key='pa_servicios-odontologicos'
                    GROUP BY MONTH(fecha), NAME";
            $products = $wpdb->get_results($sql);

            $datasets = $labels = [];
            foreach ($products as $product) {

                $data = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
                $data[$product->mes - 1] = $product->total;
                $color1 = $this->colors[$product->name];
                $rgb1 = hexdec(substr($color1, 1, 2));
                $rgb2 = hexdec(substr($color1, 3, 2));
                $rgb3 = hexdec(substr($color1, 5, 2));
                $color2 = $this->colors[$product->name];
                $objDs = new stdClass();
                $objDs->label = $product->name;
                $objDs->fillColor = "rgba(" . $rgb1 . ", " . $rgb2 . ", " . $rgb3 . ", 0.1)";
                $objDs->strokeColor = $color1;
                $objDs->pointColor = $color1;
                $objDs->pointStrokeColor = $color1;
                $objDs->highlightFill = $color2;
                $objDs->highlightStroke = $color2;
                $objDs->pointHighlightFill = $color2;
                $objDs->pointHighlightStroke = $color2;
                $objDs->data = $data;
                $datasets[] = $objDs;

                $labels[$product->name] = [
                    "color" => $color1
                ];
            }

            $trend_graph = [
                "labels" => [
                    "ENE",
                    "FEB",
                    "MAR",
                    "ABR",
                    "MAY",
                    "JUN",
                    "JUL",
                    "AGO",
                    "SEP",
                    "OCT",
                    "NOV",
                    "DIC",
                ],
                "datasets" => $datasets,
            ];

            return [
                "data" => $trend_graph,
                "labels" => $labels
            ];
        }

        private function round_chart($id_product) {
            global $wpdb;
            $sql = "SELECT terms.name
                    FROM 
                    (
                    SELECT itemmeta.order_item_id AS order_item_id
                    FROM {$wpdb->prefix}woocommerce_order_itemmeta AS itemmeta
                    INNER JOIN {$wpdb->prefix}woocommerce_order_items AS items ON itemmeta.order_item_id = items.order_item_id
                    INNER JOIN {$wpdb->posts} AS posts ON posts.ID = items.order_id
                    WHERE itemmeta.meta_key = '_product_id' AND itemmeta.meta_value = '" . $id_product . "'
                    AND posts.post_status IN ( 'wc-completed', 'wc-processing', 'wc-on-hold' )
                    ) AS itemsOrder
                    INNER JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS itemmeta2 ON itemmeta2.order_item_id = itemsOrder.order_item_id
                    INNER JOIN {$wpdb->terms} AS terms ON terms.slug = itemmeta2.meta_value
                    WHERE itemmeta2.meta_key='pa_servicios-odontologicos'";

            $products = $wpdb->get_results($sql);

            $arrTerms = $round_chart = [];
            foreach ($products as $product) {
                $arrTerms[] = $product->name;
            }

            $tmpVariaciones = array_count_values($arrTerms);

            $total = 0;
            foreach ($tmpVariaciones as $key => $value) {
                $round_chart[$key] = [
                    'total' => $value,
                    'color' => $this->colors[$key]
                ];
                $total += $value;
            }

            return [
                "data" => $round_chart,
                "total" => $total
            ];
        }

        private function getTotalSales($product_id, $finicio = null, $ffinal = null) {
            global $wpdb;

            $sql = "SELECT SUM(itemmeta2.meta_value) AS total_sales
                
                    FROM (
                    SELECT itemmeta.order_item_id AS order_item_id
                    FROM {$wpdb->prefix}woocommerce_order_itemmeta AS itemmeta
                    INNER JOIN {$wpdb->prefix}woocommerce_order_items AS items ON itemmeta.order_item_id = items.order_item_id
                    INNER JOIN {$wpdb->posts} AS posts ON posts.ID = items.order_id
                    WHERE itemmeta.meta_key = '_product_id' AND itemmeta.meta_value = %d
                    AND posts.post_status IN ( 'wc-completed', 'wc-processing', 'wc-on-hold' )
                    ";

            if (!is_null($finicio) && !is_null($ffinal)) {
                $sql .= " AND DATE(posts.post_date) BETWEEN %s AND %s";
                $sql .= " ) AS itemsOrder";
                $sql .= " INNER JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS itemmeta2 ON itemmeta2.order_item_id = itemsOrder.order_item_id";
                $sql .= " WHERE itemmeta2.meta_key = '_line_total'";
                $result = $wpdb->prepare($sql, $product_id, $finicio, $ffinal);
            } else {
                $sql .= " ) AS itemsOrder";
                $sql .= " INNER JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS itemmeta2 ON itemmeta2.order_item_id = itemsOrder.order_item_id";
                $sql .= " WHERE itemmeta2.meta_key = '_line_total'";
                $result = $wpdb->prepare($sql, $product_id);
            }

            return $wpdb->get_results($result);
        }

        private function monthlySales($product_id, $finicio = null, $ffinal = null) {
            global $wpdb;
            $sql = "SELECT terms.name, order_id, fecha, COUNT(*) AS total, MONTH(fecha) AS mes, SUM(itemmeta3.meta_value) AS total_sales
                    FROM (
                    SELECT itemmeta.order_item_id AS order_item_id, items.order_id AS order_id, posts.post_date AS fecha
                    FROM {$wpdb->prefix}woocommerce_order_itemmeta AS itemmeta 
                    INNER JOIN {$wpdb->prefix}woocommerce_order_items AS items ON itemmeta.order_item_id = items.order_item_id 
                    INNER JOIN {$wpdb->posts} AS posts ON posts.ID = items.order_id 
                    WHERE itemmeta.meta_key = '_product_id' 
                    AND itemmeta.meta_value = %d 
                    AND posts.post_status IN ( 'wc-completed', 'wc-processing', 'wc-on-hold' ) 
                    AND DATE(posts.post_date) BETWEEN %s AND %s
                    ) AS itemsOrder 
                    INNER JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS itemmeta2 ON itemmeta2.order_item_id = itemsOrder.order_item_id
                    INNER JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS itemmeta3 ON itemmeta3.order_item_id = itemsOrder.order_item_id 
                    INNER JOIN {$wpdb->terms} AS terms ON terms.slug = itemmeta2.meta_value 
                    WHERE itemmeta2.meta_key='pa_servicios-odontologicos' AND itemmeta3.meta_key = '_line_total'                    
                    GROUP BY MONTH(fecha), NAME ";
                    
                    
                    
            $result = $wpdb->prepare($sql, $product_id, $finicio, $ffinal);
            return $wpdb->get_results($result);
        }

    }

}