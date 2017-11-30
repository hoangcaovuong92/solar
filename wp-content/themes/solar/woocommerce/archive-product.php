<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header( 'shop' ); ?>
<?php
	/**
	 * package: archive-product
	 * var: layout  		
	 * var: sidebar_left  	
	 * var: sidebar_right  
   	 * var: columns_product 
   	 * var: custom_shortcode 
	 */
	$custom_content = '';
	extract(array_merge(tvlgiao_wpdance_get_data_package( 'archive-product' ), tvlgiao_wpdance_get_taxonomy_custom_content()));
	
	$columns_product_class 	= 'wd-columns-'.$columns_product;

	if( ($layout == '1-0-0') || ($layout == '0-0-1') ){
		$content_class = "col-md-18 col-sm-24 wd-layout-1-sidebar";
	}elseif($layout == '1-0-1'){
		$content_class = "col-md-12 col-sm-24 wd-layout-2-sidebar";
	}else{
		$content_class = "col-md-24 wd-layout-fullwidth";
	}
?>

<?php 
/**
 * tvlgiao_wpdance_before_main_content hook.
 *
 * @hooked tvlgiao_wpdance_content_before_main_content
 */
do_action('tvlgiao_wpdance_before_main_content'); ?>

	<div class="row wd-product-archive-page wd-main-content">
		<!-- Left Content -->
		<?php if( ($layout == '1-0-0') || ($layout == '1-0-1') ) : ?> 
			<?php tvlgiao_wpdance_display_left_sidebar($sidebar_left); ?>
		<?php endif; // Endif Left?>
		
		<!-- Content Index -->
		<div class="<?php echo esc_attr($content_class); ?>">
			<?php if ($custom_content): ?>
				<div class="wd-archive-custom-content"><?php echo $custom_content; ?></div>
			<?php endif ?>
			<?php
				/**
				 * woocommerce_before_main_content hook.
				 *
				 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				 * @hooked woocommerce_breadcrumb - 20
				 */
				do_action( 'woocommerce_before_main_content' );
			?>
		
			<?php
				/**
				 * woocommerce_archive_description hook.
				 *
				 * @hooked woocommerce_taxonomy_archive_description - 10
				 * @hooked woocommerce_product_archive_description - 10
				 */
				do_action( 'woocommerce_archive_description' );
			?>
		
			<?php if ( have_posts() ) : ?>
		
				<?php
					/**
					 * woocommerce_before_shop_loop hook.
					 *
					 * @hooked wc_print_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked tvlgiao_wpdance_grid_list_toggle_button - 25
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action( 'woocommerce_before_shop_loop' );
				?>
		
				<div class="wd-products-wrapper grid-list-action <?php echo esc_attr($columns_product_class); ?>" data-columns="<?php echo esc_attr($columns_product); ?>">
					<?php woocommerce_product_loop_start(); ?>
		
						<?php woocommerce_product_subcategories(); ?>
		
						<?php while ( have_posts() ) : the_post(); ?>
		
							<?php wc_get_template_part( 'content', 'product' ); ?>
		
						<?php endwhile; // end of the loop. ?>
		
					<?php woocommerce_product_loop_end(); ?>
				</div>
		
				<div class="wd-pagination">
		
					<?php tvlgiao_wpdance_pagination(); ?>
		
				</div>
		
			<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
		
				<?php wc_get_template( 'loop/no-products-found.php' ); ?>
		
			<?php endif; ?>
		
			<?php
				/**
				 * woocommerce_after_main_content hook.
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action( 'woocommerce_after_main_content' );
			?>
		
			<?php
				/**
				 * woocommerce_sidebar hook.
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				do_action( 'woocommerce_sidebar' );
			?>
		
		</div>
		
		<!-- Right Content -->
		<?php if( ($layout == '0-0-1') || ($layout == '1-0-1') ) : ?> 
			<?php tvlgiao_wpdance_display_right_sidebar($sidebar_right); ?>
		<?php endif; // Endif Right?>
	</div>

	<?php if($custom_shortcode != '' && tvlgiao_wpdance_is_visual_composer()): ?> 
		<?php $custom_shortcode = stripslashes($custom_shortcode); ?>
		<div class="wd-archive-product-custom-content">
			<?php echo do_shortcode( "{$custom_shortcode}" ); 	?>
		</div>
	<?php endif; ?>

<?php 
/**
 * tvlgiao_wpdance_after_main_content hook.
 *
 * @hooked tvlgiao_wpdance_content_after_main_content
 */
do_action('tvlgiao_wpdance_after_main_content'); ?>

<?php get_footer( 'shop' ); ?>
