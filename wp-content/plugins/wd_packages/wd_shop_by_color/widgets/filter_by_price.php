<?php
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	if (!class_exists('tvlgiao_wpdance_widget_product_price_filter')) {
		class tvlgiao_wpdance_widget_product_price_filter extends WP_Widget {
			
		    public function __construct() {
		        /* Widget variable settings. */
				$this->wpdance_widget_cssclass 		= 'woocommerce widget_layered_nav wd_woocommerce_price_filter';
				$this->wpdance_widget_description	= __( 'Shows prices filter for product category/shop page.', 'wd_package' );
				$this->wpdance_widget_idbase 		= 'wd_widget_product_filter_by_price';
				$this->wpdance_widget_name 			= __( 'WD - Product Price Filter', 'wd_package' );

				/* Widget settings. */
				$widget_ops = array( 'classname' => $this->wpdance_widget_cssclass, 'description' => $this->wpdance_widget_description );

				/* Create the widget. */
				parent::__construct( 'wd_widget_product_filter_by_price', $this->wpdance_widget_name, $widget_ops );
		    }

		    public function widget( $args, $instance ) {
		        global $wp, $wp_the_query;
		        if ( ! is_post_type_archive( 'product' ) && ! is_tax( get_object_taxonomies( 'product' ) ) && !is_page_template( 'page-templates/template-woocomerce.php' ) ) {
		            return;
		        }
		        
		        $title  	= $instance['title'];
		        $range  	= $instance['range'];

		        $min_price = isset( $_GET['min_price'] ) ? esc_attr( $_GET['min_price'] ) : '';
		        $max_price = isset( $_GET['max_price'] ) ? esc_attr( $_GET['max_price'] ) : '';

		        // Find min and max price in current result set
		        $prices = $this->get_filtered_price();
		        $min    = floor( $prices->min_price );
		        $max    = ceil( $prices->max_price );
		        
		        if ( $min === $max ) {
		            return;
		        }

		        echo $args['before_widget'];
		        $widgetID = 'widget_'.$args['widget_id'];
		        if ( ! empty( $title ) ) {
		            echo $args['before_title'] . apply_filters( 'widget_title', $title ) . $args['after_title'];
		        }

		        $form_action = $this->get_page_base_url();

		        /*if ( '' === get_option( 'permalink_structure' ) ) {
		            $all_price_link = remove_query_arg( array( 'page', 'paged' ), add_query_arg( $wp->query_string, '', home_url( $wp->request ) ) );
		        } else {
		            $all_price_link = preg_replace( '%\/page/[0-9]+%', '', home_url( trailingslashit( $wp->request ) ) );
		        }*/
		        $all_price_link = '';
		        if($min_price || $max_price) {
		            $all_price_link = remove_query_arg(array('min_price','max_price'),$form_action);
		        }

		        /**
		         * Adjust max if the store taxes are not displayed how they are stored.
		         * Min is left alone because the product may not be taxable.
		         * Kicks in when prices excluding tax are displayed including tax.
		         */
		        if ( wc_tax_enabled() && 'incl' === get_option( 'woocommerce_tax_display_shop' ) && ! wc_prices_include_tax() ) {
		            $tax_classes = array_merge( array( '' ), WC_Tax::get_tax_classes() );
		            $class_max   = $max;

		            foreach ( $tax_classes as $tax_class ) {
		                if ( $tax_rates = WC_Tax::get_rates( $tax_class ) ) {
		                    $class_max = $max + WC_Tax::get_tax_total( WC_Tax::calc_exclusive_tax( $max, $tax_rates ) );
		                }
		            }

		            $max = $class_max;
		        }

		        ?>
		        <ul class="wd-product-filter-by-price">
	        		<?php  $active_class = (!$min_price || !$max_price) ? 'chosen' : ''; ?>
		            <li class="wd-product-filter-by-price-item <?php echo esc_attr($active_class); ?>"><a href="<?php echo esc_url($all_price_link);?>"><?php echo esc_html('All price','wd_package');?></a></li>
		            <?php
		            $diff = $min;
		            $range = !empty( $range ) ? intval($range) : 10000;
		            while($diff < $max):
		                $diff2 = $diff + $range - 1;
		                if($diff2 >= $max) $diff2 = $max;

		                $form_action = add_query_arg(
		                    array(
		                        'min_price' => $diff,
		                        'max_price' => $diff2
		                    ),
		                    $form_action
		                );
		                $item_title   	= wc_price($diff) . ' - ' . wc_price($diff2);
		                $item_count   	= '<span class="count">('. $this->get_count_post($diff,$diff2) .')</span>';
		                $active_class 	= ($min_price == $diff && $max_price == $diff2) ? 'chosen' : '';
		                $form_action 	= ($min_price == $diff && $max_price == $diff2) ? esc_url($all_price_link) : $form_action;
		                ?>
		                <li class="wd-product-filter-by-price-item <?php echo esc_attr($active_class); ?>">
		                    <a href="<?php echo esc_url($form_action);?>"><?php echo $item_title; ?></a><?php echo $item_count;?>
		                </li>
		                <?php
		                $diff = $diff + $range;
		            endwhile;?>
		        </ul>
		        <?php
		        echo $args['after_widget'];
		    }
		    public function form( $instance ) {
		        $title 		= ! empty( $instance['title'] ) ? $instance['title'] : esc_html('Filter By Price','wd_package');
		        $range 		= ! empty( $instance['range'] ) ? $instance['range'] : '10000';
		        ?>
		        <p>
		            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label>
		            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		        </p>
		        <p>
		            <label for="<?php echo esc_attr( $this->get_field_id( 'range' ) ); ?>"><?php _e( esc_attr( 'Range size:' ) ); ?></label>
		            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'range' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'range' ) ); ?>" type="number" value="<?php echo esc_attr( $range ); ?>">
		        </p>
		        <?php
		    }
		    public function update( $new_instance, $old_instance ) {
		        $instance = array();
		        $instance['title']	 	= $new_instance['title'];
		        $instance['range']		= $new_instance['range'];
		        return $instance;
		    }
		    protected function get_filtered_price() {
		        global $wpdb, $wp_the_query;

		        $args       = $wp_the_query->query_vars;
		        $tax_query  = isset( $args['tax_query'] ) ? $args['tax_query'] : array();
		        $meta_query = isset( $args['meta_query'] ) ? $args['meta_query'] : array();

		        if ( ! empty( $args['taxonomy'] ) && ! empty( $args['term'] ) ) {
		            $tax_query[] = array(
		                'taxonomy' => $args['taxonomy'],
		                'terms'    => array( $args['term'] ),
		                'field'    => 'slug',
		            );
		        }

		        foreach ( $meta_query + $tax_query as $key => $query ) {
		            if ( ! empty( $query['price_filter'] ) || ! empty( $query['rating_filter'] ) ) {
		                unset( $meta_query[ $key ] );
		            }
		        }

		        $meta_query = new WP_Meta_Query( $meta_query );
		        $tax_query  = new WP_Tax_Query( $tax_query );

		        $meta_query_sql = $meta_query->get_sql( 'post', $wpdb->posts, 'ID' );
		        $tax_query_sql  = $tax_query->get_sql( $wpdb->posts, 'ID' );

		        $sql  = "SELECT min( FLOOR( price_meta.meta_value ) ) as min_price, max( CEILING( price_meta.meta_value ) ) as max_price FROM {$wpdb->posts} ";
		        $sql .= " LEFT JOIN {$wpdb->postmeta} as price_meta ON {$wpdb->posts}.ID = price_meta.post_id " . $tax_query_sql['join'] . $meta_query_sql['join'];
		        $sql .= " 	WHERE {$wpdb->posts}.post_type IN ('" . implode( "','", array_map( 'esc_sql', apply_filters( 'woocommerce_price_filter_post_type', array( 'product' ) ) ) ) . "')
							AND {$wpdb->posts}.post_status = 'publish'
							AND price_meta.meta_key IN ('" . implode( "','", array_map( 'esc_sql', apply_filters( 'woocommerce_price_filter_meta_keys', array( '_price' ) ) ) ) . "')
							AND price_meta.meta_value > '' ";
		        $sql .= $tax_query_sql['where'] . $meta_query_sql['where'];

		        if ( $search = WC_Query::get_main_search_query_sql() ) {
		            $sql .= ' AND ' . $search;
		        }

		        return $wpdb->get_row( $sql );
		    }
		    protected function get_page_base_url() {
		        if ( defined( 'SHOP_IS_ON_FRONT' ) ) {
		            $link = home_url();
		        } elseif ( is_post_type_archive( 'product' ) || is_page( wc_get_page_id( 'shop' ) ) || is_page_template( 'page-templates/template-woocomerce.php' ) ) {
		            $link = get_post_type_archive_link( 'product' );
		        } elseif ( is_product_category() ) {
		            $link = get_term_link( get_query_var( 'product_cat' ), 'product_cat' );
		        } elseif ( is_product_tag() ) {
		            $link = get_term_link( get_query_var( 'product_tag' ), 'product_tag' );
		        } else {
		            $queried_object = get_queried_object();
		            $link = get_term_link( $queried_object->slug, $queried_object->taxonomy );
		        }

		        // Min/Max
		        if ( isset( $_GET['min_price'] ) ) {
		            $link = add_query_arg( 'min_price', wc_clean( $_GET['min_price'] ), $link );
		        }

		        if ( isset( $_GET['max_price'] ) ) {
		            $link = add_query_arg( 'max_price', wc_clean( $_GET['max_price'] ), $link );
		        }

		        // Orderby
		        if ( isset( $_GET['orderby'] ) ) {
		            $link = add_query_arg( 'orderby', wc_clean( $_GET['orderby'] ), $link );
		        }

		        /**
		         * Search Arg.
		         * To support quote characters, first they are decoded from &quot; entities, then URL encoded.
		         */
		        if ( get_search_query() ) {
		            $link = add_query_arg( 's', rawurlencode( htmlspecialchars_decode( get_search_query() ) ), $link );
		        }

		        // Post Type Arg
		        if ( isset( $_GET['post_type'] ) ) {
		            $link = add_query_arg( 'post_type', wc_clean( $_GET['post_type'] ), $link );
		        }

		        // Min Rating Arg
		        if ( isset( $_GET['rating_filter'] ) ) {
		            $link = add_query_arg( 'rating_filter', wc_clean( $_GET['rating_filter'] ), $link );
		        }

		        // All current filters
		        if ( $_chosen_attributes = WC_Query::get_layered_nav_chosen_attributes() ) {
		            foreach ( $_chosen_attributes as $name => $data ) {
		                $filter_name = sanitize_title( str_replace( 'pa_', '', $name ) );
		                if ( ! empty( $data['terms'] ) ) {
		                    $link = add_query_arg( 'filter_' . $filter_name, implode( ',', $data['terms'] ), $link );
		                }
		                if ( 'or' == $data['query_type'] ) {
		                    $link = add_query_arg( 'query_type_' . $filter_name, 'or', $link );
		                }
		            }
		        }

		        return $link;
		    }

		    function get_count_post($min_price = '', $max_price = ''){
		        if(!$max_price) return false;
		        global $wp_the_query;
		        $old_query       = $wp_the_query->query_vars;
		        $args = array(
		            'post_type' => array('product'),
		            'post_status'   =>  'publish',
		            'posts_per_page'    =>  -1,
		            'meta_query' => array(
		                array(
		                    'key' => '_price',
		                    'value' => array($min_price, $max_price),
		                    'compare' => 'BETWEEN',
		                    'type' => 'NUMERIC'
		                )
		            )
		        );

		        $tax_query  = isset( $old_query['tax_query'] ) ? $old_query['tax_query'] : array();
		        if ( version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
		            $tax_query[] = array(
		                'taxonomy' => 'product_visibility',
		                'field' => 'name',
		                'terms' => 'exclude-from-catalog',
		                'operator' => 'NOT IN',
		            );
		        } else {
		            $args['meta_query'][] = array(
		                'key' => '_visibility',
		                'value' => array( 'catalog', 'visible' ),
		                'compare' => 'IN'
		            );
		        }
		        if(is_tax()){
		            if ( ! empty( $old_query['taxonomy'] ) && ! empty( $old_query['term'] ) ) {
		                $tax_query[] = array(
		                    'taxonomy' => $old_query['taxonomy'],
		                    'terms'    => array( $old_query['term'] ),
		                    'field'    => 'slug',
		                );
		            }
		        }
		        $args['tax_query']  = $tax_query;
		        $myposts = get_posts($args);
		        return count($myposts);
		    }
		}
	}
} ?>