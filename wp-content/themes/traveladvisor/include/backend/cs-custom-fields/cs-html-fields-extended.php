<?php

/**
 * File Type: Form Fields
 */
if (!class_exists('traveladvisor_html_fields')) {
    class traveladvisor_html_fields extends traveladvisor_form_fields2 {
        public function __construct() {
            // Do something...
        }
        /**
         * opening field markup
         * 
         */
        public function traveladvisor_opening_field($params = '') {
            extract($params);
            $traveladvisor_output = '';
            $traveladvisor_output .= '
			<div class="form-elements">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<label>' . esc_attr($name) . '</label>';
            if (isset($hint_text) && $hint_text != '') {
                $traveladvisor_output .= traveladvisor_tooltip_helptext(esc_html($hint_text));
            }
            $traveladvisor_output .= '
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
            return $traveladvisor_output;
        }
        /**
         * full opening field markup
         * 
         */
        public function traveladvisor_full_opening_field($params = '') {
            extract($params);
            $traveladvisor_output = '';
            $traveladvisor_output .= '<div class="form-elements"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';

            return $traveladvisor_output;
        }
        /**
         * closing field markup
         * 
         */
        public function traveladvisor_closing_field($params = '') {
            extract($params);
            $traveladvisor_output = '';
            $traveladvisor_output .= '<p>' . esc_html($desc) . '</p>
			</div>';
            if (isset($split) && $split == true) {
                $traveladvisor_output .= '<div class="splitter"></div>';
            }
            $traveladvisor_output .= '</div>';

            return $traveladvisor_output;
        }
        /**
         * heading markup
         * 
         */
        public function traveladvisor_heading_render($params = '') {
            global $post;
            extract($params);
            $traveladvisor_output = '
			<div class="theme-help" id="' . sanitize_html_class($id) . '">
				<h4 style="padding-bottom:0px;">' . esc_attr($name) . '</h4>
				<div class="clear"></div>
			</div>';
            echo traveladvisor_allow_special_char($traveladvisor_output);
        }

        /**
         * heading markup
         * 
         */
        public function traveladvisor_set_heading($params = '') {
            extract($params);
            $traveladvisor_output = '';
            $traveladvisor_output .= '<li><a title="' . esc_html($name) . '" href="#"><i class="' . sanitize_html_class($fontawesome) . '"></i>
				<span class="cs-title-menu">' . esc_html($name) . '</span></a>';
            if (is_array($options) && sizeof($options) > 0) {
                $active = '';
                $traveladvisor_output .= '<ul class="sub-menu">';
                foreach ($options as $key => $value) {
                    $active = ( $key == "tab-general-page-settings" ) ? 'active' : '';
                    $traveladvisor_output .= '<li class="' . sanitize_html_class($key) . ' ' . $active . '"><a href="#' . $key . '" onClick="toggleDiv(this.hash);return false;">' . esc_html($value) . '</a></li>';
                }
                $traveladvisor_output .= '</ul>';
            }
            $traveladvisor_output .= '
			</li>';

            return $traveladvisor_output;
        }

        /**
         * main heading markup
         * 
         */
        public function traveladvisor_set_main_heading($params = '') {
            extract($params);
            $traveladvisor_output = '';
            $traveladvisor_output .= '<li><a title="' . $name . '" href="#' . $id . '" onClick="toggleDiv(this.hash);return false;"><i class="' . sanitize_html_class($fontawesome) . '"></i>
			<span class="cs-title-menu">' . esc_html($name) . '</span>
			</a>
			</li>';

            return $traveladvisor_output;
        }

        /**
         * sub heading markup
         * 
         */
        public function traveladvisor_set_sub_heading($params = '') {
            extract($params);
            $traveladvisor_output = '';
            $style = '';
            if ($counter > 1) {
                $traveladvisor_output .= '</div>';
            }
            if ($id != 'tab-general-page-settings') {
                $style = 'style="display:none;"';
            }
            $traveladvisor_output .= '<div  id="' . $id . '" ' . $style . '>';
            $traveladvisor_output .= '<div class="theme-header"><h1>' . esc_html($name) . '</h1>
			</div>';

            $traveladvisor_output .= '<div class="col2-right">';

            return $traveladvisor_output;
        }

        /**
         * announcement markup
         * 
         */
        public function traveladvisor_set_announcement($params = '') {
            extract($params);
            $traveladvisor_output = '';
            $traveladvisor_output .= '<div id="' . $id . '" class="alert alert-info fade in nomargin theme_box"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&#215;</button>
			<h4>' . esc_html($name) . '</h4>
			<p>' . esc_html($std) . '</p></div>';

            return $traveladvisor_output;
        }

        /**
         * settings col right markup
         * 
         */
        public function traveladvisor_set_col_right($params = '') {
            extract($params);
            $traveladvisor_output = '';
            $traveladvisor_output .= '
			</div><!-- end col2-right-->';
            if ((isset($col_heading) && $col_heading != '') || (isset($help_text) && $help_text <> '')) {
                $traveladvisor_output .= '<div class="col3"><h3>' . esc_html($col_heading) . '</h3><p>' . esc_html($help_text) . '</p></div>';
            }

            if (isset($echo) && $echo == true) {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                return $traveladvisor_output;
            }
        }

        /**
         * settings section markup
         * 
         */
        public function traveladvisor_set_section($params = '') {
            extract($params);
            $traveladvisor_output = '';
            if (isset($accordion) && $accordion == true) {
                if (isset($active) && $active == true) {
                    $active = '';
                } else {
                    $active = ' class="collapsed"';
                }
                $traveladvisor_output .= '<div class="panel-heading"><a' . $active . ' href="#accordion-' . esc_attr($id) . '" data-parent="#accordion-' . esc_attr($parrent_id) . '" data-toggle="collapse"><h4>' . esc_html($std) . '</h4>';
            } else {
                $traveladvisor_output .= '<div class="theme-help"><h4>' . esc_html($std) . '</h4><div class="clear"></div></div>';
            }
            if (isset($accordion) && $accordion == true) {
                $traveladvisor_output .= '</a></div>';
            }

            if (isset($echo) && $echo == true) {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                return $traveladvisor_output;
            }
        }

        /**
         * text field markup
         * 
         */
        public function traveladvisor_text_field($params = '') {
            extract($params);
            $traveladvisor_output = '';

            $traveladvisor_styles = '';
            if (isset($styles) && $styles != '') {
                $traveladvisor_styles = ' style="' . $styles . '"';
            }
            $cust_id = isset($id) ? ' id="' . $id . '"' : '';
            $extra_attr = isset($extra_att) ? ' ' . $extra_att . ' ' : '';
            $name = isset($name) ? $name : '';
            $field_params = isset($field_params) ? $field_params : '';
            $desc = isset($desc) ? $desc : '';
            $traveladvisor_output .= '<div' . $cust_id . $extra_attr . ' class="form-elements"' . $traveladvisor_styles . '><div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<label>' . esc_attr($name) . '</label>';
            if (isset($hint_text) && $hint_text != '') {
                $traveladvisor_output .= traveladvisor_tooltip_helptext(esc_html($hint_text));
            }
            $traveladvisor_output .= '</div><div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
            //echo "<pre>";print_r($field_params);echo "</pre>";
            $traveladvisor_output .= parent::traveladvisor_form_text_render($field_params);
            $traveladvisor_output .= '<p>' . esc_html($desc) . '</p>
				</div>';
            if (isset($split) && $split == true) {
                $traveladvisor_output .= '<div class="splitter"></div>';
            }
            $traveladvisor_output .= '</div>';
            if (isset($echo) && $echo == true) {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                return $traveladvisor_output;
            }
        }
        /**
         * date field markup
         * 
         */
        public function traveladvisor_date_field($params = '') {
            extract($params);
            $traveladvisor_output = '';

            $traveladvisor_styles = '';
            if (isset($styles) && $styles != '') {
                $traveladvisor_styles = ' style="' . $styles . '"';
            }
            $cust_id = isset($id) ? ' id="' . $id . '"' : '';
            $extra_attr = isset($extra_att) ? ' ' . $extra_att . ' ' : '';
            $traveladvisor_output .= '
			<div' . $cust_id . $extra_attr . ' class="form-elements"' . $traveladvisor_styles . '>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<label>' . esc_attr($name) . '</label>';
            if (isset($hint_text) && $hint_text != '') {
                $traveladvisor_output .= traveladvisor_tooltip_helptext(esc_html($hint_text));
            }
            $traveladvisor_output .= '</div><div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
            $traveladvisor_output .= parent::traveladvisor_form_date_render($field_params);
            $traveladvisor_output .= '<p>' . esc_html($desc) . '</p></div>';
            if (isset($split) && $split == true) {
                $traveladvisor_output .= '<div class="splitter"></div>';
            }
            $traveladvisor_output .= '</div>';
            if (isset($echo) && $echo == true) {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                return $traveladvisor_output;
            }
        }

        /**
         * textarea field markup
         * 
         */
        public function traveladvisor_textarea_field($params = '') {
            extract($params);
            $traveladvisor_output = '';
            $traveladvisor_styles = '';
            if (isset($styles) && $styles != '') {
                $traveladvisor_styles = ' style="' . $styles . '"';
            }
            $cust_id = isset($id) ? ' id="' . $id . '"' : '';
            $extra_attr = isset($extra_att) ? ' ' . $extra_att . ' ' : '';
            $traveladvisor_output .= '<div' . $cust_id . $extra_attr . ' class="form-elements"' . $traveladvisor_styles . '><div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><label>' . esc_attr($name) . '</label>';
            if (isset($hint_text) && $hint_text != '') {
                $traveladvisor_output .= traveladvisor_tooltip_helptext(esc_html($hint_text));
            }
            $traveladvisor_output .= '</div><div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
            $traveladvisor_output .= parent::traveladvisor_form_textarea_render($field_params);
            $traveladvisor_output .= '<p>' . esc_html($desc) . '</p>
				</div>';
            if (isset($split) && $split == true) {
                $traveladvisor_output .= '<div class="splitter"></div>';
            }
            $traveladvisor_output .= '</div>';

            if (isset($echo) && $echo == true) {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                return $traveladvisor_output;
            }
        }
        /**
         * radio field markup
         * 
         */
        public function traveladvisor_radio_field($params = '') {
            extract($params);
            $traveladvisor_output = '';
            $traveladvisor_output .= '
			<div class="input-sec">';
            $traveladvisor_output .= parent::traveladvisor_form_radio_render($field_params);
            $traveladvisor_output .= esc_html($description);
            $traveladvisor_output .= '
			</div>';
            if (isset($echo) && $echo == true) {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                return $traveladvisor_output;
            }
        }
        /**
         * select field markup
         * 
         */
        public function traveladvisor_select_field($params = '') {
            extract($params);
            $traveladvisor_output = '';
            $traveladvisor_styles = '';
            $desc = isset($desc) ? $desc : '';
            if (isset($styles) && $styles != '') {
                $traveladvisor_styles = ' style="' . $styles . '"';
            }

            $cust_id = isset($id) ? ' id="' . $id . '"' : '';
            $extra_attr = isset($extra_att) ? ' ' . $extra_att . ' ' : '';
            $traveladvisor_output .= '<div' . $cust_id . $extra_attr . ' class="form-elements"' . $traveladvisor_styles . '><div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><label>' . esc_attr($name) . '</label>';
            if (isset($hint_text) && $hint_text != '') {
                $traveladvisor_output .= traveladvisor_tooltip_helptext(esc_html($hint_text));
            }
            $traveladvisor_output .= '</div><div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
            if (isset($array) && $array == true) {
                $traveladvisor_random_id = TRAVELADVISOR_FUNCTIONS()->traveladvisor_rand_id();
                $html_id = ' id="traveladvisor_' . sanitize_html_class($id) . $traveladvisor_random_id . '"';
            }
            if (isset($multi) && $multi == true) {
                $traveladvisor_output .= parent::traveladvisor_form_multiselect_render($field_params);
            } else {
                $traveladvisor_output .= parent::traveladvisor_form_select_render($field_params);
            }
            $traveladvisor_output .= '<p>' . esc_html($desc) . '</p>
				</div>';
            if (isset($split) && $split == true) {
                $traveladvisor_output .= '<div class="splitter"></div>';
            }
            $traveladvisor_output .= '
			</div>';

            if (isset($echo) && $echo == true) {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                return $traveladvisor_output;
            }
        }
        /**
         * checkbox field markup
         * 
         */
        public function traveladvisor_checkbox_field($params = '') {
            extract($params);
            $traveladvisor_output = '';
            $traveladvisor_styles = '';
            if (isset($styles) && $styles != '') {
                $traveladvisor_styles = ' style="' . $styles . '"';
            }
            $cust_id = isset($id) ? ' id="' . $id . '"' : '';
            $extra_attr = isset($extra_att) ? ' ' . $extra_att . ' ' : '';
            $traveladvisor_output .= '
			<div' . $cust_id . $extra_attr . ' class="form-elements"' . $traveladvisor_styles . '>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<label>' . esc_attr($name) . '</label>';
            if (isset($hint_text) && $hint_text != '') {
                $traveladvisor_output .= traveladvisor_tooltip_helptext(esc_html($hint_text));
            }
            $traveladvisor_output .= '
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
            $traveladvisor_output .= parent::traveladvisor_form_checkbox_render($field_params);
            $traveladvisor_output .= '<p>' . esc_html($desc) . '</p>
				</div>';
            if (isset($split) && $split == true) {
                $traveladvisor_output .= '<div class="splitter"></div>';
            }
            $traveladvisor_output .= '
			</div>';

            if (isset($echo) && $echo == true) {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                return $traveladvisor_output;
            }
        }
        /**
         * upload media field markup
         * 
         */
        public function traveladvisor_media_url_field($params = '') {
            extract($params);
            $traveladvisor_output = '';
            $traveladvisor_output .= '<div class="form-elements"><div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><label>' . esc_attr($name) . '</label>';
            if (isset($hint_text) && $hint_text != '') {
                $traveladvisor_output .= traveladvisor_tooltip_helptext(esc_html($hint_text));
            }
            $traveladvisor_output .= '</div><div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
            $traveladvisor_output .= parent::traveladvisor_media_url($field_params);
            $traveladvisor_output .= '<p>' . esc_html($desc) . '</p>
				</div>';
            if (isset($split) && $split == true) {
                $traveladvisor_output .= '<div class="splitter"></div>';
            }
            $traveladvisor_output .= '</div>';

            if (isset($echo) && $echo == true) {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                return $traveladvisor_output;
            }
        }
        /**
         * upload file field markup
         * 
         */
        public function traveladvisor_upload_cv_file_field($params = '') {
            global $post, $pagenow, $image_val;
            extract($params);
            $std = isset($std) ? $std : '';
            if ($pagenow == 'post.php') {

                if (isset($dp) && $dp == true) {
                    $traveladvisor_value = get_post_meta($post->ID, $id, true);
                } else {
                    $traveladvisor_value = get_post_meta($post->ID, 'traveladvisor_' . $id, true);
                }
            } elseif (isset($user) && !empty($user)) {

                if (isset($dp) && $dp == true) {

                    $traveladvisor_value = get_the_author_meta($id, $user->ID);
                } else {
                    $traveladvisor_value = get_the_author_meta('traveladvisor_' . $id, $user->ID);
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
            if (isset($value) && $value != '') {
                $display = 'style=display:block';
            } else {
                $display = 'style=display:none';
            }
            $traveladvisor_random_id = '';
            $html_id = ' id="traveladvisor_' . sanitize_html_class($id) . '"';
            if (isset($array) && $array == true) {
                $traveladvisor_random_id = TRAVELADVISOR_FUNCTIONS()->traveladvisor_rand_id();
                $html_id = ' id="traveladvisor_' . sanitize_html_class($id) . $traveladvisor_random_id . '"';
            }
            $field_params['traveladvisor_random_id'] = $traveladvisor_random_id;
            $traveladvisor_output = '';
            $traveladvisor_output .= '<div class="form-elements"><div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
	    <label>' . esc_attr($name) . '</label>';
            if (isset($hint_text) && $hint_text != '') {
                $traveladvisor_output .= traveladvisor_tooltip_helptext(esc_html($hint_text));
            }
            $traveladvisor_output .= '</div><div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
            $traveladvisor_output .= parent::traveladvisor_form_cvupload_render($field_params);
            $traveladvisor_output .= '<div class="page-wrap" ' . $display . ' id="traveladvisor_' . sanitize_html_class($id) . $traveladvisor_random_id . '_box">';
            $traveladvisor_output .= '<div class="gal-active">';
            $traveladvisor_output .= '<div class="dragareamain" style="padding-bottom:0px;">';
            $traveladvisor_output .= '<ul id="gal-sortable">';
            $traveladvisor_output .= '<li class="ui-state-default" id="">';
            $traveladvisor_output .= '<div class="thumb-secs"> <img src="' . esc_url($value) . '" id="traveladvisor_' . sanitize_html_class($id) . $traveladvisor_random_id . '_img" width="100" alt="thumb-secs" />';
            $traveladvisor_output .= '<div class="gal-edit-opts"><a href="javascript:del_media(\'traveladvisor_' . sanitize_html_class($id) . $traveladvisor_random_id . '\')" class="delete"></a> </div>';
            $traveladvisor_output .= '</div>';
            $traveladvisor_output .= '</li>';
            $traveladvisor_output .= '</ul>';
            $traveladvisor_output .= '</div>';
            $traveladvisor_output .= '</div>';
            $traveladvisor_output .= '</div>';
            $traveladvisor_output .= '<p>' . esc_html($desc) . '</p>
				</div>';
            if (isset($split) && $split == true) {
                $traveladvisor_output .= '<div class="splitter"></div>';
            }
            $traveladvisor_output .= '
			</div>';
            if (isset($echo) && $echo == true) {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                return $traveladvisor_output;
            }
        }
        /**
         * upload file field markup
         * 
         */
        public function traveladvisor_upload_file_field($params = '') {
            global $post, $pagenow, $image_val;
            extract($params);
            $std = isset($std) ? $std : '';
            if ($pagenow == 'post.php') {
                if (isset($dp) && $dp == true) {
                    $traveladvisor_value = get_post_meta($post->ID, $id, true);
                } else {
                    $traveladvisor_value = get_post_meta($post->ID, 'traveladvisor_' . $id, true);
                }
            } elseif (isset($user) && !empty($user)) {
                if (isset($dp) && $dp == true) {
                    $traveladvisor_value = get_the_author_meta($id, $user->ID);
                } else {
                    $traveladvisor_value = get_the_author_meta('traveladvisor_' . $id, $user->ID);
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
            if (isset($value) && $value != '') {
                $display = 'style=display:block';
            } else {
                $display = 'style=display:none';
            }
            $traveladvisor_random_id = '';
            $html_id = ' id="traveladvisor_' . sanitize_html_class($id) . '"';
            if (isset($array) && $array == true) {
                $traveladvisor_random_id = TRAVELADVISOR_FUNCTIONS()->traveladvisor_rand_id();
                $html_id = ' id="traveladvisor_' . sanitize_html_class($id) . $traveladvisor_random_id . '"';
            }
            $field_params['traveladvisor_random_id'] = $traveladvisor_random_id;
            $traveladvisor_output = '';
            $traveladvisor_output .= '<div class="form-elements"><div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
	    <label>' . esc_attr($name) . '</label>';
            if (isset($hint_text) && $hint_text != '') {
                $traveladvisor_output .= traveladvisor_tooltip_helptext(esc_html($hint_text));
            }
            $traveladvisor_output .= '</div><div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
            $traveladvisor_output .= parent::traveladvisor_form_fileupload_render($field_params);
            $traveladvisor_output .= '<div class="page-wrap" ' . $display . ' id="traveladvisor_' . sanitize_html_class($id) . $traveladvisor_random_id . '_box">';
            $traveladvisor_output .= '<div class="gal-active">';
            $traveladvisor_output .= '<div class="dragareamain" style="padding-bottom:0px;">';
            $traveladvisor_output .= '<ul id="gal-sortable">';
            $traveladvisor_output .= '<li class="ui-state-default" id="">';
            $traveladvisor_output .= '<div class="thumb-secs"> <img src="' . esc_url($value) . '" id="traveladvisor_' . sanitize_html_class($id) . $traveladvisor_random_id . '_img" width="100" alt="thumb-secs" />';
            $traveladvisor_output .= '<div class="gal-edit-opts"><a href="javascript:del_media(\'traveladvisor_' . sanitize_html_class($id) . $traveladvisor_random_id . '\')" class="delete"></a> </div>';
            $traveladvisor_output .= '</div>';
            $traveladvisor_output .= '</li>';
            $traveladvisor_output .= '</ul>';
            $traveladvisor_output .= '</div>';
            $traveladvisor_output .= '</div>';
            $traveladvisor_output .= '</div>';
            $traveladvisor_output .= '<p>' . esc_html($desc) . '</p>
				</div>';
            if (isset($split) && $split == true) {
                $traveladvisor_output .= '<div class="splitter"></div>';
            }
            $traveladvisor_output .= '
			</div>';
            if (isset($echo) && $echo == true) {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                return $traveladvisor_output;
            }
        }
        /**
         * upload file field markup
         * 
         */
        public function traveladvisor_custom_upload_file_field($params = '') {
            global $post, $pagenow, $image_val;
            extract($params);
            $std = isset($std) ? $std : '';
            if ($pagenow == 'post.php') {
                if (isset($dp) && $dp == true) {
                    $traveladvisor_value = get_post_meta($post->ID, $id, true);
                } else {
                    $traveladvisor_value = get_post_meta($post->ID, 'traveladvisor_' . $id, true);
                }
            } elseif (isset($user) && !empty($user)) {
                if (isset($dp) && $dp == true) {
                    $traveladvisor_value = get_the_author_meta($id, $user->ID);
                } else {
                    $traveladvisor_value = get_the_author_meta('traveladvisor_' . $id, $user->ID);
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
            if (isset($value) && $value != '') {
                $display = 'style=display:block';
            } else {
                $display = 'style=display:none';
            }
            $traveladvisor_random_id = '';
            $html_id = ' id="traveladvisor_' . sanitize_html_class($id) . '"';
            if (isset($array) && $array == true) {
                $traveladvisor_random_id = TRAVELADVISOR_FUNCTIONS()->traveladvisor_rand_id();
                $html_id = ' id="traveladvisor_' . sanitize_html_class($id) . $traveladvisor_random_id . '"';
            }
            $field_params['traveladvisor_random_id'] = $traveladvisor_random_id;
            $traveladvisor_output = '';
            $traveladvisor_output .= '<div class="form-elements"><div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
	    <label>' . esc_attr($name) . '</label>';
            if (isset($hint_text) && $hint_text != '') {
                $traveladvisor_output .= traveladvisor_tooltip_helptext(esc_html($hint_text));
            }
            $traveladvisor_output .= '</div><div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
            $traveladvisor_output .= parent::traveladvisor_form_custom_fileupload_render($field_params);
            $traveladvisor_output .= '<div class="page-wrap" ' . $display . ' id="traveladvisor_' . sanitize_html_class($id) . $traveladvisor_random_id . '_box">';
            $traveladvisor_output .= '<div class="gal-active">';
            $traveladvisor_output .= '<div class="dragareamain" style="padding-bottom:0px;">';
            $traveladvisor_output .= '<ul id="gal-sortable">';
            $traveladvisor_output .= '<li class="ui-state-default" id="">';
            $traveladvisor_output .= '<div class="thumb-secs"> <img src="' . esc_url($value) . '" id="traveladvisor_' . sanitize_html_class($id) . $traveladvisor_random_id . '_img" width="100" alt="thumb-secs" />';
            $traveladvisor_output .= '<div class="gal-edit-opts"><a href="javascript:del_media(\'traveladvisor_' . sanitize_html_class($id) . $traveladvisor_random_id . '\')" class="delete"></a> </div>';
            $traveladvisor_output .= '</div>';
            $traveladvisor_output .= '</li>';
            $traveladvisor_output .= '</ul>';
            $traveladvisor_output .= '</div>';
            $traveladvisor_output .= '</div>';
            $traveladvisor_output .= '</div>';
            $traveladvisor_output .= '<p>' . esc_html($desc) . '</p>
				</div>';
            if (isset($split) && $split == true) {
                $traveladvisor_output .= '<div class="splitter"></div>';
            }
            $traveladvisor_output .= '
			</div>';
            if (isset($echo) && $echo == true) {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                return $traveladvisor_output;
            }
        }
        /**
         * select page field markup
         * 
         */
        public function traveladvisor_select_page_field($params = '') {
            extract($params);
            $traveladvisor_output = '';
            $traveladvisor_output .= '
			<div class="form-elements">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<label>' . esc_attr($name) . '</label>';
            if (isset($hint_text) && $hint_text != '') {
                $traveladvisor_output .= traveladvisor_tooltip_helptext(esc_html($hint_text));
            }
            $traveladvisor_output .= '
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<div class="select-style">';
            $traveladvisor_output .= wp_dropdown_pages($args);
            $traveladvisor_output .= '<p>' . esc_html($desc) . '</p>
					</div>
				</div>';
            if (isset($split) && $split == true) {
                $traveladvisor_output .= '<div class="splitter"></div>';
            }
            $traveladvisor_output .= '
			</div>';
            if (isset($echo) && $echo == true) {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                return $traveladvisor_output;
            }
        }
        public function traveladvisor_multi_fields($params = '') {
            extract($params);
            $traveladvisor_output = '';
            $traveladvisor_styles = '';
            if (isset($styles) && $styles != '') {
                $traveladvisor_styles = ' style="' . $styles . '"';
            }
            $cust_id = isset($id) ? ' id="' . $id . '"' : '';
            $extra_attr = isset($extra_att) ? ' ' . $extra_att . ' ' : '';
            $traveladvisor_output .= '
			<div' . $cust_id . $extra_attr . ' class="form-elements"' . $traveladvisor_styles . '>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<label>' . esc_attr($name) . '</label>';
            if (isset($hint_text) && $hint_text != '') {
                $traveladvisor_output .= traveladvisor_tooltip_helptext(esc_html($hint_text));
            }
            $traveladvisor_output .= '
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
            if (isset($fields_list) && is_array($fields_list)) {
                foreach ($fields_list as $field_array) {
                    if ($field_array['type'] == 'text') {
                        $traveladvisor_output .= parent::traveladvisor_form_text_render($field_array['field_params']);
                    } elseif ($field_array['type'] == 'hidden') {
                        $traveladvisor_output .= parent::traveladvisor_form_hidden_render($field_array['field_params']);
                    } elseif ($field_array['type'] == 'select') {
                        $traveladvisor_output .= parent::traveladvisor_form_select_render($field_array['field_params']);
                    } elseif ($field_array['type'] == 'multiselect') {
                        $traveladvisor_output .= parent::traveladvisor_form_multiselect_render($field_array['field_params']);
                    } elseif ($field_array['type'] == 'checkbox') {
                        $traveladvisor_output .= parent::traveladvisor_form_checkbox_render($field_array['field_params']);
                    } elseif ($field_array['type'] == 'radio') {
                        $traveladvisor_output .= parent::traveladvisor_form_radio_render($field_array['field_params']);
                    } elseif ($field_array['type'] == 'date') {
                        $traveladvisor_output .= parent::traveladvisor_form_radio_render($field_array['field_params']);
                    } elseif ($field_array['type'] == 'textarea') {
                        $traveladvisor_output .= parent::traveladvisor_form_textarea_render($field_array['field_params']);
                    } elseif ($field_array['type'] == 'media') {
                        $traveladvisor_output .= parent::traveladvisor_media_url($field_array['field_params']);
                    } elseif ($field_array['type'] == 'fileupload') {
                        $traveladvisor_output .= '<div class="page-wrap" ' . $display . ' id="traveladvisor_' . sanitize_html_class($id) . '_box">';
                        $traveladvisor_output .= '<div class="gal-active">';
                        $traveladvisor_output .= '<div class="dragareamain" style="padding-bottom:0px;">';
                        $traveladvisor_output .= '<ul id="gal-sortable">';
                        $traveladvisor_output .= '<li class="ui-state-default" id="">';
                        $traveladvisor_output .= '<div class="thumb-secs"> <img src="' . esc_url($value) . '" id="traveladvisor_' . sanitize_html_class($id) . '_img" width="100" alt="thumb-secs" />';
                        $traveladvisor_output .= '<div class="gal-edit-opts"><a href="javascript:del_media(\'traveladvisor_' . sanitize_html_class($id) . '\')" class="delete"></a> </div>';
                        $traveladvisor_output .= '</div>';
                        $traveladvisor_output .= '</li>';
                        $traveladvisor_output .= '</ul>';
                        $traveladvisor_output .= '</div>';
                        $traveladvisor_output .= '</div>';
                        $traveladvisor_output .= '</div>';
                        $traveladvisor_output .= parent::traveladvisor_form_fileupload_render($field_params);
                    } elseif ($field_array['type'] == 'dropdown_pages') {
                        $traveladvisor_output .= wp_dropdown_pages($args);
                    }
                }
            }
            $traveladvisor_output .= '<p>' . esc_html($desc) . '</p>
				</div>';
            if (isset($split) && $split == true) {
                $traveladvisor_output .= '<div class="splitter"></div>';
            }
            $traveladvisor_output .= '
			</div>';
            if (isset($echo) && $echo == true) {
                echo traveladvisor_allow_special_char($traveladvisor_output);
            } else {
                return $traveladvisor_output;
            }
        }
    }
    // global $traveladvisor_html_fields;
    $traveladvisor_var_fields_array = array('traveladvisor_html_fields');
    $traveladvisor_var_fields_array_return = TRAVELADVISOR_VAR_GLOBALS()->globalizing($traveladvisor_var_fields_array);
    extract($traveladvisor_var_fields_array_return);
    $traveladvisor_html_fields = new traveladvisor_html_fields();
}
