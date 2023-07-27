<?php
/**
 * Admin Functions
 *
 * @package WordPress
 * @subpackage Traveladvisor
 * @since Traveladvisor
 */
if (!function_exists('traveladvisor_var_icomoon_icons_box')) {

    function traveladvisor_var_icomoon_icons_box($icon_value = '', $id = '', $name = '') {

        global $traveladvisor_var_html_fields, $traveladvisor_var_form_fields;
        $traveladvisor_var_icomoon = '
        <script>
            jQuery(document).ready(function ($) {
                var this_icons;
                var e9_element = $(\'#e9_element_' . esc_html($id) . '\').fontIconPicker({
                    theme: \'fip-bootstrap\'
                });
                icons_load_call.always(function () {
                    this_icons = loaded_icons;
                    // Get the class prefix
                    var classPrefix = this_icons.preferences.fontPref.prefix,
                            icomoon_json_icons = [],
                            icomoon_json_search = [];
                    $.each(this_icons.icons, function (i, v) {
                            icomoon_json_icons.push(classPrefix + v.properties.name);
                            if (v.icon && v.icon.tags && v.icon.tags.length) {
                                    icomoon_json_search.push(v.properties.name + \' \' + v.icon.tags.join(\' \'));
                            } else {
                                    icomoon_json_search.push(v.properties.name);
                            }
                    });
                    // Set new fonts on fontIconPicker
                    e9_element.setIcons(icomoon_json_icons, icomoon_json_search);
                    // Show success message and disable
                    $(\'#e9_buttons_' . esc_html($id) . ' button\').removeClass(\'btn-primary\').addClass(\'btn-success\').text(\'' . __('Successfully loaded icons', 'traveladvisor') . '\').prop(\'disabled\', true);
                })
                .fail(function () {
                    // Show error message and enable
                    $(\'#e9_buttons_' . esc_html($id) . ' button\').removeClass(\'btn-primary\').addClass(\'btn-danger\').text(\'' . __('Error: Try Again?', 'traveladvisor') . '\').prop(\'disabled\', false);
                });
            });
        </script>';
        $traveladvisor_opt_array = array(
            'std' => esc_html($icon_value),
            'cust_id' => 'e9_element_' . esc_html($id),
            'cust_name' => esc_html($name) . '[]',
            'return' => true,
        );
        $traveladvisor_var_icomoon .= $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($traveladvisor_opt_array);
        $traveladvisor_var_icomoon .= '
        <span id="e9_buttons_' . esc_html($id) . '" style="display:none">
            <button autocomplete="off" type="button" class="btn btn-primary">' . __('Load from IcoMoon selection.json', 'traveladvisor') . '</button>
        </span>';

        return $traveladvisor_var_icomoon;
    }

}



if (!function_exists('traveladvisor_var_add_social_icon')) {

    function traveladvisor_var_add_social_icon() {
        
        global $traveladvisor_var_html_fields, $traveladvisor_var_form_fields;
        $traveladvisor_rand_num = rand(123456, 987654);
        $traveladvisor_html = '';
        if ($_POST['social_net_awesome']) {

            $icon_awesome = $_POST['social_net_awesome'];
        }
        $socail_network = get_option('traveladvisor_var_social_network');
        $traveladvisor_html .= '<tr id="del_' . absint($traveladvisor_rand_num) . '"><td>';
        if (isset($icon_awesome) && $icon_awesome <> '') {
            $traveladvisor_html .= '<i style="color:' . $_POST['social_font_awesome_color'] . '!important;" class="' . $_POST['social_net_awesome'] . ' icon-2x"></i>';
        } else {
            $traveladvisor_html .= '<img width="50" src="' . esc_url($_POST['social_net_icon_path']) . '">';
        }
        $traveladvisor_html .= '</td>';
        $traveladvisor_html .= '
		<td>' . esc_html($_POST['social_net_tooltip']) . '</td> 

		<td><a href="#">' . esc_url($_POST['social_net_url']) . '</a></td> 

		<td class="centr"> 
			<a class="remove-btn" onclick="javascript:return confirm(\'' . __('Are you sure! You want to delete this', 'traveladvisor') . '\')" href="javascript:social_icon_del(\'' . $traveladvisor_rand_num . '\')"><i class="icon-times"></i></a>
			<a href="javascript:traveladvisor_var_toggle(\'' . absint($traveladvisor_rand_num) . '\')"><i class="icon-edit3"></i></a>
		</td>
		</tr>';

        $traveladvisor_html .= '
		<tr id="' . absint($traveladvisor_rand_num) . '" style="display:none">
		  <td colspan="3">
			<div class="form-elements">
			  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
			  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<a onclick="traveladvisor_var_toggle(\'' . absint($traveladvisor_rand_num) . '\')"><i class="icon-times"></i></a>
			  </div>
			</div>';

        $traveladvisor_opt_array = array(
            'name' => __('Title', 'traveladvisor'),
            'desc' => '',
            'hint_text' => __('Please enter text for icon', 'traveladvisor'),
            'field_params' => array(
                'std' => isset($_POST['social_net_tooltip']) ? $_POST['social_net_tooltip'] : '',
                'cust_id' => 'social_net_tooltip' . absint($traveladvisor_rand_num),
                'cust_name' => 'traveladvisor_var_social_net_tooltip[]',
                'classes' => '',
                'return' => true,
            ),
        );
        $traveladvisor_html .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);

        $traveladvisor_opt_array = array(
            'name' => __('URL', 'traveladvisor'),
            'desc' => '',
            'hint_text' => __('Please Enter Full Url', 'traveladvisor'),
            'field_params' => array(
                'std' => isset($_POST['social_net_url']) ? $_POST['social_net_url'] : '',
                'cust_id' => 'social_net_url' . absint($traveladvisor_rand_num),
                'cust_name' => 'traveladvisor_var_social_net_url[]',
                'classes' => '',
                'return' => true,
            ),
        );
        $traveladvisor_html .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);

        $traveladvisor_opt_array = array(
            'name' => __('Icon Path', 'traveladvisor'),
            'id' => 'social_icon_path',
            'std' => isset($_POST['social_net_icon_path']) ? $_POST['social_net_icon_path'] : '',
            'desc' => '',
            'hint_text' => '',
            'prefix' => '',
            'array' => true,
            'field_params' => array(
                'std' => isset($_POST['social_net_icon_path']) ? $_POST['social_net_icon_path'] : '',
                'id' => 'social_icon_path',
                'prefix' => '',
                'array' => true,
                'return' => true,
            ),
        );

        $traveladvisor_html .= $traveladvisor_var_html_fields->traveladvisor_var_upload_file_field($traveladvisor_opt_array);

        $traveladvisor_html .= '
			<div class="form-elements" id="traveladvisor_var_infobox_networks' . absint($traveladvisor_rand_num) . '">
			  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><label>' . __('Icon', 'traveladvisor') . '</label></div>
			  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				' . traveladvisor_var_icomoon_icons_box($_POST['social_net_awesome'], "networks" . absint($traveladvisor_rand_num), 'traveladvisor_var_social_net_awesome') . '
			  </div>
			</div>';

        $traveladvisor_opt_array = array(
            'name' => __('Icon Color', 'traveladvisor'),
            'desc' => '',
            'hint_text' => '',
            'field_params' => array(
                'std' => isset($_POST['social_font_awesome_color']) ? $_POST['social_font_awesome_color'] : '',
                'cust_id' => 'social_font_awesome_color' . absint($traveladvisor_rand_num),
                'cust_name' => 'traveladvisor_var_social_icon_color[]',
                'classes' => 'bg_color',
                'return' => true,
            ),
        );
        $traveladvisor_html .= $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);

        $traveladvisor_html .= '	
		  </td>
		</tr>';

        echo force_balance_tags($traveladvisor_html);
        die;
    }

    add_action('wp_ajax_traveladvisor_var_add_social_icon', 'traveladvisor_var_add_social_icon');
}

if (!function_exists('traveladvisor_var_tooltip_helptext')) {

    function traveladvisor_var_tooltip_helptext($popover_text = '', $return_html = true) {
        $popover_link = '';
        if (isset($popover_text) && $popover_text != '') {
            $popover_link = '<a class="cs-help" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="' . esc_html($popover_text) . '"><i class="icon-help"></i></a>';
        }
        if ($return_html == true) {
            return $popover_link;
        } else {
            echo force_balance_tags($popover_link);
        }
    }

}

if (!function_exists('traveladvisor_var_custom_shortcode_decode')) {

    function traveladvisor_var_custom_shortcode_decode($sh_content = '') {
        $sh_content = str_replace(array('traveladvisor_open', 'traveladvisor_close'), array('[', ']'), $sh_content);
        return $sh_content;
    }

}
