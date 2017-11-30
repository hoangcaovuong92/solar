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
 * @since wpdance
 */
?>
<?php get_header(); ?>
<?php
	/**
	 * package: default-blog-page
	 * var: layout 		
	 * var: sidebar_left 	
	 * var: sidebar_right 	
	 * var: show_by_post_format
	 * var: layout_style 	
	 */
	extract(tvlgiao_wpdance_get_data_package( 'default-blog-page' )); 

	if( ($layout == '1-0-0') || ($layout == '0-0-1') ){
		$content_class = "col-md-18 col-sm-24 wd-layout-1-sidebar";
	}elseif($layout == '1-0-1'){
		$content_class = "col-md-12 col-sm-24 wd-layout-2-sidebar";
	}else{
		$content_class = "col-md-24 wd-layout-fullwidth";
	}
	
	$layout_class = ($layout_style == 'grid') ? 'wd-blog-grid-style' : 'wd-blog-list-style';
?>

<?php 
/**
 * tvlgiao_wpdance_before_main_content hook.
 *
 * @hooked tvlgiao_wpdance_content_before_main_content
 */
do_action('tvlgiao_wpdance_before_main_content'); ?>

	<div class="row wd-content-page wd-default-blog-page wd-main-content">
		<!-- Left Content -->
		<?php if( ($layout == '1-0-0') || ($layout == '1-0-1') ) : ?> 
			<?php tvlgiao_wpdance_display_left_sidebar($sidebar_left); ?>
		<?php endif; // Endif Left?>
		
		<!-- Content Index -->
		<div class="wd-default-blog-archive <?php echo esc_attr($content_class); ?> <?php echo esc_attr($layout_class); ?>">
			<?php if ( have_posts() ) : ?>
				<!-- Start the Loop --> 
				<?php while ( have_posts() ) : the_post(); ?>
					<?php
						if ($show_by_post_format) {
							get_template_part( 'template-parts/content', get_post_format());
						} else {
							get_template_part( 'template-parts/content');
						}
					?>
				<?php endwhile; ?>
				<!-- End the Loop -->
				<div class="wd-pagination">
					<?php tvlgiao_wpdance_pagination(); ?>
				</div>
			<?php else: ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; // End If Have Post ?>
		</div>
		
		<!-- Right Content -->
		<?php if( ($layout == '0-0-1') || ($layout == '1-0-1') ) : ?> 
			<?php tvlgiao_wpdance_display_right_sidebar($sidebar_right); ?>
		<?php endif; // Endif Right?>	
	</div>

<?php 
/**
 * tvlgiao_wpdance_after_main_content hook.
 *
 * @hooked tvlgiao_wpdance_content_after_main_content
 */
do_action('tvlgiao_wpdance_after_main_content'); ?>

<?php get_footer(); ?>