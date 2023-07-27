<?php

/*
 *
 * @Shortcode Name :  Start function for Icon Box shortcode/element front end view
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_multiple_services_shortcode' ) ) {

	function traveladvisor_var_multiple_services_shortcode( $atts, $content = "" ) {
		global $post, $traveladvisor_var_multi_service_column, $traveladvisor_var_icon_box_view, $traveladvisor_var_item_column_size, $traveladvisor_var_title_color, $traveladvisor_var_icon_box_content_align, $traveladvisor_var_icon_box_icon_color, $traveladvisor_var_icon_box_bg_color, $traveladvisor_var_icon_box_border, $traveladvisor_var_icon_box_border_color;
		$defaults = array(
			'traveladvisor_var_column_size' => '',
			'traveladvisor_var_icon_box_title' => '',
			'traveladvisor_var_icon_box_view' => '',
			'traveladvisor_var_multi_service_column' => '',
			'traveladvisor_var_item_column_size' => '',
			'traveladvisor_var_service_content_align' => '',
			'traveladvisor_var_icon_box_content_align' => '',
			'traveladvisor_var_title_color' => '',
			'traveladvisor_var_icon_box_icon_color' => '',
			'traveladvisor_var_icon_box_bg_color' => '',
			'traveladvisor_var_icon_box_border_color' => '',
			'traveladvisor_var_icon_box_border' => '',
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$traveladvisor_var_column_size = isset( $traveladvisor_var_column_size ) ? $traveladvisor_var_column_size : '';
		$traveladvisor_var_item_column_size = isset( $traveladvisor_var_item_column_size ) ? $traveladvisor_var_item_column_size : '';
		$traveladvisor_var_icon_box_title = isset( $traveladvisor_var_icon_box_title ) ? $traveladvisor_var_icon_box_title : '';
		$traveladvisor_var_multi_service_column = isset( $traveladvisor_var_multi_service_column ) ? $traveladvisor_var_multi_service_column : '';
		$traveladvisor_var_icon_box_view = isset( $traveladvisor_var_icon_box_view ) ? $traveladvisor_var_icon_box_view : '';
		$traveladvisor_var_service_content_align = isset( $traveladvisor_var_service_content_align ) ? $traveladvisor_var_service_content_align : '';
		$traveladvisor_var_icon_box_content_align = isset( $traveladvisor_var_icon_box_content_align ) ? $traveladvisor_var_icon_box_content_align : '';
		$traveladvisor_var_title_color = isset( $traveladvisor_var_title_color ) ? $traveladvisor_var_title_color : '';
		$traveladvisor_var_icon_box_icon_color = isset( $traveladvisor_var_icon_box_icon_color ) ? $traveladvisor_var_icon_box_icon_color : '';
		$traveladvisor_var_icon_box_bg_color = isset( $traveladvisor_var_icon_box_bg_color ) ? $traveladvisor_var_icon_box_bg_color : '';
		$traveladvisor_var_icon_box_border_color = isset( $traveladvisor_var_icon_box_border_color ) ? $traveladvisor_var_icon_box_border_color : '';
		$traveladvisor_var_icon_box_border = isset( $traveladvisor_var_icon_box_border ) ? $traveladvisor_var_icon_box_border : '';

		if ( $traveladvisor_var_multi_service_column <> '' ) {
			$traveladvisor_var_multi_service_column = 12 / $traveladvisor_var_multi_service_column;
		} else {
			$traveladvisor_var_multi_service_column = 4;
		}
		$column_class = '';
		if ( isset( $traveladvisor_var_column_size ) && $traveladvisor_var_column_size != '' ) {
			if ( function_exists( 'traveladvisor_var_custom_column_class' ) ) {
				$column_class = traveladvisor_var_custom_column_class( $traveladvisor_var_column_size );
			}
		}
		$traveladvisor_element_title = '';
		$html = '';
		$randomid = rand( 01234, 9999 );
		if ( isset( $traveladvisor_var_icon_box_title ) && trim( $traveladvisor_var_icon_box_title ) <> '' ) {
			$traveladvisor_element_title = '<div class="cs-element-title">'
					. '<h3>' . esc_attr( $traveladvisor_var_icon_box_title ) . '</h3>';
			$traveladvisor_element_title .= '</div>';
		}
		if ( isset( $column_class ) && $column_class <> '' ) {
			if ( isset( $traveladvisor_var_icon_box_view ) && $traveladvisor_var_icon_box_view == 'widget_view' ) {
				$html .='';
			} else {
				$html .= '<div class="' . $column_class . '">';
			}
		}
		$html .= $traveladvisor_element_title;
		if ( isset( $traveladvisor_var_icon_box_view ) && $traveladvisor_var_icon_box_view == 'widget_view' ) {
			$html .='<div class="widget-service">';
			$html .= '<ul>';
		}
		if ( $traveladvisor_var_icon_box_view != 'widget_view' ) {
			$html .= ' <div class="row">';
		}
		$html .= do_shortcode( $content );
		if ( $traveladvisor_var_icon_box_view != 'widget_view' ) {
			$html .='</div>';
		}
		if ( isset( $traveladvisor_var_icon_box_view ) && $traveladvisor_var_icon_box_view == 'widget_view' ) {
			$html .= '</ul>';
			$html .='</div>';
		}
		if ( isset( $column_class ) && $column_class <> '' ) {
			if ( isset( $traveladvisor_var_icon_box_view ) && $traveladvisor_var_icon_box_view == 'widget_view' ) {
				$html .='';
			} else {
				$html .= '</div>';
			}
		}
		return do_shortcode( $html );
	}

}
if ( function_exists( 'traveladvisor_var_short_code' ) ) {
	traveladvisor_var_short_code( 'icon_box', 'traveladvisor_var_multiple_services_shortcode' );
}
/*
 *
 * @Multiple  Start function for Multiple Service Item  shortcode/element front end view
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_multiple_services_item_shortcode' ) ) {

	function traveladvisor_var_multiple_services_item_shortcode( $atts, $content = "" ) {
		$defaults = array(
			'traveladvisor_var_icon_box_title_color' => '',
			'traveladvisor_icon_box_class' => '',
			'icon_box_style' => '',
			'traveladvisor_var_multiple_service_title' => '',
			'traveladvisor_var_icon_box_background_color' => '',
			'traveladvisor_var_services_icon' => '',
			'traveladvisor_var_multiple_service_logo_array' => '',
			'traveladvisor_var_service_icon_circle' => '',
			'traveladvisor_var_link_url' => '',
			'traveladvisor_var_icon_box_icon_type' => '',
		);
		global $post, $traveladvisor_var_multi_service_column, $traveladvisor_var_icon_box_view, $traveladvisor_var_item_column_size, $traveladvisor_var_title_color, $traveladvisor_var_icon_box_content_align, $traveladvisor_var_icon_box_icon_color, $traveladvisor_var_icon_box_bg_color, $traveladvisor_var_icon_box_border_color, $traveladvisor_var_icon_box_border;
		extract( shortcode_atts( $defaults, $atts ) );
		$icon_image = '';
		$html = '';
		$traveladvisor_var_multiple_service_logo_array = isset( $traveladvisor_var_multiple_service_logo_array ) ? $traveladvisor_var_multiple_service_logo_array : '';
		$traveladvisor_var_services_icon = isset( $traveladvisor_var_services_icon ) ? $traveladvisor_var_services_icon : '';
		$traveladvisor_var_icon_box_title_color = isset( $traveladvisor_var_icon_box_title_color ) ? $traveladvisor_var_icon_box_title_color : '';
		$traveladvisor_var_multiple_service_title = isset( $traveladvisor_var_multiple_service_title ) ? $traveladvisor_var_multiple_service_title : '';
		$traveladvisor_var_icon_box_text = $content;
		$traveladvisor_var_icon_box_icon_type = isset( $traveladvisor_var_icon_box_icon_type ) ? $traveladvisor_var_icon_box_icon_type : '';
		$traveladvisor_var_link_url = isset( $traveladvisor_var_link_url ) ? $traveladvisor_var_link_url : '';
		$traveladvisor_var_link = '';
		if ( !isset( $traveladvisor_var_link_url ) || $traveladvisor_var_link_url == '#' || $traveladvisor_var_link_url == '' ) {
			$traveladvisor_var_link = 'javascript:void(0);';
		} else {
			$traveladvisor_var_link = esc_url( $traveladvisor_var_link_url );
		}

		if ( isset( $traveladvisor_var_icon_box_view ) && $traveladvisor_var_icon_box_view == 'widget_view' ) {

			if ( isset( $traveladvisor_var_icon_box_icon_type ) && $traveladvisor_var_icon_box_icon_type == 'icon' ) {
				$icon_image = '<span style="color:' . esc_attr( $traveladvisor_var_icon_box_icon_color ) . ' !important;">'
						. '<i class="' . esc_html( $traveladvisor_var_services_icon ) . '"></i>
                        </span>';
			}
			if ( isset( $traveladvisor_var_icon_box_icon_type ) && $traveladvisor_var_icon_box_icon_type == 'image' ) {
				$icon_image = '<figure><img src="' . esc_url( $traveladvisor_var_multiple_service_logo_array ) . '" alt="traveladvisor_var_multiple_service_logo_array"></figure>';
			}

			$html .= '<li>
                    <div class="cs-media">' . $icon_image . '</div>
                    <div class="cs-text">
                      <div class="post-title"><h6><a href="' . $traveladvisor_var_link . '">' . esc_html( $traveladvisor_var_multiple_service_title ) . '</a></h6></div>
                      <p>' . do_shortcode( $traveladvisor_var_icon_box_text ) . '</p>
                    </div>
                 </li>';
		} else {
			$item_column_class = '';
			if ( isset( $traveladvisor_var_item_column_size ) && $traveladvisor_var_item_column_size != '' ) {
				if ( function_exists( 'traveladvisor_var_custom_column_class' ) ) {
					$item_column_class = traveladvisor_var_custom_column_class( $traveladvisor_var_item_column_size );
				}
			}
			if ( isset( $item_column_class ) && $item_column_class <> '' ) {
				$html .= '<div class="' . $item_column_class . '">';
			} else {
				$html .='<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">';
			}
			if ( isset( $traveladvisor_var_icon_box_view ) && $traveladvisor_var_icon_box_view == 'grid_view' ) {
				if ( $traveladvisor_var_icon_box_content_align == 'left' ) {
					$traveladvisor_var_icon_box_content_align = 'top-left';
				} if ( $traveladvisor_var_icon_box_content_align == 'right' ) {
					$traveladvisor_var_icon_box_content_align = 'top-right';
				} if ( $traveladvisor_var_icon_box_content_align == 'center' ) {
					$traveladvisor_var_icon_box_content_align = 'top-center';
				}

				if ( isset( $traveladvisor_var_icon_box_icon_type ) && $traveladvisor_var_icon_box_icon_type == 'icon' ) {
					$icon_image = '<span style="color:' . esc_attr( $traveladvisor_var_icon_box_icon_color ) . ' !important; ;">'
							. '<i class="' . esc_html( $traveladvisor_var_services_icon ) . '"></i>
                        </span>';
				}
				if ( isset( $traveladvisor_var_icon_box_icon_type ) && $traveladvisor_var_icon_box_icon_type == 'image' ) {
					$icon_image = '<figure><img src="' . esc_url( $traveladvisor_var_multiple_service_logo_array ) . '" height="70" width="100" alt="traveladvisor_var_multiple_service_logo_array"></figure>';
				}

				if ( isset( $traveladvisor_var_icon_box_border ) && $traveladvisor_var_icon_box_border == 'yes' ) {
					$traveladvisor_var_icon_box_border_color = isset( $traveladvisor_var_icon_box_border_color ) ? $traveladvisor_var_icon_box_border_color : '';
					$services_border = 'border-style: solid !important; border-color:' . $traveladvisor_var_icon_box_border_color . ' !important;';
				} else {
					$services_border = "";
				}
				$html .= '<div style="' . $services_border . '" class="cs-services">
                            <div class="cs-media ' . esc_attr( $traveladvisor_var_icon_box_content_align ) . '">' . $icon_image . '</div>
                            <div class="cs-text left">
                               <h4 style="color:' . esc_attr( $traveladvisor_var_title_color ) . ' !important; "><a href="' . $traveladvisor_var_link . '">' . esc_html( $traveladvisor_var_multiple_service_title ) . '</a></h4>
                                <p>' . $traveladvisor_var_icon_box_text . ' </p>
                            </div>
                    </div>';
			}
			if ( isset( $traveladvisor_var_icon_box_view ) && $traveladvisor_var_icon_box_view == 'fancy_view' ) {
				if ( $traveladvisor_var_icon_box_content_align == 'left' ) {
					$traveladvisor_var_icon_box_content_align = 'top-left';
				} if ( $traveladvisor_var_icon_box_content_align == 'right' ) {
					$traveladvisor_var_icon_box_content_align = 'top-right';
				} if ( $traveladvisor_var_icon_box_content_align == 'center' ) {
					$traveladvisor_var_icon_box_content_align = 'top-center';
				}

				if ( isset( $traveladvisor_var_icon_box_icon_type ) && $traveladvisor_var_icon_box_icon_type == 'icon' ) {
					$icon_image = '<span style="background-color:' . esc_attr( $traveladvisor_var_icon_box_bg_color ) . ' !important;"><i  style="color:' . esc_attr( $traveladvisor_var_icon_box_icon_color ) . ' !important;" class="' . esc_attr( $traveladvisor_var_services_icon ) . '"></i></span>';
				}
				if ( isset( $traveladvisor_var_icon_box_icon_type ) && $traveladvisor_var_icon_box_icon_type == 'image' ) {
					$icon_image = '<figure><img src="' . esc_url( $traveladvisor_var_multiple_service_logo_array ) . '" height="70" width="100" alt="traveladvisor_var_multiple_service_logo_array"></figure>';
				}


				if ( isset( $traveladvisor_var_icon_box_border ) && $traveladvisor_var_icon_box_border == 'yes' ) {
					$services_border = 'border-style: solid !important; border-color:' . $traveladvisor_var_icon_box_border_color . ' !important;';
				} else {
					$services_border = '';
				}
				$html .= '<div class="cs-services box">
                        <div class="cs-media box ' . esc_attr( $traveladvisor_var_icon_box_content_align ) . '">' . $icon_image . '</div>
                        <div class="cs-text">
                          <h4 style="color:' . esc_attr( $traveladvisor_var_title_color ) . ' !important; "><a href="' . $traveladvisor_var_link . '">' . esc_html( $traveladvisor_var_multiple_service_title ) . '</a></h4>
                                <p>' . $traveladvisor_var_icon_box_text . ' </p>
                        </div>
                </div>';
			}
			if ( isset( $item_column_class ) && $item_column_class <> '' ) {
				$html .= '</div>';
			} else {
				$html .='</div>';
			}
		}
		return do_shortcode( $html );
	}

}
if ( function_exists( 'traveladvisor_var_short_code' ) ) {
	traveladvisor_var_short_code( 'multiple_services_item', 'traveladvisor_var_multiple_services_item_shortcode' );
}
?>