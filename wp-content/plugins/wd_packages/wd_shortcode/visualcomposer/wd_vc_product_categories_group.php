<?php
if( tvlgiao_wpdance_is_woocommerce() ){
	$categories = tvlgiao_wpdance_vc_get_list_category('product_cat', false);
	vc_map( array(
		'name'        => __( "WD - Product Categories Group", 'wpdancelaparis' ),
		'description' => __( "Display product categories name with custom image", 'wpdancelaparis' ),
		'base'        => 'tvlgiao_wpdance_categories_group',
		'category'    => __( "WPDance Shortcode", 'wpdancelaparis' ),
		'icon'        => 'icon-wpb-woocommerce',
		'params'      => array(
			array(
				'type'       => 'param_group',
				'heading'    => __( 'Categories group', 'wpdancelaparis' ),
				'param_name' => 'categories_group',
				'params'     => array(
					array(
						'type'             => 'dropdown',
						'heading'          => __( 'Category', 'wpdancelaparis' ),
						'description'      => __( 'Product category list', 'wpdancelaparis' ),
						'param_name'       => 'id_category',
						'admin_label'      => true,
						'value'            => $categories,
						'edit_field_class' => 'vc_col-sm-8',
					),
					array(
						'type'             => 'attach_image',
						'heading'          => __( "Category Image", 'wpdancelaparis' ),
						"param_name"       => "image_category",
						'admin_label'      => true,
						'edit_field_class' => 'vc_col-sm-4',
					),

				),
			),
			array(
				"type"        => "dropdown",
				"class"       => "",
				"heading"     => __( "Is Slider", 'wpdancelaparis' ),
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
