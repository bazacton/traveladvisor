<?php
/**
 * File Type: Tour listing Shortcode
 * 
 * * Start Function how to create listing of Tour
 *
 */
if (!function_exists('traveladvisor_tour_listing')) {
function traveladvisor_tour_listing($atts, $content = "") {
        ob_start();
        global $wpdb, $traveladvisor_plugin_options, $traveladvisor_html_fields, $traveladvisor_form_fields2, $a, $s_title_search,$traveladvisor_meta_query,$selected_value,$traveladvisor_var_tour_elements,$traveladvisor_inventories_counter,$traveladvisor_var_tour_filteration;
        $a = shortcode_atts(array(
            'traveladvisor_var_tour_element_title' => '',
            'traveladvisor_var_tour_paging_filter_style' => 'pagination', // yes or no
            'traveladvisor_var_tour_item_per_page' => '10', // as per your requirement only numbers(0-9)
            'traveladvisor_var_searchbox' => 'yes', // yes or no
            'traveladvisor_var_tour_filteration' => 'yes',
            'traveladvisor_var_tour_sorting' => 'on', // yes or no
            'traveladvisor_var_top_search' => '',
            'traveladvisor_var_tour_view' => 'tour_listing', // simplelist, featured or detaillist
            'traveladvisor_var_result_type' => 'all', // all, featured
            'traveladvisor_var_tour_element_title' => '', // simplelist or detaillist
            'traveladvisor_var_tour_excerpt' => '',
            'traveladvisor_var_tour_excerpt_length' => '',
			'traveladvisor_inventories_counter'=>'',
                ), $atts
        );
		
		extract(shortcode_atts($a, $atts));
		$traveladvisor_var_tour_excerpt = isset($traveladvisor_var_tour_excerpt) ? $traveladvisor_var_tour_excerpt : '';
                $traveladvisor_var_tour_excerpt_length = isset($traveladvisor_var_tour_excerpt_length) ? $traveladvisor_var_tour_excerpt_length : '';
                $traveladvisor_var_rand = isset($traveladvisor_var_rand) ? $traveladvisor_var_rand : '';
        
		$traveladvisor_var_tour_elements = array(
                'traveladvisor_var_rand' => $traveladvisor_var_rand,
                'traveladvisor_var_tour_excerpt' => $traveladvisor_var_tour_excerpt,
                'traveladvisor_var_tour_excerpt_length' => $traveladvisor_var_tour_excerpt_length,
            );
        $login_user_is_employer_flag = 0;
        $login_user_is_candidate_flag = 0;
        $traveladvisor_search_title = isset($_GET['search_title']) ? $_GET['search_title'] : '';
        //title
        $s_title_search = isset($_GET['search_title']) ? $_GET['search_title'] : '';
        // sorting filters
        $job_sort_by = 'recent';    // default value
        $job_sort_order = 'desc';   // default value
        $job_filter_page_size = '';
        if ($a['traveladvisor_var_tour_paging_filter_style'] == 'pagination') {
            $traveladvisor_blog_num_post = $a['traveladvisor_var_tour_item_per_page']; //pick from atribute 
        } else {
            if (isset($a['traveladvisor_var_tour_item_per_page']) and $a['traveladvisor_var_tour_item_per_page'] <> '') {
                if ($a['traveladvisor_var_tour_item_per_page'] != 0)
                    $traveladvisor_blog_num_post = $a['traveladvisor_var_tour_item_per_page'];
                else
                    $traveladvisor_blog_num_post = "10";
            } else {
                $traveladvisor_blog_num_post = "10";
            }
        }
        $qryvar_sort_by_column = 'post_date';
        $qryvar_job_sort_type = 'DESC';
        $job_filter_page_size = $traveladvisor_blog_num_post;  // default value for paging
        if ($a['traveladvisor_var_tour_paging_filter_style'] == "pagination") {
            if (isset($_SESSION['job_filter_sort_by']) && $_SESSION['job_filter_sort_by'] != '') {
                $job_sort_by = $_SESSION['job_filter_sort_by'];
            }
            if (isset($_SESSION['job_filter_page_size']) && $_SESSION['job_filter_page_size'] != '') {
                $traveladvisor_blog_num_post = $_SESSION['job_filter_page_size'];
                $job_filter_page_size = $traveladvisor_blog_num_post;
            }
        }
        if ($job_sort_by == 'recent') {
            $qryvar_job_sort_type = 'DESC';
            $qryvar_sort_by_column = 'post_date';
        } elseif ($job_sort_by == 'alphabetical') {
            $qryvar_job_sort_type = 'ASC';
            $qryvar_sort_by_column = 'post_title';
        } elseif ($job_sort_by == 'featured') {
            $qryvar_job_sort_type = 'DESC';
            $qryvar_sort_by_column = 'traveladvisor_var_featured';
        }
        // getting all record of employer for paging
        if (empty($_GET['page_job']))
            $_GET['page_job'] = 1;
        $qrystr = ''; //?';
        $filter_arr = '';
        $radius_array = '';
        $posted = '';
        $destinations = '';
        $job_title = '';
        $location = '';
        $job_type = '';
        $default_date_time_formate = 'd-m-Y H:i:s';
        $traveladvisor_var_posted_date_formate = 'd-m-Y H:i:s';
        $traveladvisor_var_expired_date_formate = 'd-m-Y H:i:s';
        if (isset($_GET['tour_starting_date']) && $_GET['tour_starting_date'] != '') {
            $traveladvisor_starting_date = explode(",", $_GET['tour_starting_date']);
            $qrystr .= '&tour_starting_date=' . $_GET['tour_starting_date'];
        }
        if (isset($_GET['destinations_string']) && $_GET['destinations_string'] != '') {
            $destinations = explode(",", $_GET['destinations_string']);
            $qrystr .= '&destinations=' . $_GET['destinations_string'];
        } elseif (isset($_GET['destinations']) && $_GET['destinations'] != '') {
            $destinations = $_GET['destinations'];
            $qrystr .= '&destinations=' . $_GET['destinations'];
            if (!is_array($destinations))
                $destinations = Array($destinations);
        }
        if (isset($_GET['job_type']))
            $job_type = $_GET['job_type'];
        $cus_fields_count_arr = '';
        $location_condition_arr = '';
        $filter_arr2 = array();
        // destination check
        if ($destinations != '' && $destinations != 'All destinations') {
            $filter_multi_desti_arr = ['relation' => 'OR',];
            foreach ($destinations as $destinations_key) {
                if ($destinations_key != '') {
                    $filter_multi_desti_arr = array(
                        'key' => 'traveladvisor_var_tour_destination',
                        'compare' => 'Like',
                        'value' => $destinations_key,
                    );
                }
            }
            $filter_arr = array(
                $filter_multi_desti_arr
            );
        }
        // job_type check
        if ($job_type != '') {
            $qrystr .= '&job_type=' . $job_type;
            $filter_arr2 =
                    array(
                        'taxonomy' => 'job_type',
                        'field' => 'slug',
                        'terms' => array($job_type)
            );
        }
        $traveladvisor_var_cus_fields = get_option("traveladvisor_job_cus_fields");
        if (is_array($traveladvisor_var_cus_fields) && sizeof($traveladvisor_var_cus_fields) > 0) {
            foreach ($traveladvisor_var_cus_fields as $cus_field) {
                if (isset($cus_field['enable_srch']) && $cus_field['enable_srch'] == 'yes') {
                    $query_str_var_name = $cus_field['meta_key'];
                    if (isset($_GET[$query_str_var_name]) && $_GET[$query_str_var_name] != '') {
                        if (!isset($cus_field['multi']) || $cus_field['multi'] != 'yes') {
                            $qrystr .= '&' . $query_str_var_name . '=' . $_GET[$query_str_var_name];
                        }
                        if ($cus_field['type'] == 'dropdown') {
                            if (isset($cus_field['multi']) && $cus_field['multi'] == 'yes') {
                                $_query_string_arr = getMultipleParameters();
                                $filter_multi_arr = ['relation' => 'OR',];
                                foreach ($_query_string_arr[$query_str_var_name] as $query_str_var_name_key) {
                                    $traveladvisor_value = str_replace('+', ' ', $query_str_var_name_key);
                                    $traveladvisor_value = str_replace('-', ' ', $traveladvisor_value);
                                    if ($cus_field['post_multi'] == 'yes') {
                                        $filter_multi_arr = array(
                                            'key' => "traveladvisor_var_$query_str_var_name",
                                            'value' => serialize($traveladvisor_value),
                                            'compare' => 'Like',
                                        );
                                    } else {
                                        $traveladvisor_value = str_replace('+', ' ', $query_str_var_name_key);
                                        $traveladvisor_value = str_replace('-', ' ', $traveladvisor_value);
                                        $filter_multi_arr = array(
                                            'key' => "traveladvisor_var_$query_str_var_name",
                                            'value' => "$traveladvisor_value",
                                            'compare' => 'like',
                                        );
                                    }
                                    $qrystr .= '&' . $query_str_var_name . '=' . $query_str_var_name_key;
                                }
                                $filter_arr = array(
                                    $filter_multi_arr
                                );
                                // for count query
                                $cus_fields_count_arr[$query_str_var_name] = array(
                                    $filter_multi_arr
                                );
                            } else {
                                if ($cus_field['post_multi'] == 'yes') {
                                    $filter_arr = array(
                                        'key' => "traveladvisor_var_$query_str_var_name",
                                        'value' => serialize($_GET[$query_str_var_name]),
                                        'compare' => 'Like',
                                    );
                                    // for count query
                                    $cus_fields_count_arr[$query_str_var_name] = array(
                                        'key' => "traveladvisor_var_$query_str_var_name",
                                        'value' => serialize($_GET[$query_str_var_name]),
                                        'compare' => 'Like',
                                    );
                                } else {
                                    $filter_arr = array(
                                        'key' => "traveladvisor_var_$query_str_var_name",
                                        'value' => $_GET[$query_str_var_name],
                                        'compare' => 'like',
                                    );
                                    // for count query
                                    $cus_fields_count_arr[$query_str_var_name] = array(
                                        'key' => "traveladvisor_var_$query_str_var_name",
                                        'value' => $_GET[$query_str_var_name],
                                        'compare' => 'like',
                                    );
                                }
                            }
                        } elseif ($cus_field['type'] == 'text' || $cus_field['type'] == 'email' || $cus_field['type'] == 'url') {
                            $filter_arr = array(
                                'key' => "traveladvisor_var_$query_str_var_name",
                                'value' => $_GET[$query_str_var_name],
                                'compare' => 'LIKE',
                            );
                            // for count query
                            $cus_fields_count_arr[$query_str_var_name] = array(
                                'key' => "traveladvisor_var_$query_str_var_name",
                                'value' => $_GET[$query_str_var_name],
                                'compare' => 'LIKE',
                            );
                        } elseif ($cus_field['type'] == 'range') {

                            if ($cus_field['srch_style'] == 'input') {
                                $selected_value=  isset($_GET[$query_str_var_name])?$_GET[$query_str_var_name]:'';
                                 $ranges_str_arr = explode("-",$selected_value);

                                 print_r($ranges_str_arr);
                                 
                            } elseif ($cus_field['srch_style'] == 'slider') {
                                 $ranges_str_arr = explode(",", $_GET[$query_str_var_name]);
                            }
                            $range_first = $ranges_str_arr[0];
                            $range_seond = isset($ranges_str_arr[1]) ? $ranges_str_arr[1] : '';
                            $filter_arr = array(
                                'key' => "traveladvisor_var_$query_str_var_name",
                                'value' => $range_first,
                                'compare' => '>=',
                            );
                            $filter_arr = array(
                                'key' => "traveladvisor_var_$query_str_var_name",
                                'value' => $range_seond,
                                'compare' => '<=',
                            );
                            // for count query
                            $cus_fields_count_arr[$query_str_var_name] = array(
                                'key' => "traveladvisor_var_$query_str_var_name",
                                'value' => $range_first,
                                'compare' => '>=',
                            );
                            // for count query
                            $cus_fields_count_arr[$query_str_var_name] = array(
                                'key' => "traveladvisor_var_$query_str_var_name",
                                'value' => $range_seond,
                                'compare' => '<=',
                            );
                        } elseif ($cus_field['type'] == 'date') {
                            $filter_arr = array(
                                'key' => "traveladvisor_var_$query_str_var_name",
                                'value' => $_GET[$query_str_var_name],
                                'compare' => 'LIKE',
                            );
                            $cus_fields_count_arr[$query_str_var_name] = array(
                                'key' => "traveladvisor_var_$query_str_var_name",
                                'value' => $_GET[$query_str_var_name],
                                'compare' => 'LIKE',
                            );
                        }
                    }
                }
            }
        }
        $meta_post_ids_arr = '';
        $job_title_id_condition = '';
        if (isset($filter_arr) && !empty($filter_arr)) {
            $meta_post_ids_arr = traveladvisor_get_query_whereclase_by_array($filter_arr);
            // if no result found in filtration 
            if (empty($meta_post_ids_arr)) {
                $meta_post_ids_arr = array(0);
            }
            $ids = $meta_post_ids_arr != '' ? implode(",", $meta_post_ids_arr) : '0';
            $job_title_id_condition = " ID in (" . $ids . ") AND ";
        }
        $tour_postqry = $filter_arr;
        if ($traveladvisor_search_title != '') {
            $qrystr .= '&search_title=' . $traveladvisor_search_title;  // added again this var in query string for linking again
        } else {
            $tour_postqry = array('posts_per_page' => "-1", 'post_type' => 'tours', 'order' => $qryvar_job_sort_type, 'orderby' => $qryvar_sort_by_column,
                'post_status' => 'publish', 'ignore_sticky_posts' => 1,
                'post__in' => $meta_post_ids_arr,
                'tax_query' => array(
                    'relation' => 'AND',
                    $filter_arr2
                ),
                'meta_query' => $filter_arr,
            );
        }
        $traveladvisor_meta_query = $filter_arr;
        $loop_count = new WP_Query($tour_postqry);
        $count_post = $loop_count->post_count;
        // getting job with page number
        if ($qryvar_sort_by_column == 'traveladvisor_var_featured') {
            $qryvar_sort_by_column = 'meta_value';
            if ($job_title != '') {
                $post_ids = $wpdb->get_col("SELECT ID FROM $wpdb->posts WHERE " . $job_title_id_condition . " UCASE(post_title) LIKE '%$job_title%' OR UCASE(post_content) LIKE '%$job_title%'   AND post_type='tour' AND post_status='publish'");
                if ($post_ids) {
                    $args = array('posts_per_page' => "$traveladvisor_blog_num_post", 'post_type' => 'tour', 'paged' => $_GET['page_job'], 'order' => $qryvar_job_sort_type, 'orderby' => $qryvar_sort_by_column, 'post_status' => 'publish',
                        'ignore_sticky_posts' => 1,
                        'post__in' => $post_ids,
                        'meta_key' => 'traveladvisor_var_featured',
                        'tax_query' => array(
                            'relation' => 'AND',
                            $filter_arr2
                        ),
                        'meta_query' => array(
                            array(
                                'key' => 'traveladvisor_var_posted',
                                'value' => strtotime(date($traveladvisor_var_posted_date_formate)),
                                'compare' => '<=',
                            ),
                            array(
                                'key' => 'traveladvisor_var_expired',
                                'value' => strtotime(date($traveladvisor_var_expired_date_formate)),
                                'compare' => '>=',
                            ),
                            array(
                                'key' => 'traveladvisor_var_status',
                                'value' => 'active',
                                'compare' => '=',
                            ),
                            $location_condition_arr,
                        ),
                    );
                }
            } else {
                $args = array('posts_per_page' => "$traveladvisor_blog_num_post", 'post_type' => 'tour', 'paged' => $_GET['page_job'], 'order' => $qryvar_job_sort_type, 'orderby' => $qryvar_sort_by_column, 'post_status' => 'publish', 'ignore_sticky_posts' => 1,
                    'meta_key' => 'traveladvisor_var_featured',
                    'tax_query' => array(
                        'relation' => 'AND',
                        $filter_arr2
                    ),
                    'meta_query' => array(
                        array(
                            'key' => 'traveladvisor_var_posted',
                            'value' => strtotime(date($traveladvisor_var_posted_date_formate)),
                            'compare' => '<=',
                        ),
                        array(
                            'key' => 'traveladvisor_var_expired',
                            'value' => strtotime(date($traveladvisor_var_expired_date_formate)),
                            'compare' => '>=',
                        ),
                        array(
                            'key' => 'traveladvisor_var_status',
                            'value' => 'active',
                            'compare' => '=',
                        ),
                        $location_condition_arr,
                    ),
                );
            }
        } elseif ($qryvar_sort_by_column == 'post_date') {
            $qryvar_sort_by_column = 'meta_value_num';
            if ($job_title != '') {
                $post_ids = $wpdb->get_col("SELECT ID FROM $wpdb->posts WHERE " . $job_title_id_condition . " UCASE(post_title) LIKE '%$job_title%' OR UCASE(post_content) LIKE '%$job_title%'   AND post_type='tour' AND post_status='publish'");
                if ($post_ids) {
                    $args = array('posts_per_page' => "$traveladvisor_blog_num_post", 'post_type' => 'tour', 'paged' => $_GET['page_job'], 'order' => $qryvar_job_sort_type, 'orderby' => $qryvar_sort_by_column, 'post_status' => 'publish',
                        'ignore_sticky_posts' => 1,
                        'post__in' => $post_ids,
                        'meta_key' => 'traveladvisor_var_posted',
                        'tax_query' => array(
                            'relation' => 'AND',
                            $filter_arr2
                        ),
                        'meta_query' => array(
                            array(
                                'key' => 'traveladvisor_var_posted',
                                'value' => strtotime(date($traveladvisor_var_posted_date_formate)),
                                'compare' => '<=',
                            ),
                            array(
                                'key' => 'traveladvisor_var_expired',
                                'value' => strtotime(date($traveladvisor_var_expired_date_formate)),
                                'compare' => '>=',
                            ),
                            array(
                                'key' => 'traveladvisor_var_status',
                                'value' => 'active',
                                'compare' => '=',
                            ),
                            $location_condition_arr,
                        ),
                    );
                }
            } else {
                $args = array('posts_per_page' => "$traveladvisor_blog_num_post", 'post_type' => 'tour', 'paged' => $_GET['page_job'], 'order' => $qryvar_job_sort_type, 'orderby' => $qryvar_sort_by_column, 'post_status' => 'publish', 'ignore_sticky_posts' => 1,
                    'meta_key' => 'traveladvisor_var_posted',
                    'post__in' => $meta_post_ids_arr,
                    'tax_query' => array(
                        'relation' => 'AND',
                        $filter_arr2
                    ),
                    'meta_query' => array(
                        array(
                            'key' => 'traveladvisor_var_posted',
                            'value' => strtotime(date($traveladvisor_var_posted_date_formate)),
                            'compare' => '<=',
                        ),
                        array(
                            'key' => 'traveladvisor_var_expired',
                            'value' => strtotime(date($traveladvisor_var_expired_date_formate)),
                            'compare' => '>=',
                        ),
                        array(
                            'key' => 'traveladvisor_var_status',
                            'value' => 'active',
                            'compare' => '=',
                        ),
                        $location_condition_arr,
                    ),
                );
            }
        } else {
            if ($job_title != '') {
                $post_ids = $wpdb->get_col("SELECT ID FROM $wpdb->posts WHERE " . $job_title_id_condition . " UCASE(post_title) LIKE '%$job_title%' OR UCASE(post_content) LIKE '%$job_title%'   AND post_type='tour' AND post_status='publish'");
                if ($post_ids) {
                    $args = array('posts_per_page' => "$traveladvisor_blog_num_post", 'post_type' => 'tour', 'paged' => $_GET['page_job'], 'order' => $qryvar_job_sort_type, 'orderby' => $qryvar_sort_by_column, 'post_status' => 'publish',
                        'ignore_sticky_posts' => 1,
                        'post__in' => $post_ids,
                        'tax_query' => array(
                            'relation' => 'AND',
                            $filter_arr2
                        ),
                        'meta_query' => array(
                            array(
                                'key' => 'traveladvisor_var_posted',
                                'value' => strtotime(date($traveladvisor_var_posted_date_formate)),
                                'compare' => '<=',
                            ),
                            array(
                                'key' => 'traveladvisor_var_expired',
                                'value' => strtotime(date($traveladvisor_var_expired_date_formate)),
                                'compare' => '>=',
                            ),
                            array(
                                'key' => 'traveladvisor_var_status',
                                'value' => 'active',
                                'compare' => '=',
                            ),
                            $location_condition_arr,
                        ),
                    );
                }
            } else {
                $args = array('posts_per_page' => "$traveladvisor_blog_num_post", 'post_type' => 'tour', 'paged' => $_GET['page_job'], 'order' => $qryvar_job_sort_type, 'orderby' => $qryvar_sort_by_column, 'post_status' => 'publish', 'ignore_sticky_posts' => 1,
                    'post__in' => $meta_post_ids_arr,
                    'tax_query' => array(
                        'relation' => 'AND',
                        $filter_arr2
                    ),
                    'meta_query' => array(
                        array(
                            'key' => 'traveladvisor_var_posted',
                            'value' => strtotime(date($traveladvisor_var_posted_date_formate)),
                            'compare' => '<=',
                        ),
                        array(
                            'key' => 'traveladvisor_var_expired',
                            'value' => strtotime(date($traveladvisor_var_expired_date_formate)),
                            'compare' => '>=',
                        ),
                        array(
                            'key' => 'traveladvisor_var_status',
                            'value' => 'active',
                            'compare' => '=',
                        ),
                        $location_condition_arr,
                    ),
                );
            }
        }
        $random_id = rand(0, 99999999);
        $number_option = rand(0, 99999999);
        if ($a['traveladvisor_var_tour_filteration'] == 'yes') { // destinations popup load when searchbox enable
            ?>
            <!-- start destination popup -->
            <div class="modal fade" id="lighter" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-body">
                            <div class="white_content">
                                <a class="close" data-dismiss="modal">&nbsp;</a>
                                <form action="#" method="get" id="frm_all_destinations<?php echo esc_html($random_id); ?>" >
                                    <?php
                                    // parse query string and create hidden fileds
                                    $final_query_str = str_replace("?", "", $qrystr);
                                    $final_query_str = traveladvisor_remove_qrystr_extra_var($final_query_str, 'destinations', 'no');
                                    $query = explode('&', $final_query_str);
                                    foreach ($query as $param) {
                                        if (!empty($param)) {
                                            list($name, $value) = explode('=', $param);
                                            $new_str = $name . "=" . $value;

                                            if (is_array($name)) {
                                                foreach ($_query_str_single_value as $_query_str_single_value_arr) {

                                                    $traveladvisor_opt_array = array(
                                                        'id' => '',
                                                        'std' => esc_attr($value),
                                                        'cust_id' => "",
                                                        'cust_name' => esc_attr($name) . '[]',
                                                    );
                                                    echo $traveladvisor_form_fields2->traveladvisor_form_hidden_render($traveladvisor_opt_array);
                                                }
                                            } else {
                                                $traveladvisor_opt_array = array(
                                                    'id' => '',
                                                    'std' => esc_attr($value),
                                                    'cust_id' => "",
                                                    'cust_name' => esc_attr($name),
                                                );
                                                echo $traveladvisor_form_fields2->traveladvisor_form_hidden_render($traveladvisor_opt_array);
                                            }
                                        }
                                    }
                                    ?>
                                    <ul class="custom-listing">
                                        <?php
                                        $destinations_parent_id = 0;
                                        $input_type_destination = 'radio';   // if first level then select only sigle destination
                                        if ($destinations != '') {
//                                            print_r($destinations);
                                            $selected_spec = get_term_by('slug', $destinations[0], 'destinations');
                                            $destinations_parent_id = '';
                                            if (isset($selected_spec->term_id)) {
                                                $destinations_parent_id = $selected_spec->term_id;
                                            }
                                        }
                                        $destinations_args = array(
                                            'orderby' => 'name',
                                            'order' => 'ASC',
                                            'fields' => 'all',
                                            'hide_empty' => false,
                                            'slug' => '',
                                            'parent' => $destinations_parent_id,
                                        );
                                        $all_destinations = get_terms('destinations', $destinations_args);
                                        
                                        if ( !empty($all_destinations) ) {
                                            $destinations_args = array(
                                                'orderby' => 'name',
                                                'order' => 'ASC',
                                                'fields' => 'all',
                                                'hide_empty' => false,
                                                'slug' => '',
                                                'parent' => isset($selected_spec->parent) ? $selected_spec->parent : '',
                                            );
                                            $all_destinations = get_terms('destinations', $destinations_args);
                                            print_r($all_destinations);
                                            $traveladvisor_parent_id = isset($selected_spec->parent) ? $selected_spec->parent : '';
                                            if ($traveladvisor_parent_id != 0) {    // if parent is not root means not main parent
                                                $input_type_destination = 'checkbox';   // if first level then select multiple destination
                                            }
                                        } else {

                                            if ($destinations_parent_id != 0) {    // if parent is not root means not main parent
                                                $input_type_destination = 'checkbox';   // if first level then select multiple destination
                                            }
                                        }
                                        if ($input_type_destination == 'checkbox') {
                                            $traveladvisor_opt_array = array(
                                                'id' => '',
                                                'std' => '',
                                                'cust_id' => "destinations_string_all",
                                                'cust_name' => 'destinations_string_all',
                                            );
                                            echo $traveladvisor_form_fields2->traveladvisor_form_hidden_render($traveladvisor_opt_array);
                                        }

                                        if ($all_destinations != '') {
                                            $al_destinations = array();
                                            $traveladvisor_arguments = array('post_type' => 'destination',
                                                'posts_per_page' => -1,);
                                            $traveladvisor_a = 0;
                                            $traveladvisor_var_destinations_list = new WP_Query($traveladvisor_arguments);
                                            $alll_destinations = array();
                                            while ($traveladvisor_var_destinations_list->have_posts()): $traveladvisor_var_destinations_list->the_post();
                                                $alll_destinations = get_the_title();
                                                if ($traveladvisor_a >= 5) {
                                                    $al_destinations = get_the_title();
                                                }
                                                $traveladvisor_a++;
                                            endwhile;
                                            wp_reset_postdata();
                                            if (is_array($al_destinations)) {
                                                foreach ($al_destinations as $destinationsitem) {
                                                    $job_id_para = '';
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
                                                    $destinations_loop_count = new WP_Query($destinations_mypost);
                                                    $destinations_count_post = $destinations_loop_count->post_count;
                                                    if ($input_type_destination == 'checkbox') {
                                                        if (isset($destinations) && is_array($destinations)) {
                                                            if (in_array($destinationsitem, $destinations)) {
                                                                echo '<li class="' . $input_type_destination . '">';
                                                                $traveladvisor_opt_array = array(
                                                                    'extra_atr' => 'onchange="javascript:submit_destination_form(\'frm_all_destinations' . $random_id . '\', \'destinations_string_all\');"  checked="checked"',
                                                                    'cust_name' => 'destinations',
                                                                    'cust_id' => 'checklistcomplete' . esc_attr($number_option),
                                                                    'classes' => '',
                                                                    'std' => $destinationsitem,
                                                                    'return' => true,
                                                                );
                                                                echo $traveladvisor_form_fields2->traveladvisor_form_checkbox_render($traveladvisor_opt_array);
                                                                echo '<label for="checklist' . $number_option . '">' . $destinationsitem . ' </label></li>';
                                                            } else {
                                                                echo '<li class="' . $input_type_destination . '">';
                                                                $traveladvisor_opt_array = array(
                                                                    'extra_atr' => 'onchange="submit_destination_form(\'frm_all_destinations' . $random_id . '\', \'destinations_string_all\');" ',
                                                                    'cust_name' => '',
                                                                    'cust_id' => 'checklistcomplete' . esc_attr($number_option),
                                                                    'classes' => '',
                                                                    'std' => $destinationsitem,
                                                                    'return' => true,
                                                                );
                                                                echo $traveladvisor_form_fields2->traveladvisor_form_checkbox_render($traveladvisor_opt_array);
                                                                echo '<label for="checklist' . $number_option . '">' . $destinationsitem . '</label></li>';
                                                            }
                                                        } else {
                                                            echo '<li class="' . $input_type_destination . '">';
                                                            $traveladvisor_opt_array = array(
                                                                'extra_atr' => 'onchange="submit_destination_form(\'frm_all_destinations' . $random_id . '\', \'destinations_string_all\');" ',
                                                                'cust_name' => '',
                                                                'cust_id' => 'checklistcomplete' . esc_attr($number_option),
                                                                'classes' => '',
                                                                'std' => $destinationsitem,
                                                                'return' => true,
                                                            );
                                                            echo $traveladvisor_form_fields2->traveladvisor_form_checkbox_render($traveladvisor_opt_array);
                                                            echo '<label for="checklist' . $number_option . '">' . $destinationsitem . ''
                                                            . '</label></li>';
                                                        }
                                                    } else
                                                    if ($input_type_destination == 'radio') {
                                                        if (isset($destinations) && is_array($destinations)) {
                                                            if (in_array($destinationsitem, $destinations)) {
                                                                echo '<li class="' . $input_type_destination . '">';
                                                                $traveladvisor_opt_array = array(
                                                                    'extra_atr' => 'onchange="javascript:frm_all_destinations' . $random_id . '.submit();"',
                                                                    'cust_name' => 'destinations',
                                                                    'cust_id' => 'checklistcomplete' . esc_attr($number_option),
                                                                    'classes' => '',
                                                                    'std' => $destinationsitem,
                                                                    'return' => true,
                                                                );
                                                                echo $traveladvisor_form_fields2->traveladvisor_form_radio_render($traveladvisor_opt_array);
                                                                echo '<label  class="active" for="checklistcomplete' . $number_option . '">' . $destinationsitem . ' '
                                                                . '  '
                                                                . '<i class="icon-check-circle"></i></label></li>';
                                                            } else {
                                                                echo '<li class="' . $input_type_destination . '">';

                                                                $traveladvisor_opt_array = array(
                                                                    'extra_atr' => 'onchange="javascript:frm_all_destinations' . $random_id . '.submit();"',
                                                                    'cust_name' => 'destinations',
                                                                    'cust_id' => 'checklistcomplete' . esc_attr($number_option),
                                                                    'classes' => '',
                                                                    'std' => $destinationsitem,
                                                                    'return' => true,
                                                                );
                                                                echo $traveladvisor_form_fields2->traveladvisor_form_radio_render($traveladvisor_opt_array);
                                                                echo '<label for="checklistcomplete' . $number_option . '">' . $destinationsitem . ''
                                                                . '</label></li>';
                                                            }
                                                        } else {
                                                            echo '<li class="' . $input_type_destination . '">';
                                                            $traveladvisor_opt_array = array(
                                                                'extra_atr' => 'onchange="javascript:frm_all_destinations' . $random_id . '.submit();"',
                                                                'cust_name' => 'destinations',
                                                                'cust_id' => 'checklistcomplete' . esc_attr($number_option),
                                                                'classes' => '',
                                                                'std' => $destinationsitem,
                                                                'return' => true,
                                                            );
                                                            echo $traveladvisor_form_fields2->traveladvisor_form_radio_render($traveladvisor_opt_array);
                                                            echo '<label for="checklistcomplete' . $number_option . '">' . $destinationsitem . ''
                                                            . '</label></li>';
                                                        }
                                                    }
                                                    $number_option++;
                                                }
                                            }
                                        }
                                        $al_destinations = "";
                                        ?>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } // end destinations popup
        $rand_id = rand(0, 999999);
        ?>
        <div id="fade<?php echo esc_html($rand_id); ?>" class="black_overlay"></div>
        <!-- end popup -->
        <div class="row">
			
			 <div class="cs-inventories-main-box" data-ajaxurl="<?php echo admin_url('admin-ajax.php') ?>" data-counter="<?php echo (isset($a['traveladvisor_inventories_counter']) ? $a['traveladvisor_inventories_counter'] : '') ?>">
            <?php
            if ($a['traveladvisor_var_tour_filteration'] == 'yes') {
                include('cs-traveladvisor-searchbox.php');
            }
          
            if ($a['traveladvisor_var_tour_view'] == 'tour_grid') {
                include('views/tour-grid.php');
            }
            if ($a['traveladvisor_var_tour_view'] == 'tour_listing') {
                include('views/tour-list.php');
                ?>
			</div>
                   </div>
            <?php
            }
            ?>
            </div>
 
            <?php

        $eventpost_data = ob_get_clean();
        return do_shortcode($eventpost_data);
    }

    add_shortcode('traveladvisor_tour', 'traveladvisor_tour_listing');
}