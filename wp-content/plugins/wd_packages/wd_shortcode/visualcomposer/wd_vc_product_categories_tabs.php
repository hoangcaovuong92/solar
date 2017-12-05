<?php
if( tvlgiao_wpdance_is_woocommerce() ){
	$categories  = tvlgiao_wpdance_vc_get_list_category('product_cat', false, 'sorted_list');
	vc_map( array(
		'name'        => __( "WD - Products by Category Tabs", 'wd_package' ),
		'description' => __( "Products by Category Tabs", 'wd_package' ),
		'base'        => 'tvlgiao_wpdance_products_by_category_tabs',
		"category"    => esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        => 'icon-wpb-woocommerce',
		'params'      => array(
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Select Type', 'wd_package' ),
				'param_name'  => 'type',
				'admin_label' => true,
				'value'       => array(
					__( 'Special Products', 'wd_package' )      => 'special',
					__( 'Single Category', 'wd_package' ) 		=> 'single_category',
					__( 'Categories', 'wd_package' )      		=> 'categories',
				),
				'description' => __( 'Select Type and customize attributes in tab Category Settings', 'wd_package' ),
			),
			/*-----------------------------------------------------------------------------------
			    Special Products
			-------------------------------------------------------------------------------------*/
			// Select a Category
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Category', 'wd_package' ),
				'description' => __( '', 'wd_package' ),
				'param_name'  => 'id_event',
				'admin_label' => true,
				'value'       => $categories,
				'dependency'  => array('element' => 'type', 'value'   => array( 'special' )),
			),
			// Show Event
			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Show Event', 'wd_package' ),
				'param_name' => 'show_event',
				'value'      => array(
					__( 'Bestselling', 'wd_package' )  => 'bestselling',
					__( 'Featured', 'wd_package' )     => 'featured',
					__( 'New Arrivals', 'wd_package' ) => 'new_arrivals',
					__( 'Top Reviewed', 'wd_package' ) => 'top_reviewed',
				),
				'std'        => 'bestselling',
				'dependency' => array('element' => 'type','value'   => array( 'special' )),
			),
			/*-----------------------------------------------------------------------------------
				Single Category
			-------------------------------------------------------------------------------------*/
			// Select a Category
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Category', 'wd_package' ),
				'description' => __( 'Select a category', 'wd_package' ),
				'param_name'  => 'id_single',
				'admin_label' => true,
				'value'       => $categories,
				'dependency'  => array('element' => 'type', 'value'   => array( 'single_category' )),
			),
			/*-----------------------------------------------------------------------------------
				Categories
			-------------------------------------------------------------------------------------*/
			array(
				'type'        => 'textfield',
				'class'       => '',
				'heading'     => __( "Title", 'wd_package' ),
				'description' => __( "Leave blank to hide title", 'wd_package' ),
				'admin_label' => true,
				'param_name'  => 'title',
				'value'       => __( 'Categories', 'wd_package' ),
				'dependency'  => array('element' => 'type', 'value'   => array( 'categories' )),
			),
			array(
				'type' 			=> 'sorted_list',
				'heading' 		=> __( 'Categories', 'wd_package' ),
				'param_name' 	=> 'ids',
				'description' 	=> __( 'Select and sort product categories. Leave blank if you want to display all product category', 'wd_package' ),
				'value' 		=> '-1',
				'options' 		=> $categories,
				'dependency'  	=> array('element' => 'type', 'value'   => array( 'categories' )),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Style Tabs', 'wd_package' ),
				'description' => __( 'Style of product categories tabs', 'wd_package' ),
				'param_name'  => 'style_tab',
				'value'       => array(
					'Tabs Menu On Top Content' 	=> 'tab-on-top-content',
					'Tabs Menu On Left Content' => 'tab-on-left-content',
				),
				'save_always' => true,
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  => array('element' => 'type', 'value'   => array( 'categories' )),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'View All Products Tab', 'wd_package' ),
				'description' => __( 'Enable this option to display the "View All Products" tab redirecting to the shop page.', 'wd_package' ),
				'param_name'  => 'view_all_tab',
				'value'       => array(
					'Show' 	=> '1',
					'Hide' 	=> '0',
				),
				'save_always' => true,
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  => array('element' => 'type', 'value'   => array( 'categories' )),
			),
			/*-----------------------------------------------------------------------------------
				Global
			-------------------------------------------------------------------------------------*/
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Columns', 'wd_package' ),
				'param_name' 	=> 'columns',
				'admin_label' 	=> true,
				'value' 		=> tvlgiao_wpdance_vc_get_list_tvgiao_columns(),
				'std' 			=> 4,
				'save_always' 	=> true,
				'description' 	=> esc_html__( '', 'wd_package' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'textfield',
				'class'       => '',
				'heading'     => __( "Posts Per Page", 'wd_package' ),
				'description' => __( "Number products on one tab...", 'wd_package' ),
				'admin_label' => true,
				'param_name'  => 'posts_per_page',
				'value'       => 8,
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
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Is Slider", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "is_slider",
				"value" => array(
						'No' 		=> '0',
						'Yes' 		=> '1',
					),
				"description" 	=> "",
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Mansory Layout", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "mansory_layout",
				"value" => array(
						'No' 		=> '0',
						'Yes' 		=> '1',
					),
				'std'			=> '0',
				"description" 	=> "",
				'dependency'  	=> Array('element' => "is_slider", 'value' => array('0'))
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Mansory Image Size", 'wd_package'),
				'description' 	=> esc_html__("", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'mansory_image_size',
				'value' 		=> '1:1, 2:2, 1:1, 1:1, 1:1, 1:1, 1:1, 1:1, 1:1, 2:2, 1:1, 1:1, 1:1, 1:1, 1:1, 1:1, 1:1, 1:1, 2:2',
				'dependency'  	=> Array('element' => "mansory_layout", 'value' => array('1'))
			),

			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Category Thumbnail", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_category_thumb",
				"value" => array(
					'No' 		=> '0',
					'Yes' 		=> '1',
				),
				"description" 	=> "",
				'dependency'  	=> Array('element' => "is_slider", 'value' => array('0'))
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Nav", 'wd_package'),
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
				"heading" 		=> esc_html__("Auto Play", 'wd_package'),
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
				'heading' 		=> esc_html__("Number Rows", 'wd_package'),
				'description' 	=> esc_html__("", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'per_slide',
				'value' 		=> '1',
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'  	=> Array('element' => "is_slider", 'value' => array('1'))
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
}