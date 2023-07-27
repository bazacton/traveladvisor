<?php
/*
  header Classis Template
 */
?>
<header id="header"> 
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
				<?php
				traveladvisor_var_logo();
				$traveladvisor_var_options = TRAVELADVISOR_VAR_GLOBALS()->theme_options();
				$traveladvisor_var_book_now = $traveladvisor_var_options['traveladvisor_var_book_now'];
				?>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-6 col-xs-6">
                <div class="cs-main-nav pull-right">
                    <nav class="main-navigation">
						<?php
						/**
						 * Navigation Menu template functions
						 *
						 * @package WordPress
						 * @subpackage Nav_Menus
						 * @since 3.0.0
						 */

						/**
						 * Create HTML list of nav menu items.
						 *
						 * @since 3.0.0
						 * @uses Walker
						 */
						class Traveladvisor_Walker_Nav_Menu extends Walker {

							public $hasbg;
							public $tree_type = array( 'post_type', 'taxonomy', 'custom' );
							public $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

							public function start_lvl( &$output, $depth = 0, $args = array() ) {
								$indent = str_repeat( "\t", $depth );
								$output .= "\n$indent<ul class=\"sub-menu " . $this->hasbg->classes[0] . " \">\n";
							}

							public function end_lvl( &$output, $depth = 0, $args = array() ) {
								$indent = str_repeat( "\t", $depth );
								$output .= "$indent</ul>\n";
							}

							public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
								$this->hasbg = $item;
								$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
								$classes = empty( $item->classes ) ? array() : ( array ) $item->classes;
								$classes[] = 'menu-item-' . $item->ID;
								$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
								$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
								$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
								$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
								$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
								$removed_hasbg = str_replace( $classes[0], ' ', $class_names );
								$output .= $indent . '<li' . $id . $removed_hasbg . '>';
								$atts = array();
								$atts['title'] = !empty( $item->attr_title ) ? $item->attr_title : '';
								$atts['target'] = !empty( $item->target ) ? $item->target : '';
								$atts['rel'] = !empty( $item->xfn ) ? $item->xfn : '';
								$atts['href'] = !empty( $item->url ) ? $item->url : '';
								$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
								$attributes = '';
								foreach ( $atts as $attr => $value ) {
									if ( !empty( $value ) ) {
										$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
										$attributes .= ' ' . $attr . '="' . $value . '"';
									}
								}
								$title = apply_filters( 'the_title', $item->title, $item->ID );
								$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
								$item_output = $args->before;
								$item_output .= '<a' . $attributes . '>';
								$item_output .= $args->link_before . $title . $args->link_after;
								$item_output .= '</a>';
								$item_output .= $args->after;
								$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
							}

							public function end_el( &$output, $item, $depth = 0, $args = array() ) {
								$output .= "</li>\n";
							}

						}

						// Walker_Nav_Menu

						$defaults = array(
							'theme_location' => '',
							'menu' => '',
							'container' => '',
							'container_class' => '',
							'container_id' => '',
							'menu_class' => "",
							'menu_id' => "",
							'echo' => true,
							'fallback_cb' => 'wp_page_menu',
							'before' => '',
							'after' => '',
							'link_before' => '',
							'link_after' => '',
							'items_wrap' => '<ul class="%1$s">%3$s</ul>',
							'depth' => '',
						);

						if ( has_nav_menu( 'primary-menu' ) ) {

							$defaults = array(
								'theme_location' => 'primary-menu',
								'menu' => '',
								'container' => '',
								'container_class' => '',
								'container_id' => '',
								'menu_class' => "",
								'menu_id' => "",
								'echo' => true,
								'fallback_cb' => 'wp_page_menu',
								'before' => '',
								'after' => '',
								'link_before' => '',
								'link_after' => '',
								'items_wrap' => '<ul class="%1$s">%3$s</ul>',
								'depth' => '',
								'walker' => new Traveladvisor_Walker_Nav_Menu(), //use our custom walker
							);
						}

						wp_nav_menu( $defaults );

						function wpdotraveladvisor_add_menu_parent_class( $items ) {
							$parents = array();

							// Collect menu items with parents.
							foreach ( $items as $item ) {
								if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
									$parents[] = $item->menu_item_parent;
								}
							}

							// Add class.
							foreach ( $items as $item ) {
								if ( in_array( $item->ID, $parents ) ) {
									$item->classes[] = 'has-bg';
								}
							}
							return $items;
						}

						add_filter( 'wp_nav_menu_objects', 'wpdotraveladvisor_add_menu_parent_class' );
						?>

                        <div class="cs-responsive-menu"></div>
                    </nav>

					<?php
					echo '<div class="cs-search-area hidden-lg hidden-md hidden-sm hidden-xs">
                            <div class="search-area"> <a href="#"><i class="icon-search2"></i></a>
                                <form action=' . esc_url( home_url( '/' ) ) . '>
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
					echo '</div>';
					?>
				</div>
			</div>
		</div>
    </div>
</header>

