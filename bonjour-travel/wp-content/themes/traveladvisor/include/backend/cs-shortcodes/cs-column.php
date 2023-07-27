<?php
/*
 *
 * @File : Flex column
 * @retrun
 *
 */
if (!function_exists('traveladvisor_var_page_builder_flex_column')) {
    function traveladvisor_var_page_builder_flex_column($die = 0) {
        global $post, $traveladvisor_node, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields;
        if (function_exists('traveladvisor_shortcode_names')) {
            $shortcode_element = '';
            $filter_element = 'filterdrag';
            $shortcode_view = '';
            $traveladvisor_output = array();
            $TRAVELADVISOR_PREFIX = 'traveladvisor_column';
            $counter = isset($_POST['counter']) ? $_POST['counter'] : '';
            $traveladvisor_counter = isset($_POST['counter']) ? $_POST['counter'] : '';
            if (isset($_POST['action']) && !isset($_POST['shortcode_element_id'])) {
                $TRAVELADVISOR_POSTID = '';
                $shortcode_element_id = '';
            } else {
                $TRAVELADVISOR_POSTID = isset($_POST['POSTID']) ? $_POST['POSTID'] : '';
                $shortcode_element_id = isset($_POST['shortcode_element_id']) ? $_POST['shortcode_element_id'] : '';
                $shortcode_str = stripslashes($shortcode_element_id);
                $parseObject = new ShortcodeParse();
                $traveladvisor_output = $parseObject->traveladvisor_shortcodes($traveladvisor_output, $shortcode_str, true, $TRAVELADVISOR_PREFIX);
            }
            $defaults = array(
                 'traveladvisor_var_column_size' => '',
                'traveladvisor_var_column_section_title' => '',
                'traveladvisor_var_column_top_padding' => '',
                'traveladvisor_var_column_bottom_padding' => '',
                'traveladvisor_var_column_left_padding' => '',
                'traveladvisor_var_column_right_padding' => '',
                'traveladvisor_var_column_image_url_array' => '',
                'traveladvisor_var_column_bg_color' => '',
                'traveladvisor_var_column_title_color' => '',
            );
            if (isset($traveladvisor_output['0']['atts'])) {
                $atts = $traveladvisor_output['0']['atts'];
            } else {
                $atts = array();
            }
            if (isset($traveladvisor_output['0']['content'])) {
                $traveladvisor_var_column_content = $traveladvisor_output['0']['content'];
            } else {
                $traveladvisor_var_column_content = '';
            }
            $flex_column_element_size = '25';
            foreach ($defaults as $key => $values) {
                if (isset($atts[$key])) {
                    $$key = $atts[$key];
                } else {
                    $$key = $values;
                }
            }
            $name = 'traveladvisor_var_page_builder_flex_column';
            $coloumn_class = 'column_' . $flex_column_element_size;
            if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
                $shortcode_element = 'shortcode_element_class';
                $shortcode_view = 'cs-pbwp-shortcode';
                $filter_element = 'ajax-drag';
                $coloumn_class = '';
            }
            ?>
            <div id="<?php echo esc_attr($name . $traveladvisor_counter) ?>_del" class="column  parentdelete <?php echo esc_attr($coloumn_class); ?>
                 <?php echo esc_attr($shortcode_view); ?>" item="flex_column" data="<?php echo traveladvisor_element_size_data_array_index($flex_column_element_size) ?>" >
                     <?php traveladvisor_element_setting($name, $traveladvisor_counter, $flex_column_element_size) ?>
                <div class="cs-wrapp-class-<?php echo intval($traveladvisor_counter) ?>
                     <?php echo esc_attr($shortcode_element); ?>" id="<?php echo esc_attr($name . $traveladvisor_counter) ?>" data-shortcode-template="[traveladvisor_column {{attributes}}]{{content}}[/traveladvisor_column]" style="display: none;">
                    <div class="cs-heading-area" data-counter="<?php echo esc_attr($traveladvisor_counter) ?>">
                        <h5><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_edit_column_option');  ?></h5>
                        <a href="javascript:traveladvisor_frame_removeoverlay('<?php echo esc_js($name . $traveladvisor_counter) ?>','<?php echo esc_js($filter_element); ?>')" class="cs-btnclose">
                            <i class="icon-times"></i>
                        </a>
                    </div>
                    <div class="cs-pbwp-content">
                        <div class="cs-wrapp-clone cs-shortcode-wrapp">
                            <?php
                            if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
                                traveladvisor_shortcode_element_size();
                            }
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_column_title'),
                                'desc' => '',
                                'hint_text' =>traveladvisor_var_theme_text_srt('traveladvisor_var_column_title_hint'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr($traveladvisor_var_column_section_title),
                                    'cust_id' => 'traveladvisor_var_column_section_title' . $traveladvisor_counter,
                                    'classes' => '',
                                    'cust_name' => 'traveladvisor_var_column_section_title[]',
                                    'return' => true,
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                         //   if (isset($_POST['shortcode_element']) != 'shortcode') {
                                $traveladvisor_opt_array = array(
                                    'name' => esc_attr(traveladvisor_var_theme_text_srt('traveladvisor_var_column_text')),
                                    'desc' => '',
                                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_column_text_hint'),
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => esc_html($traveladvisor_var_column_content),
                                        'cust_id' => 'traveladvisor_var_column_content' . $traveladvisor_counter,
                                        'classes' => '',
                                        'extra_atr' => ' data-content-text=cs-shortcode-textarea',
                                        'cust_name' => 'traveladvisor_var_column_content[]',
                                        'return' => true,
                                        'classes'=>'',
                                        'traveladvisor_editor' => true,
                                    ),
                                );
                                $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($traveladvisor_opt_array);
                           // }
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_column_toppadding'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_column_toppadding_hint'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr($traveladvisor_var_column_top_padding),
                                    'cust_id' => 'traveladvisor_var_column_top_padding' . $traveladvisor_counter,
                                    'classes' => '',
                                    'cust_name' => 'traveladvisor_var_column_top_padding[]',
                                    'return' => true,
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_column_bottompadding'),
                                'desc' => '',
                                'hint_text' =>  traveladvisor_var_theme_text_srt('traveladvisor_var_column_bottompadding_hint'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr($traveladvisor_var_column_bottom_padding),
                                    'cust_id' => 'traveladvisor_var_column_bottom_padding' . $traveladvisor_counter,
                                    'classes' => '',
                                    'cust_name' => 'traveladvisor_var_column_bottom_padding[]',
                                    'return' => true,
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_column_leftpadding'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_column_leftpadding_hint'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr($traveladvisor_var_column_left_padding),
                                    'cust_id' => 'traveladvisor_var_column_left_padding' . $traveladvisor_counter,
                                    'classes' => '',
                                    'cust_name' => 'traveladvisor_var_column_left_padding[]',
                                    'return' => true,
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_column_rightpadding'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_column_rightpadding_hint'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr($traveladvisor_var_column_right_padding),
                                    'cust_id' => 'traveladvisor_var_column_right_padding' . $traveladvisor_counter,
                                    'classes' => '',
                                    'cust_name' => 'traveladvisor_var_column_right_padding[]',
                                    'return' => true,
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                            $traveladvisor_opt_array = array(
                                'std' => esc_attr($traveladvisor_var_column_image_url_array),
                                'id' => 'column_image_url',
                                'name' =>traveladvisor_var_theme_text_srt('traveladvisor_var_column_image'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_column_image_hint'),
                                'echo' => true,
                                'array' => true,
                                'prefix' => '',
                                'field_params' => array(
                                    'std' => esc_attr($traveladvisor_var_column_image_url_array),
                                    'id' => 'column_image_url',
                                    'return' => true,
                                    'array' => true,
                                    'array_txt' => false,
                                    'prefix' => '',
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_upload_file_field($traveladvisor_opt_array);
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_column_bgcolor'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_column_bgcolor_hint'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr($traveladvisor_var_column_bg_color),
                                    'cust_id' => 'traveladvisor_var_column_bg_color' . $traveladvisor_counter,
                                    'classes' => 'bg_color',
                                    'cust_name' => 'traveladvisor_var_column_bg_color[]',
                                    'return' => true,
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                            ?>
                        </div>
                        <?php if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') { ?>
                            <ul class="form-elements insert-bg">
                                <li class="to-field">
                                    <a class="insert-btn cs-main-btn" onclick="javascript:traveladvisor_shortcode_insert_editor('<?php echo str_replace('traveladvisor_var_page_builder_', '', $name); ?>', '<?php echo esc_js($name . $traveladvisor_counter) ?>', '<?php echo esc_js($filter_element); ?>')" ><?php _e('Insert', 'traveladvisor'); ?></a>
                                </li>
                            </ul>
                            <div id="results-shortocde"></div>
                        <?php } else { ?>
                            <?php
                            $traveladvisor_opt_array = array(
                                'std' => 'flex_column',
                                'id' => '',
                                'before' => '',
                                'after' => '',
                                'classes' => '',
                                'extra_atr' => '',
                                'cust_id' => 'traveladvisor_orderby' . $traveladvisor_counter,
                                'cust_name' => 'traveladvisor_orderby[]',
                                'required' => false
                            );
                            $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render($traveladvisor_opt_array);
                            $traveladvisor_opt_array = array(
                                'name' => '',
                                'desc' => '',
                                'hint_text' => '',
                                'echo' => true,
                                'field_params' => array(
                                    'std' =>  traveladvisor_var_theme_text_srt('traveladvisor_var_shortcode_save'),
                                    'cust_id' => 'flex_column_save' . $traveladvisor_counter,
                                    'cust_type' => 'button',
                                    'classes' => 'cs-traveladvisor-admin-btn',
                                    'cust_name' => 'flex_column_save',
                                    'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
                                    'return' => true,
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
        if ($die <> 1) {
            die();
        }
    }
    add_action('wp_ajax_traveladvisor_var_page_builder_flex_column', 'traveladvisor_var_page_builder_flex_column');
}