

		<div data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="200" class="row collapse <?php echo $color_scheme ?> section-content" <?php echo $style ; ?> >
				<?php echo $overlay ?>
			<div class="content <?php echo $align ?> ">
				<h6 class="pg-sub-title">
					<?php the_sub_field('subtitle') ?>
				</h6>
				<h2 class="pg-title"><?php the_sub_field('title') ?></h2>
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

