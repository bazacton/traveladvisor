<?php
/*
 *
 * @Shortcode Name : Testimonial
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_page_builder_counter' ) ) {

	function traveladvisor_var_page_builder_counter( $die = 0 ) {
		global $post, $traveladvisor_node, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields;
		$shortcode_element = '';
		$filter_element = 'filterdrag';
		$shortcode_view = '';
		$output = array();
		$traveladvisor_counter = $_POST['counter'];
		$counter_num = 0;
		$traveladvisor_var_counter_icon = isset( $traveladvisor_var_counter_icon ) ? $traveladvisor_var_counter_icon : '';
		$traveladvisor_var_counter_icon_color = isset( $traveladvisor_var_counter_icon_color ) ? $traveladvisor_var_counter_icon_color : '';
		$traveladvisor_var_counter_number_color = isset( $traveladvisor_var_counter_number_color ) ? $traveladvisor_var_counter_number_color : '';
		$traveladvisor_var_counter_number = isset( $traveladvisor_var_counter_number ) ? $traveladvisor_var_counter_number : '';
		$traveladvisor_var_counter_separator = isset( $traveladvisor_var_counter_separator ) ? $traveladvisor_var_counter_separator : '';
		$traveladvisor_var_counter_title = isset( $traveladvisor_var_counter_title ) ? $traveladvisor_var_counter_title : '';
		$traveladvisor_var_counter_desc = isset( $traveladvisor_var_counter_desc ) ? $traveladvisor_var_counter_desc : '';
		$traveladvisor_var_counter_desc_color = isset( $traveladvisor_var_counter_desc_color ) ? $traveladvisor_var_counter_desc_color : '';
		$traveladvisor_var_counter_background_color = isset( $traveladvisor_var_counter_background_color ) ? $traveladvisor_var_counter_background_color : '';
		if ( isset( $_POST['action'] ) && !isset( $_POST['shortcode_element_id'] ) ) {
			$TRAVELADVISOR_POSTID = '';
			$shortcode_element_id = '';
		} else {
			$TRAVELADVISOR_POSTID = $_POST['POSTID'];
			$shortcode_element_id = $_POST['shortcode_element_id'];
			$shortcode_str = stripslashes( $shortcode_element_id );
			$TRAVELADVISOR_PREFIX = 'traveladvisor_counter|counter_item';
			$parseObject = new ShortcodeParse();
			$output = $parseObject->traveladvisor_shortcodes( $output, $shortcode_str, true, $TRAVELADVISOR_PREFIX );
		}
		$defaults = array( 'column_size' => '1/1',
			'traveladvisor_var_counter_text_color' => '',
			'traveladvisor_counter_text_align' => '',
			'traveladvisor_var_counter_icon_color' => '',
			'traveladvisor_var_counter_icon' => '',
			'traveladvisor_var_counter_number_color' => '',
			'traveladvisor_var_counter_number' => '',
			'traveladvisor_var_counter_separator' => '',
			'traveladvisor_var_counter_title' => '',
			'traveladvisor_var_counter_desc' => '',
			'traveladvisor_var_counter_desc_color' => '',
			'traveladvisor_var_counter_background_color' => '',
			'traveladvisor_counter_class' => '',
			'counter_style' => '',
			'counter_text_color' => '' );
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
			$counter_num = count( $atts_content );
		}
		$counter_element_size = '25';
		foreach ( $defaults as $key => $values ) {
			if ( isset( $atts[$key] ) ) {
				$$key = $atts[$key];
			} else {
				$$key = $values;
			}
		}
		$name = 'traveladvisor_var_page_builder_counter';
		$coloumn_class = 'column_' . $counter_element_size;
		if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
			$shortcode_element = 'shortcode_element_class';
			$shortcode_view = 'cs-pbwp-shortcode';
			$filter_element = 'ajax-drag';
			$coloumn_class = '';
		}
		?>
		<div id="<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>_del" class="column  parentdelete <?php echo traveladvisor_allow_special_char( $coloumn_class ); ?> <?php echo traveladvisor_allow_special_char( $shortcode_view ); ?>" item="counter" data="<?php echo traveladvisor_element_size_data_array_index( $counter_element_size ) ?>" >
			<?php traveladvisor_element_setting( $name, $traveladvisor_counter, $counter_element_size, '', 'comments-o', $type = '' ); ?>
			<div class="cs-wrapp-class-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ) ?> <?php echo traveladvisor_allow_special_char( $shortcode_element ); ?>" id="<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>" style="display: none;">
				<div class="cs-heading-area">
					<h5><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_edit_counter_option' ); ?></h5>
					<a href="javascript:traveladvisor_frame_removeoverlay('<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>','<?php echo traveladvisor_allow_special_char( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-times"></i></a>
				</div>
				<div class="cs-clone-append cs-pbwp-content">
					<div class="cs-wrapp-tab-box">
						<div id="shortcode-item-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ); ?>" data-shortcode-template="{{child_shortcode}} [/traveladvisor_counter]" data-shortcode-child-template="[counter_item {{attributes}}] {{content}} [/counter_item]">
							<div class="cs-wrapp-clone cs-shortcode-wrapp cs-disable-true cs-pbwp-content" data-template="[traveladvisor_counter {{attributes}}]">
								<?php
								if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
									traveladvisor_shortcode_element_size();
								}
								$traveladvisor_counter_style = isset( $traveladvisor_counter_style ) ? $traveladvisor_counter_style : '';
								$rand_id = rand( 10, 9999 );
								?>
								<div class="form-elements" id="traveladvisor_infobox_<?php echo esc_attr( $rand_id ); ?>">
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<label><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_icon' ); ?></label>
										<?php
										if ( function_exists( 'traveladvisor_var_tooltip_helptext' ) ) {
											echo traveladvisor_var_tooltip_helptext( traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_icon_hint' ) );
										}
										?>
									</div>
									<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
										<?php echo traveladvisor_var_icomoon_icons_box( $traveladvisor_var_counter_icon, $rand_id, 'traveladvisor_var_counter_icon' ); ?>
									</div>
								</div>
								<?php
								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_icon_color' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_icon_color_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_html( $traveladvisor_var_counter_icon_color ),
										'id' => 'traveladvisor_var_counter_icon_color',
										'classes' => 'bg_color',
										'cust_name' => 'traveladvisor_var_counter_icon_color[]',
										'return' => true,
									),
								);
								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_bgcolor' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_bgcolor_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_html( $traveladvisor_var_counter_background_color ),
										'id' => 'counter_background_color',
										'classes' => 'bg_color',
										'cust_name' => 'traveladvisor_var_counter_background_color[]',
										'return' => true,
									),
								);
								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_number' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_number_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_html( $traveladvisor_var_counter_number ),
										'cust_name' => 'traveladvisor_var_counter_number[]',
										'return' => true,
									),
								);
								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_number_color' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_number_color_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_html( $traveladvisor_var_counter_number_color ),
										'id' => 'counter_number_color',
										'classes' => 'bg_color',
										'cust_name' => 'traveladvisor_var_counter_number_color[]',
										'return' => true,
									),
								);
								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_separator_position' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_separator_position_hint' ),
									'echo' => true,
									'field_params' => array(
										'classes' => 'dropdown chosen-select',
										'std' => esc_html( $traveladvisor_var_counter_separator ),
										'cust_name' => 'traveladvisor_var_counter_separator[]',
										'options' => array(
											'Before Title' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_separator_position_before' ),
											'After Title' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_separator_position_after' ),
										),
										'return' => true,
									),
								);
								$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );



								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_counter_title' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_counter_title_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_html( $traveladvisor_var_counter_title ),
										'cust_name' => 'traveladvisor_var_counter_title[]',
										'return' => true,
									),
								);

								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );

								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_description' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_description_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_html( $traveladvisor_var_counter_desc ),
										'cust_name' => 'traveladvisor_var_counter_desc[]',
										'return' => true,
									),
								);

								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );

								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_description_color' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_description_color_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_html( $traveladvisor_var_counter_desc_color ),
										'classes' => 'bg_color',
										'id' => 'counter_desc_color',
										'cust_name' => 'traveladvisor_var_counter_desc_color[]',
										'return' => true,
									),
								);

								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
								?>

							</div>
							<?php
							if ( isset( $counter_num ) && $counter_num <> '' && isset( $atts_content ) && is_array( $atts_content ) ) {
								foreach ( $atts_content as $counter ) {

									$rand_id = rand( 3333, 99999 );
									$traveladvisor_var_counter_text = $counter['content'];
									$defaults = array(
										'traveladvisor_var_counter_title' => '',
										'traveladvisor_var_counter_number' => '',
										'traveladvisor_var_counter_item_icon' => '',
										'traveladvisor_var_counter_border_bottom' => ''
									);
									foreach ( $defaults as $key => $values ) {
										if ( isset( $counter['atts'][$key] ) ) {
											$$key = $counter['atts'][$key];
										} else {
											$$key = $values;
										}
									}
									?>
									<div class='cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content' id="traveladvisor_infobox_<?php echo traveladvisor_allow_special_char( $rand_id ); ?>">
										<header>
											<h4><i class='icon-arrows'></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter' ); ?></h4>
											<a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_shortcode_remove' ); ?></a>
										</header>
										<?php
										$traveladvisor_opt_array = array(
											'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_title' ),
											'desc' => '',
											'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_title_hint' ),
											'echo' => true,
											'field_params' => array(
												'std' => esc_attr( $traveladvisor_var_counter_title ),
												'cust_id' => '',
												'extra_atr' => 'data-content-text="cs-shortcode-textarea"',
												'cust_name' => 'traveladvisor_var_counter_title[]',
												'return' => true,
											),
										);

										$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );


										$traveladvisor_opt_array = array(
											'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_counter' ),
											'desc' => '',
											'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_counter_hint' ),
											'echo' => true,
											'classes' => 'txtfield',
											'field_params' => array(
												'std' => esc_attr( $traveladvisor_var_counter_number ),
												'cust_id' => '',
												'cust_name' => 'traveladvisor_var_counter_number[]',
												'return' => true,
											),
										);

										$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );



										$traveladvisor_opt_array = array(
											'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_border_bottom' ),
											'desc' => '',
											'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_border_bottom_hint' ),
											'echo' => true,
											'field_params' => array(
												'std' => esc_attr( $traveladvisor_var_counter_border_bottom ),
												'cust_id' => '',
												'extra_atr' => 'data-content-text="cs-shortcode-textarea"',
												'cust_name' => 'traveladvisor_var_counter_border_bottom[]',
												'return' => true,
											),
										);

										$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
										?>
										<div class="form-elements" id="traveladvisor_infobox_<?php echo esc_attr( $rand_id ); ?>">
											<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
												<label><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_icon' ); ?></label>
												<?php
												if ( function_exists( 'traveladvisor_var_tooltip_helptext' ) ) {
													echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_button_tooltip' );
												}
												?>
											</div>
											<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
												<?php echo traveladvisor_var_icomoon_icons_box( esc_html( $traveladvisor_var_counter_item_icon ), esc_attr( $rand_id ), 'traveladvisor_var_counter_item_icon' ); ?>
											</div>
										</div>

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
							'std' => traveladvisor_allow_special_char( $counter_num ),
							'id' => '',
							'before' => '',
							'after' => '',
							'classes' => 'fieldCounter',
							'extra_atr' => '',
							'cust_id' => '',
							'cust_name' => 'counter_num[]',
							'return' => true,
							'required' => false
						);
						//echo $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
						$html_hidden = $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
						echo traveladvisor_allow_special_char( $html_hidden );
						?>

					</div>
					<div class="wrapptabbox cs-pbwp-content cs-zero-padding">
						<div class="opt-conts">
							<ul class="form-elements">
								<div id="loading" class="shortcodeload"></div>
							</ul>
							<?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
								<ul class="form-elements insert-bg noborder">
									<li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:traveladvisor_shortcode_insert_editor('<?php echo str_replace( 'traveladvisor_var_page_builder_', '', $name ); ?>', 'shortcode-item-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ); ?>', '<?php echo traveladvisor_allow_special_char( $filter_element ); ?>')" ><?php _e( 'Insert', 'traveladvisor' ); ?></a> </li>
								</ul>
								<div id="results-shortocde"></div>
							<?php } else { ?>


								<?php
								$traveladvisor_opt_array = array(
									'std' => 'counter',
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
								//echo $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
								$html_hidden_render = $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
								echo traveladvisor_allow_special_char( $html_hidden_render );

								$traveladvisor_opt_array = array(
									'name' => '',
									'desc' => '',
									'hint_text' => '',
									'echo' => true,
									'field_params' => array(
										'std' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_shortcode_save' ),
										'cust_id' => 'counter_save' . $traveladvisor_counter,
										'cust_type' => 'button',
										'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
										'classes' => 'cs-traveladvisor-admin-btn',
										'cust_name' => 'counter_save',
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

		<?php
		if ( $die <> 1 ) {
			die();
		}
	}

	add_action( 'wp_ajax_traveladvisor_var_page_builder_counter', 'traveladvisor_var_page_builder_counter' );
}