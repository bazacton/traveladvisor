<?php
/*
 *
 * @Shortcode Name : multi_counters
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_page_builder_counters' ) ) {

	function traveladvisor_var_page_builder_counters( $die = 0 ) {
		global $post, $traveladvisor_node, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields;
		$shortcode_element = '';
		$filter_element = 'filterdrag';
		$shortcode_view = '';
		$output = array();
		$traveladvisor_counter = $_POST['counter'];
		$multi_counters_num = 0;
		if ( isset( $_POST['action'] ) && !isset( $_POST['shortcode_element_id'] ) ) {
			$TRAVELADVISOR_POSTID = '';
			$shortcode_element_id = '';
		} else {
			$TRAVELADVISOR_POSTID = $_POST['POSTID'];
			$shortcode_element_id = $_POST['shortcode_element_id'];
			$shortcode_str = stripslashes( $shortcode_element_id );
			$TRAVELADVISOR_PREFIX = 'counters|counters_item';
			$parseObject = new ShortcodeParse();
			$output = $parseObject->traveladvisor_shortcodes( $output, $shortcode_str, true, $TRAVELADVISOR_PREFIX );
		}
		$defaults = array(
			'traveladvisor_var_multi_counters_title' => '',
			'traveladvisor_var_multi_counters_sub_title' => '',
			'traveladvisor_var_counter_view' => '',
			'traveladvisor_var_counter_content_align' => '',
			'traveladvisor_var_item_column_size' => '',
			'traveladvisor_var_multi_counters_title_color' => '',
			'traveladvisor_var_counter_background_color' => '',
			'traveladvisor_var_counter_border_color' => '',
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
			$multi_counters_num = count( $atts_content );
		}
		$multi_counters_element_size = '100';
		foreach ( $defaults as $key => $values ) {
			if ( isset( $atts[$key] ) ) {
				$$key = $atts[$key];
			} else {
				$$key = $values;
			}
		}
		$traveladvisor_var_multi_counters_title = isset( $traveladvisor_var_multi_counters_title ) ? $traveladvisor_var_multi_counters_title : '';
		$traveladvisor_var_multi_counters_sub_title = isset( $traveladvisor_var_multi_counters_sub_title ) ? $traveladvisor_var_multi_counters_sub_title : '';
		$traveladvisor_var_item_column_size = isset( $traveladvisor_var_item_column_size ) ? $traveladvisor_var_item_column_size : '';
		$traveladvisor_var_multi_counters_title_color = isset( $traveladvisor_var_multi_counters_title_color ) ? $traveladvisor_var_multi_counters_title_color : '';
		$traveladvisor_var_counter_background_color = isset( $traveladvisor_var_counter_background_color ) ? $traveladvisor_var_counter_background_color : '';
		$traveladvisor_var_counter_border_color = isset( $traveladvisor_var_counter_border_color ) ? $traveladvisor_var_counter_border_color : '';
		$traveladvisor_var_counter_view = isset( $traveladvisor_var_counter_view ) ? $traveladvisor_var_counter_view : '';

		$name = 'traveladvisor_var_page_builder_counters';
		$coloumn_class = 'column_' . $multi_counters_element_size;
		if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
			$shortcode_element = 'shortcode_element_class';
			$shortcode_view = 'cs-pbwp-shortcode';
			$filter_element = 'ajax-drag';
			$coloumn_class = '';
		}
		?>
		<div id="<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>_del" class="column  parentdelete <?php echo traveladvisor_allow_special_char( $coloumn_class ); ?> <?php echo traveladvisor_allow_special_char( $shortcode_view ); ?>" item="counters" data="<?php echo traveladvisor_element_size_data_array_index( $multi_counters_element_size ) ?>" >
			<?php traveladvisor_element_setting( $name, $traveladvisor_counter, $multi_counters_element_size, '', 'comments-o', $type = '' ); ?>
			<div class="cs-wrapp-class-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ) ?> <?php echo traveladvisor_allow_special_char( $shortcode_element ); ?>" id="<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>" style="display: none;">
				<div class="cs-heading-area">
					<h5><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_edit_counters_option' ); ?></h5>
					<a href="javascript:traveladvisor_frame_removeoverlay('<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>','<?php echo traveladvisor_allow_special_char( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-times"></i></a>
				</div>
				<div class="cs-clone-append cs-pbwp-content">
					<div class="cs-wrapp-tab-box">
						<div id="shortcode-item-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ); ?>" data-shortcode-template="{{child_shortcode}} [/counters]" data-shortcode-child-template="[counters_item {{attributes}}] {{content}} [/counters_item]">
							<div class="cs-wrapp-clone cs-shortcode-wrapp cs-disable-true cs-pbwp-content" data-template="[counters {{attributes}}]">
								<?php
								if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
									traveladvisor_shortcode_element_size();
								}
								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_element_title' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_element_title_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $traveladvisor_var_multi_counters_title ),
										'cust_id' => '',
										'cust_name' => 'traveladvisor_var_multi_counters_title[]',
										'return' => true,
									),
								);
								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_item_size' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_item_size_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => $traveladvisor_var_item_column_size,
										'cust_id' => 'traveladvisor_var_item_column_size',
										'id' => 'item_column_size',
										'cust_type' => 'button',
										'classes' => 'column_size  dropdown chosen-select-no-single select-medium',
										'cust_name' => 'traveladvisor_var_item_column_size[]',
										'extra_atr' => '',
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

								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_view' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_view_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_html( $traveladvisor_var_counter_view ),
										'cust_name' => 'traveladvisor_var_counter_view[]',
										'cust_id' => 'traveladvisor_var_counter_view' . $traveladvisor_counter,
										'classes' => 'dropdown chosen-select',
										'extra_atr' => 'onchange="counter_hide(this.value)"',
										'options' => array(
											'box' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_view_box' ),
											'simple' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_view_simple' ),
										),
										'return' => true,
									)
								);
								$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );

								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_icon_color' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_icon_color_hint' ),
									'echo' => true,
									'classes' => 'txtfield',
									'field_params' => array(
										'std' => esc_attr( $traveladvisor_var_multi_counters_title_color ),
										'cust_id' => '',
										'classes' => 'bg_color',
										'cust_name' => 'traveladvisor_var_multi_counters_title_color[]',
										'return' => true,
									),
								);
								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
								$display = '';
								$display = $traveladvisor_var_counter_view == 'simple' ? 'none' : 'block';
								echo '<div class="counter_div" style=" display:' . $display . ' ">';

								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_bgcolor' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_bgcolor_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $traveladvisor_var_counter_background_color ),
										'id' => 'traveladvisor_var_counter_background_color',
										'cust_name' => 'traveladvisor_var_counter_background_color[]',
										'classes' => 'bg_color',
										'return' => true,
									),
								);
								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
								echo '</div>';
								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_number_color' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_number_color_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $traveladvisor_var_counter_border_color ),
										'cust_id' => 'traveladvisor_var_counter_border_color',
										'classes' => 'bg_color',
										'cust_name' => 'traveladvisor_var_counter_border_color[]',
										'return' => true,
									),
								);

								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
								?>
							</div>
							<?php
							if ( isset( $multi_counters_num ) && $multi_counters_num <> '' && isset( $atts_content ) && is_array( $atts_content ) ) {
								foreach ( $atts_content as $multi_counters ) {
									$rand_string = rand( 123456, 987654 );
									$traveladvisor_var_multi_counters_text = $multi_counters['content'];
									$defaults = array(
										'traveladvisor_multi_counters_class' => '',
										'traveladvisor_var_multiple_counter_title' => '',
										'traveladvisor_var_multi_counters_background_color' => '',
										'traveladvisor_var_counters_icon' => '',
										'traveladvisor_var_link_url' => '',
										'traveladvisor_var_multiple_counter_logo_array' => '',
										'traveladvisor_var_counter_icon_position' => '',
										'traveladvisor_var_counter_padding_left' => '',
										'traveladvisor_var_counter_padding_right' => '',
										'traveladvisor_var_counter_border' => '',
									);
									foreach ( $defaults as $key => $values ) {
										if ( isset( $multi_counters['atts'][$key] ) ) {
											$$key = $multi_counters['atts'][$key];
										} else {
											$$key = $values;
										}
									}
									$traveladvisor_var_multiple_counter_title = isset( $traveladvisor_var_multiple_counter_title ) ? $traveladvisor_var_multiple_counter_title : '';
									$traveladvisor_var_multi_counters_background_color = isset( $traveladvisor_var_multi_counters_background_color ) ? $traveladvisor_var_multi_counters_background_color : '';
									$traveladvisor_var_counters_icon = isset( $traveladvisor_var_counters_icon ) ? $traveladvisor_var_counters_icon : '';
									$traveladvisor_var_counter_icon_size = isset( $traveladvisor_var_counter_icon_size ) ? $traveladvisor_var_counter_icon_size : '';

									$traveladvisor_var_counter_icon_position = isset( $traveladvisor_var_counter_icon_position ) ? $traveladvisor_var_counter_icon_position : '';
									$traveladvisor_var_counter_padding_left = isset( $traveladvisor_var_counter_padding_left ) ? $traveladvisor_var_counter_padding_left : '';
									$traveladvisor_var_counter_padding_right = isset( $traveladvisor_var_counter_padding_right ) ? $traveladvisor_var_counter_padding_right : '';
									$traveladvisor_var_counter_border = isset( $traveladvisor_var_counter_border ) ? $traveladvisor_var_counter_border : '';
									$traveladvisor_var_link_url = isset( $traveladvisor_var_link_url ) ? $traveladvisor_var_link_url : '';
									?>
									<div class='cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content' id="traveladvisor_infobox_<?php echo traveladvisor_allow_special_char( $rand_string ); ?>">
										<header>
											<h4><i class='icon-arrows'></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_multicounters' ); ?></h4>
											<a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_shortcode_remove' ); ?></a>
										</header>
				<?php
				$traveladvisor_opt_array = array(
					'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_title' ),
					'desc' => '',
					'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_title_hint' ),
					'echo' => true,
					'field_params' => array(
						'std' => esc_attr( $traveladvisor_var_multiple_counter_title ),
						'cust_id' => 'traveladvisor_var_multiple_counter_title',
						'classes' => '',
						'cust_name' => 'traveladvisor_var_multiple_counter_title[]',
						'return' => true,
					),
				);
				$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
				$display = $traveladvisor_var_multi_counters_view == 'widget_view' ? 'none' : 'block';
				$rand_id = rand( 123450, 854987 );
				?>	 				
										<div class='counter_icon' style=" display:<?php echo esc_attr( $display ); ?>">
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
				<?php echo traveladvisor_var_icomoon_icons_box( $traveladvisor_var_counters_icon, esc_attr( $rand_id ), 'traveladvisor_var_counters_icon' ); ?>
												</div>
											</div>
										</div>
				<?php
				$traveladvisor_opt_array = array(
					'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_separator_position' ),
					'desc' => '',
					'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_separator_position_hint' ),
					'echo' => true,
					'field_params' => array(
						'std' => esc_attr( $traveladvisor_var_counter_icon_position ),
						'id' => '',
						'cust_name' => 'traveladvisor_var_counter_icon_position[]',
						'classes' => 'dropdown chosen-select',
						'options' => array(
							'Before Title' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_separator_position_before' ),
							'After Title' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_separator_position_after' ),
						),
						'return' => true,
					),
				);
				$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );

				$traveladvisor_opt_array = array(
					'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_description' ),
					'desc' => '',
					'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_description_hint' ),
					'echo' => true,
					'field_params' => array(
						'std' => esc_attr( $traveladvisor_var_multi_counters_text ),
						'cust_id' => 'traveladvisor_var_multi_counters_text',
						'extra_atr' => 'data-content-text=cs-shortcode-textarea',
						'cust_name' => 'traveladvisor_var_multi_counters_text[]',
						'classes' => '',
						'return' => true,
						'traveladvisor_editor' => true,
					),
				);
				$traveladvisor_var_html_fields->traveladvisor_var_textarea_field( $traveladvisor_opt_array );
				echo '<div class="counter_icon" style=" display:' . $display . ' ">';
				$traveladvisor_opt_array = array(
					'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_number' ),
					'desc' => '',
					'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_counter_number_hint' ),
					'echo' => true,
					'field_params' => array(
						'std' => esc_attr( $traveladvisor_var_counter_padding_left ),
						'cust_id' => 'traveladvisor_var_counter_padding_left',
						'classes' => '',
						'cust_name' => 'traveladvisor_var_counter_padding_left[]',
						'return' => true,
					),
				);
				$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
				echo '</div>';
				?>
									</div>

										<?php
									}
								}
								?>
						</div>
						<div class="hidden-object">
							<?php
							$traveladvisor_opt_array = array(
								'std' => traveladvisor_allow_special_char( $multi_counters_num ),
								'id' => '',
								'before' => '',
								'after' => '',
								'classes' => 'fieldCounter',
								'extra_atr' => '',
								'cust_id' => '',
								'cust_name' => 'multi_counters_num[]',
								'return' => false,
								'required' => false
							);
							$traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
							?>
						</div>
						<div class="wrapptabbox cs-pbwp-content cs-zero-padding">
							<div class="opt-conts">
								<ul class="form-elements">
									<li class="to-field"> <a href="#" class="add_countersss cs-main-btn" onclick="traveladvisor_shortcode_element_ajax_call('counters', 'shortcode-item-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ); ?>', '<?php echo admin_url( 'admin-ajax.php' ); ?>')"><i class="icon-plus-circle"></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_add_multicounters' ); ?></a> </li>
									<div id="loading" class="shortcodeload"></div>
								</ul>
		<?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
									<ul class="form-elements insert-bg noborder">
										<li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:traveladvisor_shortcode_insert_editor('<?php echo str_replace( 'traveladvisor_var_page_builder_', '', $name ); ?>', 'shortcode-item-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ); ?>', '<?php echo traveladvisor_allow_special_char( $filter_element ); ?>')" ><?php esc_html_e( 'Insert', 'traveladvisor' ); ?></a> </li>
									</ul>
									<div id="results-shortocde"></div>
		<?php } else { ?>
			<?php
			$traveladvisor_opt_array = array(
				'std' => 'counters',
				'id' => '',
				'before' => '',
				'after' => '',
				'classes' => '',
				'extra_atr' => '',
				'cust_id' => 'traveladvisor_orderby' . $traveladvisor_counter,
				'cust_name' => 'traveladvisor_orderby[]',
				'return' => false,
				'required' => false
			);
			$traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
			$traveladvisor_opt_array = array(
				'name' => '',
				'desc' => '',
				'hint_text' => '',
				'echo' => true,
				'field_params' => array(
					'std' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_shortcode_save' ),
					'cust_id' => 'multi_counters_save' . $traveladvisor_counter,
					'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
					'cust_type' => 'button',
					'classes' => 'cs-traveladvisor-admin-btn',
					'cust_name' => 'multi_counters_save',
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

	add_action( 'wp_ajax_traveladvisor_var_page_builder_counters', 'traveladvisor_var_page_builder_counters' );
}