<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other 'pages' on your WordPress site will use a different template.
 *
 * @package Wordpress
 * @since wpdance
 *
 **/

get_header(); 
$post_ID		= tvlgiao_wpdance_get_post_by_global();
/*PAGE CONFIG*/
$_page_config 	= tvlgiao_wpdance_get_custom_layout($post_ID);

/**
 * package: default-page
 * var: layout 	
 * var: sidebar_left 
 * var: sidebar_right 
 */
extract(tvlgiao_wpdance_get_data_package( 'default-page' )); 

$layout 		= ($_page_config['layout'] != '0') ? $_page_config['layout'] : $layout;

if ($_page_config['layout'] != '0' && $_page_config['layout'] != '0-0-0') {
	$sidebar_left 	= $_page_config['left_sidebar'];
	$sidebar_right 	= $_page_config['right_sidebar'];
}

if( ($layout == '1-0-0') || ($layout == '0-0-1') ){
	$content_class = "col-md-18 col-sm-24 wd-layout-1-sidebar";
}elseif($layout == '1-0-1'){
	$content_class = "col-md-12 col-sm-24 wd-layout-2-sidebar";
}else{
	$content_class = "col-md-24 wd-layout-fullwidth";
} ?>

<?php 
/**
 * tvlgiao_wpdance_before_main_content hook.
 *
 * @hooked tvlgiao_wpdance_content_before_main_content
 */
do_action('tvlgiao_wpdance_before_main_content'); ?>

	<div class="row wd-content-page wd-main-content">
		<?php tvlgiao_wpdance_display_single_post_title(); ?>
		<!-- Left Content --> 
		<?php if( ($layout == '1-0-0') || ($layout == '1-0-1') ) : ?> 
			<?php tvlgiao_wpdance_display_left_sidebar($sidebar_left); ?>
		<?php endif; // Endif Left?>
		
		<!-- Content Index -->
		<div class="<?php echo esc_attr($content_class); ?>">
			<?php if ( have_posts() ) : ?>
				<!-- Start the Loop --> 
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'page' ); ?>
					<div class="wd-comment-form">
						<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() ) :
							tvlgiao_wpdance_display_comment_form();
						endif;
						?>
					</div>
				<?php endwhile; ?>
				<!-- End the Loop -->
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