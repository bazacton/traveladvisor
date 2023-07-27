<?php
/**
 * Jobs Listing search box
 *
 */
$var_array=array('wpdb', 'traveladvisor_plugin_options','traveladvisor_form_fields2','traveladvisor_var_static_text','selected_value');
$search_global_vars = TRAVELADVISOR_VAR_GLOBALS()->globalizing($var_array);
extract($search_global_vars);
            $strings = new traveladvisor_plugin_all_strings;
         $strings->traveladvisor_plugin_activation_strings();
?>

<aside class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
    <div class="cs-listing-filters">
        <div class="cs-search">
            <h6><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_search_tour_plan'); ?></h6>
            <form method="get" id="frm_title_search">
                <?php
                $final_query_str = str_replace("?", "", $qrystr);
                $final_query_str = traveladvisor_remove_qrystr_extra_var($final_query_str, 'location', 'no');
                $final_query_str = traveladvisor_remove_qrystr_extra_var($final_query_str, 'job_title', 'no');
                $final_query_str = traveladvisor_remove_qrystr_extra_var($final_query_str, 'radius', 'no');
                $final_query_str = str_replace("?", "", $final_query_str);
                $query = explode('&', $final_query_str);
                $popup_randid = rand(0, 499999999);
                foreach ($query as $param) {
                    if (!empty($param)) {
                        $param_array = explode('=', $param);
                        $name = isset($param_array[0]) ? $param_array[0] : '';
                        $value = isset($param_array[1]) ? $param_array[1] : '';
                        $new_str = $name . "=" . $value;
                        if (is_array($name)) {
                            foreach ($_query_str_single_value as $_query_str_single_value_arr) {
                                $traveladvisor_form_fields2->traveladvisor_form_hidden_render(
                                        array(
                                            'id' => $name,
                                            'cust_name' => $name . '[]',
                                            'std' => $value,
                                        )
                                );
                            }
                        } else {
                            $traveladvisor_form_fields2->traveladvisor_form_hidden_render(
                                    array(
                                        'id' => $name,
                                        'cust_name' => $name,
                                        'std' => $value,
                                    )
                            );
                        }
                    }
                }
                ?>
                <div class="cs-field">
                    <?php
                            $traveladvisor_all=traveladvisor_var_theme_text_srt('traveladvisor_var_tour_title_or_keywords');
                    $traveladvisor_form_fields2->traveladvisor_form_text_render(
                            array(
                                'id' => 'search_title',
                                'cust_name' => 'search_title',
                                'cust_type' => 'search',
                                'extra_atr' => ' placeholder="' .esc_html($traveladvisor_all) .'"',
                                'classes' => 'form-control txt-field side-location-field',
                                'std' => $traveladvisor_search_title,
                            )
                    );
                    ?>
                    <label class="cs-bgcolor">
                        <input name="name" type="submit" value="" />
                    </label>
                </div>
                </form>
        </div>
        <div class="cs-filter-title">
            <h5><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_available_filters'); ?></h5>
        </div>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne"> <a role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_destination'); ?></a> </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <form method="GET" id="frm_destinations_list" >
                            <?php
                            // parse query string and create hidden fileds
                            $final_query_str = str_replace("?", "", $qrystr);
                            $final_query_str = traveladvisor_remove_qrystr_extra_var($final_query_str, 'destinations', 'no');
                            $query = explode('&', $final_query_str);
                            foreach ($query as $param) {
                                if (!empty($param)) {
                                    $param_array = explode('=', $param);
                                    $name = isset($param_array[0]) ? $param_array[0] : '';
                                    $value = isset($param_array[1]) ? $param_array[1] : '';
                                    $new_str = $name . "=" . $value;
                                    if (is_array($name)) {
                                        foreach ($_query_str_single_value as $_query_str_single_value_arr) {
                                            $traveladvisor_form_fields2->traveladvisor_form_hidden_render(
                                                    array(
                                                        'id' => $name,
                                                        'cust_name' => $name . '[]',
                                                        'std' => $value,
                                                    )
                                            );
                                        }
                                    } else {
                                        $traveladvisor_form_fields2->traveladvisor_form_hidden_render(
                                                array(
                                                    'id' => $name,
                                                    'cust_name' => $name,
                                                    'std' => $value,
                                                )
                                        );
                                    }
                                }
                            }
                            ?>
                            <ul class="cs-checkbox-list">
                                <?php
                                // get all job types
                                $destinations_parent_id = 0;
                                $destination_show_count = 7;
                                $al_destinations = array();
                                $input_type_destination = 'radio';   // if first level then select only sigle destination
                                $destinations_args = array(
                                    'orderby' => 'name',
                                    'order' => 'ASC',
                                    'number' => $destination_show_count,
                                    'fields' => 'all',
                                    'slug' => '',
                                    'hide_empty' => false,
                                    'parent' => $destinations_parent_id,
                                );
                                $destinations_all_args = array(
                                    'orderby' => 'name',
                                    'order' => 'ASC',
                                    'fields' => 'all',
                                    'slug' => '',
                                    'hide_empty' => false,
                                    'parent' => $destinations_parent_id,
                                );
                                $all_destinations = get_terms('destinations', $destinations_args);
                                if (!$all_destinations) {
                                    $destinations_args = array(
                                        'orderby' => 'name',
                                        'order' => 'ASC',
                                        'number' => $destination_show_count,
                                        'fields' => 'all',
                                        'hide_empty' => false,
                                        'slug' => '',
                                        'parent' => $selected_spec->parent,
                                    );
                                    $destinations_all_args = array(
                                        'orderby' => 'name',
                                        'order' => 'ASC',
                                        'fields' => 'all',
                                        'hide_empty' => false,
                                        'slug' => '',
                                        'parent' => $selected_spec->parent,
                                    );
                                    if ($selected_spec->parent != 0) {
                                        $input_type_destination = 'checkbox';
                                    }
                                } else {
                                    if ($destinations_parent_id != 0) {    // if parent is not root means not main parent
                                        $input_type_destination = 'checkbox';   // if first level then select multiple destination
                                    }
                                }
                                if ($input_type_destination == 'checkbox') {
                                    $traveladvisor_form_fields2->traveladvisor_form_hidden_render(
                                            array(
                                                'cust_id' => 'destinations_string',
                                                'cust_name' => 'destinations_string',
                                                'std' => '',
                                            )
                                    );
                                }
                                if ($all_destinations != '') {
                                    $number_option = 1;
                                    $show_destination = 'yes';
                                    if ($input_type_destination == 'radio' && $destinations != '') {
                                        if (is_array($destinations) && is_array_empty($destinations)) {
                                            $show_destination = 'yes';
                                        } else {
                                            $show_destination = 'no';
                                        }
                                    } else {
                                        $show_destination = 'yes';
                                    }
                                    $traveladvisor_arguments = array('post_type' => 'destination',
                                        'posts_per_page' => 5,);
                                    $traveladvisor_var_destinations_list = new WP_Query($traveladvisor_arguments);
                                    while ($traveladvisor_var_destinations_list->have_posts()): $traveladvisor_var_destinations_list->the_post();
                                        $al_destinations[] = get_the_title();
                                    endwhile;
                                    wp_reset_postdata();
                                    if (is_array($al_destinations)) {
                                        foreach ($al_destinations as $destinationsitem) {
                                            $job_id_para = '';
                                            $destinations_mypost = '';
                                            if ($job_title != '') {
                                                $destinations_mypost = array('posts_per_page' => "-1", 'post_type' => 'tours', 'order' => "DESC", 'orderby' => 'post_date',
                                                    'post_status' => 'publish', 'ignore_sticky_posts' => 1,
                                                    'post__in' => $post_ids,
                                                    'meta_query' => array(
                                                        'relation' => 'AND',
                                                        array(
                                                            'key' => 'traveladvisor_var_tour_destination',
                                                            'compare' => 'LIKE',
                                                            'value' => $destinationsitem
                                                        ),
                                                    ),
                                                );
                                            } else {
                                                $destinations_mypost = array('posts_per_page' => "-1", 'post_type' => 'tours', 'order' => "DESC",
                                                    'post_status' => 'publish', 'ignore_sticky_posts' => 1,
                                                    'meta_query' => array(
                                                        'relation' => 'AND',
                                                        array(
                                                            'key' => 'traveladvisor_var_tour_destination',
                                                            'compare' => 'LIKE',
                                                            'value' => $destinationsitem
                                                        ),
                                                ));
                                            }
                                            $destinations_loop_count = new WP_Query($destinations_mypost);
                                            $destinations_count_post = $destinations_loop_count->post_count;
                                            if ($input_type_destination == 'checkbox') {
                                                if (isset($destinations) && is_array($destinations)) {
                                                    if (in_array($destinationsitem, $destinations)) {

                                                        echo '<li class="' . $input_type_destination . '">'
                                                        . '<div class="checkbox">';

                                                        $traveladvisor_form_fields2->traveladvisor_form_checkbox_render(
                                                                array(
                                                                    'simple' => true,
                                                                    'cust_id' => 'checklist' . $number_option,
                                                                    'cust_name' => '',
                                                                    'extra_atr' => ' onclick="traveladvisor_listing_content_load();" onchange="javascript:submit_destination_form(\'frm_destinations_list\', \'destinations_string\');" checked="checked"',
                                                                    'classes' => $input_type_destination,
                                                                    'std' => $destinationsitem,
                                                                )
                                                        );
                                                        echo '<label for="checklist' . $number_option . '">' . $destinationsitem . '</label> '
                                                        . '</div></li>';
                                                    } else {
                                                        echo '<li class="' . $input_type_destination . '">'
                                                        . '<div class="checkbox ">';

                                                        $traveladvisor_form_fields2->traveladvisor_form_checkbox_render(
                                                                array(
                                                                    'simple' => true,
                                                                    'cust_id' => 'checklist' . $number_option,
                                                                    'cust_name' => '',
                                                                    'extra_atr' => ' onclick="traveladvisor_listing_content_load();" onchange="submit_destination_form(\'frm_destinations_list\', \'destinations_string\');"',
                                                                    'classes' => $input_type_destination,
                                                                    'std' => $destinationsitem,
                                                                )
                                                        );

                                                        echo '<label for="checklist' . $number_option . '">' . $destinationsitem . '</label>'
                                                        . '</div></li>';
                                                    }
                                                } else {
                                                    echo '<li class="' . $input_type_destination . '">'
                                                    . '<div class="checkbox">';

                                                    $traveladvisor_form_fields2->traveladvisor_form_checkbox_render(
                                                            array(
                                                                'simple' => true,
                                                                'cust_id' => 'checklist' . $number_option,
                                                                'cust_name' => '',
                                                                'extra_atr' => ' onclick="traveladvisor_listing_content_load();" onchange="submit_destination_form(\'frm_destinations_list\', \'destinations_string\');"',
                                                                'classes' => $input_type_destination,
                                                                'std' => $destinationsitem,
                                                            )
                                                    );

                                                    echo '<label for="checklist' . $number_option . '">' . $destinationsitem . '</label>'
                                                    . '</div></li>';
                                                }
                                            } else
                                            if ($input_type_destination == 'radio') {


                                                if (isset($destinations) && is_array($destinations)) {
                                                    if (in_array($destinationsitem, $destinations)) {
                                                        echo '<li class="' . $input_type_destination . '">'
                                                        . '<div class="checkbox-radio">';
                                                        $traveladvisor_form_fields2->traveladvisor_form_radio_render(
                                                                array(
                                                                    'cust_id' => 'checklist' . $number_option,
                                                                    'cust_name' => ' name="destinations"',
                                                                    'extra_atr' => ' onclick="traveladvisor_listing_content_load();" onchange="javascript:frm_destinations_list.submit();" checked="checked"',
                                                                    'classes' => $input_type_destination,
                                                                    'std' => $destinationsitem,
                                                                )
                                                        );

                                                        echo '<label class="active" for="checklist' . $number_option . '">' . $destinationsitem . '</label> '
                                                        . '</div></li>';
                                                    } else {

                                                        echo '<li class="' . $input_type_destination . '">'
                                                        . '<div class="checkbox">';
                                                        $traveladvisor_form_fields2->traveladvisor_form_radio_render(
                                                                array(
                                                                    'cust_id' => 'checklist' . $number_option,
                                                                    'cust_name' => 'destinations',
                                                                    'extra_atr' => ' onclick="traveladvisor_listing_content_load();" onchange="javascript:frm_destinations_list.submit();"',
                                                                    'classes' => $input_type_destination,
                                                                    'std' => $destinationsitem,
                                                                )
                                                        );
                                                        echo '<label for="checklist' . $number_option . '">' . $destinationsitem . '</label>'
                                                        . '</div></li>';
                                                    }
                                                } else {

                                                    echo '<li class="' . $input_type_destination . '">'
                                                    . '<div class="checkbox">';

                                                    $traveladvisor_form_fields2->traveladvisor_form_radio_render(
                                                            array(
                                                                'cust_id' => 'checklist' . $number_option,
                                                                'cust_name' => 'destinations',
                                                                'extra_atr' => ' onclick="traveladvisor_listing_content_load();" onchange="javascript:frm_destinations_list.submit();"',
                                                                'classes' => $input_type_destination,
                                                                'std' => $destinationsitem,
                                                            )
                                                    );
                                                    echo '<label for="checklist' . $number_option . '">' . $destinationsitem . '</label>'
                                                    . '</div></li>';
                                                }
                                            }
                                            $number_option++;
                                        }
                                    }
                                }
                                ?>
                                    <li class="radio">
                                                    <div class="checkbox">
                                                        <input type="radio">
                                                        <label> <a data-target="#light" data-toggle="modal" href="#">  <?php _e('More', 'traveladvisor') ?></a></label>
                                                    </div>
                                                </li>
<?php ?>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
<?php
$traveladvisor_job_cus_fields = get_option("traveladvisor_job_cus_fields");
if (is_array($traveladvisor_job_cus_fields) && sizeof($traveladvisor_job_cus_fields) > 0) {

    $custom_field_flag = 11;
    foreach ($traveladvisor_job_cus_fields as $cus_fieldvar => $cus_field) {
        $all_item_empty = 0;
        if (isset($cus_field['options']['value']) && is_array($cus_field['options']['value'])) {
            foreach ($cus_field['options']['value'] as $cus_field_options_value) {
                if ($cus_field_options_value != '') {
                    $all_item_empty = 0;
                    break;
                } else {
                    $all_item_empty = 1;
                }
            }
        }
        if (isset($cus_field['enable_srch']) && $cus_field['enable_srch'] == 'yes' && ($all_item_empty == 0)) {
            $query_str_var_name = $cus_field['meta_key'];
            $collapse_condition = 'no';
            if (isset($cus_field['collapse_search'])) {
                $collapse_condition = $cus_field['collapse_search'];
            }
            $count_filtration = $cus_fields_count_arr;
            $filter_new_arr = '';
            if (isset($count_filtration[$query_str_var_name])) {
                unset($count_filtration[$query_str_var_name]);
                $filter_temp_arr = $count_filtration;

                foreach ($filter_temp_arr as $var => $value) {
                    $filter_new_arr[] = $value;
                }
            } else {
                if (isset($count_filtration) && $count_filtration != '') {
                    foreach ($count_filtration as $var => $value) {
                        $filter_new_arr[] = $value;
                    }
                }
            }
            $filter_new_arr = isset($filter_new_arr) && !empty($filter_new_arr) ? call_user_func_array('array_merge', $filter_new_arr) : '';
            $meta_post_ids_cus_fields_arr = '';
            $meta_post_job_title_id_condition = '';
            if (!empty($filter_new_arr)) {
                $meta_post_ids_cus_fields_arr = traveladvisor_get_query_whereclase_by_array($filter_new_arr);
                if (empty($meta_post_ids_cus_fields_arr)) {
                    $meta_post_ids_cus_fields_arr = array(0);
                }
                $ids = $meta_post_ids_cus_fields_arr != '' ? implode(",", $meta_post_ids_cus_fields_arr) : '0';
                $meta_post_job_title_id_condition = " ID in (" . $ids . ") AND ";
            }
            ?>
                            <div class="panel-heading" role="tab" id="heading<?php echo esc_html($custom_field_flag); ?>"> 
                                <a class="<?php
                            if ($collapse_condition == 'yes') {
                                echo 'collapsed';
                            }
                            ?>" role="button" data-toggle="collapse" href="#collapse<?php echo esc_html($custom_field_flag); ?>" aria-expanded="false" aria-controls="collapse<?php echo esc_html($custom_field_flag); ?>">  <?php echo esc_html($cus_field['label']); ?></a>
                            </div>
                            <div id="collapse<?php echo esc_html($custom_field_flag); ?>" class="panel-collapse collapse
                                <?php
                                if ($collapse_condition != 'yes') {
                                    echo 'in';
                                }
                                ?>
                                 " role="tabpanel" aria-labelledby="heading<?php echo esc_html($custom_field_flag); ?>">
                                <div class="panel-body">
                                    <div class="accordion-inner">
                            <?php
                            if ($cus_field['type'] == 'dropdown') {
                                $_query_string_arr = getMultipleParameters();
                                $traveladvisor_form_value = str_replace(" ", "_", str_replace("-", "_", $query_str_var_name));
                                ?>
                                            <form action="#" method="get" name="frm_<?php echo str_replace(" ", "_", str_replace("-", "_", $query_str_var_name)); ?>" id="frm_<?php echo esc_html($traveladvisor_form_value); ?>">
                                                <ul class="cs-checkbox-list">
                                            <?php
                                            $final_query_str = traveladvisor_remove_qrystr_extra_var($qrystr, $query_str_var_name);
                                            $final_query_str = str_replace("?", "", $final_query_str);
                                            $query = explode('&', $final_query_str);
                                            foreach ($query as $param) {
                                                if (!empty($param)) {
                                                    $param_array = explode('=', $param);
                                                    $name = isset($param_array[0]) ? $param_array[0] : '';
                                                    $value = isset($param_array[1]) ? $param_array[1] : '';
                                                    $new_str = $name . "=" . $value;
                                                    if (is_array($name)) {

                                                        foreach ($_query_str_single_value as $_query_str_single_value_arr) {
                                                            echo '<li>';
                                                            $traveladvisor_form_fields2->traveladvisor_form_hidden_render(
                                                                    array(
                                                                        'id' => $name,
                                                                        'cust_name' => $name . '[]',
                                                                        'std' => $value,
                                                                    )
                                                            );
                                                            echo '</li>';
                                                        }
                                                    } else {
                                                        echo '<li>';
                                                        $traveladvisor_form_fields2->traveladvisor_form_hidden_render(
                                                                array(
                                                                    'id' => $name,
                                                                    'cust_name' => $name,
                                                                    'std' => $value,
                                                                )
                                                        );
                                                        echo '</li>';
                                                    }
                                                }
                                            }
                                            $cut_field_flag = 0;
                                            $number_option_flag = 1;
                                            foreach ($cus_field['options']['value'] as $cus_field_options_value) {
                                                $traveladvisor_number_count = 1;
                                                if ($cus_field['options']['value'][$cut_field_flag] == '' || $cus_field['options']['label'][$cut_field_flag] == '') {
                                                    $cut_field_flag++;
                                                    continue;
                                                }
                                                if ($cus_field_options_value != '') {
                                                    if ($cus_field['multi'] == 'yes') {
                                                        $dropdown_arr = '';
                                                        if ($cus_field['post_multi'] == 'yes') {
                                                            $cus_field_options_value = str_replace('-', ' ', $cus_field_options_value);
                                                            $dropdown_arr = array(
                                                                'key' => "traveladvisor_var_$query_str_var_name",
                                                                'value' => serialize($cus_field_options_value),
                                                                'compare' => 'Like',
                                                            );
                                                        } else {
                                                            $cus_field_options_value = str_replace('-', ' ', $cus_field_options_value);
                                                            $dropdown_arr = array(
                                                                'key' => "traveladvisor_var_$query_str_var_name",
                                                                'value' => $cus_field_options_value,
                                                                'compare' => 'LIKE',
                                                            );
                                                        }
                                                        $cus_field_mypost = '';
                                                        $cus_field_mypost = array('posts_per_page' => "-1", 'post_type' => 'tours', 'order' => "DESC",
                                                            'post_status' => 'publish', 'ignore_sticky_posts' => 1,
                                                            'meta_query' => array(
                                                                $dropdown_arr,
                                                            )
                                                        );
                                                        $cus_field_loop_count = new WP_Query($cus_field_mypost);
                                                        $cus_field_count_post = $cus_field_loop_count->post_count;
                                                        $traveladvisor_checked_values_array = isset($_query_string_arr[$query_str_var_name]) ? $_query_string_arr[$query_str_var_name] : '';
                                                        $traveladvisor_checked_values_array = str_replace('+', ' ', $traveladvisor_checked_values_array);
                                                        if (isset($traveladvisor_checked_values_array) && isset($cus_field_options_value) && is_array($traveladvisor_checked_values_array) && in_array($cus_field_options_value, $traveladvisor_checked_values_array)) {
                                                            echo '<li>';
                                                            echo "<div class='checkbox'>";
                                                            $traveladvisor_form_fields2->traveladvisor_form_checkbox_render(
                                                                    array(
                                                                        'simple' => true,
                                                                        'cust_id' => $query_str_var_name . '_' . $number_option_flag,
                                                                        'cust_name' => $query_str_var_name,
                                                                        'extra_atr' => ' onclick="traveladvisor_listing_content_load();" onchange="javascript:frm_' . str_replace(" ", "_", str_replace("-", "_", $query_str_var_name)) . '.submit();" checked="checked"',
                                                                        'std' => $cus_field_options_value,
                                                                    )
                                                            );
                                                            echo '<label class="cs-color" for="' . $query_str_var_name . '_' . $number_option_flag . '">' . $cus_field['options']['label'][$cut_field_flag]
                                                            . '</label></div></li>';
                                                        } else {

                                                            echo '<li >';
                                                            echo "<div class='checkbox'>";
                                                            $traveladvisor_checked = "checked";
                                                            $traveladvisor_form_fields2->traveladvisor_form_checkbox_render(
                                                                    array(
                                                                        'simple' => true,
                                                                        'cust_id' => $query_str_var_name . '_' . $number_option_flag,
                                                                        'cust_name' => $query_str_var_name,
                                                                        'extra_atr' => ' onclick="traveladvisor_listing_content_load();"   onchange="javascript:frm_' . str_replace(" ", "_", str_replace("-", "_", $query_str_var_name)) . '.submit();"  ',
                                                                        'std' => $cus_field_options_value,
                                                                    )
                                                            );
                                                            echo '<label class="cs-color" for="' . $query_str_var_name . '_' . $number_option_flag . '">' . $cus_field['options']['label'][$cut_field_flag] . ''
                                                            . '</label></div></li>';
                                                        }
                                                    } else {
                                                        //get count for this itration
                                                        $dropdown_arr = '';
                                                        if ($cus_field['post_multi'] == 'yes') {
                                                            $cus_field_options_value = str_replace('-', ' ', $cus_field_options_value);
                                                            $dropdown_arr = array(
                                                                'key' => "traveladvisor_var_$query_str_var_name",
                                                                'value' => serialize($cus_field_options_value),
                                                                'compare' => 'Like',
                                                            );
                                                        } else {
                                                            $cus_field_options_value = str_replace('-', ' ', $cus_field_options_value);
                                                            $dropdown_arr = array(
                                                                'key' => "traveladvisor_var_$query_str_var_name",
                                                                'value' => $cus_field_options_value,
                                                                'compare' => 'LIKE',
                                                            );
                                                        }
                                                        $cus_field_mypost = '';
                                                        $cus_field_mypost = array('posts_per_page' => "-1", 'post_type' => 'tours', 'order' => "DESC", 'orderby' => 'post_date',
                                                            'post_status' => 'publish', 'ignore_sticky_posts' => 1,
                                                            'meta_query' => array(
                                                                $dropdown_arr,
                                                            )
                                                        );
                                                        $cus_field_mypost = array('posts_per_page' => "-1", 'post_type' => 'tours', 'order' => "DESC", 'orderby' => 'post_date',
                                                            'post_status' => 'publish', 'ignore_sticky_posts' => 1,
                                                            'meta_query' => array(
                                                                $dropdown_arr,
                                                            )
                                                        );
                                                        $cus_field_loop_count = new WP_Query($cus_field_mypost);
                                                        $cus_field_count_post = $cus_field_loop_count->post_count;
                                                        $amp_sign = '';
                                                        if (traveladvisor_remove_qrystr_extra_var($qrystr, $query_str_var_name) != '?')
                                                            $amp_sign = '&';
                                                        $traveladvisor_checked = "";
                                                        $traveladvisor_value = isset($_GET[$query_str_var_name]) ? $_GET[$query_str_var_name] : '';
                                                        if ($traveladvisor_value == $cus_field['options']['label'][$cut_field_flag]) {
                                                            $traveladvisor_checked = "checked";
                                                        }
                                                        echo '<li class="' . $number_option_flag . '">'
                                                        . '<div class="checkbox-radio">';
                                                        $traveladvisor_form_fields2->traveladvisor_form_radio_render(
                                                                array(
                                                                    'cust_id' => $query_str_var_name . $number_option_flag,
                                                                    'cust_name' => $query_str_var_name,
                                                                    'extra_atr' => " $traveladvisor_checked onclick='traveladvisor_listing_content_load();' onchange='javascript:frm_$traveladvisor_form_value.submit();'",
                                                                    'classes' => $input_type_destination,
                                                                    'std' => $cus_field['options']['label'][$cut_field_flag],
                                                                )
                                                        );
                                                        echo '<label for="' . $query_str_var_name . $number_option_flag . '">' . $cus_field['options']['label'][$cut_field_flag] . '</label>'
                                                        . '</div></li>';

                                                        $traveladvisor_checked = "";
                                                        $traveladvisor_value = "";
                                                    }
                                                }
                                                $number_option_flag++;
                                                $cut_field_flag++;
                                            }
                                            ?>
                                                </ul>
                                            </form>
                                                    <?php
                                                } else if ($cus_field['type'] == 'text' || $cus_field['type'] == 'email' || $cus_field['type'] == 'url') {
                                                    ?>
                                            <form action="#" method="get" name="frm_<?php echo esc_html($query_str_var_name); ?>">
                                                    <?php
                                                    $final_query_str = traveladvisor_remove_qrystr_extra_var($qrystr, $query_str_var_name);
                                                    $final_query_str = str_replace("?", "", $final_query_str);
                                                    parse_str($final_query_str, $_query_str_arr);
                                                    foreach ($_query_str_arr as $_query_str_single_var => $_query_str_single_value) {
                                                        if (is_array($_query_str_single_value)) {
                                                            foreach ($_query_str_single_value as $_query_str_single_value_arr) {
                                                                $traveladvisor_form_fields2->traveladvisor_form_hidden_render(
                                                                        array(
                                                                            'id' => $_query_str_single_var,
                                                                            'cust_name' => $_query_str_single_var . '[]',
                                                                            'std' => $_query_str_single_value_arr,
                                                                        )
                                                                );
                                                            }
                                                        } else {
                                                            $traveladvisor_form_fields2->traveladvisor_form_hidden_render(
                                                                    array(
                                                                        'id' => $_query_str_single_var,
                                                                        'cust_name' => $_query_str_single_var,
                                                                        'std' => $_query_str_single_value,
                                                                    )
                                                            );
                                                        }
                                                    }
                                                    $traveladvisor_form_fields2->traveladvisor_form_text_render(
                                                            array(
                                                                'id' => $query_str_var_name,
                                                                'cust_name' => $query_str_var_name,
                                                                'classes' => 'form-control',
                                                                'extra_atr' => ' onclick="traveladvisor_listing_content_load();" onchange="javascript: ' . esc_html($query_str_var_name) . '.submit();"',
                                                                'std' => isset($_GET[$query_str_var_name]) ? $_GET[$query_str_var_name] : '',
                                                            )
                                                    );
                                                    ?>
                                            </form>
                                                <?php
                                            } else if ($cus_field['type'] == 'date') {

                                                $cus_field_date_formate_arr = explode(" ", $cus_field['date_format']);
                                                ?>
                                            <script>
                                                jQuery(function () {
                                                    jQuery("#traveladvisor_<?php echo esc_html($query_str_var_name); ?>").datetimepicker({
                                                        format: "<?php echo esc_html($cus_field_date_formate_arr[0]); ?>",
                                                        timepicker: false
                                                    });
                                                });
                                            </script>
                                            <form action="#" method="get" name="frm_<?php echo esc_html($query_str_var_name); ?>">
                                            <?php
                                            // parse query string and create hidden fileds
                                            $final_query_str = traveladvisor_remove_qrystr_extra_var($qrystr, $query_str_var_name);
                                            $final_query_str = str_replace("?", "", $final_query_str);
                                            parse_str($final_query_str, $_query_str_arr);
                                            foreach ($_query_str_arr as $_query_str_single_var => $_query_str_single_value) {
                                                if (is_array($_query_str_single_value)) {
                                                    foreach ($_query_str_single_value as $_query_str_single_value_arr) {
                                                        $traveladvisor_form_fields2->traveladvisor_form_hidden_render(
                                                                array(
                                                                    'id' => $_query_str_single_var,
                                                                    'cust_name' => $_query_str_single_var . '[]',
                                                                    'std' => $_query_str_single_value_arr,
                                                                )
                                                        );
                                                    }
                                                } else {
                                                    $traveladvisor_form_fields2->traveladvisor_form_hidden_render(
                                                            array(
                                                                'id' => $_query_str_single_var,
                                                                'cust_name' => $_query_str_single_var,
                                                                'std' => $_query_str_single_value,
                                                            )
                                                    );
                                                }
                                            }

                                            $traveladvisor_form_fields2->traveladvisor_form_text_render(
                                                    array(
                                                        'id' => $query_str_var_name,
                                                        'cust_name' => $query_str_var_name,
                                                        'classes' => 'form-control',
                                                        'extra_atr' => ' onclick="traveladvisor_listing_content_load();" onchange="javascript: frm_' . esc_html($query_str_var_name) . '.submit();"',
                                                        'std' => isset($_GET[$query_str_var_name]) ? $_GET[$query_str_var_name] : '',
                                                    )
                                            );
                                            ?>
                                            </form>
                                                <?php
                                            } elseif ($cus_field['type'] == 'range') {

                                                $range_min = $cus_field['min'];
                                                $range_max = $cus_field['max'];
                                                $range_increment = $cus_field['increment'];
                                                $filed_type = $cus_field['srch_style']; //input, slider, input_slider
                                                if (strpos($filed_type, '-') !== FALSE) {
                                                    $filed_type_arr = explode("_", $filed_type);
                                                } else {
                                                    $filed_type_arr[0] = $filed_type;
                                                }
                                                $range_flag = 0;
                                                while (count($filed_type_arr) > $range_flag) {
                                                    if ($filed_type_arr[$range_flag] == 'input') { // if input style
                                                        echo '<ul class="price-list">';
                                                        while ($range_min < $range_max) {
                                                            $cus_field_mypost = '';
                                                            $cus_field_mypost = array('posts_per_page' => "-1", 'post_type' => 'tours', 'order' => "DESC", 'orderby' => 'post_date',
                                                                'post__in' => $meta_post_ids_cus_fields_arr,
                                                                'post_status' => 'publish', 'ignore_sticky_posts' => 1,
                                                                'meta_query' => array(
                                                                    array(
                                                                        'key' => "traveladvisor_var_$query_str_var_name",
                                                                        'value' => $range_min,
                                                                        'compare' => '>=',
                                                                    ),
                                                                    array(
                                                                        'key' => "traveladvisor_var_$query_str_var_name",
                                                                        'value' => $range_min + $range_increment,
                                                                        'compare' => '<=',
                                                                    ),
                                                                )
                                                            );
                                                            $cus_field_loop_count = new WP_Query($cus_field_mypost);
                                                            $cus_field_count_post = $cus_field_loop_count->post_count;
                                                       $class='';
                                                               if (isset($_GET[$query_str_var_name]) && $_GET[$query_str_var_name] == ($range_min . "-" . ($range_min + $range_increment))) {
                                                            $class= 'class=active';
                                                        }
                                                            ?>
                                                        <li <?php echo esc_html($class)?>>
                                                            <a onclick="traveladvisor_listing_content_load();" <?php
                                                     
                                                        ?>href="<?php
                                                        if (isset($_GET[$query_str_var_name]) && $_GET[$query_str_var_name] == ($range_min . "-" . ($range_min + $range_increment))) {
                                                            echo traveladvisor_remove_qrystr_extra_var($qrystr, $query_str_var_name);
                                                        } else {
                                                            echo traveladvisor_remove_qrystr_extra_var($qrystr, $query_str_var_name) . "&" . $query_str_var_name . '=' . $range_min . "-" . ($range_min + $range_increment);
                                                        }
                                                        ?>"><?php
                            echo esc_attr($range_min);
                            echo " - ";
                            $range_min = $range_min + $range_increment;
                            echo esc_attr($range_min);
                                                               if (isset($_GET[$query_str_var_name]) && $_GET[$query_str_var_name] == ($range_min . "-" . ($range_min + $range_increment))) {
                                                                   echo '';
                                                               }
                                                               ?></a>
                                                        </li><?php
                                                               }
                                                               echo '</ul>';
                                                           } elseif ($filed_type_arr[$range_flag] == 'slider') { // if slider style
                                                               ?>
                                                    <form action="#" method="get" name="frm_<?php echo esc_html($query_str_var_name); ?>" id="frm_<?php echo esc_html($query_str_var_name); ?>">
                                                            <?php
//                                                            echo $qrystr;
                                                            $final_query_str = traveladvisor_remove_qrystr_extra_var($qrystr, $query_str_var_name);
                                                            $final_query_str = str_replace("?", "", $final_query_str);
                                                            parse_str($final_query_str, $_query_str_arr);
                                                            foreach ($_query_str_arr as $_query_str_single_var => $_query_str_single_value) {
                                                                if (is_array($_query_str_single_value)) {

                                                                    foreach ($_query_str_single_value as $_query_str_single_value_arr) {
                                                                        $traveladvisor_form_fields2->traveladvisor_form_hidden_render(
                                                                                array(
                                                                                    'name' => '',
                                                                                    'id' => $_query_str_single_var . '[]',
                                                                                    'classes' => '',
                                                                                    'std' => $_query_str_single_value_arr,
                                                                                    'description' => '',
                                                                                    'hint' => ''
                                                                                )
                                                                        );
                                                                    }
                                                                } else {
//                                                                    echo $_query_str_single_value;
                                                                    $traveladvisor_form_fields2->traveladvisor_form_hidden_render(
                                                                            array(
                                                                                'name' => '',
                                                                                'id' => $_query_str_single_var,
                                                                                'classes' => '',
                                                                                'std' => $_query_str_single_value,
                                                                                'description' => '',
                                                                                'hint' => ''
                                                                            )
                                                                    );
                                                                }
                                                            }
                                                            $range_complete_str_first = "";
                                                            $range_complete_str_second = "";
                                                            if (isset($_GET[$query_str_var_name])) {
                                                                $range_complete_str = $_GET[$query_str_var_name];
                                                                $range_complete_str_arr = explode(",", $range_complete_str);
                                                                $range_complete_str_first = isset($range_complete_str_arr[0]) ? $range_complete_str_arr[0] : '';
                                                                $range_complete_str_second = isset($range_complete_str_arr[1]) ? $range_complete_str_arr[1] : '';
                                                            } else {
                                                                $range_complete_str = '';
                                                                if (isset($_GET[$query_str_var_name]))
                                                                    $range_complete_str = $_GET[$query_str_var_name];
                                                                $range_complete_str_first = $cus_field['min'];
                                                                $range_complete_str_second = $cus_field['max'];
                                                            }
                                                            echo '<div class="cs-selector-range">
                                                                <input onchange="range_form_submit' . $cus_fieldvar . '();" name="' . $query_str_var_name . '" id="slider-range' . esc_html($query_str_var_name) . '" type="text" class="span2" value="" data-slider-min="' . $cus_field['min'] . '" data-slider-max="' . $cus_field['max'] . '" data-slider-step="5" data-slider-value="[' . $range_complete_str_first . ',' . $range_complete_str_second . ']" />
                                                                       <div class="selector-value">
                                                                        <span>' . $cus_field['min'] . '</span>
                                                                        <span class="pull-right">' . $cus_field['max'] . '</span>
                                                                       </div>
                                                               </div>';
                                                            ?>
                                                    </form>
                                                        <?php
                                                        echo '<script>
                                                    function range_form_submit' . $cus_fieldvar . '(){
                                                        jQuery("#frm_' . esc_html($query_str_var_name) . '").submit();
                                                    }
                                                    jQuery(document).ready(function(){
                                                            jQuery("#slider-range' . esc_html($query_str_var_name) . '").slider({
                                                                stop: function(event, ui) {
                                                                    traveladvisor_listing_content_load();
                                                                    jQuery("#frm_' . esc_html($query_str_var_name) . '").submit();
                                                                }
                                                        });
                                                    });
                                                    </script>';
                                                    }
                                                    $range_flag++;
                                                }
                                            }
                                            ?>
                                    </div>
                                </div>
                            </div><?php
                                    }
                                    $custom_field_flag++;
                                }
                                ?>
                                <?php
                            }
                            ?>
            </div>
        </div>
    </div>

</aside>