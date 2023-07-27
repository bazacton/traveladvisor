<?php
/*
 *
 * @File : Button
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_page_builder_toursearch' ) ) {

	function traveladvisor_var_page_builder_toursearch( $die = 0 ) {
		global $post, $traveladvisor_node, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields, $traveladvisor_var_static_text;
		$strings = new traveladvisor_theme_all_strings;
		$strings->traveladvisor_short_code_strings();
		if ( function_exists( 'traveladvisor_shortcode_names' ) ) {
			$shortcode_element = '';
			$filter_element = 'filterdrag';
			$shortcode_view = '';
			$traveladvisor_output = array();
			$TRAVELADVISOR_PREFIX = 'traveladvisor_toursearch';
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
				'traveladvisor_var_toursearch_text' => '',
			);
			if ( isset( $traveladvisor_output['0']['atts'] ) ) {
				$atts = $traveladvisor_output['0']['atts'];
			} else {
				$atts = array();
			}
			if ( isset( $traveladvisor_output['0']['content'] ) ) {
				$toursearch_column_text = $traveladvisor_output['0']['content'];
			} else {
				$toursearch_column_text = '';
			}
			$toursearch_element_size = '100';
			foreach ( $defaults as $key => $values ) {
				if ( isset( $atts[$key] ) ) {
					$$key = $atts[$key];
				} else {
					$$key = $values;
				}
			}
			$name = 'traveladvisor_var_page_builder_toursearch';
			$coloumn_class = 'column_' . $toursearch_element_size;
			if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
				$shortcode_element = 'shortcode_element_class';
				$shortcode_view = 'cs-pbwp-shortcode';
				$filter_element = 'ajax-drag';
				$coloumn_class = '';
			}
			?>
			<div id="<?php echo esc_attr( $name . $traveladvisor_counter ) ?>_del" class="column  parentdelete <?php echo esc_attr( $coloumn_class ); ?>
					 <?php echo esc_attr( $shortcode_view ); ?>" item="toursearch" data="<?php echo traveladvisor_element_size_data_array_index( $toursearch_element_size ) ?>" >
					 <?php traveladvisor_element_setting( $name, $traveladvisor_counter, $toursearch_element_size ) ?>
				<div class="cs-wrapp-class-<?php echo intval( $traveladvisor_counter ) ?>
			<?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $traveladvisor_counter ) ?>" data-shortcode-template="[traveladvisor_toursearch {{attributes}}]{{content}}[/traveladvisor_toursearch]" style="display: none;">
					<div class="cs-heading-area" data-counter="<?php echo esc_attr( $traveladvisor_counter ) ?>">
						<h5><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_edit_searchbox_option' ); ?></h5>
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
							$args = array(
								'sort_order' => 'asc',
								'sort_column' => 'post_title',
								'hierarchical' => 1,
								'exclude' => '',
								'meta_key' => '',
								'meta_value' => '',
								'authors' => '',
								'child_of' => 0,
								'parent' => -1,
								'exclude_tree' => '',
								'number' => '',
								'offset' => 0,
								'post_type' => 'page',
								'post_status' => 'publish'
							);
							$pages = get_pages( $args );

							foreach ( $pages as $key => $value ) {
								if ( $value->post_title != "" ) {
									$ss[$value->post_name] = $value->post_title;
								}
							}
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_searchbox_select_page' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_searchbox_select_page_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_toursearch_text ),
									'id' => '',
									'cust_name' => 'traveladvisor_var_toursearch_text[]',
									'classes' => 'dropdown',
									'options' => $ss,
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
								'std' => 'toursearch',
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
									'cust_id' => 'toursearch_save' . $traveladvisor_counter,
									'cust_type' => 'button',
									'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
									'classes' => 'cs-traveladvisor-admin-btn',
									'cust_name' => 'toursearch_save',
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

	add_action( 'wp_ajax_traveladvisor_var_page_builder_toursearch', 'traveladvisor_var_page_builder_toursearch' );
}