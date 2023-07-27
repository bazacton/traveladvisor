<?php
/*
 * Template for Stylist single page
 */
add_action('wp_print_scripts', 'remove_google_apis_script');

function remove_google_apis_script() {
    wp_deregister_script('maps.googleapis');
}

$var_arrays = array('wpdb', 'traveladvisor_var_static_text', 'wp_query', 'post', 'traveladvisor_var_wp_traveladvisor_core', 'traveladvisor_views', 'query', 'post_count', 'traveladvisor_category', 'traveladvisor_page_tours', 'traveladvisor_column', 'traveladvisor_excerpt_length', 'traveladvisor_excerpt', 'traveladvisor_var_form_fields', 'traveladvisor_var_html_fields');
$search_global_vars = TRAVELADVISOR_VAR_GLOBALS()->globalizing($var_arrays);
extract($search_global_vars);
$strings = new traveladvisor_plugin_all_strings;
$strings->traveladvisor_plugin_activation_strings();
extract($wp_query->query_vars);
get_header();
//Side Bar Settings 
$traveladvisor_var_layout = '';
$traveladvisor_page_sidebar_right = '';
$traveladvisor_page_sidebar_left = '';
$leftSidebarFlag = false;
$rightSidebarFlag = false;
$traveladvisor_var_theme_options = get_option('traveladvisor_var_options');
$traveladvisor_var_currency = $traveladvisor_var_theme_options['traveladvisor_var_currency_sign'];
$traveladvisor_var_layout = get_post_meta($post->ID, 'traveladvisor_var_page_layout', true);
$traveladvisor_sidebar_right = get_post_meta($post->ID, 'traveladvisor_var_page_sidebar_right', true);
$traveladvisor_sidebar_left = get_post_meta($post->ID, 'traveladvisor_var_page_sidebar_left', true);
$traveladvisor_var_zoom_level = isset($traveladvisor_var_theme_options['traveladvisor_var_zoom_level']) ? $traveladvisor_var_theme_options['traveladvisor_var_zoom_level'] : '';
if ($traveladvisor_var_zoom_level == "" || $traveladvisor_var_zoom_level == '' || $traveladvisor_var_zoom_level == 0) {
    $traveladvisor_var_zoom_level = 9;
}

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
// Start the loop. 
$traveladvisor_mainblog_id = $post->ID;
while (have_posts()) : the_post();
    $traveladvisor_var_custom_fields_labels_names = '';
    $traveladvisor_var_tours_custom_fields_data = array();
    $traveladvisor_var_feature_name_array = get_post_meta($post->ID, "traveladvisor_var_feature_name_array", true);
    $traveladvisor_var_feature_desc_array = get_post_meta($post->ID, "traveladvisor_var_feature_desc_array", true);
    $traveladvisor_var_feature_icon_array = get_post_meta($post->ID, "traveladvisor_var_feature_icon", true);
    $traveladvisor_var_tour_duration = get_post_meta($post->ID, "traveladvisor_var_tour_duration", true);
    $traveladvisor_var_tours_oldprice = get_post_meta($post->ID, "traveladvisor_var_tours_oldprice", true);
    $traveladvisor_var_tours_newprice = get_post_meta($post->ID, "traveladvisor_var_tours_newprice", true);
    $traveladvisor_var_tours_question_title = get_post_meta($post->ID, "traveladvisor_var_tours_question_title", true);
    $traveladvisor_var_exp_name_array = get_post_meta($post->ID, "traveladvisor_var_exp_name_array", true);
    $traveladvisor_var_exp_desc_array = get_post_meta($post->ID, "traveladvisor_var_exp_desc_array", true);
    $traveladvisor_var_tours_schedule_title = get_post_meta($post->ID, "traveladvisor_var_tours_schedule_title", true);
    $traveladvisor_var_day_array = get_post_meta($post->ID, "traveladvisor_var_day_array", true);
    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array('10', '10'), true);
    $traveladvisor_var_place_array = get_post_meta($post->ID, 'traveladvisor_var_place_array', true);
    $traveladvisor_var_schedule_images = get_post_meta($post->ID, 'traveladvisor_var_point_interest_image_array', true);
    $traveladvisor_var_duration_array = get_post_meta($post->ID, 'traveladvisor_var_duration_array', true);
    $traveladvisor_var_description_array = get_post_meta($post->ID, 'traveladvisor_var_description_array', true);
    $traveladvisor_var_tours_gallery_images_url = get_post_meta($post->ID, 'traveladvisor_var_tours_gallery_images_url', true);
    $traveladvisor_var_highlight_desc_array = get_post_meta($post->ID, 'traveladvisor_var_highlight_desc_array', true);
    $traveladvisor_var_highlight_name_array = get_post_meta($post->ID, 'traveladvisor_var_highlight_name_array', true);
    $traveladvisor_var_tours_highlights_title = get_post_meta($post->ID, 'traveladvisor_var_tours_highlights_title', true);
    $traveladvisor_var_tours_destination_related_posts = get_post_meta($post->ID, 'traveladvisor_var_tour_destination', true);
    $traveladvisor_tour_organizer_mail = get_post_meta($post->ID, 'traveladvisor_var_organizer_email_address', true);
    //reviews data
    $traveladvisor_var_person_names_array = get_post_meta($post->ID, 'traveladvisor_var_destination_name_array', true);
    $traveladvisor_var_tour_review_title = get_post_meta($post->ID, 'traveladvisor_var_title_url_array', true);
    $traveladvisor_var_review_desc_array = get_post_meta($post->ID, 'traveladvisor_var_destination_desc_array', true);
    $traveladvisor_var_person_images_array = get_post_meta($post->ID, 'traveladvisor_var_point_of_interest_image_array', true);
    $traveladvisor_var_tour_reviews_title = get_post_meta($post->ID, 'traveladvisor_var_tour_reviews_title', true);
    $traveladvisor_var_tour_reviews_sub_title = get_post_meta($post->ID, 'traveladvisor_var_tour_reviews_sub_title', true);
    $traveladvisor_tour_title = get_the_title();
    // get the theme options for lables and names
    $traveladvisor_var_custom_select_fields_labels = isset($traveladvisor_var_options['traveladvisor_cus_field_dropdown']['label']) ? $traveladvisor_var_options['traveladvisor_cus_field_dropdown']['label'] : array();
    $traveladvisor_var_custom_text_fields_labels = isset($traveladvisor_var_options['traveladvisor_cus_field_text']['label']) ? $traveladvisor_var_options['traveladvisor_cus_field_text']['label'] : array();
    $traveladvisor_var_custom_textarea_fields_labels = isset($traveladvisor_var_options['traveladvisor_cus_field_textarea']['label']) ? $traveladvisor_var_options['traveladvisor_cus_field_textarea']['label'] : array();
    $traveladvisor_var_custom_date_fields_labels = isset($traveladvisor_var_options['traveladvisor_cus_field_date']['label']) ? $traveladvisor_var_options['traveladvisor_cus_field_date']['label'] : array();
    $traveladvisor_var_custom_email_fields_labels = isset($traveladvisor_var_options['traveladvisor_cus_field_email']['label']) ? $traveladvisor_var_options['traveladvisor_cus_field_email']['label'] : array();
    $traveladvisor_var_custom_url_fields_labels = isset($traveladvisor_var_options['traveladvisor_cus_field_url']['label']) ? $traveladvisor_var_options['traveladvisor_cus_field_url']['label'] : array();
    $traveladvisor_var_custom_range_fields_labels = isset($traveladvisor_var_options['traveladvisor_cus_field_range']['label']) ? $traveladvisor_var_options['traveladvisor_cus_field_range']['label'] : array();
    $traveladvisor_var_custom_select_fields_names = isset($traveladvisor_var_options['traveladvisor_cus_field_dropdown']['meta_key']) ? $traveladvisor_var_options['traveladvisor_cus_field_dropdown']['meta_key'] : array();
    $traveladvisor_var_custom_text_fields_names = isset($traveladvisor_var_options['traveladvisor_cus_field_text']['meta_key']) ? $traveladvisor_var_options['traveladvisor_cus_field_text']['meta_key'] : array();
    $traveladvisor_var_custom_textarea_fields_names = isset($traveladvisor_var_options['traveladvisor_cus_field_textarea']['meta_key']) ? $traveladvisor_var_options['traveladvisor_cus_field_textarea']['meta_key'] : array();
    $traveladvisor_var_custom_date_fields_names = isset($traveladvisor_var_options['traveladvisor_cus_field_date']['meta_key']) ? $traveladvisor_var_options['traveladvisor_cus_field_date']['meta_key'] : array();
    $traveladvisor_var_custom_email_fields_names = isset($traveladvisor_var_options['traveladvisor_cus_field_email']['meta_key']) ? $traveladvisor_var_options['traveladvisor_cus_field_email']['meta_key'] : array();
    $traveladvisor_var_custom_url_fields_names = isset($traveladvisor_var_options['traveladvisor_cus_field_url']['meta_key']) ? $traveladvisor_var_options['traveladvisor_cus_field_url']['meta_key'] : array();
    $traveladvisor_var_custom_range_fields_names = isset($traveladvisor_var_options['traveladvisor_cus_field_range']['meta_key']) ? $traveladvisor_var_options['traveladvisor_cus_field_range']['meta_key'] : array();
    $traveladvisor_var_custom_select_fields_icons = isset($traveladvisor_var_options['traveladvisor_cus_field_dropdown']['fontawsome_icon']) ? $traveladvisor_var_options['traveladvisor_cus_field_dropdown']['fontawsome_icon'] : array();
    $traveladvisor_var_custom_text_fields_icons = isset($traveladvisor_var_options['traveladvisor_cus_field_text']['fontawsome_icon']) ? $traveladvisor_var_options['traveladvisor_cus_field_text']['fontawsome_icon'] : array();
    $traveladvisor_var_custom_textarea_fields_icons = isset($traveladvisor_var_options['traveladvisor_cus_field_textarea']['fontawsome_icon']) ? $traveladvisor_var_options['traveladvisor_cus_field_textarea']['fontawsome_icon'] : array();
    $traveladvisor_var_custom_date_fields_icons = isset($traveladvisor_var_options['traveladvisor_cus_field_date']['fontawsome_icon']) ? $traveladvisor_var_options['traveladvisor_cus_field_date']['fontawsome_icon'] : array();
    $traveladvisor_var_custom_email_fields_icons = isset($traveladvisor_var_options['traveladvisor_cus_field_email']['fontawsome_icon']) ? $traveladvisor_var_options['traveladvisor_cus_field_email']['fontawsome_icon'] : array();
    $traveladvisor_var_custom_url_fields_icons = isset($traveladvisor_var_options['traveladvisor_cus_field_url']['fontawsome_icon']) ? $traveladvisor_var_options['traveladvisor_cus_field_url']['fontawsome_icon'] : array();
    $traveladvisor_var_custom_range_fields_icons = isset($traveladvisor_var_options['traveladvisor_cus_field_range']['fontawsome_icon']) ? $traveladvisor_var_options['traveladvisor_cus_field_range']['fontawsome_icon'] : array();
//merge arrays of different fields type (labels and names)
    $traveladvisor_var_all_custom_fields_labels = array_merge($traveladvisor_var_custom_select_fields_labels, $traveladvisor_var_custom_text_fields_labels, $traveladvisor_var_custom_textarea_fields_labels, $traveladvisor_var_custom_date_fields_labels, $traveladvisor_var_custom_email_fields_labels, $traveladvisor_var_custom_url_fields_labels, $traveladvisor_var_custom_range_fields_labels);
    $traveladvisor_var_all_custom_fields_names = array_merge($traveladvisor_var_custom_select_fields_names, $traveladvisor_var_custom_text_fields_names, $traveladvisor_var_custom_textarea_fields_names, $traveladvisor_var_custom_date_fields_names, $traveladvisor_var_custom_email_fields_names, $traveladvisor_var_custom_url_fields_names, $traveladvisor_var_custom_range_fields_names);
    $traveladvisor_var_all_custom_fields_icons = array_merge($traveladvisor_var_custom_select_fields_icons, $traveladvisor_var_custom_text_fields_icons, $traveladvisor_var_custom_textarea_fields_icons, $traveladvisor_var_custom_date_fields_icons, $traveladvisor_var_custom_email_fields_icons, $traveladvisor_var_custom_url_fields_icons, $traveladvisor_var_custom_range_fields_icons);
    $traveladvisor_var_all_custom_fields_labels = isset($traveladvisor_var_all_custom_fields_labels) ? $traveladvisor_var_all_custom_fields_labels : '';
    $traveladvisor_var_all_custom_fields_names = isset($traveladvisor_var_all_custom_fields_names) ? $traveladvisor_var_all_custom_fields_names : '';
    $traveladvisor_var_all_custom_fields_icons = isset($traveladvisor_var_all_custom_fields_icons) ? $traveladvisor_var_all_custom_fields_icons : '';
    if (isset($traveladvisor_var_all_custom_fields_names) && is_array($traveladvisor_var_all_custom_fields_names) && $traveladvisor_var_all_custom_fields_names != '') {
        foreach ($traveladvisor_var_all_custom_fields_names as $name => $latest_name) {
            $traveladvisor_var_latest_names_array[] = 'traveladvisor_var_' . $latest_name;
        }
    }
    if (isset($traveladvisor_var_latest_names_array) && is_array($traveladvisor_var_latest_names_array) && $traveladvisor_var_latest_names_array != '') {
        foreach ($traveladvisor_var_latest_names_array as $key => $field_name) {
            $traveladvisor_var_tours_custom_fields_data[] = get_post_meta($post->ID, $field_name, true);
        }
    }
    //combine array for labels and fields data
    if (is_array($traveladvisor_var_all_custom_fields_labels) && is_array($traveladvisor_var_all_custom_fields_labels)) {
        $traveladvisor_var_custom_fields_labels_names = array_combine($traveladvisor_var_all_custom_fields_labels, $traveladvisor_var_tours_custom_fields_data);
    }
    $traveladvisor_var_feature_name_array = isset($traveladvisor_var_feature_name_array) ? $traveladvisor_var_feature_name_array : '';
    $traveladvisor_var_feature_desc_array = isset($traveladvisor_var_feature_desc_array) ? $traveladvisor_var_feature_desc_array : '';
    $traveladvisor_var_feature_icon_array = isset($traveladvisor_var_feature_icon_array) ? $traveladvisor_var_feature_icon_array : '';
    $traveladvisor_var_tour_duration = isset($traveladvisor_var_tour_duration) ? $traveladvisor_var_tour_duration : '';
    $traveladvisor_var_tours_oldprice = isset($traveladvisor_var_tours_oldprice) ? $traveladvisor_var_tours_oldprice : '';
    $traveladvisor_var_tours_newprice = isset($traveladvisor_var_tours_newprice) ? $traveladvisor_var_tours_newprice : '';
    $traveladvisor_var_tours_question_title = isset($traveladvisor_var_tours_question_title) ? $traveladvisor_var_tours_question_title : '';
    $traveladvisor_var_exp_name_array = isset($traveladvisor_var_exp_name_array) ? $traveladvisor_var_exp_name_array : '';
    $traveladvisor_var_exp_desc_array = isset($traveladvisor_var_exp_desc_array) ? $traveladvisor_var_exp_desc_array : '';
    $traveladvisor_var_tours_schedule_title = isset($traveladvisor_var_tours_schedule_title) ? $traveladvisor_var_tours_schedule_title : '';
    $traveladvisor_var_day_array = isset($traveladvisor_var_day_array) ? $traveladvisor_var_day_array : '';
    $traveladvisor_var_tours_destination = isset($traveladvisor_var_tours_destination) ? $traveladvisor_var_tours_destination : '';

endwhile;
wp_reset_postdata();
// End while loop
?>
<ul class="cs-list-detail-slider">
    <?php
    // $traveladvisor_count = count( $traveladvisor_var_tours_gallery_images_url ) - 1;
//  for ( $a = 0; $a <= $traveladvisor_count; $a ++ ) {
//      if ( !isset( $traveladvisor_var_tours_gallery_images_url[$a] ) )
//          $traveladvisor_var_tours_gallery_images_url[$a] = '';
    //echo esc_url(the_post_thumbnail());
    $traveladvisor_var_tour_detail_image_url = get_post_meta($post->ID, 'traveladvisor_var_tour_detail_image_url_array', true);
    //print_r($traveladvisor_var_tour_detail_image_url);
    $traveladvisor_var_tour_detail_image_url = isset($traveladvisor_var_tour_detail_image_url[0]) ? $traveladvisor_var_tour_detail_image_url[0] : '';
    if($traveladvisor_var_tour_detail_image_url == ''){
        $traveladvisor_var_tour_detail_image_url = plugins_url().'/cs-traveladvisor/assets/frontend/images/tour-gallery-default.jpg';
    }
    echo '<img src="' . esc_url($traveladvisor_var_tour_detail_image_url) . '" alt="" />';
    //}
    ?>
</ul>
<div class="cs-fixed-sub-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cs-page-title">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- </div> -->
<!-- Main Start -->
<div class="main-section">
    <div class="tour-detail-holder">
        <div class="page-section">
            <div class="cs-overlay">
                <div class="container">
                    <div class="row">
                        <?php if (isset($traveladvisor_var_day_array) && !empty($traveladvisor_var_day_array)) { ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <ul class="cs-detail-next-post">
                                    <?php
                                    $traveladvisor_count = count($traveladvisor_var_place_array);
                                    $default_label = '';
                                    for ($a = 0; $a < $traveladvisor_count; $a ++) {
                                        $day = 'day';

                                        if ($a > 7) {
                                            break;
                                        }
                                    
                                        if(is_array($traveladvisor_var_schedule_images) && isset($traveladvisor_var_schedule_images[$a]) && $traveladvisor_var_schedule_images[$a] != ''){ 
                                            $traveladvisor_var_img_id = $traveladvisor_var_wp_traveladvisor_core->traveladvisor_var_get_attachment_id($traveladvisor_var_schedule_images[$a]);
                                            $traveladvisor_var_src = wp_get_attachment_image_src($traveladvisor_var_img_id, 'traveladvisor_var_media_3');
                                        }else{
                                            $traveladvisor_var_img_id = '';
                                            $traveladvisor_var_src = '';
                                        }
                                        if (!isset($traveladvisor_var_place_array[$a]))
                                            $traveladvisor_var_place_array[$a] = '';
                                        if (!isset($traveladvisor_var_day_array[$a]))
                                            $traveladvisor_var_day_array[$a] = '';
                                        if (!isset($traveladvisor_var_description_array[$a]))
                                            $traveladvisor_var_description_array[$a] = '';
                                        if (!isset($traveladvisor_var_schedule_images[$a]))
                                            $traveladvisor_var_schedule_images[$a] = '';
                                        if ($traveladvisor_var_day_array[$a] == '') {
                                            $default_label = 'Place';
                                        }
                                        ?>
                                        <li>
                                            <div class="cs-date-post" id="<?php echo "infobox" . $a; ?>"><span><?php echo esc_html($traveladvisor_var_day_array[$a]); ?><?php echo esc_html($default_label); ?></span>
                                                <div class="cs-post-thumb">
                                                    <div class="cs-media">
                                                        <figure><a href="javascript:void(0)"><img src="<?php echo esc_url($traveladvisor_var_src[0]); ?>" alt="" /></a></figure>
                                                    </div>
                                                    <div class="cs-text" >
                                                        <h5><a href="#"><?php echo esc_html($traveladvisor_var_day_array[$a]); ?>&nbsp; &nbsp; <?php echo esc_html($traveladvisor_var_place_array[$a]); ?>  </a></h5>
                                                        <p><?php echo esc_html($traveladvisor_var_description_array[$a]); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } ?>
                                    <?php
                                }
                                ?> 
                            </ul>  
                            <?php
                            traveladvisor_var_inline_styles_method('ul.custominfo > li > .cs-post-thumb > .cs-text > p{ font-size: 11px !important; }
                            ul.custominfo > li > span{ content: none; }
                            ul.custominfo{ margin-left: 28px;}');
                            ?>

                            <?php
                            $traveladvisor_var_def_map_style = isset($traveladvisor_var_options['traveladvisor_var_def_map_style']) ? $traveladvisor_var_options['traveladvisor_var_def_map_style'] : 'map-box';
                            $script_str = '';
                            $script_str .= 'var map;
                            function initMap() {
                                var origionz = [];
                                var destinationz = [];
                                var bounds = new google.maps.LatLngBounds;
                                var markersArray = [];
                                var drawlines = [];
                                jQuery(document).ready(function () {
                                    jQuery("ul.cs-schedule-list > li > span:nth-child(2)").each(function (i, el) {
                                        var ID = jQuery(this).text();
                                        if (i === 0) {
                                            origionz[i] = ID;
                                        } else {
                                            destinationz[i - 1] = ID;
                                        }
                                        drawlines[i] = ID;
                                    });
                                });
                                var originIcon = \'\';
                                var destinationIcon = \'\';
                                var originIcon = "' . get_template_directory_uri() . '/assets/images/startup.png' . '";
                                var destinationIcon = "' . get_template_directory_uri() . '/assets/images/startupb.png' . '";';


                            if (isset($traveladvisor_var_theme_options['traveladvisor_var_google_maps_src_icon']) and $traveladvisor_var_theme_options['traveladvisor_var_google_maps_src_icon'] != '') {

                                $script_str .= 'var originIcon = "' . esc_html($traveladvisor_var_theme_options['traveladvisor_var_google_maps_src_icon']) . '";
                        var destinationIcon = "' . esc_html($traveladvisor_var_theme_options['traveladvisor_var_google_maps_dest_icon']) . '";';
                            }
                            $script_str .= ' var map = new google.maps.Map(document.getElementById("map"), {
                        center: new google.maps.LatLng(51.507351, -0.127758),
                        zoom: ' . $traveladvisor_var_zoom_level . ',
                    });
                    var mapOpt;
                    var map = new google.maps.Map(document.getElementById("map"),mapOpt);
                // start style apply
                
                var style = "' . $traveladvisor_var_def_map_style . '";
                    if (style != "") {
                    var styles = traveladvisor_map_select_style(style);
                    if (styles != "") {
                        var styledMap = new google.maps.StyledMapType(styles,
                                {name: "Styled Map"});
                        map.mapTypes.set("map_style", styledMap);
                        map.setMapTypeId("map_style");
                    }
                }
        
                // end style apply
                    var geocoder = new google.maps.Geocoder;
                    var service = new google.maps.DistanceMatrixService;
                    service.getDistanceMatrix({
                        origins: origionz,
                        destinations: destinationz,
                        travelMode: google.maps.TravelMode.DRIVING,
                        unitSystem: google.maps.UnitSystem.METRIC,
                        avoidHighways: false,
                        avoidTolls: false
                    }, function (response, status) {
                        if (status !== google.maps.DistanceMatrixStatus.OK) {
                        } else {
                            var originList = response.originAddresses;
                            var destinationList = response.destinationAddresses;
                            deleteMarkers(markersArray);
                            var infoWindows = [];
                            var infodive = [];
                            var countit;
                            var lineCoordinates = [];
                            var infodiveb = [];
                            var countitb;
                            var showGeocodedAddressOnMap = function (asDestination, ij) {
                                var icon = asDestination ? destinationIcon : originIcon;
                                return function (results, status) {
                                    if (status === google.maps.GeocoderStatus.OK) {
                                        map.fitBounds(bounds.extend(results[0].geometry.location));
                                        infodive.push(ij);
                                        countit = infodive.length - 1;
                                        addMarker(countit);
                                        var drawlinescount = drawlines.length--;
                                        lineCoordinates[countit] = results[0].geometry.location;
                                        if (drawlinescount === 1) {
                                            passcords(lineCoordinates);
                                        }
                                        delete countit;
                                    } else {
                                    }
                                    function addMarker(countit) {
                                        markersArray[countit] = new google.maps.Marker({
                                            map: map,
                                            position: results[0].geometry.location,
                                            icon: icon,
                                            animation: google.maps.Animation.DROP
                                        });
                                        var infoContents;
                                        if (document.getElementById("infobox" + countit) != null) {
                                            infoContents = \'<ul class="custominfo"><li >\';
                                            infoContents = infoContents + document.getElementById("infobox" + countit).innerHTML;
                                            infoContents = infoContents + \'</li></ul>\';
                                        }
                                        infoWindows[countit] = new google.maps.InfoWindow({
                                            content: infoContents,
                                            maxWidth: 230,
                                            pixelOffset: 0
                                        });
                                        var listnnow = document.getElementById("address" + countit);
                                        google.maps.event.addDomListener(listnnow, \'click\', function () {
                                            closeAllInfoWindows();
                                            infoWindows[countit].open(map, markersArray[countit]);
                                        });
                                    }
                                    function closeAllInfoWindows() {
                                        for (var i = 0; i < infoWindows.length; i++) {
                                            infoWindows[i].close();
                                        }
                                    }
                                    delete countit;
                                };
                            };
                            for (var i = 0; i < originList.length; i++) {
                                var results = response.rows[i].elements;
                                geocoder.geocode({\'address\': originList[i]}, showGeocodedAddressOnMap(false, i));
                                for (var j = 0; j < results.length; j++) {
                                    geocoder.geocode({\'address\': destinationList[j]},
                                            showGeocodedAddressOnMap(true, j)
                                            );
                                }
                            }
                            function passcords(lineCoordinates) {
                                var pointCount = lineCoordinates.length;
                                var linePath = [];
                                for (var i = 0; i < pointCount; i++) {
                                    var cordstring = (lineCoordinates[i]) + "";
                                    var cordstringres = cordstring.replace(/[()]/g, \'\');
                                    var newcords = explodeit(\',\', cordstringres, 10);
                                    var tempLatLng = new google.maps.LatLng(newcords[0], newcords[1]);
                                    linePath.push(tempLatLng);
                                }
                                var arrowSymbol = {
                                    strokeColor: \'#0088cc\',
                                    scale: 3,
                                    offset: \'1\',
                                    repeat: \'120px\',
                                    path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                                    fillColor: \'#0088cc\',
                                    fillOpacity: 0.8,
                                    strokeWeight: 0.001,
                                    anchor: (0, 0)
                                };
                                var lineOptions = {
                                    path: linePath,
                                    icons: [{
                                            icon: arrowSymbol
                                        }],
                                    geodesic: true,
                                    strokeWeight: 4,
                                    strokeColor: \'#0088cc\',
                                    strokeOpacity: 0.9
                                };
                                var polyline = new google.maps.Polyline(lineOptions);
                                polyline.setMap(map);
                                animateArrow();
                                function animateArrow() {
                                    var counter = 0;
                                    window.setInterval(function () {
                                        counter = (counter + 1) % 200;
                                        var arrows = polyline.get(\'icons\');
                                        arrows[0].offset = (counter / 2) + \'%\';
                                        polyline.set(\'icons\', arrows);
                                    }, 50);
                                }
                            }
                            function explodeit(delimiter, string, limit) {
                                if (arguments.length < 2 || typeof delimiter === \'undefined\' || typeof string === \'undefined\')
                                    return null;
                                if (delimiter === \'\' || delimiter === false || delimiter === null)
                                    return false;
                                if (typeof delimiter === \'function\' || typeof delimiter === \'object\' || typeof string === \'function\' || typeof string ===
                                        \'object\') {
                                    return {
                                        0: \'\'
                                    };
                                }
                                if (delimiter === true)
                                    delimiter = \'1\';
                                delimiter += \'\';
                                string += \'\';
                                var s = string.split(delimiter);
                                if (typeof limit === \'undefined\')
                                    return s;
                                if (limit === 0)
                                    limit = 1;
                                if (limit > 0) {
                                    if (limit >= s.length)
                                        return s;
                                    return s.slice(0, limit - 1)
                                            .concat([s.slice(limit - 1)
                                                        .join(delimiter)
                                            ]);
                                }
                                if (-limit >= s.length)
                                    return [];
                                s.splice(s.length + limit);
                                return s;
                            }
                        }
                    });
                }
                function deleteMarkers(markersArray) {
                    for (var i = 0; i < markersArray.length; i++) {
                        markersArray[i].setMap(null);
                    }
                    markersArray = [];
                }
                ';



                            wp_add_inline_script('traveladvisor-inline-script', $script_str);
                            ?>

                        </div>
                    </div>
                    <!--            </div>-->
                </div>
            </div>
        </div>
        <div class="page-section" style="margin-bottom:70px;">
            <div class="container">
                <div class="row">
                    <aside class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12" id="filtration_sidebar">
                        <div class="cs-tourdetial-search" >
                            <div class="cs-tourdetial-holder">
                                <div class="cs-price"> <strong>
                                        <?php
                                        if ($traveladvisor_var_tours_oldprice != '') {
                                            ?>
                                            <em><sup><?php echo esc_html($traveladvisor_var_currency); ?></sup><?php echo esc_html($traveladvisor_var_tours_oldprice); ?></em> 
                                        <?php } ?>
                                        <sup><?php echo esc_html($traveladvisor_var_currency); ?></sup><?php echo esc_html($traveladvisor_var_tours_newprice); ?></strong> <span><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_price'); ?></span> </div>
                                <div class="cs-search">
                                    <h6><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_check_availability'); ?> </h6>
                                    <div class="cs-profile-contact-detail" data-adminurl="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" data-cap="recaptcha7">
                                        <form id="ajaxcontactemployer" action="#" method="post" enctype="multipart/form-data">
                                            <div id="ajaxcontact-response" class=""></div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="cs-search-field">
                                                        <label><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_select_a_departure'); ?></label>
                                                        <i class="icon-calendar"></i>
                                                        <label id="Deadline" class="cs-calendar-combo">
                                                            <?php
                                                            $traveladvisor_var_opt_array = array(
                                                                'std' => '',
                                                                'id' => '',
                                                                'cust_id' => 'booking_date',
                                                                'cust_name' => 'booking_date',
                                                                'return' => true,
                                                                'force_std' => true,
                                                                'required' => true,
                                                                'extra_atr' => "placeholder='Departure Date'",
                                                            );

                                                            echo $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($traveladvisor_var_opt_array);
                                                            ?>
                                                            <span class="alert-danger" id="span_booking_date"></span>
                                                            <input type="hidden" name="traveladvisor_hidden_email" value="<?php echo esc_html($traveladvisor_tour_organizer_mail); ?>">
                                                            <input type="hidden" name="traveladvisor_tour_title" value="<?php echo esc_html($traveladvisor_tour_title); ?>">
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="cs-select-fields">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                                <div class="cs-search-field">
                                                                    <label><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_adults'); ?></label>
                                                                    <?php
                                                                    $traveladvisor_destination_options = array('' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10',
                                                                        '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16');
                                                                    $traveladvisor_var_opt_array = array(
                                                                        'std' => '',
                                                                        'id' => '',
                                                                        'classes' => 'chosen-select',
                                                                        'cust_id' => 'tour_adults',
                                                                        'cust_name' => 'tour_adults',
                                                                        'return' => true,
                                                                        'prefix' => 'traveladvisor_traveladvisor',
                                                                        'options' => $traveladvisor_destination_options);

                                                                    echo $traveladvisor_var_form_fields->traveladvisor_var_form_select_render($traveladvisor_var_opt_array);
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                                <div class="cs-search-field">
                                                                    <label><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_children'); ?></label>
                                                                    <?php
                                                                    $traveladvisor_destination_options = array('' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10',
                                                                        '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16');
                                                                    $traveladvisor_var_opt_array = array(
                                                                        'std' => '',
                                                                        'id' => '',
                                                                        'classes' => 'chosen-select',
                                                                        'cust_id' => 'tour_children',
                                                                        'cust_name' => 'tour_children',
                                                                        'return' => true,
                                                                        'prefix' => 'traveladvisor_traveladvisor',
                                                                        'options' => $traveladvisor_destination_options);
                                                                    echo $traveladvisor_var_form_fields->traveladvisor_var_form_select_render($traveladvisor_var_opt_array);
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                                <div class="cs-search-field">
                                                                    <label><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_infants'); ?></label>
                                                                    <?php
                                                                    $traveladvisor_destination_options = array('' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10',
                                                                        '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16');
                                                                    $traveladvisor_var_opt_array = array(
                                                                        'std' => '',
                                                                        'id' => '',
                                                                        'classes' => 'chosen-select',
                                                                        'cust_id' => 'tour_infants',
                                                                        'cust_name' => 'tour_infants',
                                                                        'return' => true,
                                                                        'prefix' => 'traveladvisor_traveladvisor',
                                                                        'options' => $traveladvisor_destination_options);
                                                                    echo $traveladvisor_var_form_fields->traveladvisor_var_form_select_render($traveladvisor_var_opt_array);
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="cs-search-field">
                                                        <label><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_full_name'); ?></label>
                                                        <?php
                                                        $traveladvisor_var_opt_array = array(
                                                            'std' => '',
                                                            'cust_id' => 'user_name',
                                                            'cust_name' => 'user_name',
                                                            'id' => '',
                                                            'return' => true,
                                                            'force_std' => true,
                                                            'required' => true,
                                                            'extra_atr' => "placeholder='Name'",
                                                        );
                                                        echo $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($traveladvisor_var_opt_array);
                                                        ?>
                                                        <span class="alert-danger" id="span_user_name"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="cs-search-field">
                                                        <label><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_email_address'); ?></label>
                                                        <?php
                                                        $traveladvisor_var_opt_array = array(
                                                            'std' => '',
                                                            'id' => '',
                                                            'cust_id' => 'user_email',
                                                            'cust_name' => 'user_email',
                                                            'return' => true,
                                                            'force_std' => true,
                                                            'cust_type' => 'email',
                                                            'required' => true,
                                                            'extra_atr' => "placeholder='Email'",
                                                        );
                                                        echo $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($traveladvisor_var_opt_array);
                                                        ?>
                                                        <span class="alert-danger" id="span_user_email"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="cs-search-field" data-employerid="<?php echo esc_html($post->ID); ?>">
                                                        <?php
                                                        $traveladvisor_opt_array = array(
                                                            'id' => '',
                                                            'std' => __('Send an Email', 'cs-traveladvisor'),
                                                            'cust_id' => "employerid_contactus",
                                                            'cust_name' => "employerid_contactus",
                                                            'classes' => 'acc-submit cs-bgcolor',
                                                            'extra_atr' => '',
                                                            'cust_type' => 'submit',
                                                        );
                                                        $traveladvisor_form_fields2->traveladvisor_form_text_render($traveladvisor_opt_array);
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="main-cs-loader" class="loader_class"></div>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <div class="page-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cs-list-short" id="short_list">
                                    <ul class="cs-list-highlights">
                                        <li><a href="#overview"><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_overview'); ?></a></li>
                                        <li><a href="#trip-highlights"><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_trip_highlights'); ?></a></li>
                                        <li><a href="#itinerary"><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_itinary'); ?></a></li>
                                        <li><a href="#itinerary"><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_map'); ?></a></li>
                                        <li><a href="#reviews"><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_reviews'); ?></a></li>
                                        <li><a href="#gallery"><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_gallery'); ?></a></li>
                                        <li><a href="#related-tours"><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_related_tours'); ?></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="cs-list-detail" id="overview">

                                        <?php
                                        if (is_array($traveladvisor_var_custom_fields_labels_names) && $traveladvisor_var_custom_fields_labels_names != '') {
                                            $count = 0;
                                            foreach ($traveladvisor_var_custom_fields_labels_names as $traveladvisor_fields_labels => $traveladvisor_fields_data) {

                                                if (isset($traveladvisor_fields_data) && $traveladvisor_fields_data != '') {
                                                    ?>
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                        <div class="cs-tour-category"> <i class="<?php echo esc_html($traveladvisor_var_all_custom_fields_icons[$count]); ?>"></i>
                                                            <div class="cs-text"> <span><?php echo esc_html($traveladvisor_fields_labels); ?></span><?php
                                                                if (is_array($traveladvisor_fields_data)) {
                                                                    foreach ($traveladvisor_fields_data as $traveladvisor_field_value) {
                                                                        $traveladvisor_field_value = str_replace("-", " ", "$traveladvisor_field_value");
                                                                        $traveladvisor_field_value = ucwords($traveladvisor_field_value);
                                                                        ?> <em><?php echo esc_html($traveladvisor_field_value); ?></em> <?php
                                                                    }
                                                                } else {
                                                                    $traveladvisor_fields_data = str_replace("-", " ", "$traveladvisor_fields_data");
                                                                    ?> <em><?php echo esc_html($traveladvisor_fields_data); ?></em> <?php } ?> </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $count ++;
                                                }
                                            }
                                        }
                                        ?>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cs-list-detail" id="trip-highlights">
                                    <h4><?php echo esc_html($traveladvisor_var_tours_highlights_title); ?></h4>
                                    <?php
                                    $traveladvisor_highlights = array();
                                    $traveladvisor_count = count($traveladvisor_var_highlight_name_array) - 1;
                                    for ($traveladvisor_start = 0; $traveladvisor_start <= $traveladvisor_count; $traveladvisor_start ++) {
                                        if (!isset($traveladvisor_var_highlight_desc_array[$traveladvisor_start])) {

                                            $traveladvisor_var_highlight_desc_array[$traveladvisor_start] = '';
                                        } else {
                                            $traveladvisor_highlights = explode("\n", $traveladvisor_var_highlight_desc_array[$traveladvisor_start]);
                                        }
                                        if (!isset($traveladvisor_var_highlight_name_array[$traveladvisor_start]))
                                            $traveladvisor_var_highlight_name_array[$traveladvisor_start] = '';
                                        if (isset($traveladvisor_var_highlight_name_array[$traveladvisor_start]) && $traveladvisor_var_highlight_name_array[$traveladvisor_start] != '') {
                                            ?>
                                            <h6><?php echo esc_html($traveladvisor_var_highlight_name_array[$traveladvisor_start]); ?></h6>
                                        <?php } ?>
                                        <ul class="cs-trip-list">
                                            <?php
                                            $traveladvisor_highlights_count = count($traveladvisor_highlights) - 1;
                                            for ($traveladvisor_startert = 0; $traveladvisor_startert <= $traveladvisor_highlights_count; $traveladvisor_startert ++) {
                                                if (!isset($traveladvisor_highlights[$traveladvisor_startert]))
                                                    $traveladvisor_highlights[$traveladvisor_startert] = '';
                                                if ($traveladvisor_highlights[$traveladvisor_startert] <> '') {
                                                    ?>
                                                    <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><i class="icon-check_circle cs-color"></i><?php echo $traveladvisor_highlights[$traveladvisor_startert]; ?></li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-section" style="margin-bottom:40px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="cs-list-detail light-box" id="gallery">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-section-title">
                                        <h3><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_amazing_gallery'); ?></h3>
                                    </div>
                                </div>

                                <?php
                                $traveladvisor_count = count($traveladvisor_var_tours_gallery_images_url) - 1;
                                for ($a = 0; $a <= $traveladvisor_count; $a ++) {
                                    ?>
                                    <?php if ($a <= 2) { ?>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <?php } else { ?>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">  
                                            <?php } ?>
                                                <?php if(is_array($traveladvisor_var_tours_gallery_images_url)) { ?>
                                            <div class="cs-trip-gallery">
                                                <div class="cs-media">
                                                    <?php
                                                    if ($a <= 2) {
                                                        $traveladvisor_slider_image = traveladvisor_get_image_thumb($traveladvisor_var_tours_gallery_images_url[$a], 'traveladvisor_media_8');
                                                        ?>
                                                        <figure><a href="<?php
                                                            echo esc_html($traveladvisor_var_tours_gallery_images_url[$a])
                                                            ?>" rel="prettyPhoto[gallery2]" data-rel="prettyPhoto[0]"><img src="<?php
                                                                       echo esc_html($traveladvisor_slider_image)
                                                                       ?>" alt="" /></a>
                                                                <?php
                                                            } else {
                                                                $traveladvisor_slider_image = traveladvisor_get_image_thumb($traveladvisor_var_tours_gallery_images_url[$a], 'traveladvisor_media_9');
                                                                ?>
                                                            <figure> <a href="<?php
                                                                echo esc_html($traveladvisor_var_tours_gallery_images_url[$a])
                                                                ?>" rel="prettyPhoto[gallery2]" data-rel="prettyPhoto[0]"><img
                                                                        src="<?php echo esc_html($traveladvisor_slider_image); ?>"
                                                                        alt="" /></a>
                                                                <?php } ?>
                                                            <figcaption></figcaption>

                                                        </figure>
                                                        <span><i class="icon-search2"></i></span>
                                                </div>
                                            </div>
                                                <?php } ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-section" style="margin:0 0 80px 0;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="element-heading left"><h3><?php echo esc_html($traveladvisor_var_tours_question_title); ?></h3></div>
                            <div id="accordion" class="panel-group">
                                <?php
                                $b = 1;
                                $traveladvisor_question_count = count($traveladvisor_var_exp_name_array) - 1;
                                if ($traveladvisor_question_count > 0) {
                                    for ($a = 0; $a <= $traveladvisor_question_count; $a ++) {
                                        if (!isset($traveladvisor_var_exp_name_array[$a]))
                                            $traveladvisor_var_exp_name_array[$a] = '';
                                        if (!isset($traveladvisor_var_exp_desc_array[$a]))
                                            $traveladvisor_var_exp_desc_array[$a] = '';
                                        ?> 
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <strong class="panel-title">
                                                    <a href="#collapse<?php echo esc_html($b); ?>" class="collapsed" data-parent="#accordion" data-toggle="collapse">
                                                        <?php echo esc_html($traveladvisor_var_exp_name_array[$a]); ?></a>
                                                </strong>
                                            </div>
                                            <div class="panel-collapse collapse" id="collapse<?php echo esc_html($b); ?>">
                                                <div class="panel-body"><?php echo esc_html($traveladvisor_var_exp_desc_array[$a]); ?></div>
                                            </div>
                                        </div>
                                        <?php
                                        $b ++;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <?php if (isset($traveladvisor_var_person_names_array) && $traveladvisor_var_person_names_array <> '') { ?>
                <div class="page-section" style=" padding:60px 0 40px 0; background:#f7f7f7;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <div class="cs-section-title">
                                    <h3><?php echo esc_html($traveladvisor_var_tour_reviews_title); ?></h3>
                                    <p><?php echo esc_html($traveladvisor_var_tour_reviews_sub_title); ?></p>
                                </div>
                                <div class="cs-list-detail" id="reviews">
                                    <ul class="grid effect-2" id="grid">
                                        <?php
                                        $traveladvisor_review_counter = count($traveladvisor_var_person_names_array) - 1;
                                        for ($traveladvisor_a = 0; $traveladvisor_a <= $traveladvisor_review_counter; $traveladvisor_a ++) {
                                            if (!isset($traveladvisor_var_person_names_array[$traveladvisor_a]))
                                                $traveladvisor_var_person_names_array[$traveladvisor_a] = '';
                                            if (!isset($traveladvisor_var_review_desc_array[$traveladvisor_a]))
                                                $traveladvisor_var_review_desc_array[$traveladvisor_a] = '';
                                            if (!isset($traveladvisor_var_person_images_array[$traveladvisor_a]))
                                                $traveladvisor_var_person_images_array[$traveladvisor_a] = '';
                                            if (!isset($traveladvisor_var_tour_review_title[$traveladvisor_a]))
                                                $traveladvisor_var_tour_review_title[$traveladvisor_a] = '';
                                            if (isset($traveladvisor_var_person_names_array[$traveladvisor_a]) && $traveladvisor_var_person_names_array[$traveladvisor_a] <> '') {
                                                ?>
                                                <li class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                    <div class="cs-testimonial">
                                                        <div class="author-detail">
                                                            <div class="cs-media">
                                                                <figure><img src="<?php echo esc_html($traveladvisor_var_person_images_array[$traveladvisor_a]); ?>" alt="" /></figure>
                                                                <strong class="author-name"> <em><?php echo esc_html($traveladvisor_var_person_names_array[$traveladvisor_a]); ?></em> <span><?php echo esc_html($traveladvisor_var_tour_review_title[$traveladvisor_a]); ?> </span> </strong> </div>
                                                        </div>
                                                        <div class="question-mark">
                                                            <p><?php echo esc_html($traveladvisor_var_review_desc_array[$traveladvisor_a]); ?></p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
        $traveladvisor_var_theme_options = get_option('traveladvisor_var_options');
        $traveladvisor_dropdown = 0;
        $traveladvisor_text_num = 0;
        $traveladvisor_url_num = 0;
        $traveladvisor_range_num = 0;
        $traveladvisor_email_num = 0;
        $traveladvisor_date_num = 0;
        $traveladvisor_textarea_num = 0;
        $traveladvisor_none_num = 0;
        $traveladvisor_value = 0;
        $traveladvisor_total_fields = isset($traveladvisor_var_theme_options['traveladvisor_cus_field_title']) ? $traveladvisor_var_theme_options['traveladvisor_cus_field_title'] : '';
        if (is_array($traveladvisor_total_fields) && !empty($traveladvisor_total_fields)) {
            $traveladvisor_total_fields_count = count($traveladvisor_total_fields) - 1;
        } else {
            $traveladvisor_total_fields_count = 0;
        }
        for ($traveladvisor_a = $traveladvisor_value; $traveladvisor_a <= $traveladvisor_total_fields_count; $traveladvisor_a ++) {
            $traveladvisor_get_field = isset($traveladvisor_total_fields[$traveladvisor_a]) ? $traveladvisor_total_fields[$traveladvisor_a] : '';
            switch ($traveladvisor_get_field) {
                case "textarea":
                    if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"])) {
                        if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_textarea_num])) {
                            $traveladvisor_icons[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_textarea_num];
                        }if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_textarea_num])) {
                            $traveladvisor_labels[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_textarea_num];
                        }if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_textarea_num])) {
                            $traveladvisor_metas[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_textarea_num];
                        }
                    }
                    $traveladvisor_textarea_num ++;
                    break;
                case "date":
                    if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"])) {
                        if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_date_num])) {
                            $traveladvisor_icons[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_date_num];
                        }if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_date_num])) {
                            $traveladvisor_labels[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_date_num];
                        }if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_date_num])) {
                            $traveladvisor_metas[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_date_num];
                        }
                    }
                    $traveladvisor_date_num ++;
                    break;
                case "text":
                    if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"])) {
                        if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_text_num])) {
                            $traveladvisor_icons[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_text_num];
                        }if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_text_num])) {
                            $traveladvisor_labels[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_text_num];
                        }if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_text_num])) {
                            $traveladvisor_metas[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_text_num];
                        }
                    }
                    $traveladvisor_text_num ++;
                    break;
                case "email":
                    if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"])) {
                        if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_email_num])) {
                            $traveladvisor_icons[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_email_num];
                        }if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_email_num])) {
                            $traveladvisor_labels[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_email_num];
                        }if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_email_num])) {
                            $traveladvisor_metas[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_email_num];
                        }
                    }
                    $traveladvisor_email_num ++;
                    break;
                case "range":
                    if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"])) {
                        if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_range_num])) {
                            $traveladvisor_icons[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_range_num];
                        }if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_range_num])) {
                            $traveladvisor_labels[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_range_num];
                        }if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_range_num])) {
                            $traveladvisor_metas[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_range_num];
                        }
                    }
                    $traveladvisor_range_num ++;
                    break;
                case "url":
                    if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"])) {
                        if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_url_num])) {
                            $traveladvisor_icons[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_url_num];
                        }if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_url_num])) {
                            $traveladvisor_labels[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_url_num];
                        }if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_url_num])) {
                            $traveladvisor_metas[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_url_num];
                        }
                    }
                    $traveladvisor_url_num ++;
                    break;
                case "dropdown":
                    if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"])) {
                        if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_dropdown])) {
                            $traveladvisor_icons[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_dropdown];
                        }if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_dropdown])) {
                            $traveladvisor_labels[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_dropdown];
                        }if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_dropdown])) {
                            $traveladvisor_metas[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_dropdown];
                        }
                    }
                    $traveladvisor_dropdown ++;
                    break;
                default :
                    if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"])) {
                        if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_none_num])) {
                            $traveladvisor_icons[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_none_num];
                        }if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_none_num])) {
                            $traveladvisor_labels[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_none_num];
                        }if (isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_none_num])) {
                            $traveladvisor_metas[] = $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_none_num];
                        }
                    }
                    $traveladvisor_none_num ++;
            }
        }
        ?>

        <div class="page-section" style="margin-bottom:90px;">
            <div class="maps" id="itinerary">
                <div id="map"  ></div>
                <div class="cs-time-schedule">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="cs-map-holder">
                                <div class="cs-map-detail">
                                    <a href="javascript:void(0)" id="btn-show"><i class="icon-keyboard_arrow_right"></i></a>
                                    <h3><?php echo esc_html($traveladvisor_var_tours_schedule_title); ?></h3>
                                    <ul class="cs-schedule-list">
                                        <li> <strong><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_days'); ?></strong> <strong><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_place'); ?></strong> <strong><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_duration'); ?></strong> </li>
                                        <?php
                                        $traveladvisor_count = count($traveladvisor_var_day_array) - 1;
                                        for ($a = 0; $a <= $traveladvisor_count; $a ++) {
                                            if (!isset($traveladvisor_var_day_array[$a]))
                                                $traveladvisor_var_day_array[$a] = '';
                                            if (!isset($traveladvisor_var_place_array[$a]))
                                                $traveladvisor_var_place_array[$a] = '';
                                            if (!isset($traveladvisor_var_duration_array[$a]))
                                                $traveladvisor_var_duration_array[$a] = '';
                                            ?>
                                            <li > <span><?php echo esc_html($traveladvisor_var_day_array[$a]); ?></span> <span id="<?php echo "address" . $a; ?>"><?php echo esc_html($traveladvisor_var_place_array[$a]); ?></span> <span><?php echo esc_html($traveladvisor_var_duration_array[$a]); ?></span> </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="related-tours" class="page-section" style="margin:0 0 80px 0;" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-section-title">
                            <h3><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_you_may_also_check'); ?></h3>
                            <p><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_you_may_also_check_desc'); ?></p>
                        </div>
                    </div>
                    <?php
                    $traveladvisor_var_categories = traveladvisor_var_cat_list(get_the_id());
                    $counter = 1;
                    $traveladvisor_var_cat_id = array();
                    if ($traveladvisor_var_categories != '' && is_array($traveladvisor_var_categories)) {
                        foreach ($traveladvisor_var_categories as $key => $value) {
                            $traveladvisor_var_cat_id[] = get_cat_ID($key);
                            echo '<span>' . esc_html($key) . '</span>';
                            if (count($traveladvisor_var_categories) > 1 && $counter < count($traveladvisor_var_categories)) {
                                echo ',';
                            }
                            $counter ++;
                        }
                    }
                    ?>
                    <?php
                    $traveladvisor_var_related_post_array = array(
                        'posts_per_page' => 4,
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'post_type' => 'tours',
                        'meta_query' => array(
                            array(
                                'key' => 'traveladvisor_var_tour_destination',
                                'value' => $traveladvisor_var_tours_destination_related_posts
                            ))
                    );


                    $traveladvisor_var_related_posts = new WP_Query($traveladvisor_var_related_post_array);
                    while ($traveladvisor_var_related_posts->have_posts()): $traveladvisor_var_related_posts->the_post();

                        $traveladvisor_var_tours_discount_price = get_post_meta($post->ID, "traveladvisor_var_tours_discount_price", true);
                        $traveladvisor_var_tours_oldprice = get_post_meta($post->ID, "traveladvisor_var_tours_oldprice", true);
                        $traveladvisor_var_tours_newprice = get_post_meta($post->ID, "traveladvisor_var_tours_newprice", true);

                        $traveladvisor_metas_count = (isset($traveladvisor_metas) && !empty($traveladvisor_metas)) ? (count($traveladvisor_metas) - 1) : '';
                        for ($traveladvisor_a = 0; $traveladvisor_a <= $traveladvisor_metas_count; $traveladvisor_a ++) {
                            if (!isset($traveladvisor_metas[$traveladvisor_a]))
                                $traveladvisor_metas[$traveladvisor_a] = '';
                            $traveladvisor_meta_values[] = get_post_meta($id, "traveladvisor_var_$traveladvisor_metas[$traveladvisor_a]", true);
                        }

                        global $post;
                        ?>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                            <div class="cs-list grid">
                                <div class="cs-media"> 
                                    <?php
                                    if (!$traveladvisor_var_tours_discount_price == "") {
                                        ?>

                                        <span class="cs-off-price"><?php
                                            echo esc_html($traveladvisor_var_tours_discount_price);
                                            _e("%", "cs-traveladvisor")
                                            ?><em><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_off'); ?></em></span>
                                    <?php } ?>
                                    <?php if (has_post_thumbnail()) { ?>
                                        <figure><a href="<?php esc_url(the_permalink()); ?>"><?php the_post_thumbnail('traveladvisor_var_media_2'); ?></a></figure>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="cs-text">
                                    <div class="cs-heading-section">
                                        <div class="cs-post-title">
                                            <div class="cs-rating">
                                            </div>
                                            <h3><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h3>
                                            <ul>
                                                <li><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_duration'); ?> :<span class="cs-color"><?php echo esc_html($traveladvisor_var_tour_duration); ?></span></li>
                                            </ul>
                                        </div>
                                        <div class="cs-price-box"><strong><sup>$</sup><?php echo esc_html($traveladvisor_var_tours_newprice); ?><span class="cs-color"><sup>$</sup><?php echo esc_html($traveladvisor_var_tours_oldprice); ?></span></strong>
                                            <p><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_perperson'); ?></p>
                                        </div>
                                    </div>
                                    <ul class="cs-listing-option">
                                        <?php
                                        $traveladvisor_total_icons = isset($traveladvisor_icons) && !empty($traveladvisor_icons) ? count($traveladvisor_icons) - 1 : '';
                                        for ($traveladvisor_a = 0; $traveladvisor_a <= 3; $traveladvisor_a ++) {
                                            if (!isset($traveladvisor_icons[$traveladvisor_a]))
                                                $traveladvisor_icons[$traveladvisor_a] = '';
                                            if (!isset($traveladvisor_labels[$traveladvisor_a]))
                                                $traveladvisor_labels[$traveladvisor_a] = '';
                                            if (!isset($traveladvisor_meta_values[$traveladvisor_a]))
                                                $traveladvisor_meta_values[$traveladvisor_a] = '';
                                            ?>
                                            <li><a href="#" title="<?php echo esc_html($traveladvisor_labels[$traveladvisor_a]); ?>: <?php
                                                $traveladvisor_value = isset($traveladvisor_meta_values[$traveladvisor_a]) ? $traveladvisor_meta_values[$traveladvisor_a] : '';
                                                if (is_array($traveladvisor_value)) {
                                                    foreach ($traveladvisor_value as $val) {
                                                        echo esc_html($val);
                                                        echo esc_html(",");
                                                    }
                                                } else {
                                                    echo esc_html($traveladvisor_meta_values[$traveladvisor_a]);
                                                }
                                                ?>"><i class="<?php echo esc_html($traveladvisor_icons[$traveladvisor_a]); ?>"></i></a></li>
                                                <?php
                                            }
                                            ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                        $traveladvisor_meta_values = NULL;
                    endwhile;
                    wp_reset_postdata();
                    ?>

                </div>
            </div>
        </div>
    </div>
    <?php
    $traveladvisor_posttype = get_post_type($post->ID);
    if ($traveladvisor_posttype == "tours") {
        $traveladvisor_opt_array = array(
            'std' => $traveladvisor_posttype,
            'id' => '',
            'before' => '',
            'after' => '',
            'classes' => '',
            'extra_atr' => '',
            'cust_id' => 'traveladvisor_single_tour',
            'cust_name' => 'traveladvisor_single_tour[]',
            'required' => false
        );
        $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render($traveladvisor_opt_array);
    }
    ?>
    <!-- Main End --> 


    <?php if ($rightSidebarFlag) { ?>
        <div class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <?php
            if (is_active_sidebar(traveladvisor_get_sidebar_id($traveladvisor_sidebar_right))) {
                if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($traveladvisor_sidebar_right)) : endif;
            }
            ?>
        </div>
    <?php } ?>
    <!--    </div>-->
</div>


</div>
</div>
<?php
get_footer();

wp_reset_postdata();
?>
<?php
$google_api_key = '?libraries=places';
if (isset($traveladvisor_var_theme_options['traveladvisor_var_google_api_key']) && $traveladvisor_var_theme_options['traveladvisor_var_google_api_key'] != '') {
    $google_api_key = '?key=' . $traveladvisor_var_theme_options['traveladvisor_var_google_api_key'] . '&libraries=places';
}
?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js<?php echo $google_api_key; ?>&amp;callback=initMap&language=<?php echo $traveladvisor_var_theme_options['traveladvisor_var_lan_code']; ?>&region=<?php echo $traveladvisor_var_theme_options['traveladvisor_var_reg_code']; ?>"></script>