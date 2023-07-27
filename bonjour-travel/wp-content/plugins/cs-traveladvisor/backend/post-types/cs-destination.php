<?php

/**
 * Register Post Type destination
 * @return
 *
 */
if (!class_exists('post_type_destination')) {
    class post_type_destination {
        // The Constructor
        public function __construct() {
            add_action('init', array($this, 'destination_register'));
        }
        /**
         * @Register Post Type
         * @return
         */
        function destination_register() {
            global $traveladvisor_var_static_text;
            $strings = new traveladvisor_plugin_all_strings;
        $strings->traveladvisor_plugin_activation_strings();
        $labels = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_name'),
                'singular_name' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_singular_name'),
                'menu_name' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_menu_name'),
                'name_admin_bar' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_name_admin_bar'),
                'add_new' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_add_new'),
                'add_new_item' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_add_new_item'),
                'new_item' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_new_item'),
                'edit_item' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_edit_item'),
                'view_item' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_view_item'),
                'all_items' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_all_items'),
                'search_items' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_search_items'),
                'parent_item_colon' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_parent_item_colon'), 
                'not_found' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_not_found'),
                'not_found_in_trash' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_not_found_in_trash'),
            );
            $args = array(
                'labels' => $labels,
                 'label' => 'Destination',                
                'description' => '',
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'destination'),
                'capability_type' => 'post',
                'has_archive' => true,
                'hierarchical' => false,
                'menu_position' => null,
                 'menu_icon'   => 'dashicons-location-alt',
                'supports' => array('title', 'editor', 'thumbnail', 'comments')
            );
            register_post_type('destination', $args);
            
                                    // Add to admin_init function
add_filter('manage_edit-destination_columns', 'my_edit_destination_columns');

function my_edit_destination_columns($columns) {

    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' =>  traveladvisor_var_theme_text_srt('traveladvisor_var_tour_destination_name_column'),
        'region' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_country_column'),
        'images' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_gallery_images_column'),
         'author'=>traveladvisor_var_theme_text_srt('traveladvisor_var_tour_author_column'),
        'date' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_date_column'),
    );
    return $columns;
}

add_action('manage_destination_posts_custom_column', 'my_manage_destination_columns', 10, 2);

function my_manage_destination_columns($column, $post_id) {
    global $post;
    switch ($column) {
        case 'region' :
            $country = get_post_meta($post_id, 'traveladvisor_var_country', true);
            if (!empty($country))
            {
                echo esc_html($country);
            }
            else {
                    echo __('------');
                }
            break;
        case 'images' :
            $images = get_post_meta($post_id, 'traveladvisor_var_destination_gallery_images_url', true);
            if (!empty($images)) {

               $images_counter=count($images);
               echo esc_html($images_counter);
            } else {
                echo __('0');
            }
            break;
        case 'publish' :
            $date = get_the_date('d-m-Y');
            echo esc_html( $date);
            break;
        default :
            break;
    }
}
        }
    }
    return new post_type_destination();
}
