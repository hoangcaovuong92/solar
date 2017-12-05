<?php
/**
 * TVLGIAO WPDANCE FRAMEWORK 2017.
 *
 * @author : Cao Vuong.
 * -Email  : hoangcaovuong92@gmail.com.
 */

// Sidebar HTML
if(!function_exists ('tvlgiao_wpdance_display_left_sidebar')){
	function tvlgiao_wpdance_display_left_sidebar($sidebar_left = 'sidebar'){ 
		ob_start();
		$device_class = tvlgiao_wpdance_is_mobile_or_tablet() ? 'wd_sidebar_mobile' : 'wd_sidebar_desktop';
		?>
		<div id="left-sidebar" class="col-md-6 col-sm-24 wd-sidebar left-sidebar <?php echo esc_attr( $device_class ); ?>">							
		  	<?php if (tvlgiao_wpdance_is_mobile_or_tablet()): ?>
		  		<button type="button" class="btn wd_show_sidebar_btn" data-toggle="collapse" data-target="#left_sidebar_collapsible_mobile"><?php esc_html_e( 'Show Content Sidebar', 'solar' ) ?> <i class="lnr lnr-chevron-down"></i></button>
				<div id="left_sidebar_collapsible_mobile" class="collapse">
		  	<?php endif ?>

			<?php if (is_active_sidebar($sidebar_left) ) : ?>
				<?php dynamic_sidebar( $sidebar_left ); ?>
			<?php endif; ?>

			<?php if (tvlgiao_wpdance_is_mobile_or_tablet()): ?>
		  		</div>
		  	<?php endif ?>
		</div>
		<?php 
		echo ob_get_clean();
	}
}

if(!function_exists ('tvlgiao_wpdance_display_right_sidebar')){
	function tvlgiao_wpdance_display_right_sidebar($sidebar_right = 'right_sidebar'){ 
		ob_start();
		$device_class = tvlgiao_wpdance_is_mobile_or_tablet() ? 'wd_sidebar_mobile' : 'wd_sidebar_desktop';
		?>
		<div id="right-sidebar" class="col-md-6 col-sm-24 wd-sidebar right-sidebar <?php echo esc_attr( $device_class ); ?>">
			<?php if (tvlgiao_wpdance_is_mobile_or_tablet()): ?>
		  		<button type="button" class="btn wd_show_sidebar_btn" data-toggle="collapse" data-target="#right_sidebar_collapsible_mobile"><?php esc_html_e( 'Show Content Sidebar', 'solar' ) ?> <i class="lnr lnr-chevron-down"></i></button>
				<div id="right_sidebar_collapsible_mobile" class="collapse">
		  	<?php endif ?>

			<?php if (is_active_sidebar($sidebar_right) ) : ?>
					<?php dynamic_sidebar( $sidebar_right ); ?>
			<?php endif; ?>

			<?php if (tvlgiao_wpdance_is_mobile_or_tablet()): ?>
		  		</div>
		  	<?php endif ?>
		</div>
		<?php 
		echo ob_get_clean();
	}
}

// Register Sidebar
add_action('widgets_init', 'tvlgiao_wpdance_register_sidebar');
if(!function_exists ('tvlgiao_wpdance_register_sidebar')){
	function tvlgiao_wpdance_register_sidebar(){
		register_sidebar(array(
	        'name' 				=> esc_html__('Left Sidebar', 'solar'),
	        'id' 				=> 'sidebar',
	        'description'   	=> esc_html__( 'Main sidebar that appears on the left.', 'solar' ),
	        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
	        'after_widget' 		=> '</aside>',
	        'before_title' 		=> '<h2 class="widget-title">',
	        'after_title' 		=> '</h2>',
	    ));
	    register_sidebar(array(
	        'name' 				=> esc_html__('Right Sidebar', 'solar'),
	        'id' 				=> 'right_sidebar',
	        'description'   	=> esc_html__( 'Main sidebar that appears on the right.', 'solar' ),
	        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
	        'after_widget' 		=> '</aside>',
	        'before_title' 		=> '<h2 class="widget-title">',
	        'after_title' 		=> '</h2>',
	    ));
	    register_sidebar(array(
	        'name' 				=> esc_html__('Left Sidebar Product', 'solar'),
	        'id' 				=> 'left_sidebar_product',
	        'description'   	=> esc_html__( 'Left Sidebar for single product', 'solar' ),
	        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
	        'after_widget' 		=> '</aside>',
	        'before_title' 		=> '<h2 class="widget-title">',
	        'after_title' 		=> '</h2>',
	    ));
	    register_sidebar(array(
	        'name' 				=> esc_html__('Right Sidebar Product', 'solar'),
	        'id' 				=> 'right_sidebar_product',
	        'description'   	=> esc_html__( 'Right Sidebar for single product', 'solar' ),
	        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
	        'after_widget' 		=> '</aside>',
	        'before_title' 		=> '<h2 class="widget-title">',
	        'after_title' 		=> '</h2>',
	    ));
	    register_sidebar(array(
	        'name' 				=> esc_html__('Left Sidebar Shop', 'solar'),
	        'id' 				=> 'left_sidebar_shop',
	        'description'   	=> esc_html__( 'Left Sidebar for shop page', 'solar' ),
	        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
	        'after_widget' 		=> '</aside>',
	        'before_title' 		=> '<h2 class="widget-title">',
	        'after_title' 		=> '</h2>',
	    ));
	    register_sidebar(array(
	        'name' 				=> esc_html__('Right Sidebar Shop', 'solar'),
	        'id' 				=> 'right_sidebar_shop',
	        'description'   	=> esc_html__( 'Right Sidebar for shop page', 'solar' ),
	        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
	        'after_widget' 		=> '</aside>',
	        'before_title' 		=> '<h2 class="widget-title">',
	        'after_title' 		=> '</h2>',
	    ));
	   
	    register_sidebar(array(
	        'name' 				=> esc_html__('Header Information', 'solar'),
	        'id' 				=> 'header_info',
	        'description'   	=> esc_html__( 'Display only on header menu mobile', 'solar' ),
	        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
	        'after_widget' 		=> '</aside>',
	        'before_title' 		=> '<h2 class="widget-title">',
	        'after_title' 		=> '</h2>',
	    ));
	    register_sidebar(array(
	        'name' 				=> esc_html__('Footer Social', 'solar'),
	        'id' 				=> 'footer_social',
	        'description'   	=> esc_html__( 'Display widgets on footer default template', 'solar' ),
	        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
	        'after_widget' 		=> '</aside>',
	        'before_title' 		=> '<h2 class="widget-title">',
	        'after_title' 		=> '</h2>',
	    ));

	}
} ?>