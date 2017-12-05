<?php
	// Banner Image
	vc_map(array(
		'name' 				=> esc_html__("WD - Instagram Masonry", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_instagram_masonry',
		'description' 		=> esc_html__("WD Instagram", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'vc_icon-vc-gitem-image',
		"params" 			=> array(
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
			
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Mansory Image Size", 'wd_package'),
				'description' 	=> esc_html__("", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'mansory_image_size',
				'value' 		=> '1:1, 1:1, 2:2, 1:1, 1:1, 1:1, 1:1, 1:1, 1:1',
				"group"			=> esc_html__('Instagram Setting', 'wd_package'),
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