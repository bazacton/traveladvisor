<?php
/**
 * Shop Archive
 */
$var_arrays = array('post', 'traveladvisor_var_options');
$page_global_vars = TRAVELADVISOR_VAR_GLOBALS()->globalizing($var_arrays);
extract($page_global_vars);

$traveladvisor_layout = isset($traveladvisor_var_options['traveladvisor_var_woo_archive_layout']) ? $traveladvisor_var_options['traveladvisor_var_woo_archive_layout'] : '';
if ($traveladvisor_layout == "sidebar_left" || $traveladvisor_layout == "sidebar_right") {
    $traveladvisor_col_class = "page-content col-lg-9 col-md-9 col-sm-12 col-xs-12";
} else {
    $traveladvisor_col_class = "page-content-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12";
}
$traveladvisor_sidebar = isset($traveladvisor_var_options['traveladvisor_var_woo_archive_sidebar']) ? $traveladvisor_var_options['traveladvisor_var_woo_archive_sidebar'] : '';

?>   

<div class="main-section">
    <div class="page-section">
        <!-- Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <?php if ($traveladvisor_layout == 'sidebar_left') { ?>
                    <div class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <?php
                        if (is_active_sidebar(traveladvisor_get_sidebar_id($traveladvisor_sidebar))) {
                            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($traveladvisor_sidebar)) : endif;
                        }
                        ?>
                    </div>
                <?php } ?>
                
                <div class="<?php echo esc_html($traveladvisor_col_class); ?>">
                    <?php
                    if (function_exists('woocommerce_content')) {
                        woocommerce_content();
                    }
                    ?>
                </div>
                <?php if ($traveladvisor_layout == 'sidebar_right') { ?>
                    <div class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php
                    if (is_active_sidebar(traveladvisor_get_sidebar_id($traveladvisor_sidebar))) {
                        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($traveladvisor_sidebar)) : endif;
                    }
                    ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>