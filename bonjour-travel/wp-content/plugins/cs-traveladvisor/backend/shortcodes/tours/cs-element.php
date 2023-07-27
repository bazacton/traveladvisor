<?php
/*
 *
 * @File : tour 
 * @retrun
 *
 */
if ( ! function_exists( 'traveladvisor_var_page_builder_tour' ) ) {

	function traveladvisor_var_page_builder_tour( $die = 0 ) {
		global $post, $traveladvisor_node, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields, $traveladvisor_var_static_text;
		$strings = new traveladvisor_plugin_all_strings;
		$strings->traveladvisor_plugin_activation_strings();
		if ( function_exists( 'traveladvisor_shortcode_names' ) ) {
			$shortcode_element = '';
			$filter_element = 'filterdrag';
			$shortcode_view = '';
			$traveladvisor_output = array();
			$TRAVELADVISOR_PREFIX = 'traveladvisor_tour';
			$counter = isset( $_POST['counter'] ) ? $_POST['counter'] : '';
			$traveladvisor_counter = isset( $_POST['counter'] ) ? $_POST['counter'] : '';
			if ( isset( $_POST['action'] ) && ! isset( $_POST['shortcode_element_id'] ) ) {
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
				'traveladvisor_var_tour_sorting' => '',
				'traveladvisor_var_tour_element_title' => '',
				'traveladvisor_var_tour_view' => '',
				'traveladvisor_var_tour_filteration' => '',
				'traveladvisor_var_tour_category' => '',
				'traveladvisor_var_tour_paging_filter_style' => '',
				'traveladvisor_var_tour_item_per_page' => '',
				'traveladvisor_var_tour_column' => '',
				'traveladvisor_var_tour_excerpt' => '',
				'traveladvisor_var_tour_excerpt_length' => '',
				'traveladvisor_inventories_counter' => rand( 10000000, 99999999 )
			);
			if ( isset( $traveladvisor_output['0']['atts'] ) ) {
				$atts = $traveladvisor_output['0']['atts'];
			} else {
				$atts = array();
			}
			if ( isset( $traveladvisor_output['0']['content'] ) ) {
				$tour_column_text = $traveladvisor_output['0']['content'];
			} else {
				$tour_column_text = '';
			}
			$tour_element_size = '25';
			foreach ( $defaults as $key => $values ) {
				if ( isset( $atts[$key] ) ) {
					$$key = $atts[$key];
				} else {
					$$key = $values;
				}
			}
			$name = 'traveladvisor_var_page_builder_tour';
			$coloumn_class = 'column_' . $tour_element_size;
			if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
				$shortcode_element = 'shortcode_element_class';
				$shortcode_view = 'cs-pbwp-shortcode';
				$filter_element = 'ajax-drag';
				$coloumn_class = '';
			}
			?>
			<div id="<?php echo esc_attr( $name . $traveladvisor_counter ) ?>_del" class="column  parentdelete <?php echo esc_attr( $coloumn_class ); ?>
					 <?php echo esc_attr( $shortcode_view ); ?>" item="tour" data="<?php echo traveladvisor_element_size_data_array_index( $tour_element_size ) ?>" >
					 <?php traveladvisor_element_setting( $name, $traveladvisor_counter, $tour_element_size ) ?>
				<div class="cs-wrapp-class-<?php echo intval( $traveladvisor_counter ) ?>
			<?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $traveladvisor_counter ) ?>" data-shortcode-template="[traveladvisor_tour {{attributes}}]{{content}}[/traveladvisor_tour]" style="display: none;">
					<div class="cs-heading-area" data-counter="<?php echo esc_attr( $traveladvisor_counter ) ?>">
						<h5><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_edit_tour_option' ); ?></h5>
						<a href="javascript:traveladvisor_frame_removeoverlay('<?php echo esc_js( $name . $traveladvisor_counter ) ?>','<?php echo esc_js( $filter_element ); ?>')" class="cs-btnclose">
							<i class="icon-times"></i>
						</a>
					</div>
					<div class="cs-pbwp-content">
						<div class="cs-wrapp-clone cs-shortcode-wrapp">
							<?php
							if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
								traveladvisor_shortcode_element_size();
							}
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_title' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_enter_tour_element_title' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_tour_element_title ),
									'cust_id' => 'traveladvisor_var_tour_element_title' . $traveladvisor_counter,
									'classes' => '',
									'cust_name' => 'traveladvisor_var_tour_element_title[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );

							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_tour_views' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_select_tour_styles' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_tour_view ),
									'id' => '',
									'extra_atr' => 'onchange="tour_excerpt_hide(this.value)"',
									'cust_name' => 'traveladvisor_var_tour_view[]',
									'classes' => 'dropdown chosen-select',
									'options' => array(
										'' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_tour_please_select' ),
										'tour_listing' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_tours_listing' ),
										'tour_grid' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_tours_grid' ),
									),
									'return' => true,
								)
							);
							$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_tour_filtration' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_tour_filtration_on_off' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_tour_filteration ),
									'id' => '',
									'cust_name' => 'traveladvisor_var_tour_filteration[]',
									'cust_id' => 'traveladvisor_var_tour_filteration' . $traveladvisor_counter,
									'classes' => 'dropdown chosen-select',
									'options' => array(
										'yes' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_tour_yes' ),
										'no' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_tour_no' ),
									),
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_tour_sorting' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_tour_view_sorting_on_off' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_tour_sorting ),
									'id' => '',
									'cust_name' => 'traveladvisor_var_tour_sorting[]',
									'cust_id' => 'traveladvisor_var_tour_sorting' . $traveladvisor_counter,
									'classes' => 'dropdown chosen-select',
									'options' => array(
										'on' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_on' ),
										'off' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_off' ),
									),
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_paging_style' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_select_paging_view_from_this_dropdown' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_tour_paging_filter_style ),
									'cust_id' => 'traveladvisor_var_tour_paging_filter_style' . $traveladvisor_counter,
									'cust_name' => 'traveladvisor_var_tour_paging_filter_style[]',
									'classes' => 'dropdown chosen-select',
									'options' => array(
										'single_page' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_all_records' ),
										'pagination' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_pagination' ),
									),
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );

							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_post_per_page' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_enter_post_per_page' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_tour_item_per_page ),
									'cust_id' => 'traveladvisor_var_tour_item_per_page' . $traveladvisor_counter,
									'classes' => '',
									'cust_name' => 'traveladvisor_var_tour_item_per_page[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );

							$display = $traveladvisor_var_tour_view == 'tour_grid' ? 'none' : 'block';
							
							$traveladvisor_opt_array = array(
								'id' => 'inventories_counter',
								'cust_name' => 'traveladvisor_inventories_counter[]',
								'std' => $traveladvisor_inventories_counter,
							);
							$traveladvisor_var_html_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_excerpt' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_select_excerpt_on_off' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_tour_excerpt ),
									'id' => '',
									'cust_name' => 'traveladvisor_var_tour_excerpt[]',
									'cust_id' => 'traveladvisor_var_tour_excerpt' . $traveladvisor_counter,
									'classes' => 'dropdown chosen-select',
									'options' => array(
										'yes' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_tour_yes' ),
										'no' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_tour_no' ),
									),
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_excerpt_length' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_enter_post_excerpt_length_here' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_tour_excerpt_length ),
									'cust_id' => 'traveladvisor_var_tour_excerpt_length' . $traveladvisor_counter,
									'classes' => '',
									'cust_name' => 'traveladvisor_var_tour_excerpt_length[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
							
							?>
						</div>
						<?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
							<ul class="form-elements insert-bg">
								<li class="to-field">
									<a class="insert-btn cs-main-btn" onclick="javascript:traveladvisor_shortcode_insert_editor('<?php echo str_replace( 'traveladvisor_var_page_builder_', '', $name ); ?>', '<?php echo esc_js( $name . $traveladvisor_counter ) ?>', '<?php echo esc_js( $filter_element ); ?>')" ><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_insert' ); ?></a>
								</li>
							</ul>
							<div id="results-shortocde"></div>
						<?php } else { ?>
							<?php
							$traveladvisor_opt_array = array(
								'std' => 'tour',
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
									'std' => 'Save',
									'cust_id' => 'tour_save' . $traveladvisor_counter,
									'cust_type' => 'button',
									'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
									'classes' => 'cs-traveladvisor-admin-btn',
									'cust_name' => 'tour_save',
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

	add_action( 'wp_ajax_traveladvisor_var_page_builder_tour', 'traveladvisor_var_page_builder_tour' );
}