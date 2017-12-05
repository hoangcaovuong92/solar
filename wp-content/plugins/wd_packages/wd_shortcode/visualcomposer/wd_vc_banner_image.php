<?php
	// Banner Image
	vc_map(array(
		'name' 				=> esc_html__("WD - Banner Image", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_banner_image',
		'description' 		=> esc_html__("Simple banner image...", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'icon-wpb-single-image',
		"params" => array(
			array(
				"type" 			=> "attach_image",
				"class" 		=> "",
				"heading" 		=> esc_html__("Background Image", 'wd_package'),
				"param_name" 	=> "bg_image",
				"value" 		=> "",
				"description" 	=> 'Background image banner',
			),
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> esc_html__("Button text", 'wd_package'),
				"param_name" 	=> "button_text",
				"description" 	=> '',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> esc_html__("Link Button", 'wd_package'),
				"param_name" 	=> "link_url",
				"description" 	=> '',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> esc_html__("Button class", 'wd_package'),
				"param_name" 	=> "button_class",
				"description" 	=> '',
			),
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> esc_html__("Top", 'wd_package'),
				"param_name" 	=> "top",
				"description" 	=> esc_html__("ex: 5%", 'wd_package'),
				'edit_field_class' => 'vc_col-sm-3',
			),
			array(
				"type" 			=> "textfield",
				"class"			=> "",
				"heading" 		=> esc_html__("Right", 'wd_package'),
				"param_name" 	=> "right",
				"description" 	=> esc_html__("ex: 5%", 'wd_package'),
				'edit_field_class' => 'vc_col-sm-3',
			),
			array(
				"type" 			=> "textfield",
				"class"			=> "",
				"heading" 		=> esc_html__("Bottom", 'wd_package'),
				"param_name" 	=> "bottom",
				"description" 	=> esc_html__("ex: 5%", 'wd_package'),
				'edit_field_class' => 'vc_col-sm-3',
			),
			array(
				"type" 			=> "textfield",
				"class"			=> "",
				"heading" 		=> esc_html__("Left", 'wd_package'),
				"param_name" 	=> "left",
				"description" 	=> esc_html__("ex: 5%", 'wd_package'),
				'edit_field_class' => 'vc_col-sm-3',
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