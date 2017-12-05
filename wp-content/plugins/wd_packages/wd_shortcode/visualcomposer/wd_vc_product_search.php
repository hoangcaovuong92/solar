<?php
if( tvlgiao_wpdance_is_woocommerce() ){
	vc_map(array(
			"name"				=> esc_html__("WD - Product Search",'wd_package'),
			"base"				=> 'tvlgiao_wpdance_product_by_category',
			'description' 		=> esc_html__("Display product search form...", 'wd_package'),
			"category"			=> esc_html__("WPDance Shortcode",'wd_package'),
			'icon'        		=> 'icon-wpb-woocommerce',
			"params"=>array(	
				array(
					'type' 			=> 'textfield',
					'class' 		=> '',
					'heading' 		=> esc_html__("Extra class name", 'wd_package'),
					'description'	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wd_package'),
					'admin_label' 	=> true,
					'param_name' 	=> 'class',
					'value' 		=> ''
				)
			)
		)
	);
}
?>