<?php
/**
 * Shortcode: tvlgiao_wpdance_banner_image_2
 */

if (!function_exists('tvlgiao_wpdance_banner_image_2_function')) {
	function tvlgiao_wpdance_banner_image_2_function($atts) {
		extract(shortcode_atts(array(
			'type'				=> 'image',
			'banner_image'		=> '',
			'gallery_image'		=> '',
			'gallery_style'		=> 'style-1',
			'slider_image'		=> '',
			'slider_columns'	=> '1',
			'image_size'		=> 'full',
			'video_id'			=> '',
			'video_width'		=> 570,
			'video_height'		=> 400,
			'video_autoplay'	=> 0,
			'heading_line_1'	=> '',
			'heading_line_2'	=> "",
			'show_line'			=> '1',
			'description'		=> '',
			'position_content'	=> 'center',
			'border_content'	=> '1',
			'show_button'		=> '1',
			'button_style'		=> 'style-1',
			'link_type'			=> 'category_link',
			'url'				=> '#',
			'id_category' 		=> '',
			'button_text' 		=> 'View Category',
			'button_class' 		=> '',
			'class' 			=> ''
		), $atts));
		
		$type_class = ($type == 'video') ? 'wd-banner-plus-video' : 'wd-banner-plus-image';

		if ($link_type == 'category_link' && tvlgiao_wpdance_is_woocommerce()) {
			if ($id_category != '') {
				$link_url = ($id_category == -1 || !term_exists( $id_category, 'product_cat' )) ? get_permalink( wc_get_page_id( 'shop' ) ) : get_term_link( get_term_by( 'id', $id_category, 'product_cat' ), 'product_cat' );
			}else{
				$link_url = '#';
			}
		}else{
			$link_url = $url;
		}
		
		$position_content_class = 'wd-banner-image-position-content-'.$position_content;
		$button_style_class 	= 'wd-banner-image-button-'.$button_style;
		$border_content_class   = ($border_content == 1) ? 'wd-banner-plus-with-border_content' : '';
		$image_attr				= array(
			'alt' 		=> get_bloginfo('name').' - Banner Image Plus',
			'title' 	=> get_bloginfo('name').' - Banner Image Plus',
		);

		$slider_random_id = 'wd-slider-plus-content-'.mt_rand();
		ob_start(); ?>
			<?php if ($type == 'image'): ?>
				<?php if ($banner_image): ?>
					<?php echo wp_get_attachment_image($banner_image, $image_size, false, $image_attr); ?>
				<?php endif ?>
			<?php elseif ($type == 'gallery'): ?>
				<?php if ($gallery_image != ''){
					$gallery_image = explode(',', $gallery_image); 
					$gallery_class = 'wd-banner-image-gallery-'. $gallery_style; ?>
					<div class="<?php echo esc_attr($gallery_class); ?>">
						<?php foreach ($gallery_image as $image): ?>
							<div class="wd-banner-image-gallery-item">
								<?php echo wp_get_attachment_image($image, $image_size, false, $image_attr); ?>
							</div>
						<?php endforeach ?>
					</div>
				<?php } ?>
			<?php elseif ($type == 'video'): ?>
				<?php if ($video_id != ''): ?>
					<iframe width="<?php echo esc_html($video_width); ?>px" height="<?php echo esc_html($video_height); ?>px" src="https://www.youtube.com/embed/<?php echo esc_html($video_id); ?>?autoplay=<?php echo esc_html($video_autoplay); ?>&showinfo=0&controls=0&rel=0" frameborder="0" allowfullscreen></iframe>
				<?php endif ?>	
			<?php elseif ($type == 'slider'): ?>
				<div id="<?php echo esc_attr($slider_random_id); ?>" >
					<?php 
					$banner_image = array();
					if ($slider_image) {
						$slider_image = explode(',', $slider_image);
						foreach ($slider_image as $image) {
							echo wp_get_attachment_image($image, $image_size, false, $image_attr);
						}
					}
					?>
				</div>
			<?php endif ?>
		<?php
		$main_content = ob_get_clean();
		ob_start(); ?>
			<div class="wd-shortcode-banner-plus <?php echo esc_attr($class); ?> <?php echo esc_attr($position_content_class); ?>">
				<?php if ($position_content == 'outside-right' || $position_content == 'inside-right'): ?>
					<div class="<?php echo esc_attr($type_class); ?>">
						<?php echo $main_content; ?>
					</div>			
				<?php endif ?>
				
				<div class="wd-banner-plus-body <?php echo esc_attr($border_content_class); ?>">
					<?php if ($position_content == 'center' && ($banner_image != '' || $slider_image != '' || $video_id)): ?>
						<!-- Show banner image -->
						<div class="wd-banner-plus-image">
							<?php echo $main_content; ?>
						</div>			
					<?php endif ?>
					
					<!-- Content heading... -->
					<?php if( $heading_line_1 != '' || $heading_line_2 != '' || $description != '' || $show_button == '1' ):?>
						<div class="wd-banner-plus-text">
							<?php if ($heading_line_1 != ''): ?>
								<h2 class="wd-banner-plus-heading-1"><?php echo esc_html($heading_line_1); ?></h2>
							<?php endif ?>
							
							<?php if ($heading_line_2 != ''): ?>
								<h3 class="wd-banner-plus-heading-2"><?php echo esc_html($heading_line_2); ?></h3>
							<?php endif ?>
							
							<?php if ($show_line == '1'): ?>
								<hr class="wd-banner-plus-line" />
							<?php endif ?>
							
							<?php if ($description != ''): ?>
								<h3 class="wd-banner-plus-description"><?php echo esc_html($description); ?></h3>
							<?php endif ?>

							<?php if($show_button == '1'):?>
								<div class="wd-banner-plus-button">
									<a class="<?php echo esc_attr($button_style_class); ?> <?php echo esc_attr($button_class); ?>" href="<?php echo esc_url($link_url); ?>"><?php echo esc_attr($button_text); ?></a>
								</div>
							<?php endif;?>
						</div>
					<?php endif ?>
				</div>
				
				<?php if ( $position_content == 'outside-left' || $position_content == 'inside-left' ): ?>
					<div class="<?php echo esc_attr($type_class); ?>">
						<?php echo $main_content; ?>
					</div>				
				<?php endif ?>		
			</div>
			<?php if ($type == 'slider'): ?>
				<script type="text/javascript">
					jQuery(document).ready(function() {
						"use strict";	
						var $_this = jQuery('#<?php echo esc_attr( $slider_random_id ); ?>');
						var owl = $_this.owlCarousel({
							item : 3,
							responsive		:{
								0:{
									items: 2
								},
								480:{
									items: 3
								},
								768:{
									items: <?php echo esc_attr( $slider_columns ); ?>
								},
							},
							nav 			: true,
							navText			: [ '<', '>' ],
							autoplay 		: true,
							autoplayTimeout : 3000,
							dots			: false,
							loop			: true,
							lazyload		: true,
							onInitialized: function(){
								$_this.addClass('loaded').removeClass('loading');
							}
						});
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
add_shortcode('tvlgiao_wpdance_banner_image_2', 'tvlgiao_wpdance_banner_image_2_function');
?>