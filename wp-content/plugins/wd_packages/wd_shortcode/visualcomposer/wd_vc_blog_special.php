<?php
	// Special Blog
	vc_map(array(
		'name' 				=> esc_html__("WD - Blog Special", 'wpdancelaparis'),
		'base' 				=> 'tvlgiao_wpdance_special_blog',
		'description' 		=> esc_html__("Custom blog themes do not follow the default setting structure.", 'wpdancelaparis'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wpdancelaparis'),
		'icon'        		=> 'icon-wpb-toggle-small-expand',
		'params' => array(
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Title", 'wpdancelaparis'),
				'description' 	=> esc_html__("", 'wpdancelaparis'),
				'admin_label' 	=> true,
				'param_name' 	=> 'title',
				'value' 		=> ''
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Number Post", 'wpdancelaparis'),
				'description' 	=> esc_html__("", 'wpdancelaparis'),
				'admin_label' 	=> true,
				'param_name' 	=> 'number',
				'value' 		=> '6',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Data Show", 'wpdancelaparis'),
				"admin_label" 	=> true,
				"param_name" 	=> "data_post",
				"value" => array(
						'Recent Post' 		=> 'recent-post',
						'Most View Post' 	=> 'most-view'
					),
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 				=> 'dropdown',
				'heading' 			=> esc_html__( 'Style', 'wpdancelaparis' ),
				'param_name' 		=> 'style',
				'admin_label' 		=> true,
				'value' => array(
						'Grid'		=> 'grid',
						'List'		=> 'list'
						 
					),
				'description' 		=> '',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Columns", 'wpdancelaparis'),
				'description' 	=> esc_html__("", 'wpdancelaparis'),
				'admin_label' 	=> true,
				'param_name' 	=> 'columns',
				'value' 		=> '3',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Title (Blog)", 'wpdancelaparis'),
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
				"heading" 		=> esc_html__("Show Thumbnail", 'wpdancelaparis'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_thumbnail",
				"value" => array(
						'Yes' 		=> '1',
						'No' 		=> '0'
					),
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Show Placeholder Image', 'wpdancelaparis' ),
				'param_name' 	=> 'show_placeholder_image',
				'admin_label' 	=> true,
				'value' 		=> array(
					'Yes'		=> '1',
					'No'		=> '0'
				),
				'std'			=> '0',
				'description' 	=> esc_html__( 'Show Placeholder Image if post no thumbnail', 'wpdancelaparis' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "show_thumbnail", 'value' => array('1'))
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Meta", 'wpdancelaparis'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_meta",
				"value" => array(
						'Yes' 		=> '1',
						'No' 		=> '0'
					),
				'std'			=> '0',
				"description" 	=> esc_html__("show author, category or number facebook comment", 'wpdancelaparis'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Author", 'wpdancelaparis'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_author",
				"value" => array(
						'Yes' 		=> '1',
						'No' 		=> '0'
					),
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'  	=> Array('element' => "show_meta", 'value' => array('1'))
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Category", 'wpdancelaparis'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_category",
				"value" => array(
						'Yes' 		=> '1',
						'No' 		=> '0'
					),
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'  	=> Array('element' => "show_meta", 'value' => array('1'))
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Number Comment", 'wpdancelaparis'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_number_comments",
				"value" => array(
						'Yes' 		=> '1',
						'No' 		=> '0'
					),
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'  	=> Array('element' => "show_meta", 'value' => array('1'))
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Date", 'wpdancelaparis'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_date",
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
				"heading" 		=> esc_html__("Show Excerpt", 'wpdancelaparis'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_excerpt",
				"value" => array(
						'Yes' 		=> '1',
						'No' 		=> '0'
					),
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Number Excerpt", 'wpdancelaparis'),
				'description' 	=> esc_html__("", 'wpdancelaparis'),
				'admin_label' 	=> true,
				'param_name' 	=> 'number_excerpt',
				'value' 		=> '10',
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "show_excerpt", 'value' => array('1'))
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Readmore", 'wpdancelaparis'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_readmore",
				"value" => array(
					'Yes' 		=> '1',
					'No' 		=> '0'
				),
				'std'			=> '0',
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "dropdown", 
				"class" 		=> "",
				"heading" 		=> esc_html__("Is Slider", 'wpdancelaparis'),
				"admin_label" 	=> true,
				"param_name" 	=> "is_slider",
				"value" => array(
						'Yes' 		=> '1',
						'No' 		=> '0'
					),
				"description" 	=> "",
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Nav", 'wpdancelaparis'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_nav",
				"value" => array(
						'Yes' 		=> '1',
						'No' 		=> '0'
					),
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'  	=> Array('element' => "is_slider", 'value' => array('1'))
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Auto Play", 'wpdancelaparis'),
				"admin_label" 	=> true,
				"param_name" 	=> "auto_play",
				"value" => array(
						'Yes' 		=> '1',
						'No' 		=> '0'
					),
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'  	=> Array('element' => "is_slider", 'value' => array('1'))
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Number Rows", 'wpdancelaparis'),
				'description' 	=> esc_html__("", 'wpdancelaparis'),
				'admin_label' 	=> true,
				'param_name' 	=> 'per_slide',
				'value' 		=> '3',
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'  	=> Array('element' => "is_slider", 'value' => array('1'))
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Extra class name", 'wpdancelaparis'),
				'description'	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdancelaparis'),
				'admin_label' 	=> true,
				'param_name' 	=> 'class',
				'value' 		=> ''
			)
		)
	));
?>