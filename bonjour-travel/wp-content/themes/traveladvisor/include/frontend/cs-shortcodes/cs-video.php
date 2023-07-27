<?php

/*
 *
 * @Shortcode Name : Video 
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_video' ) ) {

	function traveladvisor_var_video( $atts, $content = "" ) {
		$defaults = array(
			'traveladvisor_var_column_size' => '',
			'traveladvisor_var_video_title' => '',
			'traveladvisor_var_video_url' => '',
			'traveladvisor_var_video_width' => '',
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$traveladvisor_var_video_title = isset( $traveladvisor_var_video_title ) ? $traveladvisor_var_video_title : '';
		$traveladvisor_var_video_url = isset( $traveladvisor_var_video_url ) ? $traveladvisor_var_video_url : '';
		$traveladvisor_var_video_width = isset( $traveladvisor_var_video_width ) ? $traveladvisor_var_video_width : '500';
		$traveladvisor_var_video_height = isset( $traveladvisor_var_video_height ) ? $traveladvisor_var_video_height : '300';

		$video_url = '';
		$video_url = parse_url( $traveladvisor_var_video_url );
		$traveladvisor_iframe = '<' . 'i' . 'frame ';
		///// Column Class
		$column_class = '';
		if ( isset( $traveladvisor_var_column_size ) && $traveladvisor_var_column_size != '' ) {
			if ( function_exists( 'traveladvisor_var_custom_column_class' ) ) {
				$column_class = traveladvisor_var_custom_column_class( $traveladvisor_var_column_size );
			}
		}
		//////// Start Element Column CLass
		$video = '';
		if ( isset( $column_class ) && $column_class <> '' ) {
			$video .= '<div class="' . $column_class . '">';
		}

		//////// Start Video Element Content
		if ( $traveladvisor_var_video_title != '' ) {
			$video .= '<div class="cs-element-title"><h3>' . $traveladvisor_var_video_title . '</h3></div>';
		}
		if ( $traveladvisor_var_video_url != '' ) {
			if ( $video_url['host'] == $_SERVER["SERVER_NAME"] ) {
				$video .= '<figure  class="cs-video ' . $column_class . '">';
				$video .= '' . do_shortcode( '[video width="' . $traveladvisor_var_video_width . '" height="' . $traveladvisor_var_video_height . '" src="' . esc_url( $traveladvisor_var_video_url ) . '"][/video]' ) . '';
				$video .= '</figure>';
			} else {
				if ( $video_url['host'] == 'vimeo.com' ) {
					$content_exp = explode( "/", $traveladvisor_var_video_url );
					$content_vimo = array_pop( $content_exp );
					$video .= '<figure  class="cs-video ' . $column_class . '">';
					$video .= $traveladvisor_iframe . ' width="' . $traveladvisor_var_video_width . '" height="' . $traveladvisor_var_video_height . '" src="' . traveladvisor_server_protocol() . 'player.vimeo.com/video/' . $content_vimo . '" allowfullscreen></iframe>';
					$video .= '</figure>';
				} else {
					$video .= wp_oembed_get( $traveladvisor_var_video_url, array( 'width' => $traveladvisor_var_video_width ) );
				}
			}
		}

		//////// End Video Element Content
		//////// End Element Column CLass
		if ( isset( $column_class ) && $column_class <> '' ) {
			$video .= '</div>';
		}
		return $video;
	}

	if ( function_exists( 'traveladvisor_var_short_code' ) )
		traveladvisor_var_short_code( 'traveladvisor_video', 'traveladvisor_var_video' );
}

if ( !function_exists( 'traveladvisor_oembed_filter' ) ) {

	function traveladvisor_oembed_filter( $return, $data, $url ) {
		$return = str_replace( 'frameborder="0"', 'style="border: none"', $return );
		return $return;
	}

}
add_filter( 'oembed_dataparse', 'traveladvisor_oembed_filter', 90, 3 );
