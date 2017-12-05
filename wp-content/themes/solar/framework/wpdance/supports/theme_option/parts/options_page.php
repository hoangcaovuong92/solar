<?php 
Redux::setSection( $opt_name, array(
    'title'            => __( 'Page Settings', 'solar' ),
    'id'               => 'tvlgiao_wpdance_page_setting',
    'desc'             => __( '', 'solar' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-file'
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Default Page', 'solar' ),
    'id'               => 'tvlgiao_wpdance_layout_page_default',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'solar' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_layout_page_default_layout',
            'type'     => 'image_select',
            'title'    => __( 'Select The Layout', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'options'  => $wd_default_data['layout']['choose'],
            'default'  => $wd_default_data['layout']['default']['page_default'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_default_left_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Left Sidebar', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['page_default_left'],
            /*'required' => array('tvlgiao_wpdance_layout_page_default_layout','=',array( '1-0-0', '1-0-1' ) ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_default_right_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Right Sidebar', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['page_default_right'],
            /*'required' => array('tvlgiao_wpdance_layout_page_default_layout','=',array( '0-0-1', '1-0-1' ) ),*/
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( '404 Page', 'solar' ),
    'id'               => 'tvlgiao_wpdance_layout_page_404',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'solar' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_layout_page_404_background_style',
            'type'     => 'radio',
            'title'    => __( 'Background Style', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'options'  => $wd_default_data['404_page']['choose']['bg_style'],
            'default'  => $wd_default_data['404_page']['default']['bg_style'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_404_background_color',
            'type'     => 'color',
            'transparent'=> false,
            'title'    => __( 'Background Color', 'solar' ),
            'subtitle' => sprintf(__( '(Default: %s).', 'solar' ), $wd_default_data['404_page']['default']['bg_color']),
            'default'  => $wd_default_data['404_page']['default']['bg_color'],
            'required' => array('tvlgiao_wpdance_layout_page_404_background_style', '=', 'bg_color'),
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_404_background_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Background Image', 'solar' ),
            'compiler' => 'true',
            'desc'     => __( '', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => array( 'url' => $wd_default_data['404_page']['default']['bg_image'] ),
            'required' => array('tvlgiao_wpdance_layout_page_404_background_style', '=', 'bg_image'),
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_404_show_header_footer',
            'type'     => 'switch',
            'title'    => __( 'Header & Footer', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => $wd_default_data['404_page']['default']['header_footer'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_404_show_search_form',
            'type'     => 'switch',
            'title'    => __( 'Search Form', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => $wd_default_data['404_page']['default']['search_form'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_404_show_back_to_home_button',
            'type'     => 'switch',
            'title'    => __( 'Back To Home Button', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => $wd_default_data['404_page']['default']['button'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),
        array(
           'id'       => 'tvlgiao_wpdance_layout_page_404_show_back_to_home_button_section_start',
            'type'     => 'section',
            'title'    => __( 'Button Settings', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'indent'   => true,
            'required' => array('tvlgiao_wpdance_layout_page_404_show_back_to_home_button','=', '1' ),
        ),

        /****************************/
            array(
                'id'       => 'tvlgiao_wpdance_layout_page_404_show_back_to_home_button_text',
                'type'     => 'text',
                'title'    => __( 'Text Button', 'solar' ),
                'subtitle' => __( '', 'solar' ),
                'desc'     => __( '', 'solar' ),
                'default'  => $wd_default_data['404_page']['default']['button_text'],
                'required' => array('tvlgiao_wpdance_layout_page_404_show_back_to_home_button', '=', '1'),
            ),

            array(
                'id'       => 'tvlgiao_wpdance_layout_page_404_show_back_to_home_button_class',
                'type'     => 'text',
                'title'    => __( 'Class Button', 'solar' ),
                'subtitle' => __( '', 'solar' ),
                'desc'     => __( '', 'solar' ),
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
            'title'    => __( 'Custom Content', 'solar' ),
            'subtitle' => __( 'HTML/Shortcode will display below 404 page content.', 'solar' ),
            'desc'     => __( 'You can create a shortcode from the new page creation interface.', 'solar' ),
            'default'  => $wd_default_data['404_page']['default']['custom_shortcode'],
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Search Page', 'solar' ),
    'id'               => 'tvlgiao_wpdance_layout_page_search',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'solar' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_layout_page_search_layout',
            'type'     => 'image_select',
            'title'    => __( 'Select The Layout', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'options'  => $wd_default_data['layout']['choose'],
            'default'  => $wd_default_data['layout']['default']['page_search'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_search_left_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Left Sidebar', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['page_search_left'],
            /*'required' => array('tvlgiao_wpdance_layout_page_search_layout','=',array( '1-0-0', '1-0-1' ) ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_search_right_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Right Sidebar', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['page_search_right'],
            /*'required' => array('tvlgiao_wpdance_layout_page_search_layout','=',array( '0-0-1', '1-0-1' ) ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_search_background_style',
            'type'     => 'radio',
            'title'    => __( 'Background Style', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'options'  => $wd_default_data['search_page']['choose']['bg_style'],
            'default'  => $wd_default_data['search_page']['default']['bg_style'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_search_background_color',
            'type'     => 'color',
            'transparent'=> false,
            'title'    => __( 'Background Color', 'solar' ),
            'subtitle' => sprintf(__( '(Default: %s).', 'solar' ), $wd_default_data['search_page']['default']['bg_color']),
            'default'  => $wd_default_data['search_page']['default']['bg_color'],
            'required' => array('tvlgiao_wpdance_layout_page_search_background_style', '=', 'bg_color'),
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_search_background_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Background Image', 'solar' ),
            'compiler' => 'true',
            'desc'     => __( '', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => array( 'url' => $wd_default_data['search_page']['default']['bg_image'] ),
            'required' => array('tvlgiao_wpdance_layout_page_search_background_style', '=', 'bg_image'),
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_search_type',
            'type'     => 'radio',
            'title'    => __( 'Type', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'options'  => $wd_default_data['search_page']['choose']['type'],
            'default'  => $wd_default_data['search_page']['default']['type'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_search_columns',
            'type'     => 'button_set',
            'title'    => __( 'Columns', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'subtitle' => __( 'Set columns for blog search page.', 'solar' ),
            'options'  => $wd_default_data['columns']['choose'],
            'default'  => $wd_default_data['columns']['default']['page_search'],
            'required' => array('tvlgiao_wpdance_layout_page_search_type', '=', 'post'),
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_page_search_autocomplete',
            'type'     => 'switch',
            'title'    => __( 'Autocomplete', 'solar' ),
            'subtitle' => __( 'Show suggested results with keywords.', 'solar' ),
            'default'  => $wd_default_data['search_page']['default']['autocomplete'],
            'on'       => 'Enable',
            'off'      => 'Disabled',
            'required' => array('tvlgiao_wpdance_layout_page_search_autocomplete','=', '1' ),
        ),
        array(
            'id'       => 'tvlgiao_wpdance_layout_page_search_ajax',
            'type'     => 'switch',
            'title'    => __( 'Ajax', 'solar' ),
            'subtitle' => __( 'Load content with ajax.', 'solar' ),
            'default'  => $wd_default_data['search_page']['default']['ajax'],
            'on'       => 'Enable',
            'off'      => 'Disabled',
            'required' => array('tvlgiao_wpdance_layout_page_search_autocomplete','=', '1' ),
        ),
    )
) );
?>