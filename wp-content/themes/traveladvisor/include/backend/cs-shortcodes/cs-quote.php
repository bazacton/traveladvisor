<?php
/*
 *
 * @File : Quote element
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_page_builder_quote' ) ) {

	function traveladvisor_var_page_builder_quote( $die = 0 ) {
		global $post, $traveladvisor_node, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields;
		if ( function_exists( 'traveladvisor_shortcode_names' ) ) {
			$shortcode_element = '';
			$filter_element = 'filterdrag';
			$shortcode_view = '';
			$traveladvisor_output = array();
			$TRAVELADVISOR_PREFIX = 'traveladvisor_quote';
			$counter = isset( $_POST['counter'] ) ? $_POST['counter'] : '';
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
				'traveladvisor_var_quote_title' => '',
				'traveladvisor_var_quote_author_name' => '',
				'traveladvisor_var_quote_author_url' => '',
			);
			if ( isset( $traveladvisor_output['0']['atts'] ) ) {
				$atts = $traveladvisor_output['0']['atts'];
			} else {
				$atts = array();
			}
			if ( isset( $traveladvisor_output['0']['content'] ) ) {
				$traveladvisor_quote_text = $traveladvisor_output['0']['content'];
			} else {
				$traveladvisor_quote_text = '';
			}
			$quote_element_size = '25';
			foreach ( $defaults as $key => $values ) {
				if ( isset( $atts[$key] ) ) {
					$$key = $atts[$key];
				} else {
					$$key = $values;
				}
			}
			$traveladvisor_var_quote_title = isset( $traveladvisor_var_quote_title ) ? $traveladvisor_var_quote_title : '';
			$traveladvisor_var_quote_author_name = isset( $traveladvisor_var_quote_author_name ) ? $traveladvisor_var_quote_author_name : '';
			$traveladvisor_var_quote_author_url = isset( $traveladvisor_var_quote_author_url ) ? $traveladvisor_var_quote_author_url : '';
			$name = 'traveladvisor_var_page_builder_quote';
			$coloumn_class = 'column_' . $quote_element_size;
			if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
				$shortcode_element = 'shortcode_element_class';
				$shortcode_view = 'cs-pbwp-shortcode';
				$filter_element = 'ajax-drag';
				$coloumn_class = '';
			}
			?>
			<div id="<?php echo esc_attr( $name . $traveladvisor_counter ) ?>_del" class="column  parentdelete <?php echo esc_attr( $coloumn_class ); ?>
				 <?php echo esc_attr( $shortcode_view ); ?>" item="quote" data="<?php echo traveladvisor_element_size_data_array_index( $quote_element_size ) ?>" >
					 <?php traveladvisor_element_setting( $name, $traveladvisor_counter, $quote_element_size ) ?>
				<div class="cs-wrapp-class-<?php echo intval( $traveladvisor_counter ) ?>
					 <?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $traveladvisor_counter ) ?>" data-shortcode-template="[traveladvisor_quote {{attributes}}]{{content}}[/traveladvisor_quote]" style="display: none;">
					<div class="cs-heading-area" data-counter="<?php echo esc_attr( $traveladvisor_counter ) ?>">
						<h5><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_edit_quote_option' ); ?></h5>
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
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_quote_element_title' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_quote_element_title_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_quote_title ),
									'cust_id' => '',
									'cust_id' => 'traveladvisor_var_quote_title' . $traveladvisor_counter,
									'cust_name' => 'traveladvisor_var_quote_title[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_quote_author' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_quote_author_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_quote_author_name ),
									'cust_id' => '',
									'cust_id' => 'traveladvisor_var_quote_author_name' . $traveladvisor_counter,
									'cust_name' => 'traveladvisor_var_quote_author_name[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_quote_author_url' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_quote_author_url_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_quote_author_url ),
									'cust_id' => '',
									'cust_id' => 'traveladvisor_var_quote_author_url' . $traveladvisor_counter,
									'cust_name' => 'traveladvisor_var_quote_author_url[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_quote_content' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_quote_content_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_quote_text ),
									'cust_id' => '',
									'cust_id' => 'traveladvisor_quote_text' . $traveladvisor_counter,
									'cust_name' => 'traveladvisor_quote_text[]',
									'extra_atr' => ' data-content-text=cs-shortcode-textarea',
									'return' => true,
									'classes' => '',
									'traveladvisor_editor' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_textarea_field( $traveladvisor_opt_array );
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
								'std' => 'quote',
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
									'cust_id' => 'quote_save' . $traveladvisor_counter,
									'cust_type' => 'button',
									'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
									'classes' => 'cs-traveladvisor-admin-btn',
									'cust_name' => 'quote_save',
									'return' => true,
								),
							);

							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
						}
						?>
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
		}
		if ( $die <> 1 ) {
			die();
		}
	}

	add_action( 'wp_ajax_traveladvisor_var_page_builder_quote', 'traveladvisor_var_page_builder_quote' );
} 