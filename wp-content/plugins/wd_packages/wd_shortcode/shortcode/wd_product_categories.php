<?php
/**
 * Shortcode: tvlgiao_wpdance_category_product
 */
if ( tvlgiao_wpdance_is_woocommerce() ) {
	if (!function_exists('tvlgiao_wpdance_category_product_function')) {
		function tvlgiao_wpdance_category_product_function($atts) {
			extract(shortcode_atts(array(
				'ids_category'		=> '',
				'style'				=> 'style-1',
				'sort'				=> 'DESC',
				'order_by'			=> 'term_id',
				'columns'			=> 3,
				'title'				=> '1',
				'thumbnail'			=> '1',
				'readmore'			=> '1',
				'meta'				=> '1',
				'class'				=> ''

			), $atts));
			wp_reset_query();	

			$args = array(
			    'order'    		=> $sort,
			    'orderby'      	=> $order_by,
			    'hide_empty' 	=> false,
			);
			if ($ids_category) {
				$args['include'] = explode(',', $ids_category);
			}
			$columns_product 	= 'wd-columns-'.$columns;
			$product_categories = get_terms( 'product_cat', $args );
			$num_count 			= count($product_categories);
			$i 					= 0;
			$random_id 			= 'wd-shortcode-product-category-'.rand(0, 1000);	
			ob_start(); ?>

			<?php if( $num_count > 0 ) : ?>
				<div id="<?php echo esc_html($random_id); ?>" class="wd-shortcode-product-category <?php echo esc_html($columns_product); ?> <?php echo esc_html($style); ?>">
					<ul class="wd-shortcode-product-category-content" >
					<?php foreach( $product_categories as $cat ) { ?>
						<li class="item <?php if( $i == 0 || $i % $columns == 0 ) echo ' first';?><?php if( $i == $num_count-1 || $i % $columns == $columns-1 ) echo ' last';?>" >
							<?php
								$title_category 		= $cat->name;
								$id_category 			= $cat->term_id;
								$thumbnail_category 	= get_woocommerce_term_meta( $id_category , 'thumbnail_id', true ); 
								$image_url_category 	= wp_get_attachment_url( $thumbnail_category );
							?>
							<?php if($thumbnail && $image_url_category != '') : ?> 
								<div class="wd-product-category-thumbnail">
									<a href="<?php echo get_category_link($id_category); ?>">
										<img src="<?php echo $image_url_category; ?>" title="<?php echo $title_category; ?>" alt="<?php echo $title_category; ?>">
									</a>
								</div>
							<?php endif; ?>
							<div class="wd-product-category-info">
								<?php if($title ) : ?>
									<a href="<?php echo get_category_link($id_category); ?>">
										<h2 class="class='wd-product-category-title"><?php echo $title_category; ?></h2>
									</a>
								<?php endif; ?>
								<?php if($meta ) : ?>
									<span class='wd-product-category-meta'>(<?php printf(__('%d products','wpdancelaparis'), $cat->count); ?>)</span>
								<?php endif; ?>
								<?php if($readmore ) : ?>
									<a class='wd-product-category-readmore' href="<?php echo get_category_link($id_category); ?>"><?php echo esc_html('Read more','wpdancelaparis'); ?></a>
								<?php endif; ?>
					
							</div>
						</li>			
					<?php $i++; } // End While ?>
					</ul>
				</div>
			<?php endif; ?>
			<?php
			$content = ob_get_clean();
			wp_reset_postdata();
			return $content;
		}
	}
	add_shortcode('tvlgiao_wpdance_category_product', 'tvlgiao_wpdance_category_product_function');
}
?>