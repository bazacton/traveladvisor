<?php
/**
 * Register Post Type tours
 * @return
 *
 */
if (!class_exists('post_type_tours')) {
    class post_type_tours {
        // The Constructor
        public function __construct() {
            add_action('init', array($this, 'tours_register'));
            add_action('init', array($this, 'create_tours_category'));
        }
        /**
         * @Register Post Type
         * @return
         */
        function tours_register() {
            $strings = new traveladvisor_plugin_all_strings;
            $strings->traveladvisor_plugin_activation_strings();
            $labels = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_name'),
                'singular_name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_singular_name'),
                'menu_name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_menu_name'),
                'name_admin_bar' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_name_admin_bar'),
                'add_new' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_add_new'),
                'add_new_item' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_add_new_item'),
                'new_item' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_new_item'),
                'edit_item' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_edit_item'),
                'view_item' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_view_item'),
                'all_items' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_all_items'),
                'search_items' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_search_items'),
                'parent_item_colon' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_parent_item_colon'),
                'not_found' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_not_found'),
                'not_found_in_trash' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_not_found_in_trash'),
            );
            $args = array(
                'labels' => $labels,
                  'label' => 'Tours',
                'description' =>'',
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'tours'),
                'capability_type' => 'post',
                'hierarchical' => false,
                'menu_position' => null,
                'menu_icon' => 'dashicons-palmtree',
                'supports' => array('title', 'editor', 'thumbnail', 'comments'),
                
            );
            register_post_type('tours', $args);
            
                        // Add to admin_init function
add_filter('manage_edit-tours_columns', 'my_edit_tours_columns');

function my_edit_tours_columns($columns) {

    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_name_column'),
        'price' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_price_column'),
        'duration' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_duration_column'),
        'destination' =>traveladvisor_var_theme_text_srt('traveladvisor_var_tour_destination_column'),
         'author'=>traveladvisor_var_theme_text_srt('traveladvisor_var_tour_author_column'),
        'date' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_date_column'),
    );
    return $columns;
}

add_action('manage_tours_posts_custom_column', 'my_manage_tours_columns', 10, 2);

function my_manage_tours_columns($column, $post_id) {
    global $post;
    switch ($column) {
        case 'price' :
            $price = get_post_meta($post_id, 'traveladvisor_var_tours_newprice', true);
            if (!empty($price))
            {
                echo esc_html($price);
            }
        else {
            echo __('-----------------');
            }
            break;
        case 'duration' :
            $duration = get_post_meta($post_id, 'traveladvisor_var_tour_duration', true);
            if (!empty($duration)) {

                echo esc_html($duration);
            } else {
           echo __('---------------');
            }
            break;
        case 'destination' :
            $traveladvisor_type_desti = get_post_meta($post_id, 'traveladvisor_var_tour_destination', true);
            if (empty($traveladvisor_type_desti)) {
                echo __('-----------------');
            } else {
                echo esc_html($traveladvisor_type_desti);
            }
            break;
        default :
            break;
    }
}
        }
        /**
         * @Register Category
         * @return
         */
        function create_tours_category() {
            $labels = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tours_cat_name'),
                'singular_name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tours_cat_singular_name'),
                'search_items' => traveladvisor_var_theme_text_srt('traveladvisor_var_tours_cat_search_items'),
                'all_items' => traveladvisor_var_theme_text_srt('traveladvisor_var_tours_cat_all_items'),
                'parent_item' =>  traveladvisor_var_theme_text_srt('traveladvisor_var_tours_cat_parent_item'),
                'parent_item_colon' => traveladvisor_var_theme_text_srt('traveladvisor_var_tours_cat_parent_item_colon'),
                'edit_item' => traveladvisor_var_theme_text_srt('traveladvisor_var_tours_cat_edit_item'),
                'update_item' => traveladvisor_var_theme_text_srt('traveladvisor_var_tours_cat_update_item'),
                'add_new_item' => traveladvisor_var_theme_text_srt('traveladvisor_var_tours_cat_add_new_item'),
                'new_item_name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tours_cat_new_item_name'),
                'menu_name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tours_cat_menu_name'),
            );
            $args = array(
                'hierarchical' => true,
                'labels' => $labels,
                'show_ui' => true,
                'show_admin_column' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'tours-category'),
            );
            register_taxonomy('tours-category', array('tours'), $args);
        }

    }
    return new post_type_tours();
}
