<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$classes[] = 'product';
$classes[] = 'wd-product-mansonry-item';
/**
 * package: content-product
 * var: display_buttons    	
 * var: hover_thumbnail
 * var: style_hover_product 
 * var: button_group_position 
 */

extract(tvlgiao_wpdance_get_data_package( 'content-product' ));
$image_size 			= (!empty($image_size)) ? $image_size : 'shop_catalog';
$style_hover_product 	= (!empty($mansory_hover_layout)) ? 'wd-hover-style-mansory' : $style_hover_product;
$button_group_position 	= (!empty($mansory_hover_layout)) ? 'button_masonry' : $button_group_position;

if (isset($custom_width_class) && $custom_width_class != '') {
	$classes[] = $custom_width_class;
} ?>
<li itemscope itemtype="http://schema.org/Product" <?php post_class($classes); ?>>
	<div class="wd-content-product <?php echo esc_attr($style_hover_product); ?>">
		<?php

			/**
			 * tvlgiao_wpdance_shop_loop_link_open hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_open - 5
			 */
			do_action( 'tvlgiao_wpdance_shop_loop_link_open' );
		?>
		<?php 
			/**
			 * woocommerce_after_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>
		<div class="wd-thumbnail-product">
			<?php
				/**
				 * tvlgiao_wpdance_sale_featured_flash hook.
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 5
				 */
				do_action( 'tvlgiao_wpdance_sale_featured_flash' );
				
				//Display thumbnail
				tvlgiao_wpdance_product_image_html( $image_size );
				if ($hover_thumbnail && !tvlgiao_wpdance_is_mobile_or_tablet()) {
					echo tvlgiao_wpdance_get_product_secondary_thumbnail($image_size);
				}
			?>
		</div>

		<?php
			/**
			 * tvlgiao_wpdance_shop_loop_link_close hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_close - 5
			 */
			do_action( 'tvlgiao_wpdance_shop_loop_link_close' );
		?>

		<div class="wd-content-detail">
			<?php if( $button_group_position == 'before-content' && $display_buttons) : ?>
				<div class="wd-button-shop wd-button-shop-before-content">
					<div class="wd-button-add-to-cart">
						<?php
						/**
						 * tvlgiao_wpdance_button_add_to_cart hook
						 *
						 * @hooked woocommerce_template_loop_add_to_cart 5
						 */
						do_action( 'tvlgiao_wpdance_button_add_to_cart' );			
					?>
					</div>
					<?php
						/**
						 * tvlgiao_wpdance_button_shop_loop hook
						 *
						 * @hooked add_quickshop_button - 5
						 * @hooked add_compare_link - 15
						 * @hooked tvlgiao_wpdance_wishlist_button_shop_loop 20
						 */
						do_action( 'tvlgiao_wpdance_button_shop_loop' );			
					?>
				</div>
			<?php endif; ?>	
			<?php
				/**
				 * woocommerce_before_shop_loop_item hook.
				 *
				 * @hooked woocommerce_template_loop_product_link_open - 10
				 */
				do_action( 'woocommerce_before_shop_loop_item' );
			
				/**
				 * woocommerce_shop_loop_item_title hook.
				 *
				 * @hooked woocommerce_template_loop_product_title - 10 (removed)
				 * @hooked tvlgiao_wpdance_title_product - 10 
				 */
				do_action( 'woocommerce_shop_loop_item_title' );
				
				/**
				 * tvlgiao_wpdance_shop_loop_link_close hook.
				 *
				 * @hooked woocommerce_template_loop_product_link_close - 5
				 */
				do_action( 'tvlgiao_wpdance_shop_loop_link_close' );
				/**
				 * woocommerce_after_shop_loop_item hook.
				 *
				 * @hooked woocommerce_template_loop_product_link_close - 5 (removed)
				 * @hooked tvlgiao_wpdance_short_description_product 15
				 */
				do_action( 'woocommerce_after_shop_loop_item' );
			?>
		
			<?php if( $button_group_position == 'after-content' && $display_buttons) : ?>
				<div class="wd-button-shop wd-button-shop-after-content">
					<div class="wd-button-add-to-cart">
						<?php
							/**
							 * woocommerce_button_shop
							 *
							 * @hooked woocommerce_template_loop_add_to_cart 5
							 */
							do_action( 'tvlgiao_wpdance_button_add_to_cart' );			
						?>
					</div>
					<?php
						/**
						 * woocommerce_button_shop
						 *
						 * @hooked add_quickshop_button - 5
						 * @hooked add_compare_link - 15
						 * @hooked tvlgiao_wpdance_wishlist_button_shop_loop 20
						 */
						do_action( 'tvlgiao_wpdance_button_shop_loop' );			
					?>
				</div>	
			<?php endif; ?>	
		</div>

		<?php if( $button_group_position == 'button_masonry' && $display_buttons) : ?>
			<div class="wd-button-shop wd-button-shop-before-content">
				<div class="wd-button-add-to-cart">
					<?php
					/**
					 * tvlgiao_wpdance_button_add_to_cart hook
					 *
					 * @hooked woocommerce_template_loop_add_to_cart 5
					 */
					do_action( 'tvlgiao_wpdance_button_add_to_cart' );			
				?>
				</div>
				<?php
					/**
					 * tvlgiao_wpdance_button_shop_loop hook
					 *
					 * @hooked add_quickshop_button - 5
					 * @hooked add_compare_link - 15
					 * @hooked tvlgiao_wpdance_wishlist_button_shop_loop 20
					 */
					do_action( 'tvlgiao_wpdance_button_shop_loop' );			
				?>
			</div>
		<?php endif; ?>	
	</div>
</li>
