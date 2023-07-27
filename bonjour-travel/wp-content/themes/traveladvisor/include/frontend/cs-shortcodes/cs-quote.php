<?php

/*
 * Frontend file for Quote short code
 */
if ( !function_exists( 'traveladvisor_quote_data' ) ) {

	function traveladvisor_quote_data( $atts, $content = "" ) {
		global $traveladvisor_var_quote_variables, $wpdb, $column_attributes;
		$traveladvisor_counter_node = '';
		$defaults = shortcode_atts( array(
			'traveladvisor_var_column_size' => '',
			'traveladvisor_var_quote_title' => '',
			'traveladvisor_var_quote_author_name' => '',
			'traveladvisor_var_quote_author_url' => '',
				), $atts );
		extract( shortcode_atts( $defaults, $atts ) );
		if ( isset( $traveladvisor_var_column_size ) && $traveladvisor_var_column_size != '' ) {
			if ( function_exists( 'traveladvisor_var_custom_column_class' ) ) {
				$column_class = traveladvisor_var_custom_column_class( $traveladvisor_var_column_size );
			}
		}
		$column_class = isset( $column_class ) ? $column_class : '';
		$traveladvisor_var_quote_title = isset( $traveladvisor_var_quote_title ) ? $traveladvisor_var_quote_title : '';
		$traveladvisor_var_quote_author_name = isset( $traveladvisor_var_quote_author_name ) ? $traveladvisor_var_quote_author_name : '';
		$traveladvisor_var_quote_author_url = isset( $traveladvisor_var_quote_author_url ) ? $traveladvisor_var_quote_author_url : '';
		$html = '';
		if ( isset( $column_class ) && $column_class != '' ) {
			$html .= '<div class="' . esc_html( $column_class ) . '">';
		}
		if ( isset( $traveladvisor_var_quote_title ) && $traveladvisor_var_quote_title != '' ) {
			$html .= '<h3>' . esc_html( $traveladvisor_var_quote_title ) . '</h3>';
		}
		if ( isset( $content ) && $content != '' ) {
			$html .= '<blockquote>';
			$html .= '<p>';
			$html .= do_shortcode( $content );
			$html .='</p>';
			if ( isset( $traveladvisor_var_quote_author_name ) && $traveladvisor_var_quote_author_name != '' ) {
				$html .= '<a href="' . esc_url( $traveladvisor_var_quote_author_url ) . '"><span class="cs-author-name cs-color"> ' . esc_html( $traveladvisor_var_quote_author_name ) . '<span> </a>';
			}
			$html .= '</blockquote>';
			if ( isset( $column_class ) && $column_class <> '' ) {
				$html .= '</div>';
			}
			echo traveladvisor_allow_special_char( $html );
		}
	}

}
if ( function_exists( 'traveladvisor_var_short_code' ) )
	traveladvisor_var_short_code( 'traveladvisor_quote', 'traveladvisor_quote_data' );
