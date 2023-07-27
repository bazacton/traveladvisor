<?php
/*
 * Frontend file for Blog short code
 */
if ( !function_exists( 'traveladvisor_blog_data' ) ) {

	function traveladvisor_blog_data( $atts, $content = "" ) {
		global $traveladvisor_var_blog_variables, $wpdb, $column_attributes, $traveladvisor_var_blog_num_post;
		$traveladvisor_counter_node = '';
		$defaults = shortcode_atts( array(
			'traveladvisor_var_column_size' => '',
			'traveladvisor_var_blog_title' => '',
			'traveladvisor_var_blog_view' => '',
			'traveladvisor_var_blog_category' => '',
			'traveladvisor_var_blog_orderby' => 'DESC',
			'orderby' => 'ID',
			'traveladvisor_var_blog_description' => 'yes',
			'traveladvisor_var_blog_excerpt' => '255',
			'traveladvisor_var_blog_num_post' => '10',
			'traveladvisor_var_blog_pagination' => '',
			'traveladvisor_var_blog_column' => '',
				), $atts );
		extract( shortcode_atts( $defaults, $atts ) );
		$traveladvisor_var_blog_view = isset( $traveladvisor_var_blog_view ) ? $traveladvisor_var_blog_view : '';
		$traveladvisor_var_blog_title = isset( $traveladvisor_var_blog_title ) ? $traveladvisor_var_blog_title : '';
		$traveladvisor_var_blog_category = isset( $traveladvisor_var_blog_category ) ? $traveladvisor_var_blog_category : '';
		$traveladvisor_var_blog_pagination = isset( $traveladvisor_var_blog_pagination ) ? $traveladvisor_var_blog_pagination : '1';
		$traveladvisor_var_blog_orderby = isset( $traveladvisor_var_blog_orderby ) ? $traveladvisor_var_blog_orderby : '';
		$traveladvisor_var_blog_description = isset( $traveladvisor_var_blog_description ) ? $traveladvisor_var_blog_description : '';
		$traveladvisor_var_blog_excerpt = isset( $traveladvisor_var_blog_excerpt ) ? $traveladvisor_var_blog_excerpt : '';
		$traveladvisor_var_blog_num_post = isset( $traveladvisor_var_blog_num_post ) ? $traveladvisor_var_blog_num_post : '';
		$traveladvisor_var_blog_column = isset( $traveladvisor_var_blog_column ) ? $traveladvisor_var_blog_column : '';
		$column_class = '';
//        if (isset($traveladvisor_var_column_size) && $traveladvisor_var_column_size != '') {
//            if (function_exists('traveladvisor_var_custom_column_class')) {
//                 $column_class = traveladvisor_var_custom_column_class($traveladvisor_var_column_size);
//            }
//        }
		if ( $traveladvisor_var_blog_column <> '' ) {
			$traveladvisor_var_blog_column = 12 / $traveladvisor_var_blog_column;
		} else {
			$traveladvisor_var_blog_column = 12;
		}
		$traveladvisor_var_blog_variables = array(
			'traveladvisor_var_blog_view' => $traveladvisor_var_blog_view,
			'traveladvisor_var_blog_title' => $traveladvisor_var_blog_title,
			'traveladvisor_var_blog_category' => $traveladvisor_var_blog_category,
			'traveladvisor_var_blog_orderby' => $traveladvisor_var_blog_orderby,
			'traveladvisor_var_blog_description' => $traveladvisor_var_blog_description,
			'traveladvisor_var_blog_excerpt' => $traveladvisor_var_blog_excerpt,
			'traveladvisor_var_blog_num_post' => $traveladvisor_var_blog_num_post,
			'traveladvisor_var_blog_pagination' => $traveladvisor_var_blog_pagination,
			'traveladvisor_var_blog_column' => $traveladvisor_var_blog_column,
		);
		static $traveladvisor_var_custom_counter;
		if ( !isset( $traveladvisor_var_custom_counter ) ) {
			$traveladvisor_var_custom_counter = 1;
		} else {
			$traveladvisor_var_custom_counter ++;
		}
		$traveladvisor_var_blog_page = isset( $_GET['blog_paging_' . $traveladvisor_var_custom_counter] ) ? $_GET['blog_paging_' . $traveladvisor_var_custom_counter] : '1';
		// Check Section or page layout
		$traveladvisor_var_sidebarLayout = '';
		$traveladvisor_var_section_layout = '';
		$pageSidebar = false;
		$box_col_class = 'col-md-3';
		if ( isset( $column_attributes->traveladvisor_layout ) ? $column_attributes->traveladvisor_layout : '' ) {
			$traveladvisor_var_section_layout = $column_attributes->traveladvisor_layout;
			if ( $traveladvisor_var_section_layout == 'left' || $traveladvisor_var_section_layout == 'right' ) {
				$pageSidebar = true;
			}
		}
		if ( $traveladvisor_var_sidebarLayout == 'left' || $traveladvisor_var_sidebarLayout == 'right' ) {
			$pageSidebar = true;
		}
		if ( $pageSidebar == true ) {
			$box_col_class = 'col-md-4';
		}
		$traveladvisor_counter_node++;
		ob_start();
		//filters
		$traveladvisor_var_filter_category = '';
		$filter_tag = '';
		$author_filter = '';
		if ( isset( $_GET['filter_category'] ) && $_GET['filter_category'] <> '' && $_GET['filter_category'] <> '0' ) {
			$traveladvisor_var_filter_category = $_GET['filter_category'];
		}
		//filters End      
		if ( empty( $_GET['page_id_all'] ) ) {
			$_GET['page_id_all'] = 1;
		}
		$traveladvisor_var_blog_num_post = $traveladvisor_var_blog_num_post ? $traveladvisor_var_blog_num_post : '-1';
		$args = array(
			'posts_per_page' => "-1",
			'post_type' => 'post',
			'order' => $traveladvisor_var_blog_orderby,
			'orderby' => $traveladvisor_var_blog_orderby,
			'post_status' => 'publish' );
		if ( isset( $traveladvisor_var_blog_category ) && $traveladvisor_var_blog_category <> '' && $traveladvisor_var_blog_category <> '0' ) {
			$blog_category_array = array( 'category_name' => "$traveladvisor_var_blog_category" );
			$args = array_merge( $args, $blog_category_array );
		}
		if ( isset( $traveladvisor_var_filter_category ) && $traveladvisor_var_filter_category <> '' && $traveladvisor_var_filter_category <> '0' ) {
			if ( isset( $_GET['filter-tag'] ) ) {
				$filter_tag = $_GET['filter-tag'];
			}
			if ( $filter_tag <> '' ) {
				$blog_category_array = array( 'category_name' => "$traveladvisor_var_filter_category", 'tag' => "$filter_tag" );
			} else {
				$blog_category_array = array( 'category_name' => "$traveladvisor_var_filter_category" );
			}
			$args = array_merge( $args, $blog_category_array );
		}
		if ( isset( $_GET['filter-tag'] ) && $_GET['filter-tag'] <> '' && $_GET['filter-tag'] <> '0' ) {
			$filter_tag = $_GET['filter-tag'];
			if ( $filter_tag <> '' ) {
				$course_category_array = array( 'category_name' => "$traveladvisor_var_filter_category", 'tag' => "$filter_tag" );
				$args = array_merge( $args, $course_category_array );
			}
		}
		if ( isset( $_GET['by_author'] ) && $_GET['by_author'] <> '' && $_GET['by_author'] <> '0' ) {
			$author_filter = $_GET['by_author'];
			if ( $author_filter <> '' ) {
				$authorArray = array( 'author' => "$author_filter" );
				$args = array_merge( $args, $authorArray );
			}
		}
		$query = new WP_Query( $args );
		$count_post = $query->post_count;
		$traveladvisor_var_blog_num_post = $traveladvisor_var_blog_num_post ? $traveladvisor_var_blog_num_post : '-1';
		$args = array( 'shortcode_paging' => $traveladvisor_var_blog_page, 'posts_per_page' => "$traveladvisor_var_blog_num_post", 'post_type' => 'post', 'paged' => $_GET['page_id_all'], 'order' => $traveladvisor_var_blog_orderby, 'orderby' => $orderby, 'post_status' => 'publish' );
		// Start  code for paging multipal shortcode 
		unset( $args['blog_paging_' . $traveladvisor_var_custom_counter] );
		if ( isset( $_GET['blog_paging_' . $traveladvisor_var_custom_counter] ) ) {
			$args['paged'] = $_GET['blog_paging_' . $traveladvisor_var_custom_counter];
		} else {
			$args['paged'] = 1;
		}
		if ( isset( $traveladvisor_var_blog_category ) && $traveladvisor_var_blog_category <> '' && $traveladvisor_var_blog_category <> '0' ) {
			$blog_category_array = array( 'category_name' => "$traveladvisor_var_blog_category" );
			$args = array_merge( $args, $blog_category_array );
		}
		if ( isset( $_GET['by_author'] ) && $_GET['by_author'] <> '' && $_GET['by_author'] <> '0' ) {
			$author_filter = $_GET['by_author'];
			if ( $author_filter <> '' ) {
				$authorArray = array( 'author' => "$author_filter" );
				$args = array_merge( $args, $authorArray );
			}
		}
		set_query_var( 'args', $args );

//        if (isset($column_class) && $column_class <> '') {
//            echo  '<div class="' . esc_html($column_class) . '">';
//        }
		?>        

		<div class="row">
			<?php
			if ( $traveladvisor_var_blog_view == 'blog-medium' ) {
				get_template_part( 'template/cs-blog/cs-blog', 'medium' );
			} else if ( $traveladvisor_var_blog_view == 'blog-large' ) {
				get_template_part( 'template/cs-blog/cs-blog', 'large' );
			} else if ( $traveladvisor_var_blog_view == 'blog-grid' ) {
				get_template_part( 'template/cs-blog/cs-blog', 'grid' );
			} else if ( $traveladvisor_var_blog_view == 'blog-timeline' ) {
				get_template_part( 'template/cs-blog/cs-blog', 'timeline' );
			} else if ( $traveladvisor_var_blog_view == 'blog-fancy' ) {
				get_template_part( 'template/cs-blog/cs-blog', 'fancy' );
			}
//        if (isset($column_class) && $column_class <> '') {
//            echo  '</div>';
//        }
			// End Templates and Pagination start 
			$traveladvisor_var_blog_page = 'blog_paging_' . $traveladvisor_var_custom_counter;
			if ( $traveladvisor_var_blog_pagination == "yes" && $count_post > $traveladvisor_var_blog_num_post && $traveladvisor_var_blog_num_post > 0 ) {
				$qrystr = '';
				$traveladvisor_current_page = isset( $_GET[$traveladvisor_var_blog_page] ) ? $_GET[$traveladvisor_var_blog_page] : 1;
				$total_pages = '';
				$total_pages = ceil( $count_post / $traveladvisor_var_blog_num_post );
				if ( $traveladvisor_var_blog_view <> 'blog-timeline' ) {
					echo traveladvisor_var_get_pagination( $total_pages, $traveladvisor_current_page, $traveladvisor_var_blog_page );
				}
			}
			?>
		</div>
		<?php
		wp_reset_postdata();
		$post_data = ob_get_clean();
		return $post_data;
	}

	if ( function_exists( 'traveladvisor_short_code' ) ) {
		traveladvisor_short_code( 'traveladvisor_blog', 'traveladvisor_blog_shortcode' );
	}
}
if ( function_exists( 'traveladvisor_var_short_code' ) )
	traveladvisor_var_short_code( 'traveladvisor_blog', 'traveladvisor_blog_data' );
if ( !function_exists( 'traveladvisor_get_categories' ) ) {

	function traveladvisor_get_categories( $traveladvisor_blog_cat ) {
		global $post, $wpdb;
		if ( isset( $traveladvisor_blog_cat ) && $traveladvisor_blog_cat != '' && $traveladvisor_blog_cat != '0' ) {
			$row_cat = $wpdb->get_row( $wpdb->prepare( "SELECT * from $wpdb->terms WHERE slug = %s", $traveladvisor_blog_cat ) );
			echo '<a href="' . esc_url( home_url( '/' ) ) . '?cat=' . $row_cat->term_id . '">' . $row_cat->name . '</a>';
		} else {
			// Get All Categories 
			$before_cat = "";
			$traveladvisor_var_categories_list = get_the_term_list( get_the_id(), 'category', $before_cat, ', ', '' );
			if ( $traveladvisor_var_categories_list ) {
				printf( '%1$s', $traveladvisor_var_categories_list );
			}
			// End if Categories 
		}
	}

}