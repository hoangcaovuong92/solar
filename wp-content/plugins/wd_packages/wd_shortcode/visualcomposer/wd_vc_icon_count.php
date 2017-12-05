<?php
	// Count Icon
	vc_map(array(
		'name' 				=> esc_html__("WD - Count Icon", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_count_icon',
		'description' 		=> esc_html__("Display Count Icon...", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'icon-wpb-vc_icon',
		"params" => array(
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Icon", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_icon",
				"value" => array(
						'Yes' 		=> '1',
						'No' 		=> '0'
					),
				"description" 	=> "",
			),
			array(
				'type' 			=> 'iconpicker',
				'heading' 		=> esc_html__( 'Icon', 'wd_package' ),
				'param_name' 	=> 'icon_fontawesome',
				'value' 		=> 'fa fa-adjust',
				'settings' 		=> array(
					'emptyIcon' 		=> false,
					'iconsPerPage' 		=> 4000,
				),
				'description' 	=> esc_html__( 'Select icon from library.', 'wd_package' ),
			),
			array(
				"type" 			=> "colorpicker",
				"class" 		=> "",
				"heading" 		=> esc_html__("Color Icon", 'wd_package'),
				"param_name" 	=> "color_icon",
				"value" 		=> "#cccccc",
				"description" 	=> '',
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Start", 'wd_package'),
				'description'	=> esc_html__("", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'start',
				'value' 		=> '',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Finish", 'wd_package'),
				'description'	=> esc_html__("", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'finish',
				'value' 		=> '',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "colorpicker",
				"class" 		=> "",
				"heading" 		=> esc_html__("Color Number", 'wd_package'),
				"param_name" 	=> "color_number",
				"value" 		=> "#cccccc",
				"description" 	=> '',
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Text Infomation", 'wd_package'),
				'description'	=> esc_html__("", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'text_infomation',
				'value' 		=> ''
			),
			array(
				"type" 			=> "colorpicker",
				"class" 		=> "",
				"heading" 		=> esc_html__("Color Text", 'wd_package'),
				"param_name" 	=> "color_text",
				"value" 		=> "#cccccc",
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