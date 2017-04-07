<?php 
// Settings
include(locate_template('/views/padding-controller.php'));
?>
<section  class="plain-text view <?php echo $section_padd ?> <?php echo $section_marg ?>" 
	<?php if(get_sub_field('section_id')): ?>
		id="<?php the_sub_field('section_id'); ?>"
	<?php endif; ?>
style="background-color:<?php the_sub_field('bg_clr'); ?>" >
<?php if( get_sub_field('title')): ?>
	<div class="row header-title padd-bot-25" >
		<div class="large-12 columns">
			
				<h2 class="section-title">
				<?php if( get_sub_field('title_link')): ?>
					<a  href="<?php the_sub_field('title_link') ?>"
					title="<?php the_sub_field('title') ?>">
						<span class="main">
							<?php the_sub_field('title') ?>
						</span>
					<?php if( get_sub_field('subtitle')): ?>
						<small class="crem-text sub">
							<?php the_sub_field('subtitle') ?>
						</small>
					<?php endif; ?>
					</a>
				<?php else: ?>
					
					<?php the_sub_field('title') ?>
						<?php if( get_sub_field('subtitle')): ?>
					<small class="crem-text sub">
						<?php the_sub_field('subtitle') ?>
					</small>
					<?php endif; ?>
				
				<?php endif; ?>
				
				</h2>
			
		</div>
	</div>
	<?php endif; ?>
	<div class="row " data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="200" >
		<div class="medium-12 columns" >
			<?php echo get_sub_field('content');  ?>
		</div>
	</div>

</section>