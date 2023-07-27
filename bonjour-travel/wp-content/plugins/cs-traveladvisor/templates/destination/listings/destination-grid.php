<?php
/*
 * Destination Grid view
 */
$traveladvisor_var_destination_grid = array('wpdb', 'wp_traveladvisor','traveladvisor_var_static_text','traveladvisor_var_static_text','traveladvisor_var_wp_traveladvisor_core', 'traveladvisor_var_destination_elements');
$traveladvisor_var_destination_grid_return = TRAVELADVISOR_VAR_GLOBALS()->globalizing($traveladvisor_var_destination_grid);
extract($traveladvisor_var_destination_grid_return);
    $strings = new traveladvisor_plugin_all_strings;
    $strings->traveladvisor_plugin_activation_strings();
extract($wp_query->query_vars);
$traveladvisor_barber_title_limit = 5;
$traveladvisor_var_destination_postdata = new WP_Query($args);
// accessing price from tours post type
$traveladvisor_var_tours_post_array = array(
    'post_type' => 'tours',
    'showposts' => -1,  
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
?>

<div class="row">
    <?php
    while ($traveladvisor_var_destination_postdata->have_posts()):$traveladvisor_var_destination_postdata->the_post();
        $id = get_the_id();
        $traveladvisor_var_country = get_post_meta($id, 'traveladvisor_var_country', true);
        ?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="cs-destination-listing destination-grid">
                <div class="cs-media">
                    <figure><a href="<?php echo the_permalink(); ?>"> <?php the_post_thumbnail('traveladvisor_var_media_3'); ?></a></figure>
                </div>
                <div class="cs-text">
                    <div class="cs-location-sec">
                        <h6><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?>
                                <?php
                                echo '<span>';
                                if (isset($traveladvisor_var_country) && $traveladvisor_var_country != '') {
                                    echo '(';
                                    echo esc_html($traveladvisor_var_country);
                                    echo ')';
                                    echo '</span>';
                                }
                                ?>
                            </a></h6>
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
            </div>
        </div>
        <?php
    endwhile;
    wp_reset_postdata();
    ?>
</div>
