<?php
/**
 * TVLGIAO WPDANCE FRAMEWORK 2017.
 *
 * @author : Cao Vuong.
 * -Email  : hoangcaovuong92@gmail.com.
 */
 
if(!function_exists ('tvlgiao_wpdance_grid_list_toggle_button')){
	function tvlgiao_wpdance_grid_list_toggle_button(){ ?>
		<nav id="options" class="gridlist-toggle hidden-xs">
			<ul class="option-set" data-option-key="layoutMode">
				<?php do_action('tvlgiao_wpdance_before_grid_list_toggle_button'); ?>
				<li data-option-value="vertical" id="list" class="goAction wd-tooltip wd-grid-list-toggle" data-toggle="tooltip" title="<?php _e('List view', 'solar'); ?>">
					<i class="fa fa-th-list"></i>
				</li>
				<li data-option-value="fitRows" id="grid" class="goAction wd-tooltip wd-grid-list-toggle" data-toggle="tooltip" title="<?php _e('Grid view', 'solar'); ?>">
					<i class="fa fa-th-large"></i>
				</li>
				<?php do_action('tvlgiao_wpdance_after_grid_list_toggle_button'); ?>
			</ul>
		</nav>		
	<?php 
	}
}
 
if(!function_exists ('tvlgiao_wpdance_columns_toggle_button')){
	function tvlgiao_wpdance_columns_toggle_button(){
		$list_columns = array(
			'2'	=> esc_html__( '2 Columns', 'solar' ),
			'3'	=> esc_html__( '3 Columns', 'solar' ),
			'4'	=> esc_html__( '4 Columns', 'solar' ),
		);  
		foreach ($list_columns as $column => $title){ ?>
			<li data-option-value="<?php echo $column; ?>" id="wd-columns-toggle-<?php echo $column; ?>" class="goAction wd-tooltip wd-columns-toggle" data-toggle="tooltip" title="<?php echo $title; ?>">
				<?php echo $column; ?>
			</li>
		<?php } ?>
	<?php 
	}
}

//Get product attachment IDs array
if(!function_exists ('tvlgiao_wpdance_product_image_html')){
	function tvlgiao_wpdance_product_image_html( $image_size = 'shop_catalog' ) {
		global $product;
		if (woocommerce_get_product_thumbnail( $image_size )) {
			echo woocommerce_get_product_thumbnail( $image_size );
		}else{
			echo wc_placeholder_img( $image_size );
		}
	}
}

//Get product attachment IDs array
if(!function_exists ('tvlgiao_wpdance_get_product_attachment_ids')){
	function tvlgiao_wpdance_get_product_attachment_ids( $product ) {
		if (!is_object($product)) return;
		$attachment_ids  = $product->get_gallery_image_ids();
		if (has_post_thumbnail()) {
			if( is_array($attachment_ids) ) {
				array_unshift($attachment_ids, get_post_thumbnail_id());
			}else{
				$attachment_ids[] = get_post_thumbnail_id();
			}
		}
		return $attachment_ids;
	}
}

//Get product gallery image ID
if(!function_exists ('tvlgiao_wpdance_get_product_gallery_image_ids')){
	function tvlgiao_wpdance_get_product_gallery_image_ids( $product ) {
		if ( ! is_a( $product, 'WC_Product' ) ) {
			return;
		}

		$attachment_ids = array();
		if ( is_callable( 'WC_Product::get_gallery_image_ids' ) ) {
			$attachment_ids = $product->get_gallery_image_ids();
		} else {
			$attachment_ids = $product->get_gallery_attachment_ids();
		}
		if (count($attachment_ids) > 0) {
			foreach ($attachment_ids as $key => $id) {
				if (!wp_get_attachment_image($id)) {
					unset($attachment_ids[$key]);
				}
			}
		}
		return $attachment_ids;
	}
}

//Add Class to product thumbnail (change image when hover)
if(!function_exists ('tvlgiao_wpdance_add_class_to_shop_loop')){
	function tvlgiao_wpdance_add_class_to_shop_loop( $classes ) {
		global $product;
		if ( get_post_type(get_the_ID()) == 'product' ) {
	        $attachment_ids = tvlgiao_wpdance_get_product_gallery_image_ids( $product );
			if ( (has_post_thumbnail() && get_the_post_thumbnail( $product->get_id()) ) || $attachment_ids ) {
				$classes[] = 'wd-product-has-gallery';
			}
	    }
	    return $classes;
	}
}

//Get HTML secondary thumbnail (change image when hover)
if(!function_exists ('tvlgiao_wpdance_get_product_secondary_thumbnail')){
	function tvlgiao_wpdance_get_product_secondary_thumbnail($image_size = 'shop_catalog') {
		global $product, $woocommerce;

		$attachment_ids = tvlgiao_wpdance_get_product_gallery_image_ids( $product );
		if ( $attachment_ids || (has_post_thumbnail() && get_the_post_thumbnail( $product->get_id()) ) ) {
			$attachment_ids     = ($attachment_ids) ? array_values( $attachment_ids ) : array(get_post_thumbnail_id( $product->get_id() ));
			$secondary_image_id = $attachment_ids['0'];

			$secondary_image_alt = get_post_meta( $secondary_image_id, '_wp_attachment_image_alt', true );
			$secondary_image_title = get_the_title($secondary_image_id);

			$image_html = wp_get_attachment_image( $secondary_image_id, $image_size, '', array(
					'class' => 'secondary-image attachment-shop-catalog wp-post-image wp-post-image--secondary',
					'alt' => $secondary_image_alt,
					'title' => $secondary_image_title
				)
			);
		}else if (has_post_thumbnail() && get_the_post_thumbnail( $product->get_id()) ) {
			$image_html = get_the_post_thumbnail( $product->get_id(), $image_size, array(
					'class' => 'secondary-image attachment-shop-catalog wp-post-image wp-post-image--secondary',
					'alt' => $secondary_image_alt,
					'title' => get_the_title($secondary_image_id)
				) 
			);
		}
		echo $image_html;
	}
}

//Change Woocommerce Breadcrumb Structure
if(!function_exists ('tvlgiao_wpdance_woocommerce_breadcrumbs')){
	function tvlgiao_wpdance_woocommerce_breadcrumbs() {
		$delimiter = '<span class="brn_arrow"><i class="lnr lnr-chevron-right"></i></span> ';
		$front_id = get_option( 'page_on_front' );
		if ( !empty( $front_id ) ) {
			$home = get_the_title( $front_id );
		} else {
			$home = esc_html__( 'Home', 'solar' );
		}
	    return array(
	            'delimiter'   => $delimiter,
	            'wrap_before' => '<div class="wd-breadcrumb-slug-content">',
	            'wrap_after'  => '</div>',
	            'before'      => '',
	            'after'       => '',
	            'home'        => $home,
	        );
	}
}

//Remove "first", "last" class on product loop
if(!function_exists ('tvlgiao_wpdance_remove_first_last_class_from_product')){
	function tvlgiao_wpdance_remove_first_last_class_from_product( $classes ) {
		global $product;
	    if ( get_post_type(get_the_ID()) == 'product' ) {
	        $classes = array_diff( $classes, array( 'first', 'last' ) );
	    }
	    return $classes;
	}
}

// Disable Ajax Call from WooCommerce on front page and posts
if(!function_exists ('tvlgiao_wpdance_dequeue_woocommerce_cart_fragments')){
	function tvlgiao_wpdance_dequeue_woocommerce_cart_fragments() {
		if ( tvlgiao_wpdance_is_woocommerce() ) {
			wp_dequeue_script('wc-cart-fragments');
			if ( get_option('woocommerce_myaccount_page_id') != get_the_ID() 
				&& !is_woocommerce() && !is_cart() && !is_checkout() 
				&& !is_home() && !is_front_page() 
				&& !is_page_template( 'page-templates/template-woocomerce.php' ) 
				&& !is_page_template( 'page-templates/template-home.php' ) 
				&& !is_page_template( 'page-templates/template-home-header-left.php' ) 
				&& !is_page_template( 'page-templates/template-without-header-footer.php' )
				&& !is_page_template( 'page-templates/template-fullpage.php' ) ) {
				# Styles
				wp_dequeue_style( 'woocommerce-general' );
				wp_dequeue_style( 'woocommerce-layout' );
				wp_dequeue_style( 'woocommerce-smallscreen' );
				wp_dequeue_style( 'woocommerce_frontend_styles' );
				wp_dequeue_style( 'woocommerce_fancybox_styles' );
				wp_dequeue_style( 'woocommerce_chosen_styles' );
				wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
				# Scripts
				wp_dequeue_script( 'wc_price_slider' );
				wp_dequeue_script( 'wc-single-product' );
				wp_dequeue_script( 'wc-add-to-cart' );
				wp_dequeue_script( 'wc-checkout' );
				wp_dequeue_script( 'wc-add-to-cart-variation' );
				wp_dequeue_script( 'wc-single-product' );
				wp_dequeue_script( 'wc-cart' );
				wp_dequeue_script( 'wc-chosen' );
				wp_dequeue_script( 'woocommerce' );
				wp_dequeue_script( 'prettyPhoto' );
				wp_dequeue_script( 'prettyPhoto-init' );
				wp_dequeue_script( 'jquery-blockui' );
				wp_dequeue_script( 'jquery-placeholder' );
				wp_dequeue_script( 'fancybox' );
				wp_dequeue_script( 'jqueryui' );
			}
		}
	}
}

// Change order comments placeholder and label
if(!function_exists ('tvlgiao_wpdance_custom_wc_checkout_fields')){
	function tvlgiao_wpdance_custom_wc_checkout_fields( $fields ) {
		/* Billing form */
		$fields['billing']['billing_first_name']['placeholder'] 	= esc_html__( 'First name', 'solar' );
		$fields['billing']['billing_first_name']['label'] 			= '';

		$fields['billing']['billing_last_name']['placeholder'] 		= esc_html__( 'Last name', 'solar' );
		$fields['billing']['billing_last_name']['label'] 			= '';

		$fields['billing']['billing_company']['placeholder'] 		= esc_html__( 'Company name', 'solar' );
		$fields['billing']['billing_company']['label'] 				= '';

		$fields['billing']['billing_country']['label'] 				= '';

		$fields['billing']['billing_address_1']['placeholder'] 		= esc_html__( 'House number and street name', 'solar' );
		$fields['billing']['billing_address_1']['label'] 			= '';

		$fields['billing']['billing_address_2']['placeholder'] 		= esc_html__( 'Apartment, suite, unit etc. (optional)', 'solar' );
		$fields['billing']['billing_address_2']['label'] 			= '';

		$fields['billing']['billing_city']['placeholder'] 			= esc_html__( 'Town / City', 'solar' );
		$fields['billing']['billing_city']['label'] 				= '';

		$fields['billing']['billing_state']['placeholder'] 			= esc_html__( 'State / County', 'solar' );
		$fields['billing']['billing_state']['label'] 				= '';

		$fields['billing']['billing_postcode']['placeholder'] 		= esc_html__( 'Postcode / ZIP', 'solar' );
		$fields['billing']['billing_postcode']['label'] 			= '';

		$fields['billing']['billing_phone']['placeholder'] 			= esc_html__( 'Phone', 'solar' );
		$fields['billing']['billing_phone']['label'] 				= '';

		$fields['billing']['billing_email']['placeholder'] 			= esc_html__( 'Email address', 'solar' );
		$fields['billing']['billing_email']['label'] 				= '';

		/* Shipping form */
		$fields['shipping']['shipping_first_name']['placeholder'] 	= esc_html__( 'First name', 'solar' );
		$fields['shipping']['shipping_first_name']['label'] 		= '';

		$fields['shipping']['shipping_last_name']['placeholder'] 	= esc_html__( 'Last name', 'solar' );
		$fields['shipping']['shipping_last_name']['label'] 			= '';

		$fields['shipping']['shipping_company']['placeholder'] 		= esc_html__( 'Company name', 'solar' );
		$fields['shipping']['shipping_company']['label'] 			= '';

		$fields['shipping']['shipping_country']['label'] 			= '';

		$fields['shipping']['shipping_address_1']['placeholder'] 	= esc_html__( 'House number and street name', 'solar' );
		$fields['shipping']['shipping_address_1']['label'] 			= '';

		$fields['shipping']['shipping_address_2']['placeholder'] 	= esc_html__( 'Apartment, suite, unit etc. (optional)', 'solar' );
		$fields['shipping']['shipping_address_2']['label'] 			= '';

		$fields['shipping']['shipping_city']['placeholder'] 		= esc_html__( 'Town / City', 'solar' );
		$fields['shipping']['shipping_city']['label'] 				= '';

		$fields['shipping']['shipping_state']['placeholder'] 		= esc_html__( 'State / County', 'solar' );
		$fields['shipping']['shipping_state']['label'] 				= '';

		$fields['shipping']['shipping_postcode']['placeholder'] 	= esc_html__( 'Postcode / ZIP', 'solar' );
		$fields['shipping']['shipping_postcode']['label'] 			= '';

		/* Order comment form */
		$fields['order']['order_comments']['placeholder'] 			= esc_html__( 'Notes about your order, e.g. special notes for delivery.', 'solar' );
		$fields['order']['order_comments']['label'] 				= '';
		return $fields;
	}
}

if(!function_exists ('tvlgiao_wpdance_custom_wc_billing_fields')){
	function tvlgiao_wpdance_custom_wc_billing_fields( $fields ) {
		/* Billing form */
		$fields['billing_first_name']['placeholder'] 	= esc_html__( 'First name', 'solar' );
		$fields['billing_first_name']['label'] 			= '';

		$fields['billing_last_name']['placeholder'] 	= esc_html__( 'Last name', 'solar' );
		$fields['billing_last_name']['label'] 			= '';

		$fields['billing_company']['placeholder'] 		= esc_html__( 'Company name', 'solar' );
		$fields['billing_company']['label'] 			= '';

		$fields['billing_country']['label'] 			= '';

		$fields['billing_address_1']['placeholder'] 	= esc_html__( 'House number and street name', 'solar' );
		$fields['billing_address_1']['label'] 			= '';

		$fields['billing_address_2']['placeholder'] 	= esc_html__( 'Apartment, suite, unit etc. (optional)', 'solar' );
		$fields['billing_address_2']['label'] 			= '';

		$fields['billing_city']['placeholder'] 			= esc_html__( 'Town / City', 'solar' );
		$fields['billing_city']['label'] 				= '';

		$fields['billing_state']['placeholder'] 		= esc_html__( 'State / County', 'solar' );
		$fields['billing_state']['label'] 				= '';

		$fields['billing_postcode']['placeholder'] 		= esc_html__( 'Postcode / ZIP', 'solar' );
		$fields['billing_postcode']['label'] 			= '';

		$fields['billing_phone']['placeholder'] 		= esc_html__( 'Phone', 'solar' );
		$fields['billing_phone']['label'] 				= '';

		$fields['billing_email']['placeholder'] 		= esc_html__( 'Email address', 'solar' );
		$fields['billing_email']['label'] 				= '';
		return $fields;
	}
}

if(!function_exists ('tvlgiao_wpdance_custom_wc_shipping_fields')){
	function tvlgiao_wpdance_custom_wc_shipping_fields( $fields ) {
		$fields['shipping_first_name']['placeholder'] 	= esc_html__( 'First name', 'solar' );
		$fields['shipping_first_name']['label'] 		= '';

		$fields['shipping_last_name']['placeholder'] 	= esc_html__( 'Last name', 'solar' );
		$fields['shipping_last_name']['label'] 			= '';

		$fields['shipping_company']['placeholder'] 		= esc_html__( 'Company name', 'solar' );
		$fields['shipping_company']['label'] 			= '';

		$fields['shipping_country']['label'] 			= '';

		$fields['shipping_address_1']['placeholder'] 	= esc_html__( 'House number and street name', 'solar' );
		$fields['shipping_address_1']['label'] 			= '';

		$fields['shipping_address_2']['placeholder'] 	= esc_html__( 'Apartment, suite, unit etc. (optional)', 'solar' );
		$fields['shipping_address_2']['label'] 			= '';

		$fields['shipping_city']['placeholder'] 		= esc_html__( 'Town / City', 'solar' );
		$fields['shipping_city']['label'] 				= '';

		$fields['shipping_state']['placeholder'] 		= esc_html__( 'State / County', 'solar' );
		$fields['shipping_state']['label'] 				= '';

		$fields['shipping_postcode']['placeholder'] 	= esc_html__( 'Postcode / ZIP', 'solar' );
		$fields['shipping_postcode']['label'] 			= '';
		return $fields;
	}
}

if(!function_exists ('tvlgiao_wpdance_custom_add_to_cart_redirect')){
	function tvlgiao_wpdance_custom_add_to_cart_redirect() { 
		return esc_url( wc_get_cart_url() ); 
	}
}

//Get availability product
if(!function_exists ('tvlgiao_wpdance_get_product_availability')){
	function tvlgiao_wpdance_get_product_availability($product) {
		if ( !tvlgiao_wpdance_is_woocommerce() ) {
			return;
		}	
		$availability = $class = "";

		if ( $product->managing_stock() ) {
			if ( $product->is_in_stock() ) {

				if ( $product->get_stock_quantity() > 0 ) {

					$format_option = get_option( 'woocommerce_stock_format' );

					switch ( $format_option ) {
						case 'no_amount' :
							$format = esc_html__( 'In stock', 'solar' );
						break;
						case 'low_amount' :
							$low_amount = get_option( 'woocommerce_notify_low_stock_amount' );

							$format = ( $product->get_stock_quantity() <= $low_amount ) ? esc_html__( 'Only %s left in stock', 'solar' ) : esc_html__( 'In stock', 'solar' );
						break;
						default :
							$format = esc_html__( '%s in stock', 'solar' );
						break;
					}

					$availability = sprintf( $format, $product->get_stock_quantity() );
					$class = 'in-stock';

					if ( $product->backorders_allowed() && $product->backorders_require_notification() )
						$availability .= ' ' . esc_html__( '(backorders allowed)', 'solar' );

				} else {

					if ( $product->backorders_allowed() ) {
						if ( $product->backorders_require_notification() ) {
							$availability = esc_html__( 'Available on backorder', 'solar' );
							$class        = 'available-on-backorder';
						} else {
							$availability = esc_html__( 'In stock', 'solar' );
						}
					} else {
						$availability = esc_html__( 'Out of stock', 'solar' );
						$class        = 'out-of-stock';
					}

				}

			} elseif ( $product->backorders_allowed() ) {
				$availability = esc_html__( 'Available on backorder', 'solar' );
				$class        = 'available-on-backorder';
			} else {
				$availability = esc_html__( 'Out of stock', 'solar' );
				$class        = 'out-of-stock';
			}
		} elseif ( ! $product->is_in_stock() ) {
			$availability = esc_html__( 'Out of stock', 'solar' );
			$class        = 'out-of-stock';
		} elseif ( $product->is_in_stock() ){
			$availability = esc_html__( 'In stock', 'solar' );
			$class        = 'in-stock';		
		}

		return apply_filters( 'woocommerce_get_availability', array( 'availability' => $availability, 'class' => $class ), $product );
	}
}

//use on template woocommerce/single-product/add-to-cart/variable.php
if(!function_exists ('tvlgiao_wpdance_product_attribute_option_html')){
	function tvlgiao_wpdance_product_attribute_option_html($name, $options){ 
		$orderby = wc_attribute_orderby( $name );
		switch ( $orderby ) {
			case 'name' :
				$args = array( 'orderby' => 'name', 'hide_empty' => false, 'menu_order' => false );
				break;
			case 'id' :
				$args = array( 'orderby' => 'id', 'order' => 'ASC', 'menu_order' => false, 'hide_empty' => false );
				break;
			case 'menu_order' :
				$args = array( 'menu_order' => 'ASC', 'hide_empty' => false );
				break;
		}
		$terms = get_terms( $name, $args );
		$select_opt = '';
		$select_opt .= '<div class="wd_color_image_swap">';
		foreach ( $terms as $term ) {
			
			if ( ! in_array( $term->slug, $options ) )
				continue;
			$datas = get_term_meta($term->term_id, "wd_pc_color_config", true );
			if( strlen($datas) > 0 ){
				$datas = unserialize($datas);	
			}else{
				$datas = array(
					'wd_pc_color_color' 	=> "#fff",
					'wd_pc_color_image' 	=> 0
				);
			}
			
			$attr_color 	= ($name == 'pa_color') ? $datas['wd_pc_color_color'] : '#fff';
			$select_style 	= 'min-width: 30px; height:30px; text-align:center; background-color: ' . $attr_color;
			$select_opt 	.= '<div style="'. $select_style .'" class="wd-select-option" data-value="'.esc_attr($term->slug).'" data-attr_name="'.esc_attr($name).'" >';

			if( absint($datas['wd_pc_color_image']) > 0 ){
				$_img = wp_get_attachment_image_src( absint($datas['wd_pc_color_image']), 'wd_small_thumbnail', true ); 
				$_img = $_img[0];
				$select_opt .= '<img alt="'.$attr_color.'" src="'.esc_url( $_img ).'" class="wd_pc_preview_image" />';
				
			} else {
				if ($name == 'pa_color') {
					$select_opt .= '<a href="#" style="'.$select_style.'"></a>';
				}else{
					$select_opt .= '<a href="#" style="'.$select_style.'">'.esc_attr($term->name).'</a>';
				}
				
			}
			$select_opt 	.= "</div>";
			
		}
		$select_opt .= "</div>";
		
		return $select_opt;
	}
}

if(!function_exists ('tvlgiao_wpdance_shop_loop_product_attribute_color')){
	function tvlgiao_wpdance_shop_loop_product_attribute_color(){
		if(!class_exists('WD_Shopbycolor')) {
			return;
		}
		global $product;
		if ( $product->is_type( 'variable' ) ) {
			$attr_name = 'pa_color';
			$attributes = $product->get_variation_attributes();
			if ($attributes && !is_wp_error( $attributes )) {
				foreach ($attributes as $attr => $options) {
					if ($attr == $attr_name) {
						if ( taxonomy_exists( $attr_name ) ) {
				            echo tvlgiao_wpdance_product_attribute_option_html($attr_name, $options);
				        }
					}
				}
			}
		}
	}
}

if(!function_exists ('tvlgiao_wpdance_template_single_review')){
	function tvlgiao_wpdance_template_single_review(){
		global $product;

		if ( get_option( 'woocommerce_enable_review_rating' ) == 'no' )
			return;	
		$rating_html = '';
		if( function_exists('wc_get_rating_html') ){
			$rating_html = wc_get_rating_html($product->get_average_rating());
		}
		if ( $rating_html ) {
			echo "<div class=\"review_wrapper\">";
			echo '<span class="add_new_review"><a href="#reviews" class="inline show_review_form woocommerce-review-link" title="Review for '. esc_attr($product->get_title()) .' "><i class="fa fa-pencil-square-o"></i>' . esc_html__( 'Add your review', 'solar' ) . '</a></span>';
			echo "</div>";
		}else{
			echo '<p><span class="add_new_review"><a href="#reviews" class="inline show_review_form woocommerce-review-link" title="Review for '. esc_attr($product->get_title()) .' "><i class="fa fa-pencil-square-o"></i>' . esc_html__( 'Be the first to review', 'solar' ) . '</a></span></p>';
		}		
	}
}

if(!function_exists ('tvlgiao_wpdance_template_single_availability')){
	function tvlgiao_wpdance_template_single_availability(){
		global $product;
		$_product_stock = tvlgiao_wpdance_get_product_availability($product); ?>
		<p class="availability stock <?php echo esc_attr($_product_stock['class']);?>"><?php esc_html_e('Availability','solar');?>: <span><?php echo esc_attr($_product_stock['availability']);?></span></p><?php		
	}
}

if(!function_exists ('tvlgiao_wpdance_template_single_sku')){
	function tvlgiao_wpdance_template_single_sku(){
		global $product, $post;
		if (trim($product->get_sku())) {
			$sku_label = is_single() ? esc_html__('SKU:','solar') : '';
			echo "<p class='wd_product_sku product_meta'>" . $sku_label . " <span class=\"product_sku sku\" itemprop=\"mpn\">" . esc_attr($product->get_sku()) . "</span></p>";
		}
	}
}

/* woocommerce category image */
if(!function_exists ('tvlgiao_wpdance_woocommerce_category_image')){
	function tvlgiao_wpdance_woocommerce_category_image() {
	    if ( is_product_category() ){
            global $wp_query;
            $cat = $wp_query->get_queried_object();
            $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
            $image = wp_get_attachment_url( $thumbnail_id );
            if ( $image ) {
            		echo "<div class='wd-cat-thumb-archive-product'>";
                    echo '<img src="' . $image . '" alt="'.get_bloginfo('name').'" />';
                    echo "</div>";
                }
        }
	}
}

if(!function_exists ('tvlgiao_wpdance_get_product_share')){
	function tvlgiao_wpdance_get_product_share(){
		echo '<div class="wd_product_share">';
			tvlgiao_wpdance_accessibility_template_single_social_sharing();
		echo '</div>';
	}
}

if(!function_exists ('tvlgiao_wpdance_single_product_tag')){
	function tvlgiao_wpdance_single_product_tag(){
		echo '<div class="wd_product_tags">';
			global $product, $post;
			$_terms = wp_get_post_terms( $product->get_id(), 'product_tag');
			$tags_label = esc_html__("",'solar');
			echo '<div class="tagcloud">';
			
			$_include_tags = '';
			if( count($_terms) > 0 ){
				echo '<span class="tag_heading">'.$tags_label.'</span>';
				foreach( $_terms as $index => $_term ){
					$_include_tags .= ( $index == 0 ? "{$_term->term_id}" : ",{$_term->term_id}" ) ;
				}
				wp_tag_cloud( array('taxonomy' => 'product_tag', 'include' => $_include_tags, 'separator'=>'' ) );
			}
			
			echo "</div>\n";
		echo '</div>';
	}
}

if(!function_exists ('tvlgiao_wpdance_single_product_tag_tab')){
	function tvlgiao_wpdance_single_product_tag_tab( $tabs ) {
		global $product;
		if (count($product->get_tag_ids())){
			$tabs['wd_tag_tab'] = array(
				'title' 	=> __( 'Product Tags', 'solar' ),
				'priority' 	=> 30,
				'callback' 	=> 'tvlgiao_wpdance_single_product_tag'
			);
		}
		return $tabs;
	}
}

if(!function_exists ('tvlgiao_wpdance_product_facebook_comment_form')){
	function tvlgiao_wpdance_product_facebook_comment_form(){ 
		global $tvlgiao_wpdance_theme_options;
		$display 	= $tvlgiao_wpdance_theme_options['tvlgiao_wpdance_comment_facebook_display_on_single_product']; 
		if ($display){ ?>
			<div class="wd-comment-form">
				<?php echo tvlgiao_wpdance_get_comment_form_facebook();; ?>
			</div>
		<?php 
		}
	}
}

if(!function_exists ('tvlgiao_wpdance_product_facebook_comment_form_tab')){
	function tvlgiao_wpdance_product_facebook_comment_form_tab( $tabs ) {
		global $tvlgiao_wpdance_theme_options;
		$display 	 = $tvlgiao_wpdance_theme_options['tvlgiao_wpdance_comment_facebook_display_on_single_product']; 
		if ($display){
			$tabs['wd_facebook_comment_tab'] = array(
				'title' 	=> __( 'Comments', 'solar' ),
				'priority' 	=> 60,
				'callback' 	=> 'tvlgiao_wpdance_product_facebook_comment_form'
			);
		}
		return $tabs;
	}
}

if(!function_exists ('tvlgiao_wpdance_get_product_categories')){
	function tvlgiao_wpdance_get_product_categories(){
		global $product;
		$categories_label = esc_html__("Categories: ",'solar');
		$rs = '';
		$rs .= '<div class="wd_product_categories"><span>'.$categories_label.'</span>';
		$product_categories = wp_get_post_terms(get_the_ID($product),'product_cat');
		$count = count($product_categories);
		if ( $count > 0 ){
			foreach ( $product_categories as $term ) {
			$rs.= '<a href="'.get_term_link($term->slug,$term->taxonomy).'">'.$term->name . "</a>, ";

			}
			$rs = substr($rs,0,-2);
		}
		$rs .= '</div>';
		echo wp_kses_post( $rs );
	}
}

if(!function_exists ('tvlgiao_wpdance_get_product_categories')){
	function tvlgiao_wpdance_get_product_categories(){
		echo '<div class="wd_product_categoried">';
			tvlgiao_wpdance_get_product_categories();
		echo '</div>';
	}
}


if(!function_exists ('tvlgiao_wpdance_archive_number_perpage')){
	function tvlgiao_wpdance_archive_number_perpage(){ 
		/**
	     * package: product-archive-posts-per-page
		 * var: posts_per_page  
		 */
		extract(tvlgiao_wpdance_get_data_package( 'product-archive-posts-per-page' ));
		add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$posts_per_page.';' ), 20 );
	}
}

if(!function_exists ('tvlgiao_wpdance_title_product')){
	function tvlgiao_wpdance_title_product() { 
		/**
	     * package: product-loop-title-word
		 * var: title_word  
		 */
		extract(tvlgiao_wpdance_get_data_package( 'product-loop-title-word' ));
		$title = (!$title_word || $title_word == '-1') ? get_the_title() : wp_trim_words(get_the_title(), $title_word, '...') ;
		?>
		<h2 class="woocommerce-loop-product__title wd-product-shop-loop-title"><?php echo esc_html($title); ?></h2> 
		<?php 
	}
}

if(!function_exists ('tvlgiao_wpdance_short_description_product')){
	function tvlgiao_wpdance_short_description_product() { 
		/**
	     * package: product-description
		 * var: show_description  
		 * var: number_word  
		 */
		extract(tvlgiao_wpdance_get_data_package( 'product-description' )); ?>
		<div itemprop="description" class="wp_description_product <?php echo (!$show_description) ? 'wd_hidden_desc_product' : 'wd_show_desc_product'; ?>">
	 		<?php tvlgiao_wpdance_the_excerpt_max_words($number_word); ?>
	 	</div> 
		<?php 
	}
}

if(!function_exists ('tvlgiao_wpdance_wishlist_button_shop_loop')){
	function tvlgiao_wpdance_wishlist_button_shop_loop(){
		echo do_shortcode('[yith_wcwl_add_to_wishlist]');
	}
}

if(!function_exists ('tvlgiao_wpdance_flash_featured')){
	function tvlgiao_wpdance_flash_featured(){
		global $product;
		if ( $product->is_featured() ) { ?>
			<span class="featured"><?php esc_html_e('Hot','solar');?></span>
		<?php } 
	}
}

//Get Price Sale Percent
if(!function_exists ('tvlgiao_wpdance_get_price_sale_percent')){
	function tvlgiao_wpdance_get_price_sale_percent(){
		global $product;
		if ($product->is_on_sale()){ 
			if( $product->get_regular_price() > 0 ){
				return round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
			}
		}
	}
}
//Get Price Sale Text
if(!function_exists ('tvlgiao_wpdance_get_flash_sale_content')){
	function tvlgiao_wpdance_get_flash_sale_content(){ 
		/**
	     * package: product-sale-flash
		 * var: text  
		 * var: show_percent  
		 */
		extract(tvlgiao_wpdance_get_data_package( 'product-sale-flash' ));
		if ($show_percent) {
			$percent = tvlgiao_wpdance_get_price_sale_percent();
			if ($percent && $percent < 100) {
				$text .= $percent.'%';
			}else{
				$text = __( 'Sale!', 'solar' );
			}
		}
		return $text;
	}
}

if ( ! function_exists( 'tvlgiao_wpdance_offer_shop' ) ) {
	function tvlgiao_wpdance_offer_shop() {
		/** @var WC_Product $product */
		global $product;

		/** @var DateTime|string $sale_price_dates_to */
		$sale_price_dates_to = ( $date = get_post_meta( $product->get_id(), '_sale_price_dates_to', true ) ) ? new DateTime( date_i18n( 'Y-m-d', $date ) ) : '';

		if ( ! empty( $sale_price_dates_to ) ) {
			$now       = new DateTime();
			$offer_end = date_diff( $sale_price_dates_to, $now );

			ob_start();
			?>
			<div class="wd-offer-shop text-center">
				<div class="wd-offer-shop"><?php _e( 'Hurry Up! Offer ends in:', 'solar' ) ?></div>
				<!-- .wd-offer-shop -->
				<div class="wd-offer-shop-date" data-offer="<?php echo date_i18n( 'Y/m/d', $date ) ?>">
					<ul class="offer-end list-inline countdown">
						<li class="date <?php echo $offer_end->y == 0 ? 'hidden' : '' ?>">
							<span class="year"><?php echo $offer_end->y ?></span>
							<span><?php _e( 'Year', 'solar' ) ?></span>
						</li>
						<li class="date <?php echo ( $offer_end->y == 0 && $offer_end->m == 0 ) ? 'hidden' : '' ?>">
							<span class="month"><?php echo $offer_end->m ?></span>
							<span><?php _e( 'Month', 'solar' ) ?></span>
						</li>
						<li class="date <?php echo ( $offer_end->y == 0 && $offer_end->m == 0 && $offer_end->h == 0 ) ? 'hidden' : '' ?>">
							<span class="day"><?php echo $offer_end->d ?></span>
							<span><?php _e( 'Day', 'solar' ) ?></span>
						</li>

						<li class="date">
							<span class="hour"><?php echo $offer_end->h ?></span>
							<span><?php _e( 'Hours', 'solar' ) ?></span>
						</li>
						<li class="date">
							<span class="minute"><?php echo $offer_end->m ?></span>
							<span><?php _e( 'Mins', 'solar' ) ?></span>
						</li>
						<li class="date">
							<span class="second"><?php echo $offer_end->s ?></span>
							<span><?php _e( 'Secs', 'solar' ) ?></span>
						</li>
					</ul>
				</div><!-- .wd-offer-shop-date -->
			</div><!-- .wd-offer-shop -->
			<?php
			echo ob_get_clean();
		}
	}
}
?>