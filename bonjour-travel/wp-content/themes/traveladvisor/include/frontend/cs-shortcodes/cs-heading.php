<?php

/*
 *
 * @Shortcode Name : Heading
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_heading' ) ) {

	function traveladvisor_var_heading( $atts, $content = "" ) {
		global $header_map;
		$defaults = array(
			'traveladvisor_var_column_size' => '1/1',
			'traveladvisor_var_heading_fancy' => '',
			'traveladvisor_var_heading_section_title' => '',
			'traveladvisor_var_column' => '',
			'traveladvisor_var_sub_heading_title' => '',
			'traveladvisor_var_heading_content_title' => '',
			'traveladvisor_var_heading_font_size' => '',
			'traveladvisor_var_heading_color' => '',
			'traveladvisor_var_heading_content_color' => '',
			'traveladvisor_var_heading_style' => '',
			'traveladvisor_var_heading_view' => '',
			'traveladvisor_var_heading_align' => '',
			'traveladvisor_var_heading_sub_content_color' => '',
			'traveladvisor_var_heading_line_height' => '',
			'traveladvisor_var_heading_font_spacing' => '',
			'traveladvisor_var_heading_margin_bottom' => '',
			'traveladvisor_var_heading_divider' => '',
			'traveladvisor_var_heading_font_style' => '',
			'traveladvisor_var_text_transform' => '',
			'traveladvisor_var_content_overlay' => '',
			'traveladvisor_var_heading_height' => ''
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$column_class = '';
		if ( isset( $traveladvisor_var_column_size ) && $traveladvisor_var_column_size != '' ) {
			if ( function_exists( 'traveladvisor_var_custom_column_class' ) ) {
				$column_class = traveladvisor_var_custom_column_class( $traveladvisor_var_column_size );
			}
		}
		$traveladvisor_var_heading_section_title = isset( $traveladvisor_var_heading_section_title ) ? $traveladvisor_var_heading_section_title : '';
		$traveladvisor_var_sub_heading_title = isset( $traveladvisor_var_sub_heading_title ) ? $traveladvisor_var_sub_heading_title : '';
		$traveladvisor_var_heading_font_size = isset( $traveladvisor_var_heading_font_size ) ? $traveladvisor_var_heading_font_size : '';
		$traveladvisor_var_heading_color = isset( $traveladvisor_var_heading_color ) ? $traveladvisor_var_heading_color : '';
		$traveladvisor_var_heading_font_spacing = isset( $traveladvisor_var_heading_font_spacing ) ? $traveladvisor_var_heading_font_spacing : '';
		$traveladvisor_var_heading_margin_bottom = isset( $traveladvisor_var_heading_margin_bottom ) ? $traveladvisor_var_heading_margin_bottom : '';
		$traveladvisor_var_heading_align = isset( $traveladvisor_var_heading_align ) ? $traveladvisor_var_heading_align : '';
		$traveladvisor_var_heading_font_style = isset( $traveladvisor_var_heading_font_style ) ? $traveladvisor_var_heading_font_style : '';
		$traveladvisor_var_heading_sub_content_color = isset( $traveladvisor_var_heading_sub_content_color ) ? $traveladvisor_var_heading_sub_content_color : '';
		$traveladvisor_var_text_transform = isset( $traveladvisor_var_text_transform ) ? $traveladvisor_var_text_transform : '';
		if ( isset( $traveladvisor_var_heading_font_size ) && $traveladvisor_var_heading_font_size != '' ) {
			$traveladvisor_var_heading_font_size = 'font-size:' . $traveladvisor_var_heading_font_size . 'px !important;';
		}
		if ( isset( $traveladvisor_var_heading_color ) && $traveladvisor_var_heading_color != '' ) {
			$traveladvisor_var_heading_color = 'color:' . esc_html( $traveladvisor_var_heading_color ) . ' !important;';
		}
		if ( isset( $traveladvisor_var_heading_sub_content_color ) && $traveladvisor_var_heading_sub_content_color != '' ) {
			$traveladvisor_var_heading_sub_content_color = 'color:' . esc_html( $traveladvisor_var_heading_sub_content_color ) . ' !important;';
		}
		if ( isset( $traveladvisor_var_text_transform ) && $traveladvisor_var_text_transform != '' ) {
			$traveladvisor_var_text_transform = 'text-transform:' . esc_html( $traveladvisor_var_text_transform ) . ' !important; ';
		}
		if ( isset( $traveladvisor_var_heading_font_spacing ) && $traveladvisor_var_heading_font_spacing != '' ) {
			$traveladvisor_var_heading_font_spacing = 'letter-spacing:' . esc_html( $traveladvisor_var_heading_font_spacing ) . 'px !important; ';
		}
		if ( isset( $traveladvisor_var_heading_margin_bottom ) && $traveladvisor_var_heading_margin_bottom != '' ) {
			$traveladvisor_var_heading_margin_bottom = 'margin-bottom:' . esc_html( $traveladvisor_var_heading_margin_bottom ) . 'px !important; ';
		}
		if ( isset( $traveladvisor_var_heading_font_style ) && $traveladvisor_var_heading_font_style != '' ) {
			$traveladvisor_var_heading_font_style = 'font-style:' . esc_html( $traveladvisor_var_heading_font_style ) . ' !important; ';
		}
		$traveladvisor_var_heading = '<div class="row">';
		$traveladvisor_var_heading.='<div class="' . $column_class . '">';
		$traveladvisor_var_heading.='<div style="'.$traveladvisor_var_heading_margin_bottom.'" class="cs-element-title ' . esc_html( $traveladvisor_var_heading_align ) . '">'
				. '';
		if ( isset( $traveladvisor_var_heading_section_title ) && $traveladvisor_var_heading_section_title != '' ) {
			$traveladvisor_var_heading .='<h' . $traveladvisor_var_heading_style . '  style=" ' . $traveladvisor_var_heading_font_style . ' ' . $traveladvisor_var_heading_font_size . ' ' . $traveladvisor_var_heading_font_spacing . ' ' . $traveladvisor_var_heading_color . '; ' . $traveladvisor_var_text_transform . ' " '
					. '>' . esc_html( $traveladvisor_var_heading_section_title ) . '</h' . $traveladvisor_var_heading_style . ' >';
		}
		if ( isset( $traveladvisor_var_sub_heading_title ) && $traveladvisor_var_sub_heading_title != '' ) {

			$traveladvisor_var_heading .='<p style="' . $traveladvisor_var_heading_sub_content_color . ' "'
					. '>' . traveladvisor_allow_special_char( $traveladvisor_var_sub_heading_title ) . '</p>';
		}
		$traveladvisor_var_heading .=''
				. '</div>'
				. '</div>'
				. '</div>';
		return $traveladvisor_var_heading;
	}

	if ( function_exists( 'traveladvisor_var_short_code' ) )
		traveladvisor_var_short_code( 'traveladvisor_heading', 'traveladvisor_var_heading' );
}