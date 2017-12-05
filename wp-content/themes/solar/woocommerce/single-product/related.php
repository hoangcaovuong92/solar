<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

do_action('wd_before_single_product_related');
if( !isset($posts_per_page) || $posts_per_page < 10 ){
	$posts_per_page = 10;
}
$related = wc_get_related_products($product->get_id(), $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters('woocommerce_related_products_args', array(
	'post_type'				=> 'product',
	'ignore_sticky_posts'	=> 1,
	'no_found_rows' 		=> 1,
	'posts_per_page'        => $posts_per_page,
	'orderby' 				=> $orderby,
	'post__in' 				=> $related,
	'post__not_in'			=> array($product->get_id())
) );
	

$products = new WP_Query( $args );

$woocommerce_loop['columns'] 	= $columns;
$is_slider = true;
if ( $products->have_posts() ) : 

	if( $products->post_count <= 1 ){
		$is_slider = false;
	}
?>
	<div class="wd-ralated-product">
		<div class="wd-title wd-title-section-style-1">
			<h2 class="wd-title-heading text-center"><?php esc_html_e('RELATED ITEMS','solar'); ?></h2>
		</div>
		<div class="wd-ralated-content row">
			<div class="related products grid">
				<?php 
				$_random_id 	= 'wd_related_product_wrapper_'.rand();
				$custom_class	= ($is_slider) ? 'wd-product-related-wrapper-slider loading' : ''; ?>
				<div 	class="related_wrapper <?php echo esc_attr($custom_class); ?>" 
						id="<?php echo esc_attr($_random_id); ?>" 
						data-slide_speed="<?php echo (wp_is_mobile()) ? 200 : 800; ?>" 
						data-responsive_refresh_rate="<?php echo (wp_is_mobile()) ? 400 : 200; ?>" 
						data-columns="4"
				>
					<ul class="products grid wd-related-slider">
						<?php while ( $products->have_posts() ) : $products->the_post(); ?>
							<?php wc_get_template_part( 'content', 'product' ); ?>
						<?php endwhile; // end of the loop. ?>
					</ul>
					
					<?php echo tvlgiao_wpdance_related_slider_control(); ?>
				</div>
			</div>	
		</div> 
	</div>	
<?php endif;

do_action('wd_after_single_product_related');
wp_reset_postdata();
