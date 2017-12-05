<?php
/*--------------------------------------------------------------*/
/*						 CUSTOM HEADER 							*/
/*--------------------------------------------------------------*/
$wp_customize->add_section( 'tvlgiao_wpdance_header_config' , array(
		'title'       		=> esc_html__( 'WD - Header', 'solar' ),
		'description' 		=> esc_html__( 'Custom header site.' , 'solar' ),
		'priority'    		=> 505,
	));
	//---------------------------------------------------------------//

	//Content Config Header


$wp_customize->add_setting('tvlgiao_wpdance_header_layout', array(
	'default' 			=> -1,
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
		'capability' 		=> 'edit_theme_options'		
));
	$wp_customize->add_control( new Theme_Slug_Custom_Radio_Image_Control($wp_customize,'tvlgiao_wpdance_header_layout',array(
	'label'          	=> esc_html__( 'Select the layout', 'solar' ),
	'section'        	=> 'tvlgiao_wpdance_header_config',
	'settings'       	=> 'tvlgiao_wpdance_header_layout',
	'choices'			=> tvlgiao_wpdance_get_html_block_layout_choices('wpdance_header',TVLGIAO_WPDANCE_THEME_IMAGES . '/headers/wd_header_default.jpg','url_image')
)));

// Show Logo / Title
$wp_customize->add_setting('tvlgiao_wpdance_header_show_logo_title', array(
	'default'        	=> '0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_header_show_logo_title_control', array(
	'label'   			=> 'Logo/Title',
	'section'  			=> 'tvlgiao_wpdance_header_config',
	'settings' 			=> 'tvlgiao_wpdance_header_show_logo_title',
	'description'   	=> esc_html__( 'This setting is only visible to the default header template.', 'solar' ),
	'type'    			=> 'select',
	'choices' 			=> array(
		'0'				=> "Show Logo",
		'1'				=> "Show Site Title",
	)
));

$wp_customize->add_setting('tvlgiao_wpdance_header_favicon', array(
	'default'        	=> TVLGIAO_WPDANCE_THEME_IMAGES.'/wpdance_logo.png',
	'sanitize_callback' => 'esc_url_raw',
	'type' 				=> 'theme_mod'
));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tvlgiao_wpdance_header_favicon', array(
    'label'    			=> esc_html__( 'Favicon', 'solar' ),
    'section'  			=> 'tvlgiao_wpdance_header_config',
    'settings' 			=> 'tvlgiao_wpdance_header_favicon',
    'description'   	=> esc_html__( 'Favicon is the little icon that browsers display next to a page\'s title on a browser tab, or in the address bar next to its URL.', 'solar' ),
)));

	$wp_customize->add_setting('tvlgiao_wpdance_header_logo_url', array(
	'default'        	=> TVLGIAO_WPDANCE_THEME_IMAGES.'/wpdance_logo.png',
	'sanitize_callback' => 'esc_url_raw',
	'type' 				=> 'theme_mod'
));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tvlgiao_wpdance_header_logo_url', array(
    'label'    			=> esc_html__( 'Logo', 'solar' ),
    'section'  			=> 'tvlgiao_wpdance_header_config',
    'settings' 			=> 'tvlgiao_wpdance_header_logo_url',
    'description'   	=> esc_html__( 'Header logo is only visible to the default header template.', 'solar' ),
)));

// Show Logo / Title
$wp_customize->add_setting('tvlgiao_wpdance_header_menu_location', array(
	'default'        	=> 'primary',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_header_menu_location_control', array(
	'label'   			=> 'Select Menu Locations',
	'section'  			=> 'tvlgiao_wpdance_header_config',
	'settings' 			=> 'tvlgiao_wpdance_header_menu_location',
	'description'   	=> esc_html__( 'This setting is only visible to the default header template.', 'solar' ),
	'type'    			=> 'select',
	'choices' 			=> array(
		'primary' 			=> esc_html__('Primary Menu', 'solar'),
        'primary_right' 	=> esc_html__('Secondary Menu', 'solar'),
        'primary_mobile' 	=> esc_html__('Mobile Menu', 'solar'),
	)
)); 
?>