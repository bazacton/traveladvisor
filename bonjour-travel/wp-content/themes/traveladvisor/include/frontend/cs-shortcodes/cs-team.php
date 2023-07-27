<?php

/*
 *
 * @Shortcode Name :  Start function for Multiple team shortcode/element front end view
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_team_shortcode' ) ) {

	function traveladvisor_var_team_shortcode( $atts, $content = "" ) {
		global $post, $traveladvisor_var_team_column_size, $traveladvisor_var_link_url, $traveladvisor_var_multi_counters_view, $traveladvisor_var_item_column_size, $traveladvisor_var_team_view;
		$defaults = array(
			'traveladvisor_var_team_column_size' => '1/1',
			'traveladvisor_var_multi_team_title' => '',
			'traveladvisor_var_team_view' => '',
			'traveladvisor_var_column_size' => ''
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$html = '';
		$traveladvisor_var_team_column_size = isset( $traveladvisor_var_team_column_size ) ? $traveladvisor_var_team_column_size : '';
		$traveladvisor_var_column_size = isset( $traveladvisor_var_column_size ) ? $traveladvisor_var_column_size : '';
		$traveladvisor_var_multi_team_title = isset( $traveladvisor_var_multi_team_title ) ? $traveladvisor_var_multi_team_title : '';
		$traveladvisor_var_team_view = isset( $traveladvisor_var_team_view ) ? $traveladvisor_var_team_view : '';
		if ( isset( $traveladvisor_var_column_size ) && $traveladvisor_var_column_size != '' ) {
			if ( function_exists( 'traveladvisor_var_custom_column_class' ) ) {
				$column_class = traveladvisor_var_custom_column_class( $traveladvisor_var_column_size );
			}
		}
		if ( isset( $column_class ) && $column_class <> '' ) {
			$html .= '<div class="' . $column_class . '">';
			$html .= '<div class="row">';
		}
		$traveladvisor_element_title = '';
		$randomid = rand( 01234, 9999 );
		if ( isset( $traveladvisor_var_multi_team_title ) && trim( $traveladvisor_var_multi_team_title ) <> '' ) {
			$traveladvisor_element_title = '<div class="cs-element-title">'
					. '<h3>' . esc_attr( $traveladvisor_var_multi_team_title ) . '</h3>';
			$traveladvisor_element_title .= '</div>';
		}
		$html .= $traveladvisor_element_title;

		$html .= do_shortcode( $content );

		if ( isset( $column_class ) && $column_class <> '' ) {
			$html .= '</div>';
			$html .= '</div>';
			if ( isset( $traveladvisor_var_team_view ) && $traveladvisor_var_team_view == 'team_simple' ) {
				$html .= '</div>';
			}
		}
		return do_shortcode( $html );
	}

}
if ( function_exists( 'traveladvisor_var_short_code' ) ) {
	traveladvisor_var_short_code( 'team', 'traveladvisor_var_team_shortcode' );
}
/*
 *
 * @Multiple  Start function for Multiple Service Item  shortcode/element front end view
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_team_item_shortcode' ) ) {

	function traveladvisor_var_team_item_shortcode( $atts, $content = "" ) {
		$defaults = array(
			'traveladvisor_var_multi_team_text' => '',
			'traveladvisor_var_team_img_array' => '',
			'traveladvisor_var_team_image_place' => '',
			'traveladvisor_var_team_facebook' => '',
			'traveladvisor_var_team_twitter' => '',
			'traveladvisor_var_team_google' => '',
			'traveladvisor_var_team_mail' => '',
			'traveladvisor_var_team_excerpt' => '',
			'traveladvisor_var_team_excerpt_length' => '',
			'traveladvisor_var_team_title' => '',
		);
		global $post, $traveladvisor_var_team_column_size, $traveladvisor_var_multi_counters_view, $traveladvisor_var_item_column_size, $traveladvisor_var_team_view;
		extract( shortcode_atts( $defaults, $atts ) );
		$traveladvisor_var_team_title = isset( $traveladvisor_var_team_title ) ? $traveladvisor_var_team_title : '';
		$traveladvisor_var_multi_team_text = isset( $traveladvisor_var_multi_team_text ) ? $traveladvisor_var_multi_team_text : '';
		$traveladvisor_var_team_img_array = isset( $traveladvisor_var_team_img_array ) ? $traveladvisor_var_team_img_array : '';
		$traveladvisor_var_team_image_place = isset( $traveladvisor_var_team_image_place ) ? $traveladvisor_var_team_image_place : '';
		$traveladvisor_var_team_facebook = isset( $traveladvisor_var_team_facebook ) ? $traveladvisor_var_team_facebook : '';
		$traveladvisor_var_team_twitter = isset( $traveladvisor_var_team_twitter ) ? $traveladvisor_var_team_twitter : '';
		$traveladvisor_var_team_google = isset( $traveladvisor_var_team_google ) ? $traveladvisor_var_team_google : '';
		$traveladvisor_var_team_mail = isset( $traveladvisor_var_team_mail ) ? $traveladvisor_var_team_mail : '';
		//  $traveladvisor_var_team_desc = $content;
		$traveladvisor_var_team_excerpt_length = isset( $traveladvisor_var_team_excerpt_length ) ? $traveladvisor_var_team_excerpt_length : '';
		$traveladvisor_var_team_excerpt = isset( $traveladvisor_var_team_excerpt ) ? $traveladvisor_var_team_excerpt : '';
		$traveladvisor_var_team = "";
		if ( isset( $traveladvisor_var_team_column_size ) && $traveladvisor_var_team_column_size != '' ) {
			if ( function_exists( 'traveladvisor_var_custom_column_class' ) ) {
				$Item_column_class = traveladvisor_var_custom_column_class( $traveladvisor_var_team_column_size );
			}
		}
		if ( isset( $traveladvisor_var_team_view ) && $traveladvisor_var_team_view == 'team_grid' ) {
			$traveladvisor_var_team .= '<div class="' . $Item_column_class . '">';
			$traveladvisor_var_team .= '<div class="cs-team grid">';
			$traveladvisor_var_team .='<div class="cs-media">';
			$traveladvisor_var_team .='<figure>';
			$traveladvisor_var_team .='<a><img alt="traveladvisor_var_team_img_array" src="' . esc_url( $traveladvisor_var_team_img_array ) . '" /></a>';
			$traveladvisor_var_team .='<figcaption></figcaption>';
			$traveladvisor_var_team .='</figure>';
			$traveladvisor_var_team .='</div>';
			$traveladvisor_var_team .='<div class="cs-text">';
			$traveladvisor_var_team .='<h4>' . esc_html( $traveladvisor_var_team_title ) . '</h4>';
			$traveladvisor_var_team .='<span>' . esc_html( $traveladvisor_var_multi_team_text ) . '</span>';
			$traveladvisor_var_team .='</div>';
			$traveladvisor_var_team .='<ul class="social-media">';
			if ( isset( $traveladvisor_var_team_facebook ) && $traveladvisor_var_team_facebook <> '' ) {
				$traveladvisor_var_team .= '<li><a href="' . esc_url( $traveladvisor_var_team_facebook ) . '" data-toggle="tooltip" data-original-title="Facebook">
                                                        <i data-origanal-title="facebook" class="icon-facebook"></i></a></li>';
			}
			if ( isset( $traveladvisor_var_team_twitter ) && $traveladvisor_var_team_twitter <> '' ) {
				$traveladvisor_var_team .= '<li><a href="' . esc_url( $traveladvisor_var_team_twitter ) . '" data-toggle="tooltip" data-original-title="Twitter">
                                                        <i data-origanal-title="twitter" class="icon-twitter"></i></a></li>';
			}
			if ( isset( $traveladvisor_var_team_mail ) && $traveladvisor_var_team_mail <> '' ) {
				$traveladvisor_var_team .= '<li><a href="mailto:' . esc_url( $traveladvisor_var_team_mail ) . '" data-toggle="tooltip" data-original-title="Mail">
                                                        <i data-origanal-title="email" class="icon-mail_outline"></i></a></li>';
			}
			if ( isset( $traveladvisor_var_team_google ) && $traveladvisor_var_team_google <> '' ) {
				$traveladvisor_var_team .= '<li><a href="' . esc_url( $traveladvisor_var_team_google ) . '" data-toggle="tooltip" data-original-title="Google+">
                                                        <i data-origanal-title="googleplus" class="icon-google4"></i></a></li>';
			}
			$traveladvisor_var_team .='</ul>';
			$traveladvisor_var_team .='</div>';
			$traveladvisor_var_team .='</div>';
		}
		if ( isset( $traveladvisor_var_team_view ) && $traveladvisor_var_team_view == 'team_fancy' ) {
			$team_right = '';
			$team_content = '';
			$team_excerpt_length = '';
			if ( isset( $traveladvisor_var_team_image_place ) && $traveladvisor_var_team_image_place == 'right' ) {
				$team_right = 'right';
			}
			$traveladvisor_var_team .= '<div class="cs-team classic ' . esc_attr( $team_right ) . ' ">';
			$traveladvisor_var_team .= '<div class="cs-media">';
			$traveladvisor_var_team .= '<figure>';
			$traveladvisor_var_team .= '<a><img src="' . esc_url( $traveladvisor_var_team_img_array ) . '" alt="traveladvisor_var_team_img_array" /></a>';
			$traveladvisor_var_team .= '</figure>';
			$traveladvisor_var_team .= '</div>';
			$traveladvisor_var_team .= '<div class="cs-text">';
			$traveladvisor_var_team .= '<h3><a>' . esc_html( $traveladvisor_var_team_title ) . '</a></h3>';
			$traveladvisor_var_team .= '<span>' . esc_html( $traveladvisor_var_multi_team_text ) . '</span>';

			$traveladvisor_var_team .= '<p>' . do_shortcode( $content ) . '</p>';

			$traveladvisor_var_team .= '<ul class="social-media">';
			if ( isset( $traveladvisor_var_team_facebook ) && $traveladvisor_var_team_facebook <> '' ) {
				$traveladvisor_var_team.= '<li><a data-toggle="tooltip" title="facebook" data-original-title="facebook" href="' . esc_url( $traveladvisor_var_team_facebook ) . '"><i class="icon-facebook"></i></a></li>';
			}
			if ( isset( $traveladvisor_var_team_twitter ) && $traveladvisor_var_team_twitter <> '' ) {
				$traveladvisor_var_team.= '<li><a data-toggle="tooltip" title="twitter" data-original-title="twitter" href="' . esc_url( $traveladvisor_var_team_twitter ) . '"><i class="icon-twitter"></i></a></li>';
			}
			if ( isset( $traveladvisor_var_team_google ) && $traveladvisor_var_team_google <> '' ) {
				$traveladvisor_var_team.= '<li><a data-toggle="tooltip" title="googleplus" data-original-title="googleplus" href="' . esc_url( $traveladvisor_var_team_google ) . '"><i class="icon-google4"></i></a></li>';
			}
			if ( isset( $traveladvisor_var_team_mail ) && $traveladvisor_var_team_mail <> '' ) {
				$traveladvisor_var_team.= '<li><a data-toggle="tooltip" title="email" data-original-title="envelope" href="mailto:' . esc_html( $traveladvisor_var_team_mail ) . '"><i class="icon-envelope"></i></a></li>';
			}
			$traveladvisor_var_team .= '</ul>';
			$traveladvisor_var_team .= '</div>';
			$traveladvisor_var_team .= '</div> ';
		}
		if ( isset( $traveladvisor_var_team_view ) && $traveladvisor_var_team_view == 'team_simple' ) {

			$traveladvisor_var_team .= '<div class="' . $Item_column_class . '">';
			$traveladvisor_var_team .= '<div class="cs-team-directors">';
			$traveladvisor_var_team .= '<div class="cs-media">';
			$traveladvisor_var_team .= '<figure>';
			$traveladvisor_var_team .= '<a><img src="' . esc_url( $traveladvisor_var_team_img_array ) . '" alt="traveladvisor_var_team_img_array" /></a>';
			$traveladvisor_var_team .= '<figcaption></figcaption>';
			$traveladvisor_var_team .= '</figure>';
			$traveladvisor_var_team .= '</div>';
			$traveladvisor_var_team .= '<div class="cs-text">';
			$traveladvisor_var_team .= '<h6><a>' . esc_html( $traveladvisor_var_team_title ) . '</a></h6>';
			$traveladvisor_var_team .= '<span>' . esc_html( $traveladvisor_var_multi_team_text ) . '</span>';
			$traveladvisor_var_team .= '</div>';
			$traveladvisor_var_team .= '</div>';
			$traveladvisor_var_team .= '</div> ';
		}
		return do_shortcode( $traveladvisor_var_team );
	}

}
if ( function_exists( 'traveladvisor_var_short_code' ) ) {
	traveladvisor_var_short_code( 'team_item', 'traveladvisor_var_team_item_shortcode' );
}
?>