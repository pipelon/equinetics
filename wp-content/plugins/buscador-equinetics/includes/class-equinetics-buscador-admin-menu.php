<?php

/**
 * Admin Menu
 */
class Buscador_Admin_Menu {

    /**
     * Kick-in the class
     */
    public function __construct() {
        add_action('admin_menu', array($this, 'admin_menu'));
    }

    /**
     * Add menu items
     *
     * @return void
     */
    public function admin_menu() {

        /** Top Menu * */
        add_menu_page(__('Buscador Equinetics', 'wedevs'), __('Buscador Equinetics', 'wedevs'), 'manage_options', 'buscador', array($this, 'plugin_page'), 'dashicons-search', null);
    }

    /**
     * Handles the plugin page
     *
     * @return void
     */
    public function plugin_page() {

        if (isset($_POST["submit_settings"])) {
            $update_settings = Buscador_equinetics()->get_settings();

            foreach ($update_settings as $key => $values) {

                $update_settings[$key] = $_POST[$key];
            }

            update_option('buscador_equinetics_settings', $update_settings);

            //AWS_Helpers::register_wpml_translations($update_settings);

            echo '<div id="message" class="updated notice notice-success is-dismissible">'
            . '<p>Configuración actualiazada con éxito</p>'
                    . '<button type="button" class="notice-dismiss">'
                    . '<span class="screen-reader-text">Descartar este aviso.'
                    . '</span>'
                    . '</button>'
                    . '</div>';
        }

        $action = isset($_GET['action']) ? $_GET['action'] : 'buscador';
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        switch ($action) {
            case 'buscador':
                $template = dirname(__FILE__) . '/views/buscador-settings.php';
                break;
            default:
                $template = dirname(__FILE__) . '/views/buscador-settings.php';
                break;
        }

        if (file_exists($template)) {
            include $template;
        }
    }

}
