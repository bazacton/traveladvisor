<?php

/*
 *
 * @Shortcode Name :   Start function for Clients shortcode/element front end view
 * @retrun
 *
 */
if (!function_exists('traveladvisor_clients_shortcode')) {

    function traveladvisor_clients_shortcode($atts, $content = null) {
        global $traveladvisor_var_blog_variables, $clients_style, $item_counter, $traveladvisor_var_clients_text, $post, $clients_section_title;
        $randomid = rand(1234, 7894563);
        $defaults = array(
            'traveladvisor_var_column_size' => '',
            'traveladvisor_var_clients_perslide' => '',
            //'clients_style' => '',
            'traveladvisor_var_clients_text' => '',
            'traveladvisor_clients_text_align' => '',
            'traveladvisor_var_clients_element_title' => '',
        );
        extract(shortcode_atts($defaults, $atts));
        $item_counter = 1;
        $traveladvisor_var_clients = '';
        $traveladvisor_var_clients_element_title = isset($traveladvisor_var_clients_element_title) ? $traveladvisor_var_clients_element_title : '';
        $traveladvisor_var_clients_perslide = isset($traveladvisor_var_clients_perslide) && $traveladvisor_var_clients_perslide != '' ? $traveladvisor_var_clients_perslide : 1;
        $clients_style = 'box_slider';
        $traveladvisor_var_clients_text = isset($traveladvisor_var_clients_text) ? $traveladvisor_var_clients_text : '';
        if (isset($traveladvisor_var_column_size) && $traveladvisor_var_column_size != '') {
            if (function_exists('traveladvisor_var_custom_column_class')) {
                $column_class = traveladvisor_var_custom_column_class($traveladvisor_var_column_size);
            }
        }
        if (function_exists('traveladvisor_enqueue_slick_script')) {
            traveladvisor_enqueue_slick_script();
        }
        if (isset($column_class) && $column_class <> '') {
            $traveladvisor_var_clients .= '<div class="row">';
            $traveladvisor_var_clients .= '<div class="' . esc_html($column_class) . '">';
        }
        if (isset($clients_style) && $clients_style == "box_slider") {
            $traveladvisor_var_clients .= '<div class="row">';
            if(isset($traveladvisor_var_clients_element_title) && $traveladvisor_var_clients_element_title!=''){
                $traveladvisor_var_clients .= '<div class ="cs-element-title">'; 
                $traveladvisor_var_clients .= '<h3>'.esc_html($traveladvisor_var_clients_element_title).'</h3>';
                $traveladvisor_var_clients .= '</div>';
            }
            $traveladvisor_var_clients .='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
            $traveladvisor_var_clients .='<ul class="cs-partner-slider" id="client-slider'.$randomid.'">';
            $traveladvisor_var_clients .= do_shortcode($content);
            $traveladvisor_var_clients .='</ul>';
            $traveladvisor_var_clients .='</div>';
            $traveladvisor_var_clients .='</div>';
        }
        if (isset($column_class) && $column_class <> '') {
            $traveladvisor_var_clients .= '</div>';
            $traveladvisor_var_clients .= '</div>';
        }
		
      /*  $traveladvisor_var_clients .= '<script>
     jQuery(document).ready(function () {
            jQuery("#client-slider'.$randomid.'").slick({
                infinite: true,
                slidesToShow: ' . $traveladvisor_var_clients_perslide . ',
                slidesToScroll: 1,
                autoplay: true,
                arrows: false,
                autoplaySpeed: 2000,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: false
                        }
                    },
                    {
                        breakpoint: 800,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // instead of a settings object
                ]
            });
                });</script>';
		 */
		 wp_add_inline_script( 'traveladvisor-inline-script', 'jQuery(document).ready(function(){ jQuery("#client-slider'.$randomid.'").slick({
                infinite: true,
                slidesToShow: ' . $traveladvisor_var_clients_perslide . ',
                slidesToScroll: 1,
                autoplay: true,
                arrows: false,
                autoplaySpeed: 2000,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: false
                        }
                    },
                    {
                        breakpoint: 800,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // instead of a settings object
                ]
            });});','before');
        return $traveladvisor_var_clients;
    }
	
   


    if (function_exists('traveladvisor_short_code')) {
        traveladvisor_short_code('traveladvisor_clients', 'traveladvisor_clients_shortcode');
    }
}
if (function_exists('traveladvisor_var_short_code'))traveladvisor_var_short_code('traveladvisor_clients', 'traveladvisor_clients_shortcode');
/*
 *
 * @Shortcode Name :  Start function for Testimonial Item shortcode/element front end view
 * @retrun
 *
 */
if (!function_exists('traveladvisor_clients_item')) {
    function traveladvisor_clients_item($atts, $content = null) {
        global $clients_style, $column_class, $item_counter, $clients_style, $traveladvisor_var_clients_text_color, $post;
        $defaults = array(
            'traveladvisor_var_clients_img_user_array' => '',
            'traveladvisor_var_clients_text' => '',
        );
     extract(shortcode_atts($defaults, $atts));
        $traveladvisor_var_clients_item = '';
        $clients_img_user = isset($traveladvisor_var_clients_img_user_array) ? $traveladvisor_var_clients_img_user_array : '';
        $traveladvisor_var_clients_text = isset($traveladvisor_var_clients_text) ? $traveladvisor_var_clients_text : '';
        $traveladvisor_var_clients_element_title = isset($traveladvisor_var_clients_element_title) ? $traveladvisor_var_clients_element_title : '';
        if (isset($clients_style) && $clients_style == "box_slider") {
            $traveladvisor_var_clients_item .= '<li ><a href="' . esc_url($traveladvisor_var_clients_text) . '">'
                    . '<img src="' . esc_url($clients_img_user) . '" alt="clients_img_user" /></a></li>';
        }
        $item_counter++;
        return $traveladvisor_var_clients_item;
    }
    if (function_exists('traveladvisor_short_code')) {
        traveladvisor_short_code('clients_item', 'traveladvisor_clients_item');
    }
}
if (function_exists('traveladvisor_var_short_code'))traveladvisor_var_short_code('clients_item', 'traveladvisor_clients_item');