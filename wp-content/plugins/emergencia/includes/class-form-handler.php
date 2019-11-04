<?php

/**
 * Handle the form submissions
 *
 * @package Package
 * @subpackage Sub Package
 */
class Form_Handler_2 {

    /**
     * Hook 'em all
     */
    public function __construct() {
        add_action( 'admin_init', array( $this, 'handle_form' ) );
    }

    /**
     * Handle the profesional new and edit form
     *
     * @return void
     */
    public function handle_form() {
        if ( ! isset( $_POST['submit_profesional'] ) ) {
            return;
        }

        if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'profesional-new' ) ) {
            die( __( 'Are you cheating?', 'wedevs' ) );
        }

        if ( ! current_user_can( 'read' ) ) {
            wp_die( __( 'Permission Denied!', 'wedevs' ) );
        }        

        $errors   = array();
        $page_url = admin_url( 'admin.php?page=profesionales' );
        $field_id = isset( $_POST['field_id'] ) ? intval( $_POST['field_id'] ) : 0;

        $nombre = isset( $_POST['nombre'] ) ? sanitize_text_field( $_POST['nombre'] ) : '';
        $direccion = isset( $_POST['direccion'] ) ? sanitize_text_field( $_POST['direccion'] ) : '';
        $correo = isset( $_POST['correo'] ) ? sanitize_text_field( $_POST['correo'] ) : '';
        $celular = isset( $_POST['celular'] ) ? sanitize_text_field( $_POST['celular'] ) : '';
        $profesion = isset( $_POST['profesion'] ) ? sanitize_text_field( $_POST['profesion'] ) : '';
        $logo_imagen = isset( $_POST['logo_imagen'] ) ? sanitize_text_field( $_POST['logo_imagen'] ) : '';
        $activo = isset( $_POST['activo'] ) ? sanitize_text_field( $_POST['activo'] ) : '';

        // some basic validation
        if ( ! $nombre ) {
            $errors[] = __( 'Error: Nombre is required', 'wedevs' );
        }

        if ( ! $direccion ) {
            $errors[] = __( 'Error: Dirección is required', 'wedevs' );
        }

        if ( ! $correo ) {
            $errors[] = __( 'Error: Correo Electrónico is required', 'wedevs' );
        }

        if ( ! $celular ) {
            $errors[] = __( 'Error: Celular is required', 'wedevs' );
        }

        if ( ! $profesion ) {
            $errors[] = __( 'Error: Profesión is required', 'wedevs' );
        }

        if ( ! $activo ) {
            $errors[] = __( 'Error: Activo is required', 'wedevs' );
        }

        // bail out if error found
        if ( $errors ) {
            $first_error = reset( $errors );
            $redirect_to = add_query_arg( array( 'error' => $first_error ), $page_url );
            wp_safe_redirect( $redirect_to );
            exit;
        }

        $fields = array(
            'nombre' => $nombre,
            'direccion' => $direccion,
            'correo' => $correo,
            'celular' => $celular,
            'profesion' => $profesion,
            'logo_imagen' => $logo_imagen,
            'activo' => $activo,
        );

        // New or edit?
        if ( ! $field_id ) {

            $insert_id = profesional_insert_profesional( $fields );

        } else {

            $fields['id'] = $field_id;

            $insert_id = profesional_insert_profesional( $fields );
        }

        if ( is_wp_error( $insert_id ) ) {
            $redirect_to = add_query_arg( array( 'message' => 'error' ), $page_url );
        } else {
            $redirect_to = add_query_arg( array( 'message' => 'success' ), $page_url );
        }

        wp_safe_redirect( $redirect_to );
        exit;
    }
}

new Form_Handler_2();