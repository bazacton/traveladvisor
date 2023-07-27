<?php
/*
 *
 * @File : Heading 
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_page_builder_heading' ) ) {

	function traveladvisor_var_page_builder_heading( $die = 0 ) {
		global $post, $traveladvisor_node, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields;
		if ( function_exists( 'traveladvisor_shortcode_names' ) ) {
			$shortcode_element = '';
			$filter_element = 'filterdrag';
			$shortcode_view = '';
			$traveladvisor_output = array();
			$TRAVELADVISOR_PREFIX = 'traveladvisor_heading';
			$traveladvisor_counter = isset( $_POST['counter'] ) ? $_POST['counter'] : '';
			if ( isset( $_POST['action'] ) && !isset( $_POST['shortcode_element_id'] ) ) {
				$TRAVELADVISOR_POSTID = '';
				$shortcode_element_id = '';
			} else {
				$TRAVELADVISOR_POSTID = isset( $_POST['POSTID'] ) ? $_POST['POSTID'] : '';
				$shortcode_element_id = isset( $_POST['shortcode_element_id'] ) ? $_POST['shortcode_element_id'] : '';
				$shortcode_str = stripslashes( $shortcode_element_id );
				$parseObject = new ShortcodeParse();
				$traveladvisor_output = $parseObject->traveladvisor_shortcodes( $traveladvisor_output, $shortcode_str, true, $TRAVELADVISOR_PREFIX );
			}
			$defaults = array(
				'traveladvisor_var_column_size' => '1',
				'traveladvisor_var_heading_section_title' => '',
				'traveladvisor_var_sub_heading_title' => '',
				'traveladvisor_var_heading_font_size' => '',
				'traveladvisor_var_heading_color' => '',
				'traveladvisor_var_heading_style' => '',
				'traveladvisor_var_heading_font_spacing' => '',
				'traveladvisor_var_heading_margin_bottom' => '',
				'traveladvisor_var_heading_align' => '',
				'traveladvisor_var_heading_font_style' => '',
				'traveladvisor_var_heading_sub_content_color' => '',
				'traveladvisor_var_text_transform' => '',
			);
			if ( isset( $traveladvisor_output['0']['atts'] ) ) {
				$atts = $traveladvisor_output['0']['atts'];
			} else {
				$atts = array();
			}
			if ( isset( $traveladvisor_output['0']['content'] ) ) {
				$heading_column_text = $traveladvisor_output['0']['content'];
			} else {
				$heading_column_text = '';
			}
			$heading_element_size = '25';
			foreach ( $defaults as $key => $values ) {
				if ( isset( $atts[$key] ) ) {
					$$key = $atts[$key];
				} else {
					$$key = $values;
				}
			}
			$name = 'traveladvisor_var_page_builder_heading';
			$coloumn_class = 'column_' . $heading_element_size;
			if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
				$shortcode_element = 'shortcode_element_class';
				$shortcode_view = 'cs-pbwp-shortcode';
				$filter_element = 'ajax-drag';
				$coloumn_class = '';
			}
			?>
			<div id="<?php echo esc_attr( $name . $traveladvisor_counter ) ?>_del" class="column  parentdelete <?php echo esc_attr( $coloumn_class ); ?>
					 <?php echo esc_attr( $shortcode_view ); ?>" item="heading" data="<?php echo traveladvisor_element_size_data_array_index( $heading_element_size ) ?>" >
					 <?php traveladvisor_element_setting( $name, $traveladvisor_counter, $heading_element_size ) ?>
				<div class="cs-wrapp-class-<?php echo intval( $traveladvisor_counter ) ?>
			<?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $traveladvisor_counter ) ?>" data-shortcode-template="[traveladvisor_heading {{attributes}}]{{content}}[/traveladvisor_heading]" style="display: none;">
					<div class="cs-heading-area" data-counter="<?php echo esc_attr( $traveladvisor_counter ) ?>">
						<h5><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_edit_heading_options' ); ?></h5>
						<a href="javascript:traveladvisor_frame_removeoverlay('<?php echo esc_js( $name . $traveladvisor_counter ) ?>','<?php echo esc_js( $filter_element ); ?>')" class="cs-btnclose">
							<i class="icon-times"></i>
						</a>
					</div>
					<div class="cs-pbwp-content">
						<script type="text/javascript">
			                jQuery(document).on('change', '.heading_style', function () {
			                    var traveladvisor_var_view = jQuery(this).val();
			                    if (traveladvisor_var_view == 'fancy') {
			                        jQuery('#fancy_heading').show();
			                    } else {
			                        jQuery('#fancy_heading').hide();
			                    }
			                });
						</script>
						<div class="cs-wrapp-clone cs-shortcode-wrapp">
							<?php
							if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
								traveladvisor_shortcode_element_size();
							}
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_title' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_title_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_heading_section_title ),
									'cust_id' => 'traveladvisor_var_heading_section_title' . $traveladvisor_counter,
									'classes' => '',
									'cust_name' => 'traveladvisor_var_heading_section_title[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_subtitle' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_subtitle_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_sub_heading_title ),
									'cust_id' => 'traveladvisor_var_sub_heading_title' . $traveladvisor_counter,
									'classes' => '',
									'cust_name' => 'traveladvisor_var_sub_heading_title[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_fontsize' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_fontsize_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_heading_font_size ),
									'cust_id' => 'traveladvisor_var_heading_font_size' . $traveladvisor_counter,
									'classes' => '',
									'cust_name' => 'traveladvisor_var_heading_font_size[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_text_transform' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_text_transform_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_text_transform ),
									'id' => '',
									'cust_name' => 'traveladvisor_var_text_transform[]',
									'classes' => 'dropdown chosen-select',
									'options' => array(
										'capitalize' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_capitalize' ),
										'initial' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_initial' ),
										'inherit' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_inherit' ),
										'lowercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_lowercase' ),
										'none' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_none' ),
										'uppercase' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_uppercase' ),
									),
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_letter_spacing' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_letter_spacing_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_heading_font_spacing ),
									'cust_id' => 'traveladvisor_var_heading_font_spacing' . $traveladvisor_counter,
									'classes' => '',
									'cust_name' => 'traveladvisor_var_heading_font_spacing[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_hbm' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_hbm_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_heading_margin_bottom ),
									'cust_id' => 'traveladvisor_var_heading_margin_bottom' . $traveladvisor_counter,
									'classes' => '',
									'cust_name' => 'traveladvisor_var_heading_margin_bottom[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_heading_color' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_heading_color_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_heading_color ),
									'cust_id' => 'traveladvisor_var_heading_color' . $traveladvisor_counter,
									'classes' => 'bg_color',
									'cust_name' => 'traveladvisor_var_heading_color[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_subtitle_color' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_subtitle_color_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_heading_sub_content_color ),
									'cust_id' => 'traveladvisor_var_heading_sub_content_color' . $traveladvisor_counter,
									'classes' => 'bg_color',
									'cust_name' => 'traveladvisor_var_heading_sub_content_color[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_type' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_type_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_heading_style ),
									'id' => '',
									'cust_name' => 'traveladvisor_var_heading_style[]',
									'classes' => 'dropdown chosen-select',
									'options' => array(
										'1' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_h1' ),
										'2' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_h2' ),
										'3' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_h3' ),
										'4' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_h4' ),
										'5' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_h5' ),
										'6' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_h6' ),
									),
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_align' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_align_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_heading_align ),
									'id' => '',
									'cust_name' => 'traveladvisor_var_heading_align[]',
									'classes' => 'dropdown chosen-select',
									'options' => array(
										'left' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_left' ),
										'right' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_right' ),
										'center' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_center' ),
									),
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_font_style' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_font_style_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_heading_font_style ),
									'id' => '',
									'cust_name' => 'traveladvisor_var_heading_font_style[]',
									'classes' => 'dropdown chosen-select',
									'options' => array(
										'normal' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_normal' ),
										'italic' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_italic' ),
										'oblique' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_heading_oblique' ),
									),
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
							?>
						</div>
			<?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
							<ul class="form-elements insert-bg">
								<li class="to-field">
									<a class="insert-btn cs-main-btn" onclick="javascript:traveladvisor_shortcode_insert_editor('<?php echo str_replace( 'traveladvisor_var_page_builder_', '', $name ); ?>', '<?php echo esc_js( $name . $traveladvisor_counter ) ?>', '<?php echo esc_js( $filter_element ); ?>')" ><?php _e( 'Insert', 'traveladvisor' ); ?></a>
								</li>
							</ul>
							<div id="results-shortocde"></div>
						<?php } else { ?>
							<?php
							$traveladvisor_opt_array = array(
								'std' => 'heading',
								'id' => '',
								'before' => '',
								'after' => '',
								'classes' => '',
								'extra_atr' => '',
								'cust_id' => 'traveladvisor_orderby' . $traveladvisor_counter,
								'cust_name' => 'traveladvisor_orderby[]',
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
									'cust_id' => 'heading_save' . $traveladvisor_counter,
									'cust_type' => 'button',
									'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
									'classes' => 'cs-traveladvisor-admin-btn',
									'cust_name' => 'heading_save',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
						}
						?>
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
			</div>
			<?php
		}
		if ( $die <> 1 ) {
			die();
		}
	}

	add_action( 'wp_ajax_traveladvisor_var_page_builder_heading', 'traveladvisor_var_page_builder_heading' );
}
 