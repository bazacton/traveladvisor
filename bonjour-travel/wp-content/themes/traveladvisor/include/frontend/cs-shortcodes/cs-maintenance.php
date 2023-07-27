<?php
/*
 *
 * @Shortcode Name : Maintenance
 * @retrun
 *
 */
if ( !function_exists( 'traveladvisor_var_maintenance' ) ) {

	function traveladvisor_var_maintenance( $atts, $content = "" ) {
		global $post, $wp_query, $traveladvisor_var_post_meta;
		$traveladvisor_var_options = TRAVELADVISOR_VAR_GLOBALS()->theme_options();
		$defaults = array(
			'traveladvisor_var_column_size' => '',
			'traveladvisor_var_column' => '1',
			// 'traveladvisor_var_maintenance_text' => '',
			'traveladvisor_var_maintenance_image_url_array' => '',
			'traveladvisor_var_maintenance_title' => '',
			'traveladvisor_var_lunch_date' => '',
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$column_class = '';
		if ( isset( $traveladvisor_var_column_size ) && $traveladvisor_var_column_size != '' ) {
			if ( $traveladvisor_var_column_size <> '' ) {
				$column_class = traveladvisor_custom_column_class( $traveladvisor_var_column_size );
			}
		}
		if ( isset( $column_class ) && $column_class <> '' ) {
			echo '<div class="' . esc_html( $column_class ) . '">';
		}
		//$traveladvisor_var_maintenance_text = isset($traveladvisor_var_maintenance_text) ? $traveladvisor_var_maintenance_text : '';
		$traveladvisor_var_maintenance_image_url_array = isset( $traveladvisor_var_maintenance_image_url_array ) ? $traveladvisor_var_maintenance_image_url_array : '';
		$traveladvisor_var_maintenance_title = isset( $traveladvisor_var_maintenance_title ) ? $traveladvisor_var_maintenance_title : '';
		$traveladvisor_var_maintenance_text = $content;
		$traveladvisor_var_lunch_date = isset( $traveladvisor_var_lunch_date ) ? $traveladvisor_var_lunch_date : '';
		$traveladvisor_var_coming_soon_switch = $traveladvisor_var_options['traveladvisor_var_coming_soon_switch'];
		$traveladvisor_var_coming_logo_switch = $traveladvisor_var_options['traveladvisor_var_coming_logo_switch'];
		$traveladvisor_var_header_switch = $traveladvisor_var_options['traveladvisor_var_header_switch'];
		$traveladvisor_var_footer_switch = $traveladvisor_var_options['traveladvisor_var_footer_setting'];
		$traveladvisor_var_coming_social_switch = $traveladvisor_var_options['traveladvisor_var_coming_social_switch'];
		$traveladvisor_var_coming_newsletter_switch = $traveladvisor_var_options['traveladvisor_var_coming_newsletter_switch'];
		$traveladvisor_var_date = date( "Y/m/d", strtotime( $traveladvisor_var_lunch_date ) );
		$traveladvisor_var_date = isset( $traveladvisor_var_date ) ? $traveladvisor_var_date : '2017/04/10';
		$traveladvisor_var_maintenance = '';
		ob_start();
		traveladvisor_var_counter();
		?>

		<div class="cs-construction" data-value="<?php echo esc_js( $traveladvisor_var_date ); ?>">
			<?php if ( $traveladvisor_var_maintenance_image_url_array <> '' && $traveladvisor_var_coming_logo_switch == "on" ) { ?>
				<div class="coming-soon-logo">
					<img src="<?php echo esc_url( $traveladvisor_var_maintenance_image_url_array ) ?>" alt="traveladvisor_var_maintenance_image_url_array" />
				</div>
			<?php }
			?>
			<h1><?php echo esc_html( $traveladvisor_var_maintenance_title ); ?></h1>
			<div class="cs-const-counter">
				<div id="getting-started"></div>
			</div>
			<?php if ( $traveladvisor_var_maintenance_text <> '' ) { ?>
				<p><?php echo do_shortcode( $traveladvisor_var_maintenance_text ); ?></p>
				<?php
			}
			if ( $traveladvisor_var_coming_newsletter_switch <> '' && $traveladvisor_var_coming_newsletter_switch == "on" ) {
				traveladvisor_custom_mailchimp();
				?>
			<?php } if ( $traveladvisor_var_coming_social_switch <> '' && $traveladvisor_var_coming_social_switch == "on" ) { ?>
				<div class="cs-social-media">
					<ul>
						<?php echo traveladvisor_var_social_network(); ?>
					</ul>
				</div>
			<?php } ?>
		</div>
		<?php
		if ( isset( $column_class ) && $column_class <> '' ) {
			echo '</div>';
		}
		$traveladvisor_var_maintenance = ob_get_clean();
		return $traveladvisor_var_maintenance;
	}

	if ( function_exists( 'traveladvisor_var_short_code' ) )
		traveladvisor_var_short_code( 'traveladvisor_maintenance', 'traveladvisor_var_maintenance' );
}