<?php

/**
 * Static string Return
 */
define('CSFRAME_DOMAIN', 'traveladvisor-framework');
if (!function_exists('traveladvisor_var_theme_text_srt')) {

    function traveladvisor_var_theme_text_srt($str = '') {
        global $traveladvisor_var_static_text;
        if (isset($traveladvisor_var_static_text[$str])) {
            return $traveladvisor_var_static_text[$str];
        }
    }

}
if (!class_exists('traveladvisor_frame_plugin_all_strings')) {

    class traveladvisor_frame_plugin_all_strings {

        public function __construct() {
            $this->traveladvisor_plugin_activation_strings();
        }

        

        public function traveladvisor_plugin_activation_strings() {
            global $traveladvisor_var_static_text;
            //tour single page
            global $traveladvisor_var_static_text;
           
            // cs-traveladvisor-framework
            // Post Meta
            $traveladvisor_var_static_text['traveladvisor_var_post_meta_options'] = __('Post Options', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_post_meta_general_settings'] = __('General Settings', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_post_meta_subheader'] = __('Subheader', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_post_meta_social_sharing'] = __('Social Sharing', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_post_meta_tags'] = __('Tags', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_post_meta_related_post'] = __('Related Post', CSFRAME_DOMAIN);
            // Page Meta
            $traveladvisor_var_static_text['traveladvisor_var_page_meta_options'] = __('Page Options', CSFRAME_DOMAIN);
            //cs-page-functions
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_subheader'] = __('Choose Sub-Header', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_default_subheader'] = __('Default Subheader', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_custom_subheader'] = __('Custom Subheader', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_revolution_slider'] = __('Revolution Slider', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_map'] = __('Map', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_nosubheader'] = __('No Subheader', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_style'] = __('Style', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_simple'] = __('Simple', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_classic'] = __('Classic', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_with_bg_image'] = __('With Background Image', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_padding_top'] = __('Padding Top', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_padding_top_hint'] = __('Set padding top here. it affects before title', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_padding_bottom'] = __('Padding Bottom', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_padding_bottom_hint'] = __('Set padding top bottom. it affects before title', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_margin_top'] = __('Margin Top', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_margin_top_hint'] = __('Set Margin top here. it affects before title', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_margin_bottom'] = __('Margin Bottom', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_margin_bottom_hint'] = __('Set Margin top bottom. it affects before title', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_page_title'] = __('Page Title', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_breadcrumbs'] = __('Breadcrumbs', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_text_color'] = __('Text Color', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_text_color_hint'] = __('Provide a hex color code here (with #) for title.', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_border_color'] = __('Border Color', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_border_color_hint'] = __('Provide a hex color code here (with #) for border.', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_fancy_heading'] = __('Fancy Heading', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_fancy_heading_hint'] = __('Enter Fancy text here.it will display before title.', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_sub_heading'] = __('Sub Heading', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_sub_heading_hint'] = __('Enter subheading text here.it will display after title.', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_bg_image'] = __('Background Image', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_bg_image_hint'] = __('Choose subheader background image from media gallery or leave it empty for display default image set by theme options.', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_parallax'] = __('Parallax', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_parallax_hint'] = __('Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling can be enable with this switch.', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_bg_color'] = __('Background Color', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_bg_color_hint'] = __('Provide a hex color code here (with #) if you want to override the default, leave it empty for using background image.', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_select_slider'] = __('Select Slider', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_custom_map'] = __('Custom Map Short Code', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_header_border_color'] = __('Header Border Color', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_header_border_color_hint'] = __('Provide a hex color code here (with #) for header border color.', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_choose_header_style'] = __('Choose Header Style', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_modern_header_style'] = __('Modern Header Style', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_default_header_style'] = __('Default header style', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_select_sidebar'] = __('Select Sidebar', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_choose_sidebar'] = __('Choose Sidebar', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_choose_sidebar_hint'] = __('Choose sidebar layout for this post.', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_left_sidebar'] = __('Select Left Sidebar', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_functions_right_sidebar'] = __('Select Right Sidebar', CSFRAME_DOMAIN);

            // Page Builder
            $traveladvisor_var_static_text['traveladvisor_var_page_builder_meta'] = __('CS Page Builder', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_page_builder_sections'] = __('Add Page Sections', CSFRAME_DOMAIN);

            // Product Meta
            $traveladvisor_var_static_text['traveladvisor_var_product_meta_options'] = __('Product Options', CSFRAME_DOMAIN);
            
            
            // Frame Functions
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_add_element'] = __('Add Element', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_search'] = __('Search', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_filter_by'] = __('Filter by', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_show_all'] = __('Show all', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_insert_shortcode'] = __('CS: Insert shortcode', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_options'] = __('Options', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_edit_page_section'] = __('Edit Page Section', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_title'] = __('Title', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_title_hint'] = __('This Title will view on top of this section.', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_subtitle'] = __('Sub Title', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_subtitle_hint'] = __('This Sub Title will view below the Title of this section.', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_background_view'] = __('Background View', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_title_align'] = __('Title Align', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_left_align'] = __('Left Align', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_right_align'] = __('Right Align', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_center_align'] = __('Center Align', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_title_align_hint'] = __('Set alignment of section title and sub title', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_background_view_hint'] = __('Choose Background View.', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_none'] = __('None', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_background_image'] = __('Background Image', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_custom_slider'] = __('Custom Slider', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_video'] = __('Video', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_video_url'] = __('Video Url', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_background_image_position'] = __('Background Image Position', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_background_image_position_hint'] = __('Choose Background Image Position', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_nr_center_top'] = __('no-repeat center top', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_nr_center'] = __('no-repeat center', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_nr_center_cover'] = __('no-repeat center / cover', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_r_center'] = __('repeat center', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_nr_left_top'] = __('no-repeat left top', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_r_left_top'] = __('repeat left top', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_nr_fixed_center'] = __('no-repeat fixed center', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_nr_fixed_center_cover'] = __('no-repeat fixed center / cover', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_custom_slider_hint'] = __('Enter Custom Slider.', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_browse'] = __('Browse', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_enable_mute'] = __('Enable Mute', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_mute_Selection'] = __('Choose Mute selection', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_yes'] = __('Yes', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_no'] = __('No', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_video_autoplay'] = __('Video Auto Play', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_video_autoplay_hint'] = __('Choose Video Auto Play selection', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_enable_parallax'] = __('Enable Parallax', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_select_view'] = __('Select View', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_box'] = __('Box', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_Wide'] = __('Wide', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_bg_color_hint'] = __('Choose background color', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_padding_top'] = __('Padding Top', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_padding_top_hint'] = __('Set the Padding top (In px)', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_padding_bottom'] = __('Padding Bottom', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_padding_bottom_hint'] = __('Set the Padding Bottom (In px)', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_margin_top'] = __('Margin Top', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_margin_top_hint'] = __('Set the Margin Top (In px)', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_margin_bottom'] = __('Margin Bottom', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_margin_bottom_hint'] = __('Set the Margin Bottom (In px)', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_border_top'] = __('Border Top', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_border_top_hint'] = __('Set the Border top (In px)', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_border_bottom'] = __('Border Bottom', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_border_bottom_hint'] = __('Set the Border Bottom (In px)', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_border_color'] = __('Border Color', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_title_color'] = __('Title Color', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_sub_title_color'] = __('Sub Title Color', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_border_color_hint'] = __('Choose Border color.', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_title_color_hint'] = __('Choose Title color.', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_sub_title_color_hint'] = __('Choose Sub Title color.', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_custom_id'] = __('Custom Id', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_custom_id_hint'] = __('Enter Custom Id.', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_select_layout'] = __('Select Layout', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_select_left_sidebar'] = __('Select Left Sidebar', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_select_right_sidebar'] = __('Select Right Sidebar', CSFRAME_DOMAIN);
            
            // Frame function shortcodes names
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_column'] = __('Column', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_column_hint'] = __('Shortcode for Column', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_quote'] = __('Quote', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_quote_hint'] = __('Shortcode for quote', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_infobox'] = __('Infobox', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_infobox_hint'] = __('Pass On Specific Information', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_pricetable'] = __('PriceTable', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_pricetable_hint'] = __('Speak Out Your Pricing Plans', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_contact_us'] = __('Contact Us', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_contact_us_hint'] = __('Shortcode for contact us form', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_list'] = __('List', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_list_hint'] = __('Shortcode for Show items in list order', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_progress_bar'] = __('Progress Bar', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_progress_bar_hint'] = __('Shortcode for Show items in Progress order', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_blog'] = __('Blog', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_blog_hint'] = __('Blog Shortcode for show posts', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_map'] = __('Map', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_map_hint'] = __('Map Shortcode for tour place/destination', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_testimonial'] = __('Testimonial', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_testimonial_desigination'] = __('Company Name', CSFRAME_DOMAIN);
            
			$traveladvisor_var_static_text['traveladvisor_var_testimonial_author_color'] = __('Author/Company color', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_testimonial_author_color_hint'] = __('Choose text color for author & company', CSFRAME_DOMAIN);
            
			$traveladvisor_var_static_text['traveladvisor_var_testimonial_desigination_hint'] = __('Add company name here', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_testimonial_hint'] = __('Travel Advisor Testimonial Shortcode', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_accordion'] = __('Accordion', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_accordion_hint'] = __('Travel Advisor Accordion Shortcode', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_multi_services'] = __('Multi services', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_multi_services_hint'] = __('Travel Advisor Multiservices Shortcode', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_multi_team'] = __('Team', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_multi_team_hint'] = __('Add Team Members On The Go', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_icon_box'] = __('Icon Box', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_icon_box_hint'] = __('Travel Advisor Icon Box Shortcode', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_multi_counters'] = __('Counters', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_multi_counters_hint'] = __('Travel Advisor Counters Shortcode', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_multi_pricetable'] = __('PriceTable', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_multi_pricetable_hint'] = __('Travel Advisor Price table Shortcode', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_clients'] = __('Clients', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_clients_hint'] = __('Travel Advisor clients Shortcode', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_heading'] = __('Heading', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_heading_hint'] = __('Travel Advisor Heading Shortcode', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_divider'] = __('Divider', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_divider_hint'] = __('Divider Shortcode for text/content', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_image_frame'] = __('Image Frame', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_image_frame_hint'] = __('Create Image frame', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_tabs'] = __('Tabs', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_tabs_hint'] = __('You can manage your tabs using this shortcode', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_table'] = __('Table', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_table_hint'] = __('You can manage your table using this shortcode', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_button'] = __('Button', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_button_hint'] = __('Create Custom Button Link', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_tour_search'] = __('Tour Search Box', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_tour_search_hint'] = __('Advance Search Box Tours', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_maintenance'] = __('Maintenance', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_maintenance_hint'] = __('Shortcode for Maintenance', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_gallery'] = __('Gallery', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_gallery_hint'] = __('Add Gallery Images', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_destination'] = __('Destination', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_destination_hint'] = __('Shortcode for tour destination', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_tours'] = __('Tours', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_tours_hint'] = __('Shortcode for Tours', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_shortcode_wc_feature_product'] = __('WC Feature Product', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_typography'] = __('Typography', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_common_elements'] = __('Common Elements', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_media_element'] = __('Media Element', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_content_blocks'] = __('Content Blocks', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_loops'] = __('Loops', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_element_size'] = __('Element Size', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_element_size_hint'] = __('Select column width. This width will be calculated depend page width', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_element_full_width'] = __('Full width', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_element_one_half'] = __('One half', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_element_one_third'] = __('One third', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_element_two_third'] = __('Two third', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_element_one_fourth'] = __('One fourth', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_frame_function_element_three_fourth'] = __('Three fourth', CSFRAME_DOMAIN);
            //icon box
            $traveladvisor_var_static_text['traveladvisor_var_service_icon_type'] = __('Icon Type', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_service_icon_type_hint'] = __('Select icon type image or font icon.', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_service_icon'] = __('Icon', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_service_image'] = __('Image', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_image'] = __('Icon Box Image', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_image_hint'] = __('only one thing is select at a time from icon or image.Image only for sidebar widget IconBox/services', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_icon'] = __('Icon', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_url'] = __('Title Link', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_url_hint'] = __('Enter Icon Box title link here.', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_contents'] = __('Content', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_contents_hint'] = __('Add content of the item', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_title'] = __('Title', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_multiservices_title_hint'] = __('Add your item title here', CSFRAME_DOMAIN);
            // infobox
           $traveladvisor_var_static_text['traveladvisor_var_infobox_title_main'] = __('Element Title', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_infobox_title_main_hint'] = __('Add your ', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_infobox_title_color'] = __('Title Color', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_infobox_title_color_hint'] = __('Choose the title color', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_infobox_icon_color'] = __('Icon Color', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_infobox_icon_color_hint'] = __('Choose the icon color', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_infobox_icon'] = __('Icon', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_infobox_icon_hint'] = __('Choose the icon', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_infobox_contents'] = __('Contents', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_infobox_contents_hint'] = __('Enter contents here', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_infobox_infobox'] = __('Infobox', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_infobox_edit_infobox_options'] = __('Infobox Options', CSFRAME_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_add_infobox'] = __('Add infobox', CSFRAME_DOMAIN);
            

            

            return $traveladvisor_var_static_text;
        }

    }

    new traveladvisor_frame_plugin_all_strings;
}
?>