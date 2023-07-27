<?php

/*
 *
 * @Shortcode Name :  List front end view
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_list_shortcode' ) ) {

	function traveladvisor_var_list_shortcode( $atts, $content = "" ) {
		global $post, $traveladvisor_var_list_column, $traveladvisor_var_list_color;
		$defaults = array(
			'traveladvisor_var_column_size' => '',
			'traveladvisor_var_list_title' => '',
			'traveladvisor_var_list_color' => ''
		);
		extract( shortcode_atts( $defaults, $atts ) );
		if ( isset( $traveladvisor_var_column_size ) && $traveladvisor_var_column_size != '' ) {
			if ( function_exists( 'traveladvisor_var_custom_column_class' ) ) {
				$column_class = traveladvisor_var_custom_column_class( $traveladvisor_var_column_size );
			}
		}
		$traveladvisor_var_list_title = isset( $traveladvisor_var_list_title ) ? $traveladvisor_var_list_title : '';
		$traveladvisor_var_list_color = isset( $traveladvisor_var_list_color ) ? $traveladvisor_var_list_color : '';
		$html = '';
		if ( isset( $column_class ) && $column_class != '' ) {
			$html .= '<div class="' . esc_html( $column_class ) . '">';
		}
		$traveladvisor_section_title = '';
		$traveladvisor_section_sub_title = '';
		if ( isset( $traveladvisor_var_list_title ) && trim( $traveladvisor_var_list_title ) <> '' ) {
			$traveladvisor_section_title = '<h3>' . esc_attr( $traveladvisor_var_list_title ) . '</h3>';
		}
		$html .= $traveladvisor_section_title;
		$html .= ' <ul class="cs-list-with-icons">';
		$html .= do_shortcode( $content );
		$html .= '</ul>';
		if ( isset( $column_class ) && $column_class != '' ) {
			$html .= '</div>';
		}
		return do_shortcode( $html );
	}

}
if ( function_exists( 'traveladvisor_var_short_code' ) )
	traveladvisor_var_short_code( 'traveladvisor_list', 'traveladvisor_var_list_shortcode' );
/*
 *
 * @List  Item  shortcode/element front end view
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_list_item_shortcode' ) ) {

	function traveladvisor_var_list_item_shortcode( $atts, $content = "" ) {
		global $post, $traveladvisor_var_list_column, $traveladvisor_var_list_color;
		$defaults = array(
			'traveladvisor_var_list_item_text' => '',
			'traveladvisor_var_list_item_icon' => '',
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$traveladvisor_var_list_column_str = '';
		if ( $traveladvisor_var_list_column != 12 ) {
			$traveladvisor_var_list_column_str = 'class = "col-md-' . esc_html( $traveladvisor_var_list_column ) . '"';
		}
		$traveladvisor_var_list_item_text = isset( $traveladvisor_var_list_item_text ) ? $traveladvisor_var_list_item_text : '';

		$traveladvisor_var_list_item_icon = isset( $traveladvisor_var_list_item_icon ) ? $traveladvisor_var_list_item_icon : '';
		$html = '';
		$html .= ' <li>';
		if ( isset( $traveladvisor_var_list_item_icon ) && trim( $traveladvisor_var_list_item_icon ) <> '' ) {
			$html .= ' <i class="cs-color ' . esc_html( $traveladvisor_var_list_item_icon ) . '"></i>';
		}
		if ( isset( $traveladvisor_var_list_item_text ) && trim( $traveladvisor_var_list_item_text ) <> '' ) {
			$html .= '<em style="color:' . $traveladvisor_var_list_color . '; ">' . esc_html( $traveladvisor_var_list_item_text ) . '</em>';
		}
		$html .= ' </li>';
		return do_shortcode( $html );
	}

}
if ( function_exists( 'traveladvisor_var_short_code' ) )
	traveladvisor_var_short_code( 'traveladvisor_list_item', 'traveladvisor_var_list_item_shortcode' );
?>