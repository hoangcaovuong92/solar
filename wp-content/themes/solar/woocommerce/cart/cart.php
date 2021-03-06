<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();
/**
 * package: cart
 * var: content_shortcode  		
 * var: payment_method  		
 */
extract(tvlgiao_wpdance_get_data_package( 'cart' )); 

do_action( 'woocommerce_before_cart' ); ?>
<div class="cart-form">
	<form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

		<?php do_action( 'woocommerce_before_cart_table' ); ?>
		<table class="shop_table shop_table_responsive cart" cellspacing="0">
			<tbody>
				<?php do_action( 'woocommerce_before_cart_contents' ); ?>

				<?php
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
						?>
						<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">


							

							<td class="product-detail" data-title="<?php esc_attr_e( 'Product', 'solar' ); ?>">
								<div class="product-thumbnail">
									<?php
										$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

										if ( ! $product_permalink ) {
											echo ($thumbnail);
										} else {
											printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
										}
									?>
								</div>

								<div class="product-title">
									<?php
										if ( ! $product_permalink ) {
											echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
										} else {
											echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
										}
									
										// Meta data
										echo WC()->cart->get_item_data( $cart_item );
									
										// Backorder notification
										if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
											echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'solar' ) . '</p>';
										}
									?>
								</div>

								<div class="product-price" data-title="<?php _e( 'Price', 'solar' ); ?>">
									<?php
										echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
									?>
								</div>
							</td>


							<td class="product-quantity" data-title="<?php _e( 'Quantity', 'solar' ); ?>">
								<div class="product-quantity">
									<span><?php _e( 'Quantity', 'solar' ); ?></span>
									<?php
										if ( $_product->is_sold_individually() ) {
											$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
										} else {
											$product_quantity = woocommerce_quantity_input( array(
												'input_name'  => "cart[{$cart_item_key}][qty]",
												'input_value' => $cart_item['quantity'],
												'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
												'min_value'   => '0'
											), $_product, false );
										}
									
										echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
									?>
								</div>

								<div class="product-subtotal" data-title="<?php _e( 'Total', 'solar' ); ?>">
									<?php
										echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
									?>
								</div>

								<div class="product-remove">
									<?php
										echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
											'<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
											esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
											__( 'Remove this item', 'solar' ),
											esc_attr( $product_id ),
											esc_attr( $_product->get_sku() )
										), $cart_item_key );
									?>
								</div>
							</td>

							
						</tr>
						<?php
					}
				}

				do_action( 'woocommerce_cart_contents' );
				?>
			</tbody>
		</table>
		<div class="wd-cart-update-button">
			<input type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update Cart', 'solar' ); ?>" />
			<?php do_action( 'woocommerce_cart_actions' ); ?>
		</div>
		<?php if ( wc_coupons_enabled() ) { ?>
			<div class="wd-cart-coupon-form coupon">
				<label for="coupon_code"><?php _e( 'Discount Coupon:', 'solar' ); ?></label> 
				<p class="wd-desc"><?php _e( 'Enter coupon code bellow if you have one.', 'solar' ); ?></p>
				<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'solar' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply Coupon', 'solar' ); ?>" />

				<?php do_action( 'woocommerce_cart_coupon' ); ?>
			</div>
		<?php } ?>
		<?php wp_nonce_field( 'woocommerce-cart' ); ?>

		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		<?php do_action( 'woocommerce_after_cart_table' ); ?>

	</form>
</div>

<div class="cart-collaterals ">
	<div class="wd-cart-payment-method">
		<?php if ( shortcode_exists( 'tvlgiao_wpdance_payment_icon' ) && tvlgiao_wpdance_is_visual_composer() ) { ?>
			<label><?php _e( 'Payment method:', 'solar' ); ?></label> 
			<p class="wd-desc"><?php _e( 'Laparis continuously strives to give customers the best service.', 'solar' ); ?></p>
			<?php if($payment_method != '' ): ?> 
				<?php $payment_method = stripslashes($payment_method); ?>
				<?php echo do_shortcode( "{$payment_method}" ); 	?>
			<?php endif; ?>
		<?php } ?>
		
	</div>
	<?php do_action( 'woocommerce_cart_collaterals' ); ?>
</div>
<div class="clear"></div>

<?php if($content_shortcode != '' && tvlgiao_wpdance_is_visual_composer()): ?> 
	<?php $content_shortcode = stripslashes($content_shortcode); ?>
	<div class="wd-cart-interested">
		<?php echo do_shortcode( "{$content_shortcode}" ); 	?>
	</div>
<?php endif; ?>
<?php do_action( 'woocommerce_after_cart' ); ?>