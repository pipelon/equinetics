<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://useful-pixels.com
 * @since      1.0.0
 *
 * @package    Useful_Pixels_plugin
 * @subpackage Useful_Pixels_plugin/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Useful_Pixels_plugin
 * @subpackage Useful_Pixels_plugin/includes
 * @author     Useful Pixels <office@useful-pixels.com>
 */
class Useful_Pixels_plugin_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'useful-pixels_plugin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
