<?php

/**
 * @Divider html form for page builder
 */
if ( !function_exists( 'traveladvisor_var_traveladvisor_divider_shortcode' ) ) {

	function traveladvisor_var_traveladvisor_divider_shortcode( $atts, $content = "" ) {
		$traveladvisor_var_defaults = array(
			'traveladvisor_var_divider_padding_left' => '0',
			'traveladvisor_var_divider_padding_right' => '0',
			'traveladvisor_var_divider_padding_top' => '0',
			'traveladvisor_var_divider_padding_buttom' => '0',
		);
		extract( shortcode_atts( $traveladvisor_var_defaults, $atts ) );
		$traveladvisor_var_divider_padding_left = isset( $traveladvisor_var_divider_padding_left ) ? $traveladvisor_var_divider_padding_left : '';
		$traveladvisor_var_divider_padding_right = isset( $traveladvisor_var_divider_padding_right ) ? $traveladvisor_var_divider_padding_right : '';
		$traveladvisor_var_divider_padding_top = isset( $traveladvisor_var_divider_padding_top ) ? $traveladvisor_var_divider_padding_top : '';
		$traveladvisor_var_divider_padding_buttom = isset( $traveladvisor_var_divider_padding_buttom ) ? $traveladvisor_var_divider_padding_buttom : '';
		$style_string = '';
		$html = '';
		if ( $traveladvisor_var_divider_padding_left != '' || $traveladvisor_var_divider_padding_right != '' || $traveladvisor_var_divider_padding_top != '' || $traveladvisor_var_divider_padding_buttom != '' ) {
			$style_string .= ' ';
			if ( $traveladvisor_var_divider_padding_left != '' ) {
				$style_string .= ' padding-left:' . esc_attr( $traveladvisor_var_divider_padding_left ) . 'px; ';
			}
			if ( $traveladvisor_var_divider_padding_right != '' ) {
				$style_string .= ' padding-right:' . esc_attr( $traveladvisor_var_divider_padding_right ) . 'px; ';
			}
			if ( $traveladvisor_var_divider_padding_top != '' ) {
				$style_string .= ' padding-top:' . esc_attr( $traveladvisor_var_divider_padding_top ) . 'px; ';
			}
			if ( $traveladvisor_var_divider_padding_buttom != '' ) {
				$style_string .= ' padding-bottom:' . esc_attr( $traveladvisor_var_divider_padding_buttom ) . 'px; ';
			}
			$style_string .= '';
		}
		$html .= '<div  style=" ' . esc_html( $style_string ) . '">';
		$html .= '<span class="cs-separator"></span>';
		$html .= '</div>';
		return do_shortcode( $html );
	}

	if ( function_exists( 'traveladvisor_var_short_code' ) )
		traveladvisor_var_short_code( 'traveladvisor_divider', 'traveladvisor_var_traveladvisor_divider_shortcode' );
}