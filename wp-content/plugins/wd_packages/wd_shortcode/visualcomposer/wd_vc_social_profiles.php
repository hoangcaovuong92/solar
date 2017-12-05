<?php
	//Social Profiles
	vc_map(array(
		'name' 				=> esc_html__("WD - Social Icon", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_social_profiles',
		'description' 		=> esc_html__("Display social icon with many style...", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'icon-wpb-balloon-facebook-left',
		'params' => array(
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Title", 'wd_package'),
				'description' 	=> esc_html__("", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'title',
				'value' 		=> ''
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Style Show", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "style",
				"value" => array(
						'Style 1' 		=> 'style-1',
						'Style 2' 		=> 'style-2'
					),
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Title Social", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_title",
				"value" => array(
						'Yes' 		=> '1',
						'No' 		=> '0'
					),
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show RSS", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_rss",
				"value" => array(
						'Show' 		=> '1',
						'Hide' 		=> '0'
					),
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("RSS ID", 'wd_package'),
				'description' 	=> esc_html__("", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'rss_id',
				'value' 		=> '#',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Twitter", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_twitter",
				"value" => array(
						'Show' 		=> '1',
						'Hide' 		=> '0'
					),
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Twitter ID", 'wd_package'),
				'description' 	=> esc_html__("", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'twitter_id',
				'value' 		=> '#',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Facebook", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_facebook",
				"value" => array(
						'Show' 		=> '1',
						'Hide' 		=> '0'
					),
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Facebook ID", 'wd_package'),
				'description' 	=> esc_html__("", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'facebook_id',
				'value' 		=> '#',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Google", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_google",
				"value" => array(
						'Show' 		=> '1',
						'Hide' 		=> '0'
					),
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Google ID", 'wd_package'),
				'description' 	=> esc_html__("", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'google_id',
				'value' 		=> '#',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Pin", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_pin",
				"value" => array(
						'Show' 		=> '1',
						'Hide' 		=> '0'
					),
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Pin ID", 'wd_package'),
				'description' 	=> esc_html__("", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'pin_id',
				'value' 		=> '#',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Youtube", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_youtube",
				"value" => array(
						'Show' 		=> '1',
						'Hide' 		=> '0'
					),
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Youtube ID", 'wd_package'),
				'description' 	=> esc_html__("", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'youtube_id',
				'value' 		=> '#',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Instagram", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_instagram",
				"value" => array(
						'Show' 		=> '1',
						'Hide' 		=> '0'
					),
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("RSS Instagram", 'wd_package'),
				'description' 	=> esc_html__("", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'instagram_id',
				'value' 		=> '#',
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