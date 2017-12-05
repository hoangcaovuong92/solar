<?php
	# Add shortcode search
	vc_map(array(
		'name' 				=> esc_html__("WD - Blog Search", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_search_blog',
		'description' 		=> esc_html__("Display blog search form...", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'icon-wpb-toggle-small-expand',
		'params' => array(
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Style", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "style",
				"value" => array(
						'Popup' => 'style-1',
						'Hover' => 'style-2'
					),
				"description" 	=> "",
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Extra class name", 'wd_package'),
				'description'	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'class',
				'value' 		=> '',
			)
		)
	));
?>