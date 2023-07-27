<?php
/*
 *
 * @File : Blog element
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_page_builder_blog' ) ) {

	function traveladvisor_var_page_builder_blog( $die = 0 ) {
		global $post, $traveladvisor_node, $traveladvisor_var_html_fields, $traveladvisor_var_form_fields;
		if ( function_exists( 'traveladvisor_shortcode_names' ) ) {
			global $traveladvisor_var_static_text;
			$strings = new traveladvisor_theme_all_strings;
			$strings->traveladvisor_short_code_strings();
			$shortcode_element = '';
			$filter_element = 'filterdrag';
			$shortcode_view = '';
			$traveladvisor_output = array();
			$TRAVELADVISOR_PREFIX = 'traveladvisor_blog';
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
				'traveladvisor_var_blog_column' => '1/1',
				'traveladvisor_var_blog_title' => '',
				'traveladvisor_var_blog_category' => '',
				'traveladvisor_var_blog_view' => '',
				'traveladvisor_var_blog_orderby' => '',
				'traveladvisor_var_blog_description' => '',
				'traveladvisor_var_blog_excerpt' => '',
				'traveladvisor_var_blog_num_post' => '',
				'traveladvisor_var_blog_pagination' => '',
				'traveladvisor_var_blog_column' => ''
			);
			if ( isset( $traveladvisor_output['0']['atts'] ) ) {
				$atts = $traveladvisor_output['0']['atts'];
			} else {
				$atts = array();
			}
			if ( isset( $traveladvisor_output['0']['content'] ) ) {
				$blog_text = $traveladvisor_output['0']['content'];
			} else {
				$blog_text = '';
			}
			$blog_element_size = '25';
			foreach ( $defaults as $key => $values ) {
				if ( isset( $atts[$key] ) ) {
					$$key = $atts[$key];
				} else {
					$$key = $values;
				}
			}
			$traveladvisor_var_blog_title = isset( $traveladvisor_var_blog_title ) ? $traveladvisor_var_blog_title : '';
			$traveladvisor_var_blog_category = isset( $traveladvisor_var_blog_category ) ? $traveladvisor_var_blog_category : '';
			$traveladvisor_var_blog_view = isset( $traveladvisor_var_blog_view ) ? $traveladvisor_var_blog_view : '';
			$traveladvisor_var_blog_orderby = isset( $traveladvisor_var_blog_orderby ) ? $traveladvisor_var_blog_orderby : '';
			$traveladvisor_var_blog_description = isset( $traveladvisor_var_blog_description ) ? $traveladvisor_var_blog_description : '';
			$traveladvisor_var_blog_excerpt = isset( $traveladvisor_var_blog_excerpt ) ? $traveladvisor_var_blog_excerpt : '';
			$traveladvisor_var_blog_num_post = isset( $traveladvisor_var_blog_num_post ) ? $traveladvisor_var_blog_num_post : '';
			$traveladvisor_var_blog_pagination = isset( $traveladvisor_var_blog_pagination ) ? $traveladvisor_var_blog_pagination : '';
			$traveladvisor_var_blog_column = isset( $traveladvisor_var_blog_column ) ? $traveladvisor_var_blog_column : '';
			$name = 'traveladvisor_var_page_builder_blog';
			$coloumn_class = 'column_' . $blog_element_size;
			if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
				$shortcode_element = 'shortcode_element_class';
				$shortcode_view = 'cs-pbwp-shortcode';
				$filter_element = 'ajax-drag';
				$coloumn_class = '';
			}
			?>
			<div id="<?php echo esc_attr( $name . $traveladvisor_counter ) ?>_del" class="column  parentdelete <?php echo esc_attr( $coloumn_class ); ?>
				 <?php echo esc_attr( $shortcode_view ); ?>" item="blog" data="<?php echo traveladvisor_element_size_data_array_index( $blog_element_size ) ?>" >
					 <?php traveladvisor_element_setting( $name, $traveladvisor_counter, $blog_element_size ) ?>
				<div class="cs-wrapp-class-<?php echo intval( $traveladvisor_counter ) ?>
					 <?php echo esc_attr( $shortcode_element ); ?>" id="<?php echo esc_attr( $name . $traveladvisor_counter ) ?>" data-shortcode-template="[traveladvisor_blog {{attributes}}]{{content}}[/traveladvisor_blog]" style="display: none;">
					<div class="cs-heading-area" data-counter="<?php echo esc_attr( $traveladvisor_counter ) ?>">
						<h5><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_edit_blog_option' ); ?></h5>
						<a href="javascript:traveladvisor_frame_removeoverlay('<?php echo esc_js( $name . $traveladvisor_counter ) ?>','<?php echo esc_js( $filter_element ); ?>')" class="cs-btnclose">
							<i class="icon-times"></i>
						</a>
					</div>
					<div class="cs-pbwp-content">
						<div class="cs-wrapp-clone cs-shortcode-wrapp">
							<?php
							if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) {
								echo "<div class='traveladvisor_hide' style='display:block;'>";
								traveladvisor_shortcode_element_size();
								echo "</div>";
							}
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_title' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_title_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_blog_title ),
									'cust_id' => '',
									'cust_id' => 'traveladvisor_var_blog_title' . $traveladvisor_counter,
									'cust_name' => 'traveladvisor_var_blog_title[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
//                            $traveladvisor_opt_array = array(
//                                'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_blog_subtitle'),
//                                'desc' => '',
//                                'hint_text' =>traveladvisor_var_theme_text_srt('traveladvisor_var_blog_subtitle_hint'),
//                                'echo' => true,
//                                'field_params' => array(
//                                    'std' => esc_attr($traveladvisor_var_blog_subtitle),
//                                    'cust_id' => 'traveladvisor_var_blog_subtitle' . $traveladvisor_counter,
//                                    'classes' => '',
//                                    'cust_name' => 'traveladvisor_var_blog_subtitle[]',
//                                    'return' => true,
//                                ),
//                            );
//                            $traveladvisor_var_html_fields->traveladvisor_var_text_field($traveladvisor_opt_array);
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_blog_design_views' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_blog_design_views_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_blog_view ),
									'id' => '',
									'cust_name' => 'traveladvisor_var_blog_view[]',
									'cust_id' => 'my_select',
									'classes' => 'dropdown chosen-select',
									'options' => array(
										'blog-grid' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_view_grid' ),
										'blog-large' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_view_large' ),
										'blog-medium' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_view_medium' ),
										'blog-timeline' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_view_timeline' ),
										'blog-fancy' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_view_fancy' ),
									),
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
							echo "<div class='traveladvisor_hide' style='display:block;'>";
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_select_column' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_select_column_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_blog_column ),
									'cust_id' => 'traveladvisor_var_blog_column' . $traveladvisor_counter,
									'cust_name' => 'traveladvisor_var_blog_column[]',
									'classes' => 'dropdown chosen-select',
									'options' => array(
										'1' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_one' ),
										'2' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_two' ),
										'3' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_three' ),
										'4' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_four' ),
										'6' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_six' ),
									),
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
							echo "</div>";
							if ( function_exists( 'traveladvisor_show_all_cats' ) ) {
								$a_options = array();
								$a_options = traveladvisor_show_all_cats( '', '', $traveladvisor_var_blog_category, "category", true );
								$traveladvisor_opt_array = array(
									'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_choose_category' ),
									'desc' => '',
									'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_choose_category_hint' ),
									'echo' => true,
									'field_params' => array(
										'std' => esc_attr( $traveladvisor_var_blog_category ),
										'id' => '',
										'cust_name' => 'traveladvisor_var_blog_category[]',
										'classes' => 'dropdown chosen-select',
										'options' => $a_options,
										'return' => true,
									),
								);
								$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
							}
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_post_order' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_post_order_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_blog_orderby ),
									'id' => '',
									'cust_name' => 'traveladvisor_var_blog_orderby[]',
									'classes' => 'dropdown chosen-select',
									'options' => array(
										'ASC' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_post_asc' ),
										'DESC' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_post_desc' ),
									),
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
							echo "<div class='cs-hide-desc' style='display:block;'>";
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_post_description' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_post_description_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_blog_description ),
									'id' => '',
									'cust_name' => 'traveladvisor_var_blog_description[]',
									'classes' => 'dropdown chosen-select',
									'options' => array(
										'yes' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_post_description_yes' ),
										'no' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_post_description_no' ),
									),
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_excerpt' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_excerpt_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_blog_excerpt ),
									'cust_id' => '',
									'cust_name' => 'traveladvisor_var_blog_excerpt[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
							echo "</div>";
							echo "<div class='cs-pagination'>";
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_pagination' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_pagination_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_blog_pagination ),
									'id' => '',
									'cust_name' => 'traveladvisor_var_blog_pagination[]',
									'classes' => 'dropdown chosen-select',
									'options' => array(
										'no' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_post_pagination_no' ),
										'yes' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_post_pagination_yes' ),
									),
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
							echo "</div>";
							$traveladvisor_opt_array = array(
								'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_post_numbers' ),
								'desc' => '',
								'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_post_numbers_hint' ),
								'echo' => true,
								'field_params' => array(
									'std' => esc_attr( $traveladvisor_var_blog_num_post ),
									'cust_id' => '',
									'cust_name' => 'traveladvisor_var_blog_num_post[]',
									'return' => true,
								),
							);
							$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
							?>
							<script type="text/javascript">
			                    $(document).ready(function () {
			                        $("#my_select").change(function () {
			                            var id = $(this).children(":selected").attr("value");
			                            if ($(this).attr("value") == "blog-grid") {
			                                $(".traveladvisor_hide").show();
			                                $(".cs-hide-desc").show();
			                                $(".cs-pagination").show();
			                            } else if ($(this).attr("value") == "blog-fancy") {
			                                $(".traveladvisor_hide").show();
			                                $(".cs-hide-desc").hide();
			                                $(".cs-pagination").show();
			                            } else if ($(this).attr("value") == "blog-large") {
			                                $(".traveladvisor_hide").hide();
			                                $(".cs-hide-desc").show();
			                                $(".cs-pagination").show();
			                            } else if ($(this).attr("value") == "blog-medium") {
			                                $(".traveladvisor_hide").hide();
			                                $(".cs-hide-desc").show();
			                                $(".cs-pagination").show();
			                            } else if ($(this).attr("value") == "blog-timeline") {
			                                $(".traveladvisor_hide").hide();
			                                $(".cs-hide-desc").show();
			                                $(".cs-pagination").hide();
			                            } else {
			                                $(".traveladvisor_hide").show();
			                                $(".cs-hide-desc").show();
			                                $(".cs-pagination").show();
			                            }
			                        });
			                        $("select").change(function () {
			                            $(this).find("option:selected").each(function () {
			                            });
			                        }).change();
			                    });
							</script>
						</div>
						<?php if ( isset( $_POST['shortcode_element'] ) && $_POST['shortcode_element'] == 'shortcode' ) { ?>
							<ul class="form-elements insert-bg">
								<li class="to-field">
									<a class="insert-btn cs-main-btn" onclick="javascript:traveladvisor_shortcode_insert_editor('<?php echo str_replace( 'traveladvisor_var_page_builder_', '', $name ); ?>', '<?php echo esc_js( $name . $traveladvisor_counter ) ?>', '<?php echo esc_js( $filter_element ); ?>')" >
										<?php echo _e( 'Insert', 'traveladvisor' ); ?></a>
								</li>
							</ul>
							<div id="results-shortocde"></div>
						<?php } else { ?>

							<?php
							$traveladvisor_opt_array = array(
								'std' => 'blog',
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
									'std' => 'Save',
									'cust_id' => 'blog_save' . $traveladvisor_counter,
									'cust_type' => 'button',
									'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
									'classes' => 'cs-traveladvisor-admin-btn',
									'cust_name' => 'blog_save',
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

	add_action( 'wp_ajax_traveladvisor_var_page_builder_blog', 'traveladvisor_var_page_builder_blog' );
}