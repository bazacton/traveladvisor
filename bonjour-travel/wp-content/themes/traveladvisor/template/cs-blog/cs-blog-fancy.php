<?php
$var_arrays = array( 'post', 'traveladvisor_notification', 'wp_query', 'traveladvisor_var_blog_variables' );
$blog_grid_global_vars = TRAVELADVISOR_VAR_GLOBALS()->globalizing( $var_arrays );
extract( $blog_grid_global_vars );
extract( $traveladvisor_var_blog_variables );
extract( $wp_query->query_vars );
$width = '360';
$height = '270';
$title_limit = 20;
traveladvisor_isotope_enqueue();
?>
<?php
if ( isset( $traveladvisor_var_blog_title ) && trim( $traveladvisor_var_blog_title ) <> '' ) {
	?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="cs-section-title">
			<h2><?php echo esc_attr( $traveladvisor_var_blog_title ); ?></h2>
		</div>
	</div>
	<?php
}
?>   
<div class="blog-fancy">
	<?php
	$strings = new traveladvisor_theme_all_strings;
	$strings->traveladvisor_theme_option_strings();
	$query = new WP_Query( $args );
	$post_count = $query->post_count;
	$col_set = 1;
	if ( $query->have_posts() ) {
		$postCounter = 0;
		$post_border_handle = 1;
		while ( $query->have_posts() ) : $query->the_post();
			$traveladvisor_var_post_thumbnail_id = get_post_thumbnail_id( $post->ID );
			$traveladvisor_postObject = get_post_meta( get_the_id(), "traveladvisor_full_data", true );
			$traveladvisor_var_gallery = get_post_meta( $post->ID, 'traveladvisor_post_list_gallery', true );
			$traveladvisor_var_gallery = explode( ',', $traveladvisor_var_gallery );
			$traveladvisor_var_thumb_view = get_post_meta( $post->ID, 'traveladvisor_thumb_view', true );
			$traveladvisor_var_post_view = isset( $traveladvisor_var_thumb_view ) ? $traveladvisor_var_thumb_view : '';
			$no_border = '';
			if ( $post_border_handle == $post_count ) {
				$no_border = 'style = "border:none;"';
			} else {
				if ( $traveladvisor_var_blog_column == 12 ) {
					$no_border = 'style = "border:none;"';
				} else if ( $traveladvisor_var_blog_column == 2 ) {
					if ( $col_set % 6 == 0 ) {
						$no_border = 'style = "border:none;"';
					}
					$col_set ++;
				} else if ( $traveladvisor_var_blog_column == 3 ) {
					if ( $col_set % 4 == 0 ) {
						$no_border = 'style = "border:none;"';
					}
					$col_set ++;
				} else if ( $traveladvisor_var_blog_column == 4 ) {
					if ( $col_set % 3 == 0 ) {
						$no_border = 'style = "border:none;"';
					}
					$col_set ++;
				} else if ( $traveladvisor_var_blog_column == 6 ) {
					if ( $col_set % 2 == 0 ) {
						$no_border = 'style = "border:none;"';
					}
					$col_set ++;
				}
			}
			$post_border_handle ++;
			?>
			<div class="col-lg-<?php echo esc_html( $traveladvisor_var_blog_column ); ?>  col-md-<?php echo esc_html( $traveladvisor_var_blog_column ); ?> col-sm-12 col-xs-12">
				<div class="cs-blog fancy" <?php
				echo traveladvisor_allow_special_char( $no_border );
				?>>
					<div class="blog-author">
						<figure> <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?> </figure>
						<?php echo the_author_posts_link(); ?> 
					</div>
					<div class="blog-fancy-detail">
						<h3><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h3>
						<ul>
							<li>
								<?php
								$traveladvisor_post_like_counter = get_post_meta( $post->ID, "traveladvisor_post_like_counter", true );
								if ( ! isset( $traveladvisor_post_like_counter ) or empty( $traveladvisor_post_like_counter ) )
									$traveladvisor_post_like_counter = 0;
								if ( isset( $_COOKIE["traveladvisor_post_like_counter" . $post->ID] ) ) {
									?>  
									<a href="javascript:void(0)" class="post_likes<?php echo traveladvisor_allow_special_char( $post->ID ); ?>" onclick="traveladvisor_post_unlikes_count('<?php echo admin_url( 'admin-ajax.php' ) ?>', '<?php echo traveladvisor_allow_special_char( $post->ID ) ?>')"><i class="icon-heart"></i><?php echo absint( $traveladvisor_post_like_counter ) ?><?php echo esc_html( traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_like' ) ); ?> </a>
									<?php
								} else {
									?>
									<a href="javascript:void(0)" class="post_likes<?php echo traveladvisor_allow_special_char( $post->ID ); ?>" onclick="traveladvisor_post_likes_count('<?php echo admin_url( 'admin-ajax.php' ) ?>', '<?php echo traveladvisor_allow_special_char( $post->ID ) ?>')"><i class="icon-heart"></i><?php echo absint( $traveladvisor_post_like_counter ) ?><?php echo esc_html( traveladvisor_var_theme_text_srt( 'traveladvisor_var_blog_like' ) ); ?></a>
									<?php
								}
								?>
							</li>
							<li><?php echo traveladvisor_social_share_button(); ?></li>
						</ul>
						<a href="<?php echo the_permalink(); ?>" class="btn-fwd"><i class="icon-arrow_forward"></i></a> 
					</div>
				</div>
			</div>
			<?php
		endwhile;
		wp_reset_postdata();
	} else {
		echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_no_post_error' );
	}
	?>

</div>
<?php  wp_add_inline_script( 'traveladvisor-inline-script', 'function traveladvisor_post_likes_count(admin_url, id) {
        "use strict";
        var dataString = \'post_id=\' + id + \'&action=traveladvisor_post_likes_count\';
        jQuery(".post_likes" + id).html(\'<i class="icon-spinner8 fa-spin"></i>\');
        jQuery.ajax({
            type: "POST",
            url: admin_url,
            data: dataString,
            success: function (response) {
                if (response != \'error\') {
                    jQuery(".post_likes" + id).html(response);
                    jQuery(".post_likes" + id).attr("onclick", "traveladvisor_post_unlikes_count(\'" + admin_url + "\',\'" + id + "\')");
                } else {
                    jQuery(".post_likes" + id).html(\' There is an error.\');
                }
            }
        });
        return false;
    }
    function traveladvisor_post_unlikes_count(admin_url, id) {
        "use strict";
        var dataString = \'post_id=\' + id + \'&action=traveladvisor_post_unlikes_count\';
        jQuery(".post_likes" + id).html(\'<i class="icon-spinner8 fa-spin"></i>\');
        jQuery.ajax({
            type: "POST",
            url: admin_url,
            data: dataString,
            success: function (response) {
                if (response != \'error\') {
                    jQuery(".post_likes" + id).html(response);
                    jQuery(".post_likes" + id).attr("onclick", "traveladvisor_post_likes_count(\'" + admin_url + "\',\'" + id + "\')");
                } else {
                    jQuery(".post_likes" + id).html(\' There is an error.\');
                }
            }
        });
        return false;
    }'); ?>
