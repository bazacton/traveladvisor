<?php
/*
 * Frontend file for destination custom post
 */
if (!function_exists('traveladvisor_destination_data')) {

    function traveladvisor_destination_data($atts, $content = "") {
        global $wpdb, $wp_traveladvisor, $traveladvisor_var_wp_traveladvisor_core, $traveladvisor_var_static_text, $traveladvisor_var_destination_elements, $post;
        $strings = new traveladvisor_plugin_all_strings;
        $strings->traveladvisor_plugin_activation_strings();
        $defaults = shortcode_atts(array(
            'traveladvisor_var_column_size' => '',
            'traveladvisor_var_destination_element_title' => '',
            'traveladvisor_var_destination_view' => '',
            'traveladvisor_var_destination_category' => '',
            'traveladvisor_var_destination_paging_filter_style' => '',
            'traveladvisor_var_destination_item_per_page' => '',
            'traveladvisor_var_destination_excerpt' => '',
            'traveladvisor_var_destination_excerpt_length' => '',
                ), $atts);

        extract(shortcode_atts($defaults, $atts));

        //Set All variables

        $column_class = '';
        if (isset($traveladvisor_var_column_size) && $traveladvisor_var_column_size != '') {
            if (function_exists('traveladvisor_var_custom_column_class')) {
                $column_class = traveladvisor_var_custom_column_class($traveladvisor_var_column_size);
            }
        }
        $traveladvisor_var_destination_element_title = isset($traveladvisor_var_destination_element_title) ? $traveladvisor_var_destination_element_title : '';
        $traveladvisor_var_destination_view = isset($traveladvisor_var_destination_view) ? $traveladvisor_var_destination_view : '';
        $traveladvisor_var_destination_category = isset($traveladvisor_var_destination_category) ? $traveladvisor_var_destination_category : '';
        $traveladvisor_destination_filter_type = isset($traveladvisor_destination_filter_type) ? $traveladvisor_destination_filter_type : '1';
        $traveladvisor_var_destination_excerpt_length = isset($traveladvisor_var_destination_excerpt_length) ? $traveladvisor_var_destination_excerpt_length : '';
        $traveladvisor_var_destination_paging_filter_style = isset($traveladvisor_var_destination_paging_filter_style) ? $traveladvisor_var_destination_paging_filter_style : '';
        $traveladvisor_var_destination_excerpt = isset($traveladvisor_var_destination_excerpt) ? $traveladvisor_var_destination_excerpt : '';
        $traveladvisor_var_destination_item_per_page = isset($traveladvisor_var_destination_item_per_page) ? $traveladvisor_var_destination_item_per_page : '-1';

        //End All variables

        $traveladvisor_var_rand = rand(1212, 65464);
        //Start Array For Globals Variables

        $traveladvisor_var_destination_elements = array(
            'traveladvisor_var_rand' => $traveladvisor_var_rand,
            'traveladvisor_var_destination_excerpt' => $traveladvisor_var_destination_excerpt,
            'traveladvisor_var_destination_excerpt_length' => $traveladvisor_var_destination_excerpt_length,
            'traveladvisor_var_destination_category' => $traveladvisor_var_destination_category,
            'traveladvisor_var_destination_paging_filter_style' => $traveladvisor_var_destination_paging_filter_style,
            'traveladvisor_var_destination_item_per_page' => $traveladvisor_var_destination_item_per_page
        );

        // Counter for paging 

        static $traveladvisor_var_custom_counter;
        if (!isset($traveladvisor_var_custom_counter)) {
            $traveladvisor_var_custom_counter = 1;
        } else {
            $traveladvisor_var_custom_counter ++;
        }

        $traveladvisor_var_page = isset($_GET['destination_paging_' . $traveladvisor_var_custom_counter]) ? $_GET['destination_paging_' . $traveladvisor_var_custom_counter] : '1';
        $traveladvisor_var_filter = '';
        $traveladvisor_var_destination_category = isset($traveladvisor_var_destination_category) ? $traveladvisor_var_destination_category : '';
        $traveladvisor_var_catid = explode(",", $traveladvisor_var_destination_category);

        if ($traveladvisor_var_destination_category <> '') {
            $traveladvisor_var_filter = array(
                'taxonomy' => 'destination-category',
                'field' => 'term_id',
                'terms' => $traveladvisor_var_catid,
            );
        } else {
            $traveladvisor_var_filter = '';
        }

        $args = array(
            'post_type' => 'destination',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'tax_query' => array(
                $traveladvisor_var_filter
            )
        );

        $query = new WP_Query($args);
        $traveladvisor_var_post_counts = $query->post_count;
        $args = array(
            'shortcode_paging' => $traveladvisor_var_page,
            'post_type' => 'destination',
            'posts_per_page' => $traveladvisor_var_destination_item_per_page,
            'post_status' => 'publish',
            'tax_query' => array(
                $traveladvisor_var_filter
            )
        );

        // Start  code for paging multipal shortcode 
        unset($args['destination_paging_' . $traveladvisor_var_custom_counter]);
        if (isset($_GET['destination_paging_' . $traveladvisor_var_custom_counter])) {
            $args['paged'] = $_GET['destination_paging_' . $traveladvisor_var_custom_counter];
        } else {
            $args['paged'] = 1;
        }

        $traveladvisor_var_post_count = $query->post_count;
        if (isset($column_class) && $column_class <> '') {
            echo '<div class="' . esc_html($column_class) . '">';
        }
        if ($traveladvisor_var_post_count <> 0) {

            set_query_var('args', $args);



            //Frontend view Templates 
            if ($traveladvisor_var_destination_element_title <> '') {
                ?>
                <div class="cs-element-title">
                    <h3><?php echo esc_html($traveladvisor_var_destination_element_title); ?></h3>
                </div>
                <?php
            } if ($traveladvisor_var_destination_paging_filter_style == "single_filter") {
                traveladvisor_var_filter($traveladvisor_var_destination_category);
            }
            if ($traveladvisor_var_destination_view == 'destination_box') {
                $traveladvisor_var_wp_traveladvisor_core->traveladvisor_var_get_template_part('destination', 'box', 'destination/listings');
            } elseif ($traveladvisor_var_destination_view == 'destination_listing') {
                $traveladvisor_var_wp_traveladvisor_core->traveladvisor_var_get_template_part('destination', 'list', 'destination/listings');
            } elseif ($traveladvisor_var_destination_view == 'destination_grid') {
                $traveladvisor_var_wp_traveladvisor_core->traveladvisor_var_get_template_part('destination', 'grid', 'destination/listings');
            } elseif ($traveladvisor_var_destination_view == 'destination_masnory') {
                $traveladvisor_var_wp_traveladvisor_core->traveladvisor_var_get_template_part('destination', 'masnory', 'destination/listings');
            } elseif ($traveladvisor_var_destination_view == 'destination_slider') {
                $traveladvisor_var_wp_traveladvisor_core->traveladvisor_var_get_template_part('destination', 'slider', 'destination/listings');
            }
        }

        // End Templates and Pagination start 
        $traveladvisor_var_page = 'destination_paging_' . $traveladvisor_var_custom_counter;

        if ($traveladvisor_var_destination_paging_filter_style == "pagination" && $traveladvisor_var_post_counts > $traveladvisor_var_destination_item_per_page && $traveladvisor_var_destination_item_per_page > 0) {
            $total_pages = '';

            $total_pages = ceil($traveladvisor_var_post_counts / $traveladvisor_var_destination_item_per_page);

            echo '<nav>';
            echo '<div class="row">';
            traveladvisor_var_get_pagination($total_pages, isset($_GET[$traveladvisor_var_page]) ? $_GET[$traveladvisor_var_page] : 1, $traveladvisor_var_page);
            echo '</div>';
            echo '</nav>';
        }
        // Pagination End 
        if (isset($column_class) && $column_class <> '') {
            echo '</div>';
        }
    }

    add_shortcode('traveladvisor_destination', 'traveladvisor_destination_data');
}

if(!function_exists('traveladvisor_var_filter')){
function traveladvisor_var_filter($traveladvisor_var_destination_category) {

    global $wp_traveladvisor, $traveladvisor_var_catid, $traveladvisor_var_destination_elements, $traveladvisor_var_rand, $traveladvisor_var_custom_counter;
    $wp_traveladvisor->traveladvisor_isotope_enqueue();
    $traveladvisor_var_rand = $traveladvisor_var_destination_elements['traveladvisor_var_rand'];
    ?>
    <script type="text/javascript">
        jQuery(window).load(function () {
            jQuery(function (jQuery) {
                jQueryportfolio_<?php echo absint($traveladvisor_var_rand) ?> = jQuery('.project-stylist-<?php echo absint($traveladvisor_var_rand) ?>').find('> .row');
                jQueryportfolio_<?php echo absint($traveladvisor_var_rand) ?>.isotope({
                    itemSelector: '.cs-traveladvisor-project<?php echo absint($traveladvisor_var_rand) ?>',
                    layoutMode: 'fitRows'
                });
                jQueryportfolio_selectors_<?php echo absint($traveladvisor_var_rand) ?> = jQuery('.cs-traveladvisor-destination<?php echo absint($traveladvisor_var_rand) ?>').find('> li >a');
                jQueryportfolio_selectors_<?php echo absint($traveladvisor_var_rand) ?>.on('click', function () {
                    jQueryportfolio_selectors_<?php echo absint($traveladvisor_var_rand) ?>.removeClass('active');
                    jQuery(this).addClass('active');
                    var selector = jQuery(this).attr('data-filter');
                    jQueryportfolio_<?php echo absint($traveladvisor_var_rand) ?>.isotope({filter: selector});
                    return false;
                });
            });
        });
    </script>
    <?php
    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center"><div class="row item">
                        <ul class="cs-filtter cs-traveladvisor-destination' . absint($traveladvisor_var_rand) . '" data-rand="' . absint($traveladvisor_var_rand) . '">';
    // Start Filter Category base
    if ($traveladvisor_var_destination_category <> '') {
        $traveladvisor_all = traveladvisor_var_theme_text_srt('traveladvisor_var_all');
        if (is_array($traveladvisor_var_catid) and $traveladvisor_var_catid <> '') {
            foreach ($traveladvisor_var_catid as $traveladvisor_var_cats) {

                $traveladvisor_var_categories = get_categories(array('taxonomy' => 'destination-category', 'hide_empty' => 0, 'child_of' => "$traveladvisor_var_cats"));
                echo '<li><a class="active" data-filter=" * " href="#">' .
                $traveladvisor_all . '</a></li>';
                if (is_array($traveladvisor_var_categories) && !empty($traveladvisor_var_categories)) {
                    foreach ($traveladvisor_var_categories as $traveladvisor_var_category) {
                        echo '<li><a data-filter=".' . $traveladvisor_var_category->slug . $traveladvisor_var_rand . '" href="#">' . ucwords($traveladvisor_var_category->cat_name) . '</a></li>';
                    }
                }
            }
        }
    } else {
        $traveladvisor_var_categories = get_categories(array('taxonomy' => 'destination-category', 'hide_empty' => 0, 'parent' => 0));
        echo '<li><a class="active" data-filter=" * " href="#">' . $traveladvisor_all . '</a></li>';
        if (is_array($traveladvisor_var_categories) && !empty($traveladvisor_var_categories)) {
            foreach ($traveladvisor_var_categories as $traveladvisor_var_categories) {
                echo '<li><a data-filter=".' . $traveladvisor_var_categories->slug . $traveladvisor_var_rand . '" href="#">' . ucwords($traveladvisor_var_categories->cat_name) . '</a></li>';
            }
        }
    }
    echo '</ul></div></div>';
}
}
