<?php 
/**
 * TVLGIAO WPDANCE FRAMEWORK 2017.
 *
 * @author : Cao Vuong.
 * -Email  : hoangcaovuong92@gmail.com.
 */

add_action('after_setup_theme','tvlgiao_wpdance_woo_hook_action', 250);
add_action( 'after_setup_theme','tvlgiao_wpdance_archive_number_perpage', 200);
if(!function_exists ('tvlgiao_wpdance_woo_hook_action')){
	function tvlgiao_wpdance_woo_hook_action(){
		/**
		 * package: woo_hook
		 * var: display_buttons
		 * var: wishlist_default
		 * var: compare_default
		 * var: show_recently_product
		 * var: show_upsell_product
		 * var: show_title
		 * var: show_description
		 * var: show_rating
		 * var: show_price
		 * var: show_price_decimal
		 * var: show_meta
		 * var: product_summary_layout 
		 * var: hover_thumbnail
		 */
		extract(tvlgiao_wpdance_get_data_package( 'woo_hook' ));
		//Change Woocommerce Breadcrumb Structure
		add_filter( 'woocommerce_breadcrumb_defaults', 'tvlgiao_wpdance_woocommerce_breadcrumbs' );
		// Remove "first", "last" class on product loop / avoid clear both row error
		add_filter( 'post_class', 'tvlgiao_wpdance_remove_first_last_class_from_product', 21 );
		// Disable Ajax Call from WooCommerce on front page and posts
		add_action( 'wp_enqueue_scripts', 'tvlgiao_wpdance_dequeue_woocommerce_cart_fragments', 11);
		//remove image srcset
		add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
		// WooCommerce Checkout Fields Hook
		add_filter( 'woocommerce_checkout_fields' , 'tvlgiao_wpdance_custom_wc_checkout_fields' );
		// WooCommerce Billing Fields Hook
		add_filter( 'woocommerce_billing_fields', 'tvlgiao_wpdance_custom_wc_billing_fields' );
		// WooCommerce Shipping Fields Hook
		add_filter( 'woocommerce_shipping_fields', 'tvlgiao_wpdance_custom_wc_shipping_fields' );
		//Set a custom add to cart URL to redirect to
		add_filter( 'woocommerce_add_to_cart_redirect', 'tvlgiao_wpdance_custom_add_to_cart_redirect' );

		// Trim zeros in price decimals
		if (!$show_price_decimal) {
			add_filter( 'woocommerce_price_trim_zeros', '__return_true' );
		}
		
		/******************************** WOO BREADCRUMB ***********************************/
		remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
		
		/******************************** SHOP LOOP ***********************************/
		//Add Class to product thumbnail (change image when hover)
		if ($hover_thumbnail && !tvlgiao_wpdance_is_mobile_or_tablet()) {
			add_filter( 'post_class', 'tvlgiao_wpdance_add_class_to_shop_loop' );
		}

		//add link open/link close
		add_action('tvlgiao_wpdance_shop_loop_link_open','woocommerce_template_loop_product_link_open',5); 
		add_action('tvlgiao_wpdance_shop_loop_link_close','woocommerce_template_loop_product_link_close',5); 

		//remove link close default on shop loop
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

		//remove add to cart button, rating, price default
		remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10); 
		remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);	
		remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);

		//remove default title
		remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);

		//add add to cart button, rating, price with new position
		add_action('woocommerce_shop_loop_item_title','tvlgiao_wpdance_title_product',10); 
		add_action('tvlgiao_wpdance_button_add_to_cart','woocommerce_template_loop_add_to_cart',5); 
		add_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',5);

		add_action('tvlgiao_wpdance_before_shop_loop_price','tvlgiao_wpdance_template_single_sku', 5);
		add_action('tvlgiao_wpdance_before_shop_loop_price','woocommerce_template_loop_rating',10);
		
		//add product attribute color (another hook: woocommerce_before_shop_loop_item_title)
		add_action('tvlgiao_wpdance_before_shop_loop_price','tvlgiao_wpdance_shop_loop_product_attribute_color',15); 
		//Sale Date Countdown
		add_action('tvlgiao_wpdance_before_shop_loop_price','tvlgiao_wpdance_offer_shop',20);

		//add desicription product
		add_action('woocommerce_after_shop_loop_item','tvlgiao_wpdance_short_description_product', 15);
		//add Sale date countdown
		//add_action( 'woocommerce_before_shop_loop_item_title', 'tvlgiao_wpdance_offer_shop', 20 );

		if(!$show_title){
	    	remove_action('woocommerce_shop_loop_item_title','tvlgiao_wpdance_title_product',10);
	    }
	    if(!$show_description){
	    	//remove_action( 'woocommerce_after_shop_loop_item', 'tvlgiao_wpdance_short_description_product', 15 );
	    }
	    if(!$show_rating){
	    	remove_action('tvlgiao_wpdance_before_shop_loop_price','woocommerce_template_loop_rating',10);
	    }
	    if(!$show_price){
	    	remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',5);
	    	remove_action('tvlgiao_wpdance_before_shop_loop_price','tvlgiao_wpdance_shop_loop_product_attribute_color',15); //remove attribute color
	    }
	    if(!$show_meta){
	    	//remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);
	    }
	    /* shop loop with custom image size */
		add_action('tvlgiao_wpdance_sale_featured_flash','woocommerce_show_product_loop_sale_flash', 5 );
	    add_action('tvlgiao_wpdance_flash_featured','tvlgiao_wpdance_flash_featured',5); //add feature flash after sale flash

		/******************************** SHOP / ARCHIVE ***********************************/
		add_action('woocommerce_archive_description', 'tvlgiao_wpdance_woocommerce_category_image', 2 );

		/******************************** SINGLE PRODUCT ***********************************/
		/* Hook: woocommerce_before_single_product_summary */
		remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_sale_flash',10); //remove sale flash default

		/* Hook: tvlgiao_after_product_image */
		add_action('tvlgiao_after_product_image', 'woocommerce_show_product_sale_flash', 5); //add sale & feature flash

		/* Hook: tvlgiao_after_product_thumbnails */
		add_action('tvlgiao_after_product_thumbnails', 'tvlgiao_wpdance_get_product_share', 5); //Share


		/* Hook: woocommerce_single_product_summary */
		remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);
		remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);
		remove_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart',30); //remove add to cart
		remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta', 40 ); //remove default meta (tag, category)

		//Reorder the product summary layout
		$i = 5;
		$default_layout_summary = array(
                'woocommerce_template_single_price'             => __( 'Price', 'solar' ),
                'tvlgiao_wpdance_template_single_review'        => __( 'Review', 'solar' ),
                'tvlgiao_wpdance_template_single_sku'           => __( 'Sku', 'solar' ),
                'tvlgiao_wpdance_template_single_availability'  => __( 'Availability', 'solar' ),
                'woocommerce_template_single_excerpt'			=> __( 'Excerpt', 'solar' ),
                'woocommerce_template_single_add_to_cart'       => __( 'Add To Cart', 'solar' ),
                'tvlgiao_wpdance_get_product_categories'        => __( 'Categories', 'solar' ),
            );
		$product_summary_layout = is_array($product_summary_layout) ? array_merge($default_layout_summary, $product_summary_layout) : $default_layout_summary;
		if ($product_summary_layout) {
			foreach ($product_summary_layout as $action_function => $value) {
				if ($value) {
					add_action('woocommerce_single_product_summary', $action_function, $i);
					$i += 5;
				}
			}
		}

		//Product tag tab
		add_filter( 'woocommerce_product_tabs', 'tvlgiao_wpdance_single_product_tag_tab' );
		

		/* Hook: woocommerce_after_single_product_summary */
		remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 ); //remove upsell default
		remove_action('woocommerce_after_single_product_summary','woocommerce_output_related_products',20); //remove related default

		//facebook comment 
		//add_action('woocommerce_after_single_product_summary', 'tvlgiao_wpdance_product_facebook_comment_form', 15 ); 
		add_filter( 'woocommerce_product_tabs', 'tvlgiao_wpdance_product_facebook_comment_form_tab' ); 

		if ($show_recently_product) { //Show/hide recent product
			add_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products',20);
		}
		if ($show_upsell_product) { //Show/hide upsell product
			add_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 25 );
		}

		/******************************** BUTTON ***********************************/
		//Gris/List Toggle
		add_action( 'woocommerce_before_shop_loop', 'tvlgiao_wpdance_grid_list_toggle_button', 25);
		add_action( 'tvlgiao_wpdance_before_grid_list_toggle_button', 'tvlgiao_wpdance_columns_toggle_button', 25);

		//Compare Button
		if( class_exists( 'YITH_Woocompare_Frontend' ) && class_exists( 'YITH_Woocompare' ) ) {
			global $yith_woocompare;
			$is_ajax = ( defined( 'DOING_AJAX' ) && DOING_AJAX );
			if( $yith_woocompare->is_frontend() || $is_ajax ) {
				if( $is_ajax ){
					$yith_woocompare->obj = new YITH_Woocompare_Frontend();
				}
				add_action( 'tvlgiao_wpdance_button_shop_loop', array( $yith_woocompare->obj, 'add_compare_link' ), 15 ); //shop loop
				add_action( 'woocommerce_after_add_to_cart_button', array( $yith_woocompare->obj, 'add_compare_link' ), 30 ); //single product		
			}

			if (!$compare_default) { //Remove compare button default
				update_option('yith_woocompare_compare_button_in_product_page', 'no'); 
			}	
		}

		//Wishlist Button
		if( class_exists('YITH_WCWL_UI') && class_exists('YITH_WCWL') ){
			add_action( 'tvlgiao_wpdance_button_shop_loop', 'tvlgiao_wpdance_wishlist_button_shop_loop', 20 );
			add_action( 'woocommerce_after_add_to_cart_button' , 'tvlgiao_wpdance_wishlist_button_shop_loop', 50 );
			if (!$wishlist_default) { //Remove wishlist button default
				update_option( 'yith_wcwl_button_position', 'shortcode' );
			}	
		}
		
		//Display Product buttons (Add to cart/wishlist/compare)
	    if(!$display_buttons){
	        remove_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart',60);
			remove_action('tvlgiao_wpdance_button_shop_loop','woocommerce_template_loop_add_to_cart',10);
			if( class_exists( 'WD_Quickshop' ) ) {
				//Remove add to cart button on Quickshop view
				remove_action( 'wd_quickshop_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
			}
	    }
	}
}
?>