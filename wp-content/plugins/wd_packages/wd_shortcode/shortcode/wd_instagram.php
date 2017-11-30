<?php
/**
 * Shortcode: tvlgiao_wpdance_instagram
 */

if (!function_exists('tvlgiao_wpdance_instagram_function')) {
	function tvlgiao_wpdance_instagram_function($atts) {
		extract(shortcode_atts(array(
			'insta_title'				=> '',
			'insta_desc'				=> '',
			'insta_follow'				=> '1',
			'insta_follow_text'			=> 'Follow Me',
			'insta_user'				=> '',
			'insta_style'				=> "style-insta-1",
			'insta_columns'				=> "4",
			'insta_number'				=> '4',
			'insta_padding'				=> '0',
			'insta_size'				=> 'large',
			'insta_action_click_item'	=> 'lightbox',
			'insta_open_win'			=> '_blank',
			'is_slider'					=> '0',
			'show_nav'					=> '1',
			'auto_play'					=> '1',
			'per_slide'					=> '1',
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
				
				//count number of image (max 12)
				$num_post =  count($media_array);
				if( $num_post < 2 || $num_post <= ($per_slide * $insta_columns) ){
					$is_slider = 0;
				}
				if( $num_post <= $insta_number ){
					$insta_number = $num_post;
				}

				$style_padding_item = ($insta_padding && !$is_slider) ? 'padding:'.$insta_padding.'px;' : '' ;
				$style_wrap_item 	= ($insta_padding && !$is_slider) ? 'margin-left:-'.$insta_padding.'px; margin-right:-'.$insta_padding.'px;' : '' ;
				$class_column 		= ( $is_slider == '0') ? 'wd-columns-'.$insta_columns : '';
				$random_id 			= ( $is_slider == '1') ? 'wd_insta_slider_'.mt_rand() : 'wd_insta_image_'.mt_rand(); ?>
				
				<div class="wd-instagram-wrapper <?php echo esc_attr($insta_style); ?> <?php echo esc_attr($class); ?>">
					<?php if ($insta_title != "" || $insta_desc != '' || $insta_follow): ?>
						<div class="wd-insta-header">
						
							<?php if($insta_title != ""): ?>
								<h2><?php echo esc_attr($insta_title); ?></h2>
							<?php endif; ?>

							<?php if($insta_desc != '' || $insta_follow) : ?> 
								<p class="wd-insta-follow">
									<?php if($insta_desc != '') : ?>
										<?php echo esc_html($insta_desc); ?>
									<?php endif; ?>
									<?php if($insta_desc != '' && $insta_follow) : ?>
										<?php _e(' | ','wpdancelaparis') ?>
									<?php endif; ?>
									<?php if($insta_follow) : ?>
										<a target="_blank" href="https://www.instagram.com/<?php echo esc_attr($insta_user);?>"><?php echo esc_html($insta_follow_text); ?></a>
									<?php endif; ?>
								</p>
							<?php endif; ?>

						</div>
					<?php endif ?>
					
					<div id="<?php echo esc_attr( $random_id ); ?>" class="wd-insta-content <?php echo esc_attr($class_column); ?>">
						<div class="wd-insta-content-wrapper">

							<?php if ($is_slider == '1') : ?>
								<div style="<?php echo esc_attr( $style_wrap_item ); ?>" class="wd-insta-content-item">
							<?php else: ?>
								<ul style="<?php echo esc_attr( $style_wrap_item ); ?>" class="wd-insta-content-item">
							<?php endif ?>

								<?php $count = 0; ?>
								<?php foreach ( $media_array as $item ) { ?>

									<?php if (($count == 0 || $count % $per_slide == 0) && $is_slider == '1') : ?>
										<ul class="widget_per_slide">
									<?php endif; // Endif ?>

										<li style="<?php echo esc_attr( $style_padding_item ); ?>">
											<?php 
											$insta_item_link 	= $item['link'];
											$insta_item_class 	= 'wd-insta-item';
											$insta_item_attr 	= 'target="'.esc_attr($insta_open_win).'"';
											if ($insta_action_click_item == 'lightbox') {
												$insta_item_link 	= $item[$insta_size];
												$insta_item_class 	.= ' wd-group-lightbox';
												$insta_item_attr 	= 'data-fancybox-group="'.esc_attr($random_id).'"';
											}
											?>
											<a class="<?php echo esc_attr($insta_item_class); ?>" href="<?php echo esc_url($insta_item_link); ?>" <?php echo $insta_item_attr; ?> >
												<img src="<?php echo esc_url( $item[$insta_size] ); ?>" alt="<?php echo esc_attr( $item['description'] ); ?>"  title="<?php echo esc_attr( $item['description'] ); ?>"/>
											</a>
										</li>

									<?php $count++; ?>
									<?php if( ($count % $per_slide == 0 || $count == $insta_number) && $is_slider == '1' ): ?>
										</ul>
									<?php endif; // Endif ?>

								<?php } // End For?>

							<?php if ($is_slider == '1') : ?>
								</div>
							<?php else: ?>
								</ul>
							<?php endif ?>
							
						</div>

						<?php if( $show_nav && $is_slider ){ ?>
							<?php tvlgiao_wpdance_slider_control(); ?>
						<?php } ?>
						<?php if ( $insta_action_click_item == 'lightbox' || $is_slider) : ?>
							<script type="text/javascript">
								jQuery(document).ready(function(){
									"use strict";	
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
									<?php endif; //Endif is Lightbox ?>

									<?php if ( $is_slider == '1') : ?>
										var $_this = jQuery('#<?php echo esc_attr( $random_id ); ?>');
										var _auto_play = <?php echo esc_attr( $auto_play ); ?>;
										var owl = $_this.find('.wd-insta-content-wrapper .wd-insta-content-item').owlCarousel({
											loop : true,
											items : 1,
											nav : false,
											margin: <?php echo esc_attr( $insta_padding ); ?>,
											dots : false,
											navSpeed : 1000,
											slideBy: 1,
											rtl:jQuery('body').hasClass('rtl'),
											navRewind: false,
											autoplay: _auto_play,
											autoplayTimeout: 5000,
											autoplayHoverPause: true,
											autoplaySpeed: false,
											mouseDrag: true,
											touchDrag: false,
											responsiveBaseElement: $_this,
											responsiveRefreshRate: 1000,
											responsive:{
												0:{
													items : 1
												},
												300:{
													items : 1
												},
												579:{
													items : <?php if($insta_columns > 5){echo 3;}elseif($insta_columns == 4){echo $insta_columns;}elseif($insta_columns==3){echo $insta_columns - 1;}else{echo $insta_columns;}  ?>
												},
												767:{
													items : <?php if($insta_columns > 5){echo 4;}elseif($insta_columns == 4){echo $insta_columns;}elseif($insta_columns==3){echo $insta_columns;}else{echo $insta_columns;}  ?>
												},
												1100:{
													items : <?php echo $insta_columns ?>
												}
											},
											onInitialized: function(){
											}
										});
										$_this.on('click', '.next', function(e){
											e.preventDefault();
											owl.trigger('next.owl.carousel');
										});

										$_this.on('click', '.prev', function(e){
											e.preventDefault();
											owl.trigger('prev.owl.carousel');
										});
									<?php endif; //Endif Slider ?>
								});
							</script>
						<?php endif; //Endif Slider ?>
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
add_shortcode('tvlgiao_wpdance_instagram', 'tvlgiao_wpdance_instagram_function');
?>