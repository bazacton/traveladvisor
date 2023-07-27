<?php

/*
 *
 * @Shortcode Name : Button
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_button' ) ) {

	function traveladvisor_var_button( $atts, $content = "" ) {
		global $header_map;
		$defaults = array(
			'traveladvisor_var_column_size' => '',
			'traveladvisor_var_button_text' => '',
			'traveladvisor_var_button_size' => '',
			'traveladvisor_var_button_icon' => '',
			'traveladvisor_var_button_link' => '',
			'traveladvisor_var_button_padding_top' => '',
			'traveladvisor_var_button_padding_bottom' => '',
			'traveladvisor_var_button_padding_left' => '',
			'traveladvisor_var_button_padding_right' => '',
			'traveladvisor_var_button_border' => '',
			'traveladvisor_var_button_type' => '',
			'traveladvisor_var_button_threed' => '',
			'traveladvisor_var_button_target' => '',
			'traveladvisor_var_button_border_color' => '',
			'traveladvisor_var_button_bg_color' => '',
			'traveladvisor_var_button_color' => '',
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$traveladvisor_var_column_size = isset( $traveladvisor_var_column_size ) ? $traveladvisor_var_column_size : '';
		$traveladvisor_var_button_text = isset( $traveladvisor_var_button_text ) ? $traveladvisor_var_button_text : '';
		$traveladvisor_var_button_size = isset( $traveladvisor_var_button_size ) ? $traveladvisor_var_button_size : '';
		$traveladvisor_var_button_icon = (isset( $traveladvisor_var_button_icon ) and $traveladvisor_var_button_icon != '') ? '<i class="' . $traveladvisor_var_button_icon . '"></i>' : '';
		$traveladvisor_var_button_link = isset( $traveladvisor_var_button_link ) ? $traveladvisor_var_button_link : '';
		$traveladvisor_var_button_border = isset( $traveladvisor_var_button_border ) ? $traveladvisor_var_button_border : '';
		$traveladvisor_var_button_icon_position = isset( $traveladvisor_var_button_icon_position ) ? $traveladvisor_var_button_icon_position : '';
		$traveladvisor_var_button_type = isset( $traveladvisor_var_button_type ) ? $traveladvisor_var_button_type : '';
		$traveladvisor_var_button_threed = isset( $traveladvisor_var_button_threed ) ? $traveladvisor_var_button_threed : '';
		$traveladvisor_var_button_target = isset( $traveladvisor_var_button_target ) ? $traveladvisor_var_button_target : '';
		$traveladvisor_var_button_border_color = isset( $traveladvisor_var_button_border_color ) ? $traveladvisor_var_button_border_color : '';
		$traveladvisor_var_button_color = isset( $traveladvisor_var_button_color ) ? $traveladvisor_var_button_color : '';
		$traveladvisor_var_button_bg_color = isset( $traveladvisor_var_button_bg_color ) ? $traveladvisor_var_button_bg_color : '';
		$traveladvisor_var_button_padding_top = isset( $traveladvisor_var_button_padding_top ) ? $traveladvisor_var_button_padding_top : '';
		$traveladvisor_var_button_padding_bottom = isset( $traveladvisor_var_button_padding_bottom ) ? $traveladvisor_var_button_padding_bottom : '';
		$traveladvisor_var_button_padding_left = isset( $traveladvisor_var_button_padding_left ) ? $traveladvisor_var_button_padding_left : '';
		$traveladvisor_var_button_padding_right = isset( $traveladvisor_var_button_padding_right ) ? $traveladvisor_var_button_padding_right : '';
		$column_class = '';
		if ( isset( $traveladvisor_var_column_size ) && $traveladvisor_var_column_size != '' ) {
			if ( function_exists( 'traveladvisor_var_custom_column_class' ) ) {
				$column_class = traveladvisor_var_custom_column_class( $traveladvisor_var_column_size );
			}
		}
		if ( isset( $column_class ) && $column_class <> '' ) {
			$shortcode_defined_siz_op = '<div class="' . esc_html( $column_class ) . '">';
			$shortcode_defined_siz_cls = '</div>';
		} else {

			$shortcode_defined_siz_op = '';
			$shortcode_defined_siz_cls = '';
		}
		if ( $traveladvisor_var_button_border == "yes" ) {
			$border = 1;
		} else {
			$border = 0;
		}
		$button_type_class = '';
		if ( isset( $traveladvisor_var_button_type ) && $traveladvisor_var_button_type == 'rounded' ) {
			$button_type_class = "round-btn";
		} else {
			$button_type_class = "";
		}
		$button_type_threed = '';
		if ( isset( $traveladvisor_var_button_threed ) && $traveladvisor_var_button_threed == 'yes' ) {
			$button_type_threed = "fancy-btn";
		} else {
			$button_type_threed = "";
		}
		$traveladvisor_var_button = '';
		if ( isset( $traveladvisor_var_button_size ) && $traveladvisor_var_button_size == 'large' ) {
			$traveladvisor_var_button_size = 'class ="cs-button large ' . $button_type_class . ' ' . $button_type_threed . '"';
		} elseif ( isset( $traveladvisor_var_button_size ) && $traveladvisor_var_button_size == 'medium' ) {
			$traveladvisor_var_button_size = 'class ="cs-button medium ' . $button_type_class . ' ' . $button_type_threed . '"';
		} else {
			$traveladvisor_var_button_size = 'class ="cs-button small ' . $button_type_class . ' ' . $button_type_threed . '"';
		}
		$traveladvisor_var_button .='<a ' . $traveladvisor_var_button_size . ' style="background-color:' . esc_html( $traveladvisor_var_button_bg_color ) . ' !important; color:' . esc_html( $traveladvisor_var_button_color ) . ' !important; '
				. 'padding:' . esc_html( $traveladvisor_var_button_padding_top ) . 'px ' . esc_html( $traveladvisor_var_button_padding_right ) . 'px '
				. '' . esc_html( $traveladvisor_var_button_padding_bottom ) . 'px ' . esc_html( $traveladvisor_var_button_padding_left ) . 'px; border:' . absint( $border ) . 'px solid ' . esc_html( $traveladvisor_var_button_border_color ) . ' !important ;"   target="' . esc_html( $traveladvisor_var_button_target ) . '" href="' . esc_url( $traveladvisor_var_button_link ) . '">' . $traveladvisor_var_button_icon . '' . esc_html( $traveladvisor_var_button_text ) . '</a>';
		//  $traveladvisor_var_button .= $shortcode_defined_siz_cls.'</div>';
		return $traveladvisor_var_button;
	}

	if ( function_exists( 'traveladvisor_var_short_code' ) )
		traveladvisor_var_short_code( 'traveladvisor_button', 'traveladvisor_var_button' );
}