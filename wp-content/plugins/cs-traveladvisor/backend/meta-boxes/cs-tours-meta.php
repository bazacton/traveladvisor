<?php
/**
 * @Add Meta Box For Tourss
 * @return
 *
 */
if (!class_exists('traveladvisor_var_tours_meta')) {

    class traveladvisor_var_tours_meta {

        public function __construct() {
            add_action('add_meta_boxes', array($this, 'traveladvisor_var_meta_tours_add'));
            add_action('wp_ajax_add_question_to_list', array($this, 'add_question_to_list'));
            add_action('wp_ajax_add_schedule_to_list', array($this, 'add_schedule_to_list'));
            add_action('wp_ajax_add_highlight_to_list', array($this, 'add_highlight_to_list'));
            add_action('wp_ajax_add_review_to_list', array($this, 'add_review_to_list'));
        }

        function traveladvisor_var_meta_tours_add() {
            $strings = new traveladvisor_plugin_all_strings;
            $strings->traveladvisor_plugin_activation_strings();
            add_meta_box('traveladvisor_var_meta_tours', __('Tour Options', 'cs-traveladvisor'), array($this, 'traveladvisor_var_meta_tours'), 'tours', 'normal', 'high');
        }

        function traveladvisor_var_meta_tours($post) {
            $strings = new traveladvisor_plugin_all_strings;
            $strings->traveladvisor_plugin_activation_strings();
            global $post, $traveladvisor_var_theme_options, $page_option;
            $traveladvisor_var_theme_options = get_option('traveladvisor_var_theme_options');
            $traveladvisor_var_builtin_seo_fields = isset($traveladvisor_var_theme_options['traveladvisor_var_builtin_seo_fields']) ? $traveladvisor_var_theme_options['traveladvisor_var_builtin_seo_fields'] : '';
            $traveladvisor_var_header_position = isset($traveladvisor_var_theme_options['traveladvisor_var_header_position']) ? $traveladvisor_var_theme_options['traveladvisor_var_header_position'] : '';
            ?>      
            <div class="page-wrap page-opts left" style="overflow:hidden; position:relative;">
                <div class="option-sec" style="margin-bottom:0;">
                    <div class="opt-conts">
                        <div class="elementhidden">
                            <nav class="admin-navigtion">
                                <ul id="cs-options-tab">
                                    <li><a name="#tab-slideshow" href="javascript:;"><i class="icon-forward2"></i> <?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_custom_fields'); ?></a></li>
                                    <li><a href="javascript:;" name="#tab-tourss-settings-cs-tourss"><i class="icon-briefcase"></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_tour_options'); ?></a></li>
                                </ul>
                            </nav>
                            <div id="tabbed-content">
                                <?php if (function_exists('traveladvisor_tours_custom_fields')) { ?>
                                    <div id="tab-slideshow">
                                        <?php traveladvisor_tours_custom_fields(); ?>
                                    </div>
                                <?php } ?>
                                <div id="tab-tourss-settings-cs-tourss">
                                    <?php $this->traveladvisor_var_post_tours_fields(); ?>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <?php
        }

        /**
         * @Tours General Fileds Function
         * @return
         */
        function traveladvisor_var_tours_general_settings() {
            global $post, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
            if (function_exists('traveladvisor_sidebar_layout_options')) {
                traveladvisor_sidebar_layout_options();
            }
        }

        /**
         * @Tours Custom Fileds Function
         * @return
         */
        function traveladvisor_var_post_tours_fields() {
            global $post, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
            $traveladvisor_id = $post->ID;
            $traveladvisor_destinations_list = array();
            $traveladvisor_destination_options = array();
			
            $traveladvisor_arguments = array('post_type' => 'destination');
            $traveladvisor_var_destinations_list = new WP_Query($traveladvisor_arguments);
            while ($traveladvisor_var_destinations_list->have_posts()): $traveladvisor_var_destinations_list->the_post();
             $traveladvisor_destinations_list = get_the_title();
			 $traveladvisor_destination_options[$traveladvisor_destinations_list] = $traveladvisor_destinations_list;
            endwhile;
            wp_reset_postdata();
            $post->ID = $traveladvisor_id;
            $traveladvisor_var_tour_detail_image_url = get_post_meta($post->ID, 'traveladvisor_var_tour_detail_image_url_array', true);
            $traveladvisor_var_tour_detail_image_url = isset($traveladvisor_var_tour_detail_image_url[0]) ? $traveladvisor_var_tour_detail_image_url[0] : '';
            $traveladvisor_var_opt_array = array(
                'std' => $traveladvisor_var_tour_detail_image_url,
                'id' => 'tour_detail_image_url',
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_detail_image'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_detail_image_hint'),
                'echo' => true,
                //'array' => true,
                'prefix' => '',
                'field_params' => array(
                    'std' => $traveladvisor_var_tour_detail_image_url,
                    'id' => 'tour_detail_image_url',
                    'return' => true,
                    'array' => true,
                    'array_txt' => false,
                    'prefix' => '',
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_upload_file_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_select_destination'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_select_destination_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'tour_destination',
                    'classes' => 'chosen-select',
                    'return' => true,
                    'prefix' => 'traveladvisor_traveladvisor',
                    'options' => $traveladvisor_destination_options,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_var_opt_array);
            ?>
            <script>
                jQuery(document).ready(function () {
                    chosen_selectionbox();
                });
            </script>
            <?php
            $traveladvisor_var_opt_array = array(
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_select_gallery_images_hint'),
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_select_gallery_images'),
                'id' => 'tours_gallery_images',
                'classes' => '',
                'std' => 'destination_meta_form',
            );
            $traveladvisor_var_html_fields->traveladvisor_var_gallery_render($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_duration'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_duration_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'tour_duration',
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            //Date
            $cus_field_date_formate_arr = "m/d/Y";
            $field = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_starting_date'),
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_starting_date_hint'),
                'desc' => '',
                'echo' => true,
                'field_params' => array(
                    'id' => 'tour_starting_date',
                    'cust_id' => '',
                    'std' => '',
                    'required' => 'yes',
                    'return' => true,
                )
            );
            $traveladvisor_var_html_fields->traveladvisor_var_date_field($field);
            ?>
            <script>
                jQuery(function () {
                    jQuery("#traveladvisor_var_tour_starting_date").datetimepicker({
                        format: "<?php echo esc_html($cus_field_date_formate_arr); ?>",
                        timepicker: false,
                        minDate: 0, //yesterday is minimum date(for today use 0)
                    });
                });
            </script>
            <?php
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_organizer_email'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_organizer_email_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'organizer_email_address',
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $traveladvisor_var_html_fields->traveladvisor_var_heading_render(
                    array(
                        'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_prices'),
                        'id' => 'tourss_social_heading',
                    )
            );
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_old_prices'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_old_prices_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'tours_oldprice',
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_new_prices'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_new_prices'),
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'tours_newprice',
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_discount_prices'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_discount_prices_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'tours_discount_price',
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            //User Reviews
            $traveladvisor_var_html_fields->traveladvisor_var_heading_render(
                    array(
                        'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_user_reviews'),
                        'id' => 'tours_reviews',
                    )
            );
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_user_reviews_title'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_user_reviews_title_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'tour_reviews_title',
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_user_reviews_subtitle'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_user_reviews_subtitle_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'tour_reviews_sub_title',
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $this->traveladvisor_var_review_reviews_list();
            $traveladvisor_var_html_fields->traveladvisor_var_heading_render(
                    array(
                        'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_asked_questions'),
                        'id' => 'tours_features',
                    )
            );
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_asked_questions_title'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_asked_questions_title_tint'),
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'tours_question_title',
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $this->traveladvisor_var_tours_questions();
            //highlights
            $traveladvisor_var_html_fields->traveladvisor_var_heading_render(
                    array(
                        'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_highlights'),
                        'id' => 'tours_highlights',
                    )
            );
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_highlights_title'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_highlights_title_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'tours_highlights_title',
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $this->traveladvisor_var_tours_highlights_list();
            $traveladvisor_var_html_fields->traveladvisor_var_heading_render(
                    array(
                        'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_schedule'),
                        'id' => 'tours_schedule',
                    )
            );
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_schedule_title'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_schedule_title_hint'),
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'tours_schedule_title',
                    'return' => true,
                ),
            );
            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $this->traveladvisor_var_tours_schedules_list();
        }

        //User Reviews
        function traveladvisor_var_review_reviews_list() {
            global $post, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
            $traveladvisor_var_get_destinations = get_post_meta($post->ID, 'traveladvisor_var_destinations_array', true);
            $traveladvisor_var_destination_names = get_post_meta($post->ID, 'traveladvisor_var_destination_name_array', true);
            $traveladvisor_var_destination_descs = get_post_meta($post->ID, 'traveladvisor_var_destination_desc_array', true);
            $traveladvisor_var_point_of_interest_images = get_post_meta($post->ID, 'traveladvisor_var_point_of_interest_image_array', true);
            $traveladvisor_var_title_urls = get_post_meta($post->ID, 'traveladvisor_var_title_url_array', true);
            $traveladvisor_add_user_review = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_add_user_review');
            $traveladvisor_title_table = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_table_title');
            $traveladvisor_title_actions = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_table_actions');
            $html = '
                    <script>
                            jQuery(document).ready(function($) {
                                    $("#total_destinations").sortable({
                                            cancel : \'td div.table-form-elem\'
                                    });
                            });
                    </script>
                      <ul class="form-elements">
                                    <li class="to-button"><a href="javascript:traveladvisor_var_createpop(\'add_destination_title\',\'filter\')" class="button">' . esc_html($traveladvisor_add_user_review) . '</a> </li>
                       </ul>
                      <div class="cs-service-list-table">
                      <table class="to-table" border="0" cellspacing="0">
                            <thead>
                              <tr>
                                    <th style="width:100%;">' . esc_html($traveladvisor_title_table) . '</th>
                                    <th style="width:20%;" class="right">' . esc_html($traveladvisor_title_actions) . '</th>
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
                        $html .= $this->add_review_to_list($traveladvisor_var_destinations_array);
                    }
                    $traveladvisor_var_destination_counter++;
                }
            }
            $traveladvisor_tour_review_settings = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_review_settings');
            $html .= '
                            </tbody>
                      </table>

                      </div>
                      <div id="add_destination_title" style="display: none;">
                            <div class="cs-heading-area">
                              <h5><i class="icon-plus-circle"></i> ' . esc_html($traveladvisor_tour_review_settings) . '</h5>
                              <span class="cs-btnclose" onClick="javascript:traveladvisor_var_remove_overlay(\'add_destination_title\',\'append\')"> <i class="icon-times"></i></span> 	
                            </div>';
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_name_of_person'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_name_of_person_hint'),
                'echo' => false,
                'field_params' => array(
                    'std' => '',
                    'id' => 'destination_name',
                    'return' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_review_title'),
                'desc' => '',
                'echo' => false,
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_review_title_hint'),
                'field_params' => array(
                    'std' => '',
                    'id' => 'title_url',
                    'return' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_review_desc'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_review_desc_hint'),
                'echo' => false,
                'field_params' => array(
                    'std' => '',
                    'id' => 'destination_desc',
                    'return' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_image'),
                'echo' => false,
                'std' => '',
                'id' => 'point_of_interest_image',
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_image_hint'),
                'field_params' => array(
                    'id' => 'point_of_interest_image',
                    'std' => '',
                    'return' => true,
                ),
            );

            $html .= $traveladvisor_var_html_fields->traveladvisor_var_upload_file_field($traveladvisor_var_opt_array);
            $traveladvisor_user_review = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_add_user_review');
            $html .= '
                        <ul class="form-elements noborder">
                          <li class="to-label"></li>
                          <li class="to-field">
                                <input type="button" value="' . esc_html($traveladvisor_user_review) . '" onClick="add_review_list(\'' . esc_js(admin_url('admin-ajax.php')) . '\', \'' . esc_js(get_template_directory_uri()) . '\')" />
                                <div class="feature-loader"></div>
                          </li>
                        </ul>
                  </div>';
            echo force_balance_tags($html, true);
        }

        function add_review_to_list($traveladvisor_var_atts) {
            global $post, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
            $traveladvisor_var_defaults = array(
                'counter_destination' => '',
                'destination_id' => '',
                'traveladvisor_var_destination_name' => '',
                'traveladvisor_var_destination_desc' => '',
                'traveladvisor_var_title_url' => '',
                'traveladvisor_var_point_of_interest_image' => '',
            );
            extract(shortcode_atts($traveladvisor_var_defaults, $traveladvisor_var_atts));

            foreach ($_POST as $keys => $values) {
                $keys = $values;
            }
            if (isset($_POST['traveladvisor_var_destination_name']) && $_POST['traveladvisor_var_destination_name'] <> '')
                $traveladvisor_var_destination_name = $_POST['traveladvisor_var_destination_name'];
            if (isset($_POST['traveladvisor_var_destination_desc']) && $_POST['traveladvisor_var_destination_desc'] <> '')
                $traveladvisor_var_destination_desc = $_POST['traveladvisor_var_destination_desc'];

            if (isset($_POST['traveladvisor_var_title_url']) && $_POST['traveladvisor_var_title_url'] <> '')
                $traveladvisor_var_title_url = $_POST['traveladvisor_var_title_url'];
            if (isset($_POST['traveladvisor_var_point_of_interest_image']) && $_POST['traveladvisor_var_point_of_interest_image'] <> '')
                $traveladvisor_var_point_of_interest_image = $_POST['traveladvisor_var_point_of_interest_image'];
            if ($destination_id == '' && $counter_destination == '') {
                $counter_destination = $destination_id = time();
            }
            $traveladvisor_review_settings = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_review_settings');


            $html = '
                            <tr class="parentdelete" id="edit_track' . absint($counter_destination) . '">
                              <td id="subject-title' . absint($counter_destination) . '" style="width:100%;">' . esc_attr($traveladvisor_var_destination_name) . '</td>

                              <td class="centr" style="width:20%;"><a href="javascript:traveladvisor_var_createpop(\'edit_track_form' . absint($counter_destination) . '\',\'filter\')" class="actions edit">&nbsp;</a> <a href="#" class="delete-it btndeleteit actions delete">&nbsp;</a></td>
                              <td style="width:0"><div id="edit_track_form' . esc_attr($counter_destination) . '" style="display: none;" class="table-form-elem">
                                    <input type="hidden" name="traveladvisor_var_destinations_array[]" value="' . absint($destination_id) . '" />
                                      <div class="cs-heading-area">
                                            <h5 style="text-align: left;">' . esc_html($traveladvisor_review_settings) . '</h5>
                                            <span onclick="javascript:traveladvisor_var_remove_overlay(\'edit_track_form' . esc_js($counter_destination) . '\',\'append\')" class="cs-btnclose"> <i class="icon-times"></i></span>
                                            <div class="clear"></div>
                                      </div>';
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_update_name'),
                'desc' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_update_name_hint'),
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
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_edit_user_review'),
                'desc' => '',
                'echo' => false,
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_edit_user_review_hint'),
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
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_edit_user_review_desc'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_edit_user_review_desc_hint'),
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
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_update_image'),
                'echo' => false,
                'force_std' => true,
                'std' => esc_url($traveladvisor_var_point_of_interest_image),
                'id' => 'point_of_interest_image',
                'desc' => '',
                'array' => true,
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_update_image_hint'),
                'field_params' => array(
                    'id' => 'point_of_interest_image',
                    'std' => esc_url($traveladvisor_var_point_of_interest_image),
                    'return' => true,
                    'array' => true,
                    'force_std' => true,
                ),
            );
            $traveladvisor_user_update_user_review = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_update_review');
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_upload_file_field($traveladvisor_var_opt_array);
            $html .= '
                                        <ul class="form-elements noborder">
                                              <li class="to-label">
                                                <label></label>
                                              </li>
                                              <li class="to-field">
                                                <input type="button" value="' . esc_html($traveladvisor_user_update_user_review) . '" onclick="traveladvisor_var_remove_overlay(\'edit_track_form' . esc_js($counter_destination) . '\',\'append\')" />
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

        //ITINERARY & TIME SCHEDULE
        public function traveladvisor_var_tours_schedules_list() {
            global $post, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
            $traveladvisor_var_get_schedules = get_post_meta($post->ID, 'traveladvisor_var_schedule_array', true);
            $traveladvisor_var_days = get_post_meta($post->ID, 'traveladvisor_var_day_array', true);
            $traveladvisor_var_places = get_post_meta($post->ID, 'traveladvisor_var_place_array', true);
            $traveladvisor_var_durations = get_post_meta($post->ID, 'traveladvisor_var_duration_array', true);
            $traveladvisor_var_descriptions = get_post_meta($post->ID, 'traveladvisor_var_description_array', true);
            $traveladvisor_var_point_interest_images = get_post_meta($post->ID, 'traveladvisor_var_point_interest_image_array', true);
            $traveladvisor_tours_add_schedule = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_add_schedule');
            $traveladvisor_tour_table_title = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_table_title');
            $traveladvisor_tour_table_actions = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_table_actions');
            $html = '
            <script>
                jQuery(document).ready(function($) {
                    $("#total_schedules").sortable({
                        cancel : \'td div.table-form-elem\'
                    });
                });
            </script>
              <ul class="form-elements">
                    <li class="to-button"><a href="javascript:traveladvisor_var_createpop(\'add_schedule_title\',\'filter\')" class="button">' . esc_html($traveladvisor_tours_add_schedule) . '</a> </li>
               </ul>
              <div class="cs-service-list-table">
              <table class="to-table" border="0" cellspacing="0">
                <thead>
                  <tr>
                    <th style="width:100%;">' . esc_html($traveladvisor_tour_table_title) . '</th>
                    <th style="width:20%;" class="right">' . esc_html($traveladvisor_tour_table_actions) . '</th>
                  </tr>
                </thead>
                <tbody id="total_schedules">';
            if (isset($traveladvisor_var_get_schedules) && is_array($traveladvisor_var_get_schedules) && count($traveladvisor_var_get_schedules) > 0) {
                $traveladvisor_var_schedule_counter = 0;
                foreach ($traveladvisor_var_get_schedules as $schedules) {
                    if (isset($schedules) && $schedules <> '') {
                        $counter_exp = $exp_id = $schedules;
                        $traveladvisor_var_day = isset($traveladvisor_var_days[$traveladvisor_var_schedule_counter]) ? $traveladvisor_var_days[$traveladvisor_var_schedule_counter] : '';
                        $traveladvisor_var_place = isset($traveladvisor_var_places[$traveladvisor_var_schedule_counter]) ? $traveladvisor_var_places[$traveladvisor_var_schedule_counter] : '';
                        $traveladvisor_var_duration = isset($traveladvisor_var_durations[$traveladvisor_var_schedule_counter]) ? $traveladvisor_var_durations[$traveladvisor_var_schedule_counter] : '';
                        $traveladvisor_var_description = isset($traveladvisor_var_descriptions[$traveladvisor_var_schedule_counter]) ? $traveladvisor_var_descriptions[$traveladvisor_var_schedule_counter] : '';
                        $traveladvisor_var_point_interest_image = isset($traveladvisor_var_point_interest_images[$traveladvisor_var_schedule_counter]) ? $traveladvisor_var_point_interest_images[$traveladvisor_var_schedule_counter] : '';
                        $traveladvisor_var_schedule_array = array(
                            'counter_exp' => $counter_exp,
                            'exp_id' => $exp_id,
                            'traveladvisor_var_day' => $traveladvisor_var_day,
                            'traveladvisor_var_place' => $traveladvisor_var_place,
                            'traveladvisor_var_duration' => $traveladvisor_var_duration,
                            'traveladvisor_var_description' => $traveladvisor_var_description,
                            'traveladvisor_var_point_interest_image' => $traveladvisor_var_point_interest_image,
                        );
                        $html .= $this->add_schedule_to_list($traveladvisor_var_schedule_array);
                    }
                    $traveladvisor_var_schedule_counter++;
                }
            }
            $traveladvisor_tour_schedule_settings = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_schedule_settings');
            $html .= '
                </tbody>
              </table>
              </div>
              <div id="add_schedule_title" style="display: none;">
                <div class="cs-heading-area">
                  <h5><i class="icon-plus-circle"></i> ' . esc_html($traveladvisor_tour_schedule_settings) . '</h5>
                    <span class="cs-btnclose" onClick="javascript:traveladvisor_var_remove_overlay(\'add_schedule_title\',\'append\')"> <i class="icon-times"></i></span>   
                </div>';
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_place'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_place_hint'),
                'echo' => false,
                'field_params' => array(
                    'std' => '',
                    'id' => 'place',
                    'return' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_day_number'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_day_number_hint'),
                'echo' => false,
                'field_params' => array(
                    'std' => '',
                    'id' => 'day',
                    'return' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var__tour_duration'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var__tour_duration_hint'),
                'echo' => false,
                'field_params' => array(
                    'std' => '',
                    'id' => 'duration',
                    'return' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var__tour_desc'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var__tour_desc_hint'),
                'echo' => false,
                'field_params' => array(
                    'std' => '',
                    'id' => 'description',
                    'return' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_add_image'),
                'echo' => false,
                'std' => '',
                'id' => 'point_interest_image',
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_add_image_hint'),
                'field_params' => array(
                    'id' => 'point_interest_image',
                    'std' => '',
                    'return' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_upload_file_field($traveladvisor_var_opt_array);
            $rand_id = "";
            $traveladvisor_var_tour_add_schedule = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_add_schedule');
            $html .= '
                <ul class="form-elements noborder">
                  <li class="to-label"></li>
                  <li class="to-field">
                      <input type="button" value="' . esc_html($traveladvisor_var_tour_add_schedule) . '" onClick="add_schedule_list(\'' . esc_js(admin_url('admin-ajax.php')) . '\', \'' . esc_js(get_template_directory_uri()) . '\')" />
                    <div class="schedule-loader"></div>
                  </li>
                </ul>
              </div>';
            echo force_balance_tags($html, true);
        }

        public function add_schedule_to_list($traveladvisor_var_atts) {
            global $post, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
            $traveladvisor_var_defaults = array(
                'counter_exp' => '',
                'exp_id' => '',
                'traveladvisor_var_day' => '',
                'traveladvisor_var_place' => '',
                'traveladvisor_var_duration' => '',
                'traveladvisor_var_description' => '',
                'traveladvisor_var_point_interest_image' => '',
            );
            extract(shortcode_atts($traveladvisor_var_defaults, $traveladvisor_var_atts));
            foreach ($_POST as $keys => $values) {
                $$keys = $values;
            }
            if (isset($_POST['traveladvisor_var_day']) && $_POST['traveladvisor_var_day'] <> '')
                $traveladvisor_var_day = $_POST['traveladvisor_var_day'];
            if (isset($_POST['traveladvisor_var_place']) && $_POST['traveladvisor_var_place'] <> '')
                $traveladvisor_var_place = $_POST['traveladvisor_var_place'];
            if (isset($_POST['traveladvisor_var_duration']) && $_POST['traveladvisor_var_duration'] <> '')
                $traveladvisor_var_duration = $_POST['traveladvisor_var_duration'];
            if (isset($_POST['traveladvisor_var_description']) && $_POST['traveladvisor_var_description'] <> '')
                $traveladvisor_var_description = $_POST['traveladvisor_var_description'];
            if (isset($_POST['traveladvisor_var_point_interest_image']) && $_POST['traveladvisor_var_point_interest_image'] <> '')
                $traveladvisor_var_point_interest_image = $_POST['traveladvisor_var_point_interest_image'];
            if ($exp_id == '' && $counter_exp == '') {
                $counter_exp = $exp_id = time();
            }
            $traveladvisor_tours_schedule_settings = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_schedule_settings');
            $html = '
                <tr class="parentdelete" id="edit_track' . absint($counter_exp) . '">
                  <td id="subject-title' . absint($counter_exp) . '" style="width:100%;">' . esc_attr($traveladvisor_var_day) . '</td>
                  
                  <td class="centr" style="width:20%;"><a href="javascript:traveladvisor_var_createpop(\'edit_track_form' . absint($counter_exp) . '\',\'filter\')" class="actions edit">&nbsp;</a> <a href="#" class="delete-it btndeleteit actions delete">&nbsp;</a></td>
                  <td style="width:0"><div id="edit_track_form' . esc_attr($counter_exp) . '" style="display: none;" class="table-form-elem">
                    <input type="hidden" name="traveladvisor_var_schedule_array[]" value="' . absint($exp_id) . '" />
                      <div class="cs-heading-area">
                        <h5 style="text-align: left;">' . esc_html($traveladvisor_tours_schedule_settings) . '</h5>
                        <span onclick="javascript:traveladvisor_var_remove_overlay(\'edit_track_form' . esc_js($counter_exp) . '\',\'append\')" class="cs-btnclose"> <i class="icon-times"></i></span>
                        <div class="clear"></div>
                      </div>';
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_place'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_place_hint'),
                'echo' => false,
                'field_params' => array(
                    'std' => esc_html($traveladvisor_var_place),
                    'id' => 'place',
                    'return' => true,
                    'array' => true,
                    'force_std' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_day'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_day_hint'),
                'echo' => false,
                'field_params' => array(
                    'std' => esc_html($traveladvisor_var_day),
                    'id' => 'day',
                    'return' => true,
                    'array' => true,
                    'force_std' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var__tour_duration'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var__tour_duration_hint'),
                'echo' => false,
                'field_params' => array(
                    'std' => esc_html($traveladvisor_var_duration),
                    'id' => 'duration',
                    'return' => true,
                    'array' => true,
                    'force_std' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var__tour_desc'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var__tour_desc_hint'),
                'echo' => false,
                'field_params' => array(
                    'std' => esc_html($traveladvisor_var_description),
                    'id' => 'description',
                    'return' => true,
                    'array' => true,
                    'force_std' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_update_image'),
                'echo' => false,
                'std' => esc_html($traveladvisor_var_point_interest_image),
                'id' => 'point_interest_image',
                'desc' => '',
                'array' => true,
                'force_std' => true,
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_update_image_hint'),
                'field_params' => array(
                    'id' => 'point_interest_image',
                    'std' => esc_html($traveladvisor_var_point_interest_image),
                    'return' => true,
                    'array' => true,
                    'force_std' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_upload_file_field($traveladvisor_var_opt_array);
            $traveladvisor_var_tour_update_schedule = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_update_schedule');
            $html .= '
                      <ul class="form-elements noborder">
                        <li class="to-label">
                          <label></label>
                        </li>
                        <li class="to-field">
                          <input type="button" value="' . esc_html($traveladvisor_var_tour_update_schedule) . '" onclick="traveladvisor_var_remove_overlay(\'edit_track_form' . esc_js($counter_exp) . '\',\'append\')" />
                        </li>
                      </ul>
                    </div></td>
                </tr>';
            if (isset($_POST['traveladvisor_var_day']) && isset($_POST['traveladvisor_var_place'])) {
                echo force_balance_tags($html);
            } else {
                return $html;
            }
            if (isset($_POST['traveladvisor_var_day']) && isset($_POST['traveladvisor_var_place']))
                die();
        }

        // Frequently Asked Questions
        public function traveladvisor_var_tours_questions() {
            global $post, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
            $traveladvisor_var_get_exps = get_post_meta($post->ID, 'traveladvisor_var_exps_array', true);
            $traveladvisor_var_exp_names = get_post_meta($post->ID, 'traveladvisor_var_exp_name_array', true);
            $traveladvisor_var_exp_descs = get_post_meta($post->ID, 'traveladvisor_var_exp_desc_array', true);
            $traveladvisor_travel_tour_tile = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_table_title');
            $traveladvisor_var_tour_table_actions = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_table_actions');
            $traveladvisor_var_tour_add_questions = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_add_question');
            $html = '
            <script>
                jQuery(document).ready(function($) {
                    $("#total_exps").sortable({
                        cancel : \'td div.table-form-elem\'
                    });
                });
            </script>
              <ul class="form-elements">
                    <li class="to-button"><a href="javascript:traveladvisor_var_createpop(\'add_fea_title\',\'filter\')" class="button">' . esc_html($traveladvisor_var_tour_add_questions) . '</a> </li>
               </ul>
              <div class="cs-service-list-table">
              <table class="to-table" border="0" cellspacing="0">
                <thead>
                  <tr>
                    <th style="width:100%;">' . esc_html($traveladvisor_travel_tour_tile) . '</th>
                    <th style="width:20%;" class="right">' . esc_html($traveladvisor_var_tour_table_actions) . '</th>
                  </tr>
                </thead>
                <tbody id="total_exps">';
            if (isset($traveladvisor_var_get_exps) && is_array($traveladvisor_var_get_exps) && count($traveladvisor_var_get_exps) > 0) {
                $traveladvisor_var_exp_counter = 0;
                foreach ($traveladvisor_var_get_exps as $exps) {
                    if (isset($exps) && $exps <> '') {
                        $counter_exp = $exp_id = $exps;
                        $traveladvisor_var_exp_name = isset($traveladvisor_var_exp_names[$traveladvisor_var_exp_counter]) ? $traveladvisor_var_exp_names[$traveladvisor_var_exp_counter] : '';
                        $traveladvisor_var_exp_desc = isset($traveladvisor_var_exp_descs[$traveladvisor_var_exp_counter]) ? $traveladvisor_var_exp_descs[$traveladvisor_var_exp_counter] : '';
                        $traveladvisor_var_exps_array = array(
                            'counter_exp' => $counter_exp,
                            'exp_id' => $exp_id,
                            'traveladvisor_var_exp_name' => $traveladvisor_var_exp_name,
                            'traveladvisor_var_exp_desc' => $traveladvisor_var_exp_desc,
                        );
                        $html .= $this->add_question_to_list($traveladvisor_var_exps_array);
                    }
                    $traveladvisor_var_exp_counter++;
                }
            }
            $traveladvisor_travel_tour_question_settiong = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_question_settings');

            $html .= '
                </tbody>
              </table>
              </div>
              <div id="add_fea_title" style="display: none;">
                <div class="cs-heading-area">
                  <h5><i class="icon-plus-circle"></i> ' . esc_html($traveladvisor_travel_tour_question_settiong) . '</h5>
                  <span class="cs-btnclose" onClick="javascript:traveladvisor_var_remove_overlay(\'add_fea_title\',\'append\')"> <i class="icon-times"></i></span>   
                </div>';
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_question'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_question_hint'),
                'echo' => false,
                'field_params' => array(
                    'std' => '',
                    'id' => 'exp_name',
                    'return' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_answer'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_answer_hint'),
                'echo' => false,
                'field_params' => array(
                    'std' => '',
                    'id' => 'exp_desc',
                    'return' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($traveladvisor_var_opt_array);
            $rand_id = "";
            $traveladvisor_var_tour_add_question = "";
            $traveladvisor_var_add_question = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_add_question');
            $html .= '
                <ul class="form-elements noborder">
                  <li class="to-label"></li>
                  <li class="to-field">
                    <input type="button" value="' . esc_html($traveladvisor_var_add_question) . '" onClick="add_question_list(\'' . esc_js(admin_url('admin-ajax.php')) . '\', \'' . esc_js(get_template_directory_uri()) . '\', \'' . $rand_id . '\')" />
                    <div class="feature-loader"></div>
                  </li>
                </ul>
              </div>';
            echo force_balance_tags($html, true);
        }

        public function add_question_to_list($traveladvisor_var_atts) {
            global $post, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
            $traveladvisor_var_defaults = array(
                'counter_exp' => '',
                'exp_id' => '',
                'traveladvisor_var_exp_name' => '',
                'traveladvisor_var_exp_desc' => '',
            );
            extract(shortcode_atts($traveladvisor_var_defaults, $traveladvisor_var_atts));
            foreach ($_POST as $keys => $values) {
                $$keys = $values;
            }
            if (isset($_POST['traveladvisor_var_exp_name']) && $_POST['traveladvisor_var_exp_name'] <> '')
                $traveladvisor_var_exp_name = $_POST['traveladvisor_var_exp_name'];
            if (isset($_POST['traveladvisor_var_exp_desc']) && $_POST['traveladvisor_var_exp_desc'] <> '')
                $traveladvisor_var_exp_desc = $_POST['traveladvisor_var_exp_desc'];
            if ($exp_id == '' && $counter_exp == '') {
                $counter_exp = $exp_id = time();
            }
            $traveladvisor_var_question_settings = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_question_settings');

            $html = '
                <tr class="parentdelete" id="edit_track' . absint($counter_exp) . '">
                  <td id="subject-title' . absint($counter_exp) . '" style="width:100%;">' . esc_attr($traveladvisor_var_exp_name) . '</td>
                  
                  <td class="centr" style="width:20%;"><a href="javascript:traveladvisor_var_createpop(\'edit_track_form' . absint($counter_exp) . '\',\'filter\')" class="actions edit">&nbsp;</a> <a href="#" class="delete-it btndeleteit actions delete">&nbsp;</a></td>
                  <td style="width:0"><div id="edit_track_form' . esc_attr($counter_exp) . '" style="display: none;" class="table-form-elem">
                    <input type="hidden" name="traveladvisor_var_exps_array[]" value="' . absint($exp_id) . '" />
                      <div class="cs-heading-area">
                        <h5 style="text-align: left;">' . esc_html($traveladvisor_var_question_settings) . '</h5>
                        <span onclick="javascript:traveladvisor_var_remove_overlay(\'edit_track_form' . esc_js($counter_exp) . '\',\'append\')" class="cs-btnclose"> <i class="icon-times"></i></span>
                        <div class="clear"></div>
                      </div>';
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_question'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_question_hint'),
                'echo' => false,
                'field_params' => array(
                    'std' => esc_html($traveladvisor_var_exp_name),
                    'id' => 'exp_name',
                    'return' => true,
                    'array' => true,
                    'force_std' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_answer'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_answer_hint'),
                'echo' => false,
                'field_params' => array(
                    'std' => esc_html($traveladvisor_var_exp_desc),
                    'id' => 'exp_desc',
                    'return' => true,
                    'array' => true,
                    'force_std' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($traveladvisor_var_opt_array);
            $traveladvisor_update_question = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_update_question');
            $html .= '
                      <ul class="form-elements noborder">
                        <li class="to-label">
                          <label></label>
                        </li>
                        <li class="to-field">
                          <input type="button" value="' . esc_html($traveladvisor_update_question) . '" onclick="traveladvisor_var_remove_overlay(\'edit_track_form' . esc_js($counter_exp) . '\',\'append\')" />
                        </li>
                      </ul>
                    </div></td>
                </tr>';
            if (isset($_POST['traveladvisor_var_exp_name']) && isset($_POST['traveladvisor_var_exp_desc'])) {
                echo force_balance_tags($html);
            } else {
                return $html;
            }
            if (isset($_POST['traveladvisor_var_exp_name']) && isset($_POST['traveladvisor_var_exp_desc']))
                die();
        }

        // Tour Highlights
        public function traveladvisor_var_tours_highlights_list() {
            global $post, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
            $traveladvisor_var_get_highlights = get_post_meta($post->ID, 'traveladvisor_var_highlights_array', true);
            $traveladvisor_var_highlight_names = get_post_meta($post->ID, 'traveladvisor_var_highlight_name_array', true);
            $traveladvisor_var_highlight_descs = get_post_meta($post->ID, 'traveladvisor_var_highlight_desc_array', true);

            $traveladvisor_tour_title = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_table_title');
            $traveladvisor_var_tour_table_actions = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_table_actions');
            $traveladvisor_var_tour_add_highlights = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_add_highlights');
            $traveladvisor_var_tour_highlight_settings = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_highlight_settings');
            $html = '
            <script>
                jQuery(document).ready(function($) {
                    $("#total_highlights").sortable({
                        cancel : \'td div.table-form-elem\'
                    });
                });
            </script>
              <ul class="form-elements">
                    <li class="to-button"><a href="javascript:traveladvisor_var_createpop(\'add_highlight_title\',\'filter\')" class="button">' . esc_html($traveladvisor_var_tour_add_highlights) . '</a> </li>
               </ul>
              <div class="cs-service-list-table">
              <table class="to-table" border="0" cellspacing="0">
                <thead>
                  <tr>
                    <th style="width:100%;">' . esc_html($traveladvisor_tour_title) . '</th>
                    <th style="width:20%;" class="right">' . esc_html($traveladvisor_var_tour_table_actions) . '</th>
                  </tr>
                </thead>
                <tbody id="total_highlights">';
            if (isset($traveladvisor_var_get_highlights) && is_array($traveladvisor_var_get_highlights) && count($traveladvisor_var_get_highlights) > 0) {
                $traveladvisor_var_highlight_counter = 0;
                foreach ($traveladvisor_var_get_highlights as $exps) {
                    if (isset($exps) && $exps <> '') {
                        $counter_exp = $exp_id = $exps;
                        $traveladvisor_var_highlight_name = isset($traveladvisor_var_highlight_names[$traveladvisor_var_highlight_counter]) ? $traveladvisor_var_highlight_names[$traveladvisor_var_highlight_counter] : '';
                        $traveladvisor_var_highlight_desc = isset($traveladvisor_var_highlight_descs[$traveladvisor_var_highlight_counter]) ? $traveladvisor_var_highlight_descs[$traveladvisor_var_highlight_counter] : '';
                        $traveladvisor_var_highlights_array = array(
                            'counter_exp' => $counter_exp,
                            'exp_id' => $exp_id,
                            'traveladvisor_var_highlight_name' => $traveladvisor_var_highlight_name,
                            'traveladvisor_var_highlight_desc' => $traveladvisor_var_highlight_desc,
                        );
                        $html .= $this->add_highlight_to_list($traveladvisor_var_highlights_array);
                    }
                    $traveladvisor_var_highlight_counter++;
                }
            }
            $html .= '
                </tbody>
              </table>
              </div>
              <div id="add_highlight_title" style="display: none;">
                <div class="cs-heading-area">
                  <h5><i class="icon-plus-circle"></i> ' . esc_html($traveladvisor_var_tour_highlight_settings) . '</h5>
                  <span class="cs-btnclose" onClick="javascript:traveladvisor_var_remove_overlay(\'add_highlight_title\',\'append\')"> <i class="icon-times"></i></span>   
                </div>';
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_highlight_title'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_highlight_title_hint'),
                'echo' => false,
                'field_params' => array(
                    'std' => '',
                    'id' => 'highlight_name',
                    'return' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_desc'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_desc_hint'),
                'echo' => false,
                'field_params' => array(
                    'std' => '',
                    'id' => 'highlight_desc',
                    'return' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($traveladvisor_var_opt_array);
            $rand_id = "";
            $traveladvisor_var_tour_add_highlight = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_add_highlight');
            $html .= '
                <ul class="form-elements noborder">
                  <li class="to-label"></li>
                  <li class="to-field">
                    <input type="button" value="' . esc_html($traveladvisor_var_tour_add_highlight) . '" onClick="add_highlight_list(\'' . esc_js(admin_url('admin-ajax.php')) . '\', \'' . esc_js(get_template_directory_uri()) . '\', \'' . $rand_id . '\')" />
                    <div class="highlight-loader"></div>
                  </li>
                </ul>
              </div>';
            echo force_balance_tags($html, true);
        }

        public function add_highlight_to_list($traveladvisor_var_atts) {
            global $post, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
            $traveladvisor_var_defaults = array(
                'counter_exp' => '',
                'exp_id' => '',
                'traveladvisor_var_highlight_name' => '',
                'traveladvisor_var_highlight_desc' => '',
            );
            extract(shortcode_atts($traveladvisor_var_defaults, $traveladvisor_var_atts));
            foreach ($_POST as $keys => $values) {
                $$keys = $values;
            }
            if (isset($_POST['traveladvisor_var_highlight_name']) && $_POST['traveladvisor_var_highlight_name'] <> '')
                $traveladvisor_var_highlight_name = $_POST['traveladvisor_var_highlight_name'];
            if (isset($_POST['traveladvisor_var_highlight_desc']) && $_POST['traveladvisor_var_highlight_desc'] <> '')
                $traveladvisor_var_exp_desc = $_POST['traveladvisor_var_highlight_desc'];
            if ($exp_id == '' && $counter_exp == '') {
                $counter_exp = $exp_id = time();
            }
            $traveladvisor_var_tour_highlight_settings = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_highlight_settings ');
            $html = '
                <tr class="parentdelete" id="edit_track' . absint($counter_exp) . '">
                  <td id="subject-title' . absint($counter_exp) . '" style="width:100%;">' . esc_attr($traveladvisor_var_highlight_name) . '</td>
                  <td class="centr" style="width:20%;"><a href="javascript:traveladvisor_var_createpop(\'edit_track_form' . absint($counter_exp) . '\',\'filter\')" class="actions edit">&nbsp;</a> <a href="#" class="delete-it btndeleteit actions delete">&nbsp;</a></td>
                  <td style="width:0"><div id="edit_track_form' . esc_attr($counter_exp) . '" style="display: none;" class="table-form-elem">
                    <input type="hidden" name="traveladvisor_var_highlights_array[]" value="' . absint($exp_id) . '" />
                      <div class="cs-heading-area">
                        <h5 style="text-align: left;">' . esc_html($traveladvisor_var_tour_highlight_settings) . '</h5>
                        <span onclick="javascript:traveladvisor_var_remove_overlay(\'edit_track_form' . esc_js($counter_exp) . '\',\'append\')" class="cs-btnclose"> <i class="icon-times"></i></span>
                        <div class="clear"></div>
                      </div>';
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_highlight_title'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_highlight_title_hint'),
                'echo' => false,
                'field_params' => array(
                    'std' => esc_html($traveladvisor_var_highlight_name),
                    'id' => 'highlight_name',
                    'return' => true,
                    'array' => true,
                    'force_std' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_var_opt_array);
            $traveladvisor_var_opt_array = array(
                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_desc'),
                'desc' => '',
                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_tour_desc_hint'),
                'echo' => false,
                'field_params' => array(
                    'std' => esc_html($traveladvisor_var_highlight_desc),
                    'id' => 'highlight_desc',
                    'return' => true,
                    'array' => true,
                    'force_std' => true,
                ),
            );
            $html .= $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($traveladvisor_var_opt_array);
            $traveladvisor_var_tour_update_highlight = traveladvisor_var_theme_text_srt('traveladvisor_var_tour_update_highlight');
            $html .= '
                      <ul class="form-elements noborder">
                        <li class="to-label">
                          <label></label>
                        </li>
                        <li class="to-field">
                          <input type="button" value="' . esc_html($traveladvisor_var_tour_update_highlight) . '" onclick="traveladvisor_var_remove_overlay(\'edit_track_form' . esc_js($counter_exp) . '\',\'append\')" />
                        </li>
                      </ul>
                    </div></td>
                </tr>';
            if (isset($_POST['traveladvisor_var_highlight_name']) && isset($_POST['traveladvisor_var_highlight_desc'])) {
                echo force_balance_tags($html);
            } else {
                return $html;
            }
            if (isset($_POST['traveladvisor_var_highlight_name']) && isset($_POST['traveladvisor_var_highlight_desc']))
                die();
        }

    }

    return new traveladvisor_var_tours_meta();
}