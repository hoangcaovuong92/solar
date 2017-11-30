<?php
/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
?>
<div class="wd-shop-loop-price">
	<span itemprop="offers" itemscope itemtype="http://schema.org/AggregateOffer" class="price">
		<?php if ( $product->get_price() ) : ?>
			<?php echo $product->get_price_html(); ?>
		<?php else: ?>
			<span class="wd-woocommerce-price-updating"><?php esc_html_e( 'Updating', 'laparis' ); ?></span>
		<?php endif; ?>
	</span>
	<?php 
	/**
	 * tvlgiao_wpdance_after_shop_loop_price hook
	 *
	 * @hooked woocommerce_template_loop_rating - 10
	 * @hooked tvlgiao_wpdance_shop_loop_product_attribute_color - 15
	 * @hooked tvlgiao_wpdance_offer_shop - 20
	 */
	do_action('tvlgiao_wpdance_after_shop_loop_price') ?>
</div>

