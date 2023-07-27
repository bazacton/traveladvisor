<?php
$var_arrays = array('post', 'traveladvisor_notification', 'wp_query', 'traveladvisor_var_blog_variables');
$blog_grid_global_vars = TRAVELADVISOR_VAR_GLOBALS()->globalizing($var_arrays);
extract($blog_grid_global_vars);
extract($traveladvisor_var_blog_variables);
extract($wp_query->query_vars);
$width = '360';
$height = '270';
$title_limit = 20;
traveladvisor_isotope_enqueue();

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

        $traveladvisor_var_post_thumbnail_id = get_post_thumbnail_id($post->ID);
        $traveladvisor_postObject = get_post_meta(get_the_id(), "traveladvisor_full_data", true);
        $traveladvisor_var_gallery = get_post_meta($post->ID, 'traveladvisor_post_list_gallery', true);
        $traveladvisor_var_gallery = explode(',', $traveladvisor_var_gallery);
        $traveladvisor_var_thumb_view = get_post_meta($post->ID, 'traveladvisor_thumb_view', true);
        $traveladvisor_var_post_view = isset($traveladvisor_var_thumb_view) ? $traveladvisor_var_thumb_view : '';
        ?>

        <div class="col-lg-<?php echo esc_html($traveladvisor_var_blog_column); ?>  col-md-<?php echo esc_html($traveladvisor_var_blog_column); ?> col-sm-12 col-xs-12">
            <div class="cs-blog blog-grid">
                <?php if (has_post_thumbnail()) { ?>
                    <div class="cs-media">
                        <figure> <?php the_post_thumbnail('traveladvisor_var_media_2') ?></figure>
                    </div>
                <?php } ?>
                <div class="blog-text">
                    <div class="post-meta">
                        <span class="cs-date"><em><?php echo get_the_date('d'); ?></em><?php echo get_the_date('M'); ?></span>
                        <?php
                        $traveladvisor_var_categories_list = get_the_term_list(get_the_id(), 'category', '', ', ', '');
                        echo ' <span class="cs-categorise">';
                        printf('%1$s', $traveladvisor_var_categories_list);
                        echo '</span>';
                        ?>
                    </div>
                    <div class="post-title">
                        <h4><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?> </a></h4>
                    </div>
                    <?php if (isset($traveladvisor_var_blog_description) && $traveladvisor_var_blog_description == 'yes') { ?> 
                        <p> <?php echo traveladvisor_get_the_excerpt($traveladvisor_var_blog_excerpt, 'true', '');
                        ?>
                        <?php } ?></p>
                    <a href="<?php esc_url(the_permalink()); ?>" class="cs-readmore-btn cs-color"><i class=" icon-plus2"></i><?php echo traveladvisor_var_theme_text_srt('traveladvisor_var_readmore_text'); ?></a>
                </div>
            </div>
        </div> 

        <?php
    endwhile;
    wp_reset_postdata();
} else {
    echo traveladvisor_var_theme_text_srt('traveladvisor_var_no_post_error');
}
?>