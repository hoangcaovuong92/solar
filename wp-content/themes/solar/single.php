<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Wordpress
 */

get_header(); 	
$post_ID		= tvlgiao_wpdance_get_post_by_global();
//Set Post View
tvlgiao_wpdance_set_post_views($post_ID);
//Post Config
$_post_config 	= tvlgiao_wpdance_get_custom_layout($post_ID);

/**
 * package: single-blog
 * var: layout 		
 * var: sidebar_left 	
 * var: sidebar_right 	
 * var: show_author_information'
 * var: show_previous_next_btn'
 * var: show_recent_blog 
 * var: show_title  	
 * var: show_thumbnail  
 * var: show_date  	
 * var: show_author  	
 * var: show_number_comments 
 * var: show_tag 
 * var: show_category  
 * var: show_excerpt  	
 * var: number_excerpt  
 * var: show_readmore  
 */
extract(tvlgiao_wpdance_get_data_package( 'single-blog' )); 

$layout 		= ($_post_config['layout'] != '0') ? $_post_config['layout'] : $layout;

if ($_post_config['layout'] != '0' && $_post_config['layout'] != '0-0-0') {
	$sidebar_left 	= $_post_config['left_sidebar'];
	$sidebar_right 	= $_post_config['right_sidebar'];
}

$wrap_content_class 		= '';
$wrap_parent_class 			= '';
if( ($layout == '1-0-0') || ($layout == '0-0-1') ){
	$content_col_class 		= "col-md-18 col-sm-24";
	$wrap_parent_class 		= "row";
	if (($layout == '1-0-0')) {
		$wrap_content_class = "wd-blog-left-sidebar";
	}elseif($layout == '0-0-1'){
		$wrap_content_class = "wd-blog-right-sidebar";
	}
}elseif($layout == '1-0-1'){
	$content_col_class 		= "col-md-12 col-sm-24";
	$wrap_parent_class 		= "row";
	$wrap_content_class 	= "wd-blog-left-right-sidebar";
}else{
	$content_col_class 		= "col-md-24";
	$wrap_content_class 	= "row wd-blog-full-width";
}

$thumbnail_class = (has_post_thumbnail()) ? 'wd-single-blog-has-thumbnail' : 'wd-single-blog-without-thumbnail';
//Count Post view
do_action('wd_set_post_views'); ?>

<?php 
/**
 * tvlgiao_wpdance_before_main_content hook.
 *
 * @hooked tvlgiao_wpdance_content_before_main_content
 */
do_action('tvlgiao_wpdance_before_main_content'); ?>

	<div class="wd-single-post-wrap <?php echo esc_attr($wrap_parent_class); ?> wd-main-content">
		<!-- Left Content -->
		<?php if( ($layout == '1-0-0') || ($layout == '1-0-1') ) : ?> 
			<?php tvlgiao_wpdance_display_left_sidebar($sidebar_left); ?>
		<?php endif; // Endif Left?>
		
		<?php while ( have_posts() ) : the_post();  ?>
			<!-- Content Single Post -->
			<div itemscope itemtype="http://schema.org/Article" class="wd-single-post-content <?php echo esc_attr($content_col_class); ?>">
				<div class="<?php echo esc_attr($wrap_content_class); ?>">
					<div class="wd-content-single">
						<?php tvlgiao_wpdance_display_post_thumbnail('full', $show_thumbnail); ?>
						<?php tvlgiao_wpdance_display_author_information($show_author_information); ?>

						<div class="wd-info-post <?php echo esc_attr($thumbnail_class); ?>">
							<?php tvlgiao_wpdance_display_single_post_title($show_title); ?>
							<?php tvlgiao_wpdance_display_post_edit_link(); ?>
							<div class="wd-meta-post">
								<?php tvlgiao_wpdance_display_post_date($show_date); ?>

								<div class="wd-meta-post-wrap">
									<?php tvlgiao_wpdance_display_post_author($show_author); ?>
									<?php tvlgiao_wpdance_display_post_category($show_category); ?>
									<?php tvlgiao_wpdance_display_post_number_comment($show_number_comments); ?>
								</div>
							</div>
							<div class="wd-content-detail-post">
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="entry-content">

										<?php if ( !post_password_required() /* || current_user_can('editor') || current_user_can('administrator') */) { ?>

											<?php the_content( sprintf(
													__( 'Continue reading<span class="wd-screen-reader-text"> "%s"</span>', 'solar' ),
													get_the_title()
												) );
												tvlgiao_wpdance_display_post_page_link();
											?>
										<?php }else{
											echo get_the_password_form();
										} ?>

									</div><!-- .entry-content -->

									<?php tvlgiao_wpdance_display_post_tag($show_tag); ?>

									<?php do_action('tvlgiao_wpdance_single_social_sharing'); ?>
								</article><!-- End Article -->
							</div>
							<?php tvlgiao_wpdance_display_post_previous_next_btn($show_previous_next_btn); ?>
							
						</div>
					</div>
					<div class="wd-comment-form">
						<?php
							//If comments are open or we have at least one comment, load up the comment template
							if ( ! post_password_required() && (comments_open() || '0' != get_comments_number()) ) :
								tvlgiao_wpdance_display_comment_form();
							endif;
						?>		
					</div>
					
				</div>
			</div>
		<?php endwhile; // End of the loop. ?>
		
		<!-- Right Content -->
		<?php if( ($layout == '0-0-1') || ($layout == '1-0-1') ) : ?> 
			<?php tvlgiao_wpdance_display_right_sidebar($sidebar_right); ?>
		<?php endif; // Endif Right?>	
	</div>
	<?php if ($show_recent_blog && !post_password_required()): ?>
		<?php while ( have_posts() ) : the_post();  ?>
			<div class="wd-related-posts">
				<?php get_template_part( 'template-parts/related'); ?>	
			</div>
		<?php endwhile; // End of the loop. ?>
	<?php endif ?>

<?php 
/**
 * tvlgiao_wpdance_after_main_content hook.
 *
 * @hooked tvlgiao_wpdance_content_after_main_content
 */
do_action('tvlgiao_wpdance_after_main_content'); ?>

<?php get_footer(); ?>