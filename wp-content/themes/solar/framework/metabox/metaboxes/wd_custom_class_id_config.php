<?php
	$post_id  			= tvlgiao_wpdance_get_post_by_global();
	$_layout_config 	= tvlgiao_wpdance_get_custom_layout($post_id);
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
?>
<div class="wd-layout-config-wrapper">
	<!-- Custom Class -->
	<?php Tvlgiao_Wpdance_Admin_Metaboxes_CustomFields::get_custom_class($_layout_config["custom_class"]); ?>
	<!-- Custom ID -->
	<?php Tvlgiao_Wpdance_Admin_Metaboxes_CustomFields::get_custom_id($_layout_config["custom_id"]); ?>
</div>