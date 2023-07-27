<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Traveladvisor
 * @since Traveladvisor
 */
$var_arrays = array( 'post' );
$blog_single_global_vars = TRAVELADVISOR_VAR_GLOBALS()->globalizing( $var_arrays );
extract( $blog_single_global_vars );
$strings = new traveladvisor_theme_all_strings;
$strings->traveladvisor_theme_option_strings();
?>
<div class="row">
    <div class="cs-blog-detail">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="heading-sec">
                <div class="post-option">
                    <?php
                    $traveladvisor_var_categories = traveladvisor_var_cat_list( get_the_id() );
                    $traveladvisor_cat_links = get_category_link( get_the_id() );
                    $counter = 1;
                    $traveladvisor_var_cat_id = array();
                    if ( $traveladvisor_var_categories != '' && is_array( $traveladvisor_var_categories ) ) {
                        foreach ( $traveladvisor_var_categories as $key => $value ) {
                            $traveladvisor_var_cat_id[] = get_cat_ID( $key );
                            ?>	
                            <a href="<?php echo esc_url( $value ) ?>">
                                <?php echo '<span>' . esc_html( $key ) . '</span>';
                                ?>
                            </a>
                            <?php
                            $counter ++;
                        }
                    }
                    ?>
                </div>
                <h2><?php the_title(); ?> </h2>
                <div class="post-meta">
                    <span class="cs-categorise"><?php echo the_author_posts_link(); ?></span>
                    <span class="post-date"><?php echo get_the_date(); ?></span>
                </div>
            </div>
            <div class="cs-main-post">
                <div class="cs-media">
                    <figure><?php the_post_thumbnail( 'traveladvisor_var_media_1' ); ?></figure>
                </div>
            </div>
            <div class="rich_editor_text">
                <?php
                    the_content();
                    wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . esc_html( traveladvisor_var_theme_text_srt( 'traveladvisor_var_pages' ) ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
                    ?> 
            </div>
            <?php
            $traveladvisor_var_post_tags_show = get_post_meta( get_the_id(), 'traveladvisor_var_post_tags_show', true );
            if ( isset( $traveladvisor_var_post_tags_show ) && $traveladvisor_var_post_tags_show == 'on' && $traveladvisor_var_post_tags_show != '' ) {
                $traveladvisor_var_tages = traveladvisor_var_tag_list( get_the_ID() );
                ?>
                <div class="cs-tags">
                    <?php
                    $a = 0;
                    foreach ( $traveladvisor_var_tages as $key => $value ) {
                        if ( $a == 0 ) {
                            echo '<i class="icon-tag"></i>';
                            echo '<ul>';
                            $a ++;
                        }
                        echo '<li><a href="' . esc_html( $value ) . '">' . esc_html( $key ) . '</a></li>';
                    }
                    ?>
                    </ul>
                </div>
            <?php } ?>
            <?php
            $traveladvisor_var_post_social_sharing = get_post_meta( get_the_id(), 'traveladvisor_var_post_social_sharing', true );
            if ( isset( $traveladvisor_var_post_social_sharing ) && $traveladvisor_var_post_social_sharing == 'on' ) {
                ?>
                <div class="cs-share-post">
                    <h6>Share</h6>
                    <ul class="cs-socailmedia">
    <?php echo traveladvisor_social_share_blog(); ?>
                    </ul>
                </div>
<?php } ?>
            <div class="cs-prvnext-post">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="cs-prv-post">
                                <?php previous_post_link( '%link', '<i class="icon-angle-left">' . '</i>' ); ?>
                            <div class="cs-text"> 
                                <?php
                                $prev_post = get_adjacent_post( false, '', true );
                                if ( $prev_post ) {
                                    $prev_post_url = get_permalink( $prev_post->ID );
                                }
                                $next_post = get_adjacent_post( false, '', false );
                                if ( $next_post ) {
                                    $next_post_url = get_permalink( $next_post->ID );
                                }
                                ?>
<?php previous_post_link( '%link', '<p>Previous Post' . '</p>' ); ?>
                                <h6><a href=""><?php previous_post_link( '<strong>%link</strong>' ); ?> </a></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="cs-next-post">
                            <div class="cs-text">
<?php next_post_link( '%link', '<p> Next Post' . '</p>' ); ?>
                                <h6><a href=""><?php next_post_link( '<strong>%link</strong>' ); ?> </a></h6>
                            </div>
<?php next_post_link( '%link', '<i class="icon-angle-right">' . '</i>' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $traveladvisor_var_related_post = get_post_meta( get_the_id(), 'traveladvisor_var_related_post', true );
        if ( isset( $traveladvisor_var_related_post ) && $traveladvisor_var_related_post == 'on' ) {
            ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cs-section-title"><h2><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_related_blogs' ); ?></h2></div>
            </div>
            <?php
            $traveladvisor_var_related_post_array = array(
                'posts_per_page' => 3,
                'post_type' => 'post',
                'category__in' => $traveladvisor_var_cat_id,
            );
            $traveladvisor_var_related_posts = new WP_Query( $traveladvisor_var_related_post_array );
            while ( $traveladvisor_var_related_posts->have_posts() ): $traveladvisor_var_related_posts->the_post();
                ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="cs-blog blog-grid">
                        <div class="cs-media">
                            <figure><a href="<?php echo the_permalink(); ?>"><?php the_post_thumbnail( 'traveladvisor_var_media_2' ); ?></a></figure>
                        </div>
                        <div class="blog-text">
                            <div class="post-meta">
                                <span class="cs-date"><em><?php echo get_the_date( 'd' ); ?></em><?php echo get_the_date( 'M' ); ?></span>
                                <?php
                                $cat_name = get_the_category( $post->ID );
                                foreach ( $cat_name as $key => $value ) {
                                    echo '<span class="cs-categorise"><a href=" ' . get_category_link( $value->cat_ID ) . ' "> ' . esc_html( $value->name ) . '</a></span> ';
                                }
                                ?>
                            </div>
                            <div class="post-title">
                                <h4><a href="<?php the_permalink(); ?>"><?php
                                        echo the_title();
                                        ?></a>
                                </h4>
                            </div>
                            <p><?php echo substr( get_the_excerpt(), 0, 100 ) ?></p>
                            <a href="<?php echo get_the_permalink(); ?>" class="cs-readmore-btn cs-color"><i class=" icon-plus2"></i><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_readmore_text' ); ?></a>
                        </div>
                    </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        }
        if ( comments_open() || get_comments_number() ) {

            $var_arrays = array( 'traveladvisor_var_args' );
            $single_global_vars = TRAVELADVISOR_VAR_GLOBALS()->globalizing( $var_arrays );
            extract( $single_global_vars );
            comments_template();
        }
        ?>
    </div>
</div>

