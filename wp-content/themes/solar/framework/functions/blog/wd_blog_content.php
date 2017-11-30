<?php 
/**
 * TVLGIAO WPDANCE FRAMEWORK 2017.
 *
 * @author : Cao Vuong.
 * -Email  : hoangcaovuong92@gmail.com.
 */
 
/*--------------------------------------------------------------*/
/*						 BLOG CONTENT	 						*/
/*--------------------------------------------------------------*/

/**
 * Show article content with customization in the Theme Option
 * $post_format : 'gallery', 'image', 'video', 'audio', 'quote', 'link'
 * $custom_placeholder_set (true or false) : If you do not adjust this parameter, the blog will get the default settings in the Blog Config
 */  
function tvlgiao_wpdance_get_content_blog( $thumbnail_size = 'full', $post_format = '', $custom_placeholder_set = '', $custom_class = '' ) {
	/**
	 * package: content-blog
	 * var: show_title  			
 	 * var: show_thumbnail  		
 	 * var: placeholder_image  	
 	 * var: show_date  			
 	 * var: show_meta  			
 	 * var: show_author  			
 	 * var: show_category
 	 * var: show_number_comments  	
	 * var: show_tag 
 	 * var: show_excerpt  			
 	 * var: number_excerpt  		
 	 * var: show_readmore  		
	 */
	extract(tvlgiao_wpdance_get_data_package( 'content-blog' ));
	$placeholder_image = (is_bool($custom_placeholder_set)) ? $custom_placeholder_set : $placeholder_image;
	ob_start();
	global $post;
	$class = ((has_post_thumbnail() || tvlgiao_wpdance_get_post_attachment() || $placeholder_image) && $post_format != 'audio' && $post_format != 'video') ? 'wd-post-has-thumbnail' : 'wd-post-without-thumbnail';
	if ($post_format == 'audio') { ?>
		<div class="wd-content-post-format-audio <?php echo esc_attr($class); ?> <?php echo esc_attr($custom_class); ?>">
			<?php echo tvlgiao_wpdance_get_embedded_media( array('audio','iframe'), '50%' ); ?>
			<div class="wd-info-post">
				<div class="wd-meta-post">
					<?php tvlgiao_wpdance_display_post_sticky(); ?>
					<?php tvlgiao_wpdance_display_post_date($show_date); ?>
					<?php if ($show_meta): ?>
						<div class="wd-meta-post-wrap">
							<?php tvlgiao_wpdance_display_post_author($show_author); ?>
							<?php tvlgiao_wpdance_display_post_category($show_category); ?>
							<?php tvlgiao_wpdance_display_post_number_comment($show_number_comments); ?>
							<?php tvlgiao_wpdance_display_post_tag($show_tag); ?>
						</div>
					<?php endif ?>
				</div>
				<?php tvlgiao_wpdance_display_post_title($show_title); ?>				
				<?php tvlgiao_wpdance_display_post_excerpt($show_excerpt, $number_excerpt); ?>
				<?php tvlgiao_wpdance_display_post_readmore($show_readmore); ?>
			</div>
		</div>
	<?php
	} elseif ($post_format == 'gallery') { ?>
		<div class="wd-content-post-format-gallery <?php echo esc_attr($class); ?> <?php echo esc_attr($custom_class); ?>">
			<?php if (!is_home()): ?>
				<?php echo tvlgiao_wpdance_display_post_thumbnail_gallery($thumbnail_size, $show_thumbnail, $placeholder_image); ?>
			<?php endif ?>
			<div class="wd-info-post">
				<div class="wd-meta-post">
					<?php tvlgiao_wpdance_display_post_sticky(); ?>
					<?php tvlgiao_wpdance_display_post_date($show_date); ?>
					<?php if ($show_meta): ?>
						<div class="wd-meta-post-wrap">
							<?php tvlgiao_wpdance_display_post_author($show_author); ?>
							<?php tvlgiao_wpdance_display_post_category($show_category); ?>
							<?php tvlgiao_wpdance_display_post_number_comment($show_number_comments); ?>
							<?php tvlgiao_wpdance_display_post_tag($show_tag); ?>
						</div>
					<?php endif ?>
				</div>
				<?php tvlgiao_wpdance_display_post_title($show_title); ?>
				<?php tvlgiao_wpdance_display_post_excerpt($show_excerpt, $number_excerpt); ?>
				<?php tvlgiao_wpdance_display_post_readmore($show_readmore); ?>
			</div>
		</div>
	<?php
	} elseif ($post_format == 'link') { ?>
		<div class="wd-content-post-format-link <?php echo esc_attr($class); ?> <?php echo esc_attr($custom_class); ?>">
			<?php 
			$link = tvlgiao_wpdance_grab_url();
			the_title( '<h1 class="entry-title"><a href="' . $link . '" target="_blank">', '<div class="wd-link-icon"><span class="wd-post-icon wd-post-link"></span></div></a></h1>');  ?>
		</div>
	<?php
	} elseif ($post_format == 'quote') { ?>
		<div class="wd-content-post-format-quote <?php echo esc_attr($class); ?> <?php echo esc_attr($custom_class); ?>">
			<div class="wd-info-post">	
				<?php if (is_home()): ?>
					<div class="wd-meta-post">
						<?php tvlgiao_wpdance_display_post_sticky(); ?>
						<?php tvlgiao_wpdance_display_post_date($show_date); ?>
						<?php if ($show_meta): ?>
							<div class="wd-meta-post-wrap">
								<?php tvlgiao_wpdance_display_post_author($show_author); ?>
								<?php tvlgiao_wpdance_display_post_category($show_category); ?>
								<?php tvlgiao_wpdance_display_post_number_comment($show_number_comments); ?>
								<?php tvlgiao_wpdance_display_post_tag($show_tag); ?>
							</div>
						<?php endif ?>
					</div>
				<?php endif ?>

				<?php if (is_home()): ?>
					<?php tvlgiao_wpdance_display_post_title($show_title); ?>
				<?php endif ?>
				
				<div class="wd-content-quote-info">
					<?php the_excerpt() ?>
				</div>
				<div class="wd-content-quote-author">
					<?php the_author_posts_link(); ?>
				</div>
				<?php tvlgiao_wpdance_display_post_readmore($show_readmore); ?>
			</div>
		</div>
	<?php
	} elseif ($post_format == 'video') { ?>
		<div class="wd-content-post-format-video <?php echo esc_attr($class); ?> <?php echo esc_attr($custom_class); ?>">
			<?php echo tvlgiao_wpdance_get_embedded_media( array('video','iframe') ); ?>
			<div class="wd-info-post">
				<div class="wd-meta-post">
					<?php tvlgiao_wpdance_display_post_sticky(); ?>
					<?php tvlgiao_wpdance_display_post_date($show_date); ?>
					<?php if ($show_meta): ?>
						<div class="wd-meta-post-wrap">
							<?php tvlgiao_wpdance_display_post_author($show_author); ?>
							<?php tvlgiao_wpdance_display_post_category($show_category); ?>
							<?php tvlgiao_wpdance_display_post_number_comment($show_number_comments); ?>
							<?php tvlgiao_wpdance_display_post_tag($show_tag); ?>
						</div>
					<?php endif ?>
				</div>
				<?php tvlgiao_wpdance_display_post_title($show_title); ?>
				<?php tvlgiao_wpdance_display_post_excerpt($show_excerpt, $number_excerpt); ?>
				<?php tvlgiao_wpdance_display_post_readmore($show_readmore); ?>
			</div>
		</div>
	<?php
	} else { ?>
		<div class="wd-content-post-format-none <?php echo esc_attr($class); ?> <?php echo esc_attr($custom_class); ?>">
			<?php echo tvlgiao_wpdance_get_post_thumbnail_html($thumbnail_size, $show_thumbnail, 1, $placeholder_image); ?>
			<div class="wd-info-post">
				<div class="wd-meta-post">
					<?php tvlgiao_wpdance_display_post_sticky(); ?>
					<?php tvlgiao_wpdance_display_post_date($show_date); ?>
					<?php if ($show_meta): ?>
						<div class="wd-meta-post-wrap">
							<?php tvlgiao_wpdance_display_post_author($show_author); ?>
							<?php tvlgiao_wpdance_display_post_category($show_category); ?>
							<?php tvlgiao_wpdance_display_post_number_comment($show_number_comments); ?>
							<?php tvlgiao_wpdance_display_post_tag($show_tag); ?>
						</div>
					<?php endif ?>
				</div>
				<?php tvlgiao_wpdance_display_post_title($show_title); ?>
				<?php tvlgiao_wpdance_display_post_excerpt($show_excerpt, $number_excerpt); ?>
				<?php tvlgiao_wpdance_display_post_readmore($show_readmore); ?>
			</div>
		</div>
	<?php
	}
	return ob_get_clean();
}
?>