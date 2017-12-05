<?php
	/****************************************************************************/
	/*						TESTIMONIAL	PLUGIN 									*/
	/****************************************************************************/
	if( post_type_exists('wd_testimonials') || class_exists('WD_Testimonials') ){
		$testimonials_array 		= tvlgiao_wpdance_vc_get_data_by_post_type('wd_testimonials');
		$testimonials_category 		= tvlgiao_wpdance_vc_get_list_category('wd_testimonials_categories');		
		vc_map( array(
			'name' 		=> esc_html__( 'WD - Testimonials', 'wd_package' ),
			'base' 		=> 'tvlgiao_wpdance_testimonials',
			'category' 	=> esc_html__("WPDance Shortcode", 'wd_package'),
			'icon'      => 'icon-wpb-call-to-action',
			'params' 	=> array(
				array(
					'type' 				=> 'dropdown',
					'heading' 			=> esc_html__( 'Single or Slider', 'wd_package' ),
					'param_name' 		=> 'type',
					'admin_label' 		=> true,
					'value' 			=> array(
							'Single'		=> 'single',
							'Slider'		=> 'slider'
						),
					'description' 		=> ''
				),
				array(
					'type' 				=> 'dropdown',
					'heading' 			=> esc_html__( 'Select Testimonials', 'wd_package' ),
					'param_name' 		=> 'id_testimonial',
					'admin_label' 		=> true,
					'value' 			=> $testimonials_array,
					'description' 		=> '',
					'dependency'		=> Array('element' => "type", 'value' => array('single'))
				),
				array(
					'type' 				=> 'dropdown',
					'heading' 			=> esc_html__( 'Select Category', 'wd_package' ),
					'param_name' 		=> 'id_category',
					'admin_label' 		=> true,
					'value' 			=> $testimonials_category,
					'description' 		=> '',
					'dependency'		=> Array('element' => "type", 'value' => array('slider'))
				),
				array(
					'type' 				=> 'dropdown',
					'heading' 			=> esc_html__( 'Columns', 'wd_package' ),
					'param_name' 		=> 'columns',
					'admin_label' 		=> true,
					'value' 			=> tvlgiao_wpdance_vc_get_list_tvgiao_columns(),
					'std'				=> 4,
					'description' 		=> esc_html__( '', 'wd_package' ),
					'edit_field_class' 	=> 'vc_col-sm-6',
					'dependency'		=> Array('element' => "type", 'value' => array('slider'))
				),
				array(
					'type'				=> 'textfield',
					'heading' 			=> esc_html__( 'Number Of Testimonials', 'wd_package' ),
					'param_name' 		=> 'number_testimonials',
					'admin_label' 		=> true,
					'value' 			=> '4',
					'edit_field_class' 	=> 'vc_col-sm-6',
					'dependency'		=> Array('element' => "type", 'value' => array('slider'))
				),
				array(
					'type' 				=> 'dropdown',
					'heading' 			=> esc_html__( 'Style', 'wd_package' ),
					'param_name' 		=> 'style_testimonial',
					'admin_label' 		=> true,
					'value' => array(
							'Style 1'			=> 'style-1',
							'Style 2'			=> 'style-2',
						),
					'description' 		=> '',
					'edit_field_class'  => 'vc_col-sm-6',
					'dependency'		=> Array('element' => "slider_or_one", 'value' => array('1'))
				),
				array(
					'type' 				=> 'dropdown',
					'heading' 			=> esc_html__( 'Text Align', 'wd_package' ),
					'param_name' 		=> 'text_align',
					'admin_label' 		=> true,
					'value' 			=> tvlgiao_wpdance_vc_get_list_text_align_bootstrap(),
					'std' 				=> 'text-center',
					'description' 		=> '',
					'edit_field_class' 	=> 'vc_col-sm-6',
				),
				array(
					'type' 				=> 'dropdown',
					'heading' 			=> esc_html__( 'Show Avatar', 'wd_package' ),
					'param_name' 		=> 'show_avatar',
					'admin_label' 		=> true,
					'value' 			=> array(
							'Yes'	=> '1',
							'No'	=> '0'
						),
					'description' 		=> '',
					'edit_field_class'  => 'vc_col-sm-6',
				),
				array(
					'type' 				=> 'dropdown',
					'heading' 			=> esc_html__( 'Avatar Size', 'wd_package' ),
					'param_name' 		=> 'image_size',
					'admin_label' 		=> true,
					'value' 			=> tvlgiao_wpdance_vc_get_list_image_size(),
					'description' 		=> '',
					'std'				=> 'full',
					'edit_field_class' 	=> 'vc_col-sm-6',
					'dependency'		=> Array('element' => "show_avatar", 'value' => array('1'))
				),
				array(
					'type' 				=> 'dropdown',
					'heading' 			=> esc_html__( 'Show Customer Name', 'wd_package' ),
					'param_name' 		=> 'show_customer_name',
					'admin_label' 		=> true,
					'value' 			=> array(
							'Yes'	=> '1',
							'No'	=> '0'
						),
					'description' 		=> '',
					'edit_field_class'  => 'vc_col-sm-6',
				),
				array(
					'type' 				=> 'dropdown',
					'heading' 			=> esc_html__( 'Show Role', 'wd_package' ),
					'param_name' 		=> 'show_role',
					'admin_label' 		=> true,
					'value' 			=> array(
							'Yes'	=> '1',
							'No'	=> '0'
						),
					'description' 		=> '',
					'edit_field_class'  => 'vc_col-sm-6',
				),
				array(
					'type' 				=> 'dropdown',
					'heading' 			=> esc_html__( 'Show Rating', 'wd_package' ),
					'param_name' 		=> 'show_rating',
					'admin_label' 		=> true,
					'value' 			=> array(
							'Yes'	=> '1',
							'No'	=> '0'
						),
					'description' 		=> '',
					'edit_field_class'  => 'vc_col-sm-6',
				),
				array(
					'type' 				=> 'dropdown',
					'heading' 			=> esc_html__( 'Show Excerpt', 'wd_package' ),
					'param_name' 		=> 'show_excerpt',
					'admin_label' 		=> true,
					'value' 			=> array(
							'Yes'	=> '1',
							'No'	=> '0'
						),
					'description' 		=> '',
					'edit_field_class'  => 'vc_col-sm-6',
				),
				array(
					'type' 				=> 'textfield',
					'heading' 			=> esc_html__( 'Number Of Excerpt Words', 'wd_package' ),
					'param_name' 		=> 'number_word_excerpt',
					'admin_label' 		=> true,
					'value' 			=> '20',
					'description' 		=> '',
					'edit_field_class'  => 'vc_col-sm-6',
					'dependency'		=> Array('element' => "show_excerpt", 'value' => array('1'))
				),
				array(
					'type' 				=> 'textfield',
					'class' 			=> '',
					'heading' 			=> esc_html__("Extra class name", 'wd_package'),
					'description'		=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wd_package'),
					'admin_label' 		=> true,
					'param_name' 		=> 'class',
					'value' 			=> ''
				)
			)
		));
	}// End Testimonials By WooCommerce
?>