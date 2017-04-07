<?php if( have_rows('cols') ):  $head = 1;?>
		<div class="row " >
	<?php	while( have_rows('cols') ): the_row(); ?>
<?php if(get_sub_field('col_cat')):?>
	<?php 
	$qr_args = array(
	'cat' =>get_sub_field("col_cat"),
	'posts_per_page' =>get_sub_field('num_posts')
	);
	$catloop = new WP_Query($qr_args);	i
	if($catloop->have_posts()): $counter =1 ; ?>
	<?php while($catloop->have_posts()):$catloop->the_post() ; ?>
		<div class="medium-6  medium-offset-3 columns content-column">
			<?php the_title(); ?>
		</div>
	<?php $counter++;
	endwhile; wp_reset_postdata(); ?>
<?php endif; ?>
<?php endif; ?>
	<?php endwhile;  ?>
		</div>
<?php endif; ?>