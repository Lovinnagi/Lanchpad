<div data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="200" class="section-full <?php echo $color_scheme;?>" <?php echo $style ; ?>>
		<?php echo $overlay ?>
		<div class="row">
	<div class="large-10 large-offset-1 columns">
		<div class="row collapse" >
			<div class="content <?php echo $align ?>">
				<h2 class="section-title"><?php the_sub_field('title') ?></h2>
				<div class="section-des">
					<?php the_sub_field('des') ?>
					<?php if($offer_cta):?>
						<a class="button alert" href="<?php echo $offer_cta ?>">
						<?php the_sub_field('sp_btn_text'); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
	</div>