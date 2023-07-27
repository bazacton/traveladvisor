<?php

/*
 *
 * @Shortcode Name : Image Frame
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_image_frame' ) ) {

	function traveladvisor_var_image_frame( $atts, $content = "" ) {
		global $header_map, $post;
		$defaults = array(
			'traveladvisor_var_column_size' => '',
			'traveladvisor_var_image_section_title' => '',
			'traveladvisor_var_frame_image_url_array' => '',
			'traveladvisor_var_image_title' => '',
		);
		extract( shortcode_atts( $defaults, $atts ) );
		if ( isset( $traveladvisor_var_column_size ) && $traveladvisor_var_column_size != '' ) {
			if ( function_exists( 'traveladvisor_var_custom_column_class' ) ) {
				$column_class = traveladvisor_var_custom_column_class( $traveladvisor_var_column_size );
			}
		}
		$traveladvisor_var_image_section_title = isset( $traveladvisor_var_image_section_title ) ? $traveladvisor_var_image_section_title : '';
		$traveladvisor_var_frame_image_url = isset( $traveladvisor_var_frame_image_url_array ) ? $traveladvisor_var_frame_image_url_array : '';
		$traveladvisor_var_image_title = isset( $traveladvisor_var_image_title ) ? $traveladvisor_var_image_title : '';
		$traveladvisor_var_image_frame = '';
		if ( isset( $column_class ) && $column_class <> '' ) {
			$traveladvisor_var_image_frame .= '<div class="' . esc_html( $column_class ) . '">';
		}
		if ( isset( $traveladvisor_var_image_section_title ) && $traveladvisor_var_image_section_title != '' ) {
			$traveladvisor_var_image_frame .= '<div class="cs-element-title"> <h3>' . esc_html( $traveladvisor_var_image_section_title ) . '</h3> ';
			$traveladvisor_var_image_frame .= '</div>';
		}
//        if ($traveladvisor_var_frame_image_url <> '') {
		$traveladvisor_var_image_frame .= '<div class="image-frame"><div class="cs-media">';
		$traveladvisor_var_image_frame .= '<figure> <img alt="' . esc_html( $traveladvisor_var_image_title ) . '" src="' . esc_url( $traveladvisor_var_frame_image_url ) . '"> </figure>';
		$traveladvisor_var_image_frame .= '</div></div>';
//        }
		if ( isset( $column_class ) && $column_class <> '' ) {
			$traveladvisor_var_image_frame .= '</div>';
		}
		return $traveladvisor_var_image_frame;
	}

	if ( function_exists( 'traveladvisor_var_short_code' ) )
		traveladvisor_var_short_code( 'traveladvisor_image_frame', 'traveladvisor_var_image_frame' );
}