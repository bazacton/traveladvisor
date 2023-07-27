<?php

/*
 *
 * @Shortcode Name :  tabs front end view
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_tabs_shortcode' ) ) {

	function traveladvisor_var_tabs_shortcode( $atts, $content = "" ) {
		global $post, $traveladvisor_var_tabs_column;
		global $tabs_content;
		$tabs_content = '';
		$column_class = '';
		$defaults = array(
			'traveladvisor_var_tabs_title' => '',
			'traveladvisor_var_tabs_style' => '',
			'traveladvisor_var_column_size' => '',
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$traveladvisor_var_tabs_title = isset( $traveladvisor_var_tabs_title ) ? $traveladvisor_var_tabs_title : '';
		$traveladvisor_var_tabs_style = isset( $traveladvisor_var_tabs_style ) ? $traveladvisor_var_tabs_style : '';
		$traveladvisor_var_column_size = isset( $traveladvisor_var_column_size ) ? $traveladvisor_var_column_size : '';
		$html = '';
		$traveladvisor_section_title = '';
		$traveladvisor_section_sub_title = '';
		if ( isset( $traveladvisor_var_column_size ) && $traveladvisor_var_column_size != '' ) {
			if ( function_exists( 'traveladvisor_var_custom_column_class' ) ) {
				$column_class = traveladvisor_var_custom_column_class( $traveladvisor_var_column_size );
			}
		}
		if ( $column_class != '' ) {
			$traveladvisor_section_title .= ' <div class="' . $column_class . '">';
		}
		if ( isset( $traveladvisor_var_tabs_title ) && trim( $traveladvisor_var_tabs_title ) <> '' ) {
			$traveladvisor_section_title .= '<div class="element-heading left">';
			$traveladvisor_section_title .= '<h3>' . esc_attr( $traveladvisor_var_tabs_title ) . '</h3>';
			$traveladvisor_section_title .= '</div>';
		}
		$traveladvisor_tabs_style = "vertical";
		if ( $traveladvisor_var_tabs_style == "Horizontal" ) {
			$traveladvisor_tabs_style = "";
		}
		$traveladvisor_var_tabs_style;
		$html .= $traveladvisor_section_title;
		$html .= "<div class='cs-tabs $traveladvisor_tabs_style'>";
		$html .= '  <ul class="nav nav-tabs" role="tablist">';
		$html .= do_shortcode( $content );
		$html .= '</ul>';
		$html .= '<div class="tab-content">';
		$html .= $tabs_content;
		$html .= '</div>';
		$html .= '</div>';
		if ( $column_class != '' ) {
			$html .= '</div>';
		}
		return do_shortcode( $html );
	}

}
if ( function_exists( 'traveladvisor_var_short_code' ) )
	traveladvisor_var_short_code( 'traveladvisor_tabs', 'traveladvisor_var_tabs_shortcode' );
/*
 *
 * @List  Item  shortcode/element front end view
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_tabs_item_shortcode' ) ) {

	function traveladvisor_var_tabs_item_shortcode( $atts, $content = "" ) {
		global $post, $traveladvisor_var_tabs_column, $tabs_content;
		$output = '';
		global $tabs_content;
		$defaults = array(
			'traveladvisor_var_tabs_item_text' => '',
			'traveladvisor_var_tabs_item_icon' => '',
			'traveladvisor_var_tabs_desc' => '',
			'traveladvisor_var_tabs_active' => ''
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$traveladvisor_var_tabs_column_str = '';
		if ( $traveladvisor_var_tabs_column != 12 ) {
			$traveladvisor_var_tabs_column_str = 'class = "col-md-' . esc_html( $traveladvisor_var_tabs_column ) . '"';
		}
		$traveladvisor_var_tabs_item_text = isset( $traveladvisor_var_tabs_item_text ) ? $traveladvisor_var_tabs_item_text : '';
		$traveladvisor_var_tabs_color = isset( $traveladvisor_var_tabs_color ) ? $traveladvisor_var_tabs_color : '';
		$traveladvisor_var_tabs_item_icon = isset( $traveladvisor_var_tabs_item_icon ) ? $traveladvisor_var_tabs_item_icon : '';
		$traveladvisor_var_tabs_desc = $content;
		$traveladvisor_var_tabs_active = isset( $traveladvisor_var_tabs_active ) ? $traveladvisor_var_tabs_active : '';
		$activeClass = "";
		if ( $traveladvisor_var_tabs_active == 'Yes' ) {
			$activeClass = 'active in';
		}
		$fa_icon = '';
		if ( $traveladvisor_var_tabs_item_icon ) {
			$fa_icon = '<i class="' . sanitize_html_class( $traveladvisor_var_tabs_item_icon ) . '"></i> ';
		}
		$randid = rand( 877, 9999 );
		$output .= '<li  class="' . $activeClass . '"><a data-toggle="tab" href="#cs-tab-' . sanitize_title( $traveladvisor_var_tabs_item_text ) . $randid . '"  aria-expanded="true">' . $fa_icon . $traveladvisor_var_tabs_item_text . '</a></li>';
		if ( isset( $traveladvisor_var_tabs_desc ) && $traveladvisor_var_tabs_desc != "" ) {
			$tabs_content .= '<div id="cs-tab-' . sanitize_title( $traveladvisor_var_tabs_item_text ) . $randid . '" class="tab-pane fade ' . $activeClass . '">';
			$tabs_content .= '<p>' . $traveladvisor_var_tabs_desc . '</p>';
			$tabs_content .= '</div>';
		}
		return $output;
	}

}
if ( function_exists( 'traveladvisor_var_short_code' ) )
	traveladvisor_var_short_code( 'traveladvisor_tabs_item', 'traveladvisor_var_tabs_item_shortcode' );
?>