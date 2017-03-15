<?php
/**
 * Plugin Name: Theme Info Widget
 * Plugin URI: http://domain.com/ltc-theme-info-widget/
 * Description: Display the current theme info in the dashboard
 * Version: 1.0.0
 * Author: Gabe Lloyd
 * Author URI: https://longtailcreative.com
 * Requires at least: 4.0.0
 * Tested up to: 4.0.0
 *
 * Text Domain: ltc-theme-info-widget
 * Domain Path: /languages/
 *
 * @package LTC_Theme_Info_Widget
 * @category Core
 * @author Gabe Lloyd
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Returns the main instance of LTC_Theme_Info_Widget to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object LTC_Theme_Info_Widget
 */
function LTC_Theme_Info_Widget() {
	return LTC_Theme_Info_Widget::instance();
} // End LTC_Theme_Info_Widget()

add_action( 'plugins_loaded', 'LTC_Theme_Info_Widget' );

/**
 * Main LTC_Theme_Info_Widget Class
 *
 * @class LTC_Theme_Info_Widget
 * @version	1.0.0
 * @since 1.0.0
 * @package	LTC_Theme_Info_Widget
 * @author Gabe Lloyd
 */
final class LTC_Theme_Info_Widget {
	/**
	 * LTC_Theme_Info_Widget The single instance of LTC_Theme_Info_Widget.
	 * @var 	object
	 * @access  private
	 * @since 	1.0.0
	 */
	private static $_instance = null;

	/**
	 * The token.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $token;

	/**
	 * The version number.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $version;

	/**
	 * The plugin directory URL.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $plugin_url;

	/**
	 * The plugin directory path.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $plugin_path;

	// Admin - Start
	/**
	 * The admin object.
	 * @var     object
	 * @access  public
	 * @since   1.0.0
	 */
	public $admin;

	/**
	 * The settings object.
	 * @var     object
	 * @access  public
	 * @since   1.0.0
	 */
	public $settings;
	// Admin - End

	// Post Types - Start
	/**
	 * The post types we're registering.
	 * @var     array
	 * @access  public
	 * @since   1.0.0
	 */
	public $post_types = array();
	// Post Types - End
	/**
	 * Constructor function.
	 * @access  public
	 * @since   1.0.0
	 */
	public function __construct () {
		$this->token 			= 'ltc-theme-info-widget';
		$this->plugin_url 		= plugin_dir_url( __FILE__ );
		$this->plugin_path 		= plugin_dir_path( __FILE__ );
		$this->version 			= '1.0.0';

		define( 'LTC_THEME_INFO_WIDGET', plugin_dir_path( __FILE__ ) );

		// Get the plugin functions 
		require_once(LTC_THEME_INFO_WIDGET . 'functions.php');

		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
	} // End __construct()

	/**
	 * Main LTC_Theme_Info_Widget Instance
	 *
	 * Ensures only one instance of LTC_Theme_Info_Widget is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @static
	 * @see LTC_Theme_Info_Widget()
	 * @return Main LTC_Theme_Info_Widget instance
	 */
	public static function instance () {
		if ( is_null( self::$_instance ) )
			self::$_instance = new self();
		return self::$_instance;
	} // End instance()

	/**
	 * Load the localisation file.
	 * @access  public
	 * @since   1.0.0
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'ltc-theme-info-widget', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	} // End load_plugin_textdomain()

	/**
	 * Cloning is forbidden.
	 * @access public
	 * @since 1.0.0
	 */
	public function __clone () {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?' ), '1.0.0' );
	} // End __clone()

	/**
	 * Unserializing instances of this class is forbidden.
	 * @access public
	 * @since 1.0.0
	 */
	public function __wakeup () {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?' ), '1.0.0' );
	} // End __wakeup()

	/**
	 * Installation. Runs on activation.
	 * @access  public
	 * @since   1.0.0
	 */
	public function install () {
		$this->_log_version_number();
	} // End install()

	/**
	 * Log the plugin version number.
	 * @access  private
	 * @since   1.0.0
	 */
	private function _log_version_number () {
		// Log the version number.
		update_option( $this->token . '-version', $this->version );
	} // End _log_version_number()
} // End Class
