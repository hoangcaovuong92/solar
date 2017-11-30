<?php
/**
 * package: header-default
 * var: show_logo_title
 * var: logo_default	
 * var: logo_url	  	
 * var: menu_location	
 */
extract(tvlgiao_wpdance_get_data_package( 'header-default' )); 
$class_columns  = "col-sm-24";
$class_center 	= "";
?>
<div class="wd-header-default wd-header-content wd-header-bottom">
	<div class="container"> 
		<div class="row">
			<div class="<?php echo ($show_logo_title == '1') ? 'wd-header-title' : 'wd-header-logo'; ?> <?php echo esc_attr($class_center); ?>">
				<a href="<?php  echo esc_url(home_url('/')); ?>">
					<?php if ($show_logo_title): ?>
						<h2 class="wd-header-default-logo-text"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></h2>
					<?php else: ?>
						<?php $logo_url = empty($logo_url) ? $logo_default : $logo_url;  ?>
						<img src='<?php echo esc_url($logo_url); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
					<?php endif ?>
				</a>
			</div>
			<div class="wd-header-search-cart">
				<?php if(tvlgiao_wpdance_is_woocommerce()): ?>
					<?php echo tvlgiao_wpdance_tini_cart('')?>
				<?php endif; ?>
				<div class="wd-search-post style-2">
					<?php get_search_form();?>	
				</div>			
			</div>
			<div class="wd-header-menu-right-search-cart <?php echo esc_attr($class_columns); ?>">
				<div class="wd-header-menu-right">
					<?php 
					$args = array(
						'theme_location' => $menu_location, 
						'container' => false, 
						'menu_class' => 'nav navbar-nav responsive-nav main-nav-list',
					);
					wp_nav_menu( $args ); ?>
				</div>
			</div>
		</div>
	</div>
</div>