<div class="rel-sec <?php echo $color_scheme ?> subs-normal"  >
			
	<div class="row collapse section-content" >
		<div class="medium-12 columns" >
			<div class="<?php echo $align ?> ">
				<h2 class="section-title subscribeTitle"><?php the_sub_field('title') ?></h2>
				<div class="section-des">
				<p>	<?php the_sub_field('des') ?></p>
				</div>
				<div class="section-form text-left">
					<div class="row">
	<div class="medium-6 medium-offset-3 columns">
		<div class="subs-form">
					<?php the_sub_field('subs_form_code'); ?>
		</div>
	</div>
</div>
				</div>
			</div>
		</div>
	</div>
</div>

