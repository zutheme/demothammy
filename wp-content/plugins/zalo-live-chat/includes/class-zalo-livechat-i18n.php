<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://dangngocbinh.com
 * @since      1.0.0
 *
 * @package    Zalo_Livechat
 * @subpackage Zalo_Livechat/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Zalo_Livechat
 * @subpackage Zalo_Livechat/includes
 * @author     Dang Ngoc Binh <dangngocbinh.dnb@gmail.com>
 */
class Zalo_Livechat_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'zalo-livechat',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
