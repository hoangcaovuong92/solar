<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Wordpress
 * @since wpdance
**/

$post_ID		= tvlgiao_wpdance_get_post_by_global();
/*PAGE CONFIG*/
$_page_config 	= tvlgiao_wpdance_get_custom_layout($post_ID); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content <?php echo esc_attr( $_page_config['custom_class'] ); ?>" id="<?php echo esc_attr( $_page_config['custom_id'] ); ?>">
		<?php the_content();
		//echo apply_filters('the_content', get_post_field('post_content', $post_ID)); 
		tvlgiao_wpdance_display_post_page_link(); ?>
	</div><!-- .entry-content -->
</div><!-- #post-## -->