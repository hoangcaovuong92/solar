<?php

global $detect;

/*
	
@package sunsettheme
-- Gallery Post Format

*/

?>
<article itemscope itemtype="http://schema.org/Article" id="post-<?php the_ID(); ?>" <?php post_class( 'wd-wrap-content-blog' ); ?>>
	<?php echo tvlgiao_wpdance_get_content_blog( false, 'gallery' ); ?>
</article>