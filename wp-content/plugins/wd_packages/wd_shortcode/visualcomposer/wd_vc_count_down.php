<?php
	// Banner Image
	vc_map(array(
		'name' 				=> esc_html__("WD - Countdown", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_count_down',
		'description' 		=> esc_html__("WD Count Down", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'vc_icon-vc-gitem-post-date',
		"params" => array(
			array(
				"type" 			=> "attach_image",
				"class" 		=> "",
				"heading" 		=> esc_html__("Icon Count Down", 'wd_package'),
				"param_name" 	=> "icon_image",
				"value" 		=> "",
				"description" 	=> esc_html__("", 'wd_package'),
			),
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> esc_html__("Title", 'wd_package'),
				'description'	=> esc_html__("Title", 'wd_package'),
				"param_name" 	=> "title",
				"description" 	=> '',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "wd_date_custom",
				"class" 		=> "",
				"heading" 		=> esc_html__("Select End Date", 'wd_package'),
				'description'	=> esc_html__("", 'wd_package'),
				"param_name" 	=> "date_count_down",
				"description" 	=> '',
				'edit_field_class' => 'vc_col-sm-6',
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