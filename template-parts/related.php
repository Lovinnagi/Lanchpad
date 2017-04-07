<?php 
	// Related Posts
$rel_args= array(
	'num_of_posts'=>3,
	'category__in' => $cat_arr,
	'tag__in' => $tag_arr,
	'post__not_in' => $crr_id 
);	
	$related_loop  = new WP_Query($rel_args);
	if($related_loop->have_posts()):
	?>
	<div class="related-posts  padd-bot-4">
	<div class="row header-title padd-bot-2">
		<div class="medium-12 columns">
			<h2 class="section-title ">
				Related Stories
			</h2>
			
		</div>
		
	</div>
	
	
		<div class="row">
	<?php 
	while($related_loop->have_posts()): $related_loop->the_post();
	?>	
		<div  data-aos="fade-up" data-aos-duration="500" data-aos-delay="200" class="medium-4 columns end related-post">
			<?php if(has_post_thumbnail()): ?>
			<div class="col-img padd-bot-2 radius-4">
				<a  href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
					<div class="radius-4 related-ft-image" style=" background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumb-400'); ?>'); background-position: 50% 50%;background-repeat:no-repeat;background-size:cover;"></div>
					<?php //the_post_thumbnail('thumb-400') ?>
				</a>
			</div>					
			<?php endif; ?>
			<h5 class="lgrey-text  ">
				<?php the_category(", ") ?>
			</h5>
			<h3 class="five-title red-text  ">
				<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>" >
					<?php the_title() ?>
				</a>
			</h3>
			<div class="col-content">
				<?php $trimmed = substr(get_the_excerpt(),0,200);	?>
				<p><?php 
					echo $trimmed;
				?> ...</p>
				<?php //the_excerpt() ?>
			</div>
			<div class="text-right">
				<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>" class="red-text read-more">
				Read More 
				<i class="fa fa-arrow-right" aria-hidden="true"></i>
				</a>
			</div>
		</div>
<?php 
	endwhile;
	?>
		</div>
	</div>
	<?php 
	wp_reset_postdata();
	endif;
	?>