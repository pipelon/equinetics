<?php

/*
  Plugin Name: Aliados Estratégicos
  Plugin URI: http://www.equinetics.com.co
  Description: Este plugin se encargará de mostrar los 'Aliados Estratégicos' de Equinetics.
  Version: 1.0
  Author: Felipe Echeverri
  Author URI: http://www.equinetics.com.co
  Author email: pipe.echeverri.1@gmail.com
 */

add_action('init', function () {
    include dirname(__FILE__) . '/includes/class-aliados-admin-menu.php';
    include dirname(__FILE__) . '/includes/class-aliado-list-table.php';
    include dirname(__FILE__) . '/includes/class-form-handler.php';
    include dirname(__FILE__) . '/includes/aliado-functions.php';

    new Aliados_Admin_Menu();
});

function mostrar_aliados_estrategicos() {
    include dirname(__FILE__) . '/includes/views/aliados-estrategicos.php';
}

function mostrar_aliados_estrategicos_home() {
    include dirname(__FILE__) . '/includes/views/aliados-estrategicos-home.php';
}

add_shortcode('aliados_estrategicos', 'mostrar_aliados_estrategicos');
add_shortcode('aliados_estrategicos_home', 'mostrar_aliados_estrategicos_home');
