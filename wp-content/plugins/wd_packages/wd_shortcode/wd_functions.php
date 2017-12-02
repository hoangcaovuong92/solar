<?php
// Check Woo
if( !function_exists('tvlgiao_wpdance_is_woocommerce') ){
	function tvlgiao_wpdance_is_woocommerce(){
		$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
		return ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) ? false : true;
	} 
}
// Check wishlist plugin
if( !function_exists('tvlgiao_wpdance_is_wishlist_active') ){
	function tvlgiao_wpdance_is_wishlist_active(){
		$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
		return ( !in_array( "yith-woocommerce-wishlist/init.php", $_actived ) ) ? false : true;
	} 
}

// Get Data Choose normal for widget
if(!function_exists ('tvlgiao_wpdance_get_data')){
	function tvlgiao_wpdance_get_data($array_data){
		global $post;
		$data_array = array();
		$data = new WP_Query($array_data);
		if( $data->have_posts() ){
			while( $data->have_posts() ){
				$data->the_post();
				$data_array[$post->ID] = $post->post_title;
			}
		}
		wp_reset_postdata();
		return $data_array;
	}
}

if ( ! function_exists( 'tvlgiao_wpdance_get_list_blog_special_layout' ) ) {
	function tvlgiao_wpdance_get_list_blog_special_layout() {
		return  array(
			array(
				0 => 'title',
		      	1 =>  __( 'Title', 'wpdancelaparis' ),
			),
			array(
				0 => 'meta',
		      	1 =>  __( 'Meta', 'wpdancelaparis' ),
			),
			array(
				0 => 'excerpt',
		      	1 =>  __( 'Excerpt', 'wpdancelaparis' ),
			),
			array(
				0 => 'readmore',
		      	1 =>  __( 'Readmore', 'wpdancelaparis' ),
			),
		);
	}
}

// Get Data Choose for visual composer
if(!function_exists ('tvlgiao_wpdance_get_sub_categories_accordion')){
	function tvlgiao_wpdance_get_sub_categories_accordion($category_id, $instance, $current_cat, $level){
		$args = array(
		   'taxonomy'     => 'product_cat',
		   'child_of'     => 0,
		   'parent'       => $category_id,
		   'orderby'      => $instance['order_by'],
		   'order'        => $instance['sort'],
		   'hierarchical' => 0,
		   'title_li'     => '',
		   'hide_empty'   => 0
		);
		$sub_cats = get_categories( $args );
		if($sub_cats) {
			if($instance['order_by'] == 'rand'){
				shuffle($sub_cats);
			}
			echo '<ul class="sub_cat">';
			foreach($sub_cats as $sub_category) {
				$current_class = ($current_cat == $sub_category->slug)?'current':'';
				echo '<li>';
				echo '<a href="'. get_term_link($sub_category, 'product_cat') .'" class="'.$current_class.'">';
				echo str_repeat('&#151;', $level).' '. $sub_category->name;
				if( $instance['show_product_count'] ){
					echo ' (' . $sub_category->count . ')';
				}
				echo "</a>";
				tvlgiao_wpdance_get_sub_categories_accordion($sub_category->term_id, $instance, $current_cat, $level+1);
				echo '</li>';
			}
			echo '</ul>';

		}
	}
}

// Get Data Choose for visual composer
if(!function_exists ('tvlgiao_wpdance_vc_get_data')){
	function tvlgiao_wpdance_vc_get_data_by_post_type($post_type = 'post', $posts_per_page = -1){
		$args = array(
			'post_type'			=> $post_type,
			'post_status'		=> 'publish',
			'posts_per_page' 	=> $posts_per_page,
		);
		$data_array = array();
		global $post;
		$data = new WP_Query($args);
		if( $data->have_posts() ){
			while( $data->have_posts() ){
				$data->the_post();
				$data_array[] = array(
					'label' => html_entity_decode( $post->post_title, ENT_QUOTES, 'UTF-8' ).' ('.$post->ID.')',
					'value' => $post->ID,	
				);
			}
		}
		wp_reset_postdata();
		return $data_array;
	}
} 

// Get List TVLGIAO Columns
if(!function_exists ('tvlgiao_wpdance_vc_get_list_tvgiao_columns')){
	function tvlgiao_wpdance_vc_get_list_tvgiao_columns(){
		return array(
			__( '1 Columns', 'wpdancelaparis' )		=> '1',
			__( '2 Columns', 'wpdancelaparis' )		=> '2',
			__( '3 Columns', 'wpdancelaparis' )		=> '3',
			__( '4 Columns', 'wpdancelaparis' )		=> '4',
			__( '5 Columns', 'wpdancelaparis' )		=> '5',
			__( '6 Columns', 'wpdancelaparis' )		=> '6',
			__( '8 Columns', 'wpdancelaparis' )		=> '8',
			__( '12 Columns', 'wpdancelaparis' )	=> '12',
		);
	}
}


// Get List TVLGIAO Text Align Bootstrap
if(!function_exists ('tvlgiao_wpdance_vc_get_list_text_align_bootstrap')){
	function tvlgiao_wpdance_vc_get_list_text_align_bootstrap(){
		return array(
			__( 'Default', 'wpdancelaparis' ) 			=> 'wd-text-align-default',
			__( 'Text Center', 'wpdancelaparis' ) 		=> 'text-center',
			__( 'Text Left', 'wpdancelaparis' ) 		=> 'text-left'	,
			__( 'Text Right', 'wpdancelaparis' ) 		=> 'text-right',
			__( 'Text Justified', 'wpdancelaparis' ) 	=> 'text-justify',
			__( 'Text No Wrap', 'wpdancelaparis' ) 		=> 'text-nowrap',
		);
	}
}

// Get List name of special product
if(!function_exists ('tvlgiao_wpdance_vc_get_list_special_product_name')){
	function tvlgiao_wpdance_vc_get_list_special_product_name(){
		return array(
			__( 'Recent Product', 'wpdancelaparis' )		=> 'recent_product',
			__( 'Most View Product', 'wpdancelaparis' )		=> 'mostview_product',
			__( 'On Sale Product', 'wpdancelaparis' )		=> 'onsale_product',
			__( 'Featured Product', 'wpdancelaparis' )		=> 'featured_product'
		);
	}
}

// Get List payment icon (awesome font)
if(!function_exists ('tvlgiao_wpdance_vc_get_list_payment_icon')){
	function tvlgiao_wpdance_vc_get_list_payment_icon(){
		return array(
			array( 'fa-cc-amex', 'fa-cc-amex' ),
			array( 'fa-cc-diners-club', 'fa-cc-diners-club' ),
			array( 'fa-cc-discover', 'fa-cc-discover' ),
			array( 'fa-cc-jcb', 'fa-cc-jcb' ),
			array( 'fa-cc-mastercard', 'fa-cc-mastercard' ),
			array( 'fa-cc-paypal', 'fa-cc-paypal' ),
			array( 'fa-cc-stripe', 'fa-cc-stripe' ),
			array( 'fa-cc-visa', 'fa-cc-visa' ),
			array( 'fa-credit-card', 'fa-credit-card' ),
			array( 'fa-credit-card-alt', 'fa-credit-card-alt' ),
			array( 'fa-google-wallet', 'fa-google-wallet' ),
			array( 'fa-paypal', 'fa-paypal' ),
		);
	}
}

// Get List font awesome size
if(!function_exists ('tvlgiao_wpdance_vc_get_list_awesome_font_size')){
	function tvlgiao_wpdance_vc_get_list_awesome_font_size(){
		return array(
			'1x'	=> 'fa-1x',
			'2x'	=> 'fa-2x',
			'3x'	=> 'fa-3x',
			'4x'	=> 'fa-4x',
			'5x'	=> 'fa-5x',
			'6x'	=> 'fa-6x',
		);
	}
}


if ( ! function_exists( 'tvlgiao_wpdance_get_order_by_values' ) ) {
	function tvlgiao_wpdance_get_order_by_values($type = '') {
		if ($type == 'product') {
			$order_by = array(
		        __( 'Date', 'wpdancelaparis' ) 		=> 'date',
		        __( 'Title', 'wpdancelaparis' ) 	=> 'title',
		        __( 'Rand', 'wpdancelaparis' ) 		=> 'rand',
		        __( 'Price', 'wpdancelaparis' ) 	=> 'price',
		        __( 'Sales', 'wpdancelaparis' ) 	=> 'sales',
			);
		}elseif ($type == 'term') {
			$order_by = array(
		        __( 'Name', 'wpdancelaparis' ) 			=> 'name',
				__( 'Count', 'wpdancelaparis' ) 		=> 'count',
				__( 'Slug', 'wpdancelaparis' ) 			=> 'slug',
				__( 'Term Group', 'wpdancelaparis' ) 	=> 'term_group',
				__( 'Term Order', 'wpdancelaparis' ) 	=> 'term_order',
				__( 'Term ID', 'wpdancelaparis' ) 		=> 'term_id',
			);
		}else{
			$order_by = array(
		        __( 'Date', 'wpdancelaparis' ) 	=> 'date',
		        __( 'Title', 'wpdancelaparis' ) => 'title',
		        __( 'Rand', 'wpdancelaparis' ) 	=> 'rand',
			);
		}
		return $order_by;
	}
}

if ( ! function_exists( 'tvlgiao_wpdance_get_sort_by_values' ) ) {
	function tvlgiao_wpdance_get_sort_by_values() {
		return array(
            __( 'DESC', 'wpdancelaparis' ) 	=> 'DESC',
			__( 'ASC', 'wpdancelaparis' ) 	=> 'ASC',
		);
	}
}

// Get List woocomemrce image size
if(!function_exists ('tvlgiao_wpdance_vc_get_list_woocommerce_image_size')){
	function tvlgiao_wpdance_vc_get_list_woocommerce_image_size($fullsize = true){
		if ($fullsize == true) {
			$list_woocommerce_image_size = array(
				__( 'Fullsize', 'wpdancelaparis' )					=> 'full',
				__( 'Shop Catalog', 'wpdancelaparis' )				=> 'shop_catalog',
				__( 'Shop Single (Big)', 'wpdancelaparis' ) 		=> 'shop_single',
				__( 'Shop Thumbnail (Small)', 'wpdancelaparis' )	=> 'shop_thumbnail',
			);
		} else {
			$list_woocommerce_image_size = array(
				__( 'Shop Catalog', 'wpdancelaparis' )				=> 'shop_catalog',
				__( 'Shop Single (Big)', 'wpdancelaparis' ) 		=> 'shop_single',
				__( 'Shop Thumbnail (Small)', 'wpdancelaparis' )	=> 'shop_thumbnail',
			);
		}
		return $list_woocommerce_image_size;
	}
}

// Get link target
if(!function_exists ('tvlgiao_wpdance_vc_get_list_link_target')){
	function tvlgiao_wpdance_vc_get_list_link_target(){
		return array(
			__( 'New window', 'wpdancelaparis' ) 		=> '_blank',
 			__( 'Current window', 'wpdancelaparis' ) 	=> '_self',	
 			__( 'Parent', 'wpdancelaparis' ) 			=> '_parent',
		);
	}
}

// Get List Slider Type (Slick or Owl)
if(!function_exists ('tvlgiao_wpdance_vc_get_list_slider_type')){
	function tvlgiao_wpdance_vc_get_list_slider_type(){
		return array(
			__( 'Owl Carousel', 'wpdancelaparis' ) 	=> 'owl',
			__( 'Slick', 'wpdancelaparis' )			=> 'slick'
		);
	}
}

// Get List Image Size
if(!function_exists ('tvlgiao_wpdance_vc_get_list_image_size')){
	function tvlgiao_wpdance_vc_get_list_image_size($fullsize = true){
		global $_wp_additional_image_sizes;
		$image_size = array();
		if ($fullsize) {
			$image_size['Full'] = 'full';
		}
		foreach ($_wp_additional_image_sizes as $key => $value) {
			$image_size[$key.' - '.$value['width'].'x'.$value['height']] = $key;
		} 
		return $image_size;
	}
}

// Get List of menu theme location (registed)
if(!function_exists ('tvlgiao_wpdance_get_list_menu_registed')){
	function tvlgiao_wpdance_get_list_menu_registed(){
		$menu_registed = get_registered_nav_menus();
		$list_menu = array();
		if ($menu_registed) {
			foreach ($menu_registed as $menu => $value ) {
				$list_menu[] = array(
					'label' => html_entity_decode( $value, ENT_QUOTES, 'UTF-8' ).' ('.$menu.')',
					'value' => $menu,	
				);
			}
		}
		wp_reset_postdata();
		return $list_menu;
	}
}


if ( ! function_exists( 'tvlgiao_wpdance_get_category_name_by_ids' ) ) {
	function tvlgiao_wpdance_get_category_name_by_ids( $ids = array() ) {
		$output = array();
		foreach ( $ids as $id ) {
			if ( $term = get_term_by( 'id', $id, 'product_cat' ) ) {
				$output[] = array(
					'id'   => $term->term_id,
					'name' => $term->name,
					'slug' => str_replace( '_', '-', $term->slug ) . '-' . $term->term_id . '-' . rand(),
				);
			}
		}
		return $output;
	}
}


if ( ! function_exists( 'tvlgiao_wpdance_get_categories_by_category_parent' ) ) {
	function tvlgiao_wpdance_get_categories_by_category_parent( $id_category_parent ) {
		$args     = array(
			'hierarchical'     => 1,
			'show_option_none' => '',
			'hide_empty'       => 0,
			'parent'           => $id_category_parent,
			'taxonomy'         => 'product_cat',
		);
		$sub_cats = get_categories( $args );

		return $sub_cats;
	}
}

if ( ! function_exists( 'tvlgiao_wpdance_get_subcategory' ) ) {
	function tvlgiao_wpdance_get_subcategory( $id ) {
		$sub_categories = tvlgiao_wpdance_get_categories_by_category_parent( $id );
		$output         = array();
		foreach ( $sub_categories as $category ) {
			$output[] = array(
				'id'   => $category->term_id,
				'name' => html_entity_decode( $category->name, ENT_QUOTES, 'UTF-8' ),
				'slug' => str_replace( '_', '-', $category->slug ) . '-' . $category->term_id . '-' . rand(),
			);
		}

		return $output;
	}
}

// Get List terms of taxonomy
if(!function_exists ('tvlgiao_wpdance_vc_get_list_category')){
	function tvlgiao_wpdance_vc_get_list_category($taxonomy = 'product_cat', $all_category = true, $type = 'autocomplete'){
		/* type : 
		 * Default : autocomplete => return array with label & value 
		 * sorted_list  => return special array use for sorted_list type
		 */
		$list_categories = array();
		if ($all_category) {
			if ($type == 'sorted_list') {
				$list_categories[] = array( -1, esc_html__('All Category','wpdancelaparis') );
			}else{
				$list_categories[esc_html__('All Category','wpdancelaparis')] = -1;
			}
		}
		$args = array('hide_empty' 	=> 0);
		$condition = true;
		if($taxonomy == 'product_cat') {
			if( !class_exists('WooCommerce') ){
				$condition = false;
			}
		}
		if ($condition) {
			$categories = get_terms( $taxonomy, $args );
			if (!is_wp_error($categories) && count($categories) > 0) {
				foreach ($categories as $category ) {
					$name       = html_entity_decode( $category->name, ENT_QUOTES, 'UTF-8' ).' (' . $category->count . ' items)';
					$term_id    = $category->term_id;
					if ($type == 'sorted_list') {
						$list_categories[] = array( $term_id, $name );
					}else{
						$list_categories[] = array(
							'label' => $name,
							'value' => $term_id,	
						);	
					}
				}
			}
		}
		wp_reset_postdata();
		return $list_categories;
	}
}

// Get List pages
if(!function_exists ('tvlgiao_wpdance_vc_get_list_pages')){
	function tvlgiao_wpdance_vc_get_list_pages($type = 'sorted_list'){
		/* type : 
		 * Default : sorted_list  => return special array use for sorted_list type
		 */
		$args = array(
			'sort_column' => 'post_title',
			'post_type' => 'page',
			'post_status' => 'publish'
		); 
		$pages = get_pages($args);
		$list_pages = array();
		if (!is_wp_error($pages) && count($pages) > 0) {
			foreach ($pages as $page ) {
				$name       = html_entity_decode( $page->post_title, ENT_QUOTES, 'UTF-8' ).' ( ID: ' . $page->ID . ' )';
				$page_id    = $page->ID;
				if ($type == 'sorted_list') {
					$list_pages[] = array( $page_id, $name );
				}else{
					$list_pages[] = array(
						'label' => $name,
						'value' => $page_id,	
					);	
				}
			}
		}
		
		wp_reset_postdata();
		return $list_pages;
	}
}

if ( ! function_exists( 'tvlgiao_wpdance_get_product_categories_full' ) ) {
	function tvlgiao_wpdance_get_product_categories_full( $all_category = true, $type = "" ) {
		/* type : 
		 * Default : '' => return normal array
		 * autocomplete => return array with label & value 
		 * sorted_list  => return special array use for sorted_list type
		 */
		$args = array(
			'type'         => 'post',
			'child_of'     => 0,
			'parent'       => '',
			'orderby'      => 'id',
			'order'        => 'ASC',
			'hide_empty'   => false,
			'hierarchical' => 1,
			'exclude'      => '',
			'include'      => '',
			'number'       => '',
			'taxonomy'     => 'product_cat',
			'pad_counts'   => false,
		);

		$categories = get_categories( $args );

		$product_categories_dropdown = array();

		if ( $all_category ) {
			if ($type == 'autocomplete') {
				$product_categories_dropdown[] = array(
					'label' => __( 'All Category', 'wpdancelaparis' ),
					'value' => -1,
				);
			}elseif ($type == 'sorted_list') {
				$product_categories_dropdown[] = array( -1, __( 'All Category', 'wpdancelaparis' ) );
			}else{
				$product_categories_dropdown[ __( 'All Category', 'wpdancelaparis' ) ] = - 1;
			}
		}

		tvlgiao_wpdance_get_category_childs_full( 0, 0, $categories, 0, $product_categories_dropdown, $type );

		return $product_categories_dropdown;
	}
}

if ( ! function_exists( 'tvlgiao_wpdance_get_category_childs_full' ) ) {
	function tvlgiao_wpdance_get_category_childs_full( $parent_id, $pos, $array, $level, &$dropdown, $type = "" ) {
		for ( $i = $pos; $i < count( $array ); $i ++ ) {
			if ( $array[ $i ]->category_parent == $parent_id ) {
				$term_id    = $array[ $i ]->term_id;
				$name       = str_repeat( '- ', $level ) . $array[ $i ]->name;
				$name 		= html_entity_decode( $name, ENT_QUOTES, 'UTF-8' ).' [ ID: '.$term_id.' ]';
				if ($type == 'autocomplete') {
					$dropdown[] = array(
						'label' => $name,
						'value' => $term_id,	
					);
				}elseif ($type == 'sorted_list') {
					$dropdown[] = array( $term_id, $name );
				}else{
					$dropdown[$name] = $term_id;
				}
				tvlgiao_wpdance_get_category_childs_full( $array[ $i ]->term_id, $i, $array, $level + 1, $dropdown );
			}
		}
	}
} 

if ( ! function_exists( 'tvlgiao_wpdance_product_result_count' ) ) {
	function tvlgiao_wpdance_product_result_count($query = '') {
		global $wp_query; ?>
		<p class="woocommerce-result-count">
			<?php
			$my_query = ($query == '') ? $wp_query : $query;
			$paged    = max( 1, $my_query->get( 'paged' ) );
			$per_page = $my_query->get( 'posts_per_page' );
			$total    = $my_query->found_posts;
			$first    = ( $per_page * $paged ) - $per_page + 1;
			$last     = min( $total, $my_query->get( 'posts_per_page' ) * $paged );

			if ( $total <= $per_page || -1 === $per_page ) {
				/* translators: %d: total results */
				printf( _n( 'Showing the single result', 'Showing all %d results', $total, 'woocommerce' ), $total );
			} else {
				/* translators: 1: first result 2: last result 3: total results */
				printf( _nx( 'Showing the single result', 'Showing %1$d&ndash;%2$d of %3$d results', $total, 'with first and last result', 'woocommerce' ), $first, $last, $total );
			}
			?>
		</p>
	<?php
	}
} 

if ( ! function_exists( 'tvlgiao_wpdance_product_ordering' ) ) {
	function tvlgiao_wpdance_product_ordering() {  ?>
		<form action="shop" class="woocommerce-ordering" method="get">
			<select name="orderby" class="orderby">
				<option value="menu_order" selected="selected"><?php _e('Default sorting','wpdancelaparis'); ?></option>
				<option value="popularity"><?php _e('Sort by popularity','wpdancelaparis'); ?></option>
				<option value="rating"><?php _e('Sort by average rating','wpdancelaparis'); ?></option>
				<option value="date"><?php _e('Sort by newnes','wpdancelaparis'); ?></option>
				<option value="price"><?php _e('Sort by price: low to high','wpdancelaparis'); ?></option>
				<option value="price-desc"><?php _e('Sort by price: high to low','wpdancelaparis'); ?></option>
			</select>
		</form>
	<?php
	}
} 

if ( ! function_exists( 'tvlgiao_wpdance_get_slider_control' ) ) {
	function tvlgiao_wpdance_get_slider_control() {
		ob_start(); ?>
			<div class="slider_control">
		          <a href="#!" class="prev" title="<?php echo esc_attr__( 'Previous', 'wpdancelaparis' ); ?>" data-toggle="tooltip" data-placement="top"><i class="lnr lnr-chevron-left" aria-hidden="true"></i></a>
		          <a href="#!" class="next" title="<?php echo esc_attr__( 'Next', 'wpdancelaparis' ); ?>" data-toggle="tooltip" data-placement="top"><i class="lnr lnr-chevron-right" aria-hidden="true"></i></a>
		    </div><!-- .slider-control -->
      	<?php 
      	return ob_get_clean();
	}
}

if ( ! function_exists( 'tvlgiao_wpdance_slider_control' ) ) {
	function tvlgiao_wpdance_slider_control() {
		echo tvlgiao_wpdance_get_slider_control();
	}
}

// Get Data Instagram
if(!function_exists ('tvlgiao_wpdance_scrape_instagram')){
	function tvlgiao_wpdance_scrape_instagram( $username ) {

		$username = strtolower( $username );
		$username = str_replace( '@', '', $username );
		if ( false === ( $instagram = get_transient( 'instagram-a5-'.sanitize_title_with_dashes( $username ) ) ) ) {

			//$aaa = json_decode( wp_remote_get( "https://www.instagram.com/sontungmtp/media?__a=1" )['body'] ); 
			//var_dump($aaa->items[1]);

			$remote = wp_remote_get( 'http://instagram.com/'.trim( $username ) );
			if ( is_wp_error( $remote ) )
				return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'wpdancelaparis' ) );

			if ( 200 != wp_remote_retrieve_response_code( $remote ) )
				return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'wpdancelaparis' ) );

			$shards = explode( 'window._sharedData = ', $remote['body'] );
			$insta_json = explode( ';</script>', $shards[1] );
			$insta_array = json_decode( $insta_json[0], TRUE );

			if ( ! $insta_array )
				return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'wpdancelaparis' ) );

			if ( isset( $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'] ) ) {
				$images = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
			} else {
				return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'wpdancelaparis' ) );
			}

			if ( ! is_array( $images ) )
				return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'wpdancelaparis' ) );

			$instagram = array();
			foreach ( $images as $image ) {

				$image['thumbnail_src'] = preg_replace( '/^https?\:/i', '', $image['thumbnail_src'] );
				$image['display_src'] = preg_replace( '/^https?\:/i', '', $image['display_src'] );

				// handle both types of CDN url
				if ( ( strpos( $image['thumbnail_src'], 's640x640' ) !== false ) ) {
					$image['thumbnail'] = str_replace( 's640x640', 's160x160', $image['thumbnail_src'] );
					$image['small'] = str_replace( 's640x640', 's320x320', $image['thumbnail_src'] );
				} else {
					$urlparts = wp_parse_url( $image['thumbnail_src'] );
					$pathparts = explode( '/', $urlparts['path'] );
					array_splice( $pathparts, 3, 0, array( 's160x160' ) );
					$image['thumbnail'] = '//' . $urlparts['host'] . implode( '/', $pathparts );
					$pathparts[3] = 's320x320';
					$image['small'] = '//' . $urlparts['host'] . implode( '/', $pathparts );
				}

				$image['large'] = $image['thumbnail_src'];

				if ( $image['is_video'] == true ) {
					$type = 'video';
				} else {
					$type = 'image';
				}

				$caption = __( 'Instagram Image', 'wpdancelaparis' );
				if ( ! empty( $image['caption'] ) ) {
					$caption = $image['caption'];
				}

				$instagram[] = array(
					'description'   => $caption,
					'link'		  	=> trailingslashit( '//instagram.com/p/' . $image['code'] ),
					'time'		  	=> $image['date'],
					'comments'	  	=> $image['comments']['count'],
					'likes'		 	=> $image['likes']['count'],
					'thumbnail'	 	=> $image['thumbnail'],
					'small'			=> $image['small'],
					'large'			=> $image['large'],
					'original'		=> $image['display_src'],
					'type'		  	=> $type
				);
			}

			// do not set an empty transient - should help catch private or empty accounts
			if ( ! empty( $instagram ) ) {
				$instagram = json_encode( serialize( $instagram ) );
				set_transient( 'instagram-a5-'.sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS*2 ) );
			}
		}

		if ( ! empty( $instagram ) ) {

			return unserialize( json_decode( $instagram ) );

		} else {

			return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'wpdancelaparis' ) );

		}
	}
}
?>