<?php

/**
 * @Recent posts widget Class
 *
 *
 */
if ( !class_exists( 'traveladvisor_categories' ) ) {

	class traveladvisor_categories extends WP_Widget {

		/**
		 * @init Recent posts Module
		 *
		 *
		 */
		public function __construct() {
			parent::__construct(
					'traveladvisor_categories', // Base ID
					traveladvisor_var_theme_text_srt( 'traveladvisor_var_categories_blog' ), array( 'classname' => 'widget-recent-blog', 'description' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_categories_about' ), ) // Args
			);
		}

		/**
		 * @Recent posts html form
		 *
		 *
		 */
		function form( $instance ) {
			global $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
			$instance = wp_parse_args( ( array ) $instance, array( 'title' => '' ) );
			$title = $instance['title'];

			$traveladvisor_opt_array = array(
				'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_categories_title' ),
				'desc' => '',
				'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_categories_title_hint' ),
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
		}

		/**
		 * @Recent posts update form data
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = $new_instance['title'];

			return $instance;
		}

		/**
		 * @Display Recent posts widget
		 */
		function widget( $args, $instance ) {
			global $traveladvisor_node, $wpdb, $post;
			extract( $args, EXTR_SKIP );
			$traveladvisor_widget_start = '<div class="widget widget-categories">';
			$traveladvisor_widget_end = '</div>';
			$title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
			$title = wp_specialchars_decode( stripslashes( $title ) );
			$traveladvisor_categories = get_categories(
					$args = array( 'taxonomy' => 'category' )
			);
			if ( !empty( $traveladvisor_categories ) ) {
				echo traveladvisor_allow_special_char($traveladvisor_widget_start);
				if ( isset( $title ) && $title != '' ) {
					echo '<div class="widget-title"><h4>' . $title . '</h4></div>';
				}
				echo '<ul>';
				foreach ( $traveladvisor_categories as $traveladvisor_name ) {
					if ( is_object( $traveladvisor_name ) ) {
						echo '<li><i class="icon-angle-right"></i><a href="' . get_term_link( $traveladvisor_name ) . '">' . $traveladvisor_name->name . '</a>(' . absint( $traveladvisor_name->count ) . ')</li>';
					}
				}
				echo '
                </ul>' . $traveladvisor_widget_end;
			}
		}

	}

}
if (function_exists('cs_widget_register')) {
    cs_widget_register("traveladvisor_categories");
}