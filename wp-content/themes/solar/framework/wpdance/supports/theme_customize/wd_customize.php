<?php
if(!function_exists ('tvlgiao_wpdance_customize_theme_option')){
	function tvlgiao_wpdance_customize_theme_option($wp_customize){
		$wd_default_data    = tvlgiao_wpdance_get_theme_option_default_data();
		$customize_list = array(
			'accessibility',
			'header',
			'footer',
			'page',
			'blog',
			'styling',
			'woocommerce',
			'font',
		);
		/* Get list sidebar */
		global $wp_registered_sidebars;
		$arr_sidebar = array();
		$i = 0;

		/* Include parts */
		if(file_exists(TVLGIAO_WPDANCE_THEME_CUSTOMIZE."/parts/live_preview_color.php")){
			require_once TVLGIAO_WPDANCE_THEME_CUSTOMIZE."/parts/live_preview_color.php";
		}
		foreach ( $wp_registered_sidebars as $sidebar ){
			if($i==0){
				$default = $sidebar['id'];
				$i++;
			}
			$arr_sidebar[$sidebar['id']] = $sidebar['name'];
		}

		foreach($customize_list as $part_name){
	        if(file_exists(TVLGIAO_WPDANCE_THEME_CUSTOMIZE."/parts/wd_customize_{$part_name}.php")){
	            require_once TVLGIAO_WPDANCE_THEME_CUSTOMIZE."/parts/wd_customize_{$part_name}.php";
	        }
	    }

	}
}
add_action('customize_register','tvlgiao_wpdance_customize_theme_option' );
?>
