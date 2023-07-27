<?php
/**
 * File Type: Plugin Functions
 */
if ( ! class_exists( 'traveladvisor_job_plugin_functions' ) ) {

	class traveladvisor_job_plugin_functions {

		// The single instance of the class
		protected static $_instance = null;

		/**
		 * Start construct Functions
		 */
		public function __construct() {
			
		}

		/**
		 * End construct Functions
		 * Start Creating  Instance of the Class Function
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		public function traveladvisor_new_modify_user_table( $column ) {
			$column['display_name'] = 'Display Name';
			$column['jobs'] = 'Jobs';
			return $column;
		}

		public function traveladvisor_login_menu_item( $items, $args ) {

			global $post, $traveladvisor_plugin_options, $traveladvisor_theme_options;
			if ( isset( $traveladvisor_plugin_options['traveladvisor_user_dashboard_switchs'] ) && $traveladvisor_plugin_options['traveladvisor_user_dashboard_switchs'] == 'on' ) {
				$traveladvisor_menu_location = isset( $traveladvisor_plugin_options['traveladvisor_menu_login_location'] ) ? $traveladvisor_plugin_options['traveladvisor_menu_login_location'] : '';
				if ( $args->theme_location == $traveladvisor_menu_location ) {
					$traveladvisor_html = '';
					$traveladvisor_user_dashboard_switchs = '';
					if ( isset( $traveladvisor_plugin_options ) && $traveladvisor_plugin_options != '' ) {
						if ( isset( $traveladvisor_plugin_options['traveladvisor_user_dashboard_switchs'] ) ) {
							$traveladvisor_user_dashboard_switchs = $traveladvisor_plugin_options['traveladvisor_user_dashboard_switchs'];
						}
					}

					$traveladvisor_emp_funs = new traveladvisor_employer_functions();
					if ( isset( $traveladvisor_user_dashboard_switchs ) and $traveladvisor_user_dashboard_switchs == "on" ) {

						if ( is_user_logged_in() ) {

							ob_start();
							$traveladvisor_emp_funs->traveladvisor_header_favorites();
							do_shortcode( '[traveladvisor_user_login register_role="contributor"] [/traveladvisor_user_login]' );
							$traveladvisor_html .= ob_get_clean();
						} else {
							ob_start();
							?>
							<div class="cs-loginsec">
								<ul class="cs-drp-dwn">
									<li><?php echo do_shortcode( '[traveladvisor_user_login register_role="contributor"] [/traveladvisor_user_login]' ) ?></li>
								</ul>
							</div>
							<?php
							$traveladvisor_html .= ob_get_clean();
						}
					} else {
						ob_start();
						echo do_shortcode( '[traveladvisor_user_login register_role="contributor"] [/traveladvisor_user_login]' );
						if ( is_user_logged_in() && ! $traveladvisor_emp_funs->is_employer() ) { // only for candidate
							if ( candidate_header_wishlist() != '' ) {

								echo ' <div class="wish-list" id="top-wishlist-content">';
								echo candidate_header_wishlist();
								echo '</div>';
							}
						}
						$traveladvisor_html .= ob_get_clean();
					}

					$items .= '<li>' . $traveladvisor_html . '</li>';
				}
			}
			return $items;
		}

		public function traveladvisor_login_header_item( $items, $args ) {

			global $post, $traveladvisor_plugin_options, $traveladvisor_theme_options;
			if ( isset( $traveladvisor_plugin_options['traveladvisor_user_dashboard_switchs'] ) && $traveladvisor_plugin_options['traveladvisor_user_dashboard_switchs'] == 'on' ) {
				$traveladvisor_menu_location = isset( $traveladvisor_plugin_options['traveladvisor_menu_login_location'] ) ? $traveladvisor_plugin_options['traveladvisor_menu_login_location'] : '';
				$traveladvisor_html = '';
				if ( $args->theme_location == $traveladvisor_menu_location ) {

					$traveladvisor_user_dashboard_switchs = '';
					if ( isset( $traveladvisor_plugin_options ) && $traveladvisor_plugin_options != '' ) {
						if ( isset( $traveladvisor_plugin_options['traveladvisor_user_dashboard_switchs'] ) ) {
							$traveladvisor_user_dashboard_switchs = $traveladvisor_plugin_options['traveladvisor_user_dashboard_switchs'];
						}
					}

					$traveladvisor_emp_funs = new traveladvisor_employer_functions();
					if ( isset( $traveladvisor_user_dashboard_switchs ) and $traveladvisor_user_dashboard_switchs == "on" ) {

						if ( is_user_logged_in() ) {

							ob_start();
							$traveladvisor_emp_funs->traveladvisor_header_favorites();
							do_shortcode( '[traveladvisor_user_login register_role="contributor"] [/traveladvisor_user_login]' );
							$traveladvisor_html .= ob_get_clean();
						} else {
							ob_start();
							?>
							<div class="cs-loginsec">
								<ul class="cs-drp-dwn">
									<li><?php echo do_shortcode( '[traveladvisor_user_login register_role="contributor"] [/traveladvisor_user_login]' ) ?></li>
								</ul>
							</div>
							<?php
							$traveladvisor_html .= ob_get_clean();
						}
					} else {
						ob_start();
						echo do_shortcode( '[traveladvisor_user_login register_role="contributor"] [/traveladvisor_user_login]' );
						if ( is_user_logged_in() && ! $traveladvisor_emp_funs->is_employer() ) { // only for candidate
							if ( candidate_header_wishlist() != '' ) {

								echo ' <div class="wish-list" id="top-wishlist-content">';
								echo candidate_header_wishlist();
								echo '</div>';
							}
						}
						$traveladvisor_html .= ob_get_clean();
					}
				}
				echo traveladvisor_allow_special_char($traveladvisor_html);
			}
			return $items;
		}

		public function traveladvisor_new_modify_user_table_row( $val, $column_name, $user_id ) {
			$user = get_userdata( $user_id );
			switch ( $column_name ) {
				case 'display_name' :
					$traveladvisor_user = get_userdata( $user_id );
					$return = $traveladvisor_user->display_name;
					break;
				case 'jobs' :
					$traveladvisor_user = get_userdata( $user_id );
					$args = array(
						'post_type' => 'jobs',
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'meta_query' => array(
							array(
								'key' => 'traveladvisor_job_username',
								'value' => $user_id,
								'compare' => '=',
							),
						),
					);

					$query = new WP_Query( $args );

					$author_posts_link = admin_url( 'edit.php?author=' . $user_id . '&post_type=jobs' );

					if ( $query->found_posts > 0 ) {
						$return = '<a href="' . $author_posts_link . '">' . $query->found_posts . '</a>';
					} else {
						$return = $query->found_posts;
					}
					break;
				default:
			}
			return $return;
		}

		/**
		 * End Creating  Instance Main Fuunctions
		 * Start Saving Post  options Function
		 */
		public function traveladvisor_save_post_option( $post_id = '' ) {
			global $post, $traveladvisor_plugin_options;
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
			}
			$data = array();
			$traveladvisor_user_cv = traveladvisor_user_cv();
			if ( isset( $traveladvisor_user_cv ) and $traveladvisor_user_cv <> '' ) {
				update_post_meta( $post_id, 'traveladvisor_candidate_cv', $traveladvisor_user_cv );
				$_POST['traveladvisor_candidate_cv'] = $traveladvisor_user_cv;
			}
			foreach ( $_POST as $key => $value ) {
				if ( strstr( $key, 'traveladvisor_' ) ) {
					if ( $key == 'traveladvisor_transaction_expiry_date' || $key == 'traveladvisor_job_expired' || $key == 'traveladvisor_job_posted' || $key == 'traveladvisor_user_last_activity_date' || $key == 'traveladvisor_user_last_activity_date' ) {
						if ( $key == 'traveladvisor_user_last_activity_date' && $value == '' || $key == 'traveladvisor_user_last_activity_date' ) {
							$value = date( 'd-m-Y H:i:s' );
						}
						$data[$key] = strtotime( $value );
						update_post_meta( $post_id, $key, strtotime( $value ) );
					} else {
						if ( $key == 'traveladvisor_cus_field' ) {
							if ( is_array( $value ) && sizeof( $value ) > 0 ) {
								foreach ( $value as $c_key => $c_val ) {
									update_post_meta( $post_id, $c_key, $c_val );
								}
							}
						} else {
							if ( $key == 'traveladvisor_job_featured' ) {
								if ( is_admin() ) {
									$data[$key] = $value;
									update_post_meta( $post_id, $key, $value );
								}
							} else {
								$data[$key] = $value;
								update_post_meta( $post_id, $key, $value );
							}
						}
					}
				}
				if ( $key == 'job_img' || $key == 'user_img' || $key == 'cover_user_img' ) {
					update_post_meta( $post_id, $key, traveladvisor_save_img_url( $value ) );
				}
			}
			update_post_meta( $post_id, 'traveladvisor_array_data', $data );
		}

		/**
		 * End Saving Post  options Function
		 * Start Insert Shortcode Function
		 */
		public function reg_shortcodes_btn() {
			global $traveladvisor_form_fields2;
			$traveladvisor_rand = rand( 2342344, 95676556 );
			$shortcode_array = array();
			$shortcode_array['cv_package'] = array(
				'name' => 'cv_package',
				'icon' => 'icon-table',
				'categories' => 'loops misc',
			);
			$shortcode_array['job_package'] = array(
				'name' => 'job_package',
				'icon' => 'icon-table',
				'categories' => 'loops misc',
			);
			$shortcode_array['job_post'] = array(
				'name' => 'job_post',
				'icon' => 'icon-table',
				'categories' => 'loops misc',
			);
			$shortcode_array['job_specialisms'] = array(
				'name' => 'job_specialisms',
				'icon' => 'icon-table',
				'categories' => 'loops misc',
			);
			$shortcode_array['jobs_search'] = array(
				'name' => 'jobs_search',
				'icon' => 'icon-table',
				'categories' => 'loops misc',
			);
			$shortcode_array['candidate'] = array(
				'name' => 'candidate',
				'icon' => 'icon-home',
				'categories' => 'loops misc',
			);
			$shortcode_array['employer'] = array(
				'name' => 'employer',
				'icon' => 'icon-home',
				'categories' => 'loops misc',
			);
			$shortcode_array['employer'] = array(
				'name' => 'employer',
				'icon' => 'icon-home',
				'categories' => 'loops misc',
			);
			$shortcode_array['jobs'] = array(
				'name' => 'jobs',
				'icon' => 'icon-home',
				'categories' => 'loops misc',
			);
			$shortcode_array['register'] = array(
				'name' => 'register',
				'icon' => 'icon-home',
				'categories' => 'loops misc',
			);

			$traveladvisor_shortcodes_list_option = '';
			$traveladvisor_shortcodes_list_option[] = "Shortcode";

			foreach ( $shortcode_array as $val ) {
				$traveladvisor_shortcodes_list_option[$val['name']] = $val['title'];
			}

			$traveladvisor_opt_array = array(
				'id' => '',
				'cust_id' => '',
				'cust_name' => "",
				'classes' => 'sc_select chosen-select select-small',
				'return' => true,
				'options' => $traveladvisor_shortcodes_list_option,
				'extra_atr' => "onchange=\"traveladvisor_shortocde_selection(this.value,'" . admin_url( 'admin-ajax.php' ) . "','composer-" . absint( $traveladvisor_rand ) . "')\"",
			);
			$traveladvisor_shortcodes_list = $traveladvisor_form_fields2->traveladvisor_form_select_render( $traveladvisor_opt_array );

			$traveladvisor_shortcodes_list .= '<span id="cs-shrtcode-loader"></span>';
			echo traveladvisor_allow_special_char( $traveladvisor_shortcodes_list );
		}

		/**
		 * End Insert Shortcode Function
		 * Start Special Characters Function
		 */
		public function traveladvisor_special_chars( $input = '' ) {
			$output = $input; // output line 
			return $output;
		}

		/**
		 * End Special Characters Function
		 * Start Regular Expression  Text Function
		 */
		public function traveladvisor_slugy_text( $str ) {
			$clean = preg_replace( "/[^a-zA-Z0-9\/_|+ -]/", '', $str );
			$clean = strtolower( trim( $clean, '_' ) );
			$clean = preg_replace( "/[\/_|+ -]+/", '_', $clean );
			return $clean;
		}

		/**
		 * End Regular Expression  Text Function
		 * Start  Creating  Random Id Function
		 */
		public function traveladvisor_rand_id() {
			$output = rand( 12345678, 98765432 );
			return $output;
		}

		/**
		 * End  Creating  Random Id Function
		 * Start Advance Deposit Function
		 */
		public function traveladvisor_percent_return( $num ) {
			if ( is_numeric( $num ) && $num > 0 && $num <= 100 ) {
				$num = $num;
			} else if ( is_numeric( $num ) && $num > 0 && $num > 100 ) {
				$num = 100;
			} else {
				$num = 0;
			}

			return $num;
		}

		/**
		 * Number Format Function
		 * Function how to get  attachment image src 
		 */
		public function traveladvisor_num_format( $num ) {
			$traveladvisor_number = number_format( ( float ) $num, 2, '.', '' );
			return $traveladvisor_number;
		}

		public function traveladvisor_attach_image_src( $attachment_id, $width, $height ) {
			$image_url = wp_get_attachment_image_src( $attachment_id, array( $width, $height ), true );
			if ( $image_url[1] == $width and $image_url[2] == $height )
				;
			else
				$image_url = wp_get_attachment_image_src( $attachment_id, "full", true );
			$parts = explode( '/uploads/', $image_url[0] );
			if ( count( $parts ) > 1 )
				return $image_url[0];
		}

		/**
		 *  End How to get first image from gallery and its image src Function
		 * Get post Id Through meta key Fundtion
		 */
		public function traveladvisor_get_post_id_by_meta_key( $key, $value ) {
			global $wpdb;
			$meta = $wpdb->get_results( "SELECT * FROM `" . $wpdb->postmeta . "` WHERE meta_key='" . $key . "' AND meta_value='" . $value . "'" );

			if ( is_array( $meta ) && ! empty( $meta ) && isset( $meta[0] ) ) {
				$meta = $meta[0];
			}
			if ( is_object( $meta ) ) {
				return $meta->post_id;
			} else {
				return false;
			}
		}

		/**
		 *  end Get post Id Through meta key Fundtion
		 * Start Show All Taxonomy(categories) Function
		 */
		public function traveladvisor_show_all_cats( $parent, $separator, $selected = "", $taxonomy ) {

			if ( $parent == "" ) {
				global $wpdb;
				$parent = 0;
			} else
				$separator .= " &ndash; ";
			$args = array(
				'parent' => $parent,
				'hide_empty' => 0,
				'taxonomy' => $taxonomy
			);
			$categories = get_categories( $args );
			?>

			<?php
			foreach ( $categories as $category ) {
				?>
				<option <?php if ( $selected == $category->slug ) echo "selected"; ?> value="<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_attr( $separator . $category->cat_name ); ?></option>
				<?php
				traveladvisor_show_all_cats( $category->term_id, $separator, $selected, $taxonomy );
			}
		}

		/**
		 *  End Show All Taxonomy(categories) Function
		 *  Start how to icomoon get
		 */
		public function traveladvisor_icomoons( $icon_value = '', $id = '', $name = '' ) {
			global $traveladvisor_form_fields2;
			ob_start();
			?>
			<script>
				jQuery(document).ready(function ($) {

					var this_icons;
					var e9_element = $('#e9_element_<?php echo esc_html( $id ) ?>').fontIconPicker({
						theme: 'fip-bootstrap'
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
								icomoon_json_search.push(v.properties.name + ' ' + v.icon.tags.join(' '));
							} else {
								icomoon_json_search.push(v.properties.name);
							}
						});
						// Set new fonts on fontIconPicker
						e9_element.setIcons(icomoon_json_icons, icomoon_json_search);
						// Show success message and disable
						$('#e9_buttons_<?php echo esc_html( $id ) ?> button').removeClass('btn-primary').addClass('btn-success').text('<?php _e( 'Successfully loaded icons', 'traveladvisor' ) ?>').prop('disabled', true);
					})
							.fail(function () {
								// Show error message and enable
								$('#e9_buttons_<?php echo esc_html( $id ) ?> button').removeClass('btn-primary').addClass('btn-danger').text('<?php _e( 'Error: Try Again?', 'traveladvisor' ) ?>').prop('disabled', false);
							});
				});
			</script>
			<?php
			$traveladvisor_opt_array = array(
				'id' => '',
				'std' => traveladvisor_allow_special_char( $icon_value ),
				'cust_id' => "e9_element_" . traveladvisor_allow_special_char( $id ),
				'cust_name' => traveladvisor_allow_special_char( $name ) . "[]",
				'return' => true,
			);

			//echo $traveladvisor_form_fields2->traveladvisor_form_text_render( $traveladvisor_opt_array );
			$html_text_render = $traveladvisor_form_fields2->traveladvisor_form_text_render( $traveladvisor_opt_array );
			echo traveladvisor_allow_special_char( $html_text_render );
			?>
			<span id="e9_buttons_<?php echo traveladvisor_allow_special_char( $id ); ?>" style="display:none">
				<button autocomplete="off" type="button" class="btn btn-primary"></button>
			</span>
			<?php
			$fontawesome = ob_get_clean();
			return $fontawesome;
		}

		/**
		 * @ render Random ID
		 * Start Get Current  user ID Function
		 *
		 */
		public static function traveladvisor_generate_random_string( $length = 3 ) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomString = '';
			for ( $i = 0; $i < $length; $i ++ ) {
				$randomString .= $characters[rand( 0, strlen( $characters ) - 1 )];
			}
			return $randomString;
		}

		public function traveladvisor_get_user_id() {
			global $current_user;
			wp_get_current_user();
			return $current_user->ID;
		}

		/**
		 * End Current get user ID Function
		 * How to create location Fields(fields) Function
		 */
		public function traveladvisor_location_fields( $user = '' ) {
			global $traveladvisor_plugin_options, $post, $traveladvisor_html_fields, $traveladvisor_form_fields2;
			$traveladvisor_map_latitude = isset( $traveladvisor_plugin_options['map_latitude'] ) ? $traveladvisor_plugin_options['map_latitude'] : '';
			$traveladvisor_map_longitude = isset( $traveladvisor_plugin_options['map_longitude'] ) ? $traveladvisor_plugin_options['map_longitude'] : '';
			$traveladvisor_map_zoom = isset( $traveladvisor_plugin_options['map_zoom'] ) ? $traveladvisor_plugin_options['map_zoom'] : '2';
			$traveladvisor_array_data = '';
			if ( isset( $user ) && ! empty( $user ) ) { // get values from usermeta
				$traveladvisor_array_data = get_the_author_meta( 'traveladvisor_array_data', $user->ID );
				if ( isset( $traveladvisor_array_data ) && ! empty( $traveladvisor_array_data ) ) {
					$traveladvisor_post_loc_city = get_the_author_meta( 'traveladvisor_post_loc_city', $user->ID );
					$traveladvisor_post_loc_country = get_the_author_meta( 'traveladvisor_post_loc_country', $user->ID );
					$traveladvisor_post_loc_latitude = get_the_author_meta( 'traveladvisor_post_loc_latitude', $user->ID );
					$traveladvisor_post_loc_longitude = get_the_author_meta( 'traveladvisor_post_loc_longitude', $user->ID );
					$traveladvisor_post_loc_zoom = get_the_author_meta( 'traveladvisor_post_loc_zoom', $user->ID );
					$traveladvisor_post_loc_address = get_the_author_meta( 'traveladvisor_post_loc_address', $user->ID );
					$traveladvisor_post_comp_address = get_the_author_meta( 'traveladvisor_post_comp_address', $user->ID );
					$traveladvisor_add_new_loc = get_the_author_meta( 'traveladvisor_add_new_loc', $user->ID );
				} else {
					$traveladvisor_post_loc_country = '';
					$traveladvisor_post_loc_region = '';
					$traveladvisor_post_loc_city = '';
					$traveladvisor_post_loc_address = '';
					$traveladvisor_post_loc_latitude = isset( $traveladvisor_plugin_options['traveladvisor_post_loc_latitude'] ) ? $traveladvisor_plugin_options['traveladvisor_post_loc_latitude'] : '';
					$traveladvisor_post_loc_longitude = isset( $traveladvisor_plugin_options['traveladvisor_post_loc_longitude'] ) ? $traveladvisor_plugin_options['traveladvisor_post_loc_longitude'] : '';
					$traveladvisor_post_loc_zoom = isset( $traveladvisor_plugin_options['traveladvisor_post_loc_zoom'] ) ? $traveladvisor_plugin_options['traveladvisor_post_loc_zoom'] : '';
					$loc_city = '';
					$loc_postcode = '';
					$loc_region = '';
					$loc_country = '';
					$event_map_switch = '';
					$event_map_heading = '';
					$traveladvisor_add_new_loc = '';
					$traveladvisor_post_comp_address = '';
				}
			} else {  // get values from postmeta
				$traveladvisor_array_data = get_post_meta( $post->ID, 'traveladvisor_array_data', true );
				if ( isset( $traveladvisor_array_data ) && ! empty( $traveladvisor_array_data ) ) {
					$traveladvisor_post_loc_city = get_post_meta( $post->ID, 'traveladvisor_post_loc_city', true );
					$traveladvisor_post_loc_country = get_post_meta( $post->ID, 'traveladvisor_post_loc_country', true );
					$traveladvisor_post_loc_latitude = get_post_meta( $post->ID, 'traveladvisor_post_loc_latitude', true );
					$traveladvisor_post_loc_longitude = get_post_meta( $post->ID, 'traveladvisor_post_loc_longitude', true );
					$traveladvisor_post_loc_zoom = get_post_meta( $post->ID, 'traveladvisor_post_loc_zoom', true );
					$traveladvisor_post_loc_address = get_post_meta( $post->ID, 'traveladvisor_post_loc_address', true );
					$traveladvisor_post_comp_address = get_post_meta( $post->ID, 'traveladvisor_post_comp_address', true );
					$traveladvisor_add_new_loc = get_post_meta( $post->ID, 'traveladvisor_add_new_loc', true );
				} else {
					$traveladvisor_post_loc_country = '';
					$traveladvisor_post_loc_region = '';
					$traveladvisor_post_loc_city = '';
					$traveladvisor_post_loc_address = '';
					$traveladvisor_post_loc_latitude = isset( $traveladvisor_plugin_options['traveladvisor_post_loc_latitude'] ) ? $traveladvisor_plugin_options['traveladvisor_post_loc_latitude'] : '';
					$traveladvisor_post_loc_longitude = isset( $traveladvisor_plugin_options['traveladvisor_post_loc_longitude'] ) ? $traveladvisor_plugin_options['traveladvisor_post_loc_longitude'] : '';
					$traveladvisor_post_loc_zoom = isset( $traveladvisor_plugin_options['traveladvisor_post_loc_zoom'] ) ? $traveladvisor_plugin_options['traveladvisor_post_loc_zoom'] : '';
					$loc_city = '';
					$loc_postcode = '';
					$loc_region = '';
					$loc_country = '';
					$event_map_switch = '';
					$event_map_heading = '';
					$traveladvisor_add_new_loc = '';
					$traveladvisor_post_comp_address = '';
				}
			}
			if ( $traveladvisor_post_loc_latitude == '' )
				$traveladvisor_post_loc_latitude = $traveladvisor_map_latitude;
			if ( $traveladvisor_post_loc_longitude == '' )
				$traveladvisor_post_loc_longitude = $traveladvisor_map_longitude;
			if ( $traveladvisor_post_loc_zoom == '' )
				$traveladvisor_post_loc_zoom = $traveladvisor_map_zoom;
			$traveladvisor_jobhunt = new wp_jobhunt();

			$traveladvisor_jobhunt->traveladvisor_location_gmap_script();
			$traveladvisor_jobhunt->traveladvisor_google_place_scripts();
			$traveladvisor_jobhunt->traveladvisor_autocomplete_scripts();

			/**
			 * How to get countries againts location Function Start
			 *
			 */
			$locations_parent_id = 0;
			$country_args = array(
				'orderby' => 'name',
				'order' => 'ASC',
				'fields' => 'all',
				'slug' => '',
				'hide_empty' => false,
				'parent' => $locations_parent_id,
			);
			$traveladvisor_location_countries = get_terms( 'traveladvisor_locations', $country_args );
			$location_countries_list = '';
			$location_states_list = '';
			$location_cities_list = '';
			$iso_code_list_main = '';
			$iso_code_list_admin = '';
			$iso_code = '';
			$iso_code_list = '';
			if ( isset( $traveladvisor_location_countries ) && ! empty( $traveladvisor_location_countries ) ) {
				$selected_iso_code = '';
				foreach ( $traveladvisor_location_countries as $key => $country ) {
					$selected = '';
					$t_id_main = $country->term_id;
					$iso_code_list_main = get_option( "iso_code_$t_id_main" );
					if ( isset( $iso_code_list_main['text'] ) ) {
						$iso_code_list_admin = $iso_code_list_main['text'];
					}
					if ( isset( $traveladvisor_post_loc_country ) && $traveladvisor_post_loc_country == $country->slug ) {
						$selected = 'selected';
						$t_id = $country->term_id;
						$iso_code_list = get_option( "iso_code_$t_id" );
						if ( isset( $iso_code_list['text'] ) ) {
							$selected_iso_code = $iso_code_list['text'];
						}
					}
					$location_countries_list .= "<option " . $selected . "  value='" . $country->slug . "' data-name='" . $iso_code_list_admin . "'>" . $country->name . "</option>";
				}
			}
			$selected_country = $traveladvisor_post_loc_country;
			$selected_city = $traveladvisor_post_loc_city;
			if ( isset( $traveladvisor_location_countries ) && ! empty( $traveladvisor_location_countries ) && isset( $traveladvisor_post_loc_country ) && ! empty( $traveladvisor_post_loc_country ) ) {
				// load all cities against state  
				$cities = '';
				$selected_spec = get_term_by( 'slug', $selected_country, 'traveladvisor_locations' );
				if ( isset( $selected_spec->term_id ) ) {
					$state_parent_id = $selected_spec->term_id;
				} else {
					$state_parent_id = '';
				}
				$states_args = array(
					'orderby' => 'name',
					'order' => 'ASC',
					'fields' => 'all',
					'slug' => '',
					'hide_empty' => false,
					'parent' => $state_parent_id,
				);
				$cities = get_terms( 'traveladvisor_locations', $states_args );
				if ( isset( $cities ) && $cities != '' && is_array( $cities ) ) {
					foreach ( $cities as $key => $city ) {
						$selected = ( $selected_city == $city->slug) ? 'selected' : '';
						$location_cities_list .= "<option " . $selected . " value='" . $city->slug . "'>" . $city->name . "</option>";
					}
				}
			}
			?>
			<fieldset class="gllpLatlonPicker"  style="width:100%; float:left;">
				<div class="page-wrap page-opts left" style="overflow:hidden; position:relative;" id="locations_wrap" data-themeurl="<?php echo wp_jobhunt::plugin_url(); ?>" data-plugin_url="<?php echo wp_jobhunt::plugin_url(); ?>" data-ajaxurl="<?php echo esc_js( admin_url( 'admin-ajax.php' ), 'traveladvisor' ); ?>" data-map_marker="<?php echo wp_jobhunt::plugin_url(); ?>/assets/images/map-marker.png">
					<div class="option-sec" style="margin-bottom:0;">
						<div class="opt-conts">

							<?php
							$output = '';
							$traveladvisor_opt_array = array(
								'desc' => '',
								'field_params' => array(
									'std' => '',
									'id' => 'loc_country',
									'cust_id' => 'loc_country',
									'cust_name' => 'traveladvisor_post_loc_country',
									'classes' => 'chosen-select form-select-country dir-map-search single-select SlectBox',
									'options_markup' => true,
									'return' => true,
								),
							);
							if ( isset( $value['contry_hint'] ) && $value['contry_hint'] != '' ) {
								$traveladvisor_opt_array['hint_text'] = $value['contry_hint'];
							}

							if ( isset( $location_countries_list ) && $location_countries_list != '' ) {
								$traveladvisor_opt_array['field_params']['options'] = '<option value=""></option>' . $location_countries_list;
							} else {
								$traveladvisor_opt_array['field_params']['options'] = '<option value=""></option>';
							}

							if ( isset( $value['split'] ) && $value['split'] <> '' ) {
								$traveladvisor_opt_array['split'] = $value['split'];
							}

							$output .= $traveladvisor_html_fields->traveladvisor_select_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'id' => 'loc_city',
								'desc' => '',
								'field_params' => array(
									'std' => '',
									'id' => 'loc_city',
									'cust_id' => 'loc_city',
									'cust_name' => 'traveladvisor_post_loc_city',
									'classes' => 'chosen-select form-select-city dir-map-search single-select',
									'markup' => '<span class="loader-cities"></span>',
									'options_markup' => true,
									'return' => true,
								),
							);
							if ( isset( $value['city_hint'] ) && $value['city_hint'] != '' ) {
								$traveladvisor_opt_array['hint_text'] = $value['city_hint'];
							}
							if ( isset( $location_cities_list ) && $location_cities_list != '' ) {
								$traveladvisor_opt_array['field_params']['options'] = '<option value=""></option>' . $location_cities_list;
							} else {
								$traveladvisor_opt_array['field_params']['options'] = '<option value=""></option>';
							}
							if ( isset( $value['split'] ) && $value['split'] <> '' ) {
								$traveladvisor_opt_array['split'] = $value['split'];
							}
							$output .= $traveladvisor_html_fields->traveladvisor_select_field( $traveladvisor_opt_array );

							$traveladvisor_opt_array = array(
								'desc' => '',
								'hint_text' => 'Enter you complete address with city, state or country.',
								'field_params' => array(
									'std' => $traveladvisor_post_comp_address,
									'id' => 'complete_address',
									'cust_id' => 'complete_address',
									'cust_name' => 'traveladvisor_post_comp_address',
									'return' => true,
								),
							);

							if ( isset( $value['address_hint'] ) && $value['address_hint'] != '' ) {
								$traveladvisor_opt_array['hint_text'] = $value['address_hint'];
							}
							if ( isset( $value['split'] ) && $value['split'] <> '' ) {
								$traveladvisor_opt_array['split'] = $value['split'];
							}

							$output .= $traveladvisor_html_fields->traveladvisor_textarea_field( $traveladvisor_opt_array );

							$output .= '<div class="theme-help" id="mailing_information">
											<h4 style="padding-bottom:0px;"></h4>
											<div class="clear"></div>
										</div>';

							$traveladvisor_opt_array = array(
								'desc' => '',
								'field_params' => array(
									'std' => $traveladvisor_post_loc_address,
									'id' => 'loc_address',
									'classes' => 'directory-search-locationa',
									'extra_atr' => 'onkeypress="traveladvisor_gl_search_map(this.value)"',
									'cust_id' => 'loc_address',
									'cust_name' => 'traveladvisor_post_loc_address',
									'return' => true,
								),
							);

							if ( isset( $value['address_hint'] ) && $value['address_hint'] != '' ) {
								$traveladvisor_opt_array['hint_text'] = $value['address_hint'];
							}
							if ( isset( $value['split'] ) && $value['split'] <> '' ) {
								$traveladvisor_opt_array['split'] = $value['split'];
							}

							$output .= $traveladvisor_html_fields->traveladvisor_text_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'id' => 'post_loc_latitude',
								'desc' => '',
								//'styles' => 'display:none;',
								'field_params' => array(
									'std' => $traveladvisor_post_loc_latitude,
									'id' => 'post_loc_latitude',
									'cust_name' => 'traveladvisor_post_loc_latitude',
									//'cust_type' => 'hidden',
									'classes' => 'gllpLatitude',
									'return' => true,
								),
							);

							if ( isset( $value['split'] ) && $value['split'] <> '' ) {
								$traveladvisor_opt_array['split'] = $value['split'];
							}

							$output .= $traveladvisor_html_fields->traveladvisor_text_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'id' => 'post_loc_longitude',
								'desc' => '',
								'field_params' => array(
									'std' => $traveladvisor_post_loc_longitude,
									'id' => 'post_loc_longitude',
									'cust_name' => 'traveladvisor_post_loc_longitude',
									'classes' => 'gllpLongitude',
									'return' => true,
								),
							);

							if ( isset( $value['split'] ) && $value['split'] <> '' ) {
								$traveladvisor_opt_array['split'] = $value['split'];
							}
							$output .= $traveladvisor_html_fields->traveladvisor_text_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => '',
								'id' => 'map_search_btn',
								'desc' => '',
								'field_params' => array(
									'id' => 'map_search_btn',
									'cust_type' => 'button',
									'classes' => 'gllpSearchButton cs-bgcolor',
									'return' => true,
								),
							);

							if ( isset( $value['split'] ) && $value['split'] <> '' ) {
								$traveladvisor_opt_array['split'] = $value['split'];
							}

							$output .= $traveladvisor_html_fields->traveladvisor_text_field( $traveladvisor_opt_array );
							$output .= $traveladvisor_html_fields->traveladvisor_full_opening_field( array() );
							$output .= '<div class="clear"></div>';

							$traveladvisor_opt_array = array(
								'id' => 'add_new_loc',
								'std' => $traveladvisor_add_new_loc,
								'cust_type' => 'hidden',
								'classes' => 'gllpSearchField',
								'return' => true,
							);

							$output .= $traveladvisor_form_fields2->traveladvisor_form_text_render( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'id' => 'post_loc_zoom',
								'std' => $traveladvisor_post_loc_zoom,
								'cust_type' => 'hidden',
								'classes' => 'gllpZoom',
								'return' => true,
							);

							$output .= $traveladvisor_form_fields2->traveladvisor_form_text_render( $traveladvisor_opt_array );
							$output .= '<div class="clear"></div><div class="cs-map-section" style="float:left; width:100%; height:100%;"><div class="gllpMap" id="cs-map-location-id"></div></div>';
							$output .= $traveladvisor_html_fields->traveladvisor_closing_field( array(
								'desc' => '',
									)
							);
							$output .= '</div></div></div></fieldset>';

							echo traveladvisor_allow_special_char( $output );
							?>

							</fieldset>
							<script type="text/javascript">
								"use strict";
								var autocomplete;
								jQuery(document).ready(function () {
									traveladvisor_load_location_ajax();
								});

								function traveladvisor_gl_search_map() {

									var vals;
									vals = jQuery('#loc_address').val();
									vals = vals + ", " + jQuery('#loc_city').val();
									vals = vals + ", " + jQuery('#loc_region').val();
									vals = vals + ", " + jQuery('#loc_country').val();
									jQuery('.gllpSearchField').val(vals);
								}

								(function ($) {
									$(function () {
			<?php $traveladvisor_jobhunt->traveladvisor_google_place_scripts() ?>
										//var autocomplete = '';
										autocomplete = new google.maps.places.Autocomplete(document.getElementById('loc_address'));
			<?php if ( isset( $selected_iso_code ) && ! empty( $selected_iso_code ) ) { ?>
											autocomplete.setComponentRestrictions({'country': '<?php echo esc_html( $selected_iso_code ); ?>'});

				<?php
			}
			?>
									});
								})(jQuery);

							</script>
							<?php
						}

						/**
						 * How to show location fields in front end
						 *
						 */
						public function traveladvisor_frontend_location_fields( $post_id = '', $field_postfix = '', $user = '' ) {

							global $traveladvisor_plugin_options, $post, $traveladvisor_html_fields, $traveladvisor_html_fields2, $traveladvisor_html_fields_frontend, $traveladvisor_form_fields2;
							$traveladvisor_map_latitude = isset( $traveladvisor_plugin_options['map_latitude'] ) ? $traveladvisor_plugin_options['map_latitude'] : '';
							$traveladvisor_map_longitude = isset( $traveladvisor_plugin_options['map_longitude'] ) ? $traveladvisor_plugin_options['map_longitude'] : '';
							$traveladvisor_map_zoom = isset( $traveladvisor_plugin_options['map_zoom'] ) ? $traveladvisor_plugin_options['map_zoom'] : '11';


							$traveladvisor_array_data = '';
							if ( isset( $user ) && ! empty( $user ) ) { // get values from usermeta
								$traveladvisor_array_data = get_the_author_meta( 'traveladvisor_array_data', $user->ID );
								if ( isset( $traveladvisor_array_data ) && ! empty( $traveladvisor_array_data ) ) {
									$traveladvisor_post_loc_city = get_the_author_meta( 'traveladvisor_post_loc_city', $user->ID );
									$traveladvisor_post_loc_country = get_the_author_meta( 'traveladvisor_post_loc_country', $user->ID );
									$traveladvisor_post_loc_latitude = get_the_author_meta( 'traveladvisor_post_loc_latitude', $user->ID );
									$traveladvisor_post_loc_longitude = get_the_author_meta( 'traveladvisor_post_loc_longitude', $user->ID );
									$traveladvisor_post_loc_zoom = get_the_author_meta( 'traveladvisor_post_loc_zoom', $user->ID );
									$traveladvisor_post_loc_address = get_the_author_meta( 'traveladvisor_post_loc_address', $user->ID );
									$traveladvisor_post_comp_address = get_the_author_meta( 'traveladvisor_post_comp_address', $user->ID );
									$traveladvisor_add_new_loc = get_the_author_meta( 'traveladvisor_add_new_loc', $user->ID );
								} else {
									$traveladvisor_post_loc_country = '';
									$traveladvisor_post_loc_region = '';
									$traveladvisor_post_loc_city = '';
									$traveladvisor_post_loc_address = '';
									$traveladvisor_post_loc_latitude = isset( $traveladvisor_plugin_options['traveladvisor_post_loc_latitude'] ) ? $traveladvisor_plugin_options['traveladvisor_post_loc_latitude'] : '';
									$traveladvisor_post_loc_longitude = isset( $traveladvisor_plugin_options['traveladvisor_post_loc_longitude'] ) ? $traveladvisor_plugin_options['traveladvisor_post_loc_longitude'] : '';
									$traveladvisor_post_loc_zoom = isset( $traveladvisor_plugin_options['traveladvisor_post_loc_zoom'] ) ? $traveladvisor_plugin_options['traveladvisor_post_loc_zoom'] : '';
									$loc_city = '';
									$loc_postcode = '';
									$loc_region = '';
									$loc_country = '';
									$event_map_switch = '';
									$event_map_heading = '';
									$traveladvisor_add_new_loc = '';
									$traveladvisor_post_comp_address = '';
								}
							} else {
								$traveladvisor_array_data = get_post_meta( $post_id, 'traveladvisor_array_data', true );
								$traveladvisor_post_loc_address = get_post_meta( $post_id, 'traveladvisor_post_loc_address', true );

								if ( isset( $traveladvisor_array_data ) && ! empty( $traveladvisor_array_data ) ) {
									$traveladvisor_post_loc_city = get_post_meta( $post_id, 'traveladvisor_post_loc_city', true );
									$traveladvisor_post_loc_country = get_post_meta( $post_id, 'traveladvisor_post_loc_country', true );
									$traveladvisor_post_loc_latitude = get_post_meta( $post_id, 'traveladvisor_post_loc_latitude', true );
									$traveladvisor_post_loc_longitude = get_post_meta( $post_id, 'traveladvisor_post_loc_longitude', true );
									$traveladvisor_post_loc_zoom = get_post_meta( $post_id, 'traveladvisor_post_loc_zoom', true );
									$traveladvisor_post_loc_address = get_post_meta( $post_id, 'traveladvisor_post_loc_address', true );
									$traveladvisor_post_comp_address = get_post_meta( $post_id, 'traveladvisor_post_comp_address', true );
									$traveladvisor_add_new_loc = get_post_meta( $post_id, 'traveladvisor_add_new_loc', true );
								} else {

									$traveladvisor_post_loc_country = '';
									$traveladvisor_post_loc_region = '';
									$traveladvisor_post_loc_city = '';
									$traveladvisor_post_loc_address = '';
									$traveladvisor_post_comp_address = '';
									$traveladvisor_post_loc_latitude = isset( $traveladvisor_plugin_options['traveladvisor_post_loc_latitude'] ) ? $traveladvisor_plugin_options['traveladvisor_post_loc_latitude'] : '';
									$traveladvisor_post_loc_longitude = isset( $traveladvisor_plugin_options['traveladvisor_post_loc_longitude'] ) ? $traveladvisor_plugin_options['traveladvisor_post_loc_longitude'] : '';
									$traveladvisor_post_loc_zoom = isset( $traveladvisor_plugin_options['traveladvisor_post_loc_zoom'] ) ? $traveladvisor_plugin_options['traveladvisor_post_loc_zoom'] : '';
									$loc_city = '';
									$loc_postcode = '';
									$loc_region = '';
									$loc_country = '';
									$event_map_switch = '';
									$event_map_heading = '';
									$traveladvisor_add_new_loc = '';
								}
							}
							if ( $traveladvisor_post_loc_latitude == '' )
								$traveladvisor_post_loc_latitude = isset( $traveladvisor_plugin_options['traveladvisor_post_loc_latitude'] ) ? $traveladvisor_plugin_options['traveladvisor_post_loc_latitude'] : '';
							if ( $traveladvisor_post_loc_longitude == '' )
								$traveladvisor_post_loc_longitude = isset( $traveladvisor_plugin_options['traveladvisor_post_loc_longitude'] ) ? $traveladvisor_plugin_options['traveladvisor_post_loc_longitude'] : '';
							if ( $traveladvisor_post_loc_zoom == '' )
								$traveladvisor_post_loc_zoom = isset( $traveladvisor_plugin_options['traveladvisor_post_loc_zoom'] ) ? $traveladvisor_plugin_options['traveladvisor_post_loc_zoom'] : '';
							$traveladvisor_jobhunt = new wp_jobhunt();
							$traveladvisor_jobhunt->traveladvisor_location_gmap_script();
							$traveladvisor_jobhunt->traveladvisor_google_place_scripts();
							$traveladvisor_jobhunt->traveladvisor_autocomplete_scripts();
							$locations_parent_id = 0;
							$country_args = array(
								'orderby' => 'name',
								'order' => 'ASC',
								'fields' => 'all',
								'slug' => '',
								'hide_empty' => false,
								'parent' => $locations_parent_id,
							);
							$traveladvisor_location_countries = get_terms( 'traveladvisor_locations', $country_args );
							$location_countries_list = '';
							$location_states_list = '';
							$location_cities_list = '';
							$iso_code_list = '';
							$iso_code_list_main = '';
							$iso_code = '';
							if ( isset( $traveladvisor_location_countries ) && ! empty( $traveladvisor_location_countries ) ) {
								$selected_iso_code = '';
								foreach ( $traveladvisor_location_countries as $key => $country ) {
									$selected = '';
									$t_id_main = $country->term_id;
									$iso_code_list_main = get_option( "iso_code_$t_id_main" );
									if ( isset( $iso_code_list_main['text'] ) ) {
										$iso_code_list_main = $iso_code_list_main['text'];
									}
									if ( isset( $traveladvisor_post_loc_country ) && $traveladvisor_post_loc_country == $country->slug ) {
										$selected = 'selected';
										$t_id = $country->term_id;
										$iso_code_list = get_option( "iso_code_$t_id" );
										if ( isset( $iso_code_list['text'] ) ) {
											$selected_iso_code = $iso_code_list['text'];
										}
									}
									$location_countries_list .= "<option " . $selected . "  value='" . $country->slug . "' data-name='" . $iso_code_list_main . "'>" . $country->name . "</option>";
								}
							}
							$selected_country = $traveladvisor_post_loc_country;
							$selected_city = $traveladvisor_post_loc_city;
							if ( isset( $traveladvisor_location_countries ) && ! empty( $traveladvisor_location_countries ) && isset( $traveladvisor_post_loc_country ) && ! empty( $traveladvisor_post_loc_country ) ) {
								// load all cities against state  
								$cities = '';
								$selected_spec = get_term_by( 'slug', $selected_country, 'traveladvisor_locations' );
								$city_parent_id = isset( $selected_spec->term_id ) ? $selected_spec->term_id : '';
								$cities_args = array(
									'orderby' => 'name',
									'order' => 'ASC',
									'fields' => 'all',
									'slug' => '',
									'hide_empty' => false,
									'parent' => $city_parent_id,
								);
								$cities = get_terms( 'traveladvisor_locations', $cities_args );
								if ( isset( $cities ) && $cities != '' && is_array( $cities ) ) {
									foreach ( $cities as $key => $city ) {
										$selected = ( $selected_city == $city->slug) ? 'selected' : '';
										$location_cities_list .= "<option " . $selected . " value='" . $city->slug . "'>" . $city->name . "</option>";
									}
								}
							}
							?>
							<fieldset style="width:100%; float:left;" id="fe_map<?php echo absint( $field_postfix ) ?>">
								<div class="page-wrap page-opts left" style=" position:relative;" id="locations_wrap" data-themeurl="<?php echo wp_jobhunt::plugin_url(); ?>" data-plugin_url="<?php echo wp_jobhunt::plugin_url(); ?>" data-ajaxurl="<?php echo esc_js( admin_url( 'admin-ajax.php' ), '' ); ?>" data-map_marker="<?php echo wp_jobhunt::plugin_url() ?>/assets/images/map-marker.png">
									<div class="option-sec" style="margin-bottom:0;">
										<div class="opt-conts">
											<div class="col-md-6">
												<label>Country</label>
												<div class="select-holder">
													<?php
													$output = '';
													$traveladvisor_opt_array = array(
														'desc' => '',
														'field_params' => array(
															'std' => '',
															'id' => 'loc_country',
															'cust_id' => 'loc_country',
															'extra_atr' => 'data-placeholder="placeholder"',
															'cust_name' => 'traveladvisor_post_loc_country',
															'classes' => 'form-control form-select-country dir-map-search single-select SlectBox chosen-select',
															'options_markup' => true,
															'return' => true,
														),
													);
													if ( isset( $value['contry_hint'] ) && $value['contry_hint'] != '' ) {
														$traveladvisor_opt_array['hint_text'] = $value['contry_hint'];
													}

													if ( isset( $location_countries_list ) && $location_countries_list != '' ) {
														$traveladvisor_opt_array['field_params']['options'] = '<option value=""></option>' . $location_countries_list;
													} else {
														$traveladvisor_opt_array['field_params']['options'] = '<option value=""></option>';
													}

													if ( isset( $value['split'] ) && $value['split'] <> '' ) {
														$traveladvisor_opt_array['split'] = $value['split'];
													}

													//echo $traveladvisor_html_fields_frontend->traveladvisor_form_select_render( $traveladvisor_opt_array );
													$html_select_field = $traveladvisor_html_fields_frontend->traveladvisor_form_select_render( $traveladvisor_opt_array );
													echo traveladvisor_allow_special_char( $html_select_field );
													?>

												</div>
											</div>
											<div class="col-md-6">
												<label>City</label>
												<div class="select-holder">

													<span class="loader-cities"></span>

													<?php
													$traveladvisor_opt_array = array(
														'name' => '',
														'id' => 'loc_city',
														'desc' => '',
														'field_params' => array(
															'std' => '',
															'id' => 'loc_city',
															'cust_id' => 'loc_city',
															'extra_atr' => 'data-placeholder="placeholder"',
															'cust_name' => 'traveladvisor_post_loc_city',
															'classes' => 'chosen-select form-control form-select-city dir-map-search single-select SlectBox',
															'options_markup' => true,
															'return' => true,
														),
													);
													if ( isset( $value['city_hint'] ) && $value['city_hint'] != '' ) {
														$traveladvisor_opt_array['hint_text'] = $value['city_hint'];
													}
													if ( isset( $location_cities_list ) && $location_cities_list != '' ) {
														$traveladvisor_opt_array['field_params']['options'] = '<option value=""></option>' . $location_cities_list;
													} else {
														$traveladvisor_opt_array['field_params']['options'] = '<option value=""></option>';
													}
													if ( isset( $value['split'] ) && $value['split'] <> '' ) {
														$traveladvisor_opt_array['split'] = $value['split'];
													}
													//echo $traveladvisor_html_fields_frontend->traveladvisor_form_select_render( $traveladvisor_opt_array );
													$html_select = $traveladvisor_html_fields_frontend->traveladvisor_form_select_render( $traveladvisor_opt_array );
													echo traveladvisor_allow_special_char( $html_select );
													?>

												</div>
											</div>
											<div class="col-md-12">
												<label></label>
												<?php
												$traveladvisor_opt_array = array(
													'std' => $traveladvisor_post_comp_address,
													'id' => 'post_comp_address',
													'cust_id' => 'traveladvisor_post_comp_address',
													'cust_name' => 'traveladvisor_post_comp_address',
													'extra_atr' => ' placeholder="placeholder"',
													'return' => false,
												);

												$traveladvisor_form_fields2->traveladvisor_form_textarea_render( $traveladvisor_opt_array );
												?>
												<!--<textarea name="traveladvisor_post_comp_address" id="traveladvisor_post_comp_address"><?php echo esc_html( $traveladvisor_post_comp_address ) ?></textarea>-->
											</div>
											<div class="col-md-6">
												<label></label>
												<?php
												$traveladvisor_opt_array = array(
													'name' => '',
													'desc' => '',
													'field_params' => array(
														'std' => $traveladvisor_post_loc_address,
														'id' => 'loc_address',
														'classes' => 'form-control directory-search-location',
														'extra_atr' => 'onkeypress="traveladvisor_fe_search_map(this.value)" placeholder="placeholder"',
														'cust_id' => 'loc_address',
														'cust_name' => 'traveladvisor_post_loc_address',
														'return' => true,
													),
												);
												if ( isset( $value['address_hint'] ) && $value['address_hint'] != '' ) {
													$traveladvisor_opt_array['hint_text'] = $value['address_hint'];
												}
												if ( isset( $value['split'] ) && $value['split'] <> '' ) {
													$traveladvisor_opt_array['split'] = $value['split'];
												}
												//echo $traveladvisor_html_fields_frontend->traveladvisor_form_text_render( $traveladvisor_opt_array );
												$html_text_render = $traveladvisor_form_fields2->traveladvisor_form_text_render( $traveladvisor_opt_array );
												echo traveladvisor_allow_special_char( $html_text_render );
												?>

											</div>
											<div class="col-md-6">
												<label></label>
												<?php
												$traveladvisor_opt_array = array(
													'id' => 'post_loc_latitude',
													'desc' => '',
													//'styles' => 'display:none;',
													'field_params' => array(
														'std' => $traveladvisor_post_loc_latitude,
														'id' => 'post_loc_latitude',
														'cust_name' => 'traveladvisor_post_loc_latitude',
														'extra_atr' => ' placeholder="placeholder"',
														'classes' => 'form-control gllpLatitude',
														'return' => true,
													),
												);

												if ( isset( $value['split'] ) && $value['split'] <> '' ) {
													$traveladvisor_opt_array['split'] = $value['split'];
												}

												//echo $traveladvisor_html_fields_frontend->traveladvisor_form_text_render( $traveladvisor_opt_array );
												$html_text = $traveladvisor_html_fields_frontend->traveladvisor_form_text_render( $traveladvisor_opt_array );
												echo traveladvisor_allow_special_char( $html_text );
												?>
											</div>
											<div class="col-md-6">
												<label></label>
												<?php
												$traveladvisor_opt_array = array(
													'id' => 'post_loc_longitude',
													'desc' => '',
													'field_params' => array(
														'std' => $traveladvisor_post_loc_longitude,
														'id' => 'post_loc_longitude',
														'cust_name' => 'traveladvisor_post_loc_longitude',
														'extra_atr' => '',
														'classes' => 'form-control gllpLongitude',
														'return' => true,
													),
												);

												if ( isset( $value['split'] ) && $value['split'] <> '' ) {
													$traveladvisor_opt_array['split'] = $value['split'];
												}
												//echo $traveladvisor_html_fields_frontend->traveladvisor_form_text_render( $traveladvisor_opt_array );
												$html_text_field = $traveladvisor_html_fields_frontend->traveladvisor_form_text_render( $traveladvisor_opt_array );
												echo traveladvisor_allow_special_char( $html_text_field );
												?>
											</div>

											<div class="col-md-12">
												<label></label>
												<?php
												$traveladvisor_opt_array = array(
													'name' => '',
													'id' => 'map_search_btn',
													'desc' => '',
													'field_params' => array(
														'id' => 'map_search_btn',
														'cust_type' => 'button',
														'classes' => 'acc-submit cs-section-update cs-color csborder-color gllpSearchButton',
														'return' => true,
													),
												);

												if ( isset( $value['split'] ) && $value['split'] <> '' ) {
													$traveladvisor_opt_array['split'] = $value['split'];
												}

												//echo $traveladvisor_html_fields_frontend->traveladvisor_form_text_render( $traveladvisor_opt_array );
												$html_text_input = $traveladvisor_html_fields_frontend->traveladvisor_form_text_render( $traveladvisor_opt_array );
												echo traveladvisor_allow_special_char( $html_text_input );
												?>   
											</div>
											<div class="col-md-12" style="float: left; width:100%;" >
												<div class="clear"></div>
												<?php
												$traveladvisor_opt_array = array(
													'id' => '',
													'id' => 'add_new_loc',
													'std' => $traveladvisor_add_new_loc,
													'classes' => 'gllpSearchField_fe',
													'extra_atr' => 'style="margin-bottom:10px;"',
													'return' => true,
												);

												//echo $traveladvisor_form_fields2->traveladvisor_form_hidden_render( $traveladvisor_opt_array );
												$html_hidden = $traveladvisor_form_fields2->traveladvisor_form_hidden_render( $traveladvisor_opt_array );
												echo traveladvisor_allow_special_char( $html_hidden );

												$traveladvisor_opt_array = array(
													'id' => '',
													'std' => esc_attr( $traveladvisor_post_loc_zoom ),
													'cust_id' => esc_attr( $traveladvisor_post_loc_zoom ),
													'cust_name' => "traveladvisor_post_loc_zoom",
													'classes' => 'gllpZoom',
													'return' => true,
												);

												//echo $traveladvisor_form_fields2->traveladvisor_form_hidden_render( $traveladvisor_opt_array );
												$html_hidden_input = $traveladvisor_form_fields2->traveladvisor_form_hidden_render( $traveladvisor_opt_array );
												echo traveladvisor_allow_special_char( $html_hidden_input );

												$traveladvisor_opt_array = array(
													'id' => '',
													'cust_id' => '',
													'cust_name' => "",
													'classes' => 'gllpUpdateButton',
													'return' => true,
													'cust_type' => 'button',
													'extra_atr' => 'style="display:none"',
												);
												//echo $traveladvisor_form_fields2->traveladvisor_form_text_render( $traveladvisor_opt_array );
												$text_field = $traveladvisor_form_fields2->traveladvisor_form_text_render( $traveladvisor_opt_array );
												echo traveladvisor_allow_special_char( $text_field );
												?>
												<div class="clear"></div>
												<div class="cs-map-section" style="float:left; width:100%; height:270px;">
													<div class="gllpMap" id="cs-map-location-fe-id" style="float:left; width:100%; height:270px;"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</fieldset>
							<script>
								jQuery(document).ready(function () {

									traveladvisor_fe_search_map();
									traveladvisor_load_location_ajax();
									if (jQuery("#fe_map<?php echo absint( $field_postfix ) ?> #cs-map-location-fe-id").hasClass("gllpMap")) {
										var vals;
										traveladvisor_map_location_load('<?php echo absint( $field_postfix ); ?>');
										if (vals)
											traveladvisor_search_map(vals);
									}
								});
								function traveladvisor_fe_search_map() {

									var vals;
									vals = jQuery('#fe_map<?php echo absint( $field_postfix ) ?> #loc_address').val();
									jQuery('#fe_map<?php echo absint( $field_postfix ); ?> .gllpSearchField_fe').val(vals);
								}

								(function ($) {
									$(function () {
			<?php
			$traveladvisor_jobhunt->traveladvisor_google_place_scripts();
			?> //var autocomplete;
										autocomplete = new google.maps.places.Autocomplete(document.getElementById('loc_address'));
			<?php if ( isset( $selected_iso_code ) && ! empty( $selected_iso_code ) ) { ?>
											autocomplete.setComponentRestrictions({'country': '<?php echo esc_js( $selected_iso_code ) ?>'});
			<?php } ?>
									});
								})(jQuery);
								jQuery(document).ready(function () {
									var $ = jQuery;
									jQuery("[id^=map_canvas]").css("pointer-events", "none");
									jQuery("[id^=cs-map-location]").css("pointer-events", "none");
									// on leave handle
									var onMapMouseleaveHandler = function (event) {
										var that = jQuery(this);
										that.on('click', onMapClickHandler);
										that.off('mouseleave', onMapMouseleaveHandler);
										jQuery("[id^=map_canvas]").css("pointer-events", "none");
										jQuery("[id^=cs-map-location]").css("pointer-events", "none");
									}
									// on click handle
									var onMapClickHandler = function (event) {
										var that = jQuery(this);
										// Disable the click handler until the user leaves the map area
										that.off('click', onMapClickHandler);
										// Enable scrolling zoom
										that.find('[id^=map_canvas]').css("pointer-events", "auto");
										that.find('[id^=cs-map-location]').css("pointer-events", "auto");

										// Handle the mouse leave event
										that.on('mouseleave', onMapMouseleaveHandler);
									}
									// Enable map zooming with mouse scroll when the user clicks the map
									jQuery('.cs-map-section').on('click', onMapClickHandler);
									// new addition
								});

							</script>
							<?php
						}

						/**
						 * Start How to add  Categories(Taxonomy) fields  Function
						 *
						 */
						public function traveladvisor_jobs_spec_fields( $tag ) { //check for existing featured ID
							global $traveladvisor_form_fields2;
							if ( isset( $tag->term_id ) ) {
								$t_id = $tag->term_id;
							} else {
								$t_id = "";
							}
							$spec_image = '';
							?>

							<div class="form-field">
								<ul class="form-elements" style="margin:0; padding:0;">
									<li class="to-field" style="width:100%;">
										<label style="width:100%;"></label>
										<?php
										$traveladvisor_opt_array = array(
											'id' => '',
											'std' => esc_url( $spec_image ),
											'cust_id' => "spec_image" . esc_attr( $t_id ),
											'cust_name' => "spec_image",
											'classes' => '',
											'return' => true,
										);
										//echo $traveladvisor_form_fields2->traveladvisor_form_hidden_render( $traveladvisor_opt_array );
										$hidden_field = $traveladvisor_form_fields2->traveladvisor_form_hidden_render( $traveladvisor_opt_array );
										echo traveladvisor_allow_special_char( $hidden_field );
										?>
										<label class="browse-icon">
											<?php
											$traveladvisor_opt_array = array(
												'id' => '',
												'cust_id' => '',
												'cust_name' => "spec_image" . esc_attr( $t_id ),
												'classes' => 'uploadMedia left',
												'return' => true,
												'cust_type' => 'button',
											);
											//echo $traveladvisor_form_fields2->traveladvisor_form_text_render( $traveladvisor_opt_array );
											$html_hidden_field = $traveladvisor_form_fields2->traveladvisor_form_text_render( $traveladvisor_opt_array );
											echo traveladvisor_allow_special_char( $html_hidden_field );
											?>
										</label>
										<div class="page-wrap" style="overflow:hidden; display:<?php echo esc_attr( $spec_image ) && trim( $spec_image ) != '' ? 'inline' : 'none'; ?>" id="spec_image<?php echo esc_attr( $t_id ) ?>_box" >
											<div class="gal-active" style="padding-left:0 !important;">
												<div class="dragareamain" style="padding-bottom:0px;">
													<ul id="gal-sortable" style="width:200px;">
														<li class="ui-state-default" id="">
															<div class="thumb-secs"> <img src="<?php echo esc_url( $spec_image ); ?>"  id="spec_image<?php echo esc_attr( $t_id ); ?>_img" width="200" />
																<div class="gal-edit-opts"> <a   href="javascript:del_media('spec_image<?php echo esc_attr( $t_id ); ?>')" class="delete"></a> </div>
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>

									</li>
								</ul>

								<p></p>
							</div>
							<?php
							$traveladvisor_opt_array = array(
								'id' => '',
								'std' => "1",
								'cust_id' => "",
								'cust_name' => "spec_image_meta",
								'return' => true,
							);
							//echo $traveladvisor_form_fields2->traveladvisor_form_hidden_render( $traveladvisor_opt_array );
							$html_hidden_render = $traveladvisor_form_fields2->traveladvisor_form_text_render( $traveladvisor_opt_array );
							echo traveladvisor_allow_special_char( $html_hidden_render );
						}

						/**
						 * End How to add  Categories fields  Function
						 * Start How to Edit  Categories Fields  Function
						 *
						 */
						public function traveladvisor_edit_jobs_spec_fields( $tag ) { //check for existing featured ID
							global $traveladvisor_form_fields2;
							if ( isset( $tag->term_id ) ) {
								$t_id = $tag->term_id;
							} else {
								$t_id = "";
							}
							$traveladvisor_counter = $tag->term_id;
							$cat_meta = get_option( "spec_image_$t_id" );
							$spec_image = $cat_meta['img'];
							?>
							<tr>
								<th><label for="cat_f_img_url"> </label></th>
								<td>
									<ul class="form-elements" style="margin:0; padding:0;">
										<li class="to-field" style="width:100%;">
											<label style="width:100%;"> </label>
											<?php
											$traveladvisor_opt_array = array(
												'id' => '',
												'std' => esc_url( $spec_image ),
												'cust_id' => "spec_image" . esc_attr( $traveladvisor_counter ),
												'cust_name' => "spec_image",
												'return' => true,
											);
											//echo $traveladvisor_form_fields2->traveladvisor_form_hidden_render( $traveladvisor_opt_array );
											$html_hidden_render = $traveladvisor_form_fields2->traveladvisor_form_hidden_render( $traveladvisor_opt_array );
											echo traveladvisor_allow_special_char( $html_hidden_render );
											?>
											<label class="browse-icon">
												<?php
												$traveladvisor_opt_array = array(
													'id' => '',
													'cust_id' => '',
													'cust_name' => "spec_image" . esc_attr( $traveladvisor_counter ),
													'classes' => 'uploadMedia left',
													'return' => true,
													'cust_type' => 'button',
												);
												//echo $traveladvisor_form_fields2->traveladvisor_form_text_render( $traveladvisor_opt_array );
												$html_text = $traveladvisor_form_fields2->traveladvisor_form_text_render( $traveladvisor_opt_array );
												echo traveladvisor_allow_special_char( $html_text );
												?>
											</label>
											<div class="page-wrap" style="overflow:hidden; display:<?php echo esc_attr( $spec_image ) && trim( $spec_image ) != '' ? 'inline' : 'none'; ?>" id="spec_image<?php echo esc_attr( $traveladvisor_counter ) ?>_box" >
												<div class="gal-active" style="padding-left:0 !important;">
													<div class="dragareamain" style="padding-bottom:0px;">
														<ul id="gal-sortable" style="width:200px;">
															<li class="ui-state-default" id="">
																<div class="thumb-secs"> <img src="<?php echo esc_url( $spec_image ); ?>"  id="spec_image<?php echo esc_attr( $traveladvisor_counter ); ?>_img" width="200" />
																	<div class="gal-edit-opts"> <a href="javascript:del_media('spec_image<?php echo esc_attr( $traveladvisor_counter ); ?>')" class="delete"></a> </div>
																</div>
															</li>
														</ul>
													</div>
												</div>
											</div>

										</li>
									</ul>

									<p></p>
								</td>
							</tr>
							<?php
							$traveladvisor_opt_array = array(
								'id' => '',
								'std' => "1",
								'cust_id' => "",
								'cust_name' => "spec_image_meta",
								'return' => true,
							);
							//echo $traveladvisor_form_fields2->traveladvisor_form_hidden_render( $traveladvisor_opt_array );
							$html_hidden = $traveladvisor_form_fields2->traveladvisor_form_hidden_render( $traveladvisor_opt_array );
							echo traveladvisor_allow_special_char( $html_hidden );
						}

						/**
						 * Start Function save extra category extra fields callback function
						 *
						 */
						public function traveladvisor_save_jobs_spec_fields( $term_id ) {
							if ( isset( $_POST['spec_image_meta'] ) and $_POST['spec_image_meta'] == '1' ) {
								$t_id = $term_id;
								get_option( "spec_image_$t_id" );
								$spec_image_img = '';
								if ( isset( $_POST['spec_image'] ) ) {
									$spec_image_img = $_POST['spec_image'];
								}
								$cat_meta = array(
									'img' => $spec_image_img,
								);
								//save the option array
								update_option( "spec_image_$t_id", $cat_meta );
							}
						}

						// Add Category Fields
						public function traveladvisor_jobs_locations_fields( $tag ) { //check for existing featured ID
							global $traveladvisor_form_fields2;
							if ( isset( $tag->term_id ) ) {
								$t_id = $tag->term_id;
							} else {
								$t_id = "";
							}
							$locations_image = '';
							$iso_code = '';
							?>
							<div class="form-field">

								<label></label>
								<ul class="form-elements" style="margin:0; padding:0;">
									<li class="to-field" style="width:100%;">
										<?php
										$traveladvisor_opt_array = array(
											'id' => '',
											'std' => "",
											'cust_id' => "iso_code",
											'cust_name' => "iso_code",
											'return' => true,
										);
										//echo $traveladvisor_form_fields2->traveladvisor_form_text_render( $traveladvisor_opt_array );
										$html_text = $traveladvisor_form_fields2->traveladvisor_form_text_render( $traveladvisor_opt_array );
										echo traveladvisor_allow_special_char( $html_text );
										?>
									</li>
								</ul>
								</br> </br>
							</div>
							<?php
							$traveladvisor_opt_array = array(
								'id' => '',
								'std' => "1",
								'cust_id' => "",
								'cust_name' => "locations_image_meta",
								'return' => true,
							);
							//echo $traveladvisor_form_fields2->traveladvisor_form_hidden_render( $traveladvisor_opt_array );
							$html_hidden = $traveladvisor_form_fields2->traveladvisor_form_hidden_render( $traveladvisor_opt_array );
							echo traveladvisor_allow_special_char( $html_hidden );
						}

						public function traveladvisor_edit_jobs_locations_fields( $tag ) { //check for existing featured ID
							global $traveladvisor_form_fields2;
							if ( isset( $tag->term_id ) ) {
								$t_id = $tag->term_id;
							} else {
								$t_id = "";
							}
							$cat_meta = get_option( "iso_code_$t_id" );
							$iso_code = $cat_meta['text'];
							?>
							<?php
							$traveladvisor_opt_array = array(
								'id' => '',
								'std' => "1",
								'cust_id' => "",
								'cust_name' => "locations_image_meta",
								'return' => true,
							);
							//echo $traveladvisor_form_fields2->traveladvisor_form_hidden_render( $traveladvisor_opt_array );
							$html_hidden = $traveladvisor_form_fields2->traveladvisor_form_hidden_render( $traveladvisor_opt_array );
							echo traveladvisor_allow_special_char( $html_hidden );
							?>
							<tr>
								<th><label for="cat_f_img_url"> </label></th>
								<td>
									<ul class="form-elements" style="margin:0; padding:0;">
										<li class="to-field" style="width:100%;">
											<?php
											$traveladvisor_opt_array = array(
												'id' => '',
												'std' => esc_attr( $iso_code ),
												'cust_id' => "iso_code",
												'cust_name' => "iso_code",
												'return' => true,
											);
											//echo $traveladvisor_form_fields2->traveladvisor_form_text_render( $traveladvisor_opt_array );
											$html_text = $traveladvisor_form_fields2->traveladvisor_form_text_render( $traveladvisor_opt_array );
											echo traveladvisor_allow_special_char( $html_text );
											?>
										</li>
									</ul>
								</td>
							</tr>
							<?php
						}

						/**
						 * Start Function how to save location in jobs fields
						 */
						public function traveladvisor_save_jobs_locations_fields( $term_id ) {
							if ( isset( $_POST['locations_image_meta'] ) and $_POST['locations_image_meta'] == '1' ) {
								$t_id = $term_id;
								get_option( "locations_image_$t_id" );
								$locations_image_img = '';
								if ( isset( $_POST['locations_image'] ) ) {
									$locations_image_img = $_POST['locations_image'];
								}
								if ( isset( $_POST['iso_code'] ) ) {
									$iso_code = $_POST['iso_code'];
								}
								$cat_meta = array(
									'img' => $locations_image_img,
								);
								$cat_meta = array(
									'text' => $iso_code,
								);
								update_option( "locations_image_$t_id", $cat_meta );
								update_option( "iso_code_$t_id", $cat_meta );
							}
						}

						public function traveladvisor_jobs_job_type_fields( $tag ) {
							global $traveladvisor_form_fields2;
							if ( isset( $tag->term_id ) ) {
								$t_id = $tag->term_id;
							} else {
								$t_id = "";
							}
							$locations_image = '';
							$job_type_color = '';
							wp_enqueue_style( 'wp-color-picker' );
							wp_enqueue_script( 'wp-color-picker' );
							?>
							<script type="text/javascript">
								jQuery(document).ready(function ($) {
									$('.bg_color').wpColorPicker();
								});
							</script>
							<div class="form-field">

								<label></label>
								<ul class="form-elements" style="margin:0; padding:0;">
									<li class="to-field" style="width:100%;">
										<?php
										$traveladvisor_opt_array = array(
											'id' => '',
											'std' => "",
											'cust_id' => "job_type_color",
											'cust_name' => "job_type_color",
											'classes' => 'bg_color',
											'return' => true,
										);
										//echo $traveladvisor_form_fields2->traveladvisor_form_text_render( $traveladvisor_opt_array );
										$html_text_render = $traveladvisor_form_fields2->traveladvisor_form_text_render( $traveladvisor_opt_array );
										echo traveladvisor_allow_special_char( $html_text_render );
										?>
									</li>
								</ul>
								</br> </br>
							</div>
							<?php
						}

						public function traveladvisor_edit_jobs_job_type_fields( $tag ) { //check for existing featured ID
							global $traveladvisor_form_fields2;
							wp_enqueue_style( 'wp-color-picker' );
							wp_enqueue_script( 'wp-color-picker' );
							if ( isset( $tag->term_id ) ) {
								$t_id = $tag->term_id;
							} else {
								$t_id = "";
							}
							?>
							<script type="text/javascript">
								jQuery(document).ready(function ($) {
									$('.bg_color').wpColorPicker();
								});
							</script>
							<?php
							$cat_meta = get_option( "job_type_color_$t_id" );
							$job_type_color = $cat_meta['text'];
							?>

							<tr>
								<th><label for="cat_f_img_url"></label></th>
								<td>
									<ul class="form-elements" style="margin:0; padding:0;">
										<li class="to-field" style="width:100%;">
											<?php
											$traveladvisor_opt_array = array(
												'id' => '',
												'std' => esc_attr( $job_type_color ),
												'cust_id' => "job_type_color",
												'cust_name' => "job_type_color",
												'classes' => 'bg_color',
												'return' => true,
											);
											//echo $traveladvisor_form_fields2->traveladvisor_form_text_render( $traveladvisor_opt_array );
											$html_text_render = $traveladvisor_form_fields2->traveladvisor_form_text_render( $traveladvisor_opt_array );
											echo traveladvisor_allow_special_char( $html_text_render );
											?>
										</li>
									</ul>
								</td>
							</tr>
							<?php
						}

						/**
						 * Start Function how to save location in jobs fields
						 */
						public function traveladvisor_save_jobs_jobtype_fields( $term_id ) {
							if ( isset( $_POST['job_type_color'] ) ) {
								$t_id = $term_id;

								if ( isset( $_POST['job_type_color'] ) ) {
									$job_type_color = $_POST['job_type_color'];
								}

								$cat_meta = array(
									'text' => $job_type_color,
								);

								update_option( "job_type_color_$t_id", $cat_meta );
							}
						}

						/**
						 * End Function how to save location in jobs fields
						 * How to know about working  current Theme Function Start
						 */
						public function traveladvisor_get_current_theme() {
							$traveladvisor_theme = wp_get_theme();
							$theme_name = $traveladvisor_theme->get( 'Name' );
							return $theme_name;
						}

					}

					/**
					 * End Function How to know about working  current Theme Function
					 * Design Pattern for Object initilization
					 */
					function TRAVELADVISOR_FUNCTIONS() {
						return traveladvisor_job_plugin_functions::instance();
					}

					$GLOBALS['traveladvisor_job_plugin_functions'] = TRAVELADVISOR_FUNCTIONS();
				}
