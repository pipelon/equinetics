<?php

/*
  Plugin Name: Botón de Emergencia
  Plugin URI: http://www.equinetics.com.co
  Description: Este plugin se encargará de mostrar un botón de Emergencia Equina.
  Version: 1.0
  Author: Felipe Echeverri
  Author URI: http://www.equinetics.com.co
  Author email: pipe.echeverri.1@gmail.com
 */

add_action('init', function () {

    include dirname(__FILE__) . '/includes/class-profesionales-admin-menu.php';
    include dirname(__FILE__) . '/includes/class-profesional-list-table.php';
    include dirname(__FILE__) . '/includes/class-form-handler.php';
    include dirname(__FILE__) . '/includes/profesional-functions.php';
    new Profesionales_Admin_Menu();
});

function mostrar_btn_emergencia() {
    include dirname(__FILE__) . '/includes/views/profesional.php';
}

add_shortcode('btn_emergencia', 'mostrar_btn_emergencia');
