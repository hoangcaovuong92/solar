<?php
/*
Template Name: Home Template (Header Left)
*/
?>
<!DOCTYPE html>
<html itemscope <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php 
	/**
	 * tvlgiao_wpdance_header_meta_data hook.
	 *
	 * @hooked tvlgiao_wpdance_accessibility_display_favicon - 5
	 * @hooked tvlgiao_wpdance_accessibility_facebook_comment_setting_meta - 10
	 */
	do_action('tvlgiao_wpdance_header_meta_data'); ?>
	<?php wp_head(); ?>
</head>
<body  class="home-header-left" <?php body_class(); ?>>
	<?php
	/**
	 * tvlgiao_wpdance_after_opening_body_tag hook.
	 *
	 * @hooked tvlgiao_wpdance_accessibility_facebook_comment_api - 5
	 * @hooked tvlgiao_wpdance_accessibility_loading_page_effect - 10
	 * @hooked tvlgiao_wpdance_content_pushmenu_mobile - 15
	 */ 
	do_action('tvlgiao_wpdance_after_opening_body_tag'); ?>
	<div class="body-wrapper">
		<header id="header" class="header col-md-24 wd-home-header-left-header">
			<div class="hidden-xs hidden-sm">
				<?php 
				/**
				 * tvlgiao_wpdance_header_init_action hook.
				 *
				 * @hooked tvlgiao_wpdance_header_init - 5
				 */
				do_action('tvlgiao_wpdance_header_init_action'); ?>
			</div>
			<div class="wd-header-content wd-header-mobile visible-xs visible-sm">
				<?php
				/**
				 * tvlgiao_wpdance_header_mobile hook.
				 *
				 * @hooked tvlgiao_wpdance_header_menu_mobile - 5
				 */ 
				do_action('tvlgiao_wpdance_header_mobile'); ?>
			</div>
			<div id="wd-header-main-breadcrumb">
				<?php
				/**
				 * tvlgiao_wpdance_init_breadcrumbs hook.
				 *
				 * @hooked tvlgiao_wpdance_init_breadcrumbs - 5
				 */ 
				do_action('tvlgiao_wpdance_init_breadcrumbs'); ?>
			</div>
		</header> <!-- END HEADER  -->
		<div class="col-md-24 wd-home-header-left-wrap">
			<div class="row">
				<?php 
					/**
					 * tvlgiao_wpdance_before_main_content hook.
					 *
					 * @hooked tvlgiao_wpdance_content_before_main_content
					 */
					do_action('tvlgiao_wpdance_before_main_content'); ?>

						<!-- Content Index -->
						<div class="wd-content-home wd-home-header-left-content">
							<div id="primary" class="content-area">
								<main id="main" class="site-main">
									<?php while ( have_posts() ) : the_post(); ?>
										<?php get_template_part( 'template-parts/content', 'page' ); ?>
									<?php endwhile; ?>
								</main><!-- #main -->
							</div><!-- #primary -->
						</div>
						
					<?php 
					/**
					 * tvlgiao_wpdance_after_main_content hook.
					 *
					 * @hooked tvlgiao_wpdance_content_after_main_content
					 */
					do_action('tvlgiao_wpdance_after_main_content'); ?>

				<footer id="footer" class="footer">
					<?php 
					/**
					 * tvlgiao_wpdance_footer_init_action hook.
					 *
					 * @hooked tvlgiao_wpdance_footer_init - 5
					 * @hooked tvlgiao_wpdance_accessibility_scroll_button_site_function - 10
					 */ 
					do_action('tvlgiao_wpdance_footer_init_action'); ?>
				</footer> <!-- END FOOOTER  -->
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>