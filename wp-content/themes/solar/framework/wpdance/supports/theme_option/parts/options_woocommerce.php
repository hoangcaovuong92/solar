<?php 
if (!tvlgiao_wpdance_is_woocommerce()) return;
Redux::setSection( $opt_name, array(
    'title'            => __( 'WooCommerce', 'solar' ),
    'id'               => 'tvlgiao_wpdance_woocommerce_setting',
    'desc'             => __( '', 'solar' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-shopping-cart-sign'
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Product layout', 'solar' ),
    'id'               => 'tvlgiao_wpdance_layout_product_layout',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'solar' ),
    'fields'           => array(

        array(
            'id'       => 'tvlgiao_wpdance_layout_product_config_display_buttons',
            'type'     => 'switch',
            'title'    => __( 'Display Buttons', 'solar' ),
            'subtitle' => __( 'Show/Hide Add To Cart, Compare, Wishlist button on your site', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'default'  => $wd_default_data['woo']['config']['default']['display_buttons'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),
        array(
           'id'       => 'tvlgiao_wpdance_layout_product_config_display_buttons_section_start',
            'type'     => 'section',
            'title'    => __( 'Group Button Settings', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'indent'   => true,
            'required' => array('tvlgiao_wpdance_layout_product_config_display_buttons','=', '1' ),
        ),

        /****************************/
            array(
                'id'       => 'tvlgiao_wpdance_layout_product_config_button_group_position',
                'type'     => 'radio',
                'title'    => __( 'Button Position', 'solar' ),
                'subtitle' => __( 'Position of the buttons: add to cart, compare, wishlist on shop loop', 'solar' ),
                'desc'     => __( '', 'solar' ),
                'options'  => $wd_default_data['woo']['config']['choose']['button_position'],
                'default'  => $wd_default_data['woo']['config']['default']['button_position'],
                'required' => array('tvlgiao_wpdance_layout_product_config_display_buttons','=', '1' ),
            ),

            array(
                'id'       => 'tvlgiao_wpdance_layout_product_config_wishlist_default',
                'type'     => 'switch',
                'title'    => __( 'Wishtlist Button Default', 'solar' ),
                'subtitle' => __( 'In some cases, the layout will have surplus wishlist buttons on single product page. Disable them to avoid errors.', 'solar' ),
                'default'  => $wd_default_data['woo']['config']['default']['wishlist_default'],
                'on'       => 'Enable',
                'off'      => 'Disabled',
                'required' => array('tvlgiao_wpdance_layout_product_config_display_buttons','=', '1' ),
            ),

            array(
                'id'       => 'tvlgiao_wpdance_layout_product_config_compare_default',
                'type'     => 'switch',
                'title'    => __( 'Compare Button Default', 'solar' ),
                'subtitle' => __( 'In some cases, the layout will have surplus compare buttons on single product page. Disable them to avoid errors.', 'solar' ),
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
            'title'    => __( 'Product Title', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => $wd_default_data['woo']['config']['default']['title'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_product_config_number_title_word',
            'type'     => 'text',
            'title'    => __( 'Number Title Word', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'desc'     => __( 'Set -1 to display the full title.', 'solar' ),
            'default'  => $wd_default_data['woo']['config']['default']['title_word'],
            'required' => array('tvlgiao_wpdance_layout_product_config_title_display','=', '1' ),
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_product_config_description_display',
            'type'     => 'switch',
            'title'    => __( 'Product Description', 'solar' ),
            'subtitle' => __( 'Hide Product Description may not work with some cases: list view mode in the shop page, shortcode single product detail...', 'solar' ),
            'default'  => $wd_default_data['woo']['config']['default']['desc'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_product_config_number_desc_word',
            'type'     => 'text',
            'title'    => __( 'Number Description Word', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'desc'     => __( 'Set -1 to display the full description.', 'solar' ),
            'default'  => $wd_default_data['woo']['config']['default']['desc_word'],
            /*'required' => array('tvlgiao_wpdance_layout_product_config_description_display','=', '1' ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_product_config_rating_display',
            'type'     => 'switch',
            'title'    => __( 'Product Rating', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => $wd_default_data['woo']['config']['default']['rating'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_product_config_price_display',
            'type'     => 'switch',
            'title'    => __( 'Product Price', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => $wd_default_data['woo']['config']['default']['price'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_product_config_price_decimal_display',
            'type'     => 'switch',
            'title'    => __( 'Price Decimals', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => $wd_default_data['woo']['config']['default']['price_decimal'],
            'on'       => 'Show',
            'off'      => 'Hide',
            'required' => array('tvlgiao_wpdance_layout_product_config_price_display','=', '1' ),
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_product_config_meta_display',
            'type'     => 'switch',
            'title'    => __( 'Product Meta', 'solar' ),
            'subtitle' => __( 'Show/Hide sale/featured product', 'solar' ),
            'default'  => $wd_default_data['woo']['config']['default']['meta'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),
    )
) );  

Redux::setSection( $opt_name, array(
    'title'            => __( 'Product Visual', 'solar' ),
    'id'               => 'tvlgiao_wpdance_product_visual',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( 'Setting Product Visual Effect', 'solar' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_product_effect_popup_cart',
            'type'     => 'switch',
            'title'    => __( 'Popup Add To Cart', 'solar' ),
            'subtitle' => __( 'Enable / Disable popup display mini cart info after add to cart with ajax.', 'solar' ),
            'default'  => $wd_default_data['woo']['visual']['default']['popup_cart'],
            'on'       => 'Enable',
            'off'      => 'Disabled',
        ),
        array(
           'id'       => 'tvlgiao_wpdance_product_effect_popup_cart_section_start',
            'type'     => 'section',
            'title'    => __( 'Popup Settings', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'indent'   => true,
        ),

        /****************************/
             array(
                'id'       => 'tvlgiao_wpdance_product_effect_popup_cart_width',
                'type'     => 'text',
                'title'    => __( 'Width', 'solar' ),
                'subtitle' => __( 'Unit: Pixel', 'solar' ),
                'desc'     => __( '', 'solar' ),
                'default'  => $wd_default_data['woo']['visual']['default']['popup_width'],
                'required' => array('tvlgiao_wpdance_product_effect_popup_cart','=', '1' ),
            ),
            array(
                'id'       => 'tvlgiao_wpdance_product_effect_popup_cart_height',
                'type'     => 'text',
                'title'    => __( 'Height', 'solar' ),
                'subtitle' => __( 'Unit: Pixel', 'solar' ),
                'desc'     => __( '', 'solar' ),
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
            'title'    => __( 'Hover Change Thumbnail', 'solar' ),
            'subtitle' => __( 'Enable / Disable thumbnail change effect when hover product image. Effects disabled on mobile devices.', 'solar' ),
            'default'  => $wd_default_data['woo']['visual']['default']['hover_thumbnail'],
            'on'       => 'Enable',
            'off'      => 'Disabled',
        ),
        array(
            'id'       => 'tvlgiao_wpdance_product_effect_hover_style',
            'type'     => 'image_select',
            'title'    => __( 'Thumbnail Hover Style', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'options'  => $wd_default_data['woo']['visual']['choose']['hover_style'],
            'default'  => $wd_default_data['woo']['visual']['default']['hover_style']
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Archive Product', 'solar' ),
    'id'               => 'tvlgiao_wpdance_layout_archive_product',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'solar' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_layout_archive_product_layout',
            'type'     => 'image_select',
            'title'    => __( 'Select The Layout', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'options'  => $wd_default_data['layout']['choose'],
            'default'  => $wd_default_data['layout']['default']['product_archive'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_archive_product_left_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Left Sidebar', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['archive_product_left'],
            /*'required' => array('tvlgiao_wpdance_layout_archive_product_layout','=',array( '1-0-0', '1-0-1' ) ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_archive_product_right_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Right Sidebar', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['archive_product_right'],
            /*'required' => array('tvlgiao_wpdance_layout_archive_product_layout','=',array( '0-0-1', '1-0-1' ) ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_archive_product_posts_per_page',
            'type'     => 'text',
            'title'    => __( 'Posts Per Page', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'desc'     => __( 'Number products display on each page', 'solar' ),
            'default'  => $wd_default_data['woo']['archive']['default']['posts_per_page'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_archive_product_columns',
            'type'     => 'button_set',
            'title'    => __( 'Columns', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'options'  => $wd_default_data['columns']['choose'],
            'default'  => $wd_default_data['columns']['default']['product_archive'], 
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_archive_product_custom_shortcode',
            'type'     => 'editor',
            'title'    => __( 'Custom Content', 'solar' ),
            'subtitle' => __( 'HTML/Shortcode will be displayed at the bottom of the product archive.', 'solar' ),
            'desc'     => __( 'You can create a shortcode from the new page creation interface.', 'solar' ),
            'default'  => $wd_default_data['woo']['archive']['default']['custom_shortcode'],
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Single Product', 'solar' ),
    'id'               => 'tvlgiao_wpdance_layout_single_product',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'solar' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_layout_single_product_layout',
            'type'     => 'image_select',
            'title'    => __( 'Select The Layout', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'options'  => $wd_default_data['layout']['choose'],
            'default'  => $wd_default_data['layout']['default']['single_product'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_single_product_left_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Left Sidebar', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['single_product_left'],
            /*'required' => array('tvlgiao_wpdance_layout_single_product_layout','=',array( '1-0-0', '1-0-1' ) ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_single_product_right_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Right Sidebar', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['single_product_right'],
            /*'required' => array('tvlgiao_wpdance_layout_single_product_layout','=',array( '0-0-1', '1-0-1' ) ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_single_product_position_thumbnail',
            'type'     => 'radio',
            'title'    => __( 'Position Thumbnail', 'solar' ),
            'subtitle' => __( 'The position of the thumbnail slider compared to the large thumbnail.', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'options'  => $wd_default_data['woo']['single']['choose']['position_thumbnail'],
            'default'  => $wd_default_data['woo']['single']['default']['position_thumbnail'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_single_product_thumbnail_number',
            'type'     => 'text',
            'title'    => __( 'Thumbnail Number', 'solar' ),
            'subtitle' => __( 'The maximum number of thumbnails on the slider.', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'default'  => $wd_default_data['woo']['single']['default']['thumbnail_number'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_single_product_summary_layout',
            'type'     => 'sortable',
            'mode'     => 'checkbox', // checkbox or text
            'title'    => __( 'Product Summary Layout', 'solar' ),
            'subtitle' => __( 'Custom content layout for single product template. Define and reorder these however you want.', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'options'  => $wd_default_data['woo']['single']['choose']['summary_layout'],
            'default'  => $wd_default_data['woo']['single']['default']['summary_layout'],
        ),
        array(
           'id'       => 'tvlgiao_wpdance_layout_single_product_summary_section_start',
            'type'     => 'section',
            'title'    => __( 'Product Summary Custom Content', 'solar' ),
            'subtitle' => __( 'Custom content will appear below the Product Summary section', 'solar' ),
            'indent'   => true,
        ),

        /****************************/
            array(
                'id'       => 'tvlgiao_wpdance_layout_single_product_summary_custom_shortcode',
                'type'     => 'editor',
                'title'    => __( 'Custom Content', 'solar' ),
                'subtitle' => __( 'HTML/Shortcode will display after single product summary.', 'solar' ),
                'desc'     => __( 'You can create a shortcode from the new page creation interface.', 'solar' ),
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
            'title'    => __( 'Fullwidth Layout', 'solar' ),
            'subtitle' => __( 'Turn on it if you want fullwidth detail', 'solar' ),
            'default'  => $wd_default_data['woo']['single']['default']['fullwidth'],
            'on'       => 'Enable',
            'off'      => 'Disabled',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_single_product_recent_product',
            'type'     => 'switch',
            'title'    => __( 'Recent Product', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => $wd_default_data['woo']['single']['default']['recent'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_single_product_upsell_product',
            'type'     => 'switch',
            'title'    => __( 'Upsell Product', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => $wd_default_data['woo']['single']['default']['upsell'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Woo Page Template', 'solar' ),
    'id'               => 'tvlgiao_wpdance_layout_woo_template',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( 'Setting for pages use layout WooCommerce Template', 'solar' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_layout_woo_template_layout',
            'type'     => 'image_select',
            'title'    => __( 'Select The Layout', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'options'  => $wd_default_data['layout']['choose'],
            'default'  => $wd_default_data['layout']['default']['product_archive'],
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_woo_template_left_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Left Sidebar', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['woo_template_left'],
            /*'required' => array('tvlgiao_wpdance_layout_woo_template_layout','=',array( '1-0-0', '1-0-1' ) ),*/
        ),

        array(
            'id'       => 'tvlgiao_wpdance_layout_woo_template_right_sidebar',
            'type'     => 'select',
            'title'    => __( 'Select Right Sidebar', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'data'     => 'sidebars',
            'default'  => $wd_default_data['sidebar']['default']['woo_template_right'],
            /*'required' => array('tvlgiao_wpdance_layout_woo_template_layout','=',array( '0-0-1', '1-0-1' ) ),*/
        ),
        array(
            'id'       => 'tvlgiao_wpdance_layout_woo_template_custom_shortcode',
            'type'     => 'editor',
            'title'    => __( 'Custom Content', 'solar' ),
            'subtitle' => __( 'HTML/Shortcode will be displayed at the bottom of the page use Woocommerce Template.', 'solar' ),
            'desc'     => __( 'You can create a shortcode from the new page creation interface.', 'solar' ),
            'default'  => $wd_default_data['woo']['woo_template']['default']['custom_shortcode'],
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Cart Page', 'solar' ),
    'id'               => 'tvlgiao_wpdance_layout_cart_page',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'solar' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_layout_cart_page_payment_method',
            'type'     => 'editor',
            'title'    => __( 'Payment Mothod', 'solar' ),
            'subtitle' => __( 'HTML/Shortcode will display on the left Cart Total.', 'solar' ),
            'desc'     => __( 'You can create a shortcode from the new page creation interface.', 'solar' ),
            'default'  => $wd_default_data['woo']['cart_page']['default']['payment_method'],
        ),
        array(
            'id'       => 'tvlgiao_wpdance_layout_cart_page_custom_shortcode',
            'type'     => 'editor',
            'title'    => __( 'Custom Content', 'solar' ),
            'subtitle' => __( 'HTML/Shortcode will display below cart content.', 'solar' ),
            'desc'     => __( 'You can create a shortcode from the new page creation interface.', 'solar' ),
            'default'  => $wd_default_data['woo']['cart_page']['default']['custom_shortcode'],
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Mini Cart', 'solar' ),
    'id'               => 'tvlgiao_wpdance_layout_mini_cart',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'solar' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_mini_cart_sorter',
            'type'     => 'sortable',
            'mode'     => 'checkbox', // checkbox or text
            'title'    => __( 'Layout', 'solar' ),
            'subtitle' => __( 'Define and reorder these however you want.', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'options'  => $wd_default_data['woo']['mini_cart']['choose']['sorter'],
            'default'  => $wd_default_data['woo']['mini_cart']['default']['sorter'],
        ),
        array(
            'id'       => 'tvlgiao_wpdance_mini_cart_icon',
            'type'     => 'radio',
            'title'    => __( 'Select Cart Icon', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'desc'     => __( '', 'solar' ),
            //Must provide key => value pairs for select options
            'options'  => $wd_default_data['woo']['mini_cart']['choose']['cart_icon'],
            'default'  => $wd_default_data['woo']['mini_cart']['default']['cart_icon'],
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Sale Flash', 'solar' ),
    'id'               => 'tvlgiao_wpdance_layout_sale_flash',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'solar' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_layout_product_sale_flash_text',
            'type'     => 'text',
            'title'    => __( 'Text', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'desc'     => __( '', 'solar' ),
            'default'  => $wd_default_data['woo']['sale_flash']['default']['text'],
        ),
        array(
            'id'       => 'tvlgiao_wpdance_layout_product_sale_flash_percent',
            'type'     => 'switch',
            'title'    => __( 'Percent Sale', 'solar' ),
            'subtitle' => __( '', 'solar' ),
            'default'  => $wd_default_data['woo']['sale_flash']['default']['percent'],
            'on'       => 'Show',
            'off'      => 'Hide',
        ),
    )
) );
?>