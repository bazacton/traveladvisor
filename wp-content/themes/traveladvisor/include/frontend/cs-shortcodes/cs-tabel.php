<?php
/*
 *
 * @Shortcode Name :  tabel front end view
 * @retrun
 *
 */
if (!function_exists('traveladvisor_var_tabel_shortcode')) {
    function traveladvisor_var_tabel_shortcode($atts, $content = "") {
        $defaults = array(
            'traveladvisor_var_tabel_title' => '',
                   'traveladvisor_var_column_size' => '',
        );
        extract(shortcode_atts($defaults, $atts));
           $column_class = '';
        if (isset($traveladvisor_var_column_size) && $traveladvisor_var_column_size != '') {
            if (function_exists('traveladvisor_var_custom_column_class')) {
                $column_class = traveladvisor_var_custom_column_class($traveladvisor_var_column_size);
            }
        }
        $traveladvisor_var_tabel_title = isset($traveladvisor_var_tabel_title) ? $traveladvisor_var_tabel_title : '';
        $html = '';
        $traveladvisor_section_title = '';
        $traveladvisor_section_sub_title = '';
        if (isset($traveladvisor_var_tabel_title) && trim($traveladvisor_var_tabel_title) <> '') {
            if($column_class !=''){
                 $traveladvisor_section_title .='<div class="'.$column_class.'">';
            }
             $traveladvisor_section_title .= ' <div class="element-heading left" >';
                            $traveladvisor_section_title .= '<h3>' . esc_html($traveladvisor_var_tabel_title) . '</h3>';
                                $traveladvisor_section_title.= '</div>';
        }
        $html .= $traveladvisor_section_title;
               	$html .= ' <div class="cs-shortcode-table">';
                                	$html .= '<div class="cs-table-responsive">';
                                		$html .= '<table>';
                                    	$html .= '<thead>';
                                                        $html .= '<tr>';
                                            	$html .= '<th>' . __('Quick facts', 'traveladvisor') . '</th>';
                                                $html .= '<th>' . __('Net Price', 'traveladvisor') . '</th>';
                                                $html .= '<th>' . __('Discount', 'traveladvisor') . '</th>';
                                                $html .= '<th>' . __('Price','traveladvisor') . '</th>';
                                            $html .= '</tr>';
                                        $html .= ' </thead>';
                                        $html .= '  <tbody>';
                                         
                                         $html .= do_shortcode($content);
                                        $html .= '</tbody>';
                                    $html .= '</table>';
                                    $html .= '</div>';
                                $html .= '</div>';
                                if($column_class !=''){
                                       $html .= '</div>';
                                }

        return do_shortcode($html);
    }
}
if (function_exists('traveladvisor_var_short_code'))traveladvisor_var_short_code('traveladvisor_tabel', 'traveladvisor_var_tabel_shortcode');

/*
 *
 * @List  Item  shortcode/element front end view
 * @retrun
 *
 */
if (!function_exists('traveladvisor_var_tabel_item_shortcode')) {
    function traveladvisor_var_tabel_item_shortcode($atts, $content = "") {
        global $post, $traveladvisor_var_tabel_column, $tabel_content;
        $output = '';
         global $tabel_content;
        $defaults = array(
            'traveladvisor_var_tabel_net_price' => '',
            'traveladvisor_var_tabel_discount_price' => '',
            'traveladvisor_var_tabel_price' => '',
            'traveladvisor_var_tabel_fact' => ''
        );
        extract(shortcode_atts($defaults, $atts));
        $traveladvisor_var_tabel_column_str = '';
        if ($traveladvisor_var_tabel_column != 12) {
            $traveladvisor_var_tabel_column_str = 'class = "col-md-' . esc_html($traveladvisor_var_tabel_column) . '"';
        }
         $traveladvisor_var_tabel_net_price = isset($traveladvisor_var_tabel_net_price) ? $traveladvisor_var_tabel_net_price : '';
         $traveladvisor_var_tabel_discount_price = isset($traveladvisor_var_tabel_discount_price) ? $traveladvisor_var_tabel_discount_price : '';
         $traveladvisor_var_tabel_price = isset($traveladvisor_var_tabel_price) ? $traveladvisor_var_tabel_price : '';
         $traveladvisor_var_tabel_fact = isset($traveladvisor_var_tabel_fact) ? $traveladvisor_var_tabel_fact : '';
      //currency
         $traveladvisor_var_options = TRAVELADVISOR_VAR_GLOBALS()->theme_options();
         $traveladvisor_var_currency=$traveladvisor_var_options['traveladvisor_var_currency_sign'];
         $activeClass="";
         if( $traveladvisor_var_tabel_fact == 'Yes')
         {
            $activeClass= 'active in';
         }
        $fa_icon = '';
        if ($traveladvisor_var_tabel_discount_price) {
            $fa_icon = '<i class="' . sanitize_html_class($traveladvisor_var_tabel_discount_price) . '"></i> ';
        }
        $randid = rand(877, 9999);
        $output .= '<tr>';
        $output .= '<td>'.esc_html($traveladvisor_var_tabel_fact).'</td>';
        $output .= '<td>'.esc_html($traveladvisor_var_currency).esc_html($traveladvisor_var_tabel_net_price).'</td>';
        $output .= '<td>'.esc_html($traveladvisor_var_currency).esc_html($traveladvisor_var_tabel_discount_price).'</td>';
        $output .= '<td>'.esc_html($traveladvisor_var_currency).esc_html($traveladvisor_var_tabel_price).'</td>';       
          $output .= '</tr>';
        return $output;
    }
}
if (function_exists('traveladvisor_var_short_code'))traveladvisor_var_short_code('traveladvisor_tabel_item', 'traveladvisor_var_tabel_item_shortcode');
?>