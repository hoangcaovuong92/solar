<?php
	$feature_options = tvlgiao_wpdance_vc_get_data_by_post_type('wpdance_feature');
	vc_map( array(
		'name' 			=> esc_html__( 'WD - Feature Single', 'wd_package' ),
		'base' 			=> 'tvlgiao_wpdance_feature',
		'description' 	=> __( "Display detail of single feature...", 'wd_package' ),
		'category' 		=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        	=> 'vc_icon-vc-gitem-post-meta',
		'params' 		=> array(
			array(
				'type' 				=> 'dropdown',
				'heading' 			=> esc_html__( 'Feature ID', 'wd_package' ),
				'param_name' 		=> 'id',
				'admin_label' 		=> true,
				'value' 			=> $feature_options,
				'description' 		=> ''
			),
			array(
				'type' 				=> 'dropdown',
				'heading' 			=> esc_html__( 'Show Thumbnail Or Icon Font', 'wd_package' ),
				'param_name' 		=> 'show_icon_font_thumbnail',
				'admin_label' 		=> true,
				'value' 			=> array( 
					'Show Icon Font'		=> '1',
					'Show Image/Thumbnail'	=> '2',
					'Hide Icon & Thumbnail'	=> '0'
				),
				'description' 		=> ''
			),
			//Show Icon Setting
			array(
				'type' 				=> 'iconpicker',
				'heading' 			=> esc_html__( 'Icon', 'wd_package' ),
				'param_name' 		=> 'icon_fontawesome',
				'value' 			=> 'fa fa-adjust',
				'settings' 			=> array(
					'emptyIcon' 		=> false,
					'iconsPerPage' 		=> 4000,
				),
				'description' 		=> esc_html__( 'Select icon from library.', 'wd_package' ),
				'edit_field_class' 	=> 'vc_col-sm-6',
				'dependency'  		=> Array('element' => "show_icon_font_thumbnail", 'value' => array('1'))
			),
			array(
				'type' 				=> 'dropdown',
				'heading' 			=> esc_html__( 'Icon Size', 'wd_package' ),
				'param_name' 		=> 'icon_size',
				'admin_label' 		=> true,
				"value" 			=> tvlgiao_wpdance_vc_get_list_awesome_font_size(),
				"std" 				=> "fa-1x",
				'description' 		=> '',
				'edit_field_class' 	=> 'vc_col-sm-6',
				'dependency'		=> Array('element' => "show_icon_font_thumbnail", 'value' => array('1'))
			),
			array(
				'type' 				=> 'dropdown',
				'heading' 			=> esc_html__( 'Style Font Icon', 'wd_package' ),
				'param_name' 		=> 'style_font',
				'admin_label' 		=> true,
				'value' 			=> array(
						'Sync with title'			=> 'sync-with-title',
						'Separate from title'		=> 'separate-from-title'
					),
				'description' 		=> '',
				'dependency'		=> Array('element' => "show_icon_font_thumbnail", 'value' => array('1'))
			),
			//Show Image/thumbnail Setting
			array(
				'type' 				=> 'dropdown',
				'heading' 			=> esc_html__( 'Image Or Thumbnail', 'wd_package' ),
				'param_name' 		=> 'image_or_thumbnail',
				'admin_label' 		=> true,
				'value' 			=> array( 
					'Show Thumbnail'		=> '1',
					'Show Custom Image'		=> '2',
				),
				'description' 		=> '',
				'edit_field_class' 	=> 'vc_col-sm-6',
				'dependency'  		=> Array('element' => "show_icon_font_thumbnail", 'value' => array('2'))
			),
			array(
				"type" 				=> "attach_image",
				"class" 			=> "",
				"heading" 			=> esc_html__("Select Image", 'wd_package'),
				"param_name" 		=> "custom_image",
				"value" 			=> "",
				'edit_field_class' 	=> 'vc_col-sm-6',
				"description" 		=> esc_html__('', 'wd_package'),
				'dependency'  		=> Array('element' => "image_or_thumbnail", 'value' => array('2'))
			),
			array(
				'type' 				=> 'dropdown',
				'heading' 			=> esc_html__( 'Thumbnail Size', 'wd_package' ),
				'param_name' 		=> 'image_size',
				'admin_label' 		=> true,
				'value' 			=> tvlgiao_wpdance_vc_get_list_image_size(),
				'description' 		=> '',
				'edit_field_class' 	=> 'vc_col-sm-6',
				'dependency'  		=> Array('element' => "show_icon_font_thumbnail", 'value' => array('2'))
			),
			array(
				'type' 				=> 'dropdown',
				'heading' 			=> esc_html__( 'Style Thumbnail', 'wd_package' ),
				'param_name' 		=> 'style_thumbnail',
				'admin_label' 		=> true,
				'value' 			=> array(
						'Above the content'			=> 'above-the-content',
						'Left of the content'		=> 'left-of-the-content'
					),
				'description' 		=> '',
				'dependency'		=> Array('element' => "show_icon_font_thumbnail", 'value' => array('2'))
			),
			//Global Setting
			array(
				'type' 				=> 'dropdown',
				'heading' 			=> esc_html__( 'Text Align', 'wd_package' ),
				'param_name' 		=> 'text_align',
				'admin_label' 		=> true,
				'value' 			=> tvlgiao_wpdance_vc_get_list_text_align_bootstrap(),
				'std' 				=> 'wd-text-align-default',
				'description' 		=> '',
				'edit_field_class' 	=> 'vc_col-sm-6',
			),
			array(
				'type' 				=> 'dropdown',
				'heading' 			=> esc_html__( 'Show feature title', 'wd_package' ),
				'param_name' 		=> 'title',
				'admin_label' 		=> true,
				'value' 			=> array(
						'Yes'	=> '1',
						'No'	=> '0'
					),
				'description' 		=> '',
				'edit_field_class' 	=> 'vc_col-sm-6',
			),
			array(
				'type' 				=> 'dropdown',
				'heading' 			=> esc_html__( 'Show excerpt', 'wd_package' ),
				'param_name' 		=> 'excerpt',
				'admin_label' 		=> true,
				'value' 			=> array(
						'Yes'	=> '1',
						'No'	=> '0'
					),
				'description' 		=> '',
				'edit_field_class' 	=> 'vc_col-sm-6',
			),
			array(
				'type' 				=> 'dropdown',
				'heading' 			=> esc_html__( 'Open Link With', 'wd_package' ),
				'param_name' 		=> 'open_link_with',
				'admin_label' 		=> true,
				'value' 			=> array(
						'Modal Popup'	=> 'modal',
						'Feature Link'	=> 'link'
					),
				'std' 				=> 'modal',
				'description' 		=> '',
				'edit_field_class' 	=> 'vc_col-sm-6',
			),
			array(
				'type' 				=> 'dropdown',
				'heading' 			=> esc_html__( 'Show Readmore', 'wd_package' ),
				'param_name' 		=> 'readmore',
				'admin_label' 		=> true,
				'value' 			=> array(
						'No'	=> '0',
						'Yes'	=> '1'
						
					),
				'description' 		=> '',
				'edit_field_class' 	=> 'vc_col-sm-6',
			),
			array(
				'type' 				=> 'dropdown',
				'heading' 			=> esc_html__( 'Active', 'wd_package' ),
				'param_name' 		=> 'active',
				'admin_label' 		=> true,
				'value' 			=> array(
						'No'	=> '0',
						'Yes'	=> '1'
					),
				'description' 		=> '',
				'edit_field_class' 	=> 'vc_col-sm-6',
			),
			array(
				'type' 				=> 'textfield',
				'class' 			=> '',
				'heading' 			=> esc_html__("Extra class name", 'wd_package'),
				'description'		=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wd_package'),
				'admin_label' 		=> true,
				'param_name' 		=> 'class',
				'value' 			=> ''
			),
		)
	));
?>