<?php
/*--------------------------------------------------------------*/
/*						 CUSTOM FOOTER	 						*/
/*--------------------------------------------------------------*/
$wp_customize->add_section( 'tvlgiao_wpdance_footer_config' , array(
		'title'       		=> esc_html__( 'WD - Footer', 'laparis' ),
		'description' 		=> 'Custom footer site.',
		'priority'    		=> 510,
	));
/*--------------------------------------------------------------*/
/*						 CONTENT CONFIG FOOTER 					*/
/*--------------------------------------------------------------*/


// Layout Footer
	$wp_customize->add_setting('tvlgiao_wpdance_footer_layout', array(
	'default' 			=> -1,
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
		'capability' 		=> 'edit_theme_options'		
));
	$wp_customize->add_control( new Theme_Slug_Custom_Radio_Image_Control($wp_customize,'tvlgiao_wpdance_footer_layout',array(
	'label'          	=> esc_html__( 'Select the layout', 'laparis' ),
	'section'        	=> 'tvlgiao_wpdance_footer_config',
	'settings'       	=> 'tvlgiao_wpdance_footer_layout',
	'choices'			=> tvlgiao_wpdance_get_html_block_layout_choices('wpdance_footer',TVLGIAO_WPDANCE_THEME_IMAGES.'/footers/wd_footer_default.jpg','url_image')
)));


	// Text Copyright 
$wp_customize->add_setting('tvlgiao_wpdance_footer_copyright_text',array(
	'default'           => sprintf(__( 'Copyright %s. All rights reserved.', 'laparis' ), esc_html( get_bloginfo('name')) ),
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_html'
));

$wp_customize->add_control('tvlgiao_wpdance_footer_copyright_text_control',array(
	'label'         	=> esc_html__( 'Footer copyright text', 'laparis' ),
	'section'       	=> 'tvlgiao_wpdance_footer_config',
	'settings'      	=> 'tvlgiao_wpdance_footer_copyright_text',
	'type'          	=> 'textarea',
	'description'   	=> esc_html__( 'Copyright or other text to be displayed in the site footer. HTML allowed.', 'laparis' )
));

$wp_customize->add_setting('tvlgiao_wpdance_footer_logo_url', array(
	'default'        	=> $wd_default_data['general']['default']['logo-footer'],
	'sanitize_callback' => 'esc_url_raw',
	'type' 				=> 'theme_mod'
));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tvlgiao_wpdance_footer_logo_url', array(
    'label'    			=> esc_html__( 'Logo', 'laparis' ),
    'section'  			=> 'tvlgiao_wpdance_footer_config',
    'settings' 			=> 'tvlgiao_wpdance_footer_logo_url',
    'description'   	=> esc_html__( 'Footer logo is only visible to the default footer template.', 'laparis' )
)));

?>