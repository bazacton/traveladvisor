<?php

/**
 * @Recent posts widget Class
 *
 *
 */
if ( !class_exists( 'traveladvisor_text' ) ) {

	class traveladvisor_text extends WP_Widget {

		/**
		 * @init Recent posts Module
		 *
		 *
		 */
		public function __construct() {
			parent::__construct(
					'traveladvisor_text', // Base ID ;
					traveladvisor_var_theme_text_srt( 'traveladvisor_var_text' ), // Name
					array( 'classname' => 'widget-recent-blog', 'description' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_arbitrary_text' ), ) // Args
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
			$description = isset( $instance['description'] ) ? $instance['description'] : '';

			$traveladvisor_opt_array = array(
				'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_about_title' ),
				'desc' => '',
				'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_title_hint' ),
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


			$traveladvisor_opt_array = array(
				'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_content' ),
				'desc' => '',
				'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_text_content_hint' ),
				'echo' => true,
				'field_params' => array(
					'std' => esc_attr( $description ),
					'id' => traveladvisor_allow_special_char( $this->get_field_id( 'description' ) ),
					'classes' => 'txtfield',
					'cust_id' => traveladvisor_allow_special_char( $this->get_field_name( 'description' ) ),
					'cust_name' => traveladvisor_allow_special_char( $this->get_field_name( 'description' ) ),
					'return' => true,
					'required' => false,
				),
			);
			$traveladvisor_var_html_fields->traveladvisor_var_textarea_field( $traveladvisor_opt_array );
		}

		/**
		 * @Recent posts update form data
		 *
		 *
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = $new_instance['title'];
			$instance['description'] = $new_instance['description'];
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
			$description = empty( $instance['description'] ) ? ' ' : $instance['description'];
			echo '<div class="widget widget-text">';
			if ( isset( $title ) && $title != '' ) {
				echo '<div class="widget-title"><h4>' . $title . '</h4></div>';
			}
			echo '<div class="cs-text">' . do_shortcode( $description ) . '</div>
	            </div>';
		}

	}

}
if (function_exists('cs_widget_register')) {
    cs_widget_register("traveladvisor_text");
}

