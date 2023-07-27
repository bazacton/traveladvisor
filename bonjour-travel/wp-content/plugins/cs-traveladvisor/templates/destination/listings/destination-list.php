<?php
/*
 * Destination Listing view
 */
//global $wpdb, $wp_traveladvisor, $traveladvisor_var_wp_traveladvisor_core, $traveladvisor_var_destination_elements;
$traveladvisor_var_destination_listing = array('wpdb', 'wp_traveladvisor', 'traveladvisor_var_static_text', 'traveladvisor_var_wp_traveladvisor_core', 'traveladvisor_var_destination_elements');
$traveladvisor_var_destination_listing_return = TRAVELADVISOR_VAR_GLOBALS()->globalizing($traveladvisor_var_destination_listing);
extract($traveladvisor_var_destination_listing_return);
$strings = new traveladvisor_plugin_all_strings;
$strings->traveladvisor_plugin_activation_strings();
$traveladvisor_var_rand = $traveladvisor_var_destination_elements['traveladvisor_var_rand'];
$traveladvisor_var_destination_excerpt = $traveladvisor_var_destination_elements['traveladvisor_var_destination_excerpt'];
$traveladvisor_var_destination_excerpt_length = $traveladvisor_var_destination_elements['traveladvisor_var_destination_excerpt_length'];
extract($wp_query->query_vars);
$traveladvisor_var_all_posts = new WP_Query($args);
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
$traveladvisor_var_currency_symbol = get_option('traveladvisor_plugin_options');
$traveladvisor_currency_symbol = isset($traveladvisor_var_currency_symbol['traveladvisor_var_currency_sign']) ? $traveladvisor_var_currency_symbol['traveladvisor_var_currency_sign'] : '';
while ($traveladvisor_var_all_posts->have_posts()):$traveladvisor_var_all_posts->the_post();
    $traveladvisor_var_popular_posts = get_post_meta($id, 'traveladvisor_var_popular_destination', true);
    $traveladvisor_var_country = get_post_meta($id, 'traveladvisor_var_country', true);
    ?>
    <div class="cs-destination-listing">
        <div class="cs-media">
            <figure>
                <?php the_post_thumbnail('traveladvisor_var_media_4') ?>
                <?php if (isset($traveladvisor_var_popular_posts) && $traveladvisor_var_popular_posts == 'yes') { ?>
                    <figcaption><span class="cs-feature"><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_most_popular'); ?></span></figcaption>
                    <?php
                }
                ?>
            </figure>
        </div>
        <div class="cs-text">
            <div class="cs-location-sec">
                <h3><a href="<?php echo the_permalink(); ?> "> <?php the_title(); ?> </a> <span>
                        <?php
                        if (isset($traveladvisor_var_country) && $traveladvisor_var_country != '') {
                            echo '(';
                            echo esc_html($traveladvisor_var_country);
                            echo ')';
                            ?></span>
                    <?php } ?>
                </h3>
                <?php
                $traveladvisor_var_destination_title = get_the_title();
                $trip = 0;
                $minimum_destination_price = 0;
                if (isset($traveladvisor_var_tours_data) && $traveladvisor_var_tours_data != '' && is_array($traveladvisor_var_tours_data)) {
                    foreach ($traveladvisor_var_tours_data as $destination_price => $tour_selected_destination_title) {
                        if ($traveladvisor_var_destination_title == $tour_selected_destination_title) {
                            $minimum_destination_price = $destination_price;
                            if ($destination_price < $minimum_destination_price) {
                                $minimum_destination_price = $destination_price;
                            }
                        }
                    }
                }
                if (isset($minimum_destination_price) && $minimum_destination_price != 0) {
                    ?>
                    <div class="cs-price"><span><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_from'); ?></span> &nbsp; <strong><?php
                            echo esc_html($traveladvisor_currency_symbol);
                            echo esc_html($minimum_destination_price);
                            ?></strong></div>
                    <?php }
                    $excerpt_lenth = 0;
                    if (isset($traveladvisor_var_destination_excerpt) && $traveladvisor_var_destination_excerpt == 'yes') {
                        if (isset($traveladvisor_var_destination_excerpt_length) && $traveladvisor_var_destination_excerpt_length != '') {
                            $excerpt_lenth = $traveladvisor_var_destination_excerpt_length;
                        }
                    }
                   if($excerpt_lenth != 0){
					?>
                    <P>
                    <?php
                    echo wp_trim_words(get_the_excerpt(), $excerpt_lenth);
                    ?>
                    </P>
                   <?php } ?>
                   <ul class="cs-thumb-list">
                    <?php
                    $image_count = 0;
                    $traveladvisor_var_images = get_post_meta($post->ID, 'traveladvisor_var_destination_gallery_images_url', true);
                    if (is_array($traveladvisor_var_images) && $traveladvisor_var_images != '') {
                        if ($traveladvisor_var_images[0] != '') {
                            foreach ($traveladvisor_var_images as $key => $gallery_img_url) {
                                $traveladvisor_var_img_id = $traveladvisor_var_wp_traveladvisor_core->traveladvisor_var_get_attachment_id($gallery_img_url);
                                $traveladvisor_var_src = wp_get_attachment_image_src($traveladvisor_var_img_id, 'traveladvisor_var_media_7');
                                if ($traveladvisor_var_src <> '') {
                                    if ($image_count > 3) {
                                        break;
                                    }
                                    ?>
                                    <li><a href="<?php echo the_permalink(); ?>"><img src="<?php echo esc_url($traveladvisor_var_src[0]); ?>" alt=""/></a></li>
                                    <?php
                                    $image_count++;
                                }
                            }
                            ?>
                         <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <?php
endwhile;
wp_reset_postdata();
?>