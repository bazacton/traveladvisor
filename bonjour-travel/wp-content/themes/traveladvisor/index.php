<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Traveladvisor
 * @since Traveladvisor
 */
get_header();
$var_arrays = array('post', 'current_user', 'traveladvisor_user', 'traveladvisor_num');
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
} else {
    $traveladvisor_col_class = "page-content-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12";
}


$strings = new traveladvisor_theme_all_strings;
$strings->traveladvisor_theme_option_strings();


$traveladvisor_sidebar = isset($traveladvisor_var_options['traveladvisor_var_default_layout_sidebar']) ? $traveladvisor_var_options['traveladvisor_var_default_layout_sidebar'] : '';
$traveladvisor_blog_excerpt_theme_option = isset($traveladvisor_var_options['traveladvisor_var_excerpt_length']) ? $traveladvisor_var_options['traveladvisor_var_excerpt_length'] : '255';

$traveladvisor_tags_name = 'post_tag';
$traveladvisor_categories_name = 'category';
$width = '290';
$height = '218';
?><div class="main-section">
    <div class="page-section cs-zero-padding">
        <!-- Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">     
                <!--Left Side-bar Starts-->
                <?php
                if ($traveladvisor_layout == 'sidebar_left') {
                    if (is_active_sidebar(traveladvisor_get_sidebar_id($traveladvisor_sidebar))) {
                        ?>
                        <div class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <?php
                            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($traveladvisor_sidebar)) : endif;
                            ?>
                        </div>
                        <?php
                    }
                }
                ?>
                <!-- Left Side-bar End -->
                <!-- Page Detail Start -->
                <div class="<?php echo esc_html($traveladvisor_col_class); ?>">
                    <div class="row">
					 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php
                        $traveladvisor_cat_name = isset($_GET['cat']) ? $_GET['cat'] : '';
                        $traveladvisor_post_title = isset($_GET['s']) ? $_GET['s'] : '';
                        $paged = isset($_GET['page_id_all']) ? $_GET['page_id_all'] : 1;
                        $posts_per_page = get_option('posts_per_page');

                        $args = array('post_type' => 'post',
                            'search_title' => $traveladvisor_post_title,
                            'posts_per_page' => $posts_per_page,
                            'paged' => $paged,
                        );
                        if (isset($traveladvisor_cat_name) && $traveladvisor_cat_name != "") {
                            $args['tax_query'] = array(
                                array(
                                    'taxonomy' => 'category',
                                    'field' => 'slug',
                                    'terms' => $traveladvisor_cat_name,
                                )
                            );
                        }
                        $traveladvisor_total = 0;
                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            while ($query->have_posts()) : $query->the_post();
                                $traveladvisor_var_custom_image_url = get_user_meta(get_the_author_meta('ID'), 'user_avatar_display', true);
                                // global $current_user, $traveladvisor_user, $traveladvisor_num;
                                $traveladvisor_user = $current_user->user_login . "\n";
                                $traveladvisor_title = get_the_title();
                                $traveladvisor_content = get_the_content();
                                $traveladvisor_date = get_the_date();
                                ?>

                                <div class="cs-blog blog-medium">
                                    <div class="cs-media">
                                        <figure><a href="<?php echo esc_html(get_the_permalink()); ?>"><?php the_post_thumbnail('traveladvisor_var_media_2'); ?> </a></figure>
                                    </div>
                                    <div class="blog-text">
                                        <?php
                                        if (isset($traveladvisor_title) && $traveladvisor_title != "") {
                                            ?>
                                            <div class="post-title">
                                                <h3><a href="<?php the_permalink(); ?>"><?php echo esc_html($traveladvisor_title); ?></a></h3>
                                            </div>
                                        <?php }
                                        ?>
                                        <div class="post-option">
                                            <?php
                                            if (isset($traveladvisor_user) && $traveladvisor_user != "") {
                                                ?>
                                                <span class="post-by"><?php echo esc_html($traveladvisor_user); ?></span>
                                            <?php } ?>
                                            <?php
                                            $traveladvisor_var_categories_list = get_the_term_list(get_the_id(), 'category', '', ', ', '');
                                            if (isset($traveladvisor_var_categories_list)) {
                                                ?>
                                                <span>
                                                    <?php
                                                    printf('%1$s', $traveladvisor_var_categories_list);
                                                    ?>
                                                </span>
                                                <?php
                                            }
                                            if (isset($traveladvisor_date)) {
                                                ?>

                                                <span class="post-date"><?php echo esc_html($traveladvisor_date); ?></span>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                        if (isset($traveladvisor_content) && $traveladvisor_content != "") {
                                            ?>
                                            <p><?php echo wp_trim_words($traveladvisor_content, $default_excerpt_length); // traveladvisor_var_the_excerpt();        ?></p>
                                            <?php
                                        }
                                        ?>
                                        <a href="<?php the_permalink(); ?>" class="cs-readmore-btn cs-color"><i class=" icon-plus2"></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_readmore_text'); ?></a>
                                    </div>
                                </div>
                                <?php
                                $traveladvisor_total++;
                            endwhile;
                            wp_reset_postdata();
                        } else {
                            echo traveladvisor_var_theme_text_srt('traveladvisor_var_noresult_found');
                        }
                        $traveladvisor_current_page = 1;
                        $traveladvisor_totalposts = wp_count_posts()->publish;
                        if (isset($_GET['page_id_all'])) {
                            $traveladvisor_current_page = $_GET['page_id_all'];
                        }
                        $posts_per_page = get_option('posts_per_page');
                        if (isset($traveladvisor_cat_name) && $traveladvisor_cat_name != "") {
                            $posts_per_page = $traveladvisor_total;
                            $traveladvisor_totalposts = $traveladvisor_total;
                        }
                        $traveladvisor_pages = ceil($traveladvisor_totalposts / $posts_per_page);
                        if ($wp_query->found_posts > get_option('posts_per_page')) {
                            if (function_exists('traveladvisor_var_get_pagination')) {
                                echo traveladvisor_var_get_pagination($traveladvisor_pages, $traveladvisor_current_page, 'page_id_all');
                            }
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
 </div>
                </div>
                <?php
                if (isset($traveladvisor_layout) && $traveladvisor_layout == 'sidebar_right') {

                    if (is_active_sidebar(traveladvisor_get_sidebar_id($traveladvisor_sidebar))) {
                        ?>
                        <div class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12"><?php
                            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($traveladvisor_sidebar)) :
                                ?><?php
                            endif;
                            ?>
                        </div>
                        <?php
                    }
                }if (is_active_sidebar('sidebar-1')) {
                    echo '<div class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">';
                    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-1')) : endif;
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>