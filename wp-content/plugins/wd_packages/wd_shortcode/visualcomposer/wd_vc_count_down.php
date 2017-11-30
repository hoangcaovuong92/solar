<?php
	// Banner Image
	vc_map(array(
		'name' 				=> esc_html__("WD - Countdown", 'wpdancelaparis'),
		'base' 				=> 'tvlgiao_wpdance_count_down',
		'description' 		=> esc_html__("WD Count Down", 'wpdancelaparis'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wpdancelaparis'),
		'icon'        		=> 'vc_icon-vc-gitem-post-date',
		"params" => array(
			array(
				"type" 			=> "attach_image",
				"class" 		=> "",
				"heading" 		=> esc_html__("Icon Count Down", 'wpdancelaparis'),
				"param_name" 	=> "icon_image",
				"value" 		=> "",
				"description" 	=> esc_html__("", 'wpdancelaparis'),
			),
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> esc_html__("Title", 'wpdancelaparis'),
				'description'	=> esc_html__("Title", 'wpdancelaparis'),
				"param_name" 	=> "title",
				"description" 	=> '',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "wd_date_custom",
				"class" 		=> "",
				"heading" 		=> esc_html__("Select End Date", 'wpdancelaparis'),
				'description'	=> esc_html__("", 'wpdancelaparis'),
				"param_name" 	=> "date_count_down",
				"description" 	=> '',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Extra class name", 'wpdancelaparis'),
				'description'	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdancelaparis'),
				'admin_label' 	=> true,
				'param_name' 	=> 'class',
				'value' 		=> '',
			)
		)
	));
?>