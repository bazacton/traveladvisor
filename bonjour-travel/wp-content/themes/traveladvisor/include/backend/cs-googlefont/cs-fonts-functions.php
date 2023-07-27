<?php

/**
 * Google Fonts
 *
 * @package WordPress
 * @subpackage Traveladvisor
 * @since Traveladvisor
 */
if (!function_exists('traveladvisor_var_googlefont_list')) {

    function traveladvisor_var_googlefont_list() {

        global $fonts;
        $font_array = '';
        if (get_option('traveladvisor_var_font_list') != '' && get_option('traveladvisor_var_font_attribute') != '') {

            $font_array = get_option('traveladvisor_var_font_list');
            $font_attribute = get_option('traveladvisor_var_font_attribute');
        } else {

            $font_array = traveladvisor_var_get_google_fontlist($fonts);

            $font_attribute = traveladvisor_var_font_attribute($fonts);
            if (is_array($font_array) && count($font_array) > 0 && is_array($font_attribute) && count($font_attribute) > 0) {
                update_option('traveladvisor_var_font_list', $font_array);
                update_option('traveladvisor_var_font_attribute', $font_attribute);
            }
        }
        return $font_array;
    }

}
/*
 *  get google font array from jason
 */
if (!function_exists('traveladvisor_var_get_google_fontlist')) {

    function traveladvisor_var_get_google_fontlist($response = '') {

        global $fonts;
        $font_list = '';
        if (!empty($response)) {
            $json_fonts = json_decode($response, true);
            if ($json_fonts != '') {
                $items = isset($json_fonts['items']) ? $json_fonts['items'] : '';
                $font_list = array();
                $i = 0;
                foreach ($items as $item) {
                    $key = isset($item['family']) ? $item['family'] : '';
                    $font_list[$key] = isset($item['family']) ? $item['family'] : '';
                    $i++;
                }
            }
            return $font_list;
        }
    }

}
/**
 * @Frontend Font Printing.
 */
/*
 *  get google font array from jason 
 */
if (!function_exists('traveladvisor_var_get_google_font_attribute')) {

    function traveladvisor_var_get_google_font_attribute($response = '', $id = 'ABeeZee') {

        global $fonts;
        if (get_option('traveladvisor_var_font_attribute')) {
            $font_attribute = get_option('traveladvisor_var_font_attribute');
            if (isset($font_attribute) && $font_attribute <> '') {
                $items = isset($font_attribute[$id]) ? $font_attribute[$id] : '';
            }
        } else {
            $arrtibue_array = traveladvisor_var_font_attribute($fonts);
            $items = isset($arrtibue_array[$id]) ? $arrtibue_array[$id] : '';
        }
        return $items;
    }

}

/*
 * Get Google font attributes
 */
if (!function_exists('traveladvisor_var_get_google_font_attributes')) {

    add_action('wp_ajax_traveladvisor_var_get_google_font_attributes', 'traveladvisor_var_get_google_font_attributes');

    function traveladvisor_var_get_google_font_attributes() {

        global $fonts;
        if (isset($_POST['index']) && $_POST['index'] <> '') {
            $index = $_POST['index'];
        } else {
            $index = '';
        }
        if ($index != 'default') {
            if (get_option('traveladvisor_var_font_attribute')) {
                $font_attribute = get_option('traveladvisor_var_font_attribute');
                $items = isset($font_attribute[$index]) ? $font_attribute[$index] : '';
            } else {
                $json_fonts = json_decode($fonts, true);
                if ($json_fonts != '') {
                    $items = isset($json_fonts['items'][$index]['variants']) ? $json_fonts['items'][$index]['variants'] : '';
                }
            }
            $html = '<select class="chosen-select" id="' . $_POST['id'] . '" name="' . $_POST['id'] . '"><option value="">' . __('Select Attribute', 'traveladvisor') . '</option>';
            foreach ($items as $key => $value) {
                $html .= '<option value="' . $value . '">' . $value . '</option>';
            }
            $html .='</select>';
        } else {
            $html = '<select class="chosen-select" id="' . $_POST['id'] . '" name="' . $_POST['id'] . '"><option value="">' . __('Select Attribute', 'traveladvisor') . '</option></select>';
        }

        echo traveladvisor_allow_special_char($html, false);
        die();
    }

}

/*
 *  Start font attribute function 
 */
if (!function_exists('traveladvisor_var_font_attribute')) {

    function traveladvisor_var_font_attribute($fontarray = '') {

        global $fonts;
        if (!empty($fontarray)) {
            $json_fonts = json_decode($fontarray, true);
            $items = isset($json_fonts['items']) ? $json_fonts['items'] : '';
            $font_list = array();
            $i = 0;
            if (isset($items) && !empty($items)) {
                foreach ($items as $item) {
                    $key = isset($item['family']) ? $item['family'] : '';
                    $font_list[$key] = isset($item['variants']) ? $item['variants'] : '';
                    $i++;
                }
            }
            return $font_list;
        }
    }

}

/*
 * Set Font for Frontend 
 */
if (!function_exists('traveladvisor_var_get_font_family')) {

    function traveladvisor_var_get_font_family($font_index = 'default', $att = 'regular') {

        global $fonts, $traveladvisor_var_fonts_subsets;

        if (get_option('traveladvisor_var_font_list') <> '' && get_option('traveladvisor_var_font_attribute') <> '') {
            $font_attribute = get_option('traveladvisor_var_font_attribute');
        } else {
            $font_attribute = traveladvisor_var_font_attribute($fonts);
        }

        if ($font_index != 'default') {
            $fonts = traveladvisor_var_googlefont_list();
            $all_att = '';
            if (isset($fonts) and is_array($fonts)) {
                $name = isset($fonts[$font_index]) ? $fonts[$font_index] : '';
                $traveladvisor_var_subs = '';

                $traveladvisor_var_subsets = isset($traveladvisor_var_fonts_subsets[$font_index]) ? $traveladvisor_var_fonts_subsets[$font_index] : '';
                if (is_array($traveladvisor_var_subsets) && sizeof($traveladvisor_var_subsets) > 0) {
                    $traveladvisor_var_subs .= '&subset=';
                    $traveladvisor_var_sub_count = 1;
                    foreach ($traveladvisor_var_subsets as $sub_set) {
                        if ($traveladvisor_var_sub_count == 1) {
                            $traveladvisor_var_subs .= $sub_set;
                        } else {
                            $traveladvisor_var_subs .= ',' . $sub_set;
                        }
                        $traveladvisor_var_sub_count++;
                    }
                }
                $call_name = str_replace(' ', '_', $name);
                $name = str_replace(' ', '+', $name);
                $all_att = '';
                if (isset($font_attribute[$font_index]) && is_array($font_attribute[$font_index])) {
                    $font_att_counter = 1;
                    foreach ($font_attribute[$font_index] as $f_atts) {
                        if ($font_att_counter == 1) {
                            $all_att .= ':' . $f_atts;
                        } else {
                            $all_att .= ',' . $f_atts;
                        }
                        $font_att_counter++;
                    }
                }
                $url = add_query_arg('family', $name . $all_att . $traveladvisor_var_subs, "//fonts.googleapis.com/css");
                wp_enqueue_style('font_' . $call_name, $url, array(), '');
            }
        }
    }

}

/*
 *  Get font family Frontend.
 */
if (!function_exists('traveladvisor_var_get_font_name')) {

    function traveladvisor_var_get_font_name($font_index = 'default') {

        global $fonts;
        if ($font_index != 'default') {
            $fonts = traveladvisor_var_googlefont_list();
            if (isset($fonts) and is_array($fonts)) {
                $name = isset($fonts[$font_index]) ? $fonts[$font_index] : '';
                return $name;
            }
        } else {
            return 'default';
        }
    }

}

/*
 *  Start function for recursive array replace 
 */
if (!function_exists('recursive_array_replace')) {

    function recursive_array_replace($array) {

        global $fonts;
        if (is_array($array)) {
            $new_array = array();
            for ($i = 0; $i < sizeof($array); $i++) {
                $new_array[] = $array[$i] == 'regular' ? 'Normal' : $array[$i];
            }
        }
        return $new_array;
    }

}

/*
 *  Get font family Frontend.
 */
if (!function_exists('traveladvisor_var_get_font_att_array')) {

    function traveladvisor_var_get_font_att_array($atts = array()) {

        global $fonts;
        $atts = recursive_array_replace($atts);
        if (sizeof($atts) == 1 && is_numeric($atts[0]))
            $atts = array_merge($atts, array('Normal'));
        $r_att = '';
        foreach ($atts as $att) {
            $r_att .= $att . ' ';
        }
        return $r_att;
    }

}

/*
 *  Frontend Font Printing.
 */
if (!function_exists('traveladvisor_var_font_font_print')) {

    function traveladvisor_var_font_font_print($atts = '', $size = '12', $line_height = '20', $f_name, $imp = false) {

        global $fonts;
        $important = '';
        $html = '';
        $f_name = traveladvisor_var_get_font_name($f_name);
        if ($f_name == 'default' || $f_name == '') {
            if ($imp == true) {
                $important = ' !important';
            }
            if ($size > 0) {
                $html = 'font-size:' . $size . 'px' . $important . ';';
            }
        } else {
            if ($imp == true) {
                $important = ' !important';
            }
            $html = 'font:' . $atts . ' ' . $size . 'px' . ( $line_height != '' ? '/' . $line_height . 'px' : '' ) . ' "' . $f_name . '", sans-serif' . $important . ';';
        }
        return $html;
    }

}

/*
 *  Start load fonts functions 
 */
if (!function_exists('traveladvisor_var_load_fonts')) {

    function traveladvisor_var_load_fonts() {

        $traveladvisor_var_options = TRAVELADVISOR_VAR_GLOBALS()->theme_options();
        // font family
        $traveladvisor_var_content_font = $traveladvisor_var_options['traveladvisor_var_content_font'];
        $traveladvisor_var_content_font_att = $traveladvisor_var_options['traveladvisor_var_content_font_att'];
        $traveladvisor_var_mainmenu_font = $traveladvisor_var_options['traveladvisor_var_mainmenu_font'];
        $traveladvisor_var_mainmenu_font_att = $traveladvisor_var_options['traveladvisor_var_mainmenu_font_att'];
        $traveladvisor_var_heading1_font = $traveladvisor_var_options['traveladvisor_var_heading1_font'];
        $traveladvisor_var_heading1_font_att = $traveladvisor_var_options['traveladvisor_var_heading1_font_att'];
        $traveladvisor_var_heading2_font = $traveladvisor_var_options['traveladvisor_var_heading2_font'];
        $traveladvisor_var_heading2_font_att = $traveladvisor_var_options['traveladvisor_var_heading2_font_att'];
        $traveladvisor_var_heading3_font = $traveladvisor_var_options['traveladvisor_var_heading3_font'];
        $traveladvisor_var_heading3_font_att = $traveladvisor_var_options['traveladvisor_var_heading3_font_att'];
        $traveladvisor_var_heading4_font = $traveladvisor_var_options['traveladvisor_var_heading4_font'];
        $traveladvisor_var_heading4_font_att = $traveladvisor_var_options['traveladvisor_var_heading4_font_att'];
        $traveladvisor_var_heading5_font = $traveladvisor_var_options['traveladvisor_var_heading5_font'];
        $traveladvisor_var_heading5_font_att = $traveladvisor_var_options['traveladvisor_var_heading5_font_att'];
        $traveladvisor_var_heading6_font = $traveladvisor_var_options['traveladvisor_var_heading6_font'];
        $traveladvisor_var_heading6_font_att = $traveladvisor_var_options['traveladvisor_var_heading6_font_att'];
        $traveladvisor_var_section_title_font = $traveladvisor_var_options['traveladvisor_var_section_title_font'];
        $traveladvisor_var_section_title_font_att = $traveladvisor_var_options['traveladvisor_var_section_title_font_att'];
        $traveladvisor_var_page_title_font = $traveladvisor_var_options['traveladvisor_var_page_title_font'];
        $traveladvisor_var_page_title_font_att = $traveladvisor_var_options['traveladvisor_var_page_title_font_att'];
        $traveladvisor_var_post_title_font = $traveladvisor_var_options['traveladvisor_var_post_title_font'];
        $traveladvisor_var_post_title_font_att = $traveladvisor_var_options['traveladvisor_var_post_title_font_att'];
        $traveladvisor_var_widget_heading_font = $traveladvisor_var_options['traveladvisor_var_widget_heading_font'];
        $traveladvisor_var_widget_heading_font_att = $traveladvisor_var_options['traveladvisor_var_widget_heading_font_att'];
        $traveladvisor_var_ft_widget_heading_font = $traveladvisor_var_options['traveladvisor_var_ft_widget_heading_font'];
        $traveladvisor_var_ft_widget_heading_font_att = $traveladvisor_var_options['traveladvisor_var_ft_widget_heading_font_att'];
        if (
                ( isset($traveladvisor_var_options['traveladvisor_var_custom_font_woff']) && $traveladvisor_var_options['traveladvisor_var_custom_font_woff'] <> '' ) &&
                ( isset($traveladvisor_var_options['traveladvisor_var_custom_font_ttf']) && $traveladvisor_var_options['traveladvisor_var_custom_font_ttf'] <> '' ) &&
                ( isset($traveladvisor_var_options['traveladvisor_var_custom_font_svg']) && $traveladvisor_var_options['traveladvisor_var_custom_font_svg'] <> '' ) &&
                ( isset($traveladvisor_var_options['traveladvisor_var_custom_font_eot']) && $traveladvisor_var_options['traveladvisor_var_custom_font_eot'] <> '' )
        ):

            $custom_font = true;
        else :
            $custom_font = false;
        endif;

        if ($custom_font != true) {
            traveladvisor_var_get_font_family($traveladvisor_var_content_font, $traveladvisor_var_content_font_att);
            traveladvisor_var_get_font_family($traveladvisor_var_mainmenu_font, $traveladvisor_var_mainmenu_font_att);
            traveladvisor_var_get_font_family($traveladvisor_var_heading1_font, $traveladvisor_var_heading1_font_att);
            traveladvisor_var_get_font_family($traveladvisor_var_heading2_font, $traveladvisor_var_heading2_font_att);
            traveladvisor_var_get_font_family($traveladvisor_var_heading3_font, $traveladvisor_var_heading3_font_att);
            traveladvisor_var_get_font_family($traveladvisor_var_heading4_font, $traveladvisor_var_heading4_font_att);
            traveladvisor_var_get_font_family($traveladvisor_var_heading5_font, $traveladvisor_var_heading5_font_att);
            traveladvisor_var_get_font_family($traveladvisor_var_heading6_font, $traveladvisor_var_heading6_font_att);
            traveladvisor_var_get_font_family($traveladvisor_var_section_title_font, $traveladvisor_var_section_title_font_att);
            traveladvisor_var_get_font_family($traveladvisor_var_page_title_font, $traveladvisor_var_page_title_font_att);
            traveladvisor_var_get_font_family($traveladvisor_var_post_title_font, $traveladvisor_var_post_title_font_att);
            traveladvisor_var_get_font_family($traveladvisor_var_widget_heading_font, $traveladvisor_var_widget_heading_font_att);
            traveladvisor_var_get_font_family($traveladvisor_var_ft_widget_heading_font, $traveladvisor_var_ft_widget_heading_font_att);
        }
    }

}