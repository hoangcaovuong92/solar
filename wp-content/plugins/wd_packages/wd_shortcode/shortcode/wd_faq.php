<?php
if ( ! function_exists( 'tvlgiao_wpdance_faq_function' ) ) {
	function tvlgiao_wpdance_faq_function( $atts ) {
		extract(shortcode_atts( array(
			'ids'					=> '-1',
			'posts_per_page'		=> -1,
			'style'					=> 'normal',
			'sort'      			=> 'DESC',
			'order_by'    			=> 'date',
			'class'      			=> '',
		), $atts ));

		$list_faq_cat_ids 		= $ids != -1 ? array_filter(explode(',', $ids)) : array();
		$faq_style_class 		= 'wd-faq-style-'.$style;
		$args = array(
		    'hide_empty' => true,
		);

		if (count($list_faq_cat_ids) > 0) {
			$args['include']   	= $list_faq_cat_ids;
		}

		$faq_categories = get_terms( 'wpdance_faq_categories', $args );
		$count 			= count($faq_categories);
		$faq_categories = $count == 0 ? array('' => '') : $faq_categories;
		ob_start();?>
        <div id="wd-section-faq-template" class="row wd-shortcode-faq <?php echo esc_attr($faq_style_class); ?>">
        	<div class="faqs-content">
        		<?php if ($style == 'tab'): ?>
        			<div class="faqs-inner">
	        			<?php if ($count > 1): ?>
	        				<div class="col-md-6">
		        				<ul class="nav nav-tabs">
		        					<?php $i = 1; ?>
		        					<?php foreach ( $faq_categories as $faq_category ) { ?>
		        						<?php $class_active = ($i == 1) ? 'active' : ''; ?>
								        <li class="<?php echo esc_html($class_active); ?>">
				                          <a href="#faq_tab<?php echo $i; ?>" data-toggle="tab"><?php echo esc_html($faq_category->name); ?></a>
				                        </li>
				                        <?php $i++; ?>
								    <?php } ?>
		        				</ul>
		        			</div>
	        			<?php endif ?>
	        			<div class="col-md-<?php echo ($count > 1) ? '18 wd-faq-with-tab' : '24'; ?>">
	        				<div class="tab-content">
	        					<?php $i = 1; ?>
	        					<?php foreach ( $faq_categories as $faq_category ) { ?>
	        						<?php // New blog
									$args = array(  
										'post_type' 		=> 'wpdance_faq',  
										'posts_per_page' 	=> $posts_per_page,
										'order'				=> $sort,
										'orderby'			=> $order_by,
									);
									if (isset($faq_category->term_id)) {
										$args['tax_query'] = array(
									    	array(
										    	'taxonomy' 		=> 'wpdance_faq_categories',
												'terms' 		=> $faq_category->term_id,
												'field' 		=> 'term_id',
												'operator' 		=> 'IN'
											)
							   			);
									}
									$faq_list 		= new WP_Query( $args );
									?>
									<?php $class_active = ($i == 1) ? 'active' : ''; ?>
									<?php if( $faq_list->have_posts() ) :?>
		        						<!-- Loop tab -->
			        					<div class="tab-pane <?php echo esc_html($class_active); ?>" id="faq_tab<?php echo $i; ?>">
			        						<div class="panel-group" id="accordion<?php echo $i; ?>" role="tablist" aria-multiselectable="true">
			        							
		        								<?php $y = 1; ?>
												<?php while( $faq_list->have_posts() ) : $faq_list->the_post(); global $post; ?>
													<?php $class_active_post = ($y == 1) ? 'active' : ''; ?>
			        								<!-- Loop post -->
			        								<div class="panel panel-default">
				        								<div class="panel-heading <?php echo esc_html($class_active_post); ?>" role="tab" id="tab<?php echo $i; ?>_heading<?php echo $y; ?>">
				        									<h4 class="panel-title">
				        										<a class="<?php echo ($y != 1) ? 'collapsed' : ''; ?>" data-toggle="collapse" data-parent="#accordion<?php echo $i; ?>" href="#tab<?php echo $i; ?>_collapse<?php echo $y; ?>" aria-expanded="<?php echo ($y == 1) ? 'true' : 'false'; ?>" aria-controls="tab<?php echo $i; ?>_collapse<?php echo $y; ?>">
				        											<!-- <i class="more-less fa-icon fa fa-arrow-circle-o-up"></i>  -->
				        											<?php echo $y.'. '; ?><?php the_title(); ?>
				        										</a>
				        									</h4>
				        								</div>
				        								<div id="tab<?php echo $i; ?>_collapse<?php echo $y; ?>" class="panel-collapse collapse <?php echo ($y == 1) ? 'in' : ''; ?>" role="tabpanel" aria-labelledby="tab<?php echo $i; ?>_heading<?php echo $y; ?>">
				        									<div class="panel-body">
				        										<?php the_content(); ?>
				        									</div>
				        								</div>
			        								</div>
			        								<!-- end loop post -->
			        								<?php $y++; ?>
		        								<?php endwhile; ?>
		        								<?php wp_reset_query(); ?>
			        						</div>
			        					</div>
		        						<!-- end Loop tab -->
	        						<?php endif; ?>	
	        						<?php $i++; ?>
	    						<?php } ?>
	        				</div>
	        			</div>              
	        		</div>
        		<?php else: ?>
					<div class="faqs-inner">
	        			<div class="col-md-24">
	        				<div class="tab-content">
	        					<?php 
	        					$i = 1;  
								$args = array(  
									'post_type' 		=> 'wpdance_faq',  
									'posts_per_page' 	=> $posts_per_page,
									'order'				=> $sort,
									'orderby'			=> $order_by,
								);
								if (count($list_faq_cat_ids) > 0) {
									foreach ($list_faq_cat_ids as $faq_cat_id) {
										$args['tax_query'][] = array(
									    	'taxonomy' 		=> 'wpdance_faq_categories',
											'terms' 		=> $faq_cat_id,
											'field' 		=> 'term_id',
											'operator' 		=> 'IN'
							   			);
									}
								}
								$faq_list 		= new WP_Query( $args );
								?>
								<?php if( $faq_list->have_posts() ) :?>
	        						<?php while( $faq_list->have_posts() ) : $faq_list->the_post(); global $post; ?>
	        								<div class="wd-faq-item">
	        									<h4 class="wd-faq-title"><?php echo $i.'. '; ?><?php the_title(); ?></h4>
	        									<div class="wd-faq-body"><?php the_content(); ?></div>
	        								</div>
	        							<?php $i++; ?>
    								<?php endwhile; ?>
    								<div class="wd-pagination">
										<?php tvlgiao_wpdance_pagination(3, $faq_list); ?>
									</div>
    								<?php wp_reset_query(); ?>
        						<?php endif; ?>	
	        				</div>
	        			</div>              
	        		</div>
        		<?php endif ?>
        		
        	</div>
        </div>
		<?php
		wp_reset_postdata();
		return ob_get_clean();
	}
}
add_shortcode( 'tvlgiao_wpdance_faq', 'tvlgiao_wpdance_faq_function' );