<?php
if( tvlgiao_wpdance_is_woocommerce() ){
	vc_map( array(
		'name'        => __( "WD - Product Categories Accordion", 'wpdancelaparis' ),
		'description' => __( "Display product categories list with accordion", 'wpdancelaparis' ),
		'base'        => 'tvlgiao_wpdance_categories_accordion',
		'category'    => __( "WPDance Shortcode", 'wpdancelaparis' ),
		'icon'        => 'icon-wpb-woocommerce',
		'params'      => array(
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Title", 'wpdancelaparis'),
				'description' 	=> esc_html__("Title", 'wpdancelaparis'),
				'admin_label' 	=> true,
				'param_name' 	=> 'title',
				'value' 		=> '',
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Show Product Count', 'wpdancelaparis' ),
				'description' => __( '', 'wpdancelaparis' ),
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
				'heading'     => __( 'Show Sub Categories', 'wpdancelaparis' ),
				'description' => __( '', 'wpdancelaparis' ),
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
				'heading'     => __( 'Is Dropdown', 'wpdancelaparis' ),
				'description' => __( 'Enable this option to display the "View All Products" tab redirecting to the shop page.', 'wpdancelaparis' ),
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
				'heading' 		=> esc_html__( 'Sort By', 'wpdancelaparis' ),
				'param_name' 	=> 'sort',
				'admin_label' 	=> true,
				'value' 		=> tvlgiao_wpdance_get_sort_by_values(),
				'std'			=> 'DESC',
				'description' 	=> '',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Order By', 'wpdancelaparis' ),
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
				'heading' 		=> esc_html__("Number Categories", 'wpdancelaparis'),
				'description'	=> esc_html__("", 'wpdancelaparis'),
				'admin_label' 	=> true,
				'param_name' 	=> 'number',
				'value' 		=> '-1',
				'edit_field_class' => 'vc_col-sm-6',
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
		),
	) );
}
