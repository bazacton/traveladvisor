<?php
/*
 * Template for Stylist single page
 */
get_header();
//Side Bar Settings 
$var_arrays = array('wpdb', 'traveladvisor_var_static_text');
$search_global_vars = TRAVELADVISOR_VAR_GLOBALS()->globalizing($var_arrays);
extract($search_global_vars);
$strings = new traveladvisor_plugin_all_strings;
$strings->traveladvisor_plugin_activation_strings();
$traveladvisor_var_layout = '';
$traveladvisor_page_sidebar_right = '';
$traveladvisor_page_sidebar_left = '';
$traveladvisor_var_layout = '';
$leftSidebarFlag = false;
$rightSidebarFlag = false;
$traveladvisor_var_layout = get_post_meta($post->ID, 'traveladvisor_var_page_layout', true);
$traveladvisor_sidebar_right = get_post_meta($post->ID, 'traveladvisor_var_page_sidebar_right', true);
$traveladvisor_sidebar_left = get_post_meta($post->ID, 'traveladvisor_var_page_sidebar_left', true);

if ($traveladvisor_var_layout == 'left') {
    $traveladvisor_layout = "col-lg-9 col-md-9 col-sm-12 col-xs-12";
    $leftSidebarFlag = true;
} else if ($traveladvisor_var_layout == 'right') {
    $traveladvisor_layout = "col-lg-9 col-md-9 col-sm-12 col-xs-12";
    $rightSidebarFlag = true;
} else {
    $traveladvisor_layout = "col-lg-12 col-md-12 col-sm-12 col-xs-12";
    $leftSidebarFlag = false;
    $rightSidebarFlag = false;
}
$traveladvisor_var_currency_symbol = get_option('traveladvisor_plugin_options');
$traveladvisor_currency_symbol = isset($traveladvisor_var_currency_symbol['traveladvisor_var_currency_sign']) ? $traveladvisor_var_currency_symbol['traveladvisor_var_currency_sign'] : '';
$traveladvisor_var_tours_post_array = array(
    'post_type' => 'tours',
    'showposts' => -1
);

$traveladvisor_var_tours_post_data = new WP_Query($traveladvisor_var_tours_post_array);
$traveladvisor_var_tours_data = array();
while ($traveladvisor_var_tours_post_data->have_posts()):$traveladvisor_var_tours_post_data->the_post();
    $id = get_the_id();
    $traveladvisor_var_tours_price = get_post_meta($id, 'traveladvisor_var_tours_newprice', true);
    $traveladvisor_var_tours_destination = get_post_meta($id, 'traveladvisor_var_tour_destination', true);
    $traveladvisor_var_tours_data[$traveladvisor_var_tours_price] = $traveladvisor_var_tours_destination;
endwhile;
wp_reset_postdata();
?>
<!-- Main Start -->
<div class="container">
    <div class="row">
        <?php if ($leftSidebarFlag) { ?>
            <div class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <?php
                if (is_active_sidebar(traveladvisor_get_sidebar_id($traveladvisor_sidebar_left))) {
                    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($traveladvisor_sidebar_left)) : endif;
                }
                ?>
            </div>
            <?php
        }
        ?>
        <div class="<?php echo traveladvisor_allow_special_char($traveladvisor_layout) ?>">
            <div class="row">
                <div class="cs-destination-single">
                    <?php
                    $traveladvisor_var_slider_images = get_post_meta($post->ID, 'traveladvisor_var_destination_gallery_images_url', true);
                    if (isset($traveladvisor_var_slider_images) && $traveladvisor_var_slider_images != '' && is_array($traveladvisor_var_slider_images)) {
                        if ($traveladvisor_var_slider_images[0] != '') {
                            ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cs-thumbpost-slider">
                                    <ul class="thumb-slider">
                                        <?php
                                        foreach ($traveladvisor_var_slider_images as $key => $traveladvisor_var_point_of_interest_image_url) {
                                            $traveladvisor_var_img_id = $traveladvisor_var_wp_traveladvisor_core->traveladvisor_var_get_attachment_id($traveladvisor_var_point_of_interest_image_url);
                                            $traveladvisor_var_src = wp_get_attachment_image_src($traveladvisor_var_img_id, 'traveladvisor_var_media_1');
                                            if ($traveladvisor_var_src <> '') {
                                                ?>
                                                <li><img src="<?php echo esc_url($traveladvisor_var_src[0]); ?>" alt=""/></li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                    <ul class="thumbnav-slider">
                                        <?php
                                        if (is_array($traveladvisor_var_slider_images) or ! empty($traveladvisor_var_slider_images)) {
                                            foreach ($traveladvisor_var_slider_images as $key => $traveladvisor_var_point_of_interest_image_url) {
                                                $traveladvisor_var_img_id = $traveladvisor_var_wp_traveladvisor_core->traveladvisor_var_get_attachment_id($traveladvisor_var_point_of_interest_image_url);
                                                $traveladvisor_var_src = wp_get_attachment_image_src($traveladvisor_var_img_id, 'traveladvisor_var_media_7');
                                                ?>
                                                <li><img src="<?php echo esc_url($traveladvisor_var_src[0]); ?>" alt="" /></li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    $traveladvisor_var_destination_single = array('post');
                    $traveladvisor_var_destination_single_return = TRAVELADVISOR_VAR_GLOBALS()->globalizing($traveladvisor_var_destination_single);
                    extract($traveladvisor_var_destination_single_return);
                    if (isset($post->post_content) && $post->post_content != '') {
                        ?>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="cs-section-title"><h3><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_about_destination'); ?></h3></div>
                            <div class="rich_editor_text">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <?php
                    }
                    $traveladvisor_var_point_of_interest_check = get_post_meta($post->ID, 'traveladvisor_var_point_of_interest_check', true);
                    if (isset($traveladvisor_var_point_of_interest_check) && $traveladvisor_var_point_of_interest_check == 'on') {
                        $traveladvisor_var_point_of_interest_title = get_post_meta($post->ID, 'traveladvisor_var_destination_name_array', true);
                        $traveladvisor_var_point_of_interest_description = get_post_meta($post->ID, 'traveladvisor_var_destination_desc_array', true);
                        $traveladvisor_var_point_of_interest_web_url = get_post_meta($post->ID, 'traveladvisor_var_add_url_array', true);
                        $traveladvisor_var_point_of_interest_title_url = get_post_meta($post->ID, 'traveladvisor_var_title_url_array', true);
                        $traveladvisor_var_point_of_interest_image = get_post_meta($post->ID, 'traveladvisor_var_point_of_interest_image_array', true);
                        $array_count = 0;
                        $array_count = count($traveladvisor_var_point_of_interest_title);
                        if ($array_count != 0) {
                            ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cs-section-title"><h3><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_point_of_interest'); ?> </h3></div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <ul class="cs-interest-listing">
                                    <?php
                                    for ($point_of_interest_loop = 0; $point_of_interest_loop < $array_count; $point_of_interest_loop++) {
                                        if (!empty($traveladvisor_var_point_of_interest_image)) {
                                            $traveladvisor_var_img_id = $traveladvisor_var_wp_traveladvisor_core->traveladvisor_var_get_attachment_id($traveladvisor_var_point_of_interest_image[$point_of_interest_loop]);
                                            $traveladvisor_var_src = wp_get_attachment_image_src($traveladvisor_var_img_id, 'traveladvisor_var_media_3');
                                        }
                                        ?>
                                        <li>
                                            <div class="cs-media">
                                                <figure><a href="<?php
                            if (isset($traveladvisor_var_point_of_interest_title_url[$point_of_interest_loop]) && $traveladvisor_var_point_of_interest_title_url[$point_of_interest_loop] != '') {
                                echo esc_url($traveladvisor_var_point_of_interest_title_url[$point_of_interest_loop]);
                            }
                                        ?>"><?php
                                                    if (isset($traveladvisor_var_point_of_interest_image[$point_of_interest_loop]) && $traveladvisor_var_point_of_interest_image[$point_of_interest_loop] != '') {
                                                        if (!empty($traveladvisor_var_point_of_interest_image)) {
                                                            echo '<img  src="' . esc_url($traveladvisor_var_src[0]) . '" alt="" />';
                                                        }
                                                    }
                                                    ?></a></figure>
                                            </div>
                                            <div class="cs-text">
                                                <div class="post-title">
                                                    <h4><a href="<?php
                                                   if (isset($traveladvisor_var_point_of_interest_title_url[$point_of_interest_loop]) && $traveladvisor_var_point_of_interest_title_url[$point_of_interest_loop] != '') {
                                                       echo esc_url($traveladvisor_var_point_of_interest_title_url[$point_of_interest_loop]);
                                                   }
                                                    ?>"><?php
                                                        if (isset($traveladvisor_var_point_of_interest_title[$point_of_interest_loop]) && $traveladvisor_var_point_of_interest_title[$point_of_interest_loop] != '') {
                                                            echo esc_html($traveladvisor_var_point_of_interest_title[$point_of_interest_loop]);
                                                        }
                                                        ?>
                                                        </a></h4>
                                                </div>
                                                <P><?php
                                                   if (isset($traveladvisor_var_point_of_interest_description[$point_of_interest_loop]) && $traveladvisor_var_point_of_interest_description[$point_of_interest_loop] != '') {
                                                       $excerpt = $traveladvisor_var_point_of_interest_description[$point_of_interest_loop];
                                                       echo wp_trim_words($excerpt, 280);
                                                   }
                                                        ?></P>
                                                    <?php
                                                    if (isset($traveladvisor_var_point_of_interest_web_url[$point_of_interest_loop]) && $traveladvisor_var_point_of_interest_web_url[$point_of_interest_loop] != '') {
                                                        ?>
                                                    <span class="cs-postwebsite"><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_website'); ?><a href="<?php echo esc_url($traveladvisor_var_point_of_interest_web_url[$point_of_interest_loop]); ?>" class="cs-color"><?php echo esc_url($traveladvisor_var_point_of_interest_web_url[$point_of_interest_loop]); ?></a></span>
                                                <?php } ?>
                                            </div>
                                        </li>
            <?php
        }
        ?>
                                </ul>
                            </div>
        <?php
    }
}// end point of interest
$traveladvisor_travel_advisor_popular_post_array = array(
    'post_type' => 'destination',
    'show_posts' => -1
);
$traveladvisor_travel_advisor_popular_post_loop = new WP_Query($traveladvisor_travel_advisor_popular_post_array);
$popular_post_check = 0;
while ($traveladvisor_travel_advisor_popular_post_loop->have_posts()):$traveladvisor_travel_advisor_popular_post_loop->the_post();
    $traveladvisor_var_popular_posts = get_post_meta($id, 'traveladvisor_var_popular_destination', true);
    if ($traveladvisor_var_popular_posts && $traveladvisor_var_popular_posts == 'yes') {
        $popular_post_check++;
    }
endwhile;
wp_reset_postdata();
if (isset($popular_post_check) && $popular_post_check > 0) {
    ?>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="cs-section-title"><h3><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_most_popular_destinations'); ?></h3></div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <ul class="cs-destination-slider row">
    <?php
    while ($traveladvisor_travel_advisor_popular_post_loop->have_posts()):$traveladvisor_travel_advisor_popular_post_loop->the_post();
        $id = get_the_id();
        $traveladvisor_var_popular_posts = get_post_meta($id, 'traveladvisor_var_popular_destination', true);
        $traveladvisor_tarveladvisor_country = get_post_meta($id, 'traveladvisor_var_country', true);

        if (isset($traveladvisor_var_popular_posts) && $traveladvisor_var_popular_posts == 'yes') {
            ?>
                                        <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="cs-destination-listing destination-grid">

                                                <div class="cs-media">
                                                    <figure> <?php the_post_thumbnail('traveladvisor_var_media_3'); ?></figure>
                                                </div>
                                                <div class="cs-text">
                                                    <div class="cs-location-sec">
                                                        <h6><a href="<?php echo the_permalink(); ?> " ><?php the_title(); ?> </a></h6>
            <?php
            $traveladvisor_var_destination_title = get_the_title();
            $minimum_destination_price = 0;
            foreach ($traveladvisor_var_tours_data as $destination_price => $tour_selected_destination_title) {
                if ($traveladvisor_var_destination_title == $tour_selected_destination_title) {
                    $minimum_destination_price = $destination_price;
                    if ($destination_price < $minimum_destination_price) {
                        $minimum_destination_price = $destination_price;
                    }
                }
            }
            if (isset($minimum_destination_price) && $minimum_destination_price != 0) {
                ?>
                                                            <div class="cs-price"><span><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_from'); ?></span> &nbsp; <strong><?php
                                                            echo esc_html($traveladvisor_currency_symbol);
                                                            echo esc_html($minimum_destination_price);
                                                            ?></strong></div>
                                                                <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
            <?php
        }
    endwhile;
    wp_reset_postdata();
    ?>
                            </ul>
                        </div>
<?php } ?>
                </div>
            </div>
        </div>
<?php if ($rightSidebarFlag) { ?>
            <div class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <?php
            if (is_active_sidebar(traveladvisor_get_sidebar_id($traveladvisor_sidebar_right))) {
                if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($traveladvisor_sidebar_right)) : endif;
            }
            ?>
            </div>
            <?php } ?>
    </div>
</div>
<!-- Main End --> 
<?php
get_footer();
?>