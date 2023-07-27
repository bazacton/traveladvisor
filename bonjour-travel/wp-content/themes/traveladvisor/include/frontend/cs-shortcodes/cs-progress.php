<?php

/*
 *
 * @Shortcode Name :  Progress front end view
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_progress_shortcode' ) ) {

	function traveladvisor_var_progress_shortcode( $atts, $content = "" ) {
		global $post, $traveladvisor_var_progress_column, $traveladvisor_var_progress_view, $var_is;
		$var_is = array();
		$defaults = array(
			'traveladvisor_var_column_size' => '',
			'traveladvisor_var_progress_title' => '',
			'traveladvisor_var_progress_view' => '',
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$column_class = '';
		if ( isset( $traveladvisor_var_column_size ) && $traveladvisor_var_column_size != '' ) {
			if ( function_exists( 'traveladvisor_var_custom_column_class' ) ) {
				$column_class = traveladvisor_var_custom_column_class( $traveladvisor_var_column_size );
			}
		}
		$traveladvisor_var_column_size = isset( $traveladvisor_var_column_size ) ? $traveladvisor_var_column_size : '';
		$traveladvisor_var_progress_title = isset( $traveladvisor_var_progress_title ) ? $traveladvisor_var_progress_title : '';
		$traveladvisor_var_progress_view = isset( $traveladvisor_var_progress_view ) ? $traveladvisor_var_progress_view : '';
		$html = '';
		$element_title = '';
		$extra_row = '';
		if ( isset( $traveladvisor_var_progress_view ) && $traveladvisor_var_progress_view <> '' && $traveladvisor_var_progress_view == 'horizontal' ) {
			$extra_row = 'row';
		} else {
			$extra_row = '';
		}

		if ( isset( $column_class ) && $column_class <> '' ) {
			$html = '<div class="' . $column_class . '">';
		}
		if ( isset( $traveladvisor_var_progress_title ) && trim( $traveladvisor_var_progress_title ) <> '' ) {
			$element_title.='<div class="row">';
			$element_title.='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
			$element_title.= '<div class="element-heading left">';
			$element_title.='<h3>' . esc_html( $traveladvisor_var_progress_title ) . '</h3>';
			$element_title.='</div>';
			$element_title.='</div>';
			$element_title.='</div>';
		}
		$html.= $element_title;
		if ( isset( $traveladvisor_var_progress_view ) && $traveladvisor_var_progress_view <> '' && $traveladvisor_var_progress_view == 'horizontal' ) {
			$html .= '<div class="row">';
			$html.= ' <div class="cs-progress-holder">';

			$html.= ' <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
			$html.= do_shortcode( $content );
			$html.=' </div> ';
			$html.= ' </div>';
			$html.= '</div>';
		}
		if ( isset( $traveladvisor_var_progress_view ) && $traveladvisor_var_progress_view <> '' && $traveladvisor_var_progress_view == 'pie_cahrt' ) {
			$html .= '<div class="cs-progress-holder">';
			$html .= ' <div class="row">';
			$html .= do_shortcode( $content );
			$html .= '</div>';
			$html .= '</div>';
			$var_ids = implode( ',', $var_is );
			wp_add_inline_script( 'traveladvisor-inline-script', ' jQuery(document).ready(function () {
                    
                if (jQuery("'.esc_html($var_ids).'").length != "") {
                    jQuery("'.esc_html($var_ids).'").waypoint(function (direction) {
                        jQuery(this).circliful();
                    }, {
                        offset: "100%",
                        triggerOnce: true
                    });
                }
                });' );
			 
			
		}
		if ( isset( $column_class ) && $column_class <> '' ) {
			$html .= '</div>';
		}
		return do_shortcode( $html );
	}

}
if ( function_exists( 'traveladvisor_var_short_code' ) )
	traveladvisor_var_short_code( 'traveladvisor_progress', 'traveladvisor_var_progress_shortcode' );
/*
 *
 * @Progress  Item  shortcode/element front end view
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_progress_item_shortcode' ) ) {

	function traveladvisor_var_progress_item_shortcode( $atts, $content = "" ) {
		global $post, $traveladvisor_var_progress_column, $traveladvisor_var_progress_view, $rand, $var_is;
		$defaults = array(
			'traveladvisor_var_progress_item_text' => '',
			'traveladvisor_var_progress_item_percentage' => ''
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$traveladvisor_var_progress_column_str = '';

		if ( $traveladvisor_var_progress_column != 12 ) {
			$traveladvisor_var_progress_column_str = 'class = "col-md-' . esc_html( $traveladvisor_var_progress_column ) . '"';
		}
		$traveladvisor_var_progress_item_text = isset( $traveladvisor_var_progress_item_text ) ? $traveladvisor_var_progress_item_text : '';
		$traveladvisor_var_progress_item_percentage = isset( $traveladvisor_var_progress_item_percentage ) ? $traveladvisor_var_progress_item_percentage : '';
		$html = '';
		if ( isset( $traveladvisor_var_progress_view ) && $traveladvisor_var_progress_view <> '' && $traveladvisor_var_progress_view == 'horizontal' ) {
			$html .= '<div class="cs-progressbar">';
			$html .= '<strong>' . esc_attr( $traveladvisor_var_progress_item_text ) . '</strong>';
			$html .=' <div data-percent="' . esc_attr( $traveladvisor_var_progress_item_percentage ) . '%" class="skillbar">';
			$html .=' <div class="skillbar-bar cs-bgcolor"></div> ';
			$html .=' </div>';
			$html .='<span>' . esc_attr( $traveladvisor_var_progress_item_percentage ) . '%</span>';
			$html .=' </div> ';
		}
		if ( isset( $traveladvisor_var_progress_view ) && $traveladvisor_var_progress_view <> '' && $traveladvisor_var_progress_view == 'pie_cahrt' ) {
			$rand = rand( 1, 900 );
			$var_is[] = '#chart' . $rand;
			$html = '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">';
			$html .='<div id="chart' . $rand . '" class="chartskills fadeInDown wow" data-dimension="200" data-info="' . esc_html( $traveladvisor_var_progress_item_text ) . '" data-text="' . esc_attr( $traveladvisor_var_progress_item_percentage ) . '%" data-width="10" data-fontsize="44" data-percent="' . esc_attr( $traveladvisor_var_progress_item_percentage ) . '" data-fgcolor="rgba(0,101,184,1)" data-bgcolor="#e4e4e4" data-icon-size="50" data-icon-color="#303030"> </div>';
			$html .='</div>';
		}
		return do_shortcode( $html );
	}

}
if ( function_exists( 'traveladvisor_var_short_code' ) )
	traveladvisor_var_short_code( 'traveladvisor_progress_item', 'traveladvisor_var_progress_item_shortcode' );
?>
