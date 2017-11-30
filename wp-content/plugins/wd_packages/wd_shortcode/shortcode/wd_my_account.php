<?php
/**
 * Shortcode: wpdancebootstrap_user_links
 */
if ( tvlgiao_wpdance_is_woocommerce() ) {
	if ( ! function_exists( 'tvlgiao_wpdance_shortcode_user_links' ) ) {
		function tvlgiao_wpdance_shortcode_user_links($atts){
			extract(shortcode_atts(array(
				'show_icon'		=> '0',
				'show_text'		=> '1',
				'class' 		=> '',
			), $atts));

			return tvlgiao_wpdance_tini_account( $show_icon, $show_text, $class );
		}
	}
	add_shortcode('tvlgiao_wpdance_user_links', 'tvlgiao_wpdance_shortcode_user_links');
}
?>