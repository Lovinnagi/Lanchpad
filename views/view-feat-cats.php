<?php 
// Settings
include(locate_template('/views/padding-controller.php'));
?>
<section  class="offers view <?php echo $section_padd ?> <?php echo $section_marg ?>" 
	<?php if(get_sub_field('section_id')): ?>
		id="<?php the_sub_field('section_id'); ?>"
	<?php endif; ?>
>
<div class="row">
	<div class="large-10 large-offset-1 columns">
		<div class="row collapse">
		<h2 class="section-title"><?php the_sub_field('title') ?></h2>
		<?php echo apply_filters ("the_content",get_sub_field('des')) ?>
		</div>
	</div>
</div>
</section>