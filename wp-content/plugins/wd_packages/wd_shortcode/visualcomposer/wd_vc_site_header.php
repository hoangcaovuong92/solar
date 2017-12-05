<?php
	# Add shortcode Site Header
	vc_map(array(
		'name' 				=> esc_html__("WD - Site Header", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_site_header',
		'description' 		=> esc_html__("Display site info (title, tagline, logo...) on the header", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'vc_icon-vc-gitem-post-categories',
		'params' => array(
			array(
				"type" 			=> "attach_image",
				"class" 		=> "",
				"heading" 		=> esc_html__("Logo Image", 'wd_package'),
				"description" 	=> esc_html__("If you do not want the default logo, you add another logo here", 'wd_package'),
				"param_name" 	=> "custom_logo_url",
				"value" 		=> get_template_directory_uri().'/assets/images/wpdance_logo.png',
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Hide Site Title", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "hide_site_title",
				"value" => array(
						'Yes' 		=> '1',
						'No' 		=> '0'
					),
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Text Align', 'wd_package' ),
				'param_name' 	=> 'text_align',
				'admin_label' 	=> true,
				'value' 		=> tvlgiao_wpdance_vc_get_list_text_align_bootstrap(),
				'std'			=> 'text-center',
				'description' 	=> '',
				'edit_field_class' => 'vc_col-sm-6',
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