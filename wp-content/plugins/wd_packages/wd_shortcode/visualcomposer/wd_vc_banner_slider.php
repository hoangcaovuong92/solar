<?php
	// Brand Slider
	vc_map(array(
		'name' 				=> esc_html__("WD - Banner Slider", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_banner_slider',
		'description' 		=> esc_html__("Custom Image, Link, Slick slider style...", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'icon-wpb-images-carousel',
		"params" 			=> array(
			array(
                'type' 			=> 'param_group',
                'value' 		=> '',
                'param_name' 	=> 'slider',
                // Note params is mapped inside param-group:
                'params' 		=> array(
                	array(
						"type" 			=> "attach_image",
						"class" 		=> "",
						"heading" 		=> esc_html__("Image", 'wd_package'),
						"param_name" 	=> "image",
						"value" 		=> "",
						"description" 	=> '',
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("URL", 'wd_package'),
						'description'	=> esc_html__("Add link to image slider.", 'wd_package'),
						'admin_label' 	=> true,
						'param_name' 	=> 'link',
						'value' 		=> '#'
					)
                )
            ),
            array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Image Size', 'wd_package' ),
				'param_name' 	=> 'image_size',
				'admin_label' 	=> true,
				'value' 		=> tvlgiao_wpdance_vc_get_list_image_size(),
				'std'			=> 'full',
				'description' 	=> '',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "dropdown",
				"holder" 		=> "div",
				"class" 		=> "",
				"heading" 		=> esc_html__("Link Target", 'wd_package'),
				"param_name" 	=> "target",
				"value" 		=> tvlgiao_wpdance_vc_get_list_link_target(),
				"std" 			=> '_blank',
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-6',
			),
            array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Columns', 'wd_package' ),
				'param_name' 	=> 'columns',
				'admin_label' 	=> true,
				'value' 		=> tvlgiao_wpdance_vc_get_list_tvgiao_columns(),
				'std'			=> '1',
				'description' 	=> '',
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Center Mode", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "center_mode",
				"value" 		=> array(
						'Yes' 		=> '1',
						'No' 		=> '0'
					),
				'std'			=> '0',
				"description" 	=> esc_html__("Create highlighter for item at between", 'wd_package'),
				'edit_field_class' => 'vc_col-sm-3',
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
				'edit_field_class' => 'vc_col-sm-3',
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Dot", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_dot",
				"value" 		=> array(
						'Yes' 		=> '1',
						'No' 		=> '0'
					),
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-3',
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