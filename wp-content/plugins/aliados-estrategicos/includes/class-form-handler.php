<?php

/**
 * Handle the form submissions
 *
 * @package Package
 * @subpackage Sub Package
 */
class Form_Handler {

    /**
     * Hook 'em all
     */
    public function __construct() {
        add_action('admin_init', array($this, 'handle_form'));
    }

    /**
     * Handle the aliado new and edit form
     *
     * @return void
     */
    public function handle_form() {
        if (!isset($_POST['submit_aliado'])) {
            return;
        }

        if (!wp_verify_nonce($_POST['_wpnonce'], 'aliado-new')) {
            die(__('Are you cheating?', 'wedevs'));
        }

        if (!current_user_can('read')) {
            wp_die(__('Permission Denied!', 'wedevs'));
        }

        $errors = array();
        $page_url = admin_url('admin.php?page=aliados');
        $field_id = isset($_POST['field_id']) ? intval($_POST['field_id']) : 0;

        $tipo = isset($_POST['tipoaliado']) ? sanitize_text_field($_POST['tipoaliado']) : '';
        $nombre = isset($_POST['nombre']) ? sanitize_text_field($_POST['nombre']) : '';
        $url = isset($_POST['url']) ? sanitize_text_field($_POST['url']) : '';
        $descripcion_corta = isset($_POST['descripcion_corta']) ? sanitize_text_field($_POST['descripcion_corta']) : '';
        $descripcion_larga = isset($_POST['descripcion_larga']) ? wp_kses_post($_POST['descripcion_larga']) : '';
        $telefono = isset($_POST['telefono']) ? sanitize_text_field($_POST['telefono']) : '';
        $email = isset($_POST['email']) ? sanitize_text_field($_POST['email']) : '';
        $direccion = isset($_POST['direccion']) ? sanitize_text_field($_POST['direccion']) : '';
        $latitud = isset($_POST['latitud']) ? sanitize_text_field($_POST['latitud']) : '';
        $longitud = isset($_POST['longitud']) ? sanitize_text_field($_POST['longitud']) : '';
        $logo_imagen = isset($_POST['logo_imagen']) ? sanitize_text_field($_POST['logo_imagen']) : '';

        // some basic validation
        if (!$nombre) {
            $errors[] = __('Error: Nombre is required', 'wedevs');
        }

        if (!$descripcion_corta) {
            $errors[] = __('Error: Descripci&oacute;n corta is required', 'wedevs');
        }

        if (!$descripcion_larga) {
            $errors[] = __('Error: Descripci&oacute;n larga is required', 'wedevs');
        }

        // bail out if error found
        if ($errors) {
            $first_error = reset($errors);
            $redirect_to = add_query_arg(array('error' => $first_error), $page_url);
            wp_safe_redirect($redirect_to);
            exit;
        }

        $fields = array(
            'tipo' => $tipo,
            'nombre' => $nombre,
            'url' => $url,
            'descripcion_corta' => $descripcion_corta,
            'descripcion_larga' => $descripcion_larga,
            'email' => $email,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'latitud' => $latitud,
            'longitud' => $longitud,
            'logo_imagen' => $logo_imagen,
        );

        // New or edit?
        if (!$field_id) {

            $insert_id = aliado_insert_aliado($fields);
        } else {

            $fields['id'] = $field_id;

            $insert_id = aliado_insert_aliado($fields);
        }

        if (is_wp_error($insert_id)) {
            $redirect_to = add_query_arg(array('message' => 'error'), $page_url);
        } else {
            $redirect_to = add_query_arg(array('message' => 'success'), $page_url);
        }

        wp_safe_redirect($redirect_to);
        exit;
    }

}

new Form_Handler();
