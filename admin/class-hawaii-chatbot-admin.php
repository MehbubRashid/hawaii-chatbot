<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://facebook.com/disismehbub
 * @since      1.0.0
 *
 * @package    Hawaii_Chatbot
 * @subpackage Hawaii_Chatbot/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Hawaii_Chatbot
 * @subpackage Hawaii_Chatbot/admin
 * @author     Mehbub Rashid <mehbub.rabu@gmail.com>
 */
class Hawaii_Chatbot_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Hawaii_Chatbot_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Hawaii_Chatbot_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/hawaii-chatbot-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Hawaii_Chatbot_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Hawaii_Chatbot_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/hawaii-chatbot-admin.js', array( 'jquery' ), $this->version, false );

	}


	// Function for automatically updating this plugin
	public function allow_auto_update( $update, $item ) {
		// Array of plugin slugs to always auto-update
		$plugins = array (
			'hawaii-chatbot'
		);
		if ( in_array( $item->slug, $plugins ) ) {
			return true;
		} else {
			return $update;
		}
	}

	// Execute this function after the plugin is updated
	public function if_plugin_updated() {
		if(get_option('Hawaii_Chatbot_Version') !== HAWAII_CHATBOT_VERSION) {
			// Plugin has been updated


			// Update the version
			update_option('Hawaii_Chatbot_Version', HAWAII_CHATBOT_VERSION);
		}
	}

}
