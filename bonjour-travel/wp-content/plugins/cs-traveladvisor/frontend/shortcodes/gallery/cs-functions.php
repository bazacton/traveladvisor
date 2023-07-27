<?php
/*
 * Data Fetch Using Shortcode for Gallery
 */
if (!function_exists('traveladvisor_var_gallery_data')) {

    function traveladvisor_var_gallery_data($atts, $content = "") {
        global $traveladvisor_var_gallery_elements, $wp_traveladvisor, $wpdb, $traveladvisor_var_wp_traveladvisor_core, $traveladvisor_var_static_text, $traveladvisor_var_list_gallery_title;
        $strings = new traveladvisor_plugin_all_strings;
        $strings->traveladvisor_plugin_activation_strings();
        $defaults = shortcode_atts(array(
            'traveladvisor_var_column_size' => '',
            'traveladvisor_var_gallery_element_title' => '',
            'traveladvisor_var_gallery_view' => '',
            'traveladvisor_var_gallery_category' => '',
            'traveladvisor_var_gallery_paging_uniqe_style' => '',
            'traveladvisor_var_gallery_paging_filter_style' => '',
            'traveladvisor_var_gallery_item_per_page' => '',
            'traveladvisor_var_gallery_column' => '',
            'traveladvisor_var_gallery_custom_post' => '',
            'traveladvisor_var_gallery_excerpt' => '',
            'traveladvisor_var_gallery_excerpt_length' => '',
                ), $atts);

        extract(shortcode_atts($defaults, $atts));

        //Set All variables

        $traveladvisor_var_gallery_view = isset($traveladvisor_var_gallery_view) ? $traveladvisor_var_gallery_view : '';
        $traveladvisor_var_gallery_category = isset($traveladvisor_var_gallery_category) ? $traveladvisor_var_gallery_category : '';
        $traveladvisor_var_gallery_paging_filter_styles = isset($traveladvisor_var_gallery_paging_filter_style) ? $traveladvisor_var_gallery_paging_filter_style : '';
        $traveladvisor_var_gallery_column = isset($traveladvisor_var_gallery_column) ? $traveladvisor_var_gallery_column : '';
        $traveladvisor_var_gallery_excerpt_length = isset($traveladvisor_var_gallery_excerpt_length) ? $traveladvisor_var_gallery_excerpt_length : '';
        $traveladvisor_var_gallery_item_per_page = isset($traveladvisor_var_gallery_item_per_page) ? $traveladvisor_var_gallery_item_per_page : '-1';
        $traveladvisor_var_gallery_excerpt = isset($traveladvisor_var_gallery_excerpt) ? $traveladvisor_var_gallery_excerpt : '';
        $traveladvisor_var_gallery_custom_post = isset($traveladvisor_var_gallery_custom_post) ? $traveladvisor_var_gallery_custom_post : '';
        $traveladvisor_var_gallery_element_title = isset($traveladvisor_var_gallery_element_title) ? $traveladvisor_var_gallery_element_title : '';
        $traveladvisor_var_gallery_paging_uniqe_style = isset($traveladvisor_var_gallery_paging_uniqe_style) ? $traveladvisor_var_gallery_paging_uniqe_style : '';

        //End  All Set variables

        $traveladvisor_var_rand = rand(1212, 65464);
        if ($traveladvisor_var_gallery_column <> '') {
            $traveladvisor_var_gallery_column = 12 / $traveladvisor_var_gallery_column;
        } else {
            $traveladvisor_var_gallery_column = 4;
        }
        $column_class = '';
        if (isset($traveladvisor_var_column_size) && $traveladvisor_var_column_size != '') {
            if (function_exists('traveladvisor_var_custom_column_class')) {
                $column_class = traveladvisor_var_custom_column_class($traveladvisor_var_column_size);
            }
        }
        //Start Array For global Variables 

        $traveladvisor_var_gallery_elements = array(
            'traveladvisor_var_gallery_view' => $traveladvisor_var_gallery_view,
            'traveladvisor_var_rand' => $traveladvisor_var_rand,
            'traveladvisor_var_gallery_category' => $traveladvisor_var_gallery_category,
            'traveladvisor_var_gallery_paging_filter_style' => $traveladvisor_var_gallery_paging_filter_style,
            'traveladvisor_var_gallery_column' => $traveladvisor_var_gallery_column,
            'traveladvisor_var_gallery_excerpt_length' => $traveladvisor_var_gallery_excerpt_length,
            'traveladvisor_var_gallery_item_per_page' => $traveladvisor_var_gallery_item_per_page,
            'traveladvisor_var_gallery_excerpt' => $traveladvisor_var_gallery_excerpt,
            'traveladvisor_var_gallery_custom_post' => $traveladvisor_var_gallery_custom_post,
        );

        //End Array For global Variables 
        if (function_exists('traveladvisor_enqueue_slick_script')) {
            traveladvisor_enqueue_slick_script();
        }
        static $traveladvisor_var_custom_counter;
        if (!isset($traveladvisor_var_custom_counter)) {
            $traveladvisor_var_custom_counter = 1;
        } else {
            $traveladvisor_var_custom_counter ++;
        }

        $traveladvisor_var_page = isset($_GET['gallery_paging_' . $traveladvisor_var_custom_counter]) ? $_GET['gallery_paging_' . $traveladvisor_var_custom_counter] : '1';
        $traveladvisor_var_filter = '';
        $traveladvisor_var_catid = explode(",", $traveladvisor_var_gallery_category);
        if ($traveladvisor_var_gallery_category <> '') {

            $traveladvisor_var_filter = array(
                'taxonomy' => 'gallery-category',
                'field' => 'term_id',
                'terms' => $traveladvisor_var_catid
            );
        }
        $args = array(
            'post_type' => 'gallery',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'tax_query' => array(
                $traveladvisor_var_filter
            )
        );
        // argument for filters
        $gallery_list_args = $args;
        $query = new WP_Query($args);
        $traveladvisor_var_post_counts = $query->post_count;
        $args = array(
            'shortcode_paging' => $traveladvisor_var_page,
            'post_type' => 'gallery',
            'posts_per_page' => $traveladvisor_var_gallery_item_per_page,
            'post_status' => 'publish',
            'tax_query' => array(
                $traveladvisor_var_filter
            )
        );

        unset($args['gallery_paging_' . $traveladvisor_var_custom_counter]);

        if (isset($_GET['gallery_paging_' . $traveladvisor_var_custom_counter])) {
            $args['paged'] = $_GET['gallery_paging_' . $traveladvisor_var_custom_counter];
        } else {
            $args['paged'] = 1;
        }
        $query = new WP_Query($args);
        $traveladvisor_post_count = $query->post_count;
        set_query_var('args', $args);
        if (isset($column_class) && $column_class <> '') {
            echo '<div class="' . esc_html($column_class) . '">';
        }
        echo '<div class="row">';
        if ($traveladvisor_post_count <> 0) {
            // Start Filter Category base
            $wp_traveladvisor->traveladvisor_isotope_enqueue();
            $wp_traveladvisor->traveladvisor_lightbox_enqueue();
            ?>

            <?php if ($traveladvisor_var_gallery_element_title <> '') { ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-element-title ">
                        <h3><?php echo esc_html($traveladvisor_var_gallery_element_title); ?></h3>
                    </div>
                </div>
                <?php
            }

            if ($traveladvisor_var_gallery_view == "unique_gallery") {
                $traveladvisor_var_gallery_paging_filter_style = $traveladvisor_var_gallery_paging_uniqe_style;
            } else {
                $traveladvisor_var_gallery_paging_filter_style = $traveladvisor_var_gallery_paging_filter_styles;
            }
            if ($traveladvisor_var_gallery_paging_filter_style == 'single_filter') {
                $traveladvisor_var_rand = $traveladvisor_var_gallery_elements['traveladvisor_var_rand'];
                ?>   
                <script type="text/javascript">
                    jQuery(window).load(function () {
                        jQuery(function (jQuery) {
                            jQueryportfolio_<?php echo absint($traveladvisor_var_rand) ?> = jQuery('.project-stylist-<?php echo absint($traveladvisor_var_rand) ?>').find('> .row');

                            jQueryportfolio_<?php echo absint($traveladvisor_var_rand) ?>.isotope({
                                itemSelector: '.cs-traveladvisor-project<?php echo absint($traveladvisor_var_rand) ?>',
                                layoutMode: 'fitRows'
                            });
                            jQueryportfolio_selectors_<?php echo absint($traveladvisor_var_rand) ?> = jQuery('.cs-traveladvisor-price_services<?php echo absint($traveladvisor_var_rand) ?>').find('> li >a');
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
                $traveladvisor_all = traveladvisor_var_theme_text_srt('traveladvisor_var_all');
                echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <div class="row item">
                        <ul class="cs-filtter cs-traveladvisor-price_services' . absint($traveladvisor_var_rand) . '" data-rand="' . absint($traveladvisor_var_rand) . '">';
                // Start Filter Category base
                echo '<li><a class="active" data-filter=" * " href="#">' . $traveladvisor_all . '</a></li>';
                $gallery_list_loop = new WP_Query($gallery_list_args);
                if ($gallery_list_loop->have_posts()) {
                    while ($gallery_list_loop->have_posts()) : $gallery_list_loop->the_post();
                        global $post;
                        echo '<li><a data-filter=".' . $post->post_name . $traveladvisor_var_rand . '" href="#">' . get_the_title() . '</a></li>';
                    endwhile;
                    wp_reset_postdata();
                }

                echo '</ul></div></div>';
            }
            //Frontend view Templates 
            $traveladvisor_var_wp_traveladvisor_core->traveladvisor_var_get_template_part('gallery', 'default', 'gallery/listings');
        }
        $traveladvisor_var_page = 'gallery_paging_' . $traveladvisor_var_custom_counter;
        // End Templates and Pagination start 
        $traveladvisor_var_page = 'gallery_paging_' . $traveladvisor_var_custom_counter;
        if ($traveladvisor_var_gallery_paging_filter_style == "pagination" && $traveladvisor_var_post_counts > $traveladvisor_var_gallery_item_per_page && $traveladvisor_var_gallery_item_per_page > 0) {
            $total_pages = '';
            $total_pages = ceil($traveladvisor_var_post_counts / $traveladvisor_var_gallery_item_per_page);
            echo '<nav>';
            $traveladvisor_var_wp_traveladvisor_core->traveladvisor_var_plugin_pagination($total_pages, isset($_GET[$traveladvisor_var_page]) ? $_GET[$traveladvisor_var_page] : 1, $traveladvisor_var_page);
            echo '</nav>';
        }
        // Pagination End 
        echo '</div>';
        if (isset($column_class) && $column_class <> '') {
            echo '</div>';
        }
    }

    add_shortcode('traveladvisor_gallery', 'traveladvisor_var_gallery_data');
}
    