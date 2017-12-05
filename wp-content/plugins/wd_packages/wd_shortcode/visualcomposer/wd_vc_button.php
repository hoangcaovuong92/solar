<?php
	$product_category = tvlgiao_wpdance_vc_get_list_category();
	$button_style = array(
		'Style 1' 	=> 'style-1',
		'Style 2' 	=> 'style-2',
		'Style 3' 	=> 'style-3',
		'Style 4' 	=> 'style-4',
	);

	vc_map(array(
		'name' 				=> esc_html__("WD - Button", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_buttons',
		'description' 		=> esc_html__("", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'icon-wpb-ui-button',
		"params" => array(
			
			/*-----------------------------------------------------------------------------------
				BUTTON SETTING
			-------------------------------------------------------------------------------------*/
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Button Style', 'wd_package' ),
				'param_name' 	=> 'button_style',
				'admin_label' 	=> true,
				'value' 		=> $button_style,
				'description' 	=> '',
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
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Select Category', 'wd_package' ),
				'param_name' 	=> 'id_category',
				'admin_label' 	=> true,
				'value' 		=> $product_category,
				'description' 	=> esc_html__('Select "All Category" to use the link to the shop page.', 'wd_package'),
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
			),
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> esc_html__("Button class", 'wd_package'),
				"param_name" 	=> "button_class",
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