<?php

/**
 * Admin Menu
 */
class Profesionales_Admin_Menu {

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
        add_menu_page(__('Profesionales', 'wedevs'), __('Profesionales', 'wedevs'), 'manage_options', 'profesionales', array($this, 'plugin_page'), 'dashicons-groups', null);

        add_submenu_page('profesionales', __('Profesionales', 'wedevs'), __('Profesionales', 'wedevs'), 'manage_options', 'profesionales', array($this, 'plugin_page'));
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

                $template = dirname(__FILE__) . '/views/profesional-single.php';
                break;

            case 'edit':
                $template = dirname(__FILE__) . '/views/profesional-edit.php';
                break;  

            case 'new':
                $template = dirname(__FILE__) . '/views/profesional-new.php';
                break;
            
            case 'delete':
                profesional_delete_profesional($id);
                $template = dirname(__FILE__) . '/views/profesional-list.php';
                break;

            default:
                $template = dirname(__FILE__) . '/views/profesional-list.php';
                break;
        }

        if (file_exists($template)) {
            include $template;
        }
    }

}
