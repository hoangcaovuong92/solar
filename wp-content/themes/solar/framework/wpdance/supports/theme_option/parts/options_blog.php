<?php 
 Redux::setSection( $opt_name, array(
    'title'            => __( 'Blog Settings', 'solar' ),
    'id'               => 'tvlgiao_wpdance_blog_setting',
    'desc'             => __( '', 'solar' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-edit'
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Blog Config', 'solar' ),
    'id'               => 'tvlgiao_wpdance_layout_blog_config',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'solar' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_layout_blog_config_title_display',
            'type'     => 'switch',
            'title'    => __( 'Blog Title', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => $wd_default_data['blog']['config']['default']['title'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_blog_config_thumbnail_display',
            'type'     => 'switch',
            'title'    => __( 'Blog Thumbnail', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => $wd_default_data['blog']['config']['default']['thumbnail'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
           'id'       => 'tvlgiao_wpdance_layout_blog_config_thumbnail_section_start',
            'type'     => 'section',
            'title'    => __( 'Blog Thumbnail Settings', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'indent'   => true,
            'required' => array('tvlgiao_wpdance_layout_blog_config_thumbnail_display','=', '1' ),
        ),
        /****************************/
            array(
                'id'       => 'tvlgiao_wpdance_layout_blog_config_show_by_post_format',
                'type'     => 'switch',
                'title'    => __( 'Show By Post Format', 'solar' ),
                'subtitle' => __( 'Enable to display posts by post format (video, audio, quote, gallery ...)', 'solar' ),
                'default'  => $wd_default_data['blog']['config']['default']['show_by_post_format'],
                'on'       => 'Show',
                'off'      => 'Hide',
                'required' => array('tvlgiao_wpdance_layout_blog_config_thumbnail_display','=', '1' ),
            ),

            array(
                'id'       => 'tvlgiao_wpdance_layout_blog_config_thumbnail_placeholder',
                'type'     => 'switch',
                'title'    => __( 'Placeholder Image', 'solar' ),
                'subtitle' => __( 'Placeholder image display when post no thumbnail', 'solar' ),
                'default'  => $wd_default_data['blog']['config']['default']['placeholder'],
                'on'       => 'Show',
                'off'      => 'Hide',
                'required' => array('tvlgiao_wpdance_layout_blog_config_thumbnail_display','=', '1' ),
            ),
        /****************************/
        array(
            'id'     => 'tvlgiao_wpdance_layout_blog_config_thumbnail_section_end',
            'type'   => 'section',
            'indent' => false,
            'required' => array('tvlgiao_wpdance_layout_blog_single_recent_post','=', '1' ),
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_blog_config_date_display',
            'type'     => 'switch',
            'title'    => __( 'Blog Date', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => $wd_default_data['blog']['config']['default']['date'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_blog_config_meta_display',
            'type'     => 'switch',
            'title'    => __( 'Blog Meta', 'solar' ),
            'subtitle' => __( 'show author, category or number facebook comment...', 'solar' ),
            'default'  => $wd_default_data['blog']['config']['default']['meta'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
           'id'       => 'tvlgiao_wpdance_layout_blog_config_meta_section_start',
            'type'     => 'section',
            'title'    => __( 'Blog Meta Settings', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'indent'   => true,
            'required' => array('tvlgiao_wpdance_layout_blog_config_meta_display','=', '1' ),
        ),
        /****************************/
            array(
                'id'       => 'tvlgiao_wpdance_layout_blog_config_author_display',
                'type'     => 'switch',
                'title'    => __( 'Blog Author', 'solar' ),
                'subtitle' => __( '', 'solar' ),
                'default'  => $wd_default_data['blog']['config']['default']['author'],
                'on'       => 'Show',
                'off'      => 'Hide',
                'required' => array('tvlgiao_wpdance_layout_blog_config_meta_display','=', '1' ),
            ),

            array(
                'id'       => 'tvlgiao_wpdance_layout_blog_config_category_display',
                'type'     => 'switch',
                'title'    => __( 'Blog Category', 'solar' ),
                'subtitle' => __( '', 'solar' ),
                'default'  => $wd_default_data['blog']['config']['default']['category'],
                'on'       => 'Show',
                'off'      => 'Hide',
                'required' => array('tvlgiao_wpdance_layout_blog_config_meta_display','=', '1' ),
            ),

            array(
                'id'       => 'tvlgiao_wpdance_layout_blog_config_number_comment_display',
                'type'     => 'switch',
                'title'    => __( 'Number Comment', 'solar' ),
                'subtitle' => __( '', 'solar' ),
                'default'  => $wd_default_data['blog']['config']['default']['comment'],
                'on'       => 'Show',
                'off'      => 'Hide',
                'required' => array('tvlgiao_wpdance_layout_blog_config_meta_display','=', '1' ),
            ),

            array(
                'id'       => 'tvlgiao_wpdance_layout_blog_config_tag_display',
                'type'     => 'switch',
                'title'    => __( 'Tags', 'solar' ),
                'subtitle' => __( '', 'solar' ),
                'default'  => $wd_default_data['blog']['config']['default']['tag'],
                'on'       => 'Show',
                'off'      => 'Hide',
                'required' => array('tvlgiao_wpdance_layout_blog_config_meta_display','=', '1' ),
            ),
        /****************************/
        array(
            'id'     => 'tvlgiao_wpdance_layout_blog_config_meta_section_end',
            'type'   => 'section',
            'indent' => false,
            'required' => array('tvlgiao_wpdance_layout_blog_config_meta_display','=', '1' ),
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_blog_config_excerpt_display',
            'type'     => 'switch',
            'title'    => __( 'Blog Excerpt', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => $wd_default_data['blog']['config']['default']['excerpt'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_blog_config_number_excerpt_word',
            'type'     => 'text',
            'title'    => __( 'Number Excerpt Word', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'default'  => $wd_default_data['blog']['config']['default']['excerpt_word'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_blog_config_readmore_display',
            'type'     => 'switch',
            'title'    => __( 'Readmore Button', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => $wd_default_data['blog']['config']['default']['readmore'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Blog Archive', 'solar' ),
    'id'               => 'tvlgiao_wpdance_layout_blog_archive',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'solar' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_layout_blog_archive_layout',
            'type'     => 'image_select',
            'title'    => __( 'Select The Layout', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'options'  => $wd_default_data['layout']['choose'],
            'default'  => $wd_default_data['layout']['default']['blog_archive'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_blog_archive_left_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Left Sidebar', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['blog_archive_left'],
            /*'required' => array('tvlgiao_wpdance_layout_blog_archive_layout','=',array( '1-0-0', '1-0-1' ) ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_blog_archive_right_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Right Sidebar', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['blog_archive_right'],
            /*'required' => array('tvlgiao_wpdance_layout_blog_archive_layout','=',array( '0-0-1', '1-0-1' ) ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_blog_archive_style',
            'type'     => 'button_set',
            'title'    => __( 'Layout Style', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'options'  => $wd_default_data['blog']['archive']['choose']['style'],
            'default'  => $wd_default_data['blog']['archive']['default']['style'],
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Blog Single', 'solar' ),
    'id'               => 'tvlgiao_wpdance_layout_blog_single',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'solar' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_layout_blog_single_layout',
            'type'     => 'image_select',
            'title'    => __( 'Select The Layout', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'options'  => $wd_default_data['layout']['choose'],
            'default'  => $wd_default_data['layout']['default']['blog_single'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_blog_single_left_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Left Sidebar', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['blog_single_left'],
            /*'required' => array('tvlgiao_wpdance_layout_blog_single_layout','=',array( '1-0-0', '1-0-1' ) ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_blog_single_right_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Right Sidebar', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['blog_single_right'],
            /*'required' => array('tvlgiao_wpdance_layout_blog_single_layout','=',array( '0-0-1', '1-0-1' ) ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_blog_single_author_information',
            'type'     => 'switch',
            'title'    => __( 'Author Information', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => $wd_default_data['blog']['single']['default']['author'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_blog_single_previous_next_button',
            'type'     => 'switch',
            'title'    => __( 'Previous/Next Button', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => $wd_default_data['blog']['single']['default']['previous_next'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_blog_single_recent_post',
            'type'     => 'switch',
            'title'    => __( 'Recent Blog', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => $wd_default_data['blog']['single']['default']['recent'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
           'id'       => 'tvlgiao_wpdance_layout_blog_single_recent_post_section_start',
            'type'     => 'section',
            'title'    => __( 'Recent Blog Settings', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'indent'   => true,
            'required' => array('tvlgiao_wpdance_layout_blog_single_recent_post','=', '1' ),
        ),

        /****************************/ 
            array(
                'id'       => 'tvlgiao_wpdance_layout_blog_single_recent_post_style',
                'type'     => 'button_set',
                'title'    => __( 'Recent Blog Style', 'solar' ),
                'subtitle' => __( '', 'solar' ),
                'options'  => $wd_default_data['blog']['single']['choose']['recent_style'],
                'default'  => $wd_default_data['blog']['single']['default']['recent_style'],
                'required' => array('tvlgiao_wpdance_layout_blog_single_recent_post','=', '1' ),
            ),
            array(
                'id'       => 'tvlgiao_wpdance_layout_blog_single_recent_post_columns',
                'type'     => 'text',
                'title'    => __( 'Columns', 'solar' ),
                'subtitle' => __( 'Number of columns displayed with slider', 'solar' ),
                'desc'     => __( '', 'solar' ),
                'default'  => $wd_default_data['columns']['default']['blog_recent'],
            ),
        /****************************/
        
        array(
            'id'     => 'tvlgiao_wpdance_layout_blog_single_recent_post_section_end',
            'type'   => 'section',
            'indent' => false,
            'required' => array('tvlgiao_wpdance_layout_blog_single_recent_post','=', '1' ),
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Blog Default Layout', 'solar' ),
    'id'               => 'tvlgiao_wpdance_layout_blog_default',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'solar' ),
    'fields'           => array( 
        array(
            'id'       => 'tvlgiao_wpdance_layout_blog_default_layout',
            'type'     => 'image_select',
            'title'    => __( 'Select The Layout', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'options'  => $wd_default_data['layout']['choose'],
            'default'  => $wd_default_data['layout']['default']['blog_default'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_blog_default_left_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Left Sidebar', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['blog_default_left'],
            /*'required' => array('tvlgiao_wpdance_layout_blog_default_layout','=',array( '1-0-0', '1-0-1' ) ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_blog_default_right_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Right Sidebar', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['blog_default_right'],
            /*'required' => array('tvlgiao_wpdance_layout_blog_default_layout','=',array( '0-0-1', '1-0-1' ) ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_blog_default_style',
            'type'     => 'button_set',
            'title'    => __( 'Layout Style', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'options'  => $wd_default_data['blog']['index']['choose']['style'],
            'default'  => $wd_default_data['blog']['index']['default']['style'],
        ),
    )
) );
?>