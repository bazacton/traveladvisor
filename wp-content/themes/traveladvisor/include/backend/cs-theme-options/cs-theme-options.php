<?php
/**
 * Traveladvisor Theme Options
 *
 * @package WordPress
 * @subpackage Traveladvisor
 * @since Traveladvisor
 */
if ( ! function_exists( 'traveladvisor_var_settings_page' ) ) {

    function traveladvisor_var_settings_page() {

        global $traveladvisor_var_options, $traveladvisor_var_settings, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
        $strings = new traveladvisor_theme_all_strings;
        $strings->traveladvisor_theme_option_strings();
        ?>
        <div class="theme-wrap fullwidth">
            <div class="inner">
                <div class="outerwrapp-layer">
                    <div class="loading_div">
                        <i class="icon-circle-o-notch icon-spin"></i> <br>
                        <?php traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_save_msg' ) ?>
                    </div>
                    <div class="form-msg"> 
                        <i class="icon-check-circle-o"></i>
                        <div class="innermsg"></div>
                    </div>
                </div>
                <div class="row">
                    <form id="frm" method="post">
                        <?php
                        $traveladvisor_var_fields = new traveladvisor_var_fields();
                        $return = $traveladvisor_var_fields->traveladvisor_var_fields( $traveladvisor_var_settings );
                        ?>
                        <div class="col1">
                            <nav class="admin-navigtion">
                                <div class="logo"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo1"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/backend/images/logo-themeoption.png' ) ?>" /></a> <a href="#" class="nav-button"><i class="icon-align-justify"></i></a> </div>
                                <ul>
                                    <?php echo traveladvisor_allow_special_char( $return[1], true ); ?>
                                </ul>
                            </nav>
                        </div>

                        <div class="col2">
                            <?php echo traveladvisor_allow_special_char( $return[0], true ); ?>
                        </div>
                        <script>
                            jQuery(document).ready(function () {
                                chosen_selectionbox();
                            });
                        </script>
						
                        <div class="clear"></div>
                        <div class="footer">
                            <?php
                            $traveladvisor_opt_array = array(
                                'std' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_save_msg' ),
                                'cust_id' => 'submit_btn',
                                'cust_name' => 'submit_btn',
                                'cust_type' => 'button',
                                'extra_atr' => 'onclick="javascript:theme_option_save(\'' . esc_js( admin_url( 'admin-ajax.php' ) ) . '\', \'' . esc_js( get_template_directory_uri() ) . '\');"',
                                'classes' => 'bottom_btn_save',
                            );
                            $traveladvisor_var_form_fields->traveladvisor_var_form_text_render( $traveladvisor_opt_array );

                            $traveladvisor_opt_array = array(
                                'std' => 'theme_option_save',
                                'cust_id' => 'action',
                                'cust_name' => 'action',
                                'classes' => '',
                            );
                            $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );

                            $traveladvisor_opt_array = array(
                                'std' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_reset_msg' ),
                                'cust_id' => 'reset',
                                'cust_name' => 'reset',
                                'cust_type' => 'button',
                                'extra_atr' => 'onclick="javascript:traveladvisor_var_rest_all_options(\'' . esc_js( admin_url( 'admin-ajax.php' ) ) . '\', \'' . esc_js( get_template_directory_uri() ) . '\');"',
                                'classes' => 'bottom_btn_reset',
                            );
                            $traveladvisor_var_form_fields->traveladvisor_var_form_text_render( $traveladvisor_opt_array );
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <?php
    }

}

/**
 * @Background Count function
 * @return
 *
 */
if ( ! function_exists( 'traveladvisor_var_bgcount' ) ) {

    function traveladvisor_var_bgcount( $name, $count ) {

        $pattern = array();
        for ( $i = 0; $i <= $count; $i ++  ) {
            $pattern['option' . $i] = $name . $i;
        }
        return $pattern;
    }

}




/**
 * @Develop An Array to be in Cs Theme Options 
 * @return
 *
 */
if ( ! function_exists( 'traveladvisor_var_options_array' ) ) {

    add_action( 'init', 'traveladvisor_var_options_array' );

    function traveladvisor_var_options_array() {

        global $traveladvisor_var_settings, $traveladvisor_var_options;

        $strings = new traveladvisor_theme_all_strings;
        $strings->traveladvisor_theme_option_strings();

        $on_off_option = array(
            "show" => "on",
            "hide" => "off",
        );
        $navigation_style = array(
            "left" => "left",
            "center" => "center",
            "right" => "right"
        );

        $social_network = array(
            'traveladvisor_var_social_net_icon_path' => array( '', '', '', '', '' ),
            'traveladvisor_var_social_net_awesome' => array( 'icon-facebook9', 'icon-dribbble7', 'icon-twitter2', 'icon-behance2' ),
            'traveladvisor_var_social_net_url' => array( traveladvisor_server_protocol() . 'www.facebook.com/', traveladvisor_server_protocol() . 'dribbble.com/', traveladvisor_server_protocol() . 'www.twitter.com/', traveladvisor_server_protocol() . 'www.behance.net/' ),
            'traveladvisor_var_social_net_tooltip' => array( 'Facebook', 'Dribbble', 'Twitter', 'Behance' ),
            'traveladvisor_var_social_icon_color' => array( '#cccccc', '#cccccc', '#cccccc', '#cccccc' )
        );

        $traveladvisor_var_sidebar = array(
            'sidebar' => array(
            )
        );

        $traveladvisor_var_footer_sidebar = array(
            'traveladvisor_var_footer_sidebar' => array(
                '' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_please_select' ),
            )
        );

        $deafult_sub_header = array( 'breadcrumbs_sub_header' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_breadcrumbs_sub_header' ), 'slider' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_revolution_slider' ), 'no_header' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_no_sub_header' ) );

        if ( isset( $traveladvisor_var_options['traveladvisor_var_sidebar'] ) && is_array( $traveladvisor_var_options['traveladvisor_var_sidebar'] ) ) {
            $traveladvisor_var_sidebar = array( 'sidebar' => $traveladvisor_var_options['traveladvisor_var_sidebar'] );
        }

        // google fonts array
        $traveladvisor_var_fonts = traveladvisor_var_googlefont_list();
        $traveladvisor_var_fonts_atts = traveladvisor_var_get_google_font_attribute();

        if ( isset( $traveladvisor_var_options ) and isset( $traveladvisor_var_options['traveladvisor_var_footer_sidebar'] ) ) {
            if ( is_array( $traveladvisor_var_options['traveladvisor_var_footer_sidebar'] ) and count( $traveladvisor_var_options['traveladvisor_var_footer_sidebar'] ) > 0 ) {
                $traveladvisor_footer_sidebar = array( 'traveladvisor_var_footer_sidebar' => $traveladvisor_var_options['traveladvisor_var_footer_sidebar'] );
            } else {
                $traveladvisor_footer_sidebar = array( 'traveladvisor_var_footer_sidebar' => array() );
            }
        } else {
            $traveladvisor_footer_sidebar = $traveladvisor_var_footer_sidebar;
        }

        $footer_sidebar_list[''] = traveladvisor_var_theme_text_srt( 'traveladvisor_var_please_select' );
        if ( isset( $traveladvisor_footer_sidebar['traveladvisor_var_footer_sidebar'] ) && is_array( $traveladvisor_footer_sidebar['traveladvisor_var_footer_sidebar'] ) ) {
            foreach ( $traveladvisor_footer_sidebar['traveladvisor_var_footer_sidebar'] as $footer_sidebar_var => $footer_sidebar_val ) {
                $footer_sidebar_list[$footer_sidebar_var] = $footer_sidebar_val;
            }
        }
        $traveladvisor_footer_sidebar['traveladvisor_var_footer_sidebar'] = $footer_sidebar_list;

        //Set the Options Array
        $traveladvisor_var_settings = array();

        //general setting options
        $traveladvisor_var_settings[] = array(
            "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_general' ),
            "fontawesome" => 'icon-cog3',
            "type" => "heading",
            "options" => array(
                'tab-global-setting' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_global' ),
                'tab-header-options' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_header' ),
                'tab-sub-header-options' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_sub_header' ),
                'tab-footer-options' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_footer' ),
                'tab-social-setting' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_social_icons' ),
                'tab-social-network' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_social_sharing' ),
            )
        );
        $traveladvisor_var_settings[] = array(
            "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_color' ),
            "fontawesome" => 'icon-magic',
            "hint_text" => "",
            "type" => "heading",
            "options" => array(
                'tab-general-color' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_general' ),
                'tab-header-color' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_header' ),
                'tab-footer-color' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_footer' ),
                'tab-heading-color' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading' ),
            )
        );
        $traveladvisor_var_settings[] = array(
            "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_typo_font' ),
            "fontawesome" => 'icon-font',
            "desc" => "",
            "hint_text" => "",
            "type" => "heading",
            "options" => array(
                'tab-custom-font' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_custom_font' ),
                'tab-font-family' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_google_font' ),
            )
        );
        $traveladvisor_var_settings[] = array(
            "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_sidebar' ),
            "fontawesome" => 'icon-columns',
            "id" => "tab-sidebar",
            "std" => "",
            "type" => "main-heading",
            "options" => ''
        );

        $traveladvisor_var_settings[] = array(
            "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_footer_sidebar' ),
            "fontawesome" => 'icon-columns',
            "id" => "tab-footer-sidebar",
            "std" => "",
            "type" => "main-heading",
            "options" => ''
        );


        $traveladvisor_var_settings[] = array(
            "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_maintaince_mode' ),
            "fontawesome" => 'icon-columns',
            "id" => "tab-coming-soon",
            "std" => "",
            "type" => "main-heading",
            "options" => ''
        );
        $traveladvisor_var_settings[] = array(
            "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_api_setting' ),
            "fontawesome" => 'icon-columns',
            "id" => "tab-api-setting",
            "std" => "",
            "type" => "main-heading",
            "options" => ''
        );



        $traveladvisor_var_settings[] = array(
            "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_global' ),
            "id" => "tab-global-setting",
            "with_col" => true,
            "type" => "sub-heading"
        );
        $traveladvisor_var_settings[] = array(
            "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_layout' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_layout_type' ),
            "id" => "layout",
            "std" => "full_width",
            "options" => array(
                "boxed" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_box' ),
                "full_width" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_full_width' )
            ),
            "type" => "layout",
        );
        /*
         * currency symbol add
         */
        $traveladvisor_currencuies = traveladvisor_get_currency();
        foreach ( $traveladvisor_currencuies as $key => $value ) {
            $currencies[$key] = $value['name'] . '-' . $value['code'];
        }
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_select_currency' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_currency_dropdown' ),
            "id" => "currency_type",
            'classes' => 'dropdown chosen-select-no-single ',
            "type" => "select",
            "options" => $currencies,
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_currency_sign' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_currency_sign_hint' ),
            "id" => "currency_sign",
            "type" => "text"
        );
        $traveladvisor_var_settings[] = array(
            "name" => "",
            "id" => "horizontal_tab",
            "class" => "horizontal_tab",
            "type" => "horizontal_tab",
            "std" => "",
            "options" => array(
                'Background' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_background_tab' ),
                'background color' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_background_tab_color' ),
                'Pattern' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_background_pattern_tab' ),
                'Custom Image' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_background_custom_image_tab' )
            )
        );
        $traveladvisor_var_settings[] = array(
            "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_background_image' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_bg_image_hint' ),
            "id" => "bg_image",
            "class" => "traveladvisor_var_background_",
            "path" => "background",
            "tab" => "background_tab",
            "std" => "bg1",
            "type" => "layout_body",
            "display" => "block",
            "options" => traveladvisor_var_bgcount( 'bg', '10' )
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_bg_pattern' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_bg_pattern_hint' ),
            "id" => "pattern_image",
            "class" => "traveladvisor_var_background_",
            "path" => "patterns",
            "tab" => "pattern_tab",
            "std" => "bg7",
            "type" => "layout_body",
            "display" => "none",
            "options" => traveladvisor_var_bgcount( 'pattern', '27' )
        );
        $traveladvisor_var_settings[] = array(
            "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_bgcolor' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_bgcolor_hint' ),
            "id" => "bg_color",
            "std" => "#f3f3f3",
            "tab" => "background_tab_color",
            "display" => "none",
            "type" => "color"
        );

        $traveladvisor_var_settings[] = array(
            "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_custom_image' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_layout_hint' ),
            "id" => "custom_bgimage",
            "std" => "",
            "tab" => "custom_image_tab",
            "display" => "none",
            "type" => "upload logo"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_bg_image_position' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_bg_image_position_hint' ),
            "id" => "bgimage_position",
            "std" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_background_center_repeat' ),
            "type" => "select",
            'classes' => 'chosen-select',
            "options" => array(
                "no-repeat center top" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_no_repeat_center_top' ),
                "repeat center top" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_repeat_center_top' ),
                "no-repeat center" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_no_repeat_center' ),
                "Repeat Center" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_repeat_center' ),
                "no-repeat left top" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_no_repeat_left_top' ),
                "repeat left top" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_repeat_left_top' ),
                "no-repeat fixed center" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_no_repeat_fixed_center' ),
                "no-repeat fixed center / cover" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_no_repeat_fixed_center_cover' )
            )
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_responsive' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_responsive_hint' ),
            "id" => "responsive",
            "std" => "on",
            "type" => "checkbox",
            "options" => $on_off_option
        );
/////traveladvisor_header_auto_sidebar
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_auto_sidebar' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_auto_sidebar_hint' ),
            "id" => "autosidebar",
            "std" => "on",
            "type" => "checkbox",
            "options" => $on_off_option
        );
/////traveladvisor_header_auto_sidebar
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_choose_auto_sidebar' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_choose_auto_sidebar_hint' ),
            "id" => "autosidebar_select",
            "std" => $traveladvisor_var_sidebar,
            "type" => "select_sidebar",
            "options" => $traveladvisor_var_sidebar
        );


        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_excerpt' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_excerpt_hint' ),
            "id" => "excerpt_length",
            "std" => "120",
            "type" => "text"
        );


        $traveladvisor_var_settings[] = array( "col_heading" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_global_settings' ),
            "type" => "col-right-text",
            "help_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_global_settings_hint' ),
        );

        // Header options start
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_header' ),
            "id" => "tab-header-options",
            "type" => "sub-heading"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_default_header_style' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_default_header_style_hint' ),
            "id" => "header_style",
            "std" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_default' ),
            "type" => "select",
            'classes' => 'chosen-select-no-single',
            "options" => array(
                "default" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_default' ),
//                "modern" => traveladvisor_var_theme_text_srt('traveladvisor_var_modern'),
            )
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_logo' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_logo_hint' ),
            "id" => "custom_logo",
            "std" => "",
            "type" => "upload logo"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_logo_height' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_logo_height_hint' ),
            "id" => "logo_height",
            "min" => '0',
            "max" => '100',
            "std" => "67",
            "type" => "range"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_logo_width' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_logo_width_hint' ),
            "id" => "logo_width",
            "min" => '0',
            "max" => '210',
            "std" => "142",
            "type" => "range"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_logo_margin_top' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_logo_margin_top_hint' ),
            "id" => "logo_margint",
            "min" => '0',
            "max" => '200',
            "std" => "0",
            "type" => "range"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_logo_margin_bottom' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_logo_margin_bottom_hint' ),
            "id" => "logo_marginb",
            "min" => '-60',
            "max" => '200',
            "std" => "0",
            "type" => "range"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_logo_margin_right' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_logo_margin_right_hint' ),
            "id" => "logo_marginr",
            "min" => '0',
            "max" => '200',
            "std" => "0",
            "type" => "range"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_logo_margin_left' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_logo_margin_left_hint' ),
            "id" => "logo_marginl",
            "min" => '-20',
            "max" => '200',
            "std" => "0",
            "type" => "range"
        );
        if ( class_exists( 'WooCommerce' ) ) {
            $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_header' ),
                "id" => "tab-header-options",
                "std" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_wooCommerce' ),
                "type" => "section",
                "options" => ""
            );

            $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_wooCommerce_cart_icon' ),
                "desc" => "",
                "hint_text" => "",
                "id" => "woocommerce_cart_icon",
                "std" => "on",
                "type" => "checkbox" );
        }


        // sub header element settings 
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_sub_header' ),
            "id" => "tab-sub-header-options",
            "type" => "sub-heading"
        );



        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_default_sub_header' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_default_sub_header_hint' ),
            "id" => "default_header",
            "std" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_breadcrumbs_sub_header' ),
            'classes' => 'chosen-select',
            "type" => "default_header",
            "options" => $deafult_sub_header
        );
        $traveladvisor_var_settings[] = array(
            "type" => "division",
            "enable_id" => "traveladvisor_var_default_header",
            "enable_val" => "no_header",
            "extra_atts" => 'id="cs-no-headerfields"',
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_header_border_color' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "header_border_color",
            "std" => "",
            "type" => "color"
        );
        $traveladvisor_var_settings[] = array(
            "type" => "division_close",
        );

        $traveladvisor_var_settings[] = array(
            "type" => "division",
            "enable_id" => "traveladvisor_var_default_header",
            "enable_val" => "slider",
            "extra_atts" => 'id="cs-rev-slider-fields"',
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_revolution_slider' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_revolution_slider_hint' ),
            "id" => "custom_slider",
            "std" => "",
            "type" => "slider_code",
            "options" => ''
        );
        $traveladvisor_var_settings[] = array(
            "type" => "division_close",
        );

        $traveladvisor_var_settings[] = array(
            "type" => "division",
            "enable_id" => "traveladvisor_var_default_header",
            "enable_val" => "breadcrumbs_sub_header",
            "extra_atts" => 'id="cs-breadcrumbs-fields"',
        );

        $traveladvisor_var_settings[] = array(
            "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_align' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_align_hint' ),
            "id" => "text_align",
            "std" => "",
            'classes' => 'chosen-select',
            "type" => "select",
            "options" => array( 'left' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_align_left' ), 'center' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_align_center' ), 'right' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_align_right' ) ),
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_button_paddingtop' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_button_paddingtop_hint' ),
            "id" => "sh_paddingtop",
            "min" => '0',
            "max" => '200',
            "std" => "0",
            "type" => "range"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_button_paddingbottom' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_button_paddingbottom_hint' ),
            "id" => "sh_paddingbottom",
            "min" => '0',
            "max" => '200',
            "std" => "0",
            "type" => "range"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_margin_top' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_sub_header_margin_top_hint' ),
            "id" => "sh_margintop",
            "min" => '0',
            "max" => '200',
            "std" => "0",
            "type" => "range"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_margin_bottom' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_margin_bottom_hint' ),
            "id" => "sh_marginbottom",
            "min" => '0',
            "max" => '200',
            "std" => "0",
            "type" => "range"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_page_title' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "page_title_switch",
            "std" => "on",
            "type" => "checkbox"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_breadcrumbs' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "breadcrumbs_switch",
            "std" => "on",
            "type" => "checkbox"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_color' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "sub_header_text_color",
            "std" => "#ffffff",
            "type" => "color"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_subheader_border_color' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "sub_header_border_color",
            "std" => "",
            "type" => "color"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_background_image' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_bg_image_hint' ),
            "id" => "sub_header_bg_img",
            "std" => "",
            "type" => "upload logo"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_sub_heading' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "sub_header_sub_hdng",
            "std" => "",
            "type" => "textarea"
        );


        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_parallax' ),
            "desc" => "",
            "hint_text" => '',
            "id" => "sub_header_parallax",
            "std" => "",
            "type" => "checkbox",
            "options" => $on_off_option
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_bgcolor' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "sub_header_bg_clr",
            "std" => "",
            "type" => "color"
        );
        $traveladvisor_var_settings[] = array(
            "type" => "division_close",
        );
        /* $traveladvisor_var_settings[] = array(
          "type" => "division",
          "enable_id" => "traveladvisor_var_sub_header_style",
          "enable_val" => "with_bg",
          "extra_atts" => 'id="cs-subheader-with-bg"',
          ); */
//        $traveladvisor_var_settings[] = array("name" => traveladvisor_var_theme_text_srt('traveladvisor_var_theme_subheader_fancy_heading'),
//            "desc" => "",
//            "hint_text" => "",
//            "id" => "sub_header_fancy_hdng",
//            "std" => "",
//            "type" => "text"
//        );

        /* $traveladvisor_var_settings[] = array(
          "type" => "division_close",
          );
          $traveladvisor_var_settings[] = array(
          "type" => "division",
          "enable_id" => "traveladvisor_var_sub_header_style",
          "enable_val" => "with_bg,classic",
          "extra_atts" => 'id="cs-subheader-clr-f"',
          ); */


        //$traveladvisor_var_settings[] = array(
        //    "type" => "division_close",
        //);

       // $traveladvisor_var_settings[] = array(
          //  "type" => "division_close",
       // );

        // start footer options    

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_footer_options' ),
            "id" => "tab-footer-options",
            "type" => "sub-heading"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_footer_section' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_footer_section_hint' ),
            "id" => "footer_switch",
            "std" => "on",
            "type" => "checkbox"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_footer_widgets' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_footer_widgets_hint' ),
            "id" => "footer_widget",
            "std" => "on",
            "type" => "checkbox"
        );
//        $traveladvisor_var_settings[] = array("name" => traveladvisor_var_theme_text_srt('traveladvisor_var_footer_menu'),
//            "desc" => "",
//            "hint_text" => traveladvisor_var_theme_text_srt('traveladvisor_var_footer_menu_hint'),
//            "id" => "footer_menu",
//            "std" => "on",
//            "type" => "checkbox",
//        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_footer_logo' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_footer_logo_hint' ),
            "id" => "footer_logo",
            "std" => get_template_directory_uri() . "/assets/images/foot-logo.png",
            "type" => "upload logo" );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_footer_logo_link' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_footer_logo_link_hint' ),
            "id" => "logo_link",
            "std" => "",
            "type" => "text" );


        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_social_icons' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_ena/dis_soc_icons' ),
            "id" => "sub_footer_social_icons",
            "std" => "on",
            "type" => "checkbox" );


        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_copy_write_section' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_copy_write_section_hint' ),
            "id" => "copy_write_section",
            "std" => "on",
            "type" => "checkbox" );


        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_copyright_text' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_copyright_text_hint' ),
            "id" => "copy_right",
            "std" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_copyright_text_value' ),
            "type" => "textarea"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_footer_card1' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_footer_card1_hint' ),
            "id" => "footer_card1",
            "std" => get_template_directory_uri() . "/assets/images/shop-card-img-1.jpg",
            "type" => "upload logo" );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_footer_card2' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_footer_card2_hint' ),
            "id" => "footer_card2",
            "std" => get_template_directory_uri() . "/assets/images/shop-card-img-2.jpg",
            "type" => "upload logo" );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_footer_card3' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_footer_card3_hint' ),
            "id" => "footer_card3",
            "std" => get_template_directory_uri() . "/assets/images/shop-card-img-3.jpg",
            "type" => "upload logo" );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_footer_card4' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_footer_card4_hint' ),
            "id" => "footer_card4",
            "std" => get_template_directory_uri() . "/assets/images/shop-card-img-4.jpg",
            "type" => "upload logo" );
        // End footer tab setting
        // general colors 
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_general_color' ),
            "id" => "tab-general-color",
            "type" => "sub-heading"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_color' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_color_hint' ),
            "id" => "theme_color",
            "std" => "#ed413f",
            "type" => "color"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_text_color' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_text_color_hint' ),
            "id" => "text_color",
            "std" => "#555555",
            "type" => "color"
        );

        // start top strip tab options
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_header_color' ),
            "id" => "tab-header-color",
            "type" => "sub-heading"
        );

        // start header color tab options
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_default_header_colors' ),
            "id" => "tab-header-color",
            "std" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_default_header_colors' ),
            "type" => "section",
            "options" => ""
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_bgcolor' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_default_header_colors_hint' ),
            "id" => "header_bgcolor",
            "std" => "#ffffff",
            "type" => "color"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_menu_link_color' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_menu_link_color_hint' ),
            "id" => "menu_color",
            "std" => "#282828",
            "type" => "color"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_menu_hover_color' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_menu_hover_color_hint' ),
            "id" => "menu_active_color",
            "std" => "#ed413f ",
            "type" => "color"
        );


        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_submenu_bg' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_submenu_bg_hint' ),
            "id" => "submenu_bgcolor",
            "std" => "#ffffff",
            "type" => "color",
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_submenu_link_color' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_submenu_link_color_hint' ),
            "id" => "submenu_color",
            "std" => "#282828",
            "type" => "color"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_submenu_hover_color' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_submenu_hover_color_hint' ),
            "id" => "submenu_hover_color",
            "std" => "#ed413f",
            "type" => "color"
        );

//        // start header color tab options
//        $traveladvisor_var_settings[] = array("name" => traveladvisor_var_theme_text_srt('traveladvisor_var_theme_modern_header_color'),
//            "id" => "tab-modern-header-color",
//            "std" => traveladvisor_var_theme_text_srt('traveladvisor_var_theme_modern_header_color'),
//            "type" => "section",
//            "options" => ""
//        );
//
//        $traveladvisor_var_settings[] = array("name" => traveladvisor_var_theme_text_srt('traveladvisor_var_theme_option_menu_link_color'),
//            "desc" => "",
//            "hint_text" => traveladvisor_var_theme_text_srt('traveladvisor_var_theme_option_menu_link_color_hint'),
//            "id" => "modern_menu_color",
//            "std" => "#282828",
//            "type" => "color"
//        );
//
//        $traveladvisor_var_settings[] = array("name" => traveladvisor_var_theme_text_srt('traveladvisor_var_theme_menu_active_link_color'),
//            "desc" => "",
//            "hint_text" => traveladvisor_var_theme_text_srt('traveladvisor_var_theme_option_menu_hover_color_hint'),
//            "id" => "modern_menu_active_color",
//            "std" => "#ed413f ",
//            "type" => "color"
//        );
        // footer colors 
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_footer_color' ),
            "id" => "tab-footer-color",
            "type" => "sub-heading"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_footer_bg_color' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "footerbg_color",
            "std" => "#333333",
            "type" => "color"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_footer_text_color' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "footer_text_color",
            "std" => "#999999",
            "type" => "color"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_footer_link_color' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "link_color",
            "std" => "#999999",
            "type" => "color"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_copyright_text_color' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "copyright_text_color",
            "std" => "#999999",
            "type" => "color"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_copyright_bg_color' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "copyright_bg_color",
            "std" => "#999999",
            "type" => "color"
        );

        // heading colors 
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_heading_color' ),
            "id" => "tab-heading-color",
            "type" => "sub-heading"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_heading_h1' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_h1_color",
            "std" => "#333333",
            "type" => "color"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_heading_h2' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_h2_color",
            "std" => "#333333",
            "type" => "color"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_heading_h3' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_h3_color",
            "std" => "#333333",
            "type" => "color"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_heading_h4' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_h4_color",
            "std" => "#333333",
            "type" => "color"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_heading_h5' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_h5_color",
            "std" => "#333333",
            "type" => "color"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_heading_h6' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_h6_color",
            "std" => "#333333",
            "type" => "color"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_section_title' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "section_title_color",
            "std" => "#333333",
            "type" => "color"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_post_title' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "post_title_color",
            "std" => "#333333",
            "type" => "color"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_page_title' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "page_title_color",
            "std" => "#333333",
            "type" => "color"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_widget_title' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "widget_title_color",
            "std" => "#333333",
            "type" => "color"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_footer_widget_title' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "footer_widget_title_color",
            "std" => "#333333",
            "type" => "color"
        );

        // start font family 

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_custom_font' ),
            "id" => "tab-custom-font",
            "type" => "sub-heading"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_custom_font_woff' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_custom_font_woff_hint' ),
            "id" => "custom_font_woff",
            "std" => "",
            "type" => "upload font"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_custom_font_ttf' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_custom_font_ttf_hint' ),
            "id" => "custom_font_ttf",
            "std" => "",
            "type" => "upload font"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_custom_font_svg' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_custom_font_svg_hint' ),
            "id" => "custom_font_svg",
            "std" => "",
            "type" => "upload font"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_custom_font_eot' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_custom_font_eot_hint' ),
            "id" => "custom_font_eot",
            "std" => "",
            "type" => "upload font"
        );


        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_google_font' ),
            "id" => "tab-font-family",
            "type" => "sub-heading"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_content_font' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_content_font_discription' ),
            "id" => "content_font",
            "std" => "Raleway",
            "type" => "gfont_select",
            'classes' => 'chosen-select',
            "options" => $traveladvisor_var_fonts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute_hint.' ),
            "id" => "content_font_att",
            "std" => "500",
            'classes' => 'chosen-select',
            "type" => "gfont_att_select",
            "options" => $traveladvisor_var_fonts_atts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_size' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "content_size",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_line_height' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "content_lh",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_transform' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "content_textr",
            "std" => "none",
            "type" => "select_ftext",
            'classes' => 'chosen-select',
            "options" => array( 'none' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_none' ), 'capitalize' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_capitalize' ), 'uppercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_uppercase' ), 'lowercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_lowercase' ), 'initial' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_initial' ), 'inherit' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_inherit' ) ),
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_letter_spacing' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "content_spc",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_main_menu_font' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_main_menu_font_hint' ),
            "id" => "mainmenu_font",
            "std" => "Raleway",
            'classes' => 'chosen-select',
            "type" => "gfont_select",
            "options" => $traveladvisor_var_fonts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute_hint.' ),
            "id" => "mainmenu_font_att",
            "std" => "700",
            'classes' => 'chosen-select',
            "type" => "gfont_att_select",
            "options" => $traveladvisor_var_fonts_atts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_size' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "mainmenu_size",
            "min" => '6',
            "max" => '50',
            "std" => "14",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_line_height' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "mainmenu_lh",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_transform' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "mainmenu_textr",
            "std" => "none",
            "type" => "select_ftext",
            'classes' => 'chosen-select',
            "options" => array( 'none' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_none' ), 'capitalize' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_capitalize' ), 'uppercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_uppercase' ), 'lowercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_lowercase' ), 'initial' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_initial' ), 'inherit' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_inherit' ), ),
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_letter_spacing' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "mainmenu_spc",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_Heading1_font' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_Heading_font_hint' ),
            "id" => "heading1_font",
            "std" => "Montserrat",
            'classes' => 'chosen-select',
            "type" => "gfont_select",
            "options" => $traveladvisor_var_fonts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute_hint.' ),
            "id" => "heading1_font_att",
            "std" => "700",
            'classes' => 'chosen-select',
            "type" => "gfont_att_select",
            "options" => $traveladvisor_var_fonts_atts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_size' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_1_size",
            "min" => '6',
            "max" => '50',
            "std" => "36",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_line_height' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_1_lh",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_transform' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_1_textr",
            "std" => "none",
            "type" => "select_ftext",
            'classes' => 'chosen-select',
            "options" => array( 'none' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_none' ), 'capitalize' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_capitalize' ), 'uppercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_uppercase' ), 'lowercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_lowercase' ), 'initial' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_initial' ), 'inherit' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_inherit' ) ),
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_letter_spacing' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_1_spc",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_Heading2_font' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_Heading_font_hint' ),
            "id" => "heading2_font",
            "std" => "",
            'classes' => 'chosen-select',
            "type" => "gfont_select",
            "options" => $traveladvisor_var_fonts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute_hint.' ),
            "id" => "heading2_font_att",
            "std" => "",
            'classes' => 'chosen-select',
            "type" => "gfont_att_select",
            "options" => $traveladvisor_var_fonts_atts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_size' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_2_size",
            "min" => '6',
            "max" => '50',
            "std" => "30",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_line_height' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_2_lh",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_transform' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_2_textr",
            "std" => "none",
            "type" => "select_ftext",
            'classes' => 'chosen-select',
            "options" => array( 'none' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_none' ), 'capitalize' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_capitalize' ), 'uppercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_uppercase' ), 'lowercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_lowercase' ), 'initial' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_initial' ), 'inherit' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_inherit' ) ),
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_letter_spacing' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_2_spc",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_Heading3_font' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_Heading_font_hint' ),
            "id" => "heading3_font",
            'classes' => 'chosen-select',
            "std" => "",
            "type" => "gfont_select",
            "options" => $traveladvisor_var_fonts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute_hint.' ),
            "id" => "heading3_font_att",
            "std" => "700",
            'classes' => 'chosen-select',
            "type" => "gfont_att_select",
            "options" => $traveladvisor_var_fonts_atts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_heading_3_size' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_3_size",
            "min" => '6',
            "max" => '50',
            "std" => "26",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_line_height' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_3_lh",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_transform' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_3_textr",
            "std" => "none",
            'classes' => 'chosen-select',
            "type" => "select_ftext",
            "options" => array( 'none' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_none' ), 'capitalize' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_capitalize' ), 'uppercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_uppercase' ), 'lowercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_lowercase' ), 'initial' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_initial' ), 'inherit' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_inherit' ) ),
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_letter_spacing' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_3_spc",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_Heading4_font' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_Heading_font_hint' ),
            "id" => "heading4_font",
            "std" => "",
            'classes' => 'chosen-select',
            "type" => "gfont_select",
            "options" => $traveladvisor_var_fonts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute_hint.' ),
            "id" => "heading4_font_att",
            "std" => "",
            'classes' => 'chosen-select',
            "type" => "gfont_att_select",
            "options" => $traveladvisor_var_fonts_atts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_size' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_4_size",
            "min" => '6',
            "max" => '50',
            "std" => "20",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_line_height' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_4_lh",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_transform' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_4_textr",
            "std" => "none",
            'classes' => 'chosen-select',
            "type" => "select_ftext",
            "options" => array( 'none' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_none' ), 'capitalize' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_capitalize' ), 'uppercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_uppercase' ), 'lowercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_lowercase' ), 'initial' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_initial' ), 'inherit' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_inherit' ) ),
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_letter_spacing' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_4_spc",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_Heading5_font' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_Heading_font_hint' ),
            "id" => "heading5_font",
            'classes' => 'chosen-select',
            "std" => "",
            "type" => "gfont_select",
            "options" => $traveladvisor_var_fonts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute_hint.' ),
            "id" => "heading5_font_att",
            "std" => "",
            'classes' => 'chosen-select',
            "type" => "gfont_att_select",
            "options" => $traveladvisor_var_fonts_atts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_size' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_5_size",
            "min" => '6',
            "max" => '50',
            "std" => "18",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_line_height' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_5_lh",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_transform' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_5_textr",
            "std" => "none",
            'classes' => 'chosen-select',
            "type" => "select_ftext",
            "options" => array( 'none' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_none' ), 'capitalize' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_capitalize' ), 'uppercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_uppercase' ), 'lowercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_lowercase' ), 'initial' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_initial' ), 'inherit' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_inherit' ) ),
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_letter_spacing' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_5_spc",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_Heading6_font' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_Heading_font_hint' ),
            "id" => "heading6_font",
            'classes' => 'chosen-select',
            "std" => "",
            "type" => "gfont_select",
            "options" => $traveladvisor_var_fonts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute_hint.' ),
            "id" => "heading6_font_att",
            "std" => "",
            'classes' => 'chosen-select',
            "type" => "gfont_att_select",
            "options" => $traveladvisor_var_fonts_atts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_size' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_6_size",
            "min" => '6',
            "max" => '50',
            "std" => "16",
            "type" => "range_font",
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_line_height' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_6_lh",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_transform' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_6_textr",
            'classes' => 'chosen-select',
            "std" => "none",
            "type" => "select_ftext",
            "options" => array( 'none' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_none' ), 'capitalize' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_capitalize' ), 'uppercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_uppercase' ), 'lowercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_lowercase' ), 'initial' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_initial' ), 'inherit' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_inherit' ) ),
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_letter_spacing' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "heading_6_spc",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_section_title_font' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_section_title_font_hint' ),
            "id" => "section_title_font",
            "std" => "",
            'classes' => 'chosen-select',
            "type" => "gfont_select",
            "options" => $traveladvisor_var_fonts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute_hint.' ),
            "id" => "section_title_font_att",
            "std" => "",
            'classes' => 'chosen-select',
            "type" => "gfont_att_select",
            "options" => $traveladvisor_var_fonts_atts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_size' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "section_title_size",
            "min" => '6',
            "max" => '50',
            "std" => "20",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_line_height' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "section_title_lh",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_transform' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "section_title_textr",
            "std" => "none",
            'classes' => 'chosen-select',
            "type" => "select_ftext",
            "options" => array( 'none' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_none' ), 'capitalize' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_capitalize' ), 'uppercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_uppercase' ), 'lowercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_lowercase' ), 'initial' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_initial' ), 'inherit' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_inherit' ) ),
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_letter_spacing' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "section_title_spc",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_page_title_font' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_page_title_hint' ),
            "id" => "page_title_font",
            "std" => "",
            'classes' => 'chosen-select',
            "type" => "gfont_select",
            "options" => $traveladvisor_var_fonts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute_hint.' ),
            "id" => "page_title_font_att",
            "std" => "",
            'classes' => 'chosen-select',
            "type" => "gfont_att_select",
            "options" => $traveladvisor_var_fonts_atts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_size' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "page_title_size",
            "min" => '6',
            "max" => '50',
            "std" => "20",
            "type" => "range_font",
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_line_height' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "page_title_lh",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_transform' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "page_title_textr",
            "std" => "none",
            'classes' => 'chosen-select',
            "type" => "select_ftext",
            "options" => array( 'none' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_none' ), 'capitalize' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_capitalize' ), 'uppercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_uppercase' ), 'lowercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_lowercase' ), 'initial' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_initial' ), 'inherit' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_inherit' ) ),
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_letter_spacing' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "page_title_spc",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_post_title_font' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_post_title_hint' ),
            "id" => "post_title_font",
            "std" => "",
            'classes' => 'chosen-select',
            "type" => "gfont_select",
            "options" => $traveladvisor_var_fonts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute_hint.' ),
            "id" => "post_title_font_att",
            "std" => "",
            'classes' => 'chosen-select',
            "type" => "gfont_att_select",
            "options" => $traveladvisor_var_fonts_atts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_size' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "post_title_size",
            "min" => '6',
            "max" => '50',
            "std" => "20",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_line_height' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "post_title_lh",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_transform' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "post_title_textr",
            "std" => "none",
            'classes' => 'chosen-select',
            "type" => "select_ftext",
            "options" => array( 'none' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_none' ), 'capitalize' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_capitalize' ), 'uppercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_uppercase' ), 'lowercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_lowercase' ), 'initial' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_initial' ), 'inherit' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_inherit' ) ),
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_letter_spacing' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "post_title_spc",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_sidebar_widget_font' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_sidebar_widget_font_hint' ),
            "id" => "widget_heading_font",
            "std" => "",
            'classes' => 'chosen-select',
            "type" => "gfont_select",
            "options" => $traveladvisor_var_fonts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute_hint.' ),
            "id" => "widget_heading_font_att",
            "std" => "",
            'classes' => 'chosen-select',
            "type" => "gfont_att_select",
            "options" => $traveladvisor_var_fonts_atts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_size' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "widget_heading_size",
            "min" => '6',
            "max" => '50',
            "std" => "18",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_line_height' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "widget_heading_lh",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_transform' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "widget_heading_textr",
            "std" => "none",
            'classes' => 'chosen-select',
            "type" => "select_ftext",
            "options" => array( 'none' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_none' ), 'capitalize' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_capitalize' ), 'uppercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_uppercase' ), 'lowercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_lowercase' ), 'initial' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_initial' ), 'inherit' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_inherit' ) ),
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_letter_spacing' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "widget_heading_spc",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_footer_widget_font' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_footer_widget_font_hint' ),
            "id" => "ft_widget_heading_font",
            "std" => "",
            'classes' => 'chosen-select',
            "type" => "gfont_select",
            "options" => $traveladvisor_var_fonts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_font_attribute_hint.' ),
            "id" => "ft_widget_heading_font_att",
            "std" => "",
            'classes' => 'chosen-select',
            "type" => "gfont_att_select",
            "options" => $traveladvisor_var_fonts_atts
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_size' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "ft_widget_heading_size",
            "min" => '6',
            "max" => '50',
            "std" => "18",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_line_height' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "ft_widget_heading_lh",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_transform' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "ft_widget_heading_textr",
            "std" => "none",
            'classes' => 'chosen-select',
            "type" => "select_ftext",
            "options" => array( 'none' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_none' ), 'capitalize' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_capitalize' ), 'uppercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_uppercase' ), 'lowercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_lowercase' ), 'initial' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_initial' ), 'inherit' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_inherit' ) ),
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_letter_spacing' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "ft_widget_heading_spc",
            "min" => '6',
            "max" => '50',
            "std" => "13",
            "type" => "range_font",
        );
        /* social icons setting */
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_social_icons' ),
            "id" => "tab-social-setting",
            "type" => "sub-heading"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_social_network' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "social_network",
            "std" => "",
            "type" => "networks",
            "options" => $social_network
        );
        // social Network setting 
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_social_sharing' ),
            "id" => "tab-social-network",
            "type" => "sub-heading"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_fb' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "facebook_share",
            "std" => "on",
            "type" => "checkbox" );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_twitter' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "twitter_share",
            "std" => "on",
            "type" => "checkbox" );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_g_plus' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "google_plus_share",
            "std" => "off",
            "type" => "checkbox" );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_linkedin' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "linkedin_share",
            "std" => "on",
            "type" => "checkbox" );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_dribbble' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "dribbble_share",
            "std" => "on",
            "type" => "checkbox" );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_stumbleupon' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "stumbleupon_share",
            "std" => "on",
            "type" => "checkbox" );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_share_more' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "share_share",
            "std" => "on",
            "type" => "checkbox" );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_sidebar' ),
            "id" => "tab-sidebar",
            "type" => "sub-heading"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_sidebar' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_sidebar_hint' ),
            "id" => "sidebar",
            "std" => $traveladvisor_var_sidebar,
            "type" => "sidebar",
            "options" => $traveladvisor_var_sidebar
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_default_pages' ),
            "id" => "default_pages",
            "std" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_default_pages_sidebar' ),
            "type" => "section",
            "options" => ""
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_default_pages_layout' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_default_pages_layout_hint' ),
            "id" => "default_page_layout",
            "std" => "sidebar_right",
            "type" => "layout",
            "options" => array(
                "sidebar_left" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_sidebar_left' ),
                "sidebar_right" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_sidebar_right' ),
                "no_sidebar" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_full_width' ),
            )
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_sidebar' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_default_pages_sidebar_hint' ),
            "id" => "default_layout_sidebar",
            "std" => "",
            "type" => "select_sidebar",
            "options" => $traveladvisor_var_sidebar
        );

        if ( class_exists( 'WooCommerce' ) ) {

            $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_wc_archive_sidebar' ),
                "id" => "woo_archive_pages",
                "std" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_wc_archive_sidebar' ),
                "type" => "section",
                "options" => ""
            );
            $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_layout' ),
                "desc" => "",
                "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_wc_archive_sidebar_discription' ),
                "id" => "woo_archive_layout",
                "std" => "sidebar_right",
                "type" => "layout",
                "options" => array(
                    "sidebar_left" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_sidebar_left' ),
                    "sidebar_right" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_sidebar_right' ),
                    "no_sidebar" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_sidebar_left' ),
                )
            );

            $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_sidebar' ),
                "desc" => "",
                "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_wc_archive_sidebar_hint' ),
                "id" => "woo_archive_sidebar",
                "std" => "",
                "type" => "select_sidebar",
                "options" => $traveladvisor_var_sidebar
            );
        }

        // Footer sidebar tab 
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_footer_sidebar' ),
            "id" => "tab-footer-sidebar",
            "type" => "sub-heading"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_footer_sidebar' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_sidebar_hint' ),
            "id" => "traveladvisor_footer_sidebar",
            "std" => $traveladvisor_var_footer_sidebar,
            "type" => "traveladvisor_var_footer_sidebar",
            "options" => $traveladvisor_var_footer_sidebar
        );

        // Footer sidebar tab 
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_maintaince_mode' ),
            "id" => "tab-coming-soon",
            "type" => "sub-heading"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_maintaince_mode' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_maintenance_mode_hint' ),
            "id" => "coming_soon_switch",
            "std" => "off",
            "type" => "checkbox",
            "options" => $on_off_option
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_maintenance_logo' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_maintenance_mode_logo_hint' ),
            "id" => "coming_logo_switch",
            "std" => "off",
            "type" => "checkbox",
            "options" => $on_off_option
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_maintenance_mode_social' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_maintenance_mode_social_hint' ),
            "id" => "coming_social_switch",
            "std" => "off",
            "type" => "checkbox",
            "options" => $on_off_option
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_maintenance_mode_newsletter' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_maintenance_mode_newsletter_hint' ),
            "id" => "coming_newsletter_switch",
            "std" => "off",
            "type" => "checkbox",
            "options" => $on_off_option
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_maintenance_mode_header' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_maintenance_mode_header_hint' ),
            "id" => "header_switch",
            "std" => "off",
            "type" => "checkbox",
            "options" => $on_off_option
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_maintenance_mode_footer' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_maintenance_mode_footer_hint' ),
            "id" => "footer_setting",
            "std" => "off",
            "type" => "checkbox",
            "options" => $on_off_option
        );
        $args = array(
            'sort_order' => 'asc',
            'sort_column' => 'post_title',
            'hierarchical' => 1,
            'exclude' => '',
            // 'include' => '',
            'meta_key' => '',
            'meta_value' => '',
            'authors' => '',
            'child_of' => 0,
            'parent' => -1,
            'exclude_tree' => '',
            'number' => '',
            'offset' => 0,
            'post_type' => 'page',
            'post_status' => 'publish'
        );

        $traveladvisor_var_pages = get_pages( $args );
//print_r($pages );
        $traveladvisor_var_options_array = array();
        $traveladvisor_var_options_array[] = 'Please Select a Page';
        foreach ( $traveladvisor_var_pages as $traveladvisor_var_page ) {

            $traveladvisor_var_options_array[$traveladvisor_var_page->ID] = isset( $traveladvisor_var_page->post_title ) && ($traveladvisor_var_page->post_title != '') ? $traveladvisor_var_page->post_title : 'No Title';
        }


        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_maintenance_mode_page' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_maintenance_mode_page_hint' ),
            "id" => "maintinance_mode_page",
            "std" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_maintenance_select_page' ),
            "type" => "select",
            'classes' => 'chosen-select',
            "options" => $traveladvisor_var_options_array
        );


        /*
         * End Maintenance Mode and Start Api Setting
         */

        //Mailchimp List
        $mail_chimp_list[] = '';
        if ( isset( $traveladvisor_var_options['traveladvisor_var_mailchimp_key'] ) ) {
            $mailchimp_option = $traveladvisor_var_options['traveladvisor_var_mailchimp_key'];
            if ( $mailchimp_option <> '' ) {

                if ( function_exists( 'traveladvisor_mailchimp_list' ) ) {
                    $mc_list = traveladvisor_mailchimp_list( $mailchimp_option );

                    if ( is_array( $mc_list ) && isset( $mc_list['data'] ) ) {
                        foreach ( $mc_list['data'] as $list ) {
                            $mail_chimp_list[$list['id']] = $list['name'];
                        }
                    }
                }
            }
        }
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_maintaince_mode' ),
            "id" => "tab-api-setting",
            "type" => "sub-heading"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_mailchimp_key' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_mailchimp_key_hint' ),
            "id" => "mailchimp_key",
            "std" => "",
            "type" => "text" );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_mailchimp_list' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "mailchimp_list",
            "std" => "on",
            "type" => "mailchimp",
            "classes" => 'chosen-select',
            "options" => $mail_chimp_list
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_flickr_api_setting' ),
            "id" => "flickr_api_setting",
            "std" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_flickr_api_setting' ),
            "type" => "section",
            "options" => ""
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_flickr_key' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_flickr_key_hint' ),
            "id" => "flickr_key",
            "std" => "",
            "type" => "text" );
        /*
         * End Api Setting
         */

        /*
         * Twitter API setting 
         */

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_api_setting' ),
            "id" => "twitter_api_setting",
            "std" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_api_setting' ),
            "type" => "section",
            "options" => ""
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_show_twitter' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_key_hint' ),
            "id" => "twitter_api_switch",
            "std" => "",
            "type" => "checkbox",
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_cache_time_limit' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_cache_time_limit_hint' ),
            "id" => "cache_limit_time",
            "std" => "",
            "type" => "text" );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_num' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_num_hint' ),
            "id" => "tweet_num_post",
            "std" => "",
            "type" => "text" );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_date_time_formate' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_date_time_formate_hint' ),
            "id" => "twitter_datetime_formate",
            "std" => "",
            'classes' => 'chosen-select',
            "type" => "select",
            "options" => array(
                'default' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_date_time_formate_1' ),
                'eng_suff' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_date_time_formate_2' ),
                'ddmm' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_date_time_formate_3' ),
                'ddmmyy' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_date_time_formate_4' ),
                'full_date' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_date_time_formate_5' ),
                'time_since' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_date_time_formate_6' ),
            )
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_consumer_key' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_consumer_key_hint' ),
            "id" => "consumer_key",
            "std" => "",
            "type" => "text" );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_consumer_secret_key' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_consumer_secret_key_hint' ),
            "id" => "consumer_secret_key",
            "std" => "",
            "type" => "text" );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_access_token' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_access_token_hint' ),
            "id" => "access_token",
            "std" => "",
            "type" => "text" );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_access_token_secret' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_twitter_access_token_secret_hint' ),
            "id" => "access_token_secret",
            "std" => "",
            "type" => "text" );
        /*
         * End Twitter API setting
         */

		$traveladvisor_var_settings[] = array( 
			"name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_google_settings' ),
            "id" => "twitter_api_setting",
            "std" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_google_settings' ),
            "type" => "section",
            "options" => ""
        );
		
		$traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_google_api_key' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_google_api_key' ),
            "id" => "google_api_key",
            "std" => "",
            "type" => "text" 
		);

        /*
         * TGoogle Maps API Setting
         */




        /*
         * End Google Maps API Setting
         */



        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_import_export' ),
            "fontawesome" => 'icon-database',
            "id" => "tab-import-export-options",
            "std" => "",
            "type" => "main-heading",
            "options" => ""
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_import_export' ),
            "id" => "tab-import-export-options",
            "type" => "sub-heading"
        );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_backup_option' ),
            "std" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_backup_option' ),
            "id" => "theme-bakups-options",
            "type" => "section"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_backup' ),
            "desc" => "",
            "hint_text" => __( "", 'traveladvisor' ),
            "id" => "traveladvisor_backup_options",
            "std" => "",
            "type" => "generate_backup"
        );

        if ( class_exists( 'traveladvisor_var_widget_data' ) ) {

            $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_widgets_backup_options' ),
                "std" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_widgets_backup_options' ),
                "id" => "widgets-bakups-options",
                "type" => "section"
            );

            $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_widgets_backup' ),
                "desc" => "",
                "hint_text" => '',
                "id" => "traveladvisor_widgets_backup",
                "std" => "",
                "type" => "widgets_backup"
            );
        }



        $traveladvisor_var_settings[] = array(
            "id" => "theme_option_save_flag",
            "std" => md5( uniqid( rand(), true ) ),
            "type" => "hidden_field"
        );

        $traveladvisor_var_settings[] = array(
            "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_custom_fields' ),
            "fontawesome" => 'icon-cog3',
            "type" => "heading",
            "options" => array(
                'tab-cusfields-jobs' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_tour_fields' ),
        ) );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_tour_fields' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_add_custom_fields' ),
            "id" => "tab-cusfields-jobs",
            "std" => "",
            "type" => "sub-heading" );

        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_tour_fields' ),
            "std" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_tour_fields' ),
            "id" => "tours-fields-options",
            "type" => "section"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_custom_fields' ),
            "desc" => "",
            "hint_text" => "",
            "id" => "cs-custom-fields",
            "std" => "",
            "type" => "tours-custom-fields",
        );
        ///maps
        $traveladvisor_var_settings[] = array(
            "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_google_map_api' ),
            "fontawesome" => 'icon-map',
            "type" => "heading",
            "options" => array(
                'tab-gmaps-section' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_google_maps' ),
        ) );

        $traveladvisor_var_settings[] = array(
            "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_google_maps' ),
            "desc" => "",
            "hint_text" => '',
            "id" => "tab-gmaps-section",
            "std" => "",
            "type" => "sub-heading"
        );
        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_google_map_api_setting' ),
            "id" => "google_maps_setting",
            "std" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_google_map_api_setting' ),
            "type" => "section",
            "options" => ""
        );

        $traveladvisor_var_settings[] = array(
            "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_google_map_language' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_google_map_language_hint' ),
            "id" => "lan_code",
            "std" => "ja",
            "type" => "text"
        );
        $traveladvisor_var_settings[] = array(
            "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_google_map_region_code' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_google_map_region_code_hint' ),
            "id" => "reg_code",
            "std" => "JP",
            "type" => "text"
        );
        $traveladvisor_var_settings[] = array(
            "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_maps_icon' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_maps_icon_hint' ),
            "id" => "google_maps_src_icon",
            "std" => "",
            "tab" => "google_maps_src_icon",
            "display" => "none",
            "type" => "upload logo"
        );
        $traveladvisor_var_settings[] = array(
            "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_map_des_icon' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_map_des_icon_hint' ),
            "id" => "google_maps_dest_icon",
            "std" => "",
            "tab" => "google_maps_dest_icon",
            "display" => "none",
            "type" => "upload logo"
        );
        $traveladvisor_var_settings[] = array(
            "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_google_map_zoom_level' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_option_google_map_zoom_level_hint' ),
            "id" => "zoom_level",
            "std" => "",
            "type" => "text"
        );




        $traveladvisor_var_settings[] = array( "name" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_style' ),
            "desc" => "",
            "hint_text" => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_style_hint' ),
            "id" => "def_map_style",
            "std" => "",
            "type" => "select",
            'classes' => 'chosen-select-no-single',
            "options" => array(
                'map-box' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_style_1' ),
                'blue-water' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_style_2' ),
                'icy-blue' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_style_3' ),
                'bluish' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_style_4' ),
                'light-blue-water' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_style_5' ),
                'clad-me' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_style_6' ),
                'chilled' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_style_7' ),
                'two-tone' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_style_8' ),
                'light-and-dark' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_style_9' ),
                'ilustracao' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_style_10' ),
                'flat-pale' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_style_11' ),
                'title' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_style_12' ),
                'moret' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_style_13' ),
                'shunli_home' => 'shunli home',
                'new' => 'new',
                'pinky_wedding' => 'Pinky Wedding',
                'photobooth' => 'Photobooth',
                'mapa_blanco' => 'MapaBlanco',
                'mint' => 'mint',
                'zenmap' => 'Zenmap2.0',
                'paper' => 'Paper',
                'bentley' => 'Bentley',
            )
        );







        /*  Automatic Updater */
        $traveladvisor_var_settings[] = array( "name" => __( "Auto Update", 'traveladvisor' ),
            "fontawesome" => 'icon-tasks',
            "id" => "tab-auto-updater",
            "std" => "",
            "type" => "main-heading",
            "options" => ""
        );
        $traveladvisor_var_settings[] = array( "name" => __( "Auto Update Theme", 'traveladvisor' ),
            "id" => "tab-auto-updater",
            "with_col" => true,
            "type" => "sub-heading"
        );
        $traveladvisor_var_settings[] = array( "name" => __( "Automatic Upgrade", 'traveladvisor' ),
            "desc" => "",
            "hint_text" => esc_html__( "", 'traveladvisor' ),
            "id" => "traveladvisor_backup_options",
            "std" => "",
            "type" => "automatic_upgrade"
        );
        $traveladvisor_var_settings[] = array( "name" => __( "Marketplace Username", 'traveladvisor' ),
            "desc" => "",
            "hint_text" => __( "Enter your Marketplace Username.", 'traveladvisor' ),
            "id" => "traveladvisor_marketplace_username",
            "std" => "",
            "type" => "text" );
        $traveladvisor_var_settings[] = array( "name" => __( "Secret API Key", 'traveladvisor' ),
            "desc" => "",
            "hint_text" => __( "Enter your Secret API key.", 'traveladvisor' ),
            "id" => "traveladvisor_secret_api_key",
            "std" => "",
            "type" => "text" );
        $traveladvisor_var_settings[] = array( "name" => __( "Skip Theme Backup", 'traveladvisor' ),
            "desc" => "",
            "hint_text" => __( "Do you want to skip theme backup?", 'traveladvisor' ),
            "id" => "traveladvisor_skip_theme_backup",
            "std" => "on",
            "type" => "checkbox",
        );
        $traveladvisor_var_settings[] = array( "col_heading" => __( "Attention User Account Information!", 'traveladvisor' ),
            "type" => "col-right-text",
            "help_text" => __( "To obtain your API Key, visit your \"My Settings\" page on any of the Envato 
							Marketplaces. Once a valid connection has been made any changes to the API 
							key below for this username will not effect the results for 5 minutes 
							because they're cached in the database. If you have already made an API 
							connection and just purchase a theme and it's not showing up, wait five 
							minutes and refresh the page. If the theme is still not showing up, it's 
							possible the author has not made it available for auto install yet.", 'traveladvisor' )
        );
		$traveladvisor_var_settings[] = array(
            "type" => "division_close",
        );
    }

}
