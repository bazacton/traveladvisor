<?php
/*
 *
 * @File : Contact Us Short Code
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_page_builder_contact_us' ) ) {

	function traveladvisor_var_page_builder_contact_us( $die = 0 ) {
		global $post, $traveladvisor_node, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields;

		if ( function_exists( 'traveladvisor_shortcode_names' ) ) {
			$shortcode_element = '';
			$filter_element = 'filterdrag';
			$shortcode_view = '';
			$traveladvisor_output = array();
			$TRAVELADVISOR_PREFIX = 'traveladvisor_contact_us';
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
				'traveladvisor_var_contact_us_element_title' => '',
				'traveladvisor_var_contact_us_element_send' => '',
				'traveladvisor_var_contact_us_element_success' => '',
				'traveladvisor_var_contact_us_element_error' => ''
			);
			if ( isset( $traveladvisor_output['0']['atts'] ) ) {
				$atts = $traveladvisor_output['0']['atts'];
			} else {
				$atts = array();
			}
			if ( isset( $traveladvisor_output['0']['content'] ) ) {
				$contact_us_text = $traveladvisor_output['0']['content'];
			} else {
				$contact_us_text = '';
			}
			$contact_us_element_size = '25';
			foreach ( $defaults as $key => $values ) {
				if ( isset( $atts[$key] ) ) {
					$$key = $atts[$key];
				} else {
					$$key = $values;
				}
			}
			$name = 'traveladvisor_var_page_builder_contact_us';
			$coloumn_class = 'column_' . $contact_us_element_size;
			if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
				$shortcode_element = 'shortcode_element_class';
				$shortcode_view = 'cs-pbwp-shortcode';
				$filter_element = 'ajax-drag';
				$coloumn_class = '';
			}
			?>
			<div id="<?php echo esc_attr( $name . $traveladvisor_counter ) ?>_del" class="column  parentdelete <?php echo esc_attr( $coloumn_class ); ?>
				 <?php echo esc_attr( $shortcode_view ); ?>" item="contact_us" data="<?php echo traveladvisor_element_size_data_array_index( $contact_us_element_size ) ?>" >
					 <?php traveladvisor_element_setting( $name, $traveladvisor_counter, $contact_us_element_size ) ?>
				<div class="cs-wrapp-class-<?php echo intval( $traveladvisor_counter ) ?>
					 <?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $traveladvisor_counter ) ?>" data-shortcode-template="[traveladvisor_contact_us {{attributes}}]{{content}}[/traveladvisor_contact_us]" style="display: none;">
					<div class="cs-heading-area" data-counter="<?php echo esc_attr( $traveladvisor_counter ) ?>">
						<h5><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_edit_cotactus_option' ); ?></h5>
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
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_cotactus_title' ),
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_cotactus_title_hint' ),
								'desc' => '',
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_contact_us_element_title ),
									'cust_id' => 'traveladvisor_var_contact_us_element_title' . $traveladvisor_counter,
									'classes' => '',
									'cust_name' => 'traveladvisor_var_contact_us_element_title[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );

							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_cotactus_sendto' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_cotactus_sendto_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_contact_us_element_send ),
									'cust_id' => 'traveladvisor_var_contact_us_element_send' . $traveladvisor_counter,
									'classes' => '',
									'cust_name' => 'traveladvisor_var_contact_us_element_send[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_cotactus_success' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_cotactus_success_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_contact_us_element_success ),
									'cust_id' => 'traveladvisor_var_contact_us_element_success' . $traveladvisor_counter,
									'classes' => '',
									'cust_name' => 'traveladvisor_var_contact_us_element_success[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_cotactus_error' ),
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_cotactus_error_hint' ),
								'desc' => '',
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_contact_us_element_error ),
									'cust_id' => 'traveladvisor_var_contact_us_element_error' . $traveladvisor_counter,
									'classes' => '',
									'cust_name' => 'traveladvisor_var_contact_us_element_error[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
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
								'std' => 'contact_us',
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
									'cust_id' => 'contact_us_save' . $traveladvisor_counter,
									'cust_type' => 'button',
									'classes' => 'cs-traveladvisor-admin-btn',
									'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
									'cust_name' => 'contact_us_save',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
						}
						?>
					</div>
				</div>
			</div>
			<?php
		}
		if ( $die <> 1 ) {
			die();
		}
	}

	add_action( 'wp_ajax_traveladvisor_var_page_builder_contact_us', 'traveladvisor_var_page_builder_contact_us' );
}
?>