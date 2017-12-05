<?php
	# Add Quote
	vc_map(array(
		'name' 				=> esc_html__("WD - Quote", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_quote',
		'description' 		=> esc_html__("Display site info (title, tagline, logo...) on the header", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'icon-wpb-atm',
		"params" 			=> array(
			array(
				"heading" 		=> esc_html__("Style", 'wd_package'),
				"type" 			=> "dropdown",
				"class" 		=> "",
				"admin_label" 	=> true,
				"param_name" 	=> "style",
				"value" => array(
					"Style 1" 	=> "style-1",
					"Style 2" 	=> "style-2",
					"Style 3" 	=> "style-3",
					"Style 4" 	=> "style-4",
					"Style 5" 	=> "style-5"
				),
				"description" 	=> '',
			),
			array(
				"heading" 		=> esc_html__("Content", 'wd_package'),
				"type" 			=> "textarea_html",
				"class" 		=> "",
				"admin_label" 	=> true,
				"param_name" 	=> "content",
				"value" 		=> "",
				"description" 	=> '',
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