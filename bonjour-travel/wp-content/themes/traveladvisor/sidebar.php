<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @subpackage Traveladvisor
 * @since Traveladvisor 1.0
 */
 if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
	<aside class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
