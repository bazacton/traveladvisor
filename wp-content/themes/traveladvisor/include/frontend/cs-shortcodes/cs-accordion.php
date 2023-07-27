<?php

/*
 *
 * @Shortcode Name : Accordion
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_accordion_shortcode' ) ) {

	function traveladvisor_accordion_shortcode( $atts, $content = "" ) {
		global $acc_counter, $traveladvisor_var_accordion_column;
		$acc_counter = rand( 40, 9999999 );
		$html = '';
		$defaults = array(
			'traveladvisor_var_column_size' => '',
			'traveladvisor_var_accordion_column' => '',
			'traveladvisor_var_accordion_view' => '',
			'traveladvisor_var_accordian_main_title' => ''
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$column_class = '';
		$traveladvisor_var_column_size = isset( $traveladvisor_var_column_size ) ? $traveladvisor_var_column_size : '';
		$traveladvisor_var_accordian_main_title = isset( $traveladvisor_var_accordian_main_title ) ? $traveladvisor_var_accordian_main_title : '';
		$traveladvisor_var_accordion_view = isset( $traveladvisor_var_accordion_view ) ? $traveladvisor_var_accordion_view : '';
		$accordion_view = '';
		if ( isset( $traveladvisor_var_accordion_view ) && $traveladvisor_var_accordion_view == 'fancy' ) {
			$accordion_view = 'box';
		}
		if ( isset( $traveladvisor_var_column_size ) && $traveladvisor_var_column_size != '' ) {
			if ( function_exists( 'traveladvisor_var_custom_column_class' ) ) {
				$column_class = traveladvisor_var_custom_column_class( $traveladvisor_var_column_size );
			}
		}
		$element_title = '';
		if ( isset( $traveladvisor_var_accordian_main_title ) && trim( $traveladvisor_var_accordian_main_title ) <> '' ) {
			$element_title .= esc_html( $traveladvisor_var_accordian_main_title );
		}
		if ( isset( $column_class ) && $column_class <> '' ) {
			$html .= '<div class="' . esc_html( $column_class ) . '">';
		}
		// $html .= '<div class="cs-accordian">';
		$html .= '<div class="element-heading left"><h3 style="font-size:20px !important; padding-bottom:6px;">' . $traveladvisor_var_accordian_main_title . '</h3></div>';
		$html .='<div class="cs-shortcode-accordion ' . $accordion_view . ' ">';
		$html .= '<div class="panel-group" id="accordion' . $acc_counter . '">';
		$html .= do_shortcode( $content );
		$html .= '</div>';
		$html .='</div>';
		// $html .= '</div>';
		if ( isset( $column_class ) && $column_class <> '' ) {
			$html .= '</div>';
		}
		return $html;
	}

	if ( function_exists( 'traveladvisor_short_code' ) ) {
		traveladvisor_short_code( 'traveladvisor_accordion', 'traveladvisor_accordion_shortcode' );
	}
}
if ( function_exists( 'traveladvisor_var_short_code' ) )
	traveladvisor_var_short_code( 'traveladvisor_accordion', 'traveladvisor_accordion_shortcode' );
/*
 *
 * @Accordion Item
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_accordion_item_shortcode' ) ) {

	function traveladvisor_accordion_item_shortcode( $atts, $content = "" ) {
		global $acc_counter;
		$defaults = array(
			'traveladvisor_var_accordion_title' => 'Title',
			'traveladvisor_var_accordion_active' => 'yes',
			'traveladvisor_var_accordion_text' => ''
		);
		extract( shortcode_atts( $defaults, $atts ) );
		if ( $traveladvisor_var_accordion_text == '' ) {
			$traveladvisor_var_accordion_text = $content;
		}
		$traveladvisor_var_accordion_title = isset( $traveladvisor_var_accordion_title ) ? $traveladvisor_var_accordion_title : '';
		$traveladvisor_var_accordion_active = isset( $traveladvisor_var_accordion_active ) ? $traveladvisor_var_accordion_active : '';
		$accordion_count = 0;
		$accordion_count = rand( 4045, 99999 );
		$html = '';
		$active_in = '';
		$active_class = '';
		$styleColapse = 'collapse collapsed';
		if ( isset( $traveladvisor_var_accordion_active ) && $traveladvisor_var_accordion_active == 'yes' ) {
			$active_in = 'in';
			$styleColapse = '';
		} else {
			$active_class = 'collapsed';
		}
		$content_value = nl2br( $traveladvisor_var_accordion_text );
		$traveladvisor_team_spetraveladvisor_list = str_replace( '<br />', '</li><li><i class="icon-arrow-circle-right"></i>', $content_value );
		$html .= ' <div class="panel panel-default">';
		$html .= '  <div class="panel-heading" role="tablist" id="heading' . absint( $accordion_count ) . '">';
		$html .= '   <strong class="panel-title">';
		$html .= '      <a class=" ' . sanitize_html_class( $active_class ) . '" data-toggle="collapse" data-parent="#accordion' . $acc_counter . '" aria-expanded="true"  href="#collapse' . absint( $accordion_count ) . '">' . esc_html( $traveladvisor_var_accordion_title ) . '</a>';
		$html .= '   </strong>';
		$html .= ' </div>';
		$html .= '  <div id="collapse' . absint( $accordion_count ) . '" class="panel-collapse collapse ' . esc_html( $active_in ) . '" aria-labelledby="heading' . absint( $accordion_count ) . '" role="tabpanel">';
		$html .= '     <div class="panel-body" >' . $traveladvisor_team_spetraveladvisor_list . '</div>';
		$html .= ' </div>';
		$html .= '</div>';
		return $html;
	}

	if ( function_exists( 'traveladvisor_short_code' ) ) {
		traveladvisor_short_code( 'accordion_item', 'traveladvisor_accordion_item_shortcode' );
	}
}
if ( function_exists( 'traveladvisor_var_short_code' ) )
	traveladvisor_var_short_code( 'accordion_item', 'traveladvisor_accordion_item_shortcode' );
