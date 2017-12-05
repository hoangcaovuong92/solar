<?php
	$product_category = tvlgiao_wpdance_vc_get_list_category();
	$position_content = array(
		'Center' 			=> 'center',
		'Outside - Left' 	=> 'outside-left',
		'Outside - Right' 	=> 'outside-right',
		'Inside - Left' 	=> 'inside-left',
		'Inside - Right' 	=> 'inside-right',
	);

	$button_style = array(
		'Style 1' 	=> 'style-1',
		'Style 2' 	=> 'style-2',
		'Style 3' 	=> 'style-3',
		'Style 4' 	=> 'style-4',
	);

	vc_map(array(
		'name' 				=> esc_html__("WD - Banner Image Plus", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_banner_image_2',
		'description' 		=> esc_html__("Banner/Slider/Video youtube...", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'icon-wpb-images-stack',
		"params" => array(
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Type', 'wd_package' ),
				'param_name' 	=> 'type',
				'admin_label' 	=> true,
				'value' 		=> array(
					'Image'				=> 'image',
					'Gallery'			=> 'gallery',
					'Video Youtube'		=> 'video',
					'Slider Image'		=> 'slider',
				),
			),
			/*-----------------------------------------------------------------------------------
				IMAGE SETTING
			-------------------------------------------------------------------------------------*/
			array(
				"type" 			=> "attach_image",
				"class" 		=> "",
				"heading" 		=> esc_html__("Banner Image", 'wd_package'),
				"param_name" 	=> "banner_image",
				"value" 		=> "",
				"description" 	=> esc_html__('', 'wd_package'),
				'dependency'  	=> Array('element' => "type", 'value' => array('image'))
			),
			/*-----------------------------------------------------------------------------------
				IMAGE SETTING
			-------------------------------------------------------------------------------------*/
			array(
				"type" 			=> "attach_images",
				"class" 		=> "",
				"heading" 		=> esc_html__("Gallery Image", 'wd_package'),
				"param_name" 	=> "gallery_image",
				"value" 		=> "",
				"description" 	=> esc_html__('', 'wd_package'),
				'dependency'  	=> Array('element' => "type", 'value' => array('gallery'))
			),
			array(
				'type' 			=> 'dropdown',
				'class' 		=> '',
				'heading' 		=> esc_html__("Gallery Style", 'wd_package'),
				'description'	=> esc_html__("", 'wd_package'),
				'param_name' 	=> 'gallery_style',
				'value' 		=> array(
					'Style 1 (2 images)'		=> 'style-1',
					'Style 2 (2 images)'		=> 'style-2',
					'Style 3 (2 images)'		=> 'style-3',
					'Style 4 (3 images)'		=> 'style-4',
				),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "type", 'value' => array('gallery'))
			),
			/*-----------------------------------------------------------------------------------
				SLIDER SETTING
			-------------------------------------------------------------------------------------*/
			array(
				"type" 			=> "attach_images",
				"class" 		=> "",
				"heading" 		=> esc_html__("Slider Images", 'wd_package'),
				"param_name" 	=> "slider_image",
				"value" 		=> "",
				"description" 	=> esc_html__('Select multi banner for slider', 'wd_package'),
				'dependency'  	=> Array('element' => "type", 'value' => array('slider'))
			),
			array(
				"type" 			=> "textfield",
          		"holder" 		=> "div",
          		"class" 		=> "",
				"heading" 		=> esc_html__("Slider Columns", 'wd_package'),
				"param_name" 	=> "slider_columns",
				"value" 		=> "1",
				"description" 	=> esc_html__('', 'wd_package'),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "type", 'value' => array('slider'))
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Image Size', 'wd_package' ),
				'param_name' 	=> 'image_size',
				'admin_label' 	=> true,
				'value' 		=> tvlgiao_wpdance_vc_get_list_image_size(),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "type", 'value' => array('image', 'gallery', 'slider'))
			),
			/*-----------------------------------------------------------------------------------
				VIDEO SETTING
			-------------------------------------------------------------------------------------*/
			array(
				"type" 			=> "textfield",
          		"holder" 		=> "div",
          		"class" 		=> "",
				"heading" 		=> esc_html__("Video ID", 'wd_package'),
				"param_name" 	=> "video_id",
				"description" 	=> esc_html__('Your Youtube Video ID...', 'wd_package'),
				'dependency'  	=> Array('element' => "type", 'value' => array('video'))
			),
			array(
				"type" 			=> "textfield",
          		"holder" 		=> "div",
          		"class" 		=> "",
				"heading" 		=> esc_html__("Video Width (Px)", 'wd_package'),
				"param_name" 	=> "video_width",
				"description" 	=> esc_html__('', 'wd_package'),
				'value'			=> 570,
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'  	=> Array('element' => "type", 'value' => array('video'))
			),
			array(
				"type" 			=> "textfield",
          		"holder" 		=> "div",
          		"class" 		=> "",
				"heading" 		=> esc_html__("Video height (Px)", 'wd_package'),
				"param_name" 	=> "video_height",
				"description" 	=> esc_html__('', 'wd_package'),
				'value'			=> 400,
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'  	=> Array('element' => "type", 'value' => array('video'))
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Video Autoplay', 'wd_package' ),
				'param_name' 	=> 'video_autoplay',
				'admin_label' 	=> true,
				'value' 		=> array(
					'No'		=> '0',
					'Yes'		=> '1',
				),
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'  	=> Array('element' => "type", 'value' => array('video'))
			),

			/*-----------------------------------------------------------------------------------
				CONTENT SETTING
			-------------------------------------------------------------------------------------*/
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Show Content', 'wd_package' ),
				'param_name' 	=> 'show_content',
				'admin_label' 	=> true,
				'value' 		=> array(
					'Yes'		=> '1',
					'No'		=> '0',
				),
				'group'			=> esc_html__( 'Content Setting', 'wd_package' ),
				'description' 	=> esc_html__('Display title, description, line, button...', 'wd_package'),
			),
			array(
				"type" 			=> "textfield",
          		"holder" 		=> "div",
          		"class" 		=> "",
				"heading" 		=> esc_html__("Heading Line 1", 'wd_package'),
				"param_name" 	=> "heading_line_1",
				"description" 	=> esc_html__('Leave blank to hide...', 'wd_package'),
				'group'			=> esc_html__( 'Content Setting', 'wd_package' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "show_content", 'value' => array('1'))
			),
			array(
				"type" 			=> "textfield",
          		"holder"		=> "div",
          		"class" 		=> "",
				"heading" 		=> esc_html__("Heading Line 2", 'wd_package'),
				"param_name" 	=> "heading_line_2",
				"description" 	=> esc_html__('Leave blank to hide...', 'wd_package'),
				'group'			=> esc_html__( 'Content Setting', 'wd_package' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "show_content", 'value' => array('1'))
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Show Line', 'wd_package' ),
				'param_name' 	=> 'show_line',
				'admin_label' 	=> true,
				'value' 		=> array(
					'Yes'		=> '1',
					'No'		=> '0',
				),
				'description' 	=> esc_html__('Line separates heading and desc', 'wd_package'),
				'group'			=> esc_html__( 'Content Setting', 'wd_package' ),
				'dependency'  	=> Array('element' => "show_content", 'value' => array('1'))
			),
			array(
				"type" 			=> "textarea",
				"class" 		=> "",
				"heading" 		=> esc_html__("Description", 'wd_package'),
				"param_name" 	=> "description",
				"description" 	=> esc_html__('Leave blank to hide...', 'wd_package'),
				'group'			=> esc_html__( 'Content Setting', 'wd_package' ),
				'dependency'  	=> Array('element' => "show_content", 'value' => array('1'))
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Position Content', 'wd_package' ),
				'param_name' 	=> 'position_content',
				'admin_label' 	=> true,
				'value' 		=> $position_content,
				'description' 	=> '',
				'group'			=> esc_html__( 'Content Setting', 'wd_package' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "show_content", 'value' => array('1'))
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Border Content', 'wd_package' ),
				'param_name' 	=> 'border_content',
				'admin_label' 	=> true,
				'value' 		=> array(
					'Yes'		=> '1',
					'No'		=> '0',
				),
				'description' 	=> '',
				'group'			=> esc_html__( 'Content Setting', 'wd_package' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "show_content", 'value' => array('1'))
			),
			/*-----------------------------------------------------------------------------------
				BUTTON SETTING
			-------------------------------------------------------------------------------------*/
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Show Button', 'wd_package' ),
				'param_name' 	=> 'show_button',
				'admin_label' 	=> true,
				'value' 		=> array(
					'Yes'		=> '1',
					'No'		=> '0',
				),
				'description' 	=> '',
				'group'			=> esc_html__( 'Button Setting', 'wd_package' ),
				'dependency'  	=> Array('element' => "show_content", 'value' => array('1'))
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Button Style', 'wd_package' ),
				'param_name' 	=> 'button_style',
				'admin_label' 	=> true,
				'value' 		=> $button_style,
				'description' 	=> '',
				'group'			=> esc_html__( 'Button Setting', 'wd_package' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "show_button", 'value' => array('1'))
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Link type', 'wd_package' ),
				'param_name' 	=> 'link_type',
				'admin_label' 	=> true,
				'value' 		=> array(
					'Category Link'	=> 'category_link',
					'Another Url'	=> 'url',
				),
				'description' 	=> '',
				'group'			=> esc_html__( 'Button Setting', 'wd_package' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "show_button", 'value' => array('1'))
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Select Category', 'wd_package' ),
				'param_name' 	=> 'id_category',
				'admin_label' 	=> true,
				'value' 		=> $product_category,
				'description' 	=> '',
				'group'			=> esc_html__( 'Button Setting', 'wd_package' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "link_type", 'value' => array('category_link'))
			),
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> esc_html__("URL", 'wd_package'),
				"param_name" 	=> "url",
				"description" 	=> esc_html__('', 'wd_package'),
				'value' 		=> esc_html__('#', 'wd_package'),
				'group'			=> esc_html__( 'Button Setting', 'wd_package' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "link_type", 'value' => array('url'))
			),
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> esc_html__("Button text", 'wd_package'),
				"param_name" 	=> "button_text",
				"description" 	=> esc_html__('', 'wd_package'),
				'value' 		=> esc_html__('View Category', 'wd_package'),
				'group'			=> esc_html__( 'Button Setting', 'wd_package' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "show_button", 'value' => array('1'))
			),
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> esc_html__("Button class", 'wd_package'),
				"param_name" 	=> "button_class",
				"description" 	=> '',
				'group'			=> esc_html__( 'Button Setting', 'wd_package' ),
				'dependency'  	=> Array('element' => "show_button", 'value' => array('1'))
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