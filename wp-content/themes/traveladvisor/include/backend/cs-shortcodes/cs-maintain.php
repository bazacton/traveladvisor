<?php
/*
 *
 * @File :Maintenance 
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_page_builder_maintenance' ) ) {

	function traveladvisor_var_page_builder_maintenance( $die = 0 ) {
		global $post, $traveladvisor_node, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields;
		if ( function_exists( 'traveladvisor_shortcode_names' ) ) {
			$shortcode_element = '';
			$filter_element = 'filterdrag';
			$shortcode_view = '';
			$traveladvisor_output = array();
			$TRAVELADVISOR_PREFIX = 'traveladvisor_maintenance';
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
				'traveladvisor_var_column' => '1',
				//  'traveladvisor_var_maintenance_text' => '',
				'traveladvisor_var_maintenance_image_url_array' => '',
				'traveladvisor_var_maintenance_title' => '',
				'traveladvisor_var_lunch_date' => '',
			);
			if ( isset( $traveladvisor_output['0']['atts'] ) ) {
				$atts = $traveladvisor_output['0']['atts'];
			} else {
				$atts = array();
			}
			if ( isset( $traveladvisor_output['0']['content'] ) ) {
				$traveladvisor_maintenance_column_text = $traveladvisor_output['0']['content'];
			} else {
				$traveladvisor_maintenance_column_text = '';
			}
			$maintenance_element_size = '25';
			foreach ( $defaults as $key => $values ) {
				if ( isset( $atts[$key] ) ) {
					$$key = $atts[$key];
				} else {
					$$key = $values;
				}
			}
			$name = 'traveladvisor_var_page_builder_maintenance';
			$coloumn_class = 'column_' . $maintenance_element_size;
			if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
				$shortcode_element = 'shortcode_element_class';
				$shortcode_view = 'cs-pbwp-shortcode';
				$filter_element = 'ajax-drag';
				$coloumn_class = '';
			}
			traveladvisor_var_date_picker();
			?>
			<div id="<?php echo esc_attr( $name . $traveladvisor_counter ) ?>_del" class="column  parentdelete <?php echo esc_attr( $coloumn_class ); ?>
				 <?php echo esc_attr( $shortcode_view ); ?>" item="maintenance" data="<?php echo traveladvisor_element_size_data_array_index( $maintenance_element_size ) ?>" >
					 <?php traveladvisor_element_setting( $name, $traveladvisor_counter, $maintenance_element_size ) ?>
				<div class="cs-wrapp-class-<?php echo intval( $traveladvisor_counter ) ?>
					 <?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $traveladvisor_counter ) ?>" data-shortcode-template="[traveladvisor_maintenance {{attributes}}]{{content}}[/traveladvisor_maintenance]" style="display: none;">
					<div class="cs-heading-area" data-counter="<?php echo esc_attr( $traveladvisor_counter ) ?>">
						<h5><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_edit_maintain_page' ); ?></h5>
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
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_maintain_title' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_maintain_title_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_maintenance_title ),
									'cust_id' => 'traveladvisor_var_maintenance_title' . $traveladvisor_counter,
									'classes' => '',
									'cust_name' => 'traveladvisor_var_maintenance_title[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );

							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_maintain_text' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_maintain_text_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_maintenance_column_text ),
									'cust_id' => 'traveladvisor_maintenance_column_text' . $traveladvisor_counter,
									'classes' => '',
									'cust_name' => 'traveladvisor_maintenance_column_text[]',
									'extra_atr' => ' data-content-text=cs-shortcode-textarea',
									'return' => true,
									'classes' => '',
									'traveladvisor_editor' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_textarea_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'std' => esc_url( $traveladvisor_var_maintenance_image_url_array ),
								'id' => 'maintenance_image_url',
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_maintain_logo' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_maintain_logo_hint' ),
								'echo' => true,
								'array' => true,
								'prefix' => '',
								'field_params' => array(
									'std' => esc_url( $traveladvisor_var_maintenance_image_url_array ),
									'id' => 'maintenance_image_url',
									'return' => true,
									'array' => true,
									'array_txt' => false,
									'prefix' => '',
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_upload_file_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_maintain_launchdate' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_maintain_launchdate_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_lunch_date ),
									'cust_id' => 'traveladvisor_var_lunch_date' . $traveladvisor_counter,
									'classes' => '',
									'id' => 'lunch_date',
									'cust_name' => 'traveladvisor_var_lunch_date[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_date_field( $traveladvisor_opt_array );
							?>
						</div>
						<?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
							<ul class="form-elements insert-bg">
								<li class="to-field">
									<a class="insert-btn cs-main-btn" onclick="javascript:traveladvisor_shortcode_insert_editor('<?php echo str_replace( 'traveladvisor_var_page_builder_', '', $name ); ?>', '<?php echo esc_js( $name . $traveladvisor_counter ) ?>', '<?php echo esc_js( $filter_element ); ?>')" ><?php esc_html_e( 'Insert', 'traveladvisor' ); ?></a>
								</li>
							</ul>
							<div id="results-shortocde"></div>
						<?php } else { ?>
							<?php
							$traveladvisor_opt_array = array(
								'std' => 'maintenance',
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
									'cust_id' => 'maintenance_save',
									'cust_type' => 'button',
									'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
									'classes' => 'cs-traveladvisor-admin-btn',
									'cust_name' => 'maintenance_save',
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

	add_action( 'wp_ajax_traveladvisor_var_page_builder_maintenance', 'traveladvisor_var_page_builder_maintenance' );
}
 