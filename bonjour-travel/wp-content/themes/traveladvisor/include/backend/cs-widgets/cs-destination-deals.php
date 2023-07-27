<?php
/**
 * @Recent posts widget Class
 *
 *
 */
if (!class_exists('traveladvisor_destinationdeals')) {

    class traveladvisor_destinationdeals extends WP_Widget {

        /**
         * @init Recent posts Module
         *
         *
         */
        public function __construct() {
            parent::__construct(
                    'traveladvisor_destinationdeals', // Base ID
                    traveladvisor_var_theme_text_srt('traveladvisor_var_destinations_deals'), // Name
                    array('classname' => 'widget-destination-deals', 'description' => traveladvisor_var_theme_text_srt('traveladvisor_var_destinations_deals_hint'),) // Args 
            );
        }

        /**
         * @Recent posts html form
         *
         *
         */
        function form($instance) {
            global $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
            $instance = wp_parse_args((array) $instance, array('title' => ''));
            $title = $instance['title'];
            $select_category = isset($instance['select_category']) ? esc_attr($instance['select_category']) : '';
            $widget_view = isset($instance['widget_view']) ? esc_attr($instance['widget_view']) : '';
            $showcount = isset($instance['showcount']) ? esc_attr($instance['showcount']) : '';

            $traveladvisor_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_destinations_title'),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr($title),
                    'id' => traveladvisor_allow_special_char($this->get_field_id('title')),
                    'classes' => '',
                    'cust_id' => traveladvisor_allow_special_char($this->get_field_name('title')),
                    'cust_name' => traveladvisor_allow_special_char($this->get_field_name('title')),
                    'return' => true,
                    'required' => false
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
            $traveladvisor_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_destinations_tour_views'),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => esc_html($widget_view),
                    'id' => '',
                    'cust_name' => traveladvisor_allow_special_char($this->get_field_name('widget_view')),
                    'cust_id' => traveladvisor_allow_special_char($this->get_field_id('widget_view')),
                    'classes' => 'dropdown chosen-select',
                    'options' => array(
                        '' => traveladvisor_var_theme_text_srt('traveladvisor_var_destinations_tour_views1'),
                        'simple' => traveladvisor_var_theme_text_srt('traveladvisor_var_destinations_tour_views2'),
                        'fancy' => traveladvisor_var_theme_text_srt('traveladvisor_var_destinations_tour_views3'),
                    ),
                    'return' => true,
                )
            );
            $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);


            $traveladvisor_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_destinations_tour_num_destinations'),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr($showcount),
                    'id' => traveladvisor_allow_special_char($this->get_field_id('showcount')),
                    'classes' => '',
                    'cust_id' => traveladvisor_allow_special_char($this->get_field_name('showcount')),
                    'cust_name' => traveladvisor_allow_special_char($this->get_field_name('showcount')),
                    'return' => true,
                    'required' => false
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
        }

        /**
         * @Destination deals posts update form data
         *
         *
         */
        function update($new_instance, $old_instance) {
            $instance = $old_instance;
            $instance['title'] = $new_instance['title'];
            //   $instance['select_category'] = $new_instance['select_category'];
            $instance['widget_view'] = $new_instance['widget_view'];
            $instance['showcount'] = $new_instance['showcount'];
            return $instance;
        }

        /**
         * @Display Recent posts widget
         *
         */
        function widget($args, $instance) {
            global $traveladvisor_node, $wpdb, $post;
            extract($args, EXTR_SKIP);
            $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
            $title = wp_specialchars_decode(stripslashes($title));
            $widget_view = empty($instance['widget_view']) ? ' ' : apply_filters('widget_title', $instance['widget_view']);
            $showcount = empty($instance['showcount']) ? ' ' : apply_filters('widget_title', $instance['showcount']);




            if ($widget_view <> '' && $widget_view == 'simple') {
                $traveladvisor_widget_start = '<div class="widget widget-destination-deals">';
            }
            if ($widget_view <> '' && $widget_view == 'fancy') {
                $traveladvisor_widget_start = '<div class="widget widget-hotel-resorts">';
            }
            $traveladvisor_widget_end = '</div>';



            if ($showcount == '' || empty($showcount)) {
                $showcount = 5;
            }

            if ($instance['showcount'] == "") {
                $instance['showcount'] = '-1';
            }
            echo traveladvisor_allow_special_char($traveladvisor_widget_start);
            if (!empty($title) && $title <> ' ') {
                echo '<div class="widget-title"><h4>';
                echo traveladvisor_allow_special_char($title);
                echo '</h4></div>';
            }
            ?>
            <ul>
                <?php
                //get the post title and price from tours post type and create array

                $args = array('posts_per_page' => -1, 'post_type' => 'tours', 'order' => 'ASC');
                $custom_query = new WP_Query($args);
                if ($custom_query->have_posts() <> "") :
                    while ($custom_query->have_posts()) : $custom_query->the_post();
                        $data_title = get_post_meta($post->ID, 'traveladvisor_var_tour_destination', true);
                        $data_price = get_post_meta($post->ID, 'traveladvisor_var_tours_newprice', true);
                        $data_array[$data_title] = $data_price;
                    endwhile;
                endif;

                wp_reset_postdata();
                $args = array(
                    'post_type' => 'destination',
                    'posts_per_page' => -1,
                );

                // }

                $title_limit = 6;
                $custom_query = new WP_Query($args);

                if ($custom_query->have_posts() <> "") {
                    $a = 0;
                    while ($custom_query->have_posts()) : $custom_query->the_post();
                        $traveladvisor_post_id = get_the_ID();
                        $post_title = get_the_title();
                        $traveladvisor_noimage = '';
                        $width = 60;
                        $height = 60;
                        $image_id = get_post_thumbnail_id($post->ID);
                        $image_url = traveladvisor_attachment_image_src($image_id, $width, $height);
                        if ($image_url == '') {
                            $traveladvisor_noimage = ' class="cs-noimage"';
                        }

                        if (array_key_exists($post_title, $data_array)) {
                            if ($a < $showcount) {
                                ?>
                                <li<?php echo traveladvisor_allow_special_char($traveladvisor_noimage) ?>>
                                    <?php if ($image_url != '') { ?>
                                        <div class="cs-media"><figure><img width="60" height="60" src="<?php echo esc_url($image_url) ?>" alt="image_url"></figure></div>
                                    <?php } ?>
                                    <div class="cs-text">
                                        <div class="post-title"><h6><a href="<?php esc_url(the_permalink()); ?>"><?php echo wp_trim_words($post_title, 4, '...'); ?></a></h6></div>
                                        <?php if ($data_array[$post_title] <> '') { ?>
                                            <?php if ($widget_view <> '' && $widget_view == 'simple') { ?>
                                                <div class="cs-price"><span class="cs-color"><em>$</em><?php echo esc_html($data_array[$post_title]); ?></span><small><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_destinations_tour_per_person'); ?></small></div>

                                            <?php
                                            }
                                            if ($widget_view <> '' && $widget_view == 'fancy') {
                                                ?>
                                                <span class="cs-price"><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_destinations_starting'); ?> <strong> $<?php echo esc_html($data_array[$post_title]); ?></strong></span>
                                                <a href="<?php the_permalink(); ?>" class="cs-check-btn cs-color"><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_destinations_check_avilibility'); ?><i class=" icon-arrow-right22"></i></a>
                                <?php }
                            } ?>
                                    </div>
                                </li>
                                <?php
                                $a++;
                            }
                        }

                    endwhile;
                    wp_reset_postdata();
                } else {
                    echo '<p>' . traveladvisor_var_theme_text_srt('traveladvisor_var_destinations_no_found') . '</p>';
                }
                ?>
            </ul> 
            <?php
            echo traveladvisor_allow_special_char($traveladvisor_widget_end);
        }

    }

}
if (function_exists('cs_widget_register')) {
    cs_widget_register("traveladvisor_destinationdeals");
}