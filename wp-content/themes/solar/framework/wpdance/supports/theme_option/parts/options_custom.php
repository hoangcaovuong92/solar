<?php 
Redux::setSection( $opt_name, array(
    'title'            => __( 'Custom Script', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_custom_css_script',
    'desc'             => __( '', 'laparis' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-fire',
    'fields'           => array(
        /*array(
            'id'       => 'tvlgiao_wpdance_custom_css',
            'type'     => 'ace_editor',
            'title'    => __( 'CSS Code', 'laparis' ),
            'subtitle' => __( 'Paste your CSS code here.', 'laparis' ),
            'mode'     => 'css',
            'theme'    => 'monokai',
            'desc'     => '',
            'default'  => ""
        ),*/
        array(
            'id'       => 'tvlgiao_wpdance_custom_script',
            'type'     => 'ace_editor',
            'title'    => __( 'JS Code', 'laparis' ),
            'subtitle' => __( 'Paste your JS code here.', 'laparis' ),
            'mode'     => 'javascript',
            'theme'    => 'chrome',
            'desc'     => '',
            'default'  => ""
        ),
    ),
) );
?>