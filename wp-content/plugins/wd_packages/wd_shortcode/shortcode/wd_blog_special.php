<?php
/**
 * Shortcode: tvlgiao_wpdance_special_blog
 */
if(!function_exists('tvlgiao_wpdance_special_blog_function')){
	function tvlgiao_wpdance_special_blog_function($atts,$content){
		extract(shortcode_atts(array(
			'layout'				=> 'title, meta, excerpt, readmore',
			'style'					=> 'grid',
			'columns'				=> 3,
			'title'					=> '',
			'number'				=> 6,
			'data_post'				=> 'recent-post',
			'show_thumbnail'  		=> '1',
			'show_placeholder_image'  => '0',
			'image_size'  			=> 'post-thumbnail',
			'show_date'				=> '1',
			'show_author'			=> '1',
			'show_category'			=> '1',
			'show_number_comments'	=> '1',
			'number_excerpt'		=> '10',
			'is_slider'				=> '1',
			'show_nav'				=> '1',
			'auto_play'				=> '1',
			'per_slide'				=> 3,
			'class'					=> ''
		),$atts));

		$grid_list_class 	= ($style == 'grid') ? "wd-blog-grid-style" : "wd-blog-list-style";
		$columns_class 		= ($is_slider == '0') ? 'wd-columns-'.$columns : '';
		$layout 			= ($layout) ? explode(',', $layout) : array();

		$args = array(
			'post_type'				=> 'post',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page'		=> $number,
			'post_status'			=> 'publish'
		);
		if($data_post == 'most-view'){
			$args['meta_key'] 		= '_wd_post_views_count';
			$args['orderby'] 		= 'meta_value_num';
			$args['order'] 			= 'DESC';
		}
		wp_reset_query();
		$recent_posts = new WP_Query($args);
		ob_start();

		if ( $recent_posts->have_posts() ) {
			$num_post =  $recent_posts->post_count;
			if( $num_post < 2 || $num_post <= $per_slide ){
				$is_slider = 0;
			}
			$random_id = 'wd-special-post'.mt_rand();
			?>
			<div id="<?php echo esc_attr( $random_id ); ?>" class="wd-special-post-wrapper <?php echo ($show_nav)?'has_navi':''; ?> <?php echo esc_attr( $grid_list_class ); ?> <?php echo esc_attr( $columns_class ); ?> <?php echo esc_attr( $class ); ?>">
				<?php if($title != "") : ?>
					<div class="wd-title wd-special-post-title">
						<h2><?php echo esc_attr( $title ); ?></h2>
					</div>
				<?php endif; ?>
				<div class="widget-list-post-inner">
					<?php
					$count = 0;	
					while( $recent_posts->have_posts() ) {
						$recent_posts->the_post();
						global $post;
						if ($count == 0 || $count % $per_slide == 0 ){ ?>
							<div class="widget-per-slide">
								<ul>
						<?php } ?>
								<li> 
									<div class="wd-wrap-content-blog"> 
										<?php echo tvlgiao_wpdance_get_post_thumbnail_html( $image_size, $show_thumbnail, 1, $show_placeholder_image ); ?>
										<div class="wd-info-post">
											<?php foreach ($layout as $layout_part){
												$layout_part = trim($layout_part);
												if ($layout_part == 'title') {
													tvlgiao_wpdance_display_post_title(true);
												}elseif ($layout_part == 'meta') {
													tvlgiao_wpdance_display_post_sticky();
													tvlgiao_wpdance_display_post_date($show_date); ?>
													<div class="wd-meta-post-wrap">
														<?php tvlgiao_wpdance_display_post_author($show_author); ?>
														<?php tvlgiao_wpdance_display_post_category($show_category); ?>
														<?php tvlgiao_wpdance_display_post_number_comment($show_number_comments); ?>
													</div>
												<?php
												}elseif ($layout_part == 'excerpt') {
													tvlgiao_wpdance_display_post_excerpt(true, $number_excerpt);
												}elseif ($layout_part == 'readmore') {
													tvlgiao_wpdance_display_post_readmore(true);
												}
											} ?>
										</div>
									</div>
								</li>
						<?php $count++; if( $count % $per_slide == 0 || $count == $num_post){ ?>
								</ul>
							</div>
						<?php
						}
					} ?>
				</div>
				<?php if( $show_nav && $is_slider ){ ?>
					<?php tvlgiao_wpdance_slider_control(); ?>
				<?php } ?>
			</div>

			<?php if( $is_slider ) : ?>
				<script type="text/javascript">
					jQuery(document).ready(function(){
						"use strict";						
						var $_this = jQuery('#<?php echo esc_attr( $random_id ); ?>');
						var _auto_play = <?php echo esc_attr( $auto_play ); ?>;
						var owl = $_this.find('.widget-list-post-inner').owlCarousel({
							loop : true,
							items : <?php echo $columns ?>,
							nav : false,
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
								480:{
									items : 1
								},
								768:{
									items : <?php echo ($columns > 1) ? $columns - 1 : 1; ?>
								},
								992:{
									items : <?php echo $columns; ?>
								},
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
					});
				</script>
			<?php endif; // End if			
		}
		$output = ob_get_contents();
		ob_end_clean();
		wp_reset_query();
		return $output;
	}
}
add_shortcode('tvlgiao_wpdance_special_blog','tvlgiao_wpdance_special_blog_function');
?>