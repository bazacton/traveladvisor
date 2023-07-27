<?php
/*
 *
 * @Shortcode Name : Infobox
 * @retrun
 *
 * 
 */
if ( !function_exists( 'traveladvisor_var_page_builder_infobox' ) ) {

	function traveladvisor_var_page_builder_infobox( $die = 0 ) {
		global $traveladvisor_node, $count_node, $post, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields;
		$shortcode_element = '';
		$filter_element = 'filterdrag';
		$shortcode_view = '';
		$output = array();
		$traveladvisor_counter = $_POST['counter'];
		$infobox_num = 0;
		if ( isset( $_POST['action'] ) && !isset( $_POST['shortcode_element_id'] ) ) {
			$POSTID = '';
			$shortcode_element_id = '';
		} else {
			$POSTID = $_POST['POSTID'];
			$shortcode_element_id = $_POST['shortcode_element_id'];
			$shortcode_str = stripslashes( $shortcode_element_id );
			$PREFIX = 'traveladvisor_infobox|traveladvisor_infobox_item';
			$parseObject = new ShortcodeParse();
			$output = $parseObject->traveladvisor_shortcodes( $output, $shortcode_str, true, $PREFIX );
		}
		$defaults = array(
			'traveladvisor_var_column_size' => '',
			'traveladvisor_var_infobox_section_title' => '',
			'traveladvisor_var_infobox_title_color' => '',
			'traveladvisor_var_infobox_icon_color' => '',
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
			$infobox_num = count( $atts_content );
		}
		$infobox_element_size = '25';
		foreach ( $defaults as $key => $values ) {
			if ( isset( $atts[$key] ) ) {
				$$key = $atts[$key];
			} else {
				$$key = $values;
			}
		}
		$name = 'traveladvisor_var_page_builder_infobox';
		$coloumn_class = 'column_' . $infobox_element_size;
		$traveladvisor_var_infobox_section_title = isset( $traveladvisor_var_infobox_section_title ) ? $traveladvisor_var_infobox_section_title : '';
		$traveladvisor_var_infobox_title_color = isset( $traveladvisor_var_infobox_title_color ) ? $traveladvisor_var_infobox_title_color : '';
		$traveladvisor_var_infobox_icon_color = isset( $traveladvisor_var_infobox_icon_color ) ? $traveladvisor_var_infobox_icon_color : '';

		if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
			$shortcode_element = 'shortcode_element_class';
			$shortcode_view = 'cs-pbwp-shortcode';
			$filter_element = 'ajax-drag';
			$coloumn_class = '';
		}
		?>
		<div id="<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>_del" class="column  parentdelete <?php echo traveladvisor_allow_special_char( $coloumn_class ); ?> <?php echo traveladvisor_allow_special_char( $shortcode_view ); ?>" item="infobox" data="<?php echo traveladvisor_element_size_data_array_index( $infobox_element_size ) ?>" >
			<?php traveladvisor_element_setting( $name, $traveladvisor_counter, $infobox_element_size, '', 'comments-o', $type = '' ); ?>
			<div class="cs-wrapp-class-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ) ?> <?php echo traveladvisor_allow_special_char( $shortcode_element ); ?>" id="<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>" style="display: none;">
				<div class="cs-heading-area">
					<h5><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_infobox_edit_infobox_options' ); ?></h5>
					<a href="javascript:traveladvisor_frame_removeoverlay('<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>','<?php echo traveladvisor_allow_special_char( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-times"></i></a>
				</div>
				<div class="cs-clone-append cs-pbwp-content">
					<div class="cs-wrapp-tab-box">
						<div id="shortcode-item-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ); ?>" data-shortcode-template="{{child_shortcode}} [/traveladvisor_infobox]" data-shortcode-child-template="[traveladvisor_infobox_item {{attributes}}] {{content}} [/traveladvisor_infobox_item]">
							<div class="cs-wrapp-clone cs-shortcode-wrapp cs-disable-true cs-pbwp-content" data-template="[traveladvisor_infobox {{attributes}}]">
								<?php
								if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
									traveladvisor_shortcode_element_size();
								}
								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_infobox_title_main' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_infobox_title_main_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => traveladvisor_allow_special_char( $traveladvisor_var_infobox_section_title ),
										'id' => 'traveladvisor_var_infobox_section_title' . $traveladvisor_counter,
										'cust_name' => 'traveladvisor_var_infobox_section_title[]',
										'classes' => '',
										'return' => true,
									),
								);
								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_infobox_title_color' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_infobox_title_color_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $traveladvisor_var_infobox_title_color ),
										'cust_id' => 'traveladvisor_var_infobox_title_color' . $traveladvisor_counter,
										'classes' => 'bg_color',
										'cust_name' => 'traveladvisor_var_infobox_title_color[]',
										'return' => true,
									),
								);
								//$traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_infobox_icon_color' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_infobox_icon_color_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $traveladvisor_var_infobox_icon_color ),
										'cust_id' => 'traveladvisor_var_infobox_icon_color' . $traveladvisor_counter,
										'classes' => 'bg_color',
										'cust_name' => 'traveladvisor_var_infobox_icon_color[]',
										'return' => true,
									),
								);
								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
								?>
							</div>
							<?php
							if ( isset( $infobox_num ) && $infobox_num <> '' && isset( $atts_content ) && is_array( $atts_content ) ) {
								foreach ( $atts_content as $infobox ) {
									$rand_id = rand( 3333, 99999 );
									$traveladvisor_var_infobox_text = $infobox['content'];
									$defaults = array(
										'traveladvisor_var_infobox_element_title' => '',
										'traveladvisor_var_infobox_text_color' => '',
										'traveladvisor_var_infobox_icon' => '',
									);
									foreach ( $defaults as $key => $values ) {
										if ( isset( $infobox['atts'][$key] ) )
											$$key = $infobox['atts'][$key];
										else
											$$key = $values;
									}
									$traveladvisor_var_infobox_element_title = isset( $traveladvisor_var_infobox_element_title ) ? $traveladvisor_var_infobox_element_title : '';
									$traveladvisor_var_infobox_text_color = isset( $traveladvisor_var_infobox_text_color ) ? $traveladvisor_var_infobox_text_color : '';
									$traveladvisor_var_infobox_icon = isset( $traveladvisor_var_infobox_icon ) ? $traveladvisor_var_infobox_icon : '';
									?>
									<div class='cs-wrapp-clone cs-shortcode-wrapp  cs-pbwp-content'  id="traveladvisor_infobox_<?php echo traveladvisor_allow_special_char( $rand_id ); ?>">
										<header>
											<h4><i class='icon-arrows'></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_infobox_infobox' ); ?></h4>
											<a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_shortcode_remove' ); ?></a></header>
										<?php
										$traveladvisor_opt_array = array(
											'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_infobox_title' ),
											'desc' => '',
											'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_infobox_title_hint' ),
											'echo' => true,
											'field_params' => array(
												'std' => traveladvisor_allow_special_char( $traveladvisor_var_infobox_element_title ),
												'id' => 'traveladvisor_var_infobox_element_title' . $traveladvisor_counter,
												'cust_name' => 'traveladvisor_var_infobox_element_title[]',
												'classes' => '',
												'return' => true,
											),
										);
										//$traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
										?>
										<div class="form-elements" id="traveladvisor_infobox_<?php echo esc_attr( $rand_id ); ?>">
											<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
												<label><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_infobox_icon' ); ?></label>
												<?php
												if ( function_exists( 'traveladvisor_var_tooltip_helptext' ) ) {
													echo traveladvisor_var_tooltip_helptext( traveladvisor_var_theme_text_srt( 'traveladvisor_var_infobox_icon_hint' ) );
												}
												?>
											</div>
											<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
												<?php echo traveladvisor_var_icomoon_icons_box( esc_html( $traveladvisor_var_infobox_icon ), esc_attr( $rand_id ), 'traveladvisor_var_infobox_icon' ); ?>
											</div>
										</div>
										<?php
										$traveladvisor_opt_array = array(
											'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_infobox_contents' ),
											'desc' => '',
											'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_infobox_contents_hint' ),
											'echo' => true,
											'field_params' => array(
												'std' => traveladvisor_allow_special_char( $traveladvisor_var_infobox_text ),
												'cust_id' => 'traveladvisor_var_infobox_text',
												'extra_atr' => 'data-content-text=cs-shortcode-textarea',
												'cust_name' => 'traveladvisor_var_infobox_text[]',
												'classes' => '',
												'traveladvisor_editor' => true,
												'return' => true,
											),
										);
										$traveladvisor_var_html_fields->traveladvisor_var_textarea_field( $traveladvisor_opt_array );
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
								'std' => $infobox_num,
								'id' => '',
								'before' => '',
								'after' => '',
								'classes' => 'fieldCounter',
								'extra_atr' => '',
								'cust_id' => '',
								'cust_name' => 'infobox_num[]',
								'return' => true,
								'required' => false
							);
							// echo $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render($traveladvisor_opt_array);
							$html_hidden = $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
							echo traveladvisor_allow_special_char( $html_hidden );
							?>
						</div>
						<div class="wrapptabbox">
							<div class="opt-conts">
								<ul class="form-elements noborder">
									<li class="to-field"> <a href="#" class="add_servicesss cs-main-btn" onclick="traveladvisor_shortcode_element_ajax_call('infobox', 'shortcode-item-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ); ?>', '<?php echo traveladvisor_allow_special_char( admin_url( 'admin-ajax.php' ) ); ?>')"><i class="icon-plus-circle"></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_add_infobox' ); ?></a> </li>
									<div id="loading" class="shortcodeload"></div>
								</ul>
								<?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
									<ul class="form-elements insert-bg">
										<li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:traveladvisor_shortcode_insert_editor('<?php echo esc_js( str_replace( 'traveladvisor_var_page_builder_', '', $name ) ); ?>', 'shortcode-item-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ); ?>', '<?php echo traveladvisor_allow_special_char( $filter_element ); ?>')" ><?php _e( 'Insert', 'traveladvisor' ); ?></a> </li>
									</ul>
									<div id="results-shortocde"></div>
								<?php } else { ?>
									<?php
									$traveladvisor_opt_array = array(
										'std' => 'infobox',
										'id' => '',
										'before' => '',
										'after' => '',
										'classes' => '',
										'extra_atr' => '',
										'cust_id' => '',
										'cust_name' => 'traveladvisor_orderby[]',
										'return' => true,
										'required' => false
									);
									//echo $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
									$html_hidden_render = $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
									echo traveladvisor_allow_special_char( $html_hidden_render );
									?>
									<?php
									$traveladvisor_opt_array = array(
										'name' => '',
										'desc' => '',
										'hint_text' => '',
										'echo' => true,
										'field_params' => array(
											'std' => 'Save',
											'cust_id' => '',
											'cust_type' => 'button',
											'classes' => 'cs-admin-btn',
											'cust_name' => '',
											'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
											'return' => true,
										),
									);
									$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
									?>
								<?php } ?>
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
		?>
		<?php
	}

	add_action( 'wp_ajax_traveladvisor_var_page_builder_infobox', 'traveladvisor_var_page_builder_infobox' );
}
