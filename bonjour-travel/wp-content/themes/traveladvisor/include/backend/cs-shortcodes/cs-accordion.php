<?php
/*
 *
 * @Shortcode Name : Accordion
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_page_builder_accordion' ) ) {

	function traveladvisor_var_page_builder_accordion( $die = 0 ) {
		global $traveladvisor_var_static_text, $traveladvisor_node, $count_node, $post, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields;
		$strings = new traveladvisor_theme_all_strings;
		$strings->traveladvisor_short_code_strings();
		$shortcode_element = '';
		$filter_element = 'filterdrag';
		$shortcode_view = '';
		$output = array();
		$traveladvisor_counter = $_POST['counter'];
		$PREFIX = 'traveladvisor_accordion|accordion_item';
		$parseObject = new ShortcodeParse();
		$accordion_num = 0;
		if ( isset( $_POST['action'] ) && !isset( $_POST['shortcode_element_id'] ) ) {
			$POSTID = '';
			$shortcode_element_id = '';
		} else {
			$POSTID = $_POST['POSTID'];
			$shortcode_element_id = $_POST['shortcode_element_id'];
			$shortcode_str = stripslashes( $shortcode_element_id );
			$output = $parseObject->traveladvisor_shortcodes( $output, $shortcode_str, true, $PREFIX );
		}
		$defaults = array(
			'traveladvisor_var_column_size' => '',
			'class' => 'cs-accrodian',
			'accordian_style' => '',
			'accordion_animation' => '',
			'traveladvisor_var_accordian_main_title' => '',
			'traveladvisor_var_accordion_view' => ''
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
			$accordion_num = count( $atts_content );
		}
		$accordion_element_size = '50';
		foreach ( $defaults as $key => $values ) {
			if ( isset( $atts[$key] ) ) {
				$$key = $atts[$key];
			} else {
				$$key = $values;
			}
		}
		$name = 'traveladvisor_var_page_builder_accordion';
		$coloumn_class = 'column_' . $accordion_element_size;
		$traveladvisor_var_accordian_main_title = isset( $traveladvisor_var_accordian_main_title ) ? $traveladvisor_var_accordian_main_title : '';
		$traveladvisor_var_accordion_view = isset( $traveladvisor_var_accordion_view ) ? $traveladvisor_var_accordion_view : '';
		if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
			$shortcode_element = 'shortcode_element_class';
			$shortcode_view = 'cs-pbwp-shortcode';
			$filter_element = 'ajax-drag';
			$coloumn_class = '';
		}
		?>
		<div id="<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>_del" class="column  parentdelete <?php echo traveladvisor_allow_special_char( $coloumn_class ); ?> <?php echo traveladvisor_allow_special_char( $shortcode_view ); ?>" item="accordion" data="<?php echo traveladvisor_element_size_data_array_index( $accordion_element_size ) ?>" >
			<?php traveladvisor_element_setting( $name, $traveladvisor_counter, $accordion_element_size, '', 'list-ul' ); ?>
			<div class="cs-wrapp-class-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ) ?> <?php echo traveladvisor_allow_special_char( $shortcode_element ); ?>" id="<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>" data-shortcode-template="[<?php echo esc_attr( TRAVELADVISOR_SC_ACCORDION ); ?> {{attributes}}]" style="display: none;">
				<div class="cs-heading-area">
					<h5><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_edit_accordion_option' ); ?></h5>
					<a href="javascript:traveladvisor_frame_removeoverlay('<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>','<?php echo traveladvisor_allow_special_char( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-times"></i></a> </div>
				<div class="cs-clone-append cs-pbwp-content">
					<div class="cs-wrapp-tab-box">
						<div id="shortcode-item-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ); ?>" data-shortcode-template="{{child_shortcode}}[/<?php echo esc_attr( 'traveladvisor_accordion' ); ?>]" data-shortcode-child-template="[<?php echo esc_attr( 'accordion_item' ); ?> {{attributes}}] {{content}} [/<?php echo esc_attr( 'accordion_item' ); ?>]">
							<div class="cs-wrapp-clone cs-shortcode-wrapp cs-disable-true cs-pbwp-content" data-template="[<?php echo esc_attr( 'traveladvisor_accordion' ); ?> {{attributes}}]">
								<?php
								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_accordion_title' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_accordion_title_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => traveladvisor_allow_special_char( $traveladvisor_var_accordian_main_title ),
										'id' => 'traveladvisor_var_accordian_main_title',
										'cust_name' => 'traveladvisor_var_accordian_main_title[]',
										'classes' => '',
										'return' => true,
									),
								);
								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
								?>
								<?php
								if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
									traveladvisor_shortcode_element_size();
								}
								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_accordion_style' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_accordion_style_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_html( $traveladvisor_var_accordion_view ),
										'id' => '',
										'cust_name' => 'traveladvisor_var_accordion_view[]',
										'classes' => 'dropdown chosen-select',
										'options' => array(
											'simple' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_accordion_style_simple' ),
											'fancy' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_accordion_style_fancy' ),
										),
										'return' => true,
									),
								);
								$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
								?>
							</div>
							<?php
							if ( isset( $accordion_num ) && $accordion_num <> '' && isset( $atts_content ) && is_array( $atts_content ) ) {
								foreach ( $atts_content as $accordion ) {
									$rand_id = rand( 3333, 99999 );
									$traveladvisor_var_accordion_text = $accordion['content'];
									$defaults = array( 'traveladvisor_var_accordion_title' => 'Title', 'traveladvisor_var_accordion_active' => 'yes' );
									foreach ( $defaults as $key => $values ) {
										if ( isset( $accordion['atts'][$key] ) )
											$$key = $accordion['atts'][$key];
										else
											$$key = $values;
									}
									$traveladvisor_var_accordion_active = isset( $traveladvisor_var_accordion_active ) ? $traveladvisor_var_accordion_active : '';
									$traveladvisor_var_accordion_title = isset( $traveladvisor_var_accordion_title ) ? $traveladvisor_var_accordion_title : '';
									?>
									<div class='cs-wrapp-clone cs-shortcode-wrapp  cs-pbwp-content'  id="traveladvisor_infobox_<?php echo traveladvisor_allow_special_char( $rand_id ); ?>">
										<header>
											<h4><i class='icon-arrows'></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_accordion_accordion' ); ?></h4>
											<a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_accordion_remove' ); ?></a></header>
										<?php
										$traveladvisor_opt_array = array(
											'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_accordion_active' ),
											'desc' => '',
											'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_accordion_active_hint' ),
											'echo' => true,
											'field_params' => array(
												'std' => esc_attr( $traveladvisor_var_accordion_active ),
												'id' => '',
												'cust_name' => 'traveladvisor_var_accordion_active[]',
												'classes' => 'dropdown chosen-select',
												'options' => array(
													'yes' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_accordion_active_yes' ),
													'no' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_accordion_active_no' ),
												),
												'return' => true,
											),
										);
										$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
										$traveladvisor_opt_array = array(
											'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_accordion_accordion_title' ),
											'desc' => '',
											'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_accordion_accordion_title_hint' ),
											'echo' => true,
											'field_params' => array(
												'std' => traveladvisor_allow_special_char( $traveladvisor_var_accordion_title ),
												'id' => 'accordion_title',
												'cust_name' => 'traveladvisor_var_accordion_title[]',
												'classes' => '',
												'return' => true,
											),
										);
										$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );

										$traveladvisor_opt_array = array(
											'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_accordion_accordion_text' ),
											'desc' => '',
											'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_accordion_accordion_text_hint' ),
											'echo' => true,
											'field_params' => array(
												'std' => traveladvisor_allow_special_char( $traveladvisor_var_accordion_text ),
												'id' => 'accordion_text',
												'cust_id' => 'traveladvisor_var_accordion_text',
												'cust_name' => 'traveladvisor_var_accordion_text[]',
												'extra_atr' => ' data-content-text=cs-shortcode-textarea',
												'classes' => 'txtfield',
												'return' => true,
												'traveladvisor_editor' => true,
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
								'std' => $accordion_num,
								'id' => '',
								'before' => '',
								'after' => '',
								'classes' => 'fieldCounter',
								'extra_atr' => '',
								'cust_id' => '',
								'cust_name' => 'accordion_num[]',
								'return' => true,
								'required' => false
							);
							//echo $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render($traveladvisor_opt_array);
							$html_hidden = $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
							echo traveladvisor_allow_special_char( $html_hidden );
							?>
						</div>
						<div class="wrapptabbox">
							<div class="opt-conts">
								<ul class="form-elements noborder">
									<li class="to-field"> <a href="#" class="add_servicesss cs-main-btn" onclick="traveladvisor_shortcode_element_ajax_call('accordion', 'shortcode-item-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ); ?>', '<?php echo traveladvisor_allow_special_char( admin_url( 'admin-ajax.php' ) ); ?>')"><i class="icon-plus-circle"></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_add_accordion' ); ?></a> </li>
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
										'std' => 'accordion',
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
	}

	add_action( 'wp_ajax_traveladvisor_var_page_builder_accordion', 'traveladvisor_var_page_builder_accordion' );
}
