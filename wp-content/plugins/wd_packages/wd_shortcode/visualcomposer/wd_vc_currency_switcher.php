<?php
	// Currency Switcher
	vc_map(array(
		'name' 				=> esc_html__("WD - Woo Currency Switcher", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_currency',
		'description' 		=> esc_html__("Currency Switcher", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'icon-wpb-woocommerce',
		'params' => array(
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Title", 'wd_package'),
				'description'	=> esc_html__("", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'title',
				'value' 		=> 'Currency'
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Show Icon', 'wd_package' ),
				'param_name' 	=> 'show_icon',
				'admin_label' 	=> true,
				'value' 		=> array(
					'Yes'		=> '1',
					'No'		=> '0'
				),
				'std'			=> '0',
				'description' 	=> esc_html__('Display icon in front of text', 'wd_package')
			),
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
	));
?>