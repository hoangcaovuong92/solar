<?php
	$categories       = tvlgiao_wpdance_vc_get_list_category('wpdance_product_brand', false, 'sorted_list');
	vc_map(array(
		'name' 				=> esc_html__("WD - Brand Slider", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_brand_slider',
		'description' 		=> esc_html__("Brand/Image Slider", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'icon-wpb-images-carousel',
		"params" 			=> array(
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Source", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "source",
				"value" 		=> array(
						esc_html__('Product Brands' , 'wd_package')		=> '1',
						esc_html__('Custom Brands Image', 'wd_package') => '0',
					),
				'std'			=> '1',
				"description" 	=> "",
			),
            array(
				'type' 			=> 'sorted_list',
				'heading' 		=> __( 'Brands', 'wd_package' ),
				'param_name' 	=> 'brands',
				'description' 	=> __( 'Select and sort product brands. Leave blank if you want to display all product brand', 'wd_package' ),
				'value' 		=> '-1',
				'options' 		=> $categories,
				'dependency'  	=> Array('element' => "source", 'value' => array('1')),
			),

			array(
				"type" 			=> "attach_images",
				"class" 		=> "",
				"heading" 		=> esc_html__("Brand Image", 'wd_package'),
				"param_name" 	=> "image_url",
				"value" 		=> "",
				"description" 	=> '',
				'dependency'  	=> Array('element' => "source", 'value' => array('0')),
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Image Size', 'wd_package' ),
				'param_name' 	=> 'image_size',
				'admin_label' 	=> true,
				'value' 		=> tvlgiao_wpdance_vc_get_list_image_size(),
				'std'			=> 'full',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Columns', 'wd_package' ),
				'param_name' 	=> 'columns',
				'admin_label' 	=> true,
				'value' 		=> tvlgiao_wpdance_vc_get_list_tvgiao_columns(),
				'std'			=> '5',
				'description' 	=> '',
				'edit_field_class' => 'vc_col-sm-6',
			),
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
				"description" 	=> "",
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
				'edit_field_class' => 'vc_col-sm-6',
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
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "is_slider", 'value' => array('1')),
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