<?php
/**
 * @Google map html form for page builder start
 */
if ( !function_exists( 'traveladvisor_var_page_builder_map' ) ) {

	function traveladvisor_var_page_builder_map( $die = 0 ) {
		global $traveladvisor_node, $post, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields;
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
			$PREFIX = 'traveladvisor_map';
			$parseObject = new ShortcodeParse();
			$output = $parseObject->traveladvisor_shortcodes( $output, $shortcode_str, true, $PREFIX );
		}
		$defaults = array(
			'traveladvisor_var_map_title' => '',
			'traveladvisor_var_map_height' => '',
			'traveladvisor_var_map_lat' => '',
			'traveladvisor_var_map_lon' => '',
			'traveladvisor_var_map_zoom' => '',
			'traveladvisor_var_map_type' => '',
			'traveladvisor_var_map_info' => '',
			'traveladvisor_var_map_marker_icon' => '',
			'traveladvisor_var_map_show_marker' => 'true',
			'traveladvisor_var_map_controls' => '',
			'traveladvisor_var_map_draggable' => '',
			'traveladvisor_var_map_scrollwheel' => '',
			'traveladvisor_var_map_border' => '',
			'traveladvisor_var_map_border_color' => '',
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
		$map_element_size = '25';
		foreach ( $defaults as $key => $values ) {
			if ( isset( $atts[$key] ) ) {
				$$key = $atts[$key];
			} else {
				$$key = $values;
			}
		}
		$traveladvisor_var_map_title = isset( $traveladvisor_var_map_title ) ? $traveladvisor_var_map_title : '';
		$traveladvisor_var_map_height = isset( $traveladvisor_var_map_height ) ? $traveladvisor_var_map_height : '';
		$traveladvisor_var_map_lat = isset( $traveladvisor_var_map_lat ) ? $traveladvisor_var_map_lat : '';
		$traveladvisor_var_map_lon = isset( $traveladvisor_var_map_lon ) ? $traveladvisor_var_map_lon : '';
		$traveladvisor_var_map_zoom = isset( $traveladvisor_var_map_zoom ) ? $traveladvisor_var_map_zoom : '';
		$traveladvisor_var_map_type = isset( $traveladvisor_var_map_type ) ? $traveladvisor_var_map_type : '';
		$traveladvisor_var_map_info = isset( $traveladvisor_var_map_info ) ? $traveladvisor_var_map_info : '';
		$traveladvisor_var_map_marker_icon = isset( $traveladvisor_var_map_marker_icon ) ? $traveladvisor_var_map_marker_icon : '';
		$traveladvisor_var_map_show_marker = isset( $traveladvisor_var_map_show_marker ) ? $traveladvisor_var_map_show_marker : '';
		$traveladvisor_var_map_controls = isset( $traveladvisor_var_map_controls ) ? $traveladvisor_var_map_controls : '';
		$traveladvisor_var_map_draggable = isset( $traveladvisor_var_map_draggable ) ? $traveladvisor_var_map_draggable : '';
		$traveladvisor_var_map_scrollwheel = isset( $traveladvisor_var_map_scrollwheel ) ? $traveladvisor_var_map_scrollwheel : '';
		$traveladvisor_var_map_border = isset( $traveladvisor_var_map_border ) ? $traveladvisor_var_map_border : '';
		$traveladvisor_var_map_border_color = isset( $traveladvisor_var_map_border_color ) ? $traveladvisor_var_map_border_color : '';
		$name = 'traveladvisor_var_page_builder_map';
		$coloumn_class = 'column_' . $map_element_size;
		if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
			$shortcode_element = 'shortcode_element_class';
			$shortcode_view = 'cs-pbwp-shortcode';
			$filter_element = 'ajax-drag';
			$coloumn_class = '';
		}
		$rand_string = $traveladvisor_counter . '' . traveladvisor_generate_random_string( 3 );
		?>
		<div id="<?php echo esc_attr( $name . $traveladvisor_counter ) ?>_del" class="column  parentdelete <?php echo esc_attr( $coloumn_class ); ?> <?php echo esc_attr( $shortcode_view ); ?>" item="map" data="<?php echo traveladvisor_element_size_data_array_index( $map_element_size ) ?>" >
			<?php traveladvisor_element_setting( $name, $traveladvisor_counter, $map_element_size, '', 'globe' ); ?>
			<div class="cs-wrapp-class-<?php echo esc_attr( $traveladvisor_counter ); ?> <?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $traveladvisor_counter ) ?>" data-shortcode-template="[<?php echo esc_attr( 'traveladvisor_map' ); ?> {{attributes}}]" style="display: none;">
				<div class="cs-heading-area">
					<h5><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_edit_map_option' ); ?></h5>
					<a href="javascript:traveladvisor_frame_removeoverlay('<?php echo esc_js( $name . $traveladvisor_counter ) ?>','<?php echo esc_js( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-times"></i></a> </div>
				<div class="cs-pbwp-content">
					<div class="cs-wrapp-clone cs-shortcode-wrapp">
						<?php
						if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
							traveladvisor_shortcode_element_size();
						}
						$traveladvisor_opt_array = array(
							'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_title' ),
							'desc' => '',
							'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_title_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => traveladvisor_allow_special_char( $traveladvisor_var_map_title ),
								'cust_id' => '',
								'classes' => '',
								'cust_name' => 'traveladvisor_var_map_title[]',
								'return' => true,
							),
						);
						$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
						$traveladvisor_opt_array = array(
							'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_map_height' ),
							'desc' => '',
							'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_map_height_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => esc_attr( $traveladvisor_var_map_height ),
								'cust_id' => '',
								'classes' => 'txtfield ',
								'cust_name' => 'traveladvisor_var_map_height[]',
								'return' => true,
							),
						);
						$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
						$traveladvisor_opt_array = array(
							'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_latitude' ),
							'desc' => '',
							'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_latitude_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => esc_attr( $traveladvisor_var_map_lat ),
								'cust_id' => '',
								'classes' => 'txtfield',
								'cust_name' => 'traveladvisor_var_map_lat[]',
								'return' => true,
							),
						);
						$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
						$traveladvisor_opt_array = array(
							'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_longitude' ),
							'desc' => '',
							'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_longitude_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => esc_attr( $traveladvisor_var_map_lon ),
								'cust_id' => '',
								'classes' => 'txtfield',
								'cust_name' => 'traveladvisor_var_map_lon[]',
								'return' => true,
							),
						);
						$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
						$traveladvisor_opt_array = array(
							'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_zoom' ),
							'desc' => '',
							'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_zoom_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => esc_attr( $traveladvisor_var_map_zoom ),
								'cust_id' => '',
								'classes' => 'txtfield',
								'cust_name' => 'traveladvisor_var_map_zoom[]',
								'return' => true,
							),
						);
						$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
						$traveladvisor_opt_array = array(
							'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_types' ),
							'desc' => '',
							'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_types_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => esc_attr( $traveladvisor_var_map_type ),
								'id' => '',
								'cust_id' => '',
								'cust_name' => 'traveladvisor_var_map_type[]',
								'classes' => 'dropdown chosen-select',
								'options' => array(
									'ROADMAP' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_types_roadmap' ),
									'HYBRID' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_types_hybrid' ),
									'SATELLITE' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_types_satellite' ),
									'TERRAIN' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_types_terrian' ),
								),
								'return' => true,
							),
						);
						$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
						$traveladvisor_opt_array = array(
							'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_info_text' ),
							'desc' => '',
							'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_info_text_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => esc_attr( $traveladvisor_var_map_info ),
								'cust_id' => '',
								'classes' => 'txtfield',
								'cust_name' => 'traveladvisor_var_map_info[]',
								'return' => true,
								'traveladvisor_editor' => true,
							),
						);
						$traveladvisor_var_html_fields->traveladvisor_var_textarea_field( $traveladvisor_opt_array );
						$traveladvisor_opt_array = array(
							'std' => $traveladvisor_var_map_marker_icon,
							'id' => 'map_marker_icon',
							'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_marker_icon' ),
							'desc' => '',
							'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_marker_icon_hint' ),
							'echo' => true,
							'array' => true,
							'prefix' => '',
							'field_params' => array(
								'std' => esc_attr( $traveladvisor_var_map_marker_icon ),
								'cust_id' => '',
								'id' => 'map_marker_icon',
								'return' => true,
								'array' => true,
								'array_txt' => false,
								'prefix' => '',
							),
						);
						$traveladvisor_var_html_fields->traveladvisor_var_upload_file_field( $traveladvisor_opt_array );
						$traveladvisor_opt_array = array(
							'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_show_marker' ),
							'desc' => '',
							'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_show_marker_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => esc_attr( $traveladvisor_var_map_show_marker ),
								'id' => '',
								'cust_id' => '',
								'cust_name' => 'traveladvisor_var_map_show_marker[]',
								'classes' => 'dropdown chosen-select',
								'options' => array(
									'true' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_show_marker_on' ),
									'false' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_show_marker_off' ),
								),
								'return' => true,
							),
						);
						$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
						$traveladvisor_opt_array = array(
							'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_controls' ),
							'desc' => '',
							'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_controls_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => esc_attr( $traveladvisor_var_map_controls ),
								'id' => '',
								'cust_id' => '',
								'cust_name' => 'traveladvisor_var_map_controls[]',
								'classes' => 'dropdown chosen-select',
								'options' => array(
									'true' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_controls_on' ),
									'false' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_controls_off' ),
								),
								'return' => true,
							),
						);
						$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
						$traveladvisor_opt_array = array(
							'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_dragable' ),
							'desc' => '',
							'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_dragable_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => esc_attr( $traveladvisor_var_map_draggable ),
								'id' => '',
								'cust_id' => '',
								'cust_name' => 'traveladvisor_var_map_draggable[]',
								'classes' => 'dropdown  chosen-select',
								'options' => array(
									'true' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_dragable_on' ),
									'false' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_dragable_off' ),
								),
								'return' => true,
							),
						);
						$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
						$traveladvisor_opt_array = array(
							'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_scroll_wheel' ),
							'desc' => '',
							'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_scroll_wheel_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => esc_attr( $traveladvisor_var_map_scrollwheel ),
								'id' => '',
								'cust_id' => '',
								'cust_name' => 'traveladvisor_var_map_scrollwheel[]',
								'classes' => 'dropdown chosen-select',
								'options' => array(
									'true' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_scroll_wheel_on' ),
									'false' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_scroll_wheel_off' ),
								),
								'return' => true,
							),
						);
						$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
						$traveladvisor_opt_array = array(
							'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_border' ),
							'desc' => '',
							'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_border_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => esc_attr( $traveladvisor_var_map_border ),
								'id' => '',
								'cust_id' => '',
								'cust_name' => 'traveladvisor_var_map_border[]',
								'classes' => 'dropdown chosen-select',
								'options' => array(
									'yes' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_border_on' ),
									'no' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_border_off' ),
								),
								'return' => true,
							),
						);
						$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
						$traveladvisor_opt_array = array(
							'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_border_color' ),
							'desc' => '',
							'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_map_border_color_hint' ),
							'echo' => true,
							'field_params' => array(
								'std' => esc_attr( $traveladvisor_var_map_border_color ),
								'cust_id' => '',
								'classes' => 'bg_color',
								'cust_name' => 'traveladvisor_var_map_border_color[]',
								'return' => true,
							),
						);
						$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
						?>
					</div>
					<?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
						?>
						<ul class="form-elements insert-bg">
							<li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:traveladvisor_shortcode_insert_editor('<?php echo esc_js( str_replace( 'traveladvisor_var_page_builder_', '', $name ) ); ?>', '<?php echo esc_js( $name . $traveladvisor_counter ) ?>', '<?php echo esc_js( $filter_element ); ?>')" ><?php _e( 'Insert', 'traveladvisor' ); ?></a> </li>
						</ul>
						<div id="results-shortocde"></div>
					<?php } else { ?>
						<?php
						$traveladvisor_opt_array = array(
							'std' => 'map',
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
						//echo $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render($traveladvisor_opt_array);
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
								'std' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_shortcode_save' ),
								'cust_id' => '',
								'cust_type' => 'button',
								'classes' => 'cs-traveladvisor-admin-btn',
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
		<?php
		if ( $die <> 1 ) {
			die();
		}
	}

	add_action( 'wp_ajax_traveladvisor_var_page_builder_map', 'traveladvisor_var_page_builder_map' );
}