<?php
	//Social Profiles
	vc_map(array(
		'name' 				=> esc_html__("WD - Fanpage Likebox", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_social_fanpage_likebox',
		'description' 		=> esc_html__("Display fanpage facebook likebox with custom width, height...", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'icon-wpb-balloon-facebook-left',
		'params' => array(
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Fanpage URL", 'wd_package'),
				'description' 	=> esc_html__("URL of facebook fanpage", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'fanpage_url',
				'value' 		=> ''
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Width", 'wd_package'),
				'description' 	=> esc_html__("Unit: pixel", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'width',
				'value' 		=> '320',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Height", 'wd_package'),
				'description' 	=> esc_html__("Unit: pixel", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'height',
				'value' 		=> '230',
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