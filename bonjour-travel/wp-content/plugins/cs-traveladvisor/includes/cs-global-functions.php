<?php

/**
 * File Type: Global Varibles Functions
 */
if ( !class_exists( 'traveladvisor_global_functions' ) ) {

	class traveladvisor_global_functions {

		// The single instance of the class
		protected static $_instance = null;

		public function __construct() {
			// Do something...
		}

		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		public function theme_options() {
			global $traveladvisor_var_options;

			return $traveladvisor_var_options;
		}

		public function globalizing( $var_array = array() ) {
			if ( is_array( $var_array ) && sizeof( $var_array ) > 0 ) {
				$return_array = array();
				foreach ( $var_array as $value ) {
					global $$value;
					$return_array[$value] = $$value;
				}
				return $return_array;
			}
		}

	}

	function TRAVELADVISOR_VAR_GLOBALS() {
		return traveladvisor_global_functions::instance();
	}

	$GLOBALS['traveladvisor_global_functions'] = TRAVELADVISOR_VAR_GLOBALS();
}