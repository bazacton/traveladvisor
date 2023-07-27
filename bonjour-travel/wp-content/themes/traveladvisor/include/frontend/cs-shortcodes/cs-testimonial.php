<?php

/*
 *
 * @Shortcode Name :   Start function for Testimonial shortcode/element front end view
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_testimonials_shortcode' ) ) {

	function traveladvisor_testimonials_shortcode( $atts, $content = null ) {
		global $column_class, $section_title, $post, $traveladvisor_var_testimonial_text_color, $traveladvisor_var_author_color;
		$randomid = rand( 0123, 9999 );
		$defaults = array( 'traveladvisor_var_column_size' => '', 'traveladvisor_var_author_color' => '', 'traveladvisor_var_testimonial_text' => '', 'traveladvisor_var_testimonial_element_title' => '', 'traveladvisor_var_testimonial_sub_title' => '' );
		extract( shortcode_atts( $defaults, $atts ) );
		$html = '';
		$section_title = '';
		$traveladvisor_var_testimonial_element_title = isset( $traveladvisor_var_testimonial_element_title ) ? $traveladvisor_var_testimonial_element_title : '';
		$traveladvisor_var_testimonial_text = isset( $traveladvisor_var_testimonial_text ) ? $traveladvisor_var_testimonial_text : '';
		$traveladvisor_var_author_color = isset( $traveladvisor_var_author_color ) ? $traveladvisor_var_author_color : '';
		$traveladvisor_var_testimonial_sub_title = isset( $traveladvisor_var_testimonial_sub_title ) ? $traveladvisor_var_testimonial_sub_title : '';
		$traveladvisor_var_column_size = isset( $traveladvisor_var_column_size ) ? $traveladvisor_var_column_size : '';
		if ( isset( $traveladvisor_var_column_size ) && $traveladvisor_var_column_size != '' ) {
			if ( function_exists( 'traveladvisor_var_custom_column_class' ) ) {
				$column_class = traveladvisor_var_custom_column_class( $traveladvisor_var_column_size );
			}
		}
		if ( isset( $column_class ) && $column_class <> '' ) {
			$html .= '<div class="' . $column_class . '">';
		}
		if ( isset( $traveladvisor_var_testimonial_element_title ) and $traveladvisor_var_testimonial_element_title <> '' ) {
			$html .= '<div class="cs-element-title">';
			$html .= '<h3>' . esc_html( $traveladvisor_var_testimonial_element_title ) . '</h3> ';
			if ( isset( $traveladvisor_var_testimonial_sub_title ) and $traveladvisor_var_testimonial_sub_title <> '' ) {
				$html .= '<span>' . $traveladvisor_var_testimonial_sub_title . '</span>';
			}
			$html .= '</div>';
		}
		if ( function_exists( 'traveladvisor_enqueue_slick_script' ) ) {
			traveladvisor_enqueue_slick_script();
		}
//  Start script for Testimonial slider view
		wp_add_inline_script( "traveladvisor-inline-script", "jQuery(document).ready(function () {if (jQuery('.cs-testimonial').length != '') {
                        $(document).ready(function () {
                            $('.cs-testimonial-slider').slick({
                                dots: true,
                                infinite: true,
                                speed: 300,
                                slidesToShow: 1,
                                arrows: false,
                                autoplay: true,
                                autoplaySpeed: 2000,
                            });
                        });
        
                    }});" );
		?>

		<?php

		$html .= '<div class="cs-testimonial">';
		$html .= '<ul class="cs-testimonial-slider" >';
		$html .= do_shortcode( $content );
		$html .= ' </ul>';
		$html .= ' </div>';
		if ( isset( $column_class ) && $column_class <> '' ) {
			$html .= ' </div>';
		}
		return $html;
	}

}
if ( function_exists( 'traveladvisor_var_short_code' ) )
	traveladvisor_var_short_code( 'traveladvisor_testimonial', 'traveladvisor_testimonials_shortcode' );
/*
 *
 * @Shortcode Name :  Start function for Testimonial Item shortcode/element front end view
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_testimonial_item' ) ) {

	function traveladvisor_testimonial_item( $atts, $content = null ) {
		global $column_class, $traveladvisor_var_testimonial_text_color, $post, $traveladvisor_var_author_color;
		$defaults = array( 'traveladvisor_var_testimonial_desigination' => '', 'traveladvisor_var_testimonial_title' => '', 'traveladvisor_var_testimonial_author' => '', 'traveladvisor_var_testimonial_position' => '', 'testimonial_img_user' => '' );
		extract( shortcode_atts( $defaults, $atts ) );
		$figure = '';
		$html = '';
		$traveladvisor_var_testimonial_desigination = isset( $traveladvisor_var_testimonial_desigination ) ? $traveladvisor_var_testimonial_desigination : '';
		$traveladvisor_var_testimonial_position = isset( $traveladvisor_var_testimonial_position ) ? $traveladvisor_var_testimonial_position : '';
		$traveladvisor_var_testimonial_author = isset( $traveladvisor_var_testimonial_author ) ? $traveladvisor_var_testimonial_author : '';
		$traveladvisor_var_testimonial_title = isset( $traveladvisor_var_testimonial_title ) ? $traveladvisor_var_testimonial_title : '';
		$author_company_color = '';
		if ( isset( $traveladvisor_var_author_color ) && $traveladvisor_var_author_color <> '' ) {
			$author_company_color = 'style="color:' . $traveladvisor_var_author_color . ' !important;"';
		}
		$html .='<li >';
		if ( isset( $traveladvisor_var_testimonial_title ) && $traveladvisor_var_testimonial_title <> '' ) {
			$html .='<h2><span class = "cs-color">' . $traveladvisor_var_testimonial_title . ' </span></h2>';
		}
		$html .='<p>' . do_shortcode( $content ) . '</p>';
		if ( isset( $traveladvisor_var_testimonial_author ) && $traveladvisor_var_testimonial_author <> '' ) {
			$html .='<h5 ' . $author_company_color . '>' . $traveladvisor_var_testimonial_author . '</h5>';
		}
		if ( isset( $traveladvisor_var_testimonial_desigination ) && $traveladvisor_var_testimonial_desigination <> '' ) {
			$html .='<small ' . $author_company_color . '>' . $traveladvisor_var_testimonial_desigination . '</small>';
		}
		$html .='</li >';
		return $html;
	}

}
if ( function_exists( 'traveladvisor_var_short_code' ) )
	traveladvisor_var_short_code( 'testimonial_item', 'traveladvisor_testimonial_item' );