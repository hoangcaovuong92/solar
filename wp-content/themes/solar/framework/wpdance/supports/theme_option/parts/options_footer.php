<?php 
Redux::setSection( $opt_name, array(
    'title'            => __( 'Footer', 'solar' ),
    'id'               => 'tvlgiao_wpdance_footer',
    'desc'             => __( '', 'solar' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-arrow-down',
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_footer_layout',
            'type'     => 'select',
            'tiles'    => true,
            'title'    => __( 'Select The Template', 'solar' ),
            'desc'     => __( 'Dont select to use default template', 'solar' ),
            'data'  => 'posts',
            'args'  => array(
                'post_type'      => 'wpdance_footer',
                'posts_per_page' => 100,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
        ),

        array(
           'id'       => 'tvlgiao_wpdance_footer_section_start',
            'type'     => 'section',
            'title'    => __( 'Footer Default Settings', 'solar' ),
            'subtitle' => __( 'The custom sections below are only visible to the default footer.', 'solar' ),
            'indent'   => true,
            /*'required' => array('tvlgiao_wpdance_footer_layout','=',''),*/
        ),

        /****************************/
            array(
                'id'       => 'tvlgiao_wpdance_footer_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Custom Logo', 'solar' ),
                'compiler' => 'true',
                'desc'     => __( '', 'solar' ),
                'subtitle' => __( 'If no image is selected, the footer will use Logo in the general settings', 'solar' ),
                'default'  => array( 'url' => $wd_default_data['general']['default']['logo-footer'] ),
                /*'required' => array('tvlgiao_wpdance_footer_layout','=',''),*/
            ),

            array(
                'id'      => 'tvlgiao_wpdance_footer_copyright_text',
                'type'    => 'editor',
                'title'   => __( 'Copyright Text', 'solar' ),
                'default' => $wd_default_data['footer']['default']['copyright_text'],
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    //'tabindex' => 1,
                    //'editor_css' => '',
                    'teeny'         => false,
                    //'tinymce' => array(),
                    'quicktags'     => false,
                ),
                /*'required' => array('tvlgiao_wpdance_footer_layout','=',''),*/
            ),
        /****************************/
        
        array(
            'id'     => 'tvlgiao_wpdance_footer_section_end',
            'type'   => 'section',
            'indent' => false,
            /*'required' => array('tvlgiao_wpdance_footer_layout','=',''),*/
        ),
        
    ) 
) );
?>