<?php
/**
 * package: header-default
 * var: show_logo_title
 * var: logo_default	
 * var: logo_url	  	
 * var: menu_location	
 */
extract(tvlgiao_wpdance_get_data_package( 'header-default' ));  ?>
<div class="wd-header-top">
	<div class="container">
		<div class="row">
			<?php if ( is_active_sidebar( 'header_info' ) ) : ?>
				<div class="wd-header-info">
					<?php dynamic_sidebar( 'header_info' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>		
<div class="wd-header-bottom">
	<div class="container">
		<div class="row">
			<!-- Logo on header mobile -->
			<div class="wd-header-logo">
				<a href="<?php echo esc_url(home_url('/'));?>">
					<img src='<?php echo esc_url($logo_url); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
				</a>
			</div>
			<div class="wd-header-menu">
				<a class="menu-bars"><i class="lnr lnr-menu"></i></a>
			</div>
			<div class="wd-header-search">
				<a class="wd-click-popup-search"><i class="lnr lnr-magnifier"></i></a>
				<div class="wd-popup-search hidden">
					<?php get_search_form( $echo = true );?>
					<div class="wd-search-close">X</div>
				</div>
				
			</div>
			<div class="wd-header-cart">
				<?php if(tvlgiao_wpdance_is_woocommerce()): ?>
					<?php echo tvlgiao_wpdance_tini_cart('')?>
				<?php endif; ?>						
			</div>
		</div>
	</div>
</div>