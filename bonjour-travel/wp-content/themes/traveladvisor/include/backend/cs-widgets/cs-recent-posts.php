<?php
/**
 * @Recent posts widget Class
 *
 *
 */
if ( !class_exists( 'traveladvisor_recentposts' ) ) {

	class traveladvisor_recentposts extends WP_Widget {

		/**
		 * @init Recent posts Module
		 *
		 */
		public function __construct() {
			parent::__construct(
					'traveladvisor_recentposts', // Base ID
					traveladvisor_var_theme_text_srt( 'traveladvisor_var_rposts' ), // Name
					array( 'classname' => 'widget-recent-blog', 'description' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_rposts_desc' ), ) // Args
			);
		}

		/**
		 * @Recent posts html form
		 *
		 */
		function form( $instance ) {
			global $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
			$instance = wp_parse_args( ( array ) $instance, array( 'title' => '' ) );
			$title = $instance['title'];
			$select_category = isset( $instance['select_category'] ) ? esc_attr( $instance['select_category'] ) : '';
			$showcount = isset( $instance['showcount'] ) ? esc_attr( $instance['showcount'] ) : '';

			$traveladvisor_opt_array = array(
				'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_rposts_title' ),
				'desc' => '',
				'hint_text' => '',
				'echo' => true,
				'field_params' => array(
					'std' => esc_attr( $title ),
					'id' => traveladvisor_allow_special_char( $this->get_field_id( 'title' ) ),
					'classes' => '',
					'cust_id' => traveladvisor_allow_special_char( $this->get_field_name( 'title' ) ),
					'cust_name' => traveladvisor_allow_special_char( $this->get_field_name( 'title' ) ),
					'return' => true,
					'required' => false
				),
			);
			$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
			if ( function_exists( 'traveladvisor_show_all_cats' ) ) {
				$a_options = array();
				$a_options = traveladvisor_show_all_cats( '', '', traveladvisor_allow_special_char( $this->get_field_id( 'select_category' ) ), "category", true );
				$traveladvisor_opt_array = array(
					'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_rposts_chose_cat' ),
					'desc' => '',
					'hint_text' => '',
					'echo' => true,
					'field_params' => array(
						'std' => esc_attr( $select_category ),
						'cust_name' => traveladvisor_allow_special_char( $this->get_field_name( 'select_category' ) ),
						'cust_id' => traveladvisor_allow_special_char( $this->get_field_id( 'select_category' ) ),
						'id' => '',
						'classes' => 'chosen-select cs-recentpost-width',
						'options' => $a_options,
						'return' => true,
					),
				);

				$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
			}
			$traveladvisor_opt_array = array(
				'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_rposts_num_posts' ),
				'desc' => '',
				'hint_text' => '',
				'echo' => true,
				'field_params' => array(
					'std' => esc_attr( $showcount ),
					'id' => traveladvisor_allow_special_char( $this->get_field_id( 'showcount' ) ),
					'classes' => '',
					'cust_id' => traveladvisor_allow_special_char( $this->get_field_name( 'showcount' ) ),
					'cust_name' => traveladvisor_allow_special_char( $this->get_field_name( 'showcount' ) ),
					'return' => true,
					'required' => false
				),
			);
			$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );
		}

		/**
		 * @Recent posts update form data
		 *
		 *
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = $new_instance['title'];
			$instance['select_category'] = $new_instance['select_category'];
			$instance['showcount'] = $new_instance['showcount'];
			return $instance;
		}

		/**
		 * @Display Recent posts widget
		 *
		 */
		function widget( $args, $instance ) {
			global $traveladvisor_node, $wpdb, $post;
			extract( $args, EXTR_SKIP );
			$sidebarid = $args['id'];
			$traveladvisor_widget_start = '<div class="widget widget-recent-blog">';
			$traveladvisor_widget_end = '</div>';


			$title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
			$title = wp_specialchars_decode( stripslashes( $title ) );
			$select_category = empty( $instance['select_category'] ) ? ' ' : apply_filters( 'widget_title', $instance['select_category'] );
			$showcount = empty( $instance['showcount'] ) ? ' ' : apply_filters( 'widget_title', $instance['showcount'] );

			if ( $instance['showcount'] == "" ) {
				$instance['showcount'] = '-1';
			}
			echo traveladvisor_allow_special_char($traveladvisor_widget_start);
			if ( isset( $title ) && $title != '' ) {
				echo '<div class="widget-title"><h4>' . $title . '</h4></div>';
			}
			?>
			<ul>
				<?php
				if ( isset( $select_category ) and $select_category <> ' ' and $select_category <> '' ) {
					$args = array( 'posts_per_page' => "$showcount", 'post_type' => 'post', 'category_name' => "$select_category" );
				} else {
					$args = array( 'posts_per_page' => "$showcount", 'post_type' => 'post' );
				}
				$title_limit = 6;
				$custom_query = new WP_Query( $args );
				if ( $custom_query->have_posts() <> "" ) {
					while ( $custom_query->have_posts() ) : $custom_query->the_post();
						$traveladvisor_post_id = get_the_ID();

						$traveladvisor_noimage = '';
						$width = 74;
						$height = 74;
						$image_id = get_post_thumbnail_id( $post->ID );
						$image_url = traveladvisor_attachment_image_src( $image_id, $width, $height );
						if ( $image_url == '' ) {
							$traveladvisor_noimage = ' class="cs-noimage"';
						}
						?>
						<li<?php echo traveladvisor_allow_special_char( $traveladvisor_noimage ) ?>>
							<?php if ( $image_url != '' ) { ?>
								<div class="cs-media"><figure><a href="<?php esc_url( the_permalink() ); ?>"><img width="74" height="74" src="<?php echo esc_url( $image_url ) ?>" alt="image_url"></a></figure></div>
							<?php } ?>
							<div class="cs-text">
								<span class="post-date cs-color"><i class=" icon-calendar"></i><?php echo get_the_date(); ?></span>
								<div class="post-title"><h6><a href="<?php esc_url( the_permalink() ); ?>"><?php echo wp_trim_words( get_the_title( $post->ID ), 4, '...' ); ?></a></h6></div>
							</div>
						</li>
						<?php
					endwhile;
					wp_reset_postdata();
				} else {
					echo '<p>' . __( 'No result found.', 'traveladvisor' ) . '</p>';
				}
				?>
			</ul> 
			<?php
			echo traveladvisor_allow_special_char($traveladvisor_widget_end);
		}

	}

}
if (function_exists('cs_widget_register')) {
    cs_widget_register("traveladvisor_recentposts");
}
