<?php
/*
Template Name: Woocommerce Template
*/
get_header( 'shop' ); 
$post_ID		= tvlgiao_wpdance_get_post_by_global();
/*PAGE CONFIG*/
$_page_config 	= tvlgiao_wpdance_get_custom_layout($post_ID);

/**
 * package: woocommerce-page
 * var: layout 	
 * var: sidebar_left 
 * var: sidebar_right 
 * var: custom_shortcode 
 */
extract(tvlgiao_wpdance_get_data_package( 'woocommerce-page' )); 

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

	<div class="row wd-woocommerce-page wd-main-content">
		<!-- Left Content -->
		<?php if( ($layout == '1-0-0') || ($layout == '1-0-1') ) : ?> 
			<?php tvlgiao_wpdance_display_left_sidebar($sidebar_left); ?>
		<?php endif; // Endif Left?>
		
		<!-- Content Index -->
		<div class="<?php echo esc_attr($content_class); ?>">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content', 'page' ); ?>
					<?php endwhile; ?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	
		<!-- Right Content -->
		<?php if( ($layout == '0-0-1') || ($layout == '1-0-1') ) : ?> 
			<?php tvlgiao_wpdance_display_right_sidebar($sidebar_right); ?>
		<?php endif; // Endif Right?>	
	</div>

	<?php if($custom_shortcode != '' && tvlgiao_wpdance_is_visual_composer()): ?> 
		<?php $custom_shortcode = stripslashes($custom_shortcode); ?>
		<div class="wd-woo-template-custom-content">
			<?php echo do_shortcode( "{$custom_shortcode}" ); 	?>
		</div>
	<?php endif; ?>

<?php 
/**
 * tvlgiao_wpdance_after_main_content hook.
 *
 * @hooked tvlgiao_wpdance_content_after_main_content
 */
do_action('tvlgiao_wpdance_after_main_content'); ?>

<?php get_footer( 'shop' ); ?>