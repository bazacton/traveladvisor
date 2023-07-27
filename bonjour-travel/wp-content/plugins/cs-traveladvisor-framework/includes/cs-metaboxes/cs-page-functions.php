<?php
/**
 * @Page options
 * @return html
 *
 */
//Travel Advisor Custom Fields

if (!function_exists('traveladvisor_tours_custom_fields')) {

    function traveladvisor_tours_custom_fields() {
        global $post, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields, $traveladvisor_form_fields2;

        $traveladvisor_var_theme_options = get_option('traveladvisor_var_options');
        $traveladvisor_textareas = isset($traveladvisor_var_theme_options['traveladvisor_cus_field_textarea']) ? $traveladvisor_var_theme_options['traveladvisor_cus_field_textarea'] : '';
        $traveladvisor_text_fields = isset($traveladvisor_var_theme_options['traveladvisor_cus_field_text']) ? $traveladvisor_var_theme_options['traveladvisor_cus_field_text'] : '';
        $traveladvisor_date_fields = isset($traveladvisor_var_theme_options['traveladvisor_cus_field_date']) ? $traveladvisor_var_theme_options['traveladvisor_cus_field_date'] : '';
        $traveladvisor_email_fields = isset($traveladvisor_var_theme_options['traveladvisor_cus_field_email']) ? $traveladvisor_var_theme_options['traveladvisor_cus_field_email'] : '';
        $traveladvisor_cus_field_url = isset($traveladvisor_var_theme_options['traveladvisor_cus_field_url']) ? $traveladvisor_var_theme_options['traveladvisor_cus_field_url'] : '';
        $traveladvisor_cus_field_range = isset($traveladvisor_var_theme_options['traveladvisor_cus_field_range']) ? $traveladvisor_var_theme_options['traveladvisor_cus_field_range'] : '';
        $traveladvisor_dropdown = isset($traveladvisor_var_theme_options['traveladvisor_cus_field_dropdown']) ? $traveladvisor_var_theme_options['traveladvisor_cus_field_dropdown'] : '';
        $traveladvisor_dropdownoptions = isset($traveladvisor_var_theme_options['cus_field_dropdown']) ? $traveladvisor_var_theme_options['cus_field_dropdown'] : '';

        if (is_array($traveladvisor_dropdown)) {
            extract($traveladvisor_dropdown);
            $traveladvisor_dropdowns = $traveladvisor_var_theme_options['traveladvisor_cus_field_dropdown'];
            $traveladvisor_counting = $traveladvisor_dropdowns['required'];
            $traveladvisor_dropdown_options = $traveladvisor_var_theme_options['cus_field_dropdown'];
            $traveladvisor_field_options = $traveladvisor_dropdown_options['options'];
            $traveladvisor_field_options_values = $traveladvisor_dropdown_options['options_values'];

            $a = 0;
            foreach ($traveladvisor_field_options as $traveladvisor_values) {
                $traveladvisor_temp = $traveladvisor_values[0];
                $traveladvisor_values[0] = '';
                $traveladvisor_values[] = $traveladvisor_temp;
                $traveladvisor_options[] = $traveladvisor_values;
                $a++;
            }
            $a = 0;
            foreach ($traveladvisor_field_options_values as $traveladvisor_option_values) {
                $traveladvisor_tempp = $traveladvisor_option_values[0];
                $traveladvisor_option_values[0] = $first_value[$a];
                $traveladvisor_option_values[] = $traveladvisor_tempp;

                $traveladvisor_options_values[] = $traveladvisor_option_values;
                $a++;
            }
            $traveladvisor_count_val = count($traveladvisor_options_values) - 1;
            for ($traveladvisor_num = 0; $traveladvisor_num <= $traveladvisor_count_val; $traveladvisor_num++) {
                $traveladvisor_finaloptions[] = array_combine($traveladvisor_options_values[$traveladvisor_num],$traveladvisor_options[$traveladvisor_num] );
            }
            $traveladvisor_count = count($traveladvisor_counting) - 1;
            for ($traveladvisor_starter = 0; $traveladvisor_starter <= $traveladvisor_count; $traveladvisor_starter++) {
                $id = $meta_key[$traveladvisor_starter];

                if ($multi[$traveladvisor_starter] == "yes") {
                    $multi[$traveladvisor_starter] =true;
                } else {
                    $multi[$traveladvisor_starter] = false;
                }
                $traveladvisor_decide = $multi[$traveladvisor_starter];

                $options_array=$traveladvisor_finaloptions[$traveladvisor_starter];
                $field = array(
                'name' => __($label[$traveladvisor_starter], 'cs-traveladvisor'),
                'hint_text' => $help[$traveladvisor_starter],
                'echo' => true,
                    'multi'=>$traveladvisor_decide,
                'field_params' => array(
                'id' => $id,
                'classes' => 'chosen-select',
                'required' => $required[$traveladvisor_starter],
                'return' => true,
                'std' => '',
                'options' => $options_array,
                )
                );
                $traveladvisor_var_html_fields->traveladvisor_var_select_field($field);
                ?>
                <script>
                    jQuery(document).ready(function () {
                        chosen_selectionbox();
                    });
                </script>
                <?php
            }
        }
        if (is_array($traveladvisor_text_fields)) {
            extract($traveladvisor_text_fields);


            //text fieds
            $traveladvisor_count = count($traveladvisor_text_fields['label']) - 1;
            for ($traveladvisor_starter = 0; $traveladvisor_starter <= $traveladvisor_count; $traveladvisor_starter++) {
                $id = $meta_key[$traveladvisor_starter];
                $field = array(
                    'name' => __($label[$traveladvisor_starter], 'cs-traveladvisor'),
                    'echo' => true,
                    'field_params' => array(
                        'id' => $id,
                        'extra_atr' => "placeholder='$placeholder[$traveladvisor_starter]'",
                        'std' => $default_value[$traveladvisor_starter],
                        'required' => $required[$traveladvisor_starter],
                        'return' => true,
                    )
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($field);
            }
        }
        if (is_array($traveladvisor_email_fields)) {
            extract($traveladvisor_email_fields);


            //email fieds
            $traveladvisor_count = count($traveladvisor_email_fields['label']) - 1;
            for ($traveladvisor_starter = 0; $traveladvisor_starter <= $traveladvisor_count; $traveladvisor_starter++) {
                $id = $meta_key[$traveladvisor_starter];
                $field = array(
                    'name' => __($label[$traveladvisor_starter], 'cs-traveladvisor'),
                    'hint_text' => $help[$traveladvisor_starter],
                    'echo' => true,
                    'field_params' => array(
                        'id' => $id,
                        'cust_type' => 'email',
                        'extra_atr' => "placeholder='$placeholder[$traveladvisor_starter]'",
                        'std' => $default_value[$traveladvisor_starter],
                        'required' => $required[$traveladvisor_starter],
                        'return' => true,
                    )
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($field);
            }
        }

        if (is_array($traveladvisor_cus_field_url)) {
            extract($traveladvisor_cus_field_url);
            //Url fieds
            $traveladvisor_count = count($traveladvisor_cus_field_url['label']) - 1;
            for ($traveladvisor_starter = 0; $traveladvisor_starter <= $traveladvisor_count; $traveladvisor_starter++) {
                $id = $meta_key[$traveladvisor_starter];
                $field = array(
                    'name' => __($label[$traveladvisor_starter], 'cs-traveladvisor'),
                    'hint_text' => $help[$traveladvisor_starter],
                    'echo' => true,
                    'field_params' => array(
                        'id' => $id,
                        'cust_type' => 'url',
                        'extra_atr' => "placeholder='$placeholder[$traveladvisor_starter]'",
                        'std' => $default_value[$traveladvisor_starter],
                        'required' => $required[$traveladvisor_starter],
                        'return' => true,
                    )
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($field);
            }
        }

        //textarea
        if (is_array($traveladvisor_textareas)) {
            extract($traveladvisor_textareas);
            $traveladvisor_count = count($traveladvisor_textareas['label']) - 1;
            for ($traveladvisor_starter = 0; $traveladvisor_starter <= $traveladvisor_count; $traveladvisor_starter++) {
                $id = $meta_key[$traveladvisor_starter];
                $field = array(
                    'name' => __($label[$traveladvisor_starter], 'cs-traveladvisor'),
                    'hint_text' => $help[$traveladvisor_starter],
                    'echo' => true,
                    'desc' => '',
                    'field_params' => array(
                        'id' => $id,
                        'std' => $default_value[$traveladvisor_starter],
                        'required' => $required[$traveladvisor_starter],
                        'return' => true,
                    )
                );
                $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($field);
            }
        }

        //Date
        if (is_array($traveladvisor_date_fields)) {
            extract($traveladvisor_date_fields);
            $traveladvisor_job_cus_fields = get_option("traveladvisor_job_cus_fields");
            if(is_array($traveladvisor_job_cus_fields)){
            foreach ($traveladvisor_job_cus_fields as $cus_fieldvar => $cus_field) {

                if ($cus_field['type'] == "date")
                    $cus_field_date_formate_arr[] = explode(" ", $cus_field['date_format']);
            }
            }

            $traveladvisor_count = count($traveladvisor_date_fields['label']) - 1;
            for ($traveladvisor_starter = 0; $traveladvisor_starter <= $traveladvisor_count; $traveladvisor_starter++) {
                $id = $meta_key[$traveladvisor_starter];
                $field = array(
                    'name' => __($label[$traveladvisor_starter], 'cs-traveladvisor'),
                    'hint_text' => $help[$traveladvisor_starter],
                    'echo' => true,
                    'desc' => '',
                    'field_params' => array(
                        'id' => $id,
                        'cust_id' => '',
                        'std' => '',
                        'required' => $required[$traveladvisor_starter],
                        'return' => true,
                    )
                );
                $traveladvisor_var_html_fields->traveladvisor_var_date_field($field);

                $cus_field_date_formate_arr = $cus_field_date_formate_arr[$traveladvisor_starter];
                ?>
                <script>
                    jQuery(function () {
                        jQuery("#traveladvisor_var_<?php echo esc_html($id); ?>").datetimepicker({
                            format: "<?php echo esc_html($cus_field_date_formate_arr[0]); ?>",
                            timepicker: false
                        });
                    });
                </script>


                <?php
            }
        }
        if (is_array($traveladvisor_cus_field_range)) {
            extract($traveladvisor_cus_field_range);



            //Range fieds
            $traveladvisor_count = count($traveladvisor_cus_field_range['label']) - 1;
            for ($traveladvisor_starter = 0; $traveladvisor_starter <= $traveladvisor_count; $traveladvisor_starter++) {
                $id = $meta_key[$traveladvisor_starter];
                $traveladvisor_range_value = get_post_meta($post->ID, "traveladvisor_var_$id", true);
                ?>
                <div  class="form-elements" > <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label><?php echo esc_attr($traveladvisor_cus_field_range['label'][$traveladvisor_starter]); ?></label>
                        <?php echo traveladvisor_var_tooltip_helptext($help[$traveladvisor_starter]); ?>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-10 col-xs-10">
                        <?php
                        $traveladvisor_require = "";
                        if ($required[$traveladvisor_starter] = "yes") {
                            $traveladvisor_require = "required";
                        }
                        ?>
                        <input name="traveladvisor_var_<?php echo esc_html($id); ?>" type="range" 
                               max="<?php echo esc_html($max[$traveladvisor_starter]); ?>" 
                               id="fader" step="1" oninput="outputUpdate<?php echo esc_html($traveladvisor_starter); ?>(value)"
                               min="<?php echo esc_html($min[$traveladvisor_starter]); ?>"
                               id="traveladvisor_var_<?php echo esc_html($id); ?>"
                               value="<?php echo esc_html($traveladvisor_range_value); ?>"
                <?php echo esc_html($traveladvisor_require); ?>>  


                    </div>
                    <div class="col-lg-1 col-lg-1 col-sm-2 col-xs-2">
                        <output for="fader" id="volume<?php echo esc_html($traveladvisor_starter); ?>"><?php echo esc_html($traveladvisor_range_value); ?></output>
                    </div>
                </div>
                <script>
                    function outputUpdate<?php echo esc_html($traveladvisor_starter); ?>(vol) {
                        document.querySelector('#volume<?php echo esc_html($traveladvisor_starter); ?>').value = vol;
                    }
                </script>
                <?php
            }
        }
    }

}


if (!function_exists('traveladvisor_subheader_element')) {

    function traveladvisor_subheader_element() {
        global $post, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
        $page_subheader_no_image = '';
        $traveladvisor_default_map = '[traveladvisor_map traveladvisor_var_column_size="1/1" traveladvisor_var_map_height="400" traveladvisor_var_map_lat="48.856614" traveladvisor_var_map_lon="2.352222" traveladvisor_var_map_zoom="14" traveladvisor_var_map_type="ROADMAP" traveladvisor_var_map_marker_icon="Browse" traveladvisor_var_map_show_marker="true" traveladvisor_var_map_controls="true" traveladvisor_var_map_draggable="true" traveladvisor_var_map_scrollwheel="true" traveladvisor_var_map_border="yes"]';

        $traveladvisor_banner_style = get_post_meta($post->ID, 'traveladvisor_header_banner_style', true);

        $traveladvisor_default_header = $traveladvisor_breadcrumb_header = $traveladvisor_custom_slider = $traveladvisor_map = $traveladvisor_no_header = 'hide';
        if (isset($traveladvisor_banner_style) && $traveladvisor_banner_style == 'default_header') {
            $traveladvisor_default_header = 'show';
        } else if (isset($traveladvisor_banner_style) && $traveladvisor_banner_style == 'breadcrumb_header') {
            $traveladvisor_breadcrumb_header = 'show';
        } else if (isset($traveladvisor_banner_style) && $traveladvisor_banner_style == 'custom_slider') {
            $traveladvisor_custom_slider = 'show';
        } else if (isset($traveladvisor_banner_style) && $traveladvisor_banner_style == 'map') {
            $traveladvisor_map = 'show';
        } else if (isset($traveladvisor_banner_style) && $traveladvisor_banner_style == 'no-header') {
            $traveladvisor_no_header = 'show';
        } else {
            $traveladvisor_default_header = 'show';
        }
        
        
        $strings = new traveladvisor_frame_plugin_all_strings;
        $strings -> traveladvisor_plugin_activation_strings();
        $traveladvisor_var_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_subheader'),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => 'default_header',
                'id' => 'header_banner_style',
                'return' => true,
                'extra_atr' => 'onchange="traveladvisor_header_element_toggle(this.value)"',
                'classes' => 'dropdown chosen-select',
                'options' => array(
                    'default_header' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_default_subheader'),
                    'breadcrumb_header' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_custom_subheader'),
                    'custom_slider' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_revolution_slider'),
                    'map' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_map'),
                    'no-header' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_nosubheader')
                ),
            ),
        );

        $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_var_opt_array);


        $traveladvisor_var_opt_array = array(
            'id' => 'custom_header',
            'enable_id' => 'traveladvisor_var_header_banner_style',
            'enable_val' => 'breadcrumb_header',
        );

        $traveladvisor_var_html_fields->traveladvisor_var_division($traveladvisor_var_opt_array);

        $traveladvisor_var_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_text_align'),
            'desc' => '',
            'hint_text' => 'This option will move your page title towards left, right or center..',
            'echo' => true,
            'field_params' => array(
                'std' => 'simple',
                'cust_id' => 'traveladvisor_page_title_align',
                'id'=>'traveladvisor_page_title_align',
                'return' => true,
//                'extra_atr' => 'onchange="traveladvisor_var_page_subheader_style(this.value)"',
                'classes' => 'dropdown chosen-select',
                'options' => array(
                    'left' => traveladvisor_var_theme_text_srt('traveladvisor_var_left'),
                    'center' => traveladvisor_var_theme_text_srt('traveladvisor_var_center'),
                    'right' => traveladvisor_var_theme_text_srt('traveladvisor_var_right'),
                ),
            ),
        );

        $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_var_opt_array);
        

        $traveladvisor_var_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_padding_top'),
            'desc' => '',
            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_padding_top_hint'),
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'subheader_padding_top',
                'return' => true,
            ),
        );

        $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);

        $traveladvisor_var_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_padding_bottom'),
            'desc' => '',
            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_padding_bottom_hint'),
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'subheader_padding_bottom',
                'return' => true,
            ),
        );
        $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);

        $traveladvisor_var_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_margin_top'),
            'desc' => '',
            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_margin_top_hint'),
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'subheader_margin_top',
                'return' => true,
            ),
        );

        $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);

        $traveladvisor_var_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_margin_bottom'),
            'desc' => '',
            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_margin_bottom_hint'),
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'subheader_margin_bottom',
                'return' => true,
            ),
        );
        $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);

        $traveladvisor_var_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_page_title'),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'page_title_switch',
                'return' => true,
            ),
        );

        $traveladvisor_var_html_fields->traveladvisor_var_checkbox_field($traveladvisor_var_opt_array);

        $traveladvisor_var_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_breadcrumbs'),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'page_breadcrumbs',
                'return' => true,
            ),
        );

        $traveladvisor_var_html_fields->traveladvisor_var_checkbox_field($traveladvisor_var_opt_array);

        $traveladvisor_var_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_text_color'),
            'desc' => '',
            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_text_color_hint'),
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'page_subheader_text_color',
                'classes' => 'bg_color',
                'return' => true,
            ),
        );

        $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);

        $traveladvisor_var_opt_array = array(
            'id' => 'subheader_border_f',
            'enable_id' => 'traveladvisor_var_sub_header_style',
            'enable_val' => 'with_bg,simple"',
        );

     //   $traveladvisor_var_html_fields->traveladvisor_var_division($traveladvisor_var_opt_array);

        $traveladvisor_var_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_border_color'),
            'desc' => '',
            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_border_color_hint'),
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'subheader_border_color',
                'classes' => 'bg_color',
                'return' => true,
            ),
        );

        $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);

       // $traveladvisor_var_html_fields->traveladvisor_var_division_close(array());

        $traveladvisor_var_opt_array = array(
            'id' => 'subheader_with_bg',
            'enable_id' => 'traveladvisor_var_sub_header_style',
            'enable_val' => 'with_bg',
        );

     //   $traveladvisor_var_html_fields->traveladvisor_var_division($traveladvisor_var_opt_array);
        $traveladvisor_var_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_sub_heading'),
            'desc' => '',
            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_sub_heading_hint'),
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'page_subheading_title',
                'return' => true,
            ),
        );

        $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($traveladvisor_var_opt_array);

        $traveladvisor_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_bg_image'),
            'id' => 'header_banner_image',
            'main_id' => '',
            'std' => '',
            'desc' => '',
            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_bg_image_hint'),
            'prefix' => '',
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'header_banner_image',
                'prefix' => '',
                'return' => true,
            ),
        );

        $traveladvisor_var_html_fields->traveladvisor_var_upload_file_field($traveladvisor_opt_array);

        $traveladvisor_var_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_parallax'),
            'desc' => '',
            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_parallax_hint'),
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'page_subheader_parallax',
                'return' => true,
            ),
        );

        $traveladvisor_var_html_fields->traveladvisor_var_checkbox_field($traveladvisor_var_opt_array);

    //    $traveladvisor_var_html_fields->traveladvisor_var_division_close(array());

        $traveladvisor_var_opt_array = array(
            'id' => 'subheader_clr_f',
            'enable_id' => 'traveladvisor_var_sub_header_style',
            'enable_val' => 'with_bg,classic"',
        );

    //    $traveladvisor_var_html_fields->traveladvisor_var_division($traveladvisor_var_opt_array);
        $traveladvisor_var_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_bg_color'),
            'desc' => '',
            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_bg_color_hint'),
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'page_subheader_color',
                'classes' => 'bg_color',
                'return' => true,
            ),
        );

        $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
     //   $traveladvisor_var_html_fields->traveladvisor_var_division_close(array());

        $traveladvisor_var_html_fields->traveladvisor_var_division_close(array());
        

        $traveladvisor_var_opt_array = array(
            'id' => 'rev_slider_header',
            'enable_id' => 'traveladvisor_var_header_banner_style',
            'enable_val' => 'custom_slider',
        );

        $traveladvisor_var_html_fields->traveladvisor_var_division($traveladvisor_var_opt_array);

        $traveladvisor_slider_value = get_post_meta($post->ID, 'traveladvisor_var_custom_slider_id', true);
        $traveladvisor_slider_options = '<option value="">' . traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_select_slider') . '</option>';

        if (class_exists('RevSlider') && class_exists('traveladvisor_var_RevSlider')) {
            $slider = new traveladvisor_var_RevSlider();
            $arrSliders = $slider->getAllSliderAliases();
            if (is_array($arrSliders)) {
                foreach ($arrSliders as $key => $entry) {
                    $traveladvisor_slider_selected = '';
                    if ($traveladvisor_slider_value != '') {
                        if ($traveladvisor_slider_value == $entry['alias']) {
                            $traveladvisor_slider_selected = ' selected="selected"';
                        }
                    }
                    $traveladvisor_slider_options .= '<option ' . $traveladvisor_slider_selected . ' value="' . $entry['alias'] . '">' . $entry['title'] . '</option>';
                }
            }
        }

        $traveladvisor_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_select_slider'),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'custom_slider_id',
                'classes' => 'dropdown chosen-select',
                'return' => true,
                'options_markup' => true,
                'options' => $traveladvisor_slider_options,
            ),
        );
        $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);



        $traveladvisor_var_html_fields->traveladvisor_var_division_close(array());


        $traveladvisor_var_opt_array = array(
            'id' => 'map_header',
            'enable_id' => 'traveladvisor_var_header_banner_style',
            'enable_val' => 'map',
        );

        $traveladvisor_var_html_fields->traveladvisor_var_division($traveladvisor_var_opt_array);


        $traveladvisor_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_custom_map'),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => $traveladvisor_default_map,
                'id' => 'custom_map',
                'classes' => '',
                'return' => true,
            ),
        );
        $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($traveladvisor_opt_array);


        $traveladvisor_var_html_fields->traveladvisor_var_division_close(array());

        $traveladvisor_var_opt_array = array(
            'id' => 'no_header',
            'enable_id' => 'traveladvisor_var_header_banner_style',
            'enable_val' => 'no-header',
        );

        $traveladvisor_var_html_fields->traveladvisor_var_division($traveladvisor_var_opt_array);


        $traveladvisor_var_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_header_border_color'),
            'desc' => '',
            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_header_border_color_hint'),
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'main_header_border_color',
                'classes' => 'bg_color',
                'return' => true,
            ),
        );

        $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
        $traveladvisor_var_html_fields->traveladvisor_var_division_close(array());
        ?>
        <script>
            jQuery(document).ready(function () {
                chosen_selectionbox();
            });
        </script>
        <?php
    }

}

/**
 * @Sidebar Layout setting start
 * @return
 *
 */
if (!function_exists('traveladvisor_sidebar_layout_options')) {

    function traveladvisor_sidebar_layout_options() {
        global $post, $traveladvisor_var_options, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
        $strings = new traveladvisor_frame_plugin_all_strings;
        $strings -> traveladvisor_plugin_activation_strings();
        
        if (isset($post->post_type) && $post->post_type == 'page') {
//                    $traveladvisor_var_opt_array = array(
//                        'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_choose_header_style'),
//                        'desc' => '',
//                        'hint_text' => '',
//                        'echo' => true,
//                        'field_params' => array(
//                            'std' => 'default_header_style',
//                            'id' => 'header_style',
//                            'return' => true,
//                            'classes' => 'dropdown chosen-select',
//                            'extra_atr' => 'onclick="traveladvisor_header_element_toggle(this.value)"',
//                            'options' => array(
//        //                        'modern_header_style' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_modern_header_style'),
//                                'default_header_style' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_default_header_style')
//                            ),
//                        ),
//                    );
//
//
//                    $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_var_opt_array);
        }
        $traveladvisor_sidebars_array = array('' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_select_sidebar'));
        if (is_array($traveladvisor_var_options['traveladvisor_var_sidebar']) && count($traveladvisor_var_options['traveladvisor_var_sidebar']) > 0) {
            foreach ($traveladvisor_var_options['traveladvisor_var_sidebar'] as $key => $sidebar) {
                $traveladvisor_sidebars_array[sanitize_title($sidebar)] = $sidebar;
            }
        }

        $traveladvisor_var_html_fields->traveladvisor_form_layout_render(
                array('name' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_choose_sidebar'),
                    'id' => 'page_layout',
                    'std' => 'none',
                    'classes' => '',
                    'description' => '',
                    'onclick' => '',
                    'status' => '',
                    'meta' => '',
                    'help_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_choose_sidebar_hint')
                )
        );

        $traveladvisor_var_opt_array = array(
            'id' => 'left_layout',
            'enable_id' => 'traveladvisor_var_page_layout',
            'enable_val' => 'left',
        );

        $traveladvisor_var_html_fields->traveladvisor_var_division($traveladvisor_var_opt_array);


        $traveladvisor_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_left_sidebar'),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'page_sidebar_left',
                'classes' => 'dropdown chosen-select',
                'return' => true,
                'options' => $traveladvisor_sidebars_array,
            ),
        );
        $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);


        $traveladvisor_var_html_fields->traveladvisor_var_division_close(array());


        $traveladvisor_var_opt_array = array(
            'id' => 'right_layout',
            'enable_id' => 'traveladvisor_var_page_layout',
            'enable_val' => 'right',
        );

        $traveladvisor_var_html_fields->traveladvisor_var_division($traveladvisor_var_opt_array);


        $traveladvisor_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_right_sidebar'),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'page_sidebar_right',
                'classes' => 'dropdown chosen-select',
                'return' => true,
                'options' => $traveladvisor_sidebars_array,
            ),
        );
        $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);


        $traveladvisor_var_html_fields->traveladvisor_var_division_close(array());
        ?>
        <script>
            jQuery(document).ready(function () {
                chosen_selectionbox();
            });
        </script>
        <?php
    }

}