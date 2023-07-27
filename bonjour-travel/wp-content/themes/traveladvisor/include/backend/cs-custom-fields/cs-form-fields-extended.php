<?php

/**
 * File Type: Form Fields
 */
if (!class_exists('traveladvisor_form_fields2')) {

    class traveladvisor_form_fields2 {

        private $counter = 0;

        public function __construct() {

            // Do something...
        }

        /**
         * @ render label
         */
        public function traveladvisor_form_text_render($params = '') {

            global $post, $pagenow, $user;

            if (isset($params) && is_array($params)) {
                extract($params);
            }
            $traveladvisor_output = '';
            $prefix_enable = 'true'; // default value of prefix add in name and id
            if (!isset($id)) {
                $id = '';
            }
            if (!isset($std)) {
                $std = '';
            }

            if (isset($prefix_on)) {
                $prefix_enable = $prefix_on;
            }

            $prefix = 'traveladvisor_'; // default prefix
            if (isset($field_prefix) && $field_prefix != '') {
                $prefix = $field_prefix;
            }
            if ($prefix_enable != true) {
                $prefix = '';
            }
            if ($pagenow == 'post.php') {
                if (isset($cus_field) && $cus_field == true) {
                    $traveladvisor_value = get_post_meta($post->ID, $id, true);
                } else {
                    $traveladvisor_value = get_post_meta($post->ID, $prefix . $id, true);
                }
            } elseif (isset($usermeta) && $usermeta == true) {
                if (isset($cus_field) && $cus_field == true) {
                    $traveladvisor_value = get_the_author_meta($id, $user->ID);
                } else {
                    if (isset($id) && $id != '') {
                        $traveladvisor_value = get_the_author_meta('traveladvisor_' . $id, $user->ID);
                    }
                }
            } else {
                $traveladvisor_value = isset($std) ? $std : '';
            }
            if (isset($traveladvisor_value) && $traveladvisor_value != '') {
                $value = $traveladvisor_value;
            } else {
                $value = $std;
            }

            if (isset($force_std) && $force_std == true) {
                $value = $std;
            }

            $traveladvisor_rand_id = time();

            if (isset($rand_id) && $rand_id != '') {
                $traveladvisor_rand_id = $rand_id;
            }

            $html_id = ' id="' . $prefix . sanitize_html_class($id) . '"';

            if (isset($cus_field) && $cus_field == true) {
                $html_name = ' name="' . $prefix . 'cus_field[' . sanitize_html_class($id) . ']"';
            } else {
                $html_name = ' name="' . $prefix . sanitize_html_class($id) . '"';
            }

            if (isset($array) && $array == true) {
                $html_id = ' id="' . $prefix . sanitize_html_class($id) . $traveladvisor_rand_id . '"';
                $html_name = ' name="' . $prefix . sanitize_html_class($id) . '_array[]"';
            }

            if (isset($cust_id) && $cust_id != '') {
                $html_id = ' id="' . $cust_id . '"';
            }

            if (isset($cust_name) && $cust_name != '') {
                $html_name = ' name="' . $cust_name . '"';
            }

            // Disabled Field
            $traveladvisor_visibilty = '';
            if (isset($active) && $active == 'in-active') {
                $traveladvisor_visibilty = 'readonly="readonly"';
            }

            $traveladvisor_required = '';
            if (isset($required) && $required == 'yes') {
                $traveladvisor_required = ' required';
            }

            $traveladvisor_classes = '';
            if (isset($classes) && $classes != '') {
                $traveladvisor_classes = ' class="' . $classes . '"';
            }
            $extra_atributes = '';
            if (isset($extra_atr) && $extra_atr != '') {
                $extra_atributes = $extra_atr;
            }

            $traveladvisor_input_type = 'text';
            if (isset($cust_type) && $cust_type != '') {
                $traveladvisor_input_type = $cust_type;
            }

            $traveladvisor_before = '';
            if (isset($before) && $before != '') {
                $traveladvisor_before = '<div class="' . $before . '">';
            }

            $traveladvisor_after = '';
            if (isset($after) && $after != '') {
                $traveladvisor_after = $after;
            }

            if ($html_id == ' id=""' || $html_id == ' id="traveladvisor_"') {
                $html_id = '';
            }

            if (isset($rang) && $rang == true && isset($min) && isset($max)) {
                $traveladvisor_output .= '<div class="cs-drag-slider" data-slider-min="' . $min . '" data-slider-max="' . $max . '" data-slider-step="1" data-slider-value="' . $value . '">';
            }
            $traveladvisor_output .= $traveladvisor_before;
            if ($value != '') {
                $traveladvisor_output .= '<input type="' . $traveladvisor_input_type . '" ' . $traveladvisor_visibilty . $traveladvisor_required . ' ' . $extra_atributes . ' ' . $traveladvisor_classes . ' ' . $html_id . $html_name . ' value="' . $value . '" />';
            } else {
                $traveladvisor_output .= '<input type="' . $traveladvisor_input_type . '" ' . $traveladvisor_visibilty . $traveladvisor_required . ' ' . $extra_atributes . ' ' . $traveladvisor_classes . ' ' . $html_id . $html_name . ' />';
            }

            $traveladvisor_output .= $traveladvisor_after;

            if (isset($return) && $return == true) {
                return traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            }
        }

        /**
         * @ render Radio field
         */
        public function traveladvisor_form_radio_render($params = '') {
            global $post, $pagenow;
            extract($params);

            $traveladvisor_output = '';

            if (!isset($id)) {
                $id = '';
            }

            $prefix_enable = 'true';    // default value of prefix add in name and id

            if (isset($prefix_on)) {
                $prefix_enable = $prefix_on;
            }

            $prefix = 'traveladvisor_';    // default prefix
            if (isset($field_prefix) && $field_prefix != '') {
                $prefix = $field_prefix;
            }
            if ($prefix_enable != true) {
                $prefix = '';
            }

            $traveladvisor_value = get_post_meta($post->ID, 'traveladvisor_' . $id, true);
            if (isset($traveladvisor_value) && $traveladvisor_value != '') {
                $value = $traveladvisor_value;
            } else {
                $value = $std;
            }

            if (isset($cus_field) && $cus_field == true) {
                $html_name = ' name="' . $prefix . 'cus_field[' . sanitize_html_class($id) . ']"';
            } else {
                $html_name = ' name="' . $prefix . sanitize_html_class($id) . '"';
            }

            if (isset($array) && $array == true) {
                $html_id = ' id="' . $prefix . sanitize_html_class($id) . $traveladvisor_rand_id . '"';
                $html_name = ' name="' . $prefix . sanitize_html_class($id) . '_array[]"';
            }

            if (isset($cust_id) && $cust_id != '') {
                $html_id = ' id="' . $cust_id . '"';
            }

            if (isset($cust_name)) {
                $html_name = ' name="' . $cust_name . '"';
            }

            $html_id = isset($html_id) ? $html_id : '';

            // Disbaled Field
            $traveladvisor_visibilty = '';
            if (isset($active) && $active == 'in-active') {
                $traveladvisor_visibilty = 'readonly="readonly"';
            }
            $traveladvisor_required = '';
            if (isset($required) && $required == 'yes') {
                $traveladvisor_required = ' required';
            }
            $traveladvisor_classes = '';
            if (isset($classes) && $classes != '') {
                $traveladvisor_classes = ' class="' . $classes . '"';
            }

            $extra_atributes = '';
            if (isset($extra_atr) && $extra_atr != '') {
                $extra_atributes = $extra_atr;
            }

            if ($html_id == ' id=""' || $html_id == ' id="traveladvisor_"') {
                $html_id = '';
            }

            $traveladvisor_output .= '<input type="radio" ' . $traveladvisor_visibilty . $traveladvisor_required . ' ' . $traveladvisor_classes . ' ' . $extra_atributes . ' ' . $html_id . $html_name . ' value="' . sanitize_text_field($value) . '" />';

            if (isset($return) && $return == true) {
                return traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            }
        }

        /**
         * @ render Radio field
         */
        public function traveladvisor_form_hidden_render($params = '') {
            global $post, $pagenow;
            extract($params);

            $traveladvisor_rand_id = time();

            if (!isset($id)) {
                $id = '';
            }
            $html_id = '';
            $html_id = ' id="traveladvisor_' . sanitize_html_class($id) . '"';
            $html_name = ' name="traveladvisor_' . sanitize_html_class($id) . '"';

            if (isset($array) && $array == true) {
                $html_name = ' name="traveladvisor_' . sanitize_html_class($id) . '_array[]"';
            }

            if (isset($cust_id) && $cust_id != '') {
                $html_id = ' id="' . $cust_id . '"';
            }

            if (isset($cust_name)) {
                $html_name = ' name="' . $cust_name . '"';
            }

            $traveladvisor_classes = '';
            if (isset($classes) && $classes != '') {
                $traveladvisor_classes = ' class="' . $classes . '"';
            }

            $extra_atributes = '';
            if (isset($extra_atr) && $extra_atr != '') {
                $extra_atributes = $extra_atr;
            }

            if ($html_id == ' id=""' || $html_id == ' id="traveladvisor_"') {
                $html_id = '';
            }

            $traveladvisor_output = '<input type="hidden" ' . $html_id . ' ' . $traveladvisor_classes . ' ' . $extra_atributes . ' ' . $html_name . ' value="' . sanitize_text_field($std) . '" />';
            if (isset($return) && $return == true) {
                return traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            }
        }

        /**
         * @ render Date field
         */
        public function traveladvisor_form_date_render($params = '') {
            global $post, $pagenow;
            extract($params);

            $traveladvisor_output = '';

            $traveladvisor_format = 'd-m-Y';
            $prefix_enable = 'true';    // default value of prefix add in name and id

            if (isset($prefix_on)) {
                $prefix_enable = $prefix_on;
            }

            $prefix = 'traveladvisor_';    // default prefix
            if (isset($field_prefix) && $field_prefix != '') {
                $prefix = $field_prefix;
            }
            if ($prefix_enable != true) {
                $prefix = '';
            }
            $traveladvisor_classes = '';
            if (isset($classes) && $classes != '') {
                $traveladvisor_classes = ' class="' . $classes . '"';
            }
            $extra_atributes = '';
            if (isset($extra_atr) && $extra_atr != '') {
                $extra_atributes = $extra_atr;
            }

            if (isset($format) && $format != '') {
                $traveladvisor_format = $format;
            }
            $traveladvisor_value = '';
            if ($pagenow == 'post.php') {
                if (isset($cus_field) && $cus_field == true) {
                    $traveladvisor_value = get_post_meta($post->ID, $id, true);
                } else {
                    $traveladvisor_value = get_post_meta($post->ID, $prefix . $id, true);
                }
                if (isset($strtotime) && $strtotime == true) {
                    $traveladvisor_value = date($traveladvisor_format, (int) $traveladvisor_value);
                }
            } elseif (isset($usermeta) && $usermeta == true) {
                if (isset($cus_field) && $cus_field == true) {
                    $traveladvisor_value = get_the_author_meta($id, $user->ID);
                } else {
                    if (isset($id) && $id != '') {
                        $traveladvisor_value = get_the_author_meta('traveladvisor_' . $id, $user->ID);
                    }
                }

                if (isset($strtotime) && $strtotime == true) {
                    $traveladvisor_value = date($traveladvisor_format, (int) $traveladvisor_value);
                }
            } else {
                if (isset($cus_field) && $cus_field == true) {
                    $traveladvisor_value = get_post_meta($post->ID, $id, true);
                } else {
                    if (isset($strtotime) && $strtotime == true) {
                        $traveladvisor_value = isset($post->ID) ? get_post_meta((int) $post->ID, 'traveladvisor_' . $id, true) : '';
                        $traveladvisor_value = date($traveladvisor_format, (int) $traveladvisor_value);
                    } else {
                        $traveladvisor_value = isset($post->ID) ? get_post_meta($post->ID, 'traveladvisor_' . $id, true) : '';
                    }
                }
            }
            if (isset($std) && $std != '') {
                $traveladvisor_value = $std;
            }
            if (isset($traveladvisor_value) && $traveladvisor_value != '') {
                $value = $traveladvisor_value;
            } else {
                $value = $std;
            }

            if (isset($force_std) && $force_std == true) {
                $value = $std;
            }


            $traveladvisor_required = '';
            if (isset($required) && $required == 'yes') {
                $traveladvisor_required = ' required';
            }
            // disable attribute
            $traveladvisor_disabled = '';
            if (isset($disabled) && $disabled == 'yes') {
                $traveladvisor_disabled = ' disabled="disabled"';
            }

            $traveladvisor_visibilty = '';
            if (isset($active) && $active == 'in-active') {
                $traveladvisor_visibilty = 'readonly="readonly"';
            }

            if (isset($force_std) && $force_std == true) {
                $value = $std;
            }

            $traveladvisor_rand_id = time();
            if (isset($rand_id) && $rand_id != '') {
                $traveladvisor_rand_id = $rand_id;
            }

            $html_id = ' id="' . $prefix . sanitize_html_class($id) . '"';
            if (isset($cus_field) && $cus_field == true) {
                $html_name = ' name="' . $prefix . 'cus_field[' . sanitize_html_class($id) . ']"';
            } else {
                $html_name = ' name="' . $prefix . sanitize_html_class($id) . '"';
            }

            $traveladvisor_piker_id = $id;
            if (isset($array) && $array == true) {
                $html_id = ' id="' . $prefix . sanitize_html_class($id) . $traveladvisor_rand_id . '"';
                $html_name = ' name="' . $prefix . sanitize_html_class($id) . '_array[]"';
                $traveladvisor_piker_id = $id . $traveladvisor_rand_id;
            }

            if ($html_id == ' id=""' || $html_id == ' id="traveladvisor_"') {
                $html_id = '';
            }

            $traveladvisor_output .= '<script>
                                jQuery(function(){
                                    jQuery("#' . $prefix . $traveladvisor_piker_id . '").datetimepicker({
                                        format:"' . $traveladvisor_format . '",
                                        timepicker:false
                                    });
                                });
                          </script>';
            $traveladvisor_output .= '<div class="input-sec">';
            $traveladvisor_output .= '<input type="text"' . $traveladvisor_visibilty . $traveladvisor_required . ' ' . $traveladvisor_disabled . ' ' . $extra_atributes . ' ' . $traveladvisor_classes . ' ' . $html_id . $html_name . '  value="' . sanitize_text_field($value) . '" />';
            $traveladvisor_output .= '</div>';

            if (isset($return) && $return == true) {
                return traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            }
        }

        /**
         * @ render Textarea field
         */
        public function traveladvisor_form_textarea_render($params = '') {
            global $post, $pagenow;
            extract($params);

            $traveladvisor_output = '';
            if (!isset($id)) {
                $id = '';
            }
            if ($pagenow == 'post.php') {
                if (isset($cus_field) && $cus_field == true) {
                    $traveladvisor_value = get_post_meta($post->ID, $id, true);
                } else {
                    $traveladvisor_value = get_post_meta($post->ID, 'traveladvisor_' . $id, true);
                }
            } elseif (isset($usermeta) && $usermeta == true) {
                if (isset($cus_field) && $cus_field == true) {
                    $traveladvisor_value = get_the_author_meta($id, $user->ID);
                } else {
                    if (isset($id) && $id != '') {
                        $traveladvisor_value = get_the_author_meta('traveladvisor_' . $id, $user->ID);
                    }
                }
            } else {
                $traveladvisor_value = $std;
            }
            //echo "==(".$traveladvisor_value.")";

            if (isset($traveladvisor_value) && $traveladvisor_value != '') {
                $value = $traveladvisor_value;
            } else {
                $value = $std;
            }

            $traveladvisor_rand_id = time();

            if (isset($force_std) && $force_std == true) {
                $value = $std;
            }

            $html_id = ' id="traveladvisor_' . sanitize_html_class($id) . '"';
            if (isset($cus_field) && $cus_field == true) {
                $html_name = ' name="traveladvisor_cus_field[' . sanitize_html_class($id) . ']"';
            } else {
                $html_name = ' name="traveladvisor_' . sanitize_html_class($id) . '"';
            }

            if (isset($array) && $array == true) {
                $html_id = ' id="traveladvisor_' . sanitize_html_class($id) . $traveladvisor_rand_id . '"';
                $html_name = ' name="traveladvisor_' . sanitize_html_class($id) . '_array[]"';
            }

            if (isset($cust_id) && $cust_id != '') {
                $html_id = ' id="' . $cust_id . '"';
            }

            if (isset($cust_name)) {
                $html_name = ' name="' . $cust_name . '"';
            }

            $traveladvisor_required = '';
            if (isset($required) && $required == 'yes') {
                $traveladvisor_required = ' required';
            }
            $traveladvisor_before = '';
            if (isset($before) && $before != '') {
                $traveladvisor_before = '<div class="' . $before . '">';
            }

            $extra_atributes = '';
            if (isset($extra_atr) && $extra_atr != '') {
                $extra_atributes = $extra_atr;
            }

            $traveladvisor_after = '';
            if (isset($after) && $after != '') {
                $traveladvisor_after = '</div>';
            }

            if ($html_id == ' id=""' || $html_id == ' id="traveladvisor_"') {
                $html_id = '';
            }

            $traveladvisor_output .= $traveladvisor_before;
            $traveladvisor_output .= ' <textarea' . $traveladvisor_required . ' ' . $extra_atributes . ' ' . $html_id . $html_name . '>' . $value . '</textarea>';
            $traveladvisor_output .= $traveladvisor_after;

            if (isset($return) && $return == true) {
                return traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            }
        }

        /**
         * @ render select field
         */
        public function traveladvisor_form_select_render($params = '') {
            global $post, $pagenow;
            extract($params);
            $prefix_enable = 'true';    // default value of prefix add in name and id
            if (!isset($id)) {
                $id = '';
            }
            $traveladvisor_output = '';

            if (isset($prefix_on)) {
                $prefix_enable = $prefix_on;
            }

            $prefix = 'traveladvisor_';    // default prefix
            if (isset($field_prefix) && $field_prefix != '') {
                $prefix = $field_prefix;
            }
            if ($prefix_enable != true) {
                $prefix = '';
            }

            $traveladvisor_onchange = '';

            if ($pagenow == 'post.php') {
                if (isset($cus_field) && $cus_field == true) {
                    $traveladvisor_value = get_post_meta($post->ID, $id, true);
                } else {
                    $traveladvisor_value = get_post_meta($post->ID, $prefix . $id, true);
                }
            } elseif (isset($usermeta) && $usermeta == true) {
                if (isset($cus_field) && $cus_field == true) {
                    $traveladvisor_value = get_the_author_meta($id, $user->ID);
                } else {
                    if (isset($id) && $id != '') {
                        $traveladvisor_value = get_the_author_meta('traveladvisor_' . $id, $user->ID);
                    }
                }
            } else {
                $traveladvisor_value = $std;
            }

            if (isset($traveladvisor_value) && $traveladvisor_value != '') {
                $value = $traveladvisor_value;
            } else {
                $value = $std;
            }

            $traveladvisor_rand_id = time();
            if (isset($rand_id) && $rand_id != '') {
                $traveladvisor_rand_id = $rand_id;
            }

            $html_wraper = ' id="wrapper_' . sanitize_html_class($id) . '"';
            $html_id = ' id="' . $prefix . sanitize_html_class($id) . '"';
            if (isset($cus_field) && $cus_field == true) {
                $html_name = ' name="' . $prefix . 'cus_field[' . sanitize_html_class($id) . ']"';
            } else {
                $html_name = ' name="' . $prefix . sanitize_html_class($id) . '"';
            }

            if (isset($array) && $array == true) {
                $html_id = ' id="' . $prefix . sanitize_html_class($id) . $traveladvisor_rand_id . '"';
                $html_name = ' name="' . $prefix . sanitize_html_class($id) . '_array[]"';
                $html_wraper = ' id="wrapper_' . sanitize_html_class($id) . $traveladvisor_rand_id . '"';
            }

            if (isset($cust_id) && $cust_id != '') {
                $html_id = ' id="' . $cust_id . '"';
            }

            if (isset($cust_name)) {
                $html_name = ' name="' . $cust_name . '"';
            }

            $traveladvisor_display = '';
            if (isset($status) && $status == 'hide') {
                $traveladvisor_display = 'style=display:none';
            }

            if (isset($onclick) && $onclick != '') {
                $traveladvisor_onchange = 'onchange="' . $onclick . '"';
            }

            $traveladvisor_visibilty = '';
            if (isset($active) && $active == 'in-active') {
                $traveladvisor_visibilty = 'readonly="readonly"';
            }
            $traveladvisor_required = '';
            if (isset($required) && $required == 'yes') {
                $traveladvisor_required = ' required';
            }
            $traveladvisor_classes = '';
            if (isset($classes) && $classes != '') {
                $traveladvisor_classes = ' class="' . $classes . '"';
            }
            $extra_atributes = '';
            if (isset($extra_atr) && $extra_atr != '') {
                $extra_atributes = $extra_atr;
            }

            if (isset($markup) && $markup != '') {
                $traveladvisor_output .= $markup;
            }

            if (isset($div_classes) && $div_classes <> "") {
                $traveladvisor_output .= '<div class="' . esc_attr($div_classes) . '">';
            }

            if ($html_id == ' id=""' || $html_id == ' id="traveladvisor_"') {
                $html_id = '';
            }

            $traveladvisor_output .= '<select ' . $traveladvisor_visibilty . ' ' . $traveladvisor_required . ' ' . $extra_atributes . ' ' . $traveladvisor_classes . ' ' . $html_id . $html_name . ' ' . $traveladvisor_onchange . ' >';
            if (isset($options_markup) && $options_markup == true) {
                $traveladvisor_output .= $options;
            } else {
                if (is_array($options)) {
                    foreach ($options as $key => $option) {
                        if (!is_array($option)) {
                            $traveladvisor_output .= '<option ' . selected($key, $value, false) . ' value="' . $key . '">' . $option . '</option>';
                        }
                    }
                }
            }
            $traveladvisor_output .= '</select>';

            if (isset($div_classes) && $div_classes <> "") {
                $traveladvisor_output .= '</div>';
            }

            if (isset($return) && $return == true) {
                return traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            }
        }

        /**
         * @ render Multi Select field
         */
        public function traveladvisor_form_multiselect_render($params = '') {
            global $post, $pagenow;
            extract($params);

            $traveladvisor_output = '';

            $prefix_enable = 'true';    // default value of prefix add in name and id
            if (isset($prefix_on)) {
                $prefix_enable = $prefix_on;
            }

            $prefix = 'traveladvisor_';    // default prefix
            if (isset($field_prefix) && $field_prefix != '') {
                $prefix = $field_prefix;
            }
            if ($prefix_enable != true) {
                $prefix = '';
            }
            $traveladvisor_onchange = '';

            if ($pagenow == 'post.php') {
                if (isset($cus_field) && $cus_field == true) {
                    $traveladvisor_value = get_post_meta($post->ID, $id, true);
                } else {
                    $traveladvisor_value = get_post_meta($post->ID, $prefix . $id, true);
                }
            } elseif (isset($usermeta) && $usermeta == true) {
                if (isset($cus_field) && $cus_field == true) {
                    $traveladvisor_value = get_the_author_meta($id, $user->ID);
                } else {
                    if (isset($id) && $id != '') {
                        $traveladvisor_value = get_the_author_meta('traveladvisor_' . $id, $user->ID);
                    }
                }
            } else {
                $traveladvisor_value = $std;
            }
            if (isset($traveladvisor_value) && $traveladvisor_value != '') {
                $value = $traveladvisor_value;
            } else {
                $value = $std;
            }
            $traveladvisor_rand_id = time();
            if (isset($rand_id) && $rand_id != '') {
                $traveladvisor_rand_id = $rand_id;
            }
            $html_wraper = '';
            if (isset($id) && $id != '') {
                $html_wraper = ' id="wrapper_' . sanitize_html_class($id) . '"';
            }
            $html_id = '';
            if (isset($id) && $id != '') {
                $html_id = ' id="' . $prefix . sanitize_html_class($id) . '"';
            }
            $html_name = '';
            if (isset($cus_field) && $cus_field == true) {
                $html_name = ' name="' . $prefix . 'cus_field[' . sanitize_html_class($id) . '][]"';
            } else {
                if (isset($id) && $id != '') {
                    $html_name = ' name="' . $prefix . sanitize_html_class($id) . '[]"';
                }
            }

            if (isset($cust_id) && $cust_id != '') {
                $html_id = ' id="' . $cust_id . '"';
            }

            if (isset($cust_name)) {
                $html_name = ' name="' . $cust_name . '"';
            }

            $traveladvisor_display = '';
            if (isset($status) && $status == 'hide') {
                $traveladvisor_display = 'style=display:none';
            }

            if (isset($onclick) && $onclick != '') {
                $traveladvisor_onchange = 'onchange="javascript:' . $onclick . '(this.value, \'' . esc_js(admin_url('admin-ajax.php')) . '\')"';
            }

            if (!is_array($value) && $value != '') {
                $value = explode(',', $value);
            }

            if (!is_array($value)) {
                $value = array();
            }

            // Disbaled Field
            $traveladvisor_visibilty = '';
            if (isset($active) && $active == 'in-active') {
                $traveladvisor_visibilty = 'readonly="readonly"';
            }
            $traveladvisor_required = '';
            if (isset($required) && $required == 'yes') {
                $traveladvisor_required = ' required';
            }
            $traveladvisor_classes = '';
            if (isset($classes) && $classes != '') {
                $traveladvisor_classes = ' class="multiple ' . $classes . '"';
            } else {
                $traveladvisor_classes = ' class="multiple"';
            }
            $extra_atributes = '';
            if (isset($extra_atr) && $extra_atr != '') {
                $extra_atributes = $extra_atr;
            }

            if ($html_id == ' id=""' || $html_id == ' id="traveladvisor_"') {
                $html_id = '';
            }

            $traveladvisor_output .= '<select' . $traveladvisor_visibilty . $traveladvisor_required . ' ' . $extra_atributes . ' ' . $traveladvisor_classes . ' ' . ' multiple ' . $html_id . $html_name . ' ' . $traveladvisor_onchange . ' style="height:110px !important;">';

            if (isset($options_markup) && $options_markup == true) {
                $traveladvisor_output .= $options;
            } else {
                foreach ($options as $key => $option) {
                    $selected = '';
                    if (in_array($key, $value)) {
                        $selected = 'selected="selected"';
                    }

                    $traveladvisor_output .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';
                }
            }
            $traveladvisor_output .= '</select>';

            if (isset($return) && $return == true) {
                return traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            }
        }

        /**
         * @ render Checkbox field
         */
        public function traveladvisor_form_checkbox_render($params = '') {
            global $post, $pagenow;
            extract($params);
            $prefix_enable = 'true';    // default value of prefix add in name and id

            $traveladvisor_output = '';

            if (isset($prefix_on)) {
                $prefix_enable = $prefix_on;
            }

            if (!isset($id)) {
                $id = '';
            }

            $prefix = 'traveladvisor_';    // default prefix
            if (isset($field_prefix) && $field_prefix != '') {
                $prefix = $field_prefix;
            }
            if ($prefix_enable != true) {
                $prefix = '';
            }
            if ($pagenow == 'post.php') {
                $traveladvisor_value = get_post_meta($post->ID, 'traveladvisor_' . $id, true);
            } elseif (isset($usermeta) && $usermeta == true) {
                if (isset($cus_field) && $cus_field == true) {
                    $traveladvisor_value = get_the_author_meta($id, $user->ID);
                } else {
                    if (isset($id) && $id != '') {
                        $traveladvisor_value = get_the_author_meta('traveladvisor_' . $id, $user->ID);
                    }
                }
            } else {
                $traveladvisor_value = $std;
            }

            if (isset($traveladvisor_value) && $traveladvisor_value != '') {
                $value = $traveladvisor_value;
            } else {
                $value = $std;
            }

            $traveladvisor_rand_id = time();

            $html_id = ' id="' . $prefix . sanitize_html_class($id) . '"';
            $btn_name = ' name="' . $prefix . sanitize_html_class($id) . '"';
            $html_name = ' name="' . $prefix . sanitize_html_class($id) . '"';

            if (isset($array) && $array == true) {
                $html_id = ' id="' . $prefix . sanitize_html_class($id) . $traveladvisor_rand_id . '"';
                $btn_name = ' name="' . $prefix . sanitize_html_class($id) . $traveladvisor_rand_id . '"';
                $html_name = ' name="' . $prefix . sanitize_html_class($id) . '_array[]"';
            }

            if (isset($cust_id) && $cust_id != '') {
                $html_id = ' id="' . $cust_id . '"';
            }

            if (isset($cust_name)) {
                $html_name = ' name="' . $cust_name . '"';
            }

            $checked = isset($value) && $value == 'on' ? ' checked="checked"' : '';
            // Disbaled Field
            $traveladvisor_visibilty = '';
            if (isset($active) && $active == 'in-active') {
                $traveladvisor_visibilty = 'readonly="readonly"';
            }
            $traveladvisor_required = '';
            if (isset($required) && $required == 'yes') {
                $traveladvisor_required = ' required';
            }
            $traveladvisor_classes = '';
            if (isset($classes) && $classes != '') {
                $traveladvisor_classes = ' class="' . $classes . '"';
            }
            $extra_atributes = '';
            if (isset($extra_atr) && $extra_atr != '') {
                $extra_atributes = $extra_atr;
            }

            if ($html_id == ' id=""' || $html_id == ' id="traveladvisor_"') {
                $html_id = '';
            }

            if (isset($simple) && $simple == true) {
                if ($value == '') {
                    $traveladvisor_output .= '<input type="checkbox" ' . $html_id . $html_name . ' ' . $traveladvisor_classes . ' ' . $checked . ' ' . $extra_atributes . ' />';
                } else {
                    $traveladvisor_output .= '<input type="checkbox" ' . $html_id . $html_name . ' ' . $traveladvisor_classes . ' ' . $checked . ' value="' . $value . '"' . $extra_atributes . ' />';
                }
            } else {
                $traveladvisor_output .= '<label class="pbwp-checkbox cs-chekbox">';
                $traveladvisor_output .= '<input type="hidden"' . $html_id . $html_name . ' value="' . sanitize_text_field($std) . '" />';
                $traveladvisor_output .= '<input type="checkbox" ' . $traveladvisor_classes . ' ' . $btn_name . $checked . ' ' . $extra_atributes . ' />';
                $traveladvisor_output .= '<span class="pbwp-box"></span>';
                $traveladvisor_output .= '</label>';
            }

            if (isset($return) && $return == true) {
                return traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            }
        }

        /**
         * @ render Checkbox With Input Field
         */
        public function traveladvisor_form_checkbox_with_field_render($params = '') {
            global $post, $pagenow;
            extract($params);
            extract($field);
            $prefix_enable = 'true';    // default value of prefix add in name and id

            if (isset($prefix_on)) {
                $prefix_enable = $prefix_on;
            }

            $prefix = 'traveladvisor_';    // default prefix
            if (isset($field_prefix) && $field_prefix != '') {
                $prefix = $field_prefix;
            }
            if ($prefix_enable != true) {
                $prefix = '';
            }

            $traveladvisor_value = get_post_meta($post->ID, $prefix . $id, true);
            if (isset($usermeta) && $usermeta == true) {
                if (isset($cus_field) && $cus_field == true) {
                    $traveladvisor_value = get_the_author_meta($id, $user->ID);
                } else {
                    if (isset($id) && $id != '') {
                        $traveladvisor_value = get_the_author_meta('traveladvisor_' . $id, $user->ID);
                    }
                }
            }
            if (isset($traveladvisor_value) && $traveladvisor_value != '') {
                $value = $traveladvisor_value;
            } else {
                $value = $std;
            }

            $traveladvisor_input_value = get_post_meta($post->ID, $prefix . $field_id, true);
            if (isset($traveladvisor_input_value) && $traveladvisor_input_value != '') {
                $input_value = $traveladvisor_input_value;
            } else {
                $input_value = $field_std;
            }

            $traveladvisor_visibilty = ''; // Disbaled Field
            if (isset($active) && $active == 'in-active') {
                $traveladvisor_visibilty = 'readonly="readonly"';
            }
            $traveladvisor_required = '';
            if (isset($required) && $required == 'yes') {
                $traveladvisor_required = ' required';
            }
            $traveladvisor_classes = '';
            if (isset($classes) && $classes != '') {
                $traveladvisor_classes = ' class="' . $classes . '"';
            }
            $extra_atributes = '';
            if (isset($extra_atr) && $extra_atr != '') {
                $extra_atributes = $extra_atr;
            }

            $traveladvisor_output .= '<label class="pbwp-checkbox">';
            $traveladvisor_output .= $this->traveladvisor_form_hidden_render(array('id' => $id, 'std' => '', 'type' => '', 'return' => 'return'));
            $traveladvisor_output .= '<input type="checkbox" ' . $traveladvisor_visibilty . $traveladvisor_required . ' ' . $extra_atributes . ' ' . $traveladvisor_classes . ' ' . ' name="' . $prefix . sanitize_html_class($id) . '" id="' . $prefix . sanitize_html_class($id) . '" value="' . sanitize_text_field('on') . '" ' . checked('on', $value, false) . ' />';
            $traveladvisor_output .= '<span class="pbwp-box"></span>';
            $traveladvisor_output .= '</label>';
            $traveladvisor_output .= '<input type="text" name="' . $prefix . sanitize_html_class($field_id) . '"  value="' . sanitize_text_field($input_value) . '">';
            $traveladvisor_output .= $this->traveladvisor_form_description($description);

            if (isset($return) && $return == true) {
                return traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            }
        }

        /**
         * @ render File Upload field
         */
        public function traveladvisor_media_url($params = '') {

            global $post, $pagenow, $traveladvisor_var_static_text;
            $strings = new traveladvisor_theme_all_strings;
            $strings->traveladvisor_short_code_strings();
            extract($params);

            $traveladvisor_output = '';

            $traveladvisor_value = isset($post->ID) ? get_post_meta($post->ID, 'traveladvisor_' . $id, true) : '';
            if (isset($usermeta) && $usermeta == true) {
                if (isset($cus_field) && $cus_field == true) {
                    $traveladvisor_value = get_the_author_meta($id, $user->ID);
                } else {
                    if (isset($dp) && $dp == true) {
                        $traveladvisor_value = get_the_author_meta($id, $user->ID);
                    } else {
                        if (isset($id) && $id != '') {
                            $traveladvisor_value = get_the_author_meta('traveladvisor_' . $id, $user->ID);
                        }
                    }
                }
            }
            if (isset($traveladvisor_value) && $traveladvisor_value != '') {
                $value = $traveladvisor_value;
            } else {
                $value = $std;
            }
            $traveladvisor_rand_id = time();
            if (isset($force_std) && $force_std == true) {
                $value = $std;
            }
            $html_id = ' id="traveladvisor_' . sanitize_html_class($id) . '"';
            $html_id_btn = ' id="traveladvisor_' . sanitize_html_class($id) . '_btn"';
            $html_name = ' name="traveladvisor_' . sanitize_html_class($id) . '"';
            if (isset($array) && $array == true) {
                $html_id = ' id="traveladvisor_' . sanitize_html_class($id) . $traveladvisor_rand_id . '"';
                $html_id_btn = ' id="traveladvisor_' . sanitize_html_class($id) . $traveladvisor_rand_id . '_btn"';
                $html_name = ' name="traveladvisor_' . sanitize_html_class($id) . '_array[]"';
            }
            $traveladvisor_output .= '<input type="text" class="cs-form-text cs-input" ' . $html_id . $html_name . ' value="' . sanitize_text_field($value) . '" />';
            $traveladvisor_output .= '<label class="cs-browse">';
            $traveladvisor_output .= '<input type="button" ' . $html_id_btn . $html_name . ' class="uploadfile left" value="' . traveladvisor_var_theme_text_srt('traveladvisor_var_browse') . '"/>';
            $traveladvisor_output .= '</label>';

            if (isset($return) && $return == true) {
                return $traveladvisor_output;
            } else {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            }
        }

        /**
         * @ render File Upload field
         */
        public function traveladvisor_form_fileupload_render($params = '') {
            global $post, $pagenow, $image_val, $traveladvisor_var_static_text;
            $strings = new traveladvisor_theme_all_strings;
            $strings->traveladvisor_short_code_strings();
            extract($params);
            $traveladvisor_output = '';
            if ($pagenow == 'post.php') {
                if (isset($dp) && $dp == true) {
                    $traveladvisor_value = get_post_meta($post->ID, $id, true);
                } else {
                    $traveladvisor_value = get_post_meta($post->ID, 'traveladvisor_' . $id, true);
                }
            } elseif (isset($usermeta) && $usermeta == true) {
                if (isset($cus_field) && $cus_field == true) {
                    $traveladvisor_value = get_the_author_meta($id, $user->ID);
                } else {
                    if (isset($dp) && $dp == true) {
                        $traveladvisor_value = get_the_author_meta($id, $user->ID);
                    } else {
                        if (isset($id) && $id != '') {
                            $traveladvisor_value = get_the_author_meta('traveladvisor_' . $id, $user->ID);
                        }
                    }
                }
            } else {
                $traveladvisor_value = $std;
            }

            if (isset($traveladvisor_value) && $traveladvisor_value != '') {
                $value = $traveladvisor_value;
                if (isset($dp) && $dp == true) {
                    $value = traveladvisor_get_img_url($traveladvisor_value, 'traveladvisor_media_5');
                } else {
                    $value = $traveladvisor_value;
                }
            } else {
                $value = $std;
            }
            if (isset($force_std) && $force_std == true) {
                $value = $std;
            }
            $btn_name = ' name="traveladvisor_' . sanitize_html_class($id) . '"';
            $html_id = ' id="traveladvisor_' . sanitize_html_class($id) . '"';
            $html_name = ' name="traveladvisor_' . sanitize_html_class($id) . '"';
            if (isset($array) && $array == true) {
                $btn_name = ' name="traveladvisor_' . sanitize_html_class($id) . $traveladvisor_random_id . '"';
                $html_id = ' id="traveladvisor_' . sanitize_html_class($id) . $traveladvisor_random_id . '"';
                $html_name = ' name="traveladvisor_' . sanitize_html_class($id) . '_array[]"';
            } else if (isset($dp) && $dp == true) {
                $html_name = ' name="' . sanitize_html_class($id) . '"';
            }
            if (isset($cust_name) && $cust_name == true) {
                $html_name = ' name="' . $cust_name . '"';
            }
            if (isset($value) && $value != '') {
                $display_btn = ' style=display:none';
            } else {
                $display_btn = ' style=display:block';
            }
            $traveladvisor_output .= '<input' . $html_id . $html_name . 'type="hidden" class="" value="' . $value . '"/>';
            $traveladvisor_output .= '<label' . $display_btn . ' class="browse-icon"><input' . $btn_name . 'type="button" class="cs-uploadMedia left" value=' . traveladvisor_var_theme_text_srt('traveladvisor_var_browse') . ' /></label>';
            if (isset($return) && $return == true) {
                return traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            }
        }

        /**
         * @ render Custom File Upload field
         */
        public function traveladvisor_form_custom_fileupload_render($params = '') {
            global $post, $pagenow, $image_val, $traveladvisor_var_static_text;
            $strings = new traveladvisor_theme_all_strings;
            $strings->traveladvisor_short_code_strings();
            extract($params);

            $traveladvisor_output = '';
            if ($pagenow == 'post.php') {

                if (isset($dp) && $dp == true) {
                    $traveladvisor_value = get_post_meta($post->ID, $id, true);
                } else {
                    $traveladvisor_value = get_post_meta($post->ID, 'traveladvisor_' . $id, true);
                }
            } elseif (isset($usermeta) && $usermeta == true) {
                if (isset($cus_field) && $cus_field == true) {
                    $traveladvisor_value = get_the_author_meta($id, $user->ID);
                } else {
                    if (isset($dp) && $dp == true) {
                        $traveladvisor_value = get_the_author_meta($id, $user->ID);
                    } else {
                        if (isset($id) && $id != '') {
                            $traveladvisor_value = get_the_author_meta('traveladvisor_' . $id, $user->ID);
                        }
                    }
                }
            } else {
                $traveladvisor_value = $std;
            }
            $imagename_only = '';
            if (isset($traveladvisor_value) && $traveladvisor_value != '') {
                $value = $traveladvisor_value;
                $imagename_only = $traveladvisor_value;
                if (isset($dp) && $dp == true) {
                    $value = traveladvisor_get_img_url($traveladvisor_value, 'traveladvisor_media_5');
                } else {
                    $value = $traveladvisor_value;
                }
            } else {
                $value = $std;
            }

            if (isset($force_std) && $force_std == true) {
                $value = $std;
            }

            $btn_name = ' name="traveladvisor_' . sanitize_html_class($id) . '_media"';
            $html_id = ' id="traveladvisor_' . sanitize_html_class($id) . '"';
            $html_name = ' name="traveladvisor_' . sanitize_html_class($id) . '"';

            if (isset($array) && $array == true) {
                $btn_name = ' name="traveladvisor_' . sanitize_html_class($id) . '_media' . $traveladvisor_random_id . '"';
                $html_id = ' id="traveladvisor_' . sanitize_html_class($id) . $traveladvisor_random_id . '"';
                $html_name = ' name="traveladvisor_' . sanitize_html_class($id) . '_array[]"';
            } else if (isset($dp) && $dp == true) {
                $html_name = ' name="' . sanitize_html_class($id) . '"';
            }

            if (isset($cust_name) && $cust_name == true) {
                $html_name = ' name="' . $cust_name . '"';
            }

            if (isset($value) && $value != '') {
                $display_btn = ' style=display:none';
            } else {
                $display_btn = ' style=display:block';
            }

            $traveladvisor_classes = '';
            if (isset($classes) && $classes != '') {
                $traveladvisor_classes = ' class="' . $classes . '"';
            }

            $traveladvisor_output .= '<input' . $html_id . $html_name . 'type="hidden" class="" value="' . $imagename_only . '"/>';

            $traveladvisor_output .= '<label' . $display_btn . ' class="browse-icon"><input' . $btn_name . 'type="file" class="' . $traveladvisor_classes . '" value=' . traveladvisor_var_theme_text_srt('traveladvisor_var_browse') . ' /></label>';

            if (isset($return) && $return == true) {
                return traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            }
        }

        /**
         * @ render cvupload Upload field
         */
        public function traveladvisor_form_cvupload_render($params = '') {
            global $post, $pagenow;
            $strings = new traveladvisor_theme_all_strings;
            $strings->traveladvisor_short_code_strings();
            extract($params);
            $traveladvisor_output = '';
            if ($pagenow == 'post.php') {
                $traveladvisor_value = get_post_meta($post->ID, 'traveladvisor_' . $id, true);
            } elseif (isset($usermeta) && $usermeta == true) {
                if (isset($cus_field) && $cus_field == true) {
                    $traveladvisor_value = get_the_author_meta($id, $user->ID);
                } else {
                    if (isset($dp) && $dp == true) {
                        $traveladvisor_value = get_the_author_meta($id, $user->ID);
                    } else {
                        if (isset($id) && $id != '') {
                            $traveladvisor_value = get_the_author_meta('traveladvisor_' . $id, $user->ID);
                        }
                    }
                }
            } else {
                $traveladvisor_value = $std;
            }
            if (isset($traveladvisor_value) && $traveladvisor_value != '') {
                $value = $traveladvisor_value;
            } else {
                $value = $std;
            }

            if (isset($value) && $value != '') {
                $display = 'style=display:block';
            } else {
                $display = 'style=display:none';
            }

            $traveladvisor_random_id = TRAVELADVISOR_FUNCTIONS()->traveladvisor_rand_id();

            $btn_name = ' name="' . sanitize_html_class($id) . '"';
            $html_id = ' id="' . sanitize_html_class($id) . '"';
            $html_name = ' name="traveladvisor_' . sanitize_html_class($id) . '"';

            if (isset($array) && $array == true) {
                $btn_name = ' name="' . sanitize_html_class($id) . $traveladvisor_random_id . '"';
                $html_id = ' id="' . sanitize_html_class($id) . $traveladvisor_random_id . '"';
                $html_name = ' name="traveladvisor_' . sanitize_html_class($id) . '_array[]"';
            }

            $traveladvisor_output .= '<input' . $html_id . $html_name . 'type="hidden" class="" value="' . $value . '"/>';
            $traveladvisor_output .= '<label class="browse-icon"><input' . $btn_name . 'type="button" class="cs-uploadMedia left" value="' . traveladvisor_var_theme_text_srt('traveladvisor_var_browse') . '" /></label>';

            $traveladvisor_output .= '<div class="page-wrap" ' . $display . ' id="traveladvisor_' . sanitize_html_class($id) . '_box">';
            $traveladvisor_output .= '<div class="gal-active">';
            $traveladvisor_output .= '<div class="dragareamain" style="padding-bottom:0px;">';
            $traveladvisor_output .= '<ul id="gal-sortable">';
            $traveladvisor_output .= '<li class="ui-state-default" id="">';
            $traveladvisor_output .= '<div class="thumb-secs" id="traveladvisor_' . sanitize_html_class($id) . '_img"> ' . basename($value);
            $traveladvisor_output .= '<div class="gal-edit-opts"><a href="javascript:del_cv_media(\'traveladvisor_' . sanitize_html_class($id) . '\', \'' . sanitize_html_class($id) . '\')" class="delete"></a> </div>';
            $traveladvisor_output .= '</div>';
            $traveladvisor_output .= '</li>';
            $traveladvisor_output .= '</ul>';
            $traveladvisor_output .= '</div>';
            $traveladvisor_output .= '</div>';
            $traveladvisor_output .= '</div>';


            if (isset($return) && $return == true) {
                return traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            }
        }

        /**
         * @ render Random String
         */
        public function traveladvisor_generate_random_string($length = 3) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $randomString;
        }

    }

    // global $traveladvisor_form_fields2;

    $traveladvisor_var_fields2_array = array('traveladvisor_form_fields2');
    $traveladvisor_var_fields2_array_return = TRAVELADVISOR_VAR_GLOBALS()->globalizing($traveladvisor_var_fields2_array);
    extract($traveladvisor_var_fields2_array_return);


    $traveladvisor_form_fields2 = new traveladvisor_form_fields2();
}