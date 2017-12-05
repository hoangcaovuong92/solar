<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Wordpress
 */
?>
<?php get_header('none'); ?>
<?php
	$content_col_class 		= "col-sm-24";
	$wrap_content_class 	= "row wd-blog-full-width";
?>
<div id="main-content" class="main-content">
	<div class="container">
		<div class="row">
			<div class="wd-single-post-wrap wd-main-content">
				<?php while ( have_posts() ) : the_post();  ?>
					<!-- Content Single Post -->
					<div itemscope itemtype="http://schema.org/Article" class="wd-single-post-content <?php echo esc_attr($content_col_class); ?>">
						<div class="<?php echo esc_attr($wrap_content_class); ?>">
							<div class="wd-content-single">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
				<?php endwhile; // End of the loop. ?>
				
			</div>
		</div>
	</div>
</div><!-- END CONTAINER  -->
<?php get_footer('none'); ?>