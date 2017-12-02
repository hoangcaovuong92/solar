<?php
/**
 * Shortcode: tvlgiao_wpdance_testimonials
 */

if (!function_exists('tvlgiao_wpdance_testimonials_function')) {
	function tvlgiao_wpdance_testimonials_function($atts) {
		extract(shortcode_atts(array(
			'type'					=> 'single',
			'id_testimonial'		=> '-1',
			'id_category'			=> '-1',
			'columns'				=> '1',
			'number_testimonials'	=> '5',
			'style_testimonial'		=> 'style-1',
			'text_align'			=> 'text-center',
			'show_avatar'			=> '1',
			'image_size'			=> 'full',
			'show_customer_name'	=> '1',
			'show_role'				=> '1',
			'show_rating'			=> '1',
			'show_excerpt'			=> '1',
			'number_word_excerpt'	=> '20',
			'class' 				=> ''
		), $atts));
		$args 	= array( 
			'post_type' 	=> 'wd_testimonials',
			'post_status' 	=> 'publish',
		);
		
		if($type == "single"){
			$args['post__in'] 		=  array($id_testimonial);
		}else{
			$args['posts_per_page'] =  $number_testimonials;
			if ($id_category != '-1') {
				$args['tax_query']= array(
			    	array(
				    	'taxonomy' 		=> 'wd_testimonials_categories',
						'terms' 		=> $id_category,
						'field' 		=> 'term_id',
						'operator' 		=> 'IN'
					)
	   			);
			}
		}
		
		wp_reset_postdata();
		$style_testimonial 	= 'wd-testimonials-'.$style_testimonial;
		$testimonials 		= new WP_Query($args);
		$random_id 			= 'wd-shortcode-testimonials-'.mt_rand();
		ob_start(); ?>

		<?php if ($testimonials->have_posts()): ?>
			<div class="wd-shortcode-testimonials <?php echo esc_attr($class); ?> <?php echo esc_attr($style_testimonial); ?> <?php echo esc_attr($text_align); ?>" id="<?php echo esc_attr($random_id ); ?>">
				<?php while ($testimonials->have_posts()) : $testimonials->the_post(); 
					global $post;
					$meta_data		= unserialize(get_post_meta( get_the_ID(), 'wd_testimonials_meta_data', true ));
					$meta_data		= $meta_data['wd_testimonials'];
					$url 			= !empty($meta_data['url']) ? $meta_data['url'] : '#';
					$role			= !empty($meta_data['role']) ? $meta_data['role'] : '';
					$rating			= !empty($meta_data['rating']) ? $meta_data['rating'] : 5;
					$rating_percent	= ($rating/5) * 100;
					$rating_html 	= '<div class="star-rating" title="Rated '.$rating.' out of 5"><span style="width:'.$rating_percent.'%"><strong class="rating">'.$rating.'</strong> out of 5</span></div>';
					$content        = ($number_word_excerpt != '-1') ? wp_trim_words(get_the_content(),$number_word_excerpt, '...') : get_the_content();
				 	?>
					<div class="wd-testimonial-content-wrap">
						<?php if( $show_avatar ): ?>
							<div class="wd-testimonials-avatar">
								<?php if (has_post_thumbnail() && get_the_post_thumbnail()): ?>
									<a href="<?php echo esc_url($url); ?>"><?php the_post_thumbnail($image_size, array( 'alt' => esc_attr(get_the_title()), 'title' => esc_attr(get_the_title()) ));?></a>
								<?php endif ?>
							</div>
						<?php endif; ?>
						<div class="wd-info-testimonial">
							<?php if( $show_customer_name ){ ?>
								<div class="wd-testimonials-customer">
									<a class="title" href="<?php echo esc_url($url); ?>"><?php the_title();?></a>
								</div>
							<?php } ?>

							<?php if( $show_role && $role != '' ){ ?>
								<div class="wd-testimonials-role"><?php echo esc_attr($role); ?></div>
							<?php } ?>

							<?php if( $show_excerpt ){ ?>
								<div class="wd-testimonials-content">
									<?php echo $content; ?>
								</div>
							<?php } ?>

							<?php if( $show_rating ){ ?>
								<div class="wd-testimonials-rating">
									<?php echo $rating_html; ?>
								</div>
							<?php } ?>
						</div>
					</div>			
				<?php endwhile; // End While ?>		
			</div>
			<?php if($type == 'slider') : ?>
				<script type="text/javascript">
					jQuery(document).ready(function(){
						"use strict";					
						var $_this = jQuery('#<?php echo esc_attr( $random_id ); ?>');
						var _auto_play = 1;
						var owl = $_this.owlCarousel({
							loop : true,
							items : <?php echo $columns; ?>,
							nav : true,
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
							touchDrag: true,
							responsiveBaseElement: $_this,
							responsiveRefreshRate: 1000,
							onInitialized: function(){
							}
						});
						owl.find('.owl-prev').html('<span class="lnr lnr-chevron-left"></span>');
	 					owl.find('.owl-next').html('<span class="lnr lnr-chevron-right"></span>');
						$_this.on('click', '.next', function(e){
							e.preventDefault();
							owl.trigger('next.owl.carousel');
						});

						$_this.on('click', '.prev', function(e){
							e.preventDefault();
							owl.trigger('prev.owl.carousel');
						});
					});
				</script>				
			<?php endif; ?>
		<?php endif ?>
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		wp_reset_postdata();
		return $output;
	}
}
add_shortcode('tvlgiao_wpdance_testimonials', 'tvlgiao_wpdance_testimonials_function');
?>