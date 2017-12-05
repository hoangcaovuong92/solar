<?php
$categories       = tvlgiao_wpdance_vc_get_list_category('wpdance_faq_categories', false, 'sorted_list');
vc_map( array(
	'name'        => __( "WD - FAQs", 'wd_package' ),
	'description' => __( "Show Tabs-style FAQs...", 'wd_package' ),
	'base'        => 'tvlgiao_wpdance_faq',
	"category"    => esc_html__("WPDance Shortcode", 'wd_package'),
	'icon'        => 'icon-wpb-ui-accordion',
	'params'      => array(
		/*-----------------------------------------------------------------------------------
			Categories
		-------------------------------------------------------------------------------------*/
		array(
			'type' 			=> 'sorted_list',
			'heading' 		=> __( 'Categories', 'wd_package' ),
			'param_name' 	=> 'ids',
			'description' 	=> __( 'Select and sort FAQs categories. Leave blank if you want to display all FAQs category', 'wd_package' ),
			'value' 		=> '-1',
			'options' 		=> $categories,
		),
		array(
			'type'        	=> 'textfield',
			'class'       	=> '',
			'heading'     	=> __( "Posts Per Page", 'wd_package' ),
			'description' 	=> __( "Set -1 to display all faqs", 'wd_package' ),
			'admin_label' 	=> true,
			'param_name'  	=> 'posts_per_page',
			'value'       	=> -1,
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'Style', 'wd_package' ),
			'param_name' 	=> 'style',
			'admin_label' 	=> true,
			'value' 		=> array( 
						'Normal'			=> 'normal',
						'Accordion & Tabs'	=> 'tab',
					),
			'std' 			=> 'normal',
			'description' 	=> '',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'Sort By', 'wd_package' ),
			'param_name' 	=> 'sort',
			'admin_label' 	=> true,
			'value' 		=> tvlgiao_wpdance_get_sort_by_values(),
			'std'			=> 'DESC',
			'description' 	=> '',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'Order By', 'wd_package' ),
			'param_name' 	=> 'order_by',
			'admin_label' 	=> true ,
			'value' 		=> tvlgiao_wpdance_get_order_by_values(),
			'std'			=> 'date',
			'description' 	=> '',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'type'        => 'textfield',
			'heading'     => __( "Extra class name", 'wd_package' ),
			'description' => __( "Style particular content element differently - add a class name and refer to it in custom CSS.", 'wd_package' ),
			'admin_label' => true,
			'param_name'  => 'class',
			'value'       => '',
		),
	)
) );