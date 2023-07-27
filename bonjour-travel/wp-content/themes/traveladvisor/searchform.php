<?php
/**
 * Template for displaying search forms in Traveladvisor
 *
 * @package WordPress
 * @subpackage Traveladvisor
 * @since Traveladvisor
 */
$var_arrays = array('traveladvisor_var_form_fields');
$search_form_global_vars = TRAVELADVISOR_VAR_GLOBALS()->globalizing($var_arrays);
extract($search_form_global_vars);
$strings = new traveladvisor_theme_all_strings;
$strings->traveladvisor_short_code_strings();
$traveladvisor_search_form_placeholder = traveladvisor_var_theme_text_srt('traveladvisor_var_header_search_placeholder2');
$traveladvisor_search_form_search_for_text = traveladvisor_var_theme_text_srt('traveladvisor_var_search_for_text');
$traveladvisor_search_form_search_btn = traveladvisor_var_theme_text_srt('traveladvisor_var_search_btn');
?>
<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="input-holder"> <i class="icon-search2"> </i>
        <?php
        $traveladvisor_opt_array = array(
            'std' => esc_html(get_search_query()),
            'cust_id' => 'cs-search-field',
            'cust_name' => 's',
            'classes' => '',
            'cust_type' => 'search',
            'extra_atr' => 'placeholder="' . esc_attr($traveladvisor_search_form_placeholder) . '" title="' . esc_attr($traveladvisor_search_form_search_for_text) . '"',
        );
        $traveladvisor_var_form_fields->traveladvisor_var_form_text_render($traveladvisor_opt_array);
        ?>
        <input type="submit" value="<?php echo esc_html($traveladvisor_search_form_search_btn); ?>">
    </div>
</form>