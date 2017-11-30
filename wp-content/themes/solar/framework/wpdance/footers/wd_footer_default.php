<?php
/**
 * package: footer-default
 * var: logo_default
 * var: logo_url
 * var: copyright
 */
extract(tvlgiao_wpdance_get_data_package( 'footer-default' ));
?>
<div class="wd-footer wd-footer-default wd-footer-content">
	<div class="container">
		<div class="row">
			<div class="wd-footer-logo">
					<a href="<?php  echo esc_url(home_url('/'));?>">
						<?php $logo_url = empty($logo_url) ? $logo_default : $logo_url;  ?>
						<img src='<?php echo esc_url($logo_url); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
					</a>
				</div>
			<?php if ( is_active_sidebar( 'footer_social' ) ) : ?>
				<div class="wd-footer-social">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'footer_social' ); ?>
					</ul>
				</div>
			<?php endif; ?>
			<div class="wd-footer-info">
				<?php echo $copyright; ?>
			</div>
		</div>
	</div>
</div>
