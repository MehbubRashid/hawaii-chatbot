<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://facebook.com/disismehbub
 * @since      1.0.0
 *
 * @package    Hawaii_Chatbot
 * @subpackage Hawaii_Chatbot/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Hawaii_Chatbot
 * @subpackage Hawaii_Chatbot/public
 * @author     Mehbub Rashid <mehbub.rabu@gmail.com>
 */
class Hawaii_Chatbot_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/hawaii-chatbot-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, 'https://mehbubrashid.github.io/hawaii-chatbot/public/js/bootstrap.min.js', array( 'jquery' ), $this->version, false );
		$js_object = array(
			'imgurl' => plugin_dir_url( __FILE__ ).'images/avatar.jpg'
		);
		wp_localize_script( $this->plugin_name, 'js_object', $js_object);
	}
	public function display_chat_widget() {
		echo '<div class="kudu_widget"><div class="chat">
		<div class="chat_header">
		  <div class="chat_option">
		  <div class="header_img">
			<img src="'.plugin_dir_url( __FILE__ ).'images/avatar.jpg">
			</div>
			<span id="chat_head">Travel Care Hawaii</span> <br> <span class="agent">Assistant</span> <span class="online"></span>
		  </div>
	
		</div>
		<div id="chat_converse" class="chat_conversion chat_converse" style="display: block;">
		
		</div>
		<div class="fab_field">
		  <a id="fab_send" class="fab is-visible"><i class="zmdi zmdi-mail-send"></i></a>
		  <input type="text" id="chatSend" name="chat_message" placeholder="Send a message" class="chat_field chat_message"></input>
		</div>
	  </div><a id="prime" class="fab">
	  <div class="chatbubble">
		<div class="chatbubble-content">
			<div class="bubble-img"><img src="'.plugin_dir_url( __FILE__ ).'images/avatar.jpg"></div>
			<div class="bubble-text">Hi there, how can I help you today?</div>
		</div>
	  </div>
	  <i class="prime zmdi zmdi-comment-outline"></i>
	  </a>
	  </div>
	  ';
	}

	

}
