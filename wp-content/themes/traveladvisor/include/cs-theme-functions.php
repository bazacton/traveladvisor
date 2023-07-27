<?php
/*
 * header settings
 * removes the more link from scroll
 */

if ( !function_exists( 'remove_more_link_scroll' ) ) {

	function remove_more_link_scroll( $link ) {
		$link = preg_replace( '|#more-[0-9]+|', '', $link );
		return $link;
	}

}


add_filter( 'the_content_more_link', 'remove_more_link_scroll' );


/*
 * related posts of same category__in
 * returns all of the posts associated with a specific category
 */
add_filter( 'wp_nav_menu_items', 'traveladvisor_login_menu_item', 10, 2 );
if ( !function_exists( 'traveladvisor_login_menu_item' ) ) {

	function traveladvisor_login_menu_item( $items, $args ) {
		global $traveladvisor_var_options;
		if ( $args->theme_location == 'primary-menu' ) {
			$traveladvisor_html = '';
			ob_start();
			echo '<li class="cs-search-area">
                            <div class="search-area"> <a href="#"><i class="icon-search2"></i></a>
                                <form action=' . esc_url( home_url( '/' ) ) . ' id="header_search_form">
                                    <div class="input-holder"> <i class="icon-search2"></i>
                                        <input name="s" type="text" placeholder="Enter any keyword">
                                        <label class="cs-bgcolor"> <i class="icon-search2"></i>
                                            <input type="submit" value="search">
                                        </label>
                                    </div>
                                </form>
                            </div>';
			if ( function_exists( 'traveladvisor_woocommerce_header_cart' ) ) {
				if ( isset( $traveladvisor_var_options['traveladvisor_var_woocommerce_cart_icon'] ) and $traveladvisor_var_options['traveladvisor_var_woocommerce_cart_icon'] == "on" ) {
					traveladvisor_woocommerce_header_cart();
				}
			}
			echo '</li>';
			$traveladvisor_html .= ob_get_clean();
			$items .= $traveladvisor_html;
		}
		return $items;
	}

}
if ( !function_exists( 'traveladvisor_var_related_posts' ) ) {

	function traveladvisor_var_related_posts( $traveladvisor_var_post_cat, $traveladvisor_barbe_number_of_posts ) {

		$strings = new traveladvisor_theme_all_strings;
		$strings->traveladvisor_theme_strings();

		$args = array(
			'category__in' => $traveladvisor_var_post_cat,
			'posts_per_page' => $traveladvisor_barbe_number_of_posts
		);
		$traveladvisor_var_query = new WP_Query( $args );
		if ( $traveladvisor_var_query->have_posts() ) {
			?>
			<div class="related-post">
				<h3><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_functions_related_posts' ); ?></h3>
				<div class="row">
					<ul class="related-slider">
						<?php while ( $traveladvisor_var_query->have_posts() ) : $traveladvisor_var_query->the_post(); ?>
							<li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="cs-blog blog-grid">
									<div class="cs-media">
										<figure><?php the_post_thumbnail( 'traveladvisor_var_media_7' ); ?></figure>
									</div>
									<div class="blog-text">
										<div class="post-option">
											<?php
											$traveladvisor_var_categories = get_the_category( $id = false );
											if ( $traveladvisor_var_categories != '' ) {
												$counter = 1;
												foreach ( $traveladvisor_var_categories as $traveladvisor_var_cat ) {
													if ( isset( $traveladvisor_var_cat->cat_ID ) ) {
														$traveladvisor_var_term_link = get_category_link( $traveladvisor_var_cat->cat_ID );
														echo '<a href="' . esc_url( $traveladvisor_var_term_link ) . ' " class="cs-button cs-color"">' . $traveladvisor_var_cat->name . '</a>';
														if ( count( $traveladvisor_var_categories ) > 1 && $counter < count( $traveladvisor_var_categories ) ) {
															echo ',';
														}
													}
													$counter++;
												}
											}
											?>
											<span class="post-date"><?php echo get_the_date(); ?></span>
										</div>
										<div class="post-title">
											<h4><a href="<?php esc_url( the_permalink() ); ?>"> <?php the_title(); ?></a></h4>
										</div>
										<?php
										traveladvisor_var_the_excerpt();
										?>
										<ul class="post-meta">
											<li><a href="<?php esc_url( the_permalink() ); ?>" class="cs-button cs-color"><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_functions_keep_reading' ); ?><i class="icon-arrow-right22"></i></a></li>
											<li class="post-comment"><i class="icon-comments"></i><a href="#"><?php echo get_comments_number(); ?></a></li>
										</ul>
									</div>
								</div>
							</li>
							<?php
						endwhile;
						wp_reset_postdata();
					}
					?>
				</ul>
			</div>
		</div>
		<?php
	}

}
/*
 * excerpt function custom 
 * returns the custom excerpt symbol and custom excerpt length
 */
if ( !function_exists( 'traveladvisor_var_the_excerpt()' ) ) {

	function traveladvisor_var_the_excerpt() {
		add_filter( 'excerpt_length', 'traveladvisor_var_the_excerpt_length', 20 );
		the_excerpt();
	}

}
/*
 * excerpt function custom 
 * returns the custom excerpt length
 */
if ( !function_exists( 'traveladvisor_var_the_excerpt_length' ) ) {

	function traveladvisor_var_the_excerpt_length( $length ) {
		$traveladvisor_var_options = TRAVELADVISOR_VAR_GLOBALS()->theme_options();
		$default_excerpt_length = $traveladvisor_var_options['traveladvisor_var_excerpt_length'];
		return $default_excerpt_length;
	}

}
/*
 * excerpt function custom 
 * returns the wpdocs custom excerpt length
 */
add_filter( 'excerpt_more', 'traveladvisor_var_wpdotraveladvisor_excerpt_more' );
if ( !function_exists( 'traveladvisor_var_wpdotraveladvisor_excerpt_more' ) ) {

	function traveladvisor_var_wpdotraveladvisor_excerpt_more( $more = '...' ) {
		return '...';
	}

}
/*
 * returns the categories list associated with a post 
 */
if ( !function_exists( 'traveladvisor_var_cat_list' ) ):

	function traveladvisor_var_cat_list( $traveladvisor_var_post_id ) {
		if ( $traveladvisor_var_post_id == '' ) {
			$traveladvisor_var_post_id = get_the_id();
		}
		$traveladvisor_var_cats_list = array();
		$traveladvisor_var_cats = get_the_category( $traveladvisor_var_post_id );
		if ( $traveladvisor_var_cats != '' ):
			foreach ( $traveladvisor_var_cats as $traveladvisor_var_cat ) {
				$traveladvisor_var_term_link = get_category_link( $traveladvisor_var_cat->cat_ID );
				$traveladvisor_var_cats_list[$traveladvisor_var_cat->name] = $traveladvisor_var_term_link;
			}
		endif;
		return $traveladvisor_var_cats_list;
	}

endif;
/*
 * returns the tags list associated with a post 
 */
if ( !function_exists( 'traveladvisor_var_tag_list' ) ):

	function traveladvisor_var_tag_list( $traveladvisor_var_post_id ) {
		if ( $traveladvisor_var_post_id == '' ) {
			$traveladvisor_var_post_id = get_the_id();
		}
		$traveladvisor_var_tags_list = array();
		$traveladvisor_var_tags = get_the_tags( $traveladvisor_var_post_id );
		if ( $traveladvisor_var_tags != '' ):
			foreach ( $traveladvisor_var_tags as $traveladvisor_var_tag ) {
				$traveladvisor_var_tag_link = get_tag_link( $traveladvisor_var_tag->term_id );
				$traveladvisor_var_tags_list[$traveladvisor_var_tag->name] = $traveladvisor_var_tag_link;
			}
		endif;
		return $traveladvisor_var_tags_list;
	}

endif;
/*
 * returns the commnets associated with a post
 */
if ( !function_exists( 'traveladvisor_var_comment' ) ):

	function traveladvisor_var_comment( $comment, $args, $depth ) {
		$strings = new traveladvisor_theme_all_strings;
		$strings->traveladvisor_theme_strings();

		$GLOBALS['comment'] = $comment;
		$args['reply_text'] = traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_reply' ) . ' <i class="icon-arrow-right22"></i>';
		$args['after'] = '';
		switch ( $comment->comment_type ) :
			case '' :
				?>
				<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
					<div class="thumblist" id="comment-<?php comment_ID(); ?>">
						<ul>
							<li>
								<div class="cs-media">
									<figure>
										<a><?php echo get_avatar( $comment, 40 ); ?></a>
										<h6><?php comment_author(); ?></h6>
									</figure>
								</div>

								<div class="cs-text">
									<?php if ( $comment->comment_approved == '0' ) : ?>
										<p><div class="comment-awaiting-moderation colr"><?php echo traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_functions_comment' ); ?></div></p>
									<?php endif; ?>
									<?php comment_text(); ?>
									<?php
									$d = "F j, Y";
									$comment_date = get_comment_date( $d );
									echo esc_html( $comment_date );
									?>
									<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth ) ) ); ?>
								</div>
							</li>
						</ul>
					</div>
					<?php
					break;
				case 'pingback' :
				case 'trackback' :
					?>
				<li class="post pingback">
					<p><?php comment_author_link(); ?><?php edit_comment_link( traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_functions_edit' ), ' ' ); ?></p>
					<?php
					break;
			endswitch;
		}

	endif;
	add_filter( 'comment_reply_link', 'replace_reply_link_class' );
	if ( !function_exists( 'replace_reply_link_class' ) ) {

		function replace_reply_link_class( $class ) {
			$class = str_replace( "class='comment-reply-link", "class='cs-replay-btn", $class );
			return $class;
		}

	}
	if ( !function_exists( 'traveladvisor_generate_random_string' ) ) {

		function traveladvisor_generate_random_string( $length = 3 ) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomString = '';
			for ( $i = 0; $i < $length; $i++ ) {
				$randomString .= $characters[rand( 0, strlen( $characters ) - 1 )];
			}
			return $randomString;
		}

	}

	if ( !function_exists( 'traveladvisor_allow_special_char' ) ) {

		function traveladvisor_allow_special_char( $input = '' ) {
			$output = $input;
			return $output;
		}

	}

	/*
	 * returns the section 
	 */
	if ( !function_exists( 'traveladvisor_section' ) ) {

		function traveladvisor_section( $class, $title, $csheading ) {
			if ( $title <> '' ) {
				$traveladvisor_html = '';
				$traveladvisor_html .= '<div class="' . $class . '">
                <h' . $csheading . '>' . esc_html( $title ) . '</h' . $csheading . '>
                <div class="stripe-line"></div>
              </div>';
				return $traveladvisor_html;
			}
		}

	}
	/*
	 * returns the source associated with a post 
	 */
	if ( !function_exists( 'traveladvisor_get_post_img_src' ) ) {

		function traveladvisor_get_post_img_src( $post_id, $width, $height ) {
			global $post;
			if ( has_post_thumbnail() ) {
				$image_id = get_post_thumbnail_id( $post_id );
				$image_url = wp_get_attachment_image_src( $image_id, array( $width, $height ), true );
				if ( $image_url[1] == $width and $image_url[2] == $height ) {
					return $image_url[0];
				} else {
					$image_url = wp_get_attachment_image_src( $image_id, "full", true );
					return $image_url[0];
				}
			}
		}

	}
	/*
	 * returns the flex slider with custom height and width and view
	 */
	if ( !function_exists( 'traveladvisor_post_flex_slider' ) ) {

		function traveladvisor_post_flex_slider( $width, $height, $postid, $view ) {
			global $post, $traveladvisor_node, $traveladvisor_theme_options, $traveladvisor_counter_node;
			$traveladvisor_post_counter = rand( 40, 9999999 );
			$traveladvisor_counter_node++;

			if ( $view == 'post-list' ) {
				$viewMeta = 'traveladvisor_post_list_gallery';
			} else {
				$viewMeta = $view;
			}

			$traveladvisor_meta_slider_options = get_post_meta( "$postid", $viewMeta, true );
			$totaImages = '';
			?>

			<div id="flexslider<?php echo esc_attr( $traveladvisor_post_counter ); ?>" class="flexslider">
				<div class="flex-viewport">
					<ul class="slides slides-1">
						<?php
						$traveladvisor_counter = 1;

						if ( $view == 'post' ) {
							$sliderData = get_post_meta( $post->ID, 'traveladvisor_post_detail_gallery', true );
							$sliderData = explode( ',', $sliderData );
							$totaImages = count( $sliderData );
						} else if ( $view == 'post-list' ) {
							$sliderData = get_post_meta( $post->ID, 'traveladvisor_post_list_gallery', true );
							$sliderData = explode( ',', $sliderData );
							$totaImages = count( $sliderData );
						} else {
							$sliderData = get_post_meta( $post->ID, 'traveladvisor_post_list_gallery', true );
							$sliderData = explode( ',', $sliderData );
							$totaImages = count( $sliderData );
						}

						foreach ( $sliderData as $as_node ) {
							$image_url = traveladvisor_attachment_image_src( ( int ) $as_node, $width, $height );
							echo '<li>
                                    <figure>
                                        <img src="' . esc_url( $image_url ) . '" alt="image_url">';
							if ( isset( $as_node['title'] ) && $as_node['title'] != '' ) {
								?>         
								<figcaption>
									<div class="container">
										<?php if ( $as_node['title'] <> '' ) { ?>
											<h2 class="colr">
												<?php
												if ( $as_node['link_url'] <> '' ) {
													
												} else {

													echo esc_attr( $as_node['title'] );
												}
												?>
											</h2>
										<?php }
										?>
									</div>
								</figcaption>
							<?php } ?>

							</figure>
							</li>
							<?php
							$traveladvisor_counter++;
						}
						//traveladvisor_enqueue_slick_script();
						?>
					</ul>
				</div>
			</div>

			<?php
		}

	}

	/*
	 * returns the source associated with a attachment 
	 */
	if ( !function_exists( 'traveladvisor_attachment_image_src' ) ) {

		function traveladvisor_attachment_image_src( $attachment_id, $width, $height ) {
			$image_url = wp_get_attachment_image_src( $attachment_id, array( $width, $height ), true );
			if ( $image_url[1] == $width and $image_url[2] == $height )
				;
			else
				$image_url = wp_get_attachment_image_src( $attachment_id, "full", true );
			$parts = explode( '/uploads/', $image_url[0] );
			if ( count( $parts ) > 1 )
				return $image_url[0];
		}

	}
	/*
	 * returns the textarea field 
	 */
	if ( !function_exists( 'traveladvisor_comment_tut_fields' ) ) {

		function traveladvisor_comment_tut_fields() {
			$strings = new traveladvisor_theme_all_strings;
			$strings->traveladvisor_theme_strings();

			$you_may_use = traveladvisor_var_theme_text_srt( 'traveladvisor_var_theme_functions_text' );
			$traveladvisor_comment_opt_array = array(
				'std' => '',
				'id' => '',
				'classes' => 'commenttextarea',
				'extra_atr' => ' rows="55" cols="15"',
				'cust_id' => 'comment_mes',
				'cust_name' => 'comment',
				'return' => true,
				'required' => false
			);
			$traveladvisor_msg_class = isset( $traveladvisor_msg_class ) ? $traveladvisor_msg_class : '';
			$html = '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="input-holder">
                    <label>' . traveladvisor_var_theme_text_srt( 'traveladvisor_var_post_comment' ) . '</label><i class="icon-edit2"></i>
                    <textarea id="comment_mes" name="comment" placeholder="' . traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_here' ) . '"  class="commenttextarea" rows="55" cols="15"></textarea>' .
					'</div></div>';

			echo traveladvisor_allow_special_char( $html );
		}

	}

	if ( !function_exists( 'traveladvisor_filter_comment_form_field_comment' ) ) {

		function traveladvisor_filter_comment_form_field_comment( $field ) {

			return '';
		}

	}

// add the filter
	add_filter( 'comment_form_field_comment', 'traveladvisor_filter_comment_form_field_comment', 10, 1 );
	add_action( 'comment_form_logged_in_after', 'traveladvisor_comment_tut_fields' );
	add_action( 'comment_form_after_fields', 'traveladvisor_comment_tut_fields' );
	/*
	 * comment submit button filter
	 */
	if ( !function_exists( 'awesome_comment_form_submit_button' ) ) {

		function awesome_comment_form_submit_button( $button ) {
			/* $button = '';
			  if(function_exists('is_product')){
			  if (!is_product()) {
			  $button .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
			  }}
			  $button .= '<p class="form-submit"></p>
			  <div class="input-button">
			  <input type="submit" value="Post comments" tabindex="5" class="cs-button csborder-color cs-bgcolor" name="submit">
			  </div>
			  ';
			  if(function_exists('is_product')){
			  if (!is_product()) {
			  $button .= '</div>';
			  }}
			  return $button;
			 */
		}

	}

	// add_filter('comment_form_submit_button', 'awesome_comment_form_submit_button');

	/*
	 * enqueue the addthis script
	 */
	if ( !function_exists( 'traveladvisor_addthis_script_init_method' ) ) {

		function traveladvisor_addthis_script_init_method() {
			wp_enqueue_script( 'traveladvisor_addthis', traveladvisor_server_protocol() . 's7.addthis.com/js/250/addthis_widget.js#pubid=xa-4e4412d954dccc64', '', '', true );
		}

	}
// Social Share hover Button 


	if ( !function_exists( 'traveladvisor_social_share_button' ) ) {

		function traveladvisor_social_share_button( $default_icon = 'false', $title = 'true', $post_social_sharing_text = '' ) {
			traveladvisor_addthis_script_init_method();
			$path = trailingslashit( get_template_directory_uri() ) . "include/assets/images/";
			$html = '';
			$html .='<a class="cs-more addthis_button_compact">Share <span class="icon-dot"></span></a>';
			echo traveladvisor_allow_special_char( $html, true );
		}

	}
	/*
	 * return the addthis dropdown for social sharing 
	 */
	if ( !function_exists( 'traveladvisor_social_share_blog' ) ) {

		function traveladvisor_social_share_blog( $default_icon = 'false', $title = 'true', $post_social_sharing_text = '' ) {
			$traveladvisor_var_options = TRAVELADVISOR_VAR_GLOBALS()->theme_options();
			$html = '';
			$traveladvisor_var_twitter = isset( $traveladvisor_var_options['traveladvisor_var_twitter_share'] ) ? $traveladvisor_var_options['traveladvisor_var_twitter_share'] : '';
			$traveladvisor_var_facebook = isset( $traveladvisor_var_options['traveladvisor_var_facebook_share'] ) ? $traveladvisor_var_options['traveladvisor_var_facebook_share'] : '';
			$traveladvisor_var_google_plus = isset( $traveladvisor_var_options['traveladvisor_var_google_plus_share'] ) ? $traveladvisor_var_options['traveladvisor_var_google_plus_share'] : '';
			$traveladvisor_var_linkedin = isset( $traveladvisor_var_options['traveladvisor_var_linkedin_share'] ) ? $traveladvisor_var_options['traveladvisor_var_linkedin_share'] : '';
			$traveladvisor_var_dribbble = isset( $traveladvisor_var_options['traveladvisor_var_dribbble_share'] ) ? $traveladvisor_var_options['traveladvisor_var_dribbble_share'] : '';
			$traveladvisor_var_stumbleupon = isset( $traveladvisor_var_options['traveladvisor_var_stumbleupon_share'] ) ? $traveladvisor_var_options['traveladvisor_var_stumbleupon_share'] : '';
			$traveladvisor_var_share_share = isset( $traveladvisor_var_options['traveladvisor_var_share_share'] ) ? $traveladvisor_var_options['traveladvisor_var_share_share'] : '';
			traveladvisor_addthis_script_init_method();
			$html = '';

			$single = false;
			if ( is_single() ) {
				$single = true;
			}
			$path = trailingslashit( get_template_directory_uri() ) . "include/assets/images/";
			if ( $traveladvisor_var_twitter == 'on' or $traveladvisor_var_facebook == 'on' or $traveladvisor_var_google_plus == 'on' or $traveladvisor_var_tumblr == 'on' or $traveladvisor_var_dribbble == 'on' or $traveladvisor_var_share == 'on' or $traveladvisor_var_stumbleupon == 'on' or $traveladvisor_var_share_share == 'on' ) {


				if ( isset( $traveladvisor_var_facebook ) && $traveladvisor_var_facebook == 'on' ) {
					if ( $single == true ) {
						$html .='<li><a class="addthis_button_facebook" data-original-title="facebook"><i class="icon-facebook"></i></a></li>';
					} else {
						$html .='<li><a class="addthis_button_facebook" data-original-title="facebook"><i class="icon-facebook"></i></a></li>';
					}
				}
				if ( isset( $traveladvisor_var_twitter ) && $traveladvisor_var_twitter == 'on' ) {

					if ( $single == true ) {
						$html .='<li><a class="addthis_button_twitter"  data-original-title="twitter"><i class="icon-twitter"></i></a></li>';
					} else {
						$html .='<li><a class="addthis_button_twitter"  data-original-title="twitter"><i class="icon-twitter"></i></a></li>';
					}
				}
				if ( isset( $traveladvisor_var_google_plus ) && $traveladvisor_var_google_plus == 'on' ) {

					if ( $single == true ) {
						$html .='<li><a class="addthis_button_google" data-original-title="google"><i class="icon-google4"></i></a></li>';
					} else {
						$html .='<li><a class="addthis_button_google" data-original-title="google"><i class="icon-google4"></i></a></li>';
					}
				}
				if ( isset( $traveladvisor_var_linkedin ) && $traveladvisor_var_linkedin == 'on' ) {

					if ( $single == true ) {
						$html .='<li><a class="addthis_button_linkedin" data-original-title="linkedin"><i class="icon-linkedin22"></i></a></li>';
					} else {
						$html .='<li><a class="addthis_button_linkedin" data-original-title="linkedin"><i class="icon-linkedin22"></i></a></li>';
					}
				}


				if ( isset( $traveladvisor_var_dribbble ) && $traveladvisor_var_dribbble == 'on' ) {
					if ( $single == true ) {
						$html .='<li><a class="addthis_button_dribbble" data-original-title="dribbble"><i class="icon-dribbble2"></i></a></li>';
					} else {
						$html .='<li><a class="addthis_button_dribbble" data-original-title="dribbble"><i class="icon-dribbble2"></i></a></li>';
					}
				}
				if ( isset( $traveladvisor_var_stumbleupon ) && $traveladvisor_var_stumbleupon == 'on' ) {
					if ( $single == true ) {
						$html .='<li><a class="addthis_button_stumbleupon" data-original-title="stumbleupon"><i class="icon-stumbleupon"></i></a></li>';
					} else {
						$html .='<li><a class="addthis_button_stumbleupon" data-original-title="stumbleupon"><i class="icon-stumbleupon"></i></a></li>';
					}
				}

				if ( isset( $traveladvisor_var_share_share ) && $traveladvisor_var_share_share == 'on' ) {

					if ( $single == true ) {
						$html .='<li><a class="cs-more addthis_button_compact"><i class="icon-share-alt"></i></a></li>';
					} else {
						$html .='<li><a class="cs-more addthis_button_compact"><i class="icon-share-alt"></i></a></li>';
					}
				}
			}
			echo traveladvisor_allow_special_char( $html, true );
		}

	}
	/*
	 * return the id associated with a specific image
	 */
	if ( !function_exists( 'traveladvisor_var_get_image_id' ) ) {

		function traveladvisor_var_get_image_id( $attachment_url ) {
			global $wpdb;
			$attachment_id = false;
			//  If there is no url, return. 
			if ( '' == $attachment_url )
				return;
			// Get the upload directory paths 
			$upload_dir_paths = wp_upload_dir();
			if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
				//  If this is the URL of an auto-generated thumbnail, get the URL of the original image 
				$attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
				// Remove the upload path base directory from the attachment URL 
				$attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );

				$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
			}
			return $attachment_id;
		}

	}
	?>