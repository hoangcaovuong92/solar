<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @package Wordpress
 * @since   wpdance
 */
?>
<?php get_header(); ?>
<?php
	$category 		= get_queried_object();
	$id_category	= $category->term_id;
	$image_size   	= 'full';
	$layout_mode  	= 'masonry';
	$columns 	  	= '4';
	$style 			= 'portfolio-style-1';
	$random_width  	= 1;
	$tab_rand   	= mt_rand();
	$number_loadmore = 6;
	$random_width   = 1;
	$sort			= 'date';
	$order_by		= 'DESC'; 
	$gap 			= '15';
?>
<div id="main-content" class="main-content">
	<div class="container">
		<div class="row">
			<div class="row wd-content-page wd-main-content">
				<!-- Content Index -->
				<div class="wd-default-blog-archive wd-layout-fullwidth">
					<?php if ( have_posts() ) : ?>
						<div class='wd-shortcode-masonry-portfolio <?php echo $style; ?>'>
							<div class="grid-isotope masonry-content" data-layout="<?php echo $layout_mode; ?>">
								<?php while ( have_posts() ) : the_post(); ?>
									<?php include( WDP_BASE . '/templates/partials/portfolio_masonry.php' ); ?>
								<?php endwhile; ?>
							</div><!-- .grid -->
							<div class="clear clearfix"></div>
							<div class="wd-loadmore">
								<div style="display: none;" class="show_image_loading">
									<img src="<?php echo WDP_IMAGE . '/ajax-loader_image.gif'; ?>" alt="HTML5 Icon"
									     style="height:15px;">
								</div><!-- .show_image_loading -->
								<div class="load_more_masonry">
									<a class="button btn_loadmore_masonry_portfolio" 
										data-number="<?php echo esc_attr( $number_loadmore ); ?>"
									   	data-id-category="<?php esc_html_e( $id_category ); ?>"
									   	data-columns="<?php esc_html_e( $columns ); ?>"
									   	data-sort="<?php esc_html_e( $sort ); ?>"
									   	data-order_by="<?php esc_html_e( $order_by ); ?>"
									   	data-image_size="<?php esc_html_e( $image_size ); ?>"
									   	data-tab-rand="<?php echo $tab_rand ?>"
									   	data-style="<?php esc_html_e( $style ); ?>"
									   	data-width-rand="<?php echo esc_attr( $random_width ); ?>"
									   	data-layout-mode="<?php echo esc_attr( $layout_mode ); ?>"
									   	data-gap="<?php echo esc_attr( $gap ); ?>">
										<?php _e( 'LOAD MORE', 'wpdance' ) ?>
									</a>
								</div><!-- .load_more_masonry -->
							</div><!-- .loadmore -->
						</div><!-- .wd-shortcode-masonry-portfolio -->
						<?php wp_reset_postdata(); ?>
					<?php else: ?>
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
					<?php endif; // End If Have Post ?>
				</div>
			</div>
		</div>
	</div>
</div><!-- END CONTAINER  -->
<?php get_footer(); ?>