<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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
	global $product, $post;
	$product_id			= is_object( $product ) ? $product->get_id() : $post->ID;
	//Product Config
	$_product_config 	= tvlgiao_wpdance_get_custom_layout($product_id);

	/**
	 * package: content-single-product
	 * var: layout 		
	 * var: sidebar_left 	
	 * var: sidebar_right 	
	 * var: full_width_detail 
	 */
	extract(tvlgiao_wpdance_get_data_package( 'content-single-product' )); 

	$layout 				= ($_product_config['layout'] != '0') ? $_product_config['layout'] : $layout;

	if ($_product_config['layout'] != '0' && $_product_config['layout'] != '0-0-0') {
		$sidebar_left 	= $_product_config['left_sidebar'];
		$sidebar_right 	= $_product_config['right_sidebar'];
	}

	$class_full_width		= "";
	if($full_width_detail && $layout != '0-0-0'){ $class_full_width = 'wd-fullwidth-detail-pro';}

	if( ($layout == '1-0-0') || ($layout == '0-0-1') ){
		$content_class = "col-md-18 col-sm-24 wd-layout-1-sidebar";
	}elseif($layout == '1-0-1'){
		$content_class = "col-md-12 col-sm-24 wd-layout-2-sidebar";
	}else{
		if($full_width_detail && $layout == '0-0-0'){
			$content_class = "";
		}else{
			$content_class = "col-md-24 wd-layout-fullwidth";
		}
		
	}

	tvlgiao_wpdance_set_product_views($product_id);
?>
<div id="main-content" class="main-content <?php echo esc_attr($class_full_width); ?>">
	<div class="wd-main-content">
		<?php if(!$full_width_detail || $layout != '0-0-0' ){ ?>
		<div class="container">
			<div class="row">
		<?php } ?>
				<!-- Left Content -->
				<?php if( ($layout == '1-0-0') || ($layout == '1-0-1') ) : ?> 
					<?php tvlgiao_wpdance_display_left_sidebar($sidebar_left); ?>
				<?php endif; // Endif Left?>
				<!-- Content Single Post -->
					<div class="<?php echo esc_attr($content_class); ?> content-detail">
						<div class="row wd-content-single-product">
							<?php
								/**
								 * woocommerce_before_main_content hook.
								 *
								 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
								 * @hooked woocommerce_breadcrumb - 20
								 */
								do_action( 'woocommerce_before_main_content' );
							?>
		
								<?php while ( have_posts() ) : the_post(); ?>
		
									<?php wc_get_template_part( 'content', 'single-product' ); ?>
		
								<?php endwhile; // end of the loop. ?>
		
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
					</div>
				<!-- Right Content -->
				<?php if( ($layout == '0-0-1') || ($layout == '1-0-1') ) : ?> 
					<?php tvlgiao_wpdance_display_right_sidebar($sidebar_right); ?>
				<?php endif; // Endif Right?> 
		<?php if(!$full_width_detail || $layout != '0-0-0'){ ?>	
			</div>
		</div>
		<?php } ?>
	</div>
	<div class="wd-related-product-wrap container">
			<div class="row">
		<?php
			/**
			 * tvlgiao_wpdance_after_main_single_product_content hook.
			 *
			 * @hooked woocommerce_output_related_products - 5
			 */
			do_action( 'tvlgiao_wpdance_after_main_single_product_content' );
		?>
		</div>
	</div>
</div><!-- END CONTAINER  -->

<?php get_footer( 'shop' ); ?>