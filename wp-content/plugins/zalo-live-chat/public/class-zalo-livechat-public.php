<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://dangngocbinh.com
 * @since      1.0.0
 *
 * @package    Zalo_Livechat
 * @subpackage Zalo_Livechat/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Zalo_Livechat
 * @subpackage Zalo_Livechat/public
 * @author     Dang Ngoc Binh <dangngocbinh.dnb@gmail.com>
 */
class Zalo_Livechat_Public {

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
		add_filter( 'wp_footer', array($this, 'add_scripts'));
	}

	function add_scripts(){
		$settings = ZaloLiveChat_OptionPage::instance();
		$ao_id = $settings->get_setting('zalo_oa_id');
		$hello = $settings->get_setting('zalo_hello_message');
		$popup = $settings->get_setting('zalo_popup_time');
		if($ao_id){
			?>
			<div class="zalo-chat-widget" data-oaid="<?php echo $ao_id; ?>" data-welcome-message="<?php echo $hello; ?>" data-autopopup="<?php echo $popup; ?>" data-width="350" data-height="420"></div>
			<script src="https://sp.zalo.me/plugins/sdk.js"></script>
			<?php
		}
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
		 * defined in Zalo_Livechat_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Zalo_Livechat_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/zalo-livechat-public.css', array(), $this->version, 'all' );

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
		 * defined in Zalo_Livechat_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Zalo_Livechat_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/zalo-livechat-public.js', array( 'jquery' ), $this->version, false );

	}

}
