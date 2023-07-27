<?php
/*
 *
 * @File : Image Frame 
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_page_builder_image_frame' ) ) {

	function traveladvisor_var_page_builder_image_frame( $die = 0 ) {
		global $post, $traveladvisor_node, $traveladvisor_var_html_fields, $coloumn_class, $traveladvisor_var_form_fields;
		if ( function_exists( 'traveladvisor_shortcode_names' ) ) {
			$shortcode_element = '';
			$filter_element = 'filterdrag';
			$shortcode_view = '';
			$traveladvisor_output = array();
			$TRAVELADVISOR_PREFIX = 'traveladvisor_image_frame';
			$traveladvisor_counter = isset( $_POST['traveladvisor_counter'] ) ? $_POST['traveladvisor_counter'] : '';
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
				'traveladvisor_var_column' => '',
				'traveladvisor_var_image_section_title' => '',
				'traveladvisor_var_frame_image_url_array' => '',
				'traveladvisor_var_image_title' => '',
			);
			if ( isset( $traveladvisor_output['0']['atts'] ) ) {
				$atts = $traveladvisor_output['0']['atts'];
			} else {
				$atts = array();
			}
			if ( isset( $traveladvisor_output['0']['content'] ) ) {
				$image_frame_column_text = $traveladvisor_output['0']['content'];
			} else {
				$image_frame_column_text = '';
			}
			$image_frame_element_size = '25';
			foreach ( $defaults as $key => $values ) {
				if ( isset( $atts[$key] ) ) {
					$$key = $atts[$key];
				} else {
					$$key = $values;
				}
			}
			$name = 'traveladvisor_var_page_builder_image_frame';
			$coloumn_class = 'column_' . $image_frame_element_size;
			if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
				$shortcode_element = 'shortcode_element_class';
				$shortcode_view = 'cs-pbwp-shortcode';
				$filter_element = 'ajax-drag';
				$coloumn_class = '';
			}
			?>
			<div id="<?php echo esc_attr( $name . $traveladvisor_counter ) ?>_del" class="column  parentdelete <?php echo esc_attr( $coloumn_class ); ?>
					 <?php echo esc_attr( $shortcode_view ); ?>" item="image_frame" data="<?php echo traveladvisor_element_size_data_array_index( $image_frame_element_size ) ?>" >
					 <?php traveladvisor_element_setting( $name, $traveladvisor_counter, $image_frame_element_size ) ?>
				<div class="cs-wrapp-class-<?php echo intval( $traveladvisor_counter ) ?>
			<?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $traveladvisor_counter ) ?>" data-shortcode-template="[traveladvisor_image_frame {{attributes}}]{{content}}[/traveladvisor_image_frame]" style="display: none;">
					<div class="cs-heading-area" data-counter="<?php echo esc_attr( $traveladvisor_counter ) ?>">
						<h5><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_imagefram_edit' ); ?></h5>
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
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_imageframe_title' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_imageframe_title_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_image_section_title ),
									'cust_id' => 'traveladvisor_var_image_section_title' . $traveladvisor_counter,
									'classes' => '',
									'cust_name' => 'traveladvisor_var_image_section_title[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'std' => esc_url( $traveladvisor_var_frame_image_url_array ),
								'id' => 'frame_image_url',
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_imageframe_image' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_imageframe_image_hint' ),
								'echo' => true,
								'array' => true,
								'prefix' => '',
								'field_params' => array(
									'std' => esc_url( $traveladvisor_var_frame_image_url_array ),
									'id' => 'frame_image_url',
									'return' => true,
									'array' => true,
									'array_txt' => false,
									'prefix' => '',
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_upload_file_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_imageframe_alt' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_imageframe_alt_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_image_title ),
									'cust_id' => 'traveladvisor_var_image_title' . $traveladvisor_counter,
									'classes' => '',
									'cust_name' => 'traveladvisor_var_image_title[]',
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
								'std' => 'image_frame',
								'id' => '',
								'before' => '',
								'after' => '',
								'classes' => '',
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
									'cust_id' => 'image_frame_save',
									'cust_type' => 'button',
									'classes' => 'cs-traveladvisor-admin-btn',
									'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
									'cust_name' => 'image_frame_save' . $traveladvisor_counter,
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

	add_action( 'wp_ajax_traveladvisor_var_page_builder_image_frame', 'traveladvisor_var_page_builder_image_frame' );
}
 