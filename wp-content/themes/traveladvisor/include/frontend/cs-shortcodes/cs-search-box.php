<?php
/*
 *
 * @Shortcode Name : Search Box
 * @retrun
 *
 */
if (!function_exists('traveladvisor_var_toursearch')) {

    function traveladvisor_var_toursearch($atts, $content = "") {
        global $header_map;
        $defaults = array(
            'traveladvisor_var_toursearch_text' => '',
        );
        extract(shortcode_atts($defaults, $atts));
        $column_class = '';
        if (isset($traveladvisor_var_column_size) && $traveladvisor_var_column_size != '') {
            if (function_exists('traveladvisor_var_custom_column_class')) {
                $column_class = traveladvisor_var_custom_column_class($traveladvisor_var_column_size);
            }
        }
        $traveladvisor_var_column = isset($traveladvisor_var_column) ? $traveladvisor_var_column : '';
        $toursearch_type_class = '';
        if (isset($traveladvisor_var_toursearch_type) && $traveladvisor_var_toursearch_type == 'rounded') {
            $toursearch_type_class = "round-btn";
        } else {
            $toursearch_type_class = "";
        }
        $toursearch_type_threed = '';
        if (isset($traveladvisor_var_toursearch_threed) && $traveladvisor_var_toursearch_threed == 'yes') {
            $toursearch_type_threed = "fancy-btn";
        } else {
            $toursearch_type_threed = "";
        }
        $traveladvisor_var_toursearch = '';
        if (is_page() && !is_home()) {
            global $post, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
            $traveladvisor_id = $post->ID;
            $traveladvisor_arguments = array('post_type' => 'destination');
            $traveladvisor_var_destinations_list = new WP_Query($traveladvisor_arguments);
            $traveladvisor_destinations_list =  array();
            while ($traveladvisor_var_destinations_list->have_posts()): $traveladvisor_var_destinations_list->the_post();
                $traveladvisor_destinations_list[] = get_the_title();
            endwhile;
            wp_reset_postdata();
            $post->ID = $traveladvisor_id;
            $traveladvisor_destination_options = array_combine($traveladvisor_destinations_list, $traveladvisor_destinations_list);
            $unique_destination = array_values($traveladvisor_destination_options);
        }
        ?>
        <div class="cs-main-search">
            <div class="container">

                <form id="traveladvisor-advance-search-form" method="get" action="<?php echo get_site_url() . "/" . $traveladvisor_var_toursearch_text ?>" enctype="multipart/form-data">
                    <ul>
                        <li class="search-input"> <i class="icon-search2"></i>
                            <input type="text" placeholder="<?php _e('Enter any keyword', 'traveladvisor'); ?>" id="tour_search_string">
                        </li>
                        <li class="select-dropdown">
                            <div class="side-by-side clearfix"> <i class="icon-map-o"></i>
                                <select class="chosen-select" tabindex="5" id="tour_destination">
                                    <option><?php _e('Select Destination', 'traveladvisor'); ?></option>
                                    <?php
                                    $destination_list = '';
                                    foreach ($unique_destination as $key => $traveladvisor_destination_option) {
                                        $us_values_only_travel_style = ucwords(str_replace('-', ' ', $traveladvisor_destination_option));
                                        echo '<option value="' . strtolower($traveladvisor_destination_option) . '" >' . $us_values_only_travel_style . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </li>
                        <li class="select-dropdown">
                            <div class="cs-datepicker"> <i class="icon-calendar-minus-o"></i>
                                <label id="Deadline" class="cs-calendar-combo">
                                    <input type="text" placeholder="<?php _e('Select Dates', 'traveladvisor'); ?>"  id="tour_date" class="cs-datepicker">
                                </label>
                                <em class="icon-keyboard_arrow_down"></em> </div>
                        </li>
                        <li class="search-btn">
                            <input type="submit" class="cs-bgcolor" value="Search tour">
                        </li>
                    </ul>
                    <script>
                        jQuery(document).ready(function () {
                            jQuery('#tour_search_string').change(function () {
                                //jQuery('#selector').val = searchtext;
                                var searchtext = jQuery('#tour_search_string').val();
                                document.getElementById("search_title").value = searchtext;
                            });
                            jQuery('#tour_destination').change(function () {
                                //jQuery('#selector').val = searchtext;
                                var searchtext = jQuery('#tour_destination').val();
                                document.getElementById("destinations").value = searchtext;
                            });
                            jQuery('#tour_date').change(function () {
                                //jQuery('#selector').val = searchtext;
                                var searchtext = jQuery('#tour_date').val();
                                document.getElementById("tour_starting_date").value = searchtext;
                            });
        //                            function toursearchstring(searchtext) {
        //                                document.getElementById("search_title").value = searchtext;
        //                            }
        //                            function toursearchdestination(searchdestination) {
        //                                document.getElementById("destinations").value = searchdestination;
        //                            }
        //                            function toursearchdate(searchdate) {
        //                                document.getElementById("tour_starting_date").value = searchdate;
        //                            }
        //                            function toursearchtourtype(searchtourtype) {
        //                                document.getElementById("tour_search_tourtype").value = searchtourtype;
        //                            }
                        }
                        );
                    </script>
                    <input type="hidden" name="search_title" id="search_title" value="" />
                    <input type="hidden" name="destinations" id="destinations" value=""  />
                    <input type="hidden" name="tour_starting_date" id="tour_starting_date" value=""/>
                </form>
            </div>
        </div>
        <?php
        return $traveladvisor_var_toursearch;
    }

    if (function_exists('traveladvisor_var_short_code'))
        traveladvisor_var_short_code('traveladvisor_toursearch', 'traveladvisor_var_toursearch');
}
?>