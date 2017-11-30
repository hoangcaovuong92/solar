<?php
/**
 * Shortcode: tvlgiao_wpdance_brand_slider
 */

if (!function_exists('tvlgiao_wpdance_brand_slider_function')) {
	function tvlgiao_wpdance_brand_slider_function($atts) {
		extract(shortcode_atts(array(
			'source'		=> '1',
			'brands'		=> '',
			'image_url'		=> '',
			'image_size'	=> 'full',
			'is_slider'		=> '1',
			'columns'		=> '5',
			'show_nav'		=> '1',
			'auto_play'		=> '1',
			'class' 		=> ''
		), $atts));
		
		$array_data = array();
		if ($source == '1') {
			if ($brands) {
				$brand_terms = get_terms( array(
				    'taxonomy' 		=> 'wpdance_product_brand',
				    'hide_empty' 	=> false,
				    'include'		=> explode(',', $brands),
				) );
			}else{
				$brand_terms = get_terms( array(
				    'taxonomy' 		=> 'wpdance_product_brand',
				    'hide_empty' 	=> false,
				) );
			}
			//List taxonomy slug
			if (count($brand_terms) > 0) {
				foreach ($brand_terms as $brand) {
					$array_data[$brand->term_id] = $brand->slug;
				}
			}
		}else{
			//List attachment image ID
			$array_data = explode(',',$image_url);
		}

		$image_list 	= array();
		if (!$array_data) {
			return;
		}else{

			foreach ($array_data as $key => $value) {
				if ($source == '1'  && tvlgiao_wpdance_is_woocommerce()) {
					$image_id 		= get_term_meta( $key, 'category-image-id', true );
					$shop_url 		= (get_permalink( wc_get_page_id( 'shop' ) ));
					$brand_url 		= add_query_arg( array('wpdance_product_brand' => $value), $shop_url );
					$brand_image 	= wp_get_attachment_image($image_id, $image_size);
				}else{
					$brand_url 		= '#';
					$brand_image 	= wp_get_attachment_image($value, $image_size);
				}
				$image_list[] 	= array(
					'url'	=> $brand_url,
					'image'	=> $brand_image,
				);
			}
		}

		if (count($image_list) < $columns) {
			$is_slider = '0';
		}

		$columns_brand 	= ($is_slider == '0') ? 'wd-columns-'.$columns : '';
		$slider_class  	= ($is_slider == '1') ? 'wd-shortcode-brand-style-slider' : '';
	    $random_id 		= 'wd-brand-slider-'.mt_rand();
		ob_start(); ?>
			<div id="<?php echo esc_attr( $random_id ); ?>" class="wd-shortcode-brand  <?php echo esc_attr($slider_class); ?> <?php echo esc_attr($class); ?> <?php echo esc_attr($columns_brand); ?>">
				<ul class="wd-brand-item-list">

					<?php foreach($image_list as $_image){ ?>
						<li class="wd-brand-item">
							<a href="<?php echo esc_url($_image['url']); ?>" class="wd-brand-url"><?php echo $_image['image']; ?></a>
						</li>
					<?php } ?>

				</ul>
			</div>
			<?php if ($is_slider == 1): ?>
				<script type="text/javascript">
					jQuery(document).ready(function() {
						"use strict";	
						var $_this = jQuery('#<?php echo esc_attr( $random_id ); ?>');
						setTimeout(function(){
							var owl = $_this.find('.wd-brand-item-list').owlCarousel({
								item : <?php echo esc_attr( $columns ); ?>,
								responsive		:{
									0:{
										items: 1
									},
									480:{
										items: 2
									},
									768:{
										items: 3
									},
									992:{
										items: <?php echo esc_attr( $columns ); ?>
									},
									1200:{
										items: <?php echo esc_attr( $columns ); ?>
									}
								},
								nav : true,
								<?php if($auto_play) : ?>
									autoplay: true,
									autoplayTimeout: 3000,
								<?php endif; ?>
								<?php if(!$show_nav) : ?>
									nav : false,
								<?php endif; ?>
								dots			: false,
								loop			: true,
								lazyload		: true,
								onInitialized: function(){
									$_this.addClass('loaded').removeClass('loading');
								}
							});
							<?php if($show_nav) : ?>
								$_this.find('.owl-prev').html('<span class="lnr lnr-chevron-left"></span>');
	 							$_this.find('.owl-next').html('<span class="lnr lnr-chevron-right"></span>');
							<?php endif; ?>
						}, 1000);
					});	
				</script>
			<?php endif ?>
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		wp_reset_postdata();
		return $output;
	}
}
add_shortcode('tvlgiao_wpdance_brand_slider', 'tvlgiao_wpdance_brand_slider_function');
?>