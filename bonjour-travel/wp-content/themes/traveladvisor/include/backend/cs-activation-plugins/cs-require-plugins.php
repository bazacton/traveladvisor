<?php
/*
 * tgm class for 
 * (internal and WordPress repository) 
 * plugin activation start
 */

traveladvisor_include_file(trailingslashit(get_template_directory()) . 'include/backend/cs-activation-plugins/class-tgm-plugin-activation.php');
if (!function_exists('traveladvisor_var_register_required_plugins')) {
    add_action('tgmpa_register', 'traveladvisor_var_register_required_plugins');

    function traveladvisor_var_register_required_plugins() {

        /*
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */

        $plugins = array(
            /*
             * This is an example of how to include a plugin from the WordPress Plugin Repository.
             */
            array(
                'name' => __('Revolution Slider', 'traveladvisor'),
                'slug' => 'revslider',
                'source' => 'http://chimpgroup.com/wp-demo/download-plugin/revslider.zip',
                'required' => true,
                'version' => '',
                'force_activation' => false,
                'force_deactivation' => false,
                'external_url' => '',
            ),
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
                'name' => __('CS Traveladvisor', 'traveladvisor'),
                'slug' => 'cs-traveladvisor',
                'source' => trailingslashit(get_template_directory()) . 'include/backend/cs-activation-plugins/cs-traveladvisor.zip',
                'required' => true,
                'version' => '1.0',
                'force_activation' => false,
                'force_deactivation' => false,
                'external_url' => '',
            ),
            array(
                'name' => __('Loco translate', 'traveladvisor'),
                'slug' => 'loco-translate',
                'required' => true,
                'version' => '',
                'force_activation' => false,
                'force_deactivation' => false,
                'external_url' => '',
            ),
        );

        /*
         * Change this to your theme text domain, used for internationalising strings
         */
        $theme_text_domain = 'traveladvisor';
        /**
         * Array of configuration settings. Amend each line as needed.
         * If you want the default strings to be available under your own theme domain,
         * leave the strings uncommented.
         * Some of the strings are added into a sprintf, so see the comments at the
         * end of each line for what each argument will be.
         */
        $config = array(
            'domain' => 'traveladvisor', /* Text domain - likely want to be the same as your theme. */
            'default_path' => '', /* Default absolute path to pre-packaged plugins */
            //'parent_menu_slug' => 'themes.php', /* Default parent menu slug */
            //'parent_url_slug' => 'themes.php', /* Default parent URL slug */
			'parent_slug' => 'themes.php', /* Default parent menu slug */
            'menu' => 'install-required-plugins', /* Menu slug */
            'has_notices' => true, /* Show admin notices or not */
            'is_automatic' => true, /* Automatically activate plugins after installation or not */
            'message' => '', /* Message to output right before the plugins table */
            'strings' => array(
                'page_title' => __('Install Required Plugins', 'traveladvisor'),
                'menu_title' => __('Install Plugins', 'traveladvisor'),
                'installing' => __('Installing Plugin: %s', 'traveladvisor'), /* %1$s = plugin name */
                'oops' => __('Something went wrong with the plugin API.', 'traveladvisor'),
                'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'traveladvisor'), /* %1$s = plugin name(s) */
                'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'traveladvisor'), /* %1$s = plugin name(s) */
                'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'traveladvisor'), /* %1$s = plugin name(s) */
                'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'traveladvisor'), /* %1$s = plugin name(s) */
                'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'traveladvisor'), /* %1$s = plugin name(s) */
                'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'traveladvisor'), /* %1$s = plugin name(s) */
                'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'traveladvisor'), /* %1$s = plugin name(s) */
                'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'traveladvisor'), /* %1$s = plugin name(s) */
                'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins', 'traveladvisor'),
                'activate_link' => _n_noop('Activate installed plugin', 'Activate installed plugins', 'traveladvisor'),
                'return' => __('Return to Required Plugins Installer', 'traveladvisor'),
                'plugin_activated' => __('Plugin activated successfully.', 'traveladvisor'),
                'complete' => __('All plugins installed and activated successfully. %s', 'traveladvisor'), /* %1$s = dashboard link */
                'nag_type' => 'updated' /* Determines admin notice type - can only be 'updated' or 'error' */
            )
        );
        tgmpa($plugins, $config);
    }
}