<?php
/**
 * Core Functions of Plugin
 * @return
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
if (!function_exists('traveladvisor_column_pb')) {
    function traveladvisor_column_pb($die = 0, $shortcode = '') {
        global $post, $traveladvisor_node, $traveladvisor_xmlObject, $traveladvisor_count_node, $column_container, $coloum_width, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields;
        $strings = new traveladvisor_frame_plugin_all_strings;
        $strings->traveladvisor_plugin_activation_strings();
        $total_widget = 0;
        $i = 1;
        $traveladvisor_page_section_title = $traveladvisor_page_section_height = $traveladvisor_page_section_width = '';
        $traveladvisor_section_background_option = '';
        $traveladvisor_section_title_align_option = '';
        $traveladvisor_var_section_title = '';
        $traveladvisor_var_section_subtitle = '';
        $traveladvisor_section_bg_image = '';
        $traveladvisor_section_bg_image_position = '';
        $traveladvisor_section_bg_image_repeat = '';
        $traveladvisor_section_parallax = '';
        $traveladvisor_section_slick_slider = '';
        $traveladvisor_section_custom_slider = '';
        $traveladvisor_section_video_url = '';
        $traveladvisor_section_video_mute = '';
        $traveladvisor_section_video_autoplay = '';
        $traveladvisor_section_border_bottom = '0';
        $traveladvisor_section_border_top = '0';
        $traveladvisor_section_border_color = '#e0e0e0';
        $traveladvisor_section_title_color = '';
        $traveladvisor_section_sub_title_color = '';
        $traveladvisor_section_padding_top = '0';
        $traveladvisor_section_padding_bottom = '0';
        $traveladvisor_section_margin_top = '0';
        $traveladvisor_section_margin_bottom = '0';
        $traveladvisor_section_css_id = '';
        $traveladvisor_section_view = 'container';
        $traveladvisor_layout = '';
        $traveladvisor_sidebar_left = '';
        $traveladvisor_sidebar_right = '';
        $traveladvisor_section_bg_color = '';
        if (isset($column_container)) {
            $column_attributes = $column_container->attributes();
            $column_class = $column_attributes->class;
            $traveladvisor_var_section_title = $column_attributes->traveladvisor_var_section_title;
            $traveladvisor_var_section_subtitle = $column_attributes->traveladvisor_var_section_subtitle;
            $traveladvisor_section_background_option = $column_attributes->traveladvisor_section_background_option;
            $traveladvisor_section_title_align_option = $column_attributes->traveladvisor_section_title_align_option;
            $traveladvisor_section_bg_image = $column_attributes->traveladvisor_section_bg_image;
            $traveladvisor_section_bg_image_position = $column_attributes->traveladvisor_section_bg_image_position;
            $traveladvisor_section_bg_image_repeat = $column_attributes->traveladvisor_section_bg_image_repeat;
            $traveladvisor_section_slick_slider = $column_attributes->traveladvisor_section_slick_slider;
            $traveladvisor_section_custom_slider = $column_attributes->traveladvisor_section_custom_slider;
            $traveladvisor_section_video_url = $column_attributes->traveladvisor_section_video_url;
            $traveladvisor_section_video_mute = $column_attributes->traveladvisor_section_video_mute;
            $traveladvisor_section_video_autoplay = $column_attributes->traveladvisor_section_video_autoplay;
            $traveladvisor_section_bg_color = $column_attributes->traveladvisor_section_bg_color;
            $traveladvisor_section_parallax = $column_attributes->traveladvisor_section_parallax;
            $traveladvisor_section_padding_top = $column_attributes->traveladvisor_section_padding_top;
            $traveladvisor_section_padding_bottom = $column_attributes->traveladvisor_section_padding_bottom;
            $traveladvisor_section_border_bottom = $column_attributes->traveladvisor_section_border_bottom;
            $traveladvisor_section_border_top = $column_attributes->traveladvisor_section_border_top;
            $traveladvisor_section_border_color = $column_attributes->traveladvisor_section_border_color;
            $traveladvisor_section_title_color = $column_attributes->traveladvisor_section_title_color;
            $traveladvisor_section_sub_title_color = $column_attributes->traveladvisor_section_sub_title_color;
            $traveladvisor_section_margin_top = $column_attributes->traveladvisor_section_margin_top;
            $traveladvisor_section_margin_bottom = $column_attributes->traveladvisor_section_margin_bottom;
            $traveladvisor_section_css_id = $column_attributes->traveladvisor_section_css_id;
            $traveladvisor_section_view = $column_attributes->traveladvisor_section_view;
            $traveladvisor_layout = $column_attributes->traveladvisor_layout;
            $traveladvisor_sidebar_left = $column_attributes->traveladvisor_sidebar_left;
            $traveladvisor_sidebar_right = $column_attributes->traveladvisor_sidebar_right;
        }
        $style = '';
        if (isset($_POST['action'])) {
            $name = $_POST['action'];
            $traveladvisor_counter = $_POST['counter'];
            $total_column = $_POST['total_column'];
            $column_class = $_POST['column_class'];
            $postID = $_POST['postID'];
            $randomno = rand(12345678, 93242432);
            $rand = rand(12345678, 93242432);
            $style = '';
        } else {
            $postID = $post->ID;
            $name = '';
            $traveladvisor_counter = '';
            $total_column = 0;
            $rand = rand(1, 999);
            $randomno = rand(34, 3242432);
            $name = $_REQUEST['action'];
            $style = ' style="display:none;"';
        }
        $traveladvisor_page_elements_name = traveladvisor_shortcode_names();
        $traveladvisor_page_categories_name = traveladvisor_elements_categories();
        ?>
        <div class="cs-page-composer composer-<?php echo absint($rand) ?>" id="composer-<?php echo absint($rand) ?>" style="display:none">
            <div class="page-elements">
                <div class="cs-heading-area">

                    <h5> <i class="icon-plus-circle"></i> <?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_add_element'); ?>  </h5>
                    <span class='cs-btnclose' onclick='javascript:traveladvisor_frame_removeoverlay("composer-<?php echo absint($rand) ?>", "append")'><i class="icon-times"></i></span> 
                </div>
                <script>
                    jQuery(document).ready(function ($) {
                        'use strict';
                        traveladvisor_page_composer_filterable('<?php echo absint($rand) ?>');
                    });
                </script>
                <div class="cs-filter-content">
                    <p>
                        <?php
                        //function for including js file for page builder add element
                        $traveladvisor_opt_array = array(
                            'std' => '',
                            'cust_id' => 'quicksearch' . absint($rand),
                            'classes' => '',
                            'cust_name' => '',
                            'extra_atr' => ' placeholder=' . traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_search'),
                        );
                        $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($traveladvisor_opt_array);
                        ?>
                    </p>
                    <div class="cs-filtermenu-wrap">
                        <h6><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_filter_by'); ?></h6>
                        <ul class="cs-filter-menu" id="filters<?php echo absint($rand) ?>">
                            <li data-filter="all" class="active"><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_show_all'); ?></li>
                            <?php foreach ($traveladvisor_page_categories_name as $key => $value) { ?>
                                <li data-filter="<?php echo esc_attr($key); ?>"><?php echo esc_attr($value); ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="cs-filter-inner" id="page_element_container<?php echo absint($rand) ?>">
                        <?php foreach ($traveladvisor_page_elements_name as $key => $value) { ?>
                            <div class="element-item <?php echo esc_attr($value['categories']); ?>"> 
                                <a href='javascript:traveladvisor_frame_ajax_widget("traveladvisor_var_page_builder_<?php echo esc_js($value['name']); ?>","<?php echo esc_js($rand) ?>")'>
                                    <?php traveladvisor_page_composer_elements($value['title'], $value['icon']); ?>
                                </a> 
                            </div>
                        <?php } ?>                    
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (isset($shortcode) && $shortcode <> '') {
            ?>
            <a class="button" href="javascript:traveladvisor_frame_createpop('composer-<?php echo esc_js($rand) ?>', 'filter')"><i class="icon-plus-circle"></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_insert_shortcode'); ?> </a>
            <?php
        } else {
            ?>
            <div id="<?php echo esc_attr($randomno); ?>_del" class="column columnmain parentdeletesection column_100" >
                <div class="column-in"> <a class="button" href="javascript:traveladvisor_frame_createpop('composer-<?php echo esc_js($rand) ?>', 'filter')"><i class="icon-plus-circle"></i> <?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_add_element'); ?></a>
                    <p> 
                        <a href="javascript:traveladvisor_frame_createpop('<?php echo esc_js($column_class . $randomno); ?>','filterdrag')" class="options">
                            <i class="icon-gear"></i></a> &nbsp; <a href="#" class="delete-it btndeleteitsection"><i class="icon-trash-o"></i></a> &nbsp; 
                    </p>
                </div>
                <div class="column column_container page_section <?php echo sanitize_html_class($column_class); ?>" >
                    <?php
                    $parts = explode('_', $column_class);
                    if ($total_column > 0) {
                        for ($i = 1; $i <= $total_column; $i++) {
                            ?>
                            <div class="dragarea" data-item-width="col_width_<?php echo esc_attr($parts[$i]); ?>">
                                <?php
                                $traveladvisor_opt_array = array(
                                    'std' => '0',
                                    'cust_id' => '',
                                    'classes' => 'textfld',
                                    'cust_name' => 'total_widget[]',
                                    'extra_atr' => '',
                                );
                                $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render($traveladvisor_opt_array);
                                ?>
                                <div class="draginner" id="counter_<?php echo absint($rand) ?>"></div>
                            </div>
                            <?php
                        }
                    }
                    $i = 1;
                    if (isset($column_container)) {
                        global $wpdb;
                        $total_column = count($column_container->children());
                        $section = 0;
                        $section_widget_element_num = 0;
                        foreach ($column_container->children() as $column) {
                            $section++;
                            $total_widget = count($column->children());
                            ?>
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
                            </script>
                            <div class="dragarea" data-item-width="col_width_<?php echo esc_attr($parts[$i]) ?>">
                                <div class="toparea">
                                    <?php
                                    $traveladvisor_opt_array = array(
                                        'std' => esc_attr($total_widget),
                                        'cust_id' => '',
                                        'classes' => 'textfld page-element-total-widget',
                                        'cust_name' => 'total_widget[]',
                                        'extra_atr' => '',
                                    );
                                    $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render($traveladvisor_opt_array);
                                    ?>
                                </div>
                                <div class="draginner" id="counter_<?php echo absint($rand) ?>">
                                    <?php
                                    $shortcode_element = '';
                                    $filter_element = 'filterdrag';
                                    $shortcode_view = '';
                                    $global_array = array();
                                    $section_widget__element = 0;
                                    foreach ($column->children() as $traveladvisor_node) {
                                        $section_widget__element++;
                                        $shortcode_element_idd = $rand . '_' . $section_widget__element;
                                        $global_array[] = $traveladvisor_node;
                                        $traveladvisor_count_node++;
                                        $traveladvisor_counter = $postID . $traveladvisor_count_node;
                                        $a = $name = "traveladvisor_var_page_builder_" . $traveladvisor_node->getName();
                                        $coloumn_class = 'column_' . $traveladvisor_node->page_element_size;
                                        $type = '';
                                        if ($traveladvisor_node->getName() == 'page_element') {
                                            $type = 'page_element';
                                        }
                                        ?>
                                        <div id="<?php echo esc_attr($name . $traveladvisor_counter); ?>_del" class="column  parentdelete  <?php echo esc_attr($coloumn_class); ?> <?php echo esc_attr($shortcode_view); ?>" item="<?php echo esc_attr($traveladvisor_node->getName()); ?>" data="<?php echo traveladvisor_element_size_data_array_index($traveladvisor_node->page_element_size) ?>" >
                                            <?php traveladvisor_ajax_element_setting($traveladvisor_node->getName(), $traveladvisor_counter, $traveladvisor_node->page_element_size, $shortcode_element_idd, $postID, $element_description = '', $traveladvisor_node->getName() . '-icon', $type); ?>
                                            <div class="cs-wrapp-class-<?php echo esc_attr($traveladvisor_counter) ?> <?php echo esc_attr($shortcode_element); ?>" id="<?php echo esc_attr($name . $traveladvisor_counter) ?>" style="display: none;">
                                                <div class="cs-heading-area">
                                                    <?php
                                                    $shortcode_name = '';
                                                    if ($traveladvisor_node->getName() == 'quick_slider') {
                                                        $shortcode_name = __("quick Quote", "cs-frame");
                                                    } else {
                                                        $shortcode_name = str_replace("_", " ", $traveladvisor_node->getName());
                                                    }
                                                    ?>
                                                    <h5><?php echo esc_html($shortcode_name).'&nbsp'; echo sprintf(traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_options'), esc_html($shortcode_name)) ?></h5>

                                                    <a href="javascript:;" onclick="javascript:traveladvisor_frame_removeoverlay('<?php echo esc_attr($name . $traveladvisor_counter); ?>', '<?php echo esc_attr($filter_element); ?>')" class="cs-btnclose"><i class="icon-times"></i></a>
                                                </div>
                                                <?php
                                                $traveladvisor_opt_array = array(
                                                    'std' => 'shortcode',
                                                    'cust_id' => 'shortcode_' . $name . $traveladvisor_counter,
                                                    'classes' => 'cs-wiget-element-type',
                                                    'cust_name' => 'traveladvisor_widget_element_num[]',
                                                    'extra_atr' => '',
                                                );
                                                $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render($traveladvisor_opt_array);
                                                ?>
                                                <div class="pagebuilder-data-load">
                                                    <?php
                                                    $traveladvisor_opt_array = array(
                                                        'std' => $traveladvisor_node->getName(),
                                                        'cust_id' => '',
                                                        'classes' => '',
                                                        'cust_name' => 'traveladvisor_orderby[]',
                                                        'extra_atr' => '',
                                                    );
                                                    $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render($traveladvisor_opt_array);
                                                    $traveladvisor_opt_array = array(
                                                        'std' => htmlspecialchars_decode($traveladvisor_node->traveladvisor_shortcode),
                                                        'cust_id' => '',
                                                        'classes' => 'cs-textarea-val',
                                                        'cust_name' => 'shortcode[' . $traveladvisor_node->getName() . '][]',
                                                        'extra_atr' => ' style=display:none;',
                                                    );
                                                    $traveladvisor_var_form_fields->traveladvisor_var_form_textarea_render($traveladvisor_opt_array);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                            $i++;
                        }
                    }
                    ?>
                </div>
                <div id="<?php echo esc_attr($column_class . $randomno); ?>" style="display:none">
                    <div class="cs-heading-area">
                        <h5><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_edit_page_section'); ?></h5>
                        <a href="javascript:traveladvisor_frame_removeoverlay('<?php echo esc_js($column_class . $randomno); ?>','filterdrag')" class="cs-btnclose"><i class="icon-times"></i></a> </div>
                    <div class="cs-pbwp-content">
                        <div class="cs-wrapp-clone cs-shortcode-wrapp">
                            <?php
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_title'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_title_hint'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => $traveladvisor_var_section_title,
                                    'id' => 'section_title',
                                    'classes' => '',
                                    'array' => true,
                                    'return' => true,
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);

                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_subtitle'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_subtitle_hint'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => $traveladvisor_var_section_subtitle,
                                    'id' => 'section_subtitle',
                                    'classes' => '',
                                    'array' => true,
                                    'return' => true,
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_title_align'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_title_align_hint'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => $traveladvisor_section_title_align_option,
                                    'id' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'traveladvisor_section_title_align_option[]',
                                    'classes' => 'dropdown chosen-select',
                                    'options' => array(
                                        'align-left' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_left_align'),
                                        'align-right' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_right_align'),
                                        'align-center' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_center_align'),
                                    ),
                                    'return' => true,
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_title_color'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_title_color_hint'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr($traveladvisor_section_title_color),
                                    'cust_id' => '',
                                    'classes' => 'bg_color',
                                    'cust_name' => 'traveladvisor_section_title_color[]',
                                    'return' => true,
                                ),
                            );

                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);      
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_sub_title_color'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_sub_title_color_hint'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr($traveladvisor_section_sub_title_color),
                                    'cust_id' => '',
                                    'classes' => 'bg_color',
                                    'cust_name' => 'traveladvisor_section_sub_title_color[]',
                                    'return' => true,
                                ),
                            );

                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_background_view'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_background_view_hint'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => $traveladvisor_section_background_option,
                                    'id' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'traveladvisor_section_background_option[]',
                                    'classes' => 'dropdown chosen-select',
                                    'options' => array(
                                        'no-image' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_none'),
                                        'section-custom-background-image' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_background_image'),
                                        'section-custom-slider' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_custom_slider'),
                                        'section_background_video' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_video'),
                                    ),
                                    'return' => true,
                                    'extra_atr' => 'onchange="javascript:traveladvisor_section_background_settings_toggle(this.value, ' . absint($randomno) . ')"',
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
                            ?>    
                            <div class="meta-body noborder section-custom-background-image-<?php echo esc_attr($randomno); ?>" style=" <?php
                            if ($traveladvisor_section_background_option == "section-custom-background-image") {
                                echo "display:block";
                            } else
                                echo "display:none";
                            ?>">
                                     <?php
                                     $traveladvisor_opt_array = array(
                                         'std' => $traveladvisor_section_bg_image,
                                         'id' => 'section_bg_image',
                                         'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_background_image'),
                                         'desc' => '',
                                         'force_std' => true,
                                         'echo' => true,
                                         'array' => true,
                                         'field_params' => array(
                                             'std' => $traveladvisor_section_bg_image,
                                             'cust_id' => '',
                                             'id' => 'section_bg_image',
                                             'force_std' => true,
                                             'return' => true,
                                             'array' => true,
                                             'array_txt' => false,
                                         ),
                                     );
                                     $traveladvisor_var_html_fields->traveladvisor_var_upload_file_field($traveladvisor_opt_array);
                                     $traveladvisor_opt_array = array(
                                         'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_background_image_position'),
                                         'desc' => '',
                                         'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_background_image_position_hint'),
                                         'echo' => true,
                                         'field_params' => array(
                                             'std' => $traveladvisor_section_bg_image_position,
                                             'id' => '',
                                             'cust_id' => '',
                                             'cust_name' => 'traveladvisor_section_bg_image_position[]',
                                             'classes' => 'dropdown chosen-select',
                                             'options' => array(
                                                 'no-repeat center top' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_nr_center_top'),
                                                 'repeat center top' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_r_center_top'),
                                                 'no-repeat center' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_nr_center'),
                                                 'no-repeat center / cover' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_nr_center_cover'),
                                                 'repeat center' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_r_center'),
                                                 'no-repeat left top' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_nr_left_top'),
                                                 'repeat left top' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_r_left_top'),
                                                 'no-repeat fixed center' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_nr_fixed_center'),
                                                 'no-repeat fixed center / cover' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_nr_fixed_center_cover'),
                                             ),
                                             'return' => true,
                                             'extra_atr' => '',
                                         ),
                                     );
                                     $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
                                     ?>    
                            </div>
                            <div class="meta-body noborder section-slider-<?php echo esc_attr($randomno); ?>" style=" <?php
                            if ($traveladvisor_section_background_option == "section-slider") {
                                echo "display:block";
                            } else
                                echo "display:none";
                            ?>">
                            </div>
                            <div class="meta-body noborder section-custom-slider-<?php echo esc_attr($randomno); ?>" style=" <?php
                            if ($traveladvisor_section_background_option == "section-custom-slider") {
                                echo "display:block";
                            } else
                                echo "display:none";
                            ?>" >
                                     <?php
                                     $traveladvisor_opt_array = array(
                                         'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_custom_slider'),
                                         'desc' => '',
                                         'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_custom_slider_hint'),
                                         'echo' => true,
                                         'field_params' => array(
                                             'std' => esc_attr($traveladvisor_section_custom_slider),
                                             'cust_id' => '',
                                             'classes' => 'txtfield',
                                             'cust_name' => 'traveladvisor_section_custom_slider[]',
                                             'return' => true,
                                         ),
                                     );
                                     $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                                     ?>
                            </div>
                            <div class="meta-body noborder section-background-video-<?php echo esc_attr($randomno); ?>" style=" <?php
                            if ($traveladvisor_section_background_option == "section_background_video") {
                                echo "display:block";
                            } else
                                echo "display:none";
                            ?>">
                                <div class="form-elements">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <label><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_video_url'); ?></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                        <div class="input-sec">
                                            <?php
                                            $traveladvisor_opt_array = array(
                                                'std' => esc_url($traveladvisor_section_video_url),
                                                'cust_id' => '',
                                                'id' => 'section_video_url_' . esc_attr($randomno),
                                                'classes' => '',
                                                'cust_name' => 'traveladvisor_section_video_url',
                                                'extra_atr' => '',
                                            );
                                            $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($traveladvisor_opt_array);
                                            ?>
                                            <label class="browse-icon">
                                                <?php
                                                $traveladvisor_opt_array = array(
                                                    'std' => traveladvisor_var_theme_text_srt('traveladvisor_var_browse'),
                                                    'cust_id' => '',
                                                    'cust_type' => 'button',
                                                    'classes' => 'cs-traveladvisor-media left',
                                                    'cust_name' => 'traveladvisor_section_video_url_' . esc_attr($randomno),
                                                    'extra_atr' => '',
                                                );
                                                $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($traveladvisor_opt_array);
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $traveladvisor_opt_array = array(
                                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_enable_mute'),
                                    'desc' => '',
                                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_mute_Selection'),
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => $traveladvisor_section_video_mute,
                                        'id' => '',
                                        'cust_id' => '',
                                        'cust_name' => 'traveladvisor_section_video_mute[]',
                                        'classes' => 'dropdown chosen-select',
                                        'options' => array(
                                            'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_yes'),
                                            'no' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_no'),
                                        ),
                                        'return' => true,
                                        'extra_atr' => '',
                                    ),
                                );
                                $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
                                ?>    
                                <?php
                                $traveladvisor_opt_array = array(
                                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_video_autoplay'),
                                    'desc' => '',
                                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_video_autoplay_hint'),
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => $traveladvisor_section_video_autoplay,
                                        'id' => '',
                                        'cust_id' => '',
                                        'cust_name' => 'traveladvisor_section_video_autoplay[]',
                                        'classes' => 'dropdown chosen-select',
                                        'options' => array(
                                            'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_yes'),
                                            'no' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_no'),
                                        ),
                                        'return' => true,
                                        'extra_atr' => '',
                                    ),
                                );
                                $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
                                ?>      
                            </div>
                            <?php
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_enable_parallax'),
                                'desc' => '',
                                'hint_text' => '',
                                'echo' => true,
                                'field_params' => array(
                                    'std' => $traveladvisor_section_parallax,
                                    'id' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'traveladvisor_section_parallax[]',
                                    'classes' => 'dropdown chosen-select',
                                    'options' => array(
                                        'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_yes'),
                                        'no' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_no'),
                                    ),
                                    'return' => true,
                                    'extra_atr' => '',
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_select_view'),
                                'desc' => '',
                                'hint_text' => '',
                                'echo' => true,
                                'field_params' => array(
                                    'std' => $traveladvisor_section_view,
                                    'id' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'traveladvisor_section_view[]',
                                    'classes' => 'dropdown chosen-select',
                                    'options' => array(
                                        'container' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_box'),
                                        'wide' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_Wide'),
                                    ),
                                    'return' => true,
                                    'extra_atr' => '',
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_page_functions_bg_color'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_bg_color_hint'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr($traveladvisor_section_bg_color),
                                    'cust_id' => '',
                                    'classes' => 'bg_color',
                                    'cust_name' => 'traveladvisor_section_bg_color[]',
                                    'return' => true,
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                            //range
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_padding_top'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_padding_top_hint'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr($traveladvisor_section_padding_top),
                                    'id' => '',
                                    'classes' => 'small',
                                    'extra_atr' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'traveladvisor_section_padding_top[]',
                                    'return' => true,
                                    'required' => false,
                                    'after' => '<span class="traveladvisor_form_px">(px)</span>',
                                ),
                                'return' => true,
                                'extra_atr' => '',
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_padding_bottom'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_padding_bottom_hint'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr($traveladvisor_section_padding_bottom),
                                    'id' => '',
                                    'classes' => '',
                                    'extra_atr' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'traveladvisor_section_padding_bottom[]',
                                    'return' => true,
                                    'required' => false,
                                    'after' => '<span class="traveladvisor_form_px">(px)</span>',
                                ),
                                'return' => true,
                                'extra_atr' => '',
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_margin_top'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_margin_top_hint'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr($traveladvisor_section_margin_top),
                                    'id' => '',
                                    'classes' => '',
                                    'extra_atr' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'traveladvisor_section_margin_top[]',
                                    'return' => true,
                                    'required' => false,
                                    'after' => '<span class="traveladvisor_form_px">(px)</span>',
                                ),
                                'return' => true,
                                'extra_atr' => '',
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_margin_bottom'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_margin_bottom_hint'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr($traveladvisor_section_margin_bottom),
                                    'id' => '',
                                    'classes' => '',
                                    'extra_atr' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'traveladvisor_section_margin_bottom[]',
                                    'return' => true,
                                    'required' => false,
                                    'after' => '<span class="traveladvisor_form_px">(px)</span>',
                                ),
                                'return' => true,
                                'extra_atr' => '',
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_border_top'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_border_top_hint'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => absint($traveladvisor_section_border_top),
                                    'id' => '',
                                    'classes' => '',
                                    'extra_atr' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'traveladvisor_section_border_top[]',
                                    'return' => true,
                                    'required' => false,
                                    'after' => '<span class="traveladvisor_form_px">(px)</span>',
                                ),
                                'return' => true,
                                'extra_atr' => '',
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_border_bottom'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_border_bottom_hint'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => absint($traveladvisor_section_border_bottom),
                                    'id' => '',
                                    'classes' => '',
                                    'extra_atr' => '',
                                    'cust_id' => '',
                                    'cust_name' => 'traveladvisor_section_border_bottom[]',
                                    'return' => true,
                                    'required' => false,
                                    'after' => '<span class="traveladvisor_form_px">(px)</span>',
                                ),
                                'return' => true,
                                'extra_atr' => '',
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_border_color'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_border_color_hint'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr($traveladvisor_section_border_color),
                                    'cust_id' => '',
                                    'classes' => 'bg_color',
                                    'cust_name' => 'traveladvisor_section_border_color[]',
                                    'return' => true,
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                            $choose_id = '';
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_custom_id'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_custom_id_hint'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr($traveladvisor_section_css_id),
                                    'cust_id' => '',
                                    'classes' => 'txtfield',
                                    'cust_name' => 'traveladvisor_section_css_id[]',
                                    'return' => true,
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                            ?>
                            <div class="form-elements elementhiddenn">
                                <ul class="noborder">
                                    <li class="to-label">
                                        <label><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_select_layout'); ?></label>
                                    </li>
                                    <li class="to-field">
                                        <div class="meta-input">
                                            <div class="meta-input pattern">
                                                <div class='radio-image-wrapper'>
                                                    <?php
                                                    $checked = '';
                                                    if ($traveladvisor_layout == "none") {
                                                        $checked = "checked";
                                                    }
                                                    $traveladvisor_opt_array = array(
                                                        'extra_atr' => 'onclick="show_sidebar(\'none\',\'' . esc_js($randomno) . '\')" ' . $checked . '',
                                                        'cust_name' => 'traveladvisor_layout[' . esc_attr($rand) . '][]',
                                                        'cust_id' => 'radio_1' . esc_attr($randomno),
                                                        'classes' => 'radio_traveladvisor_sidebar',
                                                        'std' => 'none',
                                                    );
                                                    $traveladvisor_var_form_fields->traveladvisor_var_form_radio_render($traveladvisor_opt_array);
                                                    ?>
                                                    <label for="radio_1<?php echo esc_attr($randomno) ?>"> 
                                                        <span class="ss"> <img src="<?php echo traveladvisor_var_frame()->plugin_url() . 'assets/images/no_sidebar.png'; ?>"  alt="" />  </span>
                                                        <span  <?php
                                                        if ($traveladvisor_layout == "none") {
                                                            echo "class='check-list'";
                                                        }
                                                        ?> id="check-list"></span> 
                                                    </label>
                                                </div>
                                                <div class='radio-image-wrapper'>
                                                    <?php
                                                    $checked = '';
                                                    if ($traveladvisor_layout == "right") {
                                                        $checked = "checked";
                                                    }
                                                    $traveladvisor_opt_array = array(
                                                        'extra_atr' => 'onclick="show_sidebar(\'right\',\'' . esc_js($randomno) . '\')" ' . $checked . '',
                                                        'cust_name' => 'traveladvisor_layout[' . esc_attr($rand) . '][]',
                                                        'cust_id' => 'radio_2' . esc_attr($randomno),
                                                        'classes' => 'radio_traveladvisor_sidebar',
                                                        'std' => 'right',
                                                    );
                                                    $traveladvisor_var_form_fields->traveladvisor_var_form_radio_render($traveladvisor_opt_array);
                                                    ?>

                                                    <label for="radio_2<?php echo esc_attr($randomno) ?>"> 
                                                        <span class="ss"><img src="<?php echo traveladvisor_var_frame()->plugin_url() . 'assets/images/sidebar_right.png'; ?>" alt="" /></span> 
                                                        <span <?php
                                                        if ($traveladvisor_layout == "right") {
                                                            echo "class='check-list'";
                                                        }
                                                        ?> id="check-list"></span> 
                                                    </label>
                                                </div>
                                                <div class='radio-image-wrapper'>

                                                    <?php
                                                    $checked = '';
                                                    if ($traveladvisor_layout == "left") {
                                                        $checked = "checked";
                                                    }
                                                    $traveladvisor_opt_array = array(
                                                        'extra_atr' => 'onclick="show_sidebar(\'left\',\'' . esc_js($randomno) . '\')" ' . $checked . '',
                                                        'cust_name' => 'traveladvisor_layout[' . esc_attr($rand) . '][]',
                                                        'cust_id' => 'radio_3' . esc_attr($randomno),
                                                        'classes' => 'radio_traveladvisor_sidebar',
                                                        'std' => 'left',
                                                    );
                                                    $traveladvisor_var_form_fields->traveladvisor_var_form_radio_render($traveladvisor_opt_array);
                                                    ?>
                                                    <label for="radio_3<?php echo esc_attr($randomno); ?>">
                                                        <span class="ss">
                                                            <img src="<?php echo traveladvisor_var_frame()->plugin_url() . 'assets/images/sidebar_left.png'; ?>" alt="" /></span> <span <?php
                                                        if ($traveladvisor_layout == "left") {
                                                            echo "class='check-list'";
                                                        }
                                                        ?> id="check-list">
                                                        </span> 
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <?php
                                $display = 'none';
                                if ($traveladvisor_layout == "left") {
                                    $display = "block";
                                }
                                global $wpdb, $traveladvisor_var_options;
                                $a_option = array();
                                if (isset($traveladvisor_var_options['traveladvisor_var_sidebar']) && count($traveladvisor_var_options['traveladvisor_var_sidebar']) > 0) {
                                    foreach ($traveladvisor_var_options['traveladvisor_var_sidebar'] as $sidebar) {
                                        $a_option[sanitize_title($sidebar)] = esc_html($sidebar);
                                    }
                                }
                                $traveladvisor_opt_array = array(
                                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_select_left_sidebar'),
                                    'desc' => '',
                                    'classes' => 'meta-body',
                                    'styles' => 'display:' . $display,
                                    'extra_atr' => '',
                                    'id' => esc_attr($randomno) . '_sidebar_left',
                                    'hint_text' => '',
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => $traveladvisor_sidebar_left,
                                        'id' => '',
                                        'cust_name' => 'traveladvisor_sidebar_left[]',
                                        'classes' => 'dropdown chosen-select',
                                        'options' => $a_option,
                                        'return' => true,
                                    ),
                                );
                                $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
                                $display = 'none';
                                if ($traveladvisor_layout == "right") {
                                    $display = "block";
                                }
                                $a_option = array();
                                if (isset($traveladvisor_var_options['traveladvisor_var_sidebar']) and count($traveladvisor_var_options['traveladvisor_var_sidebar']) > 0) {
                                    foreach ($traveladvisor_var_options['traveladvisor_var_sidebar'] as $sidebar) {
                                        $a_option[sanitize_title($sidebar)] = esc_attr($sidebar);
                                    }
                                }
                                $traveladvisor_opt_array = array(
                                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_select_right_sidebar'),
                                    'desc' => '',
                                    'classes' => 'meta-body',
                                    'styles' => 'display:' . $display,
                                    'extra_atr' => '',
                                    'id' => esc_attr($randomno) . '_sidebar_right',
                                    'hint_text' => '',
                                    'echo' => true,
                                    'field_params' => array(
                                        'std' => $traveladvisor_sidebar_right,
                                        'id' => '',
                                        'cust_name' => 'traveladvisor_sidebar_right[]',
                                        'classes' => 'dropdown chosen-select',
                                        'options' => $a_option,
                                        'return' => true,
                                    ),
                                );
                                $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
                                ?>
                            </div>
                            <?php
                            $traveladvisor_opt_array = array(
                                'name' => '',
                                'desc' => '',
                                'hint_text' => '',
                                'echo' => true,
                                'field_params' => array(
                                    'std' => 'Save',
                                    'cust_id' => '',
                                    'cust_type' => 'button',
                                    'classes' => 'cs-admin-btn',
                                    'cust_name' => '',
                                    'extra_atr' => 'onclick="javascript:traveladvisor_frame_removeoverlay(\'' . esc_js($column_class . $randomno) . '\', \'filterdrag\')"',
                                    'return' => true,
                                ),
                            );
                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                            ?>   
                        </div>
                    </div>
                </div>
                <?php
                $traveladvisor_opt_array = array(
                    'std' => esc_attr($rand),
                    'id' => '',
                    'before' => '',
                    'after' => '',
                    'classes' => '',
                    'extra_atr' => '',
                    'cust_id' => '',
                    'cust_name' => 'column_rand_id[]',
                    'required' => false
                );
                $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render($traveladvisor_opt_array);
                $traveladvisor_opt_array = array(
                    'std' => esc_attr($column_class),
                    'id' => '',
                    'before' => '',
                    'after' => '',
                    'classes' => '',
                    'extra_atr' => '',
                    'cust_id' => '',
                    'cust_name' => 'column_class[]',
                    'required' => false
                );
                $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render($traveladvisor_opt_array);
                $traveladvisor_opt_array = array(
                    'std' => esc_attr($total_column),
                    'id' => '',
                    'before' => '',
                    'after' => '',
                    'classes' => '',
                    'extra_atr' => '',
                    'cust_id' => '',
                    'cust_name' => 'total_column[]',
                    'required' => false
                );
                $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render($traveladvisor_opt_array);
                ?>                   
            </div>
            <?php
        }
        if ($die <> 1) {
            die();
        }
    }
    add_action('wp_ajax_traveladvisor_column_pb', 'traveladvisor_column_pb');
}
add_action('media_buttons', 'traveladvisor_shortcode_popup', 11);
if (!function_exists('traveladvisor_shortcode_popup')) {
    function traveladvisor_shortcode_popup($die = 0, $shortcode = 'shortcode') {
        $strings = new traveladvisor_frame_plugin_all_strings;
        $strings->traveladvisor_plugin_activation_strings();
        $i = 1;
        $style = '';
        if (isset($_POST['action'])) {
            $name = $_POST['action'];
            $traveladvisor_counter = $_POST['counter'];
            $rand = $randomno = rand(1345, 9999);
            $style = '';
        } else {
            $name = '';
            $traveladvisor_counter = '';
            $rand = $randomno = rand(1345, 9999);
            if (isset($_REQUEST['action']))
                $name = $_REQUEST['action'];
            $style = 'style="display:none;"';
        }
        $traveladvisor_page_elements_name = array();
        $traveladvisor_page_elements_name = traveladvisor_shortcode_names();
        $traveladvisor_page_categories_name = traveladvisor_elements_categories();
        ?> 
        <div class="cs-page-composer  <?php echo sanitize_html_class($shortcode); ?> composer-<?php echo intval($rand) ?>" id="composer-<?php echo intval($rand) ?>" style="display:none">
            <div class="page-elements">
                <div class="cs-heading-area">
                    <h5>
                        <i class="icon-plus-circle"></i> <?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_add_element'); ?>
                    </h5>
                    <span class='cs-btnclose' onclick='javascript:traveladvisor_frame_removeoverlay("composer-<?php echo esc_js($rand) ?>", "append")'>
                        <i class="icon-times"></i>
                    </span>
                </div>
                <script>
                    jQuery(document).ready(function ($) {
                        traveladvisor_page_composer_filterable('<?php echo esc_js($rand) ?>');
                    });
                </script>
                <div class="cs-filter-content shortcode">
                    <p><input type="text" id="quicksearch<?php echo intval($rand) ?>" placeholder="<?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_search'); ?>" /></p>
                    <div class="cs-filtermenu-wrap">
                        <h6><?php _e('Filter by', 'cs-frame'); ?></h6>
                        <ul class="cs-filter-menu" id="filters<?php echo intval($rand) ?>">
                            <li data-filter="all" class="active"><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_show_all'); ?></li>
                            <?php
                            foreach ($traveladvisor_page_categories_name as $key => $value) {
                                echo '<li data-filter="' . $key . '">' . $value . '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="cs-filter-inner" id="page_element_container<?php echo intval($rand) ?>">
                        <?php
                        foreach ($traveladvisor_page_elements_name as $key => $value) {
                            echo '<div class="element-item ' . $value['categories'] . '">';
                            $icon = isset($value['icon']) ? $value['icon'] : 'accordion-icon';
                            ?>
                            <a href='javascript:traveladvisor_shortocde_selection("<?php echo esc_js($key); ?>","<?php echo admin_url('admin-ajax.php'); ?>","composer-<?php echo intval($rand) ?>")'><?php traveladvisor_page_composer_elements($value['title'], $icon) ?></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="cs-page-composer-shortcode"></div>
        </div>
        <?php
        if (isset($shortcode) && $shortcode <> '') {
            ?>
            <a class="button" href="javascript:traveladvisor_frame_createpop('composer-<?php echo esc_js($rand) ?>', 'filter')">
                <i class="icon-plus-circle"></i> <?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_insert_shortcode'); ?></a>
            <?php
        }
    }
}
if (!function_exists('traveladvisor_var_page_builder_element_sizes')) {

    function traveladvisor_var_page_builder_element_sizes($size = '100') {
        if (isset($size) && $size == '') {
            $element_size = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
        } else {
            $element_size_col = $size;
        }
        if (isset($element_size_col) and $element_size_col == '100' || $element_size_col > 75) {
            $element_size = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
        } else if (isset($element_size_col) and $element_size_col == '75' || $element_size_col > 67) {
            $element_size = 'col-lg-9 col-md-9 col-sm-12 col-xs-12';
        } else if (isset($element_size_col) and $element_size_col == '67' || $element_size_col > 50) {
            $element_size = 'col-lg-8 col-md-8 col-sm-12 col-xs-12';
        } else if (isset($element_size_col) and $element_size_col == '50' || $element_size_col > 33) {
            $element_size = 'col-lg-6 col-md-6 col-sm-12 col-xs-12';
        } else if (isset($element_size_col) and $element_size_col == '33' || $element_size_col > 25) {
            $element_size = 'col-lg-4 col-md-4 col-sm-12 col-xs-12';
        } else if (isset($element_size_col) and $element_size_col == '25' || $element_size_col < 25) {
            $element_size = 'col-lg-3 col-md-3 col-sm-6 col-xs-12';
        }
        return $element_size;
    }
}
if (!function_exists('traveladvisor_shortcode_names')) {

    function traveladvisor_shortcode_names() {
        global $post;
        $strings = new traveladvisor_frame_plugin_all_strings;
        $strings->traveladvisor_plugin_activation_strings();
        $shortcode_array = array(
            'flex_column' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_column'),
                'name' => 'flex_column',
                'icon' => 'icon-columns',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_column_hint'),
            ),
            'quote' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_quote'),
                'name' => 'quote',
                'icon' => ' icon-quote-left',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_quote_hint'),
            ),
            'infobox' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_infobox'),
                'name' => 'infobox',
                'icon' => 'fa icon-info-circle',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_infobox_hint'),
            ),
            'contact_us' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_contact_us'),
                'name' => 'contact_us',
                'icon' => 'icon-building-o',
                'categories' => 'contentblocks',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_contact_us_hint'),
            ),
            'list' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_list'),
                'name' => 'list',
                'icon' => 'icon-navicon',
                'categories' => 'typography misc    ',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_list_hint'),
            ),
            'progress' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_progress_bar'),
                'name' => 'progress',
                'icon' => 'icon-navicon',
                'categories' => 'typography misc    ',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_progress_bar_hint'),
            ),
            'blog' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_blog'),
                'name' => 'blog',
                'icon' => 'icon-newspaper',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_blog_hint'),
            ),
            'map' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_map'),
                'name' => 'map',
                'icon' => 'icon-location2',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_map_hint'),
            ),
            'testimonial' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_testimonial'),
                'name' => 'testimonial',
                'icon' => 'icon-comments-o',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_testimonial_hint'),
            ),
            'accordion' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_accordion'),
                'name' => 'accordion',
                'icon' => 'icon-list-ul',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_accordion_hint'),
            ),
            
            'team' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_multi_team'),
                'name' => 'team',
                'icon' => 'icon-database2',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_multi_team_hint'),
            ),
            'icon_box' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_icon_box'),
                'name' => 'icon_box',
                'icon' => 'icon-database2',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_icon_box_hint'),
            ),
            'video' => array(
                'title' => __('video','cs-frame'),
                'name' => 'video',
                'icon' => 'icon-video2',
                'categories' => 'contentblocks',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_icon_box_hint'),
            ),
            'counters' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_multi_counters'),
                'name' => 'counters',
                'icon' => 'icon-list-ol',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_multi_counters_hint'),
            ),
            'pricetable' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_multi_pricetable'),
                'name' => 'pricetable',
                'icon' => 'fa icon-coin-dollar',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_multi_pricetable_hint'),
            ),
            'clients' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_clients'),
                'name' => 'clients',
                'icon' => 'icon-group',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_clients_hint'),
            ),
            'heading' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_heading'),
                'name' => 'heading',
                'icon' => 'icon-header',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_heading_hint'),
            ),
            'divider' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_divider'),
                'name' => 'divider',
                'icon' => 'fa icon-arrows-v',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_divider_hint'),
            ),
            'image_frame' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_image_frame'),
                'name' => 'image_frame',
                'icon' => 'icon-photo',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_image_frame'),
            ),
            'tabs' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_tabs'),
                'name' => 'tabs',
                'icon' => 'icon-tab',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_tabs_hint'),
            ),
            'tabel' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_table'),
                'name' => 'tabel',
                'icon' => 'icon-table2  ',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_table_hint'),
            ),
            'button' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_button'),
                'name' => 'button',
                'icon' => 'icon-bullseye',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_button_hint'),
            ),
            'toursearch' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_tour_search'),
                'name' => 'toursearch',
                'icon' => 'icon-search3',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_tour_search_hint'),
            ),
            'maintenance' => array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_maintenance'),
                'name' => 'maintenance',
                'icon' => 'icon-gears',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_maintenance_hint'),
            ),
        );
        if (class_exists('wp_traveladvisor')) {
            $shortcode_array['gallery'] = array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_gallery'),
                'name' => 'gallery',
                'icon' => 'icon-photo2',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_gallery_hint'),
            );
            $shortcode_array['destination'] = array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_destination'),
                'name' => 'destination',
                'icon' => 'icon-dial',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_destination_hint'),
            );
            $shortcode_array['tour'] = array(
                'title' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_tours'),
                'name' => 'tour',
                'icon' => 'icon-paper-plane-o',
                'categories' => 'typography',
                //'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_tours_hint'),
            );
        }
        ksort($shortcode_array);
        return $shortcode_array;
    }
}
if (!function_exists('traveladvisor_element_list')) {

    function traveladvisor_element_list() {
        $strings = new traveladvisor_frame_plugin_all_strings;
        $strings->traveladvisor_plugin_activation_strings();

        $element_list = array();
        $element_list['element_list'] = array(
            'flex_column' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_column'),
            'quote' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_quote'),
            'infobox' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_infobox'),
            'contact_us' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_contact_us'),
            'gallery' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_gallery'),
            'destination' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_destination'),
            'tour' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_tours'),
            'tabs' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_tabs'),
            'tabel' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_table'),
            'testimonial' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_testimonial'),
            'accordion' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_accordion'),
            'team' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_multi_team'),
            'icon_box' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_icon_box'),
            'video' => __('video','cs-frame'),
            'pricetable' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_multi_pricetable'),
            'clients' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_clients'),
            'map' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_map'),
            'blog' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_blog'),
            'heading' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_heading'),
            'traveladvisor_heading' => __('traveladvisor Heading', 'cs-frame'),
            'counters' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_multi_counters'),
            'traveladvisor_image_frame' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_image_frame'),
            'button' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_button'),
            'toursearch' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_tour_search'),
            'image_frame' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_image_frame'),
            'maintenance' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_maintenance'),
            'list' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_list'),
            'progress' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_progress_bar'),
            'divider' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_shortcode_divider'),
        );
        return $element_list;
    }

}
/**
 * @Page builder Sorting List
 */
if (!function_exists('traveladvisor_elements_categories')) {

    function traveladvisor_elements_categories() {
        $strings = new traveladvisor_frame_plugin_all_strings;
        $strings->traveladvisor_plugin_activation_strings();
        return array('typography' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_typography'), 'commonelements' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_common_elements'), 'mediaelement' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_media_element'), 'contentblocks' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_content_blocks'), 'loops' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_loops'));
    }

}
/*
 * @Page builder Element (shortcode(s))
 */
if (!function_exists('traveladvisor_page_composer_elements')) {

    function traveladvisor_page_composer_elements($element = '', $icon = '', $description = '') {
        echo '<i class="' . $icon . '"></i><span data-title="' . esc_html($element) . '"> ' . esc_html($element) . '</span>';
    }

}
/**
 * @Section element Size(s)
 *
 * @returm size
 */
if (!function_exists('traveladvisor_element_size_data_array_index')) {

    function traveladvisor_element_size_data_array_index($size) {
        if ($size == "" or $size == 100) {
            return 0;
        } else if ($size == 75) {
            return 1;
        } else if ($size == 67) {
            return 2;
        } else if ($size == 50) {
            return 3;
        } else if ($size == 33) {
            return 4;
        } else if ($size == 25) {
            return 5;
        }
    }

}
if (!function_exists('traveladvisor_element_setting')) {

    function traveladvisor_element_setting($name, $traveladvisor_counter, $element_size, $element_description = '', $page_element_icon = 'icon-star', $type = '') {
        global $traveladvisor_var_form_fields;
        $element_title = str_replace("traveladvisor_var_page_builder_", "", $name);
        $elm_name = str_replace("traveladvisor_var_page_builder_", "", $name);
        $element_list = traveladvisor_element_list();
        ?>
        <div class="column-in">
            <?php
            $traveladvisor_opt_array = array(
                'std' => esc_attr($element_size),
                'id' => '',
                'before' => '',
                'after' => '',
                'classes' => 'item',
                'extra_atr' => '',
                'cust_id' => '',
                'cust_name' => esc_attr($element_title) . '_element_size[]',
                'required' => false
            );
            $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render($traveladvisor_opt_array);
            ?>
            <a href="javascript:;" onclick="javascript:traveladvisor_createpopshort(jQuery(this))" class="options"><i class="icon-gear"></i></a>
            <a href="#" class="delete-it btndeleteit"><i class="icon-trash-o"></i></a> &nbsp;
            <a class="decrement" onclick="javascript:traveladvisor_decrement(this)"><i class="icon-minus3"></i></a> &nbsp; 
            <a class="increment" onclick="javascript:traveladvisor_increment(this)"><i class="icon-plus3"></i></a>
            <?php
            $traveladvisor_page_elements_name = traveladvisor_shortcode_names();
            if ($traveladvisor_page_elements_name[$element_title]['name'] == $element_title) {
                $element_description = isset($traveladvisor_page_elements_name[$elm_name]['desc']) ? $traveladvisor_page_elements_name[$elm_name]['desc'] : '';
                $element_icon = isset($traveladvisor_page_elements_name[$elm_name]['icon']) ? $traveladvisor_page_elements_name[$elm_name]['icon'] : '';
            }
            ?>
            <span>
                <i class="<?php echo esc_html($element_icon); ?>"></i> 
                <strong>
        <?php echo esc_html($element_list['element_list'][$elm_name]); ?></strong><br/>
        <?php echo esc_attr($element_description); ?> 
            </span>
        </div>
        <?php
    }

}
if (!function_exists('traveladvisor_shortcode_element_size')) {

    function traveladvisor_shortcode_element_size($column_size = '') {
        global $traveladvisor_var_html_fields;
        $strings = new traveladvisor_frame_plugin_all_strings;
        $strings->traveladvisor_plugin_activation_strings();
        $traveladvisor_opt_array = array(
            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_element_size'),
            'desc' => '',
            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_element_size_hint'),
            'echo' => true,
            'field_params' => array(
                'std' => $column_size,
                'cust_id' => 'column_size',
                'cust_type' => 'button',
                'classes' => 'column_size  dropdown chosen-select-no-single select-medium',
                'cust_name' => 'traveladvisor_var_column_size[]',
                'extra_atr' => '',
                'options' => array(
                    '1/1' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_element_full_width'),
                    '1/2' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_element_one_half'),
                    '1/3' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_element_one_third'),
                    '2/3' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_element_two_third'),
                    '1/4' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_element_one_fourth'),
                    '3/4' => traveladvisor_var_theme_text_srt('traveladvisor_var_frame_function_element_three_fourth'),
                ),
                'return' => true,
            ),
        );
        $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
    }
}
function traveladvisor_var_short_code($name = '', $function = '') {
    if ($name != '' && $function != '') {
        add_shortcode($name, $function);
    }
}
if (!function_exists('traveladvisor_ajax_element_setting')) {
    function traveladvisor_ajax_element_setting($name, $traveladvisor_counter, $element_size, $shortcode_element_id, $CS_POSTID, $element_description = '', $page_element_icon = '', $type = '') {
        global $traveladvisor_node, $post;
        $element_title = str_replace("traveladvisor_var_page_builder_", "", $name);
        ?>
        <div class="column-in">
            <input type="hidden" name="<?php echo esc_attr($element_title); ?>_element_size[]" class="item" value="<?php echo esc_attr($element_size); ?>" >
            <a href="javascript:;" onclick="javascript:ajax_shortcode_widget_element(jQuery(this), '<?php echo esc_js(admin_url('admin-ajax.php')); ?>', '<?php echo esc_js($CS_POSTID); ?>', '<?php echo esc_js($name); ?>')" class="options"><i class="icon-gear"></i></a><a href="#" class="delete-it btndeleteit"><i class="icon-trash-o"></i></a> &nbsp; <a class="decrement" onclick="javascript:traveladvisor_decrement(this)"><i class="icon-minus3"></i></a> &nbsp; <a class="increment" onclick="javascript:traveladvisor_increment(this)"><i class="icon-plus3"></i></a> 
                    <?php
                    $traveladvisor_page_elements_name = traveladvisor_shortcode_names();
                    if ($traveladvisor_page_elements_name[$element_title]['name'] == $element_title) {
                        $element_description = isset($traveladvisor_page_elements_name[$element_title]['desc']) ? $traveladvisor_page_elements_name[$element_title]['desc'] : '';
                        $element_icon = isset($traveladvisor_page_elements_name[$element_title]['icon']) ? $traveladvisor_page_elements_name[$element_title]['icon'] : '';
                    }
                    ?>
            <span>
                <i class="<?php echo esc_html($element_icon); ?>"></i> 
                <strong>
        <?php
        if ($traveladvisor_node->getName() == 'page_element') {
            $element_name = $traveladvisor_node->element_name;
            $element_name = str_replace("cs-", "", $element_name);
        } else {
            $element_name = $traveladvisor_node->getName();
        }
        echo strtoupper(str_replace('_', ' ', $element_name));
        ?>
                </strong><br/>
        <?php echo esc_attr($element_description); ?>
            </span>
        </div>
        <?php
    }
}
if (!function_exists('traveladvisor_show_all_cats')) {

    function traveladvisor_show_all_cats($parent, $separator, $selected = "", $taxonomy, $optional = '') {
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
            $a_options[''] = __("Please select..", 'cs-frame');
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
     * @Bootstrap Coloumn Class
     *
     * @returm Coloumn
     */
    if (!function_exists('traveladvisor_var_custom_column_class')) {

        function traveladvisor_var_custom_column_class($column_size) {
            $coloumn_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
            if (isset($column_size) && $column_size <> '') {
              //  $top='';
                
                list($top, $bottom) = explode('/', $column_size);
                $width = $top / $bottom * 100;
                $width = (int) $width;
                $coloumn_class = '';
                
                if (round($width) == '20' || round($width) < 20) {
                    $coloumn_class = 'col-lg-2 col-md-2 col-sm-4 col-xs-6';
                } else if (round($width) == '25' || round($width) < 25) {
                    $coloumn_class = 'col-lg-3 col-md-3 col-sm-6 col-xs-12';
                } elseif (round($width) == '33' || (round($width) < 33 && round($width) > 25)) {
                    $coloumn_class = 'col-lg-4 col-md-4 col-sm-6 col-xs-12';
                } elseif (round($width) == '50' || (round($width) < 50 && round($width) > 33)) {
                    $coloumn_class = 'col-lg-6 col-md-6 col-sm-12 col-xs-12';
                } elseif (round($width) == '67' || (round($width) < 67 && round($width) > 50)) {
                    $coloumn_class = 'col-lg-8 col-md-12 col-sm-12 col-xs-12';
                } elseif (round($width) == '75' || (round($width) < 75 && round($width) > 67)) {
                    $coloumn_class = 'col-md-9 col-lg-9 col-sm-12 col-xs-12';
                } else {
                    $coloumn_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
                }
            }
            return esc_html($coloumn_class);
        }
    }
    if (!function_exists('traveladvisor_shortcode_element_ajax_call')) {

        function traveladvisor_shortcode_element_ajax_call() {
            global $post, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields, $traveladvisor_var_static_text;
            $strings = new traveladvisor_frame_plugin_all_strings;
            if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'testimonial') {
                $rand_id = rand(324335, 110234299);
                ?>
            <div class='cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content'  id="traveladvisor_infobox_<?php echo intval($rand_id); ?>">
                <header>
                    <h4><i class='icon-arrows'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_testimonial'); ?></h4>
                    <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_shortcode_remove'); ?></a>
                </header>
                <?php
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_testimonial_text'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_testimonial_text_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'cust_id' => '',
                        'extra_atr' => 'data-content-text=cs-shortcode-textarea',
                        'cust_name' => 'traveladvisor_var_testimonial_text[]',
                        'return' => true,
                        'classes' => '',
                        'traveladvisor_editor' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($traveladvisor_opt_array);
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_testimonial_author'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_testimonial_author_hint'),
                    'echo' => true,
                    'classes' => 'txtfield',
                    'field_params' => array(
                        'std' => '',
                        'cust_id' => '',
                        'cust_name' => 'traveladvisor_var_testimonial_author[]',
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
				 $traveladvisor_opt_array = array(
					'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_testimonial_desigination'),
					'desc' => '',
					'hint_text' =>  traveladvisor_var_theme_text_srt('traveladvisor_var_testimonial_desigination_hint'),
					'echo' => true,
					'classes' => 'txtfield',
					'field_params' => array(
						'std' => $traveladvisor_var_testimonial_desigination,
						'cust_id' => '',
						'cust_name' => 'traveladvisor_var_testimonial_desigination[]',
						'return' => true,
					),
				);
				$traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
				
                ?>
            </div>
                <?php
            } elseif ($_POST['shortcode_element'] == 'accordion') {
                $rand_id = rand(324235, 81293249);
                ?>
            <div class='cs-wrapp-clone cs-shortcode-wrapp'  id="traveladvisor_infobox_<?php echo intval($rand_id); ?>">
                <header>
                    <h4><i class='icon-arrows'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_accordion_accordion'); ?></h4>
                    <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_shortcode_remove'); ?></a>
                </header>
                <?php
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_accordion_active'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_accordion_active_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => '',
                        'cust_name' => 'traveladvisor_var_accordion_active[]',
                        'classes' => 'dropdown chosen-select',
                        'options' => array(
                            'yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_accordion_active_yes'),
                            'no' => traveladvisor_var_theme_text_srt('traveladvisor_var_accordion_active_no'),
                        ),
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_accordion_accordion_title'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_accordion_accordion_title_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'accordion_title',
                        'cust_name' => 'traveladvisor_var_accordion_title[]',
                        'classes' => '',
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_accordion_accordion_text'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_accordion_accordion_text_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'traveladvisor_var_accordion_text',
                        'cust_name' => 'traveladvisor_var_accordion_text[]',
                        'extra_atr' => ' data-content-text=cs-shortcode-textarea',
                        'classes' => 'txtfield',
                        'return' => true,
                        'traveladvisor_editor' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($traveladvisor_opt_array);
                ?>
            </div>
                <?php
            }
			elseif ($_POST['shortcode_element'] == 'tabs') {
                $rand_id = rand(23, 12145453);
                ?>
            <div class='cs-wrapp-clone cs-shortcode-wrapp'  id="traveladvisor_tabs_<?php echo intval($rand_id); ?>">
                <header>
                    <h4><i class='icon-arrows'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_tabs'); ?></h4>
                    <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_shortcode_remove'); ?></a>
                </header>
                <?php
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tabs_active'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tabs_active_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'classes' => 'dropdown chosen-select',
                        'id' => 'tabs_item_text',
                        'cust_name' => 'traveladvisor_var_tabs_active[]',
                        'options' => array(
                            'Yes' => traveladvisor_var_theme_text_srt('traveladvisor_var_tabs_active_yes'),
                            'No' => traveladvisor_var_theme_text_srt('traveladvisor_var_tabs_active_no'),
                        ),
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tabs_item_text'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tabs_item_text_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'tabs_item_text',
                        'cust_name' => 'traveladvisor_var_tabs_item_text[]',
                        'classes' => '',
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tabs_description'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tabs_description_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'traveladvisor_var_tabs_desc',
                        'cust_name' => 'traveladvisor_var_tabs_desc[]',
						'extra_atr' => 'data-content-text=cs-shortcode-textarea',
                        'return' => true,
                        'classes' => '',
                        'traveladvisor_editor' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($traveladvisor_opt_array);
                ?>   
                <div class="form-elements" id="traveladvisor_infobox_<?php echo esc_attr($rand_id); ?>">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_tabs_icon'); ?></label>
            <?php
            if (function_exists('traveladvisor_var_tooltip_helptext')) {
                echo traveladvisor_var_tooltip_helptext(traveladvisor_var_theme_text_srt('traveladvisor_var_tabs_icon_hint'));
            }
            ?>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <?php echo traveladvisor_var_icomoon_icons_box('', $rand_id, 'traveladvisor_var_tabs_item_icon'); ?>
                    </div>
                </div>
            </div>
                <?php
            }
			elseif ($_POST['shortcode_element'] == 'list') {
                $rand_id = rand(23, 13345453);
                ?>
            <div class='cs-wrapp-clone cs-shortcode-wrapp'  id="traveladvisor_list_<?php echo intval($rand_id); ?>">
                <header>
                    <h4><i class='icon-arrows'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_list'); ?></h4>
                    <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_shortcode_remove'); ?></a>
                </header>
                <?php
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_list_text'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_list_text_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'list_item_text',
                        'cust_name' => 'traveladvisor_var_list_item_text[]',
                        'classes' => '',
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                ?>	 
                <div class="form-elements" id="traveladvisor_infobox_<?php echo esc_attr($rand_id); ?>">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label><?php _e('Icon', 'cs-frame'); ?></label>
            <?php
            if (function_exists('traveladvisor_var_tooltip_helptext')) {
                echo traveladvisor_var_tooltip_helptext('Select the Icons you would like to show with your List .');
            }
            ?>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <?php echo traveladvisor_var_icomoon_icons_box('', $rand_id, 'traveladvisor_var_list_item_icon'); ?>
                    </div>
                </div>
            </div>
                <?php
            }
            //tabel
            elseif ($_POST['shortcode_element'] == 'tabel') {
                $rand_id = rand(23, 12545453);
                ?>
            <div class='cs-wrapp-clone cs-shortcode-wrapp'  id="traveladvisor_tabs_<?php echo intval($rand_id); ?>">
                <header>
                    <h4><i class='icon-arrows'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_table'); ?></h4>
                    <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_shortcode_remove'); ?></a>
                </header>
                <?php
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_table_quick_fact'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_table_quick_fact_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'tabel_fact',
                        'cust_name' => 'traveladvisor_var_tabel_fact[]',
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_table_net_price'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_table_net_price_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'net_price',
                        'cust_name' => 'traveladvisor_var_tabel_net_price[]',
                        'classes' => '',
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_table_discount_price'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_table_discount_price_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'tabel_discount_price',
                        'cust_name' => 'traveladvisor_var_tabel_discount_price[]',
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_table_price'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_table_price_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'traveladvisor_var_tabel_price',
                        'cust_name' => 'traveladvisor_var_tabel_price[]',
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                ?>   
            </div>
                <?php
            } elseif ($_POST['shortcode_element'] == 'progress') {
                $rand_id = rand(100, 12745453);
                ?>
            <div class='cs-wrapp-clone cs-shortcode-wrapp'  id="traveladvisor_list_<?php echo intval($rand_id); ?>">
                <header>
                    <h4><i class='icon-arrows'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_progress'); ?></h4>
                    <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_shortcode_remove'); ?></a>
                </header>
                <?php
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_progressbar_item_text'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_progressbar_item_text_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'progress_item_text',
                        'cust_name' => 'traveladvisor_var_progress_item_text[]',
                        'classes' => '',
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_progressbar_item_percentage'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_progressbar_item_percentage_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'progress_item_percentage',
                        'cust_name' => 'traveladvisor_var_progress_item_percentage[]',
                        'classes' => '',
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                ?>	 
            </div>
                <?php
            } elseif (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'infobox') {
                $rand_id = rand(324335, 159234299);
                ?>
            <div class='cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content'  id="traveladvisor_infobox_<?php echo intval($rand_id); ?>">
                <header>
                    <h4><i class='icon-arrows'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_infobox_infobox'); ?></h4>
                    <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_shortcode_remove'); ?></a>
                </header>
                <?php
                $traveladvisor_opt_array = array(
                                            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_infobox_title'),
                                            'desc' => '',
                                            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_infobox_title_hint'),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => traveladvisor_allow_special_char($traveladvisor_var_infobox_element_title),
                                                'id' => 'traveladvisor_var_infobox_element_title' . $traveladvisor_counter,
                                                'cust_name' => 'traveladvisor_var_infobox_element_title[]',
                                                'classes' => '',
                                                'return' => true,
                                            ),
                                        );
                                        $traveladvisor_opt_array = array(
                                            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_infobox_title_color'),
                                            'desc' => '',
                                            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_infobox_title_color_hint'),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => esc_attr($traveladvisor_var_infobox_text_color),
                                                'cust_id' => 'traveladvisor_var_infobox_text_color' . $traveladvisor_counter,
                                                'classes' => 'bg_color',
                                                'cust_name' => 'traveladvisor_var_infobox_text_color[]',
                                                'return' => true,
                                            ),
                                        );
                                            ?>
                                       <div class="form-elements" id="traveladvisor_infobox_<?php echo esc_attr($rand_id); ?>">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <label><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_infobox_icon');  ?></label>
                                        <?php
                                        if (function_exists('traveladvisor_var_tooltip_helptext')) {
                                            echo traveladvisor_var_tooltip_helptext(traveladvisor_var_theme_text_srt('traveladvisor_var_infobox_icon_hint'));
                                        }
                                        ?>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <?php echo traveladvisor_var_icomoon_icons_box(esc_html($traveladvisor_var_infobox_icon), esc_attr($rand_id), 'traveladvisor_var_infobox_icon'); ?>
                                            </div>
                                        </div>
											<?php
											$traveladvisor_opt_array = array(
                                            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_infobox_contents'),
                                            'desc' => '',
                                            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_infobox_contents_hint'),
                                            'echo' => true,
                                            'field_params' => array(
                                                'std' => traveladvisor_allow_special_char($traveladvisor_var_infobox_text),
                                                'cust_id' => 'traveladvisor_var_infobox_text',
                                                'extra_atr' => 'data-content-text=cs-shortcode-textarea',
                                                'cust_name' => 'traveladvisor_var_infobox_text[]',
                                                'classes' => '',
                                                'traveladvisor_editor' => true,
                                                'return' => true,
                                            ),
                                        );
                                        $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($traveladvisor_opt_array);
                              
                ?>
            </div>
                <?php
            } elseif (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'clients') {
                $rand_id = rand(1234, 17894563);
                ?>
            <div class='cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content'  id="traveladvisor_infobox_<?php echo intval($rand_id); ?>">
                <header>
                    <h4><i class='icon-arrows'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_client_client'); ?></h4>
                    <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_shortcode_remove'); ?></a>
                </header>
                <?php
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_client_url'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_client_url_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'cust_id' => '',
                        'extra_atr' => 'data-content-text="cs-shortcode-textarea"',
                        'cust_name' => 'traveladvisor_var_clients_text[]',
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                $traveladvisor_opt_array = array(
                    'std' => '',
                    'id' => 'clients_img_user',
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_client_image'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_client_image_hint'),
                    'echo' => true,
                    'array' => true,
                    'prefix' => '',
                    'field_params' => array(
                        'std' => '',
                        'id' => 'clients_img_user',
                        'return' => true,
                        'array' => true,
                        'array_txt' => false,
                        'prefix' => '',
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_upload_file_field($traveladvisor_opt_array);
                ?>
            </div>
            <?php
        }
        // Multi Price Table Start
        elseif (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'pricetable') {
            $multiple_services_count = 'multiple_services_' . rand(455345, 123454390);
            if (isset($traveladvisor_var_multi_services_text) && $traveladvisor_var_multi_services_text != '') {
                $traveladvisor_var_multi_services_text = $traveladvisor_var_multi_services_text;
            } else {
                $traveladvisor_var_multi_services_text = '';
            }
            ?>
            <div class='cs-wrapp-clone cs-shortcode-wrapp' id="traveladvisor_infobox_<?php echo traveladvisor_allow_special_char($multiple_services_count); ?>">
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
                        'std' => '',
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
                        'std' => '',
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
                        'std' => '',
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
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_package_duration_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'cust_id' => 'traveladvisor_var_multiple_pricetable_package',
                        'cust_name' => 'traveladvisor_var_multiple_pricetable_package[]',
                        'classes' => 'dropdown chosen-select',
                        'options' => array(
                            'day' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_package_duration_day'),
                            'week' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_package_duration_week'),
                            'fortnight' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_package_duration_fortnight'),
                            'month' => traveladvisor_var_theme_text_srt('traveladvisor_var_multipricetable_package_duration_month'),
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
                        'std' => '',
                        'cust_id' => 'traveladvisor_var_multiple_pricetable_desc',
                        'classes' => '',
                        'cust_name' => 'traveladvisor_var_multiple_pricetable_desc[]',
                        'extra_atr' => 'data-content-text=cs-shortcode-textarea',
                        'return' => true,
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
                        'std' => '',
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
                        'std' => '',
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
        // Icon Box Start
        elseif (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'icon_box') {
            $multiple_services_count = 'multiple_services_' . rand(455345, 223454390);
            if (isset($traveladvisor_var_icon_box_text) && $traveladvisor_var_icon_box_text != '') {
                $traveladvisor_var_icon_box_text = $traveladvisor_var_icon_box_text;
            } else {
                $traveladvisor_var_icon_box_text = '';
            }
            ?>
            <div class='cs-wrapp-clone cs-shortcode-wrapp' id="traveladvisor_infobox_<?php echo traveladvisor_allow_special_char($multiple_services_count); ?>">
                <header>
                    <h4><i class='icon-arrows'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_multiservices'); ?></h4>
                    <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_shortcode_remove'); ?></a>
                </header>
                <?php
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_multiservices_title'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_multiservices_title_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'cust_id' => 'traveladvisor_var_multiple_service_title',
                        'classes' => '',
                        'cust_name' => 'traveladvisor_var_multiple_service_title[]',
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);

                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_service_icon_type'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_service_icon_type_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'traveladvisor_var_icon_box_icon_type',
                        'cust_name' => 'traveladvisor_var_icon_box_icon_type[]',
                        'classes' => 'chosen-select-no-single select-medium function-class',
                        'options' => array(
                            'icon' => traveladvisor_var_theme_text_srt('traveladvisor_var_service_icon'),
                            'image' => traveladvisor_var_theme_text_srt('traveladvisor_var_service_image'),
                        ),
                        'return' => true,
                    ),
                );

                $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
                
                ?>
                <div class="cs-sh-icon_box-image-area" style="display:none;">
                <?php
                $traveladvisor_opt_array = array(
                    'std' => '',
                    'id' => 'multiple_service_logo',
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_multiservices_image'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_multiservices_image_hint'),
                    'echo' => true,
                    'array' => true,
                    'prefix' => '',
                    'field_params' => array(
                        'std' => '',
                        'id' => 'multiple_service_logo',
                        'return' => true,
                        'array' => true,
                        'array_txt' => false,
                        'prefix' => '',
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_upload_file_field($traveladvisor_opt_array);  
                $rand_id = rand(123450, 85654987);
                ?>
                </div>
                <div class="cs-sh-icon_box-icon-area" style="display:block;">
                <div class="form-elements" id="<?php echo esc_attr($rand_id); ?>">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_multiservices_icon'); ?></label>
                <?php
                if (function_exists('traveladvisor_var_tooltip_helptext')) {
                    echo traveladvisor_var_tooltip_helptext(traveladvisor_var_theme_text_srt('traveladvisor_var_multiservices_icon_hint'));
                }
                ?>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <?php echo traveladvisor_var_icomoon_icons_box('', $rand_id, 'traveladvisor_var_services_icon'); ?>
                    </div>
                </div>
                </div>
                <?php
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_multiservices_url'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_multiservices_url_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'cust_id' => 'traveladvisor_var_link_url',
                        'classes' => '',
                        'cust_name' => 'traveladvisor_var_link_url[]',
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_multiservices_contents'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_multiservices_contents_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'cust_id' => '',
                        'classes' => 'txtfield',
                        'cust_name' => 'traveladvisor_var_icon_box_text[]',
                        'return' => true,
                        'extra_atr' => 'data-content-text=cs-shortcode-textarea',
                        'traveladvisor_editor' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($traveladvisor_opt_array);
                ?>
            </div>
                <script type="text/javascript">
                jQuery('.function-class').change(function ($) {
                    var value = jQuery(this).val();

                    var parentNode = jQuery(this).parent().parent().parent();
                    if (value == 'image') {
                        parentNode.find(".cs-sh-icon_box-image-area").show();
                        parentNode.find(".cs-sh-icon_box-icon-area").hide();
                    } else {
                        parentNode.find(".cs-sh-icon_box-image-area").hide();
                        parentNode.find(".cs-sh-icon_box-icon-area").show();
                    }

                }
                );
            </script>
                <?php
            } 
            elseif (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'team') {
                $multiple_team_count = 'multiple_team_' . rand(455345, 23454390);
                if (isset($traveladvisor_var_multi_team_text) && $traveladvisor_var_multi_team_text != '') {
                    $traveladvisor_var_multi_team_text = $traveladvisor_var_multi_team_text;
                } else {
                    $traveladvisor_var_multi_team_text = '';
                }
                ?>
            <div class='cs-wrapp-clone cs-shortcode-wrapp' id="traveladvisor_infobox_<?php echo traveladvisor_allow_special_char($multiple_team_count); ?>">
                <header>
                    <h4><i class='icon-arrows'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_multi_team_multi_team'); ?></h4>
                    <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_multi_team_remove'); ?></a>
                </header>
                <?php
                if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
                    traveladvisor_shortcode_element_size();
                }
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_team_name'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_team_name_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'cust_id' => 'traveladvisor_var_team_title',
                        'classes' => '',
                        'cust_name' => 'traveladvisor_var_team_title[]',
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_team_desigination'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_team_desigination_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'cust_id' => 'traveladvisor_var_multi_team_text',
                        'classes' => '',
                        'cust_name' => 'traveladvisor_var_multi_team_text[]',
                        
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                $traveladvisor_opt_array = array(
                    'std' => '',
                    'id' => 'team_img',
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_team_image'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_team_image_hint'),
                    'echo' => true,
                    'array' => true,
                    'prefix' => '',
                    'field_params' => array(
                        'std' => '',
                        'id' => 'team_img',
                        'return' => true,
                        'array' => true,
                        'array_txt' => false,
                        'prefix' => '',
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_upload_file_field($traveladvisor_opt_array);
?>
                                        <div class="img_position_field">
                                        <?php
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_team_image_placee'),
                    'desc' => '',
                    'id' => 'pagination_style',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_team_image_placee_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'cust_id' => 'traveladvisor_var_team_image_place',
                        'cust_name' => 'traveladvisor_var_team_image_place[]',
                        'classes' => 'dropdown chosen-select',
                        'options' => array(
                            '' => traveladvisor_var_theme_text_srt('traveladvisor_var_team_image_placee_select'),
                            'right' => traveladvisor_var_theme_text_srt('traveladvisor_var_team_image_placee_right'),
                            'left' => traveladvisor_var_theme_text_srt('traveladvisor_var_team_image_placee_left'),
                        ),
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
 ?>
                                        </div>
                                        <div class="social_links_fields">
                                        <?php

                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_team_facebook'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_team_facebook_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'cust_id' => 'traveladvisor_var_team_facebook',
                        'classes' => '',
                        'cust_name' => 'traveladvisor_var_team_facebook[]',
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_team_twitter'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_team_twitter_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'cust_id' => 'traveladvisor_var_team_twitter',
                        'classes' => '',
                        'cust_name' => 'traveladvisor_var_team_twitter[]',
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_team_mail'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_team_mail_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'cust_id' => 'traveladvisor_var_team_mail',
                        'classes' => '',
                        'cust_name' => 'traveladvisor_var_team_mail[]',
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_team_google_plus'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_team_google_plus_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'cust_id' => 'traveladvisor_var_team_google',
                        'classes' => '',
                        'cust_name' => 'traveladvisor_var_team_google[]',
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
?>
                                        </div>  
                                            <div class="desc_field">
                                        <?php
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_team_description'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_team_description_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'cust_id' => 'traveladvisor_var_multi_team_des',
                        'classes' => '',
                        'cust_name' => 'traveladvisor_var_multi_team_des[]',
                        'extra_atr' => ' data-content-text=cs-shortcode-textarea',
                        'return' => true,
                        'traveladvisor_editor' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($traveladvisor_opt_array);
                ?>
            </div>
            </div>
            <script>
                jQuery(document).ready(function ($) {
                         var getValue = $("#traveladvisor_var_team_view option:selected").val();
                         if(getValue == 'team_simple') {
                             $('.column_field').css('display','block');
                             $('.img_position_field').css('display','none');
                             $('.social_links_fields').css('display','none');
                             $('.desc_field').css('display','none');
                         }else if(getValue == 'team_fancy') {
                             $('.column_field').css('display','none');
                             $('.img_position_field').css('display','block');
                             $('.social_links_fields').css('display','block');
                             $('.desc_field').css('display','block'); 
                        } else if(getValue == 'team_grid'){
                             $('.column_field').css('display','block');
                             $('.img_position_field').css('display','none');
                             $('.social_links_fields').css('display','block');
                             $('.desc_field').css('display','none');
                         }
                 });

            </script>
            <?php
        }
        // Icon Box End
        //multi counter
        elseif (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'counters') {
            $multiple_counters_count = 'multiple_counters_' . rand(455345, 223454390);
            if (isset($traveladvisor_var_multi_counters_text) && $traveladvisor_var_multi_counters_text != '') {
                $traveladvisor_var_multi_counters_text = $traveladvisor_var_multi_counters_text;
            } else {
                $traveladvisor_var_multi_counters_text = '';
            }
            ?>
            <div class='cs-wrapp-clone cs-shortcode-wrapp' id="traveladvisor_infobox_<?php echo traveladvisor_allow_special_char($multiple_counters_count); ?>">
                <header>
                    <h4><i class='icon-arrows'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_multicounters'); ?></h4>
                    <a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_shortcode_remove'); ?></a>
                </header>
                <?php
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_counter_title'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_counter_title_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'cust_id' => 'traveladvisor_var_multiple_counter_title',
                        'classes' => '',
                        'cust_name' => 'traveladvisor_var_multiple_counter_title[]',
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                $rand_id = rand(123450, 85654987);
                echo '<div class="multi_counters_icon">';
                ?>                  
                <div class="form-elements" id="<?php echo esc_attr($rand_id); ?>">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_counter_icon'); ?></label>
                <?php
                if (function_exists('traveladvisor_var_tooltip_helptext')) {
                    echo traveladvisor_var_tooltip_helptext(traveladvisor_var_theme_text_srt('traveladvisor_var_counter_icon_hint'));
                }
                ?>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <?php echo traveladvisor_var_icomoon_icons_box('', $rand_id, 'traveladvisor_var_counters_icon'); ?>
                    </div>
                </div>
                <?php
                echo '</div>';
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_counter_separator_position'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_counter_separator_position_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => '',
                        'cust_name' => 'traveladvisor_var_counter_icon_position[]',
                        'classes' => 'dropdown chosen-select',
                        'options' => array(
                            'Before Title' => traveladvisor_var_theme_text_srt('traveladvisor_var_counter_separator_position_before'),
                            'After Title' => traveladvisor_var_theme_text_srt('traveladvisor_var_counter_separator_position_after'),
                        ),
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_counter_description'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_counter_description_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'cust_id' => '',
                        'classes' => 'txtfield',
                        'cust_name' => 'traveladvisor_var_multi_counters_text[]',
                        'return' => true,
                        'extra_atr' => 'data-content-text=cs-shortcode-textarea',
                        'traveladvisor_editor' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($traveladvisor_opt_array);
                $traveladvisor_opt_array = array(
                    'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_counter_number'),
                    'desc' => '',
                    'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_counter_number_hint'),
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'cust_id' => 'traveladvisor_var_counter_padding_left',
                        'classes' => '',
                        'cust_name' => 'traveladvisor_var_counter_padding_left[]',
                        'return' => true,
                    ),
                );
                $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                ?>
            </div>
            <?php
        }
        die;
    }
    add_action('wp_ajax_traveladvisor_shortcode_element_ajax_call', 'traveladvisor_shortcode_element_ajax_call');
}