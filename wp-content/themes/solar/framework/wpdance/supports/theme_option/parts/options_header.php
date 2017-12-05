<?php 
Redux::setSection( $opt_name, array(
    'title'            => __( 'Header', 'solar' ),
    'id'               => 'tvlgiao_wpdance_header',
    'desc'             => __( '', 'solar' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-arrow-up',
    'fields'     => array(
        array(
            'id'       => 'tvlgiao_wpdance_header_layout',
            'type'     => 'select',
            'tiles'    => true,
            'title'    => __( 'Select The Template', 'solar' ),
            'desc'     => __( 'Dont select to use default template', 'solar' ),
            'data'  => 'posts',
            'args'  => array(
                'post_type'      => 'wpdance_header',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
        ),
        array(
           'id'       => 'tvlgiao_wpdance_header_section_start',
            'type'     => 'section',
            'title'    => __( 'Header Default Settings', 'solar' ),
            'subtitle' => __( 'The custom sections below are only visible to the default header, header mobile.', 'solar' ),
            'indent'   => true,
            /*'required' => array('tvlgiao_wpdance_header_layout','=',''),*/
        ),

        /****************************/
            array(
                'id'       => 'tvlgiao_wpdance_header_show_site_title',
                'type'     => 'button_set',
                'title'    => __( 'Title/Logo', 'solar' ),
                'subtitle' => __( '', 'solar' ),
                'desc'     => __( '', 'solar' ),
                'options'  => $wd_default_data['header']['choose']['site_title'],
                'default'  => $wd_default_data['header']['default']['site_title'],
                /*'required' => array('tvlgiao_wpdance_header_layout','=',''),*/
            ),

            array(
                'id'       => 'tvlgiao_wpdance_header_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Custom Logo', 'solar' ),
                'compiler' => 'true',
                'desc'     => __( '', 'solar' ),
                'subtitle' => __( 'If no image is selected, the header will use Logo in the general settings', 'solar' ),
                'default'  => array( 'url' => $wd_default_data['general']['default']['logo'] ),
                'required' => array('tvlgiao_wpdance_header_show_site_title','=','0'),
            ),

            array(
                'id'       => 'tvlgiao_wpdance_header_menu_location',
                'type'     => 'radio',
                'title'    => __( 'Select Menu Locations', 'solar' ),
                'desc'     => __( '', 'solar' ),
                'data'     => 'menu_locations',
                'default'  => $wd_default_data['header']['default']['menu_location'],
                /*'required' => array('tvlgiao_wpdance_header_layout','=',''),*/
            ),
        /****************************/
        
        array(
            'id'     => 'tvlgiao_wpdance_header_section_end',
            'type'   => 'section',
            'indent' => false,
            /*'required' => array('tvlgiao_wpdance_header_layout','=',''),*/
        ),
    )
) );
?>