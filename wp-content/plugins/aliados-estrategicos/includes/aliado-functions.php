<?php

/**
 * Get all aliado
 *
 * @param $args array
 *
 * @return array
 */
function aliado_get_all_aliado($args = array()) {
    global $wpdb;

    $defaults = array(
        'tipo' => '',
        'number' => 20,
        'offset' => 0,
        'orderby' => 'id',
        'order' => 'ASC',
    );

    $args = wp_parse_args($args, $defaults);

    $cache_key = $args['tipo'];
    $items = wp_cache_get($cache_key, 'wedevs');

    $where = !empty($args['tipo']) ? 'where tipo = "' . $args['tipo'] . '"' : '';
    
    if (false === $items) {
        $items = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'aliados_estrategicos '
                . $where
                . 'ORDER BY ' . $args['orderby'] . ' ' . $args['order'] . ' '
                . 'LIMIT ' . $args['offset'] . ', ' . $args['number']);

        wp_cache_set($cache_key, $items, 'wedevs');
    }

    return $items;
}

/**
 * Fetch all aliado from database
 *
 * @return array
 */
function aliado_get_aliado_count() {
    global $wpdb;

    return (int) $wpdb->get_var('SELECT COUNT(*) FROM ' . $wpdb->prefix . 'aliados_estrategicos');
}

/**
 * Fetch a single aliado from database
 *
 * @param int   $id
 *
 * @return array
 */
function aliado_get_aliado($id = 0) {
    global $wpdb;

    return $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'aliados_estrategicos WHERE id = %d', $id));
}

/**
 * Insert a new aliado
 *
 * @param array $args
 */
function aliado_insert_aliado($args = array()) {
    global $wpdb;

    $defaults = array(
        'id' => null,
        'tipo' => '',
        'nombre' => '',
        'url' => '',
        'descripcion_corta' => '',
        'descripcion_larga' => '',
        'email' => '',
        'direccion' => '',
        'latitud' => '',
        'longitud' => '',
        'logo_imagen' => '',
    );

    $args = wp_parse_args($args, $defaults);
    $table_name = $wpdb->prefix . 'aliados_estrategicos';

    // some basic validation
    if (empty($args['nombre'])) {
        return new WP_Error('no-nombre', __('No Nombre provided.', 'wedevs'));
    }
    if (empty($args['descripcion_corta'])) {
        return new WP_Error('no-descripcion_corta', __('No Descripci&oacute;n corta provided.', 'wedevs'));
    }
    if (empty($args['descripcion_larga'])) {
        return new WP_Error('no-descripcion_larga', __('No Descripci&oacute;n larga provided.', 'wedevs'));
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

function aliado_delete_aliado($id = 0) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'aliados_estrategicos';
    return $wpdb->delete($table_name, array('id' => $id));
}
