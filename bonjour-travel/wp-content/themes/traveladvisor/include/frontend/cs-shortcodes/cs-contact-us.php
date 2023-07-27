<?php
/*
 * Frontend file for Contact Us short code
 */
if (!function_exists('traveladvisor_contact_us_data')) {

    function traveladvisor_contact_us_data($atts, $content = "") {
        global $post;
        $defaults = shortcode_atts(array(
            'traveladvisor_var_column_size' => '',
            'traveladvisor_var_contact_us_element_title' => '',
            'traveladvisor_var_contact_us_element_send' => '',
            'traveladvisor_var_contact_us_element_success' => '',
            'traveladvisor_var_contact_us_element_error' => ''
                ), $atts);

        extract(shortcode_atts($defaults, $atts));
        if (isset($traveladvisor_var_column_size) && $traveladvisor_var_column_size != '') {
            if (function_exists('traveladvisor_var_custom_column_class')) {
                $column_class = traveladvisor_var_custom_column_class($traveladvisor_var_column_size);
            }
        }
        $traveladvisor_email_counter = rand(56, 5565);
        // Set All variables 
        $html = '';
        $section_title = '';
        $column_class = isset($column_class) ? $column_class : '';
        $traveladvisor_contactus_section_title = isset($traveladvisor_var_contact_us_element_title) ? $traveladvisor_var_contact_us_element_title : '';
        $traveladvisor_contactus_send = isset($traveladvisor_var_contact_us_element_send) ? $traveladvisor_var_contact_us_element_send : '';
        $traveladvisor_success = isset($traveladvisor_var_contact_us_element_success) ? $traveladvisor_var_contact_us_element_success : '';
        $traveladvisor_error = isset($traveladvisor_var_contact_us_element_error) ? $traveladvisor_var_contact_us_element_error : '';
        // End All variables
        if (isset($column_class) && $column_class != '') {
            $html .= '<div class="' . esc_html($column_class) . '">';
        }
        $html .='<div class="cs-contact-form">';
        $html .='<div class="cs-element-title">
                                  	  <h3 style="font:700 20px/26px Poppins, sans-serif !important">' . esc_html($traveladvisor_contactus_section_title) . '</h3>
                                </div>';
        if (trim($traveladvisor_success) && trim($traveladvisor_success) != '') {
            $success = $traveladvisor_success;
        } else {
            $success = __('Email has been sent Successfully', 'traveladvisor');
        }
        if (trim($traveladvisor_error) && trim($traveladvisor_error) != '') {
            $error = $traveladvisor_error;
        } else {
            $error = __('An error Occured, please try again later', 'traveladvisor');
        }
        ?>
        <script type="text/javascript">
            function traveladvisor_var_contact_frm_submit(form_id) {
                var traveladvisor_mail_id = '<?php echo esc_js($traveladvisor_email_counter); ?>';
                if (form_id == traveladvisor_mail_id) {
                    var $ = jQuery;
                    $("#loading_div<?php echo esc_js($traveladvisor_email_counter); ?>").html('<img src="<?php echo esc_js(esc_url(get_template_directory_uri())); ?>/assets/backend/images/ajax-loader.gif" />');
                    $("#loading_div<?php echo esc_js($traveladvisor_email_counter); ?>").show();
                    $("#message<?php echo esc_js($traveladvisor_email_counter); ?>").html('');
                    var datastring = $('#frm<?php echo esc_js($traveladvisor_email_counter); ?>').serialize() + "&traveladvisor_contact_email=<?php echo esc_js($traveladvisor_contactus_send); ?>&traveladvisor_contact_succ_msg=<?php echo esc_js($success); ?>&traveladvisor_contact_error_msg=<?php echo esc_js($error); ?>&action=traveladvisor_var_contact_form_submit";

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo esc_js(esc_url(admin_url('admin-ajax.php'))); ?>',
                        data: datastring,
                        dataType: "json",
                        success: function (response) {

                            if (response.type == 'error') {
                                $("#loading_div<?php echo esc_js($traveladvisor_email_counter); ?>").html('');
                                $("#loading_div<?php echo esc_js($traveladvisor_email_counter); ?>").hide();
                                $("#message<?php echo esc_js($traveladvisor_email_counter); ?>").addClass('error_message');
                                $("#message<?php echo esc_js($traveladvisor_email_counter); ?>").show();
                                $("#message<?php echo esc_js($traveladvisor_email_counter) ?>").html(response.message);
                            } else if (response.type == 'success') {
                                $("#ul_frm<?php echo esc_js($traveladvisor_email_counter); ?>").slideUp();
                                $("#loading_div<?php echo esc_js($traveladvisor_email_counter); ?>").html('');
                                $("#loading_div<?php echo esc_js($traveladvisor_email_counter); ?>").hide();
                                $("#message<?php echo esc_js($traveladvisor_email_counter); ?>").addClass('succ_message');
                                $("#message<?php echo esc_js($traveladvisor_email_counter) ?>").show();
                                $("#message<?php echo esc_js($traveladvisor_email_counter); ?>").html(response.message);
                            }

                        }
                    }
                    );
                }
            }
        </script>
        <?php
        $html .='<div class="form-holder">';
        $html .='<form  name="frm' . absint($traveladvisor_email_counter) . '" id="frm' . absint($traveladvisor_email_counter) . '" action="javascript:traveladvisor_var_contact_frm_submit(' . absint($traveladvisor_email_counter) . ')" >';

        $html .= '<span id="message' . absint($traveladvisor_email_counter) . '" class="cs-error" style="display:none;">' . __('*ERROR: please fill the required fields.', 'traveladvisor') . ' </span>';

        $html .='<div class="row">';

        $html .= '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">';
        $html .= '<div class="input-holder"> '
                . '<i class="icon-user"></i><input name="contact_name" type="text" placeholder="' . __('Name', 'traveladvisor') . '" required>'
                . '</div>';
        $html .= '</div>';

        $html .= '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">';
        $html .=' <div class="input-holder"><i class="icon-envelope"></i> <input name="contact_email" type="email" required placeholder="' . __('Email', 'traveladvisor') . '"></div>';
        $html .= '</div>';

        $html .= '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">';
        $html .= '<div class="input-holder"><i class="icon-phone3"></i><input name="contact_phone" type="text"  required placeholder="' . __('Phone', 'traveladvisor') . '"></div>';
        $html .= '</div>';

        $html .= '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">';
        $html .= '<div class="input-holder"><i class="icon-align-left"></i><input name="contact_subject_type" type="text"  required placeholder="' . __('Subject', 'traveladvisor') . '"></div>';
        $html .= '</div>';

        $html .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
        $html .= ' <div class="input-holder"><i class="icon-pencil-square-o"></i><textarea name="contact_msg" required placeholder="' . __('Message', 'traveladvisor') . '"></textarea></div>';
        $html .= '</div>';

        $html .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
        $html .= '<div class="input-button"><input type="submit" class="cs-bgcolor csborder-color"  value="' . __('Submit', 'traveladvisor') . '"><div id="loading_div' . absint($traveladvisor_email_counter) . '"></div></div>';
        $html .= '</div>';

        $html .= '</div>';
        $html .= '</form>';
        $html .= '</div>';


        $html .= '</div>';

        if (isset($column_class) && $column_class <> '') {
            $html .= '</div>';
        }
        return $html;
    }

    if (function_exists('traveladvisor_var_short_code'))
        traveladvisor_var_short_code('traveladvisor_contact_us', 'traveladvisor_contact_us_data');
}
// Contact form submit ajax
if (!function_exists('traveladvisor_var_contact_form_submit')) {

    function traveladvisor_var_contact_form_submit() {
        define('WP_USE_THEMES', false);
        $json = array();
        $traveladvisor_contact_error_msg = '';
        $subject_name = '';
        foreach ($_REQUEST as $keys => $values) {
            $$keys = $values;
        }
        $bloginfo = get_bloginfo();
        $traveladvisor_contactus_send = '';
        $subjecteEmail = "(" . $bloginfo . ") Contact Form Received";
        if ($traveladvisor_contact_email <> '') {
            $message = '
            <table width="100%" border="1">
              <tr>
                <td width="100"><strong>' . __('Name:', 'traveladvisor') . '</strong></td>
                <td>' . esc_html($contact_name) . '</td>
              </tr>
              <tr>
                <td><strong>' . __('Email:', 'traveladvisor') . '</strong></td>
                <td>' . esc_html($contact_email) . '</td>
              </tr>
              <tr>
                <td><strong>' . __('Website:', 'traveladvisor') . '</strong></td>
                <td>' . esc_html($contact_subject_type) . '</td>
              </tr>
              <tr>
                <td><strong>' . __('Phone:', 'traveladvisor') . '</strong></td>
                <td>' . esc_html($contact_phone) . '</td>
              </tr>
              <tr>
                <td><strong>' . __('Message:', 'traveladvisor') . '</strong></td>
                <td>' . esc_html($contact_msg) . '</td>
              </tr>
              <tr>
                <td><strong>' . __('IP Address:', 'traveladvisor') . '</strong></td>
                <td>' . $_SERVER["REMOTE_ADDR"] . '</td>
              </tr>
            </table>';
            $headers = "From: " . $contact_name . "\r\n";
            $headers .= "Reply-To: " . $contact_email . "\r\n";
            $headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
            $headers .= "Phone: " . $contact_phone . "\r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $attachments = '';
            $email_sent = apply_filters('send_mails_theme', $traveladvisor_contact_email, $subjecteEmail, $message, $headers, '');
            $action = $email_sent;
            if ($action) {
                $json['type'] = "success";
                $json['message'] = '' . esc_html($traveladvisor_contact_succ_msg) . '';
            } else {
                $json['type'] = "error";
                $json['message'] = '' . esc_html($traveladvisor_contact_error_msg) . '';
            };
        } else {
            $json['type'] = "error";
            $json['message'] = '' . esc_html($traveladvisor_contact_error_msg) . '';
        }
        echo json_encode($json);
        die();
    }

}
//Submit Contact Us Form Hooks
add_action('wp_ajax_nopriv_traveladvisor_var_contact_form_submit', 'traveladvisor_var_contact_form_submit');
add_action('wp_ajax_traveladvisor_var_contact_form_submit', 'traveladvisor_var_contact_form_submit');
