<?php

/**
 * Get all profesional
 *
 * @param $args array
 *
 * @return array
 */
function profesional_get_all_profesional($args = array()) {
    global $wpdb;

    $defaults = array(
        'number' => 20,
        'offset' => 0,
        'orderby' => 'id',
        'order' => 'ASC',
    );

    $args = wp_parse_args($args, $defaults);
    $cache_key = 'profesional-all';
    $items = wp_cache_get($cache_key, 'wedevs');

    if (false === $items) {
        $items = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'profesionales ORDER BY ' . $args['orderby'] . ' ' . $args['order'] . ' LIMIT ' . $args['offset'] . ', ' . $args['number']);

        wp_cache_set($cache_key, $items, 'wedevs');
    }

    return $items;
}

function profesional_get_actived_profesional() {
    global $wpdb;
    
    $cache_key = 'profesional-all-actived';
    $items = wp_cache_get($cache_key, 'wedevs');
    
    if (false === $items) {
        $items = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'profesionales  where activo = 1');
        wp_cache_set($cache_key, $items, 'wedevs');
    }

    return $items;
}

/**
 * Fetch all profesional from database
 *
 * @return array
 */
function profesional_get_profesional_count() {
    global $wpdb;

    return (int) $wpdb->get_var('SELECT COUNT(*) FROM ' . $wpdb->prefix . 'profesionales');
}

/**
 * Fetch a single profesional from database
 *
 * @param int   $id
 *
 * @return array
 */
function profesional_get_profesional($id = 0) {
    global $wpdb;

    return $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'profesionales WHERE id = %d', $id));
}

/**
 * Insert a new profesional
 *
 * @param array $args
 */
function profesional_insert_profesional($args = array()) {
    global $wpdb;

    $defaults = array(
        'id' => null,
        'nombre' => '',
        'direccion' => '',
        'correo' => '',
        'celular' => '',
        'profesion' => '',
        'logo_imagen' => '',
        'activo' => '',
    );

    $args = wp_parse_args($args, $defaults);
    $table_name = $wpdb->prefix . 'profesionales';

    // some basic validation
    if (empty($args['nombre'])) {
        return new WP_Error('no-nombre', __('No Nombre provided.', 'wedevs'));
    }
    if (empty($args['direccion'])) {
        return new WP_Error('no-direccion', __('No Dirección provided.', 'wedevs'));
    }
    if (empty($args['correo'])) {
        return new WP_Error('no-correo', __('No Correo Electrónico provided.', 'wedevs'));
    }
    if (empty($args['celular'])) {
        return new WP_Error('no-celular', __('No Celular provided.', 'wedevs'));
    }
    if (empty($args['profesion'])) {
        return new WP_Error('no-profesion', __('No Profesión provided.', 'wedevs'));
    }
    if (empty($args['activo'])) {
        return new WP_Error('no-activo', __('No Activo provided.', 'wedevs'));
    }

    // remove row id to determine if new or update
    $row_id = (int) $args['id'];
    unset($args['id']);

    if (!$row_id) {

        // insert a new
        if ($wpdb->insert($table_name, $args)) {
            return $wpdb->insert_id;
        }
    } else {

        // do update method here
        if ($wpdb->update($table_name, $args, array('id' => $row_id))) {
            return $row_id;
        }
    }

    return false;
}

function profesional_delete_profesional($id = 0) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'profesionales';
    return $wpdb->delete($table_name, array('id' => $id));
}
