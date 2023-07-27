<?php
/**
 * @Mailchimp List
 */
if (!function_exists('traveladvisor_mailchimp_list')) {

    function traveladvisor_mailchimp_list($apikey) {
        global $traveladvisor_var_options;
        $MailChimp = new MailChimp($apikey);
        $mailchimp_list = $MailChimp->call('lists/list');
        return $mailchimp_list;
    }

}



/**
 * @custom mail chimp form
 */
if (!function_exists('traveladvisor_custom_mailchimp')) {

    function traveladvisor_custom_mailchimp() {

        global $traveladvisor_var_options, $counter, $social_switch, $traveladvisor_var_frame_static_text;
        $traveladvisor_var_enter_valid = isset($traveladvisor_var_frame_static_text['traveladvisor_var_enter_valid']) ? $traveladvisor_var_frame_static_text['traveladvisor_var_enter_valid'] : '';
        $counter++;
        wp_add_inline_script('traveladvisor-inline-script', 'function traveladvisor_mailchimp_submit(theme_url, counter, admin_url) {

                \'use strict\';
                $ = jQuery;
                $(\'#process_\' + counter).html(\'<div id="process_newsletter_\' + counter + \'" class="cs-newsletter-spin"><i class="icon-refresh icon-spin" style="float:right;margin:12px 0px 0px 0px;display:inline-block;"></i></div>\');
                $.ajax({
                    type: \'POST\',
                    url: admin_url,
                    data: $(\'#mcform_\' + counter).serialize() + \'&action=traveladvisor_mailchimp\',
                    success: function (response) {
                        $(\'#mcform_\' + counter).get(0).reset();
                        $(\'#newsletter_mess_\' + counter).fadeIn(600);
                        $(\'#newsletter_mess_\' + counter).html(response);
                        //$(\'#btn_newsletter_\'+counter).fadeIn(600);
                        $(\'#process_\' + counter).html("");
                    }
                });
            }');
        ?>




        <div id ="process_newsletter_<?php echo intval($counter); ?>">

            <div id="newsletter_mess_<?php echo intval($counter); ?>" style="display:none" ></div> 
            <div class="cs-form">
                <form  action="javascript:traveladvisor_mailchimp_submit('<?php echo get_template_directory_uri() ?>','<?php echo esc_js($counter); ?>','<?php echo admin_url('admin-ajax.php'); ?>')" id="mcform_<?php echo intval($counter); ?>" method="post">
                    <div class="input-holder">						
                        <div id="process_<?php echo intval($counter); ?>" class="cs-show-msg"> </div>				
                        <input id="traveladvisor_list_idd" type="hidden" name="traveladvisor_list_id" value="<?php
                        if (isset($traveladvisor_var_options['traveladvisor_var_mailchimp_list'])) {
                            echo esc_attr($traveladvisor_var_options['traveladvisor_var_mailchimp_list']);
                        }
                        ?>" />
                        <input type="text" id="mc_emaill" class="txt-bar"  name="mc_email" placeholder=" <?php echo esc_html($traveladvisor_var_enter_valid); ?>"   >
                        <label> <i class="icon-near_me"></i>
                            <input class="cs-bgcolor" id="btn_newsletter_<?php echo intval($counter); ?>" type="submit" value="submit">
                        </label>
                    </div>
                </form>
            </div>

        </div>
        <?php
    }

}


/**
 * @custom mail chimp for footer
 */
if (!function_exists('traveladvisor_custom_footermailchimp')) {

    function traveladvisor_custom_footermailchimp() {
        $rand_id = rand(1222, 8787878);
        global $traveladvisor_var_options, $counter, $social_switch, $traveladvisor_var_frame_static_text;
        $traveladvisor_var_enter_valid = isset($traveladvisor_var_frame_static_text['traveladvisor_var_enter_valid']) ? $traveladvisor_var_frame_static_text['traveladvisor_var_enter_valid'] : '';
        $counter++;
        wp_add_inline_script('traveladvisor-inline-script', 'function traveladvisor_mailchimp_submit(theme_url, counter, admin_url) {

                \'use strict\';
                $ = jQuery;
                $(\'#process_\' + counter).html(\'<div id="process_newsletter_\' + counter + \'"><i class="icon-refresh icon-spin" style="float:right;margin:12px 0px 0px 0px;"></i></div>\');
                $.ajax({
                    type: \'POST\',
                    url: admin_url,
                    data: $(\'#mcform_\' + counter).serialize() + \'&action=traveladvisor_mailchimp\',
                    success: function (response) {
                        $(\'#mcform_\' + counter).get(0).reset();
                        $(\'#newsletter_mess_\' + counter).fadeIn(600);
                        $(\'#newsletter_mess_\' + counter).html(response);
                        //$(\'#btn_newsletter_\'+counter).fadeIn(600);
                        $(\'#process_\' + counter).html("");
                    }
                });
            }');
        ?>



        <div id ="process_newsletter_<?php echo intval($counter); ?>">
            <div id="process_<?php echo intval($counter); ?>" class="cs-show-msg"> </div>
            <div id="newsletter_mess_<?php echo intval($counter); ?>" style="display:none"></div> 
            <div class="cs-form">
                <form  action="javascript:traveladvisor_mailchimp_submit('<?php echo get_template_directory_uri() ?>','<?php echo esc_js($counter); ?>','<?php echo admin_url('admin-ajax.php'); ?>')" id="mcform_<?php echo intval($counter); ?>" method="post">
                    <div class="input-holder">						

                        <input id="traveladvisor_list_id<?php echo esc_html($rand_id); ?>" type="hidden" name="traveladvisor_list_id" value="<?php
                        if (isset($traveladvisor_var_options['traveladvisor_var_mailchimp_list'])) {
                            echo esc_attr($traveladvisor_var_options['traveladvisor_var_mailchimp_list']);
                        }
                        ?>" />
                        <input type="text" id="mc_email<?php echo esc_html($rand_id); ?>" class="txt-bar"  name="mc_email" placeholder="<?php echo esc_html($traveladvisor_var_enter_valid); ?>"   >
                        <label> <i class=""></i>
                            <input class="cs-bgcolor" id="btn_newsletter_<?php echo intval($counter); ?>" type="submit" value="submit">
                        </label>
                    </div>
                </form>
            </div>

        </div>
        <?php
    }

}
