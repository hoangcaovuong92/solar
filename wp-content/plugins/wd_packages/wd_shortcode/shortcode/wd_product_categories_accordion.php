<?php 
if ( tvlgiao_wpdance_is_woocommerce() ) {
	if ( ! function_exists( 'tvlgiao_wpdance_categories_accordion_function' ) ) {
		function tvlgiao_wpdance_categories_accordion_function( $atts ) {
			$attr = shortcode_atts( array(
				'title' 			=> '',
				'show_product_count' => '1',
				'show_sub_cat' 		=> '1',
				'is_dropdown' 		=> '1',
				'sort'				=> 'DESC',
				'order_by'			=> 'date',
				'number' 			=> '-1',
				'class' 			=> '1',
			), $atts );
			extract($attr);
			ob_start();
			$random_id 		= 'wd_product_categories_'.rand(0,1000);
			$current_cat 	= (isset($_GET['product_cat']) && $_GET['product_cat']!='')?$_GET['product_cat']:get_query_var('product_cat');
			?>
			<div class="wd-shortcode-product-categories-accordion" id="<?php echo $random_id; ?>">
				<?php if ($title != ''): ?>
					<h2 class="wd-title-heading wd-shortcode-product-categories-accordion-title"><?php echo esc_html($title); ?></h2>		
				<?php endif ?>		
				<?php 
					$args = array(
						'taxonomy'     => 'product_cat',
						'orderby'      => $order_by,
						'order'        => $sort,
						'hierarchical' => 0,
						'parent'       => 0,
						'title_li'     => '',
						'hide_empty'   => 0,
						'number'   	   => $number
					);
					$all_categories = get_categories( $args );
					if( $all_categories ){
						if($order_by == 'rand'){
							shuffle($all_categories);
						}
						echo '<ul class="'.(($is_dropdown || wp_is_mobile())?'dropdown_mode is_dropdown':'hover_mode').'">';
						foreach ($all_categories as $cat) {
							$current_class = ($current_cat == $cat->slug)?'current':''; 
							echo '<li class="cat_item">';
							$category_id = $cat->term_id;
							echo '<a href="'. get_term_link($cat->slug, 'product_cat') .'" class="'.$current_class.'">'. $cat->name;
							if($show_product_count){
								echo ' ('. $cat->count .')';
							}
							echo "</a>";
							if($show_sub_cat){
								tvlgiao_wpdance_get_sub_categories_accordion($category_id,$attr,$current_cat, 1);
							}
							echo '</li>';
						}
						echo '</ul>';
					}
				?>
				<script type="text/javascript">
					jQuery(document).ready(function(){
						"use strict";
						var _random_id = '<?php echo $random_id; ?>';
						jQuery('#'+_random_id).find('ul').dcAccordion({
							classArrow: 'wd-product-cat-accordion-icon  fa fa-angle-right',
							classParent: 'wd-product-cat-accordion-parrent-wrap',
							classCount: 'wd-product-cat-accordion-count',
	       					classExpand: 'wd-product-cat-accordion-current-parent', 
							eventType: 'click',
							menuClose: false,
							autoClose: true,
							saveState: false,
							autoExpand: true,
							disableLink: false,
							speed: 'fast',
							cookie: 'wd-product-cat-accordion-cookie'
						});
						jQuery('#'+_random_id+' .wd-product-cat-accordion-icon').click(function(e){
							e.preventDefault();
							if (!jQuery(this).parents('.wd-product-cat-accordion-parrent-wrap').hasClass('active')) {
								jQuery(this).removeClass('fa-angle-right').addClass('fa-chevron-up');
							}else{
								jQuery(this).addClass('fa-angle-right').removeClass('fa-chevron-up');
							}
						});
					});
				</script>
			</div>
			<?php
			return ob_get_clean();
		}
	}
	add_shortcode( 'tvlgiao_wpdance_categories_accordion', 'tvlgiao_wpdance_categories_accordion_function' );
}
