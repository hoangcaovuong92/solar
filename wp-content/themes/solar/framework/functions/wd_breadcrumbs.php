<?php 
/**
 * TVLGIAO WPDANCE FRAMEWORK 2017.
 *
 * @author : Cao Vuong.
 * -Email  : hoangcaovuong92@gmail.com.
 */
 
//Breadcrumbs Init
add_action('tvlgiao_wpdance_init_breadcrumbs', 'tvlgiao_wpdance_init_breadcrumbs', 5);
if(!function_exists ('tvlgiao_wpdance_init_breadcrumbs')){
	function tvlgiao_wpdance_init_breadcrumbs(){
		if (is_home() || is_front_page()) {
			return;
		}
		/**
		 * package: breadcrumb-custom-setting
		 * var: blog_archive		
		 * var: product_archive	
		 * var: woo_special_page	
		 * var: search_page		
		 */
		extract(tvlgiao_wpdance_get_data_package( 'breadcrumb-custom-setting' ));
		/**
	     * package: breadcrumb-blog-archive, breadcrumb-product-archive, breadcrumb-woo-special-page, breadcrumb-search-page, breadcrumb-default
		 * var: layout_breadcrumbs
		 * var: image_breadcrumbs
		 * var: height
		 * var: color_breadcrumbs
		 * var: text_color
		 * var: text_style
		 * var: text_align
		 */
		if (is_post_type_archive( 'post' ) && $blog_archive) { 
			//breadcrumb for blog archive
			extract(tvlgiao_wpdance_get_data_package( 'breadcrumb-blog-archive' ));
		}elseif ( class_exists('WooCommerce') && (is_shop() || is_product_taxonomy() || is_product_category()) && $product_archive ) { 
			//breadcrumb for shop archive
			extract(tvlgiao_wpdance_get_data_package( 'breadcrumb-product-archive' ));
		}elseif (class_exists('WooCommerce') &&  (is_checkout() || is_cart()) && $woo_special_page) {
			//breadcrumb for woocommerce special page (cart, checkout)
			extract(tvlgiao_wpdance_get_data_package( 'breadcrumb-woo-special-page' ));
		}elseif (is_search() && $search_page) {
			//breadcrumb search page
			extract(tvlgiao_wpdance_get_data_package( 'breadcrumb-search-page' ));
		}else{
			//breadcrumb general
			extract(tvlgiao_wpdance_get_data_package( 'breadcrumb-default' ));
		}

		$post_ID		= tvlgiao_wpdance_get_post_by_global();
		/*PAGE CONFIG*/
		$_page_config 	= tvlgiao_wpdance_get_custom_layout($post_ID);
		
		$custom_page_breadcrumb_setting = (!empty($_page_config['style_breadcrumb'])) ? $_page_config['style_breadcrumb'] : 'breadcrumb_default' ;

		/*Custom Breadcrumb*/
		if ($custom_page_breadcrumb_setting != 'breadcrumb_default') {
			$layout_breadcrumbs = $custom_page_breadcrumb_setting;
		} 
	
		$text_class = 'wd-breadcrumb-text-style-'.$text_style;
		if ($text_style == 'block'){
			$text_class .= ' '.$text_align;		
		}
		?>
		<?php if ($layout_breadcrumbs != 'no_breadcrumb' && !is_page_template( 'page-templates/template-home.php' ) && !is_page_template( 'page-templates/template-home-header-left.php' )): ?>
			<div class="wd-init-breadcrumb <?php echo esc_attr($layout_breadcrumbs); ?>">
				<?php if ($text_style == 'inline'): ?>
					<div class="container">
				<?php endif ?>
					<div class="row wd-breadcrumb-wrap-info-title <?php echo esc_attr($text_class); ?>">
						<div class="wd-breadcrumb-content">
							<?php if ($text_style != 'inline'): ?>
								<div class="wd-breadcrumb-title">
									<?php tvlgiao_wpdance_show_breadcrumbs_title(); ?>
								</div>
							<?php endif ?>
							<div class="wd-breadcrumb-slug">
								<?php tvlgiao_wpdance_show_breadcrumbs_slug(); ?>
							</div>
						</div>
					</div>
				<?php if ($text_style == 'inline'): ?>
					</div>
				<?php endif ?>
			</div>
		<?php endif ?>
		<?php 	
	}
}

//Replace character on breadcrumb
add_filter('get_the_archive_title', function ($title) {
    return str_replace(':',' -',$title);
});

/* GET BREADCRUMB SLUG CONTENT
	Show breadcrumbs with format : 
		Home » Category » Subcategory » Post Title
		Home » Subcategory » Post Title
		Home » Page Level 1 » Page Level 2 » Page Level 3
*/
if(!function_exists('tvlgiao_wpdance_show_breadcrumbs_title')){
	function tvlgiao_wpdance_show_breadcrumbs_title(){ 
		if (is_search()) {
			echo "<h3>".esc_html__('SEARCH', 'laparis')."</h3>";
		}elseif(is_page() || is_single()){
		 	echo "<h3>".get_the_title()."</h3>";
		}elseif(class_exists('WooCommerce') && is_shop()){
		 	echo "<h3>".esc_html__('SHOP', 'laparis')."</h3>";
		}elseif(is_archive()){
		 	echo "<h3>".single_cat_title()."</h3>";
		}else{
			the_archive_title( '<h3>', '</h3>' ); 
		}
	}
}

if(!function_exists('tvlgiao_wpdance_show_breadcrumbs_slug')){
	function tvlgiao_wpdance_show_breadcrumbs_slug() {
	
		if( tvlgiao_wpdance_is_woocommerce() ){
			if( function_exists('woocommerce_breadcrumb') && function_exists('is_woocommerce') && is_woocommerce() ){
				woocommerce_breadcrumb();
				return;
			}
		}
 
		wp_reset_postdata();
		$delimiter = '<span class="brn_arrow"><i class="lnr lnr-chevron-right"></i></span> ';
	  
		$front_id = get_option( 'page_on_front' );
		if ( !empty( $front_id ) ) {
			$home = get_the_title( $front_id );
		} else {
			$home = esc_html__( 'Home', 'laparis' );
		}

		$ar_title = array(
			'search' 		=> esc_html__('Search results for ','laparis'),
			'404' 			=> esc_html__('Error 404','laparis'),
			'tagged' 		=> esc_html__('Tagged ','laparis'),
			'author' 		=> esc_html__('Articles posted by ','laparis'),
			'page' 			=> esc_html__('Page','laparis'),
			'portfolio' 	=> esc_html__('Portfolio','laparis'),
		);
	  
		$before = '<span class="current">'; // tag before the current crumb
		$after = '</span>'; // tag after the current crumb
		global $wp_rewrite;
		$rewriteUrl = $wp_rewrite->using_permalinks();

		if ( !is_home() && !is_front_page() || is_paged() ) {
			echo '<div class="wd-breadcrumb-slug-content">';
			global $post;
			$homeLink = home_url('/'); //get_bloginfo('url');
			echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
	 
			if ( is_category() ) {
				global $wp_query;
				$cat_obj = $wp_query->get_queried_object();
				$thisCat = $cat_obj->term_id;
				$thisCat = get_category($thisCat);
				$parentCat = get_category($thisCat->parent);
				if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
					echo wp_kses_post($before . single_cat_title('', false) . $after);
			} elseif ( is_search() ) {
				echo wp_kses_post($before . $ar_title['search'] . '"' . get_search_query() . '"' . $after);
		 
			}elseif ( is_day() ) {
				echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
				echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
				echo wp_kses_post($before . get_the_time('d') . $after);
		 
			} elseif ( is_month() ) {
				echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
				echo wp_kses_post($before . get_the_time('F') . $after);
		 
			} elseif ( is_year() ) {
				echo wp_kses_post($before . get_the_time('Y') . $after);
		 
			} elseif ( is_single() && !is_attachment() ) {
				$title = (get_the_title() != '') ? esc_html(get_the_title()) : esc_html('(No title)','laparis');
				if ( get_post_type() != 'post' ) {
					$post_type		= get_post_type_object(get_post_type());
					$slug 			= $post_type->rewrite;
					$post_type_name = $post_type->labels->singular_name;
					if(strcmp('Portfolio Item',$post_type->labels->singular_name)==0){
						$post_type_name = $ar_title['portfolio'];
					}
					/*if($rewriteUrl){
						echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type_name . '</a> ' . $delimiter . ' ';
					}else{
						echo '<a href="' . $homeLink . '/?post_type=' . get_post_type() . '">' . $post_type_name . '</a> ' . $delimiter . ' ';
					}*/
					
					echo wp_kses_post($before . $title . $after);
				} else {
					$cat = get_the_category(); $cat = $cat[0];
					echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
					echo wp_kses_post($before . $title . $after);
				}
		 
			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				$post_type 		= get_post_type_object(get_post_type());
				$slug			= $post_type->rewrite;
				$post_type_name = $post_type->labels->singular_name;
				if(strcmp('Portfolio Item',$post_type->labels->singular_name)==0){
					$post_type_name = $ar_title['portfolio'];
				}
				if ( is_tag() ) {
					echo wp_kses_post($before . $ar_title['tagged'] . '"' . single_tag_title('', false) . '"' . $after);
				}elseif(is_taxonomy_hierarchical(get_query_var('taxonomy'))){
					/*if($rewriteUrl){
						echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type_name . '</a> ' . $delimiter . ' ';
					}else{
						echo '<a href="' . $homeLink . '/?post_type=' . get_post_type() . '">' . $post_type_name . '</a> ' . $delimiter . ' ';
					}			*/
					
					$curTaxanomy 	= get_query_var('taxonomy');
					$curTerm 		= get_query_var( 'term' );
					$termNow 		= get_term_by( "name",$curTerm, $curTaxanomy);
					$pushPrintArr 	= array();
					if( $termNow !== false ){
						while ((int)$termNow->parent != 0){
							$parentTerm = get_term((int)$termNow->parent,get_query_var('taxonomy'));
							array_push($pushPrintArr,'<a href="' . get_term_link((int)$parentTerm->term_id,$curTaxanomy) . '">' . $parentTerm->name . '</a> ' . $delimiter . ' ');
							$curTerm = $parentTerm->name;
							$termNow = get_term_by( "name",$curTerm, $curTaxanomy);
						}
					}
					$pushPrintArr = array_reverse($pushPrintArr);
					array_push($pushPrintArr,$before  . get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) )->name  . $after);
					echo implode($pushPrintArr);
				}else{
					echo wp_kses_post($before . $post_type_name . $after);
				}
		 
			} elseif ( is_attachment() ) {
				if( (int)$post->post_parent > 0 ){
					$parent = get_post($post->post_parent);
					$cat 	= get_the_category($parent->ID);
					if( count($cat) > 0 ){
						$cat = $cat[0];
						echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
					}
					echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
				}
				echo wp_kses_post($before . get_the_title() . $after);
			} elseif ( is_page() && !$post->post_parent ) {
				echo wp_kses_post($before . get_the_title() . $after);
		 
			} elseif ( is_page() && $post->post_parent ) {
				$parent_id  	= $post->post_parent;
				$breadcrumbs 	= array();
				while ($parent_id) {
					$page 			= get_post($parent_id);
					$breadcrumbs[] 	= '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
					$parent_id  	= $page->post_parent;
			  	}
			  	$breadcrumbs 	= array_reverse($breadcrumbs);
			  	foreach ($breadcrumbs as $crumb) echo wp_kses_post($crumb . ' ' . $delimiter . ' ');
			  	echo wp_kses_post($before . get_the_title() . $after);
			} elseif ( is_tag() ) {
				echo wp_kses_post($before . $ar_title['tagged'] . '"' . single_tag_title('', false) . '"' . $after);
		 
			} elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata($author);
				echo wp_kses_post($before . $ar_title['author'] . $userdata->display_name . $after);
		 
			} elseif ( is_404() ) {
				echo wp_kses_post($before . $ar_title['404'] . $after);
			}
	 
			if ( get_query_var('paged') ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_page_template() ||  is_post_type_archive() || is_archive() ) echo wp_kses_post($before .' (');
					echo wp_kses_post($ar_title['page'] . ' ' . get_query_var('paged'));
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_page_template() ||  is_post_type_archive() || is_archive() ) echo ')'. $after;
			} else { 
				if ( get_query_var('page') ) {
					if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_page_template() ||  is_post_type_archive() || is_archive() ) echo wp_kses_post($before .' (');
						echo wp_kses_post($ar_title['page'] . ' ' . get_query_var('page'));
					if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_page_template() ||  is_post_type_archive() || is_archive() ) echo ')'. $after;
				}
			}
			echo '</div>';
	 	}
		wp_reset_postdata();
	}
}
?>