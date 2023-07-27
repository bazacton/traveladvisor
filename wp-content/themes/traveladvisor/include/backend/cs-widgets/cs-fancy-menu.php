<?php

if ( !class_exists( 'traveladvisor_fancy_menu' ) ) {

	class traveladvisor_fancy_menu extends WP_Widget {
		/**
		 * Outputs the content of the widget
		 *
		 * @param array $args
		 * @param array $instance
		 */

		/**
		 * @init Fancy Menu Module
		 *
		 *
		 */
		public function __construct() {

			parent::__construct(
					'traveladvisor_fancy_menu', // Base ID
					traveladvisor_var_theme_text_srt( 'traveladvisor_var_fmenu' ), // Name
					array( 'classname' => 'cs-fancy-menu', 'description' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_fmenu_hint' ), ) // Args
			);
		}

		/**
		 * @Fancy Menu html form
		 *
		 *
		 */
		function form( $instance ) {
			global $traveladvisor_var_form_fields, $traveladvisor_var_html_fields;
			$instance = wp_parse_args( ( array ) $instance, array( 'title' => '' ) );
			$traveladvisor_widget_title = $instance['title'];
			$traveladvisor_menu_name = isset( $instance['traveladvisor_menu_name'] ) ? esc_attr( $instance['traveladvisor_menu_name'] ) : '';
			$traveladvisor_menu_view = isset( $instance['traveladvisor_menu_view'] ) ? esc_attr( $instance['traveladvisor_menu_view'] ) : '';
			$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
			// If no menus exists, traveladvisorect the user to go and create some.
			if ( !$menus ) {
				echo '<p>' . sprintf( traveladvisor_var_theme_text_srt( 'traveladvisor_var_fmenu_no_menu' ) . '<a href="%s">Create some</a>', admin_url( 'nav-menus.php' ) ) . '</p>';
				return;
			}
			foreach ( $menus as $menu ) {
				$all_options[$menu->term_id] = $menu->name;
			}

			$traveladvisor_opt_array = array(
				'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_fmenu_title' ),
				'desc' => '',
				'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_fmenu_title_hint' ),
				'echo' => true,
				'field_params' => array(
					'std' => esc_attr( $traveladvisor_widget_title ),
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
				'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_fmenu_selectmenu' ),
				'desc' => '',
				'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_fmenu_selectmenu_hint' ),
				'echo' => true,
				'field_params' => array(
					'std' => esc_html( $traveladvisor_menu_name ),
					'cust_name' => traveladvisor_allow_special_char( $this->get_field_name( 'traveladvisor_menu_name' ) ),
					'cust_id' => traveladvisor_allow_special_char( $this->get_field_name( 'traveladvisor_menu_name' ) ),
					'id' => '',
					'classes' => 'chosen-select cs-recentpost-width',
					'options' => $all_options,
					'return' => true,
				),
			);
			$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );


			$traveladvisor_opt_array = array(
				'name' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_fmenu_select_view' ),
				'desc' => '',
				'hint_text' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_fmenu_select_view_hint' ),
				'echo' => true,
				'field_params' => array(
					'std' => esc_html( $traveladvisor_menu_view ),
					'cust_name' => traveladvisor_allow_special_char( $this->get_field_name( 'traveladvisor_menu_view' ) ),
					'cust_id' => traveladvisor_allow_special_char( $this->get_field_name( 'traveladvisor_menu_view' ) ),
					'id' => '',
					'classes' => 'dropdown chosen-select',
					'options' => array(
						'simple' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_fmenu_simple' ),
						'fancy' => traveladvisor_var_theme_text_srt( 'traveladvisor_var_fmenu_fancy' ),
					),
					'return' => true,
				),
			);
			$traveladvisor_var_html_fields->traveladvisor_var_select_field( $traveladvisor_opt_array );
		}

		/**
		 * @Fancy menu update form data
		 *
		 *
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = $new_instance['title'];
			$instance['traveladvisor_menu_name'] = $new_instance['traveladvisor_menu_name'];
			$instance['traveladvisor_menu_view'] = $new_instance['traveladvisor_menu_view'];
			return $instance;
		}

		// Fancy menu Widget View
		function widget( $args, $instance ) {
			global $traveladvisor_node, $wpdb, $post;
			extract( $args, EXTR_SKIP );
			$traveladvisor_widget_title = empty( $instance['title'] ) ? ' ' : apply_filters( 'widget_title', $instance['title'] );
			$traveladvisor_widget_title = wp_specialchars_decode( stripslashes( $traveladvisor_widget_title ) );
			$traveladvisor_menu_name = empty( $instance['traveladvisor_menu_name'] ) ? ' ' : apply_filters( 'widget_title', $instance['traveladvisor_menu_name'] );
			$traveladvisor_menu_view = empty( $instance['traveladvisor_menu_view'] ) ? ' ' : apply_filters( 'widget_title', $instance['traveladvisor_menu_view'] );
//            echo traveladvisor_allow_special_char($before_widget);
			//$traveladvisor_menu_class = $traveladvisor_sticky_menu == true ? 'shortcode-nav cs-stickynav' : 'shortcode-nav';
			$traveladvisor_menu_arg = array(
				'theme_location' => 'main-menu',
				'menu' => $traveladvisor_menu_name,
				'container' => '',
				'container_class' => '',
				'container_id' => '',
				'menu_class' => 'menu',
				'menu_id' => '',
				'echo' => true,
				'fallback_cb' => 'wp_page_menu',
				'before' => '',
				'after' => '',
				'link_before' => '',
				'link_after' => '',
				'items_wrap' => '<ul>%3$s</ul>',
				'depth' => 0,
				'walker' => ''
			);
			if ( isset( $traveladvisor_menu_view ) && $traveladvisor_menu_view == 'fancy' ) {
				echo '<div class="widget nav-widget">';
			}
			if ( isset( $traveladvisor_menu_view ) && $traveladvisor_menu_view == 'simple' ) {
				echo '<div class="widget widget-faq">';
			}

			if ( !empty( $traveladvisor_widget_title ) && $traveladvisor_widget_title <> '' ) {
				if ( isset( $traveladvisor_menu_view ) && $traveladvisor_menu_view == 'fancy' ) {
					echo '<div class="widget-title">
                            <h6>' . traveladvisor_allow_special_char( $traveladvisor_widget_title ) . '</h6>
                        </div>';
				}
				if ( isset( $traveladvisor_menu_view ) && $traveladvisor_menu_view == 'simple' ) {
					echo '<div class="widget-title">
                            <h4>' . traveladvisor_allow_special_char( $traveladvisor_widget_title ) . '</h4>
                        </div>';
				}
			}
			wp_nav_menu( $traveladvisor_menu_arg );
			echo '</div>';

//            echo traveladvisor_allow_special_char($after_widget);
		}

	}

}
if (function_exists('cs_widget_register')) {
    cs_widget_register("traveladvisor_fancy_menu");
}