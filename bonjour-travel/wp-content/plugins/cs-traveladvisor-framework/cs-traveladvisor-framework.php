<?php

/*
  Plugin Name: CS Traveladvisor Framework
  Plugin URI: http://themeforest.net/user/Chimpstudio/
  Description: CS Traveladvisor Framework.
  Version: 1.2
  Author: ChimpStudio
  Author URI: http://themeforest.net/user/Chimpstudio/
  Requires at least: 4.1
  Tested up to: 5.2
  Text Domain: cs-frame
  Domain Path: /languages/

  Copyright: 2015 chimpgroup (email : info@chimpstudio.co.uk)
  License: GNU General Public License v3.0
  License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

if ( ! defined('ABSPATH') ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists('wp_traveladvisor_framework') ) :

	class wp_traveladvisor_framework {

		protected static $_instance = null;

		/**
		 * Main Plugin Instance
		 *
		 */
		public static function instance() {
			if ( is_null(self::$_instance) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Initiate Plugin Actions
		 *
		 */
		public function __construct() {

			$this->plugin_actions();
			$this->includes();
			add_action('wp_ajax_traveladvisor_admin_dismiss_notice', array( $this, 'traveladvisor_admin_dismiss_notice' ));
		}

		/**
		 * Initiate Plugin 
		 * Text Domain
		 * @return
		 */
		public function load_plugin_textdomain() {
			$locale = apply_filters('plugin_locale', get_locale(), 'cs-frame');

			load_textdomain('cs-frame', WP_LANG_DIR . '/cs-frame/cs-frame-' . $locale . '.mo');
			load_plugin_textdomain('cs-frame', false, plugin_basename(dirname(__FILE__)) . "/languages");
		}

		/**
		 * Fetch and return version of the current plugin
		 *
		 * @return	string	version of this plugin
		 */
		public static function get_plugin_version() {
			$plugin_data = get_plugin_data(__FILE__);
			return $plugin_data['Version'];
		}

		/**
		 * What type of request is this?
		 * string $type ajax, frontend or admin
		 * @return bool
		 */
		public function is_request($type) {
			switch ( $type ) {
				case 'admin' :
					return is_admin();
				case 'ajax' :
					return defined('DOING_AJAX');
				case 'cron' :
					return defined('DOING_CRON');
				case 'frontend' :
					return ( ! is_admin() || defined('DOING_AJAX') ) && ! defined('DOING_CRON');
			}
		}

		/**
		 * Include required core files 
		 * used in admin and on the frontend.
		 */
		public function includes() {
			require_once 'assets/translate/cs-strings.php';
			require_once 'includes/cs-frame-functions.php';
			require_once 'includes/cs-mailchimp/class_mailchimp.php';
			require_once 'includes/cs-mailchimp/function_mailchimp.php';
			require_once 'includes/cs-twitter/cs-twitter-widget.php';
			require_once 'includes/cs-page-builder.php';
			// Post and Page Meta Boxes
			require_once 'includes/cs-metaboxes/cs-page-functions.php';
			require_once 'includes/cs-metaboxes/cs-page.php';
			require_once 'includes/cs-metaboxes/cs-post.php';
			require_once 'includes/cs-metaboxes/cs-product.php';

			// Importer
			require_once 'includes/cs-importer/theme-importer.php';

			// Auto Updator
			require_once 'includes/cs-importer/auto-update-theme.php';
		}

		/**
		 * Set plugin actions.
		 * @return
		 */
		public function plugin_actions() {

			add_action('init', array( $this, 'load_plugin_textdomain' ), 0);
			add_action('admin_enqueue_scripts', array( $this, 'admin_plugin_files_enqueue' ), 1);
		}

		/**
		 * Get the plugin url.
		 * @return string
		 */
		public function plugin_url() {
			return trailingslashit(plugins_url('/', __FILE__));
		}

		/**
		 * Get the plugin path.
		 * @return string
		 */
		public function plugin_path() {
			return untrailingslashit(plugin_dir_path(__FILE__));
		}

		/**
		 * Default plugin 
		 * admin files enqueue.
		 * @return
		 */
		public function admin_plugin_files_enqueue() {

			if ( $this->is_request('admin') ) {
				// admin js files
				$traveladvisor_scripts_path = plugins_url('/assets/js/cs-page-builder-functions.js', __FILE__);
				wp_enqueue_script('cs-frame-admin', $traveladvisor_scripts_path, array( 'jquery' ));
			}
		}
		
		public function traveladvisor_admin_dismiss_notice() {
			set_transient( 'admin_dismiss_notice', '1', 60 * 60 * 24 * 7 );
			die;
		}

	}

	if ( ! function_exists('traveladvisor_var_frame') ) {

		function traveladvisor_var_frame() {
			return wp_traveladvisor_framework::instance();
		}

	}

	// Global for backwards compatibility.
	$GLOBALS['wp_traveladvisor_framework'] = traveladvisor_var_frame();

endif;
