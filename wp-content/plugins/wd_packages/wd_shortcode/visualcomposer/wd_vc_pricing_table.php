<?php
	//Pricing Table
	vc_map( array(
		'name' 				=> esc_html__("WD - Pricing Table", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_pricing_table',
		'description' 		=> esc_html__("Pricing Table", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'icon-wpb-vc_carousel',
		"params" 			=> array(
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Style', 'wd_package' ),
				'param_name' 	=> 'style',
				'admin_label' 	=> true,
				'value' 		=> array(
						'Style 1'	=> 'style-1',
						'Style 2'	=> 'style-2',
						'Style 3'	=> 'style-3',
						'Style 4'	=> 'style-4',
						'Style 5'	=> 'style-5',
						'Style 6'	=> 'style-6',
						'Style 7'	=> 'style-7',
						'Style 8'	=> 'style-8'
				),
				'description' 	=> ''
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Show image or icon font', 'wd_package' ),
				'param_name' 	=> 'show_icon_font_image',
				'admin_label' 	=> true,
				'value' 		=> array(
						'Show icon font'	=> '1',
						'Show Image'		=> '0'
						
					),
				'description' 	=> ''
			),
			array(
				'type' 			=> 'iconpicker',
				'heading' 		=> esc_html__( 'Icon font', 'wd_package' ),
				'param_name' 	=> 'class_icon_font',
				'value' 		=> 'fa fa-adjust', 
				'settings' 		=> array(
					'emptyIcon' 	=> false,
					'iconsPerPage' 	=> 4000,
					),
				'description' 	=> esc_html__( 'Select icon from library.', 'wd_package' ),
				'dependency'  	=> Array('element' => "show_icon_font_image", 'value' => array('1'))
			),
			array(
				"type" 			=> "attach_image",
				"class" 		=> "",
				"heading" 		=> esc_html__("Image Pricing", 'wd_package'),
				"description" 	=> esc_html__("Image pricing", 'wd_package'),
				"param_name" 	=> "image_pricing_url",
				"value" 		=> "",
				'dependency'  	=> Array('element' => "show_icon_font_image", 'value' => array('0'))
			),
			array(
				"type" 			=> "textfield",
				"holder" 		=> "div",
				"class" 		=> "",
				"heading" 		=> esc_html__("Title", 'wd_package'),
				"param_name" 	=> "title",
				"value" 		=> esc_html__("Basic Plan", 'wd_package'),
				"description" 	=> ""
			),
			array(
				"type" 			=> "textfield",
				"holder" 		=> "div",
				"class" 		=> "",
				"heading" 		=> esc_html__("Description", 'wd_package'),
				"param_name" 	=> "description",
				"value" 		=> "",
				"description" 	=> ""
			),
			array(
				"type" 			=> "textfield",
				"holder" 		=> "div",
				"class" 		=> "",
				"heading" 		=> esc_html__("Price", 'wd_package'),
				"param_name" 	=> "price",
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				"type" 			=> "textfield",
				"holder" 		=> "div",
				"class" 		=> "",
				"heading" 		=> esc_html__("Currency", 'wd_package'),
				"param_name" 	=> "currency",
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				"type" 			=> "textfield",
				"holder" 		=> "div",
				"class" 		=> "",
				"heading" 		=> esc_html__("Price Period", 'wd_package'),
				"param_name" 	=> "price_period",
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				"type" 			=> "textfield",
				"holder" 		=> "div",
				"class" 		=> "",
				"heading" 		=> esc_html__("Link", 'wd_package'),
				"param_name" 	=> "link",
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "dropdown",
				"holder" 		=> "div",
				"class" 		=> "",
				"heading" 		=> esc_html__("Target", 'wd_package'),
				"param_name" 	=> "target",
				"value" 		=> tvlgiao_wpdance_vc_get_list_link_target(),
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "textfield",
				"holder" 		=> "div",
				"class" 		=> "",
				"heading" 		=> esc_html__("Button Text", 'wd_package'),
				"param_name" 	=> "button_text",
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "dropdown",
				"holder" 		=> "div",
				"class" 		=> "",
				"heading" 		=> esc_html__("Active", 'wd_package'),
				"param_name" 	=> "active",
				"value" 		=> array(
					"No" 			=> "no",
					"Yes" 			=> "yes"	
				),
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "textarea_html",
				"holder" 		=> "div",
				"class" 		=> "",
				"heading" 		=> esc_html__("Content", 'wd_package'),
				"param_name" 	=> "content",
				"value" 		=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit.",
				"description" 	=> ""
			)
		)
	));
?>