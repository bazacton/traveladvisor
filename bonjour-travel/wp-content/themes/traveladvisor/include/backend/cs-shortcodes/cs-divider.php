<?php
/**
 * @Spacer html form for page builder
 */
if ( !function_exists( 'traveladvisor_var_page_builder_divider' ) ) {

	function traveladvisor_var_page_builder_divider( $die = 0 ) {
		global $traveladvisor_node, $count_node, $post, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields;
		$shortcode_element = '';
		$filter_element = 'filterdrag';
		$shortcode_view = '';
		$output = array();
		$traveladvisor_counter = $_POST['counter'];
		if ( isset( $_POST['action'] ) && !isset( $_POST['shortcode_element_id'] ) ) {
			$POSTID = '';
			$shortcode_element_id = '';
		} else {
			$POSTID = $_POST['POSTID'];
			$shortcode_element_id = $_POST['shortcode_element_id'];
			$shortcode_str = stripslashes( $shortcode_element_id );
			$TRAVELADVISOR_PREFIX = 'traveladvisor_divider';
			$parseObject = new ShortcodeParse();
			$output = $parseObject->traveladvisor_shortcodes( $output, $shortcode_str, true, $TRAVELADVISOR_PREFIX );
		}
		$defaults = array(
			'traveladvisor_var_divider_padding_left' => '0',
			'traveladvisor_var_divider_padding_right' => '0',
			'traveladvisor_var_divider_padding_top' => '0',
			'traveladvisor_var_divider_padding_buttom' => '0',
		);
		if ( isset( $output['0']['atts'] ) ) {
			$atts = $output['0']['atts'];
		} else {
			$atts = array();
		}
		$divider_element_size = '50';
		foreach ( $defaults as $key => $values ) {
			if ( isset( $atts[$key] ) ) {
				$$key = $atts[$key];
			} else {
				$$key = $values;
			}
		}
		$name = 'traveladvisor_var_page_builder_divider';
		$coloumn_class = 'column_' . $divider_element_size;
		if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
			$shortcode_element = 'shortcode_element_class';
			$shortcode_view = 'cs-pbwp-shortcode';
			$filter_element = 'ajax-drag';
			$coloumn_class = '';
		}
		?>
		<div id="<?php echo esc_attr( $name . $traveladvisor_counter ) ?>_del" class="column  parentdelete <?php echo esc_attr( $coloumn_class ); ?>
			 <?php echo esc_attr( $shortcode_view ); ?>" item="divider" data="<?php echo traveladvisor_element_size_data_array_index( $divider_element_size ) ?>" >
				 <?php traveladvisor_element_setting( $name, $traveladvisor_counter, $divider_element_size ) ?>
			<div class="cs-wrapp-class-<?php echo esc_attr( $traveladvisor_counter ); ?> <?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $traveladvisor_counter ) ?>" data-shortcode-template="[traveladvisor_divider {{attributes}}]{{content}}[/traveladvisor_divider]" style="display: none;"">
				<div class="cs-heading-area">
					<h5><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_divider_spacer' ); ?></h5>
					<a href="javascript:traveladvisor_frame_removeoverlay('<?php echo esc_js( $name . $traveladvisor_counter ) ?>','<?php echo esc_js( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-times"></i></a> </div>
				<div class="cs-pbwp-content">
					<div class="cs-wrapp-clone cs-shortcode-wrapp">
						<?php
						$traveladvisor_opt_array = array(
							'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_paddingleft' ),
							'desc' => '',
							'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_paddingleft_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => esc_attr( $traveladvisor_var_divider_padding_left ),
								'id' => 'divider_height',
								'cust_name' => 'traveladvisor_var_divider_padding_left[]',
								'return' => true,
								'cs-range-input' => 'cs-range-input',
							),
						);
						$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
						$traveladvisor_opt_array = array(
							'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_paddingright' ),
							'desc' => '',
							'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_paddingright_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => esc_attr( $traveladvisor_var_divider_padding_right ),
								'id' => 'divider_height',
								'cust_name' => 'traveladvisor_var_divider_padding_right[]',
								'return' => true,
								'cs-range-input' => 'cs-range-input',
							),
						);
						$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
						$traveladvisor_opt_array = array(
							'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_paddingtop' ),
							'desc' => '',
							'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_paddingtop_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => esc_attr( $traveladvisor_var_divider_padding_top ),
								'id' => 'divider_height',
								'cust_name' => 'traveladvisor_var_divider_padding_top[]',
								'return' => true,
								'cs-range-input' => 'cs-range-input',
							),
						);
						$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
						$traveladvisor_opt_array = array(
							'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_paddingbottom' ),
							'desc' => '',
							'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_paddingbottom_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => esc_attr( $traveladvisor_var_divider_padding_buttom ),
								'id' => 'divider_height',
								'cust_name' => 'traveladvisor_var_divider_padding_buttom[]',
								'return' => true,
								'cs-range-input' => 'cs-range-input',
							),
						);
						$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
						?>
					</div>
					<?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
						<ul class="form-elements insert-bg">
							<li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:traveladvisor_shortcode_insert_editor('<?php echo esc_js( str_replace( 'traveladvisor_var_page_builder_', '', $name ) ); ?>', '<?php echo esc_js( $name . $traveladvisor_counter ); ?>', '<?php echo esc_js( $filter_element ); ?>')" ><?php _e( 'Insert', 'traveladvisor' ); ?></a> </li>
						</ul>
						<div id="results-shortocde"></div>
					<?php } else { ?>
						<?php
						$traveladvisor_opt_array = array(
							'std' => 'divider',
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
						//echo $traveladvisor_var_html_fields->traveladvisor_var_form_hidden_render($traveladvisor_opt_array);
						$html_hidden_render = $traveladvisor_var_html_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
						echo traveladvisor_allow_special_char( $html_hidden_render );
						$traveladvisor_opt_array = array(
							'name' => '',
							'desc' => '',
							'hint_text' => '',
							'echo' => true,
							'field_params' => array(
								'std' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_shortcode_save' ),
								'cust_id' => '',
								'cust_type' => 'button',
								'classes' => '',
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
		<script type="text/javascript">
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

	add_action( 'wp_ajax_traveladvisor_var_page_builder_divider', 'traveladvisor_var_page_builder_divider' );
}