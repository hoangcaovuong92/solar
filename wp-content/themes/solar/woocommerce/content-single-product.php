<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
	exit; // Exit if accessed directly
} ?>

<?php
/**
 * woocommerce_before_single_product hook.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
 	echo get_the_password_form();
 	return;
}
global $product, $post;
$product_id				= $product->get_id();
$_product_config 		= tvlgiao_wpdance_get_custom_layout($product_id);

/**
 * package: single-product
 * var: layout			
 * var: full_width_detail	
 * var: content_after_summary
 */
extract(tvlgiao_wpdance_get_data_package( 'single-product' )); 

$layout = ($_product_config['layout'] != '0') ? $_product_config['layout'] : $layout;

if ($_product_config['layout'] != '0' && $_product_config['layout'] != '0-0-0') {
	$sidebar_left 	= $_product_config['left_sidebar'];
	$sidebar_right 	= $_product_config['right_sidebar'];
} ?>

<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if($full_width_detail && $layout == '0-0-0'){ ?>
		<div class="wd-full-width-single-product">
	<?php } ?>
	<?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10 - removed
		 * @hooked woocommerce_show_product_images - 20 
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<div class="wd-description-single-pro">
		<?php
			/**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked tvlgiao_wpdance_template_single_review - 12
			 * @hooked woocommerce_template_single_price - 14
			 * @hooked tvlgiao_wpdance_template_single_availability 16
			 * @hooked tvlgiao_wpdance_template_single_sku - 18
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' ); 
		?>
		</div>
		<?php if($content_after_summary != '' && tvlgiao_wpdance_is_visual_composer()): ?> 
			<?php $content_after_summary = stripslashes($content_after_summary); ?>
			<div class="wd-single-product-summary-custom-content">
				<?php echo do_shortcode( "{$content_after_summary}" ); 	?>
			</div>
		<?php endif; ?>
	</div><!-- .summary -->

	<?php if($full_width_detail && $layout == '0-0-0'){ ?>
		</div>
	<div class="container">
		<div class="row">
	<?php } ?>
		<?php
			/**
			 * woocommerce_after_single_product_summary hook.
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_output_related_products - 20
			 * @hooked woocommerce_upsell_display - 25
			 */
			do_action( 'woocommerce_after_single_product_summary' );
		?>
	<?php if($full_width_detail && $layout == '0-0-0'){ ?>	
		</div>
	</div>
	<?php } ?>
	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
