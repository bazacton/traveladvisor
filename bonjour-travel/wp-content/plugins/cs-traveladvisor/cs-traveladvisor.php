<?php

/*
  Plugin Name: CS traveladvisor
  Plugin URI: http://themeforest.net/user/Chimpstudio/
  Description: CS traveladvisor.
  Version: 1.2
  Author: ChimpStudio
  Author URI: http://themeforest.net/user/Chimpstudio/
  Requires at least: 4.1
  Tested up to: 5.2
  Text Domain: cs-traveladvisor
  Domain Path: /languages/

  Copyright: 2015 chimpgroup (email : info@chimpstudio.co.uk)
  License: GNU General Public License v3.0
  License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
if (!class_exists('wp_traveladvisor')) :

    class wp_traveladvisor {

        protected static $_instance = null;

        /**
         * Main Plugin Instance
         *
         */
        public static function instance() {
            if (is_null(self::$_instance)) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        /**
         * Initiate Plugin Actions
         *
         */
        public function __construct() {
            add_action('init', array($this, 'load_plugin_text_domain'), 0);
            add_filter('send_mails_theme', array($this, 'send_mails_theme_callback'), 30, 5);
            $this->plugin_actions();
            $this->includes();
        }

        /**
         * Initiate Plugin 
         * Text Domain
         * @return
         */
        public function load_plugin_textdomain() {
            $locale = apply_filters('plugin_locale', get_locale(), 'cs-traveladvisor');

            load_textdomain('cs-traveladvisor', WP_LANG_DIR . '/cs-traveladvisor/cs-traveladvisor-' . $locale . '.mo');
            load_plugin_textdomain('cs-traveladvisor', false, plugin_basename(dirname(__FILE__)) . "/languages");
        }

        public function send_mails_theme_callback($to = '', $subject = '', $message = '', $headers = '', $attachment = '') {
            $sent = wp_mail($to, $subject, strip_tags($message), $headers, $attachment);
            return $sent;
        }

        /**
         * Start Function how to Add textdomain for translation
         */
        public function load_plugin_text_domain() {
            global $traveladvisor_plugin_options;

            if (function_exists('icl_object_id')) {

                global $sitepress, $wp_filesystem;

                require_once ABSPATH . '/wp-admin/includes/file.php';

                $backup_url = '';

                if (false === ($creds = request_filesystem_credentials($backup_url, '', false, false, array()) )) {

                    return true;
                }

                if (!WP_Filesystem($creds)) {
                    request_filesystem_credentials($backup_url, '', true, false, array());
                    return true;
                }

                $traveladvisor_languages_dir = plugin_dir_path(__FILE__) . 'languages/';

                $traveladvisor_all_langs = $wp_filesystem->dirlist($traveladvisor_languages_dir);

                $traveladvisor_mo_files = array();
                if (is_array($traveladvisor_all_langs) && sizeof($traveladvisor_all_langs) > 0) {

                    foreach ($traveladvisor_all_langs as $file_key => $file_val) {

                        if (isset($file_val['name'])) {

                            $traveladvisor_file_name = $file_val['name'];

                            $traveladvisor_ext = pathinfo($traveladvisor_file_name, PATHINFO_EXTENSION);

                            if ($traveladvisor_ext == 'mo') {
                                $traveladvisor_mo_files[] = $traveladvisor_file_name;
                            }
                        }
                    }
                }

                $traveladvisor_active_langs = $sitepress->get_current_language();

                foreach ($traveladvisor_mo_files as $mo_file) {
                    if (strpos($mo_file, $traveladvisor_active_langs) !== false) {
                        $traveladvisor_lang_mo_file = $mo_file;
                    }
                }
            }

            $locale = apply_filters('plugin_locale', get_locale(), 'traveladvisor-plugin');
            $dir = trailingslashit(WP_LANG_DIR);
            if (isset($traveladvisor_lang_mo_file) && $traveladvisor_lang_mo_file != '') {
                load_textdomain('traveladvisor-plugin', plugin_dir_path(__FILE__) . "languages/" . $traveladvisor_lang_mo_file);
            } else {
                load_textdomain('traveladvisor-plugin', plugin_dir_path(__FILE__) . "languages/cs-traveladvisor-" . $locale . '.mo');
            }
        }

        /**
         * What type of request is this?
         * string $type ajax, frontend or admin
         * @return bool
         */
        public function is_request($type) {
            switch ($type) {
                case 'admin' :
                    return is_admin();
                case 'ajax' :
                    return defined('DOING_AJAX');
                case 'cron' :
                    return defined('DOING_CRON');
                case 'frontend' :
                    return (!is_admin() || defined('DOING_AJAX') ) && !defined('DOING_CRON');
            }
        }

        /**
         * Include required core files 
         * used in admin and on the frontend.
         */
        public function includes() {
            require_once 'includes/cs-global-functions.php';
            require_once 'assets/translate/cs-strings.php';
            require_once 'includes/cs-core-functions.php';
            require_once 'templates/functions.php';
            //  require_once 'includes/cs-traveladvisor-mailchimp/cs-traveladvisor-mailchimp.class.php';
            //  require_once 'includes/cs-traveladvisor-mailchimp/cs-traveladvisor-mailchimp_functions.php';

            if ($this->is_request('admin')) {
                require_once 'backend/custom-fields/cs-form-fields.php';
                require_once 'backend/custom-fields/cs-html-fields.php';
            }

            // destination
            require_once 'backend/post-types/cs-destination.php';
            require_once 'backend/meta-boxes/cs-destination-meta.php';
            // gallery
            require_once 'backend/post-types/cs-gallery.php';
            require_once 'backend/meta-boxes/cs-gallery-meta.php';
            // tours
            require_once 'backend/post-types/cs-tours.php';
            require_once 'backend/meta-boxes/cs-tours-meta.php';

//            require_once 'includes/cs-widgets/cs-services.php';
//
//            // practice
//            require_once 'backend/post-types/cs-practice.php';
//            require_once 'backend/meta-boxes/cs-practice-meta.php';
//            //require_once 'includes/cs-widgets/cs-practice.php';
//
//
//            // Pricing Plans element and functions
//            require_once 'backend/post-types/cs-pricing-plans.php';
//            require_once 'backend/meta-boxes/cs-pricing-plan-meta.php';
//
//            //term meta-boxes/
//            require_once 'backend/meta-boxes/cs-pricing-plan-meta.php';
//
//            // stylists
//            require_once 'backend/post-types/cs-stylist.php';
//            require_once 'backend/meta-boxes/cs-stylist-meta.php';
//
//            // galleries
//            require_once 'backend/post-types/cs-gallery.php';
//            require_once 'backend/meta-boxes/cs-gallery-meta.php';
//
//            // event
//            require_once 'backend/post-types/cs-event.php';
//            require_once 'backend/meta-boxes/cs-event-meta.php';
//
//            // event
//            require_once 'backend/post-types/cs-shataka.php';
//            require_once 'backend/meta-boxes/cs-shataka-meta.php';
//
//            // traveladvisor
//            require_once 'backend/post-types/cs-traveladvisor.php';
//            require_once 'backend/meta-boxes/cs-traveladvisor-meta.php';
//
//
            // destination element and Function
            require_once('backend/shortcodes/destination/cs-element.php');
            require_once('frontend/shortcodes/destination/cs-functions.php');
            //tours shortcode
            require_once('backend/shortcodes/tours/cs-element.php');
            require_once('frontend/shortcodes/tours/cs-functions.php');
//            // practice element and Function
//            require_once('backend/shortcodes/practice/cs-element.php');
//            require_once('frontend/shortcodes/practice/cs-functions.php');
//
//            // Price services element and Function
//            require_once('backend/shortcodes/price-services/cs-element.php');
//            require_once('frontend/shortcodes/price-services/cs-functions.php');
//
//            // styles element and functions
//            require_once('backend/shortcodes/stylist/cs-element.php');
//            require_once('frontend/shortcodes/stylist/cs-functions.php');
//
            //gallery element and functions 
            require_once('backend/shortcodes/gallery/cs-element.php');
            require_once('frontend/shortcodes/gallery/cs-functions.php');

//            //gallery element and functions 
//            require_once('backend/shortcodes/event/cs-element.php');
//            require_once('frontend/shortcodes/event/cs-functions.php');
//
//            //traveladvisor element and functions 
//            
//            require_once('backend/shortcodes/traveladvisor/cs-element.php');
//            require_once('frontend/shortcodes/traveladvisor/cs-functions.php');
//
            //Terms Meat
            // require_once 'backend/meta-boxes/cs-term-meta.php';
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
         * Set plugin actions.
         * @return
         */
        public function plugin_actions() {

            add_action('init', array($this, 'load_plugin_textdomain'), 0);
            add_action('admin_enqueue_scripts', array($this, 'admin_plugin_files_enqueue'), 1);
            add_action('wp_enqueue_scripts', array($this, 'front_plugin_files_enqueue'), 2);
            add_filter('template_include', array(&$this, 'traveladvisor_var_single_template'), 4);
            add_filter('wp_enqueue_scripts', array(&$this, 'front_plugin_responsive_files_enqueue'), 5);
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
         * Get the plugin template path.
         * @return string
         */
        public function template_path() {
            return apply_filters('traveladvisor_plugin_template_path', 'cs-traveladvisor/');
        }

        /**
         * Isotope enqueue File.
         * @return string
         */
        public function traveladvisor_isotope_enqueue() {

            wp_enqueue_script('traveladvisor-traveladvisor-isotope-script', plugins_url('/assets/frontend/js/isotope.min.js', __FILE__), '', '', true);
        }

        /**
         * lightbox enqueue File.
         * @return string
         */
        public function traveladvisor_lightbox_enqueue() {

            wp_enqueue_style('traveladvisor-prettyPhoto-style', plugins_url('/assets/frontend/css/prettyPhoto.css', __FILE__));
            wp_enqueue_script('traveladvisor-lightbox-script', plugins_url('/assets/frontend/js/lightbox.js', __FILE__), '', '', true);
            wp_enqueue_script('traveladvisor-prettyPhoto-script', plugins_url('/assets/frontend/js/prettyPhoto.js', __FILE__), '', '', true);
        }

        /**
         * glisse enqueue File.
         * @return string
         */
        public function traveladvisor_glisse_enqueue() {

            wp_enqueue_script('traveladvisor-glisse-script', plugins_url('/assets/frontend/js/glisse.js', __FILE__), '', '', true);
        }

        /**
         * Masonry enqueue File.
         * @return string
         */
        public static function traveladvisor_masonry_enqueue() {
            wp_enqueue_script('traveladvisor-modernizr-script', plugins_url('/assets/frontend/js/modernizr.js', __FILE__), '', '', true);
            wp_enqueue_script('traveladvisor-masonery-script', plugins_url('/assets/frontend/js/masonry.pkgd.min.js', __FILE__), '', '', true);
            wp_enqueue_script('traveladvisor-AnimOnScroll-script', plugins_url('/assets/frontend/js/AnimOnScroll.js', __FILE__), '', '', true);
        }

        /**
         * Start Function for single pages
         */
        public function traveladvisor_var_single_template($single_template) {
            global $post;

            if (get_post_type() == 'destination') {
                if (is_single()) {
                    $single_template = plugin_dir_path(__FILE__) . 'templates/single-pages/single-destination.php';
                }
            } elseif (get_post_type() == 'tours') {
                if (is_single()) {

                    add_filter('body_class', 'sp_body_class');

                    function sp_body_class($classes) {

                        $classes[] = 'single-trip';
                        return $classes;
                    }

                    $single_template = plugin_dir_path(__FILE__) . 'templates/single-pages/single-tours.php';
                }
            }
            return $single_template;
        }

        /**
         * Default plugin 
         * admin files enqueue.
         * @return
         */
        public function admin_plugin_files_enqueue() {

            if ($this->is_request('admin')) {
                // admin css files
                wp_enqueue_style('traveladvisor-fonticonpicker-style', plugins_url('/assets/common/icomoon/css/jquery.fonticonpicker.min.css', __FILE__));
                wp_enqueue_style('traveladvisor-iconmoon-style', plugins_url('/assets/common/icomoon/css/iconmoon.css', __FILE__));
                wp_enqueue_style('traveladvisor-fonticonpicker-bootstrap-style', plugins_url('/assets/common/icomoon/theme/bootstrap-theme/jquery.fonticonpicker.bootstrap.css', __FILE__));
                wp_enqueue_style('traveladvisor-chosen', plugins_url('/assets/backend/css/chosen.css', __FILE__));
                wp_enqueue_style('traveladvisor-traveladvisor-styles-style', plugins_url('/assets/backend/css/admin-style.css', __FILE__));

                // js scripts enqueue
                $traveladvisor_var_template_path = plugins_url('/assets/backend/js/cs-functions.js', __FILE__);
                wp_enqueue_script('traveladvisor-admin-upload-script', $traveladvisor_var_template_path, array('jquery', 'media-upload', 'thickbox', 'jquery-ui-droppable', 'jquery-ui-datepicker', 'jquery-ui-slider', 'wp-color-picker'));
                wp_enqueue_script('traveladvisor-traveladvisor-uploads-script', '', array('jquery', 'media-upload', 'thickbox', 'jquery-ui-droppable', 'jquery-ui-datepicker', 'jquery-ui-slider', 'wp-color-picker'));
                wp_enqueue_script('traveladvisor-fonticonpicker-script', plugins_url('/assets/common/icomoon/js/jquery.fonticonpicker.min.js', __FILE__));
                wp_enqueue_script('traveladvisor-chosen', plugins_url('/assets/backend/js/chosen.select.js', __FILE__), '', '', true);

                //wp_enqueue_script('traveladvisor-tours-maps', plugins_url('/assets/frontend/js/tours-maps.js', __FILE__), '', '', true);
                wp_enqueue_script('traveladvisor-bootstrap-datepicker', plugins_url('/assets/frontend/js/bootstrap-datepicker.js', __FILE__), '', '', true);

                wp_enqueue_style('traveladvisor-bootstrap-style', plugins_url('/assets/backend/css/bootstrap.css', __FILE__));
            }
        }

        /**
         * Default plugin 
         * front files enqueue.
         * @return
         */
        //responsive enque
        public function front_plugin_responsive_files_enqueue() {

            if ($this->is_request('frontend')) {
                // css files enqueue
                wp_enqueue_style('traveladvisor-responsive-style', plugins_url('/assets/frontend/css/responsive.css', __FILE__));
            }
        }

        public function front_plugin_files_enqueue() {

            if ($this->is_request('frontend')) {
                // css files enqueue



                wp_enqueue_style('traveladvisor-iconmoon-style', plugins_url('/assets/common/icomoon/css/iconmoon.css', __FILE__));
                wp_enqueue_style('traveladvisor-component', plugins_url('/assets/frontend/css/component-gallery.css', __FILE__));
                wp_enqueue_style('traveladvisor-plugin-css', plugins_url('/assets/frontend/css/cs-traveladvisor-plugin.css', __FILE__));
                wp_enqueue_style('traveladvisor-datepicker-css', plugins_url('/assets/frontend/css/bootstrap-datetimepicker.min.css', __FILE__));
//                wp_enqueue_style('traveladvisor-color-css', plugins_url('/assets/frontend/css/color.css', __FILE__));
                wp_enqueue_style('traveladvisor-chosen-css', plugins_url('/assets/frontend/css/chosen.css', __FILE__));
                wp_enqueue_style('traveladvisor-datetimepicker-css', plugins_url('/assets/frontend/css/jquery-datetimepicker.css', __FILE__));


                // js scripts enqueue
                wp_enqueue_script('bootstrap.min', plugins_url('/assets/frontend/js/bootstrap.min.js', __FILE__), array('jquery'));
                wp_enqueue_script('traveladvisor-function-script', plugins_url('/assets/frontend/js/functions.js', __FILE__), '', '', true);
                wp_enqueue_script('traveladvisor-datetimepicker-script', plugins_url('/assets/frontend/js/jquery-datetimepicker.js', __FILE__), '', '', true);
                wp_enqueue_script('traveladvisor-jquery.cookie', plugins_url('/assets/frontend/js/jquery.cookie.js', __FILE__), '', '', true);

                if (is_single() && get_post_type() == 'destination') {
                    wp_enqueue_script('traveladvisor-slick-script', plugins_url('/assets/frontend/js/slick.js', __FILE__));
                }
                if (is_single() && get_post_type() == 'tours') {
                    wp_enqueue_script('traveladvisor-masonry-script', plugins_url('/assets/frontend/js/masonry.js', __FILE__));
                    wp_enqueue_script('traveladvisor-datepicker-script', plugins_url('/assets/frontend/js/bootstrap-datepicker.js', __FILE__));
                    wp_enqueue_script('traveladvisor-main-slider', plugins_url('/assets/frontend/js/main-slider.js', __FILE__));
                }
                wp_enqueue_style('traveladvisor-prettyPhoto-style', plugins_url('/assets/frontend/css/prettyPhoto.css', __FILE__));
                wp_enqueue_script('traveladvisor-lightbox-script', plugins_url('/assets/frontend/js/lightbox.js', __FILE__), '', '', true);
                wp_enqueue_script('traveladvisor-prettyPhoto-script', plugins_url('/assets/frontend/js/prettyPhoto.js', __FILE__), '', '', true);
            }
        }

    }

    function wp_traveladvisor_var_traveladvisor() {
        return wp_traveladvisor::instance();
    }

    // Global for backwards compatibility.
    $GLOBALS['wp_traveladvisor'] = wp_traveladvisor_var_traveladvisor();

endif;