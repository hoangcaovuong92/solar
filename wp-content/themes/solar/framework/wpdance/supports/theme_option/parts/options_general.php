<?php 
Redux::setSection( $opt_name, array(
    'title'            => __( 'General', 'solar' ),
    'id'               => 'tvlgiao_wpdance_general_setting',
    'desc'             => __( '', 'solar' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-cogs',
) );
 
Redux::setSection( $opt_name, array(
    'title'            => __( 'Logo', 'solar' ),
    'id'               => 'tvlgiao_wpdance_logo_section',
    'desc'             => __( '', 'solar' ),
    'subsection'       => true,
    'customizer_width' => '400px',
    'fields'     => array(
        array(
            'id'       => 'tvlgiao_wpdance_logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Logo', 'solar' ),
            'compiler' => 'true',
            'desc'     => __( '', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => array( 'url' => $wd_default_data['general']['default']['logo'] ),
          
        ),
    ) 
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Favicon', 'solar' ),
    'id'               => 'tvlgiao_wpdance_favicon_section',
    'desc'             => __( 'Favicon is the little icon that browsers display next to a page\'s title on a browser tab, or in the address bar next to its URL.', 'solar' ),
    'subsection'       => true,
    'customizer_width' => '400px',
    'fields'     => array(
        array(
            'id'       => 'tvlgiao_wpdance_favicon',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Favicon', 'solar' ),
            'compiler' => 'true',
            'desc'     => __( '', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => array( 'url' => $wd_default_data['general']['default']['favicon'] ),
        ),
    ) 
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Background', 'solar' ),
    'id'               => 'tvlgiao_wpdance_bg_body_section',
    'desc'             => __( 'Customize the background image for the body tag.', 'solar' ),
    'subsection'       => true,
    'customizer_width' => '400px',
    'fields'     => array(
        array(
            'id'       => 'tvlgiao_wpdance_bg_body_display',
            'type'     => 'switch',
            'title'    => __( 'Display Background Image', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => $wd_default_data['general']['default']['bg_display'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_bg_body',
            'type'     => 'background',
            'background-size'   => false,
            'title'    => __( 'Background Body', 'solar' ),
            'compiler' => 'true',
            'desc'     => __( '', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'background-color'  => false,
            'preview_media'     => true,
            'preview'           => false,
            'default'  => $wd_default_data['general']['default']['bg_body'],
            'required' => array('tvlgiao_wpdance_bg_body_display','=', '1' ),
        ),
    ) 
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Facebook API', 'solar' ),
    'id'               => 'tvlgiao_wpdance_facebook_api_section',
    'desc'             => __( '', 'solar' ),
    'subsection'       => true,
    'customizer_width' => '400px',
    'fields'     => array(
        array(
            'id'       => 'tvlgiao_wpdance_comment_facebook_user_id',
            'type'     => 'text',
            'title'    => __( 'User ID', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'desc'     => __( 'Enter the facebook id of the administrator', 'solar' ),
            'default'  => $wd_default_data['general']['default']['user_id'],
        ),
        array(
            'id'       => 'tvlgiao_wpdance_comment_facebook_app_id',
            'type'     => 'text',
            'title'    => __( 'App ID', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'default'  => $wd_default_data['general']['default']['app_id'],
        ),
    ) 
) );
?>