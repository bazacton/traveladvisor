<?php
/**
 * Start Function how to Add User Image for Avatar
 */
if (!function_exists('traveladvisor_get_user_avatar')) {

    function traveladvisor_get_user_avatar($size = 0, $traveladvisor_user_id = '') {
        if ($traveladvisor_user_id != '') {
            $traveladvisor_user_avatars = get_the_author_meta('user_avatar_display', $traveladvisor_user_id);

            if (is_array($traveladvisor_user_avatars) && isset($traveladvisor_user_avatars[$size])) {
                return $traveladvisor_user_avatars[$size];
            } else if (!is_array($traveladvisor_user_avatars) && $traveladvisor_user_avatars <> '') {
                return $traveladvisor_user_avatars;
            }
        }
    }

}

if (!function_exists('traveladvisor_author_role_template')) {

    function traveladvisor_author_role_template($author_template = '') {
        $author = get_queried_object();
        $role = $author->roles[0];

        if ($role == 'traveladvisor_employer') {
            $author_template = plugin_dir_path(__FILE__) . 'single_pages/single-employer.php';
        } else if ($role == 'traveladvisor_candidate') {
            $author_template = plugin_dir_path(__FILE__) . 'single_pages/single-candidate.php';
        }

        return $author_template;
    }

    add_filter('author_template', 'traveladvisor_author_role_template');
}

if (!function_exists('traveladvisor_user_pagination')) {

    function traveladvisor_user_pagination($total_pages = 1, $page = 1) {
        
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();

        $query_string = $_SERVER['QUERY_STRING'];

        $base = get_permalink() . '?' . remove_query_arg('page_id_all', $query_string) . '%_%';

        $traveladvisor_pagination = paginate_links(array(
            'base' => $base, // the base URL, including query arg
            'format' => '&page_id_all=%#%', // this defines the query parameter that will be used, in this case "p"
            'prev_text' => '<i class="icon-angle-left"></i> ' . traveladvisor_var_theme_text_srt('traveladvisor_var_previous'), // text for previous page
            'next_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_next') . ' <i class="icon-angle-right"></i>', // text for next page
            'total' => $total_pages, // the total number of pages we have
            'current' => $page, // the current page
            'end_size' => 1,
            'mid_size' => 2,
            'type' => 'array',
        ));
        //print_r($traveladvisor_pagination);
        $traveladvisor_pages = '';
        if (is_array($traveladvisor_pagination) && sizeof($traveladvisor_pagination) > 0) {
            $traveladvisor_pages .= '<ul class="pagination">';
            foreach ($traveladvisor_pagination as $traveladvisor_link) {
                if (strpos($traveladvisor_link, 'current') !== false) {
                    $traveladvisor_pages .= '<li><a class="active">' . preg_replace("/[^0-9]/", "", $traveladvisor_link) . '</a></li>';
                } else {
                    $traveladvisor_pages .= '<li>' . $traveladvisor_link . '</li>';
                }
            }
            $traveladvisor_pages .= '</ul>';
        }
        echo traveladvisor_allow_special_char($traveladvisor_pages);
    }

}

if (!function_exists('traveladvisor_show_all_cats')) {

    function traveladvisor_show_all_cats($parent, $separator, $selected = "", $taxonomy, $optional = '') {
        
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();

        if ($parent == "") {
            global $wpdb;
            $parent = 0;
        } else
            $separator .= " &ndash; ";
        $args = array(
            'parent' => $parent,
            'hide_empty' => 0,
            'taxonomy' => $taxonomy
        );
        $categories = get_categories($args);

        if ($optional) {
            $a_options = array();
            $a_options[''] = traveladvisor_var_theme_text_srt('traveladvisor_var_please_select');
            foreach ($categories as $category) {
                $a_options[$category->slug] = $category->cat_name;
            }

            return $a_options;
        } else {
            foreach ($categories as $category) {
                ?>
                <option <?php
                if ($selected == $category->slug) {
                    echo "selected";
                }
                ?> value="<?php echo esc_attr($category->slug); ?>"><?php echo esc_attr($separator . $category->cat_name); ?></option>
                    <?php
                    traveladvisor_show_all_cats($category->term_id, $separator, $selected, $taxonomy);
                }
            }
        }

    }

    /**
     * End Function how to Add User Image for Avatar
     */
    /**
     * Start Function how to Set Post Views
     */
    if (!function_exists('traveladvisor_set_post_views')) {

        function traveladvisor_set_post_views($postID) {
            if (!isset($_COOKIE["traveladvisor_count_views" . $postID])) {
                setcookie("traveladvisor_count_views" . $postID, 'post_view_count', time() + 86400);
                $count_key = 'traveladvisor_count_views';
                $count = get_post_meta($postID, $count_key, true);
                if ($count == '') {
                    $count = 0;
                    delete_post_meta($postID, $count_key);
                    add_post_meta($postID, $count_key, '0');
                } else {
                    $count++;
                    update_post_meta($postID, $count_key, $count);
                }
            }
        }

    }
    /**
     * End Function how to Set Post Views
     */
    /**
     * Start Function how to Share Posts
     */
    if (!function_exists('traveladvisor_addthis_script_init_method')) {

        function traveladvisor_addthis_script_init_method() {
            wp_enqueue_script('traveladvisor_addthis', traveladvisor_server_protocol() . 's7.addthis.com/js/250/addthis_widget.js#pubid=xa-4e4412d954dccc64', '', '', true);
        }

    }
    /**
     * End Function how to Share Posts
     */
    /**
     * check whether file exsit or not
     */
    if (!function_exists('traveladvisor_check_coverletter_exist')) {

        function traveladvisor_check_coverletter_exist($file) {
            $is_exist = false;
            if (isset($file) && $file <> "") {
                $file_headers = @get_headers($file);
                if ($file_headers[0] == 'HTTP/1.1 404 Not Found') {
                    $is_exist = false;
                } else {
                    $is_exist = true;
                }
            }
            return $is_exist;
        }

    }
    /**
     * End check whether file exsit or not
     */
    /**
     * Start Function how to Get Current User ID
     */
    if (!function_exists('traveladvisor_get_user_id')) {

        function traveladvisor_get_user_id() {
            global $current_user;
            wp_get_current_user();
            return $current_user->ID;
        }

    }
    /**
     * End Function how to Get Current User ID
     */
    /**
     * Start Function how to Add your Favourite Dirpost
     */
    if (!function_exists('traveladvisor_add_dirpost_favourite')) {

        function traveladvisor_add_dirpost_favourite($traveladvisor_post_id = '') {
            global $post;
            
            $strings = new traveladvisor_theme_all_strings;
            $strings -> traveladvisor_theme_strings();
            
            $traveladvisor_emp_funs = new traveladvisor_employer_functions();
            $traveladvisor_post_id = isset($traveladvisor_post_id) ? $traveladvisor_post_id : '';
            ?>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
            });
        </script>
        <?php
        if (!is_user_logged_in() || !$traveladvisor_emp_funs->is_employer()) {
            if (is_user_logged_in()) {
                $user = traveladvisor_get_user_id();
                //traveladvisor_var_theme_text_srt('traveladvisor_var_please_select')
                $finded_result_list = traveladvisor_find_index_user_meta_list($traveladvisor_post_id, 'cs-user-jobs-wishlist', 'post_id', traveladvisor_get_user_id());
                if (isset($user) and $user <> '' and is_user_logged_in()) {
                    if (is_array($finded_result_list) && !empty($finded_result_list)) {
                        ?>
                        <a class="cs-add-wishlist tolbtn" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_shortlist'); ?>" onclick="traveladvisor_delete_from_favourite('<?php echo esc_url(admin_url('admin-ajax.php')); ?>', '<?php echo intval($traveladvisor_post_id); ?>', 'post')" >

                            <i class="icon-heart6"></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_shortlisted'); ?>
                        </a>
                        <?php
                    } else {
                        ?>
                        <a class="cs-add-wishlist tolbtn" onclick="traveladvisor_addto_wishlist('<?php echo esc_url(admin_url('admin-ajax.php')); ?>', '<?php echo intval($traveladvisor_post_id); ?>', 'post')" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_shortlisted') ; ?>">
                            <i class="icon-heart-o"></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_shortlist'); ?>
                        </a>
                        <?php
                    }
                } else {
                    ?>
                    <a class="cs-add-wishlist tolbtn" onclick="traveladvisor_addto_wishlist('<?php echo esc_url(admin_url('admin-ajax.php')); ?>', '<?php echo intval($traveladvisor_post_id); ?>', 'post')" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_shortlisted'); ?>"> 
                        <i class="icon-heart-o"></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_shortlist'); ?>
                    </a>	
                    <?php
                }
            } else {
                ?>
                <a href="javascript:void(0);" class="cs-add-wishlist" onclick="trigger_func('#btn-header-main-login');"><i class="icon-heart-o"></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_shortlist'); ?> </a>
                <?php
            }
        }
    }

}
/**
 * End Function how to Add your Favourite Dirpost
 */
/**
 * Start Function how to Add User Meta
 */
if (!function_exists('traveladvisor_addto_usermeta')) {

    function traveladvisor_addto_usermeta() {
        
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        
        $user = traveladvisor_get_user_id();
        if (isset($user) && $user <> '') {
            if (isset($_POST['post_id']) && $_POST['post_id'] <> '') {
                traveladvisor_create_user_meta_list($_POST['post_id'], 'cs-user-jobs-wishlist', $user);
                ?>
                <i class="icon-heart6"></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_shortlisted'); ?>
                <?php
            }
        } else {
            echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_login_first_notice');
        }
        die();
    }

    add_action("wp_ajax_traveladvisor_addto_usermeta", "traveladvisor_addto_usermeta");
    add_action("wp_ajax_nopriv_traveladvisor_addto_usermeta", "traveladvisor_addto_usermeta");
}
/**
 * End Function how to Add User Meta
 */
/**
 * Start Function how to Add User Apply Meta For Job
 */
if (!function_exists('traveladvisor_get_user_jobapply_meta')) {

    function traveladvisor_get_user_jobapply_meta($user = "") {
        if (!empty($user)) {
            $userdata = get_user_by('login', $user);
            $user_id = $userdata->ID;
            return get_user_meta($user_id, 'cs-jobs-applied', true);
        } else {
            return get_user_meta(traveladvisor_get_user_id(), 'cs-jobs-applied', true);
        }
    }

}
/**
 * End Function how to Add User Apply Meta For Job
 */
/**
 * Start Function how to Update User Apply Meta For Job
 */
if (!function_exists('traveladvisor_update_user_jobapply_meta')) {

    function traveladvisor_update_user_jobapply_meta($arr) {
        return update_user_meta(traveladvisor_get_user_id(), 'cs-jobs-applied', $arr);
    }

}
/**
 * End Function how to Update User Apply Meta For Job
 */
/**
 * Start Function how to Delete Favourites User 
 */
if (!function_exists('traveladvisor_delete_from_favourite')) {

    function traveladvisor_delete_from_favourite() {
        
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        
        $user = traveladvisor_get_user_id();
        if (isset($user) && $user <> '') {
            if (isset($_POST['post_id']) && $_POST['post_id'] <> '') {
                traveladvisor_remove_from_user_meta_list($_POST['post_id'], 'cs-user-jobs-wishlist', $user);
                echo '<i class="icon-heart-o"></i>';
                echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_shortlist');
            } else {
                echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_not_authorised');
            }
        }
        die();
    }

    add_action("wp_ajax_traveladvisor_delete_from_favourite", "traveladvisor_delete_from_favourite");
    add_action("wp_ajax_nopriv_traveladvisor_delete_from_favourite", "traveladvisor_delete_from_favourite");
}
/**
 * End Function how to Delete Favourites User 
 */
/**
 * Start Function how to Delete User From Wishlist 
 */
if (!function_exists('traveladvisor_delete_wishlist')) {

    function traveladvisor_delete_wishlist() {
        
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        
        $user = traveladvisor_get_user_id();
        if (isset($user) && $user <> '') {
            // check this record is in his list
            if (isset($_POST['post_id']) && $_POST['post_id'] <> '') {
                traveladvisor_remove_from_user_meta_list($_POST['post_id'], 'cs-user-jobs-wishlist', $user);
               echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_remove_favourite');
            } else {
                echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_not_authorised');
            }
        }
        die();
    }

    add_action("wp_ajax_traveladvisor_delete_wishlist", "traveladvisor_delete_wishlist");
    add_action("wp_ajax_nopriv_traveladvisor_delete_wishlist", "traveladvisor_delete_wishlist");
}

add_filter('wp_mail_from_name', 'traveladvisor_wp_mail_from_name');

function traveladvisor_wp_mail_from_name($original_email_from) {
    return get_bloginfo('name');
}

/**
 * End Function how to Delete User From Wishlist 
 */
/**
 * Start Function how to send mail using Ajax
 */
if (!function_exists('ajaxcontact_send_mail')) {

    function ajaxcontact_send_mail() {
        
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        
        $results = '';
        $error = 0;
        $error_result = 0;
        $message = "";
        $name = '';
        $email = '';
        $phone = '';
        $contents = '';
        $candidateid = '';
        if (isset($_POST['traveladvisor_ajaxcontactname'])) {
            $name = $_POST['traveladvisor_ajaxcontactname'];
        }
        if (isset($_POST['traveladvisor_ajaxcontactemail'])) {
            $email = $_POST['traveladvisor_ajaxcontactemail'];
        }
        if (isset($_POST['traveladvisor_ajaxcontactphone'])) {
            $phone = $_POST['traveladvisor_ajaxcontactphone'];
        }
        if (isset($_POST['traveladvisor_ajaxcontactcontents'])) {
            $contents = $_POST['traveladvisor_ajaxcontactcontents'];
        }

        if ($name == '') {
            if (isset($_POST['ajaxcontactname'])) {
                $name = $_POST['ajaxcontactname'];
            }
        }
        if ($email == '') {
            if (isset($_POST['ajaxcontactemail'])) {
                $email = $_POST['ajaxcontactemail'];
            }
        }
        if ($phone == '') {
            if (isset($_POST['ajaxcontactphone'])) {
                $phone = $_POST['ajaxcontactphone'];
            }
        }
        if ($contents == '') {
            if (isset($_POST['ajaxcontactcontents'])) {
                $contents = $_POST['ajaxcontactcontents'];
            }
        }
        if (isset($_POST['candidateid'])) {
            $candidateid = $_POST['candidateid'];   // user id for candidate
        }
        if (isset($_POST['traveladvisor_terms_page'])) {
            $traveladvisor_terms_page = 'on';
            $traveladvisor_contact_terms = isset($_POST['traveladvisor_contact_terms']) ? $_POST['traveladvisor_contact_terms'] : '';
        } else {
            $traveladvisor_terms_page = 'off';
            $traveladvisor_contact_terms = '';
        }

        $subject = traveladvisor_var_theme_text_srt('traveladvisor_var_theme_employer_contact');
        $admin_email_from = get_option('admin_email');
        // getting candidate email address
        // getting email address from user table
        $traveladvisor_user_id = $candidateid;
        $user_info = get_userdata($traveladvisor_user_id);
        $admin_email = '';
        if (isset($user_info->user_email) && $user_info->user_email <> '') {
            $admin_email = $user_info->user_email;
        }
        if ($admin_email != '' && filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {


            if (strlen($name) == 0) {
                $results = "&nbsp; <span style=\"color: #ff0000;\">Please enter name.</span><br/>";
                $error = 1;
                $error_result = 1;
            } else if (strlen($email) == 0) {
                $results = "&nbsp; <span style=\"color: #ff0000;\">Please enter email.</span><br/>";
                $error = 1;
                $error_result = 1;
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $results = " '" . $email . "' email address is not valid.";
                $error = 1;
                $error_result = 1;
            } else if (strlen($contents) == 0 || strlen($contents) < 50) {
                $results = "&nbsp; <span style=\"color: #ff0000;\">Message should have more than 50 characters</span><br/>";
                $error = 1;
                $error_result = 1;
            } else if ($traveladvisor_terms_page == 'on' && $traveladvisor_contact_terms != 'on') {
                $results = "&nbsp; <span style=\"color: #ff0000;\">You should accept Terms and Conditions.</span>";
                $error = 1;
                $error_result = 1;
            } else if (traveladvisor_captcha_verify(true)) {
                $results = "&nbsp; <span style=\"color: #ff0000;\">Captcha should must be validate</span>";
                $error = 1;
                $error_result = 1;
            }

            $headers = "From: " . $email . "\r\n";
            $headers .= "Reply-To: " . $email . "\r\n";
            $headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";

            $contents = 'Name:' . $name . "\n" . 'Email:' . $email . "\n" . 'Phone:' . $phone . "\n" . $contents;
            if ($error == 0) {
                $email_sent = apply_filters('send_mails_theme',$admin_email,$subject,$contents, $headers, '');
                $respose = $email_sent;
                if ($respose) {
                    $error = 0;
                    $error_result = 0;
                    //$strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
                    $results = "&nbsp; <span style=\"color: #060;\">'.Email has been Successfully Sent.'</span>";
                } else {
                    $error = 1;
                    $error_result = 1;
                    $results = "&nbsp; <span style=\"color: #ff0000;\">*'.There is an Error Please Try again.'</span>";
                }
            }
        } else {
            $results = "&nbsp; <span style=\"color: #ff0000;\">*The profile email does not exist, Please try later</span>";
            $error = 1;
            $error_result = 1;
        }

        if ($error_result == 1) {
            $data = 1;
            $message = $results;
            die($message);
        } else {
            $data = 0;
            $message = $results;
            die($message);
        }
    }

    // creating Ajax call for WordPress
    add_action('wp_ajax_nopriv_ajaxcontact_send_mail', 'ajaxcontact_send_mail');
    add_action('wp_ajax_ajaxcontact_send_mail', 'ajaxcontact_send_mail');
}
/**
 * End Function how to send mail using Ajax
 */
/**
 * Start Function how to send Employeer Contact mail using Ajax
 */
if (!function_exists('ajaxcontact_employer_send_mail')) {

    function ajaxcontact_employer_send_mail() {
        global $traveladvisor_plugin_options;
        $results = '';
        $message = "";
        $error = 0;
        $name = '';
        $email = '';
        $phone = '';
        $employerid_contactuscheckbox = '';
        $phone = '';

        $error_result = 0;
        $contents = '';
        $employerid = '';
        $traveladvisor_captcha_switch = isset($traveladvisor_plugin_options['traveladvisor_captcha_switch']) ? $traveladvisor_plugin_options['traveladvisor_captcha_switch'] : '';
        if (isset($_POST['ajaxcontactname'])) {
            $name = $_POST['ajaxcontactname'];
        }
        if (isset($_POST['employerid_contactuscheckbox'])) {
            $employerid_contactuscheckbox = $_POST['employerid_contactuscheckbox'];
        }
        if (isset($_POST['ajaxcontactemail'])) {
            $email = $_POST['ajaxcontactemail'];
        }if (isset($_POST['ajaxcontactphone'])) {
            $phone = $_POST['ajaxcontactphone'];
        }if (isset($_POST['ajaxcontactcontents'])) {
            $contents = $_POST['ajaxcontactcontents'];
        }if (isset($_POST['employerid'])) {
            $employerid = $_POST['employerid'];
        }
        if (isset($_POST['traveladvisor_terms_page'])) {
            $traveladvisor_terms_page = 'on';
            $traveladvisor_contact_terms = isset($_POST['traveladvisor_contact_terms']) ? $_POST['traveladvisor_contact_terms'] : '';
        } else {
            $traveladvisor_terms_page = 'off';
            $traveladvisor_contact_terms = '';
        }

        // user id for candidate
        $subject = "";
        $admin_email_from = get_option('admin_email');
        // getting employer email address
        $traveladvisor_user_id = $employerid;
        $user_info = get_userdata($traveladvisor_user_id);
        $admin_email = '';
        if (isset($user_info->user_email)) {
            $admin_email = $user_info->user_email;
        }

        if ($admin_email != '' && filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {

            if (strlen($name) == 0) {
                $results = "&nbsp; <span style=\"color: #ff0000;\">Please enter name</span>.<br/>";
                $error = 1;
                $error_result = 1;
            } else if (strlen($email) == 0) {
                $results = "&nbsp; <span style=\"color: #ff0000;\">Please enter email.</span><br/>";
                $error = 1;
                $error_result = 1;
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $results = "&nbsp; '<span style=\"color: #ff0000;\">" . $email . "' email address is not valid.</span><br/>";
                $error = 1;
                $error_result = 1;
            } else if (strlen($contents) == 0 || strlen($contents) < 50) {
                $results = "&nbsp; <span style=\"color: #ff0000;\">Message should have more than 50 characters</span><br/>";
                $error = 1;
                $error_result = 1;
            } else if ($traveladvisor_terms_page == 'on' && $traveladvisor_contact_terms != 'on') {
                $results = "&nbsp; <span style=\"color: #ff0000;\">You should accept Terms and Conditions.</span>";
                $error = 1;
                $error_result = 1;
            } else if (traveladvisor_captcha_verify(true)) {
                $results = "&nbsp; <span style=\"color: #ff0000;\">Captcha should must be validate.</span><br/>";
                $error = 1;
                $error_result = 1;
            }

            $headers = "From: " . $email . "\r\n";
            $headers .= "Reply-To: " . $email . "\r\n";
            $headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";

            $contents = 'Name:' . $name . "\n" . 'Email:' . $email . "\n" . 'Phone:' . $phone . "\n" . $contents;
            if ($error == 0) {
                $email_sent = apply_filters('send_mails_theme', $admin_email, $subject, $contents, $headers, '');
                $respose = $email_sent;

                if ($respose) {
                    $error_result = 0;
                    $results = "&nbsp; <span style=\"color: #060;\">Your inquery has been sent User will contact you shortly</span>";
                } else {
                    $error_result = 1;

                    $results = "&nbsp; <span style=\"color: #ff0000;\">*The mail could not be sent due to some resons, Please try again</span> ";
                }
            }
        } else {
            $results = "&nbsp; <span style=\"color: #ff0000;\">**The profile email does not exist, Please try later.</span> ";
            $error = 1;
            $error_result = 1;
        }

        if ($error_result == 1) {
            $data = 1;
            $message = $results . '|' . $data;
            die($message);
        } else {
            $data = 0;
            $message = $results . '|' . $data;
            die($message);
        }
    }

    // creating Ajax call for WordPress
    add_action('wp_ajax_nopriv_ajaxcontact_employer_send_mail', 'ajaxcontact_employer_send_mail');
    add_action('wp_ajax_ajaxcontact_employer_send_mail', 'ajaxcontact_employer_send_mail');
}


/**
 * End Function how to send Employeer Contact mail using Ajax
 */
/**
 *
 * @time elapsed string
 *
 */
if (!function_exists('traveladvisor_time_elapsed_string')) {

    function traveladvisor_time_elapsed_string($ptime) {
        return human_time_diff($ptime, current_time('timestamp')) . ' ago';
    }

}
/**
 * Start Function how to create Custom Pagination
 */
if (!function_exists('traveladvisor_pagination')) {

    function traveladvisor_pagination($total_records, $per_page, $qrystr = '', $show_pagination = 'Show Pagination', $query_string_variable = 'page_id_all') {
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        
        if ($show_pagination <> 'Show Pagination') {
            return;
        } else if ($total_records < $per_page) {
            return;
        } else {
            $html = '';
            $dot_pre = '';
            $dot_more = '';
            $total_page = 0;
            if ($per_page <> 0)
                $total_page = ceil($total_records / $per_page);
            $page_id_all = 0;
            if (isset($_GET[$query_string_variable]) && $_GET[$query_string_variable] != '') {
                $page_id_all = $_GET[$query_string_variable];
            }
            $loop_start = $page_id_all - 2;
            $loop_end = $page_id_all + 2;
            if ($page_id_all < 3) {
                $loop_start = 1;
                if ($total_page < 5)
                    $loop_end = $total_page;
                else
                    $loop_end = 5;
            }
            else if ($page_id_all >= $total_page - 1) {
                if ($total_page < 5)
                    $loop_start = 1;
                else
                    $loop_start = $total_page - 4;
                $loop_end = $total_page;
            }
            
            $html .= "<ul class='pagination'>";
            if ($page_id_all > 1) {
                $html .= "<li><a href='?$query_string_variable=" . ($page_id_all - 1) . "$qrystr' aria-label='Previous' ><span aria-hidden='true'><i class='icon-angle-left'></i> " . traveladvisor_var_theme_text_srt('traveladvisor_var_previous') . " </span></a></li>";
            } else {
                $html .= "<li><a aria-label='Previous'><span aria-hidden='true'><i class='icon-angle-left'></i> " . traveladvisor_var_theme_text_srt('traveladvisor_var_previous') . "</span></a></li>";
            }
            if ($page_id_all > 3 and $total_page > 5)
                $html .= "<li><a href='?$query_string_variable=1$qrystr'>1</a></li>";
            if ($page_id_all > 4 and $total_page > 6)
                $html .= "<li> <a>. . .</a> </li>";
            if ($total_page > 1) {
                for ($i = $loop_start; $i <= $loop_end; $i++) {
                    if ($i <> $page_id_all)
                        $html .= "<li><a href='?$query_string_variable=$i$qrystr'>" . $i . "</a></li>";
                    else
                        $html .= "<li><a class='active'>" . $i . "</a></li>";
                }
            }
            if ($loop_end <> $total_page and $loop_end <> $total_page - 1)
                $html .= "<li> <a>. . .</a> </li>";
            if ($loop_end <> $total_page)
                $html .= "<li><a href='?$query_string_variable=$total_page$qrystr'>$total_page</a></li>";
            if ($per_page > 0 and $page_id_all < $total_records / $per_page) {
                $html .= "<li><a aria-label='Next' href='?$query_string_variable=" . ($page_id_all + 1) . "$qrystr' ><span aria-hidden='true'>" . traveladvisor_var_theme_text_srt('traveladvisor_var_next') . " <i class='icon-angle-right'></i></span></a></li>";
            } else {
                $html .= "<li><a aria-label='Next'><span aria-hidden='true'>" . traveladvisor_var_theme_text_srt('traveladvisor_var_next') . " <i class='icon-angle-right'></i></span></a></li>";
            }
            $html .= "</ul>";
            return $html;
        }
    }

}
/**
 * End Function how to create Custom Pagination
 */
/**
 * Start Function how to create Custom Pagination using Ajax
 */
if (!function_exists('traveladvisor_ajax_pagination')) {

    function traveladvisor_ajax_pagination($total_records, $per_page, $tab, $type, $uid, $pack_array) {
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        
        $admin_url = esc_url(admin_url('admin-ajax.php'));
        if ($total_records < $per_page) {
            return;
        } else {
            $html = '';
            $dot_pre = '';
            $dot_more = '';
            $total_page = 0;
            if ($per_page <> 0)
                $total_page = ceil($total_records / $per_page);
            $page_id_all = 0;
            if (isset($_REQUEST['page_id_all']) && $_REQUEST['page_id_all'] != '') {
                $page_id_all = $_REQUEST['page_id_all'];
            }
            $loop_start = $page_id_all - 2;
            $loop_end = $page_id_all + 2;
            if ($page_id_all < 3) {
                $loop_start = 1;
                if ($total_page < 5)
                    $loop_end = $total_page;
                else
                    $loop_end = 5;
            }
            else if ($page_id_all >= $total_page - 1) {
                if ($total_page < 5)
                    $loop_start = 1;
                else
                    $loop_start = $total_page - 4;
                $loop_end = $total_page;
            }
            $html .= "<ul class='pagination'>";
            if ($page_id_all > 1) {
                $html .= "<li><a onclick=\"traveladvisor_dashboard_tab_load('" . $tab . "', '" . $type . "', '" . $admin_url . "', '" . $uid . "', '" . $pack_array . "', '" . ($page_id_all - 1) . "')\" href='javascript:void(0);' aria-label='Previous' ><span aria-hidden='true'><i class='icon-angle-left'></i> " . traveladvisor_var_theme_text_srt('traveladvisor_var_previous') . " </span></a></li>";
            } else {
                $html .= "<li><a aria-label='Previous'><span aria-hidden='true'><i class='icon-angle-left'></i> " . traveladvisor_var_theme_text_srt('traveladvisor_var_previous') . "</span></a></li>";
            }
            if ($page_id_all > 3 and $total_page > 5)
                $html .= "<li><a href='javascript:void(0);' onclick=\"traveladvisor_dashboard_tab_load('" . $tab . "', '" . $type . "', '" . $admin_url . "', '" . $uid . "', '" . $pack_array . "', '1')\">1</a></li>";
            if ($page_id_all > 4 and $total_page > 6)
                $html .= "<li> <a>. . .</a> </li>";
            if ($total_page > 1) {
                for ($i = $loop_start; $i <= $loop_end; $i++) {
                    if ($i <> $page_id_all)
                        $html .= "<li><a href='javascript:void(0);' onclick=\"traveladvisor_dashboard_tab_load('" . $tab . "', '" . $type . "', '" . $admin_url . "', '" . $uid . "', '" . $pack_array . "', '" . ($i) . "')\" >" . $i . "</a></li>";
                    else
                        $html .= "<li><a class='active'>" . $i . "</a></li>";
                }
            }
            if ($loop_end <> $total_page and $loop_end <> $total_page - 1)
                $html .= "<li> <a>. . .</a> </li>";
            if ($loop_end <> $total_page)
                $html .= "<li><a href='javascript:void(0);' onclick=\"traveladvisor_dashboard_tab_load('" . $tab . "', '" . $type . "', '" . $admin_url . "', '" . $uid . "', '" . $pack_array . "', '" . ($total_page) . "')\">$total_page</a></li>";
            if ($per_page > 0 and $page_id_all < $total_records / $per_page) {
                $html .= "<li><a href='javascript:void(0);' aria-label='Next' onclick=\"traveladvisor_dashboard_tab_load('" . $tab . "', '" . $type . "', '" . $admin_url . "', '" . $uid . "', '" . $pack_array . "','" . ($page_id_all + 1) . "')\" ><span aria-hidden='true'>" . traveladvisor_var_theme_text_srt('traveladvisor_var_next') . " <i class='icon-angle-right'></i></span></a></li>";
            } else {
                $html .= "<li><a href='javascript:void(0);' aria-label='Next'><span aria-hidden='true'>" . traveladvisor_var_theme_text_srt('traveladvisor_var_next') . " <i class='icon-angle-right'></i></span></a></li>";
            }
            $html .= "</ul>";
            return $html;
        }
    }

}
/**
 * End Function how to create Custom Pagination using Ajax
 */
/**
 * Start Function how to Add Job User Meta
 */
if (!function_exists('traveladvisor_addjob_to_usermeta')) {

    function traveladvisor_addjob_to_usermeta() {
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        $user = traveladvisor_get_user_id();
        if (isset($user) && $user <> '') {
            if (isset($_POST['post_id']) && $_POST['post_id'] <> '') {
                traveladvisor_create_user_meta_list($_POST['post_id'], 'cs-user-jobs-wishlist', $user);
                ?>
                <i class="icon-heart6"></i>
                <?php
            }
        } else {
            echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_login_first_notice');
        }
        die();
    }

    add_action("wp_ajax_traveladvisor_addjob_to_usermeta", "traveladvisor_addjob_to_usermeta");
    add_action("wp_ajax_nopriv_traveladvisor_addjob_to_usermeta", "traveladvisor_addjob_to_usermeta");
}


if (!function_exists('traveladvisor_addjob_to_user')) {

    function traveladvisor_addjob_to_user() {
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        $user = traveladvisor_get_user_id();
        if (isset($user) && $user <> '') {
            if (isset($_POST['post_id']) && $_POST['post_id'] <> '') {
                traveladvisor_create_user_meta_list($_POST['post_id'], 'cs-user-jobs-wishlist', $user);
                ?>
                <i class="icon-heart6"></i>
                <?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_shortlisted'); ?>
                <?php
            }
        } else {
            echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_login_first_notice');
        }
        die();
    }

    add_action("wp_ajax_traveladvisor_addjob_to_user", "traveladvisor_addjob_to_user");
    add_action("wp_ajax_nopriv_traveladvisor_addjob_to_user", "traveladvisor_addjob_to_user");
}
/**
 * End Function how to Add Job User Meta
 */
/**
 * Start Function how to Remove Job from User Meta
 */
if (!function_exists('traveladvisor_removejob_to_usermeta')) {

    function traveladvisor_removejob_to_usermeta() {
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        $user = traveladvisor_get_user_id();
        if (isset($user) && $user <> '') {
            if (isset($_POST['post_id']) && $_POST['post_id'] <> '') {
                traveladvisor_remove_from_user_meta_list($_POST['post_id'], 'cs-user-jobs-wishlist', $user);
                echo '<i class="icon-heart7"></i>';
            } else {
                 echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_not_authorised');
            }
        } else {
             echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_login_first_notice');
        }

        die();
    }

    add_action("wp_ajax_traveladvisor_removejob_to_usermeta", "traveladvisor_removejob_to_usermeta");
    add_action("wp_ajax_nopriv_traveladvisor_removejob_to_usermeta", "traveladvisor_removejob_to_usermeta");
}

if (!function_exists('traveladvisor_removejob_to_user')) {

    function traveladvisor_removejob_to_user() {
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        $user = traveladvisor_get_user_id();
        if (isset($user) && $user <> '') {
            if (isset($_POST['post_id']) && $_POST['post_id'] <> '') {
                traveladvisor_remove_from_user_meta_list($_POST['post_id'], 'cs-user-jobs-wishlist', $user);
                echo '<i class="icon-heart7"></i>';
               echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_shortlist');
            } else {
                echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_not_authorised');
            }
        } else {
            echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_login_first_notice');
        }

        die();
    }

    add_action("wp_ajax_traveladvisor_removejob_to_user", "traveladvisor_removejob_to_user");
    add_action("wp_ajax_nopriv_traveladvisor_removejob_to_user", "traveladvisor_removejob_to_user");
}

/**
 * End Function how to Remove Job from User Meta
 */
/**
 * Start Function how to Apply for job
 */
if (!function_exists('traveladvisor_add_jobs_applied')) {

    function traveladvisor_add_jobs_applied($traveladvisor_post_id = '') {
        global $post;
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        $traveladvisor_post_id = isset($traveladvisor_post_id) ? $traveladvisor_post_id : '';
        if (is_user_logged_in()) {
            $user = traveladvisor_get_user_id();
            if (traveladvisor_candidate_post_id($user)) {
                $traveladvisor_applied_list = array();
                if (isset($user) and $user <> '' and is_user_logged_in()) {
                    $finded_result_list = traveladvisor_find_index_user_meta_list($traveladvisor_post_id, 'cs-user-jobs-applied-list', 'post_id', traveladvisor_get_user_id());
                    if (is_array($finded_result_list) && !empty($finded_result_list)) {
                        ?>
                        <a class="applied_icon" data-toggle="tooltip" data-placement="top" title="<?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_applied'); ?>">
                            <i class="icon-thumbsup"></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_applied'); ?>
                        </a>
                        <?php
                    } else {
                        ?>
                        <a data-toggle="tooltip" data-placement="top" title="<?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_apply_now'); ?>" class="applied_icon" onclick="traveladvisor_addjobs_to_applied('<?php echo esc_url(admin_url('admin-ajax.php')); ?>', '<?php echo intval($traveladvisor_post_id); ?>', this)" >
                            <i class="icon-thumbsup"></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_apply_now'); ?>
                        </a>
                        <?php
                    }
                } else {
                    ?>
                    <a data-toggle="tooltip" data-placement="top" title="<?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_apply_now'); ?>" class="applied_icon" onclick="traveladvisor_addjobs_to_applied('<?php echo esc_url(admin_url('admin-ajax.php')); ?>', '<?php echo intval($traveladvisor_post_id); ?>', this)" > 
                        <i class="icon-thumbsup"></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_apply_now'); ?>
                    </a>	
                    <?php
                }
            }
        } else {
            ?>
            <button type="button" data-toggle="tooltip" data-placement="top" title="<?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_apply_now'); ?>" class="apply-btn" onclick="trigger_func('#btn-header-main-login');"><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_apply_now'); ?></button>
            <?php
        }
    }

}
/**
 * End Function how to Apply for job
 */
/**
 * Start Function how to Apply for job in User Meta
 */
if (!function_exists('traveladvisor_add_applied_job_to_usermeta')) {

    function traveladvisor_add_applied_job_to_usermeta() {
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        $user = traveladvisor_get_user_id();
        $response = '';
        if (isset($user) && $user <> '') {

            if ((isset($_POST['post_id']) && $_POST['post_id'] <> '')) {
                $traveladvisor_wishlist = traveladvisor_get_user_jobapply_meta();
                $traveladvisor_wishlist = (isset($traveladvisor_wishlist) and is_array($traveladvisor_wishlist)) ? $traveladvisor_wishlist : array();
                if (isset($traveladvisor_wishlist) && in_array($_POST['post_id'], $traveladvisor_wishlist)) {
                    $post_id = array();
                    $post_id[] = $_POST['post_id'];
                    $traveladvisor_wishlist = array_diff($post_id, $traveladvisor_wishlist);
                    traveladvisor_update_user_jobapply_meta($traveladvisor_wishlist);
                    $response ['status'] = 1;
                    $response ['msg'] = '<i class="icon-thumbsup"></i><span>Applied</span>';
                }
                $traveladvisor_wishlist = array();
                $traveladvisor_wishlist = get_user_meta(traveladvisor_get_user_id(), 'cs-jobs-applied', true);
                $traveladvisor_wishlist[] = $_POST['post_id'];
                $traveladvisor_wishlist = array_unique($traveladvisor_wishlist);
                update_user_meta(traveladvisor_get_user_id(), 'cs-jobs-applied', $traveladvisor_wishlist);
                $user_watchlist = get_user_meta(traveladvisor_get_user_id(), 'cs-jobs-applied', true);
                traveladvisor_create_user_meta_list($_POST['post_id'], 'cs-user-jobs-applied-list', $user);
                $response ['status'] = 1;
                $response ['msg'] = '<i class="icon-thumbsup"></i><span>Applied</span>';
            } else {
                $response ['status'] = 0;
                $response ['msg'] = traveladvisor_var_theme_text_srt('traveladvisor_var_theme_not_authorised');
            }
        } else {

            $response ['status'] = 0;
            $response ['msg'] = traveladvisor_var_theme_text_srt('traveladvisor_var_theme_login_first_notice');
        }
        echo json_encode($response);
        die();
    }

    add_action("wp_ajax_traveladvisor_add_applied_job_to_usermeta", "traveladvisor_add_applied_job_to_usermeta");
    add_action("wp_ajax_nopriv_traveladvisor_add_applied_job_to_usermeta", "traveladvisor_add_applied_job_to_usermeta");
}
/**
 * End Function how to Apply for job in User Meta
 */
/**
 * Start Function how to Remove for job in User Meta
 */
if (!function_exists('traveladvisor_remove_applied_job_to_usermeta')) {

    function traveladvisor_remove_applied_job_to_usermeta() {
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        $user = traveladvisor_get_user_id();
        if (isset($user) && $user <> '') {
            $traveladvisor_job_expired = '';
            if (isset($_POST['post_id']) && $_POST['post_id'] <> '') {
                $traveladvisor_job_expired = get_post_meta($_POST['post_id'], 'traveladvisor_job_expired', true);    //get expire date of job
            }
            if ((isset($_POST['post_id']) && $_POST['post_id'] <> '') && ($traveladvisor_job_expired < strtotime(date('d-m-Y')))) {
                traveladvisor_remove_from_user_meta_list($_POST['post_id'], 'cs-user-jobs-applied-list', $user);
            } else {
                $response ['status'] = 0;
                $response ['msg'] = traveladvisor_var_theme_text_srt('traveladvisor_var_theme_not_authorised');
            }
        } else {
            $response ['status'] = 0;
            $response ['msg'] = traveladvisor_var_theme_text_srt('traveladvisor_var_theme_login_first_notice');
        }
        echo json_encode($response);
        die();
    }

    add_action("wp_ajax_traveladvisor_remove_applied_job_to_usermeta", "traveladvisor_remove_applied_job_to_usermeta");
    add_action("wp_ajax_nopriv_traveladvisor_remove_applied_job_to_usermeta", "traveladvisor_remove_applied_job_to_usermeta");
}
/**
 * End Function how to Remove for job in User Meta
 */
/**
 * Start Function how to Remove for job in User Meta
 */
if (!function_exists('traveladvisor_remove_applied_job_to_usermeta')) {

    function traveladvisor_remove_applied_job_to_usermeta() {
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        $user = traveladvisor_get_user_id();
        if (isset($user) && $user <> '') {


            if ($traveladvisor_job_expired < strtotime(date('d-m-Y'))) {
                if (isset($_POST['post_id']) && $_POST['post_id'] <> '') {
                    traveladvisor_remove_from_user_meta_list($_POST['post_id'], 'cs-user-jobs-applied-list', $user);
                } else {
                    echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_not_authorised');
                }
            }
        } else {
            echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_login_first_notice');
        }
        die();
    }

    add_action("wp_ajax_traveladvisor_remove_applied_job_to_usermeta", "traveladvisor_remove_applied_job_to_usermeta");
    add_action("wp_ajax_nopriv_traveladvisor_remove_applied_job_to_usermeta", "traveladvisor_remove_applied_job_to_usermeta");
}
/**
 * End Function how to Remove for job in User Meta
 */
/**
 * Start Function how to Remove for job Using Ajax
 */
if (!function_exists('traveladvisor_ajax_remove_appliedjobs')) {

    function traveladvisor_ajax_remove_appliedjobs($uid = '') {
        global $post;
        
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        
        $uid = (isset($_POST['traveladvisor_uid']) and $_POST['traveladvisor_uid'] <> '') ? $_POST['traveladvisor_uid'] : '';
        $traveladvisor_post_id = traveladvisor_candidate_post_id($uid);
        if ($traveladvisor_post_id <> '') {
            if (isset($uid) && $uid <> '') {
                $traveladvisor_jobapplied_array = get_user_meta($uid, 'cs-user-jobs-applied-list', true);
                if (!empty($traveladvisor_jobapplied_array))
                    $traveladvisor_jobapplied = array_column_by_two_dimensional($traveladvisor_jobapplied_array, 'post_id');
                else
                    $traveladvisor_jobapplied = array();
            }
            $args = array('posts_per_page' => "-1", 'post__in' => $traveladvisor_jobapplied,
                'meta_query' => array(
                    array(
                        'key' => 'traveladvisor_job_expired',
                        'value' => strtotime(date('d-m-Y')),
                        'compare' => '<',
                        'type' => 'numeric'
                    )
                ),
                'post_type' => 'jobs', 'order' => "ASC"
            );
            $custom_query = new WP_Query($args);
            $postlist = get_posts($args);
            $post_id = array();
            foreach ($postlist as $post) {
                $post_id[] += $post->ID;
                echo absint($post->ID);
                traveladvisor_remove_from_user_meta_list($post->ID, 'cs-user-jobs-applied-list', $uid);
            }
            echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_remove_from_applied_job');
        } else {
            echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_not_authorised');
        }
        die();
    }

    add_action("wp_ajax_traveladvisor_ajax_remove_appliedjobs", "traveladvisor_ajax_remove_appliedjobs");
    add_action("wp_ajax_nopriv_traveladvisor_ajax_remove_appliedjobs", "traveladvisor_ajax_remove_appliedjobs");
}
/**
 * End Function how to Remove for job Using Ajax
 */
/**
 * Start Function how to Remove Extra Variables using Query String
 */
if (!function_exists('traveladvisor_remove_qrystr_extra_var')) {

    function traveladvisor_remove_qrystr_extra_var($qStr, $key, $withqury_start = 'yes') {
        $qr_str = preg_replace('/[?&]' . $key . '=[^&]+$|([?&])' . $key . '=[^&]+&/', '$1', $qStr);
        if (!(strpos($qr_str, '?') !== false)) {
            $qr_str = "?" . $qr_str;
        }
        $qr_str = str_replace("?&", "?", $qr_str);
        $qr_str = remove_dupplicate_var_val($qr_str);

        if ($withqury_start == 'no') {
            $qr_str = str_replace("?", "", $qr_str);
        }
        return $qr_str;
        die();
    }

}
/**
 * End Function how to Remove Extra Variables using Query String
 */
/**
 * Start Function how to Remove Extra Variables using Query String
 */
if (!function_exists('traveladcisor_string_first_part_match')) {

    function traveladcisor_string_first_part_match($str, $find) {
        $str_len = strlen($find); // 6
        $temp_str = substr($str, 0, $str_len);
        if ($temp_str == $find) {
            return true;
        }
        return false;
    }

}
/**
 * End Function how to Remove Extra Variables using Query String
 */
/**
 * Start Function how to get all Countries and Cities Function
 */
if (!function_exists('traveladvisor_get_all_countries_cities')) {

    function traveladvisor_get_all_countries_cities() {
        global $traveladvisor_plugin_options;
        $traveladvisor_location_type = isset($traveladvisor_plugin_options['traveladvisor_search_by_location']) ? $traveladvisor_plugin_options['traveladvisor_search_by_location'] : '';
        $location_name = isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : '';
        $locations_parent_id = 0;
        $country_args = array(
            'orderby' => 'name',
            'order' => 'ASC',
            'fields' => 'all',
            'slug' => '',
            'hide_empty' => false,
            'parent' => $locations_parent_id,
        );
        $traveladvisor_location_countries = get_terms('traveladvisor_locations', $country_args);
        $location_list = '';
        $selectedkey = '';
        if (isset($_REQUEST['location']) && $_REQUEST['location'] != '') {
            $selectedkey = $_REQUEST['location'];
        }
        if ($traveladvisor_location_type == 'countries_only') {
            if (isset($traveladvisor_location_countries) && !empty($traveladvisor_location_countries)) {
                foreach ($traveladvisor_location_countries as $key => $country) {
                    $selected = '';
                    if (isset($selectedkey) && $selectedkey == $country->slug) {
                        $selected = 'selected';
                    }
                    if (preg_match("/^$location_name/i", $country->name)) {
                        $location_list[] = array('slug' => $country->slug, 'value' => $country->name);
                    }
                }
            }
        } else if ($traveladvisor_location_type == 'countries_and_cities') {
            if (isset($traveladvisor_location_countries) && !empty($traveladvisor_location_countries)) {
                foreach ($traveladvisor_location_countries as $key => $country) {
                    $country_added = 0;     // check for country added in array or not
                    $selected = '';
                    if (isset($selectedkey) && $selectedkey == $country->slug) {
                        $selected = 'selected';
                    }
                    if (preg_match("/^$location_name/i", $country->name)) {
                        $location_list[] = array('slug' => $country->slug, 'value' => $country->name);
                        $country_added = 1;
                    }
                    $selected_spec = get_term_by('slug', $country->slug, 'traveladvisor_locations');
                    $state_parent_id = $selected_spec->term_id;
                    $cities = '';
                    $states_args = array(
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'fields' => 'all',
                        'slug' => '',
                        'hide_empty' => false,
                        'parent' => $state_parent_id,
                    );
                    $cities = get_terms('traveladvisor_locations', $states_args);
                    if (isset($cities) && $cities != '' && is_array($cities)) {
                        $flag_i = 0;
                        foreach ($cities as $key => $city) {
                            if (preg_match("/^$location_name/i", $city->name)) {
                                if ($country_added == 0) { // means if country not added in array then add one time in array for this city
                                    if ($flag_i == 0) {
                                        $location_list[] = array('slug' => $country->slug, 'value' => $country->name);
                                    }
                                }
                                $location_list[]['child'] = array('slug' => $city->slug, 'value' => $city->name);
                                $flag_i++;
                            }
                        }
                    }
                }
            }
        } else if ($traveladvisor_location_type == 'cities_only') {
            if (isset($traveladvisor_location_countries) && !empty($traveladvisor_location_countries)) {
                foreach ($traveladvisor_location_countries as $key => $country) {
                    $selected = '';
                    $selected_spec = get_term_by('slug', $country->slug, 'traveladvisor_locations');
                    $city_parent_id = $selected_spec->term_id;
                    $cities_args = array(
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'fields' => 'all',
                        'slug' => '',
                        'hide_empty' => false,
                        'parent' => $city_parent_id,
                    );
                    $cities = get_terms('traveladvisor_locations', $cities_args);
                    if (isset($cities) && $cities != '' && is_array($cities)) {
                        foreach ($cities as $key => $city) {
                            if (preg_match("/^$location_name/i", $city->name)) {
                                $location_list[] = array('slug' => $city->slug, 'value' => $city->name);
                            }
                        }
                    }
                }
            }
        }
        echo json_encode($location_list);
        die();
    }

    add_action("wp_ajax_traveladvisor_get_all_countries_cities", "traveladvisor_get_all_countries_cities");
    add_action("wp_ajax_nopriv_traveladvisor_get_all_countries_cities", "traveladvisor_get_all_countries_cities");
}
/**
 * End Function how to get all Countries and Cities Function
 */
/**
 * Start Function how to get Custom Loaction Using Google Info
 */
if (!function_exists('traveladvisor_get_custom_locationswith_google_auto')) {

    function traveladvisor_get_custom_locationswith_google_auto($dropdown_start_html = '', $dropdown_end_html = '', $traveladvisor_text_ret = false, $traveladvisor_top_search = false) {
        global $traveladvisor_plugin_options, $traveladvisor_form_fields2;
        
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        
        $list_rand = rand(0, 499999999);
        $traveladvisor_location_type = isset($traveladvisor_plugin_options['traveladvisor_search_by_location']) ? $traveladvisor_plugin_options['traveladvisor_search_by_location'] : '';
        ob_start();
        $location_list = '';
        $selectedkey = '';
        if (isset($_REQUEST['location']) && $_REQUEST['location'] != '') {
            $selectedkey = $_REQUEST['location'];
        }
        $output = '';
        $output .= '<div class="traveladvisor_searchbox_div" data-locationadminurl="' . esc_url(admin_url("admin-ajax.php")) . '">';

        $traveladvisor_opt_array = array(
            'std' => $selectedkey,
            'id' => '',
            'before' => '',
            'echo' => false,
            'after' => '',
            'classes' => 'form-control traveladvisor_search_location_field',
            'extra_atr' => ' autocomplete="off" placeholder="' . traveladvisor_var_theme_text_srt('traveladvisor_var_theme_all_locations') . '"',
            'cust_name' => '',
            'return' => true,
        );

        /* if ($traveladvisor_top_search == true) {
          $traveladvisor_opt_array['cust_id'] = 'traveladvisor_search_top_location_field';
          } else {
          $traveladvisor_opt_array['cust_id'] = 'traveladvisor_search_location_field';
          } */

        $output .= $traveladvisor_form_fields2->traveladvisor_form_text_render($traveladvisor_opt_array);

        $traveladvisor_opt_array = array(
            'std' => $selectedkey,
            'id' => '',
            'before' => '',
            'after' => '',
            'classes' => 'search_keyword',
            'extra_atr' => '',
            'cust_name' => 'location',
            'return' => true,
            'required' => false
        );
        $output .= $traveladvisor_form_fields2->traveladvisor_form_hidden_render($traveladvisor_opt_array);

        $output .='</div>';
        traveladvisor_google_autocomplete_scripts();
        $data = $output;
        ob_get_clean();
        echo esc_html($data);
    }

}
/**
 * End Function how to get Custom Loaction Using Google Info
 */
/**
 * Start Function how to get Custom Loaction 
 */
if (!function_exists('traveladvisor_get_custom_locations')) {

    function traveladvisor_get_custom_locations($dropdown_start_html = '', $dropdown_end_html = '', $traveladvisor_text_ret = false) {
        global $traveladvisor_plugin_options, $traveladvisor_form_fields2;
        
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        
        $traveladvisor_location_type = isset($traveladvisor_plugin_options['traveladvisor_search_by_location']) ? $traveladvisor_plugin_options['traveladvisor_search_by_location'] : '';
        $locations_parent_id = 0;
        $country_args = array(
            'orderby' => 'name',
            'order' => 'ASC',
            'fields' => 'all',
            'slug' => '',
            'hide_empty' => false,
            'parent' => $locations_parent_id,
        );
        $traveladvisor_location_countries = get_terms('traveladvisor_locations', $country_args);
        ob_start();
        $location_list = '';
        $selectedkey = '';
        $output = '';
        if (isset($_REQUEST['location']) && $_REQUEST['location'] != '') {
            $selectedkey = $_REQUEST['location'];
        }
        if ($traveladvisor_location_type == 'countries_only') {
            if (isset($traveladvisor_location_countries) && !empty($traveladvisor_location_countries)) {
                foreach ($traveladvisor_location_countries as $key => $country) {
                    $selected = '';
                    if (isset($selectedkey) && $selectedkey == $country->slug) {
                        $selected = 'selected';
                    }
                    $location_list .= "<option class=\"item\" " . $selected . "  value='" . $country->slug . "'>" . $country->name . "</option>";
                }
            }
        } else if ($traveladvisor_location_type == 'countries_and_cities') {
            if (isset($traveladvisor_location_countries) && !empty($traveladvisor_location_countries)) {
                foreach ($traveladvisor_location_countries as $key => $country) {
                    $selected = '';
                    if (isset($selectedkey) && $selectedkey == $country->slug) {
                        $selected = 'selected';
                    }
                    $location_list .= "<option disabled class=\"category\" " . $selected . "  value='" . $country->slug . "'>" . $country->name . "</option>";
                    $selected_spec = get_term_by('slug', $country->slug, 'traveladvisor_locations');
                    $cities = '';
                    $state_parent_id = $selected_spec->term_id;
                    $states_args = array(
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'fields' => 'all',
                        'slug' => '',
                        'hide_empty' => false,
                        'parent' => $state_parent_id,
                    );
                    $cities = get_terms('traveladvisor_locations', $states_args);
                    if (isset($cities) && $cities != '' && is_array($cities)) {
                        foreach ($cities as $key => $city) {
                            $selected = ( $selectedkey == $city->slug) ? 'selected' : '';
                            $location_list .= "<option class=\"item\" style=\"padding-left:30px;\" " . $selected . " value='" . $city->slug . "'>" . $city->name . "</option>";
                        }
                    }
                }
            }
        } else if ($traveladvisor_location_type == 'cities_only') {
            if (isset($traveladvisor_location_countries) && !empty($traveladvisor_location_countries)) {
                foreach ($traveladvisor_location_countries as $key => $country) {
                    $selected = '';

                    $cities = '';
                    $selected_spec = get_term_by('slug', $country->slug, 'traveladvisor_locations');
                    $state_parent_id = $selected_spec->term_id;
                    $states_args = array(
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'fields' => 'all',
                        'slug' => '',
                        'hide_empty' => false,
                        'parent' => $state_parent_id,
                    );
                    $cities = get_terms('traveladvisor_locations', $states_args);
                    if (isset($cities) && $cities != '' && is_array($cities)) {
                        foreach ($cities as $key => $city) {
                            $selected = ( $selectedkey == $city->slug) ? 'selected' : '';
                            $location_list .= "<option class=\"item\" " . $selected . " value='" . $city->slug . "'>" . $city->name . "</option>";
                        }
                    }
                }
            }
        } else if ($traveladvisor_location_type == 'single_city') {
            $location_city = isset($traveladvisor_plugin_options['traveladvisor_search_by_location_city']) ? $traveladvisor_plugin_options['traveladvisor_search_by_location_city'] : '';
            if (isset($location_city) && !empty($location_city)) {
                ?>

                <?php
                $traveladvisor_opt_array = array(
                    'std' => $location_city,
                    'id' => '',
                    'before' => '',
                    'after' => '',
                    'classes' => '',
                    'extra_atr' => '',
                    'cust_id' => '',
                    'cust_name' => 'location',
                    'return' => true,
                    'required' => false
                );
                $output .= $traveladvisor_form_fields2->traveladvisor_form_hidden_render($traveladvisor_opt_array);
                ?>
                <?php
            }
        }
        if ($traveladvisor_location_type != 'single_city') {
            $output .= traveladvisor_allow_special_char($dropdown_start_html);
            $traveladvisor_locatin_cust = traveladvisor_location_convert();
            $traveladvisor_loc_name = ' name="location"';
            if ($traveladvisor_locatin_cust != '' && $traveladvisor_text_ret == true) {
                $traveladvisor_loc_name = '';
            }
            $location_list = '<option value="" class="category" >' . traveladvisor_var_theme_text_srt('traveladvisor_var_theme_all_locations') . '</option>' . $location_list;
            $traveladvisor_opt_array = array(
                'cust_id' => 'employer-search-location',
                'cust_name' => '',
                'std' => $selectedkey,
                'desc' => '',
                'extra_atr' => 'title="' . traveladvisor_var_theme_text_srt('traveladvisor_var_theme_locations') . '"' . traveladvisor_allow_special_char($traveladvisor_loc_name) . ' data-placeholder="' . traveladvisor_var_theme_text_srt('traveladvisor_var_theme_all_locations') . '" onchange="this.form.submit()"',
                'classes' => 'dir-map-search single-select search-custom-location chosen-select',
                'options' => $location_list,
                'hint_text' => '',
                'options_markup' => true,
                'return' => true,
            );
            $output .= $traveladvisor_form_fields2->traveladvisor_form_select_render($traveladvisor_opt_array);

            //echo traveladvisor_allow_special_char($output);
            $output .= traveladvisor_allow_special_char($dropdown_end_html);
            echo traveladvisor_allow_special_char($output);
        }
        $post_data = ob_get_clean();
        echo traveladvisor_allow_special_char($post_data);
    }

}
/**
 * End Function how to get Custom Loaction 
 */
/**
 * Start Function how to Convert  Custom Loaction 
 */
if (!function_exists('traveladvisor_location_convert')) {

    function traveladvisor_location_convert() {
        global $traveladvisor_plugin_options;
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        
        $traveladvisor_location_type = isset($traveladvisor_plugin_options['traveladvisor_search_by_location']) ? $traveladvisor_plugin_options['traveladvisor_search_by_location'] : '';
        $traveladvisor_field_ret = true;
        $selectedkey = '';
        $locations_parent_id = 0;
        $country_args = array(
            'orderby' => 'name',
            'order' => 'ASC',
            'fields' => 'all',
            'slug' => '',
            'hide_empty' => false,
            'parent' => $locations_parent_id,
        );
        $traveladvisor_location_countries = get_terms('traveladvisor_locations', $country_args);
        if (isset($_GET['location']) && $_GET['location'] != '') {
            $selectedkey = $_GET['location'];
        }
        if ($traveladvisor_location_type == 'countries_only') {
            if (isset($traveladvisor_location_countries) && !empty($traveladvisor_location_countries)) {
                foreach ($traveladvisor_location_countries as $key => $country) {
                    $selected = '';
                    if (isset($selectedkey) && $selectedkey == $country->slug) {
                        $traveladvisor_field_ret = false;
                    }
                }
            }
        } else if ($traveladvisor_location_type == 'countries_and_cities') {
            if (isset($traveladvisor_location_countries) && !empty($traveladvisor_location_countries)) {
                foreach ($traveladvisor_location_countries as $key => $country) {
                    $selected = '';
                    if (isset($selectedkey) && $selectedkey == $country->slug) {
                        $traveladvisor_field_ret = false;
                    }
                    $selected_spec = get_term_by('slug', $country->slug, 'traveladvisor_locations');
                    $cities = '';
                    $state_parent_id = $selected_spec->term_id;
                    $states_args = array(
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'fields' => 'all',
                        'slug' => '',
                        'hide_empty' => false,
                        'parent' => $state_parent_id,
                    );
                    $cities = get_terms('traveladvisor_locations', $states_args);
                    if (isset($cities) && $cities != '' && is_array($cities)) {
                        foreach ($cities as $key => $city) {
                            if ($selectedkey == $city->slug) {
                                $traveladvisor_field_ret = false;
                            }
                        }
                    }
                }
            }
        } else if ($traveladvisor_location_type == 'cities_only') {

            if (isset($traveladvisor_location_countries) && !empty($traveladvisor_location_countries)) {
                foreach ($traveladvisor_location_countries as $key => $country) {
                    $selected = '';
                    // load all cities against state  
                    $cities = '';
                    $selected_spec = get_term_by('slug', $country->slug, 'traveladvisor_locations');
                    $state_parent_id = $selected_spec->term_id;
                    $states_args = array(
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'fields' => 'all',
                        'slug' => '',
                        'hide_empty' => false,
                        'parent' => $state_parent_id,
                    );
                    $cities = get_terms('traveladvisor_locations', $states_args);
                    if (isset($cities) && $cities != '' && is_array($cities)) {
                        foreach ($cities as $key => $city) {
                            if ($selectedkey == $city->slug) {
                                $traveladvisor_field_ret = false;
                            }
                        }
                    }
                }
            }
        }
        if ($traveladvisor_field_ret == true && $selectedkey != '') {
            return $selectedkey;
        }
        return '';
    }

}
/**
 * End Function how to Convert  Custom Loaction 
 */
/**
 * Start Function how to Count User Meta 
 */
if (!function_exists('count_usermeta')) {

    function count_usermeta($key, $value, $opr, $return = false) {
        $arg = array(
            'meta_key' => $key,
            'meta_value' => $value,
            'meta_compare' => $opr,
        );
        $users = get_users($arg);

        if ($return == true) {
            return $users;
        }
        return count($users);
    }

}
/**
 * End Function how to Count User Meta 
 */
/**
 * Start Function get to Post Meta 
 */
if (!function_exists('traveladvisor_get_postmeta_data')) {

    function traveladvisor_get_postmeta_data($key, $value, $opr, $post_type, $return = false) {

        $user_post_arr = array('posts_per_page' => "-1", 'post_type' => $post_type, 'order' => "DESC", 'orderby' => 'post_date',
            'post_status' => 'publish', 'ignore_sticky_posts' => 1,
            'meta_query' => array(
                array(
                    'key' => $key,
                    'value' => $value,
                    'compare' => $opr,
                )
            )
        );
        $user_data = get_posts($user_post_arr);
        //echo "<pre>"; print_r($user_data);echo "</pre>";
        if ($return == true) {
            return $user_data;
        }
    }

}
/**
 * End Function get to Post Meta 
 */
/**
 * Start Function how to Count Post Meta 
 */
if (!function_exists('count_postmeta')) {

    function count_postmeta($key, $value, $opr, $return = false) {
        $mypost = array('posts_per_page' => "-1", 'post_type' => 'employer', 'order' => "DESC", 'orderby' => 'post_date',
            'post_status' => 'publish', 'ignore_sticky_posts' => 1,
            'meta_query' => array(
                array(
                    'key' => $key,
                    'value' => $value,
                    'compare' => $opr,
                )
            )
        );
        $loop_count = new WP_Query($mypost);
        $count_post = $loop_count->post_count;
        return $count_post;
    }

}
/**
 * End Function how to Count Post Meta 
 */
/**
 * Start Function how to Count Candidate Post Meta
 */
if (!function_exists('candidate_count_postmeta')) {

    function candidate_count_postmeta($key, $value, $opr, $return = false) {
        $mypost = array('posts_per_page' => "-1", 'post_type' => 'candidate', 'order' => "DESC", 'orderby' => 'post_date',
            'post_status' => 'publish', 'ignore_sticky_posts' => 1,
            'meta_query' => array(
                array(
                    'key' => $key,
                    'value' => $value,
                    'compare' => $opr,
                )
            )
        );
        $loop_count = new WP_Query($mypost);
        $count_post = $loop_count->post_count;
        $users = '';
        while ($loop_count->have_posts()): $loop_count->the_post();
            global $post;
            $users = $post;
        endwhile;
        wp_reset_postdata();
        if ($return == true) {
            return $users;
        }
        return $count_post;
    }

}
/**
 * End Function how to Count Candidate Post Meta
 */
/**
 *
 * @check array emptiness 
 *
 */
if (!function_exists('is_array_empty')) {

    function is_array_empty($a) {
        foreach ($a as $elm)
            if (!empty($elm))
                return false;
        return true;
    }

}
/**
 *
 * @find heighes date index 
 *
 */
if (!function_exists('find_heighest_date_index')) {

    function find_heighest_date_index($traveladvisor_dates, $date_format = 'd-m-Y') {
        $max = max(array_map('strtotime', $traveladvisor_dates));
        $finded_date = date($date_format, $max);
        $maxs = array_keys($traveladvisor_dates, $finded_date);
        if (isset($maxs[0])) {
            return $maxs[0];
        }
    }

}
/**
 * Start Function how to Save last User login Save
 */
if (!function_exists('user_last_login')) {
    add_action('wp_login', 'user_last_login', 0, 2);

    function user_last_login($login, $user) {
        $user = get_user_by('login', $login);
        $now = time();
        update_user_meta($user->ID, 'user_last_login', $now);
    }

}
/**
 * End Function how to Save last User login Save
 */
/**
 * Start Function how to Get last User login Save
 */
if (!function_exists('get_user_last_login')) {

    function get_user_last_login($user_ID = '') {
        if ($user_ID == '') {
            $user_ID = get_current_user_id();
        }
        $key = 'user_last_login';
        $single = true;
        $user_last_login = get_user_meta($user_ID, $key, $single);
        return $user_last_login;
    }

}
/**
 * End Function how to Get last User login Save
 */
/**
 *
 * @get user registeration time  
 *
 */
if (!function_exists('get_user_registered_timestamp')) {

    function get_user_registered_timestamp($user_ID = '') {
        if ($user_ID == '') {
            $user_ID = get_current_user_id();
        }
        if (isset(get_userdata($user_ID)->user_registered)) {
            $user_registered_str = strtotime(get_userdata($user_ID)->user_registered);
            return $user_registered_str;
        } else {
            return '';
        }
    }

}
/**
 * Start Function how to Get User Cv Selected in List Meta
 */
if (!function_exists('traveladvisor_get_user_cv_selected_list_meta')) {

    function traveladvisor_get_user_cv_selected_list_meta($user = "") {
        if (!empty($user)) {
            $userdata = get_user_by('login', $user);
            $user_id = $userdata->ID;
            return get_user_meta($user_id, 'cs-candidate-selected-list', true);
        } else {
            return get_user_meta(traveladvisor_get_user_id(), 'cs-candidate-selected-list', true);
        }
    }

}
/**
 * End Function how to Get User Cv Selected in List Meta
 */
/**
 * Start Function how to Update User Cv Selected CV Meta
 */
if (!function_exists('traveladvisor_update_user_cv_selected_list_meta')) {

    function traveladvisor_update_user_cv_selected_list_meta($arr) {
        return update_user_meta(traveladvisor_get_user_id(), 'cs-candidate-selected-list', $arr);
    }

}
/**
 * End Function how to Get User Cv Selected in List Meta
 */
/**
 * Start Function how to Add  User In Selected Cv  Meta
 */
if (!function_exists('traveladvisor_add_cv_selected_list_usermeta')) {

    function traveladvisor_add_cv_selected_list_usermeta() {
        
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        $user = traveladvisor_get_user_id();
        if (isset($user) && $user <> '') {
            if (isset($_POST['post_id']) && $_POST['post_id'] <> '') {
                $traveladvisor_selected_list = traveladvisor_get_user_cv_selected_list_meta();
                $traveladvisor_selected_list = (isset($traveladvisor_selected_list) and is_array($traveladvisor_selected_list)) ? $traveladvisor_selected_list : array();
                if (isset($traveladvisor_selected_list) && in_array($_POST['post_id'], $traveladvisor_selected_list)) {
                    $post_id = array();
                    $post_id[] = $_POST['post_id'];
                    $traveladvisor_selected_list = array_diff($post_id, $traveladvisor_selected_list);
                    traveladvisor_update_user_cv_selected_list_meta($traveladvisor_selected_list);
                    echo 'Added to List';
                    die();
                }
                $traveladvisor_selected_list = array();
                $traveladvisor_selected_list = get_user_meta(traveladvisor_get_user_id(), 'cs-candidate-selected-list', true);
                $traveladvisor_selected_list[] = $_POST['post_id'];
                $traveladvisor_selected_list = array_unique($traveladvisor_selected_list);
                update_user_meta(traveladvisor_get_user_id(), 'cs-candidate-selected-list', $traveladvisor_selected_list);
                $user_watchlist = get_user_meta(traveladvisor_get_user_id(), 'cs-candidate-selected-list', true);
                echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_added_to_list');
                ?>
                <div class="outerwrapp-layer<?php echo esc_html($_POST['post_id']); ?> cs-added-msg">
                    <?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_added_to_selected_list'); ?>
                </div>
                <?php
            }
        } else { //traveladvisor_var_theme_text_srt('traveladvisor_var_theme_locations')
            echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_login_first_notice');
        }
        die();
    }

    add_action("wp_ajax_traveladvisor_add_cv_selected_list_usermeta", "traveladvisor_add_cv_selected_list_usermeta");
    add_action("wp_ajax_nopriv_traveladvisor_add_cv_selected_list_usermeta", "traveladvisor_add_cv_selected_list_usermeta");
}
/**
 * End Function how to Add  User In Selected Cv  Meta
 */
/**
 * Start Function how to Remove  User In Selected Cv
 */
if (!function_exists('traveladvisor_remove_cv_selected_list_usermeta')) {

    function traveladvisor_remove_cv_selected_list_usermeta() {
        
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        $user = traveladvisor_get_user_id();
        if (isset($user) && $user <> '') {
            if (isset($_POST['post_id']) && $_POST['post_id'] <> '') {
                $traveladvisor_selected_list = traveladvisor_get_user_cv_selected_list_meta();
                $traveladvisor_selected_list = (isset($traveladvisor_selected_list) and is_array($traveladvisor_selected_list)) ? $traveladvisor_selected_list : array();
                $post_id = array();
                $post_id[] = $_POST['post_id'];
                $traveladvisor_selected_list = array_diff($traveladvisor_selected_list, $post_id);
                traveladvisor_update_user_cv_selected_list_meta($traveladvisor_selected_list);
                echo 'Add to List<div class="outerwrapp-layer' . $_POST['post_id'] . ' cs-remove-msg">';
                "Removed from list";
                echo '</div>';
            } else {
                echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_not_authorised');
            }
        } else {
            echo traveladvisor_var_theme_text_srt('traveladvisor_var_theme_login_first_notice');
        }

        die();
    }

    add_action("wp_ajax_traveladvisor_remove_cv_selected_list_usermeta", "traveladvisor_remove_cv_selected_list_usermeta");
    add_action("wp_ajax_nopriv_traveladvisor_remove_cv_selected_list_usermeta", "traveladvisor_remove_cv_selected_list_usermeta");
}
/**
 * End Function how to Remove  User In Selected Cv
 */
/**
 * Start Function how to Add Enqueue Scripts  
 */
if (!function_exists('my_enqueue_scripts')) {
    add_action('wp_print_scripts', 'my_enqueue_scripts');

    function my_enqueue_scripts() {
        wp_enqueue_script('tiny_mce');
    }

}
/**
 * End Function how to Add Enqueue Scripts  
 */
/**
 * Start Function how to Get Job Type Jobs in Dropdown  
 */
if (!function_exists('get_job_type_dropdown')) {

    function get_job_type_dropdown($name, $id, $selected_post_id = '', $class = '', $required_status = 'false') {
        global $traveladvisor_form_fields2;
        
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        
        $selected_slug = '';
        $required = '';
        if ($required_status == 'true') {
            $required = ' required';
        }
        if ($selected_post_id != '') {
            // get all job types
            $all_job_type = get_the_terms($selected_post_id, 'job_type');
            $job_type_values = '';
            $job_type_class = '';
            $specialism_flag = 1;
            if ($all_job_type != '') {
                foreach ($all_job_type as $job_typeitem) {
                    $selected_slug = $job_typeitem->term_id;
                }
            }
        }
        $job_types_all_args = array(
            'orderby' => 'name',
            'order' => 'ASC',
            'fields' => 'all',
            'slug' => '',
            'hide_empty' => false,
        );
        $all_job_types = get_terms('job_type', $job_types_all_args);
        $select_options[''] = traveladvisor_var_theme_text_srt('traveladvisor_var_please_select');
        if (isset($all_job_types) && is_array($all_job_types)) {
            foreach ($all_job_types as $job_typesitem) {
                $select_options[$job_typesitem->term_id] = $job_typesitem->name;
            }
        }
        $traveladvisor_opt_array = array(
            'cust_id' => $id,
            'cust_name' => $name,
            'std' => $selected_slug,
            'desc' => '',
            'extra_atr' => 'data-placeholder="' . traveladvisor_var_theme_text_srt('traveladvisor_var_please_select') . '"',
            'classes' => $class,
            'options' => $select_options,
            'hint_text' => '',
            'required' => 'yes',
        );

        if (isset($required_status) && $required_status == 'true') {
            $traveladvisor_opt_array['required'] = 'yes';
        }
        $traveladvisor_form_fields2->traveladvisor_form_select_render($traveladvisor_opt_array);
    }

}
/**
 * End Function how to Get Job Type Jobs in Dropdown  
 */
/**
 * Start Function how to Get specialisms Jobs in Dropdown  
 */
if (!function_exists('get_job_specialisms_dropdown')) {

    function get_job_specialisms_dropdown($name, $id, $selected_post_id = '', $class = '', $required_status = 'false') {
        global $traveladvisor_form_fields2;
        
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        
        $selected_slug = array();
        $required = '';
        if ($required_status == 'true') {
            $required = ' required';
        }
        if ($selected_post_id != '') {
            // get all job types			
            $all_specialisms = get_the_terms($selected_post_id, 'specialisms');

            $specialisms_values = '';
            $specialisms_class = '';
            $specialism_flag = 1;
            if ($all_specialisms != '') {
                foreach ($all_specialisms as $specialismsitem) {
                    $selected_slug[] = $specialismsitem->term_id;
                }
            }
        }
        //var_dump($selected_slug);
        $specialisms_all_args = array(
            'orderby' => 'name',
            'order' => 'ASC',
            'fields' => 'all',
            'slug' => '',
            'hide_empty' => false,
        );
        $all_specialisms = get_terms('specialisms', $specialisms_all_args);
        $select_options[''] = traveladvisor_var_theme_text_srt('traveladvisor_var_theme_please_select_specialism');
        if (isset($all_specialisms) && is_array($all_specialisms)) {
            foreach ($all_specialisms as $specialismsitem) {
                $select_options[$specialismsitem->term_id] = $specialismsitem->name;
            }
        }
        $traveladvisor_opt_array = array(
            'id' => $id,
            'cust_id' => $id,
            'cust_name' => $name . '[]',
            'std' => $selected_slug,
            'desc' => '',
            'extra_atr' => 'data-placeholder="' . traveladvisor_var_theme_text_srt('traveladvisor_var_theme_please_select_specialism') . '"',
            'classes' => $class,
            'options' => $select_options,
            'hint_text' => '',
            'required' => 'yes',
        );

        if (isset($required_status) && $required_status == 'true') {
            $traveladvisor_opt_array['required'] = 'yes';
        }
        $traveladvisor_form_fields2->traveladvisor_form_multiselect_render($traveladvisor_opt_array);
    }

}
/**
 * End Function how to Get specialisms Jobs in Dropdown  
 */
/**
 * Start Function how to Add specialisms  in Dropdown  
 */
if (!function_exists('get_specialisms_dropdown')) {

    function get_specialisms_dropdown($name, $id, $user_id = '', $class = '', $required_status = 'false') {
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        
        global $traveladvisor_form_fields2, $post;
        $output = '';

        $traveladvisor_spec_args = array(
            'orderby' => 'name',
            'order' => 'ASC',
            'fields' => 'all',
            'slug' => '',
            'hide_empty' => false,
        );
        $terms = get_terms('specialisms', $traveladvisor_spec_args);

        if (!empty($terms)) {

            $traveladvisor_selected_specs = get_user_meta($user_id, $name, true);
            $specialisms_option = '';
            foreach ($terms as $term) {
                $traveladvisor_selected = '';
                if (is_array($traveladvisor_selected_specs) && in_array($term->slug, $traveladvisor_selected_specs)) {
                    $traveladvisor_selected = ' selected="selected"';
                }
                $specialisms_option .= '<option' . $traveladvisor_selected . ' value="' . esc_attr($term->slug) . '">' . $term->name . '</option>';
            }
            $traveladvisor_opt_array = array(
                'cust_id' => $id,
                'cust_name' => $name . '[]',
                'std' => '',
                'desc' => '',
                'return' => true,
                'extra_atr' => 'data-placeholder="' . traveladvisor_var_theme_text_srt('traveladvisor_var_theme_please_select_specialism') . '"',
                'classes' => $class,
                'options' => $specialisms_option,
                'options_markup' => true,
                'hint_text' => '',
            );

            if (isset($required_status) && $required_status == true) {
                $traveladvisor_opt_array['required'] = 'yes';
            }
            $output .= $traveladvisor_form_fields2->traveladvisor_form_multiselect_render($traveladvisor_opt_array);
        } else {
            $output .= traveladvisor_var_theme_text_srt('traveladvisor_var_theme_specialisms_available');
        }
        return $output;
    }

}
/**
 * End Function how to Add specialisms  in Dropdown  
 */
/**
 * Start Function how to Add images sizes and their URL's 
 */
if (!function_exists('traveladvisor_get_img_url')) {

    function traveladvisor_get_img_url($img_name = '', $size = 'traveladvisor_media_2', $return_sizes = false) {
        $ret_name = '';
        $traveladvisor_img_sizes = array(
            'traveladvisor_media_1' => '-870x489',
            'traveladvisor_media_2' => '-270x203',
            'traveladvisor_media_3' => '-236x168',
            'traveladvisor_media_4' => '-200x200',
            'traveladvisor_media_5' => '-180x135',
            'traveladvisor_media_6' => '-150x113',
        );
        if ($return_sizes == true) {
            return $traveladvisor_img_sizes;
        }
        // Register our new path for user images.
        add_filter('upload_dir', 'traveladvisor_user_images_custom_directory');
        $traveladvisor_upload_dir = wp_upload_dir();
        $traveladvisor_upload_sub_dir = '';

        if ((strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_1']) !== false) || (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_2']) !== false) || (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_3']) !== false) || (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_4']) !== false) || (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_5']) !== false) || (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_6']) !== false)) {
            if (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_1']) !== false) {
                $img_ext = substr($img_name, ( strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_1']) + strlen($traveladvisor_img_sizes['traveladvisor_media_1'])), strlen($img_name));
                $ret_name = substr($img_name, 0, strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_1']));
            } elseif (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_2']) !== false) {
                $img_ext = substr($img_name, ( strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_2']) + strlen($traveladvisor_img_sizes['traveladvisor_media_2'])), strlen($img_name));
                $ret_name = substr($img_name, 0, strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_2']));
            } elseif (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_3']) !== false) {
                $img_ext = substr($img_name, ( strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_3']) + strlen($traveladvisor_img_sizes['traveladvisor_media_3'])), strlen($img_name));
                $ret_name = substr($img_name, 0, strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_3']));
            } elseif (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_4']) !== false) {
                $img_ext = substr($img_name, ( strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_4']) + strlen($traveladvisor_img_sizes['traveladvisor_media_4'])), strlen($img_name));
                $ret_name = substr($img_name, 0, strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_4']));
            } elseif (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_5']) !== false) {
                $img_ext = substr($img_name, ( strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_5']) + strlen($traveladvisor_img_sizes['traveladvisor_media_5'])), strlen($img_name));
                $ret_name = substr($img_name, 0, strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_5']));
            } elseif (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_6']) !== false) {
                $img_ext = substr($img_name, ( strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_6']) + strlen($traveladvisor_img_sizes['traveladvisor_media_6'])), strlen($img_name));
                $ret_name = substr($img_name, 0, strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_6']));
            }

            $traveladvisor_upload_dir = isset($traveladvisor_upload_dir['url']) ? $traveladvisor_upload_dir['url'] . '/' : '';
            $traveladvisor_upload_dir = $traveladvisor_upload_dir . $traveladvisor_upload_sub_dir;
            if ($ret_name != '') {
                if (isset($traveladvisor_img_sizes[$size])) {
                    $ret_name = $traveladvisor_upload_dir . $ret_name . $traveladvisor_img_sizes[$size] . $img_ext;
                } else {
                    $ret_name = $traveladvisor_upload_dir . $ret_name . $img_ext;
                }
            }
        } else {
            if ($img_name != '') {
                //$ret_name = $traveladvisor_upload_dir . $img_name;
                $ret_name = '';
            }
        }
        // Set everything back to normal.
        remove_filter('upload_dir', 'traveladvisor_user_images_custom_directory');
        return $ret_name;
    }

}
/**
 * End Function how to Add images sizes and their URL's 
 */
/**
 * Start Function how to  get image
 */
if (!function_exists('traveladvisor_get_orignal_image_nam')) {

    function traveladvisor_get_orignal_image_nam($img_name = '', $size = 'traveladvisor_media_2') {
        $ret_name = '';
        $traveladvisor_img_sizes = array(
            'traveladvisor_media_1' => '-870x489',
            'traveladvisor_media_2' => '-270x203',
            'traveladvisor_media_3' => '-236x168',
            'traveladvisor_media_4' => '-200x200',
            'traveladvisor_media_5' => '-180x135',
            'traveladvisor_media_6' => '-150x113',
        );
        
       

        if ((strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_1']) !== false) || (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_2']) !== false) || (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_3']) !== false) || (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_4']) !== false) || (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_5']) !== false) || (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_6']) !== false)) {
            if (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_1']) !== false) {
                $img_ext = substr($img_name, ( strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_1']) + strlen($traveladvisor_img_sizes['traveladvisor_media_1'])), strlen($img_name));
                $ret_name = substr($img_name, 0, strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_1']));
            } elseif (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_2']) !== false) {
                $img_ext = substr($img_name, ( strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_2']) + strlen($traveladvisor_img_sizes['traveladvisor_media_2'])), strlen($img_name));
                $ret_name = substr($img_name, 0, strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_2']));
            } elseif (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_3']) !== false) {
                $img_ext = substr($img_name, ( strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_3']) + strlen($traveladvisor_img_sizes['traveladvisor_media_3'])), strlen($img_name));
                $ret_name = substr($img_name, 0, strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_3']));
            } elseif (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_4']) !== false) {
                $img_ext = substr($img_name, ( strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_4']) + strlen($traveladvisor_img_sizes['traveladvisor_media_4'])), strlen($img_name));
                $ret_name = substr($img_name, 0, strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_4']));
            } elseif (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_5']) !== false) {
                $img_ext = substr($img_name, ( strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_5']) + strlen($traveladvisor_img_sizes['traveladvisor_media_5'])), strlen($img_name));
                $ret_name = substr($img_name, 0, strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_5']));
            } elseif (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_6']) !== false) {
                $img_ext = substr($img_name, ( strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_6']) + strlen($traveladvisor_img_sizes['traveladvisor_media_6'])), strlen($img_name));
                $ret_name = substr($img_name, 0, strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_6']));
            }
            $traveladvisor_upload_dir = isset($traveladvisor_upload_dir['url']) ? $traveladvisor_upload_dir['url'] . '/' : '';
            if ($ret_name != '') {
                if (isset($traveladvisor_img_sizes[$size])) {
                    $ret_name = $traveladvisor_upload_dir . $ret_name . $traveladvisor_img_sizes[$size] . $img_ext;
                } else {
                    $ret_name = $traveladvisor_upload_dir . $ret_name . $img_ext;
                }
            }
        } else {
            if ($img_name != '') {
                //$ret_name = $traveladvisor_upload_dir . $img_name;
                $ret_name = '';
            }
        }
       
        return $ret_name;
    }

}
/**
 * Start Function how to  get image
 */
if (!function_exists('traveladvisor_get_image_url')) {

    function traveladvisor_get_image_url($img_name = '', $size = 'traveladvisor_media_2', $return_sizes = false) {
        $ret_name = '';
        $traveladvisor_img_sizes = array(
            'traveladvisor_media_1' => '-870x489',
            'traveladvisor_media_2' => '-270x203',
            'traveladvisor_media_3' => '-236x168',
            'traveladvisor_media_4' => '-200x200',
            'traveladvisor_media_5' => '-180x135',
            'traveladvisor_media_6' => '-150x113',
        );
        if ($return_sizes == true) {
            return $traveladvisor_img_sizes;
        }
        add_filter('upload_dir', 'traveladvisor_user_images_custom_directory');
        $traveladvisor_upload_dir = wp_upload_dir();
        $traveladvisor_upload_sub_dir = '';

        if ((strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_1']) !== false) || (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_2']) !== false) || (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_3']) !== false) || (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_4']) !== false) || (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_5']) !== false) || (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_6']) !== false)) {
            if (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_1']) !== false) {
                $img_ext = substr($img_name, ( strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_1']) + strlen($traveladvisor_img_sizes['traveladvisor_media_1'])), strlen($img_name));
                $ret_name = substr($img_name, 0, strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_1']));
            } elseif (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_2']) !== false) {
                $img_ext = substr($img_name, ( strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_2']) + strlen($traveladvisor_img_sizes['traveladvisor_media_2'])), strlen($img_name));
                $ret_name = substr($img_name, 0, strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_2']));
            } elseif (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_3']) !== false) {
                $img_ext = substr($img_name, ( strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_3']) + strlen($traveladvisor_img_sizes['traveladvisor_media_3'])), strlen($img_name));
                $ret_name = substr($img_name, 0, strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_3']));
            } elseif (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_4']) !== false) {
                $img_ext = substr($img_name, ( strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_4']) + strlen($traveladvisor_img_sizes['traveladvisor_media_4'])), strlen($img_name));
                $ret_name = substr($img_name, 0, strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_4']));
            } elseif (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_5']) !== false) {
                $img_ext = substr($img_name, ( strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_5']) + strlen($traveladvisor_img_sizes['traveladvisor_media_5'])), strlen($img_name));
                $ret_name = substr($img_name, 0, strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_5']));
            } elseif (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_6']) !== false) {
                $img_ext = substr($img_name, ( strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_6']) + strlen($traveladvisor_img_sizes['traveladvisor_media_6'])), strlen($img_name));
                $ret_name = substr($img_name, 0, strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_6']));
            }
            $traveladvisor_upload_dir = isset($traveladvisor_upload_dir['url']) ? $traveladvisor_upload_dir['url'] . '/' : '';
            $traveladvisor_upload_dir = $traveladvisor_upload_dir . $traveladvisor_upload_sub_dir;
            if ($ret_name != '') {
                if (isset($traveladvisor_img_sizes[$size])) {
                    $ret_name = $traveladvisor_upload_dir . $ret_name . $traveladvisor_img_sizes[$size] . $img_ext;
                } else {
                    $ret_name = $traveladvisor_upload_dir . $ret_name . $img_ext;
                }
            }
        } else {
            if ($img_name != '') {
                //$ret_name = $traveladvisor_upload_dir . $img_name;
                $ret_name = '';
            }
        }
         // Set everything back to normal.
        remove_filter('upload_dir', 'traveladvisor_user_images_custom_directory');
        return $ret_name;
    }

}
/**
 * End Function how to Add images sizes and their URL's 
 */
/**
 * Start Function how to Add get portfolio images  URL's 
 */
if (!function_exists('traveladvisor_get_portfolio_img_url')) {

    function traveladvisor_get_portfolio_img_url($img_name = '', $size = 'traveladvisor_media_5', $return_sizes = false) {
        $traveladvisor_img_sizes = array(
            'traveladvisor_media_5' => '-180x135',
        );
        if ($return_sizes == true) {
            return $traveladvisor_img_sizes;
        }
        $traveladvisor_upload_dir = wp_upload_dir();
        $traveladvisor_upload_dir = isset($traveladvisor_upload_dir['url']) ? $traveladvisor_upload_dir['url'] . '/' : '';
        if (strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_5']) !== false) {
            $img_ext = substr($img_name, ( strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_5']) + strlen($traveladvisor_img_sizes['traveladvisor_media_5'])), strlen($img_name));
            $ret_name = substr($img_name, 0, strpos($img_name, $traveladvisor_img_sizes['traveladvisor_media_5']));
            if (isset($traveladvisor_img_sizes[$size])) {
                $ret_name = $traveladvisor_upload_dir . $ret_name . $traveladvisor_img_sizes[$size] . $img_ext;
            } else {
                $ret_name = $traveladvisor_upload_dir . $ret_name . $img_ext;
            }
        } else {

            $ret_name = $traveladvisor_upload_dir . $img_name;
        }
        return $ret_name;
    }

}
/**
 * End Function how to Add get portfolio images  URL's 
 */
/**
 * Start Function how to Save  images  URL's 
 */
if (!function_exists('traveladvisor_save_img_url')) {

    function traveladvisor_save_img_url($img_url = '') {
        if ($img_url != '') {
            $img_id = traveladvisor_get_attachment_id_from_url($img_url);
            $img_url = wp_get_attachment_image_src($img_id, 'traveladvisor_media_2');
            if (isset($img_url[0])) {
                $img_url = $img_url[0];
                if (strpos($img_url, 'uploads/') !== false) {
                    $img_url = substr($img_url, ( strpos($img_url, 'uploads/') + strlen('uploads/')), strlen($img_url));
                }
            }
        }
        return $img_url;
    }

}
/**
 * End Function how to Save  images  URL's 
 */
/**
 * Start Function how to get attachment id from url 
 */
if (!function_exists('traveladvisor_get_attachment_id_from_url')) {

    function traveladvisor_get_attachment_id_from_url($attachment_url = '') {
        global $wpdb;
        $attachment_id = false;
        // If there is no url, return.
        if ('' == $attachment_url)
            return;
        // Get the upload directory paths
        $upload_dir_paths = wp_upload_dir();
        if (false !== strpos($attachment_url, $upload_dir_paths['baseurl'])) {
            // If this is the URL of an auto-generated thumbnail, get the URL of the original image
            $attachment_url = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url);
            // Remove the upload path base directory from the attachment URL
            $attachment_url = str_replace($upload_dir_paths['baseurl'] . '/', '', $attachment_url);

            $attachment_id = $wpdb->get_var($wpdb->prepare("SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url));
        }
        return $attachment_id;
    }

}

/**
 * Start Function how to get attachment id from url 
 */
if (!function_exists('traveladvisor_get_attachment_id_from_filename')) {

    function traveladvisor_get_attachment_id_from_filename($attachment_name = '') {
        global $wpdb;
        $attachment_id = false;
        // If there is no url, return.
        if ('' == $attachment_name)
            return;
        // Get the upload directory paths
        $upload_dir_paths = wp_upload_dir();
        $attachment_id = $wpdb->get_results("SELECT * FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wposts.post_name like '%" . $attachment_name . "%' AND wposts.post_type = 'attachment'", OBJECT);
        // }
        return $attachment_id;
    }

}
/**
 * Start Function how to Remove Image URL's 
 */
if (!function_exists('traveladvisor_remove_img_url')) {

    function traveladvisor_remove_img_url($img_url = '') {
        $traveladvisor_upload_dir = wp_upload_dir();
        $traveladvisor_upload_dir = isset($traveladvisor_upload_dir['basedir']) ? $traveladvisor_upload_dir['basedir'] . '/' : '';
        if ($img_url != '') {
            $traveladvisor_img_sizes = traveladvisor_get_img_url('', '', true);
            if (isset($traveladvisor_img_sizes['traveladvisor_media_2']) && strpos($img_url, $traveladvisor_img_sizes['traveladvisor_media_2']) !== false) {
                $img_ext = substr($img_url, ( strpos($img_url, $traveladvisor_img_sizes['traveladvisor_media_2']) + strlen($traveladvisor_img_sizes['traveladvisor_media_2'])), strlen($img_url));
                $img_name = substr($img_url, 0, strpos($img_url, $traveladvisor_img_sizes['traveladvisor_media_2']));
                if (is_file($traveladvisor_upload_dir . $img_name . $img_ext)) {

                    unlink($traveladvisor_upload_dir . $img_name . $img_ext);
                }
                if (is_array($traveladvisor_img_sizes)) {
                    foreach ($traveladvisor_img_sizes as $traveladvisor_key => $traveladvisor_size) {
                        if (is_file($traveladvisor_upload_dir . $img_name . $traveladvisor_size . $img_ext)) {

                            unlink($traveladvisor_upload_dir . $img_name . $traveladvisor_size . $img_ext);
                        }
                    }
                }
            } else {
                if (is_file($traveladvisor_upload_dir . $img_url)) {

                    unlink($traveladvisor_upload_dir . $img_url);
                }
            }
        }
    }

}
/**
 * End Function how to Remove Image URL's 
 */
/**
 * Start Function how to Add Wishlist in Candidate
 */
if (!function_exists('candidate_header_wishlist')) {

    function candidate_header_wishlist($return = 'no') {
        global $post, $traveladvisor_plugin_options;
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();
        
        $top_wishlist_menu_html = '';

        $traveladvisor_employer_functions = new traveladvisor_employer_functions();
        $user = traveladvisor_get_user_id();
        if (isset($user) && $user <> '') {
            $traveladvisor_shortlist_array = get_user_meta($user, 'cs-user-jobs-wishlist', true);
            if (!empty($traveladvisor_shortlist_array))
                $traveladvisor_shortlist = array_column_by_two_dimensional($traveladvisor_shortlist_array, 'post_id');
            else
                $traveladvisor_shortlist = array();
        }
        if (!empty($traveladvisor_shortlist) && count($traveladvisor_shortlist) > 0) {
            $args = array('posts_per_page' => "-1", 'post__in' => $traveladvisor_shortlist, 'post_type' => 'jobs');
            $custom_query = new WP_Query($args);
            $wishlist_count = $custom_query->post_count;
            if ($custom_query->have_posts()):

                $top_wishlist_menu_html .= '<div class="wish-list"><a><i class="icon-heart6"></i></a> <em class="cs-bgcolor" id="cs-fav-counts">' . absint($wishlist_count) . '</em>
                <div class="recruiter-widget wish-list-dropdown">
                    <ul class="recruiter-list">';
                $top_wishlist_menu_html .= '<li><span class="traveladvisor_shortlisted_count">' . traveladvisor_var_theme_text_srt('traveladvisor_var_theme_shortlisted_jobs') . ' (<span id="cs-heading-counts">' . absint($wishlist_count) . '</span>)</span></li>';
                $wishlist_count = 1;
                while ($custom_query->have_posts()): $custom_query->the_post();
                    $traveladvisor_jobs_thumb_url = '';
                    $employer_img = '';
                    // get employer images at run time
                    $traveladvisor_job_employer = get_post_meta($post->ID, "traveladvisor_job_username", true); //
                    $traveladvisor_job_employer_data = traveladvisor_get_postmeta_data('traveladvisor_user', $traveladvisor_job_employer, '=', 'employer', true);
                    $employer_img = get_the_author_meta('user_img', $traveladvisor_job_employer);
//                    if (isset($traveladvisor_job_employer_data)) {
//                        foreach ($traveladvisor_job_employer_data as $traveladvisor_job_employer_single) {
//                            //$employer_img = get_post_meta($traveladvisor_job_employer_single->ID, "user_img", true);
//                           $employer_img =  get_the_author_meta('user_img', $traveladvisor_job_employer);
//                            $traveladvisor_jobs_address = get_user_address_string_for_list($traveladvisor_job_employer_single->ID);
//                        }
//                    }
                    if ($employer_img == '') {

                        $traveladvisor_jobs_thumb_url = esc_url(wp_jobhunt::plugin_url() . 'assets/images/img-not-found16x9.jpg');
                    } else {
                        $traveladvisor_jobs_thumb_url = traveladvisor_get_img_url($employer_img, 'traveladvisor_media_5');
                    }
                    $top_wishlist_menu_html .= '<li class="alert alert-dismissible">
                                <a class="cs-remove-top-shortlist" id="cs-rem-' . esc_html($post->ID) . '" onclick="traveladvisor_unset_user_job_fav(\'' . esc_js(admin_url('admin-ajax.php')) . '\', \'' . esc_html($post->ID) . '\')"><span>&times;</span></a>';
                    if ($traveladvisor_jobs_thumb_url != '') {
                        $top_wishlist_menu_html .='<a href="' . esc_url(get_the_permalink($post->ID)) . '"><img src="' . esc_url($traveladvisor_jobs_thumb_url) . '" alt="traveladvisor_jobs_thumb_url" /></a>';
                    }
                    $top_wishlist_menu_html .='<div class="cs-info">
                                    <h6><a href="' . esc_url(get_the_permalink($post->ID)) . '">' . $post->post_title . '</a></h6>
                                    "added"<span>';
                    // getting added in wishlist date
                    $finded = in_multiarray($post->ID, $traveladvisor_shortlist_array, 'post_id');
                    if ($finded != '')
                        if ($traveladvisor_shortlist_array[$finded[0]]['date_time'] != '') {
                            $top_wishlist_menu_html .= date_i18n(get_option('date_format'), $traveladvisor_shortlist_array[$finded[0]]['date_time']);
                        }
                    $top_wishlist_menu_html .='</span>
                                </div>
                            </li>';

                    $wishlist_count++;
                    if ($wishlist_count > 5) {
                        break;
                    }
                endwhile;
                $traveladvisor_page_id = isset($traveladvisor_plugin_options['traveladvisor_js_dashboard']) ? $traveladvisor_plugin_options['traveladvisor_js_dashboard'] : '';
                $top_wishlist_menu_html .='<li class="alert alert-dismissible"><a href="' . esc_url(traveladvisor_users_profile_link($traveladvisor_page_id, 'shortlisted_jobs', $user)) . '" >View All</a></li>
                    </ul>
                </div></div>';
                wp_reset_postdata();
            endif;
        }
        if ($return == 'no')
            echo traveladvisor_allow_special_char($top_wishlist_menu_html);
        else
            return $top_wishlist_menu_html;
    }

}
/**
 * End Function how to Add Wishlist in Candidate
 */
/**
 * Start Function how to Find Other Fields User Meta List
 */
if (!function_exists('traveladvisor_find_other_field_user_meta_list')) {

    function traveladvisor_find_other_field_user_meta_list($post_id, $post_column, $list_name, $need_find, $user_id) {
        $finded = traveladvisor_find_index_user_meta_list($post_id, $list_name, $post_column, $user_id);
        $index = '';
        $need_find_value = '';
        if (isset($finded[0])) {
            $index = $finded[0];
            $existing_list_data = get_user_meta($user_id, $list_name, true);
            $need_find_value = $existing_list_data[$index][$need_find];
        }
        return $need_find_value;
    }

}
/**
 * End Function how to Find Other Fields User Meta List
 */
/**
 * Start Function how to Find Index User Meta List
 */
if (!function_exists('traveladvisor_find_index_user_meta_list')) {

    function traveladvisor_find_index_user_meta_list($post_id, $list_name, $need_find, $user_id) {
        $existing_list_data = get_user_meta($user_id, $list_name, true);
        $finded = in_multiarray($post_id, $existing_list_data, $need_find);
        return $finded;
    }

}
/**
 * End Function how to Find Index User Meta List
 */
/**
 * Start Function how to Remove List From User Meta List
 */
if (!function_exists('traveladvisor_remove_from_user_meta_list')) {

    function traveladvisor_remove_from_user_meta_list($post_id, $list_name, $user_id) {
        $existing_list_data = '';
        $existing_list_data = get_user_meta($user_id, $list_name, true);
        $finded = in_multiarray($post_id, $existing_list_data, 'post_id');
        $existing_list_data = remove_index_from_array($existing_list_data, $finded);
        update_user_meta($user_id, $list_name, $existing_list_data);
    }

}
/**
 * End Function how to Remove List From User Meta List
 */
/**
 * Start Function how to Create  User Meta List
 */
if (!function_exists('traveladvisor_create_user_meta_list')) {

    function traveladvisor_create_user_meta_list($post_id, $list_name, $user_id) {
        $current_timestamp = strtotime(date('d-m-Y H:i:s'));
        $existing_list_data = '';
        $existing_list_data = get_user_meta($user_id, $list_name, true);
        // search duplicat and remove it then arrange new ordering
        $finded = in_multiarray($post_id, $existing_list_data, 'post_id');
        $existing_list_data = remove_index_from_array($existing_list_data, $finded);
        // adding one more entry
        $existing_list_data[] = array('post_id' => $post_id, 'date_time' => $current_timestamp);
        update_user_meta($user_id, $list_name, $existing_list_data);
    }

}
/**
 * End Function how to Create  User Meta List
 */
/**
 * Start Function how to find Index
 */
if (!function_exists('in_multiarray')) {

    function in_multiarray($elem, $array, $field) {
        $top = sizeof($array) - 1;
        $bottom = 0;
        $finded_index = '';
        if (is_array($array)) {
            while ($bottom <= $top) {
                if ($array[$bottom][$field] == $elem)
                    $finded_index[] = $bottom;
                else
                if (is_array($array[$bottom][$field]))
                    if (in_multiarray($elem, ($array[$bottom][$field])))
                        $finded_index[] = $bottom;
                $bottom++;
            }
        }
        return $finded_index;
    }

}
/**
 * End Function how to find Index
 */
/**
 * Start Function how to remove given Indexes
 */
if (!function_exists('remove_index_from_array')) {

    function remove_index_from_array($array, $index_array) {
        $top = sizeof($index_array) - 1;
        $bottom = 0;
        if (is_array($index_array)) {
            while ($bottom <= $top) {
                unset($array[$index_array[$bottom]]);
                $bottom++;
            }
        }
        if (!empty($array))
            return array_values($array);
        else
            return $array;
    }

}
/**
 * End Function how to remove given Indexes
 */
/**
 * Start Function how to get only one Index from two dimenssion array
 */
if (!function_exists("array_column_by_two_dimensional")) {

    function array_column_by_two_dimensional($array, $column_name) {
        if (isset($array) && is_array($array)) {
            return array_map(function($element) use($column_name) {
                return $element[$column_name];
            }, $array);
        }
    }

}
/**
 * End Function how to get only one Index from two dimenssion array
 */
/**
 * Start Function how prevent guest not access admin panel
 */
if (!function_exists('redirect_user')) {
    add_action('admin_init', 'redirect_user');

    function redirect_user() {
        $user = wp_get_current_user();
        if ((!defined('DOING_AJAX') || !DOING_AJAX ) && ( empty($user) || !in_array("administrator", (array) $user->roles) )) {
            wp_safe_redirect(home_url( '/' ));
            exit;
        }
    }

}
/**
 * End Function how prevent guest not access admin panel
 */
/**
 * Start Function how to get login user information
 */
if (!function_exists('getlogin_user_info')) {

    function getlogin_user_info() {
        global $current_user;
        $traveladvisor_emp_funs = new traveladvisor_employer_functions();
        if (is_user_logged_in()) {
            if ($traveladvisor_emp_funs->is_employer()) {   // for employer
                $login_user_args = array(
                    'posts_per_page' => "1",
                    'post_type' => 'employer',
                    'post_status' => 'publish',
                    'meta_query' => array(
                        'relation' => 'AND',
                        array(
                            'key' => 'traveladvisor_user',
                            'value' => $current_user->ID,
                            'compare' => '=',
                        ),
                    ),
                );
                $login_user_query = new WP_Query($login_user_args);
                $user_info = '';
                if ($login_user_query->have_posts()):
                    while ($login_user_query->have_posts()) : $login_user_query->the_post();
                        global $post;
                        $login_employer_post = $post;
                        $user_info['post_id'] = $login_employer_post->ID;
                        $user_info['name'] = get_post_meta($login_employer_post->ID, 'traveladvisor_first_name', true) . " " . get_post_meta($login_employer_post->ID, 'traveladvisor_last_name', true);
                        $user_info['email'] = get_post_meta($login_employer_post->ID, 'traveladvisor_email', true);
                        $user_info['phone'] = get_post_meta($login_employer_post->ID, 'traveladvisor_phone_number', true);
                        $user_info['user_type'] = 'employer';
                    endwhile;
                    wp_reset_postdata();
                endif;
            } else {
                $login_user_args = array(
                    'posts_per_page' => "1",
                    'post_type' => 'candidate',
                    'post_status' => 'publish',
                    'meta_query' => array(
                        'relation' => 'AND',
                        array(
                            'key' => 'traveladvisor_user',
                            'value' => $current_user->ID,
                            'compare' => '=',
                        ),
                    ),
                );
                $login_user_query = new WP_Query($login_user_args);
                $user_info = '';
                if ($login_user_query->have_posts()):
                    while ($login_user_query->have_posts()) : $login_user_query->the_post();
                        global $post;
                        $login_candidate_post = $post;
                        $user_info['post_id'] = $login_candidate_post->ID;
                        $user_info['name'] = get_post_meta($login_candidate_post->ID, 'traveladvisor_first_name', true) . " " . get_post_meta($login_candidate_post->ID, 'traveladvisor_last_name', true);
                        $user_info['email'] = get_post_meta($login_candidate_post->ID, 'traveladvisor_email', true);
                        $user_info['phone'] = get_post_meta($login_candidate_post->ID, 'traveladvisor_phone_number', true);
                        $user_info['user_type'] = 'candidate';
                    endwhile;
                    wp_reset_postdata();
                endif;
            }
        }
        return $user_info;
    }

}
/**
 * End Function how to get login user information
 */
/**
 * Start Function how to get Job Detail
 */
if (!function_exists('get_job_detail')) {

    function get_job_detail($job_id) {
        $post = get_post($job_id);
        return $post;
    }

}
/**
 * End Function how to get Job Detail
 */
/**
 * Start Function how to Check Candidate Applications
 */
if (!function_exists('check_candidate_applications')) {

    function check_candidate_applications($candidate_meta_id) {
        $result_count = 0;
        $traveladvisor_emp_funs = new traveladvisor_employer_functions();
        if (is_user_logged_in() && $traveladvisor_emp_funs->is_employer()) {
            $user_ID = get_current_user_id();   // employer id
            // get candidate user id
            $candidate_id = get_post_meta($candidate_meta_id, 'traveladvisor_user', true);
            // get all applied job array for candidate
            $traveladvisor_jobapplied_array = get_user_meta($candidate_id, 'cs-user-jobs-applied-list', true);
            if (!empty($traveladvisor_jobapplied_array))
                $traveladvisor_jobapplied = array_column_by_two_dimensional($traveladvisor_jobapplied_array, 'post_id');
            else
                $traveladvisor_jobapplied = array();

            $args = array('posts_per_page' => "-1", 'post__in' => $traveladvisor_jobapplied, 'post_type' => 'jobs', 'order' => "ASC", 'post_status' => 'publish',
                'meta_query' => array(
                    array(
                        'key' => 'traveladvisor_job_expired',
                        'value' => strtotime(date('d-m-Y')),
                        'compare' => '>=',
                        'type' => 'numeric'
                    ),
                    array(
                        'key' => 'traveladvisor_job_username',
                        'value' => $user_ID,
                        'compare' => '=',
                    ),
                    array(
                        'key' => 'traveladvisor_job_status',
                        'value' => 'delete',
                        'compare' => '!=',
                    ),
                ),
            );
            $custom_query = new WP_Query($args);
            $result_count = $custom_query->post_count;
        }
        return $result_count;
    }

}
/**
 * End Function how to Check Candidate Applications
 */
/**
 * Start Function how to get User Address for listing
 */
if (!function_exists('get_user_address_string_for_list')) {

    function get_user_address_string_for_list($post_id, $type = 'post') {
        $complete_address = '';

        if ($type == 'post') {
            $traveladvisor_post_loc_address = get_post_meta($post_id, 'traveladvisor_post_loc_address', true);
            $traveladvisor_post_loc_country = get_post_meta($post_id, 'traveladvisor_post_loc_country', true);
            $selected_spec = get_term_by('slug', $traveladvisor_post_loc_country, 'traveladvisor_locations');
            $traveladvisor_post_loc_country = isset($selected_spec->name) ? $selected_spec->name : '';

            $traveladvisor_post_loc_region = get_post_meta($post_id, 'traveladvisor_post_loc_region', true);
            $selected_spec = get_term_by('slug', $traveladvisor_post_loc_region, 'traveladvisor_locations');
            $traveladvisor_post_loc_region = isset($selected_spec->name) ? $selected_spec->name : '';

            $traveladvisor_post_loc_city = get_post_meta($post_id, 'traveladvisor_post_loc_city', true);
            $selected_spec = get_term_by('slug', $traveladvisor_post_loc_city, 'traveladvisor_locations');
            $traveladvisor_post_loc_city = isset($selected_spec->name) ? $selected_spec->name : '';
        } else {
            $traveladvisor_post_loc_address = get_the_author_meta('traveladvisor_post_loc_address', $post_id);
            $traveladvisor_post_loc_country = get_the_author_meta('traveladvisor_post_loc_country', $post_id);
            $selected_spec = get_term_by('slug', $traveladvisor_post_loc_country, 'traveladvisor_locations');
            $traveladvisor_post_loc_country = isset($selected_spec->name) ? $selected_spec->name : '';

            $traveladvisor_post_loc_region = get_the_author_meta('traveladvisor_post_loc_region', $post_id);
            $selected_spec = get_term_by('slug', $traveladvisor_post_loc_region, 'traveladvisor_locations');
            $traveladvisor_post_loc_region = isset($selected_spec->name) ? $selected_spec->name : '';

            $traveladvisor_post_loc_city = get_the_author_meta('traveladvisor_post_loc_city', $post_id);
            $selected_spec = get_term_by('slug', $traveladvisor_post_loc_city, 'traveladvisor_locations');
            $traveladvisor_post_loc_city = isset($selected_spec->name) ? $selected_spec->name : '';
        }



        $complete_address = $traveladvisor_post_loc_city != '' ? $traveladvisor_post_loc_city . ', ' : '';
        $complete_address .= $traveladvisor_post_loc_country != '' ? $traveladvisor_post_loc_country . ' ' : '';

        return $complete_address;
    }

}
/**
 * End Function how to get User Address for listing
 */
/**
 * Start Function how to get User Address details
 */
if (!function_exists('get_user_address_string_for_detail')) {

    function get_user_address_string_for_detail($post_id, $type = 'post') {
        $job_address = '';
        if ($type == 'post') {
            $traveladvisor_post_loc_address = get_post_meta($post_id, 'traveladvisor_post_loc_address', true);
            $traveladvisor_post_loc_country = get_post_meta($post_id, 'traveladvisor_post_loc_country', true);
            $selected_spec = get_term_by('slug', $traveladvisor_post_loc_country, 'traveladvisor_locations');
            $traveladvisor_post_loc_country = isset($selected_spec->name) ? $selected_spec->name : '';

            $traveladvisor_post_loc_region = get_post_meta($post_id, 'traveladvisor_post_loc_region', true);
            $selected_spec = get_term_by('slug', $traveladvisor_post_loc_region, 'traveladvisor_locations');
            $traveladvisor_post_loc_region = isset($selected_spec->name) ? $selected_spec->name : '';

            $traveladvisor_post_loc_city = get_post_meta($post_id, 'traveladvisor_post_loc_city', true);
            $selected_spec = get_term_by('slug', $traveladvisor_post_loc_city, 'traveladvisor_locations');
            $traveladvisor_post_loc_city = isset($selected_spec->name) ? $selected_spec->name : '';
        } else {
            $traveladvisor_post_loc_address = get_the_author_meta('traveladvisor_post_loc_address', $post_id);
            $traveladvisor_post_loc_country = get_the_author_meta('traveladvisor_post_loc_country', $post_id);
            $selected_spec = get_term_by('slug', $traveladvisor_post_loc_country, 'traveladvisor_locations');
            $traveladvisor_post_loc_country = isset($selected_spec->name) ? $selected_spec->name : '';

            $traveladvisor_post_loc_region = get_the_author_meta('traveladvisor_post_loc_region', $post_id);
            $selected_spec = get_term_by('slug', $traveladvisor_post_loc_region, 'traveladvisor_locations');
            $traveladvisor_post_loc_region = isset($selected_spec->name) ? $selected_spec->name : '';

            $traveladvisor_post_loc_city = get_the_author_meta('traveladvisor_post_loc_city', $post_id);
            $selected_spec = get_term_by('slug', $traveladvisor_post_loc_city, 'traveladvisor_locations');
            $traveladvisor_post_loc_city = isset($selected_spec->name) ? $selected_spec->name : '';
        }

        if ($traveladvisor_post_loc_address != '') {
            $job_address .= $traveladvisor_post_loc_address . " ";
        }
        if ($traveladvisor_post_loc_city != '') {
            $job_address .= $traveladvisor_post_loc_city . " ";
        }
        if ($traveladvisor_post_loc_region != '') {
            $job_address .= $traveladvisor_post_loc_region . ", ";
        }
        if ($traveladvisor_post_loc_country != '') {
            $job_address .= $traveladvisor_post_loc_country;
        }
        return $job_address;
    }

}
/**
 * End Function how to get User Address details
 */
/**
 *
 * @get specialism headings
 *
 */
if (!function_exists('get_specialism_headings')) {

    function get_specialism_headings($specialisms) {
        $return_str = '';
        if (count($specialisms) > 0) {
            if (isset($specialisms[0]))
                $specialisms_str = $specialisms[0];
            if (strpos($specialisms_str, ',') !== FALSE) {
                $specialisms = explode(",", $specialisms_str);
            }
            $i = 1;
            foreach ($specialisms as $single_specialism_title) {
                $selected_spec_data = get_term_by('slug', $single_specialism_title, 'specialisms');
                if (isset($selected_spec_data))
                    $return_str .= isset($selected_spec_data->name) ? ($selected_spec_data->name) : '';
                if ($i != count($specialisms))
                    $return_str .= ", ";
                else
                    $return_str.= " ";
                $i++;
            }
        }
        $return_str .= "jobs";
        return $return_str;
    }

}
/**
 * Start Function how to get using servers and servers protocols
 */
if (!function_exists('traveladvisor_server_protocol')) {

    function traveladvisor_server_protocol() {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
            return 'https://';
        }
        return 'http://';
    }

}
/**
 * End Function how to get using servers and servers protocols
 */
if (!function_exists('getMultipleParameters')) {

    function getMultipleParameters($query_string = '') {
        if ($query_string == '')
            $query_string = $_SERVER['QUERY_STRING'];
        $params = explode('&', $query_string);
        foreach ($params as $param) {
            $k = $param;
            $v = '';
            if (strpos($param, '=')) {
                list($name, $value) = explode('=', $param);
                $k = rawurldecode($name);
                $v = rawurldecode($value);
            }
            if (isset($query[$k])) {
                if (is_array($query[$k])) {
                    $query[$k][] = $v;
                } else {
                    $query[$k][] = array($query[$k], $v);
                }
            } else {
                $query[$k][] = $v;
            }
        }
        return $query;
    }

}
/**
 * End Function how to get using servers and servers protocols
 */
/**
 * Start Function how to arrang jobs in shorlist
 */
if (!function_exists('traveladvisor_job_shortlist_load')) {

    function traveladvisor_job_shortlist_load() {
        candidate_header_wishlist();
        die();
    }

    add_action("wp_ajax_traveladvisor_job_shortlist_load", "traveladvisor_job_shortlist_load");
    add_action("wp_ajax_nopriv_traveladvisor_job_shortlist_load", "traveladvisor_job_shortlist_load");
}
/**
 * end Function how to arrang jobs in shorlist
 */
/**
 * Start Function how to Set Geo Location
 */
if (!function_exists('traveladvisor_set_geo_loc')) {

    function traveladvisor_set_geo_loc() {
        $traveladvisor_geo_loc = isset($_POST['geo_loc']) ? $_POST['geo_loc'] : '';
        if (isset($_COOKIE['traveladvisor_geo_loc'])) {
            unset($_COOKIE['traveladvisor_geo_loc']);
            setcookie('traveladvisor_geo_loc', null, -1, '/');
        }
        if (isset($_COOKIE['traveladvisor_geo_switch'])) {
            unset($_COOKIE['traveladvisor_geo_switch']);
            setcookie('traveladvisor_geo_switch', null, -1, '/');
        }
        setcookie('traveladvisor_geo_loc', $traveladvisor_geo_loc, time() + 86400, '/');
        setcookie('traveladvisor_geo_switch', 'on', time() + 86400, '/');
    }

    add_action("wp_ajax_traveladvisor_set_geo_loc", "traveladvisor_set_geo_loc");
    add_action("wp_ajax_nopriv_traveladvisor_set_geo_loc", "traveladvisor_set_geo_loc");
}
/**
 * End Function how to Set Geo Location
 */
/**
 * Start Function how to UnSet Geo Location
 */
if (!function_exists('traveladvisor_unset_geo_loc')) {

    function traveladvisor_unset_geo_loc() {
        if (isset($_COOKIE['traveladvisor_geo_loc'])) {
            unset($_COOKIE['traveladvisor_geo_loc']);
            setcookie('traveladvisor_geo_loc', null, -1, '/');
        }
        if (isset($_COOKIE['traveladvisor_geo_switch'])) {
            unset($_COOKIE['traveladvisor_geo_switch']);
            setcookie('traveladvisor_geo_switch', null, -1, '/');
        }
        setcookie('traveladvisor_geo_loc', '', time() + 86400, '/');
        setcookie('traveladvisor_geo_switch', 'off', time() + 86400, '/');
        die;
    }

    add_action("wp_ajax_traveladvisor_unset_geo_loc", "traveladvisor_unset_geo_loc");
    add_action("wp_ajax_nopriv_traveladvisor_unset_geo_loc", "traveladvisor_unset_geo_loc");
}
/**
 *
 * @set sort filter
 *
 */
if (!function_exists('traveladvisor_set_sort_filter')) {

    function traveladvisor_set_sort_filter() {
        if (session_id() == '') {
            session_start();
        }
        $field_name = $_REQUEST['field_name'];
        $field_name_value = $_REQUEST['field_name_value'];
        $_SESSION[$field_name] = $field_name_value;
        echo 'success';
        die();
    }

    add_action("wp_ajax_traveladvisor_set_sort_filter", "traveladvisor_set_sort_filter");
    add_action("wp_ajax_nopriv_traveladvisor_set_sort_filter", "traveladvisor_set_sort_filter");
}
/**
 * Start Function how to check if Image Exists
 */
if (!function_exists('traveladvisor_image_exist')) {

    function traveladvisor_image_exist($sFilePath) {

        $img_formats = array("png", "jpg", "jpeg", "gif", "tiff"); //Etc. . . 
        $path_info = pathinfo($sFilePath);
        if (isset($path_info['extension']) && in_array(strtolower($path_info['extension']), $img_formats)) {
            if (!filter_var($sFilePath, FILTER_VALIDATE_URL) === false) {
                $traveladvisor_file_response = wp_remote_get($sFilePath);
                if (is_array($traveladvisor_file_response) && isset($traveladvisor_file_response['headers']['content-type']) && strpos($traveladvisor_file_response['headers']['content-type'], 'image') !== false) {
                    return true;
                }
            }
        }
        return false;
    }

}
/**
 *
 * @get query whereclase by array
 *
 */
if (!function_exists('traveladvisor_get_query_whereclase_by_array')) {

    function traveladvisor_get_query_whereclase_by_array($array, $user_meta = false) {
        $id = '';
        $flag_id = 0;
        if (isset($array) && is_array($array)) {
            foreach ($array as $var => $val) {
                $string = ' ';
                $string .= ' AND (';
                if (isset($val['key']) || isset($val['value'])) {
                    $string .= get_meta_condition($val);
                } else {  // if inner array 
                    if (isset($val) && is_array($val)) {
                        foreach ($val as $inner_var => $inner_val) {
                            $inner_relation = isset($inner_val['relation']) ? $inner_val['relation'] : 'and';
                            $second_string = '';

                            if (isset($inner_val) && is_array($inner_val)) {
                                $string .= "( ";
                                $inner_arr_count = is_array($inner_val) ? count($inner_val) : '';
                                $inner_flag = 1;
                                foreach ($inner_val as $inner_val_var => $inner_val_value) {
                                    if (is_array($inner_val_value)) {
                                        $string .= "( ";
                                        $string .= get_meta_condition($inner_val_value);
                                        $string .= ' )';
                                        if ($inner_flag != $inner_arr_count)
                                            $string .= ' ' . $inner_relation . ' ';
                                    }
                                    $inner_flag ++;
                                }
                                $string .= ' )';
                            }
                        }
                    }
                }
                $string .= " ) ";
                $id_condtion = '';
                if (isset($id) && $flag_id != 0) {
                    $id = implode(",", $id);
                    if (empty($id)) {
                        $id = 0;
                    }
                    if ($user_meta == true) {
                        $id_condtion = ' AND user_id IN (' . $id . ')';
                    } else {
                        $id_condtion = ' AND post_id IN (' . $id . ')';
                    }
                }
                if ($user_meta == true) {
                    $id = traveladvisor_get_user_id_by_whereclase($string . $id_condtion);
                } else {
                    $id = traveladvisor_get_post_id_by_whereclase($string . $id_condtion);
                }
                $flag_id = 1;
            }
        }
        return $id;
    }

}
/**
 * Start Function how to get Meta using Conditions
 */
if (!function_exists('get_meta_condition')) {

    function get_meta_condition($val) {
        $string = '';
        $meta_key = isset($val['key']) ? $val['key'] : '';
        $compare = isset($val['compare']) ? $val['compare'] : '=';
        $meta_value = isset($val['value']) ? $val['value'] : '';
        $string .= " meta_key='" . $meta_key . "' AND ";
        $type = isset($val['type']) ? $val['type'] : '';
        if ($compare == 'BETWEEN' || $compare == 'between' || $compare == 'Between') {
            $meta_val1 = '';
            $meta_val2 = '';
            if (isset($meta_value) && is_array($meta_value)) {
                $meta_val1 = isset($meta_value[0]) ? $meta_value[0] : '';
                $meta_val2 = isset($meta_value[1]) ? $meta_value[1] : '';
            }
            if ($type != '' && strtolower($type) == 'numeric') {
                $string .= " meta_value BETWEEN '" . $meta_val1 . "' AND " . $meta_val2 . " ";
            } else {
                $string .= " meta_value BETWEEN '" . $meta_val1 . "' AND '" . $meta_val2 . "' ";
            }
        } elseif ($compare == 'like' || $compare == 'LIKE' || $compare == 'Like') {
            $string .= " meta_value LIKE '%" . $meta_value . "%' ";
        } else {
            if ($type != '' && strtolower($type) == 'numeric') {
                $string .= " meta_value" . $compare . " " . $meta_value . " ";
            } else {
                $string .= " meta_value" . $compare . "'" . $meta_value . "' ";
            }
        }
        return $string;
    }

}
/**
 * end Function how to get Meta using Conditions
 */
/**
 * Start Function how to get post id using whereclase Query
 */
if (!function_exists('traveladvisor_get_post_id_by_whereclase')) {

    function traveladvisor_get_post_id_by_whereclase($whereclase) {
        global $wpdb;
        $qry = "SELECT post_id FROM $wpdb->postmeta WHERE 1=1 " . $whereclase;
        return $posts = $wpdb->get_col($qry);
    }

}

if (!function_exists('traveladvisor_get_user_id_by_whereclase')) {

    function traveladvisor_get_user_id_by_whereclase($whereclase) {
        global $wpdb;
        $qry = "SELECT user_id FROM $wpdb->usermeta WHERE 1=1 " . $whereclase;
        return $posts = $wpdb->get_col($qry);
    }

}

/**
 * end Function how to get post id using whereclase Query
 */
/**
 * Start Function how to get post id using whereclase Query
 */
if (!function_exists('traveladvisor_get_post_id_whereclause_post')) {

    function traveladvisor_get_post_id_whereclause_post($whereclase) {
        global $wpdb;
        $qry = "SELECT ID FROM $wpdb->posts WHERE 1=1 " . $whereclase;
        return $posts = $wpdb->get_col($qry);
    }

}
/**
 * End Function how to get post id using whereclase Query
 */
/**
 *
 * @array_flatten
 *
 */
if (!function_exists('array_flatten')) {

    function array_flatten($array) {
        $return = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $return = array_merge($return, array_flatten($value));
            } else {
                $return[$key] = $value;
            }
        }
        return $return;
    }

}
/**
 * Start Function how to remove Dupplicate variable value
 */
if (!function_exists('remove_dupplicate_var_val')) {

    function remove_dupplicate_var_val($qry_str) {
        $old_string = $qry_str;
        $qStr = str_replace("?", "", $qry_str);
        $query = explode('&', $qStr);
        $params = array();
        if (isset($query) && !empty($query)) {
            foreach ($query as $param) {
                if (!empty($param)) {
                    $param_array = explode('=', $param);
                    $name = isset($param_array[0]) ? $param_array[0] : '';
                    $value = isset($param_array[1]) ? $param_array[1] : '';
                    $new_str = $name . "=" . $value;
                    // count matches
                    $count_str = substr_count($old_string, $new_str);
                    $count_str = $count_str - 1;
                    if ($count_str > 0) {
                        $old_string = traveladvisor_str_replace_limit($new_str, "", $old_string, $count_str);
                    }
                    $old_string = str_replace("&&", "&", $old_string);
                }
            }
        }
        $old_string = str_replace("?&", "?", $old_string);
        return $old_string;
    }

}
/**
 *
 * @str replace limit
 *
 */
if (!function_exists('traveladvisor_str_replace_limit')) {

    function traveladvisor_str_replace_limit($search, $replace, $string, $limit = 1) {
        if (is_bool($pos = (strpos($string, $search))))
            return $string;
        $search_len = strlen($search);
        for ($i = 0; $i < $limit; $i++) {
            $string = substr_replace($string, $replace, $pos, $search_len);

            if (is_bool($pos = (strpos($string, $search))))
                break;
        }
        return $string;
    }

}
/**
 * Start Function how to allow the user for adding special characters
 */
if (!function_exists('traveladvisor_allow_special_char')) {

    function traveladvisor_allow_special_char($input = '') {
        $output = $input;
        return $output;
    }

}
/**
 * End Function how to allow the user for adding special characters
 */
/* tgm class for (internal and WordPress repository) plugin activation end */
/* Thumb size On Blogs Detail */
add_image_size('traveladvisor_media_1', 870, 489, true);
/* Thumb size On Related Blogs On Detail, blogs on listing, Candidate Detail Portfolio */
add_image_size('traveladvisor_media_2', 270, 203, true);
/* Thumb size On Blogs On slider, blogs on listing, Candidate Detail Portfolio */
add_image_size('traveladvisor_media_3', 236, 168, true);
add_image_size('traveladvisor_media_4', 200, 200, true);
/* Thumb size On BEmployer Listing, Employer Listing View 2,Candidate Detail ,User Resume, company profile */
add_image_size('traveladvisor_media_5', 180, 135, true);
/* Thumb size On Candidate ,Candidate , Listing 2, Employer Detail,Related Jobs */
add_image_size('traveladvisor_media_6', 150, 113, true);
add_image_size('traveladvisor_media_7', 120, 90, true);
/**
 *
 * @site header login plugin
 *
 */
if (!function_exists('traveladvisor_site_header_login_plugin')) {

    //add_filter('wp_nav_menu_items', 'traveladvisor_site_header_login_plugin', 10, 2);

    function traveladvisor_site_header_login_plugin($items, $args) {
        global $traveladvisor_plugin_options;
        if (isset($traveladvisor_plugin_options['traveladvisor_user_dashboard_switchs']) && $traveladvisor_plugin_options['traveladvisor_user_dashboard_switchs'] == 'on') {
            if ($args->theme_location == 'primary') {
                echo do_shortcode('[traveladvisor_user_login register_role="contributor"] [/traveladvisor_user_login]');
            }
        }

        return $items;
    }

}
/**
 * Start Function how to share the posts
 */
if (!function_exists('traveladvisor_social_share')) {

    function traveladvisor_social_share() {
        global $traveladvisor_plugin_options;
        $traveladvisor_plugin_options = get_option('traveladvisor_plugin_options');
        $twitter = '';
        $facebook = '';
        $google_plus = '';
        $tumblr = '';
        $dribbble = '';
        $share = '';
        $stumbleupon = '';
      
        $pinterst = '';
        if (isset($traveladvisor_plugin_options['traveladvisor_twitter_share'])) {
            $twitter = $traveladvisor_plugin_options['traveladvisor_twitter_share'];
        }
        if (isset($traveladvisor_plugin_options['traveladvisor_facebook_share'])) {
            $facebook = $traveladvisor_plugin_options['traveladvisor_facebook_share'];
        }
        if (isset($traveladvisor_plugin_options['traveladvisor_google_plus_share'])) {
            $google_plus = $traveladvisor_plugin_options['traveladvisor_google_plus_share'];
        }
        if (isset($traveladvisor_plugin_options['traveladvisor_tumblr_share'])) {
            $tumblr = $traveladvisor_plugin_options['traveladvisor_tumblr_share'];
        }
        if (isset($traveladvisor_plugin_options['traveladvisor_dribbble_share'])) {
            $dribbble = $traveladvisor_plugin_options['traveladvisor_dribbble_share'];
        }
        if (isset($traveladvisor_plugin_options['traveladvisor_share_share'])) {
            $share = $traveladvisor_plugin_options['traveladvisor_share_share'];
        }
        if (isset($traveladvisor_plugin_options['traveladvisor_stumbleupon_share'])) {
            $stumbleupon = $traveladvisor_plugin_options['traveladvisor_stumbleupon_share'];
        }
        if (isset($traveladvisor_plugin_options['traveladvisor_pintrest_share'])) {
            $pinterst = $traveladvisor_plugin_options['traveladvisor_pintrest_share'];
        }
        traveladvisor_addthis_script_init_method();
        $html = '';
        if ($twitter == 'on' or $facebook == 'on' or $google_plus == 'on' or $pinterst == 'on' or $tumblr == 'on' or $dribbble == 'on'  or $share == 'on' or $stumbleupon == 'on') {
            if (isset($facebook) && $facebook == 'on') {
                $html .='<li><a class="addthis_button_facebook" data-original-title="Facebook"><i class="icon-facebook2"></i></a></li>';
            }
            if (isset($twitter) && $twitter == 'on') {
                $html .='<li><a class="addthis_button_twitter" data-original-title="twitter"><i class="icon-twitter2"></i></a></li>';
            }
            if (isset($google_plus) && $google_plus == 'on') {
                $html .='<li><a class="addthis_button_google" data-original-title="google-plus"><i class="icon-googleplus7"></i></a></li>';
            }
            if (isset($tumblr) && $tumblr == 'on') {
                $html .='<li><a class="addthis_button_tumblr" data-original-title="Tumblr"><i class="icon-tumblr5"></i></a></li>';
            }
            if (isset($dribbble) && $dribbble == 'on') {
                $html .='<li><a class="addthis_button_dribbble" data-original-title="Dribbble"><i class="icon-dribbble7"></i></a></li>';
            }
            
            if (isset($stumbleupon) && $stumbleupon == 'on') {
                $html .='<li><a class="addthis_button_stumbleupon" data-original-title="stumbleupon"><i class="icon-stumbleupon4"></i></a></li>';
            }
            if (isset($pinterst) && $pinterst == 'on') {
                $html .='<li><a class="addthis_button_youtube" data-original-title="Youtube"><i class="icon-pinterest"></i></a></li>';
            }
            if (isset($share) && $share == 'on') {
                $html .= '<li><a class="cs-more addthis_button_compact at300m"></a></li>';
            }
            $html .= '</ul>';
        }
        echo traveladvisor_allow_special_char($html, true);
    }

}



/**
 * Start Function how to share the posts
 */
if (!function_exists('traveladvisor_social_more')) {

    function traveladvisor_social_more() {
        global $traveladvisor_plugin_options;
        $traveladvisor_plugin_options = get_option('traveladvisor_plugin_options');
        $twitter = '';
        $facebook = '';
        $google_plus = '';
        $tumblr = '';
        $dribbble = '';
        $instagram = '';
        $share = '';
        $stumbleupon = '';
        $youtube = '';
        $pinterst = '';
        if (isset($traveladvisor_plugin_options['traveladvisor_twitter_share'])) {
            $twitter = $traveladvisor_plugin_options['traveladvisor_twitter_share'];
        }
        if (isset($traveladvisor_plugin_options['traveladvisor_facebook_share'])) {
            $facebook = $traveladvisor_plugin_options['traveladvisor_facebook_share'];
        }
        if (isset($traveladvisor_plugin_options['traveladvisor_google_plus_share'])) {
            $google_plus = $traveladvisor_plugin_options['traveladvisor_google_plus_share'];
        }
        if (isset($traveladvisor_plugin_options['traveladvisor_tumblr_share'])) {
            $tumblr = $traveladvisor_plugin_options['traveladvisor_tumblr_share'];
        }
        if (isset($traveladvisor_plugin_options['traveladvisor_dribbble_share'])) {
            $dribbble = $traveladvisor_plugin_options['traveladvisor_dribbble_share'];
        }
        if (isset($traveladvisor_plugin_options['traveladvisor_instagram_share'])) {
            $instagram = $traveladvisor_plugin_options['traveladvisor_instagram_share'];
        }
        if (isset($traveladvisor_plugin_options['traveladvisor_share_share'])) {
            $share = $traveladvisor_plugin_options['traveladvisor_share_share'];
        }
        if (isset($traveladvisor_plugin_options['traveladvisor_stumbleupon_share'])) {
            $stumbleupon = $traveladvisor_plugin_options['traveladvisor_stumbleupon_share'];
        }
        if (isset($traveladvisor_plugin_options['traveladvisor_youtube_share'])) {
            $youtube = $traveladvisor_plugin_options['traveladvisor_youtube_share'];
        }
        if (isset($traveladvisor_plugin_options['traveladvisor_pintrest_share'])) {
            $pinterst = $traveladvisor_plugin_options['traveladvisor_pintrest_share'];
        }
        traveladvisor_addthis_script_init_method();
        $html = '';
        if (isset($share) && $share == 'on') {
            $html .= '<a class="addthis_button_compact share-btn">Share Job</a>';
        }


        echo traveladvisor_allow_special_char($html, true);
    }

}
/**
 * End Function how to share the posts
 */
/**
 * Start Function how to add tool tip text 
 */
if (!function_exists('traveladvisor_tooltip_helptext')) {

    function traveladvisor_tooltip_helptext($popover_text = '', $return_html = true) {
        $popover_link = '';
        if (isset($popover_text) && $popover_text != '') {
            $popover_link = '<a class="cs-help cs" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="' . $popover_text . '"><i class="icon-help"></i></a>';
        }
        if ($return_html == true) {
            return $popover_link;
        } else {
            echo  traveladvisor_allow_special_char($popover_link);
        }
    }

}
/*
 *  End tool tip text asaign function
 */

/**
 * Start Function how to add tool tip text without icon only tooltip string
 */
if (!function_exists('traveladvisor_tooltip_helptext_string')) {

    function traveladvisor_tooltip_helptext_string($popover_text = '', $return_html = true, $class = '') {
        $popover_link = '';
        if (isset($popover_text) && $popover_text != '') {
            $popover_link = ' class="cs-help cs ' . $class . '" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="' . $popover_text . '" ';
        }
        if ($return_html == true) {
            return $popover_link;
        } else {
             echo  traveladvisor_allow_special_char($popover_link);
        }
    }

}
/*
 *  End tool tip text asaign function
 */


// Fontawsome icon box for Theme Options
if (!function_exists('traveladvisor_iconlist_plugin_options')) {

    function traveladvisor_iconlist_plugin_options($icon_value = '', $id = '', $name = '') {
        global $traveladvisor_form_fields2;
        ob_start();
        ?>
        <script>

            jQuery(document).ready(function ($) {

                var this_icons;
				var e9_element = $('#e9_element_<?php echo esc_html($id) ?>').fontIconPicker({
					theme: 'fip-bootstrap'
				});
				icons_load_call.always(function () {
					this_icons = loaded_icons;
					// Get the class prefix
					var classPrefix = this_icons.preferences.fontPref.prefix,
							icomoon_json_icons = [],
							icomoon_json_search = [];
					$.each(this_icons.icons, function (i, v) {
							icomoon_json_icons.push(classPrefix + v.properties.name);
							if (v.icon && v.icon.tags && v.icon.tags.length) {
									icomoon_json_search.push(v.properties.name + ' ' + v.icon.tags.join(' '));
							} else {
									icomoon_json_search.push(v.properties.name);
							}
					});
					// Set new fonts on fontIconPicker
					e9_element.setIcons(icomoon_json_icons, icomoon_json_search);
					// Show success message and disable
					$('#e9_buttons_<?php echo esc_html($id) ?> button').removeClass('btn-primary').addClass('btn-success').text('<?php _e('Successfully loaded icons', 'traveladvisor') ?>').prop('disabled', true);
				})
				.fail(function () {
					// Show error message and enable
					$('#e9_buttons_<?php echo esc_html($id) ?> button').removeClass('btn-primary').addClass('btn-danger').text('<?php _e('Error: Try Again?', 'traveladvisor') ?>').prop('disabled', false);
				});
            });

        </script>
        <?php
        $traveladvisor_opt_array = array(
            'id' => '',
            'std' => traveladvisor_allow_special_char($icon_value),
            'cust_id' => "e9_element_" . traveladvisor_allow_special_char($id),
            'cust_name' => traveladvisor_allow_special_char($name) . "[]",
            'classes' => '',
            'extra_atr' => '',
        );
        $traveladvisor_form_fields2->traveladvisor_form_text_render($traveladvisor_opt_array);
        ?>
        <span id="e9_buttons_<?php echo traveladvisor_allow_special_char($id); ?>" style="display:none">
            <button autocomplete="off" type="button" class="btn btn-primary">Load from IcoMoon selection.json</button>
        </span>

        <?php
        $fontawesome = ob_get_clean();
        return $fontawesome;
    }

}
/*
 * start information messages
 */
if (!function_exists('traveladvisor_info_messages_listing')) {

    function traveladvisor_info_messages_listing($message = 'There is no record in list', $return = true, $classes = '', $before = '', $after = '') {
        global $post;
        $output = '';
        $class_str = '';
        if ($classes != '') {
            $class_str .= ' class="' . $classes . '"';
        }
        $before_str = '';
        if ($before != '') {
            $before_str .= $before;
        }
        $after_str = '';
        if ($after != '') {
            $after_str .= $after;
        }
        $output .= $before_str;
        $output .= '<span' . $class_str . '>';
        $output .= $message;
        $output .= '</span>';
        $output .= $after_str;
        if ($return == true) {
            return traveladvisor_allow_special_char($output);
        } else {
            echo traveladvisor_allow_special_char($output);
        }
    }

}
/*
 * end information messages
 */

/* define it global */
$umlaut_chars['in'] = array(chr(196), chr(228), chr(214), chr(246), chr(220), chr(252), chr(223));
$umlaut_chars['ecto'] = array(' ', '', '', '', '', '', '');
$umlaut_chars['html'] = array('&Auml;', '&auml;', '&Ouml;', '&ouml;', '&Uuml;', '&uuml;', '&szlig;');
$umlaut_chars['feed'] = array('&#196;', '&#228;', '&#214;', '&#246;', '&#220;', '&#252;', '&#223;');
$umlaut_chars['utf8'] = array(utf8_encode(' '), utf8_encode(''), utf8_encode(''), utf8_encode(''), utf8_encode(''), utf8_encode(''), utf8_encode(''));
$umlaut_chars['perma'] = array('Ae', 'ae', 'Oe', 'oe', 'Ue', 'ue', 'ss');

/* sanitizes the titles to get qualified german permalinks with  correct transliteration */

function traveladvisor_DE_umlaut_permalinks($title) {
    global $umlaut_chars;

    if (seems_utf8($title)) {
        $invalid_latin_chars = array(chr(197) . chr(146) => 'OE', chr(197) . chr(147) => 'oe', chr(197) . chr(160) => 'S', chr(197) . chr(189) => 'Z', chr(197) . chr(161) => 's', chr(197) . chr(190) => 'z', chr(226) . chr(130) . chr(172) => 'E');
        $title = utf8_decode(strtr($title, $invalid_latin_chars));
    }

    $title = str_replace($umlaut_chars['ecto'], $umlaut_chars['perma'], $title);
    $title = str_replace($umlaut_chars['in'], $umlaut_chars['perma'], $title);
    $title = str_replace($umlaut_chars['html'], $umlaut_chars['perma'], $title);
    $title = sanitize_title_with_dashes($title);

    return $title;
}

add_filter('sanitize_title', 'traveladvisor_DE_umlaut_permalinks');


if (!function_exists('wp_new_user_notification')) :

    function wp_new_user_notification($user_id, $plaintext_pass = '') {
    
        $strings = new traveladvisor_theme_all_strings;
        $strings -> traveladvisor_theme_strings();

        $user = new WP_User($user_id);

        $user_login = stripslashes($user->user_login);
        $user_email = stripslashes($user->user_email);

        // The blogname option is escaped with esc_html on the way into the database in sanitize_option
        // we want to reverse this for the plain text arena of emails.
        $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

        $message = sprintf(__('New user registration on your site %s:',"traveladvisor"), $blogname) . "\r\n\r\n";
        $message .= sprintf(traveladvisor_var_theme_text_srt('traveladvisor_var_theme_username'), $user_login) . "\r\n\r\n";
        $message .= sprintf(traveladvisor_var_theme_text_srt('traveladvisor_var_theme_email'), $user_email) . "\r\n";

        //@wp_mail(get_option('admin_email'), sprintf(traveladvisor_var_theme_text_srt('traveladvisor_var_theme_new_user_registration'), $blogname), $message);
        $email_sent = apply_filters('send_mails_theme', get_option('admin_email'),  sprintf(traveladvisor_var_theme_text_srt('traveladvisor_var_theme_new_user_registration'), $blogname), $message, $headers, '');
        if (empty($plaintext_pass))
            return;

        $message = sprintf(traveladvisor_var_theme_text_srt('traveladvisor_var_theme_username'), $user_login) . "\r\n";
        $message .= sprintf(traveladvisor_var_theme_text_srt('traveladvisor_var_theme_password'), $plaintext_pass) . "\r\n";
        $message .= wp_login_url() . "\r\n";
        $message .= 'test' . "\r\n";
        $email_sent = apply_filters('send_mails_theme', $user_email,  sprintf(traveladvisor_var_theme_text_srt('traveladvisor_var_theme_username_and_pass'), $blogname), $message, $headers, '');
        //wp_mail($user_email, sprintf(traveladvisor_var_theme_text_srt('traveladvisor_var_theme_username_and_pass'), $blogname), $message);
    }

endif;
if (!function_exists('traveladvisor_get_loginuser_role')) :

    function traveladvisor_get_loginuser_role() {
        global $current_user;
        $traveladvisor_user_role = '';
        if (is_user_logged_in()) {
            wp_get_current_user();
            $user_roles = isset($current_user->roles) ? $current_user->roles : '';
            $traveladvisor_user_role = 'other';
            if (($user_roles != '' && in_array("traveladvisor_employer", $user_roles))) {
                $traveladvisor_user_role = 'traveladvisor_employer';
            } elseif (($user_roles != '' && in_array("traveladvisor_candidate", $user_roles))) {
                $traveladvisor_user_role = 'traveladvisor_candidate';
            }
        }
        return $traveladvisor_user_role;
    }

endif;

//change author/username base to users/userID
function traveladvisor_change_author_permalinks() {
    global $wp_rewrite, $traveladvisor_plugin_options;
    $author_slug = isset($traveladvisor_plugin_options['traveladvisor_author_page_slug']) ? $traveladvisor_plugin_options['traveladvisor_author_page_slug'] : 'user';
    // Change the value of the author permalink base to whatever you want here
    $wp_rewrite->author_base = $author_slug;
    $wp_rewrite->flush_rules();
}

add_action('init', 'traveladvisor_change_author_permalinks');
add_filter('query_vars', 'traveladvisor_users_query_vars');

function traveladvisor_users_query_vars($vars) {
    global $traveladvisor_plugin_options;
    // add lid to the valid list of variables
    $author_slug = isset($traveladvisor_plugin_options['traveladvisor_author_page_slug']) ? $traveladvisor_plugin_options['traveladvisor_author_page_slug'] : 'user';
    $new_vars = array($author_slug);
    $vars = $new_vars + $vars;
    return $vars;
}

function traveladvisor_user_rewrite_rules($wp_rewrite) {
    global $traveladvisor_plugin_options;
    $author_slug = isset($traveladvisor_plugin_options['traveladvisor_author_page_slug']) ? $traveladvisor_plugin_options['traveladvisor_author_page_slug'] : 'user';
    $newrules = array();
    $new_rules[$author_slug . '/(\d*)$'] = 'index.php?author=$matches[1]';
    $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}

add_filter('generate_rewrite_rules', 'traveladvisor_user_rewrite_rules');
/*
 *
 * @Shortcode Name: Start function for Map shortcode/element front end view
 * @retrun
 *

if (!function_exists('traveladvisor_job_map')) {

    function traveladvisor_job_map($atts, $content = "") {

        $defaults = array(
            'column_size' => '1/1',
            'traveladvisor_map_section_title' => '',
            'map_title' => '',
            'map_height' => '',
            'map_lat' => '51.507351',
            'map_lon' => '-0.127758',
            'map_zoom' => '',
            'map_type' => '',
            'map_info' => '',
            'map_info_width' => '200',
            'map_info_height' => '200',
            'map_marker_icon' => '',
            'map_show_marker' => 'true',
            'map_controls' => '',
            'map_draggable' => '',
            'map_scrollwheel' => '',
            'map_conactus_content' => '',
            'map_border' => '',
            'map_border_color' => '',
            'traveladvisor_map_style' => '',
            'traveladvisor_map_class' => '',
            'traveladvisor_map_directions' => 'off'
        );
        extract(shortcode_atts($defaults, $atts));



        if ($map_info_width == '' || $map_info_height == '') {
            $map_info_width = '300';
            $map_info_height = '150';
        }

        if (isset($map_height) && $map_height == '') {
            $map_height = '500';
        }
        $map_dynmaic_no = rand(6548, 9999999);
        if ($map_show_marker == "true") {
            $map_show_marker = " var marker = new google.maps.Marker({
                        position: myLatlng,
                        map: map,
                        title: '',
                        icon: '" . $map_marker_icon . "',
                        shadow: ''
                    });
            ";
        } else {
            $map_show_marker = "var marker = new google.maps.Marker({
                        position: myLatlng,
                        map: map,
                        title: '',
                        icon: '',
                        shadow: ''
                    });";
        }
        $border = '';
        if (isset($map_border) && $map_border == 'yes' && $map_border_color != '') {
            $border = 'border:1px solid ' . $map_border_color . '; ';
        }

        $map_type = isset($map_type) ? $map_type : '';
        $map_dynmaic_no = traveladvisor_generate_random_string('10');
        $html = '';
        $html .= '<div  class="' . $traveladvisor_map_class . ' " style="animation-duration:">';
        $html .= '<div class="clear"></div>';
        $html .= '<div class="cs-map-section" style="' . $border . ';">';
        $html .= '<div class="cs-map">';
        $html .= '<div class="cs-map-content">';

        $html .= '<div class="mapcode iframe mapsection gmapwrapp" id="map_canvas' . $map_dynmaic_no . '" style="height:' . $map_height . 'px;"> </div>';


        $html .= '</div>';
        $html .= '</div>';
        $html .= "<script type='text/javascript'>
                    jQuery(window).load(function(){
						'use strict';
                        setTimeout(function(){
                        jQuery('.cs-map-" . $map_dynmaic_no . "').animate({
                            'height':'" . $map_height . "'
                        },400)
                        },400)
                    })
		    var panorama;
                    function initialize() {
                    var myLatlng = new google.maps.LatLng(" . $map_lat . ", " . $map_lon . ");
                    var mapOptions = {
                        zoom: " . $map_zoom . ",
                        scrollwheel: " . $map_scrollwheel . ",
                        draggable: " . $map_draggable . ",
                        streetViewControl: false,
                        center: myLatlng,
                        mapTypeId: google.maps.MapTypeId." . $map_type . ",
                        disableDefaultUI: " . $map_controls . ",
                        };";


        $html .= "var map = new google.maps.Map(document.getElementById('map_canvas" . $map_dynmaic_no . "'), mapOptions);";


        $html .= "
                        var styles = '';
                        if(styles != ''){
                            var styledMap = new google.maps.StyledMapType(styles, {name: 'Styled Map'});
                            map.mapTypes.set('map_style', styledMap);
                            map.setMapTypeId('map_style');
                        }
                        var infowindow = new google.maps.InfoWindow({
                            content: '" . $map_info . "',
                            maxWidth: " . $map_info_width . ",
                            maxHeight: " . $map_info_height . ",
                            
                        });
                        " . $map_show_marker . "
                        //google.maps.event.addListener(marker, 'click', function() {
                            if (infowindow.content != ''){
                              infowindow.open(map, marker);
                               map.panBy(1,-60);
                               google.maps.event.addListener(marker, 'click', function(event) {
                                infowindow.open(map, marker);
                               });
                            }
                        //});
                            panorama = map.getStreetView();
                            panorama.setPosition(myLatlng);
                            panorama.setPov(({
                              heading: 265,
                              pitch: 0
                            }));

                    }
					
                        function traveladvisor_toggle_street_view(btn) {
                          var toggle = panorama.getVisible();
                          if (toggle == false) {
                                if(btn == 'streetview'){
                                  panorama.setVisible(true);
                                }
                          } else {
                                if(btn == 'mapview'){
                                  panorama.setVisible(false);
                                }
                          }
                        }

                google.maps.event.addDomListener(window, 'load', initialize);
                </script>";

        $html .= '</div>';
        $html .= '</div>';
        echo traveladvisor_allow_special_char( $html);
    }

}
/*
 * Bootstrap Coloumn Class
 */
if (!function_exists('traveladvisor_custom_column_class')) {

    function traveladvisor_custom_column_class($column_size) {
        $coloumn_class = '';
        if (isset($column_size) && $column_size <> '') {
            list($top, $bottom) = explode('/', $column_size);
            $width = $top / $bottom * 100;
            $width = (int) $width;
            $coloumn_class = '';
            if (round($width) == '25' || round($width) < 25) {
                $coloumn_class = 'col-md-3';
            } elseif (round($width) == '33' || (round($width) < 33 && round($width) > 25)) {
                $coloumn_class = 'col-md-4';
            } elseif (round($width) == '50' || (round($width) < 50 && round($width) > 33)) {
                $coloumn_class = 'col-md-6';
            } elseif (round($width) == '67' || (round($width) < 67 && round($width) > 50)) {
                $coloumn_class = 'col-md-8';
            } elseif (round($width) == '75' || (round($width) < 75 && round($width) > 67)) {
                $coloumn_class = 'col-md-9';
            } elseif (round($width) == '100') {
                $coloumn_class = 'col-md-12';
            } else {
                $coloumn_class = '';
            }
        }
        return sanitize_html_class($coloumn_class);
    }

}