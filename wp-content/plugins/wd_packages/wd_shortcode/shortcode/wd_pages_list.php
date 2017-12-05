<?php
if ( ! function_exists( 'tvlgiao_wpdance_pages_list_function' ) ) {
	function tvlgiao_wpdance_pages_list_function( $atts ) {
		extract(shortcode_atts( array(
			'ids'					=> '-1',
			'style'					=> 'footer-copyright-links-list',
			'copyright'				=> '1',
			'copyright_text'		=> '© 2017 <a href="#">LAPARIS</a> All Rights Reserved.',
			'class'      			=> '',
		), $atts ));

		if ($ids == '-1' || $ids == '') {
			return;
		}
		$list_pages_id 	= array_filter(explode(',', $ids));
		
		ob_start();?>
		<?php if (count($list_pages_id) > 0): ?>
			<div class="wd-shortcode-pages-list <?php echo esc_attr($class); ?>">
	        	<ul class="<?php echo esc_attr($style); ?>">
					<?php foreach ( $list_pages_id as $page_id ) { ?>
						<?php if (is_page($page_id)): ?>
							<li class="<?php echo 'wd-page-slug-'.get_post_field( 'post_name', $page_id ); ?>"><a href="<?php echo get_page_link($page_id); ?>"><?php echo get_the_title( $page_id ); ?></a></li>
						<?php endif ?>
				    <?php } ?>
				    <?php if ($copyright): ?>
				    	<li class="wd-copyright"><?php echo $copyright_text; ?></li>
				    <?php endif ?>
				</ul>
	        </div>
		<?php endif ?>
		<?php
		wp_reset_postdata();
		return ob_get_clean();
	}
}
add_shortcode( 'tvlgiao_wpdance_pages_list', 'tvlgiao_wpdance_pages_list_function' );