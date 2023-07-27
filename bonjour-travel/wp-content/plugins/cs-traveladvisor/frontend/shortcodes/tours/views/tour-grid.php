<?php
$traveladvisor_var_tour_grid = array(
    'wpdb',
    'a',
    'wp_traveladvisor',
    'traveladvisor_var_tour_item_per_page',
    'traveladvisor_custom_fields_array',
    'wp_traveladvisor',
    'traveladvisor_var_wp_traveladvisor_core',
    'traveladvisor_var_tour_elements',
    'post',
    'traveladvisor_var_form_fields',
    'traveladvisor_var_html_fields',
    's_title_search',
    'traveladvisor_inventories_counter',
    'traveladvisor_var_tour_filteration'
);
$traveladvisor_var_tour_grid_return = TRAVELADVISOR_VAR_GLOBALS()->globalizing($traveladvisor_var_tour_grid);
extract($traveladvisor_var_tour_grid_return);
$traveladvisor_search_side = 'off';
$inventory_ajax_view = get_transient("traveladvisor_inventory_view_$traveladvisor_inventories_counter");
if (isset($inventory_ajax_view) && $inventory_ajax_view != '') {
    $a['traveladvisor_inventory_view'] = $inventory_ajax_view;
    if ($a['traveladvisor_inventory_view'] == 'classic') {
        $inv_class = "classic";
        $col_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
    } else {
        $inv_class = "grid";
        if ($a['traveladvisor_var_tour_filteration'] == 'yes') {
            $col_class = 'page-content col-lg-4 col-md-4 col-sm-6 col-xs-12';
        } else {
            $col_class = 'page-content col-lg-3 col-md-3 col-sm-6 col-xs-12';
        }
    }
} else {
    $inv_class = "grid";
    if ($a['traveladvisor_var_tour_filteration'] == 'yes') {
        $col_class = 'page-content col-lg-4 col-md-4 col-sm-6 col-xs-12';
    } else {
        $col_class = 'page-content col-lg-3 col-md-3 col-sm-6 col-xs-12';
    }
}

if ($a['traveladvisor_var_searchbox'] == 'yes') {
    $traveladvisor_search_side = 'on';
}

$traveladvisor_var_rand = $traveladvisor_var_tour_elements['traveladvisor_var_rand'];
$traveladvisor_var_tour_excerpt = $traveladvisor_var_tour_elements['traveladvisor_var_tour_excerpt'];
$traveladvisor_var_tour_excerpt_length = $traveladvisor_var_tour_elements['traveladvisor_var_tour_excerpt_length'];
$traveladvisor_order = isset($_GET['order']) ? $_GET['order'] : '';
$traveladvisor_starting_date = isset($_GET['tour_starting_date']) ? $_GET['tour_starting_date'] : '';
$traveladvisor_title = isset($a['traveladvisor_var_tour_element_title']) ? $a['traveladvisor_var_tour_element_title'] : '';

if ($a['traveladvisor_var_tour_filteration'] == 'yes') {

    echo "<div class='page-content col-lg-9 col-md-12 col-sm-12 col-xs-12'>";
} else {
    echo "<div class='page-content col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
}
?>

<div class="row">

    <?php
    if ($traveladvisor_title != "") {
        ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="cs-section-title">
                <?php
                if ($traveladvisor_title != "") {
                    ?>
                    <h2><?php echo esc_html($traveladvisor_title); ?></h2>
                    <?php
                }
                ?>

            </div>
        </div>
        <?php
    }
    ?>

    <?php
    if ($a['traveladvisor_var_tour_sorting'] == 'on') {
        ?>
        <div class="col-lg-12">
            <div class="cs-list-short"> <strong><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_sort_by'); ?></strong>
                <ul class="cs-listing-short-by">
                    <li <?php
                    if ($traveladvisor_order == "") {
                        echo 'class="active" ';
                    }
                    ?>><span><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_relevance'); ?></span><a href="<?php echo site_url('tour-listing'); ?>"></a> 
                    </li>         
                    <?php
                    $query_str_var_name = isset($query_str_var_name) ? $query_str_var_name : '';
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
                    ?>
                    <li <?php
                    if ($traveladvisor_order == "alphabets") {
                        echo 'class="active" ';
                    }
                    ?>><a href="?order=alphabets&<?php echo esc_html($final_query_str); ?>"><span ><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_alphabets'); ?></span>  <?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_atoz'); ?></a></li>
                    <li <?php
                    if ($traveladvisor_order == "price-descending") {
                        echo 'class="active" ';
                    }
                    ?>><a href="?order=price-descending&<?php echo esc_html($final_query_str); ?>"><span ><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_price'); ?></span>  <?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_hightolow'); ?></a></li>
                    <li <?php
                    if ($traveladvisor_order == "price-ascending") {
                        echo 'class="active" ';
                    }
                    ?>><a href="?order=price-ascending&<?php echo esc_html($final_query_str); ?>"><span ><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_price'); ?></span>  <?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_lowtohight'); ?></a></li>
                    <li <?php
                    if ($traveladvisor_order == "date-descending") {
                        echo 'class="active" ';
                    }
                    ?>><a href="?order=date-descending&<?php echo esc_html($final_query_str); ?>"><span ><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_date'); ?></span>  <?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_newtoold'); ?></a></li>
                    <li <?php
                    if ($traveladvisor_order == "date-ascending") {
                        echo 'class="active" ';
                    }
                    ?>><a href="?order=date-ascending&<?php echo esc_html($final_query_str); ?>"><span ><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_date'); ?></span>  <?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_oldtonew'); ?></a></li>


                </ul>
            <?php } ?>


            <?php if (isset($traveladvisor_var_tour_filteration) && $traveladvisor_var_tour_filteration == 'yes') {
                ?>

                <ul>   
                    <?php
                    if ($inv_class == "grid") {
                        $active_view = ( isset($a['traveladvisor_var_tour_view']) && $a['traveladvisor_var_tour_view'] == 'tour_grid' ) ? 'active' : '';
                    } else {
                        $active_view = '';
                    }
                    ?>
                    <li><a class="cs-inv-grid-view <?php echo $active_view; ?>" data-search="<?php echo esc_html($traveladvisor_search_side) ?>"><i class="icon-view_module"></i></a></li>
                    <?php
                    if ($inv_class == "grid") {
                        $active_view = ( isset($a['traveladvisor_var_tour_view']) && $a['traveladvisor_var_tour_view'] == 'tour_listing' ) ? 'active' : '';
                    } else {
                        if (isset($inventory_ajax_view) && $inventory_ajax_view != '') {
                            $active_view = 'active';
                        }
                    }
                    ?>
                    <li><a class="cs-inv-classic-view <?php echo $active_view; ?>" data-search="<?php echo esc_html($traveladvisor_search_side) ?>"><i class="icon-view_array"></i></a></li>
                </ul>
            <?php } ?>

            <div class="main-ajax-loader" style="display: none;"></div>


        </div>
    </div>
    <?php
    $traveladvisor_order = isset($_GET['order']) ? $_GET['order'] : '';
    $traveladvisor_var_theme_options = get_option('traveladvisor_var_options');
    $traveladvisor_dropdown = 0;
    $traveladvisor_labels = array();
    $traveladvisor_icons = array();
    $traveladvisor_metas = array();
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
                $traveladvisor_icons = isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_textarea_num]) ? $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_textarea_num] : array();
                $traveladvisor_labels = isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_textarea_num]) ? $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_textarea_num] : array();
                $traveladvisor_metas = isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_textarea_num]) ? $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_textarea_num] : array();
                $traveladvisor_textarea_num ++;
                break;
            case "date":
                $traveladvisor_icons = isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_date_num]) ? $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_date_num] : array();
                $traveladvisor_labels = isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_date_num]) ? $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_date_num] : array();
                $traveladvisor_metas = isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_date_num]) ? $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_date_num] : array();
                $traveladvisor_date_num ++;
                break;
            case "text":
                $traveladvisor_icons = isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_text_num]) ? $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_text_num] : array();
                $traveladvisor_labels = isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_text_num]) ? $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_text_num] : array();
                $traveladvisor_metas = isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_text_num]) ? $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_text_num] : array();
                $traveladvisor_text_num ++;
                break;
            case "email":
                $traveladvisor_icons = isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_email_num]) ? $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_email_num] : array();
                $traveladvisor_labels = isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_email_num]) ? $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_email_num] : array();
                $traveladvisor_metas = isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_email_num]) ? $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_email_num] : array();
                $traveladvisor_email_num ++;
                break;
            case "range":
                $traveladvisor_icons = isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_range_num]) ? $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_range_num] : array();
                $traveladvisor_labels = isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_range_num]) ? $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_range_num] : array();
                $traveladvisor_metas = isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_range_num]) ? $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_range_num] : array();
                $traveladvisor_range_num ++;
                break;
            case "url":
                $traveladvisor_icons = isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_url_num]) ? $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_url_num] : array();
                $traveladvisor_labels = isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_url_num]) ? $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_url_num] : array();
                $traveladvisor_metas = isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_url_num]) ? $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_url_num] : array();
                $traveladvisor_url_num ++;
                break;
            case "dropdown":
                $traveladvisor_icons = isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_dropdown]) ? $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["fontawsome_icon"][$traveladvisor_dropdown] : array();
                $traveladvisor_labels = isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_dropdown]) ? $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["label"][$traveladvisor_dropdown] : array();
                $traveladvisor_metas = isset($traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_dropdown]) ? $traveladvisor_var_theme_options["traveladvisor_cus_field_$traveladvisor_get_field"]["meta_key"][$traveladvisor_dropdown] : array();
                $traveladvisor_dropdown ++;
                break;
                $traveladvisor_none_num ++;
        }
    }
    $traveladvisor_destinations_list = array();
    $traveladvisor_var_theme_options = get_option('traveladvisor_var_options');
    $traveladvisor_var_currency = $traveladvisor_var_theme_options['traveladvisor_var_currency_sign'];
//$traveladvisor_arguments = array('post_type' => 'destination');
//$traveladvisor_var_destinations_list = new WP_Query($traveladvisor_arguments);
//while ($traveladvisor_var_destinations_list->have_posts()): $traveladvisor_var_destinations_list->the_post();
//    $traveladvisor_destinations_list = get_the_title();
//endwhile;
//wp_reset_query();
    $args = array(
        'post_type' => 'destination',
    );
    $posts = get_posts($args);
    $i = 0;
    foreach ($posts as $key => $post) {
        $i++;
        $traveladvisor_destinations_list = $post->post_title;
    }
    wp_reset_query();
    $count_desti = $i;
    include plugin_dir_path(__FILE__) . '../cs-search-keywords.php';
    global $traveladvisor_fields_names_count, $traveladvisor_multisearch_check, $traveladvisor_selectbox_count, $traveladvisor_finaloptions, $new_array, $traveladvisor_duration_count, $traveladvisor_tours_title, $traveladvisor_meta_query;
    $traveladvisor_orderby = isset($traveladvisor_orderby) ? $traveladvisor_orderby : '';
    $traveladvisor_true_order = isset($traveladvisor_true_order) ? $traveladvisor_true_order : '';
    $traveladvisor_meta_key = isset($traveladvisor_meta_key) ? $traveladvisor_meta_key : '';
    if (isset($traveladvisor_order) && $traveladvisor_order == "alphabets") {
        $traveladvisor_orderby = "title";
        $traveladvisor_true_order = "ASC";
    } elseif (isset($traveladvisor_order) && $traveladvisor_order == "price-ascending") {
        $traveladvisor_meta_key = "traveladvisor_var_tours_newprice";
        $traveladvisor_orderby = "meta_value_num";
        $traveladvisor_true_order = 'ASC';
    } elseif (isset($traveladvisor_order) && $traveladvisor_order == "price-descending") {
        $traveladvisor_meta_key = "traveladvisor_var_tours_newprice";
        $traveladvisor_orderby = "meta_value_num";
        $traveladvisor_true_order = 'DESC';
    } elseif (isset($traveladvisor_order) && $traveladvisor_order == "date-ascending") {
        $traveladvisor_orderby = "date";
        $traveladvisor_true_order = "ASC";
    } elseif (isset($traveladvisor_order) && $traveladvisor_order == "date-descending") {
        $traveladvisor_orderby = "date";
        $traveladvisor_true_order = "DESC";
    }
    if (isset($traveladvisor_starting_date) && $traveladvisor_starting_date != "") {
        $traveladvisor_meta_query[] = array(
            'key' => 'traveladvisor_var_tour_starting_date',
            'value' => $traveladvisor_starting_date,
            'compare' => 'LIKE',
        );
    }
    $args['search_title'] = $s_title_search;
    $args['meta_query'] = $traveladvisor_meta_query;
    $args['post_type'] = "tours";
    $args['meta_key'] = $traveladvisor_meta_key;
    $args['orderby'] = $traveladvisor_orderby;
    $args['order'] = $traveladvisor_true_order;

    static $traveladvisor_var_custom_counter;
    if (!isset($traveladvisor_var_custom_counter)) {
        $traveladvisor_var_custom_counter = 1;
    } else {
        $traveladvisor_var_custom_counter ++;
    }
    unset($args['tour_paging_' . $traveladvisor_var_custom_counter]);
    if (isset($_GET['tour_paging_' . $traveladvisor_var_custom_counter])) {
        $paged = $_GET['tour_paging_' . $traveladvisor_var_custom_counter];
    } else {
        $paged = 1;
    }
	$args     = array('post_type' => 'tour',
        'order' => $traveladvisor_true_order,
        'orderby' => $traveladvisor_orderby,
        'post_status' => 'publish',
        'paged' => $paged,
        'ignore_sticky_posts' => 1,
        'meta_key' => $traveladvisor_meta_key,
        'post_type' => 'tours',
        's' => $s_title_search,
        'meta_query' => array(
            $traveladvisor_meta_query,
        ),
    );
    $traveladvisor_var_tours_post_data = new WP_Query($args);
    $traveladvisor_var_tours_data = array();
    $traveladvisor_counter = 0;
    $cs_id = 0;
    while ($traveladvisor_var_tours_post_data->have_posts()):$traveladvisor_var_tours_post_data->the_post();
        $id = get_the_id();
        $traveladvisor_var_tours_price = get_post_meta($id, 'traveladvisor_var_tours_newprice', true);
        $traveladvisor_var_tours_gallery_images_url = get_post_meta($id, 'traveladvisor_var_tours_gallery_images_url', true);
        $s_traveladvisor_tours_oldprice = get_post_meta($id, 'traveladvisor_var_tours_oldprice', true);
        $traveladvisor_var_tour_duration = get_post_meta($id, 'traveladvisor_var_tour_duration', true);
        $traveladvisor_var_tours_discount_price = get_post_meta($id, 'traveladvisor_var_tours_discount_price', true);
        $traveladvisor_tours_title = get_the_title();
        $traveladvisor_content = get_the_content();
        $traveladvisor_metas_count = count($traveladvisor_metas) - 1;
        for ($traveladvisor_a = 0; $traveladvisor_a <= $traveladvisor_metas_count; $traveladvisor_a ++) {
            if (!isset($traveladvisor_metas[$traveladvisor_a]))
                $traveladvisor_metas[$traveladvisor_a] = '';
            $traveladvisor_meta_values[] = get_post_meta($id, "traveladvisor_var_$traveladvisor_metas[$traveladvisor_a]", true);
        }
        $traveladvisor_posts_count = isset($traveladvisor_var_tours_post_data->post_count) ? $traveladvisor_var_tours_post_data->post_count : '';
        echo "<input type='hidden' value=$traveladvisor_posts_count class='tourcountposts'>";
        ?>

        <div class="<?php echo $col_class; ?>">
            <div class="cs-list <?php echo $inv_class; ?>">
                <div class="cs-media classic">
                    <?php
                    if ($traveladvisor_var_tours_discount_price != '') {
                        ?>
                        <span class="cs-off-price"><?php echo esc_html($traveladvisor_var_tours_discount_price); ?>%<em><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_off'); ?></em></span>
                        <?php
                    }
                    ?>
                    <ul class="cs-list-slider" id="cs-list-slider<?php echo esc_html($traveladvisor_counter); ?>">
                        <li><?php echo esc_url(the_post_thumbnail('traveladvisor_var_media_2')); ?></li>
                        <?php
                        $traveladvisor_count = count($traveladvisor_var_tours_gallery_images_url) - 1;
                        for ($traveladvisor_a = 0; $traveladvisor_a <= $traveladvisor_count; $traveladvisor_a ++) {
                            if (isset($traveladvisor_var_tours_gallery_images_url[$traveladvisor_a])) {
                                $traveladvisor_var_img_id = $traveladvisor_var_wp_traveladvisor_core->traveladvisor_var_get_attachment_id($traveladvisor_var_tours_gallery_images_url[$traveladvisor_a]);
                                $traveladvisor_var_src = wp_get_attachment_image_src($traveladvisor_var_img_id, 'traveladvisor_var_media_2');
                                if ($traveladvisor_var_src[0] != "") {
                                    ?>
                                    <li><img src="<?php echo esc_url($traveladvisor_var_src[0]); ?>" alt="" /></li>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                    <ul  class="cs-list-slider-thumb" id="cs-list-slider-thumb<?php echo esc_html($traveladvisor_counter); ?>">
                        <?php
                        $traveladvisor_photots_counter = count($traveladvisor_var_tours_gallery_images_url);
                        if (empty($traveladvisor_var_tours_gallery_images_url)) {
                            $traveladvisor_photots_counter = "";
                        }
                        ?>
                        <li><?php echo esc_url(the_post_thumbnail('traveladvisor_var_media_7')); ?></li>
                        <?php
                        $traveladvisor_count = count($traveladvisor_var_tours_gallery_images_url) - 1;
                        for ($traveladvisor_a = 0; $traveladvisor_a <= $traveladvisor_count; $traveladvisor_a ++) {
                            if (isset($traveladvisor_var_tours_gallery_images_url[$traveladvisor_a]) && $traveladvisor_var_tours_gallery_images_url[$traveladvisor_a] != "") {
                                $traveladvisor_var_img_id = $traveladvisor_var_wp_traveladvisor_core->traveladvisor_var_get_attachment_id($traveladvisor_var_tours_gallery_images_url[$traveladvisor_a]);
                                $traveladvisor_var_src = wp_get_attachment_image_src($traveladvisor_var_img_id, 'traveladvisor_var_media_7');
                                if ($traveladvisor_var_src[0] != "") {
                                    ?>
                                    <li><img src="<?php echo esc_url($traveladvisor_var_src[0]); ?>" alt="" /></li>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>

                    <?php if ($traveladvisor_photots_counter != "") { ?>       <div class="cs-countnumber" id="cs-countnumber<?php echo esc_html($cs_id); ?>"><?php echo esc_html($traveladvisor_photots_counter); ?>    <p class='cs-thumb-photo'>PHOTOS</p> </div><?php } ?>

                </div>
                <div class="cs-media grid"> <?php if (!$traveladvisor_var_tours_discount_price == '') { ?> 
                        <span class="cs-off-price"><?php
                            echo esc_html($traveladvisor_var_tours_discount_price);
                            _e("%", "cs-traveladvisor")
                            ?><em><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_off'); ?></em>
                        </span><?php } ?>
                    <figure><a href="<?php esc_url(the_permalink()); ?>" ><?php the_post_thumbnail('traveladvisor_var_media_2'); ?></a></figure>
                </div>



                <div class="cs-text">
                    <div class="cs-heading-section">
                        <div class="cs-post-title">
                            <h3><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h3>
                            <ul>
                                <li><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_duration'); ?><span class="cs-color"><?php echo esc_html($traveladvisor_var_tour_duration); ?></span></li>
                            </ul>
                        </div>
                        <div class="cs-price-box"><strong><sup><?php echo esc_html($traveladvisor_var_currency); ?></sup><?php
                                echo esc_html($traveladvisor_var_tours_price);
                                if (!$s_traveladvisor_tours_oldprice == '') {
                                    ?><span class="cs-color"><sup>   <?php echo esc_html($traveladvisor_var_currency); ?></sup><?php echo esc_html($s_traveladvisor_tours_oldprice); ?></span>
                                <?php } ?></strong>
                            <p><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_perperson'); ?></p>
                        </div>
                    </div>
                    <?php
                    $excerpt_lenth = 0;
                    if (isset($traveladvisor_var_tour_excerpt) && $traveladvisor_var_tour_excerpt == 'yes') {
                        if (isset($traveladvisor_var_tour_excerpt_length) && $traveladvisor_var_tour_excerpt_length != '') {
                            $excerpt_lenth = $traveladvisor_var_tour_excerpt_length;
                        }
                    }
                    ?>
                    <?php if ($excerpt_lenth != 0) { ?>
                        <p class="listing-text"> <?php echo wp_trim_words(get_the_content(), $excerpt_lenth); ?></p>
                    <?php } ?>
                    <ul class="cs-listing-option">
                        <?php
                        $traveladvisor_total_icons = count($traveladvisor_icons) - 1;
                        for ($traveladvisor_a = 0; $traveladvisor_a <= 3; $traveladvisor_a ++) {
                            if (!isset($traveladvisor_icons[$traveladvisor_a]))
                                $traveladvisor_icons[$traveladvisor_a] = '';
                            if (!isset($traveladvisor_labels[$traveladvisor_a]))
                                $traveladvisor_labels[$traveladvisor_a] = '';
                            if (!isset($traveladvisor_meta_values[$traveladvisor_a]))
                                $traveladvisor_meta_values[$traveladvisor_a] = '';
                            ?>
                            <li><a href="#" title="<?php echo esc_html($traveladvisor_labels[$traveladvisor_a]); ?>: <?php
                                if (is_array($traveladvisor_meta_values[$traveladvisor_a])) {
                                    $traveladvisor_values_loop = $traveladvisor_meta_values[$traveladvisor_a];
                                    $traveladvisor_next = $traveladvisor_meta_values[$traveladvisor_a + 1];
                                    foreach ($traveladvisor_values_loop as $traveladvisor_vals) {
                                        echo esc_html($traveladvisor_vals);
                                        if ($traveladvisor_next != "") {
                                            echo esc_html(",");
                                        }
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

            <?php
            echo '</div> <!--  page-content end-->';

            $traveladvisor_counter ++;
            $traveladvisor_meta_values = NULL;
            $cs_id ++;
        endwhile;
        $traveladvisor_posts_count = isset($traveladvisor_posts_count) ? $traveladvisor_posts_count : '';
        if ($traveladvisor_posts_count == "") {
            ?>
            <h3><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_no_tours_to_show'); ?></h3>
            <?php
        }
        wp_reset_postdata();
        ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="cs-pagination">

                <?php
                $traveladvisor_arguments['posts_per_page'] = -1;
                $traveladvisor_var_type_loop_count = new WP_Query($traveladvisor_arguments);
                $traveladvisor_var_type_count_post = $traveladvisor_var_type_loop_count->post_count;
                $traveladvisor_var_page = 'tour_paging_' . $traveladvisor_var_custom_counter;
                $argumentss['meta_query'] = $traveladvisor_meta_query;
                $argumentss['post_type'] = "tours";
                $argumentss['posts_per_page'] = -1;

                $custom_posts = new WP_Query($argumentss);
                $count = $custom_posts->post_count;

                if (is_array($traveladvisor_meta_query)) {
                    $errors = array_filter($traveladvisor_meta_query);

                    if (!empty($errors)) {
                        $traveladvisor_var_type_count_post = $count;
                    } else {
                        $traveladvisor_var_type_count_post = $traveladvisor_var_type_count_post;
                    }
                } else {
                    $traveladvisor_var_type_count_post = $traveladvisor_var_type_count_post;
                }
                $traveladvisor_var_tour_paging_filter_style = isset($a['traveladvisor_var_tour_paging_filter_style']) ? $a['traveladvisor_var_tour_paging_filter_style'] : '';
                $traveladvisor_var_tour_item_per_page = isset($a['traveladvisor_var_tour_item_per_page']) ? $a['traveladvisor_var_tour_item_per_page'] : '';

                if ($traveladvisor_var_tour_paging_filter_style == "pagination" && $traveladvisor_var_type_count_post > $traveladvisor_var_tour_item_per_page && $traveladvisor_var_tour_item_per_page > 0) {
                    $total_pages = '';
                    $total_pages = ceil($traveladvisor_var_type_count_post / $traveladvisor_var_tour_item_per_page);
                    echo '<nav>';
                    if ($traveladvisor_counter <> 0) {
                        traveladvisor_var_get_pagination($total_pages, isset($_GET[$traveladvisor_var_page]) ? $_GET[$traveladvisor_var_page] : 1, $traveladvisor_var_page);
                    }
                    echo '</nav>';
                }
                ?>
            </div>
        </div>
        <!--</div>
        </div>
        </div>
        </div>
        </div>-->

        <?php
        $random_id = rand(0, 9999);
        ?>
        <div class="modal fade modal_more" id="light" tabindex="-1" role="dialog" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="white_content">
                            <a class="close" data-dismiss="modal">&nbsp;</a>
                             <div class="panel-body">
                        <ul class="cs-checkbox-list">
                            <?php
                            $traveladvisor_id = $post->ID;
                            $post->ID = $traveladvisor_id;
                            $traveladvisor_destinations_list;
                            //$count_desti = count($traveladvisor_destinations_list) - 1;
                            if (is_array($traveladvisor_destinations_list) && !empty($traveladvisor_destinations_list)) {
                                $count_desti = count($traveladvisor_destinations_list) - 1;
                            } else {
                                $count_desti = 0;
                            }
                            $cs_idd = 0;
                            #======
                            $args = array(
                                'post_type' => 'destination',
                                'posts_per_page' => -1,
                            );
                            $more_filter_result = new WP_Query($args);
                            $total_post = $more_filter_result->found_posts;
                            $new_list = array();
                            while ($more_filter_result->have_posts()): $more_filter_result->the_post();
                                array_push($new_list, get_the_title());
                            endwhile;
                            wp_reset_postdata();
                            #====
                            for ($traveladvisor_a = 5; $traveladvisor_a < $total_post; $traveladvisor_a ++) {
                                if (!isset($_GET["destinations"])) {
                                    $_GET["destinations"] = "";
                                }
                                $traveladvisor_checked = "";
                                if ($_GET["destinations"] == $new_list[$traveladvisor_a]) {
                                    $traveladvisor_checked = "checked";
                                }
                                ?>
                                <li>
                                    <form action="#" method="get" id="frm_all_specialisms<?php echo esc_html($random_id . $cs_idd); ?>" >
                                        <div class="checkbox">
                                            <input <?php echo esc_html($traveladvisor_checked); ?> name="destinations" onChange="this.form.submit()" id="checkbox<?php echo esc_html($traveladvisor_a); ?>" type="checkbox" value="<?php echo esc_html($new_list[$traveladvisor_a]); ?>">
                                            <label for="checkbox<?php echo esc_html($traveladvisor_a); ?>"><?php echo esc_html($new_list[$traveladvisor_a]); ?></label>
                                        </div>
                                    </form>
                                </li>
                                <?php
                                $cs_idd ++;
                            }

                            $traveladvisor_destinations_list = "";
                            ?>
                        </ul>
                   </div>
                           <!--                        </form>-->
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <?php echo '</div> <!--  page-content end-->'; ?>