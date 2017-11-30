<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( $upsells ) : ?>
	<?php $is_slider = true; ?>
	<div class="wd-ralated-product">
		<div class="wd-title wd-title-section-style-1">
			<h2 class="wd-title-heading text-center"><?php esc_html_e('YOU MAY ALSO LIKE...','laparis'); ?></h2>
		</div>
		<div class="wd-ralated-content row">
			<div class="related products grid">
				<?php
				 $_random_id 	= 'wd_upsell_product_wrapper_'.rand(); 
				 $custom_class	= ($is_slider) ? 'wd-product-upsell-wrapper-slider loading' : ''; ?>
				<div 	class="related_wrapper <?php echo esc_attr($custom_class); ?>" 
						id="<?php echo esc_attr($_random_id); ?>" 
						data-slide_speed="<?php echo (wp_is_mobile()) ? 200 : 800; ?>" 
						data-responsive_refresh_rate="<?php echo (wp_is_mobile()) ? 400 : 200; ?>" 
						data-columns="4"
				>
					<ul class="products grid wd-related-slider">
						<?php foreach ( $upsells as $upsell ) : ?>
							<?php
							 	$post_object = get_post( $upsell->get_id() );
								setup_postdata( $GLOBALS['post'] =& $post_object );
								wc_get_template_part( 'content', 'product' ); ?>
						<?php endforeach; ?>
					</ul>
					<?php echo tvlgiao_wpdance_related_slider_control(); ?>
				</div>
			</div>	
		</div> 
	</div>	

<?php endif;

wp_reset_postdata();
