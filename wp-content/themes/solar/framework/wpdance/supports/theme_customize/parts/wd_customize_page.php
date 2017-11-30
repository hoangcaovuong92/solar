<?php
/*--------------------------------------------------------------*/
/*						 CUSTOM BLOG 	 						*/
/*--------------------------------------------------------------*/
$wp_customize->add_panel( 'tvlgiao_wpdance_page_config', array(
    'title' 			=> esc_html__( 'WD - Page Setting', 'laparis' ),
    'description' 		=> esc_html__( '', 'laparis'),
    'priority' 			=> 515,
));
	
	$wp_customize->add_section( 'tvlgiao_wpdance_default_page' , array(
		'title'       		=> esc_html__( 'Page Default', 'laparis' ),
		'description' 		=> esc_html__('Set properties for the default page template...', 'laparis'),
		'panel'	 			=> 'tvlgiao_wpdance_page_config',
		'priority'    		=> 30,
	));


	$wp_customize->add_section( 'tvlgiao_wpdance_page_404' , array(
		'title'       		=> esc_html__( 'Page 404 Config', 'laparis' ),
		'description' 		=> esc_html__( '', 'laparis'),
		'panel'	 			=> 'tvlgiao_wpdance_page_config',
		'priority'    		=> 40,
	));

	$wp_customize->add_section( 'tvlgiao_wpdance_page_search' , array(
		'title'       		=> esc_html__( 'Page Search Config', 'laparis' ),
		'description' 		=> esc_html__( '', 'laparis'),
		'panel'	 			=> 'tvlgiao_wpdance_page_config',
		'priority'    		=> 45,
	));

	

//Content Custom Page Default
$wp_customize->add_setting('tvlgiao_wpdance_default_page_layout', array(
	'default' 			=> '0-0-0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
		'capability' 		=> 'edit_theme_options'		
));
	$wp_customize->add_control( new Theme_Slug_Custom_Radio_Image_Control($wp_customize,'tvlgiao_wpdance_default_page_layout',array(
	'label'          	=> esc_html__( 'Select the layout', 'laparis' ),
	'section'        	=> 'tvlgiao_wpdance_default_page',
	'settings'       	=> 'tvlgiao_wpdance_default_page_layout',
	'choices'			=> array(
		'0-0-0' 	=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_fullwidth.png',
		'1-0-0'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_sidebar.png',
		'0-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_right_sidebar.png',
		'1-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_right.png'
	)
)));
$wp_customize->add_setting('tvlgiao_wpdance_default_page_sidebar_left', array(
	'default'        	=> $default,
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_defaule_page_left_sidebar_select_control', array(
	'label'   			=> 'Select left sidebar',
	'section'  			=> 'tvlgiao_wpdance_default_page',
	'settings' 			=> 'tvlgiao_wpdance_default_page_sidebar_left',
	'type'    			=> 'select',
	'choices' 			=> $arr_sidebar,
));
$wp_customize->add_setting('tvlgiao_wpdance_default_page_sidebar_right', array(
	'default'        	=> $default,
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_defaule_page_right_sidebar_select_control', array(
	'label'   			=> 'Select right sidebar',
	'section'  			=> 'tvlgiao_wpdance_default_page',
	'settings' 			=> 'tvlgiao_wpdance_default_page_sidebar_right',
	'type'    			=> 'select',
	'choices' 			=> $arr_sidebar,
));


/*Page 404*/
$wp_customize->add_setting('tvlgiao_wpdance_page_404_select_style', array(
	'default'        	=> 'bg_color',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_page_404_select_style_control', array(
	'label'   			=> esc_html__( 'Background Image Or Color', 'laparis' ),
	'section'  			=> 'tvlgiao_wpdance_page_404',
	'settings' 			=> 'tvlgiao_wpdance_page_404_select_style',
	'type'    			=> 'select',
	'choices' 			=> array(
		'bg_image'			=> esc_html__( 'Background Image', 'laparis' ),
		'bg_color'			=> esc_html__( 'Background Color', 'laparis' ),
	)
));
$wp_customize->add_setting( 'tvlgiao_wpdance_page_404_bg_color' , array(
	'default'           =>  "#fff",
	'sanitize_callback' => 'sanitize_hex_color',
	'transport'         => 'postMessage',
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tvlgiao_wpdance_page_404_bg_color' , array(
	'label'      		=>  esc_html__( 'Select Color Background', 'laparis' ),
    'section'  			=> 'tvlgiao_wpdance_page_404',
    'settings' 			=> 'tvlgiao_wpdance_page_404_bg_color',
)));
	$wp_customize->add_setting('tvlgiao_wpdance_page_404_bg_image', array(
	'default'        	=> TVLGIAO_WPDANCE_THEME_IMAGES.'/bg_404.jpg',
	'sanitize_callback' => 'esc_url_raw',
	'type' 				=> 'theme_mod'
));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tvlgiao_wpdance_page_404_bg_image', array(
    'label'    			=> esc_html__('Select Background Image', 'laparis' ),
    'section'  			=> 'tvlgiao_wpdance_page_404',
    'settings' 			=> 'tvlgiao_wpdance_page_404_bg_image',
)));

$wp_customize->add_setting('tvlgiao_wpdance_page_404_show_header_footer', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_page_404_show_header_footer_control', array(
	'label'   			=> esc_html__( 'Header & Footer', 'laparis' ),
	'section'  			=> 'tvlgiao_wpdance_page_404',
	'settings' 			=> 'tvlgiao_wpdance_page_404_show_header_footer',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'			=> esc_html__( 'Show', 'laparis' ),
		'0'			=> esc_html__( 'Hide', 'laparis' ),
	)
));

$wp_customize->add_setting('tvlgiao_wpdance_page_404_show_search_form', array(
	'default'        	=> '0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_page_404_show_search_form_control', array(
	'label'   			=> esc_html__( 'Search Form', 'laparis' ),
	'description' 		=> esc_html__( 'Show/Hide Search Form', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_page_404',
	'settings' 			=> 'tvlgiao_wpdance_page_404_show_search_form',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Show",	
		'0'		=> "Hide"
	)
)); 

$wp_customize->add_setting('tvlgiao_wpdance_page_404_show_back_to_home_button', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));

$wp_customize->add_control( 'tvlgiao_wpdance_page_404_show_back_to_home_button_control', array(
	'label'   			=> esc_html__( 'Back To Home Button', 'laparis' ),
	'description' 		=> esc_html__( 'Show/Hide Back To Home Button', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_page_404',
	'settings' 			=> 'tvlgiao_wpdance_page_404_show_back_to_home_button',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Show",	
		'0'		=> "Hide"
	)
)); 

$wp_customize->add_setting('tvlgiao_wpdance_page_404_back_to_home_button_text',array(
	'default'           =>  esc_html__( 'Back To Homepage', 'laparis' ),
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_html'
));

$wp_customize->add_control('tvlgiao_wpdance_page_404_back_to_home_button_text_control',array(
	'label'         	=> esc_html__( 'Text Button', 'laparis' ),
	'section'       	=> 'tvlgiao_wpdance_page_404',
	'settings'      	=> 'tvlgiao_wpdance_page_404_back_to_home_button_text',
	'type'          	=> 'text',
	'description'   	=> esc_html__( '', 'laparis' )
));

$wp_customize->add_setting('tvlgiao_wpdance_page_404_back_to_home_button_class',array(
	'default'           =>  esc_html__( '', 'laparis' ),
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_html'
));

$wp_customize->add_control('tvlgiao_wpdance_page_404_back_to_home_button_class_control',array(
	'label'         	=> esc_html__( 'Class Button', 'laparis' ),
	'section'       	=> 'tvlgiao_wpdance_page_404',
	'settings'      	=> 'tvlgiao_wpdance_page_404_back_to_home_button_class',
	'type'          	=> 'text',
	'description'   	=> esc_html__( '', 'laparis' )
));

$wp_customize->add_setting('tvlgiao_wpdance_page_404_shortcode',array(
	'default'           => '',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_html'
));

$wp_customize->add_control('tvlgiao_wpdance_page_404_shortcode_control',array(
	'label'         	=> esc_html__( 'Shortcode Cart', 'laparis' ),
	'settings'      	=> 'tvlgiao_wpdance_page_404_shortcode',
	'section'       	=> 'tvlgiao_wpdance_page_404',
	'type'          	=> 'textarea',
	'description'   	=> esc_html__( '', 'laparis' )
));	

/*Page Search*/
$wp_customize->add_setting('tvlgiao_wpdance_page_search_layout', array(
	'default' 			=> '0-0-0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
		'capability' 		=> 'edit_theme_options'		
));
	$wp_customize->add_control( new Theme_Slug_Custom_Radio_Image_Control($wp_customize,'tvlgiao_wpdance_page_search_layout',array(
	'label'          	=> esc_html__( 'Select the layout', 'laparis' ),
	'section'        	=> 'tvlgiao_wpdance_page_search',
	'settings'       	=> 'tvlgiao_wpdance_page_search_layout',
	'choices'			=> array(
		'0-0-0' 	=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_fullwidth.png',
		'1-0-0'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_sidebar.png',
		'0-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_right_sidebar.png',
		'1-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_right.png'
	)
)));
$wp_customize->add_setting('tvlgiao_wpdance_page_search_sidebar_left', array(
	'default'        	=> $default,
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_page_search_sidebar_left_control', array(
	'label'   			=> 'Select left sidebar',
	'section'  			=> 'tvlgiao_wpdance_page_search',
	'settings' 			=> 'tvlgiao_wpdance_page_search_sidebar_left',
	'type'    			=> 'select',
	'choices' 			=> $arr_sidebar,
));
$wp_customize->add_setting('tvlgiao_wpdance_page_search_sidebar_right', array(
	'default'        	=> $default,
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_page_search_sidebar_right_control', array(
	'label'   			=> 'Select right sidebar',
	'section'  			=> 'tvlgiao_wpdance_page_search',
	'settings' 			=> 'tvlgiao_wpdance_page_search_sidebar_right',
	'type'    			=> 'select',
	'choices' 			=> $arr_sidebar,
));
$wp_customize->add_setting('tvlgiao_wpdance_page_search_select_style', array(
	'default'        	=> 'bg_color',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_page_search_select_style_control', array(
	'label'   			=> esc_html__( 'Background Image Or Color', 'laparis' ),
	'section'  			=> 'tvlgiao_wpdance_page_search',
	'settings' 			=> 'tvlgiao_wpdance_page_search_select_style',
	'type'    			=> 'select',
	'choices' 			=> array(
		'bg_image'			=> esc_html__( 'Background Image', 'laparis' ),
		'bg_color'			=> esc_html__( 'Background Color', 'laparis' ),
	)
));
$wp_customize->add_setting( 'tvlgiao_wpdance_page_search_bg_color' , array(
	'default'           =>  "#fff",
	'sanitize_callback' => 'sanitize_hex_color',
	'transport'         => 'postMessage',
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tvlgiao_wpdance_page_search_bg_color' , array(
	'label'      		=>  esc_html__( 'Select Color Background', 'laparis' ),
    'section'  			=> 'tvlgiao_wpdance_page_search',
    'settings' 			=> 'tvlgiao_wpdance_page_search_bg_color',
)));
	$wp_customize->add_setting('tvlgiao_wpdance_page_search_bg_image', array(
	'default'        	=> TVLGIAO_WPDANCE_THEME_IMAGES.'/bg_404.jpg',
	'sanitize_callback' => 'esc_url_raw',
	'type' 				=> 'theme_mod'
));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tvlgiao_wpdance_page_search_bg_image', array(
    'label'    			=> esc_html__('Select Background Image', 'laparis' ),
    'section'  			=> 'tvlgiao_wpdance_page_search',
    'settings' 			=> 'tvlgiao_wpdance_page_search_bg_image',
)));

$wp_customize->add_setting('tvlgiao_wpdance_page_search_select_type', array(
	'default'        	=> 'post',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_page_search_select_type_control', array(
	'label'   			=> esc_html__( 'Type', 'laparis' ),
	'section'  			=> 'tvlgiao_wpdance_page_search',
	'settings' 			=> 'tvlgiao_wpdance_page_search_select_type',
	'type'    			=> 'select',
	'choices' 			=> array(
        'post'          	=> esc_html__( 'Search Blog', 'laparis' ),
        'product'          	=> esc_html__( 'Search Product', 'laparis' ),
    )
));

$wp_customize->add_setting('tvlgiao_wpdance_page_search_select_columns', array(
	'default'        	=> '2',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_page_search_select_columns_control', array(
	'label'   			=> esc_html__( 'Result Columns', 'laparis' ),
	'section'  			=> 'tvlgiao_wpdance_page_search',
	'settings' 			=> 'tvlgiao_wpdance_page_search_select_columns',
	'type'    			=> 'select',
	'choices' 			=> array(
        '1'          	=> esc_html__( '1 Column', 'laparis' ),
        '2'          	=> esc_html__( '2 Columns', 'laparis' ),
        '3'          	=> esc_html__( '3 Columns', 'laparis' ),
        '4'          	=> esc_html__( '4 Columns', 'laparis' ),
    ),
    'description'   	=> esc_html__( 'Set columns for blog search page.', 'laparis' )
));

$wp_customize->add_setting('tvlgiao_wpdance_page_search_autocomplete', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_page_search_autocomplete_control', array(
	'label'   			=> esc_html__( 'Autocomplete', 'laparis' ),
	'section'  			=> 'tvlgiao_wpdance_page_search',
	'settings' 			=> 'tvlgiao_wpdance_page_search_autocomplete',
	'type'    			=> 'select',
	'choices' 			=> array(
        '1'          	=> esc_html__( 'Enable', 'laparis' ),
        '0'          	=> esc_html__( 'Disabled', 'laparis' ),
    )
));
$wp_customize->add_setting('tvlgiao_wpdance_page_search_ajax', array(
	'default'        	=> '0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_page_search_ajax_control', array(
	'label'   			=> esc_html__( 'Ajax', 'laparis' ),
	'section'  			=> 'tvlgiao_wpdance_page_search',
	'settings' 			=> 'tvlgiao_wpdance_page_search_ajax',
	'type'    			=> 'select',
	'choices' 			=> array(
        '1'          	=> esc_html__( 'Enable', 'laparis' ),
        '0'          	=> esc_html__( 'Disabled', 'laparis' ),
    )
));
?>