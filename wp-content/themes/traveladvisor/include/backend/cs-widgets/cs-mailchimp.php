<?php

/**
 * @MailChimp widget Class
 *
 *
 */
if ( !class_exists( 'traveladvisor_mailchimp' ) ) {

	class traveladvisor_mailchimp extends WP_Widget {
		/**
		 * Outputs the content of the widget
		 *
		 * @param array $args
		 * @param array $instance
		 */

		/**
		 * @init MailChimp Module
		 *
		 *
		 */
		public function __construct() {
			global $traveladvisor_var_static_text;

			parent::__construct(
					'traveladvisor_mailchimp', // Base ID
					traveladvisor_var_theme_text_srt( 'traveladvisor_var_mailchimp' ), // Name
					array( 'classname' => 'widget-news-letter', 'description' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_mailchimp_desc' ), ) // Args
			);
		}

		/**
		 * @MailChimp html form
		 *
		 *
		 */
		function form( $instance ) {
			global $traveladvisor_var_form_fields, $traveladvisor_var_html_fields, $traveladvisor_var_static_text;
			// $strings = new traveladvisor_theme_all_strings;
			// $strings->traveladvisor_short_code_strings();
			$instance = wp_parse_args( ( array ) $instance, array( 'title' => '' ) );

			$title = $instance['title'];

			$description = isset( $instance['description'] ) ? esc_attr( $instance['description'] ) : '';

			$traveladvisor_opt_array = array(
				'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_mailchimp_title' ),
				'desc' => '',
				'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_mailchimp_title_hint' ),
				'echo' => true,
				'field_params' => array(
					'std' => esc_attr( $title ),
					'cust_id' => '',
					'cust_name' => traveladvisor_allow_special_char( $this->get_field_name( 'title' ) ),
					'return' => true,
				),
			);

			$traveladvisor_var_html_fields->traveladvisor_var_text_field( $traveladvisor_opt_array );

			$traveladvisor_opt_array = array(
				'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_mailchimp_description' ),
				'desc' => '',
				'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_mailchimp_description_hint' ),
				'echo' => true,
				'field_params' => array(
					'std' => esc_attr( $description ),
					'cust_id' => '',
					'cust_name' => traveladvisor_allow_special_char( $this->get_field_name( 'description' ) ),
					'return' => true,
				),
			);

			$traveladvisor_var_html_fields->traveladvisor_var_textarea_field( $traveladvisor_opt_array );
		}

		/**
		 * @MailChimp update form data
		 *
		 *
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = $new_instance['title'];
			$instance['description'] = $new_instance['description'];
			$instance['social_switch'] = $new_instance['social_switch'];
			return $instance;
		}

		/**
		 * @Display MailChimp widget
		 *
		 *
		 */
		function widget( $args, $instance ) {
			global $traveladvisor_node, $social_switch;

			extract( $args, EXTR_SKIP );
			$title = empty( $instance['title'] ) ? ' ' : apply_filters( 'widget_title', $instance['title'] );
			$description = empty( $instance['description'] ) ? ' ' : apply_filters( 'widget_title', $instance['description'] );
			$social_switch = empty( $instance['social_switch'] ) ? ' ' : apply_filters( 'widget_title', $instance['social_switch'] );
			echo traveladvisor_allow_special_char( $before_widget );
			if ( !empty( $title ) && $title <> ' ' ) {
				echo traveladvisor_allow_special_char( $before_title );
				echo traveladvisor_allow_special_char( $title );
				echo traveladvisor_allow_special_char( $after_title );
			}
			global $wpdb, $post;
			/**
			 * @Display MailChimp
			 *
			 *
			 */
			if ( function_exists( 'traveladvisor_custom_mailchimp' ) ) {
				echo '<p>';
				echo esc_html( $description );
				echo '</p>';
				echo traveladvisor_custom_footermailchimp();
			}
			echo traveladvisor_allow_special_char( $after_widget );
		}

	}

}
if (function_exists('cs_widget_register')) {
    cs_widget_register("traveladvisor_mailchimp");
}