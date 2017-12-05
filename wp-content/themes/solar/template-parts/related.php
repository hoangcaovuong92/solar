<?php
/**
 * package: blog-related
 * var: grid_list_layout 
 * var: columns 		
 */
extract(tvlgiao_wpdance_get_data_package( 'blog-related' ));
global $post;
$related_args 		= array(
	'post_type' 		=> $post->post_type,
	'posts_per_page'	=> 6,
	'post_status' 		=> 'publish',
	'post__not_in' 		=> array( $post->ID ),
	'orderby' 			=> 'rand',
);

if (count(get_post_taxonomies( $post ))) {
	$taxonomy_name 	= get_post_taxonomies( $post )[0];
	$terms  		= get_the_terms($post->ID, $taxonomy_name);
	if (is_array($terms) || is_object($terms)){
		$term_list 					= wp_list_pluck( $terms, 'slug' );
		$related_args['tax_query'] 	= array(
			array(
				'taxonomy' 	=> $taxonomy_name,
				'field' 	=> 'slug',
				'terms' 	=> $term_list
			)
		);
	}
}
wp_reset_postdata();
$related 	= new WP_Query($related_args);
$grid_list_class = ($grid_list_layout == 'grid') ? "wd-blog-grid-style" : "wd-blog-list-style";
$count 		= 0;
$random_id 	= 'wd-related-wrapper-'.mt_rand();
?>
<?php if($related->have_posts()) : ?>
	<div class="wd-related-post related block-wrapper <?php echo esc_attr($grid_list_class); ?>">
		<div class="wd-title-wrapper">
			<h4 class="entry-title wd-related-post-title wd-title-section-style-1"><?php esc_html_e('Lastest News','solar'); ?></h4>
		</div>
		<div class="wd-related-wrapper" id="<?php echo esc_attr($random_id); ?>" data-slide_speed="<?php echo (wp_is_mobile()) ? 200 : 800; ?>" data-responsive_refresh_rate="<?php echo (wp_is_mobile()) ? 400 : 200; ?>" data-columns="<?php echo esc_attr($columns); ?>">
			<div class="wd-related-slider">
				<?php if( $related->post_count > 1 ) ?>
				<?php while($related->have_posts()) : $related->the_post(); $count++; global $post;?>
					<div class="wd-related-item wd-wrap-content-blog <?php if($count==1) echo " first"; if($count==$related->post_count) echo " last";?>">
						<?php echo tvlgiao_wpdance_get_content_blog( 'post-thumbnail', get_post_format() ); ?>
					</div>
				<?php endwhile; // End while ?>
				
			</div>
			<?php echo tvlgiao_wpdance_related_slider_control(); ?>
		</div>
	</div>
<?php endif; ?>