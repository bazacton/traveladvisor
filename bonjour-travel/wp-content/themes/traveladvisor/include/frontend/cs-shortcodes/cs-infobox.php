<?php

/*
 *
 * @Shortcode Name :  infobox front end view
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_infobox_shortcode' ) ) {

	function traveladvisor_var_infobox_shortcode( $atts, $content = "" ) {
		global $post, $traveladvisor_var_infobox_column, $traveladvisor_var_infobox_title_color, $traveladvisor_var_infobox_icon_color;
		global $infobox_content;
		$infobox_content = '';
		$defaults = array(
			'traveladvisor_var_column_size' => '',
			'traveladvisor_var_infobox_section_title' => '',
			'traveladvisor_var_infobox_title_color' => '',
			'traveladvisor_var_infobox_icon_color' => '',
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$traveladvisor_var_column_size = isset( $traveladvisor_var_column_size ) ? $traveladvisor_var_column_size : '';
		$traveladvisor_var_infobox_section_title = isset( $traveladvisor_var_infobox_section_title ) ? $traveladvisor_var_infobox_section_title : '';
		$traveladvisor_var_infobox_title_color = isset( $traveladvisor_var_infobox_title_color ) ? $traveladvisor_var_infobox_title_color : '';
		$traveladvisor_var_infobox_icon_color = isset( $traveladvisor_var_infobox_icon_color ) ? $traveladvisor_var_infobox_icon_color : '';
		$html = '';
		$traveladvisor_section_title = '';
		$traveladvisor_section_sub_title = '';
		$column_class = '';
		$column_class = '';
		if ( isset( $traveladvisor_var_column_size ) && $traveladvisor_var_column_size != '' ) {
			if ( function_exists( 'traveladvisor_var_custom_column_class' ) ) {
				$column_class = traveladvisor_var_custom_column_class( $traveladvisor_var_column_size );
			}
		}

		if ( isset( $column_class ) && $column_class <> '' ) {
			$html .= '<div class="' . esc_html( $column_class ) . '">';
		}

		$html .='<div class="contact-info">';
		$html .='<div class="cs-element-title">
		          <h4>' . $traveladvisor_var_infobox_section_title . '</h4>
	 	        </div>
                <ul>';
		$html .= do_shortcode( $content );
		$html .='</ul>';
		$html .= '</div>';
		if ( isset( $column_class ) && $column_class <> '' ) {
			$html .= '</div>';
		}
		return do_shortcode( $html );
	}

}
if ( function_exists( 'traveladvisor_var_short_code' ) )
	traveladvisor_var_short_code( 'traveladvisor_infobox', 'traveladvisor_var_infobox_shortcode' );
/*
 *
 * @List  Item  shortcode/element front end view
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_infobox_item_shortcode' ) ) {

	function traveladvisor_var_infobox_item_shortcode( $atts, $content = "" ) {
		global $post, $traveladvisor_var_infobox_column, $infobox_content, $traveladvisor_var_infobox_title_color, $traveladvisor_var_infobox_icon_color;
		$output = '';
		global $infobox_content;
		$defaults = array(
			'traveladvisor_var_infobox_element_title' => '',
			'traveladvisor_var_infobox_icon' => '',
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$traveladvisor_var_infobox_column_str = '';
		$traveladvisor_var_infobox_element_title = isset( $traveladvisor_var_infobox_element_title ) ? $traveladvisor_var_infobox_element_title : '';
		$traveladvisor_var_infobox_icon = isset( $traveladvisor_var_infobox_icon ) ? $traveladvisor_var_infobox_icon : '';
		$title_color = '';
		$icon_color = '';
		if ( isset( $traveladvisor_var_infobox_title_color ) && $traveladvisor_var_infobox_title_color != '' ) {
			$title_color = 'style="color:' . $traveladvisor_var_infobox_title_color . '"';
		}
		if ( isset( $traveladvisor_var_infobox_icon_color ) && $traveladvisor_var_infobox_icon_color != '' ) {
			$icon_color = 'style="color:' . $traveladvisor_var_infobox_icon_color . '"';
		}
		$output .= '
				<li>
					<div class="contact-icon cs-color "><i ' . $icon_color . ' class="' . $traveladvisor_var_infobox_icon . '"></i></div>
					<div class="contact-label"><span >' . do_shortcode( $content ) . '</span></div>
				</li>';
		$randid = rand( 877, 9999 );
		return $output;
	}

}
if ( function_exists( 'traveladvisor_var_short_code' ) )
	traveladvisor_var_short_code( 'traveladvisor_infobox_item', 'traveladvisor_var_infobox_item_shortcode' );
?>