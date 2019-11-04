<?php
/**
 * Array of plugin options
 */

$options = array();
// Search Form Settings
$options['form'][] = array(
    "name"  => __( "Texto para el botón buscar", "BcdEqntcs" ),
    "desc"  => __( "Texto para el botón buscar.", "BcdEqntcs" ),
    "id"    => "search_field_text",
    "value" => __( "Buscar", "BcdEqntcs" ),
    "type"  => "text"
);
$options['form'][] = array(
    "name"  => __( "Resultado por página", "BcdEqntcs" ),
    "desc"  => __( "Resultado por página", "BcdEqntcs" ),
    "id"    => "result_per_page",
    "value" => 12,
    "type"  => "text"
);