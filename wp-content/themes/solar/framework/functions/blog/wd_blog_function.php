<?php
/**
 * TVLGIAO WPDANCE FRAMEWORK 2017.
 *
 * @author : Cao Vuong.
 * -Email  : hoangcaovuong92@gmail.com.
 */

//Custom HTML post password protect form
add_filter( 'the_password_form', 'tvlgiao_wpdance_custom_post_password_protect_form' );
if(!function_exists ('tvlgiao_wpdance_custom_post_password_protect_form')){
	function tvlgiao_wpdance_custom_post_password_protect_form() {
	    global $post;
	    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	    $password_protect_form = '<div class="wd-password-protect-form"><form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">';
	    $password_protect_form .= '<p>' . esc_html__( 'To view this protected post, enter the password below: ', 'solar' ) . '</p>';
	    $password_protect_form .= '<label for="' . $label . '">' . esc_html__( 'Password: ', 'solar' ) . ' </label>';
	    $password_protect_form .= '<input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" /><input type="submit" name="Submit" value="' . esc_attr__( 'Submit ', 'solar' ) . '" />';
	    $password_protect_form .= '</form></div>';
	    return $password_protect_form;
	}
}

/* Return object attachment of current post */
if(!function_exists ('tvlgiao_wpdance_get_post_attachment')){
	function tvlgiao_wpdance_get_post_attachment($num = 1, $post_id = ''){
		global $post;
		$post_id 		= ($post_id) ? $post_id : get_the_ID();
		$attachment_ids = array();
		
		$attachments = get_post_galleries($post, false);
		if ($attachments && isset($attachments[0]['ids'])) {
			$attachment_ids = explode(',', $attachments[0]['ids']);
		}

		if ( count($attachment_ids) == 0 ) {
			$attachments = get_posts(array(
	            'post_type' => 'attachment',
	            'posts_per_page' => $num,
	            'post_parent' => $post_id,
	        ));
	        if ($attachments){
		        foreach ($attachments as $attachment){
        			$attachment_ids[] = $attachment->ID; 
	            }
		    }
		}

		if (has_post_thumbnail() && get_the_post_thumbnail()) {
			if (!is_single()) {
				array_unshift($attachment_ids, get_post_thumbnail_id(get_the_ID()));
			}else{
				$attachment_ids[] = get_post_thumbnail_id(get_the_ID());
			}
		}

		$attachment_ids = count($attachment_ids) > $num ? array_slice($attachment_ids, 0, $num) : $attachment_ids;
		return $attachment_ids;
	}
}

 
/* Return html of thumbnail image */
if(!function_exists ('tvlgiao_wpdance_get_post_thumbnail_html')){
	function tvlgiao_wpdance_get_post_thumbnail_html( $thumbnail_size = 'full', $show_thumbnail = false, $num = 1, $placeholder = false, $custom_class = '' ) {
		global $post;
		$output = '';
		$slider = ( 1 < $num ) ? 'owl-carousel' : '';
		if ( $show_thumbnail ) {
			if ( has_post_thumbnail() && get_the_post_thumbnail() && 1 == $num ) {
				$output .= '<div class="wd-thumbnail-post ' . $slider . ' '  . esc_attr($custom_class) . '">';
				$output .= '<a class="thumbnail" href="' . get_permalink() . '">' . get_the_post_thumbnail( null, $thumbnail_size ) . '</a>';
				$output .= '</div><!-- .wd-thumbnail-post -->';
			} else {
				$attachments = tvlgiao_wpdance_get_post_attachment($num);
				if ( $attachments && 1 == $num ) {
					$output .= '<div class="wd-thumbnail-post ' . $slider . ' '  . esc_attr($custom_class) . '">';
					$output .= '<a class="thumbnail" href="' . get_permalink() . '">' . wp_get_attachment_image( $attachments[0], $thumbnail_size ) . '</a>';
					$output .= '</div><!-- .wd-thumbnail-post -->';
				} elseif ( $attachments && 1 < $num ) {
					$output .= '<div class="wd-thumbnail-post ' . $slider . ' '  . esc_attr($custom_class) . '">';
					foreach ( $attachments as $attachment ) {
						$output .= '<div class="thumbnail">' . wp_get_attachment_image( $attachment, $thumbnail_size ) . '</div>';
					}
					$output .= '</div><!-- .wd-thumbnail-post -->';
				} else {
					if ($placeholder) {
						$output = tvlgiao_wpdance_get_thumb_placeholder_image('html');
					} 
				}
			}
		}
		return $output;
	}
}


/* $num = 1: Return url of thumbnail or the first attachment images
 * $num > 1: Return object attachment images */
if(!function_exists ('tvlgiao_wpdance_get_post_thumbnail')){
	function tvlgiao_wpdance_get_post_thumbnail($image_size = 'full', $num = 1, $placeholder = false){
		global $post;
		$output = array();
		$attachments = tvlgiao_wpdance_get_post_attachment($num);

	    if ($attachments){
	        foreach ($attachments as $attachment){
            	$image_thumb = wp_get_attachment_image_src( $attachment, $image_size );
    			$output[] = $image_thumb[0]; 
            }
	    }

	   	if (count($attachments) == 0 && $placeholder) {
	    	$output[] = tvlgiao_wpdance_get_thumb_placeholder_image('url');
	    }
	    return $output;
	}
}

if(!function_exists ('tvlgiao_wpdance_get_bs_slides')){
	function tvlgiao_wpdance_get_bs_slides($attachments, $image_size = 'full'){
	    $output = array();
	    $count = count($attachments) - 1;
	    for ($i = 0; $i <= $count; ++$i){
	    	$currentImg = $attachments[$i];
	        $active 	= ($i == 0 ? ' active' : '');
		    $next_key 	= ($i == $count ? 0 : $i + 1);
		    $nextImg 	= $attachments[$next_key];
		    $prev_key 	= ($i == 0 ? $count : $i - 1);
		    $prevImg 	= $attachments[$prev_key];
		    
		    $output[$i] = array(
		            'class' 	=> $active,
		            'url' 		=> $currentImg,
		            'next_img' 	=> $nextImg,
		            'prev_img' 	=> $prevImg,
		        );
	    }
	    return $output;
	}
}

/* Return placeholder image to display when post no thumbnail
 * $type = 'html'	: Return html of placeholer image
 * $type = 'url'	: Return url of placeholer image */
if(!function_exists ('tvlgiao_wpdance_get_thumbnail_placeholder_image')){
	function tvlgiao_wpdance_get_thumb_placeholder_image($type = 'html', $image_size = 'post-thumbnail', $custom_class = ''){
		global $post;
		$output = '';
		$post_thumb_size = tvlgiao_wpdance_get_width_height_image_size($image_size);
		if ($type == 'html') {
			$image_placeholder = 'http://via.placeholder.com/'.$post_thumb_size['width'].'x'.$post_thumb_size['height'];
			$output .= '<div class="wd-thumbnail-post ' . esc_attr($custom_class) . '">';
			$output .= '<a class="thumbnail" href="' . get_permalink() . '"><img src="' . esc_url($image_placeholder) . '" alt="'.get_the_title().'" title="'.get_the_title().'" /></a>';
			$output .= '</div><!-- .wd-thumbnail-post -->';
		}elseif ($type == 'url') {
			$output = 'http://via.placeholder.com/'.$post_thumb_size['width'].'x'.$post_thumb_size['height'];
		}
		return $output;
	}
}

// Return array width/height of image size
if(!function_exists ('tvlgiao_wpdance_get_width_height_image_size')){
	function tvlgiao_wpdance_get_width_height_image_size($image_size = 'post-thumbnail'){
		$image_size = ($image_size == 'full' || $image_size == '') ? 'post-thumbnail' : $image_size; 
		global $_wp_additional_image_sizes;
		$image_size_arr = array();
		$post_thumb_width_default 	= $_wp_additional_image_sizes[$image_size]['width'];
		$post_thumb_height_default 	= $_wp_additional_image_sizes[$image_size]['height'];
		$image_size_arr['width'] 	= $post_thumb_width_default;
		$image_size_arr['height'] 	= $post_thumb_height_default;
	    return $image_size_arr;
	}
}


if(!function_exists ('tvlgiao_wpdance_get_embedded_media')){
	function tvlgiao_wpdance_get_embedded_media($type = array(), $height = '50%'){
		global $post;
	    $content 	= do_shortcode(apply_filters('the_content', get_the_content()));
	    $embed 		= get_media_embedded_in_content($content, $type);
	    $output 	= '';
	    if ($embed) {
	    	if (in_array('audio', $type)){
	    		$output = '<div class="wd-post-embed-audio">';
		        $output .= str_replace('?visual=true', '?visual=false', $embed[0]);
		        $output = str_replace('height="400"', 'height="'.$height.'"', $output);
		        $output .= '</div>';
		    } elseif(in_array('video', $type)) {
		    	$output = '<div class="wd-post-embed-audio">';
		    	$output .= '<div class="embed-responsive embed-responsive-16by9">';
		    	$output .= $embed[0];
		    	$output .= '</div></div>';
		    }else {
		        $output = $embed[0];
		    }
	    }
    	
	    return $output;
	}
}


if(!function_exists ('tvlgiao_wpdance_grab_url')){
	function tvlgiao_wpdance_grab_url(){
	    if (!preg_match('/<a\s[^>]*?href=[\'"](.+?)[\'"]/i', get_the_content(), $links)) {
	        return false;
	    }
	    return esc_url_raw($links[1]);
	}
}

if(!function_exists ('tvlgiao_wpdance_grab_current_uri')){
	function tvlgiao_wpdance_grab_current_uri(){
	    $http = (isset($_SERVER['HTTPS']) ? 'https://' : 'http://');
	    $referer = $http.$_SERVER['HTTP_HOST'];
	    $archive_url = $referer.$_SERVER['REQUEST_URI'];

	    return $archive_url;
	}
}

/****************** CONTENT OF BLOG *******************/
if(!function_exists ('tvlgiao_wpdance_display_post_thumbnail')){
	function tvlgiao_wpdance_display_post_thumbnail($image_size = 'full', $display = '1', $custom_class = ''){ 
		ob_start();
		global $post;
		?>
		<?php if( $display == '1' && has_post_thumbnail() && get_the_post_thumbnail()): ?>
			<div class="wd-thumbnail-post <?php echo esc_attr($custom_class); ?>">
				<a class="thumbnail" href="<?php the_permalink(); ?>">
					<?php
						the_post_thumbnail($image_size);
					?>
				</a>
			</div>
		<?php endif; // End If ?>
		<?php 
		echo ob_get_clean();
	}
}

//display slider gallery for post gallery
if(!function_exists ('tvlgiao_wpdance_display_post_thumbnail_slider_gallery')){
	function tvlgiao_wpdance_display_post_thumbnail_gallery($image_size = 'full', $display = '1', $placeholder = false, $num = '5', $custom_class = ''){ 
		ob_start();
		global $post;
		?>
		<?php if ($display): ?>
			<?php if( tvlgiao_wpdance_get_post_thumbnail() ): ?>
				<?php 
				$slider_id 		= 'wd-post-gallery-'.get_the_ID(); 
				$attachments 	= tvlgiao_wpdance_get_bs_slides( tvlgiao_wpdance_get_post_thumbnail($image_size, $num), $image_size ); 
				?>
				<div class="wd-thumbnail-post <?php echo esc_attr($custom_class); ?>">
					<div id="<?php echo esc_attr($slider_id); ?>" class="wd-carousel-thumb">
						<!-- Wrapper for slides -->
						<ul class="wd-blog-gallery-list">
							<?php 
							$i = 1;
							foreach( $attachments as $attachment ): ?>
								<li class="item">
									<a class="thumbnail" href="<?php the_permalink(); ?>">
							      		<img src="<?php echo $attachment['url']; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
						      		</a>
							    </li>
							<?php $i++; ?>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			<?php elseif($placeholder): ?>
				<?php echo tvlgiao_wpdance_get_thumb_placeholder_image('html'); ?>
			<?php endif; ?>
		<?php endif ?>
		
		<?php 
		echo ob_get_clean();
	}
}

if(!function_exists ('tvlgiao_wpdance_display_author_information')){
	function tvlgiao_wpdance_display_author_information($display = '1', $custom_class = ''){ 
		ob_start(); 
		global $post; ?>
		<?php if( $display == '1'): ?>
			<div class="wd-infomation-author">
				<div class="avatar-user">
					<a href="<?php get_the_author_link(); ?>">
						<?php echo get_avatar(get_the_author_meta( 'ID' ), 120  ); ?>
					</a>
				</div>
				<span class="author">	
					<span class="lnr lnr-user"></span>
					<span itemprop="author"><?php echo the_author_posts_link(); ?></span>
				</span>
			</div>		
		<?php endif; // End If ?>
		<?php 
		echo ob_get_clean();
	}
}

if(!function_exists ('tvlgiao_wpdance_display_post_title')){
	function tvlgiao_wpdance_display_post_title($display = '1', $before = '<h2 class="wd-heading-title">', $after = '</h2>', $custom_class = ''){ 
		ob_start();
		global $post; ?>
		<?php if ($display == '1'): ?>
			<div class="wd-title-post <?php echo esc_attr($custom_class); ?>">
				<?php echo $before; ?>
					<?php $title_content = (get_the_title() != '') ? esc_html(get_the_title()) : esc_html('View detail (No title)','solar'); ?>
					<a itemprop="name" href="<?php the_permalink() ; ?>"><?php echo $title_content; ?></a>
				<?php echo $after; ?>
			</div>
		<?php endif ?>
		<?php 
		echo ob_get_clean();
	}
}

if(!function_exists ('tvlgiao_wpdance_display_single_post_title')){
	function tvlgiao_wpdance_display_single_post_title($display = '1', $before = '<h1 class="wd-heading-title">', $after = '</h1>', $custom_class = ''){ 
		ob_start();
		global $post; ?>
		<?php if ($display == '1'): ?>
			<div class="wd-title-post <?php echo esc_attr($custom_class); ?>">
				<?php echo $before; ?>
					<?php $title_content = (get_the_title() != '') ? esc_html(get_the_title()) : esc_html('View detail (No title)','solar'); ?>
					<?php echo $title_content; ?>
				<?php echo $after; ?>
			</div>
		<?php endif ?>
		<?php 
		echo ob_get_clean();
	}
}

if(!function_exists ('tvlgiao_wpdance_display_post_sticky')){
	function tvlgiao_wpdance_display_post_sticky($custom_class = ''){ 
		ob_start();
		global $post; ?>
		<?php if ( is_sticky() ) : ?>
			<span class="sticky-post <?php echo esc_attr($custom_class); ?>">
				<?php esc_html_e( 'Sticky', 'solar' ); ?>
			</span>
		<?php endif ?>
		<?php 
		echo ob_get_clean();
	}
}

if(!function_exists ('tvlgiao_wpdance_display_post_author')){
	function tvlgiao_wpdance_display_post_author($display = '1', $custom_class = ''){ 
		ob_start();
		global $post; ?>
		<?php if ($display == '1'): ?>
			<div class="wd-author-post <?php echo esc_attr($custom_class); ?>">
				<span class="lnr lnr-user"></span>
				<span itemprop="author"><?php the_author_posts_link(); ?></span>
			</div>
		<?php endif ?>
		<?php 
		echo ob_get_clean();
	}
}

if(!function_exists ('tvlgiao_wpdance_display_post_category')){
	function tvlgiao_wpdance_display_post_category($display = '1', $custom_class = ''){ 
		ob_start();
		global $post; ?>
		<?php if ($display == '1' && has_category()): ?>
			<div class="wd-category-post <?php echo esc_attr($custom_class); ?>">
				<span class="lnr lnr-pushpin"></span>
				<?php the_category(esc_html__(', ', 'solar')); ?>
			</div>
		<?php endif ?>
		<?php 
		echo ob_get_clean();
	}
}

if(!function_exists ('tvlgiao_wpdance_display_post_date')){
	function tvlgiao_wpdance_display_post_date($display = '1', $custom_class = ''){ 
		ob_start();
		global $post; ?>
		<?php if ($display == '1'): ?>
			<div class="wd-date-post <?php echo esc_attr($custom_class); ?>">
				<div class="wd-date-post-day"><?php the_time('j') ?></div>
				<div class="wd-date-post-my">
					<span><?php the_time('M'); ?></span>
					<span><?php the_time('Y'); ?></span>
				</div>
			</div>
		<?php endif ?>
		<?php 
		echo ob_get_clean();
	}
}

if(!function_exists ('tvlgiao_wpdance_display_post_number_comment')){
	function tvlgiao_wpdance_display_post_number_comment($display = '1', $custom_class = ''){ 
		ob_start();
		global $post; ?>
		<?php if ($display == '1'): ?>
			<div class="wd-number-comment-post <?php echo esc_attr($custom_class); ?>">
				<span class="lnr lnr-bubble"></span>
				<?php
					echo $comment_number = get_comments_number() < 10 && get_comments_number() > 0 ? '0'.get_comments_number() : get_comments_number() ;
					//printf( _n( '%s Comment', '%s Comments', $comment_number, 'solar' ), $comment_number);
				?>
			</div>
		<?php endif ?>
		<?php 
		echo ob_get_clean();
	}
}

if(!function_exists ('tvlgiao_wpdance_display_post_tag')){
	function tvlgiao_wpdance_display_post_tag($display = '1', $custom_class = ''){ 
		ob_start();
		global $post; ?>
		<?php if ($display == '1'): ?>
			<?php if (has_tag()): ?>
				<div class="wd-tag-post <?php echo esc_attr($custom_class); ?>">
					<?php if (is_single()): ?>
						<span><?php esc_html_e('Tags: ','solar'); ?></span>
					<?php else: ?>
						<span class="lnr lnr-tag"></span>
					<?php endif ?>
					<?php the_tags(esc_html__('', 'solar'),esc_html__(', ', 'solar')); ?>
				</div>
			<?php endif ?>
		<?php endif ?>
		<?php 
		echo ob_get_clean();
	}
}

/* Edit link on single post / page */
if(!function_exists ('tvlgiao_wpdance_display_post_edit_link')){
	function tvlgiao_wpdance_display_post_edit_link() {
		edit_post_link(esc_html__( 'Edit', 'solar' ), '<div class="wd-edit-link"><span class="lnr lnr-pencil"></span> ', '</div>' );
	}
}

if(!function_exists ('tvlgiao_wpdance_display_post_excerpt')){
	function tvlgiao_wpdance_display_post_excerpt($display = '1', $number_excerpt = 20, $custom_class = ''){ 
		ob_start();
		global $post;
		$show_hidden_class = ($display == '1') ? 'wd-blog-desc-show' : 'wd-blog-desc-hidden' ;
		?>
		<div itemprop="description" class="wd-content-detail-post <?php echo esc_attr($show_hidden_class); ?> <?php echo esc_attr($custom_class); ?>">
			<?php if (get_the_content() || get_the_excerpt()): ?>
					<?php if (!post_password_required()): ?>
							<?php tvlgiao_wpdance_the_excerpt_max_words($number_excerpt); ?>
					<?php else: ?>
						<?php echo get_the_password_form(); ?>
					<?php endif ?>
			<?php endif ?>
		</div>
		<?php 
		echo ob_get_clean();
	}
}

if(!function_exists ('tvlgiao_wpdance_display_post_readmore')){
	function tvlgiao_wpdance_display_post_readmore($display = '1', $custom_class = ''){ 
		ob_start();
		global $post;
		?>
		<?php if ($display == '1' && !is_home()): ?>
			<div class="readmore <?php echo esc_attr($custom_class); ?>">
				<a itemprop="sameAs" class="readmore_link" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','solar') ?></a>
			</div>
		<?php endif ?>
		<?php 
		echo ob_get_clean();
	}
}

if(!function_exists ('tvlgiao_wpdance_display_post_page_link')){
	function tvlgiao_wpdance_display_post_page_link(){ 
		wp_link_pages( array(
			'before'      => '<div class="wd-page-links"><span class="wd-page-links-title">' . esc_html__( 'Pages:', 'solar' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
		) );
	}
}

if(!function_exists ('tvlgiao_wpdance_display_post_previous_next_btn')){
	function tvlgiao_wpdance_display_post_previous_next_btn($display = '1', $custom_class = ''){ 
		ob_start();
		global $post;
		?>
		<?php if ($display == '1'): ?>
			<div class="wd-next-previous-post <?php echo esc_attr($custom_class); ?>">
				<?php
					$next_post = get_next_post();
					$previous  = get_previous_post()
				?>
				<?php if($previous){
					$title = esc_html('Previous Post','solar'); ?>
					<div class="wd-navi-prev">
						<a class="wd-navi-icon" data-toggle="tooltip" title="<?php echo $title; ?>" href="<?php echo get_permalink( $previous->ID ); ?>"><span><i class="lnr lnr-chevron-left"></i></span></a>
						<a class="wd-navi-tile" data-toggle="tooltip" title="<?php echo $title; ?>" href="<?php echo get_permalink( $previous->ID ); ?>"><span><?php echo $title; ?></span></a>
					</div>
				<?php } ?>
				<?php if($next_post){ 
					$title = esc_html('Next Post','solar'); ?>
					<div class="wd-navi-next">
						<a class="wd-navi-tile" data-toggle="tooltip" title="<?php echo $title; ?>" href="<?php echo get_permalink( $next_post->ID ); ?>"><span><?php echo $title; ?></span></a>
						<a class="wd-navi-icon" data-toggle="tooltip" title="<?php echo $title; ?>" href="<?php echo get_permalink( $next_post->ID ); ?>"><span><i class="lnr lnr-chevron-right"></i></span></a>
					</div>
				<?php } ?>
			</div>
		<?php endif ?>
		<?php 
		echo ob_get_clean();
	}
}

if(!function_exists ('tvlgiao_wpdance_remove_all_image_content_post')){
	function tvlgiao_wpdance_remove_all_image_content_post($content = ''){ 
		ob_start();
		global $post;
		$content = ($content) ? $content : apply_filters( 'the_content', get_post_field('post_content', get_the_ID()) );
		$content = preg_replace('/<img[^>]+./', '', $content);
		//add gallery to content
		$content .= tvlgiao_wpdance_display_post_thumbnail_gallery('full', 1, false, 10);
		return $content;
	}
}