<?php
/*
 * Destination Masnory view
 */
$title = get_post_meta($post->ID, 'traveladvisor_var_destination_element_title', true);
$traveladvisor_var_destination_masnory = array('wpdb', 'wp_traveladvisor','traveladvisor_var_static_text', 'traveladvisor_var_wp_traveladvisor_core', 'traveladvisor_var_destination_elements');
$traveladvisor_var_destination_masnory_return = TRAVELADVISOR_VAR_GLOBALS()->globalizing($traveladvisor_var_destination_masnory);
extract($traveladvisor_var_destination_masnory_return);
    $strings = new traveladvisor_plugin_all_strings;
    $strings->traveladvisor_plugin_activation_strings();
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
extract($wp_query->query_vars);
$traveladvisor_var_postdata = new WP_Query($args);
?> 
                <div class="masnory-gallery">
                <div class="row">
                    <?php
                    $counter = 0;
                    while ($traveladvisor_var_postdata->have_posts()):$traveladvisor_var_postdata->the_post();
                        $id = get_the_id();
                        $traveladvisor_tarveladvisor_country = get_post_meta($id, 'traveladvisor_var_country', true);
                        if ($counter == 0) {
                            $counter++;
                            ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="cs-destination-listing destination-box">
                                    <div class="cs-media">
                                        <figure>
                                            <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('traveladvisor_var_media_4'); ?>
                                            </a>
                                            <figcaption>
                                                <a href="<?php echo the_permalink(); ?>">
                                                    <div class="cs-text">
                                                        <div class="cs-location-sec">
                                                            <h4><?php the_title(); ?>
                                                                <span>
                                                                    <?php
                                                                    echo '(';
                                                                    if (isset($traveladvisor_tarveladvisor_country) && $traveladvisor_tarveladvisor_country != '') {
                                                                        echo esc_html($traveladvisor_tarveladvisor_country);
                                                                    }
                                                                    echo ")";
                                                                    ?>
                                                                </span>
                                                            </h4>
                                                            <?php
                                                            $traveladvisor_var_destination_title = get_the_title();

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
                                                                <?php } ?>
                                                        </div>
                                                    </div>
                                                </a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="row">
                        <?php } else { ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="cs-destination-listing destination-box">
                                    <div class="cs-media">
                                        <figure>
                                            <?php the_post_thumbnail('traveladvisor_var_media_3'); ?>
                                            <figcaption>
                                                <a href="<?php echo the_permalink(); ?>">
                                                    <div class="cs-text">
                                                        <div class="cs-location-sec">
                                                            <h6><?php the_title(); ?>
                                                                <span>
                                                                    <?php
                                                                    echo '(';
                                                                    if (isset($traveladvisor_tarveladvisor_country) && $traveladvisor_tarveladvisor_country != '') {
                                                                        echo esc_html($traveladvisor_tarveladvisor_country);
                                                                    }
                                                                    echo ")";
                                                                    ?>
                                                                </span>
                                                            </h6>
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
                                                </a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>
<!--                    </div>
                        </div>-->
                            <?php
                        }
                        endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
                </div>
                </div>
                </div>
                   
      