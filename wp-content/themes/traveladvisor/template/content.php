<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Traveladvisor
 * @since Traveladvisor
 */
$var_arrays = array('traveladvisor_user', 'traveladvisor_num');
$content_global_vars = TRAVELADVISOR_VAR_GLOBALS()->globalizing($var_arrays);
extract($content_global_vars);
$strings = new traveladvisor_theme_all_strings;
$strings->traveladvisor_theme_strings();
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="cs-blog blog-medium">
        <?php if (has_post_thumbnail()) { ?>
            <div class="cs-media">
                <figure><?php the_post_thumbnail('traveladvisor_var_media_2'); ?></figure>
            </div>
        <?php } ?>
        <div class="blog-text">
            <div class="post-title">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h3>
            </div>
            <div class="post-option">
                <span class="post-by"><?php echo esc_html($traveladvisor_user["$traveladvisor_num"]); ?></span>
                <span><?php
                    $traveladvisor_var_categories_list = get_the_term_list(get_the_id(), 'category', '', ', ', '');
                    printf('%1$s', $traveladvisor_var_categories_list);
                    ?></span>
                <span class="post-date"><?php echo get_the_date(); ?></span>
            </div>
            <p><?php traveladvisor_var_the_excerpt(); ?> </p>
            <a href="<?php esc_url(the_permalink()); ?>" class="cs-readmore-btn cs-color"><i class=" icon-plus2"></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_readmore_text'); ?></a>
        </div>
    </div>
</div>
<?php
wp_reset_postdata();
?>