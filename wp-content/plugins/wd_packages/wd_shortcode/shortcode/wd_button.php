<?php
/**
 * Shortcode: tvlgiao_wpdance_buttons
 */

if (!function_exists('tvlgiao_wpdance_buttons_function')) {
	function tvlgiao_wpdance_buttons_function($atts) {
		extract(shortcode_atts(array(
			'button_style'		=> 'style-1',
			'link_type'			=> 'category_link',
			'url'				=> '#',
			'id_category' 		=> '-1',
			'button_text' 		=> 'View Category',
			'button_class' 		=> '',
			'class' 			=> ''
		), $atts));
		if ($link_type == 'category_link' && tvlgiao_wpdance_is_woocommerce()) {
			if ($id_category != '') {
				$link_url = ($id_category == -1) ? get_permalink( wc_get_page_id( 'shop' ) ) : get_term_link( get_term_by( 'id', $id_category, 'product_cat' ), 'product_cat' );
			}else{
				$link_url = '#';
			}
		}else{
			$link_url = $url;
		}
		$button_style_class 	= 'wd-banner-image-button-'.$button_style;
		$title_image			= get_bloginfo('name');
		ob_start(); ?>
		<div class="wd-shortcode-buttons <?php echo esc_attr($class); ?>">
			<a class="<?php echo esc_attr($button_style_class); ?> <?php echo esc_attr($button_class); ?>" href="<?php echo esc_url($link_url); ?>" title="<?php echo esc_attr($title_image); ?>"><?php echo esc_attr($button_text); ?></a>
		</div>
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		wp_reset_postdata();
		return $output;
	}
}
add_shortcode('tvlgiao_wpdance_buttons', 'tvlgiao_wpdance_buttons_function');
?>