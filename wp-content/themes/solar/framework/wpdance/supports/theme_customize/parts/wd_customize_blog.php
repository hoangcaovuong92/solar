<?php
/*--------------------------------------------------------------*/
/*						 CUSTOM BLOG 	 						*/
/*--------------------------------------------------------------*/
$wp_customize->add_panel( 'tvlgiao_wpdance_blog_config', array(
    'title' 			=> esc_html__( 'WD - Blog Setting', 'laparis' ),
    'description' 		=> esc_html__( '', 'laparis'),
    'priority' 			=> 515,
));
$wp_customize->add_section( 'tvlgiao_wpdance_genneral_blog' , array(
	'title'       		=> esc_html__( 'Blog Config', 'laparis' ),
	'description' 		=> esc_html__('', 'laparis') ,
	'panel'	 			=> 'tvlgiao_wpdance_blog_config',
	'priority'    		=> 5,
));

$wp_customize->add_section( 'tvlgiao_wpdance_default_blog' , array(
	'title'       		=> esc_html__( 'Blog Default', 'laparis' ),
	'description' 		=> esc_html__('Set properties for the default blog...', 'laparis'),
	'panel'	 			=> 'tvlgiao_wpdance_blog_config',
	'priority'    		=> 10,
));

$wp_customize->add_section( 'tvlgiao_wpdance_archive_blog' , array(
	'title'       		=> esc_html__( 'Archive Blog', 'laparis' ),
	'description' 		=> esc_html__('', 'laparis'),
	'panel'	 			=> 'tvlgiao_wpdance_blog_config',
	'priority'    		=> 20,
));
$wp_customize->add_section( 'tvlgiao_wpdance_single_blog' , array(
	'title'       		=> esc_html__( 'Single Blog', 'laparis' ),
	'description' 		=> esc_html__('', 'laparis') ,
	'panel'	 			=> 'tvlgiao_wpdance_blog_config',
	'priority'    		=> 25,
));

//---------------------------------------------------------------//
//						Genneral Blog Config 					 //
$wp_customize->add_setting('tvlgiao_wpdance_genneral_blog_show_title', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_genneral_blog_show_title_control', array(
	'label'   			=> esc_html__( 'Show Title Blog', 'laparis' ),
	'description' 		=> esc_html__( 'Show/Hide title blog', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_genneral_blog',
	'settings' 			=> 'tvlgiao_wpdance_genneral_blog_show_title',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Show",	
		'0'		=> "Hide"
	)
)); 
$wp_customize->add_setting('tvlgiao_wpdance_genneral_blog_show_thumbnail', array(
	'default'        	=> '0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_genneral_blog_show_thumbnail_control', array(
	'label'   			=> esc_html__( 'Placeholder Image', 'laparis' ),
	'description' 		=> esc_html__( 'Placeholder image display when post no thumbnail', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_genneral_blog',
	'settings' 			=> 'tvlgiao_wpdance_genneral_blog_show_thumbnail',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Show",	
		'0'		=> "Hide"
	)
));

$wp_customize->add_setting('tvlgiao_wpdance_genneral_blog_show_by_post_format', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_genneral_blog_show_by_post_format_control', array(
	'label'   			=> esc_html__( 'Show By Post Format', 'laparis' ),
	'description' 		=> esc_html__( 'Enable to display posts by post format (video, audio, quote, gallery ...)', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_genneral_blog',
	'settings' 			=> 'tvlgiao_wpdance_genneral_blog_show_by_post_format',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Enable",	
		'0'		=> "Disable"
	)
));

$wp_customize->add_setting('tvlgiao_wpdance_genneral_blog_show_placeholder_image', array(
	'default'        	=> '0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_genneral_blog_show_placeholder_image_control', array(
	'label'   			=> esc_html__( 'Show placeholder_image Blog', 'laparis' ),
	'description' 		=> esc_html__( 'Show/Hide placeholder_image blog', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_genneral_blog',
	'settings' 			=> 'tvlgiao_wpdance_genneral_blog_show_placeholder_image',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Enable",	
		'0'		=> "Disable"
	)
));

$wp_customize->add_setting('tvlgiao_wpdance_genneral_blog_show_date', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_genneral_blog_show_date_control', array(
	'label'   			=> esc_html__( 'Show Date Blog', 'laparis' ),
	'description' 		=> esc_html__( 'Show/Hide date blog', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_genneral_blog',
	'settings' 			=> 'tvlgiao_wpdance_genneral_blog_show_date',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Show",	
		'0'		=> "Hide"
	)
));

$wp_customize->add_setting('tvlgiao_wpdance_genneral_blog_show_meta', array(
	'default'        	=> '0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_genneral_blog_show_meta_control', array(
	'label'   			=> esc_html__( 'Show Meta Blog', 'laparis' ),
	'description' 		=> esc_html__( 'show author, category or number facebook comment...', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_genneral_blog',
	'settings' 			=> 'tvlgiao_wpdance_genneral_blog_show_meta',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Show",	
		'0'		=> "Hide"
	)
));

$wp_customize->add_setting('tvlgiao_wpdance_genneral_blog_show_author', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_genneral_blog_show_author_control', array(
	'label'   			=> esc_html__( 'Show Author Blog', 'laparis' ),
	'description' 		=> esc_html__( 'Show/Hide author blog', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_genneral_blog',
	'settings' 			=> 'tvlgiao_wpdance_genneral_blog_show_author',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Show",	
		'0'		=> "Hide"
	)
)); 

$wp_customize->add_setting('tvlgiao_wpdance_genneral_blog_show_category', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_genneral_blog_show_category_control', array(
	'label'   			=> esc_html__( 'Show Category Blog', 'laparis' ),
	'description' 		=> esc_html__( 'Show/Hide category blog', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_genneral_blog',
	'settings' 			=> 'tvlgiao_wpdance_genneral_blog_show_category',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Show",	
		'0'		=> "Hide"
	)
));  

$wp_customize->add_setting('tvlgiao_wpdance_genneral_blog_show_number_comment', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_genneral_blog_show_number_comment_control', array(
	'label'   			=> esc_html__( 'Show Number Comment', 'laparis' ),
	'description' 		=> esc_html__( 'Show/Hide Number Comment', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_genneral_blog',
	'settings' 			=> 'tvlgiao_wpdance_genneral_blog_show_number_comment',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Show",	
		'0'		=> "Hide"
	)
)); 

$wp_customize->add_setting('tvlgiao_wpdance_genneral_blog_show_tag', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_genneral_blog_show_tag_control', array(
	'label'   			=> esc_html__( 'Show Tags', 'laparis' ),
	'description' 		=> esc_html__( 'Show/Hide Tags', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_genneral_blog',
	'settings' 			=> 'tvlgiao_wpdance_genneral_blog_show_tag',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Show",	
		'0'		=> "Hide"
	)
)); 

$wp_customize->add_setting('tvlgiao_wpdance_genneral_blog_show_excerpt', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_genneral_blog_show_excerpt_control', array(
	'label'   			=> esc_html__( 'Show Excerpt Blog', 'laparis' ),
	'description' 		=> esc_html__( 'Show/Hide excerpt blog', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_genneral_blog',
	'settings' 			=> 'tvlgiao_wpdance_genneral_blog_show_excerpt',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Show",	
		'0'		=> "Hide"
	)
)); 
$wp_customize->add_setting('tvlgiao_wpdance_genneral_blog_show_read_more', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_genneral_blog_show_read_more_control', array(
	'label'   			=> esc_html__( 'Show Read More Blog', 'laparis' ),
	'description' 		=> esc_html__( 'Show/Hide read more blog', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_genneral_blog',
	'settings' 			=> 'tvlgiao_wpdance_genneral_blog_show_read_more',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Show",	
		'0'		=> "Hide"
	)
));   			

$wp_customize->add_setting('tvlgiao_wpdance_genneral_blog_number_excerpt',array(
	'default'           => '20',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_html'
));

$wp_customize->add_control('tvlgiao_wpdance_genneral_blog_number_excerpt_control',array(
	'label'         	=> esc_html__( 'Number Excerpt Word', 'laparis' ),
	'settings'      	=> 'tvlgiao_wpdance_genneral_blog_number_excerpt',
	'section'       	=> 'tvlgiao_wpdance_genneral_blog',
	'type'          	=> 'textarea',
	'description'   	=> esc_html__( '', 'laparis' )
));
//---------------------------------------------------------------//
//Content Custom Single Blog
$wp_customize->add_setting('tvlgiao_wpdance_single_blog_layout', array(
	'default' 			=> '0-0-0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'		
));
$wp_customize->add_control( new Theme_Slug_Custom_Radio_Image_Control($wp_customize,'tvlgiao_wpdance_single_blog_layout',array(
	'label'          	=> esc_html__( 'Select the layout', 'laparis' ),
	'section'        	=> 'tvlgiao_wpdance_single_blog',
	'settings'       	=> 'tvlgiao_wpdance_single_blog_layout',
	'choices'			=> array(
		'0-0-0' 	=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_fullwidth.png',
		'1-0-0'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_sidebar.png',
		'0-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_right_sidebar.png',
		'1-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_right.png'
	)
)));
$wp_customize->add_setting('tvlgiao_wpdance_single_blog_sidebar_left', array(
	'default'        	=> $default,
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_single_sidebar_left_select_control', array(
	'label'   			=> 'Select left sidebar',
	'section'  			=> 'tvlgiao_wpdance_single_blog',
	'settings' 			=> 'tvlgiao_wpdance_single_blog_sidebar_left',
	'type'    			=> 'select',
	'choices' 			=> $arr_sidebar,
));
$wp_customize->add_setting('tvlgiao_wpdance_single_blog_sidebar_right', array(
	'default'        	=> $default,
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_single_sidebar_right_select_control', array(
	'label'   			=> 'Select right sidebar',
	'section'  			=> 'tvlgiao_wpdance_single_blog',
	'settings' 			=> 'tvlgiao_wpdance_single_blog_sidebar_right',
	'type'    			=> 'select',
	'choices' 			=> $arr_sidebar,
));

$wp_customize->add_setting('tvlgiao_wpdance_single_blog_author_information', array(
	'default'        	=> '0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_single_blog_author_information_control', array(
	'label'   			=> esc_html__( 'Author Information', 'laparis' ),
	'description' 		=> esc_html__( 'Show/Hide Author Information', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_single_blog',
	'settings' 			=> 'tvlgiao_wpdance_single_blog_author_information',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Show",	
		'0'		=> "Hide"
	)
)); 

$wp_customize->add_setting('tvlgiao_wpdance_single_blog_previous_next_button', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_single_blog_previous_next_button_control', array(
	'label'   			=> esc_html__( 'Previous/Next Button', 'laparis' ),
	'description' 		=> esc_html__( 'Show/Hide Previous/Next Button', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_single_blog',
	'settings' 			=> 'tvlgiao_wpdance_single_blog_previous_next_button',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Show",	
		'0'		=> "Hide"
	)
)); 

$wp_customize->add_setting('tvlgiao_wpdance_single_blog_recent_post', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_single_blog_recent_post_control', array(
	'label'   			=> esc_html__( 'Recent Blog', 'laparis' ),
	'description' 		=> esc_html__( 'Show/Hide Recent Blog', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_single_blog',
	'settings' 			=> 'tvlgiao_wpdance_single_blog_recent_post',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Show",	
		'0'		=> "Hide"
	)
));

$wp_customize->add_setting('tvlgiao_wpdance_single_blog_recent_post_style', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_single_blog_recent_post_style_control', array(
	'label'   			=> esc_html__( 'Recent Blog Style', 'laparis' ),
	'description' 		=> esc_html__( '', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_single_blog',
	'settings' 			=> 'tvlgiao_wpdance_single_blog_recent_post_style',
	'type'    			=> 'select',
	'choices' 			=> array(
		'list'		=> "List",	
		'grid'		=> "Grid"
	)
));  

$wp_customize->add_setting('tvlgiao_wpdance_single_blog_recent_post_columns',array(
	'default'           => '2',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_html'
));

$wp_customize->add_control('tvlgiao_wpdance_single_blog_recent_post_columns_control',array(
	'label'         	=> esc_html__( 'Columns', 'laparis' ),
	'settings'      	=> 'tvlgiao_wpdance_single_blog_recent_post_columns',
	'section'       	=> 'tvlgiao_wpdance_genneral_blog',
	'type'          	=> 'text',
	'description'   	=> esc_html__( 'The number of columns displayed with the slider', 'laparis' )
));

//Content Custom Archive Blog
$wp_customize->add_setting('tvlgiao_wpdance_archive_blog_layout', array(
	'default' 			=> '0-0-0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
		'capability' 		=> 'edit_theme_options'		
));
	$wp_customize->add_control( new Theme_Slug_Custom_Radio_Image_Control($wp_customize,'tvlgiao_wpdance_archive_blog_layout',array(
	'label'          	=> esc_html__( 'Select the layout', 'laparis' ),
	'section'        	=> 'tvlgiao_wpdance_archive_blog',
	'settings'       	=> 'tvlgiao_wpdance_archive_blog_layout',
	'choices'			=> array(
		'0-0-0' 	=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_fullwidth.png',
		'1-0-0'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_sidebar.png',
		'0-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_right_sidebar.png',
		'1-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_right.png'
	)
)));
$wp_customize->add_setting('tvlgiao_wpdance_archive_blog_sidebar_left', array(
	'default'        	=> $default,
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_archive_blog_sidebar_left_control', array(
	'label'   			=> 'Select left sidebar',
	'section'  			=> 'tvlgiao_wpdance_archive_blog',
	'settings' 			=> 'tvlgiao_wpdance_archive_blog_sidebar_left',
	'type'    			=> 'select',
	'choices' 			=> $arr_sidebar,
));
$wp_customize->add_setting('tvlgiao_wpdance_archive_blog_sidebar_right', array(
	'default'        	=> $default,
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_archive_blog_sidebar_right_control', array(
	'label'   			=> 'Select right sidebar',
	'section'  			=> 'tvlgiao_wpdance_archive_blog',
	'settings' 			=> 'tvlgiao_wpdance_archive_blog_sidebar_right',
	'type'    			=> 'select',
	'choices' 			=> $arr_sidebar,
));
$wp_customize->add_setting('tvlgiao_wpdance_archive_blog_style', array(
	'default'        	=> 'list',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_archive_blog_style_control', array(
	'label'   			=> esc_html__( 'Layout Style', 'laparis' ),
	'section'  			=> 'tvlgiao_wpdance_default_blog',
	'settings' 			=> 'tvlgiao_wpdance_archive_blog_style',
	'type'    			=> 'select',
	'choices' 			=> array(
		'list'		=> esc_html__( 'List', 'laparis' ),
		'grid'		=> esc_html__( 'Grid', 'laparis' ),
	)
));


//Content Custom Default Blog
$wp_customize->add_setting('tvlgiao_wpdance_default_blog_layout', array(
	'default' 			=> '0-0-0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
		'capability' 		=> 'edit_theme_options'		
));
	$wp_customize->add_control( new Theme_Slug_Custom_Radio_Image_Control($wp_customize,'tvlgiao_wpdance_default_blog_layout',array(
	'label'          	=> esc_html__( 'Select the layout', 'laparis' ),
	'section'        	=> 'tvlgiao_wpdance_default_blog',
	'settings'       	=> 'tvlgiao_wpdance_default_blog_layout',
	'choices'			=> array(
		'0-0-0' 	=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_fullwidth.png',
		'1-0-0'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_sidebar.png',
		'0-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_right_sidebar.png',
		'1-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_right.png'
	)
)));
$wp_customize->add_setting('tvlgiao_wpdance_default_blog_sidebar_left', array(
	'default'        	=> $default,
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_default_blog_sidebar_left_control', array(
	'label'   			=> 'Select left sidebar',
	'section'  			=> 'tvlgiao_wpdance_default_blog',
	'settings' 			=> 'tvlgiao_wpdance_default_blog_sidebar_left',
	'type'    			=> 'select',
	'choices' 			=> $arr_sidebar,
));
$wp_customize->add_setting('tvlgiao_wpdance_default_blog_sidebar_right', array(
	'default'        	=> $default,
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_default_blog_sidebar_right_control', array(
	'label'   			=> 'Select right sidebar',
	'section'  			=> 'tvlgiao_wpdance_default_blog',
	'settings' 			=> 'tvlgiao_wpdance_default_blog_sidebar_right',
	'type'    			=> 'select',
	'choices' 			=> $arr_sidebar,
));
$wp_customize->add_setting('tvlgiao_wpdance_default_blog_style', array(
	'default'        	=> 'list',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_default_blog_style_control', array(
	'label'   			=> esc_html__( 'Layout Style', 'laparis' ),
	'section'  			=> 'tvlgiao_wpdance_default_blog',
	'settings' 			=> 'tvlgiao_wpdance_default_blog_style',
	'type'    			=> 'select',
	'choices' 			=> array(
		'list'		=> esc_html__( 'List', 'laparis' ),
		'grid'		=> esc_html__( 'Grid', 'laparis' ),
	)
));

?>