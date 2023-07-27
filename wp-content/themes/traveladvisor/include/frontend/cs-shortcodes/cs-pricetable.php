<?php

/*
 *
 * @Shortcode Name :  Start function for Multiple Pricetable shortcode/element front end view
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_pricetable_shortcode' ) ) {

	function traveladvisor_var_pricetable_shortcode( $atts, $content = "" ) {
		global $post, $traveladvisor_var_multi_pricetable_column, $traveladvisor_var_multi_pricetable_view, $traveladvisor_var_item_column_size, $traveladvisor_var_multi_pricetable_title_color;
		$defaults = array(
			'traveladvisor_var_column_size' => '1/1',
			'traveladvisor_var_multi_pricetable_title' => '',
			'traveladvisor_var_multi_pricetable_column' => '',
			'traveladvisor_var_multiple_pricetable_class' => '',
			'traveladvisor_var_item_column_size' => '',
			'traveladvisor_var_multi_pricetable_title_color' => '',
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$traveladvisor_var_column_size = isset( $traveladvisor_var_column_size ) ? $traveladvisor_var_column_size : '';
		$traveladvisor_var_item_column_size = isset( $traveladvisor_var_item_column_size ) ? $traveladvisor_var_item_column_size : '';
		$traveladvisor_var_multi_pricetable_title = isset( $traveladvisor_var_multi_pricetable_title ) ? $traveladvisor_var_multi_pricetable_title : '';
		$traveladvisor_var_multi_pricetable_column = isset( $traveladvisor_var_multi_pricetable_column ) ? $traveladvisor_var_multi_pricetable_column : '';
		$traveladvisor_var_multiple_pricetable_class = isset( $traveladvisor_var_multiple_pricetable_class ) ? $traveladvisor_var_multiple_pricetable_class : '';
		$traveladvisor_var_multi_pricetable_title_color = isset( $traveladvisor_var_multi_pricetable_title_color ) ? $traveladvisor_var_multi_pricetable_title_color : '';
		if ( $traveladvisor_var_multi_pricetable_column <> '' ) {
			$traveladvisor_var_multi_pricetable_column = 12 / $traveladvisor_var_multi_pricetable_column;
		} else {
			$traveladvisor_var_multi_pricetable_column = 4;
		}
		$column_class = '';

		if ( isset( $traveladvisor_var_column_size ) && $traveladvisor_var_column_size != '' ) {
			if ( function_exists( 'traveladvisor_var_custom_column_class' ) ) {
				$column_class = traveladvisor_var_custom_column_class( $traveladvisor_var_column_size );
			}
		}
		$traveladvisor_element_title = '';
		$html = '';
		$randomid = rand( 01234, 9999 );
		if ( isset( $traveladvisor_var_multi_pricetable_title ) && trim( $traveladvisor_var_multi_pricetable_title ) <> '' ) {
			$traveladvisor_element_title = '<div class="element-heading left">'
					. '<h3>' . esc_attr( $traveladvisor_var_multi_pricetable_title ) . '</h3>';
			if ( isset( $traveladvisor_var_multi_pricetable_sub_title ) && trim( $traveladvisor_var_multi_pricetable_sub_title ) <> '' ) {
				$traveladvisor_element_title .='<span>' . esc_attr( $traveladvisor_var_multi_pricetable_sub_title ) . '</span>';
			}
			$traveladvisor_element_title .= '</div>';
		}

		if ( isset( $traveladvisor_var_multiple_pricetable_class ) && trim( $traveladvisor_var_multiple_pricetable_class ) <> '' ) {
			$html .= '<div class="' . $traveladvisor_var_multiple_pricetable_class . '"> ';
		}
		$html .= $traveladvisor_element_title;
		$html .= '<div class="row">' . do_shortcode( $content ) . '</div>';
		if ( isset( $traveladvisor_var_multiple_pricetable_class ) && trim( $traveladvisor_var_multiple_pricetable_class ) <> '' ) {
			$html .= '</div>';
		}

		return do_shortcode( $html );
	}

}
if ( function_exists( 'traveladvisor_var_short_code' ) ) {
	traveladvisor_var_short_code( 'pricetable', 'traveladvisor_var_pricetable_shortcode' );
}
/*
 *
 * @Multiple  Start function for Multiple Pricetable Item  shortcode/element front end view
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_pricetable_item_shortcode' ) ) {

	function traveladvisor_var_pricetable_item_shortcode( $atts, $content = "" ) {
		$defaults = array(
			'traveladvisor_var_multiple_pricetable_title' => '',
			'traveladvisor_var_multiple_pricetable_currency' => '',
			'traveladvisor_var_multiple_pricetable_price' => '',
			// 'traveladvisor_var_multiple_pricetable_desc' => '',
			'traveladvisor_var_multiple_pricetable_btntxt' => '',
			'traveladvisor_var_multiple_pricetable_btnlink' => '',
			'traveladvisor_var_multiple_pricetable_package' => '',
		);
		global $post, $traveladvisor_var_multi_pricetable_column, $traveladvisor_var_multi_pricetable_view, $traveladvisor_var_item_column_size, $traveladvisor_var_multi_pricetable_title_color;
		extract( shortcode_atts( $defaults, $atts ) );
		$html = '';

		$traveladvisor_var_multi_pricetable_text = isset( $traveladvisor_var_multi_pricetable_text ) ? $traveladvisor_var_multi_pricetable_text : '';
		$traveladvisor_var_multiple_pricetable_title = isset( $traveladvisor_var_multiple_pricetable_title ) ? $traveladvisor_var_multiple_pricetable_title : '';
		$traveladvisor_var_multiple_pricetable_currency = isset( $traveladvisor_var_multiple_pricetable_currency ) ? $traveladvisor_var_multiple_pricetable_currency : '';
		$traveladvisor_var_multiple_pricetable_price = isset( $traveladvisor_var_multiple_pricetable_price ) ? $traveladvisor_var_multiple_pricetable_price : '';
		$traveladvisor_var_multiple_pricetable_package = isset( $traveladvisor_var_multiple_pricetable_package ) ? $traveladvisor_var_multiple_pricetable_package : '';
		$traveladvisor_var_multiple_pricetable_desc = $content;
		$traveladvisor_var_multiple_pricetable_btntxt = isset( $traveladvisor_var_multiple_pricetable_btntxt ) ? $traveladvisor_var_multiple_pricetable_btntxt : '';
		$traveladvisor_var_multiple_pricetable_btnlink = isset( $traveladvisor_var_multiple_pricetable_btnlink ) ? $traveladvisor_var_multiple_pricetable_btnlink : '';
		if ( $traveladvisor_var_multiple_pricetable_title ) {
			$featuroutput = '';

			$featuroutput .= do_shortcode( $traveladvisor_var_multiple_pricetable_desc );
			$item_column_class = '';
			if ( isset( $traveladvisor_var_item_column_size ) && $traveladvisor_var_item_column_size != '' ) {
				if ( function_exists( 'traveladvisor_var_custom_column_class' ) ) {
					$item_column_class = traveladvisor_var_custom_column_class( $traveladvisor_var_item_column_size );
				}
			}

			if ( isset( $item_column_class ) && $item_column_class <> '' ) {
				$html .= '<div class="' . $item_column_class . '">';
			} else {
				$html .='<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">';
			}
			$html .= '<div class="cs-pricetable"><h3 style="color:' . esc_attr( $traveladvisor_var_multi_pricetable_title_color ) . ' !important;">' . esc_html( $traveladvisor_var_multiple_pricetable_title ) . ''
					. '</h3><div class="price-holder"><div class="cs-price"><span class="cs-color">'
					. '<small>' . esc_html( $traveladvisor_var_multiple_pricetable_currency ) . ' </small> ' . esc_html( $traveladvisor_var_multiple_pricetable_price ) . '<em>' . esc_html( $traveladvisor_var_multiple_pricetable_package ) . '</em></span>'
					. $featuroutput
					. '<a class="cs-bgcolor" href=' . esc_url( $traveladvisor_var_multiple_pricetable_btnlink ) . '><i class="icon-share3"></i>' . esc_html( $traveladvisor_var_multiple_pricetable_btntxt ) . '</a>'
					. '</div></div></div>';

			if ( isset( $item_column_class ) && $item_column_class <> '' ) {
				$html .= '</div>';
			} else {
				$html .="</div>";
			}
		}
		return do_shortcode( $html );
	}

}
if ( function_exists( 'traveladvisor_var_short_code' ) ) {
	traveladvisor_var_short_code( 'pricetable_item', 'traveladvisor_var_pricetable_item_shortcode' );
}
?>