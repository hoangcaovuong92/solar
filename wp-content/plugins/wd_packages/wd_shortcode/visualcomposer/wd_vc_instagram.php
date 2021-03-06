<?php
	// Banner Image
	vc_map(array(
		'name' 				=> esc_html__("WD - Instagram", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_instagram',
		'description' 		=> esc_html__("WD Instagram", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'vc_icon-vc-gitem-image',
		"params" 			=> array(
			/*-----------------------------------------------------------------------------------
				Title & DESC
			-------------------------------------------------------------------------------------*/
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> esc_html__("Title Instagram", 'wd_package'),
				"param_name" 	=> "insta_title",
				"description" 	=> '',
			),
			array(
				"type" 			=> "textarea",
				"class" 		=> "",
				"heading" 		=> esc_html__("Description", 'wd_package'),
				"param_name" 	=> "insta_desc",
				"description" 	=> '',
			),
			array(
				"type" 			=> "dropdown",
				"class"			=> "",
				"heading" 		=> esc_html__("Show Follow Me", 'wd_package'),
				"param_name" 	=> "insta_follow",
				"value" 		=> array(
					'Yes' 	=> '1',
					'No' 	=> '0',
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> esc_html__("Follow Text", 'wd_package'),
				"param_name" 	=> "insta_follow_text",
				'value'			=> 'Follow Me',
				"description" 	=> '',
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> array(
					'element' => 'insta_follow',
					'value'   => array( '1' ),
				)
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Title & Desc Position", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "insta_style",
				"value" 		=> array(
						'Center + Inner Content' => 'style-insta-1',
						'Before Content' 		 => 'style-insta-2'
					),
				"description" 	=> "",
			),
			/*-----------------------------------------------------------------------------------
				SETTING
			-------------------------------------------------------------------------------------*/
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> esc_html__("Username", 'wd_package'),
				"param_name" 	=> "insta_user",
				"description" 	=> '',
				"group"			=> esc_html__('Instagram Setting', 'wd_package'),
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Columns', 'wd_package' ),
				'param_name' 	=> 'insta_columns',
				'admin_label' 	=> true,
				'value' 		=> tvlgiao_wpdance_vc_get_list_tvgiao_columns(),
				"std"			=> 4,
				'description' 	=> '',
				"group"			=> esc_html__('Instagram Setting', 'wd_package'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> esc_html__("Number of photos", 'wd_package'),
				"param_name" 	=> "insta_number",
				"value"			=> 4,
				"description" 	=> esc_html__('Max 12 photos', 'wd_package'),
				"group"			=> esc_html__('Instagram Setting', 'wd_package'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> esc_html__("Padding", 'wd_package'),
				"param_name" 	=> "insta_padding",
				"value"			=> 0,
				"description" 	=> esc_html__('Padding between images. Only fill in whole numbers or real numbers. Example: 2.5 (Unit: pixels)', 'wd_package'),
				"group"			=> esc_html__('Instagram Setting', 'wd_package'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Photo Size", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "insta_size",
				"value" 		=> array(
						'Thumbnail' => 'thumbnail',
						'Small' 	=> 'small',
						'Large'		=> 'large',
						'Original'	=> 'original'
					),
				"description" 	=> "",
				"group"			=> esc_html__('Instagram Setting', 'wd_package'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "dropdown",
				"class"			=> "",
				"heading" 		=> esc_html__("Action When Click Item", 'wd_package'),
				"param_name" 	=> "insta_action_click_item",
				"value" 		=> array(
						'Open Big Image With Lightbox' 	=> 'lightbox',
						'Open Instagram Link' 			=> 'link',
					),
				'std'			=> 'lightbox',
				"group"			=> esc_html__('Instagram Setting', 'wd_package'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "dropdown",
				"class"			=> "",
				"heading" 		=> esc_html__("Open links in", 'wd_package'),
				"param_name" 	=> "insta_open_win",
				"value" 		=> tvlgiao_wpdance_vc_get_list_link_target(),
				"group"			=> esc_html__('Instagram Setting', 'wd_package'),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "insta_action_click_item", 'value' => array('link')),
			),
			/*-----------------------------------------------------------------------------------
				SLIDER SETTING
			-------------------------------------------------------------------------------------*/
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Is Slider", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "is_slider",
				"value" 		=> array(
						'Yes' 		=> '1',
						'No' 		=> '0'
					),
				'std'			=> '0',
				"description" 	=> esc_html__('Set "Number of photos" larger than ("Columns" * "Number Rows") to be able to activate Slider mode.', 'wd_package'),
				"group"			=> esc_html__('Slider Setting', 'wd_package'),
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Nav", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_nav",
				"value" 		=> array(
						'Yes' 		=> '1',
						'No' 		=> '0'
					),
				"description" 	=> "",
				"group"			=> esc_html__('Slider Setting', 'wd_package'),
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'  	=> Array('element' => "is_slider", 'value' => array('1')),
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Auto Play", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "auto_play",
				"value" 		=> array(
						'Yes' 		=> '1',
						'No' 		=> '0'
					),
				"description" 	=> "",
				"group"			=> esc_html__('Slider Setting', 'wd_package'),
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'  	=> Array('element' => "is_slider", 'value' => array('1')),
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Number Rows", 'wd_package'),
				'description' 	=> esc_html__("", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'per_slide',
				'value' 		=> '1',
				"group"			=> esc_html__('Slider Setting', 'wd_package'),
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'  	=> Array('element' => "is_slider", 'value' => array('1')),
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Extra class name", 'wd_package'),
				'description'	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'class',
				'value' 		=> '',
				"group"			=> esc_html__('Slider Setting', 'wd_package'),
			)
		)
	));
?>