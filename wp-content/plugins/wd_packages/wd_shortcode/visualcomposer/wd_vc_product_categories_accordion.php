<?php
if( tvlgiao_wpdance_is_woocommerce() ){
	vc_map( array(
		'name'        => __( "WD - Product Categories Accordion", 'wd_package' ),
		'description' => __( "Display product categories list with accordion", 'wd_package' ),
		'base'        => 'tvlgiao_wpdance_categories_accordion',
		'category'    => __( "WPDance Shortcode", 'wd_package' ),
		'icon'        => 'icon-wpb-woocommerce',
		'params'      => array(
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Title", 'wd_package'),
				'description' 	=> esc_html__("Title", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'title',
				'value' 		=> '',
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Show Product Count', 'wd_package' ),
				'description' => __( '', 'wd_package' ),
				'param_name'  => 'show_product_count',
				'value'       => array(
					'Yes' 	=> '1',
					'No' 	=> '0',
				),
				'save_always' => true,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Show Sub Categories', 'wd_package' ),
				'description' => __( '', 'wd_package' ),
				'param_name'  => 'show_sub_cat',
				'value'       => array(
					'Yes' 	=> '1',
					'No' 	=> '0',
				),
				'save_always' => true,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Is Dropdown', 'wd_package' ),
				'description' => __( 'Enable this option to display the "View All Products" tab redirecting to the shop page.', 'wd_package' ),
				'param_name'  => 'is_dropdown',
				'value'       => array(
					'Yes' 	=> '1',
					'No' 	=> '0',
				),
				'save_always' => true,
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
				'value' 		=> tvlgiao_wpdance_get_order_by_values('product'),
				'std'			=> 'date',
				'description' 	=> '',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Number Categories", 'wd_package'),
				'description'	=> esc_html__("", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'number',
				'value' 		=> '-1',
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
		),
	) );
}
