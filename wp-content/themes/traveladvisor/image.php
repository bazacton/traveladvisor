<?php
/**
 * The template for displaying image attachments
 *
 * @package WordPress
 * @subpackage Traveladvisor
 * @since Traveladvisor
 */
get_header();
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
?><div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <!-- .entry -header -->
        <div class="main-section"> 
            <div class="page-section" style=" margin-bottom:30px;">
                <div class="container">
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
                        <div class="<?php echo traveladvisor_allow_special_char($traveladvisor_col_class); ?>">
                            <?php
                            $strings = new traveladvisor_theme_all_strings;
                            $strings->traveladvisor_theme_strings();

                            // Start the loop.
                            while (have_posts()) : the_post();
                                ?>

                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                    <nav id="image-navigation" class="navigation image-navigation">
                                        <div class="nav-links">
                                            <div class="nav-previous"><?php previous_image_link(false, traveladvisor_var_theme_text_srt('traveladvisor_var_page_previous')); ?></div>
                                            <div class="nav-next"><?php next_image_link(false, traveladvisor_var_theme_text_srt('traveladvisor_var_page_next')); ?></div>
                                        </div><!-- .nav-links -->
                                    </nav><!-- .image-navigation -->

                                    <header class="entry-header">
                                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                                    </header><!-- .entry-header -->

                                    <div class="entry-content">

                                        <div class="entry-attachment">
                                            <?php
                                            /**
                                             * Filter the default traveladvisor image attachment size.
                                             *
                                             * @since Traveladvisor
                                             *
                                             * @param string $image_size Image size. Default 'large'.
                                             */
                                            $image_size = apply_filters('traveladvisor_attachment_size', 'large');

                                            echo wp_get_attachment_image(get_the_ID(), $image_size);
                                            ?>

                                            <?php
                                            if (function_exists('traveladvisor_excerpt')):
                                                traveladvisor_excerpt('entry-caption');
                                            endif;
                                            ?>

                                        </div><!-- .entry-attachment -->

                                        <?php
                                        the_content();
                                        wp_link_pages(array(
                                            'before' => '<div class="page-links"><span class="page-links-title">' . traveladvisor_var_theme_text_srt('traveladvisor_var_pages') . '</span>',
                                            'after' => '</div>',
                                            'link_before' => '<span>',
                                            'link_after' => '</span>',
                                            'pagelink' => '<span class="screen-reader-text">' . traveladvisor_var_theme_text_srt('traveladvisor_var_page') . ' </span>%',
                                            'separator' => '<span class="screen-reader-text">, </span>',
                                        ));
                                        ?>
                                    </div><!-- .entry-content -->

                                    <footer class="entry-footer">


                                        <?php
                                        if (function_exists('traveladvisor_entry_meta')):
                                            traveladvisor_entry_meta();
                                        endif;
                                        ?>
                                        <?php
                                        // Retrieve attachment metadata.
                                        $metadata = wp_get_attachment_metadata();
                                        if ($metadata) {
                                            printf('<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>', esc_html_x('Full size', 'Used before full size attachment link.', 'traveladvisor'), esc_url(wp_get_attachment_url()), absint($metadata['width']), absint($metadata['height'])
                                            );
                                        }

                                        edit_post_link(
                                                sprintf(
                                                        /* translators: %s: Name of current post */
                                                        __('Edit<span class="screen-reader-text"> "%s"</span>', 'traveladvisor'), get_the_title()
                                                ), '<span class="edit-link">', '</span>'
                                        );
                                        ?>
                                    </footer><!-- .entry-footer -->
                                </article><!-- #post-## -->


                                <?php
                                // If comments are open or we have at least one comment, load up the comment template.
                                if (comments_open() || get_comments_number()) {
                                    comments_template();
                                }

                                // Parent post navigation.
                                the_post_navigation(array(
                                    'prev_text' => _x('<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'traveladvisor'),
                                ));
// End the loop.
                            endwhile;
                            wp_reset_postdata();
                            ?>
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
                        }
                        if (is_active_sidebar('sidebar-1')) {
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
