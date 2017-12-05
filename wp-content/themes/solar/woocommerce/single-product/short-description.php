<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
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

global $post;
/*
if ( ! $post->post_excerpt ) {
	return;
}
*/
?>
<?php do_action('tvlgiao_wpdance_before_single_product_desc'); ?>
<?php if ( $post->post_excerpt || get_the_content() ) { ?>
	<div class="wd-single-product-title"><?php esc_html_e( 'Mô tả sản phẩm', 'solar' ) ?></div>
	<div class="woocommerce-product-details__short-description">
	    <?php echo ($post->post_excerpt) ? apply_filters( 'woocommerce_short_description', $post->post_excerpt ) : get_the_content(); ?>
	</div>
<?php } ?>
<?php do_action('tvlgiao_wpdance_after_single_product_desc'); ?>
