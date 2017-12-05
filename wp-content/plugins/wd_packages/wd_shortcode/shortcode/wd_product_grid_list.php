<?php
/**
 * Shortcode: tvlgiao_wpdance_special_gird_list_product
 */
if ( tvlgiao_wpdance_is_woocommerce() ) {
	if (!function_exists('tvlgiao_wpdance_special_gird_list_product_function')) {
		function tvlgiao_wpdance_special_gird_list_product_function($atts) {
			extract(shortcode_atts(array(
				'id_category'			=> '-1',
				'data_show'				=> 'recent_product',
				'number_products'		=> '12',
				'sort'					=> 'DESC',
				'order_by'				=> 'date',
				'columns'				=> '4',
				'allow_switch_mode'		=> '1',
				'grid_list'				=> 'grid',
				'result_count'			=> '1',
				'grid_list_button'		=> '1',
				'filter_product'		=> '1',
				'pagination_loadmore'	=> '1',
				'number_loadmore'		=> '8',
				'class'					=> ''
			), $atts));
			wp_reset_query();	

			// New Product
			$args = array(  
				'post_type' 		=> 'product',  
				'posts_per_page' 	=> $number_products,
				'order' 			=> $sort,
				'paged' 			=> get_query_var('paged')
			);
			//Category
			if( $id_category != -1 ){
				$args['tax_query']['relation'] = 'AND';
				$args['tax_query'][] = array(
			    	'taxonomy' 		=> 'product_cat',
					'terms' 		=> $id_category,
					'field' 		=> 'term_id',
					'operator' 		=> 'IN'
	   			);
			}
			switch ( $order_by ) {
				case 'price':
					$args['meta_key'] = '_price';
					$args['orderby']  = 'meta_value_num';
					break;
				case 'sales':
					$args['meta_key'] = 'total_sales';
					$args['orderby']  = 'meta_value_num';
					break;
				default:
					$args['orderby'] 	= $order_by;
					break;
			}
			//Most View Products
			if($data_show == 'mostview_product'){
				$args['meta_key'] 	= '_wd_product_views_count';
				$args['orderby'] 	= 'meta_value_num';
				$args['order'] 		= 'DESC';
			}

			//On Sale Product
			if($data_show == 'onsale_product'){
				$args['meta_query'] = array(
	                'relation' => 'OR',
	                array( // Simple products type
	                    'key'           => '_sale_price',
	                    'value'         => 0,
	                    'compare'       => '>',
	                    'type'          => 'numeric'
	                ),
	                array( // Variable products type
	                    'key'           => '_min_variation_sale_price',
	                    'value'         => 0,
	                    'compare'       => '>',
	                    'type'          => 'numeric'
	                )
				);
			}
			//Featured Product
			if($data_show == 'featured_product'){
				$args['tax_query'][] = array(
	                'taxonomy' => 'product_visibility',
	                'field'    => 'name',
	                'terms'    => 'featured',
	            );
			}

			$products 			= new WP_Query( $args );
			$count_products 	= $products->found_posts;
			$columns_product 	= 'wd-columns-'.$columns;
			$random_id 			= 'wd-product-grid-list-'.rand(0,1000).time();

			ob_start(); ?>
			<div id="<?php echo esc_html($random_id); ?>" class='wd-shortcode-product-grid-list <?php echo esc_html($class); ?> wd-wrapper-parents-value'>
			<?php if ( $products->have_posts() ) : ?>
				<?php 
					if ($result_count) {
						tvlgiao_wpdance_product_result_count($products);
					}

					if ($allow_switch_mode == 1 && $grid_list_button == 1) {
						// Grid/List button
						tvlgiao_wpdance_grid_list_toggle_button();
					}

					if ($filter_product) {
						tvlgiao_wpdance_product_ordering();
					}
				?>

				<?php if( $allow_switch_mode == 0 ) { ?>
					<div class="wd-products-wrapper <?php echo esc_html($columns_product); ?>">
						<ul class="products <?php echo esc_html($grid_list); ?>">
							<?php while ( $products->have_posts() ) : $products->the_post();  ?>
								
								<?php wc_get_template_part( 'content', 'product' ); ?>
							
							<?php endwhile;	?>
						</ul>
					</div>			
				<?php }else{ ?>
					<div class="wd-products-wrapper grid-list-action <?php echo esc_html($columns_product); ?>" data-columns="<?php echo esc_attr($columns); ?>">
						<?php woocommerce_product_loop_start(); ?>
						<?php while ( $products->have_posts() ) : $products->the_post();  ?>
							
							<?php wc_get_template_part( 'content', 'product' ); ?>
						
						<?php endwhile;	?>
						<?php woocommerce_product_loop_end(); ?>
					</div>
				<?php }; // Endif ?>

				<?php if($pagination_loadmore == '1') : ?> 
					<div class="wd-pagination">
						<?php tvlgiao_wpdance_pagination(3, $products); ?>
					</div>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
				<?php if($pagination_loadmore == '0') : ?> 
					<div class="wd-loadmore">
						<div class="show_image_loading" id="show_image_loading_<?php echo esc_html($random_id); ?>">
							<img src="<?php echo SC_IMAGE.'/ajax-loader_image.gif';?>" alt="HTML5 Icon" style="height:15px;">
						</div>
						<div id="loadmore">
							<a 	data-random_id="<?php echo esc_html($random_id); ?>" 
								data-posts_per_page="<?php echo esc_html($number_loadmore); ?>" 
								data-id_category="<?php echo esc_html($id_category); ?>" 
								data-data_show="<?php echo esc_html($data_show); ?>" 
								data-sort="<?php echo esc_html($sort); ?>" 
								data-order_by="<?php echo esc_html($order_by); ?>" 
								href="#" class="button btn_loadmore_product"><?php _e('LOAD MORE','wd_package') ?></a>
						</div>
					</div>
				<?php endif; ?>
			<?php endif; // Have Product?>	
			</div>
		
			<?php
			$content = ob_get_contents();
			ob_end_clean();
			wp_reset_query();
			return $content;
		}
	}
	add_shortcode('tvlgiao_wpdance_special_gird_list_product', 'tvlgiao_wpdance_special_gird_list_product_function');
}
?>