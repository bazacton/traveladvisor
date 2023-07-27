<?php

/**
 *  File Type: Custom Fields Class
 */
if (!class_exists('traveladvisor_custom_fields_options')) {

    class traveladvisor_custom_fields_options {

        /**
         * Start Contructer Function
         */
        public function __construct() {
            add_action('wp_ajax_traveladvisor_pb_text', array(&$this, 'traveladvisor_pb_text'));
            add_action('wp_ajax_traveladvisor_pb_textarea', array(&$this, 'traveladvisor_pb_textarea'));
            add_action('wp_ajax_traveladvisor_pb_dropdown', array(&$this, 'traveladvisor_pb_dropdown'));
            add_action('wp_ajax_traveladvisor_pb_date', array(&$this, 'traveladvisor_pb_date'));
            add_action('wp_ajax_traveladvisor_pb_email', array(&$this, 'traveladvisor_pb_email'));
            add_action('wp_ajax_traveladvisor_pb_url', array(&$this, 'traveladvisor_pb_url'));
            add_action('wp_ajax_traveladvisor_pb_range', array(&$this, 'traveladvisor_pb_range'));
            add_action('wp_ajax_traveladvisor_check_fields_avail', array(&$this, 'traveladvisor_check_fields_avail'));
        }

        /**
         * End Contructer Function
         */

        /**
         * Start function how to create Text Fields
         */
        public function traveladvisor_pb_text($die = 0, $traveladvisor_return = false) {
            global $traveladvisor_f_counter, $traveladvisor_job_cus_fields;
            $strings = new traveladvisor_theme_all_strings;
            $strings -> traveladvisor_theme_strings();
            
            $traveladvisor_fields_markup = '';
            if (isset($_REQUEST['counter'])) {
                $traveladvisor_counter = $_REQUEST['counter'];
            } else {
                $traveladvisor_counter = $traveladvisor_f_counter;
            }
            if (isset($traveladvisor_job_cus_fields[$traveladvisor_counter])) {
                $traveladvisor_title = isset($traveladvisor_job_cus_fields[$traveladvisor_counter]['label']) ? sprintf(__('Text : %s', 'traveladvisor'), $traveladvisor_job_cus_fields[$traveladvisor_counter]['label']) : '';
            } else {
                $traveladvisor_title = traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_text');
            }
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_text[required]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_required'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_text[label]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_title'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_text[meta_key]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_meta_key'),
                'check' => true,
                'std' => '',
                'hint' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_meta_key_hint'),
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_text[placeholder]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_placeholder'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_text[enable_srch]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_enable_search'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_text[default_value]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_default_value'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_text[collapse_search]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_collapse'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));

            $traveladvisor_fields_markup .= $this->traveladvisor_fields_fontawsome_icon_jobs(array(
                'id' => 'fontawsome_icon_text',
                'name' => 'traveladvisor_cus_field_text[fontawsome_icon]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_icon'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields = array('traveladvisor_counter' => $traveladvisor_counter, 'traveladvisor_name' => 'text', 'traveladvisor_title' => $traveladvisor_title, 'traveladvisor_markup' => $traveladvisor_fields_markup);

            $traveladvisor_output = $this->traveladvisor_fields_layout($traveladvisor_fields);

            if ($traveladvisor_return == true) {
                return traveladvisor_allow_special_char($traveladvisor_output, true);
            } else {
                echo traveladvisor_allow_special_char($traveladvisor_output, true);
            }
            if ($die <> 1)
                die();
        }

        /**
         * End function how to create Text Fields
         */

        /**
         * Start function how to create Textarea Fields
         */
        public function traveladvisor_pb_textarea($die = 0, $traveladvisor_return = false) {
            global $traveladvisor_f_counter, $traveladvisor_job_cus_fields;
            $strings = new traveladvisor_theme_all_strings;
            $strings -> traveladvisor_theme_strings();
            
            $traveladvisor_fields_markup = '';
            if (isset($_REQUEST['counter'])) {
                $traveladvisor_counter = $_REQUEST['counter'];
            } else {
                $traveladvisor_counter = $traveladvisor_f_counter;
            }
            if (isset($traveladvisor_job_cus_fields[$traveladvisor_counter])) {
                $traveladvisor_title = isset($traveladvisor_job_cus_fields[$traveladvisor_counter]['label']) ? sprintf(__('Text Area : %s', 'traveladvisor'), $traveladvisor_job_cus_fields[$traveladvisor_counter]['label']) : '';
            } else {
                $traveladvisor_title = traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_textarea');
            }
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_textarea[required]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_required'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_textarea[label]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_title'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_textarea[meta_key]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_meta_key'),
                'check' => true,
                'std' => '',
                'hint' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_meta_key_hint'),
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_textarea(array(
                'id' => '',
                'name' => 'cus_field_textarea[help]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_help_text'),
                'std' => '',
                'hint' => '',
            ));

            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_textarea[placeholder]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_placeholder'),
                'std' => '',
                'hint' => '',
            ));

            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_textarea[rows]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_rows'),
                'std' => '5',
                'hint' => '',
            ));

            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_textarea[cols]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_columns'),
                'std' => '25',
                'hint' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_columns_hint'),
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_textarea[default_value]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_default_value'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_textarea[collapse_search]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_collapse'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_fontawsome_icon_jobs(array(
                'id' => 'fontawsome_icon_textarea',
                'name' => 'traveladvisor_cus_field_textarea[fontawsome_icon]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_icon'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields = array('traveladvisor_counter' => $traveladvisor_counter, 'traveladvisor_name' => 'textarea', 'traveladvisor_title' => $traveladvisor_title, 'traveladvisor_markup' => $traveladvisor_fields_markup);
            $traveladvisor_output = $this->traveladvisor_fields_layout($traveladvisor_fields);
            if ($traveladvisor_return == true) {
                return traveladvisor_allow_special_char($traveladvisor_output, true);
            } else {
                echo traveladvisor_allow_special_char($traveladvisor_output, true);
            }
            if ($die <> 1)
                die();
        }

        /**
         * Start function how to create Textarea Fields
         */

        /**
         * Start function how to create dropdown option fields
         */
        public function traveladvisor_pb_dropdown($die = 0, $traveladvisor_return = false) {
            global $traveladvisor_f_counter, $traveladvisor_form_fields2, $traveladvisor_job_cus_fields;
            $strings = new traveladvisor_theme_all_strings;
            $strings -> traveladvisor_theme_strings();
            
            $traveladvisor_fields_markup = '';
            if (isset($_REQUEST['counter'])) {
                $traveladvisor_counter = $_REQUEST['counter'];
            } else {
                $traveladvisor_counter = $traveladvisor_f_counter;
            }
            if (isset($traveladvisor_job_cus_fields[$traveladvisor_counter])) {
                $traveladvisor_title = isset($traveladvisor_job_cus_fields[$traveladvisor_counter]['label']) ? sprintf(__('Dropdown : %s', 'traveladvisor'), $traveladvisor_job_cus_fields[$traveladvisor_counter]['label']) : '';
            } else {
                $traveladvisor_title = traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_dropdown');
            }
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_dropdown[required]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_required'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_dropdown[label]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_title'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_dropdown[meta_key]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_meta_key'),
                'check' => true,
                'std' => '',
                'hint' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_meta_key_hint'),
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_textarea(array(
                'id' => '',
                'name' => 'cus_field_dropdown[help]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_help_text'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_dropdown[enable_srch]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_enable_search'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_dropdown[multi]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_enable_multi'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_dropdown[post_multi]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_post_multi'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_dropdown[first_value]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_first_value'),
                'std' => '- select -',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_dropdown[collapse_search]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_collapse'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_fontawsome_icon_jobs(array(
                'id' => 'fontawsome_icon_selectbox',
                'name' => 'traveladvisor_cus_field_dropdown[fontawsome_icon]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_icon'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= '
			<div class="form-elements">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<label>' . traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_options') . '</label>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';

            if (isset($traveladvisor_job_cus_fields[$traveladvisor_f_counter]['options']['value'])) {
                $traveladvisor_opt_counter = 0;
                $traveladvisor_radio_counter = 1;
                foreach ($traveladvisor_job_cus_fields[$traveladvisor_f_counter]['options']['value'] as $traveladvisor_option) {
                    $traveladvisor_checked = (int) $traveladvisor_job_cus_fields[$traveladvisor_f_counter]['options']['select'][0] == (int) $traveladvisor_radio_counter ? ' checked="checked"' : '';
                    $traveladvisor_opt_label = $traveladvisor_job_cus_fields[$traveladvisor_f_counter]['options']['label'][$traveladvisor_opt_counter];
                    $traveladvisor_fields_markup .= '
					<div class="pbwp-clone-field">';
                    $traveladvisor_opt_array = array(
                        'cust_id' => 'cus_field_dropdown_selected_' . absint($traveladvisor_counter),
                        'cust_name' => 'cus_field_dropdown[selected][' . absint($traveladvisor_counter) . '][]',
                        'cust_type' => 'radio',
                        'extra_atr' => $traveladvisor_checked,
                        'std' => $traveladvisor_radio_counter,
                        'return' => true,
                    );
                    $traveladvisor_fields_markup .= $traveladvisor_form_fields2->traveladvisor_form_text_render($traveladvisor_opt_array);

                    $traveladvisor_opt_array = array(
                        'cust_id' => 'cus_field_dropdown_options_' . absint($traveladvisor_counter),
                        'cust_name' => 'cus_field_dropdown[options][' . absint($traveladvisor_counter) . '][]',
                        'extra_atr' => ' data-type="option"',
                        'std' => $traveladvisor_opt_label,
                        'classes' => 'input-small',
                        'return' => true,
                    );
                    $traveladvisor_fields_markup .= $traveladvisor_form_fields2->traveladvisor_form_text_render($traveladvisor_opt_array);

                    $traveladvisor_opt_array = array(
                        'cust_id' => 'cus_field_dropdown_options_values_' . absint($traveladvisor_counter),
                        'cust_name' => 'cus_field_dropdown[options_values][' . absint($traveladvisor_counter) . '][]',
                        'std' => $traveladvisor_option,
                        'classes' => 'input-small',
                        'return' => true,
                    );
                    $traveladvisor_fields_markup .= $traveladvisor_form_fields2->traveladvisor_form_text_render($traveladvisor_opt_array);

                    $traveladvisor_fields_markup .= '
						<img src="' . esc_url(get_template_directory_uri (). '/assets/images/add.png') . '" class="pbwp-clone-field" alt="' . traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_add_choice') . '" style="cursor:pointer; margin:0 3px;">
						<img src="' . esc_url(get_template_directory_uri (). '/assets/images/remove.png') . '" alt="' . traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_remove_choice') . '" class="pbwp-remove-field" style="cursor:pointer;">
					</div>';
                    $traveladvisor_opt_counter++;
                    $traveladvisor_radio_counter++;
                }
            } else {
                $traveladvisor_fields_markup .= '
				<div class="pbwp-clone-field">';

                $traveladvisor_opt_array = array(
                    'cust_id' => 'cus_field_dropdown_selected_' . absint($traveladvisor_counter),
                    'cust_name' => 'cus_field_dropdown[selected][' . absint($traveladvisor_counter) . '][]',
                    'cust_type' => 'radio',
                    'extra_atr' => ' checked="checked"',
                    'std' => '1',
                    'return' => true,
                );
                $traveladvisor_fields_markup .= $traveladvisor_form_fields2->traveladvisor_form_text_render($traveladvisor_opt_array);

                $traveladvisor_opt_array = array(
                    'cust_id' => 'cus_field_dropdown_options_' . absint($traveladvisor_counter),
                    'cust_name' => 'cus_field_dropdown[options][' . absint($traveladvisor_counter) . '][]',
                    'extra_atr' => ' data-type="option"',
                    'std' => '',
                    'classes' => 'input-small',
                    'return' => true,
                );
                $traveladvisor_fields_markup .= $traveladvisor_form_fields2->traveladvisor_form_text_render($traveladvisor_opt_array);

                $traveladvisor_opt_array = array(
                    'cust_id' => 'cus_field_dropdown_options_values_' . absint($traveladvisor_counter),
                    'cust_name' => 'cus_field_dropdown[options_values][' . absint($traveladvisor_counter) . '][]',
                    'std' => '',
                    'classes' => 'input-small',
                    'return' => true,
                );
                $traveladvisor_fields_markup .= $traveladvisor_form_fields2->traveladvisor_form_text_render($traveladvisor_opt_array);

                $traveladvisor_fields_markup .= '
					<img src="' . esc_url(get_template_directory_uri (). '/assets/images/add.png') . '" class="pbwp-clone-field" alt="' . traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_add_choice') . '" style="cursor:pointer; margin:0 3px;">
					<img src="' . esc_url(get_template_directory_uri () . '/assets/images/remove.png') . '" alt="' . traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_remove_choice') . '" class="pbwp-remove-field" style="cursor:pointer;">
				</div>';
            }
            $traveladvisor_fields_markup .= '
				</div>
			</div>';
            $traveladvisor_fields = array('traveladvisor_counter' => $traveladvisor_counter, 'traveladvisor_name' => 'dropdown', 'traveladvisor_title' => $traveladvisor_title, 'traveladvisor_markup' => $traveladvisor_fields_markup);
            $traveladvisor_output = $this->traveladvisor_fields_layout($traveladvisor_fields);
            if ($traveladvisor_return == true) {
                return traveladvisor_allow_special_char($traveladvisor_output, true);
            } else {
                echo traveladvisor_allow_special_char($traveladvisor_output, true);
            }
            if ($die <> 1)
                die();
        }

        /**
         * End function how to create dropdown option fields
         */

        /**
         * Start function how to create custom fields
         */
        public function traveladvisor_pb_date($die = 0, $traveladvisor_return = false) {
            global $traveladvisor_f_counter, $traveladvisor_job_cus_fields;
            $strings = new traveladvisor_theme_all_strings;
            $strings -> traveladvisor_theme_strings();
            
            $traveladvisor_fields_markup = '';
            if (isset($_REQUEST['counter'])) {
                $traveladvisor_counter = $_REQUEST['counter'];
            } else {
                $traveladvisor_counter = $traveladvisor_f_counter;
            }
            if (isset($traveladvisor_job_cus_fields[$traveladvisor_counter])) {
                $traveladvisor_title = isset($traveladvisor_job_cus_fields[$traveladvisor_counter]['label']) ? sprintf(__('Date : %s', 'traveladvisor'), $traveladvisor_job_cus_fields[$traveladvisor_counter]['label']) : '';
            } else {
                $traveladvisor_title = traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_data');
            }
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_date[required]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_required'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_date[label]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_title'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_date[meta_key]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_meta_key'),
                'check' => true,
                'std' => '',
                'hint' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_meta_key_hint'),
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_textarea(array(
                'id' => '',
                'name' => 'cus_field_date[help]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_help_text'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_date[enable_srch]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_enable_search'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_date[date_format]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_date_formate'),
                'std' => 'd.m.Y H:i',
                'hint' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_date_formate') . ': d.m.Y H:i, Y/m/d',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_date[collapse_search]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_collapse'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_fontawsome_icon_jobs(array(
                'id' => 'fontawsome_icon_date',
                'name' => 'traveladvisor_cus_field_date[fontawsome_icon]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_icon'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields = array('traveladvisor_counter' => $traveladvisor_counter, 'traveladvisor_name' => 'date', 'traveladvisor_title' => $traveladvisor_title, 'traveladvisor_markup' => $traveladvisor_fields_markup);
            $traveladvisor_output = $this->traveladvisor_fields_layout($traveladvisor_fields);
            if ($traveladvisor_return == true) {
                return traveladvisor_allow_special_char($traveladvisor_output, true);
            } else {
                echo traveladvisor_allow_special_char($traveladvisor_output, true);
            }
            if ($die <> 1)
                die();
        }

        /**
         * End function how to create custom fields
         */

        /**
         * Start function how to create custom email fields
         */
        public function traveladvisor_pb_email($die = 0, $traveladvisor_return = false) {
            global $traveladvisor_f_counter, $traveladvisor_job_cus_fields;
            $strings = new traveladvisor_theme_all_strings;
            $strings -> traveladvisor_theme_strings();
            
            $traveladvisor_fields_markup = '';
            if (isset($_REQUEST['counter'])) {
                $traveladvisor_counter = $_REQUEST['counter'];
            } else {
                $traveladvisor_counter = $traveladvisor_f_counter;
            }
            if (isset($traveladvisor_job_cus_fields[$traveladvisor_counter])) {
                $traveladvisor_title = isset($traveladvisor_job_cus_fields[$traveladvisor_counter]['label']) ? sprintf(__('Email : %s', 'traveladvisor'), $traveladvisor_job_cus_fields[$traveladvisor_counter]['label']) : '';
            } else {
                $traveladvisor_title = traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_email');
            }
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_email[required]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_required'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_email[label]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_title'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_email[meta_key]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_meta_key'),
                'check' => true,
                'std' => '',
                'hint' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_meta_key_hint'),
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_email[placeholder]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_placeholder'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_textarea(array(
                'id' => '',
                'name' => 'cus_field_email[help]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_help_text'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_email[enable_srch]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_enable_search'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_email[default_value]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_default_value'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_email[collapse_search]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_collapse'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_fontawsome_icon_jobs(array(
                'id' => 'fontawsome_icon_email',
                'name' => 'traveladvisor_cus_field_email[fontawsome_icon]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_icon'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields = array('traveladvisor_counter' => $traveladvisor_counter, 'traveladvisor_name' => 'email', 'traveladvisor_title' => $traveladvisor_title, 'traveladvisor_markup' => $traveladvisor_fields_markup);
            $traveladvisor_output = $this->traveladvisor_fields_layout($traveladvisor_fields);
            if ($traveladvisor_return == true) {
                return traveladvisor_allow_special_char($traveladvisor_output, true);
            } else {
                echo traveladvisor_allow_special_char($traveladvisor_output, true);
            }
            if ($die <> 1)
                die();
        }

        /**
         * End function how to create custom email fields
         */

        /**
         * Start function how to create post custom url fields
         */
        public function traveladvisor_pb_url($die = 0, $traveladvisor_return = false) {
            global $traveladvisor_f_counter, $traveladvisor_job_cus_fields;
            $strings = new traveladvisor_theme_all_strings;
            $strings -> traveladvisor_theme_strings();
            
            $traveladvisor_fields_markup = '';
            if (isset($_REQUEST['counter'])) {
                $traveladvisor_counter = $_REQUEST['counter'];
            } else {
                $traveladvisor_counter = $traveladvisor_f_counter;
            }
            if (isset($traveladvisor_job_cus_fields[$traveladvisor_counter])) {
                $traveladvisor_title = isset($traveladvisor_job_cus_fields[$traveladvisor_counter]['label']) ? sprintf(__('Url : %s', 'traveladvisor'), $traveladvisor_job_cus_fields[$traveladvisor_counter]['label']) : '';
            } else {
                $traveladvisor_title = traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_url');
            }
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_url[required]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_required'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));

            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_url[label]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_title'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_url[meta_key]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_meta_key'),
                'check' => true,
                'std' => '',
                'hint' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_meta_key_hint'),
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_url[placeholder]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_placeholder'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_textarea(array(
                'id' => '',
                'name' => 'cus_field_url[help]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_help_text'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_url[enable_srch]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_enable_search'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_url[default_value]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_default_value'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_url[collapse_search]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_collapse'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_fontawsome_icon_jobs(array(
                'id' => 'fontawsome_icon_url',
                'name' => 'traveladvisor_cus_field_url[fontawsome_icon]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_icon'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields = array('traveladvisor_counter' => $traveladvisor_counter, 'traveladvisor_name' => 'url', 'traveladvisor_title' => $traveladvisor_title, 'traveladvisor_markup' => $traveladvisor_fields_markup);
            $traveladvisor_output = $this->traveladvisor_fields_layout($traveladvisor_fields);
            if ($traveladvisor_return == true) {
                return traveladvisor_allow_special_char($traveladvisor_output, true);
            } else {
                echo traveladvisor_allow_special_char($traveladvisor_output, true);
            }
            if ($die <> 1)
                die();
        }

        /**
         * End function how to create post custom url fields
         */

        /**
         * Start function how to create post custom range in fields
         */
        public function traveladvisor_pb_range($die = 0, $traveladvisor_return = false) {
            global $traveladvisor_f_counter, $traveladvisor_job_cus_fields;
            $strings = new traveladvisor_theme_all_strings;
            $strings -> traveladvisor_theme_strings();
            
            $traveladvisor_fields_markup = '';
            if (isset($_REQUEST['counter'])) {
                $traveladvisor_counter = $_REQUEST['counter'];
            } else {
                $traveladvisor_counter = $traveladvisor_f_counter;
            }
            if (isset($traveladvisor_job_cus_fields[$traveladvisor_counter])) {
                $traveladvisor_title = isset($traveladvisor_job_cus_fields[$traveladvisor_counter]['label']) ? sprintf(__('Range : %s', 'traveladvisor'), $traveladvisor_job_cus_fields[$traveladvisor_counter]['label']) : '';
            } else {
                $traveladvisor_title = traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_range');
            }
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_range[required]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_required'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_range[label]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_title'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_range[meta_key]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_meta_key'),
                'check' => true,
                'std' => '',
                'hint' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_meta_key_hint'),
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_range[placeholder]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_placeholder'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_textarea(array(
                'id' => '',
                'name' => 'cus_field_range[help]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_help_text'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_range[min]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_minimum_value'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_range[max]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_maximum_value'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_range[increment]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_increment_step'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_range[enable_srch]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_enable_search'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_range[enable_inputs]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_enable_inputs'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_range[srch_style]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_search_style'),
                'std' => '',
                'options' => array('input' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_input'), 'slider' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_slider')),
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_input_text(array(
                'id' => '',
                'name' => 'cus_field_range[default_value]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_default_value'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_select(array(
                'id' => '',
                'name' => 'cus_field_range[collapse_search]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_collapse'),
                'std' => '',
                'options' => array('no' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_no'), 'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_yes')),
                'hint' => '',
            ));
            $traveladvisor_fields_markup .= $this->traveladvisor_fields_fontawsome_icon_jobs(array(
                'id' => 'fontawsome_icon_range',
                'name' => 'traveladvisor_cus_field_range[fontawsome_icon]',
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_icon'),
                'std' => '',
                'hint' => '',
            ));
            $traveladvisor_fields = array('traveladvisor_counter' => $traveladvisor_counter, 'traveladvisor_name' => 'range', 'traveladvisor_title' => $traveladvisor_title, 'traveladvisor_markup' => $traveladvisor_fields_markup);
            $traveladvisor_output = $this->traveladvisor_fields_layout($traveladvisor_fields);
            if ($traveladvisor_return == true) {
                return traveladvisor_allow_special_char($traveladvisor_output, true);
            } else {
                echo traveladvisor_allow_special_char($traveladvisor_output, true);
            }
            if ($die <> 1)
                die();
        }

        /**
         * end function how to create post custom range in fields
         */

        /**
         * Start function how to create post fields layout 
         */
        public function traveladvisor_fields_layout($traveladvisor_fields) {
            global $traveladvisor_form_fields2;
            
            $traveladvisor_defaults = array('traveladvisor_counter' => '1', 'traveladvisor_name' => '', 'traveladvisor_title' => '', 'traveladvisor_markup' => '');
            extract(shortcode_atts($traveladvisor_defaults, $traveladvisor_fields));

            $traveladvisor_html = '<div class="pb-item-container">
				<div class="pbwp-legend">';
            $traveladvisor_opt_array = array(
                'std' => $traveladvisor_name,
                'id' => 'cus_field_title',
                'cust_name' => 'traveladvisor_cus_field_title[]',
                'cust_type' => 'hidden',
                'return' => true,
            );
            $traveladvisor_html .= $traveladvisor_form_fields2->traveladvisor_form_text_render($traveladvisor_opt_array);
            $traveladvisor_opt_array = array(
                'std' => $traveladvisor_counter,
                'id' => 'traveladvisor_cus_field_id',
                'cust_name' => 'traveladvisor_cus_field_id[]',
                'cust_type' => 'hidden',
                'return' => true,
            );
            $traveladvisor_html .= $traveladvisor_form_fields2->traveladvisor_form_text_render($traveladvisor_opt_array);

            if( $traveladvisor_name == 'textarea' ) {
				$traveladvisor_show_icon = 'icon-text';
			} else if( $traveladvisor_name == 'dropdown' ) {
				$traveladvisor_show_icon = 'icon-file_download';
			} else if( $traveladvisor_name == 'date' ) {
				$traveladvisor_show_icon = 'icon-calendar-o';
			} else if( $traveladvisor_name == 'email' ) {
				$traveladvisor_show_icon = 'icon-envelope-o';
			} else if( $traveladvisor_name == 'url' ) {
				$traveladvisor_show_icon = 'icon-link4';
			} else if( $traveladvisor_name == 'range' ) {
				$traveladvisor_show_icon = 'icon-target';
			} else {
				$traveladvisor_show_icon = 'icon-file-text-o';
			}
			
			$traveladvisor_html .= '
					<div class="pbwp-label"><i class="'.$traveladvisor_show_icon.'"></i> ' . esc_attr($traveladvisor_title) . ' </div>
					<div class="pbwp-actions">
						<a class="pbwp-remove" href="#"><i class="icon-times"></i></a>
						<a class="pbwp-toggle" href="#"><i class="icon-sort-down"></i></a>
					</div>
				</div>
				<div class="pbwp-form-holder" style="display:none;">';
            $traveladvisor_html .= $traveladvisor_markup;
            $traveladvisor_html .= '	
				</div>
			</div>';

            return traveladvisor_allow_special_char($traveladvisor_html, true);
        }

        /**
         * End function how to create post fields layout in html
         */

        /**
         * Start function how to create post custom fields in input
         */
        public function traveladvisor_fields_input_text($params = '') {
            global $traveladvisor_f_counter, $traveladvisor_form_fields2, $traveladvisor_html_fields, $traveladvisor_job_cus_fields;
            $traveladvisor_output = '';
            $traveladvisor_output .= '<script>jQuery(document).ready(function($) {
                                    traveladvisor_check_fields_avail();
                            });</script>';
            extract($params);
            $traveladvisor_label = substr($name, strpos($name, '['), strpos($name, ']'));
            $traveladvisor_label = str_replace(array('[', ']'), array('', ''), $traveladvisor_label);
            if (isset($traveladvisor_job_cus_fields[$traveladvisor_f_counter])) {
                $traveladvisor_value = isset($traveladvisor_job_cus_fields[$traveladvisor_f_counter][$traveladvisor_label]) ? $traveladvisor_job_cus_fields[$traveladvisor_f_counter][$traveladvisor_label] : '';
            }
            if (isset($traveladvisor_value) && $traveladvisor_value != '') {
                $value = $traveladvisor_value;
            } else {
                $value = $std;
            }
            $traveladvisor_rand_id = time();
            $html_id = $id != '' ? 'traveladvisor_' . sanitize_html_class($id) . '' : '';
            $html_name = 'traveladvisor_' . TRAVELADVISOR_FUNCTIONS()->traveladvisor_special_chars($name) . '[]';
            $traveladvisor_check_con = '';
            if (isset($check) && $check == true) {
                $html_id = 'check_field_name_' . $traveladvisor_rand_id;
            }

            $traveladvisor_output .= $traveladvisor_html_fields->traveladvisor_opening_field(array(
                'name' => $title,
                'hint_text' => $hint,
            ));

            $traveladvisor_opt_array = array(
                'id' => $id,
                'cust_id' => $html_id,
                'cust_name' => $html_name,
                'std' => $value,
                'return' => true,
            );

            $traveladvisor_output .= $traveladvisor_form_fields2->traveladvisor_form_text_render($traveladvisor_opt_array);

            $traveladvisor_output .= '<span class="name-checking"></span>';

            $traveladvisor_output .= $traveladvisor_html_fields->traveladvisor_closing_field(array(
                'desc' => '',
            ));
            return traveladvisor_allow_special_char($traveladvisor_output);
        }

        /**
         * end function how to create post custom fields in input
         */

        /**
         * Start function how to create post custom fields in input textarea
         */
        public function traveladvisor_fields_input_textarea($params = '') {
            global $traveladvisor_f_counter, $traveladvisor_form_fields2, $traveladvisor_html_fields, $traveladvisor_job_cus_fields;
            $traveladvisor_output = '';
            extract($params);
            $traveladvisor_label = substr($name, strpos($name, '['), strpos($name, ']'));
            $traveladvisor_label = str_replace(array('[', ']'), array('', ''), $traveladvisor_label);
            $traveladvisor_output .= '<script>jQuery(document).ready(function($) {
                                    traveladvisor_check_fields_avail();
                            });</script>';
            if (isset($traveladvisor_job_cus_fields[$traveladvisor_f_counter])) {
                $traveladvisor_value = isset($traveladvisor_job_cus_fields[$traveladvisor_f_counter][$traveladvisor_label]) ? $traveladvisor_job_cus_fields[$traveladvisor_f_counter][$traveladvisor_label] : '';
            }
            if (isset($traveladvisor_value) && $traveladvisor_value != '') {
                $value = $traveladvisor_value;
            } else {
                $value = $std;
            }
            $html_id = $id != '' ? 'traveladvisor_' . sanitize_html_class($id) . '' : '';
            $html_name = 'traveladvisor_' . TRAVELADVISOR_FUNCTIONS()->traveladvisor_special_chars($name) . '[]';

            $traveladvisor_output .= $traveladvisor_html_fields->traveladvisor_opening_field(array(
                'name' => $title,
                'hint_text' => $hint,
            ));

            $traveladvisor_opt_array = array(
                'id' => $id,
                'cust_id' => $html_id,
                'cust_name' => $html_name,
                'std' => $value,
                'return' => true,
            );

            $traveladvisor_output .= $traveladvisor_form_fields2->traveladvisor_form_textarea_render($traveladvisor_opt_array);

            $traveladvisor_output .= $traveladvisor_html_fields->traveladvisor_closing_field(array(
                'desc' => '',
            ));
            return traveladvisor_allow_special_char($traveladvisor_output);
        }

        /**
         * end function how to create post custom fields in input
         */

        /**
         * Start function how to create post custom select fields
         */
        public function traveladvisor_fields_select($params = '') {
            global $traveladvisor_f_counter, $traveladvisor_form_fields2, $traveladvisor_html_fields, $traveladvisor_job_cus_fields;
            $traveladvisor_output = '';
            extract($params);
            $traveladvisor_output .= '<script>jQuery(document).ready(function($) {
                           	  traveladvisor_check_fields_avail();
                           });
						   </script>';

            $traveladvisor_label = substr($name, strpos($name, '['), strpos($name, ']'));
            $traveladvisor_label = str_replace(array('[', ']'), array('', ''), $traveladvisor_label);
            if (isset($traveladvisor_job_cus_fields[$traveladvisor_f_counter])) {
                $traveladvisor_value = isset($traveladvisor_job_cus_fields[$traveladvisor_f_counter][$traveladvisor_label]) ? $traveladvisor_job_cus_fields[$traveladvisor_f_counter][$traveladvisor_label] : '';
            }
            if (isset($traveladvisor_value) && $traveladvisor_value != '') {
                $value = $traveladvisor_value;
            } else {
                $value = $std;
            }
            $html_id = $id != '' ? 'traveladvisor_' . sanitize_html_class($id) . '' : '';
            $html_name = 'traveladvisor_' . TRAVELADVISOR_FUNCTIONS()->traveladvisor_special_chars($name) . '[]';
            $html_class = 'chosen-select-no-single';

            $traveladvisor_output .= $traveladvisor_html_fields->traveladvisor_opening_field(array(
                'name' => $title,
                'hint_text' => $hint,
            ));

            $traveladvisor_opt_array = array(
                'id' => $id,
                'cust_id' => $html_id,
                'cust_name' => $html_name,
                'std' => $value,
                'classes' => $html_class,
                'options' => $options,
                'return' => true,
            );

            $traveladvisor_output .= $traveladvisor_form_fields2->traveladvisor_form_select_render($traveladvisor_opt_array);

            $traveladvisor_output .= $traveladvisor_html_fields->traveladvisor_closing_field(array(
                'desc' => '',
            ));

            return traveladvisor_allow_special_char($traveladvisor_output);
        }

        /**
         * end function how to create post custom select fields
         */

        /**
         * Start function how to create post custom icon fields
         */
        public function traveladvisor_fields_fontawsome_icon_jobs($params = '') {
            global $traveladvisor_f_counter, $traveladvisor_form_fields2, $traveladvisor_html_fields, $traveladvisor_job_cus_fields;
            $traveladvisor_output = '';
            extract($params);
            $traveladvisor_output .= '';
            $rand_id = rand(0, 999999);
            $traveladvisor_label = substr($name, strpos($name, '['), strpos($name, ']'));
            $traveladvisor_label = str_replace(array('[', ']'), array('', ''), $traveladvisor_label);
            if (isset($traveladvisor_job_cus_fields[$traveladvisor_f_counter])) {
                $traveladvisor_value = isset($traveladvisor_job_cus_fields[$traveladvisor_f_counter][$traveladvisor_label]) ? $traveladvisor_job_cus_fields[$traveladvisor_f_counter][$traveladvisor_label] : '';
            }
            if (isset($traveladvisor_value) && $traveladvisor_value != '') {
                $value = $traveladvisor_value;
            } else {
                $value = $std;
            }
            $html_id = $id != '' ? 'traveladvisor_' . sanitize_html_class($id) . '' : '';
            $html_name = 'traveladvisor_' . TRAVELADVISOR_FUNCTIONS()->traveladvisor_special_chars($name) . '[]';
            $html_class = 'chosen-select-no-single';

            $traveladvisor_output .= $traveladvisor_html_fields->traveladvisor_opening_field(array(
                'name' => $title,
                'hint_text' => $hint,
            ));

            $traveladvisor_output .= traveladvisor_iconlist_plugin_options($value, $id . $traveladvisor_f_counter . $rand_id, $name);

            $traveladvisor_output .= $traveladvisor_html_fields->traveladvisor_closing_field(array(
                'desc' => '',
            ));

            return traveladvisor_allow_special_char($traveladvisor_output);
        }

        /**
         * end function how to create post custom icon fields
         */

        /**
         * Start function how to save array of fields
         */
        public function traveladvisor_save_array($traveladvisor_counter = 0, $traveladvisor_type = '', $cus_field_array = array()) {
            $traveladvisor_fields = array('required', 'label', 'meta_key', 'placeholder', 'enable_srch', 'default_value', 'fontawsome_icon', 'help', 'rows', 'cols', 'multi', 'post_multi', 'first_value', 'collapse_search', 'date_format', 'min', 'max', 'increment', 'enable_inputs', 'srch_style');
            $cus_field_array['type'] = $traveladvisor_type;
            foreach ($traveladvisor_fields as $field) {
                if (isset($_POST["traveladvisor_cus_field_{$traveladvisor_type}"][$field][$traveladvisor_counter])) {
                    $cus_field_array[$field] = $_POST["traveladvisor_cus_field_{$traveladvisor_type}"][$field][$traveladvisor_counter];
                }
            }
            return $cus_field_array;
        }

        /**
         * end function how to save array of fields
         */

        /**
         * Start function how to update fields
         */
        public function traveladvisor_update_custom_fields() {
            
            $strings = new traveladvisor_theme_all_strings;
            $strings -> traveladvisor_theme_strings();
            
            $traveladvisor_obj = new traveladvisor_custom_fields_options();
            $text_counter = $textarea_counter = $dropdown_counter = $date_counter = $email_counter = $url_counter = $range_counter = $cus_field_counter = $error = 0;
            $error_msg = '';
            $cus_field = array();
            if (isset($_POST['traveladvisor_cus_field_id']) && sizeof($_POST['traveladvisor_cus_field_id']) > 0) {
                foreach ($_POST['traveladvisor_cus_field_id'] as $keys => $values) {
                    if ($values != '') {
                        $cus_field_array = array();
                        $traveladvisor_type = isset($_POST["traveladvisor_cus_field_title"][$cus_field_counter]) ? $_POST["traveladvisor_cus_field_title"][$cus_field_counter] : '';
                        switch ($traveladvisor_type) {
                            case('text'):
                                $cus_field_array = $traveladvisor_obj->traveladvisor_save_array($text_counter, $traveladvisor_type, $cus_field_array);
                                $text_counter++;
                                break;
                            case('textarea'):
                                $cus_field_array = $traveladvisor_obj->traveladvisor_save_array($textarea_counter, $traveladvisor_type, $cus_field_array);
                                $textarea_counter++;
                                break;
                            case('dropdown'):
                                $cus_field_array = $traveladvisor_obj->traveladvisor_save_array($dropdown_counter, $traveladvisor_type, $cus_field_array);
                                if (isset($_POST["cus_field_{$traveladvisor_type}"]['options_values'][$values]) && (strlen(implode($_POST["cus_field_{$traveladvisor_type}"]['options_values'][$values])) != 0)) {
                                    $cus_field_array['options'] = array();
                                    $option_counter = 0;
                                    foreach ($_POST["cus_field_{$traveladvisor_type}"]['options_values'][$values] as $option) {
                                        if ($option != '') {
                                            $option = ltrim(rtrim($option));
                                            if ($_POST["cus_field_{$traveladvisor_type}"]['options'][$values][$option_counter] != '') {
                                                $cus_field_array['options']['select'][] = isset($_POST["cus_field_{$traveladvisor_type}"]['selected'][$values][$option_counter]) ? $_POST["cus_field_{$traveladvisor_type}"]['selected'][$values][$option_counter] : '';
                                                $cus_field_array['options']['label'][] = isset($_POST["cus_field_{$traveladvisor_type}"]['options'][$values][$option_counter]) ? $_POST["cus_field_{$traveladvisor_type}"]['options'][$values][$option_counter] : '';
                                                $cus_field_array['options']['value'][] = isset($option) && $option != '' ? strtolower(str_replace(" ", "-", $option)) : '';
                                            }
                                        }
                                        $option_counter++;
                                    }
                                } else {
                                    $error = 1;
                                    $error_msg .= "Please select atleast one option for '" . $cus_field_array['label'] . "' field.<br/>";
                                }
                                $dropdown_counter++;
                                break;
                            case('date'):
                                $cus_field_array = $traveladvisor_obj->traveladvisor_save_array($date_counter, $traveladvisor_type, $cus_field_array);
                                $date_counter++;
                                break;
                            case('email'):
                                $cus_field_array = $traveladvisor_obj->traveladvisor_save_array($email_counter, $traveladvisor_type, $cus_field_array);
                                $email_counter++;
                                break;
                            case('url'):
                                $cus_field_array = $traveladvisor_obj->traveladvisor_save_array($url_counter, $traveladvisor_type, $cus_field_array);
                                $url_counter++;
                                break;
                            case('range'):
                                $cus_field_array = $traveladvisor_obj->traveladvisor_save_array($range_counter, $traveladvisor_type, $cus_field_array);
                                $range_counter++;
                                break;
                        }
                        $cus_field[$values] = $cus_field_array;
                        $cus_field_counter++;
                    }
                }
            }

            if ($error == 0) {
                update_option("traveladvisor_job_cus_fields", $cus_field);
                $error = 0;
                $error_msg = traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_all_settings');
            }
            $return_arr = array('error' => $error, 'error_msg' => $error_msg);
            return $return_arr;
        }

        public function traveladvisor_check_fields_avail() {
            $strings = new traveladvisor_theme_all_strings;
            $strings -> traveladvisor_theme_strings();
            
            $traveladvisor_job_cus_fields = get_option("traveladvisor_job_cus_fields");
            $traveladvisor_json = array();
            $traveladvisor_temp_names = array();
            $traveladvisor_temp_names_1 = array();
            $traveladvisor_temp_names_2 = array();
            $traveladvisor_temp_names_3 = array();
            $traveladvisor_temp_names_4 = array();
            $traveladvisor_temp_names_5 = array();
            $traveladvisor_temp_names_6 = array();
            $traveladvisor_field_name = $_REQUEST['name'];
            $form_field_names = isset($_REQUEST['traveladvisor_cus_field_text']['meta_key']) ? $_REQUEST['traveladvisor_cus_field_text']['meta_key'] : array();
            $form_field_names_1 = isset($_REQUEST['traveladvisor_cus_field_textarea']['meta_key']) ? $_REQUEST['traveladvisor_cus_field_textarea']['meta_key'] : array();
            $form_field_names_2 = isset($_REQUEST['traveladvisor_cus_field_dropdown']['meta_key']) ? $_REQUEST['traveladvisor_cus_field_dropdown']['meta_key'] : array();
            $form_field_names_3 = isset($_REQUEST['traveladvisor_cus_field_date']['meta_key']) ? $_REQUEST['traveladvisor_cus_field_date']['meta_key'] : array();
            $form_field_names_4 = isset($_REQUEST['traveladvisor_cus_field_email']['meta_key']) ? $_REQUEST['traveladvisor_cus_field_email']['meta_key'] : array();
            $form_field_names_5 = isset($_REQUEST['traveladvisor_cus_field_url']['meta_key']) ? $_REQUEST['traveladvisor_cus_field_url']['meta_key'] : array();
            $form_field_names_6 = isset($_REQUEST['traveladvisor_cus_field_range']['meta_key']) ? $_REQUEST['traveladvisor_cus_field_range']['meta_key'] : array();
            $form_field_names = array_merge($form_field_names, $form_field_names_1, $form_field_names_2, $form_field_names_3, $form_field_names_4, $form_field_names_5, $form_field_names_6);
            $length = count(array_keys($form_field_names, $traveladvisor_field_name));
            if ($traveladvisor_field_name == '') {
                $traveladvisor_json['type'] = 'error';
                $traveladvisor_json['message'] = '<i class="icon-times"></i> ' . traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_field_name_required');
            } else {
                if (is_array($traveladvisor_job_cus_fields) && sizeof($traveladvisor_job_cus_fields) > 0) {
                    $success = 1;
                    foreach ($traveladvisor_job_cus_fields as $field_key => $traveladvisor_field) {
                        if (isset($traveladvisor_field['type'])) {
                            if (preg_match('/\s/', $traveladvisor_field_name)) {
                                $traveladvisor_json['type'] = 'error';
                                $traveladvisor_json['message'] = '<i class="icon-times"></i> ' . traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_field_whitespaces_notallowed');
                                echo json_encode($traveladvisor_json);
                                die();
                            }
                            if (preg_match('/[\'^$%&*()}{@#~?><>,|=+]/', $traveladvisor_field_name)) {
                                $traveladvisor_json['type'] = 'error';
                                $traveladvisor_json['message'] = '<i class="icon-times"></i> ' . traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_special_ch_notallowed');
                                echo json_encode($traveladvisor_json);
                                die();
                            }
                            if (trim($traveladvisor_field['type']) == trim($traveladvisor_field_name)) {

                                if (in_array(trim($traveladvisor_field_name), $form_field_names) && $length > 1) {
                                    $traveladvisor_json['type'] = 'error';
                                    $traveladvisor_json['message'] = '<i class="icon-times"></i> ' . traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_name_already_exist') ;
                                    echo json_encode($traveladvisor_json);
                                    die();
                                }
                            } else {
                                if (in_array(trim($traveladvisor_field_name), $form_field_names) && $length > 1) {
                                    $traveladvisor_json['type'] = 'error';
                                    $traveladvisor_json['message'] = '<i class="icon-times"></i> ' . traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_name_already_exist') ;
                                    echo json_encode($traveladvisor_json);
                                    die();
                                }
                            }
                        }
                    }
                    $traveladvisor_json['type'] = 'success';
                    $traveladvisor_json['message'] =  traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_name_available');
                } else {
                    if (preg_match('/\s/', $traveladvisor_field_name)) {
                        $traveladvisor_json['type'] = 'error';
                        $traveladvisor_json['message'] = '<i class="icon-times"></i> ' . traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_field_whitespaces_notallowed');
                        echo json_encode($traveladvisor_json);
                        die();
                    }
                    if (preg_match('/[\'^$%&*()}{@#~?><>,|=+]/', $traveladvisor_field_name)) {
                        $traveladvisor_json['type'] = 'error';
                        $traveladvisor_json['message'] = '<i class="icon-times"></i> ' . traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_special_ch_notallowed');
                        echo json_encode($traveladvisor_json);
                        die();
                    }
                    if (in_array(trim($traveladvisor_field_name), $form_field_names) && $length > 1) {
                        $traveladvisor_json['type'] = 'error';
                        $traveladvisor_json['message'] = '<i class="icon-times"></i> ' . traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_name_already_exist');
                    } else {
                        $traveladvisor_json['type'] = 'success';
                        $traveladvisor_json['message'] = traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields_name_available');
                    }
                }
            }
            echo json_encode($traveladvisor_json);
            die();
        }

    }

    $traveladvisor_custom_fields_obj = new traveladvisor_custom_fields_options();
}