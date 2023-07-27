<?php
/**
 * Header Functions
 *
 * @package WordPress
 * @subpackage Traveladvisor
 * @since Traveladvisor
 */
if ( !get_option( 'traveladvisor_var_options' ) ) {
	$traveladvisor_activation_data = theme_default_options();
	if ( is_array( $traveladvisor_activation_data ) && sizeof( $traveladvisor_activation_data ) > 0 ) {
		$traveladvisor_var_options = $traveladvisor_activation_data;
	} else {
		traveladvisor_include_file( get_template_directory() .'/include/backend/cs-global-variables.php', true );
	}
}
/**
 * retuns the frontend theme logo   
 */
if ( !function_exists( 'traveladvisor_var_logo' ) ) {

	function traveladvisor_var_logo( $container_class = 'cs-logo' ) {
		$traveladvisor_var_options = TRAVELADVISOR_VAR_GLOBALS()->theme_options();
		$traveladvisor_var_logo = $traveladvisor_var_options['traveladvisor_var_custom_logo'];
		$traveladvisor_var_width = $traveladvisor_var_options['traveladvisor_var_logo_width'];
		$traveladvisor_var_height = $traveladvisor_var_options['traveladvisor_var_logo_height'];
		if ( $traveladvisor_var_width != 0 ) {
			$traveladvisor_var_width = 'width:';
			$traveladvisor_var_width .= $traveladvisor_var_options['traveladvisor_var_logo_width'];
			$traveladvisor_var_width .='px;';
		} else {

			$traveladvisor_var_width .='';
		}
		if ( $traveladvisor_var_height != 0 ) {
			$traveladvisor_var_height = 'height:';
			$traveladvisor_var_height .= $traveladvisor_var_options['traveladvisor_var_logo_height'];
			$traveladvisor_var_height .='px;';
		} else {
			$traveladvisor_var_height .='';
		}
		?>
		<div class="<?php echo sanitize_html_class( $container_class ) ?>">
			<div class="cs-media">
				<figure>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"> 
						<?php if ( $traveladvisor_var_logo != '' ) {
							?>
							<img src="<?php echo esc_url( $traveladvisor_var_logo ) ?>" style=" <?php echo traveladvisor_allow_special_char($traveladvisor_var_width) ?> <?php echo traveladvisor_allow_special_char($traveladvisor_var_height) ?>" alt="<?php esc_html( bloginfo( 'name' ) ) ?>">
							<?php
						} else {
							?>
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/frontend/images/logo.png' ) ?>"  alt="<?php esc_html( bloginfo( 'name' ) ) ?>">
							<?php
						}
						?>
					</a>
				</figure>
			</div>
		</div>
		<?php
		if ( isset( $traveladvisor_var_options['traveladvisor_var_autosidebar'] ) and $traveladvisor_var_options['traveladvisor_var_autosidebar'] == 'on' ) {
			?>
			<div class="cs-menu-slide">
				<div class="mm-toggle"> <i class="icon-menu5"></i> </div>
			</div>
			<?php
		}
	}

}
/**
 * retuns the frontend theme logo   
 */
if ( !function_exists( 'traveladvisor_woocommerce_header_cart' ) ) {

	function traveladvisor_woocommerce_header_cart() {
		if ( class_exists( 'WooCommerce' ) ) {
			global $woocommerce;
			?>
			<div class="cs-cart">   
				<a href="<?php echo esc_url( wc_get_cart_url() ) ?>">
					<i class="icon-shopping-cart"></i>
					<span class="cs-bgcolor"><?php echo absint( $woocommerce->cart->cart_contents_count ) ?></span>
				</a>
			</div> 
			<?php
		}
	}

}
/**
 * retuns woocommerce header cart fragment
 */
if ( !function_exists( 'traveladvisor_woocommerce_header_cart_fragment' ) ) {

	function traveladvisor_woocommerce_header_cart_fragment( $fragments ) {
		if ( class_exists( 'WooCommerce' ) ) {
			global $woocommerce;
			ob_start();
			?>
			<li class="cs-cart cs-frag-cart">
				<a href="<?php echo esc_url( wc_get_cart_url() ) ?>">
					<i class="icon-shopping-cart"></i>
					<span class="csborder-color"><?php echo absint( $woocommerce->cart->cart_contents_count ) ?></span>
				</a>
			</li>
			<?php
			$fragments['li.cs-frag-cart'] = ob_get_clean();
			return $fragments;
		}
	}

	add_filter( 'woocommerce_add_to_cart_fragments', 'traveladvisor_woocommerce_header_cart_fragment' );
}
/**
 * retuns custom css as defind in the cs theme subheader options 
 */
if ( !function_exists( 'traveladvisor_var_subheader_style' ) ) {

	function traveladvisor_var_subheader_style( $traveladvisor_var_post_ID = '' ) {
		global $post, $wp_query, $traveladvisor_var_post_meta;
		$traveladvisor_var_options = TRAVELADVISOR_VAR_GLOBALS()->theme_options();
		$post_type = get_post_type( get_the_ID() );
		$traveladvisor_var_post_ID = get_the_ID();
		if ( is_search() || is_category() || is_home() || is_404() ) {
			$traveladvisor_var_post_ID = '';
		}
		$meta_element = 'traveladvisor_full_data';
		$traveladvisor_var_post_meta = get_post_meta( ( int ) $traveladvisor_var_post_ID, "$meta_element", true );
		$traveladvisor_var_header_banner_style = get_post_meta( ( int ) $traveladvisor_var_post_ID, "traveladvisor_var_header_banner_style", true );
		if ( isset( $traveladvisor_var_header_banner_style ) && $traveladvisor_var_header_banner_style == 'no-header' ) {
			$traveladvisor_var_header_border_color = get_post_meta( ( int ) $traveladvisor_var_post_ID, "traveladvisor_var_main_header_border_color", true );
			if ( $traveladvisor_var_header_border_color <> '' ) {
				echo '
                <style>
                #header .cs-main-nav{
                    border-bottom: 1px solid ' . $traveladvisor_var_header_border_color . ' !important;
                }
                </style>';
			}
		} else if ( isset( $traveladvisor_var_header_banner_style ) && $traveladvisor_var_header_banner_style == 'breadcrumb_header' ) {
			traveladvisor_var_breadcrumb_page_setting( $traveladvisor_var_post_ID );
		} else if ( isset( $traveladvisor_var_header_banner_style ) && $traveladvisor_var_header_banner_style == 'custom_slider' ) {
			traveladvisor_var_rev_slider( 'pages', $traveladvisor_var_post_ID );
		} else if ( isset( $traveladvisor_var_header_banner_style ) && $traveladvisor_var_header_banner_style == 'map' ) {
			traveladvisor_var_page_map( $traveladvisor_var_post_ID );
		} else if ( isset( $traveladvisor_var_options['traveladvisor_var_default_header'] ) ) {
			if ( $traveladvisor_var_options['traveladvisor_var_default_header'] == 'no_header' ) {
				$traveladvisor_var_header_border_color = $traveladvisor_var_options['traveladvisor_var_header_border_color'];
				if ( $traveladvisor_var_header_border_color <> '' ) {
					echo '
                    <style>
                    #header .cs-main-nav .pinned {
                        border-bottom: 1px solid ' . $traveladvisor_var_header_border_color . ';
                    }
                    </style>';
				}
			} else if ( $traveladvisor_var_options['traveladvisor_var_default_header'] == 'breadcrumbs_sub_header' ) {
				traveladvisor_var_breadcrumb_theme_option( $traveladvisor_var_post_ID );
			} else if ( $traveladvisor_var_options['traveladvisor_var_default_header'] == 'slider' ) {
				traveladvisor_var_rev_slider( 'default-pages', $traveladvisor_var_post_ID );
			}
		}
		$advance_switcher = '';
		if ( isset( $traveladvisor_var_options['traveladvisor_var_advance_search_box_switcher'] ) and $traveladvisor_var_options['traveladvisor_var_advance_search_box_switcher'] != '' ) {
			$advance_switcher = $traveladvisor_var_options['traveladvisor_var_advance_search_box_switcher'];
		}


		if ( $advance_switcher == 'on' ) {
			if ( is_front_page() and ! is_home() ) {
				global $post, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
				$traveladvisor_id = $post->ID;
				$traveladvisor_arguments = array( 'post_type' => 'destination' );
				$traveladvisor_var_destinations_list = new WP_Query( $traveladvisor_arguments );
				while ( $traveladvisor_var_destinations_list->have_posts() ): $traveladvisor_var_destinations_list->the_post();
					$traveladvisor_destinations_list[] = get_the_title();
				endwhile;
				wp_reset_postdata();
				$post->ID = $traveladvisor_id;

				$traveladvisor_destination_options = array_combine( $traveladvisor_destinations_list, $traveladvisor_destinations_list );
				$unique_destination = array_values( $traveladvisor_destination_options );

				$listingpage = $traveladvisor_var_options['traveladvisor_var_search_result_page'];
				?>

				<div class="cs-main-search">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<?php
								wp_add_inline_script( 'traveladvisor-inline-script', 'jQuery(document).ready(function(){function toursearchstring(searchtext) {
                                        document.getElementById("search_title").value = searchtext;
                                    }
                                    function toursearchdestination(searchdestination) {
                                        document.getElementById("destinations").value = searchdestination;
                                    }
                                    function toursearchdate(searchdate) {
                                        document.getElementById("tour_starting_date").value = searchdate;
                                    }
                                    function toursearchtourtype(searchtourtype) {
                                        document.getElementById("tour_search_tourtype").value = searchtourtype;
                                    }});' );
								?>


								<form id="traveladvisor-advance-search-form" method="get" action="<?php echo get_site_url() . "/" . $listingpage ?>" enctype="multipart/form-data">

									<ul>
										<li class="search-input"> <i class="icon-search2"></i>
											<input type="text" placeholder="<?php _e( 'Enter any keyword', 'traveladvisor' ); ?>" id="tour_search_string" onchange="toursearchstring(this.value);">
										</li>
										<li class="select-dropdown">
											<div class="side-by-side clearfix"> <i class="icon-map-o"></i>
												<select class="chosen-select" tabindex="5" id="tour_destination" onchange="toursearchdestination(this.value);">
													<option> <?php _e( 'Select Destination', 'traveladvisor' ); ?> </option>
													<?php
													$destination_list = '';
													foreach ( $unique_destination as $key => $traveladvisor_destination_option ) {
														$us_values_only_travel_style = ucwords( str_replace( '-', ' ', $traveladvisor_destination_option ) );
														echo '<option value="' . strtolower( $traveladvisor_destination_option ) . '" >' . $us_values_only_travel_style . '</option>';
													}
													?>
												</select>
											</div>
										</li>
										<li class="select-dropdown" >
											<div class="cs-datepicker"> <i class="icon-calendar-minus-o"></i>
												<label id="Deadline" class="cs-calendar-combo">
													<input type="text" placeholder="<?php _e( 'Select Dates', 'traveladvisor' ); ?>" onchange="toursearchdate(this.value);">
												</label>
												<em class="icon-keyboard_arrow_down"></em> </div>
										</li>

										<li class="search-btn">
											<input type="submit" class="cs-bgcolor" value="Search tour">
										</li>
									</ul>
									<input type="hidden" name="search_title" id="search_title" value="" />
									<input type="hidden" name="destinations" id="destinations" value=""  />
									<input type="hidden" name="tour_starting_date" id="tour_starting_date" value=""/>
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
		}
	}

}

/*
 * Start Rev slider function
 */

if ( !function_exists( 'traveladvisor_var_rev_slider' ) ) {

	function traveladvisor_var_rev_slider( $traveladvisor_var_slider_type = '', $traveladvisor_var_post_ID = '' ) {
		global $post, $post_meta;
		$traveladvisor_var_options = TRAVELADVISOR_VAR_GLOBALS()->theme_options();
		if ( $traveladvisor_var_slider_type == 'pages' ) {
			$traveladvisor_var_rev_slider_id = get_post_meta( ( int ) $traveladvisor_var_post_ID, "traveladvisor_var_custom_slider_id", true );
		} else {
			$traveladvisor_var_rev_slider_id = $traveladvisor_var_options['traveladvisor_var_custom_slider'];
		}
		if ( isset( $traveladvisor_var_rev_slider_id ) && $traveladvisor_var_rev_slider_id != '' ) {
			?>
			<div class="cs-banner"> <?php echo do_shortcode( "[rev_slider alias=\"{$traveladvisor_var_rev_slider_id}\"]" ); ?> </div>
			<?php
		}
	}

}
/*
 * retuns the maps when it is used in the sub header custom option for the map
 */
if ( !function_exists( 'traveladvisor_var_page_map' ) ) {

	function traveladvisor_var_page_map( $traveladvisor_var_post_ID = '' ) {
		global $post, $post_meta, $header_map;
		$traveladvisor_var_custom_map = get_post_meta( ( int ) $traveladvisor_var_post_ID, "traveladvisor_var_custom_map", true );
		if ( empty( $traveladvisor_var_custom_map ) ) {
			$traveladvisor_var_custom_map = "";
		} else {
			$traveladvisor_var_custom_map = html_entity_decode( $traveladvisor_var_custom_map );
		}
		if ( isset( $traveladvisor_var_custom_map ) && $traveladvisor_var_custom_map != '' ) {
			$header_map = true;
			?>
			<div class="cs-sub-header"> 
				<?php echo do_shortcode( $traveladvisor_var_custom_map ); ?> </div>
			<?php
		}
	}

}

/**
 * @subheader page 
 * set the breadcrumb on a specific page 
 */
if ( !function_exists( 'traveladvisor_var_breadcrumb_page_setting' ) ) {

	function traveladvisor_var_breadcrumb_page_setting() {
		global $post, $wp_query, $post_meta;
		$traveladvisor_var_options = TRAVELADVISOR_VAR_GLOBALS()->theme_options();
		$meta_element = 'traveladvisor_full_data';
		$traveladvisor_var_post_ID = get_the_ID();
		if ( function_exists( 'is_shop' ) ) {
			if ( is_shop() ) {
				$traveladvisor_var_post_ID = wc_get_page_id( 'shop' );
			}
		}
		$post_meta = get_post_meta( ( int ) $traveladvisor_var_post_ID, "$meta_element", true );
		$traveladvisor_var_sub_header_sub_hdng = get_post_meta( ( int ) $traveladvisor_var_post_ID, "traveladvisor_var_page_subheading_title", true );
		$traveladvisor_var_header_banner_image = get_post_meta( ( int ) $traveladvisor_var_post_ID, "traveladvisor_var_header_banner_image", true );
		$traveladvisor_var_traveladvisor_page_title_align = get_post_meta( ( int ) $traveladvisor_var_post_ID, "traveladvisor_var_traveladvisor_page_title_align", true );
		$traveladvisor_var_page_subheader_parallax = get_post_meta( ( int ) $traveladvisor_var_post_ID, "traveladvisor_var_page_subheader_parallax", true );
		$traveladvisor_var_page_subheader_color = get_post_meta( ( int ) $traveladvisor_var_post_ID, "traveladvisor_var_page_subheader_color", true );
		$traveladvisor_var_sub_header_border_color = get_post_meta( ( int ) $traveladvisor_var_post_ID, "traveladvisor_var_subheader_border_color", true );
		$traveladvisor_var_page_title_switch = get_post_meta( ( int ) $traveladvisor_var_post_ID, "traveladvisor_var_page_title_switch", true );
		$traveladvisor_var_page_breadcrumbs = get_post_meta( ( int ) $traveladvisor_var_post_ID, "traveladvisor_var_page_breadcrumbs", true );
		$traveladvisor_var_subheader_padding_top = get_post_meta( ( int ) $traveladvisor_var_post_ID, "traveladvisor_var_subheader_padding_top", true );
		$traveladvisor_var_subheader_padding_bottom = get_post_meta( ( int ) $traveladvisor_var_post_ID, "traveladvisor_var_subheader_padding_bottom", true );
		$traveladvisor_var_subheader_margin_top = get_post_meta( ( int ) $traveladvisor_var_post_ID, "traveladvisor_var_subheader_margin_top", true );
		$traveladvisor_var_subheader_margin_bottom = get_post_meta( ( int ) $traveladvisor_var_post_ID, "traveladvisor_var_subheader_margin_bottom", true );
		$traveladvisor_var_page_subheader_text_color = get_post_meta( ( int ) $traveladvisor_var_post_ID, "traveladvisor_var_page_subheader_text_color", true );
		$traveladvisor_all_fields = array(
			'traveladvisor_var_post_ID' => $traveladvisor_var_post_ID,
			'traveladvisor_var_sub_header_sub_hdng' => $traveladvisor_var_sub_header_sub_hdng,
			'traveladvisor_var_header_banner_image' => $traveladvisor_var_header_banner_image,
			'traveladvisor_var_page_subheader_parallax' => $traveladvisor_var_page_subheader_parallax,
			'traveladvisor_var_page_subheader_color' => $traveladvisor_var_page_subheader_color,
			'traveladvisor_var_sub_header_border_color' => $traveladvisor_var_sub_header_border_color,
			'traveladvisor_var_page_title_switch' => $traveladvisor_var_page_title_switch,
			'traveladvisor_var_page_breadcrumbs' => $traveladvisor_var_page_breadcrumbs,
			'traveladvisor_var_subheader_padding_top' => $traveladvisor_var_subheader_padding_top,
			'traveladvisor_var_subheader_padding_bottom' => $traveladvisor_var_subheader_padding_bottom,
			'traveladvisor_var_subheader_margin_top' => $traveladvisor_var_subheader_margin_top,
			'traveladvisor_var_subheader_margin_bottom' => $traveladvisor_var_subheader_margin_bottom,
			'traveladvisor_var_page_subheader_text_color' => $traveladvisor_var_page_subheader_text_color,
			'traveladvisor_var_traveladvisor_page_title_align' => $traveladvisor_var_traveladvisor_page_title_align,
		);
		traveladvisor_var_breadcrumb_markup( $traveladvisor_all_fields );
	}

}
/**
 * @subheader page 
 * breadcrums settings
 */
if ( !function_exists( 'traveladvisor_var_breadcrumb_theme_option' ) ) {

	function traveladvisor_var_breadcrumb_theme_option() {
		$traveladvisor_var_options = TRAVELADVISOR_VAR_GLOBALS()->theme_options();
		$traveladvisor_var_post_ID = get_the_ID();
		if ( function_exists( 'is_shop' ) ) {
			if ( is_shop() ) {
				$traveladvisor_var_post_ID = wc_get_page_id( 'shop' );
			}
		}
		$traveladvisor_var_traveladvisor_page_title_align = isset( $traveladvisor_var_options['traveladvisor_var_text_align'] ) ? $traveladvisor_var_options['traveladvisor_var_text_align'] : '';
		$traveladvisor_var_sub_header_sub_hdng = isset( $traveladvisor_var_options['traveladvisor_var_sub_header_sub_hdng'] ) ? $traveladvisor_var_options['traveladvisor_var_sub_header_sub_hdng'] : '';
		$traveladvisor_var_header_banner_image = isset( $traveladvisor_var_options['traveladvisor_var_sub_header_bg_img'] ) ? $traveladvisor_var_options['traveladvisor_var_sub_header_bg_img'] : '';
		$traveladvisor_var_page_subheader_parallax = isset( $traveladvisor_var_options['traveladvisor_var_sub_header_parallax'] ) ? $traveladvisor_var_options['traveladvisor_var_sub_header_parallax'] : '';
		$traveladvisor_var_page_subheader_color = isset( $traveladvisor_var_options['traveladvisor_var_sub_header_bg_clr'] ) ? $traveladvisor_var_options['traveladvisor_var_sub_header_bg_clr'] : '';
		$traveladvisor_var_sub_header_border_color = isset( $traveladvisor_var_options['traveladvisor_var_sub_header_border_color'] ) ? $traveladvisor_var_options['traveladvisor_var_sub_header_border_color'] : '';
		$traveladvisor_var_page_title_switch = isset( $traveladvisor_var_options['traveladvisor_var_page_title_switch'] ) ? $traveladvisor_var_options['traveladvisor_var_page_title_switch'] : '';
		$traveladvisor_var_page_breadcrumbs = isset( $traveladvisor_var_options['traveladvisor_var_breadcrumbs_switch'] ) ? $traveladvisor_var_options['traveladvisor_var_breadcrumbs_switch'] : '';
		$traveladvisor_var_subheader_padding_top = isset( $traveladvisor_var_options['traveladvisor_var_sh_paddingtop'] ) ? $traveladvisor_var_options['traveladvisor_var_sh_paddingtop'] : '';
		$traveladvisor_var_subheader_padding_bottom = isset( $traveladvisor_var_options['traveladvisor_var_sh_paddingbottom'] ) ? $traveladvisor_var_options['traveladvisor_var_sh_paddingbottom'] : '';
		$traveladvisor_var_subheader_margin_top = isset( $traveladvisor_var_options['traveladvisor_var_sh_margintop'] ) ? $traveladvisor_var_options['traveladvisor_var_sh_margintop'] : '';
		$traveladvisor_var_subheader_margin_bottom = isset( $traveladvisor_var_options['traveladvisor_var_sh_marginbottom'] ) ? $traveladvisor_var_options['traveladvisor_var_sh_marginbottom'] : '';
		$traveladvisor_var_page_subheader_text_color = isset( $traveladvisor_var_options['traveladvisor_var_sub_header_text_color'] ) ? $traveladvisor_var_options['traveladvisor_var_sub_header_text_color'] : '';
		$traveladvisor_var_traveladvisor_page_title_align = isset( $traveladvisor_var_options['traveladvisor_var_text_align'] ) ? $traveladvisor_var_options['traveladvisor_var_text_align'] : '';
		$traveladvisor_var_page_title_color = isset( $traveladvisor_var_options['traveladvisor_var_page_title_color'] ) ? $traveladvisor_var_options['traveladvisor_var_page_title_color'] : '';
		$traveladvisor_var_post_title_color = isset( $traveladvisor_var_options['traveladvisor_var_post_title_color'] ) ? $traveladvisor_var_options['traveladvisor_var_post_title_color'] : '';
		$traveladvisor_var_default_header = isset( $traveladvisor_var_options['traveladvisor_var_default_header'] ) ? $traveladvisor_var_options['traveladvisor_var_default_header'] : '';
		//$traveladvisor_var_options['traveladvisor_var_default_header'] == 'breadcrumbs_sub_header'
		$traveladvisor_all_fields = array(
			'traveladvisor_var_traveladvisor_page_title_align' => $traveladvisor_var_traveladvisor_page_title_align,
			'traveladvisor_var_post_ID' => $traveladvisor_var_post_ID,
			'traveladvisor_var_sub_header_sub_hdng' => $traveladvisor_var_sub_header_sub_hdng,
			'traveladvisor_var_header_banner_image' => $traveladvisor_var_header_banner_image,
			'traveladvisor_var_page_subheader_parallax' => $traveladvisor_var_page_subheader_parallax,
			'traveladvisor_var_page_subheader_color' => $traveladvisor_var_page_subheader_color,
			'traveladvisor_var_sub_header_border_color' => $traveladvisor_var_sub_header_border_color,
			'traveladvisor_var_page_title_switch' => $traveladvisor_var_page_title_switch,
			'traveladvisor_var_page_breadcrumbs' => $traveladvisor_var_page_breadcrumbs,
			'traveladvisor_var_subheader_padding_top' => $traveladvisor_var_subheader_padding_top,
			'traveladvisor_var_subheader_padding_bottom' => $traveladvisor_var_subheader_padding_bottom,
			'traveladvisor_var_subheader_margin_top' => $traveladvisor_var_subheader_margin_top,
			'traveladvisor_var_subheader_margin_bottom' => $traveladvisor_var_subheader_margin_bottom,
			'traveladvisor_var_page_subheader_text_color' => $traveladvisor_var_page_subheader_text_color,
			'traveladvisor_var_page_title_color' => $traveladvisor_var_page_title_color,
			'traveladvisor_var_post_title_color' => $traveladvisor_var_post_title_color,
			'traveladvisor_var_default_header' => $traveladvisor_var_default_header,
		);

		$traveladvisor_sub_header_view = true;
//        if (is_singular('post')) {
//            $traveladvisor_post_subheader = get_post_meta((int) $traveladvisor_var_post_ID, "traveladvisor_var_header_banner_style", true);
////            if ($traveladvisor_post_subheader == '') {
////                $traveladvisor_sub_header_view = false;
////            }
//        }
		if ( $traveladvisor_sub_header_view == true ) {
			traveladvisor_var_breadcrumb_markup( $traveladvisor_all_fields );
		}
	}

}
/**
 * @subheader styles 
 * retuns the markup associated with different header styles
 */
//wp_reset_postdata();
if ( !function_exists( 'traveladvisor_var_breadcrumb_markup' ) ) {

	function traveladvisor_var_breadcrumb_markup( $traveladvisor_fields = array() ) {
		$traveladvisor_var_options = TRAVELADVISOR_VAR_GLOBALS()->theme_options();
		extract( $traveladvisor_fields );
		$traveladvisor_sub_style = '';
                if ( ! get_option( 'traveladvisor_var_options' ) ) {
                    $traveladvisor_var_header_banner_image  = trailingslashit( get_template_directory_uri() ) . 'assets/extra-images/sub-header-img-2.jpg';
                }
		if ( $traveladvisor_var_header_banner_image != '' ) {
			$traveladvisor_var_parallax_fixed = $traveladvisor_var_page_subheader_parallax == 'on' ? ' fixed' : '';
			$traveladvisor_sub_style .= ' background:url(' . $traveladvisor_var_header_banner_image . ') ' . $traveladvisor_var_page_subheader_color . ' no-repeat' . $traveladvisor_var_parallax_fixed . ';';
			$traveladvisor_sub_style .= ' background-size:cover;';
		} else if ( $traveladvisor_var_page_subheader_color != '' ) {
			$traveladvisor_sub_style .= ' background:' . $traveladvisor_var_page_subheader_color . ' !important;';
		}
		if ( $traveladvisor_var_sub_header_border_color != '' ) {
			$traveladvisor_sub_style .= ' border-bottom:solid 2px ' . $traveladvisor_var_sub_header_border_color . ';';
		}
		if ( $traveladvisor_var_subheader_padding_top != '' ) {
			$traveladvisor_sub_style .= ' padding-top: ' . esc_html( $traveladvisor_var_subheader_padding_top ) . 'px !important;';
		}
		if ( $traveladvisor_var_subheader_padding_bottom != '' ) {
			$traveladvisor_sub_style .= ' padding-bottom: ' . esc_html( $traveladvisor_var_subheader_padding_bottom ) . 'px !important;';
		}
		if ( $traveladvisor_var_subheader_margin_top != '' ) {
			$traveladvisor_sub_style .= ' margin-top: ' . esc_html( $traveladvisor_var_subheader_margin_top ) . 'px !important;';
		}
		if ( $traveladvisor_var_subheader_margin_bottom != '' ) {
			$traveladvisor_sub_style .= ' margin-bottom: ' . esc_html( $traveladvisor_var_subheader_margin_bottom ) . 'px !important;';
		}
		if ( $traveladvisor_var_header_banner_image != '' ) {
			$traveladvisor_upload_dir = wp_upload_dir();
			$traveladvisor_upload_baseurl = isset( $traveladvisor_upload_dir['baseurl'] ) ? $traveladvisor_upload_dir['baseurl'] . '/' : '';
			$traveladvisor_upload_dir = isset( $traveladvisor_upload_dir['basedir'] ) ? $traveladvisor_upload_dir['basedir'] . '/' : '';
			if ( false !== strpos( $traveladvisor_var_header_banner_image, $traveladvisor_upload_baseurl ) ) {
				$traveladvisor_upload_subdir_file = str_replace( $traveladvisor_upload_baseurl, '', $traveladvisor_var_header_banner_image );
			}
			$traveladvisor_images_dir = trailingslashit( get_template_directory() ) . 'assets/frontend/images/';
			$traveladvisor_img_name = preg_replace( '/^.+[\\\\\\/]/', '', $traveladvisor_var_header_banner_image );
			if ( is_file( $traveladvisor_upload_dir . $traveladvisor_img_name ) || is_file( $traveladvisor_images_dir . $traveladvisor_img_name ) ) {
				if ( ini_get( 'allow_url_fopen' ) ) {
					$traveladvisor_var_header_image_height = getimagesize( $traveladvisor_var_header_banner_image );
				}
			} else if ( isset( $traveladvisor_upload_subdir_file ) && is_file( $traveladvisor_upload_dir . $traveladvisor_upload_subdir_file ) ) {
				if ( ini_get( 'allow_url_fopen' ) ) {
					$traveladvisor_var_header_image_height = getimagesize( $traveladvisor_var_header_banner_image );
				}
			} else {
				$traveladvisor_var_header_image_height = '';
			}
			if ( $traveladvisor_var_header_image_height != '' && isset( $traveladvisor_var_header_image_height[1] ) ) {
				$traveladvisor_var_header_image_height = $traveladvisor_var_header_image_height[1] . 'px';
				$traveladvisor_sub_style .= ' height: ' . $traveladvisor_var_header_image_height . ' !important;';
			}
		}
		if ( (isset( $traveladvisor_var_default_header ) && $traveladvisor_var_default_header == 'breadcrumbs_sub_header' ) && (is_page() || is_single()) ) {
			if ( $traveladvisor_var_page_subheader_text_color == '' ) {
				$traveladvisor_var_page_subheader_text_color = $traveladvisor_var_page_title_color;
			}
		}
//        echo "aamir==((".$traveladvisor_var_header_banner_image .$traveladvisor_var_options."))";
//        print_r($traveladvisor_var_options);
                
               
		if ( $traveladvisor_var_header_banner_image == '' ) {
			//echo "in if";
			$traveladvisor_sub_style .= ' background:url(' . trailingslashit( get_template_directory_uri() ) . 'assets/extra-images/sub-header-img-2.jpg' . ') ' . ' no-repeat;';
			$traveladvisor_sub_style .= ' background-size:cover;';
		}
                
		?>
		<div class="cs-sub-header" <?php if ( $traveladvisor_sub_style != '' ) { ?> style="<?php echo traveladvisor_allow_special_char( $traveladvisor_sub_style ) ?>"<?php } ?>>
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="cs-page-title <?php
						if ( isset( $traveladvisor_var_traveladvisor_page_title_align ) && $traveladvisor_var_traveladvisor_page_title_align != "" ) {
							echo esc_html( $traveladvisor_var_traveladvisor_page_title_align );
						}
						?>">
								 <?php if ( $traveladvisor_var_page_title_switch == "on" ) { ?>
								<h2<?php if ( $traveladvisor_var_page_subheader_text_color != '' ) { ?> style="color:<?php echo esc_html( $traveladvisor_var_page_subheader_text_color ); ?> !important;"<?php } ?>><?php traveladvisor_post_page_title(); ?></h2>
								<?php if ( $traveladvisor_var_sub_header_sub_hdng != '' ) {
									?>
									<p<?php if ( $traveladvisor_var_page_subheader_text_color != '' ) { ?> style="color:<?php echo esc_html( $traveladvisor_var_page_subheader_text_color ); ?> !important;"<?php } ?>><?php echo do_shortcode( $traveladvisor_var_sub_header_sub_hdng ) ?></p>
								<?php } ?>

							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		if ( $traveladvisor_var_page_breadcrumbs == "on" ) {
			?>
			<div class="container">
				<?php traveladvisor_breadcrumbs(); ?>                 
			</div>
		<?php } ?>
		<?php
	}

}