<?php
/*
 *
 * @File : Gallery 
 * @retrun
 *
 */

if (!function_exists('traveladvisor_var_page_builder_gallery')) {

    function traveladvisor_var_page_builder_gallery($die = 0) {
        global $post, $traveladvisor_node, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields,$traveladvisor_var_static_text;
        
            $strings = new traveladvisor_plugin_all_strings;
        $strings->traveladvisor_plugin_activation_strings();
        
        if (function_exists('traveladvisor_shortcode_names')) {
            $shortcode_element = '';
            $filter_element = 'filterdrag';
            $shortcode_view = '';
            $traveladvisor_output = array();
            $TRAVELADVISOR_PREFIX = 'traveladvisor_gallery';
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
                'traveladvisor_var_gallery_element_title' => '',
                'traveladvisor_var_gallery_view' => '',
                'traveladvisor_var_gallery_category' => '',
                'traveladvisor_var_gallery_paging_uniqe_style' => '',
                'traveladvisor_var_gallery_custom_post' => '',
                'traveladvisor_var_gallery_paging_filter_style' => '',
                'traveladvisor_var_gallery_item_per_page' => '',
                'traveladvisor_var_gallery_column' => '',
                'traveladvisor_var_gallery_excerpt' => '',
            );
            if (isset($traveladvisor_output['0']['atts'])) {
                $atts = $traveladvisor_output['0']['atts'];
            } else {
                $atts = array();
            }
            if (isset($traveladvisor_output['0']['content'])) {
                $gallery_column_text = $traveladvisor_output['0']['content'];
            } else {
                $gallery_column_text = '';
            }
            $gallery_element_size = '25';
            foreach ($defaults as $key => $values) {
                if (isset($atts[$key])) {
                    $$key = $atts[$key];
                } else {
                    $$key = $values;
                }
            }
            $name = 'traveladvisor_var_page_builder_gallery';
            $coloumn_class = 'column_' . $gallery_element_size;
            if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
                $shortcode_element = 'shortcode_element_class';
                $shortcode_view = 'cs-pbwp-shortcode';
                $filter_element = 'ajax-drag';
                $coloumn_class = '';
            }
            if (isset($traveladvisor_var_gallery_view) && $traveladvisor_var_gallery_view == "slider") {

                $traveladvisor_var_slider = "block";
            } else {
                $traveladvisor_var_slider = "none";
            }

            if (isset($traveladvisor_var_gallery_view) && $traveladvisor_var_gallery_view != "slider") {

                $traveladvisor_var_gallery_cate_view = "block";
            } else {
                $traveladvisor_var_gallery_cate_view = "none";
            }
            ?>
            <div id="<?php echo esc_attr($name . $traveladvisor_counter) ?>_del" class="column  parentdelete <?php echo esc_attr($coloumn_class); ?>
                 <?php echo esc_attr($shortcode_view); ?>" item="gallery" data="<?php echo traveladvisor_element_size_data_array_index($gallery_element_size) ?>" >
                     <?php traveladvisor_element_setting($name, $traveladvisor_counter, $gallery_element_size) ?>
                <div class="cs-wrapp-class-<?php echo intval($traveladvisor_counter) ?>
                     <?php echo esc_attr($shortcode_element); ?>" id="<?php echo esc_attr($name . $traveladvisor_counter) ?>" data-shortcode-template="[traveladvisor_gallery {{attributes}}]{{content}}[/traveladvisor_gallery]" style="display: none;">
                    <div class="cs-heading-area" data-counter="<?php echo esc_attr($traveladvisor_counter) ?>">
                        <h5><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_edit_gallery_option');  ?></h5>
                        <a href="javascript:traveladvisor_frame_removeoverlay('<?php echo esc_js($name . $traveladvisor_counter) ?>','<?php echo esc_js($filter_element); ?>')" class="cs-btnclose">
                            <i class="icon-times"></i>
                        </a>
                    </div> 
                    <script type="text/javascript">
                        function traveladvisor_var_gallery_view(val) {
                            var traveladvisor_var_gallery_view = jQuery('.gallery_slider_view').val();
                            if (traveladvisor_var_gallery_view == 'slider') {
                                jQuery('#slider_gallery').show();
                                jQuery('#slider_gallery').show();
                                jQuery('.slider_view_paging').hide();
                                jQuery('#slider_category').hide();
                                jQuery('.slider_view_paging_unique').hide();
                            } else if (traveladvisor_var_gallery_view == 'unique_gallery') {
                                jQuery('.slider_view_paging_unique').show();
                                jQuery('.slider_view_paging_style').hide();
                            } else {
                                jQuery('#slider_gallery').hide();
                                jQuery('.slider_view_paging_unique').hide();
                                jQuery('.slider_view_paging').show();
                                jQuery('#slider_category').show();
                                jQuery('#slider_category_column').hide();
                            }
                        }
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
                    <div class="cs-pbwp-content">
                        <div class="cs-wrapp-clone cs-shortcode-wrapp">
                            <?php
                            if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
                                traveladvisor_shortcode_element_size();
                            }

                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_title') ,
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_enter_gallery_title'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr($traveladvisor_var_gallery_element_title),
                                    'cust_id' => 'traveladvisor_var_gallery_element_title' . $traveladvisor_counter,
                                    'classes' => '',
                                    'cust_name' => 'traveladvisor_var_gallery_element_title[]',
                                    'return' => true,
                                ),
                            );

                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);

                             
                            $traveladvisor_opt_array = array(
                                'name' =>traveladvisor_var_theme_text_srt('traveladvisor_var_gallery_views'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_gallery_views_hint'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_html($traveladvisor_var_gallery_view),
                                    'cust_id' => 'traveladvisor_var_gallery_view' . $traveladvisor_counter,
                                    'cust_name' => 'traveladvisor_var_gallery_view[]',
                                    'classes' => 'dropdown chosen-select gallery_slider_view',
                                    'extra_atr' => 'onchange="traveladvisor_var_gallery_view(this)"',
                                    'options' => array(
                                        '' => traveladvisor_var_theme_text_srt('traveladvisor_var_please_select_view'),
                                        'default_gallery' =>  traveladvisor_var_theme_text_srt('traveladvisor_var_default'),
                                        'famous_gallery' => traveladvisor_var_theme_text_srt('traveladvisor_var_famous'),
                                        'masonry_gallery' => traveladvisor_var_theme_text_srt('traveladvisor_var_masonary'),
                                        'slider' => traveladvisor_var_theme_text_srt('traveladvisor_var_slider'),
                                        'unique_gallery' => traveladvisor_var_theme_text_srt('traveladvisor_var_unique'),
                                    ),
                                    'return' => true,
                                ),
                            );
                         
                            if ($traveladvisor_var_gallery_view == "slider") {
                                $traveladvisor_var_gallery_cate_view = 'block';
                                $traveladvisor_var_slider = 'none';
                            } elseif ($traveladvisor_var_gallery_view != "slider") {
                                $traveladvisor_var_gallery_cate_view = 'none';
                                $traveladvisor_var_slider = 'block';
                            } elseif ($traveladvisor_var_gallery_view == "unique_gallery") {
                                $traveladvisor_var_slider = 'none';
                            } else {
                                $traveladvisor_var_gallery_cate_view = 'block';
                                $traveladvisor_var_slider = 'none';
                            }


                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_select_column'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_select_column_view_from_this_dropdown'),
                                'echo' => true,
                                'extra_att' => ' id="slider_category_column" style="display:' . esc_html($traveladvisor_var_slider) . ';"',
                                'field_params' => array(
                                    'std' => esc_html($traveladvisor_var_gallery_column),
                                    'cust_id' => 'traveladvisor_var_gallery_column' . $traveladvisor_counter,
                                    'cust_name' => 'traveladvisor_var_gallery_column[]',
                                    'classes' => 'dropdown chosen-select',
                                    'options' => array(
                                        '' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_please_select'),
                                        '1' => traveladvisor_var_theme_text_srt('traveladvisor_var_one_column'),
                                        '2' => traveladvisor_var_theme_text_srt('traveladvisor_var_two_column'),
                                        '3' => traveladvisor_var_theme_text_srt('traveladvisor_var_three_column'),
                                        '4' => traveladvisor_var_theme_text_srt('traveladvisor_var_four_column'),
                                        '6' => traveladvisor_var_theme_text_srt('traveladvisor_var_five_column'),
                                    ),
                                    'return' => true,
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);


                            $traveladvisor_var_options = array();
                            $traveladvisor_var_options = traveladvisor_var_show_all_cats('', '', $traveladvisor_var_gallery_category, "gallery-category", true);
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_choose_category'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_select_category_to_show'),
                                'echo' => true,
                                'extra_att' => ' id="slider_category" style="display:' . esc_html($traveladvisor_var_slider) . ';"',
                                'field_params' => array(
                                    'std' => esc_html($traveladvisor_var_gallery_category),
                                    'id' => '',
                                    'cust_name' => 'traveladvisor_var_gallery_category[]',
                                    'classes' => 'dropdown chosen-select',
                                    'options' => $traveladvisor_var_options,
                                    'return' => true,
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
                            $traveladvisor_var_unique_view = '';
                            $traveladvisor_var_galler_style_view = '';
                            $traveladvisor_var_slider = '';
                            if ($traveladvisor_var_gallery_view == "unique_gallery") {
                                $traveladvisor_var_unique_view = 'block';
                                $traveladvisor_var_slider = "none";
                            } elseif ($traveladvisor_var_gallery_view == "slider") {
                                $traveladvisor_var_galler_style_view = "none";
                            } elseif ($traveladvisor_var_gallery_view != "slider") {
                                $traveladvisor_var_galler_style_view = "block";
                            } else {
                                $traveladvisor_var_unique_view = 'none';
                                $traveladvisor_var_slider = "block";
                            }
                            $traveladvisor_var_post_post_option = array();
                            $traveladvisor_var_post_post_option = traveladvisor_var_show_all_custom_post();
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_choose_gallery'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_choose_gallery_hint'),
                                'echo' => true,
                                'extra_att' => ' id="slider_gallery" style="display:' . esc_html($traveladvisor_var_gallery_cate_view) . ';"',
                                'classes' => 'gallery_slider',
                                'field_params' => array(
                                    'std' => esc_html($traveladvisor_var_gallery_custom_post),
                                    'id' => '',
                                    'cust_name' => 'traveladvisor_var_gallery_custom_post[]',
                                    'classes' => 'dropdown chosen-select',
                                    'options' => $traveladvisor_var_post_post_option,
                                    'return' => true,
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);

                            $traveladvisor_opt_array = array(
                                'name' =>traveladvisor_var_theme_text_srt('traveladvisor_var_paging_style'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_select_paging_view_from_this_dropdown'),
                                'echo' => true,
                                'extra_att' => ' class="slider_view_paging_style slider_view_paging form-elements" style="display:' . esc_html($traveladvisor_var_slider) . ';"',
                                'field_params' => array(
                                    'std' => esc_html($traveladvisor_var_gallery_paging_filter_style),
                                    'cust_id' => 'traveladvisor_var_gallery_paging_filter_style' . $traveladvisor_counter,
                                    'cust_name' => 'traveladvisor_var_gallery_paging_filter_style[]',
                                    'classes' => 'dropdown chosen-select',
                                    'options' => array(
                                        '' => traveladvisor_var_theme_text_srt('traveladvisor_var_please_select'),
                                        'single_page' => traveladvisor_var_theme_text_srt('traveladvisor_var_all_records'),
                                        'pagination' => traveladvisor_var_theme_text_srt('traveladvisor_var_pagination'),
                                    ),
                                    'return' => true,
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_gallery_per_page'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_gallery_per_page_hint'),
                                'echo' => true,
                                'extra_att' => 'class="slider_view_paging slider_view_paging_unique form-elements" style="display:' . esc_html($traveladvisor_var_galler_style_view) . ';"',
                                'field_params' => array(
                                    'std' => esc_attr($traveladvisor_var_gallery_item_per_page),
                                    'cust_id' => 'traveladvisor_var_gallery_item_per_page' . $traveladvisor_counter,
                                    'classes' => '',
                                    'cust_name' => 'traveladvisor_var_gallery_item_per_page[]',
                                    'return' => true,
                                ),
                            );

                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                            ?>
                        </div>
                        <?php if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') { ?>
                            <ul class="form-elements insert-bg">
                                <li class="to-field">
                                    <a class="insert-btn cs-main-btn" onclick="javascript:traveladvisor_shortcode_insert_editor('<?php echo str_replace('traveladvisor_var_page_builder_', '', $name); ?>', '<?php echo esc_js($name . $traveladvisor_counter) ?>', '<?php echo esc_js($filter_element); ?>')" ><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_insert'); ?></a>
                                </li>
                            </ul>
                            <div id="results-shortocde"></div>
                        <?php } else { ?>

                            <?php
                            $traveladvisor_opt_array = array(
                                'std' => 'gallery',
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
                                    'std' => 'Save',
                                    'cust_id' => 'gallery_save' . $traveladvisor_counter,
                                    'cust_type' => 'button',
                                    'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
                                    'classes' => 'cs-traveladvisor-admin-btn',
                                    'cust_name' => 'gallery_save',
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

    add_action('wp_ajax_traveladvisor_var_page_builder_gallery', 'traveladvisor_var_page_builder_gallery');
}
 