<?php
if( tvlgiao_wpdance_is_woocommerce() ){
	$categories = tvlgiao_wpdance_vc_get_list_category('product_cat', false);
	vc_map( array(
		'name'        => __( "WD - Product Categories Group", 'wd_package' ),
		'description' => __( "Display product categories name with custom image", 'wd_package' ),
		'base'        => 'tvlgiao_wpdance_categories_group',
		'category'    => __( "WPDance Shortcode", 'wd_package' ),
		'icon'        => 'icon-wpb-woocommerce',
		'params'      => array(
			array(
				'type'       => 'param_group',
				'heading'    => __( 'Categories group', 'wd_package' ),
				'param_name' => 'categories_group',
				'params'     => array(
					array(
						'type'             => 'dropdown',
						'heading'          => __( 'Category', 'wd_package' ),
						'description'      => __( 'Product category list', 'wd_package' ),
						'param_name'       => 'id_category',
						'admin_label'      => true,
						'value'            => $categories,
						'edit_field_class' => 'vc_col-sm-8',
					),
					array(
						'type'             => 'attach_image',
						'heading'          => __( "Category Image", 'wd_package' ),
						"param_name"       => "image_category",
						'admin_label'      => true,
						'edit_field_class' => 'vc_col-sm-4',
					),

				),
			),
			array(
				"type"        => "dropdown",
				"class"       => "",
				"heading"     => __( "Is Slider", 'wd_package' ),
				"admin_label" => true,
				"param_name"  => "is_slider",
				"value"       => array(
					'No'  => '0',
					'Yes' => '1',
				),
			),
		),
	) );
}
