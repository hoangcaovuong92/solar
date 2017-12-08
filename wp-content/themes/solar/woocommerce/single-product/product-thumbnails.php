<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
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

global $product, $post; 
/**
 * package: single-product-thumbnail
 * var: thumbnail_number 
 * var: position_additional
 */
extract(tvlgiao_wpdance_get_data_package( 'single-product-thumbnail' ));  

$product_id 	= $product->get_id();
$attachment_ids = tvlgiao_wpdance_get_product_attachment_ids( $product ); ?>

<?php if ($attachment_ids): ?>
	<?php 
	$vertical 	= ($position_additional == "left") ? true : false;
	$_random_id = 'product_thumbnails_wrapper_'.rand(); ?> 
	<div id="<?php echo esc_attr($_random_id); ?>">
		<ul class="product_thumbnails">
			<?php
				$loop = 0;
				foreach ( $attachment_ids as $attachment_id ) {
					$classes = array(  );
					$image_link = wp_get_attachment_url( $attachment_id );

					if ( ! $image_link ) 
						continue;	 
						
					$image_class = esc_attr( implode( ' ', $classes ) );
					$image_class .= ' woocommerce-gallery-image';
					$image_class .= (wp_is_mobile()) ? ' wd-product-thumbnail-mobile' : ' pop_cloud_zoom cloud-zoom-gallery';

					$image_title = esc_attr( $product->get_title() );
					$_thumb_size =  apply_filters( 'single_product_large_thumbnail_size', 'shop_single' );
					$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_catalog' ),array( 'alt' => $image_title, 'title' => $image_title ) );
					$image_src   = wp_get_attachment_image_src( $attachment_id, $_thumb_size );
					if ( $loop == 0 )
						$image_class .= ' first active';
					
					if (wp_is_mobile()) {
						echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<li><a href="%s" class="%s" title="%s">%s</a></li>', $image_link, $image_class, $image_title, $image ), $attachment_id, $product_id , $image_class );
					}else{
						echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<li><a href="%s" class="woocommerce-main-image cloud-zoom zoom on_pc %s" title="%s" rel="position:\'right\',showTitle:1,titleOpacity:0.5,lensOpacity:0.5,fixWidth:362,fixThumbWidth:72,fixThumbHeight:72, adjustY:-4">%s</a></li>', $image_link, $image_class, $image_title, $image ), $attachment_id, $product_id , $image_class );
					}
					
					$loop++;
				}
			?>
		</ul>
	</div>
	<?php $_found_post 	= count($attachment_ids) > $thumbnail_number ? $thumbnail_number : count($attachment_ids); ?>
	<span 	class="wd-product-thumbs-content hidden" 
			data-wrap_id="<?php echo esc_attr($_random_id); ?>"
			data-vertical="<?php echo esc_attr($vertical); ?>"
			data-total_thumbs="<?php echo esc_attr(count($attachment_ids)); ?>"
			data-num="<?php echo esc_attr($_found_post); ?>" >
	</span>
<?php endif ?>
