<?php
	vc_map(array(
		'name' 				=> esc_html__("WD - Title/Heading", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_title',
		'description' 		=> esc_html__("Custom title for everywhere", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'icon-wpb-ui-custom_heading',
		"params" => array(
			/*-----------------------------------------------------------------------------------
				Title & DESC
			-------------------------------------------------------------------------------------*/
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> esc_html__("Title", 'wd_package'),
				"param_name" 	=> "title",
				"description" 	=> '',
			),
			array(
				"type" 			=> "textarea",
				"class" 		=> "",
				"heading" 		=> esc_html__("Description", 'wd_package'),
				"param_name" 	=> "description",
				"description" 	=> '',
			),
			/*-----------------------------------------------------------------------------------
				SETTING
			-------------------------------------------------------------------------------------*/
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Heading Type', 'wd_package' ),
				'param_name' 	=> 'heading_type',
				'admin_label' 	=> true,
				'value' 		=> array(
					'Title Section Style 1'			=> 'wd-title-section-style-1',
					'Title Section Style 2'			=> 'wd-title-section-style-2',
					'Title Section Style 3'			=> 'wd-title-section-style-3',
					'Title For Special Page'		=> 'wd-title-for-special-page',
				), 
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Heading Element', 'wd_package' ),
				'param_name' 	=> 'heading_element',
				'admin_label' 	=> true,
				'value' 		=> array(
					'H1'		=> 'h1',
					'H2'		=> 'h2',
					'H3'		=> 'h3',
					'H4'		=> 'h4',
					'H5'		=> 'h5',
					'H6'		=> 'h6',
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Text Align', 'wd_package' ),
				'param_name' 	=> 'text_align',
				'admin_label' 	=> true,
				'value' 		=> tvlgiao_wpdance_vc_get_list_text_align_bootstrap(),
				'description' 	=> '',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> __( 'Display Button', 'wd_package' ),
				'description' 	=> __( 'The button with custom link will display after the description', 'wd_package' ),
				'param_name'  	=> 'display_button',
				'value'       	=> array(
					'Yes' 	=> '1',
					'No' 	=> '0',
				),
				'std'			=> '0',	
				'save_always' 	=> true,
			),
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> __( "Button Text", 'wd_package' ),
				"param_name" 	=> "button_text",
				"value" 		=> 'View All', 
				"description" 	=> __( "", 'wd_package' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "display_button", 'value' => array('1')),
			),
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> __( "Button URL", 'wd_package' ),
				"param_name" 	=> "button_url",
				"value" 		=> '#', 
				"description" 	=> __( "", 'wd_package' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "display_button", 'value' => array('1'))
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