<?php
	/****************************************************************************/
	/*						TESTIMONIAL	PLUGIN 									*/
	/****************************************************************************/
	if( post_type_exists('wd_testimonials') || class_exists('WD_Testimonials') ){
		$testimonials_array 		= tvlgiao_wpdance_vc_get_data_by_post_type('wd_testimonials');
		$testimonials_category 		= tvlgiao_wpdance_vc_get_list_category('wd_testimonials_categories');		
		vc_map( array(
			'name' 		=> esc_html__( 'WD - Testimonials', 'wpdancelaparis' ),
			'base' 		=> 'tvlgiao_wpdance_testimonials',
			'category' 	=> esc_html__("WPDance Shortcode", 'wpdancelaparis'),
			'icon'      => 'icon-wpb-call-to-action',
			'params' 	=> array(
				array(
					'type' 				=> 'dropdown',
					'heading' 			=> esc_html__( 'Single or Slider', 'wpdancelaparis' ),
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
					'heading' 			=> esc_html__( 'Select Testimonials', 'wpdancelaparis' ),
					'param_name' 		=> 'id_testimonial',
					'admin_label' 		=> true,
					'value' 			=> $testimonials_array,
					'description' 		=> '',
					'dependency'		=> Array('element' => "type", 'value' => array('single'))
				),
				array(
					'type' 				=> 'dropdown',
					'heading' 			=> esc_html__( 'Select Category', 'wpdancelaparis' ),
					'param_name' 		=> 'id_category',
					'admin_label' 		=> true,
					'value' 			=> $testimonials_category,
					'description' 		=> '',
					'dependency'		=> Array('element' => "type", 'value' => array('slider'))
				),
				array(
					'type' 				=> 'dropdown',
					'heading' 			=> esc_html__( 'Columns', 'wpdancelaparis' ),
					'param_name' 		=> 'columns',
					'admin_label' 		=> true,
					'value' 			=> tvlgiao_wpdance_vc_get_list_tvgiao_columns(),
					'std'				=> 4,
					'description' 		=> esc_html__( '', 'wpdancelaparis' ),
					'edit_field_class' 	=> 'vc_col-sm-6',
					'dependency'		=> Array('element' => "type", 'value' => array('slider'))
				),
				array(
					'type'				=> 'textfield',
					'heading' 			=> esc_html__( 'Number Of Testimonials', 'wpdancelaparis' ),
					'param_name' 		=> 'number_testimonials',
					'admin_label' 		=> true,
					'value' 			=> '4',
					'edit_field_class' 	=> 'vc_col-sm-6',
					'dependency'		=> Array('element' => "type", 'value' => array('slider'))
				),
				array(
					'type' 				=> 'dropdown',
					'heading' 			=> esc_html__( 'Style', 'wpdancelaparis' ),
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
					'heading' 			=> esc_html__( 'Text Align', 'wpdancelaparis' ),
					'param_name' 		=> 'text_align',
					'admin_label' 		=> true,
					'value' 			=> tvlgiao_wpdance_vc_get_list_text_align_bootstrap(),
					'std' 				=> 'text-center',
					'description' 		=> '',
					'edit_field_class' 	=> 'vc_col-sm-6',
				),
				array(
					'type' 				=> 'dropdown',
					'heading' 			=> esc_html__( 'Show Avatar', 'wpdancelaparis' ),
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
					'heading' 			=> esc_html__( 'Avatar Size', 'wpdancelaparis' ),
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
					'heading' 			=> esc_html__( 'Show Customer Name', 'wpdancelaparis' ),
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
					'heading' 			=> esc_html__( 'Show Role', 'wpdancelaparis' ),
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
					'heading' 			=> esc_html__( 'Show Rating', 'wpdancelaparis' ),
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
					'heading' 			=> esc_html__( 'Show Excerpt', 'wpdancelaparis' ),
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
					'heading' 			=> esc_html__( 'Number Of Excerpt Words', 'wpdancelaparis' ),
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
					'heading' 			=> esc_html__("Extra class name", 'wpdancelaparis'),
					'description'		=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdancelaparis'),
					'admin_label' 		=> true,
					'param_name' 		=> 'class',
					'value' 			=> ''
				)
			)
		));
	}// End Testimonials By WooCommerce
?>