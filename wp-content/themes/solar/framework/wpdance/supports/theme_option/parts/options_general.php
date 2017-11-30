<?php 
Redux::setSection( $opt_name, array(
    'title'            => __( 'General', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_general_setting',
    'desc'             => __( '', 'laparis' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-cogs',
) );
 
Redux::setSection( $opt_name, array(
    'title'            => __( 'Logo', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_logo_section',
    'desc'             => __( '', 'laparis' ),
    'subsection'       => true,
    'customizer_width' => '400px',
    'fields'     => array(
        array(
            'id'       => 'tvlgiao_wpdance_logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Logo', 'laparis' ),
            'compiler' => 'true',
            'desc'     => __( '', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'default'  => array( 'url' => $wd_default_data['general']['default']['logo'] ),
          
        ),
    ) 
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Favicon', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_favicon_section',
    'desc'             => __( 'Favicon is the little icon that browsers display next to a page\'s title on a browser tab, or in the address bar next to its URL.', 'laparis' ),
    'subsection'       => true,
    'customizer_width' => '400px',
    'fields'     => array(
        array(
            'id'       => 'tvlgiao_wpdance_favicon',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Favicon', 'laparis' ),
            'compiler' => 'true',
            'desc'     => __( '', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'default'  => array( 'url' => $wd_default_data['general']['default']['favicon'] ),
        ),
    ) 
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Background', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_bg_body_section',
    'desc'             => __( 'Customize the background image for the body tag.', 'laparis' ),
    'subsection'       => true,
    'customizer_width' => '400px',
    'fields'     => array(
        array(
            'id'       => 'tvlgiao_wpdance_bg_body_display',
            'type'     => 'switch',
            'title'    => __( 'Display Background Image', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'default'  => $wd_default_data['general']['default']['bg_display'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_bg_body',
            'type'     => 'background',
            'background-size'   => false,
            'title'    => __( 'Background Body', 'laparis' ),
            'compiler' => 'true',
            'desc'     => __( '', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'background-color'  => false,
            'preview_media'     => true,
            'preview'           => false,
            'default'  => $wd_default_data['general']['default']['bg_body'],
            'required' => array('tvlgiao_wpdance_bg_body_display','=', '1' ),
        ),
    ) 
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Facebook API', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_facebook_api_section',
    'desc'             => __( '', 'laparis' ),
    'subsection'       => true,
    'customizer_width' => '400px',
    'fields'     => array(
        array(
            'id'       => 'tvlgiao_wpdance_comment_facebook_user_id',
            'type'     => 'text',
            'title'    => __( 'User ID', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'desc'     => __( 'Enter the facebook id of the administrator', 'laparis' ),
            'default'  => $wd_default_data['general']['default']['user_id'],
        ),
        array(
            'id'       => 'tvlgiao_wpdance_comment_facebook_app_id',
            'type'     => 'text',
            'title'    => __( 'App ID', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'default'  => $wd_default_data['general']['default']['app_id'],
        ),
    ) 
) );
?>