<?php
/**
 * TVLGIAO WPDANCE FRAMEWORK 2017.
 *
 * @author : Cao Vuong.
 * -Email  : hoangcaovuong92@gmail.com.
 */
 
if ( ! function_exists( 'tvlgiao_wpdance_tini_cart' ) ) {
	function tvlgiao_wpdance_tini_cart($class = ""){
		if ( !tvlgiao_wpdance_is_woocommerce() )  return;
		$random_id 	= 'wd-cart-popup-content-'.mt_rand();
		ob_start(); ?>
		<div class="wd-cart-flagments shopping-cart shopping-cart-wrapper">
			<div class=" hidden-xs hidden-sm" >
				<div class="wd_tini_cart_wrapper <?php echo esc_attr($class) ?>">
					<?php tvlgiao_wpdance_cart_icon('desktop'); ?>
					<div class="cart_dropdown drop_down_container">
	            		<?php tvlgiao_wpdance_cart_content(); ?>
	            	</div>
				</div>
			</div>
			
			<div class="visible-xs visible-sm">
				<div class="wd_tini_cart_wrapper <?php echo esc_attr($class) ?>">
					<?php tvlgiao_wpdance_cart_icon('mobile', $random_id); ?>
				    <div id="<?php echo esc_attr($random_id); ?>" style="display:none;">
				    	<div class="wd-mini-cart-mobile">
				    		<div class="wd-mini-cart-mobile-popup-content"><?php tvlgiao_wpdance_cart_content(); ?></div>
				    	</div>
					</div>
				</div>
			</div>
		</div>
		<?php 
		return ob_get_clean();
	}
}

if ( ! function_exists( 'tvlgiao_wpdance_cart_icon' ) ) {
	function tvlgiao_wpdance_cart_icon($device = 'desktop', $id = '' ) {
		/**
	     * package: mini-cart
		 * var: layout
		 * var: cart_icon
		 */
		extract(tvlgiao_wpdance_get_data_package( 'mini-cart' ));  
		
		$id 			= ($id != '') ? $id : 'wd-cart-popup-content-'.mt_rand() ;
		$_cart_size_id 	= "cart_size_value_head-".rand();
		//Num item
		$number 		= WC()->cart->cart_contents_count;
		$number 		= ( $number < 10 && $number != 0 )  ? '0'.esc_attr($number) : esc_attr($number);
		$cart_class		= ($device != 'desktop') ? 'wd-mini-cart-on-mobile' : ''; ?>
		<div class="wd_tini_cart_control">
			<span class="cart_size">
				<a data-content_id="<?php echo esc_attr($id); ?>" class="wd-view-cart-info-btn <?php echo esc_attr($cart_class); ?>" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_html_e('View your cart','solar');?>">
					<!--<span class="cart_division">/</span>-->
					<span class="cart_size_value_head" id="<?php echo esc_attr($_cart_size_id); ?>">
						<?php 
						$default_layout_cart = array(
			                    'cart_icon'     => true,
			                    'cart_text'     => true,
			                    'cart_item'     => true,
			                    'cart_total'    => false,
			                );
						$layout = is_array($layout) ? array_merge($default_layout_cart, $layout) : $default_layout_cart; ?>
						<?php foreach ($layout as $key => $value): ?>
							<?php if ($key == 'cart_icon' && $value): ?>
								<span class="cart_icon">
									<i class="<?php echo esc_attr($cart_icon); ?>" aria-hidden="true"></i>
								</span>
							<?php elseif ($key == 'cart_text' && $value): ?>
								<span class="cart_text">
									<span class="text"><?php esc_html_e('Cart','solar');?></span>
								</span>
							<?php elseif ($key == 'cart_item' && $value): ?>
								<span class="cart_item">
									<span class="num_item"><?php echo esc_html($number);?></span>
								</span>
							<?php elseif ($key == 'cart_total' && $value): ?>
								<span class="cart_total">
									<span class="total"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
								</span>
							<?php endif ?>
						<?php endforeach ?>
					</span>
				</a>
			</span>
		</div>
	<?php
	}
}

if ( ! function_exists( 'tvlgiao_wpdance_cart_content' ) ) {
	function tvlgiao_wpdance_cart_content() {
		global $woocommerce;
		$_cart_empty 	= sizeof( $woocommerce->cart->get_cart() ) > 0 ? false : true ; 
		//Num item
		$number 		= WC()->cart->cart_contents_count;
		$number 		= ( $number < 10 && $number != 0 )  ? '0'.esc_attr($number) : esc_attr($number);
		?>

		<!-- Cart content -->
		<?php if ( !$_cart_empty ) : ?>
			<div class="dropdown_body">
				<h5 class="wd_cart_item_info">
					<?php printf(_n('<strong>%s</strong> Items On Your Cart', '<strong>%s</strong> Items On Your Cart', $number, 'solar'), $number); ?>
				</h5>
				<ul class="cart_list product_list_widget">
					<?php
						$_cart_array = $woocommerce->cart->get_cart();
						$_index = 0;
					?>
					
					<?php foreach ( $_cart_array as $cart_item_key => $cart_item ) :
						
						$_product = $cart_item['data'];

						if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) || ! $_product->exists() || $cart_item['quantity'] == 0 )
							continue;

						$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? wc_get_price_excluding_tax($_product) : wc_get_price_including_tax($_product);

						$product_price = apply_filters( 'woocommerce_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key );
						?>

						<li class="media <?php echo esc_attr($_cart_li_class = ($_index == 0 ? "first" : ($_index == count($_cart_array) - 1 ? "last" : ""))); ?>">
							<a class="pull-left" href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>">
								<?php echo wp_kses_post( $_product->get_image('wd_image_size_cart_dropdown') ); ?>
							</a>
							<div class="cart_item_wrapper">	
								<a class="wd_cart_title" href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>">
									<?php echo esc_html($_product->get_title()); ?>
								</a>
								<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity link_color">' . sprintf( '%s &times; %s',$product_price, $cart_item['quantity'] ) . '</span>', $cart_item, $cart_item_key ); ?>
								<?php
									echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">&times;</a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), esc_html__( 'Remove this item', 'solar' ) ), $cart_item_key );
								?>
							</div>
						</li>
						<?php $_index++; ?>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="wd-empty-cart-btn">
				<?php $url_clear_cart = add_query_arg('empty_cart', 1, tvlgiao_wpdance_get_current_url()); ?>
				<a href="<?php echo esc_url($url_clear_cart); ?>" class="cart wd-clear-cart-item" title="<?php esc_html_e( 'Empty Cart', 'solar' ) ?>"><span class="lnr lnr-cross-circle"></span> <?php esc_html_e( 'Empty Cart', 'solar' ) ?>
				</a>
				<div class="wd-feature-loading-img hidden">
					<img src="<?php echo TVLGIAO_WPDANCE_THEME_IMAGES.'/loading.gif'; ?>" alt="Loading Icon">
				</div>
			</div>
			<div class="dropdown_footer">
				<p class="total"><span class="link_color"><?php esc_html_e( 'Total', 'solar' ); ?>:</span><span class="link_color_hover"><?php echo wp_kses_post( $woocommerce->cart->get_cart_subtotal()); ?></span></p>

				<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
		
				<p class="buttons">
					<a class="cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_html_e( 'View Cart', 'solar' ) ?>"><span class="lnr lnr-cart"></span> <?php esc_html_e('View cart','solar');?></a>
					<a class="checkout secondary_button" href="<?php echo esc_url( wc_get_checkout_url() ); ?>" title="<?php esc_html_e( 'Checkout Page', 'solar' ) ?>"><?php esc_html_e( 'Checkout', 'solar' ); ?></a>
					
				</p>
			</div>
		<?php else: ?>
			<div class="dropdown_body wd-cart-empty">
				<?php esc_html_e('Shopping cart is empty.','solar');?>
			</div>
			<div class="dropdown_footer">
				<p class="buttons">
					<a class="cart" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>"><?php esc_html_e('Go Shopping','solar');?></a>
				</p>				
			</div>
		<?php endif; ?>
	<?php 
	}
}


// Ensure cart contents update when products are added to the cart via AJAX
add_filter( 'woocommerce_add_to_cart_fragments', 'tvlgiao_wpdance_update_tini_cart' );
if ( ! function_exists( 'tvlgiao_wpdance_update_tini_cart' ) ) {
	function tvlgiao_wpdance_update_tini_cart( $fragments ) {
		$fragments['.wd-cart-flagments'] = tvlgiao_wpdance_tini_cart();
		return $fragments;
	}
}

//Update cart ( single product add to cart via Ajax )
add_action('wp_ajax_update_tini_cart_single_product', 'tvlgiao_wpdance_update_tini_cart_single_product');
add_action('wp_ajax_nopriv_update_tini_cart_single_product', 'tvlgiao_wpdance_update_tini_cart_single_product');
if ( ! function_exists( 'tvlgiao_wpdance_update_tini_cart_single_product' ) ) {
	function tvlgiao_wpdance_update_tini_cart_single_product() {
		$product_id 	= $_POST['product_id'];
		$variation_id 	= $_POST['variation_id'];
		$quantity 		= $_POST['quantity'];
		$product_type 	= $_POST['product_type'];

		if ($product_type == 'variation') {
		    WC()->cart->add_to_cart( $product_id, $quantity, $variation_id );
		} elseif ($product_type == 'simple') {
		    WC()->cart->add_to_cart( $product_id, $quantity);
		}
 
		echo tvlgiao_wpdance_tini_cart();
		die();
	}
}


/* Support WooCommerce Multilingual */
function tvlgiao_wpdance_tiny_cart_add_ajax_action($actions){
	$actions[] = 'update_tini_cart';
	return $actions;
}

add_action('init', 'tvlgiao_wpdance_tiny_cart_add_filter', 1);
function tvlgiao_wpdance_tiny_cart_add_filter(){
	add_filter( 'wcml_multi_currency_is_ajax', 'tvlgiao_wpdance_tiny_cart_add_ajax_action');
}

?>