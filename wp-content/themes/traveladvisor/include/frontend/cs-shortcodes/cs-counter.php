<?php

/*
 *
 * @Shortcode Name :  Start function for Multiple Service shortcode/element front end view
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_counters_shortcode' ) ) {

	function traveladvisor_var_counters_shortcode( $atts, $content = "" ) {
		global $traveladvisor_var_counter_view, $post, $traveladvisor_var_counter_icon_color, $traveladvisor_var_multi_counter_column, $traveladvisor_var_counter_border_color, $traveladvisor_var_multi_counters_view, $traveladvisor_var_item_column_size, $traveladvisor_var_multi_counters_title_color, $traveladvisor_var_counter_background_color;
		$defaults = array(
			'traveladvisor_var_column_size' => '',
			'traveladvisor_var_multi_counters_title' => '',
			'traveladvisor_var_multi_counters_sub_title' => '',
			'traveladvisor_var_counter_view' => '',
			'traveladvisor_var_counter_content_align' => '',
			'traveladvisor_var_item_column_size' => '',
			'traveladvisor_var_multi_counters_title_color' => '',
			'traveladvisor_var_counter_background_color' => '',
			'traveladvisor_var_counter_border_color' => '',
			'traveladvisor_var_counter_icon_color' => '',
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$traveladvisor_var_column_size = isset( $traveladvisor_var_column_size ) ? $traveladvisor_var_column_size : '';
		$traveladvisor_var_item_column_size = isset( $traveladvisor_var_item_column_size ) ? $traveladvisor_var_item_column_size : ''; // item size
		$traveladvisor_var_multi_counters_title = isset( $traveladvisor_var_multi_counters_title ) ? $traveladvisor_var_multi_counters_title : '';   // counters main title
		$traveladvisor_var_multi_counters_sub_title = isset( $traveladvisor_var_multi_counters_sub_title ) ? $traveladvisor_var_multi_counters_sub_title : '';
		$traveladvisor_var_multi_counter_column = isset( $traveladvisor_var_multi_counter_column ) ? $traveladvisor_var_multi_counter_column : '';
		$traveladvisor_var_multi_counters_view = isset( $traveladvisor_var_multi_counters_view ) ? $traveladvisor_var_multi_counters_view : '';
		$traveladvisor_var_multi_counters_title_color = isset( $traveladvisor_var_multi_counters_title_color ) ? $traveladvisor_var_multi_counters_title_color : '';
		$traveladvisor_var_counter_background_color = isset( $traveladvisor_var_counter_background_color ) ? $traveladvisor_var_counter_background_color : '';
		$traveladvisor_var_counter_border_color = isset( $traveladvisor_var_counter_border_color ) ? $traveladvisor_var_counter_border_color : '';
		$traveladvisor_var_counter_icon_color = isset( $traveladvisor_var_counter_icon_color ) ? $traveladvisor_var_counter_icon_color : '';  //icon color
		$traveladvisor_var_counter_view = isset( $traveladvisor_var_counter_view ) ? $traveladvisor_var_counter_view : '';  //icon color
		$multi_counters_element_size = '67';
		$traveladvisor_element_title = '';
		$html = '';
		$randomid = rand( 01234, 9999 );
		if ( isset( $traveladvisor_var_multi_counters_title ) && trim( $traveladvisor_var_multi_counters_title ) <> '' ) {
			$traveladvisor_element_title = '<div class="cs-element-title">'
					. '<h3>' . esc_attr( $traveladvisor_var_multi_counters_title ) . '</h3>';
			$traveladvisor_element_title .= '</div>';
		}
		$html .= $traveladvisor_element_title;
		$html .='<div class="cs-counter-holder">';
		$html .= '<div class="row">' . do_shortcode( $content ) . '</div></div>';
		return do_shortcode( $html );
	}

	if ( function_exists( 'traveladvisor_short_code' ) ) {
		traveladvisor_short_code( 'counters', 'traveladvisor_var_counters_shortcode' );
	}
}
if ( function_exists( 'traveladvisor_var_short_code' ) )
	traveladvisor_var_short_code( 'counters', 'traveladvisor_var_counters_shortcode' );
/*
 *
 * @Multiple  Start function for Multiple Service Item  shortcode/element front end view
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_counters_item_shortcode' ) ) {

	function traveladvisor_var_counters_item_shortcode( $atts, $content = "" ) {
		$defaults = array(
			'traveladvisor_multi_counters_class' => '',
			'multi_counters_style' => '',
			'traveladvisor_var_multiple_counter_title' => '',
			'traveladvisor_var_multi_counters_background_color' => '',
			'traveladvisor_var_counter_content_color' => '',
			'traveladvisor_var_counters_icon' => '',
			'traveladvisor_var_multiple_counter_logo_array' => '',
			'traveladvisor_var_counter_icon_circle' => '',
			'traveladvisor_var_link_url' => '',
			'traveladvisor_var_counter_icon_position' => '',
			'traveladvisor_var_counter_padding_left' => '',
			'traveladvisor_var_counter_padding_right' => '',
			'traveladvisor_var_counter_border' => '',
		);
		global $traveladvisor_var_counter_view, $post, $traveladvisor_var_counter_border_color, $traveladvisor_var_counter_background_color, $traveladvisor_var_item_column_size, $traveladvisor_var_multi_counters_title_color, $traveladvisor_var_counter_icon_color;
		extract( shortcode_atts( $defaults, $atts ) );
		$html = '';
		$traveladvisor_var_background_color = '';
		$traveladvisor_var_multiple_counter_logo_array = isset( $traveladvisor_var_multiple_counter_logo_array ) ? $traveladvisor_var_multiple_counter_logo_array : '';
		$traveladvisor_var_counters_icon = isset( $traveladvisor_var_counters_icon ) ? $traveladvisor_var_counters_icon : ''; //counter icon

		$traveladvisor_var_multiple_counter_title = isset( $traveladvisor_var_multiple_counter_title ) ? $traveladvisor_var_multiple_counter_title : ''; //counter title
		$traveladvisor_var_counter_content_color = isset( $traveladvisor_var_counter_content_color ) ? $traveladvisor_var_counter_content_color : '';
		$traveladvisor_var_multi_counters_text = $content; // description
		$traveladvisor_var_counter_separator = isset( $traveladvisor_var_counter_icon_position ) ? $traveladvisor_var_counter_icon_position : ''; //separator position
		$traveladvisor_var_counter_number = isset( $traveladvisor_var_counter_padding_left ) ? $traveladvisor_var_counter_padding_left : ''; //counter number
		$traveladvisor_var_counter_padding_right = isset( $traveladvisor_var_counter_padding_right ) ? $traveladvisor_var_counter_padding_right : '';
		$traveladvisor_var_counter_border = isset( $traveladvisor_var_counter_border ) ? $traveladvisor_var_counter_border : '';
		$traveladvisor_var_counter_class = "box";
		if ( $traveladvisor_var_counter_separator == "After Title" ) {
			$traveladvisor_var_counter_class = "simple";
		}
		if ( isset( $traveladvisor_var_item_column_size ) && $traveladvisor_var_item_column_size != '' ) {
			if ( function_exists( 'traveladvisor_var_custom_column_class' ) ) {
				$column_class = traveladvisor_var_custom_column_class( $traveladvisor_var_item_column_size );
			}
		}
		if ( isset( $traveladvisor_var_counter_background_color ) && $traveladvisor_var_counter_background_color != "" && $traveladvisor_var_counter_view == 'box' ) {
			$traveladvisor_var_background_color = 'style="background-color:' . esc_html( $traveladvisor_var_counter_background_color ) . ';"';
		}
		if ( isset( $column_class ) && $column_class <> '' ) {
			$html .= '<div class="' . $column_class . '">';
		}

		$html .=' <div ' . $traveladvisor_var_background_color . ' class="cs-counter ' . esc_html( $traveladvisor_var_counter_class ) . '">';
		$html .='  <div class="cs-media">';
		$html .=' <figure>';
		$html .='  <i style="color:' . esc_html( $traveladvisor_var_multi_counters_title_color ) . '" class="' . esc_html( $traveladvisor_var_counters_icon ) . '"></i>';
		$html .=' </figure>';
		$html .=' </div>';
		$html .='  <div class="cs-text">';
		$html .='  <strong style="color:' . esc_html( $traveladvisor_var_counter_border_color ) . '" class="counter">' . esc_html( $traveladvisor_var_counter_number ) . '</strong>';
		$html .=' <span >' . esc_html( $traveladvisor_var_multiple_counter_title ) . '</span>';
		$html .= '<p>' . $traveladvisor_var_multi_counters_text . '</p>';
		$html .=' </div>';
		$html .=' </div>';
		if ( isset( $column_class ) && $column_class <> '' ) {
			$html .= '</div>';
		}
		return do_shortcode( $html );
	}

}
if ( function_exists( 'traveladvisor_var_short_code' ) ) {
	traveladvisor_var_short_code( 'counters_item', 'traveladvisor_var_counters_item_shortcode' );
}
?>