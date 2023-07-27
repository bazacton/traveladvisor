<?php

/**
 * Static string Return
 */
if ( ! function_exists( 'traveladvisor_var_theme_text_srt' ) ) {

    function traveladvisor_var_theme_text_srt( $str = '' ) {
        global $traveladvisor_var_static_text;
        if ( isset( $traveladvisor_var_static_text[$str] ) ) {
            return $traveladvisor_var_static_text[$str];
        }
    }

}
if ( ! class_exists( 'traveladvisor_theme_all_strings' ) ) {

    class traveladvisor_theme_all_strings {

        public function __construct() {
            $this->traveladvisor_theme_strings();
        }

        public function traveladvisor_theme_option_strings() {

            global $traveladvisor_var_static_text;
            /*
             * Theme Options
             */
            $traveladvisor_var_static_text['traveladvisor_var_theme_reply'] = __( 'Reply ', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_save_msg'] = __( 'Saving changes...', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_save_msg'] = __( 'Save All Settings', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_reset_msg'] = __( 'Reset All Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_please_select'] = __( 'Please Select', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_breadcrumbs_sub_header'] = __( 'Breadcrumbs Sub Header', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_revolution_slider'] = __( 'Revolution Slider', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_no_sub_header'] = __( 'No sub Header', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_general'] = __( 'General', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_global'] = __( 'Global', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_header'] = __( 'Header', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_sub_header'] = __( 'Sub Header', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_social_icons'] = __( 'Social icons', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_social_sharing'] = __( 'Social sharing', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_color'] = __( 'Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading'] = __( 'Headings', 'traveladvisor' );
            /*
             * Global Setting 
             */
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_custom_favicon'] = __( 'Custom favicon', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_custom_favicon_hint'] = __( 'Custom favicon for your site', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_rtl'] = __( 'RTL', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_rtl_hint'] = __( 'Turn RTL On/Off here for Right to Left languages like Arabic etc.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_responsive'] = __( 'Responsive', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_responsive_hint'] = __( 'Set responsive design layout for mobile devices On/Off here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_excerpt'] = __( 'Excerpt', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_excerpt_hint'] = __( 'Set excerpt length/limit from here. It controls text limit for all posts content', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_global_settings'] = __( 'Global Settings', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_global_settings_hint'] = __( 'This is Global Settings.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_default_header_style'] = __( 'Default Header Style', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_default_header_style_hint'] = __( 'Choose default header style for complete site', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_default'] = __( 'Default', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_std_default'] = __( 'default', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_modern'] = __( 'Modern', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_logo'] = __( 'Logo', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_logo_hint'] = __( 'Upload your custom logo in .png .jpg .gif formats only.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_logo_modern'] = __( 'Logo Modern', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_logo_height'] = __( 'Logo Height', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_logo_height_hint'] = __( 'Set exact logo height otherwise logo will not display normally.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_logo_width'] = __( 'Logo Width', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_logo_width_hint'] = __( 'Set exact logo width otherwise logo will not display normally.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_logo_margin_top'] = __( 'Logo margin top', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_logo_margin_top_hint'] = __( 'Logo spacing margin from top', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_logo_margin_bottom'] = __( 'Logo margin bottom', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_logo_margin_bottom_hint'] = __( 'Logo spacing margin from bottom.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_logo_margin_right'] = __( 'Logo margin right', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_logo_margin_right_hint'] = __( 'Logo spacing margin from right.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_logo_margin_left'] = __( 'Logo margin left', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_logo_margin_left_hint'] = __( 'Logo spacing margin from left', 'traveladvisor' );
            /*
             * WooCommerce
             */
            $traveladvisor_var_static_text['traveladvisor_var_wooCommerce'] = __( 'WooCommerce', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_wooCommerce_cart_icon'] = __( 'WooCommerce Cart Icon', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_wc_archive_sidebar'] = __( 'WooCommerce Archive Sidebar', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_wc_archive_sidebar_discription'] = __( 'Set Sidebar for WooCommerce Archive, Category etc', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_wc_archive_sidebar_hint'] = __( 'Select Sidebar for WooCommerce Archive, Category etc', 'traveladvisor' );
            /*
             *
             * Sub Header
             */
            $traveladvisor_var_static_text['traveladvisor_var_default_sub_header'] = __( 'Default Sub Header', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_default_sub_header_hint'] = __( 'Sub Header settings made here will be implemented on all pages.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_header_border_color'] = __( 'Header Border Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_revolution_slider_hint'] = __( 'Please select Revolution Slider if already included in package. Otherwise buy Sliders from Code canyon But its optional', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_style'] = __( 'Style', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_text_align'] = __( 'Content Text Align', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_text_align_hint'] = __( 'This option will move your page title towards left, right or center..', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_text_align_left'] = __( 'Left', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_text_align_right'] = __( 'Right', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_text_align_center'] = __( 'Center', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_classic'] = __( 'Classic', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_with_background_image'] = __( 'With Background Image', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_padding_top'] = __( 'Padding Top', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_sub_header_padding_top_hint'] = __( 'Set custom padding for sub header content top area.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_padding_bottom'] = __( 'Padding Bottom', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_sub_header_padding_bottom_hint'] = __( 'Set custom padding for sub header content bottom area.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_margin_top'] = __( 'Margin Top', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_sub_header_margin_top_hint'] = __( 'Set custom Margin for sub header content top area.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_margin_bottom'] = __( 'Margin Bottom', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_margin_bottom_hint'] = __( 'Set custom Margin for sub header content bottom area.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_page_title'] = __( 'Page Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_text_align'] = __( 'Content Text Align', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_left'] = __( 'Left', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_center'] = __( 'Center', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_right'] = __( 'Right', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_text_color'] = __( 'Text Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_breadcrumbs'] = __( 'Breadcrumbs', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_sub_heading'] = __( 'Sub Heading', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_bg_image_hint'] = __( 'Upload background image in .png .jpg .gif formats only.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_parallax'] = __( 'Parallax', 'traveladvisor' );
            /*
             * Footer Options
             */
            $traveladvisor_var_static_text['traveladvisor_var_footer_options'] = __( 'Footer options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_section'] = __( 'Footer section', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_section_hint'] = __( 'enable/disable footer area', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_widgets'] = __( 'Footer Widgets', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_widgets_hint'] = __( 'enable/disable footer widget area', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_copy_write_section'] = __( 'Copyright Section', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_copy_write_section_hint'] = __( 'enable/disable Copy Write Section', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_copyright_text'] = __( 'Copyright Text', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_copyright_text_hint'] = __( 'write your own copyright text', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_copyright_text_value'] = __( ' 2015 traveladvisor Name All rights reserved. Design by Chimp Studio', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_contact_number'] = __( 'Contact Number', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_contact_number_hint'] = __( 'Write your contact number', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_contact_number_value'] = __( '+0 (123) 456-789-10', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_back_to_top'] = __( 'To Top', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_back_to_top_hint'] = __( 'Enable/disable footer back to top option.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_card1'] = __( 'Payment gateway picture 1', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_card1_hint'] = __( 'Set payment gateway picture 1, that will appear in footer', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_card2'] = __( 'Payment gateway picture 2', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_card2_hint'] = __( 'Set payment gateway picture 2, that will appear in footer', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_card3'] = __( 'Payment gateway picture 3', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_card3_hint'] = __( 'Set payment gateway picture 3, that will appear in footer', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_card4'] = __( 'Payment gateway picture 4', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_card4_hint'] = __( 'Set payment gateway picture 4, that will appear in footer', 'traveladvisor' );
            /*
             * Colors
             */
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_general_color'] = __( 'General Colors', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_color'] = __( 'Theme Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_color_hint'] = __( 'Choose theme skin color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_text_color'] = __( 'Body Text Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_text_color_hint'] = __( 'Choose text color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_header_color'] = __( 'Header colors', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_default_header_colors'] = __( 'Default Header Colors', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_default_header_colors_hint'] = __( 'Change Header background color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_menu_link_color'] = __( 'Menu Link color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_menu_link_color_hint'] = __( 'Change Header Menu Link color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_menu_hover_color'] = __( 'Menu Hover / Active Link color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_menu_hover_color_hint'] = __( 'Change Header Menu Active Link color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_submenu_hover_bg_color'] = __( 'Submenu Hover Background', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_submenu_hover_bg_color_hint'] = __( 'Change Submenu Hover Background color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_submenu_link_color'] = __( 'Submenu Link Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_submenu_link_color_hint'] = __( 'Change Submenu Link color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_submenu_hover_color'] = __( 'Submenu Hover / Active Link Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_submenu_hover_color_hint'] = __( 'Change Submenu Hover / Active Link color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_footer_color'] = __( 'footer colors', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_footer_bg_color'] = __( 'Footer Background Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_footer_text_color'] = __( 'Footer Text Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_footer_link_color'] = __( 'Footer Link Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_copyright_text_color'] = __( 'Copyright Text', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_copyright_bg_color'] = __( 'Copyright Background Color', 'traveladvisor' );
            /*
             * heading colors
             */
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_heading_color'] = __( 'heading colors', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_heading_h1'] = __( 'heading h1', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_heading_h2'] = __( 'heading h2', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_heading_h3'] = __( 'heading h3', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_heading_h4'] = __( 'heading h4', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_heading_h5'] = __( 'heading h5', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_heading_h6'] = __( 'heading h6', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_section_title'] = __( 'Section Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_post_title'] = __( 'Post Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_page_title'] = __( 'Page Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_widget_title'] = __( 'Widgets Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_widget_title'] = __( 'Footer Widgets Title', 'traveladvisor' );
            /*
             * Custom Font
             */
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_custom_font_woff'] = __( 'Custom Font .woff', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_custom_font_woff_hint'] = __( 'Upload Your Custom Font file in .woff format', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_custom_font_ttf'] = __( 'Custom Font .ttf', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_custom_font_ttf_hint'] = __( 'Upload Your Custom Font file in .ttf format', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_custom_font_svg'] = __( 'Custom Font .svg', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_custom_font_svg_hint'] = __( 'Upload Your Custom Font file in .svg format', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_custom_font_eot'] = __( 'Custom Font .eot', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_custom_font_eot_hint'] = __( 'Upload Your Custom Font file in .eot format', 'traveladvisor' );
            /*
             * Google Fonts
             */
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_content_font'] = __( 'Content Font', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_content_font_discription'] = __( 'Set fonts for Body text', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_font_attribute'] = __( 'Font Attribute', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_size'] = __( 'Size', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_line_height'] = __( 'Line Height', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_text_transform'] = __( 'Text Transform', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_none'] = __( 'none', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_capitalize'] = __( 'capitalize', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_uppercase'] = __( 'uppercase', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_lowercase'] = __( 'lowercase', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_initial'] = __( 'initial', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_inherit'] = __( 'inherit', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_letter_spacing'] = __( 'Letter Spacing', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_main_menu_font'] = __( 'Main Menu Font', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_main_menu_font_hint'] = __( 'Set font for main Menu. It will be applied to sub menu as well', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_font_attribute_hint.'] = __( 'Set Font Attribute', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_Heading1_font'] = __( 'Heading 1 Font', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_Heading_font_hint'] = __( 'Select font for Headings. It will apply on all posts and pages headings', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_Heading2_font'] = __( 'Heading 2 Font', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_Heading3_font'] = __( 'Heading 3 Font', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_Heading4_font'] = __( 'Heading 4 Font', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_Heading5_font'] = __( 'Heading 5 Font', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_Heading6_font'] = __( 'Heading 6 Font', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_section_title_font'] = __( 'Section Title Font', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_section_title_font_hint'] = __( 'Set font for Section Title Headings', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_page_title_font'] = __( 'Page Title Font', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_font_page_title_hint'] = __( 'Set font for Page Title Headings', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_post_title_font'] = __( 'Post Title Font', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_font_post_title_hint'] = __( 'Set font for Post Title Headings', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_sidebar_widget_font'] = __( 'Sidebar Widget Font', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_sidebar_widget_font_hint'] = __( 'Set font for Widget Headings', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_footer_widget_font'] = __( 'Footer Widget Font', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_footer_widget_font_hint'] = __( 'Set font for Footer Widget Headings', 'traveladvisor' );
            /*
             * Social Network
             */
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_social_network'] = __( 'Social Network', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_fb'] = __( 'Facebook', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_twitter'] = __( 'Twitter', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_g_plus'] = __( 'Google Plus', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_tumblr'] = __( 'Tumblr', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_linkedin'] = __( 'Linkedin', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_dribbble'] = __( 'Dribbble', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_instagram'] = __( 'Instagram', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_stumbleupon'] = __( 'StumbleUpon', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_youtube'] = __( 'youtube', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_share_more'] = __( 'share more', 'traveladvisor' );
            /*
             * Sidebar
             */
            $traveladvisor_var_static_text['traveladvisor_var_sidebar'] = __( 'Select Sidebar', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_sidebar_name'] = __( 'Sidebar Name', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_sidebar_hint'] = __( 'Select a sidebar from the list already given. (Nine pre-made sidebars are given)', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_default_pages'] = __( 'Default Pages', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_default_pages_sidebar'] = __( 'Default Pages Sidebar', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_default_pages_layout'] = __( 'Default Pages Layout', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_default_pages_layout_hint'] = __( 'Set Sidebar for all pages like Search, Author Archive, Category Archive etc', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_default_pages_sidebar_hint'] = __( 'Select pre-made sidebars for default pages on sidebar layout. Full width layout cannot have sidebars', 'traveladvisor' );
            /**
             * Maintenance Mode
             */
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_maintenance_mode_hint'] = __( 'Turn Maintenance Mode On/Off here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_maintenance_mode_logo_hint'] = __( 'Turn Logo On/Off here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_maintenance_mode_social'] = __( 'Social Contact', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_maintenance_mode_social_hint'] = __( 'Turn Social Contact On/Off here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_maintenance_mode_newsletter'] = __( 'Newsletter', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_maintenance_mode_newsletter_hint'] = __( 'Turn newsletter On/Off here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_maintenance_mode_header'] = __( 'Header Switch', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_maintenance_mode_header_hint'] = __( 'Turn Header On/Off here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_maintenance_mode_footer'] = __( 'Footer Switch', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_maintenance_mode_footer_hint'] = __( 'Turn Footer On/Off here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_maintenance_mode_no_title'] = __( 'No Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_maintenance_mode_page'] = __( 'Maintinance Mode page', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_maintenance_mode_page_hint'] = __( 'Choose a page that you want to set for maintinance mode', 'traveladvisor' );
            /**
             * API Setting
             */
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_mailchimp_key'] = __( 'Mail Chimp Key', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_mailchimp_key_hint'] = __( 'Enter a valid Mail Chimp API key here to get started. Once you\'\'ve done that, you can use the Mail Chimp Widget from the Widgets menu. You will need to have at least Mail Chimp list set up before the using the widget. You can get your mail chimp activation key', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_mailchimp_list'] = __( 'Mail Chimp List', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_flickr_api_setting'] = __( 'Flickr API Setting', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_flickr_key'] = __( 'Flickr key', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_flickr_key_hint'] = __( 'add your flickr key here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_api_setting'] = __( 'Twitter API Setting', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_consumer_key'] = __( 'Consumer Key', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_consumer_key_hint'] = __( 'insert your consumer key here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_cache_time_limit'] = __( 'Cache Time Limit', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_cache_time_limit_hint'] = __( 'Please enter the time limit in minutes for refresh cache.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_num'] = __( 'Number of tweet', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_num_hint'] = __( 'Please enter number of tweet that you get from twitter for chache file.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_date_time_formate'] = __( 'Date Time Formate', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_date_time_formate_hint'] = __( 'Select date time formate for every tweet.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_date_time_formate_1'] = __( 'Displays November 06 2012', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_date_time_formate_2'] = __( 'Displays 6th November', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_date_time_formate_3'] = __( 'Displays 06 Nov', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_date_time_formate_4'] = __( 'Displays 06 Nov 2012', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_date_time_formate_5'] = __( 'Displays Tues 06 Nov 2012', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_date_time_formate_6'] = __( 'Displays in hours, minutes etc', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_consumer_secret'] = __( 'Consumer Secret', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_consumer_secret_hint'] = __( 'insert your cunsumer secret key here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_access_token'] = __( 'Access Token', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_access_token_hint'] = __( 'insert access token here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_access_token_secret'] = __( 'Access Token Secret', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_access_token_secret_hint'] = __( 'insert access token secret here.', 'traveladvisor' );
			
			$traveladvisor_var_static_text['traveladvisor_var_theme_option_google_settings'] = __( 'Google settings', 'traveladvisor' );
			$traveladvisor_var_static_text['traveladvisor_var_theme_option_google_api_key'] = __( 'Google API Key', 'traveladvisor' );
            /**
             * import & export
             */
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_import_export'] = __( 'import & export', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_backup_option'] = __( 'Theme Backup Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_backup'] = __( 'Backup', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_widgets_backup_options'] = __( 'Widgets Backup Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_widgets_backup'] = __( 'Widgets Backup', 'traveladvisor' );
            /**
             * Menu
             */
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_typo_font'] = __( 'Typography / Fonts', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_custom_font'] = __( 'Custom Font', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_google_font'] = __( 'Google Fonts', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_sidebar'] = __( 'Sidebar', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_footer_sidebar'] = __( 'Footer sidebar', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_maintaince_mode'] = __( 'MAINTENANCE MODE', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_api_setting'] = __( 'API Setting', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_layout'] = __( 'Layout', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_layout_type'] = __( 'Layout type', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_box'] = __( 'Boxed', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_background'] = __( 'Background', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_bgcolor'] = __( 'Background color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_pattern'] = __( 'Pattern', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_custom_image'] = __( 'Custom Image', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_background_image'] = __( 'Background image', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_bg_image_hint'] = __( 'Choose from Predefined Background images.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_bg_pattern'] = __( 'Background pattern', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_bg_pattern_hint'] = __( 'Choose from Predefined Pattern images.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_bgcolor_hint'] = __( 'Provide a hex color code here (with #) for theme background color.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_layout_hint'] = __( 'This option can be used only with Boxed Layout.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_bg_image_position'] = __( 'Background image position', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_bg_image_position_hint'] = __( 'Choose image position for body background', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_no_repeat_center_top'] = __( 'no-repeat center top', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_repeat_center_top'] = __( 'repeat center top', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_no_repeat_center'] = __( 'no-repeat center', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_repeat_center'] = __( 'Repeat Center', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_no_repeat_left_top'] = __( 'no-repeat left top', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_repeat_left_top'] = __( 'repeat left top', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_no_repeat_fixed_center'] = __( 'no-repeat fixed center', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_no_repeat_fixed_center_cover.'] = __( 'no-repeat fixed center / cover', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_woocommerce_add_to_cart'] = __( 'add to cart', 'traveladvisor' );

            /**
             * Updated
             */
            $traveladvisor_var_static_text['traveladvisor_var_footer'] = __( 'Footer', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_full_width'] = __( 'Full Width', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_select_currency'] = __( 'Select Currency', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_currency_dropdown'] = __( 'Select your currency from the given dropdown', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_currency_sign'] = __( 'Currency Sign', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_currency_sign_hint'] = __( 'Add your currency sign according to your currency. It will be printed on both frontend and backend.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_background_tab'] = __( 'background_tab', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_background_tab_color'] = __( 'background_tab_color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_background_pattern_tab'] = __( 'pattern_tab', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_background_custom_image_tab'] = __( 'custom_image_tab', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_background_center_repeat'] = __( 'Center Repeat', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_auto_sidebar'] = __( 'Auto Sidebar', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_auto_sidebar_hint'] = __( 'Enable Or Disable the sidebar from the view', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_choose_auto_sidebar'] = __( 'Choose Auto Sidebar', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_choose_auto_sidebar_hint'] = __( 'Select a sidebar from the list already given. (Nine pre-made sidebars are given)', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_maps_icon'] = __( 'Maps Source Icon', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_maps_icon_hint'] = __( 'Upload source indicator image(.png file).', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_map_des_icon'] = __( 'Maps Destination Icon', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_map_des_icon_hint'] = __( 'Upload destination indicator image(.png file).', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_map_zoom_level'] = __( 'Map Zoom Level', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_map_zoom_level_hint'] = __( 'Add Map Zoom Level', 'traveladvisor' );

            $traveladvisor_var_static_text['traveladvisor_var_theme_subheader_border_color'] = __( 'Border Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_subheader_fancy_heading'] = __( 'Fancy Heading', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_advance_search_box'] = __( 'Advance Search Box', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_advance_search_box_hint'] = __( 'Toggle  the advance search bar view under the sub header', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_search_result_page'] = __( 'Search Result Page', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_search_result_page_hint'] = __( 'The page responsible for displaying search result , work only if advance search box is enabled.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_select_result_page'] = __( 'Select Result Page', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_menu'] = __( 'Footer Menu', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_menu_hint'] = __( 'Enable/disable footer menu from here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_logo'] = __( 'Footer Logo', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_logo_hint'] = __( 'Choose footer logo from media gallery.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_logo_link'] = __( 'Footer logo Link', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_logo_link_hint'] = __( 'Footer Logo', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_ena/dis_soc_icons'] = __( 'enable/disable Social Icons', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_submenu_bg'] = __( 'Submenu Background', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_submenu_bg_hint'] = __( 'Change Submenu Background color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_modern_header_color'] = __( 'Modern Header Colors', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_menu_active_link_color'] = __( 'Menu Active Link color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_heading_3_size'] = __( 'Heading 3 Size', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_full_width'] = __( 'Full Width', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_sidebar_right'] = __( 'Sidebar Right', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_sidebar_left'] = __( 'Sidebar Left', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_maintenance_logo'] = __( 'Show Logo', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_maintenance_select_page'] = __( 'Select A page', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_show_twitter'] = __( 'Show twitter', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_key_hint'] = __( 'Turn twitter option On/Off here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_consumer_secret_key'] = __( 'Consumer secret key', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_twitter_consumer_secret_key_hint'] = __( 'Add your consumer secret key here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_google_map_api_setting'] = __( 'Google Maps  Setting', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_api_key'] = __( 'Api Key', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_api_key_hint'] = __( 'Add google map api key here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_custom_fields'] = __( 'Custom Fields', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_tour_fields'] = __( 'tours fields', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_add_custom_fields'] = __( 'Add custom fields here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_google_map_api'] = __( 'Maps Settings', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_google_maps'] = __( 'Google Maps', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_google_map_language'] = __( 'Language Code', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_google_map_language_hint'] = __( 'A language code is a code that assigns letters or numbers as identifiers or classifiers for languages.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_google_map_region_code'] = __( 'Region Code', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_google_map_region_code_hint'] = __( 'Specify a region code, which alters the maps behavior based on a given country or territory.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_google_map_zoom_level'] = __( 'Zoom Level', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_google_map_zoom_level_hint'] = __( 'Add Map Zoom Level', 'traveladvisor' );


            $traveladvisor_var_static_text['traveladvisor_var_map_style'] = __( 'Map Style', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_style_hint'] = __( 'Select Map style for all Maps.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_style_1'] = __( 'Map Box', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_style_2'] = __( 'Blue Water', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_style_3'] = __( 'Icy Blue', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_style_4'] = __( 'Bluish', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_style_5'] = __( 'Light Blue Water', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_style_6'] = __( 'Clad Me', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_style_7'] = __( 'Chilled', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_style_8'] = __( 'Two Tone', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_style_9'] = __( 'Light and Dark', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_style_10'] = __( 'Ilustracao', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_style_11'] = __( 'Flat Pale', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_style_12'] = __( 'Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_style_13'] = __( 'Moret', 'traveladvisor' );



            // theme-options-functions
            $traveladvisor_var_static_text['traveladvisor_var_settings_saved'] = __( 'All Settings Saved', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_error_saving_files'] = __( 'Error saving file!', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_backup_generated'] = __( 'Backup Generated.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_error_del_file'] = __( 'Error Deleting file!', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_file_import_success'] = __( 'File Import Successfully', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_error_restoring_file'] = __( 'Error Restoring file!', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_error_restore_file'] = __( 'Error Restoring file!', 'traveladvisor' );
            // theme-options-arrays
            $traveladvisor_var_static_text['traveladvisor_var_demo'] = __( 'Demo', 'traveladvisor' );
            return $traveladvisor_var_static_text;
        }

        public function traveladvisor_theme_option_field_strings() {
            global $traveladvisor_var_static_text;
            $traveladvisor_var_static_text['traveladvisor_var_select_page'] = __( 'Please select a page', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_input_url'] = __( 'Input the URL from another location and hit Import Button to apply settings.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_export_options'] = __( 'Export Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_generate_backup'] = __( 'Here you can Generate/Download Backups. Also you can use these Backups to Restore settings.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_download'] = __( 'Download', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_import_options'] = __( 'Import Option', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_import'] = __( 'Import', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_restore'] = __( 'Restore', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_delete'] = __( 'Delete', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_generate_backupp'] = __( 'Generate Backup', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_import_widget'] = __( 'Import Widgets', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_widget_setting'] = __( 'Show Widget Settings', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_export_widget'] = __( 'Export Widgets', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_font_family'] = __( 'Font Family', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_default_font'] = __( 'Default Font', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_select_attribute'] = __( 'Select Attribute', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_select_sidebar'] = __( 'Select Sidebar', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_browse'] = __( 'Browse', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_sidebar_title'] = __( 'Please enter the desired title of sidebar', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_add_sidebar'] = __( 'Add Sidebar', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_added_sidebar'] = __( 'Already Added Sidebars', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_sidebar_name'] = __( 'Sidebar Name', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_sidebar_width'] = __( 'Sidebar Width', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_sidebar_action'] = __( 'Actions', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_sure_delete'] = __( 'Are you sure! You want to delete this', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_sidebar_remove'] = __( 'Remove', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_sidebar_title'] = __( 'Please enter the desired title of Footer sidebar', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_sidebar_width_2c'] = __( '2 Column (16.67%)', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_sidebar_width_3c'] = __( '3 Column (25%)', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_sidebar_width_4c'] = __( '4 Column (33.33%)', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_sidebar_width_6c'] = __( '6 Column (50%)', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_sidebar_width_8c'] = __( '8 Column (66.66%)', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_sidebar_width_9c'] = __( '9 Column (75%)', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_sidebar_width_10c'] = __( '10 Column (83.33%)', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_sidebar_width_12c'] = __( '12 Column (100%)', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_title'] = __( 'Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_title_hinttext'] = __( 'Please enter text for icon', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_url'] = __( 'Url', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_url_hinttext'] = __( 'Please enter Full Url', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_icon_path'] = __( 'Icon Path', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_icon'] = __( 'Icon', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_icon_color'] = __( 'Icon Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_add_soc_icon'] = __( 'Add', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_add_soc_icon_already'] = __( 'Already Added Social Icons', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_icon_path'] = __( 'Icon Path', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_network_name'] = __( 'Network Name', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_edit'] = __( 'Edit', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_add_custom_field'] = __( 'Click to Add', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_text'] = __( 'Text', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_textarea'] = __( 'Textarea', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_dropdown'] = __( 'Dropdown', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_date'] = __( 'Date', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_email'] = __( 'Email', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_url'] = __( 'Url', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_range'] = __( 'Range', 'traveladvisor' );

            return $traveladvisor_var_static_text;
        }

        public function traveladvisor_short_code_strings() {
            global $traveladvisor_var_static_text;

            // general 
            $traveladvisor_var_static_text['traveladvisor_var_shortcode_remove'] = __( 'remove', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_shortcode_save'] = __( 'Save', 'traveladvisor' );

            // plugin shortcode
            $traveladvisor_var_static_text['traveladvisor_var_edit_destinaion_option'] = __( 'destination options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_edit_tour_option'] = __( 'tour options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_edit_gallery_option'] = __( 'gallery options', 'traveladvisor' );


            // testimonial shortcode
            $traveladvisor_var_static_text['traveladvisor_var_edit_testimonial_option'] = __( 'Testimonial options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_add_testimonial'] = __( 'Add testimonial', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_testimonial_element_title'] = __( 'Element Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_testimonial_element_title_hint'] = __( 'Enter element title here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_testimonial_element_sub_titlt'] = __( 'Element Subtitle', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_testimonial_element_sub_titlt_hint'] = __( 'Enter your sub title here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_testimonial_title'] = __( 'Testimonian Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_testimonial_title_hint'] = __( 'Enter testimonial title  here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_testimonial_text'] = __( 'Testimonial Text', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_testimonial_text_hint'] = __( 'Enter testimonial text here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_testimonial_author'] = __( 'Author', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_testimonial_author_hint'] = __( 'Add testimonial author name here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_testimonial_desigination'] = __( 'Company Name', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_testimonial_desigination_hint'] = __( 'Add company name here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_testimonial_author_color'] = __( 'Company Name', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_testimonial_author_color_hint'] = __( 'Author/Company color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_testimonial'] = __( 'Testimonial', 'traveladvisor' );

            ///Accordion shortcode backend 
            $traveladvisor_var_static_text['traveladvisor_var_edit_accordion_option'] = __( 'Accordion Option', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_accordion_title'] = __( 'Element Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_accordion_title_hint'] = __( 'Add title for the accordion', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_accordion_style'] = __( 'Style', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_accordion_style_hint'] = __( 'Select between accordion styles', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_accordion_style_simple'] = __( 'Simple', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_accordion_style_fancy'] = __( 'Fancy', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_accordion_accordion'] = __( 'Accordion', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_accordion_remove'] = __( 'Remove', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_accordion_active'] = __( 'Active', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_accordion_active_yes'] = __( 'Yes', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_accordion_active_no'] = __( 'No', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_accordion_active_hint'] = __( 'Make this accordion tab as active', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_accordion_accordion_title'] = __( 'Accordion Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_accordion_accordion_title_hint'] = __( 'Give title to the subsequent', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_accordion_accordion_text'] = __( 'Accordion Text', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_accordion_accordion_text_hint'] = __( 'Give text to have it under the accordion title as detail', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_add_accordion'] = __( 'Add acccordion', 'traveladvisor' );

            ///Blog shortcode backend 
            $traveladvisor_var_static_text['traveladvisor_var_edit_blog_option'] = __( 'Blog options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_title'] = __( 'Element Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_title_hint'] = __( 'Enter title for  blog element', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_subtitle'] = __( 'Element Subtitle', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_subtitle_hint'] = __( 'Enter subtitle for the blog element', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_select_column'] = __( 'Select Column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_select_column_hint'] = __( 'Select Column view from this drop down', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_one'] = __( 'One Column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_two'] = __( 'Two Column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_three'] = __( 'Three Column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_four'] = __( 'Four Column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_six'] = __( 'Six Column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_choose_category'] = __( 'Choose Category', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_choose_category_hint'] = __( 'Select category to show posts. If you dont select category it will display all posts.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_blog_design_views'] = __( 'Blog Design Views', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_blog_design_views_hint'] = __( 'Select blog view from this drop down', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_view_grid'] = __( 'Grid', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_view_large'] = __( 'Large', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_view_medium'] = __( 'Medium', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_view_timeline'] = __( 'Timeline', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_view_fancy'] = __( 'Fancy', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_post_order'] = __( 'Post Order', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_post_order_hint'] = __( 'Arranging posts in ascending order and descending order with this dropdown.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_post_asc'] = __( 'ASC', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_post_desc'] = __( 'DESC', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_post_description'] = __( 'Post Description', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_post_description_hint'] = __( 'Show/Hide post description with this dropdown.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_post_description_yes'] = __( 'Yes', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_post_description_no'] = __( 'No', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_excerpt'] = __( 'Length of Excerpt', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_excerpt_hint'] = __( 'Add number of excerpt words here to display on blog listing.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_pagination'] = __( 'Pagination', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_pagination_hint'] = __( 'Pagination is the process of dividing a document into discrete pages. Manage your pagiantion via this dropdown.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_post_pagination_no'] = __( 'All Records', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_post_pagination_yes'] = __( 'Pagination', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_post_numbers'] = __( 'No. of Post Per Page', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_post_numbers_hint'] = __( 'Add number of post to show posts on page.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_blog_Insert'] = __( 'Insert', 'traveladvisor' );

            //Multi Team shortcode
            $traveladvisor_var_static_text['traveladvisor_var_edit_team_option'] = __( 'team Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_name'] = __( 'Name', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_name_hint'] = __( 'Add team member name here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_desigination'] = __( 'Designation', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_desigination_hint'] = __( 'Add team member designation here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_image'] = __( 'Team Image', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_image_hint'] = __( 'Upload the team member image', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_image'] = __( 'Team Image', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_image_hint'] = __( 'Upload the team member image', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_image_placee'] = __( 'Image Position', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_image_placee_hint'] = __( 'Select the position of the image', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_image_placee_select'] = __( 'Please select', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_image_placee_right'] = __( 'Right', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_image_placee_left'] = __( 'Left', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_views'] = __( 'Team Views', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_views_hint'] = __( 'Select team styles from this drop down', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_views_please_select'] = __( 'Please select', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_views_grid'] = __( 'Grid', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_views_fancy'] = __( 'Fancy', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_views_simple'] = __( 'Simple', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_facebook'] = __( 'Facebook', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_facebook_hint'] = __( 'Add team member facebook url here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_twitter'] = __( 'Twitter', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_twitter_hint'] = __( 'Add team member Twitter url here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_mail'] = __( 'Mail', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_mail_hint'] = __( 'Add team member mail url here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_google_plus'] = __( 'Google Plus', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_google_plus_hint'] = __( 'Add team member google plus url here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_description'] = __( 'Description', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_description_hint'] = __( 'Add team member description here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_description_on_off'] = __( 'Description On/Off', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_description_on_off_hint'] = __( 'Select on/off for team description', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_description_please_select'] = __( 'Please select', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_description_on'] = __( 'on', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_description_off'] = __( 'off', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_excerpt'] = __( 'Team Excerpt', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_excerpt_hint'] = __( 'Select Excerpt on/off', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_excerpt_yes'] = __( 'Yes', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_excerpt_no'] = __( 'No', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_excerpt_length'] = __( 'Excerpt Length', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_team_excerpt_length_hint'] = __( 'Enter description excerpt length here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multi_team_title'] = __( 'Element Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multi_team_title_hint'] = __( 'Enter your element title here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multi_team_item_size'] = __( 'Item Size', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multi_team_item_size_hint'] = __( 'Select item size from this dropdown', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multi_team_edit_option'] = __( 'Team Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multi_team_remove'] = __( 'Remove', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multi_team_multi_team'] = __( 'Team', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multi_team_add_multi_team'] = __( 'Add Team', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multi_team_insert'] = __( 'Insert', 'traveladvisor' );

            // tabs shortcode
            $traveladvisor_var_static_text['traveladvisor_var_edit_tabs_option'] = __( 'tabs Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_add_tabs_item'] = __( 'Add Item', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_tabs_title'] = __( 'Element Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_tabs_title_hint'] = __( 'Add your tabs title here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_tabs_style'] = __( 'Tabs Style', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_tabs_style_hint'] = __( 'Select your tabs style', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_tabs_style_vertical'] = __( 'Vertical', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_tabs_style_horizontal'] = __( 'Horizontal', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_tabs_active'] = __( 'Tab Active', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_tabs_active_hint'] = __( 'If you want to make this tab active then select yes', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_tabs_active_yes'] = __( 'Yes', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_tabs_active_no'] = __( 'No', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_tabs_item_text'] = __( 'Tab Item Text', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_tabs_item_text_hint'] = __( 'Enter Tabs Item text here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_tabs_description'] = __( 'Tab Description', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_tabs_description_hint'] = __( 'Enter the tab description here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_tabs_icon'] = __( 'Tab Icon', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_tabs_icon_hint'] = __( 'Select the Icons you would like to show with your Tabs .', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_tabs'] = __( 'Tabs', 'traveladvisor' );
            //Button shortcode backend 
            $traveladvisor_var_static_text['traveladvisor_var_button_edit'] = __( 'Button Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_text'] = __( 'Button Label', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_text_hint'] = __( 'Give text label for the button', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_size'] = __( 'Button Size', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_size_hint'] = __( 'Select button size.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_large'] = __( 'Large', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_medium'] = __( 'Medium', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_small'] = __( 'Small', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_icon'] = __( 'Icon', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_tooltip'] = __( 'Select the Icons you would like to show with your button title.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_url'] = __( 'Button Url', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_url_hint'] = __( 'Enter referrer button url ', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_paddingtop'] = __( 'Padding Top', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_paddingtop_hint'] = __( "Distance between element's top border and its contents", 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_paddingbottom'] = __( 'Padding Bottom', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_paddingbottom_hint'] = __( "Distance between element's bottom border and its contents", 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_paddingleft'] = __( 'Padding Left', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_paddingleft_hint'] = __( "Distance between element's left border and its contents", 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_paddingright'] = __( 'Padding Right', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_paddingright_hint'] = __( "Distance between element's right border and its contents", 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_border'] = __( 'Border', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_border_hint'] = __( 'Border for the button.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_border_yes'] = __( 'Yes', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_border_no'] = __( 'No', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_type'] = __( 'Button Shape', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_type_hint'] = __( 'Select between button shapes', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_typesquare'] = __( 'Square', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_typerounded'] = __( 'Rounded', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_3d'] = __( '3D Button', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_3d_hint'] = __( 'Toggle between the views', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_3dno'] = __( 'No', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_3dyes'] = __( 'Yes', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_target'] = __( 'Target', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_target_hint'] = __( 'Opens the button link within the page or in the new tab', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_target_blank'] = __( 'Blank', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_target_self'] = __( 'Self', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_border_color'] = __( 'Border Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_border_color_hint'] = __( "Text for the button's border color", 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_bgcolor'] = __( 'Button Background Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_bgcolor_hint'] = __( "Give a color to the button's background", 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_color'] = __( 'Button Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_color_hint'] = __( 'Give a color to the title of the button', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_insert'] = __( 'Insert', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_button_save'] = __( 'Save', 'traveladvisor' );
            // Table shortcode
            $traveladvisor_var_static_text['traveladvisor_var_edit_table_option'] = __( 'table Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_table_title'] = __( 'Element Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_table_title_hint'] = __( 'Add your table title here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_table_quick_fact'] = __( 'Quick fact', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_table_quick_fact_hint'] = __( 'Enter quick fact for your table to be shown on front end', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_table_net_price'] = __( 'Net price', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_table_net_price_hint'] = __( 'Enter net price for your item', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_table_discount_price'] = __( 'Discount Price', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_table_discount_price_hint'] = __( 'Enter discount price for your table', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_table_price'] = __( 'Price', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_table_price_hint'] = __( 'Enter Price for your table price.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_add_table_item'] = __( 'Add table Item', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_table'] = __( 'Table', 'traveladvisor' );
            ///Client shortcode backend 
            $traveladvisor_var_static_text['traveladvisor_var_client_element_title'] = __( 'Element Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_client_element_title_hint'] = __( 'Enter element title.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_client_per'] = __( 'Per Slide', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_client_per_hint'] = __( 'Enter number of clients to be shown on page', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_client_style'] = __( 'Clients Style', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_client_style_hint'] = __( 'Select clients view from this drop down', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_client_style_slider'] = __( 'Slider', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_client_counter'] = __( 'Counter', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_client_url'] = __( 'Client Url', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_client_url_hint'] = __( 'Enter client address(url) here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_client_image'] = __( 'Client Image', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_client_image_hint'] = __( "Enter the client's image.", 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_client_edit_client_option'] = __( "clients options", 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_client_client'] = __( "Clients", 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_add_client'] = __( "Add clients", 'traveladvisor' );
            //Service shortcode
            $traveladvisor_var_static_text['traveladvisor_var_edit_service_option'] = __( 'service Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_title'] = __( 'Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_title_hint'] = __( 'Add title here ', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_title_color'] = __( 'Title Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_title_color_hint'] = __( 'Select the title color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_select_view'] = __( 'Select View', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_select_view_hint'] = __( 'Select service view', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_select_view_default'] = __( 'Default', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_select_view_grid'] = __( 'Grid', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_icon_position'] = __( 'Icon Position', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_icon_position_hint'] = __( 'Select the icon position ', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_icon_position_left'] = __( 'Left', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_icon_position_right'] = __( 'Right', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_icon_position_center'] = __( 'Center', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_icon'] = __( 'Icon', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_icon_hint'] = __( 'Select the Icons you would like to show with your service title.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_icon_color'] = __( 'Icon Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_icon_color_hint'] = __( 'Select icon color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_content'] = __( 'Content', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_content_hint'] = __( 'Add service content here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_content_color'] = __( 'Content Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_content_color_hint'] = __( 'Select contents color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_content_padding_left'] = __( 'Content Padding Left', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_content_padding_left_hint'] = __( 'Distance between elements left border and its contents', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_content_padding_right'] = __( 'Content Padding Right', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_content_padding_right_hint'] = __( 'Distance between elements right border and its contents', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_content_border'] = __( 'Contents Border', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_content_border_hint'] = __( 'Select the border Enable/Disable', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_content_border_yes'] = __( 'Yes', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_content_border_no'] = __( 'No', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_border_color'] = __( 'Border Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_border_color_hint'] = __( 'Choose the border color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_content_background_color'] = __( 'Contents Background Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_content_background_color_hint'] = __( 'Choose the background color', 'traveladvisor' );
            // Searchbox shortcode
            $traveladvisor_var_static_text['traveladvisor_var_edit_searchbox_option'] = __( 'Searchbox Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_searchbox_select_page'] = __( 'Select Page', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_searchbox_select_page_hint'] = __( 'Please Select page having tours short-code and tours listing view in it. .', 'traveladvisor' );
            // Quote shortcode
            $traveladvisor_var_static_text['traveladvisor_var_edit_quote_option'] = __( 'quote Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_quote_element_title'] = __( 'Element Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_quote_element_title_hint'] = __( 'Add quote title here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_quote_author'] = __( 'Author', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_quote_author_hint'] = __( 'Add the quote author name.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_quote_author_url'] = __( 'Author Url', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_quote_author_url_hint'] = __( 'Add the author url here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_quote_text_color'] = __( 'Text Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_quote_text_color_hint'] = __( 'Choose the quote content color.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_quote_align'] = __( 'Align', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_quote_align_hint'] = __( 'Select the alignment of the content.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_quote_align_letf'] = __( 'Left', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_quote_align_right'] = __( 'Right', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_quote_align_center'] = __( 'Center', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_quote_content'] = __( 'Content', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_quote_content_hint'] = __( 'Add quote content here.', 'traveladvisor' );
            // progressbar shortcode
            $traveladvisor_var_static_text['traveladvisor_var_edit_progressbar_option'] = __( 'progressbar Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_progressbar_title'] = __( 'Element Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_progressbar_title_hint'] = __( 'Add progress bar title here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_progressbar_view'] = __( 'Progress Bar View', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_progressbar_view_hint'] = __( 'Select the view of the progress bar.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_progressbar_view_please_select'] = __( 'Please select ... ', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_progressbar_view_horizontal'] = __( 'Horizontal', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_progressbar_view_piechart'] = __( 'Pie chart', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_progressbar_item_text'] = __( 'Item Text', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_progressbar_item_text_hint'] = __( 'Add progressbar text here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_progressbar_item_percentage'] = __( 'Item Percentage', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_progressbar_item_percentage_hint'] = __( 'Add percentage of the item text here in numeric value only.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_add_progress_item'] = __( 'Add Progress bar Item', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_progress'] = __( 'progress bar', 'traveladvisor' );

            // Pricetable shortcode 
            $traveladvisor_var_static_text['traveladvisor_var_edit_pricetable_option'] = __( 'Pricetable Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_main_heading'] = __( 'Main Heading', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_main_heading_hint'] = __( 'Add your main heading of pricetable here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_heading_color'] = __( 'Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_heading_color_hint'] = __( 'Choose the main heading color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_title'] = __( 'Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_title_hint'] = __( 'Add your pricetable title here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_title_color'] = __( 'Title Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_title_color_hint'] = __( 'Add your title color here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_currency_sign'] = __( 'Currency Sign', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_currency_sign_hint'] = __( 'Add your currency sign here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_price'] = __( 'Price', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_price_hint'] = __( 'Add your price here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_package_duration'] = __( 'Package Duration', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_package_duration_hint'] = __( 'Select your pricetable package duration here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_package_duration_day'] = __( 'Day', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_package_duration_week'] = __( 'Week', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_package_duration_fortnight'] = __( 'Fortnight', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_package_duration_year'] = __( 'Year', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_package_duration_month'] = __( 'Month', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_description'] = __( 'Description', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_description_hint'] = __( 'Add forward slash / separated description titles.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_button_text'] = __( 'Button Text', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_button_text_hint'] = __( 'Add your button text here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_button_link'] = __( 'Button Link', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pricetable_button_link_hint'] = __( 'Add your url here.', 'traveladvisor' );

            //Column shortcode backend 
            $traveladvisor_var_static_text['traveladvisor_var_edit_column_option'] = __( 'column options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_column_title'] = __( 'Element Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_column_title_hint'] = __( 'Enter title for the column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_column_text'] = __( 'Contents', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_column_text_hint'] = __( 'The contents to be displayed under the tille', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_column_toppadding'] = __( 'Top Padding', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_column_toppadding_hint'] = __( 'Distance between the top border of the column and its contents', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_column_bottompadding'] = __( 'Padding Bottom', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_column_bottompadding_hint'] = __( 'Distance between the top border of the column and its contents', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_column_leftpadding'] = __( 'Padding Left', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_column_leftpadding_hint'] = __( 'Distance between the left border of the column and its contents', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_column_rightpadding'] = __( 'Padding Right', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_column_rightpadding_hint'] = __( 'Distance between the right border of the column and its contents', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_column_image'] = __( 'Background Image', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_column_image_hint'] = __( "Image for the column's background", 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_column_content_color'] = __( 'Contents Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_column_content_color_hint'] = __( 'The color of the text to be applied on the contents of the column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_column_bgcolor'] = __( 'Background Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_column_bgcolor_hint'] = __( 'The background color to be applied on the contents of the column', 'traveladvisor' );

            ///Contact us shortcode backend 
            $traveladvisor_var_static_text['traveladvisor_var_edit_cotactus_option'] = __( 'contact us options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_cotactus_title'] = __( 'Element Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_cotactus_title_hint'] = __( 'Enter title of the form', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_cotactus_subtitle'] = __( 'Element Subtitle', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_cotactus_subtitle_hint'] = __( 'Enter Subtitle of the form', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_cotactus_sendto'] = __( 'Send To', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_cotactus_sendto_hint'] = __( 'You will receive emails on the mailing address given here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_cotactus_success'] = __( 'Success Message', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_cotactus_success_hint'] = __( 'Success message if email is sent successfully', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_cotactus_error'] = __( 'Error Message', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_cotactus_error_hint'] = __( 'Error message if email is not sent', 'traveladvisor' );

            ///Counter us shortcode backend 

            $traveladvisor_var_static_text['traveladvisor_var_edit_counters_option'] = __( 'Counter options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_add_multicounters'] = __( 'Add Counter', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multicounters'] = __( 'Counters', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_item_size'] = __( 'Item Size', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_item_size_full_width'] = __( 'One Column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_item_size_one_half'] = __( 'Two Column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_item_size_one_third'] = __( 'Three Column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_item_size_one_fourth'] = __( 'Four Column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_item_size_one_six'] = __( 'Six Column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_item_size_hint'] = __( 'You can Select Counter Item Size here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_element_title_hint'] = __( 'You can enter Counter Element Title here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_element_title'] = __( 'Element Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_element_title_hint'] = __( 'Enter Counter Element Title Here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_edit_counter_option'] = __( 'counter options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_edit_counter_option'] = __( 'counter options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_icon'] = __( 'Element Icon', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_icon_hint'] = __( 'Select the Icons you would like to show with your List', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_icon_color'] = __( 'Icon Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_icon_color_hint'] = __( 'Give a color to the icon', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_bgcolor'] = __( 'Background Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_bgcolor_hint'] = __( "Give a color to the counter's background", 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_number'] = __( 'Number', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_number_hint'] = __( 'Enter a number for your counter', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_number_color'] = __( 'Number Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_number_color_hint'] = __( 'Give a color to your counter number', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_separator_position'] = __( 'Separator Position', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_separator_position_hint'] = __( 'Select separator position for your counter', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_separator_position_before'] = __( 'Before title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_separator_position_after'] = __( 'After title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_counter_title'] = __( 'counter Inner Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_counter_title_hint'] = __( 'Enter main title for your counter element', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_description'] = __( 'Description', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_description_hint'] = __( 'Enter description for your counter', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_description_color'] = __( 'Description Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_description_color_hint'] = __( 'Give a color for your counter description  ', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter'] = __( 'Counter', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_title'] = __( 'Counter Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_title_hint'] = __( 'Enter counter title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_counter'] = __( 'Counter', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_counter_hint'] = __( 'Enter counter author name here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_border_bottom'] = __( 'Border Bottom', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_border_bottom_hint'] = __( 'Enter bottom of the border.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_description_color'] = __( 'Description Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_description_color_hint'] = __( 'Give a color for your counter description  ', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_view'] = __( 'Views', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_view_hint'] = __( 'Select counter view', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_view_box'] = __( 'Box', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_counter_view_simple'] = __( 'Simple', 'traveladvisor' );

            ///Divider shortcode backend 
            $traveladvisor_var_static_text['traveladvisor_var_divider_spacer'] = __( 'divider OPTIONS', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_paddingleft'] = __( 'Padding Left', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_paddingleft_hint'] = __( 'Distance between the left border of the divider and its contents', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_paddingright'] = __( 'Padding Right', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_paddingright_hint'] = __( 'Distance between the right border of the divider and its contents', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_paddingtop'] = __( 'Padding Top', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_paddingtop_hint'] = __( 'Distance between the top border of the divider and its contents', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_paddingbottom'] = __( 'Padding Bottom', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_paddingbottom_hint'] = __( 'Distance between the bottom border of the divider and its contents', 'traveladvisor' );

            // Multiservices shortcode
            $traveladvisor_var_static_text['traveladvisor_var_edit_multiservices_option'] = __( 'Icon Box Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_element_title'] = __( 'Element Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_element_title_hint'] = __( 'Add your element title here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_element_subtitle'] = __( 'Element Subtitle', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_element_subtitle_hint'] = __( 'Add your element subtitle here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_view'] = __( 'Style', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_view_hint'] = __( 'Select Icon Box view from this dropdown.Icon Box sidebar Widget view only for sidebar widget.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_view_grid'] = __( 'Grid', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_view_fancy'] = __( 'Fancy', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_view_sidebar_widget'] = __( 'Sidebar widget', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_item_size'] = __( 'Item Size', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_item_size_hint'] = __( 'Select single item width. This width will be calculated depend on element width', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_item_size_full_width'] = __( 'One column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_item_size_one_half'] = __( 'Two column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_item_size_one_third'] = __( 'Three column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_item_size_two_third'] = __( 'Six column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_item_size_one_fourth'] = __( 'Four Column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_item_size_three_fourth'] = __( 'three fourth', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_title_color'] = __( 'Title color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_title_color_hint'] = __( 'Provide a hex colour code here (with #) for text color. if you want to override the default', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_elementtitle_color'] = __( 'Element title color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_elementtitle_color_hint'] = __( 'Provide a hex colour code here (with #) for text color. if you want to override the default', 'traveladvisor' );


            $traveladvisor_var_static_text['traveladvisor_var_multiservices_content_padding_left'] = __( 'Content Padding Left', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_content_padding_left_hint'] = __( 'Distance between elements left border and its contents', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_content_padding_right'] = __( 'Content Padding Right', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_content_padding_right_hint'] = __( 'Distance between elements right border and its contents', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_content_border'] = __( 'Border', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_content_border_hint'] = __( 'Set the border from this dropdown', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_content_border_yes'] = __( 'Yes', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_content_border_no'] = __( 'No', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_content_border_color'] = __( 'Content Border Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_content_border_color_hint'] = __( 'Choose the content border color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_icon_position'] = __( 'Icon/Image Position', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_icon_position_hint'] = __( 'Select the position of the icon/image .', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_icon_position_left'] = __( 'Left', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_icon_position_right'] = __( 'Right', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_icon_position_center'] = __( 'Center', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_icon_hint'] = __( 'Select the Icon you would like to show with your Icon Box title.Icon only for page element and shortcode.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_icon_bg_color'] = __( 'Icon Background Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_icon_bg_color_hint'] = __( 'Provide a hex colour code here (with #) for text color. if you want to override the default.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_icon_color'] = __( 'Icon Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_icon_color_hint'] = __( 'Choose icon color of the Icon Box', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_content_color'] = __( 'Content Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_content_color_hint'] = __( 'Add your content color here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_add_multiservices'] = __( 'Add Icon Box', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices'] = __( 'Icon Box', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_content'] = __( 'Content', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_content_hint'] = __( 'Add service content here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_alignment'] = __( 'Alignment', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_alignment_hint'] = __( 'Set the position of icon_box image here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_title_color'] = __( 'Title Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_title_color_hint'] = __( 'Set title color from here.', 'traveladvisor' );

            //framework + shortcode
            $traveladvisor_var_static_text['traveladvisor_var_service_icon_type'] = __( 'Icon Type', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_icon_type_hint'] = __( 'Select icon type image or font icon.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_icon'] = __( 'Icon', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_service_image'] = __( 'Image', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_image'] = __( 'Icon Box Image', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_image_hint'] = __( 'only one thing is select at a time from icon or image.Image only for sidebar widget IconBox/services', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_icon'] = __( 'Icon', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_url'] = __( 'Title Link', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_url_hint'] = __( 'Enter Icon Box title link here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_contents'] = __( 'Content', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_contents_hint'] = __( 'Add content of the item', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_title'] = __( 'Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_title_hint'] = __( 'Add your item title here', 'traveladvisor' );


            ///Heading shortcode backend 
            $traveladvisor_var_static_text['traveladvisor_var_edit_heading_options'] = __( 'heading options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_title'] = __( 'Heading Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_title_hint'] = __( 'Enter text of the title for the heading title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_subtitle'] = __( 'Heading Subtitle', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_subtitle_hint'] = __( 'Enter text of the subtitle for the heading title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_fontsize'] = __( 'Heading Font Size', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_fontsize_hint'] = __( 'Enter font-size property to sets size of heading font in numeric value.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_text_transform'] = __( 'Text Transform', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_text_transform_hint'] = __( 'Select the text-transform property to controls the capitalization of text. ', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_capitalize'] = __( 'Capitalize', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_initial'] = __( 'Initial', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_inherit'] = __( 'Inherit', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_lowercase'] = __( 'Lowercase', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_none'] = __( 'None', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_uppercase'] = __( 'Uppercase', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_letter_spacing'] = __( 'Letter Spacing', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_letter_spacing_hint'] = __( 'Enter letter-spacing property to increases or decreases the space between characters in a numeric value only. ', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_hbm'] = __( 'Heading Bottom Margin', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_hbm_hint'] = __( 'Enter margin-bottom property to sets the bottom margin of heading in numaric values only.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_heading_color'] = __( 'Heading Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_heading_color_hint'] = __( 'Select color property to specify the color of heading.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_subtitle_color'] = __( 'Sub Title Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_subtitle_color_hint'] = __( 'Select color property to specify the color of sub heading. ', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_type'] = __( 'Type', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_type_hint'] = __( 'Select style to heading, deafult is h1.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_h1'] = __( 'H1', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_h2'] = __( 'H2', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_h3'] = __( 'H3', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_h4'] = __( 'H4', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_h5'] = __( 'H5', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_h6'] = __( 'H6', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_align'] = __( 'Heading Align', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_align_hint'] = __( 'Select heading align style to specify the horizontal alignment of text in an element.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_left'] = __( 'Left', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_right'] = __( 'Right', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_center'] = __( 'Center', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_font_style'] = __( 'Font Style', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_font_style_hint'] = __( 'Set font-style property to specify the font style for a text. ', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_normal'] = __( 'Normal', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_italic'] = __( 'Italic', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_heading_oblique'] = __( 'Oblique', 'traveladvisor' );

            ///Image frame shortcode backend 
            $traveladvisor_var_static_text['traveladvisor_var_imageframe_title'] = __( 'Element Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_imageframe_title_hint'] = __( 'Enter title here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_imageframe_image'] = __( 'Image', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_imageframe_image_hint'] = __( 'Browse for the image', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_imageframe_alt'] = __( 'Alternative Text', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_imageframe_alt_hint'] = __( 'Add alternative text for image', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_imagefram_edit'] = __( 'Image Frame Options', 'traveladvisor' );

            ///Infobox shortcode backend 
            $traveladvisor_var_static_text['traveladvisor_var_infobox_title_main'] = __( 'Element Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_infobox_title_main_hint'] = __( 'Add your ', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_infobox_title_color'] = __( 'Title Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_infobox_title_color_hint'] = __( 'Choose the title color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_infobox_icon_color'] = __( 'Icon Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_infobox_icon_color_hint'] = __( 'Choose the icon color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_infobox_icon'] = __( 'Icon', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_infobox_icon_hint'] = __( 'Choose the icon', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_infobox_contents'] = __( 'Contents', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_infobox_contents_hint'] = __( 'Enter contents here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_infobox_infobox'] = __( 'Infobox', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_infobox_edit_infobox_options'] = __( 'Infobox Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_add_infobox'] = __( 'Add infobox', 'traveladvisor' );

            //MultiPrice table shortcode
            $traveladvisor_var_static_text['traveladvisor_var_edit_multipricetable_option'] = __( 'Pricetable Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_element_title'] = __( 'Element Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_element_title_hint'] = __( 'Add your element title here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_item_size'] = __( 'Item Size', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_item_size_hint'] = __( 'Select single item width. This width will be calculated depend on element width', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_item_size_full_width'] = __( 'One column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_item_size_one_half'] = __( 'Two column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_item_size_one_third'] = __( 'Three column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_item_size_one_six'] = __( 'Six column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_item_size_one_fourth'] = __( 'Four column', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_item_size_three_fourth'] = __( 'three fourth', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_title'] = __( 'Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_title_hint'] = __( 'Add your pricetable title here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_title_color'] = __( 'Title Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_title_color_hint'] = __( 'Add your title color here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_currency_sign'] = __( 'Currency Sign', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_currency_sign_hint'] = __( 'Add your currency sign here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_price'] = __( 'Price', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_price_hint'] = __( 'Add your price here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_package_duration'] = __( 'Package Duration', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_package_duration_hint'] = __( 'Select your pricetable package duration here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_package_duration_day'] = __( 'Day', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_package_duration_week'] = __( 'Week', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_package_duration_fortnight'] = __( 'Fortnight', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_package_duration_year'] = __( 'Year', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_package_duration_month'] = __( 'Month', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_description'] = __( 'Description', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_description_hint'] = __( 'Add your pricetable description.You can split the description by (ul) in text editor.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_button_text'] = __( 'Button Text', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_button_text_hint'] = __( 'Add your button text here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_button_link'] = __( 'Button Link', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable_button_link_hint'] = __( 'Add your url here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_add_multipricetable'] = __( 'Add pricetable', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_multipricetable'] = __( 'Pricetable', 'traveladvisor' );


            ///List shortcode backend 
            $traveladvisor_var_static_text['traveladvisor_var_edit_list_option'] = __( 'list option', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_list_title'] = __( 'Element Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_list_title_hint'] = __( 'Add your list title here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_list_subtitle'] = __( 'Element Subtitle', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_list_subtitle_hint'] = __( 'Add your list sub title here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_list'] = __( 'List', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_list_text'] = __( 'List Item Text', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_list_text_hint'] = __( 'Enter list item text here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_list_color'] = __( 'item color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_list_color_hint'] = __( 'Enter the list text color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_shortcode_icon'] = __( 'Icon', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_list_add_item'] = __( 'Add list Item', 'traveladvisor' );

            ///Maintain shortcode backend 
            $traveladvisor_var_static_text['traveladvisor_var_edit_maintain_page'] = __( 'maintenance options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_maintain_title'] = __( 'Element Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_maintain_title_hint'] = __( 'Give element title here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_maintain_subtitle'] = __( 'Element Subtitle', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_maintain_subtitle_hint'] = __( 'Give element subtitle here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_maintain_text'] = __( 'Text', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_maintain_text_hint'] = __( 'Enter Maintenance Text', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_maintain_logo'] = __( 'Page Logo', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_maintain_logo_hint'] = __( 'Give page logo here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_maintain_launchdate'] = __( 'Launch Date', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_maintain_launchdate_hint'] = __( 'Give launch date here', 'traveladvisor' );

            // Map shortcode	
            $traveladvisor_var_static_text['traveladvisor_var_edit_map_option'] = __( 'map Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_title'] = __( 'Element Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_title_hint'] = __( 'Add map title here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_sub_title'] = __( 'Element SubTitle', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_sub_title_hint'] = __( 'Add map sub title here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_map_height'] = __( 'Map Height', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_map_height_hint'] = __( 'Add map height in numeric value only', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_latitude'] = __( 'Latitude', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_latitude_hint'] = __( 'Latitude is the angular distance of a place north or south of the earths
                                                equator, or of the equator of a celestial object, usually expressed in degrees and minutes', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_longitude'] = __( 'Longitude', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_longitude_hint'] = __( 'Longitude the angular distance of a place east or west of the Greenwich 
                                                meridian, or west of the standard meridian of a celestial object, usually expressed in degrees and minutes', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_zoom'] = __( 'Zoom', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_zoom_hint'] = __( 'Set map zoom level example 100 or leave it empty by deafult will be apply', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_types'] = __( 'Type', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_types_hint'] = __( 'Select one of the map type given.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_types_roadmap'] = __( 'Roadmap', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_types_hybrid'] = __( 'Hybrid', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_types_satellite'] = __( 'Satellite', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_types_terrian'] = __( 'Terrian', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_info_text'] = __( 'Info Text', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_info_text_hint'] = __( 'Enter info text for marker', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_marker_icon'] = __( 'Marker Icon', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_marker_icon_hint'] = __( 'Upload custom marker ', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_show_marker'] = __( 'Show Marker', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_show_marker_hint'] = __( 'Enable/Disable the marker from the map.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_show_marker_on'] = __( 'On', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_show_marker_off'] = __( 'Off', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_controls'] = __( 'Map Controls', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_controls_hint'] = __( 'Map control disable/enable with this dropdown', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_controls_on'] = __( 'On', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_controls_off'] = __( 'Off', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_dragable'] = __( 'Dragable', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_dragable_hint'] = __( 'Dragable On/Off in map', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_dragable_on'] = __( 'On', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_dragable_off'] = __( 'Off', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_scroll_wheel'] = __( 'Scroll Wheel', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_scroll_wheel_hint'] = __( 'Set scroll wheel zoom in zoom out enable disable from this dropdown', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_scroll_wheel_on'] = __( 'On', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_scroll_wheel_off'] = __( 'Off', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_border'] = __( 'Map Border', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_border_hint'] = __( 'Set border for map', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_border_color'] = __( 'Border Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_border_color_hint'] = __( 'Choose map border color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_border_on'] = __( 'Yes', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_map_border_off'] = __( 'No', 'traveladvisor' );
            //Video Shortcode
            $traveladvisor_var_static_text['traveladvisor_var_video_options'] = __( 'Video Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_video_title'] = __( 'Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_video_title_hint'] = __( 'Enter text of the title.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_video_url'] = __( 'Video Url', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_video_url_hint'] = __( 'Enter video url here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_video_width'] = __( 'Width', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_video_width_hint'] = __( 'Enter video width.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_video_height'] = __( 'Height', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_video_height_hint'] = __( 'Enter video height.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_video_insert'] = __( 'Insert', 'traveladvisor' );
            return $traveladvisor_var_static_text;
        }

        public function traveladvisor_theme_strings() {
            global $traveladvisor_var_static_text;
            $traveladvisor_var_static_text['cs_traveladvisor_load_from_icomoon'] = __( 'Load from IcoMoon selection.json', 'traveladvisor' );
            $traveladvisor_var_static_text['cs_traveladvisor_search_location'] = __( 'location', 'traveladvisor' );
            $traveladvisor_var_static_text['cs_traveladvisor_cfind_on_map'] = __( 'find_on_map', 'traveladvisor' );
            $traveladvisor_var_static_text['cs_traveladvisor_complete_address'] = __( 'Complete Address', 'traveladvisor' );
            $traveladvisor_var_static_text['cs_traveladvisor_select_city'] = __( 'Select City', 'traveladvisor' );
            $traveladvisor_var_static_text['cs_traveladvisor_city'] = __( 'City', 'traveladvisor' );
            $traveladvisor_var_static_text['cs_traveladvisor_select_country'] = __( 'Country', 'traveladvisor' );
            $traveladvisor_var_static_text['cs_traveladvisor_search_this_location_on_map'] = __( 'search this location on map', 'traveladvisor' );
            $traveladvisor_var_static_text['cs_traveladvisor_longitude'] = __( 'longitude', 'traveladvisor' );
            $traveladvisor_var_static_text['cs_traveladvisor_latitude'] = __( 'latitude', 'traveladvisor' );
            $traveladvisor_var_static_text['cs_traveladvisor_address'] = __( 'address', 'traveladvisor' );
            $traveladvisor_var_static_text['cs_traveladvisor_browse'] = __( 'browse', 'traveladvisor' );
            $traveladvisor_var_static_text['cs_traveladviso_image_for_specialisms'] = __( 'image for specialisms', 'traveladvisor' );
            $traveladvisor_var_static_text['cs_traveladviso_iso_code'] = __( 'iso code', 'traveladvisor' );
            $traveladvisor_var_static_text['cs_traveladviso_choose_icon'] = __( 'image for specialisms', 'traveladvisor' );
            $traveladvisor_var_static_text['cs_traveladviso_image_for_specialisms'] = __( 'Country', 'traveladvisor' );
            $traveladvisor_var_static_text['cs_traveladvisor_image'] = __( 'image', 'traveladvisor' );
            $traveladvisor_var_static_text['cs_traveladvisor_placeholder_lat'] = __( 'Latitude', 'traveladvisor' );
            $traveladvisor_var_static_text['cs_travel_inquiry_mail'] = __( 'Your Inquiry Has Been Successfully Sent, Organizer Will Contact You Shortly!!!', 'traveladvisor' );
            $traveladvisor_var_static_text['cs_travel_inquiry_mail_error'] = __( 'There is an error please try again', 'traveladvisor' );
            $traveladvisor_var_static_text['cs_travel_candidate_contact_form'] = __( 'Candidate Contact Form', 'traveladvisor' );
            $traveladvisor_var_static_text['cs_traveladvisor_removed_selected_list'] = __( 'Removed From Selected List', 'traveladvisor' );
            $traveladvisor_var_static_text['cs_traveladvisor_added'] = __( 'Added', 'traveladvisor' );

            $traveladvisor_var_static_text['traveladvisor_var_noresult_found'] = __( 'No result found.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_noresult_form_msg'] = __( 'No Record Found Containing "your added text".', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_noartical_available_msg'] = __( 'No Article Is Available Here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_try_again_str'] = __( 'Try Again?', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_suggestions_str'] = __( 'Suggestions', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_suggestions_str1'] = __( 'Make sure that all words are spelled correctly.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_suggestions_str2'] = __( 'Try different keywords.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_suggestions_str3'] = __( 'Try more general keywords.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_readmore_text'] = __( 'Read More', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pages'] = __( 'Pages', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_post_comment'] = __( 'Post a Comment', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_option_save_msg'] = __( 'Saving changes...', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_page_not_found'] = __( 'PAGE NOT FOUND', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_404'] = __( '404', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_error'] = __( 'ERROR', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_enter_any_thing_to_search'] = __( 'ENTER ANY THING TO SEARCH', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_return_to_homepage'] = __( 'RETURN TO HOMEPAGE', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_sorry_the_page_you_are_looking_for_does_not_exist'] = __( 'We are sorry, but the page you are looking for does not exist.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_you_may_use_this'] = __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_you_must_be_post_a_comment'] = __( 'You must be  to post a comment', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_log_out'] = __( 'Log out', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_logged_in_as'] = __( 'Logged in as', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_required_files_are_marked'] = __( 'Required fields are marked %s', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_error_notice'] = __( '*ERROR: please fill the required fields (name, email).', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_name'] = __( 'Name', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_full_name'] = __( 'full name', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_email'] = __( 'Email Address', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_please_enter_email_address'] = __( 'Please enter your email address', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_website'] = __( 'Website :', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_url'] = __( 'URL', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_message'] = __( 'Message', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_text_here'] = __( 'Text here', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_post_a_comment'] = __( 'Post a Comment', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_leave_a_comment'] = __( 'Leave us a comment', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_cancel_reply'] = __( 'Cancel reply', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_post_comments'] = __( 'Post comments', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_comments_are_closed'] = __( 'Comments are closed', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_main_menu'] = __( 'Main Menu', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_menu_1'] = __( 'Footer Menu 1', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer_menu_2'] = __( 'Footer Menu 2', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_traveladvisor_theme_options'] = __( 'CS Theme Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_this_widget_will_be_displayed_on_right/left_side_of_page'] = __( 'This widget will be displayed on right/left side of the page', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_footer'] = __( 'Footer', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_widgets'] = __( 'Widgets', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_author'] = __( 'Author', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_archives'] = __( 'Archives', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_tags'] = __( 'Tags', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_category'] = __( 'Category', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_search_results'] = __( 'Search Results : %s', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_daily_archives'] = __( 'Daily Archives: %s', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_monthly_archives'] = __( 'Monthly Archives: %s', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_yearly_archives'] = __( 'Yearly Archives: %s', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_monthly_archives_format'] = _x( 'F Y', 'monthly archives date format', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_yearly_archives_format'] = _x( 'Y', 'yearly archives date format', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_error_404'] = __( 'Error 404', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_home'] = __( 'Home', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_prev'] = __( 'Prev', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_next'] = __( 'Next', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_please_select'] = __( 'Please select..', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_previous'] = __( 'Previous', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_email_validation'] = __( 'please enter a valid email', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_successfully_subscribed'] = __( 'You have subscribed successfully', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_please_set_api_key'] = __( 'please set API key', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_placeholder_search'] = __( 'Please enter any keyword', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_like'] = __( 'Like(s)', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_please_select_a_maintenance_page'] = __( 'Please Select a Maintinance Page', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_header_search_placeholder'] = __( 'Search ...', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_header_search_placeholder'] = _x( 'Search &hellip;', 'placeholder', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_search_for_text'] = _x( 'Search for:', 'label', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_search_btn'] = _x( 'Search', 'Search', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_browse'] = __( 'Browse', 'traveladvisor' );
            //Plugin Options Fields File
            $traveladvisor_var_static_text['traveladvisor_var_click_to_add'] = __( 'Click to Add', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_click_to_text'] = __( 'Text', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_click_to_textarea'] = __( 'Textarea', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_click_to_dropdown'] = __( 'Dropdown', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_date'] = __( 'date', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_email'] = __( 'Email', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_url'] = __( 'Url', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_range'] = __( 'Range', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_please_select_a_page'] = __( 'Please select a page', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_city'] = __( 'City', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_select_country'] = __( 'Select Country', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_select_city'] = __( 'Select City', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_complete_address'] = __( 'Complete Address', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_latitude'] = __( 'Latitude', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_longitude'] = __( 'Longitude', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_search_this_location_on_map'] = __( 'Search This Location on Map', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_import_options'] = __( 'Import Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_file_url'] = __( 'File URL', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_file_url_hint'] = __( 'Input the Url from another location and hit Import Button to apply settings', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_import'] = __( 'Import', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_export_options'] = __( 'Export Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_generated_files'] = __( 'Generated File	', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_generated_files_hint'] = __( 'Here you can Generate/Download Backups. Also you can use these Backups to Restore settings.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_restore'] = __( 'Restore', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_delete'] = __( 'Delete', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_download'] = __( 'Download', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_generate_backup'] = __( 'Generate Backup', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_file_url'] = __( 'File URL', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_import_users'] = __( 'Import Users', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_country'] = __( 'Country', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_save_all_settings'] = __( 'Save All Settings', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_rese_all_options'] = __( 'Reset All Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_save_changes'] = __( 'Saving changes.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_general_options'] = __( 'General Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_page_settings'] = __( 'Page Settings ', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_default_location'] = __( 'Default Location', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_others'] = __( 'Others', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_gateways'] = __( 'Gateways', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_packages'] = __( 'Packages', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_job_credits'] = __( 'Job Credit', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_job_cv_search'] = __( 'CV Search', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_job_featured_jobs'] = __( 'Featured Jobs', 'traveladvisor' );
            //Blog Templates
            $traveladvisor_var_static_text['traveladvisor_var_blog_like'] = __( 'Like(s)', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_related_blogs'] = __( 'Related Blogs', 'traveladvisor' );

            // Theme-Strings
            $traveladvisor_var_static_text['traveladvisor_var_header_enter_to_search'] = __( 'Type Words Then Press Enter To Search......', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_header_book_now'] = __( 'Book Now', 'traveladvisor' );

            ///widgets cs about us
            $traveladvisor_var_static_text['traveladvisor_var_about_about_us'] = __( 'CS : About Us', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_text'] = __( 'CS : Text', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_menu'] = __( 'CS: Custom Menu', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_select_menu'] = __( 'Select Menu:', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_enter_title_here'] = __( 'Enter your element title here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_menu_description'] = __( 'Add a custom menu to your sidebar.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_arbitrary_text'] = __( 'Arbitrary text or HTML.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_about_title'] = __( 'Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_no_menus'] = __( 'No menus have been created yet. <a href="%s">Create some</a>.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_text_title_hint'] = __( 'Ener title for text widget', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_about_title_hint'] = __( 'Enter Title for about us widget', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_about_description'] = __( 'Description', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_text_content'] = __( 'Content', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_text_content_hint'] = __( 'Enter content for text widget', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_about_description_hint'] = __( 'Enter description for about us widget', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_about_image'] = __( 'Image', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_about_image_hint'] = __( 'Select Image for column background', 'traveladvisor' );
            ///widgets cs categories
            $traveladvisor_var_static_text['traveladvisor_var_categories_blog'] = __( 'CS :Blog Categories', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_categories_about'] = __( 'About Us from category', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_categories_title'] = __( 'Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_categories_title_hint'] = __( 'Enter Title for cs category widget', 'traveladvisor' );
            ///widgets cs destinations
            $traveladvisor_var_static_text['traveladvisor_var_destinations_deals'] = __( 'CS : Destination Deals Posts', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_destinations_deals_hint'] = __( 'Destination deals.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_destinations_title'] = __( 'Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_destinations_choose_cat'] = __( 'Choose Category', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_destinations_tour_views'] = __( 'Tour Views', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_destinations_tour_views1'] = __( 'please select', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_destinations_tour_views2'] = __( 'Simple', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_destinations_tour_views3'] = __( 'Fancy', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_destinations_tour_num_destinations'] = __( 'Number of Destination Deals To Display', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_destinations_tour_per_person'] = __( 'Per Person', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_destinations_starting'] = __( 'Starting at', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_destinations_tour$'] = __( '$', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_destinations_night'] = __( 'Night', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_destinations_check_avilibility'] = __( 'Check Avilibilty', 'traveladvisor' );

            ///widgets cs facebook widget
            $traveladvisor_var_static_text['traveladvisor_var_facebook'] = __( 'CS : Facebook', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_facebook_desc'] = __( 'Facebook widget like box total customized with theme.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_facebook_title'] = __( 'Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_facebook_url'] = __( 'Page Url', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_facebook_profile_url'] = __( 'Page Url', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_facebook_bgcolor'] = __( 'Background Color', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_facebook_width'] = __( 'Width', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_facebook_lightbox_height'] = __( 'Like Box Height', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_facebook_hide_cover'] = __( 'Hide Cover', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_facebook_show_faces'] = __( 'Show Faces', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_facebook_show_post'] = __( 'Show Post', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_facebook_hide_cta'] = __( 'Hide Cta', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_facebook_small_header'] = __( 'Small Header', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_facebook_adaptwidth'] = __( 'Adapt Width', 'traveladvisor' );

            // image.php
            $traveladvisor_var_static_text['traveladvisor_var_page_previous'] = __( 'Previous Image.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_page_next'] = __( 'Next Image', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_pages'] = __( 'Pages', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_page'] = __( 'Page', 'traveladvisor' );

            // cs-theme-functions
            $traveladvisor_var_static_text['traveladvisor_var_theme_functions_edit'] = __( 'Edit', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_functions_comment'] = __( 'Your comment is awaiting moderation.', 'traveladvisor' );
//            $traveladvisor_var_static_text['traveladvisor_var_theme_functions_text'] = __('You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'traveladvisor');
            $traveladvisor_var_static_text['traveladvisor_var_theme_functions_related_posts'] = __( 'Related Posts', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_functions_keep_reading'] = __( 'Keep Reading', 'traveladvisor' );

            ///widgets cs search widget
            $traveladvisor_var_static_text['traveladvisor_var_search'] = __( 'CS : Search', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_search_desc'] = __( 'CS search widget', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_search_title'] = __( 'Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_search_title_hint'] = __( 'Enter Title for cs search widget', 'traveladvisor' );
            ///widgets cs recent posts widget
            $traveladvisor_var_static_text['traveladvisor_var_rposts'] = __( 'CS : Recent Posts', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_rposts_desc'] = __( 'Recent Posts from category.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_rposts_title'] = __( 'Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_rposts_chose_cat'] = __( 'Choose Category', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_rposts_num_posts'] = __( 'Number of Posts To Display', 'traveladvisor' );

            ///widgets cs weather forcast
            $traveladvisor_var_static_text['traveladvisor_var_weather'] = __( 'CS : Weather', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_weather_title'] = __( 'Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_weather_city'] = __( 'City', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_weather_country'] = __( 'country', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_weather_scale'] = __( 'Scale', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_weather_centigrade'] = __( 'Centigrade', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_weather_fahrenhite'] = __( 'Fahrenhite', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_weather_no_of_days'] = __( 'Number of days', 'traveladvisor' );

            ///widgets cs mailchimp widget
            $traveladvisor_var_static_text['traveladvisor_var_mailchimp'] = __( 'CS : Mail Chimp', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_mailchimp_desc'] = __( 'Mailchimp service widget.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_mailchimp_title'] = __( 'Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_mailchimp_title_hint'] = __( 'Give a title to your widget.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_mailchimp_description'] = __( 'Description', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_mailchimp_description_hint'] = __( 'Give description text here.', 'traveladvisor' );
            ///widgets cs flickr widget
            $traveladvisor_var_static_text['traveladvisor_var_flickr'] = __( 'CS : Flickr Gallery', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_flickr_desc'] = __( 'Type a user name to show photos in widget.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_flickr_title'] = __( 'Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_flickr_title_hint'] = __( 'Give a title to your gallery', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_flickr_username'] = __( 'Flickr username', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_flickr_username_hint'] = __( 'Enter your Flicker Username here.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_flickr_photos'] = __( 'Number of Photos', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_flickr_photos_hint'] = __( 'Number of photos to be displayed on the frontend.', 'traveladvisor' );
            ///widgets cs fancy menu widget
            $traveladvisor_var_static_text['traveladvisor_var_fmenu'] = __( 'CS : Fancy Menu', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_fmenu_hint'] = __( 'Menu List', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_fmenu_title'] = __( 'Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_fmenu_title_hint'] = __( 'Give a name to your menu', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_fmenu_selectmenu'] = __( 'Select Menu', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_fmenu_selectmenu_hint'] = __( 'This list of available menus', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_fmenu_no_menu'] = __( 'No menus have been created yet.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_fmenu_select_view'] = __( 'Select View', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_fmenu_select_view_hint'] = __( 'Select view for fancy menu from this dropdown', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_fmenu_simple'] = __( 'Simple', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_fmenu_fancy'] = __( 'Fancy', 'traveladvisor' );


            // cs-html fields
            $traveladvisor_var_static_text['traveladvisor_var_html_fields_full_width'] = __( 'Full Width', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_html_fields_sidebar_right'] = __( 'Sidebar Right', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_html_fields_sidebar_left'] = __( 'Sidebar Left', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_html_fields_delete_image'] = __( 'Delete image', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_html_fields_edit_item'] = __( 'Edit Item', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_html_fields_title'] = __( 'Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_html_fields_description'] = __( 'Description', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_html_fields_update'] = __( 'Update', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_html_fields_add_gallery'] = __( 'Add Gallery', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_html_fields_delete'] = __( 'Delete', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_browse'] = __( 'Browse', 'traveladvisor' );



            // File : traveladvisor_custom_fields.php

            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_text'] = __( 'Text', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_required'] = __( 'Required', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_no'] = __( 'No', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_yes'] = __( 'Yes', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_title'] = __( 'Title', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_meta_key'] = __( 'Meta Key', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_meta_key_hint'] = __( 'Please enter Meta Key without special character and space.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_placeholder'] = __( 'Place Holder', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_enable_search'] = __( 'Enable Search', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_default_value'] = __( 'Default Value', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_collapse'] = __( 'Collapse in Search', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_icon'] = __( 'Icon', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_help_text'] = __( 'Help Text', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_rows'] = __( 'Rows', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_columns'] = __( 'Columns', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_columns_hint'] = __( 'Please enter Meta Key without special character and space.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_columns'] = __( 'Columns', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_enable_multi'] = __( 'Enable Multi Select', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_post_multi'] = __( 'Post Multi Select', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_first_value'] = __( 'First Value', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_options'] = __( 'Options', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_add_choice'] = __( 'add another choice', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_remove_choice'] = __( 'remove this choice', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_date_formate'] = __( 'Date Formate', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_minimum_value'] = __( 'Minimum Value', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_maximum_value'] = __( 'Maximum Value', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_increment_step'] = __( 'Increment Step', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_enable_inputs'] = __( 'Enable Inputs', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_search_style'] = __( 'Search Style', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_input'] = __( 'Input', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_slider'] = __( 'Slider', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_input_slider'] = __( 'Input + Slider', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_all_settings'] = __( 'All Settings Saved', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_field_name_required'] = __( 'Field name is required.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_field_whitespaces_notallowed'] = __( 'Whitespaces not allowed', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_special_ch_notallowed'] = __( 'Special character not allowed but only (_,-).', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_name_already_exist'] = __( 'Name already exist.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_name_available'] = __( 'Name Available.', 'traveladvisor' );


            // theme_strings();
            $traveladvisor_var_static_text['traveladvisor_var_theme_shortlist'] = __( 'Shortlist', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_shortlisted'] = __( 'Shortlisted', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_shortlisted_jobs'] = __( 'My Shortlisted Jobs', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_login_first_notice'] = __( 'You have to login first.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_not_authorised'] = __( 'You are not authorised', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_remove_favourite'] = __( 'Removed From Favourite', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_employer_contact'] = __( 'Employer Contact from job hunt', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_applied'] = __( 'Applied', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_apply_now'] = __( 'Apply Now', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_remove_from_applied_job'] = __( 'Removed From Applied Job', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_all_locations'] = __( 'All Locations', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_locations'] = __( 'Locations', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_added_to_selected_list'] = __( 'Added to Selected List', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_added_to_list'] = __( 'Added to List', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_please_select_specialism'] = __( 'Please Select specialism', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_specialisms_available'] = __( 'There are no specialisms available.', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_new_user_registration'] = __( '[%s] New User Registration', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_username_and_pass'] = __( 'Your username and password blanblana', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_username'] = __( 'Username', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_password'] = __( 'Password', 'traveladvisor' );
            $traveladvisor_var_static_text['traveladvisor_var_theme_email'] = __( 'E-mail:', 'traveladvisor' );

            // Textarea
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_textarea'] = __( 'Text Area', 'traveladvisor' );

            //Dropdown
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_dropdown'] = __( 'Dropdown', 'traveladvisor' );

            // Date
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_data'] = __( 'Date', 'traveladvisor' );

            // Email
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_email'] = __( 'Email', 'traveladvisor' );


            // Url
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_url'] = __( 'Url', 'traveladvisor' );

            // Range
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields_range'] = __( 'Range', 'traveladvisor' );

            return $traveladvisor_var_static_text;
        }

    }

    new traveladvisor_theme_all_strings;
}
?>