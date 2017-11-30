<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Wordpress
 * @since wpdance
 */
?>
<footer id="footer" class="footer">
	<?php 
	/**
	 * tvlgiao_wpdance_footer_init_action hook.
	 *
	 * @hooked tvlgiao_wpdance_footer_init - 5
	 * @hooked tvlgiao_wpdance_accessibility_scroll_button_site_function - 10
	 * @hooked tvlgiao_wpdance_accessibility_facebook_chatbox - 15
	 */ 
	do_action('tvlgiao_wpdance_footer_init_action'); ?>
</footer> <!-- END FOOOTER  -->
</div>
<?php wp_footer(); ?>
</body>
</html>