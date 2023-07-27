<?php

require_once trailingslashit(get_template_directory()) . 'assets/translate/cs-strings.php';
require_once trailingslashit(get_template_directory()) . 'include/cs-global-functions.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-global-variables.php';
include(get_template_directory() . '/include/cs-theme-functions.php');


$var_arrays = array('traveladvisor_var_static_text');
$search_global_vars = TRAVELADVISOR_VAR_GLOBALS()->globalizing($var_arrays);
extract($search_global_vars);
$traveladvisor_var_options = TRAVELADVISOR_VAR_GLOBALS()->theme_options();

$strings = new traveladvisor_theme_all_strings;
$strings->traveladvisor_short_code_strings();

if (!function_exists('traveladvisor_custom_body_class')) {
    add_filter('body_class', 'traveladvisor_custom_body_class');

    function traveladvisor_custom_body_class($classes) {
        global $traveladvisor_var_options;
        if (isset($traveladvisor_var_options['traveladvisor_var_responsive']) && $traveladvisor_var_options['traveladvisor_var_responsive'] == "on") {
            $classes[] = 'cbp-spmenu-push wp-traveladvisor';
        } else {
            $classes[] = 'wp-traveladvisor non-responsive';
        }

        return $classes;
    }

}

if (!function_exists('traveladvisor_var_counter')) {

    function traveladvisor_var_counter() {
        wp_enqueue_script('traveladvisor-counter-script', trailingslashit(get_template_directory_uri()) . 'assets/frontend/scripts/counter.js', '', '', true);
        wp_enqueue_script('traveladvisor-counter-script', trailingslashit(get_template_directory_uri()) . 'assets/frontend/scripts/jquery.countdown.js', '', '', true);
    }

}

if (!function_exists('traveladvisor_server_protocol')) {

    function traveladvisor_server_protocol() {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
            return 'https://';
        }
        return 'http://';
    }

}

if (!function_exists('traveladvisor_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * Create your own traveladvisor_setup() function to override in a child theme.
     *
     * @since Traveladvisor
     */
    if (!function_exists('traveladvisor_setup')) {

        function traveladvisor_setup() {
            define('CSDOMAIN', 'traveladvisor');
            $var_arrays = array('traveladvisor_var_static_text');
            $search_global_vars = TRAVELADVISOR_VAR_GLOBALS()->globalizing($var_arrays);
            extract($search_global_vars);
            $traveladvisor_var_options = TRAVELADVISOR_VAR_GLOBALS()->theme_options();

            $strings = new traveladvisor_theme_all_strings;
            $strings->traveladvisor_short_code_strings();
            /*
             * Make theme available for translation.
             * Translations can be filed in the /languages/ directory.
             * If you're building a theme based on Traveladvisor, use a find and replace
             * to change 'traveladvisor' to the name of your theme in all the template files
             */
            load_theme_textdomain('traveladvisor', get_template_directory() . '/languages');
            // Add default posts and comments RSS feed links to head.
            add_theme_support('automatic-feed-links');
            /*
             * Let WordPress manage the document title.
             * By adding theme support, we declare that this theme does not use a
             * hard-coded <title> tag in the document head, and expect WordPress to
             * provide it for us.
             */
            add_theme_support('title-tag');
            /*
             * Enable support for Post Thumbnails on posts and pages.
             *
             * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
             */

            add_theme_support('post-thumbnails');

            if (!isset($content_width)) {
                $content_width = 980;
            }
            register_nav_menus(array(
                'primary-menu' => traveladvisor_var_theme_text_srt('traveladvisor_var_main_menu'),
                'footer-menu-1' => traveladvisor_var_theme_text_srt('traveladvisor_var_footer_menu_1'),
                'footer-menu-2' => traveladvisor_var_theme_text_srt('traveladvisor_var_footer_menu_2'),
            ));
            /*
             * Switch default core markup for search form, comment form, and comments
             * to output valid HTML5.
             */
            add_theme_support('html5', array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ));
            add_theme_support('custom-header', apply_filters('traveladvisor_custom_header_args', array(
                'default-text-color' => 'fff',
                'width' => 1260,
                'height' => 240,
                'flex-height' => true,
            )));
            add_theme_support('custom-background', apply_filters('traveladvisor_custom_background_args', array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )));
            /*
             * This theme styles the visual editor to resemble the theme style,
             * specifically font, colors, icons, and column width.
             */
            add_editor_style(array('assets/backend/css/editor-style.css', get_template_directory_uri()));
            add_filter('the_password_form', 'traveladvisor_password_form');
        }

    }
endif; // traveladvisor_setup
add_action('after_setup_theme', 'traveladvisor_setup');
require_once ABSPATH . '/wp-admin/includes/file.php';
/*
 * Include files function
 */
if (!function_exists('traveladvisor_include_file')) {

    function traveladvisor_include_file($file_path = '', $inc = false) {
        if ($file_path != '') {
            if ($inc == true) {
                include $file_path;
            } else {
                require_once $file_path;
            }
        }
    }

}
/**
 * returns string after striping slashes 
 *
 * @since Traveladvisor
 */
if (!function_exists('traveladvisor_var_stripslashes_htmlspecialchars')) {

    function traveladvisor_var_stripslashes_htmlspecialchars($value) {
        $value = is_array($value) ? array_map('traveladvisor_var_stripslashes_htmlspecialchars', $value) : stripslashes(htmlspecialchars($value));
        return $value;
    }

}

/*
 * Add extra CSS styles to a registered stylesheet
 */

if (!function_exists('traveladvisor_var_inline_styles_method')) {

    function traveladvisor_var_inline_styles_method($inline_style_script = '') {
        global $traveladvisor_var_global_custom_css;
        wp_enqueue_style('traveladvisor-custom-style-inline-style', get_template_directory_uri() . '/assets/frontend/css/custom-style.css', '', '', true);
        $custom_css = $traveladvisor_var_global_custom_css;
        if ($inline_style_script != '') {
            $custom_css = $inline_style_script;
        }
        wp_add_inline_style('traveladvisor-custom-style-inline-style', $custom_css);
    }

}


/*
 * 
 * 
 */
if (!function_exists('write_stylesheet_content')) {

    function write_stylesheet_content() {
        global $wp_filesystem, $traveladvisor_var_options;
        require_once get_template_directory() . '/include/frontend/cs-theme-styles.php';
        $traveladvisor_export_options = traveladvisor_var_custom_style_theme_options();
        // remove comment from complete file
        $fileStr = $traveladvisor_export_options;
        $regex = array(
            "`^([\t\s]+)`ism" => '',
            "`^\/\*(.+?)\*\/`ism" => "",
            "`([\n\A;]+)\/\*(.+?)\*\/`ism" => "$1",
            "`([\n\A;\s]+)//(.+?)[\n\r]`ism" => "$1\n",
            "`(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+`ism" => "\n"
        );
        $newStr = preg_replace(array_keys($regex), $regex, $fileStr);
        $traveladvisor_option_fields = $newStr;
        $backup_url = wp_nonce_url('themes.php?page=traveladvisor_var_settings_page');
        if (false === ($creds = request_filesystem_credentials($backup_url, '', false, false, array()) )) {
            return true;
        }
        if (!WP_Filesystem($creds)) {
            request_filesystem_credentials($backup_url, '', true, false, array());
            return true;
        }
        $traveladvisor_upload_dir = get_template_directory() . '/assets/frontend/css/';
        $traveladvisor_filename = trailingslashit($traveladvisor_upload_dir) . 'default-element.css';
        if (!$wp_filesystem->put_contents($traveladvisor_filename, $traveladvisor_option_fields, FS_CHMOD_FILE)) {
            
        }
    }

}
/*
 * returns the path to the image.
 * 
 */
if (!function_exists('traveladvisor_attachment_image_src')) {

    function traveladvisor_attachment_image_src($attachment_id, $width, $height) {
        $image_url = wp_get_attachment_image_src($attachment_id, array($width, $height), true);
        if ($image_url[1] == $width and $image_url[2] == $height) {
            
        } else {
            $image_url = wp_get_attachment_image_src($attachment_id, "full", true);
        }
        $parts = explode('/uploads/', $image_url[0]);
        if (count($parts) > 1) {
            return $image_url[0];
        }
    }

}
/**
 * requiring files
 *
 * @since Traveladvisor
 */
if (!function_exists('traveladvisor_require_theme_files')) {

    function traveladvisor_require_theme_files($traveladvisor_path = '') {
        global $wp_filesystem;
        $backup_url = '';
        if (false === ($creds = request_filesystem_credentials($backup_url, '', false, false, array()) )) {
            return true;
        }
        if (!WP_Filesystem($creds)) {
            request_filesystem_credentials($backup_url, '', true, false, array());
            return true;
        }
        $traveladvisor_sh_front_dir = trailingslashit(get_template_directory()) . $traveladvisor_path;
        $traveladvisor_all_f_list = $wp_filesystem->dirlist($traveladvisor_sh_front_dir);
        if (is_array($traveladvisor_all_f_list) && sizeof($traveladvisor_all_f_list) > 0) {
            foreach ($traveladvisor_all_f_list as $file_key => $file_val) {
                if (isset($file_val['name'])) {
                    $traveladvisor_file_name = $file_val['name'];
                    $traveladvisor_ext = pathinfo($traveladvisor_file_name, PATHINFO_EXTENSION);
                    if ($traveladvisor_ext == 'php') {
                        require_once trailingslashit(get_template_directory()) . $traveladvisor_path . $traveladvisor_file_name;
                    }
                }
            }
        }
    }

}
/**
 * Theme necessary
 * Files require.
 *
 * @since Traveladvisor
 */
require_once trailingslashit(get_template_directory()) . 'include/backend/theme-config.php';
require_once trailingslashit(TRAVELADVISOR_BASE) . 'include/backend/importer-hooks.php';
require_once trailingslashit(get_template_directory()) . 'include/cs-core-functions.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-activation-plugins/cs-require-plugins.php';
require_once trailingslashit(get_template_directory()) . 'include/cs-class-parse.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-custom-fields/cs-form-fields.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-custom-fields/cs-html-fields.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-admin-functions.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-googlefont/cs-fonts-array.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-googlefont/cs-fonts.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-googlefont/cs-fonts-functions.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/import/cs-class-widget-data.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-flickr.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-mailchimp.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-recent-posts.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-about-us.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-text.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-categories.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-search.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-weather-widget.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-fancy-menu.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-destination-deals.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-facebook.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-widgets/cs-custom-menu-widget.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-theme-options/cs-theme-options.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-theme-options/cs-theme-options-functions.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-theme-options/cs-theme-options-fields.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-theme-options/cs-theme-options-arrays.php';
require_once trailingslashit(get_template_directory()) . 'include/frontend/cs-header.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-shortcodes/cs-map.php';
require_once trailingslashit(get_template_directory()) . 'include/frontend/cs-shortcodes/cs-map.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-custom-fields/cs-custom-fields.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-custom-fields/cs-custom-functions.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-custom-fields/cs-form-fields-extended.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-custom-fields/cs-html-fields-extended.php';
require_once trailingslashit(get_template_directory()) . 'include/backend/cs-custom-fields/class-save-post-options.php';
if (class_exists('woocommerce')) {
    require_once trailingslashit(get_template_directory()) . 'include/backend/cs-woocommerce/cs-config.php';
}
// shortcodes files
traveladvisor_require_theme_files('include/backend/cs-shortcodes/');
traveladvisor_require_theme_files('include/frontend/cs-shortcodes/');
/* Add custom filters. */
add_filter('widget_text', 'do_shortcode');
/**
 * Theme Options.
 *
 * @return Options Menu
 */
if (!function_exists('traveladvisor_var_options')) {
    add_action('admin_menu', 'traveladvisor_var_options');

    function traveladvisor_var_options() {
        global $traveladvisor_var_static_text;
        $strings = new traveladvisor_theme_all_strings;
        $strings->traveladvisor_short_code_strings();
        if (current_user_can('administrator')) {
            add_theme_page(traveladvisor_var_theme_text_srt('traveladvisor_var_traveladvisor_theme_options'), traveladvisor_var_theme_text_srt('traveladvisor_var_traveladvisor_theme_options'), 'read', 'traveladvisor_var_settings_page', 'traveladvisor_var_settings_page');
        }
    }

}

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Traveladvisor
 */
if (!function_exists('traveladvisor_widgets_init')) {

    function traveladvisor_widgets_init() {

        global $traveladvisor_var_options, $traveladvisor_var_static_text;
        $strings = new traveladvisor_theme_all_strings;
        $strings->traveladvisor_short_code_strings();
        // if theme activated
        if (get_option('traveladvisor_var_options')) {
            if (isset($traveladvisor_var_options['traveladvisor_var_sidebar']) && !empty($traveladvisor_var_options['traveladvisor_var_sidebar'])) {
                foreach ($traveladvisor_var_options['traveladvisor_var_sidebar'] as $sidebar) {
                    $sidebar_id = sanitize_title($sidebar);
                    $traveladvisor_widget_start = '<div class="widget %2$s">';
                    $traveladvisor_widget_end = '</div>';
                    if (isset($traveladvisor_var_options['traveladvisor_var_footer_widget_sidebar']) && $traveladvisor_var_options['traveladvisor_var_footer_widget_sidebar'] == $sidebar) {
                        $traveladvisor_widget_start = '<aside class="widget col-lg-4 col-md-4 col-sm-6 col-xs-12 %2$s">';
                        $traveladvisor_widget_end = '</aside>';
                    }
                    if (isset($traveladvisor_var_options['traveladvisor_var_autosidebar_select']) && strtolower($traveladvisor_var_options['traveladvisor_var_autosidebar_select']) == strtolower($sidebar_id)) {
                        $traveladvisor_widget_start = '<div class="widget %2$s">';
                        $traveladvisor_widget_end = '</div>';
                    }
                    register_sidebar(array(
                        'name' => $sidebar,
                        'id' => $sidebar_id,
                        'description' => traveladvisor_var_theme_text_srt('traveladvisor_var_this_widget_will_be_displayed_on_right/left_side_of_page'),
                        'before_widget' => $traveladvisor_widget_start,
                        'after_widget' => $traveladvisor_widget_end,
                        'before_title' => '<div class="widget-title"><h5>',
                        'after_title' => '</h5></div>'
                    ));
                }
            }
            $sidebar_name = '';
            if (isset($traveladvisor_var_options['traveladvisor_var_footer_sidebar']) && !empty($traveladvisor_var_options['traveladvisor_var_footer_sidebar'])) {
                $i = 0;
                foreach ($traveladvisor_var_options['traveladvisor_var_footer_sidebar'] as $traveladvisor_var_footer_sidebar) {
                    $footer_sidebar_id = sanitize_title($traveladvisor_var_footer_sidebar);
                    $sidebar_name = isset($traveladvisor_var_options['traveladvisor_var_footer_width']) ? $traveladvisor_var_options['traveladvisor_var_footer_width'] : '';
                    $traveladvisor_sidebar_name = isset($sidebar_name[$i]) ? $sidebar_name[$i] : '';
                    $custom_width = str_replace('(', ' - ', $traveladvisor_sidebar_name);
                    $traveladvisor_widget_start = '<div class="widget %2$s">';
                    $traveladvisor_widget_end = '</div>';
                    if (isset($traveladvisor_var_options['traveladvisor_var_footer_widget_sidebar']) && $traveladvisor_var_options['traveladvisor_var_footer_widget_sidebar'] == $traveladvisor_var_footer_sidebar) {

                        $traveladvisor_widget_start = '<aside class="widget col-lg-4 col-md-4 col-sm-6 col-xs-12 %2$s">';
                        $traveladvisor_widget_end = '</aside>';
                    }
                    register_sidebar(array(
                        'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_footer') . $traveladvisor_var_footer_sidebar . ' ' . '(' . $custom_width . ' ',
                        'id' => $footer_sidebar_id,
                        'description' => traveladvisor_var_theme_text_srt('traveladvisor_var_this_widget_will_be_displayed_on_right/left_side_of_page'),
                        'before_widget' => $traveladvisor_widget_start,
                        'after_widget' => $traveladvisor_widget_end,
                        'before_title' => '<div class="widget-title"><h5>',
                        'after_title' => '</h5></div>'
                    ));
                    $i ++;
                }
            }
        } else {
            register_sidebar(array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_widgets'),
                'id' => 'sidebar-1',
                'description' => traveladvisor_var_theme_text_srt('traveladvisor_var_this_widget_will_be_displayed_on_right/left_side_of_page'),
                'before_widget' => '<div class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<div class="widget-title"><h5>',
                'after_title' => '</h5></div>'
            ));
        }
    }

}
add_action('widgets_init', 'traveladvisor_widgets_init');
/**
 * Default Pages title.
 *
 * @since Traveladvisor
 */
if (!function_exists('traveladvisor_post_page_title')) {

    function traveladvisor_post_page_title() {
        global $traveladvisor_var_static_text;
        $strings = new traveladvisor_theme_all_strings;
        $strings->traveladvisor_short_code_strings();
        if (!is_page() && !is_search() && !is_404() && !is_front_page()) {
            if (function_exists('is_shop') && !is_shop()) {
                the_archive_title();
            } else {
                the_archive_title();
            }
        } else if (is_search()) {
            printf(traveladvisor_var_theme_text_srt('traveladvisor_var_search_results'), '<span>' . get_search_query() . '</span>');
        } else if (is_404()) {
            echo traveladvisor_var_theme_text_srt('traveladvisor_var_error_404');
        } else if (is_front_page()) {
            echo traveladvisor_var_theme_text_srt('traveladvisor_var_home');
        } else if (function_exists('is_shop') && is_shop()) {
            $traveladvisor_var_post_ID = wc_get_page_id('shop');
            echo get_the_title($traveladvisor_var_post_ID);
        } else if (!is_page()) {
            echo get_the_title(get_the_id());
        } else {
            echo get_the_title(get_the_id());
        }
    }

}

/**
 * Enqueues scripts and styles.
 *
 * @since Traveladvisor
 */
if (!function_exists('traveladvisor_var_scripts')) {

    function traveladvisor_var_scripts() {
        // custom styles
        global $traveladvisor_var_options;
        wp_enqueue_style('iconmoon', trailingslashit(get_template_directory_uri()) . 'assets/common/icomoon/css/iconmoon.css');
        wp_enqueue_style('bootstrap', trailingslashit(get_template_directory_uri()) . 'assets/frontend/css/bootstrap.css');
        wp_enqueue_style('bootstrap-datetimepicker.min', trailingslashit(get_template_directory_uri()) . 'assets/frontend/css/bootstrap-datetimepicker.min.css');
        wp_enqueue_style('bootstrap-slider', trailingslashit(get_template_directory_uri()) . 'assets/frontend/css/bootstrap-slider.css');
        wp_enqueue_style('bootstrap-theme-style', trailingslashit(get_template_directory_uri()) . 'assets/frontend/css/bootstrap-theme.css');
        wp_enqueue_style('traveladvisor-mobile-menu-style', trailingslashit(get_template_directory_uri()) . 'assets/frontend/css/jquery.mobile-menu.css');
        wp_enqueue_style('traveladvisor_admin_google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600&subset=latin,cyrillic-ext');
        wp_enqueue_style('traveladvisor_poppins_google_fonts', 'https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,300');
        wp_enqueue_style('traveladvisor_raleway_google_fonts', 'https://fonts.googleapis.com/css?family=Raleway:400,500,600,300,700');
        wp_enqueue_style('chosen', trailingslashit(get_template_directory_uri()) . 'assets/backend/css/chosen.css');
        wp_enqueue_style('traveladvisor-widget-style', trailingslashit(get_template_directory_uri()) . 'assets/frontend/css/widget.css');
        wp_enqueue_style('traveladvisor-style', get_stylesheet_uri());
        if (class_exists('WooCommerce')) {
            wp_enqueue_style('cs-woocommerce', trailingslashit(get_template_directory_uri()) . 'assets/frontend/css/cs-woocommerce.css');
        }
        if (is_rtl()) {
            wp_enqueue_style('traveladvisor_rtl', get_template_directory_uri() . '/assets/frontend/css/rtl.css');
        }
        wp_enqueue_style('lightbox.min', trailingslashit(get_template_directory_uri()) . 'assets/frontend/css/lightbox.min.css');
        // color style 
        $custom_style_ver = $traveladvisor_var_options['traveladvisor_var_theme_option_save_flag'];
        wp_enqueue_style('traveladvisor-default-element-style', get_template_directory_uri() . '/assets/frontend/css/default-element.css', '', $custom_style_ver);
        if (isset($traveladvisor_var_options['traveladvisor_var_responsive']) and $traveladvisor_var_options['traveladvisor_var_responsive'] == 'on') {
            wp_enqueue_style('traveladvisor-responsive-style', trailingslashit(get_template_directory_uri()) . 'assets/frontend/css/responsive.css');
        }
        // all custom JS
        wp_enqueue_script('traveladvisor-inline-script', trailingslashit(get_template_directory_uri()) . 'assets/frontend/scripts/inline-script.js', '', '', true);
        wp_enqueue_script('sticky-kit', trailingslashit(get_template_directory_uri()) . 'assets/frontend/scripts/sticky-kit.js', '', '', true);
        wp_enqueue_script('bootstrap.min', trailingslashit(get_template_directory_uri()) . 'assets/frontend/scripts/bootstrap.min.js', array('jquery'));
        wp_enqueue_script('jquery.fitvids', trailingslashit(get_template_directory_uri()) . 'assets/frontend/scripts/jquery.fitvids.js', '', '', true);
        wp_enqueue_script('modernizr', trailingslashit(get_template_directory_uri()) . 'assets/frontend/scripts/modernizr.js', '', '', true);
        wp_enqueue_script('responsive.menu', trailingslashit(get_template_directory_uri()) . 'assets/frontend/scripts/responsive.menu.js', '', '', true);
        wp_enqueue_script('skills-progress', trailingslashit(get_template_directory_uri()) . 'assets/frontend/scripts/skills-progress.js', '', '', true);
        wp_enqueue_script('jquery.mobile-menu.min', trailingslashit(get_template_directory_uri()) . 'assets/frontend/scripts/jquery.mobile-menu.min.js', '', '', true);
        wp_enqueue_script('jquery.countdown', trailingslashit(get_template_directory_uri()) . 'assets/frontend/scripts/jquery.countdown.js', '', '', true);
        wp_enqueue_script('jquery.circliful', trailingslashit(get_template_directory_uri()) . 'assets/frontend/scripts/jquery.circliful.js', '', '', true);
        wp_enqueue_script('counter', trailingslashit(get_template_directory_uri()) . 'assets/frontend/scripts/counter.js', '', '', true);
        wp_enqueue_script('bootstrap-slider', trailingslashit(get_template_directory_uri()) . 'assets/frontend/scripts/bootstrap-slider.js', '', '', true);
        wp_enqueue_script('chosen.select', trailingslashit(get_template_directory_uri()) . 'assets/frontend/scripts/chosen.select.js', '', '', true);
        wp_enqueue_script('bootstrap.datetimepicker', trailingslashit(get_template_directory_uri()) . 'assets/frontend/scripts/bootstrap-datepicker.js', '', '', true);
        if (is_singular()) {
            wp_enqueue_script('comment-reply');
        }
        wp_enqueue_script('traveladvisor-slick', trailingslashit(get_template_directory_uri()) . 'assets/frontend/scripts/slick.js', '', '', true);
        wp_enqueue_script('traveladvisor-theme-functions-script', trailingslashit(get_template_directory_uri()) . 'assets/frontend/scripts/functions.js', '', '', true);

        $google_api_key = '?libraries=places';
        if (isset($traveladvisor_var_options['traveladvisor_var_google_api_key']) && $traveladvisor_var_options['traveladvisor_var_google_api_key'] != '') {
            $google_api_key = '?key=' . $traveladvisor_var_options['traveladvisor_var_google_api_key'] . '&libraries=places';
        }
        wp_enqueue_script('maps.googleapis', 'https://maps.googleapis.com/maps/api/js' . $google_api_key);

        if (!function_exists('traveladvisor_enqueue_slick_script')) {

            function traveladvisor_enqueue_slick_script() {
                wp_enqueue_script('slick', trailingslashit(get_template_directory_uri()) . 'assets/frontend/scripts/slick.js', '', '', true);
            }

        }
        if (!function_exists('traveladvisor_enqueue_weather_widget_script')) {

            function traveladvisor_enqueue_weather_widget_script() {
                wp_enqueue_script('widget-weather.min', trailingslashit(get_template_directory_uri()) . 'assets/frontend/scripts/Weather.min.js', '', '', true);
            }

        }
        if (!function_exists('traveladvisor_var_date_picker')) {

            function traveladvisor_var_date_picker() {
                global $traveladvisor_var_template_path;
                wp_enqueue_script('traveladvisor-admin-upload', $traveladvisor_var_template_path, array('media-upload'));
            }

        }
        if (!function_exists('traveladvisor_enqueue_google_map')) {

            function traveladvisor_enqueue_google_map() {
                global $traveladvisor_var_options;
                $google_api_key = '?libraries=places';
                if (isset($traveladvisor_var_options['traveladvisor_var_google_api_key']) && $traveladvisor_var_options['traveladvisor_var_google_api_key'] != '') {
                    $google_api_key = '?key=' . $traveladvisor_var_options['traveladvisor_var_google_api_key'] . '&libraries=places';
                }
                wp_enqueue_script('maps.googleapis', 'https://maps.googleapis.com/maps/api/js' . $google_api_key);
            }

        }
        if (!function_exists('traveladvisor_isotope_enqueue')) {

            function traveladvisor_isotope_enqueue() {
                
            }

        }
        if (!function_exists('traveladvisor_var_dynamic_scripts')) {

            function traveladvisor_var_dynamic_scripts($traveladvisor_js_key, $traveladvisor_arr_key, $traveladvisor_js_code) {
                // Register the script
                wp_register_script('traveladvisor_dynamic_scripts', trailingslashit(get_template_directory_uri()) . 'assets/frontend/scripts/cs-inline-scripts-functions.js', '', '', true);
                // Localize the script
                $traveladvisor_code_array = array(
                    $traveladvisor_arr_key => $traveladvisor_js_code
                );
                wp_localize_script('traveladvisor_dynamic_scripts', $traveladvisor_js_key, $traveladvisor_code_array);
                wp_enqueue_script('traveladvisor_dynamic_scripts');
            }

        }
    }

}
add_action('wp_enqueue_scripts', 'traveladvisor_var_scripts', 2);

if (!function_exists('traveladvisor_var_admin_scripts_enqueue')) {

    function traveladvisor_var_admin_scripts_enqueue() {

        if (is_admin()) {
            global $traveladvisor_var_template_path;
            $traveladvisor_var_template_path = trailingslashit(get_template_directory_uri()) . 'assets/backend/scripts/cs-media-upload.js';
            // all css script

            wp_register_style('fonticonpicker.min', trailingslashit(get_template_directory_uri()) . 'assets/common/icomoon/css/jquery.fonticonpicker.min.css', array('traveladvisor-responsive-style'));
            wp_enqueue_style('fonticonpicker.min');
            wp_enqueue_style('iconmoon', trailingslashit(get_template_directory_uri()) . 'assets/common/icomoon/css/iconmoon.css');
            wp_enqueue_style('jquery.fonticonpicker.bootstrap', trailingslashit(get_template_directory_uri()) . 'assets/common/icomoon/theme/bootstrap-theme/jquery.fonticonpicker.bootstrap.css');
            wp_enqueue_style('chosen', trailingslashit(get_template_directory_uri()) . 'assets/backend/css/chosen.css');
            wp_enqueue_style('traveladvisor-admin-style', trailingslashit(get_template_directory_uri()) . 'assets/backend/css/cs-admin-style.css');
            wp_enqueue_style('wp-color-picker');
            // all js script
            wp_enqueue_media();
            wp_enqueue_script('traveladvisor-admin-upload', $traveladvisor_var_template_path, array('jquery', 'media-upload', 'thickbox', 'jquery-ui-droppable', 'jquery-ui-datepicker', 'jquery-ui-slider', 'wp-color-picker'));
            wp_register_script('traveladvisor-icons-loader', trailingslashit(get_template_directory_uri()) . 'assets/backend/scripts/icons-loader.js');
            $traveladvisor_icons_array = array(
                'site_url' => trailingslashit(get_template_directory_uri()),
            );
            wp_localize_script('traveladvisor-icons-loader', 'icons_vars', $traveladvisor_icons_array);
            wp_enqueue_script('traveladvisor-icons-loader');
            wp_enqueue_script('jquery.fonticonpicker.min', trailingslashit(get_template_directory_uri()) . 'assets/common/icomoon/js/jquery.fonticonpicker.min.js');
            wp_enqueue_script('bootstrap.min', trailingslashit(get_template_directory_uri()) . 'assets/backend/scripts/bootstrap.min.js', '', '', true);

            wp_enqueue_style('jquery-datetimepicker', trailingslashit(get_template_directory_uri()) . 'assets/backend/css/jquery-datetimepicker.css');
            wp_enqueue_style('datepicker', trailingslashit(get_template_directory_uri()) . 'assets/backend/css/datepicker.css');
            wp_enqueue_style('jquery-ui-datepicker-theme', trailingslashit(get_template_directory_uri()) . 'assets/backend/css/jquery-ui-datepicker-theme.css');
            wp_enqueue_script('jquery-datetimepicker', trailingslashit(get_template_directory_uri()) . 'assets/backend/scripts/jquery-datetimepicker.js');
            wp_enqueue_script('traveladvisor-theme-options', trailingslashit(get_template_directory_uri()) . 'assets/backend/scripts/cs-theme-option-fucntions.js', '', '', true);
            wp_enqueue_script('chosen.select', trailingslashit(get_template_directory_uri()) . 'assets/backend/scripts/chosen.select.js', '', '', true);
            wp_enqueue_script('traveladvisor-custom-functions', trailingslashit(get_template_directory_uri()) . 'assets/backend/scripts/cs-fucntions.js', '', '', true);
            // editor
            wp_enqueue_script('traveladvisor-editor-script', trailingslashit(get_template_directory_uri()) . 'assets/backend/editor/scripts/jquery-te-1.4.0.min.js');
            wp_enqueue_style('traveladvisor-editor-style', trailingslashit(get_template_directory_uri()) . 'assets/backend/editor/css/jquery-te-1.4.0.css');
            wp_enqueue_script('traveladvisor-custom-function-job', trailingslashit(get_template_directory_uri()) . 'assets/backend/scripts/traveladvisor-functions.js', '', '', true);
            if (!function_exists('traveladvisor_var_date_picker')) {

                function traveladvisor_var_date_picker() {
                    global $traveladvisor_var_template_path;
                    wp_enqueue_script('traveladvisor-admin-upload', $traveladvisor_var_template_path, array('jquery', 'media-upload'));
                }

            }
        }
    }

}
add_action('admin_enqueue_scripts', 'traveladvisor_var_admin_scripts_enqueue');
$traveladvisor_var_template_path = trailingslashit(get_template_directory_uri()) . 'assets/backend/scripts/cs-media-upload.js';
/*
 * enqueue the file for the javascript date_picker 
 */
if (!function_exists('traveladvisor_var_date_picker')) {

    function traveladvisor_var_date_picker() {
        global $traveladvisor_var_template_path;
        wp_enqueue_script('traveladvisor-admin-upload', $traveladvisor_var_template_path, array('jquery', 'media-upload'));
    }

}
if (!function_exists('traveladvisor_get_the_excerpt')) {

    function traveladvisor_get_the_excerpt($charlength = '255', $readmore = 'true', $readmore_text = 'Read More') {
        global $post, $traveladvisor_theme_option;
        $excerpt = trim(preg_replace('/<a[^>]*>(.*)<\/a>/iU', '', get_the_excerpt()));
        if (strlen($excerpt) > $charlength) {
            if ($charlength > 0) {
                $excerpt = wp_trim_words($excerpt, $charlength);
            } else {
                $excerpt = $excerpt;
            }
            if ($readmore == 'true') {
                $more = '..';
            } else {
                $more = '...';
            }
            return $excerpt . $more;
        } else {
            return $excerpt;
        }
    }

}
/*
 * returns the pagination
 */
if (!function_exists('traveladvisor_var_get_pagination')) {

    function traveladvisor_var_get_pagination($total_pages = 1, $page = 1, $shortcode_paging) {
        global $traveladvisor_var_static_text;
        $strings = new traveladvisor_theme_all_strings;
        $strings->traveladvisor_short_code_strings();
        $query_string = $_SERVER['QUERY_STRING'];
        $base = get_permalink() . '?' . remove_query_arg($shortcode_paging, $query_string) . '%_%';
        $traveladvisor_var_pagination = paginate_links(array(
            'base' => @add_query_arg($shortcode_paging, '%#%'),
            'format' => '&' . $shortcode_paging . '=%#%', // this defines the query parameter that will be used, in this case "p"
            'prev_text' => '<i class="icon-long-arrow-left"></i> ' . traveladvisor_var_theme_text_srt('traveladvisor_var_prev'), // text for previous page
            'next_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_next') . ' <i class="icon-long-arrow-right"></i>', // text for next page
            'total' => $total_pages, // the total number of pages we have
            'current' => $page, // the current page
            'end_size' => 1,
            'mid_size' => 2,
            'type' => 'array',
        ));
        $traveladvisor_var_pages = '';
        if (is_array($traveladvisor_var_pagination) && sizeof($traveladvisor_var_pagination) > 0) {
            $traveladvisor_var_pages .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
            $traveladvisor_var_pages .= '<nav>';
            $traveladvisor_var_pages .= '<ul class="pagination">';
            foreach ($traveladvisor_var_pagination as $traveladvisor_var_link) {
                if (strpos($traveladvisor_var_link, 'current') !== false) {
                    $traveladvisor_var_pages .= '<li><a class="active">' . preg_replace("/[^0-9]/", "", $traveladvisor_var_link) . '</a></li>';
                } else {
                    $traveladvisor_var_pages .= '<li>' . $traveladvisor_var_link . '</li>';
                }
            }
            $traveladvisor_var_pages .= '</ul>';
            $traveladvisor_var_pages .= ' </nav>';
            $traveladvisor_var_pages .= '</div>';
        }
        echo traveladvisor_allow_special_char(esc_html($traveladvisor_var_pages));
    }

}
/**
 * Converts a HEX value to RGB.
 *
 * @since Traveladvisor
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
if (!function_exists('traveladvisor_var_hex2rgb')) {

    function traveladvisor_var_hex2rgb($color, $opacity = false) {
        $default = 'rgb(0,0,0)';
        //Return default if no color provided
        if (empty($color))
            return $default;
        $color = trim($color, '#');
        $rgb = array();
        if (strlen($color) === 3) {
            $r = hexdec(substr($color, 0, 1) . substr($color, 0, 1));
            $g = hexdec(substr($color, 1, 1) . substr($color, 1, 1));
            $b = hexdec(substr($color, 2, 1) . substr($color, 2, 1));
            $rgb = array($r, $g, $b);
        } else if (strlen($color) === 6) {
            $r = hexdec(substr($color, 0, 2));
            $g = hexdec(substr($color, 2, 2));
            $b = hexdec(substr($color, 4, 2));
            $rgb = array($r, $g, $b);
        } else {
            return array();
        }
        $output = '';
        if ($opacity) {
            if (abs($opacity) > 1)
                $opacity = 1.0;
            $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
        } else {
            $output = 'rgb(' . implode(",", $rgb) . ')';
        }
        //Return rgb(a) color string
        return $output;
    }

}

/**
 * @Get all Categories of posts or Custom posts
 *
 */
if (!function_exists('traveladvisor_var_show_all_cats')) {

    function traveladvisor_var_show_all_cats($parent, $separator, $selected = "", $taxonomy, $optional = '', $first_option = true) {
        global $traveladvisor_var_static_text;
        $strings = new traveladvisor_theme_all_strings;
        $strings->traveladvisor_short_code_strings();
        if ($parent == "") {
            global $wpdb;
            $parent = 0;
        } else
            $separator .= " &ndash; ";
        $args = array(
            'parent' => $parent,
            'hide_empty' => 0,
            'taxonomy' => $taxonomy
        );
        $traveladvisor_var_categories = get_categories($args);
        if ($optional) {
            $traveladvisor_var_options = array();
            if ($first_option) {
                $traveladvisor_var_options[''] = traveladvisor_var_theme_text_srt('traveladvisor_var_please_select');
            }
            foreach ($traveladvisor_var_categories as $traveladvisor_var_category) {
                $traveladvisor_var_options[$traveladvisor_var_category->term_id] = $traveladvisor_var_category->cat_name;
            }
            return $traveladvisor_var_options;
        } else {
            foreach ($traveladvisor_var_categories as $traveladvisor_var_category) {
                ?>
                <option <?php
                if ($selected == $traveladvisor_var_category->term_id) {
                    echo "selected";
                }
                ?> value="<?php echo esc_attr($traveladvisor_var_category->term_id); ?>"><?php echo esc_attr($separator . $traveladvisor_var_category->cat_name); ?></option>
                    <?php
                    traveladvisor_var_show_all_cats($traveladvisor_var_category->term_id, $separator, $selected, $taxonomy);
                }
            }
        }

    }
    if (!function_exists('traveladvisor_var_show_all_custom_post')) {

        function traveladvisor_var_show_all_custom_post() {
            global $post, $traveladvisor_var_static_text;
            $strings = new traveladvisor_theme_all_strings;
            $strings->traveladvisor_short_code_strings();
            $gal_data = array();
            $traveladvisor_var_args = array('posts_per_page' => '-1', 'post_type' => 'gallery', 'orderby' => 'ID', 'post_status' => 'publish', 'order' => 'DESC');
            $cust_query = get_posts($traveladvisor_var_args);
            $gal_data[''] = 'Select Gallery';
            foreach ($cust_query as $traveladvisor_var_gallery) {
                $post_data = get_post($traveladvisor_var_gallery->ID, ARRAY_A);
                $gal_data[$post_data['post_name']] = get_the_title($traveladvisor_var_gallery->ID);
            }
            return $gal_data;
        }

    }
    if (!function_exists('traveladvisor_var_social_network')) {

        function traveladvisor_var_social_network($icon_type = '', $tooltip = '') {
            global $traveladvisor_var_options, $traveladvisor_var_static_text;
            $strings = new traveladvisor_theme_all_strings;
            $strings->traveladvisor_short_code_strings();
            $tooltip_data = '';
            if ($icon_type == 'large') {
                $icon = 'icon-2x';
            } else {
                $icon = '';
            }
            if (isset($tooltip) && $tooltip <> '') {
                $tooltip_data = 'data-placement-tooltip="tooltip"';
            }
            if (isset($traveladvisor_var_options['traveladvisor_var_social_net_url']) and count($traveladvisor_var_options['traveladvisor_var_social_net_url']) > 0) {
                $i = 0;
                if ($traveladvisor_var_options['traveladvisor_var_social_net_url'] != '') {
                    foreach ($traveladvisor_var_options['traveladvisor_var_social_net_url'] as $val) {
                        if ($val != '') {
                            ?>          
                        <li>
                            <a href="<?php echo esc_url($val); ?>" data-original-title="<?php echo traveladvisor_allow_special_char($traveladvisor_var_options['traveladvisor_var_social_net_tooltip'][$i]); ?>" data-placement="top" <?php echo traveladvisor_allow_special_char($tooltip_data, false); ?> class="colrhover"  target="_blank">
                                <?php if ($traveladvisor_var_options['traveladvisor_var_social_net_awesome'][$i] <> '' && isset($traveladvisor_var_options['traveladvisor_var_social_net_awesome'][$i])) { ?>
                                    <i class="fa <?php echo esc_attr($traveladvisor_var_options['traveladvisor_var_social_net_awesome'][$i]); ?> <?php echo esc_attr($icon); ?>"></i>
                                    <?php
                                    if ($tooltip == 'yes') {
                                        echo esc_attr($traveladvisor_var_options['traveladvisor_var_social_net_tooltip'][$i]);
                                    }
                                    ?>
                                <?php } else { ?>
                                    <img src="<?php echo esc_url($traveladvisor_var_options['traveladvisor_var_social_icon_path_array'][$i]); ?>" alt="<?php echo esc_attr($traveladvisor_var_options['traveladvisor_var_social_net_tooltip'][$i]); ?>" />
                                <?php } ?>
                            </a>
                        </li>
                        <?php
                    }
                    $i ++;
                }
            }
        }
    }

}
/**
 * @Get sidebar name id
 *
 */
if (!function_exists('traveladvisor_get_sidebar_id')) {

    function traveladvisor_get_sidebar_id($traveladvisor_page_sidebar_left = '') {
        return sanitize_title($traveladvisor_page_sidebar_left);
    }

}
add_image_size('traveladvisor_var_media_1', 960, 540, true);   // Blog Large , Blog Detail, Destination Detail(16 x 9)
add_image_size('traveladvisor_var_media_2', 410, 308, true);   // Blog Grid, Blog Listing (330 x 248), Blog TimeLine (208 x 156), Related Post On Detail (300 x 225), Trip Listing Grid (300 x 225), Trip Listing Medium (400 x 300), Trip Detail Gallery (317 x 238) (4 x 3)
add_image_size('traveladvisor_var_media_3', 300, 169, true);   // Destination Grid, Points of interest On Detail, Related On Detail, Trip Detail Gallery (236 x 133)(16 x 9)
add_image_size('traveladvisor_var_media_4', 630, 368, true);   // Destination Info, Destination Image(16 x 9)
add_image_size('traveladvisor_var_media_5', 323, 500, true);   // Destination Home(Custom)
add_image_size('traveladvisor_var_media_6', 465, 465, true);   //Shop Detail Large
add_image_size('traveladvisor_var_media_7', 150, 84, true); // Destination listing
// Small Thumbnail ( use 150x150 wp default )108 x 108
// breadcrumb function
if (!function_exists('traveladvisor_breadcrumbs')) {

    function traveladvisor_breadcrumbs($traveladvisor_border = '') {
        global $wp_query, $traveladvisor_var_options, $post, $traveladvisor_var_static_text, $post;
        $strings = new traveladvisor_theme_all_strings;
        $strings->traveladvisor_short_code_strings();
        $traveladvisor_var_header_banner_style = get_post_meta(get_the_id(), "traveladvisor_var_header_banner_style", true);
        if ($traveladvisor_var_header_banner_style == "default_header" || is_search() || is_category() || is_home() || is_404()) {
            $traveladvisor_var_text_align = isset($traveladvisor_var_options['traveladvisor_var_text_align']) ? $traveladvisor_var_options['traveladvisor_var_text_align'] : '';
        } else {
            $traveladvisor_var_text_align = get_post_meta(get_the_id(), "traveladvisor_var_traveladvisor_page_title_align", true);
        }
        /* === OPTIONS === */
        $text['home'] = '<i class="icon-home"></i> ' . traveladvisor_var_theme_text_srt('traveladvisor_var_home'); // text for the 'Home' link
        $text['category'] = '%s'; // text for a category page
        $text['search'] = '%s'; // text for a search results page
        $text['tag'] = '%s'; // text for a tag page
        $text['author'] = '%s'; // text for an author page
        $text['404'] = 'Error 404'; // text for the 404 page
        $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
        $showOnHome = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
        $delimiter = ''; // delimiter between crumbs
        $before = '<li class="active">'; // tag before the current crumb
        $after = '</li>'; // tag after the current crumb
        /* === END OF OPTIONS === */
        $current_page = get_the_title(get_the_id());
        $current_page = $current_page;
        $homeLink = esc_url(home_url('/')) . '/';
        $linkBefore = '<li>';
        $linkAfter = '</li>';
        $linkAttr = '';
        $link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;
        $linkhome = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;

        $traveladvisor_border_style = $traveladvisor_border != '' ? ' style="border-top: 1px solid ' . $traveladvisor_border . ';"' : '';
        echo '<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
        if (2 == 3) {
            if ($showOnHome == "1")
                echo '<div' . $traveladvisor_border_style . ' class="breadcrumbs page-title-align-center"><ul>' . $before . '<a href="' . $homeLink . '" style="color:black !important;">' . $text['home'] . '</a>' . $after . '</ul></div>';
        } else {
            echo '<div' . $traveladvisor_border_style . ' class="breadcrumbs ' . $traveladvisor_var_text_align . '"><ul>' . sprintf($linkhome, $homeLink, $text['home']) . $delimiter;
            if (is_category()) {
                $thisCat = get_category(get_query_var('cat'), false);

                echo traveladvisor_allow_special_char($before) . sprintf($text['category'], single_cat_title('', false)) . traveladvisor_allow_special_char($after);
            } elseif (is_search()) {

                echo traveladvisor_allow_special_char($before) . sprintf($text['search'], get_search_query()) . $after;
            } elseif (is_day()) {
                echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
                echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F')) . $delimiter;
                echo traveladvisor_allow_special_char($before) . get_the_time('d') . $after;
            } elseif (is_month()) {

                echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
                echo traveladvisor_allow_special_char($before) . get_the_time('F') . $after;
            } elseif (is_year()) {
                echo traveladvisor_allow_special_char($before) . get_the_time('Y') . $after;
            } elseif (is_single() && !is_attachment()) {
                if (function_exists("is_shop") && get_post_type() == 'product') {
                    $traveladvisor_shop_page_id = wc_get_page_id('shop');
                    $current_page = get_the_title(get_the_id());
                    $traveladvisor_shop_page = "<li><a href='" . esc_url(get_permalink($traveladvisor_shop_page_id)) . "'>" . get_the_title($traveladvisor_shop_page_id) . "</a></li>";
                    echo traveladvisor_allow_special_char($traveladvisor_shop_page);
                    if ($showCurrent == 1)
                        echo traveladvisor_allow_special_char($before) . $current_page . $after;
                }
                else if (get_post_type() != 'post') {
                    $post_type = get_post_type_object(get_post_type());
                    $slug = $post_type->rewrite;
                    printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                    if ($showCurrent == 1)
                        echo traveladvisor_allow_special_char($delimiter) . $before . $current_page . $after;
                } else {

                    $cat = get_the_category();
                    $cat = $cat[0];
                    $cats = get_category_parents($cat, TRUE, $delimiter);
                    if ($showCurrent == 0)
                        $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                    $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                    $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                    echo traveladvisor_allow_special_char($cats);
                    if ($showCurrent == 1)
                        echo traveladvisor_allow_special_char($before) . $current_page . $after;
                }
            } elseif (!is_single() && !is_page() && get_post_type() <> '' && get_post_type() != 'post' && !is_404()) {

                $post_type = get_post_type_object(get_post_type());
                echo traveladvisor_allow_special_char($before) . $post_type->labels->singular_name . $after;
            } elseif (isset($wp_query->query_vars['taxonomy']) && !empty($wp_query->query_vars['taxonomy'])) {

                $taxonomy = $taxonomy_category = '';
                $taxonomy = $wp_query->query_vars['taxonomy'];
                echo traveladvisor_allow_special_char($before) . $wp_query->query_vars[$taxonomy] . $after;
            } elseif (is_page() && !$post->post_parent) {

                if ($showCurrent == 1)
                    echo traveladvisor_allow_special_char($before) . get_the_title() . $after;
            } elseif (is_page() && $post->post_parent) {
                $parent_id = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i ++) {
                    echo traveladvisor_allow_special_char($breadcrumbs[$i]);
                    if ($i != count($breadcrumbs) - 1)
                        echo traveladvisor_allow_special_char($delimiter);
                }
                if ($showCurrent == 1)
                    echo traveladvisor_allow_special_char($delimiter . $before . get_the_title() . $after);
            } elseif (is_tag()) {
                echo traveladvisor_allow_special_char($before) . sprintf($text['tag'], single_tag_title('', false)) . $after;
            } elseif (is_author()) {
                global $author;
                $userdata = get_userdata($author);
                echo traveladvisor_allow_special_char($before) . sprintf($text['author'], $userdata->display_name) . $after;
            } elseif (is_404()) {
                echo traveladvisor_allow_special_char($before) . $text['404'] . $after;
            }
            echo '</ul></div>';
        }
        echo '</div></div>';
    }

}
/*
 * RevSlider Extend Class 
 */
//if (!class_exists('traveladvisor_var_RevSlider')) {
//    if (class_exists('RevSlider')) {
//
//        class traveladvisor_var_RevSlider extends RevSlider {
//
//            // Get sliders alias, Title, ID
//            public function getAllSliderAliases() {
//                $where = "";
//                $response = $this->db->fetch(GlobalsRevSlider::$table_sliders, $where, "id");
//                $arrAliases = array();
//                $slider_array = array();
//                foreach ($response as $arrSlider) {
//                    $arrAliases['id'] = $arrSlider["id"];
//                    $arrAliases['title'] = $arrSlider["title"];
//                    $arrAliases['alias'] = $arrSlider["alias"];
//                    $slider_array[] = $arrAliases;
//                }
//                return($slider_array);
//            }
//
//        }
//
//    }
//}
/* Start function for RevSlider Extend Class 
 */
if (!class_exists('traveladvisor_var_RevSlider')) {
if(class_exists('RevSlider')) {
    class traveladvisor_var_RevSlider extends RevSlider {
        /*
         * Get sliders alias, Title, ID
         */

        public function getAllSliderAliases() {
              $arrAliases = array();
            $slider_array = array();
      
            $slider = new RevSlider(); 
            
            if (method_exists($slider, "get_sliders")) {
                $slider = new RevSlider();
                $objSliders = $slider->get_sliders();
                foreach ($objSliders as $arrSlider) {
                    $arrAliases['id'] = $arrSlider->id;
                    $arrAliases['title'] = $arrSlider->title;
                    $arrAliases['alias'] = $arrSlider->alias;
                    $slider_array[] = $arrAliases;
                }
            } else {
                 $where = "";
                $response = $this->db->fetch(GlobalsRevSlider::$table_sliders, $where, "id");
                $arrAliases = array();
                $slider_array = array();
                foreach ($response as $arrSlider) {
                    $arrAliases['id'] = $arrSlider["id"];
                    $arrAliases['title'] = $arrSlider["title"];
                    $arrAliases['alias'] = $arrSlider["alias"];
                    $slider_array[] = $arrAliases;
                }
            }
            return($slider_array);
        }

    }
 }
}
/**
 * @Bootstrap Coloumn Class
 *
 * @returm Coloumn
 */
if (!function_exists('traveladvisor_var_custom_column_class')) {

    function traveladvisor_var_custom_column_class($column_size) {
        $coloumn_class = 'col-md-12';
        if (isset($column_size) && $column_size <> '') {
            list($top, $bottom) = explode('/', $column_size);
            $width = $top / $bottom * 100;
            $width = (int) $width;
            $coloumn_class = '';
            if (round($width) == '25' || round($width) < 25) {
                $coloumn_class = 'col-lg-3 col-md-3 col-sm-6 col-xs-12';
            } elseif (round($width) == '33' || (round($width) < 33 && round($width) > 25)) {
                $coloumn_class = 'col-lg-4 col-md-4 col-sm-6 col-xs-12';
            } elseif (round($width) == '50' || (round($width) < 50 && round($width) > 33)) {
                $coloumn_class = 'col-lg-6 col-md-6 col-sm-12 col-xs-12';
            } elseif (round($width) == '67' || (round($width) < 67 && round($width) > 50)) {
                $coloumn_class = 'col-lg-8 col-md-12 col-sm-12 col-xs-12';
            } elseif (round($width) == '75' || (round($width) < 75 && round($width) > 67)) {
                $coloumn_class = 'col-md-9 col-lg-9 col-sm-12 col-xs-12';
            } else {
                $coloumn_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
            }
        }
        return esc_html($coloumn_class);
    }

}

if (!function_exists('traveladvisor_gallery_pagination')) {

    function traveladvisor_gallery_pagination($total_records, $per_page, $qrystr = '', $show_pagination = 'Show Pagination', $page_var = 'page_id_all') {
        global $traveladvisor_var_static_text;
        $strings = new traveladvisor_theme_all_strings;
        $strings->traveladvisor_short_code_strings();
        if ($show_pagination <> 'Show Pagination') {
            return;
        } else if ($total_records < $per_page) {
            return;
        } else {
            $html = '';
            $dot_pre = '';
            $dot_more = '';
            $total_page = 0;
            if ($per_page <> 0)
                $total_page = ceil($total_records / $per_page);
            $page_id_all = 0;
            if (isset($_GET[$page_var]) && $_GET[$page_var] != '') {
                $page_id_all = $_GET[$page_var];
            }

            $loop_start = $page_id_all - 2;

            $loop_end = $page_id_all + 2;

            if ($page_id_all < 3) {

                $loop_start = 1;

                if ($total_page < 5)
                    $loop_end = $total_page;
                else
                    $loop_end = 5;
            }

            else if ($page_id_all >= $total_page - 1) {

                if ($total_page < 5)
                    $loop_start = 1;
                else
                    $loop_start = $total_page - 4;

                $loop_end = $total_page;
            }

            $html .= "<nav><ul class='pagination'>";
            if ($page_id_all > 1) {
                $html .= "<li class='pgprev'><a href='?page_id_all=" . ($page_id_all - 1) . "$qrystr'  class='icon'>
				" . traveladvisor_var_theme_text_srt('traveladvisor_var_previous') . " </a></li>";
            } else {
                $html .= "<li class='pgprev cs-inactive'><a class='icon'>" . traveladvisor_var_theme_text_srt('traveladvisor_var_previous') . "</a></li>";
            }

            if ($page_id_all > 3 and $total_page > 5)
                $html .= "<li><a href='?page_id_all=1$qrystr'>1</a></li>";

            if ($page_id_all > 4 and $total_page > 6)
                $html .= "<li> <a>. . .</a> </li>";

            if ($total_page > 1) {

                for ($i = $loop_start; $i <= $loop_end; $i ++) {

                    if ($i <> $page_id_all)
                        $html .= "<li><a href='?page_id_all=$i$qrystr'>" . $i . "</a></li>";
                    else
                        $html .= "<li><a class='active'>" . $i . "</a></li>";
                }
            }
            if ($loop_end <> $total_page and $loop_end <> $total_page - 1) {
                $html .= "<li> <a>. . .</a> </li>";
            }
            if ($loop_end <> $total_page) {
                $html .= "<li><a href='?page_id_all=$total_page$qrystr'>$total_page</a></li>";
            }
            if ($per_page > 0 and $page_id_all < $total_records / $per_page) {

                $html .= "<li class='pgnext'><a class='icon' href='?page_id_all=" . ($page_id_all + 1) . "$qrystr' >" . traveladvisor_var_theme_text_srt('traveladvisor_var_next') . "</a></li>";
            } else {
                $html .= "<li class='pgnext cs-inactive'><a class='icon'>" . traveladvisor_var_theme_text_srt('traveladvisor_var_next') . " </a></li>";
            }
            $html .= "</ul></nav>";
            return $html;
        }
    }

}
add_filter('post_gallery', 'traveladvisor_custom_gallery', 10, 2);
if (!function_exists('traveladvisor_custom_gallery')) {

    function traveladvisor_custom_gallery($output, $attr) {
        global $post;
        if (isset($attr['orderby'])) {
            $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
            if (!$attr['orderby'])
                unset($attr['orderby']);
        }
        extract(shortcode_atts(array(
            'order' => 'ASC',
            'orderby' => 'menu_order ID',
            'id' => $post->ID,
            'itemtag' => 'dl',
            'icontag' => 'dt',
            'captiontag' => 'dd',
            'include' => '',
            'exclude' => ''
                        ), $attr));
        $id = intval($id);
        if ('RAND' == $order)
            $orderby = 'none';
        if (!empty($include)) {
            $include = preg_replace('/[^0-9,]+/', '', $include);
            $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
            $attachments = array();
            foreach ($_attachments as $key => $val) {
                $attachments[$val->ID] = $_attachments[$key];
            }
        }
        if (empty($attachments)) {
            return '';
        }
        // Here's your actual output, you may customize it to your need
        $output = "<div class=\"row\">\n";
        // Now you loop through each attachment
        foreach ($attachments as $id => $attachment) {
            $img = wp_get_attachment_image_src($id, 'traveladvisor_var_media_9');
            $output .= "<div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-6\">\n";
            $output .= '<div style="margin-bottom:30px;" class="cs-media">';
            $output .= '<figure><img alt="img" src="' . $img[0] . '"></figure>';
            $output .= '</div>';
            $output .= "</div>\n";
        }
        $output .= "</div>\n";
        return $output;
    }

}
//Mailchimp
add_action('wp_ajax_nopriv_traveladvisor_mailchimp', 'traveladvisor_mailchimp');
add_action('wp_ajax_traveladvisor_mailchimp', 'traveladvisor_mailchimp');

function traveladvisor_mailchimp() {
    global $traveladvisor_var_options, $counter, $traveladvisor_var_static_text;
    $strings = new traveladvisor_theme_all_strings;
    $strings->traveladvisor_short_code_strings();
    $mailchimp_key = '';
    if (isset($traveladvisor_var_options['traveladvisor_var_mailchimp_key'])) {
        $mailchimp_key = $traveladvisor_var_options['traveladvisor_var_mailchimp_key'];
    }
    if (isset($_POST) and ! empty($_POST['traveladvisor_list_id']) and $mailchimp_key != '') {
        if ($mailchimp_key <> '') {
            $MailChimp = new MailChimp($mailchimp_key);
        }
        $email = $_POST['mc_email'];
        if (($email != '') && (!filter_var($email, FILTER_VALIDATE_EMAIL) === false)) {
            $list_id = $_POST['traveladvisor_list_id'];
            $result = $MailChimp->call('lists/subscribe', array(
                'id' => $list_id,
                'email' => array('email' => $email),
                'merge_vars' => array(),
                'double_optin' => false,
                'update_existing' => false,
                'replace_interests' => false,
                'send_welcome' => true,
            ));
            if ($result <> '') {
                if (isset($result['status']) and $result['status'] == 'error') {
                    echo traveladvisor_allow_special_char('<span class="cs-error-msg">' . $result['error'] . '</span>');
                } else {
                    echo traveladvisor_allow_special_char('<span class="cs-success-msg">' . traveladvisor_var_theme_text_srt('traveladvisor_var_successfully_subscribed') . '</span>');
                }
            }
        } else {
            echo traveladvisor_allow_special_char('<span class="cs-error-msg">' . traveladvisor_var_theme_text_srt('traveladvisor_var_email_validation') . '</span>');
        }
    } else {
        echo traveladvisor_allow_special_char('<span class="cs-error-msg">' . traveladvisor_var_theme_text_srt('traveladvisor_var_please_set_api_key') . '</span>');
    }
    die();
}

if (!function_exists('traveladvisor_var_login_logo_url')) {

    function traveladvisor_var_login_logo_url() {
        return esc_url(home_url('/'));
    }

    add_filter('login_headerurl', 'traveladvisor_var_login_logo_url');
}

// filter for  title base search
//add_filter( 'posts_where', function ( $where, \WP_Query $q ) 
//{
//    if( ! is_admin() && $q->is_main_query() && $q->is_search()) // No global $wp_query here
//    {
//       global $wpdb;
//        if ($search_term = $wp_query->get('search_title')) {
//            $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . (( $search_term ) ) . '%\'';
//        }
//    }
//
//    return $where;      
//
//}, 10, 2 ); // Note the priority 10 and number of input arguments is 2

if (!function_exists('traveladvisor_post_likes_count')) {

    function traveladvisor_post_likes_count() {
        global $traveladvisor_var_static_text;
        $strings = new traveladvisor_theme_all_strings;
        $strings->traveladvisor_short_code_strings();
        $traveladvisor_like_counter = get_post_meta($_POST['post_id'], "traveladvisor_post_like_counter", true);
        if (!isset($_COOKIE["traveladvisor_post_like_counter" . $_POST['post_id']])) {
            setcookie("traveladvisor_post_like_counter" . $_POST['post_id'], 'true', time() + 86400, '/');
            update_post_meta($_POST['post_id'], 'traveladvisor_post_like_counter', $traveladvisor_like_counter + 1);
        }
        $traveladvisor_like_counter = get_post_meta($_POST['post_id'], "traveladvisor_post_like_counter", true);
        if (!isset($traveladvisor_like_counter) or empty($traveladvisor_like_counter))
            $traveladvisor_like_counter = 0;
        echo '<i class="icon-heart"></i> ' . traveladvisor_allow_special_char($traveladvisor_like_counter) . traveladvisor_var_theme_text_srt('traveladvisor_var_like');
        die(0);
    }

    add_action('wp_ajax_traveladvisor_post_likes_count', 'traveladvisor_post_likes_count');
    add_action('wp_ajax_nopriv_traveladvisor_post_likes_count', 'traveladvisor_post_likes_count');
}
if (!function_exists('traveladvisor_post_unlikes_count')) {

    function traveladvisor_post_unlikes_count() {
        global $traveladvisor_var_static_text;
        $strings = new traveladvisor_theme_all_strings;
        $strings->traveladvisor_short_code_strings();
        $traveladvisor_like_counter = get_post_meta($_POST['post_id'], "traveladvisor_post_like_counter", true);
        if (isset($_COOKIE["traveladvisor_post_like_counter" . $_POST['post_id']])) {
            setcookie("traveladvisor_post_like_counter" . $_POST['post_id'], 'true', time() - 86400, '/');
            update_post_meta($_POST['post_id'], 'traveladvisor_post_like_counter', $traveladvisor_like_counter - 1);
        }
        $traveladvisor_like_counter = get_post_meta($_POST['post_id'], "traveladvisor_post_like_counter", true);
        if (!isset($traveladvisor_like_counter) or empty($traveladvisor_like_counter))
            $traveladvisor_like_counter = 0;
        echo ' <i class="icon-heart"></i> ' . traveladvisor_allow_special_char($traveladvisor_like_counter) . traveladvisor_var_theme_text_srt('traveladvisor_var_like');
        die(0);
    }

    add_action('wp_ajax_traveladvisor_post_unlikes_count', 'traveladvisor_post_unlikes_count');
    add_action('wp_ajax_nopriv_traveladvisor_post_unlikes_count', 'traveladvisor_post_unlikes_count');
}
//Add Shortcode in widget_text 
//add_filter('widget_text', 'do_shortcode');
add_filter('menu_image_default_sizes', function($sizes) {
    // remove the default 36x36 size
    unset($sizes['menu-36x36']);
    // add a new size
    $sizes['menu-50x50'] = array(50, 50);
    // return $sizes (required)
    return $sizes;
});
if (!function_exists('traveladvisor_filter_comment_form_submit_button')) {

// define the comment_form_submit_button callback
    function traveladvisor_filter_comment_form_submit_button($submit_button, $args) {
        // make filter magic happen here...
        $submit_before = '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
        $submit_after = '</div>';
        return $submit_before . $submit_button . $submit_after;
    }

    ;

// add the filter
    add_filter('comment_form_submit_button', 'traveladvisor_filter_comment_form_submit_button', 10, 2);
}
/*
  password form */
if (!function_exists('traveladvisor_password_form')) {

    function traveladvisor_password_form() {
        global $post, $traveladvisor_var_options, $traveladvisor_var_form_fields;

        $cs_password_opt_array = array(
            'std' => '',
            'id' => '',
            'classes' => '',
            'extra_atr' => ' size="20"',
            'cust_id' => 'password_field',
            'cust_name' => 'post_password',
            'return' => true,
            'required' => false,
            'cust_type' => 'password',
        );

        $cs_submit_opt_array = array(
            'std' => esc_html__("Submit", 'traveladvisor'),
            'id' => '',
            'classes' => 'bgcolr',
            'extra_atr' => '',
            'cust_id' => '',
            'cust_name' => 'Submit',
            'return' => true,
            'required' => false,
            'cust_type' => 'submit',
        );


        $label = 'pwbox-' . ( empty($post->ID) ? rand() : $post->ID );
        $o = '<div class="password_protected">
                <div class="protected-icon"><a href="#"><i class="icon-unlock-alt icon-4x"></i></a></div>
                <h3>' . esc_html__("This post is password protected. To view it please enter your password below:", 'traveladvisor') . '</h3>';
        $o .= '<form action="' . esc_url(site_url('wp-login.php?action=postpass', 'login_post')) . '" method="post"><label>'
                . $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($cs_password_opt_array)
                . '</label>'
                . $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($cs_submit_opt_array)
                . '</form>
            </div>';
        return $o;
    }

}