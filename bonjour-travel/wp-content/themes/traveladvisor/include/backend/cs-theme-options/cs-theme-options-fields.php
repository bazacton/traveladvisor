<?php
/**
 * Traveladvisor Theme Options Fields
 *
 * @package WordPress
 * @subpackage Traveladvisor
 * @since Traveladvisor
 */
if (!class_exists('traveladvisor_var_fields')) {

    class traveladvisor_var_fields {

        /**
         * Construct
         *
         * @return
         */
        public function __construct() {
            
        }

        /**
         * Sub Menu Fields
         *
         * @return
         */
        public function sub_menu($sub_menu = '') {

            $menu_items = '';
            $active = '';

            if (is_array($sub_menu) && sizeof($sub_menu) > 0) {

                $menu_items .= '<ul class="sub-menu">';
                foreach ($sub_menu as $key => $value) {
                    $active = $key == "tab-global-setting" ? 'active' : '';
                    $menu_items .= '<li class="' . sanitize_html_class($key) . ' ' . $active . ' "><a href="#' . esc_html($key) . '" onClick="toggleDiv(this.hash);return false;">' . esc_attr($value) . '</a></li>';
                }
                $menu_items .= '</ul>';
            }

            return $menu_items;
        }

        /**
         * Returns The Cs Theme Options Fields
         *
         * @return
         */
        public function traveladvisor_var_fields($traveladvisor_var_settings = '') {

            global $traveladvisor_var_options, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
            $strings = new traveladvisor_theme_all_strings;
            $strings -> traveladvisor_theme_option_field_strings();
            $counter = 0;
            $traveladvisor_var_counter = 0;
            $menu = '';
            $output = '';
            $parent_heading = '';
            $style = '';
            $traveladvisor_counter = 0;
            $traveladvisor_var_countries_list = '';

            if (is_array($traveladvisor_var_settings) && sizeof($traveladvisor_var_settings) > 0) {
                foreach ($traveladvisor_var_settings as $value) {
                    $counter++;
                    $val = '';

                    $select_value = '';
                    switch ($value['type']) {

                        case "heading":
                            $parent_heading = $value['name'];
                            $menu .= '<li><a title="' . esc_html($value['name']) . '" href="#"><i class="' . sanitize_html_class($value["fontawesome"]) . '"></i><span class="cs-title-menu">' . esc_attr($value['name']) . '</span></a>';
                            if (is_array($value['options']) && $value['options'] <> '') {
                                $menu .= $this->sub_menu($value['options']);
                            }
                            $menu .= '</li>';
                            break;

                        case "main-heading":
                            $parent_heading = $value['name'];
                            $menu .= '<li><a title="' . esc_html($value['name']) . '" href="#' . $value['id'] . '" onClick="toggleDiv(this.hash);return false;">
							<i class="' . sanitize_html_class($value["fontawesome"]) . '"></i><span class="cs-title-menu">' . esc_attr($value['name']) . '</span></a>';
                            $menu .= '</li>';
                            break;

                        case 'select_dashboard':
                            if (isset($traveladvisor_var_options) and $traveladvisor_var_options <> '') {
                                if (isset($traveladvisor_var_options[$value['id']])) {
                                    $select_value = $traveladvisor_var_options[$value['id']];
                                }
                            } else {
                                $select_value = $value['std'];
                            }
                            $args = array(
                                'depth' => 0,
                                'child_of' => 0,
                                'sort_order' => 'ASC',
                                'sort_column' => 'post_title',
                                'show_option_none' => traveladvisor_var_theme_text_srt('traveladvisor_var_select_page'),
                                'hierarchical' => '1',
                                'exclude' => '',
                                'meta_key' => '',
                                'meta_value' => '',
                                'authors' => '',
                                'exclude_tree' => '',
                                'selected' => $select_value,
                                'echo' => 0,
                                'name' => $value['id'],
                                'post_type' => 'page'
                            );
                            $traveladvisor_var_pages = wp_dropdown_pages($args);
                            $traveladvisor_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $val,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => isset($value['classes']) ? $value['classes'] : '',
                                    'return' => true,
                                    'options_markup' => true,
                                    'options' => $traveladvisor_var_pages,
                                ),
                            );
                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
                            break;

                        case "division":
                            $extra_atts = isset($value['extra_atts']) ? $value['extra_atts'] : '';
                            $d_enable = ' style="display:none;"';
                            if (isset($value['enable_val'])) {
                                $enable_id = isset($value['enable_id']) ? $value['enable_id'] : '';
                                $enable_val = $value['enable_val'];
                                $d_val = '';
                                if (isset($traveladvisor_var_options[$enable_id])) {
                                    $d_val = $traveladvisor_var_options[$enable_id];
                                }
                                $enable_multi = explode(',', $enable_val);
                                if (is_array($enable_multi) && sizeof($enable_multi) > 1) {
                                    $d_enable = in_array($d_val, $enable_multi) ? ' style="display:block;"' : ' style="display:none;"';
                                } else {
                                    $d_enable = $d_val == $enable_val ? ' style="display:block;"' : ' style="display:none;"';
                                }
                            }
                            $output .= '<div' . $d_enable . ' ' . $extra_atts . '>';
                            break;

                        case "division_close":
                            $output .= '</div>';
                            break;

                        case "col-right-text":
                            $col_heading = "";
                            $help_text = "";
                            if (isset($value['col_heading'])) {
                                $col_heading = isset($value['col_heading']) ? $value['col_heading'] : '';
                            }
                            if (isset($value['help_text'])) {
                                $help_text = isset($value['help_text']) ? $value['help_text'] : '';
                            }
                            $traveladvisor_opt_array = array(
                                'col_heading' => $col_heading,
                                'help_text' => $help_text,
                            );
                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_set_col_right($traveladvisor_opt_array);
                            break;

                        case "sub-heading":
                            $traveladvisor_var_counter++;
                            if ($traveladvisor_var_counter > 1) {
                                $output .='</div>';
                            }
                            if ($value['id'] != 'tab-global-setting') {
                                $style = 'style="display:none;"';
                            }

                            $output .= '<div id="' . $value['id'] . '" ' . $style . ' >';
                            $output .= '<div class="theme-header">
											<h1>' . esc_attr($value['name']) . '</h1>
									   </div>';
                            if (isset($value['with_col']) && $value['with_col'] == true) {
                                $output .='<div class="col2-right">';
                            }
                            break;

                        case "announcement":
                            $traveladvisor_var_counter++;
                            $output.='<div id="' . $value['id'] . '" class="alert alert-info fade in nomargin theme_box">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&#215;</button>
											<h4>' . traveladvisor_allow_special_char($value['name']) . '</h4>
											<p>' . traveladvisor_allow_special_char($value['std']) . '</p>
								 </div>';
                            break;

                        case "section":
                            $output .='<div class="theme-help">
									<h4>' . esc_attr($value['std']) . '</h4>
									<div class="clear"></div>
								  </div>';
                            break;

                        case 'text':
                            if (isset($traveladvisor_var_options['traveladvisor_var_' . $value['id']])) {
                                $val = $traveladvisor_var_options['traveladvisor_var_' . $value['id']];
                            } else {
                                $val = isset($value['std']) ? $value['std'] : '';
                            }

                            $traveladvisor_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $val,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => '',
                                    'return' => true,
                                ),
                            );

                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
                            break;

                        case 'slider_code':
                            if (isset($traveladvisor_var_options['traveladvisor_var_' . $value['id']]) && $traveladvisor_var_options['traveladvisor_var_' . $value['id']] <> '') {
                                $select_value = $traveladvisor_var_options['traveladvisor_var_' . $value['id']];
                            } else {
                                $select_value = isset($value['std']) ? $value['std'] : '';
                            }

                            $traveladvisor_slider_options = '';
                            if (class_exists('RevSlider') && class_exists('traveladvisor_var_RevSlider')) {
                                $slider = new traveladvisor_var_RevSlider();
                                $arrSliders = $slider->getAllSliderAliases();
                                if (is_array($arrSliders)) {
                                    foreach ($arrSliders as $key => $entry) {

                                        $selected = '';
                                        if ($select_value != '') {
                                            if ($select_value == $entry['alias']) {
                                                $selected = ' selected="selected"';
                                            }
                                        } else {
                                            if (isset($value['std']))
                                                if ($value['std'] == $entry['alias']) {
                                                    $selected = ' selected="selected"';
                                                }
                                        }
                                        $traveladvisor_slider_options .= '<option ' . $selected . ' value="' . $entry['alias'] . '">' . $entry['title'] . '</option>';
                                    }
                                }
                            }

                            $traveladvisor_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $val,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => isset($value['classes']) ? $value['classes'] : '',
                                    'return' => true,
                                    'options_markup' => true,
                                    'options' => $traveladvisor_slider_options,
                                ),
                            );
                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);

                            break;

                        case 'range_font' :
                            if (isset($traveladvisor_var_options['traveladvisor_var_' . $value['id']])) {
                                $val = $traveladvisor_var_options['traveladvisor_var_' . $value['id']];
                            } else {
                                $val = isset($value['std']) ? $value['std'] : '';
                            }

                            $traveladvisor_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'extra_att' => 'style="width:50%; display:inline-block;"',
                                'id' => 'traveladvisor_var_' . $value['id'] . '_range',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $val,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => '',
                                    'return' => true,
                                ),
                            );

                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);

                            break;

                        case 'range':
                            if (isset($traveladvisor_var_options['traveladvisor_var_' . $value['id']])) {
                                $val = $traveladvisor_var_options['traveladvisor_var_' . $value['id']];
                            } else {
                                $val = isset($value['std']) ? $value['std'] : '';
                            }

                            $traveladvisor_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'id' => 'traveladvisor_var_' . $value['id'] . '_range',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $val,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => '',
                                    'return' => true,
                                ),
                            );

                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);

                            break;

                        case 'textarea':
                            if (isset($traveladvisor_var_options['traveladvisor_var_' . $value['id']])) {
                                $val = $traveladvisor_var_options['traveladvisor_var_' . $value['id']];
                            } else {
                                $val = isset($value['std']) ? $value['std'] : '';
                            }
                            $traveladvisor_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'id' => 'traveladvisor_var_' . $value['id'] . '_textarea',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $val,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => '',
                                    'return' => true,
                                ),
                            );

                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_textarea_field($traveladvisor_opt_array);

                            break;
						
						case 'automatic_upgrade':
							// If this is an request to upgrade theme.
							if ( isset( $_GET['action'] ) && $_GET['action'] == 'upgrade_theme' ) {
								$data = traveladvisor_auto_upgrade_theme_and_plugins();

								$traveladvisor_theme_upgraded_name = '';
								if ( isset( $data['traveladvisor_theme_upgraded_name'] ) ) {
									$traveladvisor_theme_upgraded_name = $data['traveladvisor_theme_upgraded_name'];
								}

								$plugins_str = '';
								if ( isset( $data['traveladvisor_plugins_upgraded'] ) ) {
									$traveladvisor_plugins_upgraded = $data['traveladvisor_plugins_upgraded'];
									$plugins_str = implode( ', ', $traveladvisor_plugins_upgraded );
								}

								$msgStr = $traveladvisor_theme_upgraded_name;
								if ( $msgStr != '' ) {
									$msgStr .= ', ' . $plugins_str;
								} else {
									$msgStr = $plugins_str;
								}

								if ( $msgStr != '' ) {
									$message = __('Successfully installed ','traveladvisor' );
								} else {
									$message = __( 'Sorry unable to upgrade theme. Contact Theme Author and repot this issue.', 'traveladvisor' );
								}

								$traveladvisor_counter++;
								$output.='<div id="' . $value['id'] . '" class="alert alert-info fade in nomargin theme_box">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&#215;</button>
										<h4>Upgrade Theme and Plugin(s)</h4>
										<p>' . $message . '</p>
								</div>
								<script type="text/javascript">
									(function($){
										$(function() {
											$(".wrap").hide();
										});
									})(jQuery);
								</script>
								';
							}
							break;
							
                        case 'generate_backup':

                            global $wp_filesystem;

                            $backup_url = wp_nonce_url('themes.php?page=traveladvisor_var_settings_page');

                            if (false === ($creds = request_filesystem_credentials($backup_url, '', false, false, array()) )) {

                                return true;
                            }

                            if (!WP_Filesystem($creds)) {
                                request_filesystem_credentials($backup_url, '', true, false, array());
                                return true;
                            }

                            $traveladvisor_var_upload_dir = get_template_directory() . '/include/backend/cs-theme-options/backups/';

                            $traveladvisor_var_upload_dir_path = get_template_directory_uri() . '/include/backend/cs-theme-options/backups/';

                            $traveladvisor_var_all_list = $wp_filesystem->dirlist($traveladvisor_var_upload_dir);

                            $output .= '<div class="backup_generates_area" data-ajaxurl="' . esc_url(admin_url('admin-ajax.php')) . '">';

                            $output .= '
							<div class="cs-import-help">
								<h4>' . traveladvisor_var_theme_text_srt('traveladvisor_var_import_options') . '</h4>
							</div>';

                            $output .= '<div class="external_backup_areas">';

                            $output .= '<p>' . traveladvisor_var_theme_text_srt('traveladvisor_var_input_url') . '</p>';

                            $traveladvisor_opt_array = array(
                                'std' => '',
                                'cust_id' => 'bkup_import_url',
                                'cust_name' => 'bkup_import_url',
                                'return' => true,
                            );
                            $output .= $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($traveladvisor_opt_array);

                            $traveladvisor_opt_array = array(
                                'std' => traveladvisor_var_theme_text_srt('traveladvisor_var_import'),
                                'cust_id' => 'cs-backup-url-restore',
                                'cust_name' => 'cs-backup-url-restore',
                                'cust_type' => 'button',
                                'return' => true,
                            );
                            $output .= $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($traveladvisor_opt_array);

                            $output .= '</div>';

                            $output .= '
							<div class="cs-import-help">
								<h4>' . traveladvisor_var_theme_text_srt('traveladvisor_var_export_options') . '</h4>
							</div>';

                            if (is_array($traveladvisor_var_all_list) && sizeof($traveladvisor_var_all_list) > 0) {

                                $output .= '<p>' . traveladvisor_var_theme_text_srt('traveladvisor_var_generate_backup') . '</p>';

                                $output .= '<select onchange="traveladvisor_var_set_filename(this.value, \'' . esc_url($traveladvisor_var_upload_dir_path) . '\')">';

                                $traveladvisor_var_list_count = 1;
                                foreach ($traveladvisor_var_all_list as $file_key => $file_val) {

                                    if (isset($file_val['name'])) {

                                        $traveladvisor_var_slected = sizeof($traveladvisor_var_all_list) == $traveladvisor_var_list_count ? ' selected="selected"' : '';
                                        $output .= '<option' . $traveladvisor_var_slected . '>' . $file_val['name'] . '</option>';
                                    }
                                    $traveladvisor_var_list_count++;
                                }
                                $output .= '</select>';
                                $output .= '<div class="backup_action_btns">';

                                if (isset($file_val['name'])) {

                                    $traveladvisor_opt_array = array(
                                        'std' => traveladvisor_var_theme_text_srt('traveladvisor_var_restore'),
                                        'cust_id' => 'cs-backup-restore',
                                        'cust_name' => 'cs-backup-restore',
                                        'cust_type' => 'button',
                                        'extra_atr' => 'data-file="' . $file_val['name'] . '"',
                                        'return' => true,
                                    );
                                    $output .= $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($traveladvisor_opt_array);

                                    $output .= '<a download="' . $file_val['name'] . '" href="' . esc_url($traveladvisor_var_upload_dir_path . $file_val['name']) . '">' . traveladvisor_var_theme_text_srt('traveladvisor_var_download') . '</a>';

                                    $traveladvisor_opt_array = array(
                                        'std' => traveladvisor_var_theme_text_srt('traveladvisor_var_delete'),
                                        'cust_id' => 'cs-backup-delte',
                                        'cust_name' => 'cs-backup-delte',
                                        'cust_type' => 'button',
                                        'extra_atr' => 'data-file="' . $file_val['name'] . '"',
                                        'return' => true,
                                    );
                                    $output .= $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($traveladvisor_opt_array);
                                }

                                $output .= '</div>';
                            }

                            $traveladvisor_opt_array = array(
                                'std' => traveladvisor_var_theme_text_srt('traveladvisor_var_generate_backupp'),
                                'cust_id' => 'cs-backup-generte',
                                'cust_name' => 'cs-backup-generte',
                                'cust_type' => 'button',
                                'extra_atr' => 'onclick="javascript:traveladvisor_var_backup_generate(\'' . esc_js(admin_url('admin-ajax.php')) . '\');"',
                                'return' => true,
                            );
                            $output .= $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($traveladvisor_opt_array);

                            $output .= '</div>';

                            break;

                        case 'widgets_backup':

                            $output .= '<div class="backup_generates_area" data-ajaxurl="' . esc_url(admin_url('admin-ajax.php')) . '">';
                            if (class_exists('traveladvisor_var_widget_data')) {

                                global $wp_filesystem;

                                $backup_url = wp_nonce_url('themes.php?page=traveladvisor_var_settings_page');

                                if (false === ($creds = request_filesystem_credentials($backup_url, '', false, false, array()) )) {

                                    return true;
                                }

                                if (!WP_Filesystem($creds)) {
                                    request_filesystem_credentials($backup_url, '', true, false, array());
                                    return true;
                                }

                                $traveladvisor_var_upload_dir = get_template_directory() . '/include/backend/cs-widgets/import/widgets-backup/';

                                $traveladvisor_var_upload_dir_path = get_template_directory_uri() . '/include/backend/cs-widgets/import/widgets-backup/';

                                $traveladvisor_var_all_list = $wp_filesystem->dirlist($traveladvisor_var_upload_dir);

                                $output .= '
                                            <div class="cs-import-help">
                                                    <h4>' . traveladvisor_var_theme_text_srt('traveladvisor_var_import_widget') . '</h4>
                                            </div>';

                                $output .= '
                                            <div class="external_backup_areas">
                                                    <div id="cs-import-widgets-con">
                                                            <div id="cs-import-widget-loader"></div>
                                                            ' . traveladvisor_var_widget_data::import_settings_page() . '
                                                    </div>
                                            </div>';

                                if (is_array($traveladvisor_var_all_list) && sizeof($traveladvisor_var_all_list) > 0) {

                                    $output .= '<p>' . traveladvisor_var_theme_text_srt('traveladvisor_var_generate_backup') . '</p>';

                                    $output .= '<select id="cs-wid-backup-change" onchange="traveladvisor_var_set_filename(this.value, \'' . esc_url($traveladvisor_var_upload_dir_path) . '\')">';

                                    $traveladvisor_var_list_count = 1;
                                    foreach ($traveladvisor_var_all_list as $file_key => $file_val) {

                                        if (isset($file_val['name'])) {

                                            $traveladvisor_var_slected = sizeof($traveladvisor_var_all_list) == $traveladvisor_var_list_count ? ' selected="selected"' : '';
                                            $output .= '<option' . $traveladvisor_var_slected . '>' . $file_val['name'] . '</option>';
                                        }
                                        $traveladvisor_var_list_count++;
                                    }
                                    $output .= '</select>';
                                    $output .= '<div class="backup_action_btns">';

                                    if (isset($file_val['name'])) {

                                        $traveladvisor_opt_array = array(
                                            'std' => traveladvisor_var_theme_text_srt('traveladvisor_var_widget_setting'),
                                            'cust_id' => 'cs-wid-backup-restore',
                                            'cust_name' => 'cs-wid-backup-restore',
                                            'cust_type' => 'button',
                                            'extra_atr' => 'data-path="' . $traveladvisor_var_upload_dir_path . '" data-file="' . $file_val['name'] . '"',
                                            'return' => true,
                                        );
                                        $output .= $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($traveladvisor_opt_array);

                                        $output .= '<a download="' . $file_val['name'] . '" href="' . esc_url($traveladvisor_var_upload_dir_path . $file_val['name']) . '">' . traveladvisor_var_theme_text_srt('traveladvisor_var_download') . '</a>';

                                        $traveladvisor_opt_array = array(
                                            'std' => traveladvisor_var_theme_text_srt('traveladvisor_var_delete'),
                                            'cust_id' => 'cs-wid-backup-delte',
                                            'cust_name' => 'cs-wid-backup-delte',
                                            'cust_type' => 'button',
                                            'extra_atr' => 'data-file="' . $file_val['name'] . '"',
                                            'return' => true,
                                        );
                                        $output .= $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($traveladvisor_opt_array);
                                    }

                                    $output .= '</div>';
                                }

                                $output .= '
                                            <div class="cs-import-help">
                                                    <h4>' . traveladvisor_var_theme_text_srt('traveladvisor_var_export_widget') . '</h4>
                                            </div>';

                                $output .= '
                                            <div id="cs-export-widgets-con">
                                                    <div id="cs-export-widget-loader"></div>
                                                    ' . traveladvisor_var_widget_data::export_settings_page() . '
                                            </div>';
                            }

                            $output .= '</div>';

                            break;

                        case "layout":
                            global $traveladvisor_var_header_colors;

                            if (isset($traveladvisor_var_options['traveladvisor_var_' . $value['id']])) {
                                $select_value = $traveladvisor_var_options['traveladvisor_var_' . $value['id']];
                            } else {
                                $select_value = isset($value['std']) ? $value['std'] : '';
                            }

                            if (isset($value['id'])) {

                                $traveladvisor_name = 'traveladvisor_var_' . $value['id'];

                                $traveladvisor_opt_array = array(
                                    'name' => isset($value['name']) ? $value['name'] : '',
                                    'id' => $traveladvisor_name . '_layout',
                                    'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                );
                                $output .= $traveladvisor_var_html_fields->traveladvisor_var_opening_field($traveladvisor_opt_array);

                                if (is_array($value['options']) && sizeof($value['options']) > 0) {
                                    $output .= '
									<div class="input-sec">
										<div class="meta-input pattern">';
                                    foreach ($value['options'] as $key => $option) {
                                        $checked = '';
                                        $custom_class = '';
                                        if ($select_value != '') {

                                            if ($select_value == $key) {
                                                $checked = ' checked';
                                                $custom_class = 'check-list';
                                            }
                                        } else {
                                            if ($value['std'] == $key) {
                                                $checked = ' checked';
                                                $custom_class = 'check-list';
                                            }
                                        }

                                        $traveladvisor_rand_id = rand(123456, 987654);

                                        $output .= '
												<div class="radio-image-wrapper">';
                                        $traveladvisor_opt_array = array(
                                            'std' => esc_html($key),
                                            'cust_id' => $traveladvisor_name . $traveladvisor_rand_id,
                                            'cust_name' => $traveladvisor_name,
                                            'cust_type' => 'radio',
                                            'classes' => 'radio',
                                            'extra_atr' => 'onclick="select_bg(\'' . $traveladvisor_name . '\',\'' . esc_html($key) . '\',\'' . get_template_directory_uri() . '\',\'\')" ' . $checked,
                                            'return' => true,
                                        );
                                        $output .= $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($traveladvisor_opt_array);
                                        $output .= '
                                                    <label for="radio_' . esc_html($key) . '"> 
                                                            <span class="ss"><img src="' . get_template_directory_uri() . '/assets/backend/images/' . esc_html($key) . '.png" /></span> 
                                                            <span class="' . sanitize_html_class($custom_class) . '" id="check-list">&nbsp;</span>
                                                    </label>
                                                    <span class="title-theme">' . esc_attr($option) . '</span>            
                                            </div>';
                                    }
                                    $output .= '
                                                </div>
                                        </div>';
                                }
                                $output .= $traveladvisor_var_html_fields->traveladvisor_var_closing_field(array());
                            }
                            break;

                        case "horizontal_tab":
                            if (isset($traveladvisor_var_options['traveladvisor_var_layout']) && $traveladvisor_var_options['traveladvisor_var_layout'] <> 'boxed') {
                                echo '
                                        <style type="text/css" scoped>
                                                .horizontal_tabs,.main_tab{
                                                        display:none;
                                                }
                                        </style>';
                            }
                            $output .= '<div class="horizontal_tabs"><ul>';
                            $i = 0;
                            if (is_array($value['options']) && sizeof($value['options']) > 0) {
                                foreach ($value['options'] as $key => $val) {
                                    $active = ($i == 0) ? 'active' : '';
                                    $output .= '<li class="' . sanitize_html_class($val) . ' ' . $active . '"><a href="#' . $val . '" onclick="show_hide(this.hash);return false;">' . esc_html($key) . '</a></li>';
                                    $i++;
                                }
                            }
                            $output .= '</ul></div>';

                            break;

                        case "layout_body":
                            global $traveladvisor_var_header_colors;
                            $bg_counter = 0;
                            if (isset($traveladvisor_var_options['traveladvisor_var_' . $value['id']])) {
                                $select_value = $traveladvisor_var_options['traveladvisor_var_' . $value['id']];
                            } else {
                                $select_value = isset($value['std']) ? $value['std'] : '';
                            }

                            if ($value['path'] == "background") {
                                $image_name = "background";
                            } else {
                                $image_name = "pattern";
                            }

                            if (isset($value['id'])) {

                                $traveladvisor_name = 'traveladvisor_var_' . $value['id'];

                                $output .= '
                                        <div class="main_tab">
                                                <div class="horizontal_tab" style="display:' . $value['display'] . '" id="' . $value['tab'] . '">';

                                $traveladvisor_opt_array = array(
                                    'name' => isset($value['name']) ? $value['name'] : '',
                                    'id' => $traveladvisor_name . '_layout_body',
                                    'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                );
                                $output .= $traveladvisor_var_html_fields->traveladvisor_var_opening_field($traveladvisor_opt_array);

                                $output .= '
                                        <div class="input-sec">
                                                <div class="meta-input pattern">';
                                if (is_array($value['options']) && sizeof($value['options']) > 0) {
                                    foreach ($value['options'] as $key => $option) {
                                        $checked = '';
                                        $custom_class = '';
                                        if ($select_value == $option) {
                                            $checked = ' checked';
                                            $custom_class = 'check-list';
                                        }

                                        $traveladvisor_rand_id = rand(123456, 987654);

                                        $output .= '
                                                <div class="radio-image-wrapper">';
                                        $traveladvisor_opt_array = array(
                                            'std' => $option,
                                            'cust_id' => $traveladvisor_name . $traveladvisor_rand_id,
                                            'cust_name' => $traveladvisor_name,
                                            'cust_type' => 'radio',
                                            'classes' => 'radio',
                                            'extra_atr' => 'onClick="javascript:select_bg(\'' . $traveladvisor_name . '\',\'' . $option . '\',\'' . get_template_directory_uri() . '\',\'\')" ' . $checked,
                                            'return' => true,
                                        );
                                        $output .= $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($traveladvisor_opt_array);
                                        $output .= '
														<label for="radio_' . esc_html($key) . '"> 
															<span class="ss"><img src="' . get_template_directory_uri() . '/assets/backend/images/' . $value['path'] . '/' . $image_name . $bg_counter . '.png" /></span> 
															<span id="check-list" class="' . sanitize_html_class($custom_class) . '">&nbsp;</span>
														</label>
													</div>';
                                        $bg_counter++;
                                    }
                                }
                                $output .= '
											</div>
										</div>
									</div>
								</div>';
                                $output .= $traveladvisor_var_html_fields->traveladvisor_var_closing_field(array());
                            }
                            break;

                        case 'select':
                            if (isset($traveladvisor_var_options['traveladvisor_var_' . $value['id']])) {
                                $select_value = $traveladvisor_var_options['traveladvisor_var_' . $value['id']];
                            } else {
                                $select_value = isset($value['std']) ? $value['std'] : '';
                            }

                            $traveladvisor_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $select_value,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => isset($value['classes']) ? $value['classes'] : '',
                                    'extra_atr' => isset($value['extra_att']) ? $value['extra_att'] : '',
                                    'return' => true,
                                    'options' => isset($value['options']) ? $value['options'] : '',
                                ),
                            );
                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);

                            break;

                        case 'gfont_select':

                            if (isset($traveladvisor_var_options['traveladvisor_var_' . $value['id']])) {
                                $select_value = $traveladvisor_var_options['traveladvisor_var_' . $value['id']];
                            } else {
                                $select_value = isset($value['std']) ? $value['std'] : '';
                            }

                            $output .= '
                                        <div class="alert alert-info fade in nomargin theme_box">
                                                <h4><b>' . esc_attr($value['name']) . '</b></h4>
                                                <p><strong>' . esc_attr($value['hint_text']) . '</strong></p>
                                        </div>';


                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_font_family'),
                                'id' => isset($value['id']) ? 'traveladvisor_var_' . $value['id'] . '_select' : '',
                                'extra_att' => 'style="width:50%; display:inline-block;"',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $select_value,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => isset($value['classes']) ? $value['classes'] : '',
                                    'return' => true,
                                    'extra_atr' => 'onchange="traveladvisor_var_google_font_att(\'' . admin_url("admin-ajax.php") . '\',this.value, \'traveladvisor_var_' . $value['id'] . '_att\')"',
                                    'first_option' => '<option value="">' . traveladvisor_var_theme_text_srt('traveladvisor_var_default_font') . '</option>',
                                    'options' => isset($value['options']) ? $value['options'] : '',
                                ),
                            );
                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);

                            break;
                        case 'mailchimp':


                            if (isset($traveladvisor_var_options) && $traveladvisor_var_options <> '') {
                                if (isset($traveladvisor_var_options['traveladvisor_var_' . $value['id']])) {
                                    $select_value = $traveladvisor_var_options['traveladvisor_var_' . $value['id']];
                                }
                            } else {
                                $select_value = $value['std'];
                            }

                            $output .= '';



                            $output_str = '';
                            foreach ($value['options'] as $option_key => $option) {
                                $selected = '';
                                if ($select_value != '') {
                                    if ($select_value == $option_key) {
                                        $selected = ' selected="selected"';
                                    }
                                } else {
                                    if (isset($value['std']))
                                        if ($value['std'] == $option_key) {
                                            $selected = ' selected="selected"';
                                        }
                                }
                                $output_str .= '<option' . $selected . ' value="' . $option_key . '">';
                                $output_str .= $option;
                                $output_str .= '</option>';
                            }












                            $traveladvisor_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'id' => isset($value['id']) ? 'traveladvisor_var_' . $value['id'] . '_select' : '',
                                'extra_att' => '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $select_value,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => isset($value['classes']) ? $value['classes'] : '',
                                    'return' => true,
                                    'first_option' => '<option value="">' . traveladvisor_var_theme_text_srt('traveladvisor_var_select_attribute') . '</option>',
                                    'options' => isset($output_str) ? $output_str : '',
                                    'options_markup' => true,
                                ),
                            );
                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);





                            $output .= '';

                            break;
                        case 'gfont_att_select':

                            if (isset($traveladvisor_var_options['traveladvisor_var_' . $value['id']]) && $traveladvisor_var_options['traveladvisor_var_' . $value['id']] <> '') {
                                $select_value = $traveladvisor_var_options['traveladvisor_var_' . $value['id']];
                                $value['options'] = traveladvisor_var_get_google_font_attribute('', $traveladvisor_var_options[str_replace('_att', '', 'traveladvisor_var_' . $value['id'])]);
                            } else {
                                $select_value = isset($value['std']) ? $value['std'] : '';
                            }

                            $traveladvisor_atts_array = array();
                            if (isset($value['options']) && is_array($traveladvisor_atts_array) and $value['options'] != '') {
                                foreach ($value['options'] as $traveladvisor_att)
                                    $traveladvisor_atts_array[$traveladvisor_att] = $traveladvisor_att;
                            }

                            $traveladvisor_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'id' => isset($value['id']) ? 'traveladvisor_var_' . $value['id'] . '_select' : '',
                                'extra_att' => 'style="width:50%; display:inline-block;"',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $select_value,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => isset($value['classes']) ? $value['classes'] : '',
                                    'return' => true,
                                    'first_option' => '<option value="">' . traveladvisor_var_theme_text_srt('traveladvisor_var_select_attribute') . '</option>',
                                    'options' => isset($traveladvisor_atts_array) ? $traveladvisor_atts_array : '',
                                ),
                            );
                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);

                            break;

                        case 'select_ftext':

                            if (isset($traveladvisor_var_options['traveladvisor_var_' . $value['id']])) {
                                $select_value = $traveladvisor_var_options['traveladvisor_var_' . $value['id']];
                            } else {
                                $select_value = isset($value['std']) ? $value['std'] : '';
                            }

                            $traveladvisor_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'id' => isset($value['id']) ? 'traveladvisor_var_' . $value['id'] . '_select' : '',
                                'extra_att' => 'style="width:50%; display:inline-block;"',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $select_value,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => isset($value['classes']) ? $value['classes'] : '',
                                    'return' => true,
                                    'options' => isset($value['options']) ? $value['options'] : '',
                                ),
                            );
                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);

                            break;

                        case 'default_header':

                            if (isset($traveladvisor_var_options['traveladvisor_var_' . $value['id']])) {
                                $select_value = $traveladvisor_var_options['traveladvisor_var_' . $value['id']];
                            } else {
                                $select_value = isset($value['std']) ? $value['std'] : '';
                            }

                            $traveladvisor_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'id' => isset($value['id']) ? 'traveladvisor_var_' . $value['id'] . '_header' : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $select_value,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => isset($value['classes']) ? $value['classes'] : '',
                                    'return' => true,
                                    'extra_atr' => 'onchange="javascript:traveladvisor_var_show_slider(this.value)"',
                                    'options' => isset($value['options']) ? $value['options'] : '',
                                ),
                            );
                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);

                            break;

                        case 'select_sidebar' :

                            if (isset($traveladvisor_var_options['traveladvisor_var_' . $value['id']])) {
                                $select_value = $traveladvisor_var_options['traveladvisor_var_' . $value['id']];
                            } else {
                                $select_value = isset($value['std']) ? $value['std'] : '';
                            }

                            $traveladvisor_options_markup = '<option value="">' . traveladvisor_var_theme_text_srt('traveladvisor_var_select_sidebar') . '</option>';

                            if (is_array($value['options']['sidebar']) && sizeof($value['options']['sidebar']) > 0) {
                                foreach ($value['options']['sidebar'] as $option) {

                                    $key = sanitize_title($option);
                                    $selected = '';
                                    if ($select_value != '') {
                                        if ($select_value == $key) {
                                            $selected = ' selected="selected"';
                                        }
                                    }
                                    $traveladvisor_options_markup .= '<option value="' . $key . '"' . $selected . '>' . $option . '</option>';
                                }
                            }

                            $traveladvisor_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $select_value,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => isset($value['classes']) ? $value['classes'] : '',
                                    'return' => true,
                                    'options_markup' => true,
                                    'options' => $traveladvisor_options_markup,
                                ),
                            );
                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);

                            break;

                        case "checkbox":

                            if (isset($traveladvisor_var_options['traveladvisor_var_' . $value['id']])) {
                                $checked_value = $traveladvisor_var_options['traveladvisor_var_' . $value['id']];
                            } else {
                                $checked_value = isset($value['std']) ? $value['std'] : '';
                            }

                            $traveladvisor_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'id' => isset($value['id']) ? 'traveladvisor_var_' . $value['id'] . '_checkbox' : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $checked_value,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => '',
                                    'return' => true,
                                ),
                            );
                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_checkbox_field($traveladvisor_opt_array);

                            break;

                        case 'hidden':
                            if (isset($traveladvisor_var_options['traveladvisor_var_' . $value['id']])) {
                                $val = $traveladvisor_var_options['traveladvisor_var_' . $value['id']];
                            } else {
                                $val = isset($value['std']) ? $value['std'] : '';
                            }

                            $traveladvisor_opt_array = array(
                                'std' => $val,
                                'id' => isset($value['id']) ? $value['id'] : '',
                                'classes' => '',
                                'return' => true,
                            );
                            $output .= $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render($traveladvisor_opt_array);

                            break;

                        case 'hidden_field':
                            $val = isset($value['std']) ? $value['std'] : '';
                            $traveladvisor_opt_array = array(
                                'std' => $val,
                                'id' => isset($value['id']) ? $value['id'] : '',
                                'classes' => '',
                                'return' => true,
                            );
                            $output .= $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render($traveladvisor_opt_array);

                            break;

                        case "color":
                            if (isset($traveladvisor_var_options['traveladvisor_var_' . $value['id']])) {
                                $val = $traveladvisor_var_options['traveladvisor_var_' . $value['id']];
                            } else {
                                $val = isset($value['std']) ? $value['std'] : '';
                            }

                            $traveladvisor_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'id' => isset($value['id']) ? 'traveladvisor_var_' . $value['id'] . '_color' : '',
                                'field_params' => array(
                                    'std' => $val,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => 'bg_color',
                                    'return' => true,
                                ),
                            );
                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);

                            break;

                        case "upload logo":
                            $traveladvisor_var_counter++;

                            if (isset($traveladvisor_var_options['traveladvisor_var_' . $value['id']])) {
                                $val = $traveladvisor_var_options['traveladvisor_var_' . $value['id']];
                            } else {
                                $val = isset($value['std']) ? $value['std'] : '';
                            }

                            $traveladvisor_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'id' => isset($value['id']) ? $value['id'] : '',
                                'main_id' => isset($value['mian_id']) ? $value['mian_id'] : '',
                                'std' => $val,
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'prefix' => '',
                                'field_params' => array(
                                    'std' => isset($val) ? $val : '',
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'prefix' => '',
                                    'return' => true,
                                ),
                            );

                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_upload_file_field($traveladvisor_opt_array);

                            break;

                        case "upload font":
                            $traveladvisor_var_counter++;

                            if (isset($traveladvisor_var_options['traveladvisor_var_' . $value['id']])) {
                                $val = $traveladvisor_var_options['traveladvisor_var_' . $value['id']];
                            } else {
                                $val = isset($value['std']) ? $value['std'] : '';
                            }

                            $traveladvisor_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'id' => $traveladvisor_name . '_upload',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                            );
                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_opening_field($traveladvisor_opt_array);

                            $traveladvisor_opt_array = array(
                                'std' => $val,
                                'cust_id' => $value['id'],
                                'cust_name' => 'traveladvisor_var_' . $value['id'],
                                'return' => true,
                            );
                            $output .= $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($traveladvisor_opt_array);
                            $output .= '
							<label class="browse-icon">';
                            $traveladvisor_opt_array = array(
                                'std' => traveladvisor_var_theme_text_srt('traveladvisor_var_browse'),
                                'cust_id' => 'traveladvisor_var_' . $value['id'],
                                'cust_name' => $value['id'],
                                'cust_type' => 'button',
                                'classes' => 'cs-traveladvisor-media left',
                                'return' => true,
                            );
                            $output .= $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($traveladvisor_opt_array);
                            $output .= '
							</label>';
                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_closing_field(array());

                            break;

                        case "upload favicon":
                            if (isset($traveladvisor_var_options['traveladvisor_var_' . $value['id']])) {
                                $val = $traveladvisor_var_options['traveladvisor_var_' . $value['id']];
                            } else {
                                $val = isset($value['std']) ? $value['std'] : '';
                            }

                            $traveladvisor_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'id' => isset($value['id']) ? $value['id'] : '',
                                'main_id' => isset($value['mian_id']) ? $value['mian_id'] : '',
                                'std' => $val,
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'prefix' => '',
                                'field_params' => array(
                                    'std' => isset($val) ? $val : '',
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'prefix' => '',
                                    'return' => true,
                                ),
                            );

                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_upload_file_field($traveladvisor_opt_array);

                            break;

                        case "sidebar" :
                            $val = $value['std'];
                            if (isset($traveladvisor_var_options['traveladvisor_var_sidebar']) && is_array($traveladvisor_var_options['traveladvisor_var_sidebar'])) {
                                $val['sidebar'] = $traveladvisor_var_options['traveladvisor_var_sidebar'];
                            }
                            if (isset($val['sidebar']) && is_array($val['sidebar']) && sizeof($val['sidebar']) > 0) {
                                $display = 'block';
                            } else {
                                $display = 'none';
                            }

                            $traveladvisor_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_sidebar_title'),
                            );
                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_opening_field($traveladvisor_opt_array);

                            $traveladvisor_opt_array = array(
                                'std' => '',
                                'cust_id' => 'sidebar_input',
                                'cust_name' => 'sidebar_input',
                                'return' => true,
                            );
                            $output .= $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($traveladvisor_opt_array);

                            $traveladvisor_opt_array = array(
                                'std' => traveladvisor_var_theme_text_srt('traveladvisor_var_add_sidebar'),
                                'cust_type' => 'button',
                                'cust_id' => 'add_new_sidebar',
                                'cust_name' => 'add_new_sidebar',
                                'extra_atr' => 'onclick="javascript:add_sidebar()"',
                                'return' => true,
                            );
                            $output .= $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($traveladvisor_opt_array);

                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_closing_field(array());

                            $output .= '
							<div class="clear"></div>
							<div class="sidebar-area" style="display:' . $display . '">
								<div class="theme-help">
								  <h4 style="padding-bottom:0px;">' . traveladvisor_var_theme_text_srt('traveladvisor_var_added_sidebar') . '</h4>
								  <div class="clear"></div>
								</div>
								<div class="boxes">
									<table class="to-table" border="0" cellspacing="0">
									<thead>
										<tr>
											<th>' . traveladvisor_var_theme_text_srt('traveladvisor_var_sidebar_name') . '</th>
											<th class="centr">' . traveladvisor_var_theme_text_srt('traveladvisor_var_sidebar_action') . '</th>
										</tr>
									</thead>
									<tbody id="sidebar_area">';
                            if ($display == 'block') {
                                $i = 1;
                                if (isset($val['sidebar']) && is_array($val['sidebar']) && sizeof($val['sidebar']) > 0) {
                                    foreach ($val['sidebar'] as $sidebar) {
                                        $output .= '
												<tr id="sidebar_' . $i . '">
													<td>';

                                        $traveladvisor_opt_array = array(
                                            'std' => $sidebar,
                                            'id' => 'sidebar' . $i,
                                            'cust_name' => 'traveladvisor_var_sidebar[]',
                                            'return' => true,
                                        );
                                        $output .= $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render($traveladvisor_opt_array);

                                        $output .= $sidebar . '</td>
													<td class="centr"> <a class="remove-btn" onclick="javascript:return confirm(\'' . traveladvisor_var_theme_text_srt('traveladvisor_var_sure_delete') . '\')" href="javascript:traveladvisor_var_div_remove(\'sidebar_' . $i . '\')" data-toggle="tooltip" data-placement="top" title="' . traveladvisor_var_theme_text_srt('traveladvisor_var_sidebar_remove') . '"><i class="icon-times"></i></a</td>
												</tr>';
                                        $i++;
                                    }
                                }
                            }
                            $output .= '
									 </tbody>
									</table>
								</div>
							</div>';
                            break;

                        case "traveladvisor_var_footer_sidebar":
                            $val = $value['std'];
                            if (isset($traveladvisor_var_options['traveladvisor_var_footer_sidebar']) and count($traveladvisor_var_options['traveladvisor_var_footer_sidebar']) > 0) {
                                $val['traveladvisor_var_footer_sidebar'] = $traveladvisor_var_options['traveladvisor_var_footer_sidebar'];
                            }

                            if (isset($traveladvisor_var_options['traveladvisor_var_footer_width']) and count($traveladvisor_var_options['traveladvisor_var_footer_width']) > 0) {
                                $val['traveladvisor_var_footer_width'] = $traveladvisor_var_options['traveladvisor_var_footer_width'];
                            }

                            if (isset($val['traveladvisor_var_footer_sidebar']) and count($val['traveladvisor_var_footer_sidebar']) > 0 and $val['traveladvisor_var_footer_sidebar'] <> '') {
                                $display = 'block';
                            } else {
                                $display = 'none';
                            }


                            if (isset($val['traveladvisor_var_footer_width']) and count($val['traveladvisor_var_footer_width']) > 0 and $val['traveladvisor_var_footer_width'] <> '') {
                                $display = 'block';
                            } else {
                                $display = 'none';
                            }

                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_opening_field(array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_footer_sidebar_title'),
                                    )
                            );

                            $output .= $traveladvisor_var_form_fields->traveladvisor_var_form_text_render(array(
                                'std' => '',
                                'cust_id' => "footer_sidebar_input",
                                'cust_name' => 'footer_sidebar_input',
                                'classes' => 'input-medium',
                                'return' => true,
                            ));

                            $output .= $traveladvisor_var_form_fields->traveladvisor_var_form_select_render(array(
                                'std' => '',
                                'cust_id' => "footer_sidebar_width",
                                'cust_name' => 'footer_sidebar_width',
                                'classes' => 'input-small chosen-select',
                                'options' =>
                                array(
                                    '2 Column (16.67%)' => traveladvisor_var_theme_text_srt('traveladvisor_var_footer_sidebar_width_2c'),
                                    '3 Column (25%)' => traveladvisor_var_theme_text_srt('traveladvisor_var_footer_sidebar_width_3c'),
                                    '4 Column (33.33%)' => traveladvisor_var_theme_text_srt('traveladvisor_var_footer_sidebar_width_4c'),
                                    '6 Column (50%)' => traveladvisor_var_theme_text_srt('traveladvisor_var_footer_sidebar_width_6c'),
                                    '8 Column (66.66%)' => traveladvisor_var_theme_text_srt('traveladvisor_var_footer_sidebar_width_8c'),
                                    '9 Column (75%)' => traveladvisor_var_theme_text_srt('traveladvisor_var_footer_sidebar_width_9c'),
                                    '10 Column (83.33%)' => traveladvisor_var_theme_text_srt('traveladvisor_var_footer_sidebar_width_10c'),
                                    '12 Column (100%)' => traveladvisor_var_theme_text_srt('traveladvisor_var_footer_sidebar_width_12c'),
                                ),
                                'return' => true,
                            ));

                            $output .= $traveladvisor_var_form_fields->traveladvisor_var_form_text_render(array(
                                'std' => traveladvisor_var_theme_text_srt('traveladvisor_var_add_sidebar'),
                                'id' => "add_footer_sidebar",
                                'cust_name' => '',
                                'cust_type' => 'button',
                                'extra_atr' => ' onclick="javascript:add_footer_sidebar()"',
                                'return' => true,
                            ));

                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_closing_field(array(
                                'desc' => '',
                                    )
                            );

                            $output .= '
					<div class="clear"></div>
					<div class="footer_sidebar-area" style="display:' . $display . '">
						<div class="theme-help">
						  <h4 style="padding-bottom:0px;">' . traveladvisor_var_theme_text_srt('traveladvisor_var_added_sidebar') . '</h4>
						  <div class="clear"></div>
						</div>
						<div class="boxes">
							<table class="to-table" border="0" cellspacing="0">
							<thead>
								<tr>
									<th>' . traveladvisor_var_theme_text_srt('traveladvisor_var_sidebar_name') . '</th>
									<th>' . traveladvisor_var_theme_text_srt('traveladvisor_var_sidebar_width') . '</th>
									<th class="centr">' . traveladvisor_var_theme_text_srt('traveladvisor_var_sidebar_action') . '</th>
								</tr>
							</thead>
							<tbody id="footer_sidebar_area">';
                            if ($display == 'block') {
                                $i = 0;

                                foreach ($val['traveladvisor_var_footer_sidebar'] as $traveladvisor_var_footer_sidebar) {
                                    ?>
                                    <script type="text/javascript">
                                        var $ = jQuery;
                                        $(document).ready(function () {
                                            function slideout() {
                                                setTimeout(function () {
                                                    $("#footer_sidebar_area").slideUp("slow", function () {
                                                    });

                                                }, 2000);
                                            }

                                            $(function () {
                                                $("#footer_sidebar_area").sortable({opacity: 0.8, cursor: 'move', update: function () {

                                                        $("#footer_sidebar_area").html(theResponse);
                                                        $("#footer_sidebar_area").slideDown('slow');
                                                        slideout();

                                                    }
                                                });
                                            });
                                        });
                                    </script> 
                                    <?php

                                    $output .= '<tr id="footer_sidebar_' . $i . '">
							
											<td>';

                                    $traveladvisor_footer_sidebar_name = traveladvisor_get_sidebar_id($traveladvisor_var_footer_sidebar);
                                    $traveladvisor_footer_sidebar_width = $traveladvisor_var_options['traveladvisor_var_footer_width'][$i];

                                    $output .= $traveladvisor_var_form_fields->traveladvisor_var_form_text_render(array(
                                        'std' => isset($traveladvisor_var_footer_sidebar) ? $traveladvisor_var_footer_sidebar : '',
                                        'id' => "hide_footer_sidebar" . $i,
                                        'cust_name' => 'traveladvisor_var_footer_sidebar[]',
                                        'cust_type' => 'hidden',
                                        'return' => true,
                                    ));

                                    $output .= $traveladvisor_var_footer_sidebar;

                                    $output .= '<td>';

                                    $traveladvisor_footer_sidebar_name = traveladvisor_get_sidebar_id($traveladvisor_var_footer_sidebar);

                                    $output .= $traveladvisor_var_form_fields->traveladvisor_var_form_text_render(array(
                                        'std' => isset($traveladvisor_footer_sidebar_width) ? $traveladvisor_footer_sidebar_width : '',
                                        'id' => "hide_footer_sidebar_width" . $i,
                                        'cust_name' => 'traveladvisor_var_footer_width[]',
                                        'cust_type' => 'hidden',
                                        'return' => true,
                                    ));

                                    $output.= absint($traveladvisor_footer_sidebar_width);

                                    $output.= '</td>';

                                    $output.= '</td> 
											<td class="centr"> <a class="remove-btn" onclick="javascript:return confirm(\'Are you sure! You want to delete this\')" href="javascript:traveladvisor_div_remove(\'footer_sidebar_' . $i . '\')" data-toggle="tooltip" data-placement="top" title="Remove"><i class="icon-times"></i></a>
										</td>
									</tr>';
                                    $i++;
                                }
                            };
                            $output.='</tbody>
							</table>
						</div>
					</div>';
                            break;
                            
                        
                        case 'select_footer_sidebar':
                            if (isset($traveladvisor_var_options) and $traveladvisor_var_options <> '') {
                                if (isset($traveladvisor_var_options[$value['id']])) {
                                    $select_value = $traveladvisor_var_options[$value['id']];
                                }
                            } else {
                                $select_value = $value['std'];
                            }
                            $traveladvisor_single_post_layout = $traveladvisor_var_options['traveladvisor_single_post_layout'];

                            if (isset($traveladvisor_single_post_layout) and $traveladvisor_single_post_layout == 'no_footer_sidebar') {
                                $cus_style = ' style="display:none;"';
                            } else {
                                $cus_style = ' style="display:block;"';
                            }
                            $traveladvisor_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'id' => $value['id'] . '_header',
                                'extra_att' => isset($cus_style) ? $cus_style : '',
                                'desc' => $value['desc'],
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $select_value,
                                    'cust_id' => isset($value['id']) ? $value['id'] : '',
                                    'cust_name' => isset($value['id']) ? $value['id'] : '',
                                    'options' => $value['options']['traveladvisor_var_footer_sidebar'],
                                    'return' => true,
                                    'classes' => $traveladvisor_classes,
                                ),
                            );

                            if (isset($value['split']) && $value['split'] <> '') {
                                $traveladvisor_opt_array['split'] = $value['split'];
                            }
                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);

                            break;

                        case 'select_footer_sidebar1':

                            if (isset($traveladvisor_var_options) and $traveladvisor_var_options <> '') {
                                if (isset($traveladvisor_var_options[$value['id']])) {
                                    $select_value = $traveladvisor_var_options[$value['id']];
                                }
                            } else {
                                $select_value = $value['std'];
                            }
                            $traveladvisor_single_post_layout = $traveladvisor_var_options['traveladvisor_default_page_layout'];

                            if (isset($traveladvisor_single_post_layout) and $traveladvisor_single_post_layout == 'no_footer_sidebar') {
                                $cus_style = ' style="display:none;"';
                            } else {
                                $cus_style = ' style="display:block;"';
                            }

                            $traveladvisor_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'id' => $value['id'] . '_header',
                                'extra_att' => isset($cus_style) ? $cus_style : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $select_value,
                                    'cust_id' => isset($value['id']) ? $value['id'] : '',
                                    'cust_name' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => $traveladvisor_classes,
                                    'options' => $value['options']['traveladvisor_var_footer_sidebar'],
                                    'return' => true,
                                ),
                            );

                            if (isset($value['split']) && $value['split'] <> '') {
                                $traveladvisor_opt_array['split'] = $value['split'];
                            }
                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_select_field($traveladvisor_opt_array);
                            break;

                        case "networks" :

                            if (isset($traveladvisor_var_options) && $traveladvisor_var_options <> '') {

                                if (!isset($traveladvisor_var_options['traveladvisor_var_social_net_awesome'])) {
                                    $network_list = '';
                                    $display = 'none';
                                } else {
                                    $network_list = isset($traveladvisor_var_options['traveladvisor_var_social_net_awesome']) ? $traveladvisor_var_options['traveladvisor_var_social_net_awesome'] : '';
                                    $social_net_tooltip = isset($traveladvisor_var_options['traveladvisor_var_social_net_tooltip']) ? $traveladvisor_var_options['traveladvisor_var_social_net_tooltip'] : '';
                                    $social_net_icon_path = isset($traveladvisor_var_options['traveladvisor_var_social_icon_path_array']) ? $traveladvisor_var_options['traveladvisor_var_social_icon_path_array'] : '';
                                    $social_net_url = isset($traveladvisor_var_options['traveladvisor_var_social_net_url']) ? $traveladvisor_var_options['traveladvisor_var_social_net_url'] : '';
                                    $social_font_awesome_color = isset($traveladvisor_var_options['traveladvisor_var_social_icon_color']) ? $traveladvisor_var_options['traveladvisor_var_social_icon_color'] : '';
                                    $display = 'block';
                                }
                            } else {
                                $val = isset($traveladvisor_var_options['options']) ? $value['options'] : '';
                                $std = isset($traveladvisor_var_options['id']) ? $value['id'] : '';
                                $display = 'block';
                                $network_list = isset($traveladvisor_var_options['traveladvisor_var_social_net_awesome']) ? $traveladvisor_var_options['traveladvisor_var_social_net_awesome'] : '';
                                $social_net_tooltip = isset($traveladvisor_var_options['traveladvisor_var_social_net_tooltip']) ? $traveladvisor_var_options['traveladvisor_var_social_net_tooltip'] : '';
                                $social_net_icon_path = isset($traveladvisor_var_options['traveladvisor_var_social_icon_path_array']) ? $traveladvisor_var_options['traveladvisor_var_social_icon_path_array'] : '';
                                $social_net_url = isset($traveladvisor_var_options['traveladvisor_var_social_net_url']) ? $traveladvisor_var_options['traveladvisor_var_social_net_url'] : '';
                                $social_font_awesome_color = isset($traveladvisor_var_options['traveladvisor_var_social_icon_color']) ? $traveladvisor_var_options['traveladvisor_var_social_icon_color'] : '';
                            }
                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_title'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_title_hinttext'),
                                'field_params' => array(
                                    'std' => '',
                                    'cust_id' => 'social_net_tooltip_input',
                                    'cust_name' => 'social_net_tooltip_input',
                                    'classes' => '',
                                    'return' => true,
                                ),
                            );
                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);

                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_url'),
                                'desc' => '',
                                'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_url_hinttext'),
                                'field_params' => array(
                                    'std' => '',
                                    'cust_id' => 'social_net_url_input',
                                    'cust_name' => 'social_net_url_input',
                                    'classes' => '',
                                    'return' => true,
                                ),
                            );
                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);

                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_icon_path'),
                                'id' => 'social_icon_input',
                                'std' => '',
                                'desc' => '',
                                'hint_text' => '',
                                'prefix' => '',
                                'field_params' => array(
                                    'std' => '',
                                    'id' => 'social_icon_input',
                                    'prefix' => '',
                                    'return' => true,
                                ),
                            );

                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_upload_file_field($traveladvisor_opt_array);

                            $output .= '
							<div class="form-elements">  
								<div id="traveladvisor_var_infobox_networks' . $counter . '">
								  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<label>' . traveladvisor_var_theme_text_srt('traveladvisor_var_icon') . '</label>
								  </div>
								  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">' . traveladvisor_var_icomoon_icons_box("", "networks" . $counter, 'social_net_awesome_input') . '</div>
								</div>
							</div>';

                            $traveladvisor_opt_array = array(
                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_icon_color'),
                                'desc' => '',
                                'hint_text' => '',
                                'field_params' => array(
                                    'std' => '',
                                    'cust_id' => 'social_font_awesome_color',
                                    'cust_name' => 'social_font_awesome_color',
                                    'classes' => 'bg_color',
                                    'return' => true,
                                ),
                            );
                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);

                            $traveladvisor_opt_array = array(
                                'name' => '&nbsp;',
                                'desc' => '',
                                'hint_text' => '',
                                'field_params' => array(
                                    'std' => traveladvisor_var_theme_text_srt('traveladvisor_var_add_soc_icon'),
                                    'id' => 'add_soc_icon',
                                    'classes' => '',
                                    'cust_type' => 'button',
                                    'extra_atr' => 'onclick="javascript:traveladvisor_var_add_social_icon(\'' . admin_url("admin-ajax.php") . '\')"',
                                    'return' => true,
                                ),
                            );
                            $output .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);

                            $output .= '
							<div class="social-area" style="display:' . $display . '">
							<div class="theme-help">
							  <h4 style="padding-bottom:0px;">' . traveladvisor_var_theme_text_srt('traveladvisor_var_add_soc_icon_already') . '</h4>
							  <div class="clear"></div>
							</div>
							<div class="boxes">
							<table class="to-table" border="0" cellspacing="0">
								<thead>
								  <tr>
									<th>' . traveladvisor_var_theme_text_srt('traveladvisor_var_icon_path') . '</th>
									<th>' . traveladvisor_var_theme_text_srt('traveladvisor_var_network_name') . '</th>
									<th>' . traveladvisor_var_theme_text_srt('traveladvisor_var_url') . '</th>
									<th class="centr">' . traveladvisor_var_theme_text_srt('traveladvisor_var_sidebar_action') . '</th>
								  </tr>
								</thead>
								<tbody id="social_network_area">';
                            $i = 0;
                            if (is_array($network_list)) {
                                foreach ($network_list as $network) {
                                    if (isset($network_list[$i]) || isset($network_list[$i])) {

                                        $traveladvisor_rand_num = rand(123456, 987654);
                                        $output .= '<tr id="del_' . $traveladvisor_rand_num . '"><td>';
                                        if (isset($network_list[$i]) && !empty($network_list[$i])) {
                                            $output .= '<i style="color:' . $social_font_awesome_color[$i] . ';" class="fa ' . $network_list[$i] . ' icon-2x"></i>';
                                        } else {
                                            $output.='<img width="50" src="' . esc_url($social_net_icon_path[$i]) . '">';
                                        }
                                        $output .= '</td><td>' . $social_net_tooltip[$i] . '</td>';
                                        $output .= '<td><a href="#">' . $social_net_url[$i] . '</a></td>';
                                        $output .= '
										  <td class="centr"> 
											<a class="remove-btn" onclick="javascript:return confirm(\'' . traveladvisor_var_theme_text_srt('traveladvisor_var_sure_delete') . '\')" href="javascript:social_icon_del(\'' . $traveladvisor_rand_num . '\')" data-toggle="tooltip" data-placement="top" title="' . traveladvisor_var_theme_text_srt('traveladvisor_var_sidebar_remove') . '">
											<i class="icon-times"></i></a>
											<a href="javascript:traveladvisor_var_toggle(\'' . absint($traveladvisor_rand_num) . '\')" data-toggle="tooltip" data-placement="top" title="' . traveladvisor_var_theme_text_srt('traveladvisor_var_edit') . '">
											  <i class="icon-edit3"></i>
											</a>
										  </td>
										</tr>';

                                        $output .= '
										<tr id="' . absint($traveladvisor_rand_num) . '" style="display:none">
										  <td colspan="3">
											<div class="form-elements">
												<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
												<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
													<a class="cs-remove-btn" onclick="traveladvisor_var_toggle(\'' . $traveladvisor_rand_num . '\')"><i class="icon-times"></i></a>
												</div>
											</div>';

                                        $traveladvisor_opt_array = array(
                                            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_title'),
                                            'desc' => '',
                                            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_title_hinttext'),
                                            'field_params' => array(
                                                'std' => isset($social_net_tooltip[$i]) ? $social_net_tooltip[$i] : '',
                                                'cust_id' => 'social_net_tooltip' . $i,
                                                'cust_name' => 'traveladvisor_var_social_net_tooltip[]',
                                                'classes' => '',
                                                'return' => true,
                                            ),
                                        );
                                        $output .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);

                                        $traveladvisor_opt_array = array(
                                            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_url'),
                                            'desc' => '',
                                            'hint_text' => traveladvisor_var_theme_text_srt('traveladvisor_var_url_hinttext'),
                                            'field_params' => array(
                                                'std' => isset($social_net_url[$i]) ? $social_net_url[$i] : '',
                                                'cust_id' => 'social_net_url' . $i,
                                                'cust_name' => 'traveladvisor_var_social_net_url[]',
                                                'classes' => '',
                                                'return' => true,
                                            ),
                                        );
                                        $output .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);

                                        $traveladvisor_opt_array = array(
                                            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_icon_path'),
                                            'id' => 'social_icon_path',
                                            'std' => isset($social_net_icon_path[$i]) ? $social_net_icon_path[$i] : '',
                                            'desc' => '',
                                            'hint_text' => '',
                                            'prefix' => '',
                                            'array' => true,
                                            'field_params' => array(
                                                'std' => isset($social_net_icon_path[$i]) ? $social_net_icon_path[$i] : '',
                                                'id' => 'social_icon_path',
                                                'prefix' => '',
                                                'array' => true,
                                                'return' => true,
                                            ),
                                        );

                                        $output .= $traveladvisor_var_html_fields->traveladvisor_var_upload_file_field($traveladvisor_opt_array);

                                        $output .= '
											<div class="form-elements">
												<div id="traveladvisor_var_infobox_theme_options' . $i . '">
												  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
													<label>' . traveladvisor_var_theme_text_srt('traveladvisor_var_icon') . '</label>
												  </div>
												  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
													' . traveladvisor_var_icomoon_icons_box($network_list[$i], "theme_options" . $i, 'traveladvisor_var_social_net_awesome') . '
												  </div>
												</div>
											</div>';

                                        $traveladvisor_opt_array = array(
                                            'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_icon_color'),
                                            'desc' => '',
                                            'hint_text' => '',
                                            'field_params' => array(
                                                'std' => isset($social_font_awesome_color[$i]) ? $social_font_awesome_color[$i] : '',
                                                'cust_id' => 'social_font_awesome_color' . $i,
                                                'cust_name' => 'traveladvisor_var_social_icon_color[]',
                                                'classes' => 'bg_color',
                                                'return' => true,
                                            ),
                                        );
                                        $output .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);

                                        $output .= '
										  </td>
										</tr>';
                                    }
                                    $i++;
                                }
                            }

                            $output .= '</tbody></table></div></div>';


                            break;
                            /////////custom_fields
                    case "tours-custom-fields":
                  
                   
                        $traveladvisor_counter++;
                        global $traveladvisor_job_cus_fields;
                    
 
                        $traveladvisor_job_cus_fields = get_option("traveladvisor_job_cus_fields");

                        $traveladvisor_fields_obj = new traveladvisor_custom_fields_options();

                        $output .= '<div class="inside-tab-content">
                                        <div class="dragitem">
                                            <div class="pb-form-buttons">
                                           
                                                    <ul>
                                                    <li>&nbsp</li>
                                                     <li style="line-height: 35px;">' . traveladvisor_var_theme_text_srt('traveladvisor_var_add_custom_field') . '</li>
                                                    <li><a ' . traveladvisor_tooltip_helptext_string(traveladvisor_var_theme_text_srt('traveladvisor_var_custom_text'), true) . ' href="javascript:traveladvisor_add_custom_field(\'traveladvisor_pb_text\')" data-type="text" data-name="custom_text"><i class="icon-file-text-o"></i></a></li>
                                                    <li><a ' . traveladvisor_tooltip_helptext_string(traveladvisor_var_theme_text_srt('traveladvisor_var_custom_textarea'), true) . ' href="javascript:traveladvisor_add_custom_field(\'traveladvisor_pb_textarea\')" data-type="textarea" data-name="custom_textarea"><i class="icon-text"></i></a></li>
                                                    <li><a ' . traveladvisor_tooltip_helptext_string(traveladvisor_var_theme_text_srt('traveladvisor_var_custom_dropdown'), true) . ' href="javascript:traveladvisor_add_custom_field(\'traveladvisor_pb_dropdown\')" data-type="select" data-name="custom_select"><i class="icon-file_download"></i></a></li>
                                                    <li><a ' . traveladvisor_tooltip_helptext_string(traveladvisor_var_theme_text_srt('traveladvisor_var_custom_date'), true) . ' href="javascript:traveladvisor_add_custom_field(\'traveladvisor_pb_date\')" data-type="date" data-name="custom_date"><i class="icon-calendar-o"></i></a></li>
                                                    <li><a ' . traveladvisor_tooltip_helptext_string(traveladvisor_var_theme_text_srt('traveladvisor_var_custom_email'), true) . ' href="javascript:traveladvisor_add_custom_field(\'traveladvisor_pb_email\')" data-type="email" data-name="custom_email"><i class="icon-envelope-o"></i></a></li>
                                                    <li><a ' . traveladvisor_tooltip_helptext_string(traveladvisor_var_theme_text_srt('traveladvisor_var_custom_url'), true) . ' href="javascript:traveladvisor_add_custom_field(\'traveladvisor_pb_url\')" data-type="url" data-name="custom_url"><i class="icon-link4"></i></a></li>
                                                    <li><a ' . traveladvisor_tooltip_helptext_string(traveladvisor_var_theme_text_srt('traveladvisor_var_custom_range'), true) . ' href="javascript:traveladvisor_add_custom_field(\'traveladvisor_pb_range\')" data-type="url" data-name="custom_range"><i class=" icon-target"></i></a></li>
                                                    </ul>
                                            </div>
                                        </div>
                                    <div id="traveladvisor_field_elements" class="cs-custom-fields">';

                                   // break;
                        $traveladvisor_count_node = time();

                        if (is_array($traveladvisor_job_cus_fields) && sizeof($traveladvisor_job_cus_fields) > 0) {
                            foreach ($traveladvisor_job_cus_fields as $f_key => $traveladvisor_field) {
                                global $traveladvisor_f_counter;
                                $traveladvisor_f_counter = $f_key;
                                if (isset($traveladvisor_field['type']) && $traveladvisor_field['type'] == "text") {
                                    $traveladvisor_count_node++;
                                    $output .= $traveladvisor_fields_obj ->traveladvisor_pb_text(1, true);
                                } else if (isset($traveladvisor_field['type']) && $traveladvisor_field['type'] == "textarea") {
                                    $traveladvisor_count_node++;
                                    $output .= $traveladvisor_fields_obj ->traveladvisor_pb_textarea(1, true);
                                } else if (isset($traveladvisor_field['type']) && $traveladvisor_field['type'] == "dropdown") {
                                    $traveladvisor_count_node++;
                                    $output .= $traveladvisor_fields_obj ->traveladvisor_pb_dropdown(1, true);
                                } else if (isset($traveladvisor_field['type']) && $traveladvisor_field['type'] == "date") {
                                    $traveladvisor_count_node++;
                                    $output .= $traveladvisor_fields_obj ->traveladvisor_pb_date(1, true);
                                } else if (isset($traveladvisor_field['type']) && $traveladvisor_field['type'] == "email") {
                                    $traveladvisor_count_node++;
                                    $output .= $traveladvisor_fields_obj ->traveladvisor_pb_email(1, true);
                                } else if (isset($traveladvisor_field['type']) && $traveladvisor_field['type'] == "url") {
                                    $traveladvisor_count_node++;
                                    $output .= $traveladvisor_fields_obj ->traveladvisor_pb_url(1, true);
                                } else if (isset($traveladvisor_field['type']) && $traveladvisor_field['type'] == "range") {
                                    $traveladvisor_count_node++;
                                    $output .= $traveladvisor_fields_obj ->traveladvisor_pb_range(1, true);
                                }
                            }
                        }

                           $output .= '</div>
                                    <script type="text/javascript">
                                        jQuery(function() {
                                                traveladvisor_custom_fields_script("traveladvisor_field_elements");
                                        });
                                        jQuery(document).ready(function($) {
                                                traveladvisor_check_fields_avail();
                                        });
                                        var counter = ' . esc_js($traveladvisor_count_node) . ';
                                        function traveladvisor_add_custom_field(action){
                                            counter++;
                                            var fields_data = "action=" + action + "&counter=" + counter;
                                            jQuery.ajax({
                                                type:"POST",
                                                url: "' . esc_js(admin_url('admin-ajax.php')) . '",
                                                data: fields_data,
                                                success:function(data){
                                                    jQuery("#traveladvisor_field_elements").append(data);
                                                }
                                            });
                                        }
                                    </script>
                                </div>';
                        break;

////////
                    }
                }
            }

            return array($output, $menu);
        }

    }

}
