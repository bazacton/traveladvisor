<?php
$var_arrays = array('traveladvisor_page_option');
$theme_option_array_global_vars = TRAVELADVISOR_VAR_GLOBALS()->globalizing($var_arrays);
extract($theme_option_array_global_vars);

$home_demo = traveladvisor_var_get_demo_content('home.json');

$strings = new traveladvisor_theme_all_strings;
$strings -> traveladvisor_theme_option_strings();

$traveladvisor_page_option[] = array();
$traveladvisor_page_option['theme_options'] = array(
    'select' => array(
        'home' => traveladvisor_var_theme_text_srt('traveladvisor_var_demo'),
    ),
    'home' => array(
        'name' => traveladvisor_var_theme_text_srt('traveladvisor_var_demo'),
        'page_slug' => 'home',
        'theme_option' => $home_demo,
        'thumb' => 'Import-Dummy-Data'
    ),
);
