<?php
$var_arrays = array('post', 'traveladvisor_notification', 'wp_query', 'traveladvisor_var_blog_variables', 'current_user');
$blog_large_global_vars = TRAVELADVISOR_VAR_GLOBALS()->globalizing($var_arrays);
extract($blog_large_global_vars);
extract($traveladvisor_var_blog_variables);
extract($wp_query->query_vars);

$title_limit = 1000;

if (isset($traveladvisor_var_blog_title) && trim($traveladvisor_var_blog_title) <> '') {
    ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="cs-section-title">
            <h2><?php echo esc_attr($traveladvisor_var_blog_title); ?></h2>
        </div>

    </div>
    <?php
}
?>   

<?php
$strings = new traveladvisor_theme_all_strings;
$strings->traveladvisor_theme_option_strings();
$query = new WP_Query($args);
$post_count = $query->post_count;
if ($query->have_posts()) {
    $postCounter = 0;
    while ($query->have_posts()) : $query->the_post();
        $width = '825';
        $height = '464';
        $traveladvisor_var_thumbnail = traveladvisor_get_post_img_src($post->ID, $width, $height);
        $traveladvisor_postObject = get_post_meta($post->ID, "traveladvisor_full_data", true);
        $traveladvisor_var_post_thumbnail_id = get_post_thumbnail_id($post->ID);
        $traveladvisor_var_gallery = get_post_meta($post->ID, 'traveladvisor_post_list_gallery', true);
        $traveladvisor_var_post_social_sharing = get_post_meta($post->ID, 'traveladvisor_post_social_sharing', true);
        $traveladvisor_var_gallery = explode(',', $traveladvisor_var_gallery);
        $traveladvisor_var_thumb_view = get_post_meta($post->ID, 'traveladvisor_thumb_view', true);
        $traveladvisor_var_post_view = isset($traveladvisor_var_thumb_view) ? $traveladvisor_var_thumb_view : '';
        $traveladvisor_var_current_user = wp_get_current_user();
        $traveladvisor_var_custom_image_url = get_user_meta(get_the_author_meta('ID'), 'user_avatar_display', true);

        $traveladvisor_user = $current_user->user_login . "\n";
        ?> 	
        <div class="col-lg-<?php echo esc_html($traveladvisor_var_blog_column); ?>  col-md-<?php echo esc_html($traveladvisor_var_blog_column); ?> col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-blog blog-large">
                        <?php if (isset($traveladvisor_var_thumbnail) and $traveladvisor_var_thumbnail <> '') { ?> 
                            <div class="cs-media">
                                <figure><?php the_post_thumbnail('traveladvisor_var_media_1'); ?></figure>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="blog-text">
                            <div class="post-title">
                                <h3><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?>.</a></h3>
                            </div>
                            <div class="post-option">
                                <span class="post-by"><?php echo the_author_posts_link(); ?></span>
                                <?php
                                $traveladvisor_var_categories_list = get_the_term_list(get_the_id(), 'category', '', ', ', '');
                                if (isset($traveladvisor_var_categories_list) && $traveladvisor_var_categories_list != '') {
                                    echo '<span>';
                                    printf('%1$s', $traveladvisor_var_categories_list);
                                    echo '</span>';
                                }
                                ?> 
                                <span class="post-date"><?php echo get_the_date(); ?></span>
                            </div>
                            <?php if (isset($traveladvisor_var_blog_description) && $traveladvisor_var_blog_description == 'yes') { ?> 
                                <p> <?php echo traveladvisor_get_the_excerpt($traveladvisor_var_blog_excerpt, 'true', ''); ?>
                                <?php } ?></p>
                            <a href="<?php esc_url(the_permalink()); ?>" class="cs-readmore-btn cs-color"><i class=" icon-plus2"></i> <?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_readmore_text') ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    endwhile;
    wp_reset_postdata();
}
?>