<?php
/**
 * Shortcode: tvlgiao_wpdance_wishlist
 */

if (!function_exists('tvlgiao_wpdance_wishlist_function')) {
	function tvlgiao_wpdance_wishlist_function($atts, $content = null) {
		extract(shortcode_atts(array(
			'title'			=> 'Wishlist',
			'show_icon'		=> '0',
			'class' 		=> ''
		), $atts));
		ob_start();
		if (!tvlgiao_wpdance_is_wishlist_active()) return;
		$class_show_icon 	= '';
		$icon_html 			= '';
		if ( $show_icon == '1' ) {
			$class_show_icon 	= 'wd-show-icon-wishlist';
			$icon_html 			= '<span class="lnr lnr-heart"></span> ';
		}
		$mywishlist_url 	= get_option('yith_wcwl_wishlist_page_id') ? get_permalink( get_option('yith_wcwl_wishlist_page_id') ) : '#';
		?>
		<div class="wd-shortcode-wishlist <?php echo esc_attr($class) ?> <?php echo esc_attr($class_show_icon) ?>">
			<a href="<?php echo esc_url($mywishlist_url); ?>" title="" data-original-title="<?php esc_html_e('View Wishlist Page','wd_package');?>">
				<span class="wd-title-header"><?php echo $icon_html;?><?php echo esc_attr($title); ?></span>
			</a>
		</div>
		<?php
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
}
add_shortcode('tvlgiao_wpdance_wishlist', 'tvlgiao_wpdance_wishlist_function');
?>