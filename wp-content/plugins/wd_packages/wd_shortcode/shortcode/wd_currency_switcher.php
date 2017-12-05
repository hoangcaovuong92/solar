<?php
/**
 * Shortcode: tvlgiao_wpdance_currency
 */

if (!function_exists('tvlgiao_wpdance_currency_site')) {
	function tvlgiao_wpdance_currency_site($atts, $content = null) {
		extract(shortcode_atts(array(
			'title'			=> 'Currency',
			'show_icon'		=> '0',
			'class' 		=> ''
		), $atts));
		ob_start();
		$class_show_icon 	= '';
		$icon_html 			= '';
		if ( $show_icon == '1' ) {
			$class_show_icon 	= 'wd-show-icon-currency';
			$icon_html 			= '<i class="fa fa-usd" aria-hidden="true"></i> ';
		}
		?>
		<div class="widget woocs_selector <?php echo esc_attr($class) ?> <?php echo esc_attr($class_show_icon) ?>">
			<div class="widget widget-woocommerce-currency-switcher">
				<a href="#" title="" data-original-title="<?php esc_html_e('Change Currency','wd_package');?>">
		    		<span class="wd-title-header"><?php echo $icon_html;?><?php echo esc_attr($title); ?></span>
	    		</a>
		    	<?php if(do_shortcode('[woocs]')) {echo do_shortcode('[woocs]');} ?>
	   	 	</div>
		</div>
		<?php
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
}
add_shortcode('tvlgiao_wpdance_currency', 'tvlgiao_wpdance_currency_site');
?>