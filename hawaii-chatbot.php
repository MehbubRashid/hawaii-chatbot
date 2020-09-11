<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://facebook.com/disismehbub
 * @since             1.0.0
 * @package           Hawaii_Chatbot
 *
 * @wordpress-plugin
 * Plugin Name:       Hawaii Travel ChatBot
 * Plugin URI:        https://www.wordpress.org
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Mehbub Rashid
 * Author URI:        https://facebook.com/disismehbub
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       hawaii-chatbot
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'HAWAII_CHATBOT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-hawaii-chatbot-activator.php
 */
function hawaii_chatbot_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hawaii-chatbot-activator.php';
	Hawaii_Chatbot_Activator::activate();
	add_option('Hawaii_Chatbot_Version', HAWAII_CHATBOT_VERSION);
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-hawaii-chatbot-deactivator.php
 */
function hawaii_chatbot_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hawaii-chatbot-deactivator.php';
	Hawaii_Chatbot_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'hawaii_chatbot_activate' );
register_deactivation_hook( __FILE__, 'hawaii_chatbot_deactivate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-hawaii-chatbot.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function hawaii_chatbot_run() {

	$plugin = new Hawaii_Chatbot();
	$plugin->run();

}
hawaii_chatbot_run();
