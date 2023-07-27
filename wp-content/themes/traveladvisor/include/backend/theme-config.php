<?php
/**
 * Defines configurations for Theme and Framework Plugin
 *
 * @since	1.0
 * @package	WordPress
 */

/*
 * THEME_ENVATO_ID contains theme unique id at envator
 */
if ( ! defined( 'THEME_ENVATO_ID' ) ) {
	define( 'THEME_ENVATO_ID', '16844920' );
}

/*
 * THEME_NAME contains the name of the current theme
 */
if ( ! defined( 'THEME_NAME' ) ) {
	define( 'THEME_NAME', 'traveladvisor' );
}

/*
 * THEME_TEXT_DOMAIN contains the text domain name used for this theme
 */
if ( ! defined( 'THEME_TEXT_DOMAIN' ) ) {
	define( 'THEME_TEXT_DOMAIN', 'traveladvisor' );
}

/*
 * THEME_OPTIONS_PAGE_SLUG contains theme optinos main page slug
 */
if ( ! defined( 'THEME_OPTIONS_PAGE_SLUG' ) ) {
	define( 'THEME_OPTIONS_PAGE_SLUG', 'traveladvisor_theme_options_constructor' );
}

/*
 * TRAVELADVISOR_VAR_STABLE_VERSION contains travel advisor stable version compitble with this theme version
 */
if ( ! defined( 'TRAVELADVISOR_VAR_STABLE_VERSION' ) ) {
	define( 'TRAVELADVISOR_VAR_STABLE_VERSION', '1.0' );
}

/*
 * TRAVELADVISOR_VAR_FRAMEWORK_STABLE_VERSION contains cs travel advisor framework stable version compitble with this theme version
 */
if ( ! defined( 'TRAVELADVISOR_VAR_FRAMEWORK_STABLE_VERSION' ) ) {
	define( 'TRAVELADVISOR_VAR_FRAMEWORK_STABLE_VERSION', '1.0' );
}

/*
 * TRAVELADVISOR_BASE contains the root server path of the framework that is loaded
 */
if ( ! defined( 'TRAVELADVISOR_BASE' ) ) {
	define( 'TRAVELADVISOR_BASE', get_template_directory() . '/' );
}

/*
 * TRAVELADVISOR_BASE_URL contains the http url of the framework that is loaded
 */
if ( ! defined( 'TRAVELADVISOR_BASE_URL' ) ) {
	define( 'TRAVELADVISOR_BASE_URL', get_template_directory_uri() . '/' );
}

/*
 * DEFAULT_DEMO_DATA_NAME contains the default demo data name used by CS importer
 */
if ( ! defined( 'DEFAULT_DEMO_DATA_NAME' ) ) {
	define( 'DEFAULT_DEMO_DATA_NAME', 'traveladvisor' );
}

/*
 * DEFAULT_DEMO_DATA_URL contains the default demo data url used by CS importer
 */
if ( ! defined( 'DEFAULT_DEMO_DATA_URL' ) ) {
	define( 'DEFAULT_DEMO_DATA_URL', 'http://traveladvisor.chimpgroup.com/wp-content/uploads/' );
}

/*
 * DEMO_DATA_URL contains the demo data url used by CS importer
 */
if ( ! defined( 'DEMO_DATA_URL' ) ) {
	define( 'DEMO_DATA_URL', 'http://traveladvisor.chimpgroup.com/wp-content/uploads/{{{demo_data_name}}}' );
}

/*
 * REMOTE_API_URL contains the api url used for envator purchase key verification
 */
if ( ! defined( 'REMOTE_API_URL' ) ) {
	define( 'REMOTE_API_URL', 'http://chimpgroup.com/wp-demo/webservice/' );
}

/*
 * ATTACHMENTS_REPLACE_URL contains the URL to be replaced in WP content XML attachments
 */
if ( ! defined( 'ATTACHMENTS_REPLACE_URL' ) ) {
	define( 'ATTACHMENTS_REPLACE_URL', 'http://traveladvisor.chimpgroup.com/wp-content/uploads/' );
}

/*
 * Theme Backup Directory Path
 */
if ( ! defined( 'AUTO_UPGRADE_BACKUP_DIR' ) ) {
	define( 'AUTO_UPGRADE_BACKUP_DIR', WP_CONTENT_DIR . '/' . THEME_NAME . '-backups/' );
}

if ( ! function_exists( 'get_demo_data_structure' ) ) {
	/**
	 * Return Demo datas available
	 *
	 * @return	array	details of demo datas available
	 */
	function get_demo_data_structure() {
		$demo_data_structure = array(
			'traveladvisor' => array(
				'slug'		=> 'traveladvisor',
				'name'		=> 'TravelAdvisor',
				'image_url'	=> 'http://chimpgroup.com/wp-demo/webservice/demo_images/traveladvisor/traveladvisor.jpg',
			),
		);
		return $demo_data_structure;
	}
}

if ( ! function_exists( 'get_server_requirements' ) ) {
	/**
	 * Return server requirements for importer
	 *
	 * @return	array	server resources requirements for importer
	 */
	function get_server_requirements() {
		$post_max_size							= ini_get( 'post_max_size' );
		$upload_max_filesize					= ini_get( 'upload_max_filesize' );
		$memory_limit							= ini_get( 'memory_limit' );
		$recommended_post_max_size				= 256;
		$recommended_post_max_size_unit			= 'M';
		$recommended_upload_max_filesize		= 256;
		$recommended_upload_max_filesize_unit	= 'M';
		$recommended_memory_limit				= 256;
		$recommended_memory_limit_unit			= 'M';
		$server_requirements = array(
			array(
				'title'			=> 'POST_MAX_SIZE = ' . $recommended_post_max_size . $recommended_post_max_size_unit . ' ( Available ' . $post_max_size . ' )',
				'description'	=> 'Sets max size of post data allowed. This setting also affects file upload.',
				'version'		=> '',
				'is_met'		=> ( $recommended_post_max_size <= $post_max_size ),
			),
			array(
				'title'			=> 'UPLOAD_MAX_FILESIZE = ' . $recommended_upload_max_filesize . $recommended_upload_max_filesize_unit . ' ( Available ' . $upload_max_filesize . ' )',
				'description'	=> 'The maximum size of a file that can be uploaded.',
				'version'		=> '',
				'is_met'		=> ( $recommended_upload_max_filesize <= $upload_max_filesize ),
			),
			array(
				'title'			=> 'MEMORY_LIMIT = ' . $recommended_memory_limit . $recommended_memory_limit_unit . ' ( Available ' . $memory_limit . ' )',
				'description'	=> 'This sets the maximum amount of memory in bytes that a script is allowed to allocate.',
				'version'		=> '',
				'is_met'		=> ( $recommended_memory_limit <= $memory_limit ),
			),
		);
		return $server_requirements;
	}
}

if ( ! function_exists( 'get_plugin_requirements' ) ) {
	/**
	 * Return plugin requirements for importer
	 *
	 * @return	array	plugin requirements for importer
	 */
	function get_plugin_requirements() {
		// Default compatible plugin versions.
		$compatible_plugin_versions = array(
			'traveladvisor_var_framework'	=> TRAVELADVISOR_VAR_FRAMEWORK_STABLE_VERSION,
			'traveladvisor_traveladvisor'	=> TRAVELADVISOR_VAR_STABLE_VERSION,
		);
		// Check if there is a need to prompt user to install theme.
		$is_traveladvisor_var_framework = class_exists( 'wp_traveladvisor_framework' );
		$current_version_traveladvisor_var_framework = '0.0';
		$have_new_version_traveladvisor_var_framework = false;
		if ( $is_traveladvisor_var_framework ) {
			$current_version_traveladvisor_var_framework = wp_traveladvisor_framework::get_plugin_version();
			$new_version_traveladvisor_var_framework = $compatible_plugin_versions['traveladvisor_var_framework'];
			if ( version_compare( $current_version_traveladvisor_var_framework, $new_version_traveladvisor_var_framework ) < 0 ) {
				$is_traveladvisor_framework = false;
				$have_new_version_traveladvisor_var_framework = true;
			}
		}
		// Check if there is a need to prompt user to install theme.
		$is_traveladvisor = class_exists( 'wp_traveladvisor' );
		$current_version_traveladvisor = '0.0';
		$have_new_version_traveladvisor = false;
		if ( $is_traveladvisor ) {
			$current_version_traveladvisor = wp_traveladvisor::get_plugin_version();
			$new_version_traveladvisor = $compatible_plugin_versions['traveladvisor_traveladvisor'];
			if ( version_compare( $current_version_traveladvisor, $new_version_traveladvisor ) < 0 ) {
				$is_traveladvisor = false;
				$have_new_version_traveladvisor = true;
			}
		}
		// Check if there is a need to prompt user to install theme.
		$is_rev_slider = class_exists( 'RevSlider' );
		$have_new_version_rev_slider = false;
		if ( $is_rev_slider ) {
			$current_version_rev_slider = RevSliderGlobals::SLIDER_REVISION;
			$new_version_rev_slider = get_option( 'revslider-latest-version', RevSliderGlobals::SLIDER_REVISION );
			if ( empty( $new_version_rev_slider ) ) {
				$new_version_rev_slider = '5.2.5';
			}

			if ( version_compare( $current_version_rev_slider, $new_version_rev_slider ) < 0 ) {
				$is_rev_slider = false;
				$have_new_version_rev_slider = true;
			}
		}
		$plugin_requirements = array(
			'traveladvisor_var_framework' => array(
				'title'			=> 'CS Travel Advisor Framework',
				'description'	=> 'This plugin is required as this handles the core functionality of the theme.',
				'version'		=> $current_version_traveladvisor_var_framework,
				'new_version'	=> ( true == $have_new_version_traveladvisor_var_framework ) ? $new_version_traveladvisor_var_framework : '',
				'is_installed'	=> $is_traveladvisor_var_framework,
			),
			'traveladviser_var' => array(
				'title'			=> 'Travel Advisor',
				'description'	=> 'This plugin is required as this handles all functionality related to tours, hotels, etc.',
				'version'		=> $current_version_traveladvisor,
				'new_version'	=> ( true == $have_new_version_traveladvisor ) ? $new_version_traveladvisor : '',
				'is_installed'	=> $is_traveladvisor,
			),
			'rev_slider' => array(
				'title'			=> 'Revolution Slider',
				'description'	=> 'This plugin is required to import Revolution sliders from demo data.',
				'version'		=> $current_version_rev_slider,
				'new_version'	=> ( true == $have_new_version_rev_slider ) ? $new_version_rev_slider : '',
				'is_installed'	=> $is_rev_slider,
			),
		);
		return $plugin_requirements;
	}
}

if ( ! function_exists( 'get_mandaory_plugins' ) ) {
	/**
	 * Give a list of the plugins pluings need to be updated (used Auto Theme Upgrader)
	 *
	 * @return	array	a list of plugins which will be updated on Auto Theme update
	 */
	function get_plugins_to_be_updated() {
		return array(
			 array(
                'name' => esc_html__('CS Traveladvisor Framework', 'traveladvisor'),
                'slug' => 'cs-traveladvisor-framework',
                'source' => trailingslashit(get_template_directory()) . 'include/backend/cs-activation-plugins/cs-traveladvisor-framework.zip',
                'required' => true,
                'version' => '1.0',
                'force_activation' => false,
                'force_deactivation' => false,
                'external_url' => '',
            ),
            array(
                'name' => esc_html__('CS Traveladvisor', 'traveladvisor'),
                'slug' => 'cs-traveladvisor',
                'source' => trailingslashit(get_template_directory()) . 'include/backend/cs-activation-plugins/cs-traveladvisor.zip',
                'required' => true,
                'version' => '1.0',
                'force_activation' => false,
                'force_deactivation' => false,
                'external_url' => '',
            ),
		);
	}
}