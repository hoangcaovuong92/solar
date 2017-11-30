<?php 
if (!tvlgiao_wpdance_is_woocommerce()) return;
Redux::setSection( $opt_name, array(
    'title'            => __( 'WooCommerce', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_woocommerce_setting',
    'desc'             => __( '', 'laparis' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-shopping-cart-sign'
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Product layout', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_layout_product_layout',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'laparis' ),
    'fields'           => array(

        array(
            'id'       => 'tvlgiao_wpdance_layout_product_config_display_buttons',
            'type'     => 'switch',
            'title'    => __( 'Display Buttons', 'laparis' ),
            'subtitle' => __( 'Show/Hide Add To Cart, Compare, Wishlist button on your site', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'default'  => $wd_default_data['woo']['config']['default']['display_buttons'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),
        array(
           'id'       => 'tvlgiao_wpdance_layout_product_config_display_buttons_section_start',
            'type'     => 'section',
            'title'    => __( 'Group Button Settings', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'indent'   => true,
            'required' => array('tvlgiao_wpdance_layout_product_config_display_buttons','=', '1' ),
        ),

        /****************************/
            array(
                'id'       => 'tvlgiao_wpdance_layout_product_config_button_group_position',
                'type'     => 'radio',
                'title'    => __( 'Button Position', 'laparis' ),
                'subtitle' => __( 'Position of the buttons: add to cart, compare, wishlist on shop loop', 'laparis' ),
                'desc'     => __( '', 'laparis' ),
                'options'  => $wd_default_data['woo']['config']['choose']['button_position'],
                'default'  => $wd_default_data['woo']['config']['default']['button_position'],
                'required' => array('tvlgiao_wpdance_layout_product_config_display_buttons','=', '1' ),
            ),

            array(
                'id'       => 'tvlgiao_wpdance_layout_product_config_wishlist_default',
                'type'     => 'switch',
                'title'    => __( 'Wishtlist Button Default', 'laparis' ),
                'subtitle' => __( 'In some cases, the layout will have surplus wishlist buttons on single product page. Disable them to avoid errors.', 'laparis' ),
                'default'  => $wd_default_data['woo']['config']['default']['wishlist_default'],
                'on'       => 'Enable',
                'off'      => 'Disabled',
                'required' => array('tvlgiao_wpdance_layout_product_config_display_buttons','=', '1' ),
            ),

            array(
                'id'       => 'tvlgiao_wpdance_layout_product_config_compare_default',
                'type'     => 'switch',
                'title'    => __( 'Compare Button Default', 'laparis' ),
                'subtitle' => __( 'In some cases, the layout will have surplus compare buttons on single product page. Disable them to avoid errors.', 'laparis' ),
                'default'  => $wd_default_data['woo']['config']['default']['compare_default'],
                'on'       => 'Enable',
                'off'      => 'Disabled',
                'required' => array('tvlgiao_wpdance_layout_product_config_display_buttons','=', '1' ),
            ),
        /****************************/
        
        array(
            'id'     => 'tvlgiao_wpdance_layout_product_config_display_buttons_section_end',
            'type'   => 'section',
            'indent' => false,
            'required' => array('tvlgiao_wpdance_layout_product_config_display_buttons','=', '1' ),
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_product_config_title_display',
            'type'     => 'switch',
            'title'    => __( 'Product Title', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'default'  => $wd_default_data['woo']['config']['default']['title'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_product_config_number_title_word',
            'type'     => 'text',
            'title'    => __( 'Number Title Word', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'desc'     => __( 'Set -1 to display the full title.', 'laparis' ),
            'default'  => $wd_default_data['woo']['config']['default']['title_word'],
            'required' => array('tvlgiao_wpdance_layout_product_config_title_display','=', '1' ),
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_product_config_description_display',
            'type'     => 'switch',
            'title'    => __( 'Product Description', 'laparis' ),
            'subtitle' => __( 'Hide Product Description may not work with some cases: list view mode in the shop page, shortcode single product detail...', 'laparis' ),
            'default'  => $wd_default_data['woo']['config']['default']['desc'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_product_config_number_desc_word',
            'type'     => 'text',
            'title'    => __( 'Number Description Word', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'desc'     => __( 'Set -1 to display the full description.', 'laparis' ),
            'default'  => $wd_default_data['woo']['config']['default']['desc_word'],
            /*'required' => array('tvlgiao_wpdance_layout_product_config_description_display','=', '1' ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_product_config_rating_display',
            'type'     => 'switch',
            'title'    => __( 'Product Rating', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'default'  => $wd_default_data['woo']['config']['default']['rating'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_product_config_price_display',
            'type'     => 'switch',
            'title'    => __( 'Product Price', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'default'  => $wd_default_data['woo']['config']['default']['price'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_product_config_price_decimal_display',
            'type'     => 'switch',
            'title'    => __( 'Price Decimals', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'default'  => $wd_default_data['woo']['config']['default']['price_decimal'],
            'on'       => 'Show',
            'off'      => 'Hide',
            'required' => array('tvlgiao_wpdance_layout_product_config_price_display','=', '1' ),
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_product_config_meta_display',
            'type'     => 'switch',
            'title'    => __( 'Product Meta', 'laparis' ),
            'subtitle' => __( 'Show/Hide sale/featured product', 'laparis' ),
            'default'  => $wd_default_data['woo']['config']['default']['meta'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),
    )
) );  

Redux::setSection( $opt_name, array(
    'title'            => __( 'Product Visual', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_product_visual',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( 'Setting Product Visual Effect', 'laparis' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_product_effect_popup_cart',
            'type'     => 'switch',
            'title'    => __( 'Popup Add To Cart', 'laparis' ),
            'subtitle' => __( 'Enable / Disable popup display mini cart info after add to cart with ajax.', 'laparis' ),
            'default'  => $wd_default_data['woo']['visual']['default']['popup_cart'],
            'on'       => 'Enable',
            'off'      => 'Disabled',
        ),
        array(
           'id'       => 'tvlgiao_wpdance_product_effect_popup_cart_section_start',
            'type'     => 'section',
            'title'    => __( 'Popup Settings', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'indent'   => true,
        ),

        /****************************/
             array(
                'id'       => 'tvlgiao_wpdance_product_effect_popup_cart_width',
                'type'     => 'text',
                'title'    => __( 'Width', 'laparis' ),
                'subtitle' => __( 'Unit: Pixel', 'laparis' ),
                'desc'     => __( '', 'laparis' ),
                'default'  => $wd_default_data['woo']['visual']['default']['popup_width'],
                'required' => array('tvlgiao_wpdance_product_effect_popup_cart','=', '1' ),
            ),
            array(
                'id'       => 'tvlgiao_wpdance_product_effect_popup_cart_height',
                'type'     => 'text',
                'title'    => __( 'Height', 'laparis' ),
                'subtitle' => __( 'Unit: Pixel', 'laparis' ),
                'desc'     => __( '', 'laparis' ),
                'default'  => $wd_default_data['woo']['visual']['default']['popup_height'],
                'required' => array('tvlgiao_wpdance_product_effect_popup_cart','=', '1' ),
            ),
        /****************************/
        
        array(
            'id'     => 'tvlgiao_wpdance_product_effect_popup_cart_section_end',
            'type'   => 'section',
            'indent' => false,
        ),
       
        array(
            'id'       => 'tvlgiao_wpdance_product_effect_hover_thumbnail',
            'type'     => 'switch',
            'title'    => __( 'Hover Change Thumbnail', 'laparis' ),
            'subtitle' => __( 'Enable / Disable thumbnail change effect when hover product image. Effects disabled on mobile devices.', 'laparis' ),
            'default'  => $wd_default_data['woo']['visual']['default']['hover_thumbnail'],
            'on'       => 'Enable',
            'off'      => 'Disabled',
        ),
        array(
            'id'       => 'tvlgiao_wpdance_product_effect_hover_style',
            'type'     => 'image_select',
            'title'    => __( 'Thumbnail Hover Style', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'options'  => $wd_default_data['woo']['visual']['choose']['hover_style'],
            'default'  => $wd_default_data['woo']['visual']['default']['hover_style']
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Archive Product', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_layout_archive_product',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'laparis' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_layout_archive_product_layout',
            'type'     => 'image_select',
            'title'    => __( 'Select The Layout', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'options'  => $wd_default_data['layout']['choose'],
            'default'  => $wd_default_data['layout']['default']['product_archive'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_archive_product_left_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Left Sidebar', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['archive_product_left'],
            /*'required' => array('tvlgiao_wpdance_layout_archive_product_layout','=',array( '1-0-0', '1-0-1' ) ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_archive_product_right_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Right Sidebar', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['archive_product_right'],
            /*'required' => array('tvlgiao_wpdance_layout_archive_product_layout','=',array( '0-0-1', '1-0-1' ) ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_archive_product_posts_per_page',
            'type'     => 'text',
            'title'    => __( 'Posts Per Page', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'desc'     => __( 'Number products display on each page', 'laparis' ),
            'default'  => $wd_default_data['woo']['archive']['default']['posts_per_page'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_archive_product_columns',
            'type'     => 'button_set',
            'title'    => __( 'Columns', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'options'  => $wd_default_data['columns']['choose'],
            'default'  => $wd_default_data['columns']['default']['product_archive'], 
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_archive_product_custom_shortcode',
            'type'     => 'editor',
            'title'    => __( 'Custom Content', 'laparis' ),
            'subtitle' => __( 'HTML/Shortcode will be displayed at the bottom of the product archive.', 'laparis' ),
            'desc'     => __( 'You can create a shortcode from the new page creation interface.', 'laparis' ),
            'default'  => $wd_default_data['woo']['archive']['default']['custom_shortcode'],
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Single Product', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_layout_single_product',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'laparis' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_layout_single_product_layout',
            'type'     => 'image_select',
            'title'    => __( 'Select The Layout', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'options'  => $wd_default_data['layout']['choose'],
            'default'  => $wd_default_data['layout']['default']['single_product'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_single_product_left_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Left Sidebar', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['single_product_left'],
            /*'required' => array('tvlgiao_wpdance_layout_single_product_layout','=',array( '1-0-0', '1-0-1' ) ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_single_product_right_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Right Sidebar', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['single_product_right'],
            /*'required' => array('tvlgiao_wpdance_layout_single_product_layout','=',array( '0-0-1', '1-0-1' ) ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_single_product_position_thumbnail',
            'type'     => 'radio',
            'title'    => __( 'Position Thumbnail', 'laparis' ),
            'subtitle' => __( 'The position of the thumbnail slider compared to the large thumbnail.', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'options'  => $wd_default_data['woo']['single']['choose']['position_thumbnail'],
            'default'  => $wd_default_data['woo']['single']['default']['position_thumbnail'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_single_product_thumbnail_number',
            'type'     => 'text',
            'title'    => __( 'Thumbnail Number', 'laparis' ),
            'subtitle' => __( 'The maximum number of thumbnails on the slider.', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'default'  => $wd_default_data['woo']['single']['default']['thumbnail_number'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_single_product_summary_layout',
            'type'     => 'sortable',
            'mode'     => 'checkbox', // checkbox or text
            'title'    => __( 'Product Summary Layout', 'laparis' ),
            'subtitle' => __( 'Custom content layout for single product template. Define and reorder these however you want.', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'options'  => $wd_default_data['woo']['single']['choose']['summary_layout'],
            'default'  => $wd_default_data['woo']['single']['default']['summary_layout'],
        ),
        array(
           'id'       => 'tvlgiao_wpdance_layout_single_product_summary_section_start',
            'type'     => 'section',
            'title'    => __( 'Product Summary Custom Content', 'laparis' ),
            'subtitle' => __( 'Custom content will appear below the Product Summary section', 'laparis' ),
            'indent'   => true,
        ),

        /****************************/
            array(
                'id'       => 'tvlgiao_wpdance_layout_single_product_summary_custom_shortcode',
                'type'     => 'editor',
                'title'    => __( 'Custom Content', 'laparis' ),
                'subtitle' => __( 'HTML/Shortcode will display after single product summary.', 'laparis' ),
                'desc'     => __( 'You can create a shortcode from the new page creation interface.', 'laparis' ),
                'default'  => $wd_default_data['woo']['single']['default']['custom_shortcode'],
            ),
        /****************************/
        
        array(
            'id'     => 'tvlgiao_wpdance_layout_single_product_summary_section_end',
            'type'   => 'section',
            'indent' => false,
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_single_product_fullwidth_layout',
            'type'     => 'switch',
            'title'    => __( 'Fullwidth Layout', 'laparis' ),
            'subtitle' => __( 'Turn on it if you want fullwidth detail', 'laparis' ),
            'default'  => $wd_default_data['woo']['single']['default']['fullwidth'],
            'on'       => 'Enable',
            'off'      => 'Disabled',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_single_product_recent_product',
            'type'     => 'switch',
            'title'    => __( 'Recent Product', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'default'  => $wd_default_data['woo']['single']['default']['recent'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_single_product_upsell_product',
            'type'     => 'switch',
            'title'    => __( 'Upsell Product', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'default'  => $wd_default_data['woo']['single']['default']['upsell'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Woo Page Template', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_layout_woo_template',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( 'Setting for pages use layout WooCommerce Template', 'laparis' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_layout_woo_template_layout',
            'type'     => 'image_select',
            'title'    => __( 'Select The Layout', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'options'  => $wd_default_data['layout']['choose'],
            'default'  => $wd_default_data['layout']['default']['product_archive'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_woo_template_left_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Left Sidebar', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['woo_template_left'],
            /*'required' => array('tvlgiao_wpdance_layout_woo_template_layout','=',array( '1-0-0', '1-0-1' ) ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_woo_template_right_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Right Sidebar', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['woo_template_right'],
            /*'required' => array('tvlgiao_wpdance_layout_woo_template_layout','=',array( '0-0-1', '1-0-1' ) ),*/
        ),
        array(
            'id'       => 'tvlgiao_wpdance_layout_woo_template_custom_shortcode',
            'type'     => 'editor',
            'title'    => __( 'Custom Content', 'laparis' ),
            'subtitle' => __( 'HTML/Shortcode will be displayed at the bottom of the page use Woocommerce Template.', 'laparis' ),
            'desc'     => __( 'You can create a shortcode from the new page creation interface.', 'laparis' ),
            'default'  => $wd_default_data['woo']['woo_template']['default']['custom_shortcode'],
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Cart Page', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_layout_cart_page',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'laparis' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_layout_cart_page_payment_method',
            'type'     => 'editor',
            'title'    => __( 'Payment Mothod', 'laparis' ),
            'subtitle' => __( 'HTML/Shortcode will display on the left Cart Total.', 'laparis' ),
            'desc'     => __( 'You can create a shortcode from the new page creation interface.', 'laparis' ),
            'default'  => $wd_default_data['woo']['cart_page']['default']['payment_method'],
        ),
        array(
            'id'       => 'tvlgiao_wpdance_layout_cart_page_custom_shortcode',
            'type'     => 'editor',
            'title'    => __( 'Custom Content', 'laparis' ),
            'subtitle' => __( 'HTML/Shortcode will display below cart content.', 'laparis' ),
            'desc'     => __( 'You can create a shortcode from the new page creation interface.', 'laparis' ),
            'default'  => $wd_default_data['woo']['cart_page']['default']['custom_shortcode'],
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Mini Cart', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_layout_mini_cart',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'laparis' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_mini_cart_sorter',
            'type'     => 'sortable',
            'mode'     => 'checkbox', // checkbox or text
            'title'    => __( 'Layout', 'laparis' ),
            'subtitle' => __( 'Define and reorder these however you want.', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'options'  => $wd_default_data['woo']['mini_cart']['choose']['sorter'],
            'default'  => $wd_default_data['woo']['mini_cart']['default']['sorter'],
        ),
        array(
            'id'       => 'tvlgiao_wpdance_mini_cart_icon',
            'type'     => 'radio',
            'title'    => __( 'Select Cart Icon', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            //Must provide key => value pairs for select options
            'options'  => $wd_default_data['woo']['mini_cart']['choose']['cart_icon'],
            'default'  => $wd_default_data['woo']['mini_cart']['default']['cart_icon'],
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Sale Flash', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_layout_sale_flash',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'laparis' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_layout_product_sale_flash_text',
            'type'     => 'text',
            'title'    => __( 'Text', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'default'  => $wd_default_data['woo']['sale_flash']['default']['text'],
        ),
        array(
            'id'       => 'tvlgiao_wpdance_layout_product_sale_flash_percent',
            'type'     => 'switch',
            'title'    => __( 'Percent Sale', 'laparis' ),
            'subtitle' => __( '', 'laparis' ),
            'default'  => $wd_default_data['woo']['sale_flash']['default']['percent'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),
    )
) );
?>