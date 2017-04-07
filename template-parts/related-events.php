<?php 	
	// Related Posts
	global $post;
				global $wpdb;				
				$args = array(
					'post_type'  => 'ajde_events',
					'post_status'=>'publish',
					'posts_per_page' => 3,  					
					'orderby'        => 'rand',
				);
				
				if($relatedEventType1 && $relatedEventType2 ){	
					$args['tax_query']=array(
											'relation' => 'OR',
											array (
												'taxonomy' => 'event_type',
												'field' => 'name',
												'terms' => $relatedEventType1,
											),
											array (
												'taxonomy' => 'event_type_2',
												'field' => 'name',
												'terms' => $relatedEventType2,
											),
										);
				}
				elseif($relatedEventType1){					
					$args['tax_query']=array(											
											array (
												'taxonomy' => 'event_type',
												'field' => 'name',
												'terms' => $relatedEventType1,
											)											
										);
				}
				elseif($relatedEventType2){
					$args['tax_query']=array(											
											array (
												'taxonomy' => 'event_type_2',
												'field' => 'name',
												'terms' => $relatedEventType2,
											)											
										);
				}
				
				$query = new WP_Query( $args );										
				$posts = $query->posts;							

	if($posts):
	?>
	<div class="related-posts  padd-bot-4">
	<div class="row header-title padd-bot-2">
		<div class="medium-12 columns">
			<h2 class="section-title ">
				Related Events
			</h2> 
			
		</div>
		
	</div>
	
	
		<div class="row">
	<?php 
	foreach ( $posts as $post ) : setup_postdata( $post );
	?>	
		<div  data-aos="fade-up" data-aos-duration="500" data-aos-delay="200" class="medium-12 small-12 large-4 columns end related-post">
			<?php if(has_post_thumbnail($post->ID)): ?>
			<div class="col-img padd-bot-2 radius-4">
				<a  href="<?php the_permalink($post->ID); ?>" title="<?php echo get_the_title($post->ID) ?>">
					<div  class="radius-4 related-ft-image" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'thumb-400'); ?>'); background-position: 50% 50%;margin:0 auto;background-repeat:no-repeat;background-size:cover;"></div>
					<?php //the_post_thumbnail('thumb-400') ?>
				</a>
			</div>					
			<?php endif; ?>			
			<h3 class="five-title red-text  ">
				<a href="<?php the_permalink($post->ID); ?>" title="<?php echo get_the_title($post->ID); ?>" >
					<?php echo get_the_title($post->ID); ?>
				</a>
			</h3>
			<div class="col-content">
				<?php $trimmed = substr(get_the_excerpt($post->ID),0,200);	?>
				<p><?php 
					echo $trimmed;
				?> ...</p>
				<?php //the_excerpt() ?>
			</div>
			<div class="text-right">
				<a href="<?php the_permalink($post->ID); ?>" title="<?php the_title($post->ID) ?>" class="red-text read-more">
				Read More 
				<i class="fa fa-arrow-right" aria-hidden="true"></i>
				</a>
			</div>
		</div>
<?php 
	endforeach;
	?>
		</div>
	</div>
	<?php 
	wp_reset_postdata();
	endif;
	?>