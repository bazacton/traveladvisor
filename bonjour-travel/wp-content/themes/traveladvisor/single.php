<?php
/**
 * The template for displaying all single posts and attachments
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
if (!get_option('traveladvisor_var_options') && is_active_sidebar('sidebar-1')) {
    $traveladvisor_var_layout = "col-lg-9 col-md-9 col-sm-12 col-xs-12";
    $traveladvisor_def_sidebar = 'sidebar-1';
}
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <!-- .entry -header -->
        <div class="main-section"> 
            <div class="page-section">
                <div class="container">
                    <div class="row">
                        <?php
                        if ($leftSidebarFlag == true) {
                            if (is_active_sidebar(traveladvisor_get_sidebar_id($traveladvisor_sidebar_left))) {
                                ?>
                                <div class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <?php
                                    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($traveladvisor_sidebar_left)) : endif;
                                    ?>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <div class="page-content blog-detail <?php echo traveladvisor_allow_special_char($traveladvisor_var_layout) ?>">
                            <?php
                            // Start the loop.
                            $traveladvisor_var_post_type = '';
                            while (have_posts()) : the_post();
                                $traveladvisor_var_post_type = get_post_type();
                                // Include the single post content template.
                                if ($traveladvisor_var_post_type <> '' && $traveladvisor_var_post_type == 'post') {
                                    get_template_part('template/blog-single', 'single');
                                }
                            // End of the loop.
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                        <?php
                        if ($rightSidebarFlag == true) {
                            if (is_active_sidebar(traveladvisor_get_sidebar_id($traveladvisor_sidebar_right))) {
                                ?>
                                <div class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <?php
                                    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($traveladvisor_sidebar_right)) : endif;
                                    ?>
                                </div>
                                <?php
                            }
                        } if (is_active_sidebar('sidebar-1')) {
                            echo '<div class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">';
                            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-1')) : endif;
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main><!-- .Site Main start -->
</div><!-- .content-area -->
<?php get_footer(); ?>