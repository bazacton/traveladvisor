<?php
/**
 * @ Start function for Add Meta Box For Post  
 * @return
 *
 */
add_action('add_meta_boxes', 'traveladvisor_meta_post_add');
if (!function_exists('traveladvisor_meta_post_add')) {

    function traveladvisor_meta_post_add() {
        $strings = new traveladvisor_frame_plugin_all_strings;
        $strings -> traveladvisor_plugin_activation_strings();
        add_meta_box('traveladvisor_meta_post', traveladvisor_var_theme_text_srt('traveladvisor_var_post_meta_options'), 'traveladvisor_meta_post', 'post', 'normal', 'high');
    }

}

/**
 * @ Start function for Meta Box For Post  
 * @return
 *
 */
if (!function_exists('traveladvisor_meta_post')) {

    function traveladvisor_meta_post($post) {
        ?>
        <div class="page-wrap page-opts left" style="overflow:hidden; position:relative;">
            <div class="option-sec" style="margin-bottom:0;">
                <div class="opt-conts">
                    <div class="elementhidden">
                        <nav class="admin-navigtion">
                            <ul id="cs-options-tab">
                                <li><a name="#tab-general-settings" href="javascript:;"><i class="icon-gear"></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_post_meta_general_settings'); ?> </a></li>
                                <li><a name="#tab-slideshow" href="javascript:;"><i class="icon-forward2"></i> <?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_post_meta_subheader'); ?></a></li>
                            </ul> 
                        </nav>
                        <div id="tabbed-content">
                            <div id="tab-general-settings">
                                <?php
                                traveladvisor_post_settings_element();
                                traveladvisor_sidebar_layout_options();
                                ?>
                            </div>
                            <div id="tab-slideshow">
                                <?php traveladvisor_subheader_element(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <?php
    }

}

/**
 * @page/post General Settings Function
 * @return
 *
 */
if (!function_exists('traveladvisor_post_settings_element')) {

    function traveladvisor_post_settings_element() {
        global $post, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
        $strings = new traveladvisor_frame_plugin_all_strings;
        $strings -> traveladvisor_plugin_activation_strings();

        $traveladvisor_var_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_post_meta_social_sharing'),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'post_social_sharing',
                'return' => true,
            ),
        );
        $traveladvisor_var_html_fields->traveladvisor_var_checkbox_field($traveladvisor_var_opt_array);
          
        $traveladvisor_var_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_post_meta_tags'),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'post_tags_show',
                'return' => true,
            ),
        );

        $traveladvisor_var_html_fields->traveladvisor_var_checkbox_field($traveladvisor_var_opt_array);

        $traveladvisor_var_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_post_meta_related_post'),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'related_post',
                'return' => true,
            ),
        );

        $traveladvisor_var_html_fields->traveladvisor_var_checkbox_field($traveladvisor_var_opt_array);
    }

}
