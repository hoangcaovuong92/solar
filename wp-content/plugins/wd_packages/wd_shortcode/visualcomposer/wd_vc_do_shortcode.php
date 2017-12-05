<?php
	# Add shortcode Site Header
	vc_map(array(
		'name' 				=> esc_html__("WD - Do Shortcode", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_do_shortcode',
		'description' 		=> esc_html__("Executes shortcode...", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'icon-wpb-atm',
		'params' => array(
			array(
				"type" 			=> "textarea",
				"class" 		=> "",
				"heading" 		=> esc_html__("Shortcode", 'wd_package'),
				"description" 	=> esc_html__("Paste your shortcode here", 'wd_package'),
				"param_name" 	=> "shortcode",
				"value" 		=> "",
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