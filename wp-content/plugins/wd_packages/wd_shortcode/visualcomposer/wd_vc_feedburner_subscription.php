<?php
	//Feedburner Subscription
	vc_map(array(
		'name' 				=> esc_html__("WD - Feedburner Subscriptions", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_feedburner_subscription',
		'description' 		=> esc_html__("Feedburner Subscriptions", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'vc_icon-vc-gitem-post-title',
		'params' => array(
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Title", 'wd_package'),
				'description' 	=> esc_html__("Title", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'title',
				'value' 		=> esc_html__("Sign up for Our Newsletter", 'wd_package'),
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Enter your Intro Text", 'wd_package'),
				'description' 	=> esc_html__("Intro text", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'intro_text',
				'value' 		=> esc_html__("A newsletter is a regularly distributed publication generally", 'wd_package'),
			),

			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Enter your Placeholder Text", 'wd_package'),
				'description' 	=> esc_html__("Placeholder text", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'placeholder_text',
				'value' 		=> esc_html__("Enter your email address", 'wd_package'),
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Enter your Button", 'wd_package'),
				'description' 	=> esc_html__("Button Text", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'button_text',
				'value' 		=> esc_html__("Subscribe", 'wd_package'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Enter your Feedburner ID", 'wd_package'),
				'description' 	=> esc_html__("", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'feedburner_id',
				'value' 		=> esc_html__("WpComic-Manga", 'wd_package'),
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