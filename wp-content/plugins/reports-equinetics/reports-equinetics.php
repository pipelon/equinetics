<?php

/*
  Plugin Name: Reportes personalizados Equinetics
  Plugin URI: http://www.equinetics.com.co
  Description: Este plugin se encarga de mostrar los reportes de ventas para los veterinarios
  Version: 1.0
  Author: Felipe Echeverri
  Author URI: http://www.equinetics.com.co
  Author email: pipe.echeverri.1@gmail.com
 */
if (!defined('ABSPATH')) {
    exit;
}

define('REPORTS_DIR', dirname(__FILE__));

if (!class_exists('ReportsEquinetics')) {

    class ReportsEquinetics {

        protected static $_instance = null;

        /**
         * Main ReportsEquinetics Instance
         *
         * Ensures only one instance of ReportsEquinetics is loaded or can be loaded.
         *
         * @static
         * @return ReportsEquinetics - Main instance
         */
        public static function instance() {
            if (is_null(self::$_instance)) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        /**
         * constructor de la clase ReportsEquinetics
         */
        public function __construct() {
            $this->includes();
            $this->show_report_equinetics();
        }        

        /**
         * Funcion para incluir los archivos del proyecto
         */
        public function includes() {
            include REPORTS_DIR . '/includes/class-report-equinetics.php';
        }

        /*
         * Visualizar reportes del usuario
         */
        public function show_report_equinetics() {
            $objForm = new ReportsEquineticsView();
            return $objForm->viewReport();
        }

    }

}

/*
 * Init Reportes especializados Equinetics
 */

function reports_equinetics_init() {
    if (is_user_logged_in()) {
        reports_equinetics();
    } else {
        echo "Debes autenticarte para ver esta página.";
    }
}

/*
 * shortcode para agregar el plugin
 */
add_shortcode('reports_equinetics', 'reports_equinetics_init');

/**
 * Retorna la intancia de of BuscadorEquinetics
 *
 * @return BuscadorEquinetics
 */
function reports_equinetics() {
    return ReportsEquinetics::instance();
}
