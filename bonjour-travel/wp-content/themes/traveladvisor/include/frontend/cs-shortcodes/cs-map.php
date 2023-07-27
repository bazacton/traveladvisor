<?php

/*
 *
 * @Shortcode Name : Start function for Map shortcode/element front end view
 * @retrun
 *
 */
if ( ! function_exists( 'traveladvisor_var_map_shortcode' ) ) {

    function traveladvisor_var_map_shortcode( $atts, $content = "" ) {
        global $header_map, $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
        $defaults = array(
            'traveladvisor_var_column_size' => '',
            'traveladvisor_var_map_title' => '',
            'traveladvisor_var_map_height' => '',
            'traveladvisor_var_map_lat' => '40.7143528',
            'traveladvisor_var_map_lon' => '-74.0059731',
            'traveladvisor_var_map_zoom' => '11',
            'traveladvisor_var_map_type' => '.ROADMAP',
            'traveladvisor_var_map_info' => '',
            'traveladvisor_var_map_marker_icon' => '',
            'traveladvisor_var_map_show_marker' => 'true',
            'traveladvisor_var_map_controls' => 'false',
            'traveladvisor_var_map_draggable' => 'true',
            'traveladvisor_var_map_scrollwheel' => 'true',
            'traveladvisor_var_map_border' => '',
            'traveladvisor_var_map_border_color' => '',
            'traveladvisor_map_style' => '',
            'traveladvisor_map_class' => '',
            'traveladvisor_map_directions' => 'off'
        );
        extract( shortcode_atts( $defaults, $atts ) );
        $traveladvisor_var_options = TRAVELADVISOR_VAR_GLOBALS()->theme_options();
        $traveladvisor_var_column_size = isset( $traveladvisor_var_column_size ) ? $traveladvisor_var_column_size : '';
        $traveladvisor_var_map_title = isset( $traveladvisor_var_map_title ) ? $traveladvisor_var_map_title : '';
        $traveladvisor_var_map_height = isset( $traveladvisor_var_map_height ) ? $traveladvisor_var_map_height : '';
        $traveladvisor_var_map_lat = isset( $traveladvisor_var_map_lat ) ? $traveladvisor_var_map_lat : '';
        $traveladvisor_var_map_lon = isset( $traveladvisor_var_map_lon ) ? $traveladvisor_var_map_lon : '';
        $traveladvisor_var_map_zoom = isset( $traveladvisor_var_map_zoom ) ? $traveladvisor_var_map_zoom : '';
        $traveladvisor_var_map_type = isset( $traveladvisor_var_map_type ) ? $traveladvisor_var_map_type : '';
        $traveladvisor_var_map_info = isset( $traveladvisor_var_map_info ) ? $traveladvisor_var_map_info : '';
        $traveladvisor_var_map_marker_icon = isset( $traveladvisor_var_map_marker_icon ) ? $traveladvisor_var_map_marker_icon : '';
        $traveladvisor_var_map_show_marker = isset( $traveladvisor_var_map_show_marker ) ? $traveladvisor_var_map_show_marker : '';
        $traveladvisor_var_map_controls = isset( $traveladvisor_var_map_controls ) ? $traveladvisor_var_map_controls : '';
        $traveladvisor_var_map_draggable = isset( $traveladvisor_var_map_draggable ) ? $traveladvisor_var_map_draggable : '';
        $traveladvisor_var_map_scrollwheel = isset( $traveladvisor_var_map_scrollwheel ) ? $traveladvisor_var_map_scrollwheel : '';
        $traveladvisor_var_map_border = isset( $traveladvisor_var_map_border ) ? $traveladvisor_var_map_border : '';
        $traveladvisor_var_map_border_color = isset( $traveladvisor_var_map_border_color ) ? $traveladvisor_var_map_border_color : '';
        if ( isset( $traveladvisor_var_map_height ) && $traveladvisor_var_map_height == '' ) {
            $traveladvisor_var_map_height = '500';
        }
        $column_class = '';
        if ( $header_map ) {
            $header_map = false;
        } else {
            if ( isset( $traveladvisor_var_column_size ) && $traveladvisor_var_column_size != '' ) {
                if ( function_exists( 'traveladvisor_var_custom_column_class' ) ) {
                    $column_class = traveladvisor_var_custom_column_class( $traveladvisor_var_column_size );
                }
            }
        }
        $section_title = '';
        if ( $traveladvisor_var_map_title && trim( $traveladvisor_var_map_title ) != '' ) {
            $section_title = '<div class="cs-element-title"><h3>' . $traveladvisor_var_map_title . '</h3></div>';
        }
        $map_dynmaic_no = rand( 6548, 9999999 );
        if ( $traveladvisor_var_map_show_marker == "true" ) {
            $traveladvisor_var_map_show_marker = " var marker = new google.maps.Marker({
                        position: myLatlng" . $map_dynmaic_no . ",
                        map: map,
                        title: '',
                        icon: '" . $traveladvisor_var_map_marker_icon . "',
                        shadow: ''
                    });
            ";
        } else {
            $traveladvisor_var_map_show_marker = "var marker = new google.maps.Marker({
                        position: myLatlng" . $map_dynmaic_no . ",
                        map: map,
                        title: '',
                        icon: '',
                        shadow: ''
                    });";
        }
        $border = '';
        if ( isset( $traveladvisor_var_map_border ) && $traveladvisor_var_map_border == 'yes' && $traveladvisor_var_map_border_color != '' ) {
            $border = 'border:1px solid ' . $traveladvisor_var_map_border_color . '; ';
        }
        traveladvisor_enqueue_google_map();
        $html = '';
        $html .= '<div class="' . $column_class . '">';
        $html .= $section_title;
        $html .= '<div class="clear"></div>';
        $html .= '<div class="cs-map-section" style="' . $border . ';">';
        $html .= '<div class="cs-map">';
        $html .= '<div class="cs-map-content">';
        $html .= '<div class="mapcode iframe mapsection gmapwrapp" id="map_canvas' . $map_dynmaic_no . '" style="height:' . $traveladvisor_var_map_height . 'px;"> </div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= "<script type='text/javascript'>
                    function initialize" . $map_dynmaic_no . "() {
                    var myLatlng" . $map_dynmaic_no . " = new google.maps.LatLng(" . $traveladvisor_var_map_lat . ", " . $traveladvisor_var_map_lon . ");
                    var mapOptions = {
                        zoom: " . $traveladvisor_var_map_zoom . ",
                        scrollwheel: " . $traveladvisor_var_map_scrollwheel . ",
                        draggable: " . $traveladvisor_var_map_draggable . ",
                        streetViewControl: false,
                        center: myLatlng" . $map_dynmaic_no . ",
                        mapTypeId: google.maps.MapTypeId." . $traveladvisor_var_map_type . ",
                        disableDefaultUI:'" . $traveladvisor_var_map_controls . "'
                    };";
        $traveladvisor_var_def_map_style = isset( $traveladvisor_var_options['traveladvisor_var_def_map_style'] ) ? $traveladvisor_var_options['traveladvisor_var_def_map_style'] : 'map-box';
        
        $html .= "var map = new google.maps.Map(document.getElementById('map_canvas" . $map_dynmaic_no . "'), mapOptions);";
        $html .= '
                var style= "'.$traveladvisor_var_def_map_style.'";
                if (style != "") {
                    var styles = traveladvisor_map_select_style(style);
                    
                    if (styles != "") {
                        var styledMap = new google.maps.StyledMapType(styles,
                                {name: "Styled Map"});
                        map.mapTypes.set("map_style", styledMap);
                        map.setMapTypeId("map_style");
                    }
                }
                 var map_contentString = "<div class=\"automobile-tooltip-content\">"+    
                            "' . $traveladvisor_var_map_info . '"    
                            "</div>";
                var infowindow = new google.maps.InfoWindow({
                    content: "' . $traveladvisor_var_map_info . '",
                });
                ' . $traveladvisor_var_map_show_marker . '
                    if (infowindow.content != ""){
                      infowindow.open(map, marker);
                       map.panBy(1,-60);
                       google.maps.event.addListener(marker, "click", function(event) {
                        infowindow.open(map, marker);
                       });
                    }
                }
                jQuery(document).ready(function(){
                    google.maps.event.addDomListener(window, "load", initialize' . $map_dynmaic_no . ');
                });
                </script>';
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }

}
if ( function_exists( 'traveladvisor_var_short_code' ) )
    traveladvisor_var_short_code( 'traveladvisor_map', 'traveladvisor_var_map_shortcode' );
