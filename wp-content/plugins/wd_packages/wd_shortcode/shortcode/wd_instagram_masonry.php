<?php
/**
 * Shortcode: tvlgiao_wpdance_instagram_masonry
 */

if (!function_exists('tvlgiao_wpdance_instagram_masonry_function')) {
	function tvlgiao_wpdance_instagram_masonry_function($atts) {
		extract(shortcode_atts(array(
			'insta_user'				=> '',
			'insta_style'				=> "style-insta-1",
			'insta_columns'				=> "4",
			'insta_number'				=> '4',
			'insta_padding'				=> '0',
			'insta_size'				=> 'large',
			'insta_action_click_item'	=> 'lightbox',
			'insta_open_win'			=> '_blank',
			'mansory_image_size'		=> '1:1, 1:1, 2:2, 1:1, 1:1, 1:1, 1:1, 1:1, 1:1',
			'class' 					=> '',
		), $atts));
		$media_array = tvlgiao_wpdance_scrape_instagram($insta_user);
		ob_start(); ?>
			<?php 
			if ( is_wp_error( $media_array ) ) {
				echo esc_html( "error_log", 'wpdancelaparis' );
			} else {
				// filter for images only?
				if ( $images_only = apply_filters( 'wpiw_images_only', FALSE ) ) {
					$media_array = array_filter( $media_array, array( $this, 'images_only' ) );
				}
				// slice list down to required limit
				$media_array = array_slice( $media_array, 0, $insta_number );
				
				$num_post =  count($media_array);
				if( $num_post <= $insta_number ){
					$insta_number = $num_post;
				}

				$style_padding_item = ($insta_padding) ? 'padding:'.$insta_padding.'px;' : '' ;
				$style_wrap_item 	= ($insta_padding) ? 'margin-left:-'.$insta_padding.'px; margin-right:-'.$insta_padding.'px;' : '' ;
				$class_column 		= 'wd-columns-'.$insta_columns;
				$random_id 			= 'wd_insta_slider_'.mt_rand(); ?>
				
				<div class="wd-insta-masonry-wrapper <?php echo esc_attr($insta_style); ?> <?php echo esc_attr($class); ?>">
					<?php 
					$mansory_image_size = $mansory_image_size != '' ? explode(',', $mansory_image_size) : '';
					$class_masonry_wrap = 'wd-instagram-masonry-wrap';
					$class_masonry_item = 'wd-instagram-masonry-item'; ?>

					<div id="<?php echo esc_attr( $random_id ); ?>" class="wd-insta-masonry-content <?php echo esc_attr($class_column); ?>">
						<div class="wd-insta-masonry-content-wrapper">	
							<ul class="wd-insta-masonry-content-item <?php echo esc_attr( $class_masonry_wrap ); ?>">
								<?php $size_count = 0; ?>
								<?php foreach ( $media_array as $item ) { ?>

										<?php 
										$custom_width_class = '';
										$size_count = ($size_count >= count($mansory_image_size)) ? 0 : $size_count;
										$image_size = trim($mansory_image_size[$size_count]);
										if ($image_size == '2:2'){
											$custom_width_class = 'wd-columns-double-width';
										} 
										?>

										<li class="<?php echo esc_attr( $class_masonry_item ); ?> <?php echo esc_attr( $custom_width_class ); ?>">
											<?php 
											$insta_item_link 	= $item['link'];
											$insta_item_class 	= 'wd-insta-item';
											$insta_item_attr 	= 'target="'.esc_attr($insta_open_win).'"';
											if ($insta_action_click_item == 'lightbox') {
												$insta_item_link 	= $item[$insta_size];
												$insta_item_class 	.= ' wd-group-lightbox';
												$insta_item_attr 	= 'rel="'.esc_attr($random_id).'"';
											}
											?>
											<a class="<?php echo esc_attr($insta_item_class); ?>" href="<?php echo esc_url($insta_item_link); ?>" <?php echo $insta_item_attr; ?> >
												<img src="<?php echo esc_url( $item[$insta_size] ); ?>" alt="<?php echo esc_attr( $item['description'] ); ?>"  title="<?php echo esc_attr( $item['description'] ); ?>"/>
											</a>
										</li>
									<?php $size_count++; ?>
								<?php } // End For?>

							</ul>
						</div>

						<script type="text/javascript">
							jQuery(document).ready(function(){
								setTimeout(function(){
									if(jQuery('.wd-instagram-masonry-wrap').length > 0 ){
										jQuery('.wd-instagram-masonry-wrap').isotope({
											layoutMode: 'masonry',
											itemSelector: '.wd-instagram-masonry-item',
										});	
									}
								}, 300);
								<?php if ( $insta_action_click_item == 'lightbox') : ?>
									jQuery("a.wd-group-lightbox").fancybox({
										openEffect: 'elastic',
										closeEffect: 'elastic',
										closeBtn: false,
										helpers: {
											title	: {
												type: 'outside'
											},
											thumbs	: {
												width	: 50,
												height	: 50
											},
											overlay: {
												css: {
													'background': 'rgba(153, 174, 195, 0.85)'
												}
											}
										},
									});
								<?php endif; ?>
							});
						</script>
					</div>
				</div>	

			<?php } // End if; ?>
			
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		wp_reset_postdata();
		return $output;
	}
}
add_shortcode('tvlgiao_wpdance_instagram_masonry', 'tvlgiao_wpdance_instagram_masonry_function');
?>