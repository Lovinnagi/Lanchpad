<div class="row collapse  head-container dark">
	<div class="medium-12 columns">
		<div class="row collapse">
		<?php if(have_rows('rev_slider')):
			while(have_rows('rev_slider')):the_row(); ?>
				<div class="medium-12 large-6 columns big-image">
				<?php echo do_shortcode( get_sub_field('rev_shortcode') ); ?>
				</div>
		<?php 
			endwhile;
			endif;
		?>
		</div>
</div>
</div>