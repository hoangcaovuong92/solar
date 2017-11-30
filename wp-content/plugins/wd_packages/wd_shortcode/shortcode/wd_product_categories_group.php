<?php 
if ( tvlgiao_wpdance_is_woocommerce() ) {
	if ( ! function_exists( 'tvlgiao_wpdance_categories_group' ) ) {
		function tvlgiao_wpdance_categories_group( $atts ) {
			$attr = shortcode_atts( array(
				'categories_group' => '',
				'is_slider'        => '0',
			), $atts );

			$categories_group = json_decode( urldecode( $attr['categories_group'] ), true );

			ob_start();

			?>
			<div class="wd-categories-group-wrapper">
				<ul class="wd-categories-group list-inline" data-slider="<?php echo $attr['is_slider'] ?>">
					<?php foreach ( $categories_group as $categories ):
						// Get image for category
						if ( wp_check_filetype( basename( get_attached_file( $categories['image_category'] ) ) )['ext'] === 'svg' ) {
							$image = file_get_contents( get_attached_file( $categories['image_category'] ) );
						} else {
							$image = wp_get_attachment_image( $categories['image_category'] );
						}
						// Get category name and category slug
						$term = get_term_by( 'id', $categories['id_category'], 'product_cat' );
						$link = get_term_link( $term->slug, $term->taxonomy );
						?>
						<li class="wd-category-group-item text-center">
							<a href="<?php echo $link ?>">
								<?php echo $image ?>
								<div class="wd-category-group-name"><?php echo $term->name ?></div><!-- .category-name -->
							</a>
						</li><!-- .category-item -->
					<?php endforeach; ?>
				</ul><!-- .categories-group -->
			</div><!--.categories-group-wrapper-->
			<?php
			echo ob_get_clean();
		}
	}
	add_shortcode( 'tvlgiao_wpdance_categories_group', 'tvlgiao_wpdance_categories_group' );
}
