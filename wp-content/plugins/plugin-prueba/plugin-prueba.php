<?php
/**
 * Plugin Name: Very First Plugin
 * Plugin URI: https://www.yourwebsiteurl.com/
 * Description: This is the very first plugin I ever created.
 * Version: 1.0
 * Author: Your Name Here
 * Author URI: http://yourwebsiteurl.com/
 * */

function mostrar_aliados_estrategicos2() {
    require_once(plugin_dir_path(__FILE__) . 'prueba.php');
    return mostrar();
}

add_shortcode('pruebita', 'mostrar_aliados_estrategicos2');
