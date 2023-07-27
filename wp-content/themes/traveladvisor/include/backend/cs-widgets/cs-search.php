<?php

/**
 * @Recent posts widget Class
 *
 *
 */
if ( !class_exists( 'traveladvisor_search' ) ) {

	class traveladvisor_search extends WP_Widget {

		/**
		 * @init Recent posts Module
		 *
		 *
		 */
		public function __construct() {
			parent::__construct(
					'traveladvisor_search', // Base ID
					traveladvisor_var_theme_text_srt( 'traveladvisor_var_search' ), // Name
					array( 'classname' => 'widget-recent-blog', 'description' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_search_desc' ), ) // Args
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
				'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_search_title' ),
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
		}

		/**
		 * @Recent posts update form data
		 *
		 *
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = $new_instance['title'];

			return $instance;
		}

		/**
		 * @Display Recent posts widget
		 *
		 */
		function widget( $args, $instance ) {
			global $traveladvisor_node, $wpdb, $post;
			extract( $args, EXTR_SKIP );
			$title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
			$title = wp_specialchars_decode( stripslashes( $title ) );



			$traveladvisor_address = esc_url( home_url( '/' ) );
			echo '<div class="widget widget-search">';
			if ( isset( $title ) && $title != '' ) {
				echo '<div class="widget-title"><h4>' . $title . '</h4></div>';
			}
			echo '<div class="widget widget-search">
	                <form method="get" action="' . $traveladvisor_address . '">
	                  <input type="text" name="s" placeholder="' . __( 'Enter keyword', 'traveladvisor' ) . '">
	                  <label><input type="submit" value="submit"></label>
	                </form>';

			echo '</div>';
			echo '</div>';
		}

	}

}
if (function_exists('cs_widget_register')) {
    cs_widget_register("traveladvisor_search");
}
