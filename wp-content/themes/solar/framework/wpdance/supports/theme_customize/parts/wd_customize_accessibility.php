<?php
/*--------------------------------------------------------------*/
/*					 CUSTOM STYLING OPTION						*/
/*--------------------------------------------------------------*/
$wp_customize->add_panel( 'tvlgiao_wpdance_theme_option', array(
    'title' 			=> esc_html__( 'WD - Accessibility', 'solar' ),
    'description' 		=> esc_html__( '', 'solar'),
    'priority' 			=> 500,
));
	$wp_customize->add_section( 'tvlgiao_wpdance_breadcrumb_section' , array(
		'title'       		=> esc_html__( 'Breadcrumb Config', 'solar' ),
		'description' 		=> esc_html__( '', 'solar'),
		'panel'	 			=> 'tvlgiao_wpdance_theme_option',
		'priority'    		=> 5,
	));
	
$wp_customize->add_section( 'tvlgiao_wpdance_scroll_button_section' , array(
		'title'       		=> esc_html__( 'Back To Top Button', 'solar' ),
		'description' 		=> esc_html__( '', 'solar'),
		'panel'	 			=> 'tvlgiao_wpdance_theme_option',
		'priority'    		=> 10,
	));
	$wp_customize->add_section( 'tvlgiao_wpdance_effect_section' , array(
		'title'       		=> esc_html__( 'Visual Effects', 'solar' ),
		'description' 		=> esc_html__( '', 'solar'),
		'panel'	 			=> 'tvlgiao_wpdance_theme_option',
		'priority'    		=> 10,
	));
	$wp_customize->add_section( 'tvlgiao_wpdance_social_share_section' , array(
		'title'       		=> esc_html__( 'Social Share', 'solar' ),
		'description' 		=> esc_html__( '', 'solar'),
		'panel'	 			=> 'tvlgiao_wpdance_theme_option',
		'priority'    		=> 15,
	));
	
/*--------------------------------------------------------------*/
/*					 CONTENT CONFIG 							*/
/*--------------------------------------------------------------*/
$wp_customize->add_setting('tvlgiao_wpdance_breadcrumb', array(
	'default' 			=> 'breadcrumb_default',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
		'capability' 		=> 'edit_theme_options'		
));
	$wp_customize->add_control( new Theme_Slug_Custom_Radio_Image_Control($wp_customize,'tvlgiao_wpdance_breadcrumb',array(
	'label'          	=> esc_html__( 'Select the layout breadcrumb', 'solar' ),
	'section'        	=> 'tvlgiao_wpdance_breadcrumb_section',
	'settings'       	=> 'tvlgiao_wpdance_breadcrumb',
	'choices'			=> array(
		'breadcrumb_default' 	=> TVLGIAO_WPDANCE_THEME_IMAGES . '/breadcrumb/breadcrumb_default.jpg',
		'breadcrumb_banner'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/breadcrumb/breadcrumb_banner.jpg',
		'no_breadcrumb'			=> TVLGIAO_WPDANCE_THEME_IMAGES . '/breadcrumb/no_breadcrumb.jpg'
	)
)));

$wp_customize->add_setting( 'tvlgiao_wpdance_color_breadcrumb' , array(
	'default'           =>  "#f2f2f2",
	'sanitize_callback' => 'sanitize_hex_color',
	'transport'         => 'postMessage',
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tvlgiao_wpdance_color_breadcrumb' , array(
	'label'      		=>  esc_html__( 'Select Color Background', 'solar' ),
    'section'  			=> 'tvlgiao_wpdance_breadcrumb_section',
    'settings' 			=> 'tvlgiao_wpdance_color_breadcrumb',
)));


	$wp_customize->add_setting('tvlgiao_wpdance_banner_breadcrumb', array(
	'default'        	=> TVLGIAO_WPDANCE_THEME_IMAGES.'/banner_breadcrumb.jpg',
	'sanitize_callback' => 'esc_url_raw',
	'type' 				=> 'theme_mod'
));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tvlgiao_wpdance_banner_breadcrumb', array(
    'label'    			=> esc_html__( 'Banner Breadcrumb', 'solar' ),
    'section'  			=> 'tvlgiao_wpdance_breadcrumb_section',
    'settings' 			=> 'tvlgiao_wpdance_banner_breadcrumb',
)));

$wp_customize->add_setting('tvlgiao_wpdance_banner_breadcrumb_height',array(
	'default'           => '100',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_html'
));

$wp_customize->add_control('tvlgiao_wpdance_banner_breadcrumb_height_control',array(
	'label'         	=> esc_html__( 'Height', 'solar' ),
	'section'       	=> 'tvlgiao_wpdance_breadcrumb_section',
	'settings'      	=> 'tvlgiao_wpdance_banner_breadcrumb_height',
	'type'          	=> 'text',
	'description'   	=> esc_html__( 'Unit: pixels', 'solar' )
));



$wp_customize->add_setting( 'tvlgiao_wpdance_banner_breadcrumb_text_color' , array(
	'default'           =>  "#212121",
	'sanitize_callback' => 'sanitize_hex_color',
	'transport'         => 'postMessage',
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tvlgiao_wpdance_banner_breadcrumb_text_color' , array(
	'label'      		=>  esc_html__( 'Title & Slug Color', 'solar' ),
    'section'  			=> 'tvlgiao_wpdance_breadcrumb_section',
    'settings' 			=> 'tvlgiao_wpdance_banner_breadcrumb_text_color',
)));

$wp_customize->add_setting('tvlgiao_wpdance_banner_breadcrumb_text_style', array(
	'default'        	=> 'inline',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_banner_breadcrumb_text_style_control', array(
	'label'   			=> esc_html__('Title & Slug Style', 'solar'),
	'description' 		=> esc_html__('', 'solar'),
	'section'  			=> 'tvlgiao_wpdance_breadcrumb_section',
	'settings' 			=> 'tvlgiao_wpdance_banner_breadcrumb_text_style',
	'type'    			=> 'select',
	'choices' 			=> array(
		'inline'=> 'Inline',
        'block' => 'Block',
	)
));

$wp_customize->add_setting('tvlgiao_wpdance_banner_breadcrumb_text_align', array(
	'default'        	=> 'text-center',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_banner_breadcrumb_text_align_control', array(
	'label'   			=> esc_html__('Text Align', 'solar'),
	'description' 		=> esc_html__('', 'solar'),
	'section'  			=> 'tvlgiao_wpdance_breadcrumb_section',
	'settings' 			=> 'tvlgiao_wpdance_banner_breadcrumb_text_align',
	'type'    			=> 'select',
	'choices' 			=> array(
		'text-center'   => 'Center aligned text',
        'text-left'     => 'Left aligned text',
        'text-right'    => 'Right aligned text',
        'text-justify'  => 'Justified text',
	)
));


/* Back To Top Button */
$wp_customize->add_setting('tvlgiao_wpdance_back_to_top_button', array(
	'default'        	=> '0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_back_to_top_button_control', array(
	'label'   			=> esc_html__('Back To Top Button', 'solar'),
	'description' 		=> esc_html__('Enable/Disable scroll button in website', 'solar'),
	'section'  			=> 'tvlgiao_wpdance_scroll_button_section',
	'settings' 			=> 'tvlgiao_wpdance_back_to_top_button',
	'type'    			=> 'select',
	'choices' 			=> array(
		'0'		=> "Disable",	
		'1'		=> "Enable"
	)
));

$wp_customize->add_setting('tvlgiao_wpdance_back_to_top_button_style', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_back_to_top_button_style_control', array(
	'label'   			=> esc_html__('Select Style', 'solar'),
	'description' 		=> esc_html__('Enable/Disable scroll button in website', 'solar'),
	'section'  			=> 'tvlgiao_wpdance_scroll_button_section',
	'settings' 			=> 'tvlgiao_wpdance_back_to_top_button_style',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Icon Only",	
		'0'		=> "Icon & Background"
	)
));

$wp_customize->add_setting('tvlgiao_wpdance_back_to_top_button_icon', array(
	'default'        	=> 'el el-chevron-up',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_back_to_top_button_icon_control', array(
	'label'   			=> esc_html__('Select Icon', 'solar'),
	'description' 		=> esc_html__('', 'solar'),
	'section'  			=> 'tvlgiao_wpdance_scroll_button_section',
	'settings' 			=> 'tvlgiao_wpdance_back_to_top_button_icon',
	'type'    			=> 'select',
	'choices' 			=> array(
		'el el-circle-arrow-up'		=> "el-circle-arrow-up",	
		'el el-chevron-up'			=> "el-chevron-up",	
		'el el-caret-up'			=> "el-caret-up",	
		'el el-arrow-up'		=> "el-arrow-up ",	
	)
));
$wp_customize->add_setting( 'tvlgiao_wpdance_back_to_top_button_icon_color' , array(
	'default'           =>  "#000",
	'sanitize_callback' => 'sanitize_hex_color',
	'transport'         => 'postMessage',
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tvlgiao_wpdance_back_to_top_button_icon_color_control' , array(
	'label'      		=>  esc_html__( 'Icon Color', 'solar' ),
    'section'  			=> 'tvlgiao_wpdance_scroll_button_section',
    'settings' 			=> 'tvlgiao_wpdance_back_to_top_button_icon_color',
)));

$wp_customize->add_setting( 'tvlgiao_wpdance_back_to_top_button_background_color' , array(
	'default'           =>  "#fff",
	'sanitize_callback' => 'sanitize_hex_color',
	'transport'         => 'postMessage',
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tvlgiao_wpdance_back_to_top_button_background_color_control' , array(
	'label'      		=>  esc_html__( 'Background Color', 'solar' ),
    'section'  			=> 'tvlgiao_wpdance_scroll_button_section',
    'settings' 			=> 'tvlgiao_wpdance_back_to_top_button_background_color',
)));

$wp_customize->add_setting('tvlgiao_wpdance_back_to_top_button_background_shape', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_back_to_top_button_background_shape_control', array(
	'label'   			=> esc_html__('Background Shape', 'solar'),
	'description' 		=> esc_html__('', 'solar'),
	'section'  			=> 'tvlgiao_wpdance_scroll_button_section',
	'settings' 			=> 'tvlgiao_wpdance_back_to_top_button_background_shape',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'    => 'Rounded',
        '0'    => 'Square',
	)
));

/* Visual Effects */
$wp_customize->add_setting('tvlgiao_wpdance_loading_effect', array(
	'default'        	=> '0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control('tvlgiao_wpdance_loading_effect_control', array(
	'label'   			=> esc_html__('Loading Effect', 'solar'),
	'description' 		=> esc_html__('Enable/Disable loading effect in website.', 'solar'),
	'section'  			=> 'tvlgiao_wpdance_effect_section',
	'settings' 			=> 'tvlgiao_wpdance_loading_effect',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Enable",	
		'0'		=> "Disable"
	)
));

$wp_customize->add_setting('tvlgiao_wpdance_sidebar_fixed_effect', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control('tvlgiao_wpdance_sidebar_fixed_effect_control', array(
	'label'   			=> esc_html__('Sidebar Fixed', 'solar'),
	'description' 		=> esc_html__('Enable/Disable sidebar fixed effect in website.', 'solar'),
	'section'  			=> 'tvlgiao_wpdance_effect_section',
	'settings' 			=> 'tvlgiao_wpdance_sidebar_fixed_effect',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Enable",	
		'0'		=> "Disable"
	)
));

/* Social Share */
$wp_customize->add_setting('tvlgiao_wpdance_social_share', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control('tvlgiao_wpdance_social_share_control', array(
	'label'   			=> esc_html__('Display', 'solar'),
	'description' 		=> esc_html__('Enable/Disable all social share button in website.', 'solar'),
	'section'  			=> 'tvlgiao_wpdance_social_share_section',
	'settings' 			=> 'tvlgiao_wpdance_social_share',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Enable",	
		'0'		=> "Disable"
	)
));

$wp_customize->add_setting('tvlgiao_wpdance_social_share_pubid',array(
	'default'           => 'ra-547e8f2f2a326738',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_html'
));

$wp_customize->add_control('tvlgiao_wpdance_social_share_pubid_control',array(
	'label'         	=> esc_html__( 'Addthis Profile ID', 'solar' ),
	'section'       	=> 'tvlgiao_wpdance_social_share_section',
	'settings'      	=> 'tvlgiao_wpdance_social_share_pubid',
	'type'          	=> 'text',
	'description'   	=> esc_html__( '', 'solar' )
)); 

?>
