<?php
/**
 * Product Categories Accordion
 */
if(!class_exists('tvlgiao_wpdance_widget_product_categories_accordion')){
	class tvlgiao_wpdance_widget_product_categories_accordion extends WP_Widget {
		function __construct() {
			$widget_ops 		= array('classname' => 'wd_widget_product_categories', 'description' => __('Display Woocommerce Product Categories','wpdance'));
			$control_ops 		= array('width' => 400, 'height' => 350);
			parent::__construct('wd_product_categories', __('WD - Product Categories','wpdance'), $widget_ops);
		}

		function widget( $args, $instance ) {
			$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
			if ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) {
				return;
			}
			extract($args);
			$title = esc_attr(apply_filters( 'widget_title', $instance['title'] ));		
			$show_post_count = $instance['show_post_count'];		
			$show_sub_cat = $instance['show_sub_cat'];		
			$is_dropdown = $instance['is_dropdown'];		
			$orderby = $instance['orderby'];		
			$order = $instance['order'];		
			$number = empty($instance['number'])?0:absint($instance['number']);		
			
			$current_cat = (isset($_GET['product_cat']) && $_GET['product_cat']!='')?$_GET['product_cat']:get_query_var('product_cat');
			?>
			<?php echo $before_widget;?>
			<?php echo $before_title . $title . $after_title;?>
			<?php $random_id = 'wd_product_categories_'.rand(0,1000); ?>
			<div class="wd_product_categories" id="<?php echo $random_id; ?>">
				<?php 
					$args = array(
						'taxonomy'     => 'product_cat',
						'orderby'      => $orderby,
						'order'        => $order,
						'hierarchical' => 0,
						'parent'       => 0,
						'title_li'     => '',
						'hide_empty'   => 0,
						'number'   	   => $number
					);
					$all_categories = get_categories( $args );
					if( $all_categories ){
						if($orderby == 'rand'){
							shuffle($all_categories);
						}
						echo '<ul class="'.(($is_dropdown || wp_is_mobile())?'dropdown_mode is_dropdown':'hover_mode').'">';
						foreach ($all_categories as $cat) {
							$current_class = ($current_cat == $cat->slug)?'current':''; 
							echo '<li class="cat_item">';
							$category_id = $cat->term_id;
							echo '<a href="'. get_term_link($cat->slug, 'product_cat') .'" class="'.$current_class.'">'. $cat->name;
							if($show_post_count){
								echo ' ('. $cat->count .')';
							}
							echo "</a>";
							if($show_sub_cat){
								$this->get_sub_categories($category_id,$instance,$current_cat, 1);
							}
							echo '</li>';
						}
						echo '</ul>';
					}
				?>
				<div class="clear"></div>
			</div>
			<script type="text/javascript">
				jQuery(document).ready(function(){
					"use strict";
					var _random_id = '<?php echo $random_id; ?>';
					jQuery('#'+_random_id).find('ul').dcAccordion({
						classArrow: 'wd-product-cat-accordion-icon',
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
					});
				});
			</script>
			<?php
			echo $after_widget;
		}
		function get_sub_categories($category_id, $instance, $current_cat, $level){
			$args = array(
			   'taxonomy'     => 'product_cat',
			   'child_of'     => 0,
			   'parent'       => $category_id,
			   'orderby'      => $instance['orderby'],
			   'order'        => $instance['order'],
			   'hierarchical' => 0,
			   'title_li'     => '',
			   'hide_empty'   => 0
			);
			$sub_cats = get_categories( $args );
			if($sub_cats) {
				if($instance['orderby'] == 'rand'){
					shuffle($sub_cats);
				}
				echo '<ul class="sub_cat">';
				foreach($sub_cats as $sub_category) {
					$current_class = ($current_cat == $sub_category->slug)?'current':'';
					echo '<li>';
					echo '<a href="'. get_term_link($sub_category, 'product_cat') .'" class="'.$current_class.'">';
					echo str_repeat('&#151;', $level).' '. $sub_category->name;
					if( $instance['show_post_count'] ){
						echo ' (' . $sub_category->count . ')';
					}
					echo "</a>";
					$this->get_sub_categories($sub_category->term_id, $instance, $current_cat, $level+1);
					echo '</li>';
				}
				echo '</ul>';

			}
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;	
			$instance['title'] =  $new_instance['title'];			
			$instance['show_post_count'] =  $new_instance['show_post_count'];			
			$instance['show_sub_cat'] =  $new_instance['show_sub_cat'];			
			$instance['is_dropdown'] =  $new_instance['is_dropdown'];			
			$instance['orderby'] =  $new_instance['orderby'];			
			$instance['order'] =  $new_instance['order'];			
			$instance['number'] =  $new_instance['number'];			
			
			return $instance;
		}

		function form( $instance ) { 
			$instance = wp_parse_args( (array) $instance, array( 'title' => 'Categories','show_post_count'=>true,'show_sub_cat'=>true,'is_dropdown'=>false,'orderby'=>'name','order'=>'asc','number' => 0) );
			$instance['title'] = esc_attr($instance['title']);
		?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Enter your title','wpdance'); ?> : </label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" /></p>
			<p>
				<input type="checkbox" id="<?php echo $this->get_field_id('show_post_count'); ?>" name="<?php echo $this->get_field_name('show_post_count'); ?>" <?php echo ($instance['show_post_count'])?'checked':''; ?> />
				<label for="<?php echo $this->get_field_id('show_post_count'); ?>"><?php _e('Show post count','wpdance'); ?></label>
			</p>
			<p>
				<input type="checkbox" id="<?php echo $this->get_field_id('show_sub_cat'); ?>" name="<?php echo $this->get_field_name('show_sub_cat'); ?>" <?php echo ($instance['show_sub_cat'])?'checked':''; ?> />
				<label for="<?php echo $this->get_field_id('show_sub_cat'); ?>"><?php _e('Show sub categories','wpdance'); ?></label>
			</p>
			<p>
				<input type="checkbox" id="<?php echo $this->get_field_id('is_dropdown'); ?>" name="<?php echo $this->get_field_name('is_dropdown'); ?>" <?php echo ($instance['is_dropdown'])?'checked':''; ?> />
				<label for="<?php echo $this->get_field_id('is_dropdown'); ?>"><?php _e('Dropdown mode','wpdance'); ?></label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of highest parent categories to show','wpdance'); ?></label>
				<input class="widefat" type="number" min="0" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $instance['number']; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('orderby'); ?>"><?php _e('Order by','wpdance'); ?></label>
				<select class="widefat" id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>" >
					<option value="name" <?php echo ($instance['orderby']=="name")?'selected':''; ?> ><?php _e('Name','wpdance'); ?></option>
					<option value="slug" <?php echo ($instance['orderby']=="slug")?'selected':''; ?> ><?php _e('Slug','wpdance'); ?></option>
					<option value="count" <?php echo ($instance['orderby']=="count")?'selected':''; ?> ><?php _e('Number product','wpdance'); ?></option>
					<option value="rand" <?php echo ($instance['orderby']=="rand")?'selected':''; ?> ><?php _e('Random','wpdance'); ?></option>
					<option value="none" <?php echo ($instance['orderby']=="none")?'selected':''; ?> ><?php _e('None','wpdance'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order','wpdance'); ?></label>
				<select class="widefat" id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>" >
					<option value="asc" <?php echo ($instance['order']=="asc")?'selected':''; ?> ><?php _e('Ascending','wpdance'); ?></option>
					<option value="desc" <?php echo ($instance['order']=="desc")?'selected':''; ?> ><?php _e('Descending','wpdance'); ?></option>
				</select>
			</p>
			<?php }
	}
	function wp_widget_register_widget_product_categories_accordion() {
		register_widget( 'tvlgiao_wpdance_widget_product_categories_accordion' );
	}
	add_action( 'widgets_init', 'wp_widget_register_widget_product_categories_accordion' );
}

