<?php 
Redux::setSection( $opt_name, array(
    'title'            => __( 'Page Settings', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_page_setting',
    'desc'             => __( '', 'laparis' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-file'
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Default Page', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_layout_page_default',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'laparis' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_layout_page_default_layout',
            'type'     => 'image_select',
            'title'    => __( 'Select The Layout', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'options'  => $wd_default_data['layout']['choose'],
            'default'  => $wd_default_data['layout']['default']['page_default'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_default_left_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Left Sidebar', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['page_default_left'],
            /*'required' => array('tvlgiao_wpdance_layout_page_default_layout','=',array( '1-0-0', '1-0-1' ) ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_default_right_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Right Sidebar', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['page_default_right'],
            /*'required' => array('tvlgiao_wpdance_layout_page_default_layout','=',array( '0-0-1', '1-0-1' ) ),*/
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( '404 Page', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_layout_page_404',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'laparis' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_layout_page_404_background_style',
            'type'     => 'radio',
            'title'    => __( 'Background Style', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'options'  => $wd_default_data['404_page']['choose']['bg_style'],
            'default'  => $wd_default_data['404_page']['default']['bg_style'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_404_background_color',
            'type'     => 'color',
            'transparent'=> false,
            'title'    => __( 'Background Color', 'laparis' ),
            'subtitle' => sprintf(__( '(Default: %s).', 'laparis' ), $wd_default_data['404_page']['default']['bg_color']),
            'default'  => $wd_default_data['404_page']['default']['bg_color'],
            'required' => array('tvlgiao_wpdance_layout_page_404_background_style', '=', 'bg_color'),
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_404_background_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Background Image', 'laparis' ),
            'compiler' => 'true',
            'desc'     => __( '', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'default'  => array( 'url' => $wd_default_data['404_page']['default']['bg_image'] ),
            'required' => array('tvlgiao_wpdance_layout_page_404_background_style', '=', 'bg_image'),
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_404_show_header_footer',
            'type'     => 'switch',
            'title'    => __( 'Header & Footer', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'default'  => $wd_default_data['404_page']['default']['header_footer'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_404_show_search_form',
            'type'     => 'switch',
            'title'    => __( 'Search Form', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'default'  => $wd_default_data['404_page']['default']['search_form'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_404_show_back_to_home_button',
            'type'     => 'switch',
            'title'    => __( 'Back To Home Button', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'default'  => $wd_default_data['404_page']['default']['button'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),
        array(
           'id'       => 'tvlgiao_wpdance_layout_page_404_show_back_to_home_button_section_start',
            'type'     => 'section',
            'title'    => __( 'Button Settings', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'indent'   => true,
            'required' => array('tvlgiao_wpdance_layout_page_404_show_back_to_home_button','=', '1' ),
        ),

        /****************************/
            array(
                'id'       => 'tvlgiao_wpdance_layout_page_404_show_back_to_home_button_text',
                'type'     => 'text',
                'title'    => __( 'Text Button', 'laparis' ),
                'subtitle' => __( '', 'laparis' ),
                'desc'     => __( '', 'laparis' ),
                'default'  => $wd_default_data['404_page']['default']['button_text'],
                'required' => array('tvlgiao_wpdance_layout_page_404_show_back_to_home_button', '=', '1'),
            ),

            array(
                'id'       => 'tvlgiao_wpdance_layout_page_404_show_back_to_home_button_class',
                'type'     => 'text',
                'title'    => __( 'Class Button', 'laparis' ),
                'subtitle' => __( '', 'laparis' ),
                'desc'     => __( '', 'laparis' ),
                'default'  => $wd_default_data['404_page']['default']['button_class'],
                'required' => array('tvlgiao_wpdance_layout_page_404_show_back_to_home_button', '=', '1'),
            ),
        /****************************/
        
        array(
            'id'        => 'tvlgiao_wpdance_layout_page_404_show_back_to_home_button_section_end',
            'type'      => 'section',
            'indent'    => false,
            'required'  => array('tvlgiao_wpdance_layout_page_404_show_back_to_home_button','=', '1' ),
        ),
        array(
            'id'       => 'tvlgiao_wpdance_layout_page_404_custom_shortcode',
            'type'     => 'editor',
            'title'    => __( 'Custom Content', 'laparis' ),
            'subtitle' => __( 'HTML/Shortcode will display below 404 page content.', 'laparis' ),
            'desc'     => __( 'You can create a shortcode from the new page creation interface.', 'laparis' ),
            'default'  => $wd_default_data['404_page']['default']['custom_shortcode'],
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Search Page', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_layout_page_search',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'laparis' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_layout_page_search_layout',
            'type'     => 'image_select',
            'title'    => __( 'Select The Layout', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'options'  => $wd_default_data['layout']['choose'],
            'default'  => $wd_default_data['layout']['default']['page_search'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_search_left_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Left Sidebar', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['page_search_left'],
            /*'required' => array('tvlgiao_wpdance_layout_page_search_layout','=',array( '1-0-0', '1-0-1' ) ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_search_right_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Right Sidebar', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['page_search_right'],
            /*'required' => array('tvlgiao_wpdance_layout_page_search_layout','=',array( '0-0-1', '1-0-1' ) ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_search_background_style',
            'type'     => 'radio',
            'title'    => __( 'Background Style', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'options'  => $wd_default_data['search_page']['choose']['bg_style'],
            'default'  => $wd_default_data['search_page']['default']['bg_style'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_search_background_color',
            'type'     => 'color',
            'transparent'=> false,
            'title'    => __( 'Background Color', 'laparis' ),
            'subtitle' => sprintf(__( '(Default: %s).', 'laparis' ), $wd_default_data['search_page']['default']['bg_color']),
            'default'  => $wd_default_data['search_page']['default']['bg_color'],
            'required' => array('tvlgiao_wpdance_layout_page_search_background_style', '=', 'bg_color'),
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_search_background_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Background Image', 'laparis' ),
            'compiler' => 'true',
            'desc'     => __( '', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'default'  => array( 'url' => $wd_default_data['search_page']['default']['bg_image'] ),
            'required' => array('tvlgiao_wpdance_layout_page_search_background_style', '=', 'bg_image'),
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_search_type',
            'type'     => 'radio',
            'title'    => __( 'Type', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'options'  => $wd_default_data['search_page']['choose']['type'],
            'default'  => $wd_default_data['search_page']['default']['type'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_search_columns',
            'type'     => 'button_set',
            'title'    => __( 'Columns', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'subtitle' => __( 'Set columns for blog search page.', 'laparis' ),
            'options'  => $wd_default_data['columns']['choose'],
            'default'  => $wd_default_data['columns']['default']['page_search'],
            'required' => array('tvlgiao_wpdance_layout_page_search_type', '=', 'post'),
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_search_autocomplete',
            'type'     => 'switch',
            'title'    => __( 'Autocomplete', 'laparis' ),
            'subtitle' => __( 'Show suggested results with keywords.', 'laparis' ),
            'default'  => $wd_default_data['search_page']['default']['autocomplete'],
            'on'       => 'Enable',
            'off'      => 'Disabled',
            'required' => array('tvlgiao_wpdance_layout_page_search_autocomplete','=', '1' ),
        ),
        array(
            'id'       => 'tvlgiao_wpdance_layout_page_search_ajax',
            'type'     => 'switch',
            'title'    => __( 'Ajax', 'laparis' ),
            'subtitle' => __( 'Load content with ajax.', 'laparis' ),
            'default'  => $wd_default_data['search_page']['default']['ajax'],
            'on'       => 'Enable',
            'off'      => 'Disabled',
            'required' => array('tvlgiao_wpdance_layout_page_search_autocomplete','=', '1' ),
        ),
    )
) );
?>