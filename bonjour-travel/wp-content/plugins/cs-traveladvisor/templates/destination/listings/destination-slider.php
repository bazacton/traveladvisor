<?php
/*
 * Desination Slider view
 */
//global $wpdb, $wp_traveladvisor, $traveladvisor_var_wp_traveladvisor_core, $traveladvisor_var_destination_elements;

$traveladvisor_var_destination_slider = array('wpdb', 'wp_traveladvisor', 'traveladvisor_var_static_text', 'traveladvisor_var_wp_traveladvisor_core', 'traveladvisor_var_destination_elements');
$traveladvisor_var_destination_slider_return = TRAVELADVISOR_VAR_GLOBALS()->globalizing($traveladvisor_var_destination_slider);
extract($traveladvisor_var_destination_slider_return);

$strings = new traveladvisor_plugin_all_strings;
$strings->traveladvisor_plugin_activation_strings();


$traveladvisor_var_rand = $traveladvisor_var_destination_elements['traveladvisor_var_rand'];
$traveladvisor_var_destination_excerpt = $traveladvisor_var_destination_elements['traveladvisor_var_destination_excerpt'];
$traveladvisor_var_destination_excerpt_length = $traveladvisor_var_destination_elements['traveladvisor_var_destination_excerpt_length'];
$traveladvisor_var_post_array = array(
    'post_type' => 'destination',
    'showposts' => 4
);

$traveladvisor_var_tours_post_array = array(
    'post_type' => 'tours',
    'showposts' => -1
);
$traveladvisor_var_currency_symbol = get_option('traveladvisor_plugin_options');
$traveladvisor_currency_symbol = isset($traveladvisor_var_currency_symbol['traveladvisor_var_currency_sign']) ? $traveladvisor_var_currency_symbol['traveladvisor_var_currency_sign'] : '';

$traveladvisor_var_tours_post_data = new WP_Query($traveladvisor_var_tours_post_array);
$traveladvisor_var_tours_data = array();
while ($traveladvisor_var_tours_post_data->have_posts()):$traveladvisor_var_tours_post_data->the_post();
    $id = get_the_id();
    $traveladvisor_var_tours_price = get_post_meta($id, 'traveladvisor_var_tours_newprice', true);
    $traveladvisor_var_tours_destination = get_post_meta($id, 'traveladvisor_var_tour_destination', true);
    $traveladvisor_var_tours_data[$traveladvisor_var_tours_price] = $traveladvisor_var_tours_destination;
endwhile;
wp_reset_postdata();


$traveladvisor_var_postdata = new WP_Query($traveladvisor_var_post_array);
?>
<div class="row">
    <ul class="cs-destination-listing destination-fancy">
        <?php
        $active = 0;
        while ($traveladvisor_var_postdata->have_posts()):$traveladvisor_var_postdata->the_post();
            $id = get_the_id();
            $traveladvisor_tarveladvisor_country = get_post_meta($id, 'traveladvisor_var_country', true);
            $traveladvisor_var_gallery_images = get_post_meta($id, 'traveladvisor_var_destination_gallery_images_url', true);
            $active++;
            if ($active == 1) {
                echo ' <li class="facny-view-expand">';
            } else {
                echo '<li>';
            }
            ?>     
            <div class="inner-holder">
                <div class="cs-media">
                    <figure>
                        <?php the_post_thumbnail('traveladvisor_var_media_6'); ?>
                        <figcaption>
                            <?php
                            $traveladvisor_var_destination_title = get_the_title();
                            $trip_count = 0;
                            foreach ($traveladvisor_var_tours_data as $destination_price => $tour_selected_destination_title) {
                                if ($traveladvisor_var_destination_title == $tour_selected_destination_title) {
                                    $trip_count++;
                                }
                            }
                            if (isset($trip_count) && $trip_count != 0) {
                                ?>
                                <div class="cs-trips cs-bgcolor">
                                    <span>    
                                        <?php echo esc_html($trip_count); ?>
                                    </span>
                                    <?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_trips'); ?>
                                </div>

                            <?php } ?>
                            <div class="cs-text cs-location">
                                <div class="cs-location-sec">
                                    <h3><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <span>
                                        <?php
                                        if (isset($traveladvisor_tarveladvisor_country) && $traveladvisor_tarveladvisor_country != '') {
                                            echo esc_html($traveladvisor_tarveladvisor_country);
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <div class="over-preview">
                    <div class="cs-text">
                        <div class="cs-location-sec">
                            <h3><a href="<?php echo the_permalink($id); ?>"><?php the_title(); ?></a></h3>
                            <span>
                                <?php
                                if (isset($traveladvisor_tarveladvisor_country) && $traveladvisor_tarveladvisor_country != '') {
                                    echo esc_html($traveladvisor_tarveladvisor_country);
                                }
                                ?>
                            </span>
                        </div>
                        <p>
                            <?php
                            $excerpt_lenth = -1;
                            if (isset($traveladvisor_var_destination_excerpt) && $traveladvisor_var_destination_excerpt == 'yes') {
                                if (isset($traveladvisor_var_destination_excerpt_length) && $traveladvisor_var_destination_excerpt_length != '') {
                                    $excerpt_lenth = $traveladvisor_var_destination_excerpt_length;
                                }
                            }
                            echo wp_trim_words(get_the_excerpt(), $excerpt_lenth);
                            ?>
                        </p>
                        <ul class="cs-photo-list">
                            <?php
                            $image_counter = 0;
                            if (isset($traveladvisor_var_gallery_images) && $traveladvisor_var_gallery_images != '' && is_array($traveladvisor_var_gallery_images)) {
                                foreach ($traveladvisor_var_gallery_images as $key => $img_url) {
                                    $traveladvisor_var_img_id = $traveladvisor_var_wp_traveladvisor_core->traveladvisor_var_get_attachment_id($img_url);
                                    $traveladvisor_var_src = wp_get_attachment_image_src($traveladvisor_var_img_id, 'traveladvisor_var_media_7');
                                    $image_counter++;
                                    if ($image_counter <= 4) {
                                        ?>    
                                        <li ><a href="<?php echo the_permalink(); ?>"><img  src="<?php echo esc_html($traveladvisor_var_src[0]); ?>" alt="" /></a></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                            <span class="cs-photos"><?php echo esc_html($image_counter); ?><em><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_photos'); ?></em></span>
                                <?php } ?>
                    </div>
                </div>
            </div>
            </li>
            <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </ul>
</div>



