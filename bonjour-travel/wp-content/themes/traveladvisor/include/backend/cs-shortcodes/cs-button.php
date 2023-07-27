<?php
/*
 *
 * @File : Button
 * @retrun
 *
 */
if (!function_exists('traveladvisor_var_page_builder_button')) {
    global $traveladvisor_var_static_text;
    $strings = new traveladvisor_theme_all_strings;
    $strings->traveladvisor_short_code_strings();
    function traveladvisor_var_page_builder_button($die = 0) {
        global $post, $traveladvisor_node, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields;
        if (function_exists('traveladvisor_shortcode_names')) {
            $shortcode_element = '';
            $filter_element = 'filterdrag';
            $shortcode_view = '';
            $traveladvisor_output = array();
            $TRAVELADVISOR_PREFIX = 'traveladvisor_button';
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
                'traveladvisor_var_button_text' => '',
                'traveladvisor_var_button_size' => '',
                'traveladvisor_var_button_icon' => '',
                'traveladvisor_var_button_link' => '',
                'traveladvisor_var_button_border' => '',
                'traveladvisor_var_button_icon_position' => '',
                'traveladvisor_var_button_type' => '',
                'traveladvisor_var_button_threed' => '',
                'traveladvisor_var_button_target' => '',
                'traveladvisor_var_button_border_color' => '',
                'traveladvisor_var_button_color' => '',
                'traveladvisor_var_button_bg_color' => '',
                'traveladvisor_var_button_padding_top' => '',
                'traveladvisor_var_button_padding_bottom' => '',
                'traveladvisor_var_button_padding_left' => '',
                'traveladvisor_var_button_padding_right' => '',
            );
            if (isset($traveladvisor_output['0']['atts'])) {
                $atts = $traveladvisor_output['0']['atts'];
            } else {
                $atts = array();
            }
            if (isset($traveladvisor_output['0']['content'])) {
                $button_column_text = $traveladvisor_output['0']['content'];
            } else {
                $button_column_text = '';
            }
            $button_element_size = '25';
            foreach ($defaults as $key => $values) {
                if (isset($atts[$key])) {
                    $$key = $atts[$key];
                } else {
                    $$key = $values;
                }
            }
            $name = 'traveladvisor_var_page_builder_button';
            $coloumn_class = 'column_' . $button_element_size;
            if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
                $shortcode_element = 'shortcode_element_class';
                $shortcode_view = 'cs-pbwp-shortcode';
                $filter_element = 'ajax-drag';
                $coloumn_class = '';
            }
            ?>
            <div id="<?php echo esc_attr($name . $traveladvisor_counter) ?>_del" class="column  parentdelete <?php echo esc_attr($coloumn_class); ?>
            <?php echo esc_attr($shortcode_view); ?>" item="button" data="<?php echo traveladvisor_element_size_data_array_index($button_element_size) ?>" >
                 <?php traveladvisor_element_setting($name, $traveladvisor_counter, $button_element_size) ?>
                <div class="cs-wrapp-class-<?php echo intval($traveladvisor_counter) ?>
                     <?php echo esc_attr($shortcode_element); ?>" id="<?php echo esc_attr($name . $traveladvisor_counter) ?>" data-shortcode-template="[traveladvisor_button {{attributes}}]{{content}}[/traveladvisor_button]" style="display: none;">
                    <div class="cs-heading-area" data-counter="<?php echo esc_attr($traveladvisor_counter) ?>">
                        <h5><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_button_edit') ?></h5>
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
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_text'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_text_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr($traveladvisor_var_button_text),
                    'cust_id' => 'traveladvisor_var_button_text' . $traveladvisor_counter,
                    'classes' => '',
                    'cust_name' => 'traveladvisor_var_button_text[]',
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
            $traveladvisor_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_size'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_size_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr($traveladvisor_var_button_size),
                    'id' => '',
                    'cust_name' => 'traveladvisor_var_button_size[]',
                    'classes' => 'dropdown chosen-select',
                    'options' => array(
                        'large' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_large'),
                        'medium' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_medium'),
                        'small' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_small'),
                    ),
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
            $traveladvisor_var_button_icon = isset($traveladvisor_var_button_icon) ? $traveladvisor_var_button_icon : '';
            ?>
                            <div class="form-elements" id="traveladvisor_infobox_<?php echo esc_attr($traveladvisor_counter); ?>">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <label><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_button_icon'); ?></label>
            <?php
            if (function_exists('traveladvisor_var_tooltip_helptext')) {
                $tooltip = traveladvisor_var_theme_text_srt('traveladvisor_var_button_tooltip');
                echo traveladvisor_var_tooltip_helptext($tooltip );
            }
            ?>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <?php echo traveladvisor_var_icomoon_icons_box($traveladvisor_var_button_icon, esc_attr($traveladvisor_counter), 'traveladvisor_var_button_icon'); ?>
                                </div>
                            </div>
            <?php
            $traveladvisor_opt_array = array(
                'name' =>traveladvisor_var_theme_text_srt('traveladvisor_var_button_url'),
                'desc' => '',
                'hint_text' =>traveladvisor_var_theme_text_srt('traveladvisor_var_button_url'),
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr($traveladvisor_var_button_link),
                    'cust_id' => 'traveladvisor_var_button_link' . $traveladvisor_counter,
                    'classes' => '',
                    'cust_name' => 'traveladvisor_var_button_link[]',
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
            $traveladvisor_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_paddingtop'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_paddingtop_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr($traveladvisor_var_button_padding_top),
                    'cust_id' => 'traveladvisor_var_button_padding_top' . $traveladvisor_counter,
                    'classes' => '',
                    'cust_name' => 'traveladvisor_var_button_padding_top[]',
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
            $traveladvisor_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_paddingbottom'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_paddingbottom_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr($traveladvisor_var_button_padding_bottom),
                    'cust_id' => 'traveladvisor_var_button_padding_bottom' . $traveladvisor_counter,
                    'classes' => '',
                    'cust_name' => 'traveladvisor_var_button_padding_bottom[]',
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
            $traveladvisor_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_paddingleft'),
                'desc' => '',
                'hint_text' =>traveladvisor_var_theme_text_srt('traveladvisor_var_button_paddingleft_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr($traveladvisor_var_button_padding_left),
                    'cust_id' => 'traveladvisor_var_button_padding_left' . $traveladvisor_counter,
                    'classes' => '',
                    'cust_name' => 'traveladvisor_var_button_padding_left[]',
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
            $traveladvisor_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_paddingright'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_paddingright_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr($traveladvisor_var_button_padding_right),
                    'cust_id' => 'traveladvisor_var_button_padding_right' . $traveladvisor_counter,
                    'classes' => '',
                    'cust_name' => 'traveladvisor_var_button_padding_right[]',
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
            $traveladvisor_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_border'),
                'desc' => '',
                'hint_text' =>traveladvisor_var_theme_text_srt('traveladvisor_var_button_border_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr($traveladvisor_var_button_border),
                    'id' => '',
                    'cust_name' => 'traveladvisor_var_button_border[]',
                    'classes' => 'dropdown chosen-select',
                    'options' => array(
                        'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_border_yes'),
                        'no' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_border_no'),
                    ),
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
            $traveladvisor_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_type'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_type_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr($traveladvisor_var_button_type),
                    'id' => '',
                    'cust_name' => 'traveladvisor_var_button_type[]',
                    'classes' => 'dropdown chosen-select',
                    'options' => array(
                        'square' =>  traveladvisor_var_theme_text_srt('traveladvisor_var_button_typesquare'),
                        'rounded' =>  traveladvisor_var_theme_text_srt('traveladvisor_var_button_typerounded'),
                    ),
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
            $traveladvisor_opt_array = array(
                'name' =>  traveladvisor_var_theme_text_srt('traveladvisor_var_button_3d'),
                'desc' => '',
                'hint_text' =>  traveladvisor_var_theme_text_srt('traveladvisor_var_button_3d_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr($traveladvisor_var_button_threed),
                    'id' => '',
                    'cust_name' => 'traveladvisor_var_button_threed[]',
                    'classes' => 'dropdown chosen-select',
                    'options' => array(
                        'no' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_3dno'),
                        'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_3dyes'),
                    ),
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
            $traveladvisor_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_target'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_target_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr($traveladvisor_var_button_target),
                    'id' => '',
                    'cust_name' => 'traveladvisor_var_button_target[]',
                    'classes' => 'dropdown chosen-select',
                    'options' => array(
                        '_blank' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_target_blank'),
                        '_self' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_target_self'),
                    ),
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);

            $traveladvisor_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_border_color'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_border_color_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr($traveladvisor_var_button_border_color),
                    'cust_id' => 'traveladvisor_var_button_border_color'.$traveladvisor_counter,
                    'classes' => 'bg_color',
                    'cust_name' => 'traveladvisor_var_button_border_color[]',
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
            $traveladvisor_opt_array = array(
                'name' =>traveladvisor_var_theme_text_srt('traveladvisor_var_button_bgcolor'),
                'desc' => '',
                'hint_text' =>traveladvisor_var_theme_text_srt('traveladvisor_var_button_bgcolor_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr($traveladvisor_var_button_bg_color),
                    'cust_id' => 'traveladvisor_var_button_bg_color'.$traveladvisor_counter,
                    'classes' => 'bg_color',
                    'cust_name' => 'traveladvisor_var_button_bg_color[]',
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
            $traveladvisor_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_color'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_color_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => esc_attr($traveladvisor_var_button_color),
                    'cust_id' => 'traveladvisor_var_button_color'.$traveladvisor_counter,
                    'classes' => 'bg_color',
                    'cust_name' => 'traveladvisor_var_button_color[]',
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
            ?>
                        </div>
                            <?php if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') { ?>
                            <ul class="form-elements insert-bg">
                                <li class="to-field">
                                    <a class="insert-btn cs-main-btn" onclick="javascript:traveladvisor_shortcode_insert_editor('<?php echo str_replace('traveladvisor_var_page_builder_', '', $name); ?>', '<?php echo esc_js($name . $traveladvisor_counter) ?>', '<?php echo esc_js($filter_element); ?>')" ><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_button_insert'); ?></a>
                                </li>
                            </ul>
                            <div id="results-shortocde"></div>
            <?php } else { ?>
                            <?php
                            $traveladvisor_opt_array = array(
                                'std' => 'button',
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
                                    'std' => traveladvisor_var_theme_text_srt('traveladvisor_var_button_save'),
                                    'cust_id' => 'button_save' . $traveladvisor_counter,
                                    'cust_type' => 'button',
                                    'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
                                    'classes' => 'cs-traveladvisor-admin-btn',
                                    'cust_name' => 'button_save',
                                    'return' => true,
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                        }
                        ?>
                    </div>
                </div>
                <script>
                    jQuery(document).ready(function ($) {
                        if (jQuery('.chosen-select, .chosen-select-deselect, .chosen-select-no-single, .chosen-select-no-results, .chosen-select-width').length != '') {
                            var config = {
                                '.chosen-select': {width: "100%"},
                                '.chosen-select-deselect': {allow_single_deselect: true},
                                '.chosen-select-no-single': {disable_search_threshold: 10, width: "100%"},
                                '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
                                '.chosen-select-width': {width: "95%"}
                            }
                            for (var selector in config) {
                                jQuery(selector).chosen(config[selector]);
                            }
                        }

                    });
                </script>
            </div>
            <?php
        }
        if ($die <> 1) {
            die();
        }
    }
    add_action('wp_ajax_traveladvisor_var_page_builder_button', 'traveladvisor_var_page_builder_button');
}