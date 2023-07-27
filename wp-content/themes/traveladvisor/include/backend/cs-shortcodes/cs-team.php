<?php
/*
 *
 * @Shortcode Name : multi_team
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_page_builder_team' ) ) {

	function traveladvisor_var_page_builder_team( $die = 0 ) {
		global $post, $traveladvisor_node, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields;
		$shortcode_element = '';
		$filter_element = 'filterdrag';
		$shortcode_view = '';
		$output = array();
		$traveladvisor_counter = $_POST['counter'];
		$multi_team_num = 0;
		if ( isset( $_POST['action'] ) && !isset( $_POST['shortcode_element_id'] ) ) {
			$TRAVELADVISOR_POSTID = '';
			$shortcode_element_id = '';
		} else {
			$TRAVELADVISOR_POSTID = $_POST['POSTID'];
			$shortcode_element_id = $_POST['shortcode_element_id'];
			$shortcode_str = stripslashes( $shortcode_element_id );
			$TRAVELADVISOR_PREFIX = 'team|team_item';
			$parseObject = new ShortcodeParse();
			$output = $parseObject->traveladvisor_shortcodes( $output, $shortcode_str, true, $TRAVELADVISOR_PREFIX );
		}
		$defaults = array(
			'traveladvisor_var_team_column_size' => '1/1',
			'traveladvisor_var_team_view' => '',
			'traveladvisor_var_multi_team_title' => '',
			'traveladvisor_var_multi_team_sub_title' => '',
			'traveladvisor_var_service_content_align' => '',
			'traveladvisor_var_multi_service_column' => '',
		);
		if ( isset( $output['0']['atts'] ) ) {
			$atts = $output['0']['atts'];
		} else {
			$atts = array();
		}
		if ( isset( $output['0']['content'] ) ) {
			$atts_content = $output['0']['content'];
		} else {
			$atts_content = array();
		}
		if ( is_array( $atts_content ) ) {
			$multi_team_num = count( $atts_content );
		}
		$multi_team_element_size = '100';
		foreach ( $defaults as $key => $values ) {
			if ( isset( $atts[$key] ) ) {
				$$key = $atts[$key];
			} else {
				$$key = $values;
			}
		}
		$traveladvisor_var_team_view = isset( $traveladvisor_var_team_view ) ? $traveladvisor_var_team_view : '';
		$traveladvisor_var_multi_team_title = isset( $traveladvisor_var_multi_team_title ) ? $traveladvisor_var_multi_team_title : '';
		$traveladvisor_var_multi_team_sub_title = isset( $traveladvisor_var_multi_team_sub_title ) ? $traveladvisor_var_multi_team_sub_title : '';
		$traveladvisor_var_team_column_size = isset( $traveladvisor_var_team_column_size ) ? $traveladvisor_var_team_column_size : '';
		$name = 'traveladvisor_var_page_builder_team';
		$coloumn_class = 'column_' . $multi_team_element_size;
		if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
			$shortcode_element = 'shortcode_element_class';
			$shortcode_view = 'cs-pbwp-shortcode';
			$filter_element = 'ajax-drag';
			$coloumn_class = '';
		}
		?>
		<div id="<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>_del" class="column  parentdelete <?php echo traveladvisor_allow_special_char( $coloumn_class ); ?> <?php echo traveladvisor_allow_special_char( $shortcode_view ); ?>" item="team" data="<?php echo traveladvisor_element_size_data_array_index( $multi_team_element_size ) ?>" >
			<?php traveladvisor_element_setting( $name, $traveladvisor_counter, $multi_team_element_size, '', 'comments-o', $type = '' ); ?>
			<div class="cs-wrapp-class-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ) ?> <?php echo traveladvisor_allow_special_char( $shortcode_element ); ?>" id="<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>" style="display: none;">
				<div class="cs-heading-area">
					<h5><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_multi_team_edit_option' ); ?></h5>
					<a href="javascript:traveladvisor_frame_removeoverlay('<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>','<?php echo traveladvisor_allow_special_char( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-times"></i></a>
				</div>
				<div class="cs-clone-append cs-pbwp-content">
					<div class="cs-wrapp-tab-box">
						<div id="shortcode-item-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ); ?>" data-shortcode-template="{{child_shortcode}} [/team]" data-shortcode-child-template="[team_item {{attributes}}] {{content}} [/team_item]">
							<div class="cs-wrapp-clone cs-shortcode-wrapp cs-disable-true cs-pbwp-content" data-template="[team {{attributes}}]">
								<script>
		                            function team_view(val) {
		                                var $traveladvisor_team_views = jQuery('.fancy_view').val();
		                                if ($traveladvisor_team_views == 'team_fancy') {
		                                    jQuery('#column-size').hide();
		                                    jQuery('#img_position').show();
		                                    jQuery('#social_icons').show();
		                                    jQuery('#description').show();

		                                } else if ($traveladvisor_team_views == 'team_simple') {
		                                    jQuery('#column-size').show();
		                                    jQuery('#img_position').hide();
		                                    jQuery('#social_icons').hide();
		                                    jQuery('#description').hide();
		                                } else {
		                                    jQuery('#column-size').show();
		                                    jQuery('#img_position').hide();
		                                    jQuery('#social_icons').show();
		                                    jQuery('#description').hide();
		                                }
		                            }
								</script>
								<?php
								if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
									traveladvisor_shortcode_element_size();
								}

								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multi_team_title' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multi_team_title_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $traveladvisor_var_multi_team_title ),
										'cust_id' => '',
										'cust_name' => 'traveladvisor_var_multi_team_title[]',
										'return' => true,
									),
								);
								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_views' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_views_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_html( $traveladvisor_var_team_view ),
										'cust_name' => 'traveladvisor_var_team_view[]',
										'cust_id' => 'traveladvisor_var_team_view',
										'classes' => 'dropdown chosen-select fancy_view',
										'extra_atr' => 'onchange="team_view(this)"',
										'options' => array(
											'' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_views_please_select' ),
											'team_grid' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_views_grid' ),
											'team_fancy' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_views_fancy' ),
											'team_simple' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_views_simple' ),
										),
										'return' => true,
									)
								);
								$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );

								$traveladvisor_team_fancy = 'none';
								$traveladvisor_img_position = 'none';
								$traveladvisor_socialicons = 'none';
								$traveladvisor_description = 'none';
								if ( $traveladvisor_var_team_view == "team_fancy" ) {
									$traveladvisor_team_fancy = 'none';
									$traveladvisor_img_position = 'block';
									$traveladvisor_socialicons = 'block';
									$traveladvisor_description = 'block';
								} else if ( $traveladvisor_var_team_view == "team_simple" ) {
									$traveladvisor_team_fancy = 'block';
									$traveladvisor_img_position = 'none';
									$traveladvisor_socialicons = 'none';
									$traveladvisor_description = 'none';
								} else {
									$traveladvisor_team_fancy = 'block';
									$traveladvisor_img_position = 'none';
									$traveladvisor_socialicons = 'block';
									$traveladvisor_description = 'none';
								}
								?>
								<style type="text/css">
		<?php if ( $traveladvisor_var_team_view == 'team_simple' ) { ?>
										.column_field{ display:block; }
										.img_position_field{ display:none; }
										.social_links_fields{ display:none; }
										.desc_field{ display:none; }
		<?php } elseif ( $traveladvisor_var_team_view == 'team_fancy' ) { ?>
										.column_field{ display:none; }
										.img_position_field{ display:block; }
										.social_links_fields{ display:block; }
										.desc_field{ display:block; }
		<?php } elseif ( $traveladvisor_var_team_view == 'team_grid' ) { ?>
										.column_field{ display:block; }
										.img_position_field{ display:none; }
										.social_links_fields{ display:block; }
										.desc_field{ display:none; }
		<?php } ?>
								</style>
								<script>
		                            $(function () {
		                                $('#traveladvisor_var_team_view').change(function () {
		                                    var getValue = $("#traveladvisor_var_team_view option:selected").val();
		                                    if (getValue == 'team_simple') {
		                                        $('.column_field').css('display', 'block');
		                                        $('.img_position_field').css('display', 'none');
		                                        $('.social_links_fields').css('display', 'none');
		                                        $('.desc_field').css('display', 'none');
		                                    } else if (getValue == 'team_fancy') {
		                                        $('.column_field').css('display', 'none');
		                                        $('.img_position_field').css('display', 'block');
		                                        $('.social_links_fields').css('display', 'block');
		                                        $('.desc_field').css('display', 'block');
		                                    } else if (getValue == 'team_grid') {
		                                        $('.column_field').css('display', 'block');
		                                        $('.img_position_field').css('display', 'none');
		                                        $('.social_links_fields').css('display', 'block');
		                                        $('.desc_field').css('display', 'none');
		                                    }
		                                });
		                            });

								</script>
								<div class="column_field">
									<?php
									$traveladvisor_opt_array = array(
										'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multi_team_item_size' ),
										'desc' => '',
										'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multi_team_item_size_hint' ),
										'echo' => true,
										'field_params' => array(
											'std' => esc_html( $traveladvisor_var_team_column_size ),
											'cust_id' => 'traveladvisor_var_team_column_size' . $traveladvisor_counter,
											'cust_name' => 'traveladvisor_var_team_column_size[]',
											'classes' => 'dropdown chosen-select',
											'options' => array(
												'1/1' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_item_size_full_width' ),
												'1/2' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_item_size_one_half' ),
												'1/3' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_item_size_one_third' ),
												'1/4' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_item_size_one_fourth' ),
												'1/6' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_item_size_one_six' ),
											),
											'return' => true,
										),
									);
									$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
									?>
								</div>
							</div>
							<?php
							if ( isset( $multi_team_num ) && $multi_team_num <> '' && isset( $atts_content ) && is_array( $atts_content ) ) {
								foreach ( $atts_content as $multi_team ) {
									$rand_string = rand( 123456, 987654 );
									$traveladvisor_var_multi_team_des = $multi_team['content'];
									$defaults = array(
										'traveladvisor_var_team_title' => '',
										'traveladvisor_var_team_designation' => '',
										'traveladvisor_var_team_img_array' => '',
										'traveladvisor_var_team_view' => '',
										'traveladvisor_var_team_image_place' => '',
										'traveladvisor_var_team_facebook' => '',
										'traveladvisor_var_team_twitter' => '',
										'traveladvisor_var_team_google' => '',
										'traveladvisor_var_team_mail' => '',
										'traveladvisor_var_multi_team_text' => '',
										'traveladvisor_var_team_desc' => '',
										'traveladvisor_var_team_excerpt' => '',
										'traveladvisor_var_team_excerpt_length' => '',
									);
									foreach ( $defaults as $key => $values ) {
										if ( isset( $multi_team['atts'][$key] ) ) {
											$$key = $multi_team['atts'][$key];
										} else {
											$$key = $values;
										}
									}
									$traveladvisor_var_team_title = isset( $traveladvisor_var_team_title ) ? $traveladvisor_var_team_title : '';
									$traveladvisor_var_team_designation = isset( $traveladvisor_var_team_designation ) ? $traveladvisor_var_team_designation : '';
									$traveladvisor_var_team_img_array = isset( $traveladvisor_var_team_img_array ) ? $traveladvisor_var_team_img_array : '';
									$traveladvisor_var_team_view = isset( $traveladvisor_var_team_view ) ? $traveladvisor_var_team_view : '';
									$traveladvisor_var_team_image_place = isset( $traveladvisor_var_team_image_place ) ? $traveladvisor_var_team_image_place : '';
									$traveladvisor_var_team_facebook = isset( $traveladvisor_var_team_facebook ) ? $traveladvisor_var_team_facebook : '';
									$traveladvisor_var_team_twitter = isset( $traveladvisor_var_team_twitter ) ? $traveladvisor_var_team_twitter : '';
									$traveladvisor_var_team_google = isset( $traveladvisor_var_team_google ) ? $traveladvisor_var_team_google : '';
									$traveladvisor_var_team_mail = isset( $traveladvisor_var_team_mail ) ? $traveladvisor_var_team_mail : '';
									$traveladvisor_var_multi_team_text = isset( $traveladvisor_var_multi_team_text ) ? $traveladvisor_var_multi_team_text : '';
									$traveladvisor_var_team_desc = isset( $traveladvisor_var_team_desc ) ? $traveladvisor_var_team_desc : '';
									$traveladvisor_var_team_excerpt = isset( $traveladvisor_var_team_excerpt ) ? $traveladvisor_var_team_excerpt : '';
									$traveladvisor_var_team_excerpt_length = isset( $traveladvisor_var_team_excerpt_length ) ? $traveladvisor_var_team_excerpt_length : '';
									?>
									<div class='cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content' id="traveladvisor_infobox_<?php echo traveladvisor_allow_special_char( $rand_string ); ?>">
										<header>
											<h4><i class='icon-arrows'></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_multi_team_multi_team' ); ?></h4>
											<a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_multi_team_remove' ); ?></a>
										</header>
										<?php
										if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
											traveladvisor_shortcode_element_size();
										}
										$traveladvisor_opt_array = array(
											'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_name' ),
											'desc' => '',
											'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_name_hint' ),
											'echo' => true,
											'field_params' => array(
												'std' => esc_attr( $traveladvisor_var_team_title ),
												'cust_id' => 'traveladvisor_var_team_title' . $traveladvisor_counter,
												'classes' => '',
												'cust_name' => 'traveladvisor_var_team_title[]',
												'return' => true,
											),
										);
										$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
										$traveladvisor_opt_array = array(
											'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_desigination' ),
											'desc' => '',
											'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_desigination_hint' ),
											'echo' => true,
											'field_params' => array(
												'std' => esc_attr( $traveladvisor_var_multi_team_text ),
												'cust_id' => 'traveladvisor_var_multi_team_text' . $traveladvisor_counter,
												'classes' => '',
												'cust_name' => 'traveladvisor_var_multi_team_text[]',
												'return' => true,
											),
										);
										$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
										$traveladvisor_opt_array = array(
											'std' => $traveladvisor_var_team_img_array,
											'id' => 'team_img',
											'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_image' ),
											'desc' => '',
											'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_image_hint' ),
											'echo' => true,
											'array' => true,
											'prefix' => '',
											'field_params' => array(
												'std' => $traveladvisor_var_team_img_array,
												'id' => 'team_img',
												'return' => true,
												'array' => true,
												'array_txt' => false,
												'prefix' => '',
											),
										);
										$traveladvisor_var_html_fields->traveladvisor_var_upload_file_field( $traveladvisor_opt_array );
										?>
										<div class="img_position_field">
											<?php
											$traveladvisor_opt_array = array(
												'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_image_placee' ),
												'desc' => '',
												'id' => 'pagination_style',
												'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_image_placee_hint' ),
												'echo' => true,
												'field_params' => array(
													'std' => esc_html( $traveladvisor_var_team_image_place ),
													'cust_id' => 'traveladvisor_var_team_image_place' . $traveladvisor_counter,
													'cust_name' => 'traveladvisor_var_team_image_place[]',
													'classes' => 'dropdown chosen-select',
													'options' => array(
														'' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_image_placee_select' ),
														'right' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_image_placee_right' ),
														'left' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_image_placee_left' ),
													),
													'return' => true,
												),
											);
											$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
											?>
										</div>
										<div class="social_links_fields">
											<?php
											$traveladvisor_opt_array = array(
												'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_facebook' ),
												'desc' => '',
												'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_facebook_hint' ),
												'echo' => true,
												'field_params' => array(
													'std' => esc_attr( $traveladvisor_var_team_facebook ),
													'cust_id' => 'traveladvisor_var_team_facebook' . $traveladvisor_counter,
													'classes' => '',
													'cust_name' => 'traveladvisor_var_team_facebook[]',
													'return' => true,
												),
											);
											$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
											$traveladvisor_opt_array = array(
												'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_twitter' ),
												'desc' => '',
												'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_twitter_hint' ),
												'echo' => true,
												'field_params' => array(
													'std' => esc_attr( $traveladvisor_var_team_twitter ),
													'cust_id' => 'traveladvisor_var_team_twitter' . $traveladvisor_counter,
													'classes' => '',
													'cust_name' => 'traveladvisor_var_team_twitter[]',
													'return' => true,
												),
											);
											$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
											$traveladvisor_opt_array = array(
												'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_mail' ),
												'desc' => '',
												'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_mail_hint' ),
												'echo' => true,
												'field_params' => array(
													'std' => esc_attr( $traveladvisor_var_team_mail ),
													'cust_id' => 'traveladvisor_var_team_mail' . $traveladvisor_counter,
													'classes' => '',
													'cust_name' => 'traveladvisor_var_team_mail[]',
													'return' => true,
												),
											);
											$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
											$traveladvisor_opt_array = array(
												'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_google_plus' ),
												'desc' => '',
												'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_google_plus_hint' ),
												'echo' => true,
												'field_params' => array(
													'std' => esc_attr( $traveladvisor_var_team_google ),
													'cust_id' => 'traveladvisor_var_team_google' . $traveladvisor_counter,
													'classes' => '',
													'cust_name' => 'traveladvisor_var_team_google[]',
													'return' => true,
												),
											);
											$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
											?>
										</div>
										<div class="desc_field">
											<?php
											$traveladvisor_opt_array = array(
												'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_description' ),
												'desc' => '',
												'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_team_description_hint' ),
												'echo' => true,
												'field_params' => array(
													'std' => esc_attr( $traveladvisor_var_multi_team_des ),
													'cust_id' => 'traveladvisor_var_multi_team_des' . $traveladvisor_counter,
													'classes' => '',
													'cust_name' => 'traveladvisor_var_multi_team_des[]',
													'extra_atr' => ' data-content-text=cs-shortcode-textarea',
													'return' => true,
													'traveladvisor_editor' => true,
												),
											);
											$traveladvisor_var_html_fields->traveladvisor_var_textarea_field( $traveladvisor_opt_array );
											?>
										</div>
									</div>
									<?php
								}
							}
							?>
						</div>
						<div class="hidden-object">
							<?php
							$traveladvisor_opt_array = array(
								'std' => traveladvisor_allow_special_char( $multi_team_num ),
								'id' => '',
								'before' => '',
								'after' => '',
								'classes' => 'fieldCounter',
								'extra_atr' => '',
								'cust_id' => '',
								'cust_name' => 'multi_team_num[]',
								'return' => true,
								'required' => false
							);
							//echo $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
							$html_hidden_render = $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
							echo traveladvisor_allow_special_char( $html_hidden_render );
							?>
						</div>
						<div class="wrapptabbox cs-pbwp-content cs-zero-padding">
							<div class="opt-conts">
								<ul class="form-elements">
									<li class="to-field"> <a href="#" class="add_teamss cs-main-btn" onclick="traveladvisor_shortcode_element_ajax_call('team', 'shortcode-item-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ); ?>', '<?php echo admin_url( 'admin-ajax.php' ); ?>')"><i class="icon-plus-circle"></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_multi_team_add_multi_team' ); ?></a> </li>
									<div id="loading" class="shortcodeload"></div>
								</ul>
								<?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
									<ul class="form-elements insert-bg noborder">
										<li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:traveladvisor_shortcode_insert_editor('<?php echo str_replace( 'traveladvisor_var_page_builder_', '', $name ); ?>', 'shortcode-item-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ); ?>', '<?php echo traveladvisor_allow_special_char( $filter_element ); ?>')" ><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_multi_team_insert' ); ?></a> </li>
									</ul>
									<div id="results-shortocde"></div>
								<?php } else { ?>
									<?php
									$traveladvisor_opt_array = array(
										'std' => 'team',
										'id' => '',
										'before' => '',
										'after' => '',
										'classes' => '',
										'extra_atr' => '',
										'cust_id' => 'traveladvisor_orderby' . $traveladvisor_counter,
										'cust_name' => 'traveladvisor_orderby[]',
										'return' => true,
										'required' => false
									);
									//   echo $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render($traveladvisor_opt_array);
									$html_hidden = $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
									echo traveladvisor_allow_special_char( $html_hidden );
									$traveladvisor_opt_array = array(
										'name' => '',
										'desc' => '',
										'hint_text' => '',
										'echo' => true,
										'field_params' => array(
											'std' => 'Save',
											'cust_id' => 'multi_team_save' . $traveladvisor_counter,
											'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
											'cust_type' => 'button',
											'classes' => 'cs-traveladvisor-admin-btn',
											'cust_name' => 'multi_team_save',
											'return' => true,
										),
									);
									$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
		    jQuery(document).ready(function ($) {
		        if (jQuery('.chosen-select, .chosen-select-deselect, .chosen-select-no-single, .chosen-select-no-results, .chosen-select-width').length != '') {
		            var config = {
		                '.chosen-select': {width: "100%"},
		                '.chosen-select-deselect': {allow_single_deselect: true},
		                '.chosen-select-no-single': {disable_search_threshold: 10, width: "100%"},
		                '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
		                '.chosen-select-width': {width: "95%"}
		            }
		            for (var selector in config) {
		                jQuery(selector).chosen(config[selector]);
		            }
		        }
		    });
		</script>
		<?php
		if ( $die <> 1 ) {
			die();
		}
	}

	add_action( 'wp_ajax_traveladvisor_var_page_builder_team', 'traveladvisor_var_page_builder_team' );
}