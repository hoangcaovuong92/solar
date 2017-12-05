<?php
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	if (!class_exists('tvlgiao_wpdance_widget_product_color_filter')) {
		class tvlgiao_wpdance_widget_product_color_filter extends WP_Widget {

			var $wpdance_widget_cssclass;
			var $wpdance_widget_description;
			var $wpdance_widget_idbase;
			var $wpdance_widget_name;

			function __construct() {
				/* Widget variable settings. */
				$this->wpdance_widget_cssclass 		= 'wpdance widget_wd_pc_color_nav wd_widget_product_filter_by_color';
				$this->wpdance_widget_description	= __( 'Shows colors filter for product category/shop page.', 'wd_package' );
				$this->wpdance_widget_idbase 		= 'wd_widget_product_filter_by_color';
				$this->wpdance_widget_name 			= __( 'WD - Product Colors Filter', 'wd_package' );

				/* Widget settings. */
				$widget_ops = array( 'classname' => $this->wpdance_widget_cssclass, 'description' => $this->wpdance_widget_description );

				/* Create the widget. */
				parent::__construct( 'wd_widget_product_filter_by_color', $this->wpdance_widget_name, $widget_ops );
			}

			/**
			 * widget function.
			 *
			 * @see WP_Widget
			 * @access public
			 * @param array $args
			 * @param array $instance
			 * @return void
			 */
			function widget( $args, $instance ) {
				ob_start();
				global $_chosen_attributes, $woocommerce, $_attributes_array;
				extract( $args );

				if ( ! is_post_type_archive( 'product' ) && ! is_tax( array_merge( array($_attributes_array), array( 'product_cat', 'product_tag' ) ) ) && ! is_page_template( 'page-templates/template-woocomerce.php' ) )
					return;
				//if ( ! is_post_type_archive( 'product' ) )
				//	return;
				$current_term 	= $_attributes_array && is_tax( $_attributes_array ) ? get_queried_object()->term_id : '';
				$current_tax 	= $_attributes_array && is_tax( $_attributes_array ) ? get_queried_object()->taxonomy : '';
				$instance['attribute'] = 'color';

				$title 			= apply_filters('widget_title', $instance['title'], $instance, $this->id_base);
				$taxonomy 		= wc_attribute_taxonomy_name($instance['attribute']);
				$query_type 	= isset( $instance['query_type'] ) ? $instance['query_type'] : 'and';

				if ( ! taxonomy_exists( $taxonomy ) )
					return;

				$terms 			= get_terms( $taxonomy, array( 'hide_empty' => '1' ) );
				$term_counts    = $this->get_filtered_term_product_counts( wp_list_pluck( $terms, 'term_id' ), $taxonomy, $query_type );
				if ( count( $terms ) > 0 ) {
					$found = false;

					echo $before_widget . $before_title . $title . $after_title;

					// Force found when option is selected - do not force found on taxonomy attributes
					if ( ! $_attributes_array || ! is_tax( $_attributes_array ) )
						if ( is_array( $_chosen_attributes ) && array_key_exists( $taxonomy, $_chosen_attributes ) )
							$found = true;

					// List display
					echo '<ul class="wd-filter-by-color-list">';
					foreach ( $terms as $term ) {

						// Get count based on current view - uses transients
						$transient_name = 'wc_ln_count_' . md5( sanitize_key( $taxonomy ) . sanitize_key( $term->term_id ) );

						if ( false === ( $_products_in_term = get_transient( $transient_name ) ) ) {

							$_products_in_term = get_objects_in_term( $term->term_id, $taxonomy );

							set_transient( $transient_name, $_products_in_term );
						}

						$option_is_set = ( isset( $_chosen_attributes[ $taxonomy ] ) && in_array( $term->term_id, $_chosen_attributes[ $taxonomy ]['terms'] ) );
						
						// skip the term for the current archive
						if ( $current_term == $term->term_id )
							continue;
						
						// If this is an AND query, only show options with count > 0
						if ( $query_type == 'and' ) {

							$count = isset( $term_counts[ $term->term_id ] ) ? $term_counts[ $term->term_id ] : 0;

							if ( $count > 0 && $current_term !== $term->term_id )
								$found = true;

							if ( $count == 0 && ! $option_is_set )
								continue;

						// If this is an OR query, show all options so search can be expanded
						} else {

							// skip the term for the current archive
							if ( $current_term == $term->term_id )
								continue;

							$count = isset( $term_counts[ $term->term_id ] ) ? $term_counts[ $term->term_id ] : 0;

							if ( $count > 0 )
								$found = true;

						}

						$arg = 'filter_' . sanitize_title( $instance['attribute'] );

						$current_filter = ( isset( $_GET[ $arg ] ) ) ? explode( ',', $_GET[ $arg ] ) : array();

						if ( ! is_array( $current_filter ) )
							$current_filter = array();

						$current_filter = array_map( 'esc_attr', $current_filter );

						if ( ! in_array( $term->term_id, $current_filter ) )
							$current_filter[] = $term->slug;

						// Base Link decided by current page
						if ( defined( 'SHOP_IS_ON_FRONT' ) ) {
							$link = home_url();
						} elseif ( is_post_type_archive( 'product' ) || is_page( wc_get_page_id('shop') ) || is_page_template( 'page-templates/template-woocomerce.php' ) ) {
							$link = get_post_type_archive_link( 'product' );
						} else {
							$link = get_term_link( get_query_var('term'), get_query_var('taxonomy') );
						}
						// All current filters
						if ( $_chosen_attributes ) {
							foreach ( $_chosen_attributes as $name => $data ) {
								if ( $name !== $taxonomy ) {

									//exclude query arg for current term archive term
									while ( in_array( $current_term, $data['terms'] ) ) {
										$key = array_search( $current_term, $data );
										unset( $data['terms'][$key] );
									}

									if ( ! empty( $data['terms'] ) )
										$link = add_query_arg( sanitize_title( str_replace( 'pa_', 'filter_', $name ) ), implode(',', $data['terms']), $link );

									if ( $data['query_type'] == 'or' )
										$link = add_query_arg( sanitize_title( str_replace( 'pa_', 'query_type_', $name ) ), 'or', $link );
								}
							}
						}

						// Min/Max
						if ( isset( $_GET['min_price'] ) )
							$link = add_query_arg( 'min_price', $_GET['min_price'], $link ); 

						if ( isset( $_GET['max_price'] ) )
							$link = add_query_arg( 'max_price', $_GET['max_price'], $link );

						// Orderby
				        if ( isset( $_GET['orderby'] ) ) {
				            $link = add_query_arg( 'orderby', wc_clean( $_GET['orderby'] ), $link );
				        }

				        // Filter size
				        if ( isset( $_GET['filter_size'] ) ) {
				            $link = add_query_arg( 'filter_size', wc_clean( $_GET['filter_size'] ), $link );
				        }

						// Current Filter = this widget
						if ( isset( $_chosen_attributes[ $taxonomy ] ) && is_array( $_chosen_attributes[ $taxonomy ]['terms'] ) && in_array( $term->slug, $_chosen_attributes[ $taxonomy ]['terms'] ) ) {

							$class = 'class="active"';

							// Remove this term is $current_filter has more than 1 term filtered
							if ( sizeof( $current_filter ) > 1 ) {
								$current_filter_without_this = array_diff( $current_filter, array( $term->slug ) );
								if ( !( $current_filter_without_this ) ) {
									$link = remove_query_arg( $arg, $link );
								}else{
									$link = add_query_arg( $arg, implode( ',', $current_filter_without_this ), $link );
								}
							}

						} else {

							$class = '';
							$link = add_query_arg( $arg, implode( ',', $current_filter ), $link );

						}

						// Search Arg
						if ( get_search_query() )
							$link = add_query_arg( 's', get_search_query(), $link );

						// Post Type Arg
						if ( isset( $_GET['post_type'] ) )
							$link = add_query_arg( 'post_type', $_GET['post_type'], $link );

						// Query type Arg
						if ( $query_type == 'or' && ! ( sizeof( $current_filter ) == 1 && isset( $_chosen_attributes[ $taxonomy ]['terms'] ) && is_array( $_chosen_attributes[ $taxonomy ]['terms'] ) && in_array( $term->term_id, $_chosen_attributes[ $taxonomy ]['terms'] ) ) )
							$link = add_query_arg( 'query_type_' . sanitize_title( $instance['attribute'] ), 'or', $link );

						$datas = get_metadata( 'term', $term->term_id, "wd_pc_color_config", true );
						if( strlen($datas) > 0 ){
							$datas = unserialize($datas);	
						}else{
							$datas = array(
								'wd_pc_color_color' 				=> "#aaaaaa",
								'wd_pc_color_image' 				=> 0
							);
					
						}					
							
						echo '<li ' . $class . '>';

						echo ( $count > 0 || $option_is_set ) ? '<a title="'. $term->name .'" href="' . esc_url( apply_filters( 'woocommerce_layered_nav_link', $link ) ) . '">' : '<span>';

						
						if( absint($datas['wd_pc_color_image']) > 0  ){
							echo $img_arr =  wp_get_attachment_image( absint($datas['wd_pc_color_image']), 'wd_small_thumbnail', true,array('title'=>$term->name,'alt'=>$term->name) );
							
						}else{
							echo "<div style='width:10px; height:10px;background-color:{$datas['wd_pc_color_color']}'></div><span>{$term->name}</span>";
						}					

						echo ( $count > 0 || $option_is_set ) ? '</a>' : '</span>';
						
						echo ' <small class="count">(' . $count . ')</small>';
						
						echo '</li>';
					}
					echo "</ul>";


					echo $after_widget;

					if ( ! $found )
						ob_end_clean();
					else
						echo ob_get_clean();
				}
			}

			/**
			 * update function.
			 *
			 * @see WP_Widget->update
			 * @access public
			 * @param array $new_instance
			 * @param array $old_instance
			 * @return array
			 */
			function update( $new_instance, $old_instance ) {
				global $woocommerce;

				if ( empty( $new_instance['title'] ) )
					$new_instance['title'] = wc_attribute_label( $new_instance['attribute'] );

				$instance['title'] 			= strip_tags( stripslashes($new_instance['title'] ) );
				$instance['query_type'] 	= stripslashes( $new_instance['query_type'] );

				return $instance;
			}

			/**
			 * form function.
			 *
			 * @see WP_Widget->form
			 * @access public
			 * @param array $instance
			 * @return void
			 */
			function form( $instance ) {
				global $woocommerce;

				if ( ! isset( $instance['query_type'] ) )
					$instance['query_type'] = 'and';

				?>
				<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'wd_package' ) ?></label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php if ( isset( $instance['title'] ) ) echo esc_attr( $instance['title'] ); ?>" /></p>


				<p><label for="<?php echo $this->get_field_id( 'query_type' ); ?>"><?php esc_html_e( 'Query Type:', 'wd_package' ) ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'query_type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'query_type' ) ); ?>">
					<option value="and" <?php selected( $instance['query_type'], 'and' ); ?>><?php esc_html_e( 'AND', 'wd_package' ); ?></option>
					<option value="or" <?php selected( $instance['query_type'], 'or' ); ?>><?php esc_html_e( 'OR', 'wd_package' ); ?></option>
				</select></p>
				<?php
			}
			protected function get_filtered_term_product_counts( $term_ids, $taxonomy, $query_type ) {
				global $wpdb;

				$tax_query  = WC_Query::get_main_tax_query();
				$meta_query = WC_Query::get_main_meta_query();

				if ( 'or' === $query_type ) {
					foreach ( $tax_query as $key => $query ) {
						if ( $taxonomy === $query['taxonomy'] ) {
							unset( $tax_query[ $key ] );
						}
					}
				}

				$meta_query      = new WP_Meta_Query( $meta_query );
				$tax_query       = new WP_Tax_Query( $tax_query );
				$meta_query_sql  = $meta_query->get_sql( 'post', $wpdb->posts, 'ID' );
				$tax_query_sql   = $tax_query->get_sql( $wpdb->posts, 'ID' );

				// Generate query
				$query           = array();
				$query['select'] = "SELECT COUNT( DISTINCT {$wpdb->posts}.ID ) as term_count, terms.term_id as term_count_id";
				$query['from']   = "FROM {$wpdb->posts}";
				$query['join']   = "
					INNER JOIN {$wpdb->term_relationships} AS term_relationships ON {$wpdb->posts}.ID = term_relationships.object_id
					INNER JOIN {$wpdb->term_taxonomy} AS term_taxonomy USING( term_taxonomy_id )
					INNER JOIN {$wpdb->terms} AS terms USING( term_id )
					" . $tax_query_sql['join'] . $meta_query_sql['join'];
				$query['where']   = "
					WHERE {$wpdb->posts}.post_type IN ( 'product' )
					AND {$wpdb->posts}.post_status = 'publish'
					" . $tax_query_sql['where'] . $meta_query_sql['where'] . "
					AND terms.term_id IN (" . implode( ',', array_map( 'absint', $term_ids ) ) . ")
				";
				$query['group_by'] = "GROUP BY terms.term_id";
				$query             = apply_filters( 'woocommerce_get_filtered_term_product_counts_query', $query );
				$query             = implode( ' ', $query );
				$results           = $wpdb->get_results( $query );

				return wp_list_pluck( $results, 'term_count', 'term_count_id' );
			}
		}
	}
}