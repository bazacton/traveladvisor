<?php
/*
 *
 * @Shortcode Name : multi_pricetable
 * @retrun
 *
 */
if (!function_exists('traveladvisor_var_page_builder_pricetable')) {
    function traveladvisor_var_page_builder_pricetable($die = 0) {
        global $post, $traveladvisor_node, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields;
        $shortcode_element = '';
        $filter_element = 'filterdrag';
        $shortcode_view = '';
        $output = array();
        $traveladvisor_counter = $_POST['counter'];
        $multi_pricetable_num = 0;
        if (isset($_POST['action']) && !isset($_POST['shortcode_element_id'])) {
            $TRAVELADVISOR_POSTID = '';
            $shortcode_element_id = '';
        } else {
            $TRAVELADVISOR_POSTID = $_POST['POSTID'];
            $shortcode_element_id = $_POST['shortcode_element_id'];
            $shortcode_str = stripslashes($shortcode_element_id);
            $TRAVELADVISOR_PREFIX = 'pricetable|pricetable_item';
            $parseObject = new ShortcodeParse();
            $output = $parseObject->traveladvisor_shortcodes($output, $shortcode_str, true, $TRAVELADVISOR_PREFIX);
        }
        $defaults = array(
            'traveladvisor_var_column_size' => '1/1',
            'traveladvisor_var_multi_pricetable_title' => '',
            'traveladvisor_var_multi_pricetable_column' => '',
            'traveladvisor_var_item_column_size' => '',
            'traveladvisor_var_multi_pricetable_title_color' => '',
        );
        if (isset($output['0']['atts'])) {
            $atts = $output['0']['atts'];
        } else {
            $atts = array();
        }
        if (isset($output['0']['content'])) {
            $atts_content = $output['0']['content'];
        } else {
            $atts_content = array();
        }
        if (is_array($atts_content)) {
            $multi_pricetable_num = count($atts_content);
        }
        $multi_pricetable_element_size = '100';
        foreach ($defaults as $key => $values) {
            if (isset($atts[$key])) {
                $$key = $atts[$key];
            } else {
                $$key = $values;
            }
        }
        $traveladvisor_var_multi_pricetable_title = isset($traveladvisor_var_multi_pricetable_title) ? $traveladvisor_var_multi_pricetable_title : '';
        $traveladvisor_var_multi_pricetable_column = isset($traveladvisor_var_multi_pricetable_column) ? $traveladvisor_var_multi_pricetable_column : '';
        $traveladvisor_var_item_column_size = isset($traveladvisor_var_item_column_size) ? $traveladvisor_var_item_column_size : '';
        $traveladvisor_var_multi_pricetable_title_color = isset($traveladvisor_var_multi_pricetable_title_color) ? $traveladvisor_var_multi_pricetable_title_color : '';
        $name = 'traveladvisor_var_page_builder_pricetable';
        $coloumn_class = 'column_' . $multi_pricetable_element_size;
        if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
            $shortcode_element = 'shortcode_element_class';
            $shortcode_view = 'cs-pbwp-shortcode';
            $filter_element = 'ajax-drag';
            $coloumn_class = '';
        }
        ?>
        <div id="<?php echo traveladvisor_allow_special_char($name . $traveladvisor_counter) ?>_del" class="column  parentdelete <?php echo traveladvisor_allow_special_char($coloumn_class); ?> <?php echo traveladvisor_allow_special_char($shortcode_view); ?>" item="pricetable" data="<?php echo traveladvisor_element_size_data_array_index($multi_pricetable_element_size) ?>" >
            <?php traveladvisor_element_setting($name, $traveladvisor_counter, $multi_pricetable_element_size, '', 'comments-o', $type = ''); ?>
            <div class="cs-wrapp-class-<?php echo traveladvisor_allow_special_char($traveladvisor_counter) ?> <?php echo traveladvisor_allow_special_char($shortcode_element); ?>" id="<?php echo traveladvisor_allow_special_char($name . $traveladvisor_counter) ?>" style="display: none;">
                <div class="cs-heading-area">
                    <h5><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_edit_multipricetable_option'); ?></h5>
                    <a href="javascript:traveladvisor_frame_removeoverlay('<?php echo traveladvisor_allow_special_char($name . $traveladvisor_counter) ?>','<?php echo traveladvisor_allow_special_char($filter_element); ?>')" class="cs-btnclose"><i class="icon-times"></i></a>
                </div>
                <div class="cs-clone-append cs-pbwp-content">
                    <div class="cs-wrapp-tab-box">
                        <div id="shortcode-item-<?php echo traveladvisor_allow_special_char($traveladvisor_counter); ?>" data-shortcode-template="{{child_shortcode}} [/pricetable]" data-shortcode-child-template="[pricetable_item {{attributes}}] {{content}} [/pricetable_item]">
                            <div class="cs-wrapp-clone cs-shortcode-wrapp cs-disable-true cs-pbwp-content" data-template="[pricetable {{attributes}}]">
                                <?php
                                if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
                                    traveladvisor_shortcode_element_size();
                                }
                                $traveladvisor_opt_array = array(
                                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_element_title'),
                                    'desc' => '',
                                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_element_title_hint'),
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => esc_attr($traveladvisor_var_multi_pricetable_title),
                                        'cust_id' => '',
                                        'cust_name' => 'traveladvisor_var_multi_pricetable_title[]',
                                        'return' => true,
                                    ),
                                );
                                $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                                $traveladvisor_opt_array = array(
                                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_item_size'),
                                    'desc' => '',
                                    'hint_text' =>traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_item_size_hint'),
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => $traveladvisor_var_item_column_size,
                                        'cust_id' => 'traveladvisor_var_item_column_size',
                                        'id' => 'item_column_size',
                                        'cust_type' => 'button',
                                        'classes' => 'column_size  dropdown chosen-select-no-single select-medium',
                                        'cust_name' => 'traveladvisor_var_item_column_size[]',
                                        'extra_atr' => '',
                                        'options' => array(
                                            '1/1' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_item_size_full_width'),
                                            '1/2' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_item_size_one_half'),
                                            '1/3' =>traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_item_size_one_third'),
                                            '1/4' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_item_size_one_fourth'),
                                            '1/6' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_item_size_one_six'),
                                                                                      
										),
                                        'return' => true,
                                    ),
                                );
                                $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
                                
                                $traveladvisor_opt_array = array(
                                            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_title_color'),
                                            'desc' => '',
                                            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_title_color_hint'),
                                            'echo' => true,
                                            'classes' => 'txtfield',
                                            'field_params' => array(
                                                'std' => esc_attr($traveladvisor_var_multi_pricetable_title_color),
                                                'cust_id' => '',
                                                'classes' => 'bg_color',
                                                'cust_name' => 'traveladvisor_var_multi_pricetable_title_color[]',
                                                'return' => true,
                                            ),
                                        );
                                        $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                                ?>
                            </div>
                            <?php
                            if (isset($multi_pricetable_num) && $multi_pricetable_num <> '' && isset($atts_content) && is_array($atts_content)) {
                                foreach ($atts_content as $multi_pricetable) {
                                    $rand_string = rand(123456, 987654);
                                    $traveladvisor_var_multiple_pricetable_desc = $multi_pricetable['content'];
                                    $defaults = array(
                                        
                                        'traveladvisor_var_multiple_pricetable_title' => '',
                                        'traveladvisor_var_multiple_pricetable_currency' => '',
                                        'traveladvisor_var_multiple_pricetable_price' => '',
                                        //'traveladvisor_var_multiple_pricetable_desc' => '',
                                        'traveladvisor_var_multiple_pricetable_btntxt' => '',
                                        'traveladvisor_var_multiple_pricetable_btnlink' => '',
                                        'traveladvisor_var_multiple_pricetable_package' => '',
                                    );
                                    foreach ($defaults as $key => $values) {
                                        if (isset($multi_pricetable['atts'][$key])) {
                                            $$key = $multi_pricetable['atts'][$key];
                                        } else {
                                            $$key = $values;
                                        }
                                    }
                                    
                                    $traveladvisor_var_multi_pricetable_text = isset($traveladvisor_var_multi_pricetable_text) ? $traveladvisor_var_multi_pricetable_text : '';
                                    $traveladvisor_var_multiple_pricetable_title = isset($traveladvisor_var_multiple_pricetable_title) ? $traveladvisor_var_multiple_pricetable_title : '';
                                    $traveladvisor_var_multiple_pricetable_currency = isset($traveladvisor_var_multiple_pricetable_currency) ? $traveladvisor_var_multiple_pricetable_currency : '';
                                    $traveladvisor_var_multiple_pricetable_price = isset($traveladvisor_var_multiple_pricetable_price) ? $traveladvisor_var_multiple_pricetable_price : '';
                                    $traveladvisor_var_multiple_pricetable_package = isset($traveladvisor_var_multiple_pricetable_package) ? $traveladvisor_var_multiple_pricetable_package : '';
                                    $traveladvisor_var_multiple_pricetable_desc = isset($traveladvisor_var_multiple_pricetable_desc) ? $traveladvisor_var_multiple_pricetable_desc : '';
                                    $traveladvisor_var_multiple_pricetable_btntxt = isset($traveladvisor_var_multiple_pricetable_btntxt) ? $traveladvisor_var_multiple_pricetable_btntxt : '';
                                    $traveladvisor_var_multiple_pricetable_btnlink = isset($traveladvisor_var_multiple_pricetable_btnlink) ? $traveladvisor_var_multiple_pricetable_btnlink : '';
                                    ?>
                                    <div class='cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content' id="traveladvisor_infobox_<?php echo traveladvisor_allow_special_char($rand_string); ?>">
                                        <header>
                                            <h4><i class='icon-arrows'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable'); ?></h4>
                                            <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_shortcode_remove'); ?></a>
                                        </header>
                                        <?php
                                        $traveladvisor_opt_array = array(
                                            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_title'),
                                            'desc' => '',
                                            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_title_hint'),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_attr($traveladvisor_var_multiple_pricetable_title),
                                                'cust_id' => 'traveladvisor_var_multiple_pricetable_title',
                                                'classes' => '',
                                                'cust_name' => 'traveladvisor_var_multiple_pricetable_title[]',
                                                'return' => true,
                                            ),
                                        );
                                        $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                                        
                                        $traveladvisor_opt_array = array(
                                            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_currency_sign'),
                                            'desc' => '',
                                            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_currency_sign_hint'),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_attr($traveladvisor_var_multiple_pricetable_currency),
                                                'cust_id' => 'traveladvisor_var_multiple_pricetable_currency',
                                                'classes' => '',
                                                'cust_name' => 'traveladvisor_var_multiple_pricetable_currency[]',
                                                'return' => true,
                                            ),
                                        );
                                        $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                                        $traveladvisor_opt_array = array(
                                            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_price'),
                                            'desc' => '',
                                            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_price_hint'),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_attr($traveladvisor_var_multiple_pricetable_price),
                                                'cust_id' => 'traveladvisor_var_multiple_pricetable_price',
                                                'classes' => '',
                                                'cust_name' => 'traveladvisor_var_multiple_pricetable_price[]',
                                                'return' => true,
                                            ),
                                        );
                                        $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                                        $traveladvisor_opt_array = array(
                                            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_package_duration'),
                                            'desc' => '',
                                            'hint_text' =>traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_package_duration_hint'),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_attr($traveladvisor_var_multiple_pricetable_package),
                                                'cust_id' => 'traveladvisor_var_multiple_pricetable_package',
                                                'cust_name' => 'traveladvisor_var_multiple_pricetable_package[]',
                                                'classes' => 'dropdown chosen-select',
                                                'options' => array(
                                                            'day' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_package_duration_day'),
                                                            'week' =>  traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_package_duration_week'),
                                                            'fortnight' =>  traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_package_duration_fortnight'),
                                                            'month' =>  traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_package_duration_month'),
                                                            'year' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_package_duration_year'),
                                                    ),
                                                'return' => true,
                                            ),
                                        );
                                        $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
                                        $traveladvisor_opt_array = array(
                                            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_description'),
                                            'desc' => '',
                                            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_description_hint'),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_attr($traveladvisor_var_multiple_pricetable_desc),
                                                'cust_id' => 'traveladvisor_var_multiple_pricetable_desc',
                                                'classes' => '',
                                                'cust_name' => 'traveladvisor_var_multiple_pricetable_desc[]',
                                                'return' => true,
                                                'extra_atr' => 'data-content-text=cs-shortcode-textarea',
                                                'classes'=>'',
                                                'traveladvisor_editor' => true,
                                            ),
                                        );
                                        $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($traveladvisor_opt_array);
                                        $traveladvisor_opt_array = array(
                                            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_button_text'),
                                            'desc' => '',
                                            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_button_text_hint'),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_attr($traveladvisor_var_multiple_pricetable_btntxt),
                                                'cust_id' => 'traveladvisor_var_multiple_pricetable_btntxt',
                                                'classes' => '',
                                                'cust_name' => 'traveladvisor_var_multiple_pricetable_btntxt[]',
                                                'return' => true,
                                            ),
                                        );
                                        $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                                        $traveladvisor_opt_array = array(
                                            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_button_link'),
                                            'desc' => '',
                                            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_button_link_hint'),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_attr($traveladvisor_var_multiple_pricetable_btnlink),
                                                'cust_id' => 'traveladvisor_var_multiple_pricetable_btnlink',
                                                'classes' => '',
                                                'cust_name' => 'traveladvisor_var_multiple_pricetable_btnlink[]',
                                                'return' => true,
                                            ),
                                        );
                                        $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                                        ?>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="hidden-object">
                            <?php
                            $traveladvisor_opt_array = array(
                                'std' => traveladvisor_allow_special_char($multi_pricetable_num),
                                'id' => '',
                                'before' => '',
                                'after' => '',
                                'classes' => 'fieldCounter',
                                'extra_atr' => '',
                                'cust_id' => '',
                                'cust_name' => 'multi_pricetable_num[]',
                                'return' => false,
                                'required' => false
                            );
                            $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render($traveladvisor_opt_array);
                            ?>
                        </div>
                        <div class="wrapptabbox cs-pbwp-content cs-zero-padding">
                            <div class="opt-conts">
                                <ul class="form-elements">
                                    <li class="to-field"> <a href="#" class="add_servicesss cs-main-btn" onclick="traveladvisor_shortcode_element_ajax_call('pricetable', 'shortcode-item-<?php echo traveladvisor_allow_special_char($traveladvisor_counter); ?>', '<?php echo admin_url('admin-ajax.php'); ?>')"><i class="icon-plus-circle"></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_add_multipricetable'); ?></a> </li>
                                    <div id="loading" class="shortcodeload"></div>
                                </ul>
                                <?php if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') { ?>
                                    <ul class="form-elements insert-bg noborder">
                                        <li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:traveladvisor_shortcode_insert_editor('<?php echo str_replace('traveladvisor_var_page_builder_', '', $name); ?>', 'shortcode-item-<?php echo traveladvisor_allow_special_char($traveladvisor_counter); ?>', '<?php echo traveladvisor_allow_special_char($filter_element); ?>')" ><?php esc_html_e('Insert', 'traveladvisor'); ?></a> </li>
                                    </ul>
                                    <div id="results-shortocde"></div>
                                <?php } else { ?>
                                    <?php
                                    $traveladvisor_opt_array = array(
                                        'std' => 'pricetable',
                                        'id' => '',
                                        'before' => '',
                                        'after' => '',
                                        'classes' => '',
                                        'extra_atr' => '',
                                        'cust_id' => 'traveladvisor_orderby' . $traveladvisor_counter,
                                        'cust_name' => 'traveladvisor_orderby[]',
                                        'return' => false,
                                        'required' => false
                                    );
                                    $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render($traveladvisor_opt_array);
									$traveladvisor_opt_array = array(
                                        'name' => '',
                                        'desc' => '',
                                        'hint_text' => '',
                                        'echo' => true,
                                        'field_params' => array(
                                            'std' => traveladvisor_var_theme_text_srt('traveladvisor_var_shortcode_save'),
                                            'cust_id' => 'multi_pricetable_save' . $traveladvisor_counter,
                                            'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
                                            'cust_type' => 'button',
                                            'classes' => 'cs-traveladvisor-admin-btn',
                                            'cust_name' => 'multi_pricetable_save',
                                            'return' => true,
                                        ),
                                    );
                                    $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
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
        <?php
        if ($die <> 1) {
            die();
        }
    }
    add_action('wp_ajax_traveladvisor_var_page_builder_pricetable', 'traveladvisor_var_page_builder_pricetable');
}