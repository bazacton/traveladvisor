<?php
/*
 *
 * @Shortcode Name : Testimonial
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_page_builder_testimonial' ) ) {

	function traveladvisor_var_page_builder_testimonial( $die = 0 ) {
		global $post, $traveladvisor_node, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields, $traveladvisor_var_testimonial_text_color, $traveladvisor_var_static_text;
		$strings = new traveladvisor_theme_all_strings;
		$strings->traveladvisor_short_code_strings();
		$shortcode_element = '';
		$filter_element = 'filterdrag';
		$shortcode_view = '';
		$output = array();
		$traveladvisor_counter = $_POST['counter'];
		$testimonial_num = 0;
		if ( isset( $_POST['action'] ) && !isset( $_POST['shortcode_element_id'] ) ) {
			$TRAVELADVISOR_POSTID = '';
			$shortcode_element_id = '';
		} else {
			$TRAVELADVISOR_POSTID = $_POST['POSTID'];
			$shortcode_element_id = $_POST['shortcode_element_id'];
			$shortcode_str = stripslashes( $shortcode_element_id );
			$TRAVELADVISOR_PREFIX = 'traveladvisor_testimonial|testimonial_item';
			$parseObject = new ShortcodeParse();
			$output = $parseObject->traveladvisor_shortcodes( $output, $shortcode_str, true, $TRAVELADVISOR_PREFIX );
		}
		$defaults = array(
			'traveladvisor_var_column_size' => '',
			'traveladvisor_var_testimonial_element_title' => '',
			'traveladvisor_testimonial_class' => '',
			'traveladvisor_var_author_color' => '',
			'traveladvisor_var_testimonial_sub_title' => '',
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
			$testimonial_num = count( $atts_content );
		}
		$testimonial_element_size = '100';
		foreach ( $defaults as $key => $values ) {
			if ( isset( $atts[$key] ) ) {
				$$key = $atts[$key];
			} else {
				$$key = $values;
			}
		}
		$traveladvisor_var_testimonial_title = isset( $traveladvisor_var_testimonial_title ) ? $traveladvisor_var_testimonial_title : '';
		$traveladvisor_var_testimonial_element_title = isset( $traveladvisor_var_testimonial_element_title ) ? $traveladvisor_var_testimonial_element_title : '';
		$traveladvisor_var_author_color = isset( $traveladvisor_var_author_color ) ? $traveladvisor_var_author_color : '';
		//$traveladvisor_var_testimonial_text = isset($traveladvisor_var_testimonial_text) ? $traveladvisor_var_testimonial_text : '';
		$traveladvisor_var_testimonial_sub_title = isset( $traveladvisor_var_testimonial_sub_title ) ? $traveladvisor_var_testimonial_sub_title : '';
		$name = 'traveladvisor_var_page_builder_testimonial';
		$coloumn_class = 'column_' . $testimonial_element_size;
		if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
			$shortcode_element = 'shortcode_element_class';
			$shortcode_view = 'cs-pbwp-shortcode';
			$filter_element = 'ajax-drag';
			$coloumn_class = '';
		}
		?>
		<div id="<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>_del" class="column  parentdelete <?php echo traveladvisor_allow_special_char( $coloumn_class ); ?> <?php echo traveladvisor_allow_special_char( $shortcode_view ); ?>" item="testimonial" data="<?php echo traveladvisor_element_size_data_array_index( $testimonial_element_size ) ?>" >
			<?php traveladvisor_element_setting( $name, $traveladvisor_counter, $testimonial_element_size, '', 'comments-o', $type = '' ); ?>
			<div class="cs-wrapp-class-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ) ?> <?php echo traveladvisor_allow_special_char( $shortcode_element ); ?>" id="<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>" style="display: none;">
				<div class="cs-heading-area">
					<h5><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_edit_testimonial_option' ); ?></h5>
					<a href="javascript:traveladvisor_frame_removeoverlay('<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>','<?php echo traveladvisor_allow_special_char( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-times"></i></a>
				</div>
				<div class="cs-clone-append cs-pbwp-content">
					<div class="cs-wrapp-tab-box">
						<div id="shortcode-item-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ); ?>" data-shortcode-template="{{child_shortcode}} [/traveladvisor_testimonial]" data-shortcode-child-template="[testimonial_item {{attributes}}] {{content}} [/testimonial_item]">
							<div class="cs-wrapp-clone cs-shortcode-wrapp cs-disable-true cs-pbwp-content" data-template="[traveladvisor_testimonial {{attributes}}]">
								<?php
								if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
									traveladvisor_shortcode_element_size();
								}
								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_testimonial_element_title' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_testimonial_element_title_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $traveladvisor_var_testimonial_element_title ),
										'cust_id' => '',
										'cust_name' => 'traveladvisor_var_testimonial_element_title[]',
										'return' => true,
									),
								);
								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );


								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_testimonial_author_color' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_testimonial_author_color_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $traveladvisor_var_author_color ),
										'cust_id' => 'traveladvisor_var_author_color' . $traveladvisor_counter,
										'classes' => 'bg_color',
										'cust_name' => 'traveladvisor_var_author_color[]',
										'return' => true,
									),
								);
								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
								?>
							</div>
							<?php
							if ( isset( $testimonial_num ) && $testimonial_num <> '' && isset( $atts_content ) && is_array( $atts_content ) ) {
								foreach ( $atts_content as $testimonial ) {
									$rand_string = rand( 123456, 987654 );
									$traveladvisor_var_testimonial_text = $testimonial['content'];
									$defaults = array( 'traveladvisor_var_testimonial_desigination' => '', 'traveladvisor_var_testimonial_author' => '', 'testimonial_img_user' => '', 'traveladvisor_var_testimonial_position' => '', 'traveladvisor_var_testimonial_title' => '' );
									foreach ( $defaults as $key => $values ) {
										if ( isset( $testimonial['atts'][$key] ) ) {
											$$key = $testimonial['atts'][$key];
										} else {
											$$key = $values;
										}
									}
									$traveladvisor_var_testimonial_author = isset( $traveladvisor_var_testimonial_author ) ? $traveladvisor_var_testimonial_author : '';
									$traveladvisor_var_testimonial_desigination = isset( $traveladvisor_var_testimonial_desigination ) ? $traveladvisor_var_testimonial_desigination : '';
									$traveladvisor_var_testimonial_position = isset( $traveladvisor_var_testimonial_position ) ? $traveladvisor_var_testimonial_position : '';
									$testimonial_img_user = isset( $testimonial_img_user ) ? $testimonial_img_user : '';
									$traveladvisor_var_testimonial_title = isset( $traveladvisor_var_testimonial_title ) ? $traveladvisor_var_testimonial_title : '';
									?>
									<div class='cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content' id="traveladvisor_infobox_<?php echo traveladvisor_allow_special_char( $rand_string ); ?>">
										<header>
											<h4><i class='icon-arrows'></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_testimonial' ); ?></h4>
											<a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_shortcode_remove' ); ?></a>
										</header>
										<?php
										$traveladvisor_opt_array = array(
											'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_testimonial_text' ),
											'desc' => '',
											'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_testimonial_text_hint' ),
											'echo' => true,
											'field_params' => array(
												'std' => esc_attr( $traveladvisor_var_testimonial_text ),
												'cust_id' => '',
												'extra_atr' => 'data-content-text=cs-shortcode-textarea',
												'cust_name' => 'traveladvisor_var_testimonial_text[]',
												'return' => true,
												'classes' => '',
												'traveladvisor_editor' => true,
											),
										);
										$traveladvisor_var_html_fields->traveladvisor_var_textarea_field( $traveladvisor_opt_array );
										$traveladvisor_opt_array = array(
											'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_testimonial_author' ),
											'desc' => '',
											'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_testimonial_author_hint' ),
											'echo' => true,
											'classes' => 'txtfield',
											'field_params' => array(
												'std' => esc_attr( $traveladvisor_var_testimonial_author ),
												'cust_id' => '',
												'cust_name' => 'traveladvisor_var_testimonial_author[]',
												'return' => true,
											),
										);
										$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );

										$traveladvisor_opt_array = array(
											'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_testimonial_desigination' ),
											'desc' => '',
											'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_testimonial_desigination_hint' ),
											'echo' => true,
											'classes' => 'txtfield',
											'field_params' => array(
												'std' => $traveladvisor_var_testimonial_desigination,
												'cust_id' => '',
												'cust_name' => 'traveladvisor_var_testimonial_desigination[]',
												'return' => true,
											),
										);
										$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
										?>
									</div>
									<?php
								}
							}
							?>
						</div>
						<div class="hidden-object">
							<?php
							$traveladvisor_opt_array = array(
								'std' => traveladvisor_allow_special_char( $testimonial_num ),
								'id' => '',
								'before' => '',
								'after' => '',
								'classes' => 'fieldCounter',
								'extra_atr' => '',
								'cust_id' => '',
								'cust_name' => 'testimonial_num[]',
								'return' => true,
								'required' => false
							);
							$html_hidden = $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
							echo traveladvisor_allow_special_char( $html_hidden );
							//echo $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
							?>
						</div>
						<div class="wrapptabbox cs-pbwp-content cs-zero-padding">
							<div class="opt-conts">
								<ul class="form-elements">
									<li class="to-field"> <a href="#" class="add_servicesss cs-main-btn" onclick="traveladvisor_shortcode_element_ajax_call('testimonial', 'shortcode-item-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ); ?>', '<?php echo admin_url( 'admin-ajax.php' ); ?>')"><i class="icon-plus-circle"></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_add_testimonial' ); ?></a> </li>
									<div id="loading" class="shortcodeload"></div>
								</ul>
								<?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
									<ul class="form-elements insert-bg noborder">
										<li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:traveladvisor_shortcode_insert_editor('<?php echo str_replace( 'traveladvisor_var_page_builder_', '', $name ); ?>', 'shortcode-item-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ); ?>', '<?php echo traveladvisor_allow_special_char( $filter_element ); ?>')" ><?php _e( 'Insert', 'traveladvisor' ); ?></a> </li>
									</ul>
									<div id="results-shortocde"></div>
								<?php } else { ?>
									<?php
									$traveladvisor_opt_array = array(
										'std' => 'testimonial',
										'id' => '',
										'before' => '',
										'after' => '',
										'classes' => '',
										'extra_atr' => '',
										'cust_id' => 'traveladvisor_orderby' . $traveladvisor_counter,
										'cust_name' => 'traveladvisor_orderby[]',
										'return' => true,
										'required' => false
									);
									$html_hidden_render = $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
									echo traveladvisor_allow_special_char( $html_hidden_render );
									$traveladvisor_opt_array = array(
										'name' => '',
										'desc' => '',
										'hint_text' => '',
										'echo' => true,
										'field_params' => array(
											'std' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_shortcode_save' ),
											'cust_id' => 'testimonial_save' . $traveladvisor_counter,
											'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
											'cust_type' => 'button',
											'classes' => 'cs-traveladvisor-admin-btn',
											'cust_name' => 'testimonial_save',
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
		<?php
		if ( $die <> 1 ) {
			die();
		}
	}

	add_action( 'wp_ajax_traveladvisor_var_page_builder_testimonial', 'traveladvisor_var_page_builder_testimonial' );
}