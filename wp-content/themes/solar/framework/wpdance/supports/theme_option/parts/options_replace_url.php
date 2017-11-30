<?php 
Redux::setSection( $opt_name, array(
    'title'            => __( 'Replace URL', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_replace_url',
    'desc'             => __( 'Search for and replace the path of all the photo options in the Theme Option panel and database.<br/> If you do not get the wrong path after the domain name conversion, do not worry about this part.', 'laparis' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-link',
    'fields'     	   => array(
        array(
            'id'       => 'tvlgiao_wpdance_replace_url_old',
            'type'     => 'text',
            'title'    => __( 'Old URL String', 'laparis' ),
            'placeholder' => __( 'Enter URL without \'/\' at the end', 'laparis' ),
            'desc'     => '',
            'default'  => '',
        ),
        array(
            'id'       => 'tvlgiao_wpdance_replace_url_new',
            'type'     => 'text',
            'title'    => __( 'New URL String', 'laparis' ),
            'subtitle' => __( 'Leave blank if you want to use Site URL', 'laparis' ),
            'placeholder' => __( 'Enter URL without \'/\' at the end', 'laparis' ),
            'desc'     => sprintf(__( 'Site URL: <strong>%s</strong>', 'laparis' ), get_option( "siteurl", "" )),
            'default'  => '',
        ),
        array(
            'id'       => 'tvlgiao_wpdance_replace_url_image_theme_option',
            'type'     => 'checkbox',
            'title'    => __( 'Theme Option Image', 'laparis' ),
            'subtitle' => __( 'This option will replace all image URL set in the Theme Option', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'default'  => '1'// 1 = on | 0 = off
        ),
        array(
            'id'       => 'tvlgiao_wpdance_replace_url_site_database',
            'type'     => 'checkbox',
            'title'    => __( 'Database', 'laparis' ),
            'subtitle' => __( 'This option will replace site URL and something in the database', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'default'  => '0'// 1 = on | 0 = off
        ),
    ) 
) );

?>