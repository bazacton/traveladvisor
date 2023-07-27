<?php

/*
 *
 * @Shortcode Name :  Start function for Multiple Service shortcode/element front end view
 * @retrun
 *
 */

if ( !function_exists( 'traveladvisor_var_multiple_team_shortcode' ) ) {

	function traveladvisor_var_multiple_team_shortcode( $atts, $content = "" ) {
		global $post, $traveladvisor_var_multi_service_column, $traveladvisor_var_link_url;
		$defaults = array(
			'traveladvisor_var_column_size' => '1/1',
			'traveladvisor_var_multi_team_title' => '',
			'traveladvisor_var_multi_team_sub_title' => '',
			'traveladvisor_var_service_content_align' => '',
			'traveladvisor_var_multi_service_column' => '',
		);

		extract( shortcode_atts( $defaults, $atts ) );
		$traveladvisor_var_column_size = isset( $traveladvisor_var_column_size ) ? $traveladvisor_var_column_size : '';
		$traveladvisor_var_multi_team_title = isset( $traveladvisor_var_multi_team_title ) ? $traveladvisor_var_multi_team_title : '';
		$traveladvisor_var_multi_team_sub_title = isset( $traveladvisor_var_multi_team_sub_title ) ? $traveladvisor_var_multi_team_sub_title : '';
		$traveladvisor_var_multi_service_column = isset( $traveladvisor_var_multi_service_column ) ? $traveladvisor_var_multi_service_column : '';
		$traveladvisor_var_link_url = isset( $traveladvisor_var_link_url ) ? $traveladvisor_var_link_url : '';


		if ( $traveladvisor_var_multi_service_column <> '' ) {
			$traveladvisor_var_multi_service_column = 12 / $traveladvisor_var_multi_service_column;
		} else {
			$traveladvisor_var_multi_service_column = 4;
		}
		$column_class = '';

//        if (isset($traveladvisor_var_column_size) && $traveladvisor_var_column_size != '') {
//            if (function_exists('traveladvisor_var_custom_column_class')) {
//                $column_class = traveladvisor_var_custom_column_class($traveladvisor_var_column_size);
//            }
//        }
		$traveladvisor_section_title = '';
		$html = '';
		$randomid = rand( 01234, 9999 );


		$traveladvisor_section_title = '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="cs-directors">';
		$traveladvisor_section_title .= '<h3>' . esc_attr( $traveladvisor_var_multi_team_title ) . '</h3>';

		$traveladvisor_section_title .= '</div></div>';


		$html .= $traveladvisor_section_title;

		$html .= do_shortcode( $content );
		// $html .= '</div>';


		return do_shortcode( $html );
	}

	if ( function_exists( 'traveladvisor_short_code' ) ) {
		traveladvisor_short_code( 'multi_team', 'traveladvisor_var_multiple_team_shortcode' );
	}
}
if ( function_exists( 'traveladvisor_var_short_code' ) )
	traveladvisor_var_short_code( 'multi_team', 'traveladvisor_var_multiple_team_shortcode' );

/*
 *
 * @Multiple  Start function for Multiple Service Item  shortcode/element front end view
 * @retrun
 *
 */

if ( !function_exists( 'traveladvisor_var_multiple_team_item_shortcode' ) ) {

	function traveladvisor_var_multiple_team_item_shortcode( $atts, $content = "" ) {
		$defaults = array(
			'traveladvisor_var_column_size' => '',
			'traveladvisor_var_team_title' => '',
			'traveladvisor_var_team_designation' => '',
			'traveladvisor_var_team_img_array' => '',
			'traveladvisor_var_team_view' => '',
			'traveladvisor_var_team_image_place' => '',
			'traveladvisor_var_team_facebook' => '',
			'traveladvisor_var_team_twitter' => '',
			'traveladvisor_var_team_google' => '',
			'traveladvisor_var_team_mail' => '',
			'traveladvisor_var_team_description' => '',
			'traveladvisor_var_team_desc' => '',
			'traveladvisor_var_team_excerpt' => '',
			'traveladvisor_var_team_excerpt_length' => ''
		);

		global $post, $traveladvisor_var_multi_team_column, $traveladvisor_var_link_url;
		extract( shortcode_atts( $defaults, $atts ) );
		$html = '';

		$traveladvisor_var_column_size = isset( $traveladvisor_var_column_size ) ? $traveladvisor_var_column_size : '';
		$traveladvisor_var_team_title = isset( $traveladvisor_var_team_title ) ? $traveladvisor_var_team_title : '';
		$traveladvisor_var_team_designation = isset( $traveladvisor_var_team_designation ) ? $traveladvisor_var_team_designation : '';
		$traveladvisor_var_team_img_array = isset( $traveladvisor_var_team_img_array ) ? $traveladvisor_var_team_img_array : '';
		$traveladvisor_var_team_image_place = isset( $traveladvisor_var_team_image_place ) ? $traveladvisor_var_team_image_place : '';
		$traveladvisor_var_team_facebook = isset( $traveladvisor_var_team_facebook ) ? $traveladvisor_var_team_facebook : '';
		$traveladvisor_var_team_twitter = isset( $traveladvisor_var_team_twitter ) ? $traveladvisor_var_team_twitter : '';
		$traveladvisor_var_team_google = isset( $traveladvisor_var_team_google ) ? $traveladvisor_var_team_google : '';
		$traveladvisor_var_team_mail = isset( $traveladvisor_var_team_mail ) ? $traveladvisor_var_team_mail : '';
		$traveladvisor_var_team_description = isset( $traveladvisor_var_team_description ) ? $traveladvisor_var_team_description : '';
		$traveladvisor_var_team_desc = isset( $traveladvisor_var_team_desc ) ? $traveladvisor_var_team_desc : '';
		$traveladvisor_var_team_view = isset( $traveladvisor_var_team_view ) ? $traveladvisor_var_team_view : '';
		$traveladvisor_var_team_excerpt_length = isset( $traveladvisor_var_team_excerpt_length ) ? $traveladvisor_var_team_excerpt_length : '';
		$traveladvisor_var_team_excerpt = isset( $traveladvisor_var_team_excerpt ) ? $traveladvisor_var_team_excerpt : '';

		if ( 'team_fancy' == $traveladvisor_var_team_view ) {

			$html .= '<div id="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="cs-team classic ' . $traveladvisor_var_team_image_place . '">';
			$html .= '  <div class="cs-media"> <figure>'
					. '<a href="' . $traveladvisor_var_link_url . '" style="display:block; text-align:center;">'
					. '<img src="' . $traveladvisor_var_team_img_array . '">'
					. '</a>'
					. '</figure></div>';
			$html .= '<div class="cs-text  left">';
			$html .= '<h3><a href="#">' . $traveladvisor_var_team_title . '</a></h3>';
			$html .= '<span >' . do_shortcode( $content ) . '</span>';
			$html .= preg_replace( "/<span[^>]+?[^>]+>|<\/span>/", "", $traveladvisor_var_team_description );
			$html .= '<ul class="social-media">';
			if ( $traveladvisor_var_team_facebook != '' ) {
				$html .= '<li><a data-toggle="tooltip" data-original-title="facebook" href="' . $traveladvisor_var_team_facebook . '" ><i class="icon-facebook"></i></a></li>';
			}
			if ( $traveladvisor_var_team_twitter != '' ) {
				$html .= '<li><a data-toggle="tooltip" data-original-title="facebook" href="' . $traveladvisor_var_team_twitter . '" ><i class="icon-facebook"></i></a></li>';
			}
			if ( $traveladvisor_var_team_google != '' ) {
				$html .= '<li><a data-toggle="tooltip" data-original-title="facebook" href="' . $traveladvisor_var_team_google . '" ><i class="icon-facebook"></i></a></li>';
			}
			if ( $traveladvisor_var_team_mail != '' ) {
				$html .= '<li><a data-toggle="tooltip" data-original-title="facebook" href="' . $traveladvisor_var_team_mail . '" ><i class="icon-facebook"></i></a></li>';
			}

			$html .= '</ul>';


			$html .= '</div></div></div>';
		} elseif ( 'team_simple' == $traveladvisor_var_team_view ) {



			$html .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
								<div class="cs-team-directors">
									<div class="cs-media">
										<figure>
										    <a href="' . $traveladvisor_var_link_url . '"><img src="' . $traveladvisor_var_team_img_array . '" alt="traveladvisor_var_team_img_array"></a>
										    <figcaption></figcaption>
										</figure>
									</div>
									<div class="cs-text">
										<h6><a href="#">' . $traveladvisor_var_team_title . '</a></h6>
										<span>Tour Agent</span>
									</div>
								</div>
							</div>';
		} else {


			$html .='<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        	<div class="cs-team grid">
                            	<div class="cs-media">
                                	<figure>
                                    	<a href="' . $traveladvisor_var_link_url . '"><img alt="traveladvisor_var_team_img_array" src="' . $traveladvisor_var_team_img_array . '"></a>
                                        <figcaption></figcaption>
                                    </figure>
                            	</div>
                                <div class="cs-text">
                                    <h4>' . $traveladvisor_var_team_title . '</h4>
                                    <span>' . $traveladvisor_var_team_designation . '</span>
                                </div>
                                <ul class="social-media">
                                    <li><a href="' . $traveladvisor_var_team_facebook . '" data-toggle="tooltip" title="Facebook" data-original-title="Facebook">
                                        <i data-origanal-title="facebook" class="icon-facebook"></i></a></li>
                                    <li><a href="' . $traveladvisor_var_team_twitter . '" data-toggle="tooltip" title="Twitter" data-original-title="Twitter">
                                        <i data-origanal-title="twitter" class="icon-twitter"></i></a></li>
                                    <li><a href="' . $traveladvisor_var_team_twitter . '" data-toggle="tooltip" title="Mail" data-original-title="Mail">
                                        <i data-origanal-title="email" class="icon-mail_outline"></i></a></li>
                                </ul>
                            </div>
                        </div>';
		}






		return do_shortcode( $html );
	}

	if ( function_exists( 'traveladvisor_short_code' ) ) {
		traveladvisor_short_code( 'multiple_team_item', 'traveladvisor_var_multiple_team_item_shortcode' );
	}
}
if ( function_exists( 'traveladvisor_var_short_code' ) )
	traveladvisor_var_short_code( 'multiple_team_item', 'traveladvisor_var_multiple_team_item_shortcode' );
?>