<?php

/*
 *
 * @Shortcode Name : Map
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_column' ) ) {

	function traveladvisor_var_column( $atts, $content = "" ) {
		global $header_map;
		$defaults = array(
			'traveladvisor_var_column_size' => '',
			'traveladvisor_var_column_section_title' => '',
			'traveladvisor_var_column_top_padding' => '',
			'traveladvisor_var_column_bottom_padding' => '',
			'traveladvisor_var_column_left_padding' => '',
			'traveladvisor_var_column_right_padding' => '',
			'traveladvisor_var_column_image_url_array' => '',
			'traveladvisor_var_column_bg_color' => '',
			'traveladvisor_var_column_title_color' => '',
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$CustomId = '';
		$traveladvisor_column_class_id = '';
		$column_class = '';
		$traveladvisor_column_bg_class = '';
		if ( isset( $traveladvisor_var_column_size ) && $traveladvisor_var_column_size != '' ) {
			if ( function_exists( 'traveladvisor_var_custom_column_class' ) ) {
				$column_class = traveladvisor_var_custom_column_class( $traveladvisor_var_column_size );
			}
		}
		$traveladvisor_var_column_section_title = isset( $traveladvisor_var_column_section_title ) ? $traveladvisor_var_column_section_title : '';
		$traveladvisor_var_column_top_padding = isset( $traveladvisor_var_column_top_padding ) ? $traveladvisor_var_column_top_padding : '';
		$traveladvisor_var_column_bottom_padding = isset( $traveladvisor_var_column_bottom_padding ) ? $traveladvisor_var_column_bottom_padding : '';
		$traveladvisor_var_column_left_padding = isset( $traveladvisor_var_column_left_padding ) ? $traveladvisor_var_column_left_padding : '';
		$traveladvisor_var_column_right_padding = isset( $traveladvisor_var_column_right_padding ) ? $traveladvisor_var_column_right_padding : '';
		$traveladvisor_var_column_image_url = isset( $atts['traveladvisor_var_column_image_url_array'] ) ? $atts['traveladvisor_var_column_image_url_array'] : '';
		$traveladvisor_var_column_bg_color = isset( $traveladvisor_var_column_bg_color ) ? $traveladvisor_var_column_bg_color : '';
		$style_string = '';
		if ( $traveladvisor_var_column_top_padding != '' || $traveladvisor_var_column_bottom_padding != '' || $traveladvisor_var_column_left_padding != '' || $traveladvisor_var_column_right_padding != '' ) {
			$style_string .= ' ';
			if ( $traveladvisor_var_column_top_padding != '' ) {
				$style_string .= ' padding-top:' . $traveladvisor_var_column_top_padding . 'px; ';
			}
			if ( $traveladvisor_var_column_bottom_padding != '' ) {
				$style_string .= ' padding-bottom:' . $traveladvisor_var_column_bottom_padding . 'px; ';
			}
			if ( $traveladvisor_var_column_left_padding != '' ) {
				$style_string .= ' padding-left:' . $traveladvisor_var_column_left_padding . 'px; ';
			}
			if ( $traveladvisor_var_column_right_padding != '' ) {
				$style_string .= ' padding-right:' . $traveladvisor_var_column_right_padding . 'px; ';
			}
			$style_string .= ' ';
		}
		$html = '';
		$html_column = '';
		$traveladvisor_var_column_content = nl2br( $content );
		$html = do_shortcode( $traveladvisor_var_column_content );
		if ( isset( $column_class ) && $column_class <> '' ) {
			$html_column .= '<div class="row">';
			$html_column .= '<div class="' . traveladvisor_allow_special_char( $column_class ) . '">';
		}
		$bgclass = '';
		if ( isset( $traveladvisor_var_column_bg_color ) && $traveladvisor_var_column_bg_color != '' ) {
			$traveladvisor_column_bg_class = ' has-bg';
		}
		if ( isset( $traveladvisor_var_column_section_title ) && $traveladvisor_var_column_section_title != '' ) {
			$html_column .='<div class="cs-element-title">';
			$html_column .= '<h3>' . esc_html( $traveladvisor_var_column_section_title ) . '</h3>';
			$html_column .='</div>';
		}
		$html_column .= '<div style=" ' . $style_string . ' background-image:url(' . esc_url( $traveladvisor_var_column_image_url ) . '); color:' . $traveladvisor_var_column_title_color . '; background-color:' . $traveladvisor_var_column_bg_color . ';" class="cs-holder cs-column-text  ' . $traveladvisor_column_bg_class . '"' . $traveladvisor_column_class_id . '>';
		if ( isset( $traveladvisor_var_column_section_title ) && $traveladvisor_var_column_section_title != '' ) {
			
		}
		$html_column .= $html;
		$html_column .= '</div>';
		if ( isset( $column_class ) && $column_class <> '' ) {
			$html_column .= '</div>';
			$html_column .= '</div>';
		}
		return $html_column;
	}

	if ( function_exists( 'traveladvisor_var_short_code' ) )
		traveladvisor_var_short_code( 'traveladvisor_column', 'traveladvisor_var_column' );
}