<?php
$var_arrays = array('post', 'traveladvisor_notification', 'wp_query', 'traveladvisor_var_blog_variables', 'current_user', 'traveladvisor_year', 'traveladvisor_var_blog_num_post');
$blog_large_global_vars = TRAVELADVISOR_VAR_GLOBALS()->globalizing($var_arrays);
extract($blog_large_global_vars);
extract($traveladvisor_var_blog_variables);
extract($wp_query->query_vars);
$traveladvisor_post_count = $traveladvisor_var_blog_num_post;
$strings = new traveladvisor_theme_all_strings;
$strings->traveladvisor_theme_option_strings();
$title_limit = 1000;
if ($traveladvisor_post_count != 0 && $traveladvisor_post_count != "") {

    if (isset($traveladvisor_var_blog_title) && trim($traveladvisor_var_blog_title) <> '') {
        ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="cs-section-title">
                <h2><?php echo esc_attr($traveladvisor_var_blog_title); ?></h2>
            </div>
        </div>
        <?php
    }
    $traveladvisor_number = 1;
    $traveladvisor_counter_post = 0;
    $traveladvisor_months = array('', 'JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC');
    $timelinestring = '';
    $timelinestring .= '<ul class="cs-timeline-holder">';
    for ($traveladvisor_yearcheck = 1; $traveladvisor_yearcheck <= 20; $traveladvisor_yearcheck++) {
        for ($traveladvisor_timeline_check = 1; $traveladvisor_timeline_check <= 12; $traveladvisor_timeline_check++) {
            $args['date_query'] = array(
                array(
                    'year' => "20$traveladvisor_yearcheck",
                    'month' => $traveladvisor_timeline_check,
                ),
            );
            $query = new WP_Query($args);
            $post_count = $query->post_count;
            if ($query->have_posts()) {

                $postCounter = 0;
                $timelinestring .= '<li><div class="cs-timeline-date cs-bgcolor"><span>' . esc_html($traveladvisor_months["$traveladvisor_timeline_check"]) . '<br>' . esc_html("20$traveladvisor_yearcheck") . '</span> </div>';
                $timelinestring .='<ul>';
                $traveladvisor_number = 1;
                while ($query->have_posts()) : $query->the_post();
                    $traveladvisor_counter_post++;
                    $traveladvisor_year = get_the_time('Y');
                    $width = '825';
                    $height = '464';
                    $traveladvisor_var_thumbnail = traveladvisor_get_post_img_src($post->ID, $width, $height);
                    $traveladvisor_postObject = get_post_meta($post->ID, "traveladvisor_full_data", true);
                    $traveladvisor_var_post_thumbnail_id = get_post_thumbnail_id($post->ID);
                    $traveladvisor_var_gallery = get_post_meta($post->ID, 'traveladvisor_post_list_gallery', true);
                    $traveladvisor_var_post_social_sharing = get_post_meta($post->ID, 'traveladvisor_post_social_sharing', true);
                    $traveladvisor_var_gallery = explode(',', $traveladvisor_var_gallery);
                    $traveladvisor_var_thumb_view = get_post_meta($post->ID, 'traveladvisor_thumb_view', true);
                    $traveladvisor_var_post_view = isset($traveladvisor_var_thumb_view) ? $traveladvisor_var_thumb_view : '';
                    $traveladvisor_var_current_user = wp_get_current_user();
                    $traveladvisor_var_custom_image_url = get_user_meta(get_the_author_meta('ID'), 'user_avatar_display', true);
                    $traveladvisor_user = $current_user->user_login . "\n";
                    $traveladvisor_whole_pull = "pull-left";
                    $traveladvisor_timeline_pull = "right";
                    if ($traveladvisor_number % 2 == 0) {
                        $traveladvisor_whole_pull = "pull-right";
                        $traveladvisor_timeline_pull = "left";
                    }
                    $timelinestring .='<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ' . esc_html($traveladvisor_whole_pull) . '">';
                    $timelinestring .='<div class="cs-blog blog-timeline ' . esc_html($traveladvisor_timeline_pull) . '">';
                    $timelinestring .='<div class="cs-media"><figure><a href="#">' . get_the_post_thumbnail($post->ID, 'traveladvisor_var_media_2') . '</a></figure></div>';
                    $timelinestring .='<div class="blog-text"><div class="post-title"><h4><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4></div>';
                    $traveladvisor_var_categories_list = get_the_term_list(get_the_id(), 'category', '', ', ', '');
                    $catlist = sprintf('%1$s', $traveladvisor_var_categories_list);
                    $postdate = get_the_time('M d. Y');
                    $timelinestring .='<div class="post-option"><span class="post-by">' . get_the_author() . '</span><span>' . $catlist . '</span><span class="post-date">' . $postdate . '</span></div>';
                    if (isset($traveladvisor_var_blog_description) && $traveladvisor_var_blog_description == 'yes') {
                        $timelinestring .='<p>' . traveladvisor_get_the_excerpt($traveladvisor_var_blog_excerpt, 'true', '') . '</p>';
                    }
                    $timelinestring .='<a href="' . get_the_permalink() . '" class="cs-readmore-btn cs-color"><i class=" icon-plus2"></i>' . traveladvisor_var_theme_text_srt('traveladvisor_var_readmore_text') . '</a>';
                    $traveladvisor_number++;

                    $timelinestring .='</div></div></li>';
                    if ($traveladvisor_counter_post == $traveladvisor_post_count) {
                        break 3;
                    }
                endwhile;
                wp_reset_postdata();
                $timelinestring .='</ul>';
                $timelinestring .='</li>';
            }
        }
    }
    $timelinestring .='</ul>';
    $timelinestring .='</ul>';
    echo traveladvisor_allow_special_char($timelinestring);
}
?>