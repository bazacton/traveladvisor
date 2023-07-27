<?php

/**
 * @Recent posts widget Class
 *
 *
 */
if ( !class_exists( 'traveladvisor_aboutus' ) ) {

	class traveladvisor_aboutus extends WP_Widget {

		/**
		 * @init Recent posts Module
		 *
		 *
		 */
		public function __construct() {
			parent::__construct(
					'traveladvisor_aboutus', // Base ID ;
					traveladvisor_var_theme_text_srt( 'traveladvisor_var_about_about_us' ), // Name
					array( 'classname' => 'widget-recent-blog', 'description' => __( 'About Us from category.', 'traveladvisor' ), ) // Args
			);
		}

		/**
		 * @Recent posts html form
		 *
		 *
		 */
		function form( $instance ) {
			global $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
			$instance = wp_parse_args( ( array ) $instance, array( 'title' => '', 'description' => '', 'frame' => '' ) );
			$title = $instance['title'];
			$description = isset( $instance['description'] ) ? $instance['description'] : '';
			$frame = isset( $instance['frame'] ) ? $instance['frame'] : '';

			$traveladvisor_opt_array = array(
				'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_about_title' ),
				'desc' => '',
				'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_about_title_hint' ),
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
				'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_about_description' ),
				'desc' => '',
				'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_about_description_hint' ),
				'echo' => true,
				'field_params' => array(
					'std' => esc_attr( $description ),
					'id' => traveladvisor_allow_special_char( $this->get_field_id( 'description' ) ),
					'classes' => '',
					'cust_id' => traveladvisor_allow_special_char( $this->get_field_name( 'description' ) ),
					'cust_name' => traveladvisor_allow_special_char( $this->get_field_name( 'description' ) ),
					'return' => true,
					'required' => false
				),
			);
			$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );


			$traveladvisor_opt_array = array(
				'std' => $frame,
				'id' => 'frame',
				'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_about_image' ),
				'desc' => '',
				'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_about_image_hint' ),
				'echo' => true,
				'array' => true,
				'field_params' => array(
					'std' => $frame,
					'return' => true,
					'cust_name' => traveladvisor_allow_special_char( $this->get_field_name( 'frame' ) ),
					'cust_id' => 'frame',
					'id' => 'frame',
					'array' => true,
					'array_txt' => false,
				),
			);

			$traveladvisor_var_html_fields->traveladvisor_var_upload_file_field( $traveladvisor_opt_array );
		}

		/**
		 * @Recent posts update form data
		 *
		 *
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = $new_instance['title'];
			$instance['frame'] = $new_instance['frame'];
			$instance['description'] = $new_instance['description'];
			return $instance;
		}

		/**
		 * @Display Recent posts widget
		 *
		 */
		function widget( $args, $instance ) {
			global $traveladvisor_node, $wpdb, $post, $traveladvisor_var_options;
			extract( $args, EXTR_SKIP );
			$traveladvisor_widget_start = '<div class="widget widget-about-us">';
			$traveladvisor_widget_end = '</div>';
			$title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
			$title = wp_specialchars_decode( stripslashes( $title ) );

			$description = empty( $instance['description'] ) ? ' ' : $instance['description'];
			$frame = empty( $instance['frame'] ) ? '' : $instance['frame'];


			echo traveladvisor_allow_special_char($traveladvisor_widget_start);
			if ( isset( $title ) && $title != '' ) {
				echo '<div class="widget-title"><h4>' . $title . '</h4></div>';
			}
			echo '<div class="cs-media">';
			if ( $frame != "" ) {
				echo '<figure>';
				echo '<img src="' . $frame . '" alt="frame"></figure>';
			}
			echo '</div>
	                <div class="cs-text">
	                 <P>' . $description . '</P>
	                </div>' . $traveladvisor_widget_end;
		}

	}
 if (function_exists('cs_widget_register')) {
        cs_widget_register('traveladvisor_aboutus');
    }
}

   

