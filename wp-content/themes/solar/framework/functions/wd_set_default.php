<?php 
/**
 * TVLGIAO WPDANCE FRAMEWORK 2017.
 *
 * @author : Cao Vuong.
 * -Email  : hoangcaovuong92@gmail.com.
 */
 
if(!function_exists ('tvlgiao_wpdance_get_theme_option_default_data')){
	function tvlgiao_wpdance_get_theme_option_default_data(){
		return array(
		    'general'       => array(
		        'default'       => array(
	                'logo'      	=> TVLGIAO_WPDANCE_THEME_IMAGES.'/wpdance_logo.png',
	                'logo-footer'   => TVLGIAO_WPDANCE_THEME_IMAGES.'/logo_footer.png',
	                'favicon'   	=> TVLGIAO_WPDANCE_THEME_IMAGES.'/wpdance_logo.png',
	                'bg_display'   	=> '0',
	                'bg_body'   	=> array( 
	                	'background-image' 		=> TVLGIAO_WPDANCE_THEME_IMAGES.'/bg-body.png', 
	                	'background-repeat' 	=> 'no-repeat', 
	                	'background-position'	=> 'left top',
	                	'background-attachment'	=> 'fixed'
            		),
            		'user_id'    		=> '100013941973162', //facebook API
	                'app_id'    		=> '325713691192544', //facebook API
		        )
		    ),
		    'sidebar'       => array(
		        'default'       => array(
		            'blog_default_left'     => 'sidebar',
		            'blog_default_right'    => 'right_sidebar',
		            'blog_archive_left'     => 'sidebar',
		            'blog_archive_right'    => 'right_sidebar',
		            'blog_single_left'      => 'sidebar',
		            'blog_single_right'     => 'right_sidebar',
		            'page_default_left'     => 'sidebar',
		            'page_default_right'    => 'right_sidebar',
		            'page_search_left'   	=> 'sidebar',
		            'page_search_right' 	=> 'right_sidebar',
		            'woo_template_left'     => 'left_sidebar_shop',
		            'woo_template_right'   	=> 'right_sidebar_shop',
		            'archive_product_left'  => 'left_sidebar_shop',
		            'archive_product_right' => 'right_sidebar_shop',
		            'single_product_left'   => 'left_sidebar_product',
		            'single_product_right'  => 'right_sidebar_product',
		        ),
		    ),
		    'layout'       	=> array(
		    	'choose'        => array(
                    '0-0-0' => array(
                        'alt' => '1 Column',
                        'img' => TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_fullwidth.png'
                    ),
                    '1-0-0' => array(
                        'alt' => '2 Column Left',
                        'img' => TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_sidebar.png'
                    ),
                    '0-0-1' => array(
                        'alt' => '2 Column Right',
                        'img' => TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_right_sidebar.png'
                    ),
                    '1-0-1' => array(
                        'alt' => '3 Column Middle',
                        'img' => TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_right.png'
                    ),
                ),
		        'default'       => array(
		            'blog_single'  		=> '0-0-0',
		            'blog_archive'  	=> '0-0-0',
		            'blog_default'  	=> '0-0-0',
		            'page_default'  	=> '0-0-0',
		            'page_search'  		=> '0-0-0',
		            'single_product'	=> '0-0-0',
		            'product_archive'	=> '0-0-0',
		        )
	    	),
	    	'columns'       	=> array(
		    	'choose'        	=>  array(
				        '1' => esc_html__( '1 Column', 'solar' ),
				        '2' => esc_html__( '2 Columns', 'solar' ),
				        '3' => esc_html__( '3 Columns', 'solar' ),
				        '4' => esc_html__( '4 Columns', 'solar' ),
				    ),
		        'default'       => array(
		            'product_archive'  	=> '4',
		            'page_search'		=> '2', //columns of post result
		            'blog_recent'		=> '2',
		        )
	    	),
	    	'header'    => array(
		        'choose'         => array(
		            'site_title'        => array(
                        '0'    => __( 'Show Logo', 'solar' ),
                        '1'    => __( 'Show Site Title', 'solar' ),
                    ),
                    'menu_location'     => array(
						'primary' 			=> esc_html__('Primary Menu', 'solar'),
				        'primary_right' 	=> esc_html__('Secondary Menu', 'solar'),
				        'primary_mobile' 	=> esc_html__('Mobile Menu', 'solar'),
					),
		        ),
		        'default'        => array(
		            'site_title'        => '0',
		            'menu_location'		=> 'primary'
		        ),
		    ),
		    'footer'    => array(
		        'choose'         => array(
		        ),
		        'default'        => array(
		            'copyright_text'    => sprintf(__( 'Copyright %s. All rights reserved.', 'solar' ), esc_html( get_bloginfo('name')) ),
		        ),
		    ),
		    'breadcrumb'    => array(
		        'choose'         => array(
		            'type'              => array(
		                'breadcrumb_default'=> __( 'Background Color', 'solar' ),
		                'breadcrumb_banner' => __( 'Background Image', 'solar' ),
		                'no_breadcrumb'     => __( 'No Breadcrumb', 'solar' )
		            ),
		            'text_style'        => array(
		                'inline'            => __( 'Inline', 'solar' ),
		                'block'             => __( 'Block', 'solar' ),
		            ),
		            'text_align'        => array(
		                'text-center'       => __( 'Text Center', 'solar' ),
		                'text-left'         => __( 'Text Left', 'solar' ),
		                'text-right'        => __( 'Text Right', 'solar' ),
		                'text-justify'      => __( 'Text Justified', 'solar' ),
		            ),
		        ),
		        'default'        => array(
		            'type'              => 'breadcrumb_default',
		            'bg_color'          => '#f2f2f2',
		            'background'        => TVLGIAO_WPDANCE_THEME_IMAGES.'/banner_breadcrumb.jpg',
		            'height'            => '60',
		            'text_color'        => '#212121',
		            'text_style'        => 'inline',
		            'text_align'        => 'text-center',
		            //breadcrumb custom setting for special template
		            'blog_archive'		=> false,
					'product_archive'	=> false,
					'woo_special_page'	=> false,
					'search_page'		=> false,
		        ),
		    ),
		    'woo'   		=> array(
		    	'config'   		=> array(
			        'choose'        => array(
			        	'button_position'	=> array(
	                        'after-content'    => __( 'After Content Detail', 'solar' ),
	                        'before-content'   => __( 'Before Content Detail', 'solar' ),
	                    ),
			        ),
			        'default'       => array(
			            'display_buttons'       => true,
			            'button_position' 		=> 'after-content',
			            'wishlist_default'   	=> false,
			            'compare_default'       => false,
			            'title'         		=> true,
			            'title_word'			=> '5',
			            'desc'         			=> false,
			            'desc_word'         	=> '40',
			            'rating'         		=> true,
			            'price'         		=> true,
			            'price_decimal'         => false,
			            'meta'         			=> true,
			        ),
		        ),
		        'visual'   	=> array(
			        'choose'        => array(
			        	'hover_style'		=> array(
		                    'wd-hover-style-1' => array(
		                        'alt' => 'Style Hover 1',
		                        'img' => TVLGIAO_WPDANCE_THEME_IMAGES . '/products/wd-hover-style-1.png'
		                    ),
		                ),
			        ),
			        'default'       => array(
			            'popup_cart'			=> true,
			            'popup_width'			=> 800,
			            'popup_height'			=> 300,
			            'hover_thumbnail'		=> true,
			            'hover_style'       	=> 'wd-hover-style-1',
			        ),
		        ),
		        'woo_template'   	=> array(
			        'choose'        => array(
			        ),
			        'default'       => array(
			            'custom_shortcode'		=> '[vc_row][vc_column][tvlgiao_wpdance_brand_slider][/vc_column][/vc_row]',
			        ),
		        ),
		        'archive'   	=> array(
			        'choose'        => array(
			        ),
			        'default'       => array(
			            'posts_per_page'        => '24',
			            'custom_shortcode'		=> '[vc_row][vc_column][tvlgiao_wpdance_brand_slider][/vc_column][/vc_row]',
			        ),
		        ),
		        'single'  	 	=> array(
			        'choose'        => array(
			        	'position_thumbnail'	=> array(
		                    'left'      => __( 'Left', 'solar' ),
		                    'bottom'    => __( 'Bottom', 'solar' ), 
		                ),
		                'summary_layout'		=> array(
		                    'woocommerce_template_single_price'             => __( 'Price', 'solar' ),
		                    'tvlgiao_wpdance_template_single_review'        => __( 'Review', 'solar' ),
		                    'tvlgiao_wpdance_template_single_sku'           => __( 'Sku', 'solar' ),
		                    'tvlgiao_wpdance_template_single_availability'  => __( 'Availability', 'solar' ),
		                    'woocommerce_template_single_excerpt'			=> __( 'Excerpt', 'solar' ),
		                    'woocommerce_template_single_add_to_cart'       => __( 'Add To Cart', 'solar' ),
		                    'tvlgiao_wpdance_get_product_categories'        => __( 'Categories', 'solar' ),
		                )
			        ),
			        'default'       => array(
			            'position_thumbnail'    => 'left',
			            'thumbnail_number'		=> '3',
			            'summary_layout'		=> array(
		                    'woocommerce_template_single_price'             => true,
		                    'tvlgiao_wpdance_template_single_review'        => true,
		                    'tvlgiao_wpdance_template_single_sku'           => true,
		                    'tvlgiao_wpdance_template_single_availability'  => true,
		                    'woocommerce_template_single_excerpt'           => true,
		                    'woocommerce_template_single_add_to_cart'       => true,
		                    'tvlgiao_wpdance_get_product_categories'        => false,
		                ),
		                'custom_shortcode'		=> '[vc_row][vc_column][tvlgiao_wpdance_feature_category id="64" columns="3" number_feature="3" text_align="text-center" icon_size="fa-3x" style_font="separate-from-title" excerpt="0" readmore="0"][/vc_column][/vc_row]',
		                'fullwidth'				=> false,
		                'recent'				=> true,
		                'upsell'				=> false,
			        ),
		        ),
		        'cart_page'   	=> array(
			        'choose'        => array(
			        ),
			        'default'       => array(
			            'payment_method'		=> '[tvlgiao_wpdance_payment_icon list_icon_payment=" fa-cc-amex, fa-cc-discover, fa-cc-mastercard, fa-cc-paypal, fa-cc-visa"]',
			            'custom_shortcode'		=> '[vc_row][vc_column][tvlgiao_wpdance_title heading_element="h2" text_align="text-center" display_button="0" title="YOU MAY ALSO LIKE"][tvlgiao_wpdance_special_products_slider view_all_link_display="0" id_category="-1" columns="4" per_slide="1" class="row"][/vc_column][/vc_row]',
			        ),
		        ),
		        'mini_cart'   	=> array(
			        'choose'        => array(
			        	'sorter'		=> array(
		                    'cart_icon'     => __( 'Cart Icon', 'solar' ),
		                    'cart_text'     => __( 'Cart Text', 'solar' ),
		                    'cart_item'     => __( 'Cart Item', 'solar' ),
		                    'cart_total'    => __( 'Cart Total', 'solar' ),
		                ),
		                'cart_icon'		=> array(
		                    'lnr lnr-cart'        	   	=> 'lnr lnr-cart',
		                    'fa fa-shopping-cart'      	=> 'fa fa-shopping-cart',
		                    'fa fa-shopping-bag'       	=> 'fa fa-shopping-bag',
		                    'fa fa-cart-arrow-down'    	=> 'fa fa-cart-arrow-down',
		                    'fa fa-cart-plus'          	=> 'fa fa-cart-plus',
		                    'fa fa-opencart'           	=> 'fa fa-opencart',
		                )
			        ),
			        'default'       => array(
			            'sorter'		=> array(
		                    'cart_icon'     => true,
		                    'cart_text'     => true,
		                    'cart_item'     => true,
		                    'cart_total'    => false,
		                ),
		                'cart_icon'			=> 'lnr lnr-cart',
			        ),
		        ),
		        'sale_flash'   	=> array(
			        'choose'        => array(
			        ),
			        'default'       => array(
			            'text'			=> 'Sale!',
			            'percent'		=> false,
			        ),
		        ),
		    ),
		    'blog'   		=> array(
		    	'config'   		=> array(
			        'choose'        => array(
			        ),
			        'default'       => array(
			            'title'         		=> true,
			            'thumbnail'         	=> true,
			            'show_by_post_format'   => true,
			            'placeholder'         	=> false,
			            'date'         			=> true,
			            'meta'         			=> true,
			            'author'         		=> true,
			            'comment'         		=> true,
			            'tag'         			=> true,
			            'category'         		=> true,
			            'excerpt'         		=> true,
			            'excerpt_word'       	=> '-1',
			            'readmore'         		=> true,
			        ),
		        ),
		        'archive'   	=> array(
			        'choose'        => array(
			        	'style'			=> array(
		                    'list'      => esc_html__( 'List', 'solar' ),
		                    'grid'      => esc_html__( 'Grid', 'solar' ),
		                ),
			        ),
			        'default'       => array(
			            'style'         => 'list',
			        ),
		        ),
		        'single'  	 	=> array(
			        'choose'        => array(
			        	'recent_style'		=> array(
		                    'list'      => esc_html__( 'List', 'solar' ),
		                    'grid'      => esc_html__( 'Grid', 'solar' ),
		                ),
			        ),
			        'default'       => array(
			            'author'         	=> false,
			            'previous_next'		=> true,
			            'recent'			=> true,
			            'recent_style'		=> 'list',
			        ),
		        ),
		        'index'   		=> array(
			        'choose'        => array(
			        	'style'			=> array(
		                    'list'      => esc_html__( 'List', 'solar' ),
		                    'grid'      => esc_html__( 'Grid', 'solar' ),
		                ),
			        ),
			        'default'       => array(
			            'style'         => 'grid',
			        ),
		        ),
		    ),
		    '404_page'   	=> array(
		        'choose'        => array(
		            'bg_style'         => array(
	                    'bg_image'          => esc_html__( 'Background Image', 'solar' ),
	                    'bg_color'          => esc_html__( 'Background Color', 'solar' ),
	                ),
		        ),
		        'default'       => array(
		            'bg_style'     		=> 'bg_image',
		            'bg_color'      	=> '#fff',
		            'bg_image'      	=> TVLGIAO_WPDANCE_THEME_IMAGES.'/bg_404.jpg',
		            'header_footer'		=> false,
		            'search_form'		=> false,
		            'button'			=> true,
		            'button_text'		=> 'Back To Homepage',
		            'button_class'		=> '',
		            'custom_shortcode'	=> '[vc_row][vc_column][vc_row_inner][vc_column_inner width="1/4"][tvlgiao_wpdance_site_header custom_logo_url="290"][/vc_column_inner][vc_column_inner width="3/4"][tvlgiao_wpdance_pages_list ids="410,415,6,2749,2745"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]',
		        )
		    ),
		    'search_page'   => array(
		        'choose'        => array(
		            'bg_style'         	=> array(
	                    'bg_image'          => esc_html__( 'Background Image', 'solar' ),
	                    'bg_color'          => esc_html__( 'Background Color', 'solar' ),
	                ),
	                'type'         		=> array(
	                    'post'          	=> esc_html__( 'Search Blog', 'solar' ),
	                    'product'          	=> esc_html__( 'Search Product', 'solar' ),
	                ),
		        ),
		        'default'       => array(
		            'bg_style'     		=> 'bg_color',
		            'bg_color'      	=> '#fff',
		            'bg_image'      	=> TVLGIAO_WPDANCE_THEME_IMAGES.'/bg_404.jpg',
		            'type'      		=> 'post',
		            'autocomplete'      => '1',
		            'ajax'     			=> '0',
		        )
		    ),
		    'back_to_top'   => array(
		        'choose'        => array(
		            'style'         => array(
		                '1'             => __( 'Icon Only', 'solar' ),
		                '0'             => __( 'Icon & Background', 'solar' ),
		            ),
		            'bg_shape'      => array(
		                '1'             => __( 'Rounded', 'solar' ),
		                '0'             => __( 'Square', 'solar' ),
		            ),
		        ),
		        'default'       => array(
		            'display'       => true,
		            'style'         => '0',
		            'bg_color'      => '#333333',
		            'border_color'  => array(
				        'color'     => '#BBBBBB',
				        'alpha'     => 0.3
				    ),
		            'bg_shape'      => '1',
		            'icon'          => 'el el-chevron-up',
		            'icon_color'    => '#dddddd',
		            'width' 		=> '40px',
		            'height' 		=> '40px',
		            'right' 		=> '20px',
		            'bottom' 		=> '50px',
		        )
		    ),
		    'effects'   => array(
		        'default'       => array(
		            'loading'       => false,
		            'sidebar_fixed' => true,
		        )
		    ),
		    'email_popup'   => array(
		    	'choose'        => array(
		    		'source'   => array(
		                'feedburner'         => __( 'Feedburner Form', 'solar' ),
		                'custom'             => __( 'Custom Content', 'solar' ),
		            ),
		        ),
		        'default'       => array(
					'display'       		=> false,
					'only_home'				=> true,
					'popup_mobile'			=> false,
					'delay_time'			=> '5',	//seconds
					'session_expire'		=> '30', //minutes
					'banner'				=> '',
					'source'				=> 'feedburner', //or custom
					'custom_content'		=> '',
					'feedburner_id'			=> 'WpComic-Manga',
					'width'					=> '800',
					'height'				=> '300',
		            'title'					=> 'Sign up for Our Newsletter',
					'desc'					=> 'A newsletter is a regularly distributed publication generally',
					'placeholder'			=> 'Enter your email address',
					'button_text'			=> 'Subscribe',
					
		        )
		    ),
		    'fb_chatbox' => array(
		    	'choose'        => array(
		            'default_mode'   => array(
		                '1'             => __( 'Show', 'solar' ),
		                '0'             => __( 'Hide', 'solar' ),
		            ),
		        ),
		        'default'       => array(
		            'display'  	 	=> false,
		            'url' 			=> 'https://www.facebook.com/WeLoveMTPSonTung/',
		            'width' 		=> '250px',
		            'height' 		=> '325px',
		            'right' 		=> '20px',
		            'bottom' 		=> '0px',
		            'default_mode' 	=> '0', //0 = hide , 1 = show
		            'bg_color' 		=> '#3b5998',
		            'logo'      	=> TVLGIAO_WPDANCE_THEME_IMAGES.'/logo_footer.png',
		            'text_footer'   => __( 'Send a message to us...', 'solar' ),
		            'link_caption'  => __( 'Visit us on facebook', 'solar' ),
		            'link_url'  	=> '#',
		        )
		    ),
		    'social_share'  => array(
		        'default'       => array(
		            'display'       => false,
		            'pubid'       	=> 'ra-547e8f2f2a326738',
		        )
		    ),
		    'comment'       => array(
		    	'choose'        => array(
		            'sorter'        => array(
	                    'wordpress' 	=> __( 'Wordpress Comment', 'solar' ),
	                    'facebook'  	=> __( 'Facebook Comment', 'solar' ),
	                ),
	                'mode'         	=> array(
                        '1'    			=> __( 'Multi Domain', 'solar' ),
                        '0'    			=> __( 'Single Domain', 'solar' ),
                    ),
                    'layout'        => array(
                        '1'    			=> __( 'Tab', 'solar' ),
                        '0'    			=> __( 'Normal', 'solar' ),
                    ),
		        ),
		        'default'       => array(
		            'sorter'        => array(
	                    'wordpress' 	=> true,
	                    'facebook'  	=> false,
	                ),
	                'single_product' 	=> false,
	                'number_comment' 	=> 10,
	                'mode'		 		=> '1', //1 = multi domain, 0 = single domain
	                'layout'		 	=> '1', //1 = tab, 0 = normal
		        )
	    	),
		);
	}
} ?>