<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://facebook.com/disismehbub
 * @since      1.0.0
 *
 * @package    Hawaii_Chatbot
 * @subpackage Hawaii_Chatbot/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Hawaii_Chatbot
 * @subpackage Hawaii_Chatbot/includes
 * @author     Mehbub Rashid <mehbub.rabu@gmail.com>
 */
class Hawaii_Chatbot_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'hawaii-chatbot',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
