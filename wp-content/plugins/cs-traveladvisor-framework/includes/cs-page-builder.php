<?php
global $post, $traveladvisor_count_node, $traveladvisor_xmlObject;
add_action('add_meta_boxes', 'traveladvisor_page_bulider_add');
/*
 *  Add CS Page Builder Meta Box
 */

function traveladvisor_page_bulider_add() {
    $strings = new traveladvisor_frame_plugin_all_strings;
    $strings->traveladvisor_plugin_activation_strings();
    // traveladvisor_var_theme_text_srt('traveladvisor_var_post_meta_options')
    add_meta_box('id_page_builder', traveladvisor_var_theme_text_srt('traveladvisor_var_page_builder_meta'), 'traveladvisor_page_bulider', 'page', 'normal', 'high');
}

/*
 *  Add CS Page Builder Meta Box Call Back
 */

function traveladvisor_page_bulider($post) {
    global $post, $traveladvisor_xmlObject, $traveladvisor_node, $traveladvisor_count_node, $post, $column_container, $coloum_width;
    wp_reset_query();
    $postID = $post->ID;
    $count_widget = 0;
    $page_title = '';
    $page_content = '';
    $page_sub_title = '';
    $builder_active = 0;
    $traveladvisor_page_bulider = get_post_meta($post->ID, "traveladvisor_page_builder", true);
    if ($traveladvisor_page_bulider <> "") {
        $traveladvisor_xmlObject = new stdClass();
        $traveladvisor_xmlObject = new SimpleXMLElement($traveladvisor_page_bulider);
        $builder_active = $traveladvisor_xmlObject->builder_active;
    }
    ?>
    <input type="hidden" name="builder_active" value="<?php echo esc_html($builder_active) ?>" />
    <div class="clear"></div>
    <div id="add_page_builder_item">
        <div id="traveladvisor_shortcode_area"></div>  
        <?php
        if ($traveladvisor_page_bulider <> "") {
            if (isset($traveladvisor_xmlObject->page_title))
                $page_title = $traveladvisor_xmlObject->page_title;
            if (isset($traveladvisor_xmlObject->page_content))
                $page_content = $traveladvisor_xmlObject->page_content;
            if (isset($traveladvisor_xmlObject->page_sub_title))
                $page_sub_title = $traveladvisor_xmlObject->page_sub_title;
            foreach ($traveladvisor_xmlObject->column_container as $column_container) {
                traveladvisor_column_pb(1);
            }
        }
        ?>
    </div>
    <div class="clear"></div>
    <div class="add-widget"> <span class="addwidget"> <a href="javascript:ajaxSubmit('traveladvisor_column_pb','1','column_full')"><i class="icon-plus-circle"></i> <?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_page_builder_sections') ?> </a> </span> 
        <div id="loading" class="builderload"></div>
        <div class="clear"></div>
        <input type="hidden" name="page_builder_form" value="1" />
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <script type="text/javascript">
        var count_widget = <?php echo absint($count_widget); ?>;
        jQuery(function () {
            jQuery(".draginner").sortable({
                connectWith: '.draginner',
                handle: '.column-in',
                start: function (event, ui) {
                    jQuery(ui.item).css({"width": "25%"});
                },
                cancel: '.draginner .poped-up,#confirmOverlay',
                revert: false,
                receive: function (event, ui) {
                    callme();
                },
                placeholder: "ui-state-highlight",
                forcePlaceholderSize: true
            });
            jQuery("#add_page_builder_item").sortable({
                handle: '.column-in',
                connectWith: ".columnmain",
                cancel: '.column_container,.draginner,#confirmOverlay',
                revert: false,
                placeholder: "ui-state-highlight",
                forcePlaceholderSize: true
            });
        });
        function ajaxSubmit(action, total_column, column_class) {
            counter++;
            count_widget++;
            jQuery('.builderload').html("<img src='<?php echo traveladvisor_var_frame()->plugin_url() . 'assets/images/ajax_loading.gif' ?>' />");
            var newCustomerForm = "action=" + action + '&counter=' + counter + '&total_column=' + total_column + '&column_class=' + column_class + '&postID=<?php echo esc_js($postID); ?>';
            jQuery.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php') ?>",
                data: newCustomerForm,
                success: function (data) {
                    jQuery('.builderload').html("");
                    jQuery("#add_page_builder_item").append(data);
                    jQuery('div.cs-drag-slider').each(function () {
                        var _this = jQuery(this);
                        _this.slider({
                            range: 'min',
                            step: _this.data('slider-step'),
                            min: _this.data('slider-min'),
                            max: _this.data('slider-max'),
                            value: _this.data('slider-value'),
                            slide: function (event, ui) {
                                jQuery(this).parents('li.to-field').find('.cs-range-input').val(ui.value)
                            }
                        });
                    });
                    jQuery('.bg_color').wpColorPicker();
                    jQuery(".draginner").sortable({
                        connectWith: '.draginner',
                        handle: '.column-in',
                        cancel: '.draginner .poped-up,#confirmOverlay',
                        revert: false,
                        start: function (event, ui) {
                            jQuery(ui.item).css({"width": "25%"})
                        },
                        receive: function (event, ui) {
                            traveladvisor_frame_callme();
                        },
                        placeholder: "ui-state-highlight",
                        forcePlaceholderSize: true
                    });
                }
            });
        }
        function traveladvisor_frame_ajax_widget(action, id) {
            traveladvisor_frame_loader();
            counter++;
            var newCustomerForm = "action=" + action + '&counter=' + counter;
            var edit_url = action + counter;
            jQuery.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php') ?>",
                data: newCustomerForm,
                success: function (data) {
                    jQuery("#counter_" + id).append(data);
                    jQuery("#" + action + counter).append('<input type="hidden" name="traveladvisor_widget_element_num[]" value="form" />');
                    jQuery('.bg_color').wpColorPicker();
                    jQuery(".draginner").sortable({
                        connectWith: '.draginner',
                        handle: '.column-in',
                        cancel: '.draginner .poped-up,#confirmOverlay',
                        revert: false,
                        receive: function (event, ui) {
                            traveladvisor_frame_callme();
                        },
                        placeholder: "ui-state-highlight",
                        forcePlaceholderSize: true
                    });
                    traveladvisor_frame_removeoverlay("composer-" + id, "append");
                    jQuery('div.cs-drag-slider').each(function () {
                        var _this = jQuery(this);
                        _this.slider({
                            range: 'min',
                            step: _this.data('slider-step'),
                            min: _this.data('slider-min'),
                            max: _this.data('slider-max'),
                            value: _this.data('slider-value'),
                            slide: function (event, ui) {
                                jQuery(this).parents('li.to-field').find('.cs-range-input').val(ui.value)
                            }
                        });
                    });
                    traveladvisor_frame_callme();
                    chosen_selectionbox();
                    jQuery('[data-toggle="popover"]').popover();
                }
            });
        }
        function traveladvisor_frame_ajax_widget_element(action, id, name) {
            traveladvisor_frame_loader();
            counter++;
            var newCustomerForm = "action=" + action + '&element_name=' + name + '&counter=' + counter;
            var edit_url = action + counter;
            jQuery.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php') ?>",
                data: newCustomerForm,
                success: function (data) {
                    jQuery("#counter_" + id).append(data);
                    jQuery("#counter_" + id + " #results-shortocde-id-form").append('<input type="hidden" name="traveladvisor_widget_element_num[]" value="form" />');
                    jQuery('.bg_color').wpColorPicker();
                    jQuery(".draginner").sortable({
                        connectWith: '.draginner',
                        handle: '.column-in',
                        cancel: '.draginner .poped-up,#confirmOverlay',
                        revert: false,
                        receive: function (event, ui) {
                            traveladvisor_frame_callme();
                        },
                        placeholder: "ui-state-highlight",
                        forcePlaceholderSize: true
                    });
                    traveladvisor_frame_removeoverlay("composer-" + id, "append");
                    jQuery('div.cs-drag-slider').each(function () {
                        var _this = jQuery(this);
                        _this.slider({
                            range: 'min',
                            step: _this.data('slider-step'),
                            min: _this.data('slider-min'),
                            max: _this.data('slider-max'),
                            value: _this.data('slider-value'),
                            slide: function (event, ui) {
                                jQuery(this).parents('li.to-field').find('.cs-range-input').val(ui.value)
                            }
                        });
                    });
                    traveladvisor_frame_callme();
                }
            });
        }
        function traveladvisor_frame_ajax_submit(action) {
            counter++;
            count_widget++;
            var newCustomerForm = "action=" + action + '&counter=' + counter;
            jQuery.ajax({
                type: "POST",
                url: "<?php echo admin_url() ?>/admin-ajax.php",
                data: newCustomerForm,
                success: function (data) {
                    jQuery("#add_page_builder_item").append(data);
                    if (count_widget > 0)
                        jQuery("#add_page_builder_item").addClass('hasclass');
                }
            });
        }
    </script>
    <?php
}

if (isset($_POST['page_builder_form']) and $_POST['page_builder_form'] == 1) {
    add_action('save_post', 'save_page_builder');
    /*
     *  Saves The Page Builder Options
     */
    if (!function_exists('save_page_builder')) {

        function save_page_builder($post_id) {
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
                return;
            if (isset($_POST['builder_active'])) {
                $sxe = new SimpleXMLElement("<pagebuilder></pagebuilder>");
                if (empty($_POST["builder_active"]))
                    $_POST["builder_active"] = "";
                if (empty($_POST["page_content"]))
                    $_POST["page_content"] = "";
                $sxe->addChild('builder_active', $_POST['builder_active']);
                $sxe->addChild('page_content', $_POST['page_content']);
                $traveladvisor_counter = 0;
                $page_element_id = 0;
                $column_container_no = 0;
                $widget_no = 0;
                //column counters
                $traveladvisor_global_counter_column = 0;
                $traveladvisor_shortcode_counter_column = 0;
                $traveladvisor_counter_column = 0;
                //Contact Us counters
                $traveladvisor_global_counter_contact_us = 0;
                $traveladvisor_shortcode_counter_contact_us = 0;
                $traveladvisor_counter_contact_us = 0;
                //blog counters
                $traveladvisor_global_counter_blog = 0;
                $traveladvisor_shortcode_counter_blog = 0;
                $traveladvisor_counter_blog = 0;
                //quote counters
                $traveladvisor_global_counter_quote = 0;
                $traveladvisor_shortcode_counter_quote = 0;
                $traveladvisor_counter_quote = 0;
                //Gallery Counter
                $traveladvisor_global_counter_gallery = 0;
                $traveladvisor_shortcode_counter_gallery = 0;
                $traveladvisor_counter_gallery = 0;
                //Destination Counter
                $traveladvisor_global_counter_destination = 0;
                $traveladvisor_shortcode_counter_destination = 0;
                $traveladvisor_counter_destination = 0;
                //Team Counter
                $traveladvisor_global_counter_team = 0;
                $traveladvisor_shortcode_counter_team = 0;
                $traveladvisor_counter_team = 0;
                //Tours Counter
                $traveladvisor_global_counter_tour = 0;
                $traveladvisor_shortcode_counter_tour = 0;
                $traveladvisor_counter_tour = 0;
                //Price Services Counter
                $traveladvisor_global_counter_price_services = 0;
                $traveladvisor_shortcode_counter_price_services = 0;
                $traveladvisor_counter_price_services = 0;
                //Map Counter
                $traveladvisor_global_counter_map = 0;
                $traveladvisor_shortcode_counter_map = 0;
                $traveladvisor_counter_map = 0;
                //Heading Counter
                $traveladvisor_global_counter_heading = 0;
                $traveladvisor_shortcode_counter_heading = 0;
                $traveladvisor_counter_heading = 0;
                //Image Frame Counter
                $traveladvisor_global_counter_image_frame = 0;
                $traveladvisor_shortcode_counter_image_frame = 0;
                $traveladvisor_counter_image_frame = 0;
                //multi_team;
                $traveladvisor_counter_multi_team = 0;
                $traveladvisor_counter_multi_team_node = 0;
                $traveladvisor_shortcode_counter_multi_team = 0;
                $traveladvisor_global_counter_multi_team = 0;
                //icon_box;
                $traveladvisor_counter_icon_box = 0;
                $traveladvisor_counter_icon_box_node = 0;
                $traveladvisor_shortcode_counter_icon_box = 0;
                $traveladvisor_global_counter_icon_box = 0;
                //Video Counter
                $traveladvisor_global_counter_video = 0;
                $traveladvisor_shortcode_counter_video = 0;
                $traveladvisor_counter_video = 0;
                //multi counters
                $traveladvisor_counter_multi_counters = 0;
                $traveladvisor_counter_multi_counters_node = 0;
                $traveladvisor_shortcode_counter_multi_counters = 0;
                $traveladvisor_global_counter_multi_counters = 0;
                //multi_pricetable;
                $traveladvisor_counter_multi_pricetable = 0;
                $traveladvisor_counter_multi_pricetable_node = 0;
                $traveladvisor_shortcode_counter_multi_pricetable = 0;
                $traveladvisor_global_counter_multi_pricetable = 0;
                //List counter
                $traveladvisor_global_counter_list = 0;
                $traveladvisor_shortcode_counter_list = 0;
                $traveladvisor_counter_list_node = 0;
                $traveladvisor_counter_list = 0;
                // progress
                $traveladvisor_global_counter_progress = 0;
                $traveladvisor_shortcode_counter_progress = 0;
                $traveladvisor_counter_progress_node = 0;
                $traveladvisor_counter_progress = 0;
                //testimonial;
                $traveladvisor_counter_testimonial = 0;
                $traveladvisor_counter_testimonial_node = 0;
                $traveladvisor_shortcode_counter_testimonial = 0;
                $traveladvisor_global_counter_testimonial = 0;
                //accordion;
                $traveladvisor_counter_accordion = 0;
                $traveladvisor_counter_accordion_node = 0;
                $traveladvisor_shortcode_counter_accordion = 0;
                $traveladvisor_global_counter_accordion = 0;
                //clients;
                $traveladvisor_counter_clients = 0;
                $traveladvisor_counter_clients_node = 0;
                $traveladvisor_shortcode_counter_clients = 0;
                $traveladvisor_global_counter_clients = 0;
                //Button Counter
                $traveladvisor_global_counter_button = 0;
                $traveladvisor_shortcode_counter_button = 0;
                $traveladvisor_counter_button = 0;
                //Tour Search Counter
                $traveladvisor_global_counter_toursearch = 0;
                $traveladvisor_shortcode_counter_toursearch = 0;
                $traveladvisor_counter_toursearch = 0;
                // Divider
                $traveladvisor_counter_divider = 0;
                $traveladvisor_shortcode_counter_divider = 0;
                $traveladvisor_global_counter_divider = 0;
                //Maintenance Page 
                $traveladvisor_global_counter_maintenance = 0;
                $traveladvisor_shortcode_counter_maintenance = 0;
                $traveladvisor_counter_maintenance = 0;
                //tabs;
                $traveladvisor_counter_tabs = 0;
                $traveladvisor_counter_tabs_node = 0;
                $traveladvisor_shortcode_counter_tabs = 0;
                $traveladvisor_global_counter_tabs = 0;
                //Infobox Counter
                $traveladvisor_counter_infobox = 0;
                $traveladvisor_counter_infobox_node = 0;
                $traveladvisor_shortcode_counter_infobox = 0;
                $traveladvisor_global_counter_infobox = 0;
                //pricetable Counter
                $traveladvisor_counter_pricetable = 0;
                $traveladvisor_counter_pricetable_node = 0;
                $traveladvisor_shortcode_counter_pricetable = 0;
                $traveladvisor_global_counter_pricetable = 0;
                //table;
                $traveladvisor_counter_tabel = 0;
                $traveladvisor_counter_tabel_node = 0;
                $traveladvisor_shortcode_counter_tabel = 0;
                $traveladvisor_global_counter_tabel = 0;
                if (isset($_POST['total_column'])) {
                    foreach ($_POST['total_column'] as $count_column) {
                        // Sections Element Attributes start
                        $column_container = $sxe->addChild('column_container');
                        if (empty($_POST['column_class'][$column_container_no]))
                            $_POST['column_class'][$column_container_no] = "";
                        $column_container->addAttribute('class', $_POST['column_class'][$column_container_no]);
                        $column_rand_id = $_POST['column_rand_id'][$column_container_no];
                        //traveladvisor_section_background_option
                        if (empty($_POST['traveladvisor_var_section_title_array'][$column_container_no]))
                            $_POST['traveladvisor_var_section_title_array'][$column_container_no] = "";
                        if (empty($_POST['traveladvisor_var_section_subtitle_array'][$column_container_no]))
                            $_POST['traveladvisor_var_section_subtitle_array'][$column_container_no] = "";
                        if (empty($_POST['traveladvisor_section_background_option'][$column_container_no]))
                            $_POST['traveladvisor_section_background_option'][$column_container_no] = "";
                        if (empty($_POST['traveladvisor_section_title_align_option'][$column_container_no]))
                            $_POST['traveladvisor_section_title_align_option'][$column_container_no] = "";
                        if (empty($_POST['traveladvisor_var_section_bg_image_array'][$column_container_no]))
                            $_POST['traveladvisor_var_section_bg_image_array'][$column_container_no] = "";
                        if (empty($_POST['traveladvisor_section_bg_image_position'][$column_container_no]))
                            $_POST['traveladvisor_section_bg_image_position'][$column_container_no] = "";
                        if (empty($_POST['traveladvisor_section_bg_image_repeat'][$column_container_no]))
                            $_POST['traveladvisor_section_bg_image_repeat'][$column_container_no] = "";
                        if (empty($_POST['traveladvisor_section_flex_slider'][$column_container_no]))
                            $_POST['traveladvisor_section_flex_slider'][$column_container_no] = "";
                        if (empty($_POST['traveladvisor_section_video_url'][$column_container_no]))
                            $_POST['traveladvisor_section_video_url'][$column_container_no] = "";
                        if (empty($_POST['traveladvisor_section_video_mute'][$column_container_no]))
                            $_POST['traveladvisor_section_video_mute'][$column_container_no] = "";
                        if (empty($_POST['traveladvisor_section_video_autoplay'][$column_container_no]))
                            $_POST['traveladvisor_section_video_autoplay'][$column_container_no] = "";
                        if (empty($_POST['traveladvisor_section_bg_color'][$column_container_no]))
                            $_POST['traveladvisor_section_bg_color'][$column_container_no] = "";
                        if (empty($_POST['traveladvisor_section_padding_top'][$column_container_no]))
                            $_POST['traveladvisor_section_padding_top'][$column_container_no] = "";
                        if (empty($_POST['traveladvisor_section_padding_bottom'][$column_container_no]))
                            $_POST['traveladvisor_section_padding_bottom'][$column_container_no] = "";
                        if (empty($_POST['traveladvisor_section_parallax'][$column_container_no]))
                            $_POST['traveladvisor_section_parallax'][$column_container_no] = "";
                        if (empty($_POST['traveladvisor_section_css_id'][$column_container_no]))
                            $_POST['traveladvisor_section_css_id'][$column_container_no] = "";
                        if (empty($_POST['traveladvisor_section_view'][$column_rand_id]['0']))
                            $_POST['traveladvisor_section_view'][$column_rand_id] = "";
                        if (empty($_POST['traveladvisor_layout'][$column_rand_id]['0']))
                            $_POST['traveladvisor_layout'][$column_rand_id]['0'] = "";
                        $column_container->addAttribute('traveladvisor_var_section_title', isset($_POST['traveladvisor_var_section_title_array'][$column_container_no]) ? $_POST['traveladvisor_var_section_title_array'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_var_section_subtitle', isset($_POST['traveladvisor_var_section_subtitle_array'][$column_container_no]) ? $_POST['traveladvisor_var_section_subtitle_array'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_background_option', isset($_POST['traveladvisor_section_background_option'][$column_container_no]) ? $_POST['traveladvisor_section_background_option'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_title_align_option', isset($_POST['traveladvisor_section_title_align_option'][$column_container_no]) ? $_POST['traveladvisor_section_title_align_option'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_title_color', isset($_POST['traveladvisor_section_title_color'][$column_container_no]) ? $_POST['traveladvisor_section_title_color'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_sub_title_color', isset($_POST['traveladvisor_section_sub_title_color'][$column_container_no]) ? $_POST['traveladvisor_section_sub_title_color'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_bg_image', isset($_POST['traveladvisor_var_section_bg_image_array'][$column_container_no]) ? $_POST['traveladvisor_var_section_bg_image_array'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_bg_image_position', isset($_POST['traveladvisor_section_bg_image_position'][$column_container_no]) ? $_POST['traveladvisor_section_bg_image_position'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_bg_image_repeat', isset($_POST['traveladvisor_section_bg_image_repeat'][$column_container_no]) ? $_POST['traveladvisor_section_bg_image_repeat'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_flex_slider', isset($_POST['traveladvisor_section_flex_slider'][$column_container_no]) ? $_POST['traveladvisor_section_flex_slider'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_custom_slider', isset($_POST['traveladvisor_section_custom_slider'][$column_container_no]) ? $_POST['traveladvisor_section_custom_slider'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_video_url', isset($_POST['traveladvisor_section_video_url'][$column_container_no]) ? $_POST['traveladvisor_section_video_url'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_video_mute', isset($_POST['traveladvisor_section_video_mute'][$column_container_no]) ? $_POST['traveladvisor_section_video_mute'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_video_autoplay', isset($_POST['traveladvisor_section_video_autoplay'][$column_container_no]) ? $_POST['traveladvisor_section_video_autoplay'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_bg_color', isset($_POST['traveladvisor_section_bg_color'][$column_container_no]) ? $_POST['traveladvisor_section_bg_color'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_padding_top', isset($_POST['traveladvisor_section_padding_top'][$column_container_no]) ? $_POST['traveladvisor_section_padding_top'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_padding_bottom', isset($_POST['traveladvisor_section_padding_bottom'][$column_container_no]) ? $_POST['traveladvisor_section_padding_bottom'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_border_bottom', isset($_POST['traveladvisor_section_border_bottom'][$column_container_no]) ? $_POST['traveladvisor_section_border_bottom'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_border_top', isset($_POST['traveladvisor_section_border_top'][$column_container_no]) ? $_POST['traveladvisor_section_border_top'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_border_color', isset($_POST['traveladvisor_section_border_color'][$column_container_no]) ? $_POST['traveladvisor_section_border_color'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_margin_top', isset($_POST['traveladvisor_section_margin_top'][$column_container_no]) ? $_POST['traveladvisor_section_margin_top'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_margin_bottom', isset($_POST['traveladvisor_section_margin_bottom'][$column_container_no]) ? $_POST['traveladvisor_section_margin_bottom'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_parallax', isset($_POST['traveladvisor_section_parallax'][$column_container_no]) ? $_POST['traveladvisor_section_parallax'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_css_id', isset($_POST['traveladvisor_section_css_id'][$column_container_no]) ? $_POST['traveladvisor_section_css_id'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_section_view', isset($_POST['traveladvisor_section_view'][$column_container_no]) ? $_POST['traveladvisor_section_view'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_layout', isset($_POST['traveladvisor_layout'][$column_rand_id]['0']) ? $_POST['traveladvisor_layout'][$column_rand_id]['0'] : '');
                        $column_container->addAttribute('traveladvisor_sidebar_left', isset($_POST['traveladvisor_sidebar_left'][$column_container_no]) ? $_POST['traveladvisor_sidebar_left'][$column_container_no] : '');
                        $column_container->addAttribute('traveladvisor_sidebar_right', isset($_POST['traveladvisor_sidebar_right'][$column_container_no]) ? $_POST['traveladvisor_sidebar_right'][$column_container_no] : '');
                        // Sections Element Attributes end
                        for ($i = 0; $i < $count_column; $i++) {
                            $column = $column_container->addChild('column');
                            $a = $_POST['total_widget'][$widget_no];
                            for ($j = 1; $j <= $a; $j++) {
                                $page_element_id++;
                                // Save Column page element 
                                if ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "flex_column") {
                                    $shortcode = '';
                                    $flex_column = $column->addChild('flex_column');
                                    $flex_column->addChild('page_element_size', htmlspecialchars($_POST['flex_column_element_size'][$traveladvisor_global_counter_column]));
                                    $flex_column->addChild('flex_column_element_size', htmlspecialchars($_POST['flex_column_element_size'][$traveladvisor_global_counter_column]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes(htmlspecialchars(( $_POST['shortcode']['flex_column'][$traveladvisor_shortcode_counter_column]), ENT_QUOTES));
                                        $traveladvisor_shortcode_counter_column++;
                                        $flex_column->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        $shortcode = '[traveladvisor_column ';
                                        if (isset($_POST['traveladvisor_var_column_size'][$traveladvisor_counter_column]) && $_POST['traveladvisor_var_column_size'][$traveladvisor_counter_column] != '') {
                                            $shortcode .= 'traveladvisor_var_column_size="' . stripslashes(htmlspecialchars(($_POST['traveladvisor_var_column_size'][$traveladvisor_counter_column]), ENT_QUOTES)) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_column_section_title'][$traveladvisor_counter_column]) && $_POST['traveladvisor_var_column_section_title'][$traveladvisor_counter_column] != '') {
                                            $shortcode .= 'traveladvisor_var_column_section_title="' . stripslashes(htmlspecialchars(($_POST['traveladvisor_var_column_section_title'][$traveladvisor_counter_column]), ENT_QUOTES)) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_column_top_padding'][$traveladvisor_counter_column]) && $_POST['traveladvisor_var_column_top_padding'][$traveladvisor_counter_column] != '') {
                                            $shortcode .= 'traveladvisor_var_column_top_padding="' . stripslashes(htmlspecialchars(($_POST['traveladvisor_var_column_top_padding'][$traveladvisor_counter_column]), ENT_QUOTES)) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_column_bottom_padding'][$traveladvisor_counter_column]) && $_POST['traveladvisor_var_column_bottom_padding'][$traveladvisor_counter_column] != '') {
                                            $shortcode .= 'traveladvisor_var_column_bottom_padding="' . stripslashes(htmlspecialchars(($_POST['traveladvisor_var_column_bottom_padding'][$traveladvisor_counter_column]), ENT_QUOTES)) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_column_left_padding'][$traveladvisor_counter_column]) && $_POST['traveladvisor_var_column_left_padding'][$traveladvisor_counter_column] != '') {
                                            $shortcode .= 'traveladvisor_var_column_left_padding="' . stripslashes(htmlspecialchars(($_POST['traveladvisor_var_column_left_padding'][$traveladvisor_counter_column]), ENT_QUOTES)) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_column_right_padding'][$traveladvisor_counter_column]) && $_POST['traveladvisor_var_column_right_padding'][$traveladvisor_counter_column] != '') {
                                            $shortcode .= 'traveladvisor_var_column_right_padding="' . stripslashes(htmlspecialchars(($_POST['traveladvisor_var_column_right_padding'][$traveladvisor_counter_column]), ENT_QUOTES)) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_column_image_url_array'][$traveladvisor_counter_column]) && $_POST['traveladvisor_var_column_image_url_array'][$traveladvisor_counter_column] != '') {
                                            $shortcode .= 'traveladvisor_var_column_image_url_array="' . htmlspecialchars($_POST['traveladvisor_var_column_image_url_array'][$traveladvisor_counter_column], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_column_title_color'][$traveladvisor_counter_column]) && $_POST['traveladvisor_var_column_title_color'][$traveladvisor_counter_column] != '') {
                                            $shortcode .= 'traveladvisor_var_column_title_color="' . htmlspecialchars($_POST['traveladvisor_var_column_title_color'][$traveladvisor_counter_column], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_column_bg_color'][$traveladvisor_counter_column]) && $_POST['traveladvisor_var_column_bg_color'][$traveladvisor_counter_column] != '') {
                                            $shortcode .= 'traveladvisor_var_column_bg_color="' . htmlspecialchars($_POST['traveladvisor_var_column_bg_color'][$traveladvisor_counter_column], ENT_QUOTES) . '" ';
                                        }
                                        $shortcode .= ']';
                                        if (isset($_POST['traveladvisor_var_column_content'][$traveladvisor_counter_column]) && $_POST['traveladvisor_var_column_content'][$traveladvisor_counter_column] != '') {
                                            $shortcode .= htmlspecialchars($_POST['traveladvisor_var_column_content'][$traveladvisor_counter_column], ENT_QUOTES) . ' ';
                                        }
                                        $shortcode .= '[/traveladvisor_column]';
                                        $flex_column->addChild('traveladvisor_shortcode', $shortcode);
                                        $traveladvisor_counter_column++;
                                    }
                                    $traveladvisor_global_counter_column++;
                                } elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "blog") {
                                    $shortcode = '';
                                    $blog = $column->addChild('blog');
                                    $blog->addChild('page_element_size', htmlspecialchars($_POST['blog_element_size'][$traveladvisor_global_counter_blog]));
                                    $blog->addChild('blog_element_size', htmlspecialchars($_POST['blog_element_size'][$traveladvisor_global_counter_blog]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes(htmlspecialchars(( $_POST['shortcode']['blog'][$traveladvisor_shortcode_counter_blog]), ENT_QUOTES));
                                        $traveladvisor_shortcode_counter_blog++;
                                        $blog->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        $shortcode = '[traveladvisor_blog ';
                                        if (isset($_POST['traveladvisor_var_blog_title'][$traveladvisor_counter_blog]) && $_POST['traveladvisor_var_blog_title'][$traveladvisor_counter_blog] != '') {
                                            $shortcode .= 'traveladvisor_var_blog_title="' . stripslashes(htmlspecialchars(($_POST['traveladvisor_var_blog_title'][$traveladvisor_counter_blog]), ENT_QUOTES)) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_blog_subtitle'][$traveladvisor_counter_blog]) && $_POST['traveladvisor_var_blog_subtitle'][$traveladvisor_counter_blog] != '') {
                                            $shortcode .= 'traveladvisor_var_blog_subtitle="' . htmlspecialchars($_POST['traveladvisor_var_blog_subtitle'][$traveladvisor_counter_blog], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_blog_category'][$traveladvisor_counter_blog]) && $_POST['traveladvisor_var_blog_category'][$traveladvisor_counter_blog] != '') {
                                            $shortcode .= 'traveladvisor_var_blog_category="' . htmlspecialchars($_POST['traveladvisor_var_blog_category'][$traveladvisor_counter_blog], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_blog_column'][$traveladvisor_counter_blog]) && $_POST['traveladvisor_var_blog_column'][$traveladvisor_counter_blog] != '') {
                                            $shortcode .= 'traveladvisor_var_blog_column="' . htmlspecialchars($_POST['traveladvisor_var_blog_column'][$traveladvisor_counter_blog], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_blog_view'][$traveladvisor_counter_blog]) && $_POST['traveladvisor_var_blog_view'][$traveladvisor_counter_blog] != '') {
                                            $shortcode .= 'traveladvisor_var_blog_view="' . htmlspecialchars($_POST['traveladvisor_var_blog_view'][$traveladvisor_counter_blog], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_blog_orderby'][$traveladvisor_counter_blog]) && $_POST['traveladvisor_var_blog_orderby'][$traveladvisor_counter_blog] != '') {
                                            $shortcode .= 'traveladvisor_var_blog_orderby="' . htmlspecialchars($_POST['traveladvisor_var_blog_orderby'][$traveladvisor_counter_blog], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_blog_description'][$traveladvisor_counter_blog]) && $_POST['traveladvisor_var_blog_description'][$traveladvisor_counter_blog] != '') {
                                            $shortcode .= 'traveladvisor_var_blog_description="' . htmlspecialchars($_POST['traveladvisor_var_blog_description'][$traveladvisor_counter_blog], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_blog_excerpt'][$traveladvisor_counter_blog]) && $_POST['traveladvisor_var_blog_excerpt'][$traveladvisor_counter_blog] != '') {
                                            $shortcode .= 'traveladvisor_var_blog_excerpt="' . htmlspecialchars($_POST['traveladvisor_var_blog_excerpt'][$traveladvisor_counter_blog], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_blog_num_post'][$traveladvisor_counter_blog]) && $_POST['traveladvisor_var_blog_num_post'][$traveladvisor_counter_blog] != '') {
                                            $shortcode .= 'traveladvisor_var_blog_num_post="' . htmlspecialchars($_POST['traveladvisor_var_blog_num_post'][$traveladvisor_counter_blog], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_blog_pagination'][$traveladvisor_counter_blog]) && $_POST['traveladvisor_var_blog_pagination'][$traveladvisor_counter_blog] != '') {
                                            $shortcode .= 'traveladvisor_var_blog_pagination="' . htmlspecialchars($_POST['traveladvisor_var_blog_pagination'][$traveladvisor_counter_blog], ENT_QUOTES) . '" ';
                                        }
                                        $shortcode .= ']';
                                        if (isset($_POST['blog_text'][$traveladvisor_counter_blog]) && $_POST['blog_text'][$traveladvisor_counter_blog] != '') {
                                            $shortcode .= htmlspecialchars($_POST['blog_text'][$traveladvisor_counter_blog], ENT_QUOTES) . ' ';
                                        }
                                        $shortcode .= '[/traveladvisor_blog]';
                                        $blog->addChild('traveladvisor_shortcode', $shortcode);
                                        $traveladvisor_counter_blog++;
                                    }
                                    $traveladvisor_global_counter_blog++;
                                } elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "quote") {
                                    $traveladvisor_var_quote = '';
                                    $quote = $column->addChild('quote');
                                    $quote->addChild('page_element_size', htmlspecialchars($_POST['quote_element_size'][$traveladvisor_global_counter_quote]));
                                    $quote->addChild('quote_element_size', htmlspecialchars($_POST['quote_element_size'][$traveladvisor_global_counter_quote]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes(htmlspecialchars(( $_POST['shortcode']['quote'][$traveladvisor_shortcode_counter_quote]), ENT_QUOTES));
                                        $traveladvisor_shortcode_counter_quote++;
                                        $quote->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        $traveladvisor_var_quote = '[traveladvisor_quote ';
                                        if (isset($_POST['traveladvisor_var_quote_title'][$traveladvisor_counter_quote]) && $_POST['traveladvisor_var_quote_title'][$traveladvisor_counter_quote] != '') {
                                            $traveladvisor_var_quote .= 'traveladvisor_var_quote_title="' . stripslashes(htmlspecialchars(($_POST['traveladvisor_var_quote_title'][$traveladvisor_counter_quote]), ENT_QUOTES)) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_quote_author_name'][$traveladvisor_counter_quote]) && $_POST['traveladvisor_var_quote_author_name'][$traveladvisor_counter_quote] != '') {
                                            $traveladvisor_var_quote .= 'traveladvisor_var_quote_author_name="' . htmlspecialchars($_POST['traveladvisor_var_quote_author_name'][$traveladvisor_counter_quote], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_quote_author_url'][$traveladvisor_counter_quote]) && $_POST['traveladvisor_var_quote_author_url'][$traveladvisor_counter_quote] != '') {
                                            $traveladvisor_var_quote .= 'traveladvisor_var_quote_author_url="' . htmlspecialchars($_POST['traveladvisor_var_quote_author_url'][$traveladvisor_counter_quote], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_quote_text_color'][$traveladvisor_counter_quote]) && $_POST['traveladvisor_var_quote_text_color'][$traveladvisor_counter_quote] != '') {
                                            $traveladvisor_var_quote .= 'traveladvisor_var_quote_text_color="' . htmlspecialchars($_POST['traveladvisor_var_quote_text_color'][$traveladvisor_counter_quote], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_quote_text_align'][$traveladvisor_counter_quote]) && $_POST['traveladvisor_var_quote_text_align'][$traveladvisor_counter_quote] != '') {
                                            $traveladvisor_var_quote .= 'traveladvisor_var_quote_text_align="' . htmlspecialchars($_POST['traveladvisor_var_quote_text_align'][$traveladvisor_counter_quote], ENT_QUOTES) . '" ';
                                        }
                                        $traveladvisor_var_quote .= ']';
                                        if (isset($_POST['traveladvisor_quote_text'][$traveladvisor_counter_quote]) && $_POST['traveladvisor_quote_text'][$traveladvisor_counter_quote] != '') {
                                            $traveladvisor_var_quote .= htmlspecialchars($_POST['traveladvisor_quote_text'][$traveladvisor_counter_quote], ENT_QUOTES) . ' ';
                                        }
                                        $traveladvisor_var_quote .= '[/traveladvisor_quote]';
                                        $quote->addChild('traveladvisor_shortcode', $traveladvisor_var_quote);
                                        $traveladvisor_counter_quote++;
                                    }
                                    $traveladvisor_global_counter_quote++;
                                } elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "heading") {
                                    $traveladvisor_var_heading = '';
                                    $heading = $column->addChild('heading');
                                    $heading->addChild('page_element_size', htmlspecialchars($_POST['heading_element_size'][$traveladvisor_global_counter_heading]));
                                    $heading->addChild('heading_element_size', htmlspecialchars($_POST['heading_element_size'][$traveladvisor_global_counter_heading]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes(htmlspecialchars(( $_POST['shortcode']['heading'][$traveladvisor_shortcode_counter_heading]), ENT_QUOTES));
                                        $traveladvisor_shortcode_counter_heading++;
                                        $heading->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        $traveladvisor_var_heading = '[traveladvisor_heading ';
                                        if (isset($_POST['traveladvisor_var_heading_section_title'][$traveladvisor_counter_heading]) && $_POST['traveladvisor_var_heading_section_title'][$traveladvisor_counter_heading] != '') {
                                            $traveladvisor_var_heading .= 'traveladvisor_var_heading_section_title="' . stripslashes(htmlspecialchars(($_POST['traveladvisor_var_heading_section_title'][$traveladvisor_counter_heading]), ENT_QUOTES)) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_column'][$traveladvisor_counter_heading]) && $_POST['traveladvisor_var_column'][$traveladvisor_counter_heading] != '') {
                                            $traveladvisor_var_heading .= 'traveladvisor_var_column="' . htmlspecialchars($_POST['traveladvisor_var_column'][$traveladvisor_counter_heading], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_sub_heading_title'][$traveladvisor_counter_heading]) && $_POST['traveladvisor_var_sub_heading_title'][$traveladvisor_counter_heading] != '') {
                                            $traveladvisor_var_heading .= 'traveladvisor_var_sub_heading_title="' . htmlspecialchars($_POST['traveladvisor_var_sub_heading_title'][$traveladvisor_counter_heading], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_heading_font_spacing'][$traveladvisor_counter_heading]) && $_POST['traveladvisor_var_heading_font_spacing'][$traveladvisor_counter_heading] != '') {
                                            $traveladvisor_var_heading .= 'traveladvisor_var_heading_font_spacing="' . htmlspecialchars($_POST['traveladvisor_var_heading_font_spacing'][$traveladvisor_counter_heading], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_heading_margin_bottom'][$traveladvisor_counter_heading]) && $_POST['traveladvisor_var_heading_margin_bottom'][$traveladvisor_counter_heading] != '') {
                                            $traveladvisor_var_heading .= 'traveladvisor_var_heading_margin_bottom="' . htmlspecialchars($_POST['traveladvisor_var_heading_margin_bottom'][$traveladvisor_counter_heading], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_text_transform'][$traveladvisor_counter_heading]) && $_POST['traveladvisor_var_text_transform'][$traveladvisor_counter_heading] != '') {
                                            $traveladvisor_var_heading .= 'traveladvisor_var_text_transform="' . htmlspecialchars($_POST['traveladvisor_var_text_transform'][$traveladvisor_counter_heading], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_heading_sub_content_color'][$traveladvisor_counter_heading]) && $_POST['traveladvisor_var_heading_sub_content_color'][$traveladvisor_counter_heading] != '') {
                                            $traveladvisor_var_heading .= 'traveladvisor_var_heading_sub_content_color="' . htmlspecialchars($_POST['traveladvisor_var_heading_sub_content_color'][$traveladvisor_counter_heading], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_heading_font_size'][$traveladvisor_counter_heading]) && $_POST['traveladvisor_var_heading_font_size'][$traveladvisor_counter_heading] != '') {
                                            $traveladvisor_var_heading .= 'traveladvisor_var_heading_font_size="' . htmlspecialchars($_POST['traveladvisor_var_heading_font_size'][$traveladvisor_counter_heading], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_heading_color'][$traveladvisor_counter_heading]) && $_POST['traveladvisor_var_heading_color'][$traveladvisor_counter_heading] != '') {
                                            $traveladvisor_var_heading .= 'traveladvisor_var_heading_color="' . htmlspecialchars($_POST['traveladvisor_var_heading_color'][$traveladvisor_counter_heading], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_heading_content_color'][$traveladvisor_counter_heading]) && $_POST['traveladvisor_var_heading_content_color'][$traveladvisor_counter_heading] != '') {
                                            $traveladvisor_var_heading .= 'traveladvisor_var_heading_content_color="' . htmlspecialchars($_POST['traveladvisor_var_heading_content_color'][$traveladvisor_counter_heading], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_heading_style'][$traveladvisor_counter_heading]) && $_POST['traveladvisor_var_heading_style'][$traveladvisor_counter_heading] != '') {
                                            $traveladvisor_var_heading .= 'traveladvisor_var_heading_style="' . htmlspecialchars($_POST['traveladvisor_var_heading_style'][$traveladvisor_counter_heading], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_heading_align'][$traveladvisor_counter_heading]) && $_POST['traveladvisor_var_heading_align'][$traveladvisor_counter_heading] != '') {
                                            $traveladvisor_var_heading .= 'traveladvisor_var_heading_align="' . htmlspecialchars($_POST['traveladvisor_var_heading_align'][$traveladvisor_counter_heading], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_heading_font_style'][$traveladvisor_counter_heading]) && $_POST['traveladvisor_var_heading_font_style'][$traveladvisor_counter_heading] != '') {
                                            $traveladvisor_var_heading .= 'traveladvisor_var_heading_font_style="' . htmlspecialchars($_POST['traveladvisor_var_heading_font_style'][$traveladvisor_counter_heading], ENT_QUOTES) . '" ';
                                        }
                                        $traveladvisor_var_heading .= ']';
                                        if (isset($_POST['heading_text'][$traveladvisor_counter_heading]) && $_POST['heading_text'][$traveladvisor_counter_heading] != '') {
                                            $traveladvisor_var_heading .= htmlspecialchars($_POST['heading_text'][$traveladvisor_counter_heading], ENT_QUOTES) . ' ';
                                        }
                                        $traveladvisor_var_heading .= '[/traveladvisor_heading]';
                                        $heading->addChild('traveladvisor_shortcode', $traveladvisor_var_heading);
                                        $traveladvisor_counter_heading++;
                                    }
                                    $traveladvisor_global_counter_heading++;
                                } elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "gallery") {
                                    $traveladvisor_var_shortcode = '';
                                    $traveladvisor_var_gallery = $column->addChild('gallery');
                                    $traveladvisor_var_gallery->addChild('page_element_size', htmlspecialchars($_POST['gallery_element_size'][$traveladvisor_global_counter_gallery]));
                                    $traveladvisor_var_gallery->addChild('gallery_element_size', htmlspecialchars($_POST['gallery_element_size'][$traveladvisor_global_counter_gallery]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes(htmlspecialchars(( $_POST['shortcode']['gallery'][$traveladvisor_shortcode_counter_gallery]), ENT_QUOTES));
                                        $traveladvisor_shortcode_counter_gallery++;
                                        $traveladvisor_var_gallery->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        $traveladvisor_var_shortcode = '[traveladvisor_gallery ';
                                        if (isset($_POST['traveladvisor_var_gallery_element_title'][$traveladvisor_counter_gallery]) && $_POST['traveladvisor_var_gallery_element_title'][$traveladvisor_counter_gallery] != '') {
                                            $traveladvisor_var_shortcode .= 'traveladvisor_var_gallery_element_title="' . stripslashes(htmlspecialchars(($_POST['traveladvisor_var_gallery_element_title'][$traveladvisor_counter_gallery]), ENT_QUOTES)) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_gallery_element_subtitle'][$traveladvisor_counter_gallery]) && $_POST['traveladvisor_var_gallery_element_subtitle'][$traveladvisor_counter_gallery] != '') {
                                            $traveladvisor_var_shortcode .= 'traveladvisor_var_gallery_element_subtitle="' . htmlspecialchars($_POST['traveladvisor_var_gallery_element_subtitle'][$traveladvisor_counter_gallery], ENT_QUOTES) . '" ';
                                        }

                                        if (isset($_POST['traveladvisor_var_gallery_category'][$traveladvisor_counter_gallery]) && $_POST['traveladvisor_var_gallery_category'][$traveladvisor_counter_gallery] != '') {
                                            $traveladvisor_var_shortcode .= 'traveladvisor_var_gallery_category="' . htmlspecialchars($_POST['traveladvisor_var_gallery_category'][$traveladvisor_counter_gallery], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_gallery_paging_uniqe_style'][$traveladvisor_counter_gallery]) && $_POST['traveladvisor_var_gallery_paging_uniqe_style'][$traveladvisor_counter_gallery] != '') {
                                            $traveladvisor_var_shortcode .= 'traveladvisor_var_gallery_paging_uniqe_style="' . htmlspecialchars($_POST['traveladvisor_var_gallery_paging_uniqe_style'][$traveladvisor_counter_gallery], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_gallery_paging_filter_style'][$traveladvisor_counter_gallery]) && $_POST['traveladvisor_var_gallery_paging_filter_style'][$traveladvisor_counter_gallery] != '') {
                                            $traveladvisor_var_shortcode .= 'traveladvisor_var_gallery_paging_filter_style="' . htmlspecialchars($_POST['traveladvisor_var_gallery_paging_filter_style'][$traveladvisor_counter_gallery], ENT_QUOTES) . '" ';
                                        }

                                        if (isset($_POST['traveladvisor_var_gallery_item_per_page'][$traveladvisor_counter_gallery]) && $_POST['traveladvisor_var_gallery_item_per_page'][$traveladvisor_counter_gallery] != '') {
                                            $traveladvisor_var_shortcode .= 'traveladvisor_var_gallery_item_per_page="' . htmlspecialchars($_POST['traveladvisor_var_gallery_item_per_page'][$traveladvisor_counter_gallery], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_gallery_column'][$traveladvisor_counter_gallery]) && $_POST['traveladvisor_var_gallery_column'][$traveladvisor_counter_gallery] != '') {
                                            $traveladvisor_var_shortcode .= 'traveladvisor_var_gallery_column="' . htmlspecialchars($_POST['traveladvisor_var_gallery_column'][$traveladvisor_counter_gallery], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_gallery_excerpt'][$traveladvisor_counter_gallery]) && $_POST['traveladvisor_var_gallery_excerpt'][$traveladvisor_counter_gallery] != '') {
                                            $traveladvisor_var_shortcode .= 'traveladvisor_var_gallery_excerpt="' . htmlspecialchars($_POST['traveladvisor_var_gallery_excerpt'][$traveladvisor_counter_gallery], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_gallery_excerpt_length'][$traveladvisor_counter_gallery]) && $_POST['traveladvisor_var_gallery_excerpt_length'][$traveladvisor_counter_gallery] != '') {
                                            $traveladvisor_var_shortcode .= 'traveladvisor_var_gallery_excerpt_length="' . htmlspecialchars($_POST['traveladvisor_var_gallery_excerpt_length'][$traveladvisor_counter_gallery], ENT_QUOTES) . '" ';
                                        }
                                        $traveladvisor_var_shortcode .= ']';
                                        if (isset($_POST['gallery_text'][$traveladvisor_counter_gallery]) && $_POST['gallery_text'][$traveladvisor_counter_gallery] != '') {
                                            $traveladvisor_var_shortcode .= htmlspecialchars($_POST['gallery_text'][$traveladvisor_counter_gallery], ENT_QUOTES) . ' ';
                                        }
                                        $traveladvisor_var_shortcode .= '[/traveladvisor_gallery]';
                                        $traveladvisor_var_gallery->addChild('traveladvisor_shortcode', $traveladvisor_var_shortcode);
                                        $traveladvisor_counter_gallery++;
                                    }
                                    $traveladvisor_global_counter_gallery++;
                                } elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "testimonial") {
                                    $traveladvisor_var_testimonial = '';
                                    $testimonial = $column->addChild('testimonial');
                                    $testimonial->addChild('page_element_size', htmlspecialchars($_POST['testimonial_element_size'][$traveladvisor_global_counter_testimonial]));
                                    $testimonial->addChild('testimonial_element_size', htmlspecialchars($_POST['testimonial_element_size'][$traveladvisor_global_counter_testimonial]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes($_POST['shortcode']['testimonial'][$traveladvisor_shortcode_counter_testimonial]);
                                        $traveladvisor_shortcode_counter_testimonial++;
                                        $testimonial->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        if (isset($_POST['testimonial_num'][$traveladvisor_counter_testimonial]) && $_POST['testimonial_num'][$traveladvisor_counter_testimonial] > 0) {
                                            for ($i = 1; $i <= $_POST['testimonial_num'][$traveladvisor_counter_testimonial]; $i++) {
                                                $traveladvisor_var_testimonial.= '[testimonial_item ';
                                                if (isset($_POST['traveladvisor_var_testimonial_title'][$traveladvisor_counter_testimonial_node]) && $_POST['traveladvisor_var_testimonial_title'][$traveladvisor_counter_testimonial_node] != '') {
                                                    $traveladvisor_var_testimonial .= 'traveladvisor_var_testimonial_title="' . htmlspecialchars($_POST['traveladvisor_var_testimonial_title'][$traveladvisor_counter_testimonial_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_testimonial_author'][$traveladvisor_counter_testimonial_node]) && $_POST['traveladvisor_var_testimonial_author'][$traveladvisor_counter_testimonial_node] != '') {
                                                    $traveladvisor_var_testimonial .= 'traveladvisor_var_testimonial_author="' . htmlspecialchars($_POST['traveladvisor_var_testimonial_author'][$traveladvisor_counter_testimonial_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_testimonial_desigination'][$traveladvisor_counter_testimonial_node]) && $_POST['traveladvisor_var_testimonial_desigination'][$traveladvisor_counter_testimonial_node] != '') {
                                                    $traveladvisor_var_testimonial .= 'traveladvisor_var_testimonial_desigination="' . htmlspecialchars($_POST['traveladvisor_var_testimonial_desigination'][$traveladvisor_counter_testimonial_node], ENT_QUOTES) . '" ';
                                                }

                                                $traveladvisor_var_testimonial .= ']';
                                                if (isset($_POST['traveladvisor_var_testimonial_text'][$traveladvisor_counter_testimonial_node]) && $_POST['traveladvisor_var_testimonial_text'][$traveladvisor_counter_testimonial_node] != '') {
                                                    $traveladvisor_var_testimonial .= htmlspecialchars($_POST['traveladvisor_var_testimonial_text'][$traveladvisor_counter_testimonial_node], ENT_QUOTES);
                                                }
                                                $traveladvisor_var_testimonial .= '[/testimonial_item]';
                                                $traveladvisor_counter_testimonial_node++;
                                            }
                                        }
                                        $section_title = '';
                                        if (isset($_POST['traveladvisor_var_testimonial_element_title'][$traveladvisor_counter_testimonial]) && $_POST['traveladvisor_var_testimonial_element_title'][$traveladvisor_counter_testimonial] != '') {
                                            $section_title .= 'traveladvisor_var_testimonial_element_title="' . htmlspecialchars($_POST['traveladvisor_var_testimonial_element_title'][$traveladvisor_counter_testimonial], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_author_color'][$traveladvisor_counter_testimonial]) && $_POST['traveladvisor_var_author_color'][$traveladvisor_counter_testimonial] != '') {
                                            $section_title .= 'traveladvisor_var_author_color="' . htmlspecialchars($_POST['traveladvisor_var_author_color'][$traveladvisor_counter_testimonial], ENT_QUOTES) . '" ';
                                        }
                                        $shortcode = '[traveladvisor_testimonial ' . $section_title . ' ]' . $traveladvisor_var_testimonial . '[/traveladvisor_testimonial]';
                                        $testimonial->addChild('traveladvisor_shortcode', $shortcode);
                                        $traveladvisor_counter_testimonial++;
                                    }
                                    $traveladvisor_global_counter_testimonial++;
                                }
                                // video fields
                                else if (isset($_POST['traveladvisor_orderby'][$traveladvisor_counter]) && $_POST['traveladvisor_orderby'][$traveladvisor_counter] == "video") {
                                    $shortcode = '';
                                    $video = $column->addChild('video');
                                    $video->addChild('page_element_size', htmlspecialchars($_POST['video_element_size'][$traveladvisor_global_counter_video]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes($_POST['shortcode']['video'][$traveladvisor_shortcode_counter_video]);
                                        $traveladvisor_shortcode_counter_video++;
                                        $video->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        $shortcode .= '[traveladvisor_video ';
                                        if (isset($_POST['traveladvisor_var_video_title'][$traveladvisor_counter_video]) && $_POST['traveladvisor_var_video_title'][$traveladvisor_counter_video] != '') {
                                            $shortcode .='traveladvisor_var_video_title="' . htmlspecialchars($_POST['traveladvisor_var_video_title'][$traveladvisor_counter_video], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_video_url'][$traveladvisor_counter_video]) && $_POST['traveladvisor_var_video_url'][$traveladvisor_counter_video] != '') {
                                            $shortcode .='traveladvisor_var_video_url="' . htmlspecialchars($_POST['traveladvisor_var_video_url'][$traveladvisor_counter_video], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_video_width'][$traveladvisor_counter_video]) && $_POST['traveladvisor_var_video_width'][$traveladvisor_counter_video] != '') {
                                            $shortcode .='traveladvisor_var_video_width="' . htmlspecialchars($_POST['traveladvisor_var_video_width'][$traveladvisor_counter_video]) . '" ';
                                        }
                                        $shortcode .= ']';
                                        $video->addChild('traveladvisor_shortcode', $shortcode);
                                        $traveladvisor_counter_video++;
                                    }
                                    $traveladvisor_global_counter_video++;
                                } elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "accordion") {
                                    $shortcode_item = '';
                                    $traveladvisor_var_accordion = '';
                                    $accordion = $column->addChild('accordion');
                                    $accordion->addChild('page_element_size', htmlspecialchars($_POST['accordion_element_size'][$traveladvisor_global_counter_accordion]));
                                    $accordion->addChild('accordion_element_size', htmlspecialchars($_POST['accordion_element_size'][$traveladvisor_global_counter_accordion]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes($_POST['shortcode']['accordion'][$traveladvisor_shortcode_counter_accordion]);
                                        $traveladvisor_shortcode_counter_accordion++;
                                        $accordion->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        if (isset($_POST['accordion_num'][$traveladvisor_counter_accordion]) && $_POST['accordion_num'][$traveladvisor_counter_accordion] > 0) {
                                            $traveladvisor_var_accordion = '';
                                            for ($i = 1; $i <= $_POST['accordion_num'][$traveladvisor_counter_accordion]; $i++) {

                                                $traveladvisor_var_accordion .= '[accordion_item ';
                                                if (isset($_POST['traveladvisor_var_accordion_active'][$traveladvisor_counter_accordion_node]) && $_POST['traveladvisor_var_accordion_active'][$traveladvisor_counter_accordion_node] != '') {
                                                    $traveladvisor_var_accordion .= 'traveladvisor_var_accordion_active="' . htmlspecialchars($_POST['traveladvisor_var_accordion_active'][$traveladvisor_counter_accordion_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_accordion_title'][$traveladvisor_counter_accordion_node]) && $_POST['traveladvisor_var_accordion_title'][$traveladvisor_counter_accordion_node] != '') {
                                                    $traveladvisor_var_accordion .= 'traveladvisor_var_accordion_title="' . htmlspecialchars($_POST['traveladvisor_var_accordion_title'][$traveladvisor_counter_accordion_node], ENT_QUOTES) . '" ';
                                                }
                                                $traveladvisor_var_accordion .= ']';
                                                if (isset($_POST['traveladvisor_var_accordion_text'][$traveladvisor_counter_accordion_node]) && $_POST['traveladvisor_var_accordion_text'][$traveladvisor_counter_accordion_node] != '') {
                                                    $traveladvisor_var_accordion .= htmlspecialchars($_POST['traveladvisor_var_accordion_text'][$traveladvisor_counter_accordion_node], ENT_QUOTES);
                                                }
                                                $traveladvisor_var_accordion .= '[/accordion_item]';
                                                $traveladvisor_counter_accordion_node++;
                                            }
                                        }
                                        $section_title = '';
                                        if (isset($_POST['traveladvisor_var_accordian_main_title'][$traveladvisor_counter_accordion]) && $_POST['traveladvisor_var_accordian_main_title'][$traveladvisor_counter_accordion] != '') {
                                            $section_title .= 'traveladvisor_var_accordian_main_title="' . htmlspecialchars($_POST['traveladvisor_var_accordian_main_title'][$traveladvisor_counter_accordion], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_accordion_view'][$traveladvisor_counter_accordion]) && $_POST['traveladvisor_var_accordion_view'][$traveladvisor_counter_accordion] != '') {
                                            $section_title .= 'traveladvisor_var_accordion_view="' . htmlspecialchars($_POST['traveladvisor_var_accordion_view'][$traveladvisor_counter_accordion], ENT_QUOTES) . '" ';
                                        }
                                        $shortcode = '[traveladvisor_accordion ' . $section_title . ' ]' . $traveladvisor_var_accordion . '[/traveladvisor_accordion]';
                                        $accordion->addChild('traveladvisor_shortcode', $shortcode);
                                        $traveladvisor_counter_accordion++;
                                    }
                                    $traveladvisor_global_counter_accordion++;
                                } elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "tabs") {
                                    $shortcode_item = '';
                                    $tabs = $column->addChild('tabs');
                                    $tabs->addChild('page_element_size', htmlspecialchars($_POST['tabs_element_size'][$traveladvisor_global_counter_tabs]));
                                    $tabs->addChild('tabs_element_size', htmlspecialchars($_POST['tabs_element_size'][$traveladvisor_global_counter_tabs]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes($_POST['shortcode']['tabs'][$traveladvisor_shortcode_counter_tabs]);
                                        $traveladvisor_shortcode_counter_tabs++;
                                        $tabs->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        if (isset($_POST['tabs_num'][$traveladvisor_counter_tabs]) && $_POST['tabs_num'][$traveladvisor_counter_tabs] > 0) {
                                            for ($i = 1; $i <= $_POST['tabs_num'][$traveladvisor_counter_tabs]; $i++) {
                                                $shortcode_item .= '[traveladvisor_tabs_item ';
                                                if (isset($_POST['traveladvisor_var_tabs_item_text'][$traveladvisor_counter_tabs_node]) && $_POST['traveladvisor_var_tabs_item_text'][$traveladvisor_counter_tabs_node] != '') {
                                                    $shortcode_item .= 'traveladvisor_var_tabs_item_text="' . htmlspecialchars($_POST['traveladvisor_var_tabs_item_text'][$traveladvisor_counter_tabs_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_tabs_item_icon'][$traveladvisor_counter_tabs_node]) && $_POST['traveladvisor_var_tabs_item_icon'][$traveladvisor_counter_tabs_node] != '') {
                                                    $shortcode_item .= 'traveladvisor_var_tabs_item_icon="' . htmlspecialchars($_POST['traveladvisor_var_tabs_item_icon'][$traveladvisor_counter_tabs_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_tabs_active'][$traveladvisor_counter_tabs_node]) && $_POST['traveladvisor_var_tabs_active'][$traveladvisor_counter_tabs_node] != '') {
                                                    $shortcode_item .= 'traveladvisor_var_tabs_active="' . htmlspecialchars($_POST['traveladvisor_var_tabs_active'][$traveladvisor_counter_tabs_node], ENT_QUOTES) . '" ';
                                                }
                                                $shortcode_item .= ']';
                                                if (isset($_POST['traveladvisor_var_tabs_desc'][$traveladvisor_counter_tabs_node]) && $_POST['traveladvisor_var_tabs_desc'][$traveladvisor_counter_tabs_node] != '') {
                                                    $shortcode_item .= htmlspecialchars($_POST['traveladvisor_var_tabs_desc'][$traveladvisor_counter_tabs_node], ENT_QUOTES);
                                                }
                                                $shortcode_item .= '[/traveladvisor_tabs_item]';
                                                $traveladvisor_counter_tabs_node++;
                                            }
                                        }
                                        $section_title = '';
                                        if (isset($_POST['traveladvisor_var_tabs_title'][$traveladvisor_counter_tabs]) && $_POST['traveladvisor_var_tabs_title'][$traveladvisor_counter_tabs] != '') {
                                            $section_title .= 'traveladvisor_var_tabs_title="' . htmlspecialchars($_POST['traveladvisor_var_tabs_title'][$traveladvisor_counter_tabs], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_tabs_style'][$traveladvisor_counter_tabs]) && $_POST['traveladvisor_var_tabs_style'][$traveladvisor_counter_tabs] != '') {
                                            $section_title .= 'traveladvisor_var_tabs_style="' . htmlspecialchars($_POST['traveladvisor_var_tabs_style'][$traveladvisor_counter_tabs], ENT_QUOTES) . '" ';
                                        }
                                        $shortcode = '[traveladvisor_tabs ' . $section_title . ' ]' . $shortcode_item . '[/traveladvisor_tabs]';
                                        $tabs->addChild('traveladvisor_shortcode', $shortcode);
                                        $traveladvisor_counter_tabs++;
                                    }
                                    $traveladvisor_global_counter_tabs++;
                                } elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "infobox") {
                                    $traveladvisor_var_infobox = '';
                                    $infobox = $column->addChild('infobox');
                                    $infobox->addChild('page_element_size', htmlspecialchars($_POST['infobox_element_size'][$traveladvisor_global_counter_infobox]));
                                    $infobox->addChild('infobox_element_size', htmlspecialchars($_POST['infobox_element_size'][$traveladvisor_global_counter_infobox]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes($_POST['shortcode']['infobox'][$traveladvisor_shortcode_counter_infobox]);
                                        $traveladvisor_shortcode_counter_infobox++;
                                        $infobox->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        if (isset($_POST['infobox_num'][$traveladvisor_counter_infobox]) && $_POST['infobox_num'][$traveladvisor_counter_infobox] > 0) {
                                            for ($i = 1; $i <= $_POST['infobox_num'][$traveladvisor_counter_infobox]; $i++) {
                                                $traveladvisor_var_infobox .= '[traveladvisor_infobox_item ';
                                                if (isset($_POST['traveladvisor_var_infobox_element_title'][$traveladvisor_counter_infobox_node]) && $_POST['traveladvisor_var_infobox_element_title'][$traveladvisor_counter_infobox_node] != '') {
                                                    $traveladvisor_var_infobox .= 'traveladvisor_var_infobox_element_title="' . htmlspecialchars($_POST['traveladvisor_var_infobox_element_title'][$traveladvisor_counter_infobox_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_infobox_icon'][$traveladvisor_counter_infobox_node]) && $_POST['traveladvisor_var_infobox_icon'][$traveladvisor_counter_infobox_node] != '') {
                                                    $traveladvisor_var_infobox .= 'traveladvisor_var_infobox_icon="' . htmlspecialchars($_POST['traveladvisor_var_infobox_icon'][$traveladvisor_counter_infobox_node], ENT_QUOTES) . '" ';
                                                }
                                                $traveladvisor_var_infobox .= ']';
                                                if (isset($_POST['traveladvisor_var_infobox_text'][$traveladvisor_counter_infobox_node]) && $_POST['traveladvisor_var_infobox_text'][$traveladvisor_counter_infobox_node] != '') {
                                                    $traveladvisor_var_infobox .= htmlspecialchars($_POST['traveladvisor_var_infobox_text'][$traveladvisor_counter_infobox_node], ENT_QUOTES);
                                                }
                                                $traveladvisor_var_infobox .= '[/traveladvisor_infobox_item]';
                                                $traveladvisor_counter_infobox_node++;
                                            }
                                        }
                                        $section_title = '';
                                        if (isset($_POST['traveladvisor_var_column_size'][$traveladvisor_counter_infobox_node]) && $_POST['traveladvisor_var_column_size'][$traveladvisor_counter_infobox_node] != '') {
                                            $section_title .= 'traveladvisor_var_column_size="' . htmlspecialchars($_POST['traveladvisor_var_column_size'][$traveladvisor_counter_infobox_node], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_infobox_section_title'][$traveladvisor_counter_infobox]) && $_POST['traveladvisor_var_infobox_section_title'][$traveladvisor_counter_infobox] != '') {
                                            $section_title .= 'traveladvisor_var_infobox_section_title="' . htmlspecialchars($_POST['traveladvisor_var_infobox_section_title'][$traveladvisor_counter_infobox], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_infobox_title_color'][$traveladvisor_counter_infobox]) && $_POST['traveladvisor_var_infobox_title_color'][$traveladvisor_counter_infobox] != '') {
                                            $section_title .= 'traveladvisor_var_infobox_title_color="' . htmlspecialchars($_POST['traveladvisor_var_infobox_title_color'][$traveladvisor_counter_infobox], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_infobox_icon_color'][$traveladvisor_counter_infobox]) && $_POST['traveladvisor_var_infobox_icon_color'][$traveladvisor_counter_infobox] != '') {
                                            $section_title .= 'traveladvisor_var_infobox_icon_color="' . htmlspecialchars($_POST['traveladvisor_var_infobox_icon_color'][$traveladvisor_counter_infobox], ENT_QUOTES) . '" ';
                                        }
                                        $shortcode = '[traveladvisor_infobox ' . $section_title . ' ]' . $traveladvisor_var_infobox . '[/traveladvisor_infobox]';
                                        $infobox->addChild('traveladvisor_shortcode', $shortcode);
                                        $traveladvisor_counter_infobox++;
                                    }
                                    $traveladvisor_global_counter_infobox++;
                                } elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "tabel") {
                                    $traveladvisor_var_table = '';
                                    $tabel = $column->addChild('tabel');
                                    $tabel->addChild('page_element_size', htmlspecialchars($_POST['tabel_element_size'][$traveladvisor_global_counter_tabel]));
                                    $tabel->addChild('tabel_element_size', htmlspecialchars($_POST['tabel_element_size'][$traveladvisor_global_counter_tabel]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes($_POST['shortcode']['tabel'][$traveladvisor_shortcode_counter_tabel]);
                                        $traveladvisor_shortcode_counter_tabel++;
                                        $tabel->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        if (isset($_POST['tabel_num'][$traveladvisor_counter_tabel]) && $_POST['tabel_num'][$traveladvisor_counter_tabel] > 0) {
                                            for ($i = 1; $i <= $_POST['tabel_num'][$traveladvisor_counter_tabel]; $i++) {
                                                $traveladvisor_var_table .= '[traveladvisor_tabel_item ';
                                                if (isset($_POST['traveladvisor_var_tabel_price'][$traveladvisor_counter_tabel_node]) && $_POST['traveladvisor_var_tabel_price'][$traveladvisor_counter_tabel_node] != '') {
                                                    $traveladvisor_var_table .= 'traveladvisor_var_tabel_price="' . htmlspecialchars($_POST['traveladvisor_var_tabel_price'][$traveladvisor_counter_tabel_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_tabel_discount_price'][$traveladvisor_counter_tabel_node]) && $_POST['traveladvisor_var_tabel_discount_price'][$traveladvisor_counter_tabel_node] != '') {
                                                    $traveladvisor_var_table .= 'traveladvisor_var_tabel_discount_price="' . htmlspecialchars($_POST['traveladvisor_var_tabel_discount_price'][$traveladvisor_counter_tabel_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_tabel_net_price'][$traveladvisor_counter_tabel_node]) && $_POST['traveladvisor_var_tabel_net_price'][$traveladvisor_counter_tabel_node] != '') {
                                                    $traveladvisor_var_table .= 'traveladvisor_var_tabel_net_price="' . htmlspecialchars($_POST['traveladvisor_var_tabel_net_price'][$traveladvisor_counter_tabel_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_tabel_fact'][$traveladvisor_counter_tabel_node]) && $_POST['traveladvisor_var_tabel_fact'][$traveladvisor_counter_tabel_node] != '') {
                                                    $traveladvisor_var_table .= 'traveladvisor_var_tabel_fact="' . htmlspecialchars($_POST['traveladvisor_var_tabel_fact'][$traveladvisor_counter_tabel_node], ENT_QUOTES) . '" ';
                                                }
                                                $traveladvisor_var_table .= ']';
                                                $traveladvisor_var_table .= '[/traveladvisor_tabel_item]';
                                                $traveladvisor_counter_tabel_node++;
                                            }
                                        }
                                        $section_title = '';
                                        if (isset($_POST['traveladvisor_var_tabel_title'][$traveladvisor_counter_tabel]) && $_POST['traveladvisor_var_tabel_title'][$traveladvisor_counter_tabel] != '') {
                                            $section_title .= 'traveladvisor_var_tabel_title="' . htmlspecialchars($_POST['traveladvisor_var_tabel_title'][$traveladvisor_counter_tabel], ENT_QUOTES) . '" ';
                                        }
                                        $shortcode = '[traveladvisor_tabel ' . $section_title . ' ]' . $traveladvisor_var_table . '[/traveladvisor_tabel]';
                                        $tabel->addChild('traveladvisor_shortcode', $shortcode);
                                        $traveladvisor_counter_tabel++;
                                    }
                                    $traveladvisor_global_counter_tabel++;
                                }
                                // Icon Box
                                elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "icon_box") {
                                    $traveladvisor_var_multiservices = '';
                                    $icon_box = $column->addChild('icon_box');
                                    $icon_box->addChild('page_element_size', htmlspecialchars($_POST['icon_box_element_size'][$traveladvisor_global_counter_icon_box]));
                                    $icon_box->addChild('icon_box_element_size', htmlspecialchars($_POST['icon_box_element_size'][$traveladvisor_global_counter_icon_box]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes($_POST['shortcode']['icon_box'][$traveladvisor_shortcode_counter_icon_box]);
                                        $traveladvisor_shortcode_counter_icon_box++;
                                        $icon_box->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        if (isset($_POST['icon_box_num'][$traveladvisor_counter_icon_box]) && $_POST['icon_box_num'][$traveladvisor_counter_icon_box] > 0) {
                                            for ($i = 1; $i <= $_POST['icon_box_num'][$traveladvisor_counter_icon_box]; $i++) {
                                                $traveladvisor_var_multiservices .= '[multiple_services_item ';
                                                if (isset($_POST['traveladvisor_var_icon_box_title_color'][$traveladvisor_counter_icon_box_node]) && $_POST['traveladvisor_var_icon_box_title_color'][$traveladvisor_counter_icon_box_node] != '') {
                                                    $traveladvisor_var_multiservices .= 'traveladvisor_var_icon_box_title_color="' . htmlspecialchars($_POST['traveladvisor_var_icon_box_title_color'][$traveladvisor_counter_icon_box_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_multiple_service_title'][$traveladvisor_counter_icon_box_node]) && $_POST['traveladvisor_var_multiple_service_title'][$traveladvisor_counter_icon_box_node] != '') {
                                                    $traveladvisor_var_multiservices .= 'traveladvisor_var_multiple_service_title="' . htmlspecialchars($_POST['traveladvisor_var_multiple_service_title'][$traveladvisor_counter_icon_box_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_icon_box_background_color'][$traveladvisor_counter_icon_box_node]) && $_POST['traveladvisor_var_icon_box_background_color'][$traveladvisor_counter_icon_box_node] != '') {
                                                    $traveladvisor_var_multiservices .= 'traveladvisor_var_icon_box_background_color="' . htmlspecialchars($_POST['traveladvisor_var_icon_box_background_color'][$traveladvisor_counter_icon_box_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_services_icon'][$traveladvisor_counter_icon_box_node]) && $_POST['traveladvisor_var_services_icon'][$traveladvisor_counter_icon_box_node] != '') {
                                                    $traveladvisor_var_multiservices .= 'traveladvisor_var_services_icon="' . htmlspecialchars($_POST['traveladvisor_var_services_icon'][$traveladvisor_counter_icon_box_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_multiple_service_logo_array'][$traveladvisor_counter_icon_box_node]) && $_POST['traveladvisor_var_multiple_service_logo_array'][$traveladvisor_counter_icon_box_node] != '') {
                                                    $traveladvisor_var_multiservices .= 'traveladvisor_var_multiple_service_logo_array="' . htmlspecialchars($_POST['traveladvisor_var_multiple_service_logo_array'][$traveladvisor_counter_icon_box_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_link_url'][$traveladvisor_counter_icon_box_node]) && $_POST['traveladvisor_var_link_url'][$traveladvisor_counter_icon_box_node] != '') {
                                                    $traveladvisor_var_multiservices .= 'traveladvisor_var_link_url="' . htmlspecialchars($_POST['traveladvisor_var_link_url'][$traveladvisor_counter_icon_box_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_icon_box_icon_type'][$traveladvisor_counter_icon_box_node]) && $_POST['traveladvisor_var_icon_box_icon_type'][$traveladvisor_counter_icon_box_node] != '') {
                                                    $traveladvisor_var_multiservices .= 'traveladvisor_var_icon_box_icon_type="' . htmlspecialchars($_POST['traveladvisor_var_icon_box_icon_type'][$traveladvisor_counter_icon_box_node], ENT_QUOTES) . '" ';
                                                }
                                                $traveladvisor_var_multiservices .= ']';
                                                if (isset($_POST['traveladvisor_var_icon_box_text'][$traveladvisor_counter_icon_box_node]) && $_POST['traveladvisor_var_icon_box_text'][$traveladvisor_counter_icon_box_node] != '') {
                                                    $traveladvisor_var_multiservices .= htmlspecialchars($_POST['traveladvisor_var_icon_box_text'][$traveladvisor_counter_icon_box_node], ENT_QUOTES);
                                                }
                                                $traveladvisor_var_multiservices .= '[/multiple_services_item]';
                                                $traveladvisor_counter_icon_box_node++;
                                            }
                                        }
                                        $section_title = '';
                                        if (isset($_POST['traveladvisor_var_icon_box_title'][$traveladvisor_counter_icon_box]) && $_POST['traveladvisor_var_icon_box_title'][$traveladvisor_counter_icon_box] != '') {
                                            $section_title .= 'traveladvisor_var_icon_box_title="' . htmlspecialchars($_POST['traveladvisor_var_icon_box_title'][$traveladvisor_counter_icon_box], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_icon_box_view'][$traveladvisor_counter_icon_box]) && $_POST['traveladvisor_var_icon_box_view'][$traveladvisor_counter_icon_box] != '') {
                                            $section_title .= 'traveladvisor_var_icon_box_view="' . htmlspecialchars($_POST['traveladvisor_var_icon_box_view'][$traveladvisor_counter_icon_box], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_icon_box_content_align'][$traveladvisor_counter_icon_box]) && $_POST['traveladvisor_var_icon_box_content_align'][$traveladvisor_counter_icon_box] != '') {
                                            $section_title .= 'traveladvisor_var_icon_box_content_align="' . htmlspecialchars($_POST['traveladvisor_var_icon_box_content_align'][$traveladvisor_counter_icon_box], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_item_column_size'][$traveladvisor_counter_icon_box]) && $_POST['traveladvisor_var_item_column_size'][$traveladvisor_counter_icon_box] != '') {
                                            $section_title .= 'traveladvisor_var_item_column_size="' . htmlspecialchars($_POST['traveladvisor_var_item_column_size'][$traveladvisor_counter_icon_box], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_title_color'][$traveladvisor_counter_icon_box]) && $_POST['traveladvisor_var_title_color'][$traveladvisor_counter_icon_box] != '') {
                                            $section_title .= 'traveladvisor_var_title_color="' . htmlspecialchars($_POST['traveladvisor_var_title_color'][$traveladvisor_counter_icon_box], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_icon_box_icon_color'][$traveladvisor_counter_icon_box]) && $_POST['traveladvisor_var_icon_box_icon_color'][$traveladvisor_counter_icon_box] != '') {
                                            $section_title .= 'traveladvisor_var_icon_box_icon_color="' . htmlspecialchars($_POST['traveladvisor_var_icon_box_icon_color'][$traveladvisor_counter_icon_box], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_icon_box_bg_color'][$traveladvisor_counter_icon_box]) && $_POST['traveladvisor_var_icon_box_bg_color'][$traveladvisor_counter_icon_box] != '') {
                                            $section_title .= 'traveladvisor_var_icon_box_bg_color="' . htmlspecialchars($_POST['traveladvisor_var_icon_box_bg_color'][$traveladvisor_counter_icon_box], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_icon_box_border_color'][$traveladvisor_counter_icon_box]) && $_POST['traveladvisor_var_icon_box_border_color'][$traveladvisor_counter_icon_box] != '') {
                                            $section_title .= 'traveladvisor_var_icon_box_border_color="' . htmlspecialchars($_POST['traveladvisor_var_icon_box_border_color'][$traveladvisor_counter_icon_box], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_icon_box_border'][$traveladvisor_counter_icon_box]) && $_POST['traveladvisor_var_icon_box_border'][$traveladvisor_counter_icon_box] != '') {
                                            $section_title .= 'traveladvisor_var_icon_box_border="' . htmlspecialchars($_POST['traveladvisor_var_icon_box_border'][$traveladvisor_counter_icon_box], ENT_QUOTES) . '" ';
                                        }
                                        $shortcode = '[icon_box ' . $section_title . ' ]' . $traveladvisor_var_multiservices . '[/icon_box]';
                                        $icon_box->addChild('traveladvisor_shortcode', $shortcode);
                                        $traveladvisor_counter_icon_box++;
                                    }
                                    $traveladvisor_global_counter_icon_box++;
                                }
                                // multi counter
                                elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "counters") {
                                    $traveladvisor_var_multicounters = '';
                                    $multi_counters = $column->addChild('counters');
                                    $multi_counters->addChild('page_element_size', htmlspecialchars($_POST['counters_element_size'][$traveladvisor_global_counter_multi_counters]));
                                    $multi_counters->addChild('counters_element_size', htmlspecialchars($_POST['counters_element_size'][$traveladvisor_global_counter_multi_counters]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes($_POST['shortcode']['counters'][$traveladvisor_shortcode_counter_multi_counters]);
                                        $traveladvisor_shortcode_counter_multi_counters++;
                                        $multi_counters->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        if (isset($_POST['multi_counters_num'][$traveladvisor_counter_multi_counters]) && $_POST['multi_counters_num'][$traveladvisor_counter_multi_counters] > 0) {
                                            for ($i = 1; $i <= $_POST['multi_counters_num'][$traveladvisor_counter_multi_counters]; $i++) {
                                                $traveladvisor_var_multicounters .= '[counters_item ';
                                                if (isset($_POST['traveladvisor_var_multi_counters_title_color'][$traveladvisor_counter_multi_counters_node]) && $_POST['traveladvisor_var_multi_counters_title_color'][$traveladvisor_counter_multi_counters_node] != '') {
                                                    $traveladvisor_var_multicounters .= 'traveladvisor_var_multi_counters_title_color="' . htmlspecialchars($_POST['traveladvisor_var_multi_counters_title_color'][$traveladvisor_counter_multi_counters_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_multiple_counter_title'][$traveladvisor_counter_multi_counters_node]) && $_POST['traveladvisor_var_multiple_counter_title'][$traveladvisor_counter_multi_counters_node] != '') {
                                                    $traveladvisor_var_multicounters .= 'traveladvisor_var_multiple_counter_title="' . htmlspecialchars($_POST['traveladvisor_var_multiple_counter_title'][$traveladvisor_counter_multi_counters_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_multi_counters_background_color'][$traveladvisor_counter_multi_counters_node]) && $_POST['traveladvisor_var_multi_counters_background_color'][$traveladvisor_counter_multi_counters_node] != '') {
                                                    $traveladvisor_var_multicounters .= 'traveladvisor_var_multi_counters_background_color="' . htmlspecialchars($_POST['traveladvisor_var_multi_counters_background_color'][$traveladvisor_counter_multi_counters_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_counter_content_color'][$traveladvisor_counter_multi_counters_node]) && $_POST['traveladvisor_var_counter_content_color'][$traveladvisor_counter_multi_counters_node] != '') {
                                                    $traveladvisor_var_multicounters .= 'traveladvisor_var_counter_content_color="' . htmlspecialchars($_POST['traveladvisor_var_counter_content_color'][$traveladvisor_counter_multi_counters_node], ENT_QUOTES) . '" ';
                                                }

                                                if (isset($_POST['traveladvisor_var_counters_icon'][$traveladvisor_counter_multi_counters_node]) && $_POST['traveladvisor_var_counters_icon'][$traveladvisor_counter_multi_counters_node] != '') {
                                                    $traveladvisor_var_multicounters .= 'traveladvisor_var_counters_icon="' . htmlspecialchars($_POST['traveladvisor_var_counters_icon'][$traveladvisor_counter_multi_counters_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_multiple_counter_logo_array'][$traveladvisor_counter_multi_counters_node]) && $_POST['traveladvisor_var_multiple_counter_logo_array'][$traveladvisor_counter_multi_counters_node] != '') {
                                                    $traveladvisor_var_multicounters .= 'traveladvisor_var_multiple_counter_logo_array="' . htmlspecialchars($_POST['traveladvisor_var_multiple_counter_logo_array'][$traveladvisor_counter_multi_counters_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_counter_icon_position'][$traveladvisor_counter_multi_counters_node]) && $_POST['traveladvisor_var_counter_icon_position'][$traveladvisor_counter_multi_counters_node] != '') {
                                                    $traveladvisor_var_multicounters .= 'traveladvisor_var_counter_icon_position="' . htmlspecialchars($_POST['traveladvisor_var_counter_icon_position'][$traveladvisor_counter_multi_counters_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_counter_padding_left'][$traveladvisor_counter_multi_counters_node]) && $_POST['traveladvisor_var_counter_padding_left'][$traveladvisor_counter_multi_counters_node] != '') {
                                                    $traveladvisor_var_multicounters .= 'traveladvisor_var_counter_padding_left="' . htmlspecialchars($_POST['traveladvisor_var_counter_padding_left'][$traveladvisor_counter_multi_counters_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_counter_padding_right'][$traveladvisor_counter_multi_counters_node]) && $_POST['traveladvisor_var_counter_padding_right'][$traveladvisor_counter_multi_counters_node] != '') {
                                                    $traveladvisor_var_multicounters .= 'traveladvisor_var_counter_padding_right="' . htmlspecialchars($_POST['traveladvisor_var_counter_padding_right'][$traveladvisor_counter_multi_counters_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_counter_border'][$traveladvisor_counter_multi_counters_node]) && $_POST['traveladvisor_var_counter_border'][$traveladvisor_counter_multi_counters_node] != '') {
                                                    $traveladvisor_var_multicounters .= 'traveladvisor_var_counter_border="' . htmlspecialchars($_POST['traveladvisor_var_counter_border'][$traveladvisor_counter_multi_counters_node], ENT_QUOTES) . '" ';
                                                }
                                                $traveladvisor_var_multicounters .= ']';
                                                if (isset($_POST['traveladvisor_var_multi_counters_text'][$traveladvisor_counter_multi_counters_node]) && $_POST['traveladvisor_var_multi_counters_text'][$traveladvisor_counter_multi_counters_node] != '') {
                                                    $traveladvisor_var_multicounters .= htmlspecialchars($_POST['traveladvisor_var_multi_counters_text'][$traveladvisor_counter_multi_counters_node], ENT_QUOTES);
                                                }
                                                $traveladvisor_var_multicounters .= '[/counters_item]';
                                                $traveladvisor_counter_multi_counters_node++;
                                            }
                                        }
                                        $section_title = '';
                                        if (isset($_POST['traveladvisor_var_multi_counters_title'][$traveladvisor_counter_multi_counters]) && $_POST['traveladvisor_var_multi_counters_title'][$traveladvisor_counter_multi_counters] != '') {
                                            $section_title .= 'traveladvisor_var_multi_counters_title="' . htmlspecialchars($_POST['traveladvisor_var_multi_counters_title'][$traveladvisor_counter_multi_counters], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_multi_counters_sub_title'][$traveladvisor_counter_multi_counters]) && $_POST['traveladvisor_var_multi_counters_sub_title'][$traveladvisor_counter_multi_counters] != '') {
                                            $section_title .= 'traveladvisor_var_multi_counters_sub_title="' . htmlspecialchars($_POST['traveladvisor_var_multi_counters_sub_title'][$traveladvisor_counter_multi_counters], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_counter_view'][$traveladvisor_counter_multi_counters]) && $_POST['traveladvisor_var_counter_view'][$traveladvisor_counter_multi_counters] != '') {
                                            $section_title .= 'traveladvisor_var_counter_view="' . htmlspecialchars($_POST['traveladvisor_var_counter_view'][$traveladvisor_counter_multi_counters], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_counter_background_color'][$traveladvisor_counter_multi_counters]) && $_POST['traveladvisor_var_counter_background_color'][$traveladvisor_counter_multi_counters] != '') {
                                            $section_title .= 'traveladvisor_var_counter_background_color="' . htmlspecialchars($_POST['traveladvisor_var_counter_background_color'][$traveladvisor_counter_multi_counters], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_item_column_size'][$traveladvisor_counter_multi_counters]) && $_POST['traveladvisor_var_item_column_size'][$traveladvisor_counter_multi_counters] != '') {
                                            $section_title .= 'traveladvisor_var_item_column_size="' . htmlspecialchars($_POST['traveladvisor_var_item_column_size'][$traveladvisor_counter_multi_counters], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_multi_counters_title_color'][$traveladvisor_counter_multi_counters]) && $_POST['traveladvisor_var_multi_counters_title_color'][$traveladvisor_counter_multi_counters] != '') {
                                            $section_title .= 'traveladvisor_var_multi_counters_title_color="' . htmlspecialchars($_POST['traveladvisor_var_multi_counters_title_color'][$traveladvisor_counter_multi_counters], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_counter_border_color'][$traveladvisor_counter_multi_counters]) && $_POST['traveladvisor_var_counter_border_color'][$traveladvisor_counter_multi_counters] != '') {
                                            $section_title .= 'traveladvisor_var_counter_border_color="' . htmlspecialchars($_POST['traveladvisor_var_counter_border_color'][$traveladvisor_counter_multi_counters], ENT_QUOTES) . '" ';
                                        }

                                        $shortcode = '[counters ' . $section_title . ' ]' . $traveladvisor_var_multicounters . '[/counters]';
                                        $multi_counters->addChild('traveladvisor_shortcode', $shortcode);
                                        $traveladvisor_counter_multi_counters++;
                                    }
                                    $traveladvisor_global_counter_multi_counters++;
                                }
                                //pricetable start
                                elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "pricetable") {
                                    $traveladvisor_var_multipricetable = '';
                                    $multi_pricetable = $column->addChild('pricetable');
                                    $multi_pricetable->addChild('page_element_size', htmlspecialchars($_POST['pricetable_element_size'][$traveladvisor_global_counter_multi_pricetable]));
                                    $multi_pricetable->addChild('pricetable_element_size', htmlspecialchars($_POST['pricetable_element_size'][$traveladvisor_global_counter_multi_pricetable]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes($_POST['shortcode']['pricetable'][$traveladvisor_shortcode_counter_multi_pricetable]);
                                        $traveladvisor_shortcode_counter_multi_pricetable++;
                                        $multi_pricetable->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        if (isset($_POST['multi_pricetable_num'][$traveladvisor_counter_multi_pricetable]) && $_POST['multi_pricetable_num'][$traveladvisor_counter_multi_pricetable] > 0) {
                                            for ($i = 1; $i <= $_POST['multi_pricetable_num'][$traveladvisor_counter_multi_pricetable]; $i++) {
                                                $traveladvisor_var_multipricetable.= '[pricetable_item ';
                                                if (isset($_POST['traveladvisor_var_multiple_pricetable_title'][$traveladvisor_counter_multi_pricetable_node]) && $_POST['traveladvisor_var_multiple_pricetable_title'][$traveladvisor_counter_multi_pricetable_node] != '') {
                                                    $traveladvisor_var_multipricetable .= 'traveladvisor_var_multiple_pricetable_title="' . htmlspecialchars($_POST['traveladvisor_var_multiple_pricetable_title'][$traveladvisor_counter_multi_pricetable_node], ENT_QUOTES) . '" ';
                                                }

                                                if (isset($_POST['traveladvisor_var_multiple_pricetable_currency'][$traveladvisor_counter_multi_pricetable_node]) && $_POST['traveladvisor_var_multiple_pricetable_currency'][$traveladvisor_counter_multi_pricetable_node] != '') {
                                                    $traveladvisor_var_multipricetable .= 'traveladvisor_var_multiple_pricetable_currency="' . htmlspecialchars($_POST['traveladvisor_var_multiple_pricetable_currency'][$traveladvisor_counter_multi_pricetable_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_multiple_pricetable_price'][$traveladvisor_counter_multi_pricetable_node]) && $_POST['traveladvisor_var_multiple_pricetable_price'][$traveladvisor_counter_multi_pricetable_node] != '') {
                                                    $traveladvisor_var_multipricetable .= 'traveladvisor_var_multiple_pricetable_price="' . htmlspecialchars($_POST['traveladvisor_var_multiple_pricetable_price'][$traveladvisor_counter_multi_pricetable_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_multiple_pricetable_package'][$traveladvisor_counter_multi_pricetable_node]) && $_POST['traveladvisor_var_multiple_pricetable_package'][$traveladvisor_counter_multi_pricetable_node] != '') {
                                                    $traveladvisor_var_multipricetable .= 'traveladvisor_var_multiple_pricetable_package="' . htmlspecialchars($_POST['traveladvisor_var_multiple_pricetable_package'][$traveladvisor_counter_multi_pricetable_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_multiple_pricetable_btntxt'][$traveladvisor_counter_multi_pricetable_node]) && $_POST['traveladvisor_var_multiple_pricetable_btntxt'][$traveladvisor_counter_multi_pricetable_node] != '') {
                                                    $traveladvisor_var_multipricetable .= 'traveladvisor_var_multiple_pricetable_btntxt="' . htmlspecialchars($_POST['traveladvisor_var_multiple_pricetable_btntxt'][$traveladvisor_counter_multi_pricetable_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_multiple_pricetable_btnlink'][$traveladvisor_counter_multi_pricetable_node]) && $_POST['traveladvisor_var_multiple_pricetable_btnlink'][$traveladvisor_counter_multi_pricetable_node] != '') {
                                                    $traveladvisor_var_multipricetable .= 'traveladvisor_var_multiple_pricetable_btnlink="' . htmlspecialchars($_POST['traveladvisor_var_multiple_pricetable_btnlink'][$traveladvisor_counter_multi_pricetable_node], ENT_QUOTES) . '" ';
                                                }
                                                $traveladvisor_var_multipricetable .= ']';

                                                if (isset($_POST['traveladvisor_var_multiple_pricetable_desc'][$traveladvisor_counter_multi_pricetable_node]) && $_POST['traveladvisor_var_multiple_pricetable_desc'][$traveladvisor_counter_multi_pricetable_node] != '') {
                                                    $traveladvisor_var_multipricetable .= htmlspecialchars($_POST['traveladvisor_var_multiple_pricetable_desc'][$traveladvisor_counter_multi_pricetable_node], ENT_QUOTES);
                                                }

                                                $traveladvisor_var_multipricetable .= '[/pricetable_item]';
                                                $traveladvisor_counter_multi_pricetable_node++;
                                            }
                                        }
                                        $section_title = '';
                                        if (isset($_POST['traveladvisor_var_multi_pricetable_title'][$traveladvisor_counter_multi_pricetable]) && $_POST['traveladvisor_var_multi_pricetable_title'][$traveladvisor_counter_multi_pricetable] != '') {
                                            $section_title .= 'traveladvisor_var_multi_pricetable_title="' . htmlspecialchars($_POST['traveladvisor_var_multi_pricetable_title'][$traveladvisor_counter_multi_pricetable], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_multi_pricetable_column'][$traveladvisor_counter_multi_pricetable]) && $_POST['traveladvisor_var_multi_pricetable_column'][$traveladvisor_counter_multi_pricetable] != '') {
                                            $section_title .= 'traveladvisor_var_multi_pricetable_column="' . htmlspecialchars($_POST['traveladvisor_var_multi_pricetable_column'][$traveladvisor_counter_multi_pricetable], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_item_column_size'][$traveladvisor_counter_multi_pricetable]) && $_POST['traveladvisor_var_item_column_size'][$traveladvisor_counter_multi_pricetable] != '') {
                                            $section_title .= 'traveladvisor_var_item_column_size="' . htmlspecialchars($_POST['traveladvisor_var_item_column_size'][$traveladvisor_counter_multi_pricetable], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_multi_pricetable_title_color'][$traveladvisor_counter_multi_pricetable]) && $_POST['traveladvisor_var_multi_pricetable_title_color'][$traveladvisor_counter_multi_pricetable] != '') {
                                            $section_title .= 'traveladvisor_var_multi_pricetable_title_color="' . htmlspecialchars($_POST['traveladvisor_var_multi_pricetable_title_color'][$traveladvisor_counter_multi_pricetable], ENT_QUOTES) . '" ';
                                        }
                                        $shortcode = '[pricetable ' . $section_title . ' ]' . $traveladvisor_var_multipricetable . '[/pricetable]';
                                        $multi_pricetable->addChild('traveladvisor_shortcode', $shortcode);
                                        $traveladvisor_counter_multi_pricetable++;
                                    }
                                    $traveladvisor_global_counter_multi_pricetable++;
                                }
                                //Multi pricetable end
                                elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "list") {
                                    $shortcode = $traveladvisor_var_list = '';
                                    $list = $column->addChild('list');
                                    $list->addChild('page_element_size', htmlspecialchars($_POST['list_element_size'][$traveladvisor_global_counter_list]));
                                    $list->addChild('list_element_size', htmlspecialchars($_POST['list_element_size'][$traveladvisor_global_counter_list]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes($_POST['shortcode']['list'][$traveladvisor_shortcode_counter_list]);
                                        $traveladvisor_shortcode_counter_list++;
                                        $list->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        if (isset($_POST['list_num'][$traveladvisor_counter_list]) && $_POST['list_num'][$traveladvisor_counter_list] > 0) {
                                            for ($i = 1; $i <= $_POST['list_num'][$traveladvisor_counter_list]; $i++) {
                                                $traveladvisor_var_list .= '[traveladvisor_list_item ';

                                                if (isset($_POST['traveladvisor_var_list_item_text'][$traveladvisor_counter_list_node]) && $_POST['traveladvisor_var_list_item_text'][$traveladvisor_counter_list_node] != '') {
                                                    $traveladvisor_var_list .= 'traveladvisor_var_list_item_text="' . htmlspecialchars($_POST['traveladvisor_var_list_item_text'][$traveladvisor_counter_list_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_list_item_icon'][$traveladvisor_counter_list_node]) && $_POST['traveladvisor_var_list_item_icon'][$traveladvisor_counter_list_node] != '') {
                                                    $traveladvisor_var_list .= 'traveladvisor_var_list_item_icon="' . htmlspecialchars($_POST['traveladvisor_var_list_item_icon'][$traveladvisor_counter_list_node], ENT_QUOTES) . '" ';
                                                }

                                                $traveladvisor_var_list .= ']';
                                                $traveladvisor_var_list .= '[/traveladvisor_list_item]';
                                                $traveladvisor_counter_list_node++;
                                            }
                                        }
                                        $section_title = '';
                                        if (isset($_POST['traveladvisor_var_list_title'][$traveladvisor_counter_list]) && $_POST['traveladvisor_var_list_title'][$traveladvisor_counter_list] != '') {
                                            $section_title .= 'traveladvisor_var_list_title="' . htmlspecialchars($_POST['traveladvisor_var_list_title'][$traveladvisor_counter_list], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_list_sub_title'][$traveladvisor_counter_list]) && $_POST['traveladvisor_var_list_sub_title'][$traveladvisor_counter_list] != '') {
                                            $section_title .= 'traveladvisor_var_list_sub_title="' . htmlspecialchars($_POST['traveladvisor_var_list_sub_title'][$traveladvisor_counter_list], ENT_QUOTES) . '" ';
                                        }

                                        if (isset($_POST['traveladvisor_var_list_color'][$traveladvisor_counter_list]) && $_POST['traveladvisor_var_list_color'][$traveladvisor_counter_list] != '') {
                                            $section_title .= 'traveladvisor_var_list_color="' . htmlspecialchars($_POST['traveladvisor_var_list_color'][$traveladvisor_counter_list], ENT_QUOTES) . '" ';
                                        }
                                        $shortcode = '[traveladvisor_list ' . $section_title . ' ]' . $traveladvisor_var_list . '[/traveladvisor_list]';
                                        $list->addChild('traveladvisor_shortcode', $shortcode);
                                        $traveladvisor_counter_list++;
                                    }
                                    $traveladvisor_global_counter_list++;
                                }
                                // Progress Bar Shortcode Start 
                                elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "progress") {
                                    $traveladvisor_var_progress_bar = '';
                                    $progress = $column->addChild('progress');
                                    $progress->addChild('page_element_size', htmlspecialchars($_POST['progress_element_size'][$traveladvisor_global_counter_progress]));
                                    $progress->addChild('progress_element_size', htmlspecialchars($_POST['progress_element_size'][$traveladvisor_global_counter_progress]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes($_POST['shortcode']['progress'][$traveladvisor_shortcode_counter_progress]);
                                        $traveladvisor_shortcode_counter_progress++;
                                        $progress->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        if (isset($_POST['progress_num'][$traveladvisor_counter_progress]) && $_POST['progress_num'][$traveladvisor_counter_progress] > 0) {
                                            for ($i = 1; $i <= $_POST['progress_num'][$traveladvisor_counter_progress]; $i++) {
                                                $traveladvisor_var_progress_bar .= '[traveladvisor_progress_item ';
                                                if (isset($_POST['traveladvisor_var_progress_item_text'][$traveladvisor_counter_progress_node]) && $_POST['traveladvisor_var_progress_item_text'][$traveladvisor_counter_progress_node] != '') {
                                                    $traveladvisor_var_progress_bar .= 'traveladvisor_var_progress_item_text="' . htmlspecialchars($_POST['traveladvisor_var_progress_item_text'][$traveladvisor_counter_progress_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_progress_item_percentage'][$traveladvisor_counter_progress_node]) && $_POST['traveladvisor_var_progress_item_percentage'][$traveladvisor_counter_progress_node] != '') {
                                                    $traveladvisor_var_progress_bar .= 'traveladvisor_var_progress_item_percentage="' . htmlspecialchars($_POST['traveladvisor_var_progress_item_percentage'][$traveladvisor_counter_progress_node], ENT_QUOTES) . '" ';
                                                }
                                                $traveladvisor_var_progress_bar .= ']';
                                                $traveladvisor_var_progress_bar .= '[/traveladvisor_progress_item]';
                                                $traveladvisor_counter_progress_node++;
                                            }
                                        }
                                        $section_title = '';
                                        if (isset($_POST['traveladvisor_var_progress_title'][$traveladvisor_counter_progress]) && $_POST['traveladvisor_var_progress_title'][$traveladvisor_counter_progress] != '') {
                                            $section_title .= 'traveladvisor_var_progress_title="' . htmlspecialchars($_POST['traveladvisor_var_progress_title'][$traveladvisor_counter_progress], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_progress_view'][$traveladvisor_counter_progress]) && $_POST['traveladvisor_var_progress_view'][$traveladvisor_counter_progress] != '') {
                                            $section_title .= 'traveladvisor_var_progress_view="' . htmlspecialchars($_POST['traveladvisor_var_progress_view'][$traveladvisor_counter_progress], ENT_QUOTES) . '" ';
                                        }
                                        $shortcode = '[traveladvisor_progress ' . $section_title . ' ]' . $traveladvisor_var_progress_bar . '[/traveladvisor_progress]';
                                        $progress->addChild('traveladvisor_shortcode', $shortcode);
                                        $traveladvisor_counter_progress++;
                                    }
                                    $traveladvisor_global_counter_progress++;
                                } elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "clients") {
                                    $shortcode = $traveladvisor_var_clients = '';
                                    $clients = $column->addChild('clients');
                                    $clients->addChild('page_element_size', htmlspecialchars($_POST['clients_element_size'][$traveladvisor_global_counter_clients]));
                                    $clients->addChild('clients_element_size', htmlspecialchars($_POST['clients_element_size'][$traveladvisor_global_counter_clients]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes($_POST['shortcode']['clients'][$traveladvisor_shortcode_counter_clients]);
                                        $traveladvisor_shortcode_counter_clients++;
                                        $clients->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        if (isset($_POST['clients_num'][$traveladvisor_counter_clients]) && $_POST['clients_num'][$traveladvisor_counter_clients] > 0) {
                                            for ($i = 1; $i <= $_POST['clients_num'][$traveladvisor_counter_clients]; $i++) {
                                                $traveladvisor_var_clients .= '[clients_item ';
                                                if (isset($_POST['traveladvisor_var_clients_img_user_array'][$traveladvisor_counter_clients_node]) && $_POST['traveladvisor_var_clients_img_user_array'][$traveladvisor_counter_clients_node] != '') {
                                                    $traveladvisor_var_clients .= 'traveladvisor_var_clients_img_user_array="' . $_POST['traveladvisor_var_clients_img_user_array'][$traveladvisor_counter_clients_node] . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_clients_text'][$traveladvisor_counter_clients_node]) && $_POST['traveladvisor_var_clients_text'][$traveladvisor_counter_clients_node] != '') {
                                                    $traveladvisor_var_clients .= 'traveladvisor_var_clients_text="' . $_POST['traveladvisor_var_clients_text'][$traveladvisor_counter_clients_node] . '" ';
                                                }
                                                $traveladvisor_var_clients .= ']';
                                                if (isset($_POST['traveladvisor_var_clients_text'][$traveladvisor_counter_clients_node]) && $_POST['traveladvisor_var_clients_text'][$traveladvisor_counter_clients_node] != '') {
                                                    $traveladvisor_var_clients .= 'traveladvisor_var_clients_text="' . $_POST['traveladvisor_var_clients_text'][$traveladvisor_counter_clients_node] . '" ';
                                                }
                                                $traveladvisor_var_clients .= '[/clients_item]';
                                                $traveladvisor_counter_clients_node++;
                                            }
                                        }
                                        $section_title = '';
                                        if (isset($_POST['traveladvisor_var_clients_element_title'][$traveladvisor_counter_clients]) && $_POST['traveladvisor_var_clients_element_title'][$traveladvisor_counter_clients] != '') {
                                            $section_title .= 'traveladvisor_var_clients_element_title="' . htmlspecialchars($_POST['traveladvisor_var_clients_element_title'][$traveladvisor_counter_clients], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_clients_perslide'][$traveladvisor_counter_clients]) && $_POST['traveladvisor_var_clients_perslide'][$traveladvisor_counter_clients] != '') {
                                            $section_title .= 'traveladvisor_var_clients_perslide="' . htmlspecialchars($_POST['traveladvisor_var_clients_perslide'][$traveladvisor_counter_clients], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['clients_style'][$traveladvisor_counter_clients]) && $_POST['clients_style'][$traveladvisor_counter_clients] != '') {
                                            $section_title .= 'clients_style="' . htmlspecialchars($_POST['clients_style'][$traveladvisor_counter_clients], ENT_QUOTES) . '" ';
                                        }
                                        $shortcode = '[traveladvisor_clients ' . $section_title . ' ]' . $traveladvisor_var_clients . '[/traveladvisor_clients]';
                                        $clients->addChild('traveladvisor_shortcode', $shortcode);
                                        $traveladvisor_counter_clients++;
                                    }
                                    $traveladvisor_global_counter_clients++;
                                } elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "destination") {
                                    $traveladvisor_var_destination_shortcode = '';
                                    $traveladvisor_var_destination = $column->addChild('destination');
                                    $traveladvisor_var_destination->addChild('page_element_size', htmlspecialchars($_POST['destination_element_size'][$traveladvisor_global_counter_destination]));
                                    $traveladvisor_var_destination->addChild('destination_element_size', htmlspecialchars($_POST['destination_element_size'][$traveladvisor_global_counter_destination]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes(htmlspecialchars(( $_POST['shortcode']['destination'][$traveladvisor_shortcode_counter_destination]), ENT_QUOTES));
                                        $traveladvisor_shortcode_counter_destination++;
                                        $traveladvisor_var_destination->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        $traveladvisor_var_destination_shortcode = '[traveladvisor_destination ';
                                        if (isset($_POST['traveladvisor_var_destination_element_title'][$traveladvisor_counter_destination]) && $_POST['traveladvisor_var_destination_element_title'][$traveladvisor_counter_destination] != '') {
                                            $traveladvisor_var_destination_shortcode .= 'traveladvisor_var_destination_element_title="' . stripslashes(htmlspecialchars(($_POST['traveladvisor_var_destination_element_title'][$traveladvisor_counter_destination]), ENT_QUOTES)) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_destination_element_subtitle'][$traveladvisor_counter_destination]) && $_POST['traveladvisor_var_destination_element_subtitle'][$traveladvisor_counter_destination] != '') {
                                            $traveladvisor_var_destination_shortcode .= 'traveladvisor_var_destination_element_subtitle="' . htmlspecialchars($_POST['traveladvisor_var_destination_element_subtitle'][$traveladvisor_counter_destination], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_destination_view'][$traveladvisor_counter_destination]) && $_POST['traveladvisor_var_destination_view'][$traveladvisor_counter_destination] != '') {
                                            $traveladvisor_var_destination_shortcode .= 'traveladvisor_var_destination_view="' . htmlspecialchars($_POST['traveladvisor_var_destination_view'][$traveladvisor_counter_destination], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_destination_category'][$traveladvisor_counter_destination]) && $_POST['traveladvisor_var_destination_category'][$traveladvisor_counter_destination] != '') {
                                            $traveladvisor_var_destination_shortcode .= 'traveladvisor_var_destination_category="' . htmlspecialchars($_POST['traveladvisor_var_destination_category'][$traveladvisor_counter_destination], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_destination_paging_filter_style'][$traveladvisor_counter_destination]) && $_POST['traveladvisor_var_destination_paging_filter_style'][$traveladvisor_counter_destination] != '') {
                                            $traveladvisor_var_destination_shortcode .= 'traveladvisor_var_destination_paging_filter_style="' . htmlspecialchars($_POST['traveladvisor_var_destination_paging_filter_style'][$traveladvisor_counter_destination], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_destination_item_per_page'][$traveladvisor_counter_destination]) && $_POST['traveladvisor_var_destination_item_per_page'][$traveladvisor_counter_destination] != '') {
                                            $traveladvisor_var_destination_shortcode .= 'traveladvisor_var_destination_item_per_page="' . htmlspecialchars($_POST['traveladvisor_var_destination_item_per_page'][$traveladvisor_counter_destination], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_destination_excerpt'][$traveladvisor_counter_destination]) && $_POST['traveladvisor_var_destination_excerpt'][$traveladvisor_counter_destination] != '') {
                                            $traveladvisor_var_destination_shortcode .= 'traveladvisor_var_destination_excerpt="' . htmlspecialchars($_POST['traveladvisor_var_destination_excerpt'][$traveladvisor_counter_destination], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_destination_excerpt_length'][$traveladvisor_counter_destination]) && $_POST['traveladvisor_var_destination_excerpt_length'][$traveladvisor_counter_destination] != '') {
                                            $traveladvisor_var_destination_shortcode .= 'traveladvisor_var_destination_excerpt_length="' . htmlspecialchars($_POST['traveladvisor_var_destination_excerpt_length'][$traveladvisor_counter_destination], ENT_QUOTES) . '" ';
                                        }
                                        $traveladvisor_var_destination_shortcode .= ']';
                                        if (isset($_POST['destination_text'][$traveladvisor_counter_destination]) && $_POST['destination_text'][$traveladvisor_counter_destination] != '') {
                                            $traveladvisor_var_destination_shortcode .= htmlspecialchars($_POST['destination_text'][$traveladvisor_counter_destination], ENT_QUOTES) . ' ';
                                        }
                                        $traveladvisor_var_destination_shortcode .= '[/traveladvisor_destination]';
                                        $traveladvisor_var_destination->addChild('traveladvisor_shortcode', $traveladvisor_var_destination_shortcode);
                                        $traveladvisor_counter_destination++;
                                    }
                                    $traveladvisor_global_counter_destination++;
                                } elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "tour") {
                                    $traveladvisor_var_tour_shortcode = '';
                                    $traveladvisor_var_tour = $column->addChild('tour');
                                    $traveladvisor_var_tour->addChild('page_element_size', htmlspecialchars($_POST['tour_element_size'][$traveladvisor_global_counter_tour]));
                                    $traveladvisor_var_tour->addChild('tour_element_size', htmlspecialchars($_POST['tour_element_size'][$traveladvisor_global_counter_tour]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes(htmlspecialchars(( $_POST['shortcode']['tour'][$traveladvisor_shortcode_counter_tour]), ENT_QUOTES));
                                        $traveladvisor_shortcode_counter_tour++;
                                        $traveladvisor_var_tour->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        $traveladvisor_var_tour_shortcode = '[traveladvisor_tour ';
                                        if (isset($_POST['traveladvisor_var_tour_element_title'][$traveladvisor_counter_tour]) && $_POST['traveladvisor_var_tour_element_title'][$traveladvisor_counter_tour] != '') {
                                            $traveladvisor_var_tour_shortcode .= 'traveladvisor_var_tour_element_title="' . stripslashes(htmlspecialchars(($_POST['traveladvisor_var_tour_element_title'][$traveladvisor_counter_tour]), ENT_QUOTES)) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_tour_element_subtitle'][$traveladvisor_counter_tour]) && $_POST['traveladvisor_var_tour_element_subtitle'][$traveladvisor_counter_tour] != '') {
                                            $traveladvisor_var_tour_shortcode .= 'traveladvisor_var_tour_element_subtitle="' . htmlspecialchars($_POST['traveladvisor_var_tour_element_subtitle'][$traveladvisor_counter_tour], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_tour_view'][$traveladvisor_counter_tour]) && $_POST['traveladvisor_var_tour_view'][$traveladvisor_counter_tour] != '') {
                                            $traveladvisor_var_tour_shortcode .= 'traveladvisor_var_tour_view="' . htmlspecialchars($_POST['traveladvisor_var_tour_view'][$traveladvisor_counter_tour], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_tour_filteration'][$traveladvisor_counter_tour]) && $_POST['traveladvisor_var_tour_filteration'][$traveladvisor_counter_tour] != '') {
                                            $traveladvisor_var_tour_shortcode .= 'traveladvisor_var_tour_filteration="' . htmlspecialchars($_POST['traveladvisor_var_tour_filteration'][$traveladvisor_counter_tour], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_tour_sorting'][$traveladvisor_counter_tour]) && $_POST['traveladvisor_var_tour_sorting'][$traveladvisor_counter_tour] != '') {
                                            $traveladvisor_var_tour_shortcode .= 'traveladvisor_var_tour_sorting="' . htmlspecialchars($_POST['traveladvisor_var_tour_sorting'][$traveladvisor_counter_tour], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_tour_category'][$traveladvisor_counter_tour]) && $_POST['traveladvisor_var_tour_category'][$traveladvisor_counter_tour] != '') {
                                            $traveladvisor_var_tour_shortcode .= 'traveladvisor_var_tour_category="' . htmlspecialchars($_POST['traveladvisor_var_tour_category'][$traveladvisor_counter_tour], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_tour_paging_filter_style'][$traveladvisor_counter_tour]) && $_POST['traveladvisor_var_tour_paging_filter_style'][$traveladvisor_counter_tour] != '') {
                                            $traveladvisor_var_tour_shortcode .= 'traveladvisor_var_tour_paging_filter_style="' . htmlspecialchars($_POST['traveladvisor_var_tour_paging_filter_style'][$traveladvisor_counter_tour], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_tour_column'][$traveladvisor_counter_tour]) && $_POST['traveladvisor_var_tour_column'][$traveladvisor_counter_tour] != '') {
                                            $traveladvisor_var_tour_shortcode .= 'traveladvisor_var_tour_column="' . htmlspecialchars($_POST['traveladvisor_var_tour_column'][$traveladvisor_counter_tour], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_tour_item_per_page'][$traveladvisor_counter_tour]) && $_POST['traveladvisor_var_tour_item_per_page'][$traveladvisor_counter_tour] != '') {
                                            $traveladvisor_var_tour_shortcode .= 'traveladvisor_var_tour_item_per_page="' . htmlspecialchars($_POST['traveladvisor_var_tour_item_per_page'][$traveladvisor_counter_tour], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_tour_excerpt'][$traveladvisor_counter_tour]) && $_POST['traveladvisor_var_tour_excerpt'][$traveladvisor_counter_tour] != '') {
                                            $traveladvisor_var_tour_shortcode .= 'traveladvisor_var_tour_excerpt="' . htmlspecialchars($_POST['traveladvisor_var_tour_excerpt'][$traveladvisor_counter_tour], ENT_QUOTES) . '" ';
                                        }
										 if (isset($_POST['traveladvisor_inventories_counter'][$traveladvisor_counter_tour]) && $_POST['traveladvisor_inventories_counter'][$traveladvisor_counter_tour] != '') {
                                            $traveladvisor_var_tour_shortcode .= 'traveladvisor_inventories_counter="' . htmlspecialchars($_POST['traveladvisor_inventories_counter'][$traveladvisor_counter_tour], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_tour_excerpt_length'][$traveladvisor_counter_tour]) && $_POST['traveladvisor_var_tour_excerpt_length'][$traveladvisor_counter_tour] != '') {
                                            $traveladvisor_var_tour_shortcode .= 'traveladvisor_var_tour_excerpt_length="' . htmlspecialchars($_POST['traveladvisor_var_tour_excerpt_length'][$traveladvisor_counter_tour], ENT_QUOTES) . '" ';
                                        }
                                        $traveladvisor_var_tour_shortcode .= ']';
                                        if (isset($_POST['tour_text'][$traveladvisor_counter_tour]) && $_POST['tour_text'][$traveladvisor_counter_tour] != '') {
                                            $traveladvisor_var_tour_shortcode .= htmlspecialchars($_POST['tour_text'][$traveladvisor_counter_tour], ENT_QUOTES) . ' ';
                                        }
                                        $traveladvisor_var_tour_shortcode .= '[/traveladvisor_tour]';
										
										
                                        $traveladvisor_var_tour->addChild('traveladvisor_shortcode', $traveladvisor_var_tour_shortcode);
                                        $traveladvisor_counter_tour++;
                                    }
                                    $traveladvisor_global_counter_tour++;
                                }
                                //  Team Shortcode End 
                                elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "price_services") {
                                    $traveladvisor_var_price_services_shortcode = '';
                                    $traveladvisor_var_price_services = $column->addChild('price_services');
                                    $traveladvisor_var_price_services->addChild('page_element_size', htmlspecialchars($_POST['price_services_element_size'][$traveladvisor_global_counter_price_services]));
                                    $traveladvisor_var_price_services->addChild('price_services_element_size', htmlspecialchars($_POST['price_services_element_size'][$traveladvisor_global_counter_price_services]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes(htmlspecialchars(( $_POST['shortcode']['price_services'][$traveladvisor_shortcode_counter_price_services]), ENT_QUOTES));
                                        $traveladvisor_shortcode_counter_price_services++;
                                        $traveladvisor_var_price_services->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        $traveladvisor_var_price_services_shortcode = '[traveladvisor_price_services ';
                                        if (isset($_POST['traveladvisor_var_price_services_element_title'][$traveladvisor_counter_price_services]) && $_POST['traveladvisor_var_price_services_element_title'][$traveladvisor_counter_price_services] != '') {
                                            $traveladvisor_var_price_services_shortcode .= 'traveladvisor_var_price_services_element_title="' . stripslashes(htmlspecialchars(($_POST['traveladvisor_var_price_services_element_title'][$traveladvisor_counter_price_services]), ENT_QUOTES)) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_price_services_element_subtitle'][$traveladvisor_counter_price_services]) && $_POST['traveladvisor_var_price_services_element_subtitle'][$traveladvisor_counter_price_services] != '') {
                                            $traveladvisor_var_price_services_shortcode .= 'traveladvisor_var_price_services_element_subtitle="' . htmlspecialchars($_POST['traveladvisor_var_price_services_element_subtitle'][$traveladvisor_counter_price_services], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_price_services_view'][$traveladvisor_counter_price_services]) && $_POST['traveladvisor_var_price_services_view'][$traveladvisor_counter_price_services] != '') {
                                            $traveladvisor_var_price_services_shortcode .= 'traveladvisor_var_price_services_view="' . htmlspecialchars($_POST['traveladvisor_var_price_services_view'][$traveladvisor_counter_price_services], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_price_services_category'][$traveladvisor_counter_price_services]) && $_POST['traveladvisor_var_price_services_category'][$traveladvisor_counter_price_services] != '') {
                                            $traveladvisor_var_price_services_shortcode .= 'traveladvisor_var_price_services_category="' . htmlspecialchars($_POST['traveladvisor_var_price_services_category'][$traveladvisor_counter_price_services], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_price_services_paging_filter_style'][$traveladvisor_counter_price_services]) && $_POST['traveladvisor_var_price_services_paging_filter_style'][$traveladvisor_counter_price_services] != '') {
                                            $traveladvisor_var_price_services_shortcode .= 'traveladvisor_var_price_services_paging_filter_style="' . htmlspecialchars($_POST['traveladvisor_var_price_services_paging_filter_style'][$traveladvisor_counter_price_services], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_price_services_column'][$traveladvisor_counter_price_services]) && $_POST['traveladvisor_var_price_services_column'][$traveladvisor_counter_price_services] != '') {
                                            $traveladvisor_var_price_services_shortcode .= 'traveladvisor_var_price_services_column="' . htmlspecialchars($_POST['traveladvisor_var_price_services_column'][$traveladvisor_counter_price_services], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_price_services_item_per_page'][$traveladvisor_counter_price_services]) && $_POST['traveladvisor_var_price_services_item_per_page'][$traveladvisor_counter_price_services] != '') {
                                            $traveladvisor_var_price_services_shortcode .= 'traveladvisor_var_price_services_item_per_page="' . htmlspecialchars($_POST['traveladvisor_var_price_services_item_per_page'][$traveladvisor_counter_price_services], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_price_services_excerpt'][$traveladvisor_counter_price_services]) && $_POST['traveladvisor_var_price_services_excerpt'][$traveladvisor_counter_price_services] != '') {
                                            $traveladvisor_var_price_services_shortcode .= 'traveladvisor_var_price_services_excerpt="' . htmlspecialchars($_POST['traveladvisor_traveladvisorprice_services_excerpt'][$traveladvisor_counter_price_services], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_price_services_excerpt_length'][$traveladvisor_counter_price_services]) && $_POST['traveladvisor_var_price_services_excerpt_length'][$traveladvisor_counter_price_services] != '') {
                                            $traveladvisor_var_price_services_shortcode .= 'traveladvisor_var_price_services_excerpt_length="' . htmlspecialchars($_POST['traveladvisor_var_price_services_excerpt_length'][$traveladvisor_counter_price_services], ENT_QUOTES) . '" ';
                                        }
                                        $traveladvisor_var_price_services_shortcode .= ']';
                                        if (isset($_POST['price_services_text'][$traveladvisor_counter_price_services]) && $_POST['price_services_text'][$traveladvisor_counter_price_services] != '') {
                                            $traveladvisor_var_price_services_shortcode .= htmlspecialchars($_POST['price_services_text'][$traveladvisor_counter_price_services], ENT_QUOTES) . ' ';
                                        }
                                        $traveladvisor_var_price_services_shortcode .= '[/traveladvisor_price_services]';
                                        $traveladvisor_var_price_services->addChild('traveladvisor_shortcode', $traveladvisor_var_price_services_shortcode);
                                        $traveladvisor_counter_price_services++;
                                    }
                                    $traveladvisor_global_counter_price_services++;
                                } elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "team") {
                                    $shortcode = $shortcode_item = '';
                                    $multi_team = $column->addChild('team');
                                    $multi_team->addChild('page_element_size', htmlspecialchars($_POST['team_element_size'][$traveladvisor_global_counter_multi_team]));
                                    $multi_team->addChild('team_element_size', htmlspecialchars($_POST['team_element_size'][$traveladvisor_global_counter_multi_team]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes($_POST['shortcode']['team'][$traveladvisor_shortcode_counter_multi_team]);
                                        $traveladvisor_shortcode_counter_multi_team++;
                                        $multi_team->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        if (isset($_POST['multi_team_num'][$traveladvisor_counter_multi_team]) && $_POST['multi_team_num'][$traveladvisor_counter_multi_team] > 0) {
                                            for ($i = 1; $i <= $_POST['multi_team_num'][$traveladvisor_counter_multi_team]; $i++) {
                                                $shortcode_item .= '[team_item ';
                                                if (isset($_POST['traveladvisor_var_team_title'][$traveladvisor_counter_multi_team_node]) && $_POST['traveladvisor_var_team_title'][$traveladvisor_counter_multi_team_node] != '') {
                                                    $shortcode_item .= 'traveladvisor_var_team_title="' . htmlspecialchars($_POST['traveladvisor_var_team_title'][$traveladvisor_counter_multi_team_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_multi_team_text'][$traveladvisor_counter_multi_team_node]) && $_POST['traveladvisor_var_multi_team_text'][$traveladvisor_counter_multi_team_node] != '') {
                                                    $shortcode_item .= 'traveladvisor_var_multi_team_text="' . htmlspecialchars($_POST['traveladvisor_var_multi_team_text'][$traveladvisor_counter_multi_team_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_team_img_array'][$traveladvisor_counter_multi_team_node]) && $_POST['traveladvisor_var_team_img_array'][$traveladvisor_counter_multi_team_node] != '') {
                                                    $shortcode_item .= 'traveladvisor_var_team_img_array="' . htmlspecialchars($_POST['traveladvisor_var_team_img_array'][$traveladvisor_counter_multi_team_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_team_view'][$traveladvisor_counter_multi_team_node]) && $_POST['traveladvisor_var_team_view'][$traveladvisor_counter_multi_team_node] != '') {
                                                    $shortcode_item .= 'traveladvisor_var_team_view="' . htmlspecialchars($_POST['traveladvisor_var_team_view'][$traveladvisor_counter_multi_team_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_team_image_place'][$traveladvisor_counter_multi_team_node]) && $_POST['traveladvisor_var_team_image_place'][$traveladvisor_counter_multi_team_node] != '') {
                                                    $shortcode_item .= 'traveladvisor_var_team_image_place="' . htmlspecialchars($_POST['traveladvisor_var_team_image_place'][$traveladvisor_counter_multi_team_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_team_facebook'][$traveladvisor_counter_multi_team_node]) && $_POST['traveladvisor_var_team_facebook'][$traveladvisor_counter_multi_team_node] != '') {
                                                    $shortcode_item .= 'traveladvisor_var_team_facebook="' . htmlspecialchars($_POST['traveladvisor_var_team_facebook'][$traveladvisor_counter_multi_team_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_team_twitter'][$traveladvisor_counter_multi_team_node]) && $_POST['traveladvisor_var_team_twitter'][$traveladvisor_counter_multi_team_node] != '') {
                                                    $shortcode_item .= 'traveladvisor_var_team_twitter="' . htmlspecialchars($_POST['traveladvisor_var_team_twitter'][$traveladvisor_counter_multi_team_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_team_google'][$traveladvisor_counter_multi_team_node]) && $_POST['traveladvisor_var_team_google'][$traveladvisor_counter_multi_team_node] != '') {
                                                    $shortcode_item .= 'traveladvisor_var_team_google="' . htmlspecialchars($_POST['traveladvisor_var_team_google'][$traveladvisor_counter_multi_team_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_team_mail'][$traveladvisor_counter_multi_team_node]) && $_POST['traveladvisor_var_team_mail'][$traveladvisor_counter_multi_team_node] != '') {
                                                    $shortcode_item .= 'traveladvisor_var_team_mail="' . htmlspecialchars($_POST['traveladvisor_var_team_mail'][$traveladvisor_counter_multi_team_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_team_description'][$traveladvisor_counter_multi_team_node]) && $_POST['traveladvisor_var_team_description'][$traveladvisor_counter_multi_team_node] != '') {
                                                    $shortcode_item .= 'traveladvisor_var_team_description="' . htmlspecialchars(preg_replace("/\"/", "'", $_POST['traveladvisor_var_team_description'][$traveladvisor_counter_multi_team_node]), ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_team_desc'][$traveladvisor_counter_multi_team_node]) && $_POST['traveladvisor_var_team_desc'][$traveladvisor_counter_multi_team_node] != '') {
                                                    $shortcode_item .= 'traveladvisor_var_team_desc="' . htmlspecialchars($_POST['traveladvisor_var_team_desc'][$traveladvisor_counter_multi_team_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_team_excerpt'][$traveladvisor_counter_multi_team_node]) && $_POST['traveladvisor_var_team_excerpt'][$traveladvisor_counter_multi_team_node] != '') {
                                                    $shortcode_item .= 'traveladvisor_var_team_excerpt="' . htmlspecialchars($_POST['traveladvisor_var_team_excerpt'][$traveladvisor_counter_multi_team_node], ENT_QUOTES) . '" ';
                                                }
                                                if (isset($_POST['traveladvisor_var_team_excerpt_length'][$traveladvisor_counter_multi_team_node]) && $_POST['traveladvisor_var_team_excerpt_length'][$traveladvisor_counter_multi_team_node] != '') {
                                                    $shortcode_item .= 'traveladvisor_var_team_excerpt_length="' . htmlspecialchars($_POST['traveladvisor_var_team_excerpt_length'][$traveladvisor_counter_multi_team_node], ENT_QUOTES) . '" ';
                                                }
                                                $shortcode_item .= ']';
                                                if (isset($_POST['traveladvisor_var_multi_team_des'][$traveladvisor_counter_multi_team_node]) && $_POST['traveladvisor_var_multi_team_des'][$traveladvisor_counter_multi_team_node] != '') {
                                                    $shortcode_item .= htmlspecialchars($_POST['traveladvisor_var_multi_team_des'][$traveladvisor_counter_multi_team_node], ENT_QUOTES);
                                                }
                                                $shortcode_item .= '[/team_item]';
                                                $traveladvisor_counter_multi_team_node++;
                                            }
                                        }
                                        $section_title = '';
                                        if (isset($_POST['traveladvisor_var_multi_team_title'][$traveladvisor_counter_multi_team]) && $_POST['traveladvisor_var_multi_team_title'][$traveladvisor_counter_multi_team] != '') {
                                            $section_title .= 'traveladvisor_var_multi_team_title="' . htmlspecialchars($_POST['traveladvisor_var_multi_team_title'][$traveladvisor_counter_multi_team], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_multi_team_sub_title'][$traveladvisor_counter_multi_team]) && $_POST['traveladvisor_var_multi_team_sub_title'][$traveladvisor_counter_multi_team] != '') {
                                            $section_title .= 'traveladvisor_var_multi_team_sub_title="' . htmlspecialchars($_POST['traveladvisor_var_multi_team_sub_title'][$traveladvisor_counter_multi_team], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_team_view'][$traveladvisor_counter_multi_team]) && $_POST['traveladvisor_var_team_view'][$traveladvisor_counter_multi_team] != '') {
                                            $section_title .= 'traveladvisor_var_team_view="' . htmlspecialchars($_POST['traveladvisor_var_team_view'][$traveladvisor_counter_multi_team], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_team_column_size'][$traveladvisor_counter_multi_team]) && $_POST['traveladvisor_var_team_column_size'][$traveladvisor_counter_multi_team] != '') {
                                            $section_title .= 'traveladvisor_var_team_column_size="' . htmlspecialchars($_POST['traveladvisor_var_team_column_size'][$traveladvisor_counter_multi_team], ENT_QUOTES) . '" ';
                                        }
                                        $shortcode = '[team ' . $section_title . ' ]' . $shortcode_item . '[/team]';
                                        $multi_team->addChild('traveladvisor_shortcode', $shortcode);
                                        $traveladvisor_counter_multi_team++;
                                    }
                                    $traveladvisor_global_counter_multi_team++;
                                } elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "map") {
                                    $traveladvisor_var_map_shortcode = '';
                                    $traveladvisor_var_map = $column->addChild('map');
                                    $traveladvisor_var_map->addChild('page_element_size', htmlspecialchars($_POST['map_element_size'][$traveladvisor_global_counter_map]));
                                    $traveladvisor_var_map->addChild('map_element_size', htmlspecialchars($_POST['map_element_size'][$traveladvisor_global_counter_map]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes(htmlspecialchars(( $_POST['shortcode']['map'][$traveladvisor_shortcode_counter_map]), ENT_QUOTES));
                                        $traveladvisor_shortcode_counter_map++;
                                        $traveladvisor_var_map->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        $traveladvisor_var_map_shortcode = '[traveladvisor_map ';
                                        if (isset($_POST['traveladvisor_var_map_title'][$traveladvisor_counter_map]) && $_POST['traveladvisor_var_map_title'][$traveladvisor_counter_map] != '') {
                                            $traveladvisor_var_map_shortcode .= 'traveladvisor_var_map_title="' . stripslashes(htmlspecialchars(($_POST['traveladvisor_var_map_title'][$traveladvisor_counter_map]), ENT_QUOTES)) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_map_height'][$traveladvisor_counter_map]) && $_POST['traveladvisor_var_map_height'][$traveladvisor_counter_map] != '') {
                                            $traveladvisor_var_map_shortcode .= 'traveladvisor_var_map_height="' . htmlspecialchars($_POST['traveladvisor_var_map_height'][$traveladvisor_counter_map], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_map_lat'][$traveladvisor_counter_map]) && $_POST['traveladvisor_var_map_lat'][$traveladvisor_counter_map] != '') {
                                            $traveladvisor_var_map_shortcode .= 'traveladvisor_var_map_lat="' . htmlspecialchars($_POST['traveladvisor_var_map_lat'][$traveladvisor_counter_map], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_map_lon'][$traveladvisor_counter_map]) && $_POST['traveladvisor_var_map_lon'][$traveladvisor_counter_map] != '') {
                                            $traveladvisor_var_map_shortcode .= 'traveladvisor_var_map_lon="' . htmlspecialchars($_POST['traveladvisor_var_map_lon'][$traveladvisor_counter_map], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_map_zoom'][$traveladvisor_counter_map]) && $_POST['traveladvisor_var_map_zoom'][$traveladvisor_counter_map] != '') {
                                            $traveladvisor_var_map_shortcode .= 'traveladvisor_var_map_zoom="' . htmlspecialchars($_POST['traveladvisor_var_map_zoom'][$traveladvisor_counter_map], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_map_type'][$traveladvisor_counter_map]) && $_POST['traveladvisor_var_map_type'][$traveladvisor_counter_map] != '') {
                                            $traveladvisor_var_map_shortcode .= 'traveladvisor_var_map_type="' . htmlspecialchars($_POST['traveladvisor_var_map_type'][$traveladvisor_counter_map], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_map_info'][$traveladvisor_counter_map]) && $_POST['traveladvisor_var_map_info'][$traveladvisor_counter_map] != '') {
                                            $traveladvisor_var_map_shortcode .= 'traveladvisor_var_map_info="' . htmlspecialchars(preg_replace("/\"/", "'", $_POST['traveladvisor_var_map_info'][$traveladvisor_counter_map]), ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_map_info_width'][$traveladvisor_counter_map]) && $_POST['traveladvisor_var_map_info_width'][$traveladvisor_counter_map] != '') {
                                            $traveladvisor_var_map_shortcode .= 'traveladvisor_var_map_info_width="' . htmlspecialchars($_POST['traveladvisor_var_map_info_width'][$traveladvisor_counter_map], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_map_info_height'][$traveladvisor_counter_map]) && $_POST['traveladvisor_var_map_info_height'][$traveladvisor_counter_map] != '') {
                                            $traveladvisor_var_map_shortcode .= 'traveladvisor_var_map_info_height="' . htmlspecialchars($_POST['traveladvisor_var_map_info_height'][$traveladvisor_counter_map], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_map_marker_icon_array'][$traveladvisor_counter_map]) && $_POST['traveladvisor_var_map_marker_icon_array'][$traveladvisor_counter_map] != '') {
                                            $traveladvisor_var_map_shortcode .= 'traveladvisor_var_map_marker_icon="' . htmlspecialchars($_POST['traveladvisor_var_map_marker_icon_array'][$traveladvisor_counter_map], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_map_show_marker'][$traveladvisor_counter_map]) && $_POST['traveladvisor_var_map_show_marker'][$traveladvisor_counter_map] != '') {
                                            $traveladvisor_var_map_shortcode .= 'traveladvisor_var_map_show_marker="' . htmlspecialchars($_POST['traveladvisor_var_map_show_marker'][$traveladvisor_counter_map], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_map_controls'][$traveladvisor_counter_map]) && $_POST['traveladvisor_var_map_controls'][$traveladvisor_counter_map] != '') {
                                            $traveladvisor_var_map_shortcode .= 'traveladvisor_var_map_controls="' . htmlspecialchars($_POST['traveladvisor_var_map_controls'][$traveladvisor_counter_map], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_map_draggable'][$traveladvisor_counter_map]) && $_POST['traveladvisor_var_map_draggable'][$traveladvisor_counter_map] != '') {
                                            $traveladvisor_var_map_shortcode .= 'traveladvisor_var_map_draggable="' . htmlspecialchars($_POST['traveladvisor_var_map_draggable'][$traveladvisor_counter_map], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_map_scrollwheel'][$traveladvisor_counter_map]) && $_POST['traveladvisor_var_map_scrollwheel'][$traveladvisor_counter_map] != '') {
                                            $traveladvisor_var_map_shortcode .= 'traveladvisor_var_map_scrollwheel="' . htmlspecialchars($_POST['traveladvisor_var_map_scrollwheel'][$traveladvisor_counter_map], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_map_border'][$traveladvisor_counter_map]) && $_POST['traveladvisor_var_map_border'][$traveladvisor_counter_map] != '') {
                                            $traveladvisor_var_map_shortcode .= 'traveladvisor_var_map_border="' . htmlspecialchars($_POST['traveladvisor_var_map_border'][$traveladvisor_counter_map], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_map_border_color'][$traveladvisor_counter_map]) && $_POST['traveladvisor_var_map_border_color'][$traveladvisor_counter_map] != '') {
                                            $traveladvisor_var_map_shortcode .= 'traveladvisor_var_map_border_color="' . htmlspecialchars($_POST['traveladvisor_var_map_border_color'][$traveladvisor_counter_map], ENT_QUOTES) . '" ';
                                        }
                                        $traveladvisor_var_map_shortcode .= ']';
                                        if (isset($_POST['map_text'][$traveladvisor_counter_map]) && $_POST['map_text'][$traveladvisor_counter_map] != '') {
                                            $traveladvisor_var_map_shortcode .= htmlspecialchars($_POST['map_text'][$traveladvisor_counter_map], ENT_QUOTES) . ' ';
                                        }
                                        $traveladvisor_var_map_shortcode .= '[/traveladvisor_map]';
                                        $traveladvisor_var_map->addChild('traveladvisor_shortcode', $traveladvisor_var_map_shortcode);
                                        $traveladvisor_counter_map++;
                                    }
                                    $traveladvisor_global_counter_map++;
                                } elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "image_frame") {
                                    $traveladvisor_bareber_image_frame = '';
                                    $image_frame = $column->addChild('image_frame');
                                    $image_frame->addChild('page_element_size', htmlspecialchars($_POST['image_frame_element_size'][$traveladvisor_global_counter_image_frame]));
                                    $image_frame->addChild('image_frame_element_size', htmlspecialchars($_POST['image_frame_element_size'][$traveladvisor_global_counter_image_frame]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes(htmlspecialchars(( $_POST['shortcode']['image_frame'][$traveladvisor_shortcode_counter_image_frame]), ENT_QUOTES));
                                        $traveladvisor_shortcode_counter_image_frame++;
                                        $image_frame->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        $traveladvisor_bareber_image_frame = '[traveladvisor_image_frame ';
                                        if (isset($_POST['traveladvisor_var_contact_info_title'][$traveladvisor_counter_image_frame]) && $_POST['traveladvisor_var_contact_info_title'][$traveladvisor_counter_image_frame] != '') {
                                            $traveladvisor_bareber_image_frame .= 'traveladvisor_var_contact_info_title="' . htmlspecialchars($_POST['traveladvisor_var_contact_info_title'][$traveladvisor_counter_image_frame], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_image_section_title'][$traveladvisor_counter_image_frame]) && $_POST['traveladvisor_var_image_section_title'][$traveladvisor_counter_image_frame] != '') {
                                            $traveladvisor_bareber_image_frame .= 'traveladvisor_var_image_section_title="' . htmlspecialchars($_POST['traveladvisor_var_image_section_title'][$traveladvisor_counter_image_frame], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_frame_image_url_array'][$traveladvisor_counter_image_frame]) && $_POST['traveladvisor_var_frame_image_url_array'][$traveladvisor_counter_image_frame] != '') {
                                            $traveladvisor_bareber_image_frame .= 'traveladvisor_var_frame_image_url_array="' . htmlspecialchars($_POST['traveladvisor_var_frame_image_url_array'][$traveladvisor_counter_image_frame], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_image_title'][$traveladvisor_counter_image_frame]) && $_POST['traveladvisor_var_image_title'][$traveladvisor_counter_image_frame] != '') {
                                            $traveladvisor_bareber_image_frame .= 'traveladvisor_var_image_title="' . htmlspecialchars($_POST['traveladvisor_var_image_title'][$traveladvisor_counter_image_frame], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_image_frame_caption'][$traveladvisor_counter_image_frame]) && $_POST['traveladvisor_var_image_frame_caption'][$traveladvisor_counter_image_frame] != '') {
                                            $traveladvisor_bareber_image_frame .= 'traveladvisor_var_image_frame_caption="' . htmlspecialchars($_POST['traveladvisor_var_image_frame_caption'][$traveladvisor_counter_image_frame], ENT_QUOTES) . '" ';
                                        }
                                        $traveladvisor_bareber_image_frame .= ']';
                                        if (isset($_POST['image_frame_text'][$traveladvisor_counter_image_frame]) && $_POST['contact_info_text'][$traveladvisor_counter_image_frame] != '') {
                                            $traveladvisor_bareber_image_frame .= htmlspecialchars($_POST['contact_info_text'][$traveladvisor_counter_image_frame], ENT_QUOTES) . ' ';
                                        }
                                        $traveladvisor_bareber_image_frame .= '[/traveladvisor_image_frame]';

                                        $image_frame->addChild('traveladvisor_shortcode', $traveladvisor_bareber_image_frame);
                                        $traveladvisor_counter_image_frame++;
                                    }
                                    $traveladvisor_global_counter_image_frame++;
                                } elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "divider") {
                                    $traveladvisor_var_divider = '';
                                    $divider = $column->addChild('divider');
                                    $divider->addChild('page_element_size', htmlspecialchars($_POST['divider_element_size'][$traveladvisor_global_counter_divider]));
                                    $divider->addChild('divider_element_size', htmlspecialchars($_POST['divider_element_size'][$traveladvisor_global_counter_divider]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes(htmlspecialchars(( $_POST['shortcode']['divider'][$traveladvisor_shortcode_counter_divider]), ENT_QUOTES));
                                        $traveladvisor_shortcode_counter_divider++;
                                        $divider->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        $traveladvisor_var_divider = '[traveladvisor_divider ';
                                        if (isset($_POST['traveladvisor_var_divider_padding_left'][$traveladvisor_counter_divider]) && $_POST['traveladvisor_var_divider_padding_left'][$traveladvisor_counter_divider] != '') {
                                            $traveladvisor_var_divider .= 'traveladvisor_var_divider_padding_left="' . stripslashes(htmlspecialchars(($_POST['traveladvisor_var_divider_padding_left'][$traveladvisor_counter_divider]), ENT_QUOTES)) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_divider_padding_right'][$traveladvisor_counter_divider]) && $_POST['traveladvisor_var_divider_padding_right'][$traveladvisor_counter_divider] != '') {
                                            $traveladvisor_var_divider .= 'traveladvisor_var_divider_padding_right="' . stripslashes(htmlspecialchars(($_POST['traveladvisor_var_divider_padding_right'][$traveladvisor_counter_divider]), ENT_QUOTES)) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_divider_padding_top'][$traveladvisor_counter_divider]) && $_POST['traveladvisor_var_divider_padding_top'][$traveladvisor_counter_divider] != '') {
                                            $traveladvisor_var_divider .= 'traveladvisor_var_divider_padding_top="' . stripslashes(htmlspecialchars(($_POST['traveladvisor_var_divider_padding_top'][$traveladvisor_counter_divider]), ENT_QUOTES)) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_divider_padding_buttom'][$traveladvisor_counter_divider]) && $_POST['traveladvisor_var_divider_padding_buttom'][$traveladvisor_counter_divider] != '') {
                                            $traveladvisor_var_divider .= 'traveladvisor_var_divider_padding_buttom="' . stripslashes(htmlspecialchars(($_POST['traveladvisor_var_divider_padding_buttom'][$traveladvisor_counter_divider]), ENT_QUOTES)) . '" ';
                                        }
                                        $traveladvisor_var_divider .= ']';
                                        $traveladvisor_var_divider .= '[/traveladvisor_divider]';
                                        $divider->addChild('traveladvisor_shortcode', $traveladvisor_var_divider);
                                        $traveladvisor_counter_divider++;
                                    }
                                    $traveladvisor_global_counter_divider++;
                                } elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "button") {
                                    $traveladvisor_var_button = '';
                                    $button = $column->addChild('button');
                                    $button->addChild('page_element_size', htmlspecialchars($_POST['button_element_size'][$traveladvisor_global_counter_button]));
                                    $button->addChild('button_element_size', htmlspecialchars($_POST['button_element_size'][$traveladvisor_global_counter_button]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes(htmlspecialchars(( $_POST['shortcode']['button'][$traveladvisor_shortcode_counter_button]), ENT_QUOTES));
                                        $traveladvisor_var_button++;
                                        $button->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        $traveladvisor_var_button = '[traveladvisor_button ';
                                        if (isset($_POST['traveladvisor_var_column_size'][$traveladvisor_counter_button]) && $_POST['traveladvisor_var_column_size'][$traveladvisor_counter_button] != '') {
                                            $traveladvisor_var_button .= 'traveladvisor_var_column_size="' . htmlspecialchars($_POST['traveladvisor_var_column_size'][$traveladvisor_counter_button], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_button_text'][$traveladvisor_counter_button]) && $_POST['traveladvisor_var_button_text'][$traveladvisor_counter_button] != '') {
                                            $traveladvisor_var_button .= 'traveladvisor_var_button_text="' . htmlspecialchars($_POST['traveladvisor_var_button_text'][$traveladvisor_counter_button], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_button_size'][$traveladvisor_counter_button]) && $_POST['traveladvisor_var_button_size'][$traveladvisor_counter_button] != '') {
                                            $traveladvisor_var_button .= 'traveladvisor_var_button_size="' . htmlspecialchars($_POST['traveladvisor_var_button_size'][$traveladvisor_counter_button], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_button_icon'][$traveladvisor_counter_button]) && $_POST['traveladvisor_var_button_icon'][$traveladvisor_counter_button] != '') {
                                            $traveladvisor_var_button .= 'traveladvisor_var_button_icon="' . htmlspecialchars($_POST['traveladvisor_var_button_icon'][$traveladvisor_counter_button], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_button_link'][$traveladvisor_counter_button]) && $_POST['traveladvisor_var_button_link'][$traveladvisor_counter_button] != '') {
                                            $traveladvisor_var_button .= 'traveladvisor_var_button_link="' . htmlspecialchars($_POST['traveladvisor_var_button_link'][$traveladvisor_counter_button], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_button_padding_top'][$traveladvisor_counter_button]) && $_POST['traveladvisor_var_button_padding_top'][$traveladvisor_counter_button] != '') {
                                            $traveladvisor_var_button .= 'traveladvisor_var_button_padding_top="' . htmlspecialchars($_POST['traveladvisor_var_button_padding_top'][$traveladvisor_counter_button], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_button_padding_bottom'][$traveladvisor_counter_button]) && $_POST['traveladvisor_var_button_padding_bottom'][$traveladvisor_counter_button] != '') {
                                            $traveladvisor_var_button .= 'traveladvisor_var_button_padding_bottom="' . htmlspecialchars($_POST['traveladvisor_var_button_padding_bottom'][$traveladvisor_counter_button], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_button_padding_left'][$traveladvisor_counter_button]) && $_POST['traveladvisor_var_button_padding_left'][$traveladvisor_counter_button] != '') {
                                            $traveladvisor_var_button .= 'traveladvisor_var_button_padding_left="' . htmlspecialchars($_POST['traveladvisor_var_button_padding_left'][$traveladvisor_counter_button], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_button_padding_right'][$traveladvisor_counter_button]) && $_POST['traveladvisor_var_button_padding_right'][$traveladvisor_counter_button] != '') {
                                            $traveladvisor_var_button .= 'traveladvisor_var_button_padding_right="' . htmlspecialchars($_POST['traveladvisor_var_button_padding_right'][$traveladvisor_counter_button], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_button_border'][$traveladvisor_counter_button]) && $_POST['traveladvisor_var_button_border'][$traveladvisor_counter_button] != '') {
                                            $traveladvisor_var_button .= 'traveladvisor_var_button_border="' . htmlspecialchars($_POST['traveladvisor_var_button_border'][$traveladvisor_counter_button], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_button_type'][$traveladvisor_counter_button]) && $_POST['traveladvisor_var_button_type'][$traveladvisor_counter_button] != '') {
                                            $traveladvisor_var_button .= 'traveladvisor_var_button_type="' . htmlspecialchars($_POST['traveladvisor_var_button_type'][$traveladvisor_counter_button], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_button_threed'][$traveladvisor_counter_button]) && $_POST['traveladvisor_var_button_threed'][$traveladvisor_counter_button] != '') {
                                            $traveladvisor_var_button .= 'traveladvisor_var_button_threed="' . htmlspecialchars($_POST['traveladvisor_var_button_threed'][$traveladvisor_counter_button], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_button_target'][$traveladvisor_counter_button]) && $_POST['traveladvisor_var_button_target'][$traveladvisor_counter_button] != '') {
                                            $traveladvisor_var_button .= 'traveladvisor_var_button_target="' . htmlspecialchars($_POST['traveladvisor_var_button_target'][$traveladvisor_counter_button], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_button_border_color'][$traveladvisor_counter_button]) && $_POST['traveladvisor_var_button_border_color'][$traveladvisor_counter_button] != '') {
                                            $traveladvisor_var_button .= 'traveladvisor_var_button_border_color="' . htmlspecialchars($_POST['traveladvisor_var_button_border_color'][$traveladvisor_counter_button], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_button_bg_color'][$traveladvisor_counter_button]) && $_POST['traveladvisor_var_button_bg_color'][$traveladvisor_counter_button] != '') {
                                            $traveladvisor_var_button .= 'traveladvisor_var_button_bg_color="' . htmlspecialchars($_POST['traveladvisor_var_button_bg_color'][$traveladvisor_counter_button], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_button_color'][$traveladvisor_counter_button]) && $_POST['traveladvisor_var_button_color'][$traveladvisor_counter_button] != '') {
                                            $traveladvisor_var_button .= 'traveladvisor_var_button_color="' . htmlspecialchars($_POST['traveladvisor_var_button_color'][$traveladvisor_counter_button], ENT_QUOTES) . '" ';
                                        }
                                        $traveladvisor_var_button .= ']';
                                        $traveladvisor_var_button .= '[/traveladvisor_button]';
                                        $button->addChild('traveladvisor_shortcode', $traveladvisor_var_button);
                                        $traveladvisor_counter_button++;
                                    }
                                    $traveladvisor_global_counter_button++;
                                } elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "toursearch") {
                                    $traveladvisor_var_toursearch = '';
                                    $toursearch = $column->addChild('toursearch');
                                    $toursearch->addChild('page_element_size', htmlspecialchars($_POST['toursearch_element_size'][$traveladvisor_global_counter_toursearch]));
                                    $toursearch->addChild('toursearch_element_size', htmlspecialchars($_POST['toursearch_element_size'][$traveladvisor_global_counter_toursearch]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes(htmlspecialchars(( $_POST['shortcode']['toursearch'][$traveladvisor_shortcode_counter_toursearch]), ENT_QUOTES));
                                        $traveladvisor_var_toursearch++;
                                        $toursearch->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        $traveladvisor_var_toursearch = '[traveladvisor_toursearch ';
                                        if (isset($_POST['traveladvisor_var_toursearch_text'][$traveladvisor_counter_toursearch]) && $_POST['traveladvisor_var_toursearch_text'][$traveladvisor_counter_toursearch] != '') {
                                            $traveladvisor_var_toursearch .= 'traveladvisor_var_toursearch_text="' . htmlspecialchars($_POST['traveladvisor_var_toursearch_text'][$traveladvisor_counter_toursearch], ENT_QUOTES) . '" ';
                                        }
                                        $traveladvisor_var_toursearch .= ']';
                                        if (isset($_POST['toursearch_text'][$traveladvisor_counter_toursearch]) && $_POST['toursearch_text'][$traveladvisor_counter_toursearch] != '') {
                                            $traveladvisor_var_toursearch .= htmlspecialchars($_POST['toursearch_text'][$traveladvisor_counter_toursearch], ENT_QUOTES) . ' ';
                                        }
                                        $traveladvisor_var_toursearch .= '[/traveladvisor_toursearch]';
                                        $toursearch->addChild('traveladvisor_shortcode', $traveladvisor_var_toursearch);
                                        $traveladvisor_counter_toursearch++;
                                    }
                                    $traveladvisor_global_counter_toursearch++;
                                } elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "maintenance") {
                                    $traveladvisor_var_maintenance = '';
                                    $maintenance = $column->addChild('maintenance');
                                    $maintenance->addChild('page_element_size', htmlspecialchars($_POST['maintenance_element_size'][$traveladvisor_global_counter_maintenance]));
                                    $maintenance->addChild('maintenance_element_size', htmlspecialchars($_POST['maintenance_element_size'][$traveladvisor_global_counter_maintenance]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes(htmlspecialchars(( $_POST['shortcode']['maintenance'][$traveladvisor_shortcode_counter_maintenance]), ENT_QUOTES));
                                        $traveladvisor_shortcode_counter_maintenance++;
                                        $maintenance->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        $traveladvisor_var_maintenance = '[traveladvisor_maintenance ';
                                        if (isset($_POST['traveladvisor_var_maintenance_title'][$traveladvisor_counter_maintenance]) && $_POST['traveladvisor_var_maintenance_title'][$traveladvisor_counter_maintenance] != '') {
                                            $traveladvisor_var_maintenance .= 'traveladvisor_var_maintenance_title="' . htmlspecialchars($_POST['traveladvisor_var_maintenance_title'][$traveladvisor_counter_maintenance], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_maintenance_sub_title'][$traveladvisor_counter_maintenance]) && $_POST['traveladvisor_var_maintenance_sub_title'][$traveladvisor_counter_maintenance] != '') {
                                            $traveladvisor_var_maintenance .= 'traveladvisor_var_maintenance_sub_title="' . htmlspecialchars($_POST['traveladvisor_var_maintenance_sub_title'][$traveladvisor_counter_maintenance], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_lunch_date'][$traveladvisor_counter_maintenance]) && $_POST['traveladvisor_var_lunch_date'][$traveladvisor_counter_maintenance] != '') {
                                            $traveladvisor_var_maintenance .= 'traveladvisor_var_lunch_date="' . htmlspecialchars($_POST['traveladvisor_var_lunch_date'][$traveladvisor_counter_maintenance], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_maintenance_image_url_array'][$traveladvisor_counter_maintenance]) && $_POST['traveladvisor_var_maintenance_image_url_array'][$traveladvisor_counter_maintenance] != '') {
                                            $traveladvisor_var_maintenance .= 'traveladvisor_var_maintenance_image_url_array="' . htmlspecialchars($_POST['traveladvisor_var_maintenance_image_url_array'][$traveladvisor_counter_maintenance], ENT_QUOTES) . '" ';
                                        }
                                        $traveladvisor_var_maintenance .= ']';
                                        if (isset($_POST['traveladvisor_maintenance_column_text'][$traveladvisor_counter_maintenance]) && $_POST['traveladvisor_maintenance_column_text'][$traveladvisor_counter_maintenance] != '') {
                                            $traveladvisor_var_maintenance .= htmlspecialchars($_POST['traveladvisor_maintenance_column_text'][$traveladvisor_counter_maintenance], ENT_QUOTES) . ' ';
                                        }
                                        $traveladvisor_var_maintenance .= '[/traveladvisor_maintenance]';
                                        $maintenance->addChild('traveladvisor_shortcode', $traveladvisor_var_maintenance);
                                        $traveladvisor_counter_maintenance++;
                                    }
                                    $traveladvisor_global_counter_maintenance++;
                                } elseif ($_POST['traveladvisor_orderby'][$traveladvisor_counter] == "contact_us") {
                                    $shortcode = '';
                                    $contact_us = $column->addChild('contact_us');
                                    $contact_us->addChild('page_element_size', htmlspecialchars($_POST['contact_us_element_size'][$traveladvisor_global_counter_contact_us]));
                                    $contact_us->addChild('contact_us_element_size', htmlspecialchars($_POST['contact_us_element_size'][$traveladvisor_global_counter_contact_us]));
                                    if (isset($_POST['traveladvisor_widget_element_num'][$traveladvisor_counter]) && $_POST['traveladvisor_widget_element_num'][$traveladvisor_counter] == 'shortcode') {
                                        $shortcode_str = stripslashes(htmlspecialchars(( $_POST['shortcode']['contact_us'][$traveladvisor_shortcode_counter_contact_us]), ENT_QUOTES));
                                        $traveladvisor_shortcode_counter_contact_us++;
                                        $contact_us->addChild('traveladvisor_shortcode', htmlspecialchars($shortcode_str, ENT_QUOTES));
                                    } else {
                                        $shortcode = '[traveladvisor_contact_us ';
                                        if (isset($_POST['traveladvisor_var_contact_us_element_title'][$traveladvisor_counter_contact_us]) && $_POST['traveladvisor_var_contact_us_element_title'][$traveladvisor_counter_contact_us] != '') {
                                            $shortcode .= 'traveladvisor_var_contact_us_element_title="' . stripslashes(htmlspecialchars(($_POST['traveladvisor_var_contact_us_element_title'][$traveladvisor_counter_contact_us]), ENT_QUOTES)) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_contact_us_element_subtitle'][$traveladvisor_counter_contact_us]) && $_POST['traveladvisor_var_contact_us_element_subtitle'][$traveladvisor_counter_contact_us] != '') {
                                            $shortcode .= 'traveladvisor_var_contact_us_element_subtitle="' . htmlspecialchars($_POST['traveladvisor_var_contact_us_element_subtitle'][$traveladvisor_counter_contact_us], ENT_QUOTES) . '" ';
                                        }

                                        if (isset($_POST['traveladvisor_var_contact_us_element_send'][$traveladvisor_counter_contact_us]) && $_POST['traveladvisor_var_contact_us_element_send'][$traveladvisor_counter_contact_us] != '') {
                                            $shortcode .= 'traveladvisor_var_contact_us_element_send="' . htmlspecialchars($_POST['traveladvisor_var_contact_us_element_send'][$traveladvisor_counter_contact_us], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_contact_us_element_success'][$traveladvisor_counter_contact_us]) && $_POST['traveladvisor_var_contact_us_element_success'][$traveladvisor_counter_contact_us] != '') {
                                            $shortcode .= 'traveladvisor_var_contact_us_element_success="' . htmlspecialchars($_POST['traveladvisor_var_contact_us_element_success'][$traveladvisor_counter_contact_us], ENT_QUOTES) . '" ';
                                        }
                                        if (isset($_POST['traveladvisor_var_contact_us_element_error'][$traveladvisor_counter_contact_us]) && $_POST['traveladvisor_var_contact_us_element_error'][$traveladvisor_counter_contact_us] != '') {
                                            $shortcode .= 'traveladvisor_var_contact_us_element_error="' . htmlspecialchars($_POST['traveladvisor_var_contact_us_element_error'][$traveladvisor_counter_contact_us], ENT_QUOTES) . '" ';
                                        }
                                        $shortcode .= ']';
                                        $shortcode .= '[/traveladvisor_contact_us]';
                                        $contact_us->addChild('traveladvisor_shortcode', $shortcode);
                                        $traveladvisor_counter_contact_us++;
                                    }
                                    $traveladvisor_global_counter_contact_us++;
                                }
                                $traveladvisor_counter++;
                            }
                            $widget_no++;
                        }
                        $column_container_no++;
                    }
                }
                update_post_meta($post_id, 'traveladvisor_page_builder', $sxe->asXML());
                //creating xml page builder end
            }
        }
    }
}
?>