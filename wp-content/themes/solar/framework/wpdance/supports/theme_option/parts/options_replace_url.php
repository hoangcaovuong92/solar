<?php 
Redux::setSection( $opt_name, array(
    'title'            => __( 'Replace URL', 'solar' ),
    'id'               => 'tvlgiao_wpdance_replace_url',
    'desc'             => __( 'Search for and replace the path of all the photo options in the Theme Option panel and database.<br/> If you do not get the wrong path after the domain name conversion, do not worry about this part.', 'solar' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-link',
    'fields'     	   => array(
        array(
            'id'       => 'tvlgiao_wpdance_replace_url_old',
            'type'     => 'text',
            'title'    => __( 'Old URL String', 'solar' ),
            'placeholder' => __( 'Enter URL without \'/\' at the end', 'solar' ),
            'desc'     => '',
            'default'  => '',
        ),
        array(
            'id'       => 'tvlgiao_wpdance_replace_url_new',
            'type'     => 'text',
            'title'    => __( 'New URL String', 'solar' ),
            'subtitle' => __( 'Leave blank if you want to use Site URL', 'solar' ),
            'placeholder' => __( 'Enter URL without \'/\' at the end', 'solar' ),
            'desc'     => sprintf(__( 'Site URL: <strong>%s</strong>', 'solar' ), get_option( "siteurl", "" )),
            'default'  => '',
        ),
        array(
            'id'       => 'tvlgiao_wpdance_replace_url_image_theme_option',
            'type'     => 'checkbox',
            'title'    => __( 'Theme Option Image', 'solar' ),
            'subtitle' => __( 'This option will replace all image URL set in the Theme Option', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'default'  => '1'// 1 = on | 0 = off
        ),
        array(
            'id'       => 'tvlgiao_wpdance_replace_url_site_database',
            'type'     => 'checkbox',
            'title'    => __( 'Database', 'solar' ),
            'subtitle' => __( 'This option will replace site URL and something in the database', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'default'  => '0'// 1 = on | 0 = off
        ),
    ) 
) );

?>