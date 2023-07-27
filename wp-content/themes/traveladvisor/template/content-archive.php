<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Traveladvisor
 * @since Traveladvisor 1.0
 */
$traveladvisor_var_post_title = get_the_title();
$traveladvisor_var_author = get_the_author();
$traveladvisor_var_date = get_the_date();
$strings = new traveladvisor_theme_all_strings;
$strings -> traveladvisor_theme_strings();
$default_excerpt_length = '';
$traveladvisor_var_options = TRAVELADVISOR_VAR_GLOBALS()->theme_options();
if (isset($traveladvisor_var_options['traveladvisor_var_excerpt_length']) && $traveladvisor_var_options['traveladvisor_var_excerpt_length'] <> '') {

    $default_excerpt_length = $traveladvisor_var_options['traveladvisor_var_excerpt_length'];
} else {
    $default_excerpt_length = '60';
}

?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="cs-blog blog-medium">
        <?php if (has_post_thumbnail()) { ?>
            <div class="cs-media">
                <figure><?php the_post_thumbnail('traveladvisor_var_media_2'); ?></figure>
            </div>
        <?php } ?>
        <div class="blog-text">
            <?php
            if (isset($traveladvisor_var_post_title) && $traveladvisor_var_post_title != "") {
                ?>
                <div class="post-title">
                    <h3><a href="<?php the_permalink(); ?>"><?php echo esc_html($traveladvisor_var_post_title); ?> </a></h3>
                </div>
                <?php
            }
            ?>
            <div class="post-option">
                <?php
                if (isset($traveladvisor_var_author) && $traveladvisor_var_author != "") {
                    ?>
                    <span class="post-by"><?php echo the_author_posts_link(); ?></span>
                    <?php
                }
                
                $traveladvisor_var_categories_list = get_the_term_list(get_the_id(), 'category', '', ', ', '');
                if (isset($traveladvisor_var_categories_list) && $traveladvisor_var_categories_list != "") {
                    ?>
                    <span><?php printf('%1$s', $traveladvisor_var_categories_list); ?></span>
                    <?php
                }
                if (isset($traveladvisor_var_date) && $traveladvisor_var_date != "") {
                    ?>
                    <span class="post-date"><?php echo esc_html($traveladvisor_var_date); ?></span>
                    <?php
                }
                ?>
            </div>
            <p><?php echo wp_trim_words(get_the_content(),$default_excerpt_length);      // traveladvisor_var_the_excerpt(); ?> </p>
            <a href="<?php esc_url(the_permalink()); ?>" class="cs-readmore-btn cs-color"><i class=" icon-plus2"></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_readmore_text'); ?></a>
        </div>
    </div>
</div>
<?php
wp_reset_postdata();
