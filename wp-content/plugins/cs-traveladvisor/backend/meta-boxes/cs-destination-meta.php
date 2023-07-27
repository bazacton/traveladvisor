<?php
/**
 * @Add Meta Box For Galleries
 * @return
 *
 */
if (!class_exists('traveladvisor_var_destination_meta')) {

    class traveladvisor_var_destination_meta {

        public function __construct() {
            add_action('add_meta_boxes', array($this, 'traveladvisor_var_meta_destination_add'));
            add_action('wp_ajax_add_destination_to_list', array($this, 'add_destination_to_list'));
        }

        function traveladvisor_var_meta_destination_add() {
            $strings = new traveladvisor_plugin_all_strings;
            $strings -> traveladvisor_plugin_activation_strings();
            add_meta_box('traveladvisor_var_meta_destination', traveladvisor_var_theme_text_srt('traveladvisor_var_destination_meta_options'), array($this, 'traveladvisor_var_meta_destination'), 'destination', 'normal', 'high');
        }

        function traveladvisor_var_meta_destination($post) {
            global $post, $traveladvisor_var_theme_options, $page_option, $traveladvisor_var_form_meta;
            $traveladvisor_var_theme_options = get_option('traveladvisor_var_theme_options');
            $traveladvisor_var_builtin_seo_fields = isset($traveladvisor_var_theme_options['traveladvisor_var_builtin_seo_fields']) ? $traveladvisor_var_theme_options['traveladvisor_var_builtin_seo_fields'] : '';
            $traveladvisor_var_header_position = isset($traveladvisor_var_theme_options['traveladvisor_var_header_position']) ? $traveladvisor_var_theme_options['traveladvisor_var_header_position'] : '';
            ?>		
            <div class="page-wrap page-opts left" style="overflow:hidden; position:relative;">
                <div class="option-sec" style="margin-bottom:0;">
                    <div class="opt-conts">
                        <div class="elementhidden">
                            <div id="tab-galleries-settings-cs-galleries">
                                <?php
                                $this->traveladvisor_var_destination_sidebar();
                                if (function_exists('traveladvisor_var_sidebar_layout_options')) {
                                    traveladvisor_var_sidebar_layout_options();
                                }
                                $this->traveladvisor_var_post_destination_fields();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <?php
        }

        /**
         * @Destination Custom Fileds Function
         * @return
         */
        function traveladvisor_var_destination_sidebar() {

            global $post, $traveladvisor_barber_form_fields, $traveladvisor_barber_html_fields;

            if (function_exists('traveladvisor_sidebar_layout_options')) {
                traveladvisor_sidebar_layout_options();
            }
        }

        function traveladvisor_var_post_destination_fields() {
            global $post, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
            
            $strings = new traveladvisor_plugin_all_strings;
            $strings -> traveladvisor_plugin_activation_strings();

            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_country/state/region'),
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_country_hint'),
                'echo' => true,
                'std' => '',
                'field_params' => array(
                    'id' => 'country',
                    'return' => true
                )
            );
            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_most_popular'),
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_most_popular_hint'),
                'echo' => true,
                'desc' => '',
                'field_params' => array(
                    'id' => 'popular_destination',
                    'return' => true,
                    'classes' => 'chosen-select',
                    'std' => '',
                    'options' => array(
                        'no'=> traveladvisor_var_theme_text_srt('traveladvisor_var_destination_most_popular_no'),
                        'yes'=> traveladvisor_var_theme_text_srt('traveladvisor_var_destination_most_popular_yes')
                        ),
                )
            );
            $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_var_opt_array);
            
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_add_gallery'),
                'id' => 'destination_gallery_images',
                'classes' => '',
                'std' => 'destination_meta_form',
            );
            $traveladvisor_var_html_fields->traveladvisor_var_gallery_render($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_point_of_interest'),
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_point_of_interest_hint'),
                'echo' => true,
                'desc' => '',
                'field_params' => array(
                    'id' => 'point_of_interest_check',
                    'return' => true,
                    'std' => '',
                )
            );
            $traveladvisor_var_html_fields->traveladvisor_var_checkbox_field($traveladvisor_var_opt_array);
            $this->traveladvisor_var_destination_destination_list();
        }

        function traveladvisor_var_destination_destination_list() {
            global $post, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
            
            $strings = new traveladvisor_plugin_all_strings;
            $strings -> traveladvisor_plugin_activation_strings();
            
            $traveladvisor_var_get_destinations = get_post_meta($post->ID, 'traveladvisor_var_destinations_array', true);
            $traveladvisor_var_destination_names = get_post_meta($post->ID, 'traveladvisor_var_destination_name_array', true);
            $traveladvisor_var_destination_descs = get_post_meta($post->ID, 'traveladvisor_var_destination_desc_array', true);
            $traveladvisor_var_add_urls = get_post_meta($post->ID, 'traveladvisor_var_add_url_array', true);
            $traveladvisor_var_point_of_interest_images = get_post_meta($post->ID, 'traveladvisor_var_point_of_interest_image_array', true);
            $traveladvisor_var_title_urls = get_post_meta($post->ID, 'traveladvisor_var_title_url_array', true);
            $html = '
                    <script>
                            jQuery(document).ready(function($) {
                                    $("#total_destinations").sortable({
                                            cancel : \'td div.table-form-elem\'
                                    });
                            });
                    </script>
                      <ul class="form-elements">
                                    <li class="to-button"><a href="javascript:traveladvisor_var_createpop(\'add_destination_title\',\'filter\')" class="button">' . traveladvisor_var_theme_text_srt('traveladvisor_var_destination_add_point_of_interest') . '</a> </li>
                       </ul>
                      <div class="cs-service-list-table">
                      <table class="to-table" border="0" cellspacing="0">
                            <thead>
                              <tr>
                                    <th style="width:100%;">' . traveladvisor_var_theme_text_srt('traveladvisor_var_destination_title_point_of_interest') . '</th>
                                    <th style="width:20%;" class="right">' . traveladvisor_var_theme_text_srt('traveladvisor_var_destination_actions_point_of_interest') . '</th>
                              </tr>
                            </thead>
                            <tbody id="total_destinations">';
            if (isset($traveladvisor_var_get_destinations) && is_array($traveladvisor_var_get_destinations) && count($traveladvisor_var_get_destinations) > 0) {
                $traveladvisor_var_destination_counter = 0;
                foreach ($traveladvisor_var_get_destinations as $destinations) {
                    if (isset($destinations) && $destinations <> '') {
                        $counter_destination = $destination_id = $destinations;
                        $traveladvisor_var_destination_name = isset($traveladvisor_var_destination_names[$traveladvisor_var_destination_counter]) ? $traveladvisor_var_destination_names[$traveladvisor_var_destination_counter] : '';
                        $traveladvisor_var_destination_desc = isset($traveladvisor_var_destination_descs[$traveladvisor_var_destination_counter]) ? $traveladvisor_var_destination_descs[$traveladvisor_var_destination_counter] : '';
                        $traveladvisor_var_add_url = isset($traveladvisor_var_add_urls[$traveladvisor_var_destination_counter]) ? $traveladvisor_var_add_urls[$traveladvisor_var_destination_counter] : '';
                        $traveladvisor_var_point_of_interest_image = isset($traveladvisor_var_point_of_interest_images[$traveladvisor_var_destination_counter]) ? $traveladvisor_var_point_of_interest_images[$traveladvisor_var_destination_counter] : '';
                        $traveladvisor_var_title_url = isset($traveladvisor_var_title_urls[$traveladvisor_var_destination_counter]) ? $traveladvisor_var_title_urls[$traveladvisor_var_destination_counter] : '';
                        $traveladvisor_var_destinations_array = array(
                            'counter_destination' => $counter_destination,
                            'destination_id' => $destination_id,
                            'traveladvisor_var_destination_name' => $traveladvisor_var_destination_name,
                            'traveladvisor_var_destination_desc' => $traveladvisor_var_destination_desc,
                            'traveladvisor_var_add_url' => $traveladvisor_var_add_url,
                            'traveladvisor_var_point_of_interest_image' => $traveladvisor_var_point_of_interest_image,
                            'traveladvisor_var_title_url' => $traveladvisor_var_title_url,
                        );
                        $html .= $this->add_destination_to_list($traveladvisor_var_destinations_array);
                    }
                    $traveladvisor_var_destination_counter++;
                }
            }
            $html .= '
                            </tbody>
                      </table>

                      </div>
                      <div id="add_destination_title" style="display: none;">
                            <div class="cs-heading-area">
                              <h5><i class="icon-plus-circle"></i> ' . traveladvisor_var_theme_text_srt('traveladvisor_var_destination_experiences_setting') . '</h5>
                              <span class="cs-btnclose" onClick="javascript:traveladvisor_var_remove_overlay(\'add_destination_title\',\'append\')"> <i class="icon-times"></i></span> 	
                            </div>';

            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_title_point_of_interest'),
                'desc' => '',
                'hint_text' => '',
                'echo' => false,
                'field_params' => array(
                    'std' => '',
                    'id' => 'destination_name',
                    'return' => true,
                ),
            );

            $html .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);

            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_title_url_point_of_interest'),
                'desc' => '',
                'echo' => false,
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_title_url_point_of_interest_hint'),
                'field_params' => array(
                    'std' => '',
                    'id' => 'title_url',
                    'return' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_description'),
                'desc' => '',
                'hint_text' => '',
                'echo' => false,
                'field_params' => array(
                    'std' => '',
                    'id' => 'destination_desc',
                    'return' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_add_image'),
                'echo' => false,
                'std' => '',
                'id' => 'point_of_interest_image',
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_add_image_hint'),
                'field_params' => array(
                    'id' => 'point_of_interest_image',
                    'std' => '',
                    'return' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_upload_file_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_website_url'),
                'desc' => '',
                'echo' => false,
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_website_url_hint'),
                'field_params' => array(
                    'std' => '',
                    'id' => 'add_url',
                    'return' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $html .= '
                            <ul class="form-elements noborder">
                              <li class="to-label"></li>
                              <li class="to-field">
                                    <input type="button" value="' . traveladvisor_var_theme_text_srt('traveladvisor_var_destination_add_point_of_interest') . '" onClick="add_destination_list(\'' . esc_js(admin_url('admin-ajax.php')) . '\', \'' . esc_js(get_template_directory_uri()) . '\')" />
                                    <div class="feature-loader"></div>
                              </li>
                            </ul>
                      </div>';

            echo force_balance_tags($html, true);
        }

        function add_destination_to_list($traveladvisor_var_atts) {
            global $post, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
            
            $strings = new traveladvisor_plugin_all_strings;
            $strings -> traveladvisor_plugin_activation_strings();
            
            $traveladvisor_var_defaults = array(
                'counter_destination' => '',
                'destination_id' => '',
                'traveladvisor_var_destination_name' => '',
                'traveladvisor_var_destination_desc' => '',
                'traveladvisor_var_add_url' => '',
                'traveladvisor_var_point_of_interest_image' => '',
                'traveladvisor_var_title_url' => '',
            );
            extract(shortcode_atts($traveladvisor_var_defaults, $traveladvisor_var_atts));

            foreach ($_POST as $keys => $values) {
                $keys = $values;
            }

            if (isset($_POST['traveladvisor_var_destination_name']) && $_POST['traveladvisor_var_destination_name'] <> '')
                $traveladvisor_var_destination_name = $_POST['traveladvisor_var_destination_name'];
            if (isset($_POST['traveladvisor_var_destination_desc']) && $_POST['traveladvisor_var_destination_desc'] <> '')
                $traveladvisor_var_destination_desc = $_POST['traveladvisor_var_destination_desc'];
            if (isset($_POST['traveladvisor_var_add_url']) && $_POST['traveladvisor_var_add_url'] <> '')
                $traveladvisor_var_add_url = $_POST['traveladvisor_var_add_url'];
            if (isset($_POST['traveladvisor_var_title_url']) && $_POST['traveladvisor_var_title_url'] <> '')
                $traveladvisor_var_title_url = $_POST['traveladvisor_var_title_url'];
            if (isset($_POST['traveladvisor_var_point_of_interest_image']) && $_POST['traveladvisor_var_point_of_interest_image'] <> '')
                $traveladvisor_var_point_of_interest_image = $_POST['traveladvisor_var_point_of_interest_image'];
            if ($destination_id == '' && $counter_destination == '') {
                $counter_destination = $destination_id = time();
            }
            $html = '

                            <tr class="parentdelete" id="edit_track' . absint($counter_destination) . '">
                              <td id="subject-title' . absint($counter_destination) . '" style="width:100%;">' . esc_attr($traveladvisor_var_destination_name) . '</td>

                              <td class="centr" style="width:20%;"><a href="javascript:traveladvisor_var_createpop(\'edit_track_form' . absint($counter_destination) . '\',\'filter\')" class="actions edit">&nbsp;</a> <a href="#" class="delete-it btndeleteit actions delete">&nbsp;</a></td>
                              <td style="width:0"><div id="edit_track_form' . esc_attr($counter_destination) . '" style="display: none;" class="table-form-elem">
                                    <input type="hidden" name="traveladvisor_var_destinations_array[]" value="' . absint($destination_id) . '" />
                                      <div class="cs-heading-area">
                                            <h5 style="text-align: left;">' . traveladvisor_var_theme_text_srt('traveladvisor_var_destination_point_of_interest_settings') . '</h5>
                                            <span onclick="javascript:traveladvisor_var_remove_overlay(\'edit_track_form' . esc_js($counter_destination) . '\',\'append\')" class="cs-btnclose"> <i class="icon-times"></i></span>
                                            <div class="clear"></div>
                                      </div>';

            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_update_title'),
                'desc' => '',
                'hint_text' => '',
                'echo' => false,
                'field_params' => array(
                    'std' => esc_html($traveladvisor_var_destination_name),
                    'id' => 'destination_name',
                    'return' => true,
                    'array' => true,
                    'force_std' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_edit_title_url'),
                'desc' => '',
                'echo' => false,
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_edit_title_url'),
                'field_params' => array(
                    'std' => esc_html($traveladvisor_var_title_url),
                    'id' => 'title_url',
                    'return' => true,
                    'array' => true,
                    'force_std' => true,
                ),
            );

            $html .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_update_description'),
                'desc' => '',
                'hint_text' => '',
                'echo' => false,
                'field_params' => array(
                    'std' => esc_html($traveladvisor_var_destination_desc),
                    'id' => 'destination_desc',
                    'return' => true,
                    'array' => true,
                    'force_std' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_update_image'),
                'echo' => false,
                'std' => esc_url($traveladvisor_var_point_of_interest_image),
                'id' => 'point_of_interest_image',
                'desc' => '',
                'force_std' => true,
                'array' => true,
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_update_image_hint'),
                'field_params' => array(
                    'id' => 'point_of_interest_image',
                    'std' => esc_url($traveladvisor_var_point_of_interest_image),
                    'return' => true,
                    'array' => true,
                    'force_std' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_upload_file_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_update_website_url'),
                'desc' => '',
                'echo' => false,
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_destination_update_website_url_hint'),
                'field_params' => array(
                    'std' => esc_url($traveladvisor_var_add_url),
                    'id' => 'add_url',
                    'return' => true,
                    'array' => true,
                    'force_std' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $html .= '
                                        <ul class="form-elements noborder">
                                              <li class="to-label">
                                                <label></label>
                                              </li>
                                              <li class="to-field">
                                                <input type="button" value="' . traveladvisor_var_theme_text_srt('traveladvisor_var_destination_update_experience') . '" onclick="traveladvisor_var_remove_overlay(\'edit_track_form' . esc_js($counter_destination) . '\',\'append\')" />
                                              </li>
                                        </ul>
                                      </div></td>
                              </tr>';
            if (isset($_POST['traveladvisor_var_destination_name']) && isset($_POST['traveladvisor_var_destination_desc'])) {
                echo force_balance_tags($html);
            } else {
                return $html;
            }
            if (isset($_POST['traveladvisor_var_destination_name']) && isset($_POST['traveladvisor_var_destination_desc']))
                die();
        }

    }

    return new traveladvisor_var_destination_meta();
}