<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
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

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $product, $post;
/**
 * package: single-product-thumbnail
 * var: thumbnail_number 
 * var: position_additional
 */
extract(tvlgiao_wpdance_get_data_package( 'single-product-thumbnail' ));

$product_id 		= $product->get_id();
$image_wrap_class 	= ($position_additional == 'left') ? 'wd-single-product-thumbnail-left' : 'wd-single-product-thumbnail-bottom';
$attachment_ids 	= tvlgiao_wpdance_get_product_attachment_ids( $product );
$product_image_class = $attachment_ids ? 'wd-single-product-with-thumbnail' : 'wd-single-product-without-thumbnail'; ?>

<div class="wd-single-product-images images <?php echo esc_attr($image_wrap_class); ?>">
	<div id="wd-single-product-thumbnail-slider">
		<?php do_action( 'woocommerce_product_thumbnails' ); ?>
	</div>
	<?php 
	/**
	 * tvlgiao_after_product_thumbnails hook.
	 *
	 * @hooked tvlgiao_wpdance_get_product_share - 5
	 */
	do_action( 'tvlgiao_after_product_thumbnails' ); ?>

	<?php if( wp_is_mobile() ){
		//Popup thumbnail on mobile ?>
		<a href="#TB_inline?width=800&height=600&inlineId=wd-product-thumbnail-mobile-popup&modal=true" id="show-product-thumbnail-mobile-popup" class="thickbox hidden"></a>
	    <div id="wd-product-thumbnail-mobile-popup" class="subscribe_widget" style="display:none;">
	    	<div id="TB_title">
    			<div id="TB_closeAjaxWindow"><button type="button" id="TB_closeWindowButton"><span class="screen-reader-text"><?php esc_html_e( 'Close', 'solar' ) ?></span><span class="tb-close-icon"></span></button></div>
    		</div>
	    	<img alt="<?php esc_html_e( 'Product Image Popup', 'solar' ) ?>" title="<?php esc_html_e( 'Product Image Popup', 'solar' ) ?>">
		</div>
	<?php } ?>
</div>
