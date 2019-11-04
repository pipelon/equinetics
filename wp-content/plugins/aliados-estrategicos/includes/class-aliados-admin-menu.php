<?php

/**
 * Admin Menu
 */
class Aliados_Admin_Menu {

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
        add_menu_page(__('Aliados Estrat&eacute;gicos', 'wedevs'), __('Aliados Estrat&eacute;gicos', 'wedevs'), 'manage_options', 'aliados', array($this, 'plugin_page'), 'dashicons-groups', null);

        add_submenu_page('aliados', __('Aliados Estrat&eacute;gicos', 'wedevs'), __('Aliados Estrat&eacute;gicos', 'wedevs'), 'manage_options', 'aliados', array($this, 'plugin_page'));
    }

    /**
     * Handles the plugin page
     *
     * @return void
     */
    public function plugin_page() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'list';
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        switch ($action) {
            case 'view':

                $template = dirname(__FILE__) . '/views/aliado-single.php';
                break;

            case 'edit':
                $template = dirname(__FILE__) . '/views/aliado-edit.php';
                break;

            case 'new':
                $template = dirname(__FILE__) . '/views/aliado-new.php';
                break;
            
            case 'delete':
                aliado_delete_aliado($id);
                $template = dirname(__FILE__) . '/views/aliado-list.php';
                break;

            default:
                $template = dirname(__FILE__) . '/views/aliado-list.php';
                break;
        }

        if (file_exists($template)) {
            include $template;
        }
    }

}
