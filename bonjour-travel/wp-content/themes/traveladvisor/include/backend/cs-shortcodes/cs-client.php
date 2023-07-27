<?php
/*
 *
 * @Shortcode Name : Clients
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_page_builder_clients' ) ) {

	function traveladvisor_var_page_builder_clients( $die = 0 ) {
		global $post, $traveladvisor_node, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields;
		$shortcode_element = '';
		$filter_element = 'filterdrag';
		$shortcode_view = '';
		$output = array();
		$traveladvisor_counter = $_POST['counter'];
		$clients_num = 0;
		$traveladvisor_var_clients_element_title = isset( $traveladvisor_var_clients_element_title ) ? $traveladvisor_var_clients_element_title : '';
		$traveladvisor_var_clients_perslide = isset( $traveladvisor_var_clients_perslide ) ? $traveladvisor_var_clients_perslide : '';
		$traveladvisor_var_clients_text_color = isset( $traveladvisor_var_clients_text_color ) ? $traveladvisor_var_clients_text_color : '';
		$traveladvisor_var_clients_author = isset( $traveladvisor_var_clients_author ) ? $traveladvisor_var_clients_author : '';
		$traveladvisor_var_clients_position = isset( $traveladvisor_var_clients_position ) ? $traveladvisor_var_clients_position : '';
		$clients_img_user = isset( $clients_img_user ) ? $clients_img_user : '';
		if ( isset( $_POST['action'] ) && !isset( $_POST['shortcode_element_id'] ) ) {
			$TRAVELADVISOR_POSTID = '';
			$shortcode_element_id = '';
		} else {
			$TRAVELADVISOR_POSTID = $_POST['POSTID'];
			$shortcode_element_id = $_POST['shortcode_element_id'];
			$shortcode_str = stripslashes( $shortcode_element_id );
			$TRAVELADVISOR_PREFIX = 'traveladvisor_clients|clients_item';
			$parseObject = new ShortcodeParse();
			$output = $parseObject->traveladvisor_shortcodes( $output, $shortcode_str, true, $TRAVELADVISOR_PREFIX );
		}
		$defaults = array( 'column_size' => '1/1', 'traveladvisor_var_clients_text_color' => '', 'traveladvisor_clients_text_align' => '', 'traveladvisor_var_clients_element_title' => '',
			'traveladvisor_clients_class' => '', 'clients_style' => '', 'clients_text_color' => '', 'traveladvisor_var_clients_perslide' => '', );
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
			$clients_num = count( $atts_content );
		}
		$clients_element_size = '100';
		foreach ( $defaults as $key => $values ) {
			if ( isset( $atts[$key] ) ) {
				$$key = $atts[$key];
			} else {
				$$key = $values;
			}
		}
		$name = 'traveladvisor_var_page_builder_clients';
		$coloumn_class = 'column_' . $clients_element_size;
		if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
			$shortcode_element = 'shortcode_element_class';
			$shortcode_view = 'cs-pbwp-shortcode';
			$filter_element = 'ajax-drag';
			$coloumn_class = '';
		}
		?>
		<div id="<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>_del" class="column  parentdelete <?php echo traveladvisor_allow_special_char( $coloumn_class ); ?> <?php echo traveladvisor_allow_special_char( $shortcode_view ); ?>" item="clients" data="<?php echo traveladvisor_element_size_data_array_index( $clients_element_size ) ?>" >
			<?php traveladvisor_element_setting( $name, $traveladvisor_counter, $clients_element_size, '', 'comments-o', $type = '' ); ?>
			<div class="cs-wrapp-class-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ) ?> <?php echo traveladvisor_allow_special_char( $shortcode_element ); ?>" id="<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>" style="display: none;">
				<div class="cs-heading-area">
					<h5><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_client_edit_client_option' ); ?></h5>
					<a href="javascript:traveladvisor_frame_removeoverlay('<?php echo traveladvisor_allow_special_char( $name . $traveladvisor_counter ) ?>','<?php echo traveladvisor_allow_special_char( $filter_element ); ?>')" class="cs-btnclose"><i class="icon-times"></i></a>
				</div>
				<div class="cs-clone-append cs-pbwp-content">
					<div class="cs-wrapp-tab-box">
						<div id="shortcode-item-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ); ?>" data-shortcode-template="{{child_shortcode}} [/traveladvisor_clients]" data-shortcode-child-template="[clients_item {{attributes}}] {{content}} [/clients_item]">
							<div class="cs-wrapp-clone cs-shortcode-wrapp cs-disable-true cs-pbwp-content" data-template="[traveladvisor_clients {{attributes}}]">
								<?php
								if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
									traveladvisor_shortcode_element_size();
								}
								$traveladvisor_clients_style = isset( $traveladvisor_clients_style ) ? $traveladvisor_clients_style : '';
								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_client_element_title' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_client_element_title_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $traveladvisor_var_clients_element_title ),
										'cust_id' => 'traveladvisor_var_clients_element_title' . $traveladvisor_counter,
										'cust_name' => 'traveladvisor_var_clients_element_title[]',
										'return' => true,
									),
								);
								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_client_per' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_client_per_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $traveladvisor_var_clients_perslide ),
										'cust_id' => 'traveladvisor_var_clients_perslide' . $traveladvisor_counter,
										'cust_name' => 'traveladvisor_var_clients_perslide[]',
										'return' => true,
									),
								);
								$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
								?>
							</div>
							<?php
							if ( isset( $clients_num ) && $clients_num <> '' && isset( $atts_content ) && is_array( $atts_content ) ) {
								foreach ( $atts_content as $clients ) {
									$rand_string = rand( 1234, 7894563 );
									$traveladvisor_var_clients_text = $clients['content'];
									$defaults = array( 'traveladvisor_var_clients_author' => '', 'traveladvisor_var_clients_text' => '', 'traveladvisor_var_clients_img_user_array' => '', 'traveladvisor_var_clients_position' => '' );
									foreach ( $defaults as $key => $values ) {
										if ( isset( $clients['atts'][$key] ) ) {
											$$key = $clients['atts'][$key];
										} else {
											$$key = $values;
										}
									}
									?>
									<div class='cs-wrapp-clone cs-shortcode-wrapp cs-pbwp-content' id="traveladvisor_infobox_<?php echo traveladvisor_allow_special_char( $rand_string ); ?>">
										<header>
											<h4><i class='icon-arrows'></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_client_style_slider' ); ?></h4>
											<a href='#' class='deleteit_node'><i class='icon-minus-circle'></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_shortcode_remove' ); ?></a>
										</header>
										<?php
										$traveladvisor_opt_array = array(
											'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_client_url' ),
											'desc' => '',
											'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_client_url_hint' ),
											'echo' => true,
											'field_params' => array(
												'std' => esc_attr( $traveladvisor_var_clients_text ),
												'extra_atr' => 'data-content-text="cs-shortcode-textarea"',
												'cust_name' => 'traveladvisor_var_clients_text[]',
												'return' => true,
											),
										);
										$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
										$traveladvisor_opt_array = array(
											'std' => esc_url( $traveladvisor_var_clients_img_user_array ),
											'id' => 'clients_img_user',
											'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_client_image' ),
											'desc' => '',
											'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_client_image_hint' ),
											'echo' => true,
											'array' => true,
											'prefix' => '',
											'field_params' => array(
												'std' => esc_url( $traveladvisor_var_clients_img_user_array ),
												'id' => 'clients_img_user',
												'return' => true,
												'array' => true,
												'array_txt' => false,
												'prefix' => '',
											),
										);
										$traveladvisor_var_html_fields->traveladvisor_var_upload_file_field( $traveladvisor_opt_array );
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
								'std' => traveladvisor_allow_special_char( $clients_num ),
								'id' => '',
								'before' => '',
								'after' => '',
								'classes' => 'fieldCounter',
								'extra_atr' => '',
								'cust_name' => 'clients_num[]',
								'return' => true,
								'required' => false
							);
							//echo $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
							$html_hidden = $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
							echo traveladvisor_allow_special_char( $html_hidden );
							?>
						</div>
						<div class="wrapptabbox cs-pbwp-content cs-zero-padding">
							<div class="opt-conts">
								<ul class="form-elements">
									<li class="to-field"> <a href="#" class="add_servicesss cs-main-btn" onclick="traveladvisor_shortcode_element_ajax_call('clients', 'shortcode-item-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ); ?>', '<?php echo admin_url( 'admin-ajax.php' ); ?>')"><i class="icon-plus-circle"></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_add_client' ); ?></a> </li>
									<div id="loading" class="shortcodeload"></div>
								</ul>
								<?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
									<ul class="form-elements insert-bg noborder">
										<li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:traveladvisor_shortcode_insert_editor('<?php echo str_replace( 'traveladvisor_var_page_builder_', '', $name ); ?>', 'shortcode-item-<?php echo traveladvisor_allow_special_char( $traveladvisor_counter ); ?>', '<?php echo traveladvisor_allow_special_char( $filter_element ); ?>')" ><?php _e( 'Insert', 'traveladvisor' ); ?></a> </li>
									</ul>
									<div id="results-shortocde"></div>
									<?php
								} else {
									$traveladvisor_opt_array = array(
										'std' => 'clients',
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

									//echo $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
									$html_hidden_render = $traveladvisor_var_form_fields->traveladvisor_var_form_hidden_render( $traveladvisor_opt_array );
									echo traveladvisor_allow_special_char( $html_hidden_render );

									$traveladvisor_opt_array = array(
										'name' => '',
										'desc' => '',
										'hint_text' => '',
										'echo' => true,
										'field_params' => array(
											'std' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_shortcode_save' ),
											'cust_id' => 'clients_save' . $traveladvisor_counter,
											'cust_type' => 'button',
											'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
											'classes' => 'cs-traveladvisor-admin-btn',
											'cust_name' => 'clients_save',
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
		if ( $die <> 1 ) {
			die();
		}
	}

	add_action( 'wp_ajax_traveladvisor_var_page_builder_clients', 'traveladvisor_var_page_builder_clients' );
}