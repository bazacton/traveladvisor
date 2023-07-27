<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Traveladvisor
 * @since Traveladvisor 1.0
 */
get_header();
$var_arrays = array('post');
$args['posts_per_page'] = 2;
$search_global_vars = TRAVELADVISOR_VAR_GLOBALS()->globalizing($var_arrays);
extract($search_global_vars);
$traveladvisor_var_options = TRAVELADVISOR_VAR_GLOBALS()->theme_options();
if (isset($traveladvisor_var_options['traveladvisor_var_excerpt_length']) && $traveladvisor_var_options['traveladvisor_var_excerpt_length'] <> '') {

    $default_excerpt_length = $traveladvisor_var_options['traveladvisor_var_excerpt_length'];
} else {

    $default_excerpt_length = '60';
}
$traveladvisor_layout = isset($traveladvisor_var_options['traveladvisor_var_default_page_layout']) ? $traveladvisor_var_options['traveladvisor_var_default_page_layout'] : '';

$traveladvisor_default_sidebar = false;
if ($traveladvisor_layout == '') {
    $traveladvisor_default_sidebar = true;
}

if (isset($traveladvisor_layout) && ($traveladvisor_layout == "sidebar_left" || $traveladvisor_layout == "sidebar_right")) {
    $traveladvisor_col_class = "page-content col-lg-9 col-md-9 col-sm-12 col-xs-12";
} else if ($traveladvisor_default_sidebar == true) {
    $traveladvisor_col_class = "page-content col-lg-9 col-md-9 col-sm-12 col-xs-12";
}else {
    $traveladvisor_col_class = "page-content-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12";
}

$traveladvisor_sidebar = $traveladvisor_var_options['traveladvisor_var_default_layout_sidebar'];
$traveladvisor_blog_excerpt_theme_option = $traveladvisor_var_options['traveladvisor_var_excerpt_length'];

$traveladvisor_tags_name = 'post_tag';
$traveladvisor_categories_name = 'category';
$width = '290';
$height = '218';
$paged = isset($_GET['page_id_all']) ? $_GET['page_id_all'] : 1;

$count_posts = $GLOBALS['wp_query']->found_posts;
?>
<div class="main-section">
    <div class="page-section cs-zero-padding">
        <!-- Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">     
                <!--Left Side-bar Starts-->
                <?php
                if ($traveladvisor_layout == 'sidebar_left') {
                    if (is_active_sidebar(traveladvisor_get_sidebar_id($traveladvisor_sidebar))) {
                        echo '<div class="page-sidebar col-lg-3 col-md-3 col-sm-6 col-xs-12">';
                        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($traveladvisor_sidebar)) : endif;
                        echo '</div>';
                    }
                }
                ?>
                <!--Left Side-bar End-->
                <div class= "<?php echo esc_html($traveladvisor_col_class); ?>">
                    <div class="row">
                        <?php
                        if (have_posts()) :

                            while (have_posts()) : the_post();

                                /*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part('template/content-archive', get_post_format());

                            endwhile;
                            wp_reset_postdata();

                        endif;

                        $traveladvisor_current_page = 1;
                        if (isset($_GET['page_id_all'])) {
                            $traveladvisor_current_page = $_GET['page_id_all'];
                        }
                        $posts_per_page = get_option('posts_per_page');

                        if ($count_posts > 0 && $posts_per_page > 0 && $count_posts > $posts_per_page) {
                            $traveladvisor_pages = ceil($count_posts / $posts_per_page);

                            if (function_exists('traveladvisor_var_get_pagination')) {
                                echo traveladvisor_var_get_pagination($traveladvisor_pages, $traveladvisor_current_page, 'page_id_all');
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php
                if (isset($traveladvisor_layout) && $traveladvisor_layout == 'sidebar_right') {
                    if (is_active_sidebar(traveladvisor_get_sidebar_id($traveladvisor_sidebar))) {
                        echo '<div class="page-sidebar col-lg-3 col-md-3 col-sm-6 col-xs-12">';
                        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($traveladvisor_sidebar)) : endif;
                        echo '</div>';
                    }
                }  if (!is_active_sidebar(traveladvisor_get_sidebar_id($traveladvisor_sidebar)) && is_active_sidebar('sidebar-1')) {
                    echo '<div class="page-sidebar col-lg-3 col-md-3 col-sm-6 col-xs-12">';
                    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-1')) : endif;
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
