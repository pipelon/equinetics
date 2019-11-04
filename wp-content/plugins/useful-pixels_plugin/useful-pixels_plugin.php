<?php

/**

 * @link              http://useful-pixels.com
 * @since             1.2
 * @package           Useful_Pixels_plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Useful PIxels Plugin
 * Plugin URI:        http://useful-pixels.com
 * Description:       Useful Pixels theme functions.
 * Version:           1.2
 * Author:            Useful Pixels
 * Author URI:        http://useful-pixels.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       useful-pixels_plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-useful-pixels_plugin-activator.php
 */
function activate_useful_pixels_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-useful-pixels_plugin-activator.php';
	Useful_Pixels_plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-useful-pixels_plugin-deactivator.php
 */
function deactivate_useful_pixels_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-useful-pixels_plugin-deactivator.php';
	Useful_Pixels_plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_useful_pixels_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_useful_pixels_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-useful-pixels_plugin.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/useful-pixels-metabox.php';     			
require_once plugin_dir_path( __FILE__ ) . 'includes/useful-pixels-gallery_metabox.php';  
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_useful_pixels_plugin() {

	$plugin = new Useful_Pixels_plugin();
	$plugin->run();

}
run_useful_pixels_plugin();
