<?php
/*
 * Remove wordpress 
 * default comment 
 * filter
 */
remove_filter('comment_form_field_comment', 'traveladvisor_filter_comment_form_field_comment', 10, 1);
remove_action('comment_form_logged_in_after', 'traveladvisor_comment_tut_fields');
remove_action('comment_form_after_fields', 'traveladvisor_comment_tut_fields');
/**
 * The template for 
 * product detail
 */
get_header();
$traveladvisor_page_sidebar_right = '';
$traveladvisor_page_sidebar_left = '';
$traveladvisor_var_layout = '';
$leftSidebarFlag = false;
$rightSidebarFlag = false;
$traveladvisor_var_layout = get_post_meta($post->ID, 'traveladvisor_var_page_layout', true);
$traveladvisor_sidebar_right = get_post_meta($post->ID, 'traveladvisor_var_page_sidebar_right', true);
$traveladvisor_sidebar_left = get_post_meta($post->ID, 'traveladvisor_var_page_sidebar_left', true);

if ($traveladvisor_var_layout == 'left') {
    $traveladvisor_var_layout = "col-lg-9 col-md-9 col-sm-12 col-xs-12";
    $leftSidebarFlag = true;
} else if ($traveladvisor_var_layout == 'right') {
    $traveladvisor_var_layout = "col-lg-9 col-md-9 col-sm-12 col-xs-12";
    $rightSidebarFlag = true;
} else {
    $traveladvisor_var_layout = "col-lg-12 col-md-12 col-sm-12 col-xs-12";
}
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <!-- .entry -header -->
        <div class="main-section"> 
            <div class="page-section" style=" margin-bottom:30px;">
                <div class="container">
                    <div class="row">
                        <?php if ($leftSidebarFlag == true) { ?>
                            <div class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <?php
                                if (is_active_sidebar(traveladvisor_get_sidebar_id($traveladvisor_sidebar_left))) {
                                    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($traveladvisor_sidebar_left)) : endif;
                                }
                                ?>
                            </div>
                        <?php } ?>

                        <div class="page-content <?php echo traveladvisor_allow_special_char($traveladvisor_var_layout) ?>">
                            <div class="cs-shop-wrap">
                                <?php
                                if (function_exists('woocommerce_content')) {
                                    woocommerce_content();
                                } 
                                ?>
                            </div>
                        </div>
                        <?php if ($rightSidebarFlag == true) { ?>
                            <div class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <?php
                                if (is_active_sidebar(traveladvisor_get_sidebar_id($traveladvisor_sidebar_right))) {
                                    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($traveladvisor_sidebar_right)) : endif;
                                }
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

    </main><!-- .Site Main start -->
</div><!-- .content-area -->
<?php get_footer(); ?>
