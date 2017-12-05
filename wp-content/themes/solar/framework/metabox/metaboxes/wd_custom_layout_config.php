<?php
	$post_id  			= tvlgiao_wpdance_get_post_by_global();
	$html_header 		= tvlgiao_wpdance_get_html_block_layout_choices('wpdance_header',__('Select Header', 'solar'),'name');
	$html_footer 		= tvlgiao_wpdance_get_html_block_layout_choices('wpdance_footer',__('Select Footer', 'solar'),'name');
	$_layout_config 	= tvlgiao_wpdance_get_custom_layout($post_id);
	$selected_header 	= get_post_meta( $post_id, '_tvlgiao_wpdance_custom_header', true );
	$selected_footer 	= get_post_meta( $post_id, '_tvlgiao_wpdance_custom_footer', true );
	$default_breadcrumb_img = TVLGIAO_WPDANCE_THEME_IMAGES.'/banner_breadcrumb.jpg';
	
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
?>
<div class="wd-layout-config-wrapper">
	<!-- Custom Header -->
	<?php Tvlgiao_Wpdance_Admin_Metaboxes_CustomFields::get_header($html_header, $selected_header); ?>
	<!-- Custom Footer -->
	<?php Tvlgiao_Wpdance_Admin_Metaboxes_CustomFields::get_footer($html_footer, $selected_footer); ?>
	<!-- Custom Layout -->
	<?php Tvlgiao_Wpdance_Admin_Metaboxes_CustomFields::get_layout($_layout_config["layout"]); ?>
	<!-- Custom Left Sidebar -->
	<?php Tvlgiao_Wpdance_Admin_Metaboxes_CustomFields::get_sidebar('left', $_layout_config["left_sidebar"]); ?>
	<!-- Custom Right Sidebar -->
	<?php Tvlgiao_Wpdance_Admin_Metaboxes_CustomFields::get_sidebar('right', $_layout_config["right_sidebar"]); ?>
	<!-- Custom Breadcrumb Style -->
	<?php Tvlgiao_Wpdance_Admin_Metaboxes_CustomFields::get_breadcrumb_style($_layout_config["style_breadcrumb"]); ?>
	<!-- Custom Breadcrumb Image -->
	<?php Tvlgiao_Wpdance_Admin_Metaboxes_CustomFields::get_breadcrumb_image($_layout_config["image_breadcrumb"], $default_breadcrumb_img); ?>
	<!-- Custom Breadcrumb Color -->
	<?php //Tvlgiao_Wpdance_Admin_Metaboxes_CustomFields::get_breadcrumb_color('', '#fff'); ?>

	<?php $display_class 	= (get_current_screen()->id != 'page') ? 'hidden' : ''; ?>
	<!-- Custom Class -->
	<?php Tvlgiao_Wpdance_Admin_Metaboxes_CustomFields::get_custom_class($_layout_config["custom_class"], $display_class); ?>
	<!-- Custom ID -->
	<?php Tvlgiao_Wpdance_Admin_Metaboxes_CustomFields::get_custom_id($_layout_config["custom_id"], $display_class); ?>
</div>