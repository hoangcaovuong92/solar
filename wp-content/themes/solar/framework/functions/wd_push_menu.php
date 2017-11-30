<?php 

if(!function_exists ('tvlgiao_wpdance_pushmenu_mobile')){
	function tvlgiao_wpdance_pushmenu_mobile() {
	    /*$transient_name 		= 'wd_pushmenu_mobile';
	    $menu 					= get_transient( $transient_name );
	    if ( false === $menu ) {*/
	    	
	    	ob_start();
		    	/**
				 * package: header-default
				 * var: show_logo_title
				 * var: logo_default	
				 * var: logo_url	  	
				 * var: menu_location	
				 */
				extract(tvlgiao_wpdance_get_data_package( 'header-default' ));
				$current_user 	= wp_get_current_user();
				$class_login	= "";
				if ( 0 != $current_user->ID ) {
					$class_login = "wp-user-login-mobile";
				} ?>

				<div id="wd-pushmenu-mobile" class="pushmenu-left <?php echo esc_attr($class_login);?>">
					<!-- Logo on menu mobile -->
					<div class="logo-wishlist">
						<a href="<?php echo esc_url(home_url('/'));?>">
							<img class="img-logo-menubar" src='<?php echo esc_url($logo_url); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
						</a>

						<?php if ( shortcode_exists( 'tvlgiao_wpdance_wishlist' ) ) {
							//Wishlist icon
							echo '<div class="wd-header-mobile-wishlist">';
						    echo do_shortcode('[tvlgiao_wpdance_wishlist title="" show_icon="1"]');
							echo '</div>';
						} ?>

						<a class="menu-bars"><span class="lnr lnr-cross"></span></a>
					</div>

					<!-- Menu mobile content -->
					<?php
						if( has_nav_menu( 'primary_mobile' ) ){ 
							wp_nav_menu( array( 'container_class' => 'mobile-main-menu toggle-menu','theme_location' => 'primary_mobile' ) ); 
						}
						else{
							wp_nav_menu( array( 'container_class' => 'mobile-main-menu toggle-menu','menu_class' => 'nav navbar-nav responsive-nav main-nav-list', 'theme_location' => 'primary' ) ); 
						}
					?>
					<?php if (class_exists('GTranslate') || class_exists('WOOCS')): ?>
						<div class="currency_gtranslate">
							<?php if ( shortcode_exists( 'tvlgiao_wpdance_gtranslate' ) ) {
								//GTranslate icon
								echo '<div class="wd-header-mobile-gtranslate">';
							    echo do_shortcode('[tvlgiao_wpdance_gtranslate]');
								echo '</div>';
							} ?>

							<?php if ( shortcode_exists( 'tvlgiao_wpdance_currency' ) ) {
								//Currency Switch icon
								echo '<div class="wd-header-mobile-currency">';
							    echo do_shortcode('[tvlgiao_wpdance_currency show_icon="0"]');
								echo '</div>';
							} ?>
						</div>
					<?php endif ?>
					
					<?php if(tvlgiao_wpdance_is_woocommerce()): ?>
						<?php tvlgiao_wpdance_get_form_user_mobile() ?>
					<?php endif; ?>
				</div>
			<?php 
	        $menu 				= ob_get_clean();
	        /*set_transient($transient_name, $menu, 0);
	    }*/
	    echo $menu;
	}
}
// Push Menu Mobile
add_action('tvlgiao_wpdance_after_opening_body_tag','tvlgiao_wpdance_content_pushmenu_mobile',15);
if(!function_exists ('tvlgiao_wpdance_content_pushmenu_mobile')){
	function tvlgiao_wpdance_content_pushmenu_mobile(){ 
		tvlgiao_wpdance_pushmenu_mobile();
	}
} ?>