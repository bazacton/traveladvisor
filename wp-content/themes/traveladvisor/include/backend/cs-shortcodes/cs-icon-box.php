<?php
/*
 *
 * @Shortcode Name : icon_box
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_page_builder_icon_box' ) ) {

	function traveladvisor_var_page_builder_icon_box( $die = 0 ) {
		global $post, $traveladvisor_node, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields;
		$shortcode_element = '';
		$filter_element = 'filterdrag';
		$shortcode_view = '';
		$output = array();
		$traveladvisor_counter = $_POST['counter'];
		$icon_box_num = 0;
		if ( isset( $_POST['action'] ) && !isset( $_POST['shortcode_element_id'] ) ) {
			$TRAVELADVISOR_POSTID = '';
			$shortcode_element_id = '';
		} else {
			$TRAVELADVISOR_POSTID = $_POST['POSTID'];
			$shortcode_element_id = $_POST['shortcode_element_id'];
			$shortcode_str = stripslashes( $shortcode_element_id );
			$TRAVELADVISOR_PREFIX = 'icon_box|multiple_services_item';
			$parseObject = new ShortcodeParse();
			$output = $parseObject->traveladvisor_shortcodes( $output, $shortcode_str, true, $TRAVELADVISOR_PREFIX );
		}
		$defaults = array(
			'traveladvisor_var_icon_box_title' => '',
			'traveladvisor_var_icon_box_view' => '',
			'traveladvisor_var_item_column_size' => '',
			'traveladvisor_var_icon_box_content_align' => '',
			'traveladvisor_var_title_color' => '',
			'traveladvisor_var_icon_box_icon_color' => '',
			'traveladvisor_var_icon_box_bg_color' => '',
			'traveladvisor_var_icon_box_border_color' => '',
			'traveladvisor_var_icon_box_border' => '',
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
			$icon_box_num = count( $atts_content );
		}
		$icon_box_element_size = '100';
		foreach ( $defaults as $key => $values ) {
			if ( isset( $atts[$key] ) ) {
				$$key = $atts[$key];
			} else {
				$$key = $values;
			}
		}
		$traveladvisor_var_icon_box_title = isset( $traveladvisor_var_icon_box_title ) ? $traveladvisor_var_icon_box_title : '';
		$traveladvisor_var_item_column_size = isset( $traveladvisor_var_item_column_size ) ? $traveladvisor_var_item_column_size : '';
		$traveladvisor_var_icon_box_content_align = isset( $traveladvisor_var_icon_box_content_align ) ? $traveladvisor_var_icon_box_content_align : '';
		$traveladvisor_var_title_color = isset( $traveladvisor_var_title_color ) ? $traveladvisor_var_title_color : '';
		$traveladvisor_var_icon_box_icon_color = isset( $traveladvisor_var_icon_box_icon_color ) ? $traveladvisor_var_icon_box_icon_color : '';
		$traveladvisor_var_icon_box_bg_color = isset( $traveladvisor_var_icon_box_bg_color ) ? $traveladvisor_var_icon_box_bg_color : '';
		$traveladvisor_var_icon_box_border = isset( $traveladvisor_var_icon_box_border ) ? $traveladvisor_var_icon_box_border : '';
		$traveladvisor_var_icon_box_border_color = isset( $traveladvisor_var_icon_box_border_color ) ? $traveladvisor_var_icon_box_border_color : '';
		$name = 'traveladvisor_var_page_builder_icon_box';
		$coloumn_class = 'column_' . $icon_box_element_size;
		if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
			$shortcode_element = 'shortcode_element_class';
			$shortcode_view = 'cs-pbwp-shortcode';
			$filter_element = 'ajax-drag';
			$coloumn_class = '';
		}
		?>
		<div id="<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>_del" class="column  parentdelete <?php echo traveladvisor_allow_special_char( $coloumn_class ); ?> <?php echo traveladvisor_allow_special_char( $shortcode_view ); ?>" item="icon_box" data="<?php echo traveladvisor_element_size_data_array_index( $icon_box_element_size ) ?>" >
			<?php traveladvisor_element_setting( $name, $traveladvisor_counter, $icon_box_element_size, '', 'comments-o', $type = '' ); ?>
			<div class="cs-wrapp-class-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ) ?> <?php echo traveladvisor_allow_special_char( $shortcode_element ); ?>" id="<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>" style="display: none;">
				<div class="cs-heading-area">
					<h5><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_edit_multiservices_option' ); ?></h5>
					<a href="javascript:traveladvisor_frame_removeoverlay('<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>','<?php echo traveladvisor_allow_special_char( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-times"></i></a>
				</div>
				<div class="cs-clone-append cs-pbwp-content">
					<div class="cs-wrapp-tab-box">
						<div id="shortcode-item-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ); ?>" data-shortcode-template="{{child_shortcode}} [/icon_box]" data-shortcode-child-template="[multiple_services_item {{attributes}}] {{content}} [/multiple_services_item]">
							<div class="cs-wrapp-clone cs-shortcode-wrapp cs-disable-true cs-pbwp-content" data-template="[icon_box {{attributes}}]">
								<?php
								if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
									traveladvisor_shortcode_element_size();
								}
								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_element_title' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_element_title_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $traveladvisor_var_icon_box_title ),
										'cust_id' => '',
										'cust_name' => 'traveladvisor_var_icon_box_title[]',
										'return' => true,
									),
								);
								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );


								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_view' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_view_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $traveladvisor_var_icon_box_view ),
										'cust_id' => 'traveladvisor_var_icon_box_view' . $traveladvisor_counter,
										'cust_name' => 'traveladvisor_var_icon_box_view[]',
										'extra_atr' => 'onchange="select_service_view(this.value)"',
										'classes' => 'dropdown chosen-select',
										'options' => array(
											'grid_view' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_view_grid' ),
											'fancy_view' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_view_fancy' ),
											'widget_view' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_view_sidebar_widget' ),
										),
										'return' => true,
									),
								);
								$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );

								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_service_alignment' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_service_alignment_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => $traveladvisor_var_icon_box_content_align,
										'id' => '',
										'cust_name' => 'traveladvisor_var_icon_box_content_align[]',
										'classes' => 'dropdown chosen-select',
										'options' => array(
											'left' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_icon_position_left' ),
											'right' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_icon_position_right' ),
											'center' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_icon_position_center' ),
										),
										'return' => true,
									),
								);
								echo '<div class="alignment-style">';
								$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
								echo '</div>';

								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_item_size' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_item_size_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => $traveladvisor_var_item_column_size,
										'cust_id' => 'traveladvisor_var_item_column_size',
										'id' => 'item_column_size',
										'cust_type' => 'button',
										'classes' => 'column_size  dropdown chosen-select-no-single select-medium',
										'cust_name' => 'traveladvisor_var_item_column_size[]',
										'extra_atr' => '',
										'options' => array(
											'1/1' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_item_size_full_width' ),
											'1/2' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_item_size_one_half' ),
											'1/3' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_item_size_one_third' ),
											'1/4' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_item_size_one_fourth' ),
											'1/6' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_item_size_two_third' ),
										),
										'return' => true,
									),
								);
								$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );


								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_service_title_color' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_service_title_color_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $traveladvisor_var_title_color ),
										'cust_id' => 'traveladvisor_var_title_color',
										'classes' => 'bg_color',
										'cust_name' => 'traveladvisor_var_title_color[]',
										'return' => true,
									),
								);

								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );

								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_icon_color' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_icon_color_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $traveladvisor_var_icon_box_icon_color ),
										'id' => 'traveladvisor_var_icon_box_icon_color',
										'cust_name' => 'traveladvisor_var_icon_box_icon_color[]',
										'classes' => 'bg_color',
										'return' => true,
									),
								);

								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );

								$display = $traveladvisor_var_icon_box_view == 'widget_view' ? 'none' : 'block';
								echo '<div class="iconbox_sidebar_hide_show" style=" display:' . $display . ' ">';

								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_icon_bg_color' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_icon_bg_color_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $traveladvisor_var_icon_box_bg_color ),
										'id' => 'traveladvisor_var_icon_box_bg_color',
										'cust_name' => 'traveladvisor_var_icon_box_bg_color[]',
										'classes' => 'bg_color',
										'return' => true,
									),
								);

								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );

								$display = $traveladvisor_var_icon_box_view == 'fancy_view' ? 'none' : 'block';
								echo '<div class="icon_box_hide_show" style=" display:' . $display . ' ">';
								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_content_border' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_content_border_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => $traveladvisor_var_icon_box_border,
										'id' => '',
										'cust_name' => 'traveladvisor_var_icon_box_border[]',
										'classes' => 'dropdown chosen-select',
										'options' => array(
											'yes' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_content_border_yes' ),
											'no' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_content_border_no' ),
										),
										'return' => true,
									),
								);
								$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );


								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_content_border_color' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_content_border_color_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $traveladvisor_var_icon_box_border_color ),
										'id' => 'traveladvisor_var_icon_box_border_color',
										'cust_name' => 'traveladvisor_var_icon_box_border_color[]',
										'classes' => 'bg_color',
										'return' => true,
									),
								);

								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
								echo '</div>';
								echo '</div>';
								?>
							</div>
							<?php
							if ( isset( $icon_box_num ) && $icon_box_num <> '' && isset( $atts_content ) && is_array( $atts_content ) ) {
								foreach ( $atts_content as $icon_box ) {
									$rand_string = rand( 123456, 987654 );
									$traveladvisor_var_icon_box_text = $icon_box['content'];
									$defaults = array(
										'traveladvisor_var_icon_box_title_color' => '',
										'traveladvisor_icon_box_class' => '',
										'traveladvisor_var_multiple_service_title' => '',
										'traveladvisor_var_icon_box_background_color' => '',
										'traveladvisor_var_services_icon' => '',
										'traveladvisor_var_link_url' => '',
										'traveladvisor_var_multiple_service_logo_array' => '',
										'traveladvisor_var_icon_box_icon_type' => '',
									);
									foreach ( $defaults as $key => $values ) {
										if ( isset( $icon_box['atts'][$key] ) ) {
											$$key = $icon_box['atts'][$key];
										} else {
											$$key = $values;
										}
									}

									$traveladvisor_var_icon_box_text = isset( $traveladvisor_var_icon_box_text ) ? $traveladvisor_var_icon_box_text : '';
									$traveladvisor_var_multiple_service_title = isset( $traveladvisor_var_multiple_service_title ) ? $traveladvisor_var_multiple_service_title : '';
									$traveladvisor_var_icon_box_background_color = isset( $traveladvisor_var_icon_box_background_color ) ? $traveladvisor_var_icon_box_background_color : '';
									$traveladvisor_var_services_icon = isset( $traveladvisor_var_services_icon ) ? $traveladvisor_var_services_icon : '';
									$traveladvisor_var_service_icon_size = isset( $traveladvisor_var_service_icon_size ) ? $traveladvisor_var_service_icon_size : '';
									$traveladvisor_var_link_url = isset( $traveladvisor_var_link_url ) ? $traveladvisor_var_link_url : '';
									$traveladvisor_var_icon_box_icon_type = isset( $traveladvisor_var_icon_box_icon_type ) ? $traveladvisor_var_icon_box_icon_type : '';
									?>
									<div class='cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content' id="traveladvisor_infobox_<?php echo traveladvisor_allow_special_char( $rand_string ); ?>">
										<header>
											<h4><i class='icon-arrows'></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices' ); ?></h4>
											<a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_shortcode_remove' ); ?></a>
										</header>
										<?php
										$traveladvisor_opt_array = array(
											'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_title' ),
											'desc' => '',
											'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_title_hint' ),
											'echo' => true,
											'field_params' => array(
												'std' => esc_attr( $traveladvisor_var_multiple_service_title ),
												'cust_id' => 'traveladvisor_var_multiple_service_title',
												'classes' => '',
												'cust_name' => 'traveladvisor_var_multiple_service_title[]',
												'return' => true,
											),
										);
										$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
										$traveladvisor_opt_array = array(
											'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_service_icon_type' ),
											'desc' => '',
											'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_service_icon_type_hint' ),
											'echo' => true,
											'field_params' => array(
												'std' => esc_html( $traveladvisor_var_icon_box_icon_type ),
												'id' => 'traveladvisor_var_icon_box_icon_type',
												'cust_name' => 'traveladvisor_var_icon_box_icon_type[]',
												'extra_atr' => ' onchange=traveladvisor_icon_box_view_change(this.value)',
												'classes' => 'chosen-select-no-single select-medium function-class',
												'options' => array(
													'icon' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_service_icon' ),
													'image' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_service_image' ),
												),
												'return' => true,
											),
										);

										$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
										?>
										<div class="cs-sh-icon_box-image-area" style="display:<?php echo esc_html( $traveladvisor_var_icon_box_icon_type == 'image' ? 'block' : 'none' ) ?>;">
											<?php
											// $display = $traveladvisor_var_icon_box_icon_type == 'Icon'  ? 'none' : 'block';
											//echo '<div class="service_widget_image" style=" display:' . $display . ' ">';
											$traveladvisor_opt_array = array(
												'std' => esc_attr( $traveladvisor_var_multiple_service_logo_array ),
												'id' => 'multiple_service_logo',
												'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_image' ),
												'desc' => '',
												'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_image_hint' ),
												'echo' => true,
												'array' => true,
												'prefix' => '',
												'field_params' => array(
													'std' => esc_attr( $traveladvisor_var_multiple_service_logo_array ),
													'id' => 'multiple_service_logo',
													'return' => true,
													'array' => true,
													'array_txt' => false,
													'prefix' => '',
												),
											);
											$traveladvisor_var_html_fields->traveladvisor_var_upload_file_field( $traveladvisor_opt_array );
											// echo '</div>';
											?>
										</div>  
										<?php
										$display = $traveladvisor_var_icon_box_view == 'widget_view' ? 'none' : 'block';
										$rand_id = rand( 123450, 854987 );
										?>	 				
										<div class="cs-sh-icon_box-icon-area" style="display:<?php echo esc_html( $traveladvisor_var_icon_box_icon_type != 'image' ? 'block' : 'none' ) ?>;">
											<div class="form-elements" id="traveladvisor_infobox_<?php echo esc_attr( $rand_id ); ?>">
												<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
													<label><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_icon' ); ?></label>
													<?php
													if ( function_exists( 'traveladvisor_var_tooltip_helptext' ) ) {
														echo traveladvisor_var_tooltip_helptext( traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_icon_hint' ) );
													}
													?>
												</div>
												<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
													<?php echo traveladvisor_var_icomoon_icons_box( $traveladvisor_var_services_icon, esc_attr( $rand_id ), 'traveladvisor_var_services_icon' ); ?>
												</div>
											</div>
										</div>
										<?php
										$traveladvisor_opt_array = array(
											'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_url' ),
											'desc' => '',
											'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_url_hint' ),
											'echo' => true,
											'field_params' => array(
												'std' => esc_attr( $traveladvisor_var_link_url ),
												'cust_id' => 'traveladvisor_var_link_url',
												'classes' => '',
												'cust_name' => 'traveladvisor_var_link_url[]',
												'return' => true,
											),
										);
										$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );


										$traveladvisor_opt_array = array(
											'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_contents' ),
											'desc' => '',
											'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_multiservices_contents_hint' ),
											'echo' => true,
											'field_params' => array(
												'std' => traveladvisor_allow_special_char( $traveladvisor_var_icon_box_text ),
												'cust_id' => 'traveladvisor_var_icon_box_text',
												'extra_atr' => 'data-content-text=cs-shortcode-textarea',
												'cust_name' => 'traveladvisor_var_icon_box_text[]',
												'classes' => '',
												'traveladvisor_editor' => true,
												'return' => true,
											),
										);
										$traveladvisor_var_html_fields->traveladvisor_var_textarea_field( $traveladvisor_opt_array );


										echo '<div class="service_icon" style=" display:' . $display . ' ">';


										echo '</div>';
										?>
									</div>

									<script type="text/javascript">
				                        jQuery('.function-class').change(function ($) {
				                            var value = jQuery(this).val();

				                            var parentNode = jQuery(this).parent().parent().parent();
				                            if (value == 'image') {
				                                //alert(parentNode);
				                                parentNode.find(".cs-sh-icon_box-image-area").show();
				                                parentNode.find(".cs-sh-icon_box-icon-area").hide();
				                                /*
				                                 jQuery(".cs-sh-icon_box-image-area").show();
				                                 jQuery(".cs-sh-icon_box-icon-area").hide();
				                                 */
				                            } else {
				                                parentNode.find(".cs-sh-icon_box-image-area").hide();
				                                parentNode.find(".cs-sh-icon_box-icon-area").show();
				                                /*
				                                 jQuery(".cs-sh-icon_box-image-area").hide();
				                                 jQuery(".cs-sh-icon_box-icon-area").show();
				                                 */
				                            }

				                        }
				                        );



									</script>


									<?php
								}
							}
							?>
						</div>
						<div class="hidden-object">
							<?php
							$traveladvisor_opt_array = array(
								'std' => traveladvisor_allow_special_char( $icon_box_num ),
								'id' => '',
								'before' => '',
								'after' => '',
								'classes' => 'fieldCounter',
								'extra_atr' => '',
								'cust_id' => '',
								'cust_name' => 'icon_box_num[]',
								'return' => false,
								'required' => false
							);
							$traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
							?>
						</div>
						<div class="wrapptabbox cs-pbwp-content cs-zero-padding">
							<div class="opt-conts">
								<ul class="form-elements">
									<li class="to-field"> <a href="#" class="add_servicesss cs-main-btn" onclick="traveladvisor_shortcode_element_ajax_call('icon_box', 'shortcode-item-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ); ?>', '<?php echo admin_url( 'admin-ajax.php' ); ?>')"><i class="icon-plus-circle"></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_add_multiservices' ); ?></a> </li>
									<div id="loading" class="shortcodeload"></div>
								</ul>
								<?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
									<ul class="form-elements insert-bg noborder">
										<li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:traveladvisor_shortcode_insert_editor('<?php echo str_replace( 'traveladvisor_var_page_builder_', '', $name ); ?>', 'shortcode-item-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ); ?>', '<?php echo traveladvisor_allow_special_char( $filter_element ); ?>')" ><?php esc_html_e( 'Insert', 'traveladvisor' ); ?></a> </li>
									</ul>
									<div id="results-shortocde"></div>
								<?php } else { ?>
									<?php
									$traveladvisor_opt_array = array(
										'std' => 'icon_box',
										'id' => '',
										'before' => '',
										'after' => '',
										'classes' => '',
										'extra_atr' => '',
										'cust_id' => 'traveladvisor_orderby' . $traveladvisor_counter,
										'cust_name' => 'traveladvisor_orderby[]',
										'return' => false,
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
											'cust_id' => 'icon_box_save' . $traveladvisor_counter,
											'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
											'cust_type' => 'button',
											'classes' => 'cs-traveladvisor-admin-btn',
											'cust_name' => 'icon_box_save',
											'return' => true,
										),
									);
									$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
								}
								?>
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

	add_action( 'wp_ajax_traveladvisor_var_page_builder_icon_box', 'traveladvisor_var_page_builder_icon_box' );
}