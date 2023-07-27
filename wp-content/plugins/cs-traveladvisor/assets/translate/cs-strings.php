<?php

/**
 * Static string Return
 */
define('CSPLUGIN_DOMAIN', 'traveladvisor-plugin');
if (!function_exists('traveladvisor_var_theme_text_srt')) {

    function traveladvisor_var_theme_text_srt($str = '') {
        global $traveladvisor_var_static_text;
        if (isset($traveladvisor_var_static_text[$str])) {
            return $traveladvisor_var_static_text[$str];
        }
    }

}
if (!class_exists('traveladvisor_plugin_all_strings')) {

    class traveladvisor_plugin_all_strings {

        public function __construct() {
            $this->traveladvisor_plugin_activation_strings();
        }

        public function traveladvisor_plugin_activation_strings() {
            global $traveladvisor_var_static_text;
            //tour single page
            global $traveladvisor_var_static_text;
            $traveladvisor_var_static_text['traveladvisor_var_price'] = __('Price p. p. from', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_check_availability'] = __('Check Availability', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_select_a_departure'] = __('select a departure', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_adults'] = __('Adults', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_children'] = __('Children', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_infants'] = __('Infants', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_full_name'] = __('Full Name', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_email_address'] = __('Email Address', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_overview'] = __('OVERVIEW', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_trip_highlights'] = __('Trip highlights', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_related_tours'] = __('RELATED TOURS', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_itinary'] = __('Iternary', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_map'] = __('map', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_reviews'] = __('reviews', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_days'] = __('Days', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_place'] = __('Place', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_duration'] = __('Duration: ', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_amazing_gallery'] = __('Amazing Gallery of Tour', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_amazing_see_all'] = __('See all photos', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_you_may_also_check'] = __('You May Also Check', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_you_may_also_check_desc'] = __('These are related tours for same destination.', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_off'] = __('Off', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_perperson'] = __('Per Person', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_gallery'] = __('Gallery', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_about_destination'] = __('About Destination', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_point_of_interest'] = __('Points of interest', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_point_of_website'] = __('Website: ', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_from'] = __('From', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_most_popular_destinations'] = __('Most Popular Destinations', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_most_popular_photos'] = __('Photos', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_most_popular'] = __('Most Papular', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_photos'] = __('Photos', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_trips'] = __('TRIPS', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_all'] = __('All', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_title_or_keywords'] = __('Tour title or keywords', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_available_filters'] = __('Available Filters', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination'] = __('Destinations', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_more'] = __('More', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_search_tour_plan'] = __('Search Tour Plan', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_date'] = __('Date', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_price'] = __('Price', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_relevance'] = __('Relevance', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_sort_by'] = __('Sort By', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_more'] = __('More', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_atoz'] = __('(a to z)', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_lowtohight'] = __('(low to high)', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_hightolow'] = __('(high to low)', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_newtoold'] = __('(new to old)', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_oldtonew'] = __('(old to new)', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_alphabets'] = __('Alphabets', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_no_tours_to_show'] = __('No tours to show', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tours_starting_date'] = __('Tour starting date', CSPLUGIN_DOMAIN);
// plugin shortcodes backend
            $traveladvisor_var_static_text['traveladvisor_var_title'] = __(' Element Title', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_subtitle'] = __('Element SubTitle', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_views'] = __('Tour Views', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_filtration'] = __('Filtration', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_enter_tour_element_title'] = __('Enter Tour Element Title', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_enter_tour_subtitle'] = __('Enter Tour SubTitle Here', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_select_tour_styles'] = __('Select Tour Styles from this dropdown options', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_filtration_on_off'] = __('Filtration on/off', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_yes'] = __('Yes', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_no'] = __('No', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_sorting'] = __('Sorting', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_view_sorting_on_off'] = __('View Tour Sorting On/Off', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_on'] = __('On', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_off'] = __('Off', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_paging_style'] = __('Paging Style', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_select_paging_view_from_this_dropdown'] = __('Select Paging View From This Dropdown', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_all_records'] = __('All Records', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_pagination'] = __('Pagination', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_post_per_page'] = __('Post per page', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_enter_post_per_page'] = __('Enter Post Per Page Numeric Value, If you don not enter post per page then it will show all recodrs', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_excerpt'] = __('Excerpt', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_select_excerpt_on_off'] = __('Select Excerpt On/Off this option can help to increase or decrease number of text/content', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_excerpt_length'] = __('Excerpt Length', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_enter_post_excerpt_length_here'] = __('Enter Post Excerpt lenth here', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_please_select'] = __('Please Select', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tours_listing'] = __('Tours Listing', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tours_clear_all'] = __('Clear all', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tours_grid'] = __('Tours Grid', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_enter_gallery_title'] = __('Enter Gallery Title Here', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_enter_gallery_subtitle_here'] = __('Enter Gallery Subtitle Here', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_gallery_views_hint'] = __('Select Your Favourite Gallery View From This Dropdown list', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_gallery_views'] = __('Gallery View', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_please_select_view'] = __('Please Select View', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_default'] = __('Default', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_famous'] = __('Famous', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_masonary'] = __('Masonary', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_slider'] = __('Slider', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_unique'] = __('Unique', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_select_column'] = __('Select Column', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_select_column_view_from_this_dropdown'] = __('Select Column view from this drop down', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_one_column'] = __('One Column', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_two_column'] = __('Two Column', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_three_column'] = __('Three Column', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_four_column'] = __('Four Column', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_five_column'] = __('Five Column', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_choose_category'] = __('Choose Category', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_select_category_to_show'] = __('Select category to show posts. If you dont select category it will display all posts', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_choose_gallery'] = __('Choose Gallery', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_choose_gallery_hint'] = __('Select Gallery to show posts. If you dont select Gallery it will display all posts', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_gallery_per_page'] = __('Gallery per page', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_gallery_per_page_hint'] = __('Enter number of gallery posts per page', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_enter_destination_element_title'] = __('Enter Destination Element Title', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_enter_destination_element_subtitle'] = __('Enter Destination Element Sub Title', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_views'] = __('Destination Views', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_views_hint'] = __('Select destination styles from this drop down', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_listing'] = __('Listing', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_grid'] = __('Grid', CSPLUGIN_DOMAIN);
//custom post type registration
            $traveladvisor_var_static_text['traveladvisor_var_description'] = __('Description', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_name'] = _x('Destination', 'post type singular name', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_singular_name'] = _x('Destination', 'post type singular name', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_menu_name'] = _x('Destination', 'admin menu', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_name_admin_bar'] = _x('Destination', 'add new on admin bar', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_add_new'] = _x('Add New', 'Destination', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_add_new_item'] = __('Add New Destination', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_new_item'] = __('New Destination', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_edit_item'] = __('Edit Destination', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_view_item'] = __('View Destination', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_all_items'] = __('All Destinations', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_search_items'] = __('Search destination', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_parent_item_colon'] = __('Parent Destination:', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_not_found'] = __('No Destination found.', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_not_found_in_trash'] = __('No Destination found in Trash.', CSPLUGIN_DOMAIN);
            // custom post type destination column addition
            $traveladvisor_var_static_text['traveladvisor_var_tour_gallery_images_column'] = __('Gallery Images', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_country_column'] = __('Country/ State/ Region', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_destination_name_column'] = __('Destination Name', CSPLUGIN_DOMAIN);
//destination categories
            $traveladvisor_var_static_text['traveladvisor_var_destination_cat_name'] = _x('Categories', 'taxonomy general name', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_cat_singular_name'] = _x('Category', 'taxonomy singular name', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_cat_search_items'] = __('Search Categories', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_cat_all_items'] = __('All Categories', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_cat_parent_item'] = __('Parent Category', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_cat_parent_item_colon'] = __('Parent Category:', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_cat_edit_item'] = __('Edit Category', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_cat_update_item'] = __('Update Category', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_cat_add_new_item'] = __('Add New Category', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_cat_new_item_name'] = __('New Category Name', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_cat_menu_name'] = __('Categories', CSPLUGIN_DOMAIN);
            //custom post type registration gallery
            $traveladvisor_var_static_text['traveladvisor_var_gallery_name'] = _x('Galleries', 'post type general name', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_gallery_singular_name'] = _x('Gallery', 'post type singular name', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_gallery_menu_name'] = _x('Galleries', 'admin menu', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_gallery_name_admin_bar'] = _x('Gallery', 'add new on admin bar', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_gallery_add_new'] = _x('Add New', 'gallery', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_gallery_add_new_item'] = __('Add New Gallery', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_gallery_new_item'] = __('New Gallery', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_gallery_edit_item'] = __('Edit Gallery', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_gallery_view_item'] = __('View Gallery', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_gallery_all_items'] = __('All Galleries', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_gallery_search_items'] = __('Search Galleries', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_gallery_parent_item_colon'] = __('Parent Galleries:', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_gallery_not_found'] = __('No galleries found.', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_gallery_not_found_in_trash'] = __('No galleries found in Trash.', CSPLUGIN_DOMAIN);
            //custom post type gallery columns addition
            $traveladvisor_var_static_text['traveladvisor_var_tour_category_column'] = __('Category', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_gallery_name_column'] = __('Gallery Name', CSPLUGIN_DOMAIN);
            //galleries categories    
            $traveladvisor_var_static_text['traveladvisor_var_cat_name'] = _x('Categories', 'taxonomy general name', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_cat__singular_name'] = _x('Category', 'taxonomy singular name', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_cat__search_items'] = __('Search Categories', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_cat__all_items'] = __('All Categories', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_cat__parent_item'] = __('Parent Category', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_parent_cat__item_colon'] = __('Parent Category:', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_cat__edit_item'] = __('Edit Category', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_cat__update_item'] = __('Update Category', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_cat__add_new_item'] = __('Add New Category', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_cat__new_item_name'] = __('New Category Name', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_cat__menu_name'] = __('Categories', CSPLUGIN_DOMAIN);
            //general
            $traveladvisor_var_static_text['traveladvisor_var_insert'] = __('Insert', CSPLUGIN_DOMAIN);
            //custom post type tours registration
            $traveladvisor_var_static_text['traveladvisor_var_tour_name'] = _x('Tours', 'post type general name', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_singular_name'] = _x('Tour', 'post type singular name', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_menu_name'] = _x('Tours', 'admin menu', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_name_admin_bar'] = _x('Tour', 'add new on admin bar', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_add_new'] = _x('Add New', 'Tour', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_add_new_item'] = __('Add New Tour', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_new_item'] = __('New Tour', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_edit_item'] = __('Edit Tour', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_view_item'] = __('View Tour', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_all_items'] = __('All Tours', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_search_items'] = __('Search Tours', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_parent_item_colon'] = __('Parent Tour:', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_not_found'] = __('No Tour found.', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_not_found_in_trash'] = __('No Tour found in Trash.', CSPLUGIN_DOMAIN);
            //custom post type tours column addition 
            $traveladvisor_var_static_text['traveladvisor_var_tour_name_column'] = __('Tour Name', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_price_column'] = __('Tour Price', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_duration_column'] = __('Duration', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_destination_column'] = __('Destination', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_author_column'] = __('Author', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_date_column'] = __('Date', CSPLUGIN_DOMAIN);
            //tours categories
            $traveladvisor_var_static_text['traveladvisor_var_tours_cat_name'] = _x('Categories', 'taxonomy general name', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tours_cat_singular_name'] = _x('Category', 'taxonomy singular name', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tours_cat_search_items'] = __('Search Categories', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tours_cat_all_items'] = __('All Categories', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tours_cat_parent_item'] = __('Parent Category', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tours_cat_parent_item_colon'] = __('Parent Category:', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tours_cat_edit_item'] = __('Edit Category', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tours_cat_update_item'] = __('Update Category', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tours_cat_add_new_item'] = __('Add New Category', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tours_cat_new_item_name'] = __('New Category Name', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tours_cat_menu_name'] = __('Categories', CSPLUGIN_DOMAIN);
            //destination meta
            $traveladvisor_var_static_text['traveladvisor_var_destination_country/state/region'] = __('Country / State / Region', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_country_hint'] = __('Enter the destination country,state or region', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_most_popular'] = __('Most Popular', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_most_popular_no'] = __('No', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_most_popular_yes'] = __('Yes', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_meta_options'] = __('Destination Options', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_most_popular_hint'] = __('Popular Destination Enable/Disable', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_add_gallery'] = __('Add Gallery Images', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_point_of_interest'] = __('Point of interest', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_point_of_interest_hint'] = __('point of interest Enable/Disable', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_add_point_of_interest'] = __('Add Point of interest', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_title_point_of_interest'] = __('Title', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_title_url_point_of_interest'] = __('Title URL', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_title_url_point_of_interest_hint'] = __('add title url', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_actions_point_of_interest'] = __('Actions', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_experiences_setting'] = __('Experiences Setting', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_description'] = __('Description', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_add_image'] = __('Add Image', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_add_image_hint'] = __('upload your point of interest image', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_website_url'] = __('Website Url', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_website_url_hint'] = __('Add website url', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_point_of_interest_settings'] = __('Point of interest Settings', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_update_title'] = __('Update Title', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_edit_title_url'] = __('Edit title url', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_update_description'] = __('Update Description', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_update_image'] = __('Update Image', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_update_image_hint'] = __('upload your point of interest image', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_update_website_url'] = __('Update website url', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_update_website_url_hint'] = __('Add website url', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_destination_update_experience'] = __('Update Experience', CSPLUGIN_DOMAIN);
            // gallery meta
            $traveladvisor_var_static_text['traveladvisor_var_gallery_meta_options'] = __('Gallery Options', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_gallery_add_images'] = __('Add Gallery Images', CSPLUGIN_DOMAIN);

            //tours meta
            $traveladvisor_var_static_text['traveladvisor_var_tour_options'] = __('Tours Options', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_custom_fields'] = __('Custom Fields', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_select_destination'] = __('Select Destinations', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_select_destination_hint'] = __('Select any destination for this tour', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_select_gallery_images_hint'] = __('Select gallery images for your tour', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_select_gallery_images'] = __('Add Gallery Images', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_duration'] = __('Tour Duration', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_duration_hint'] = __('Enter duration in time/days/months/ for your tour', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_starting_date'] = __('Tour Starting Date', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_starting_date_hint'] = __('Enter the date here on which tour is going to start', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_organizer_email'] = __('Organizer Email Address', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_organizer_email_hint'] = __('Enter Email Address of tour organizer to allow applicants to send email from detail page', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_prices'] = __('Prices', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_old_prices'] = __('Old Price', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_old_prices_hint'] = __('Set here Old price for your tour', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_new_prices'] = __('New Price', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_new_prices_hint'] = __('Set here new price for your tour', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_discount_prices'] = __('Discount Percent', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_discount_prices_hint'] = __('Enter Discount in percentage e.g 10', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_user_reviews'] = __('User Reviews', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_user_reviews_title'] = __('Reviews Title', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_user_reviews_title_hint'] = __('Set Title For User Reviews Section', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_user_reviews_subtitle'] = __('Reviews Sub Title', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_user_reviews_subtitle_hint'] = __('Set Sub-title For User Reviews Section', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_asked_questions'] = __('Frequently Asked Questions', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_asked_questions_title'] = __('Questionnaire Title', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_asked_questions_title_tint'] = __('Set Title For Frequently asked questions section', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_highlights'] = __('Trip Highlights', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_highlights_title'] = __('Highlights Title', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_highlights_title_hint'] = __('Set Title For Tour Highlights', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_schedule'] = __('Schedules', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_schedule_title'] = __('Schedule Title', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_schedule_title_hint'] = __('Set Title For tour schedule section', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_detail_image'] = __(' Tour detail image', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_detail_image_hint'] = __(' Add an image for tour detail page', CSPLUGIN_DOMAIN);
            
	    $traveladvisor_var_static_text['traveladvisor_var_tour_add_user_review'] = __('Add User Review', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_table_title'] = __('Title', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_table_actions'] = __('Actions', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_review_settings'] = __('Review Setting', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_name_of_person'] = __('Name of Person', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_name_of_person_hint'] = __('Add Name of Person, You received review form, through email or any other resources', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_review_title'] = __('Review Title', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_review_title_hint'] = __('Add Review Title', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_review_desc'] = __('Review Description', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_review_desc_hint'] = __('Add Review Description Here', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_image'] = __('Add Image', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_image_hint'] = __('upload Image Of Person', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_update_name'] = __('Update Name', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_update_name_hint'] = __('You can update the name through this field', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_edit_user_review'] = __('Edit Review Title', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_edit_user_review_hint'] = __('Edit Review Title', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_edit_user_review_desc'] = __('Update Review Description', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_edit_user_review_desc_hint'] = __('You can update user review description through this field', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_update_image'] = __('Update Image', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_update_image_hint'] = __('update image of person', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_update_review'] = __('Update Review', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_add_schedule'] = __('Add Schedule', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_table_title'] = __('Title', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_table_actions'] = __('Actions', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_schedule_settings'] = __('Schedule Settings', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_place'] = __('Place', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_place_hint'] = __('please enter your destination or visiting place here, this will appearon map.', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_day_number'] = __('Day Number', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_day_number_hint'] = __('Enter Your Schedule day number e.g Day1/Day8 max-listing=8', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var__tour_duration'] = __('Duration', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var__tour_duration_hint'] = __('You can enter duratiion in hours here', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var__tour_desc'] = __('Description', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var__tour_desc_hint'] = __('You can enter your tour description here which will appear in Sub header of tour detail page.', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_add_image'] = __('Add Image', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_add_image_hint'] = __('upload Image Of Place', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_day'] = __('Day', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_day_hint'] = __('Please enter day number from your visiting schedule for example Day1/Day8 max-listing=8', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_update_image'] = __('Update Image', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_update_image_hint'] = __('You can easily update scheduled image here', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_update_schedule'] = __('Update Schedule', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_add_question'] = __('Add Question', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_question_settings'] = __('Questionnaire Setting', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_question'] = __('Question', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_question_hint'] = __('Enter Normally asked questions by visitors here', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_answer'] = __('Answer', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_answer_hint'] = __('Enter answer of frequently asked question here', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_update_question'] = __('Update Question', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_add_highlights'] = __('Add Highlights', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_highlight_settings'] = __('Highlight Settings', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_highlight_title'] = __('Highlight Title', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_highlight_title_hint'] = __('Enter Your Tour Hightlight Title Here', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_desc'] = __('Description', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_desc_hint'] = __('Enter Description here', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_add_schedule'] = __('Add Schedule', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_add_question'] = __('Add Question', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_add_highlight'] = __('Add Highlight', CSPLUGIN_DOMAIN);
            $traveladvisor_var_static_text['traveladvisor_var_tour_update_highlight'] = __('Update Highlight', CSPLUGIN_DOMAIN);




            return $traveladvisor_var_static_text;
        }

    }

    new traveladvisor_plugin_all_strings;
}
?>