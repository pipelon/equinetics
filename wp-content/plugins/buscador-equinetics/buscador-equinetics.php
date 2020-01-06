<?php

/*
  Plugin Name: Buscador especializado de Equinetics
  Plugin URI: http://www.equinetics.com.co
  Description: Este plugin se encarga de hacer una búsqueda avanzada de Caballos
  Version: 1.0
  Author: Felipe Echeverri
  Author URI: http://www.equinetics.com.co
  Author email: pipe.echeverri.1@gmail.com
 */
if (!defined('ABSPATH')) {
    exit;
}
define('BUSCADOR_VERSION', '1.0');
define('BUSCADOR_DIR', dirname(__FILE__));
define('BUSCADOR_URL', plugins_url('', __FILE__));

if (!class_exists('BuscadorEquinetics')) {

    class BuscadorEquinetics {

        protected static $_instance = null;

        /**
         * Main BuscadorEquinetics Instance
         *
         * Ensures only one instance of BuscadorEquinetics is loaded or can be loaded.
         *
         * @static
         * @return BuscadorEquinetics - Main instance
         */
        public static function instance() {
            if (is_null(self::$_instance)) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        /**
         * constructor de la clase BuscadorEquinetics
         */
        public function __construct() {
            add_shortcode('add_equinetics_search_form', array($this, 'equinetics_search_form'));
            $this->register_settings();
            if (!get_option('buscador_equinetics_settings')) {
                $this->initialize_settings();
            }
            $this->includes();
        }

        /**
         * Funcion para incluir las opciones del plugin
         * @return type
         */
        public function options_array() {
            require_once BUSCADOR_DIR . '/includes/opciones.php';
            return $options;
        }

        /*
         * Register plugin settings
         */

        public function register_settings() {
            register_setting('buscador_equinetics_settings', 'buscador_equinetics_settings');
        }

        /*
         * Get plugin settings
         */

        public function get_settings() {
            $plugin_options = get_option('buscador_equinetics_settings');
            return $plugin_options;
        }

        /**
         * Initialize settings to their default values
         */
        public function initialize_settings() {
            $options = $this->options_array();
            $default_settings = array();
            foreach ($options as $section) {
                foreach ($section as $values) {
                    if ($values['type'] === 'heading') {
                        continue;
                    }
                    $default_settings[$values['id']] = $values['value'];
                }
            }
            update_option('buscador_equinetics_settings', $default_settings);
        }

        /**
         * Funcion para incluir los archivos del prpyecto
         */
        public function includes() {
            include dirname(__FILE__) . '/includes/class-equinetics-buscador-admin-menu.php';
            include dirname(__FILE__) . '/includes/class-equinetics-buscador-form.php';
            new Buscador_Admin_Menu();
        }

        /*
         * Generate search form
         */
        public function equinetics_search_form() {
            $objForm = new FormularioBuscador();
            return $objForm->buscador();
        }

    }

}

/*
 * Init Buscador Equinetics
 */

function Buscador_equinetics_init() {
    Buscador_equinetics();
}

add_action('woocommerce_loaded', 'Buscador_equinetics_init');

/**
 * Retorna la intancia de of BuscadorEquinetics
 *
 * @return BuscadorEquinetics
 */
function Buscador_equinetics() {
    return BuscadorEquinetics::instance();
}

function get_horse_features($atts){
    include dirname(__FILE__) . '/includes/views/get_horse_features.php';
}
add_shortcode('get_horse_features', 'get_horse_features');