<div class="row collapse head-container dark">

	<?php 
		if(have_rows('rev_slider')): 
			$counter = 0;
			while(have_rows('rev_slider')):the_row(); 
				$slider[$counter] = get_sub_field('rev_shortcode');
				$counter++;
			endwhile;
		endif;

	?>

	<div class="medium-12 large-8 columns big-image">			
		<?php echo do_shortcode($slider[0]); ?>
	</div>
	<div class="medium-12 large-4 columns " >
		<?php echo do_shortcode($slider[1]); ?>
	</div>
	<div class="medium-12 large-4 columns " >
		<?php echo do_shortcode($slider[2]); ?>
	</div>

	</div>