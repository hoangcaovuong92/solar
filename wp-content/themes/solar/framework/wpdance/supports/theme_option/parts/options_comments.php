<?php 
Redux::setSection( $opt_name, array(
    'title'            => __( 'Comments', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_comment_setting',
    'desc'             => __( '', 'laparis' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-comment-alt',
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_comment_sorter',
            'type'     => 'sortable',
            'mode'     => 'checkbox', // checkbox or text
            'title'    => __( 'Comment Form', 'laparis' ),
            'subtitle' => __( 'Define and reorder these however you want.', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'options'  => $wd_default_data['comment']['choose']['sorter'],
            'default'  => $wd_default_data['comment']['default']['sorter'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_comment_layout_style',
            'type'     => 'radio',
            'title'    => __( 'Layout', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'options'  => $wd_default_data['comment']['choose']['layout'],
            'default'  => $wd_default_data['comment']['default']['layout'],
        ),

        array(
           'id'       => 'tvlgiao_wpdance_comment_setting_section_start',
            'type'     => 'section',
            'title'    => __( 'Facebook Comment Settings', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'indent'   => true,
        ),

        /****************************/
            array(
                'id'       => 'tvlgiao_wpdance_comment_facebook_display_on_single_product',
                'type'     => 'switch',
                'title'    => __( 'Single Product', 'laparis' ),
                'subtitle' => __( 'Show facebook comment form on product details page', 'laparis' ),
                'default'  => $wd_default_data['comment']['default']['single_product'],
                'on'       => 'Show',
                'off'      => 'Hide',
            ),
            array(
                'id'       => 'tvlgiao_wpdance_comment_facebook_number_comment_display',
                'type'     => 'text',
                'title'    => __( 'Number Comment Display', 'laparis' ),
                'subtitle' => __( '', 'laparis' ),
                'desc'     => __( '', 'laparis' ),
                'default'  => $wd_default_data['comment']['default']['number_comment'],
            ),
            array(
                'id'       => 'tvlgiao_wpdance_comment_facebook_mode',
                'type'     => 'button_set',
                'title'    => __( 'Comment Mode', 'laparis' ),
                'subtitle' => __( 'Select "Multi Domain" if you intend to change the domain and want to keep the old comments.', 'laparis' ),
                'desc'     => __( '', 'laparis' ),
                'options'  => $wd_default_data['comment']['choose']['mode'],
                'default'  => $wd_default_data['comment']['default']['mode'],
            ),
        /****************************/
        
        array(
            'id'     => 'tvlgiao_wpdance_comment_setting_section_end',
            'type'   => 'section',
            'indent' => false,
        ),
    )
) );
?>