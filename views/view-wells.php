<?php 
include(locate_template('/views/padding-controller.php'));

// Styling
	$style="";
	if(get_sub_field('bg_clr')|| get_sub_field('bg_img')){
		$style= 'style="';
	
		if(get_sub_field('bg_clr')){
			get_sub_field('bg_clr')? $style.= 'background-color:'.get_sub_field('bg_clr').';':'';
		}
		if(get_sub_field('bg_img')){
			$bgimg = get_sub_field('bg_img');
			$style.= ' background-size:cover;';
			$style.= ' background-image:url('.$bgimg[sizes][large].');';
		}
		$style.= '"';
	}
	
	// Overlay Settings
	$over_bg_clr = (get_sub_field('over_bg_clr'))? get_sub_field('over_bg_clr'):'#000';
	$over_opct = (get_sub_field('over_opct'))? get_sub_field('over_opct') : ".5";	
	
	$over_style = 'style="';
	$over_style .= 'background-color:'.$over_bg_clr.';';
	$over_style .= 'opacity:'.$over_opct.';"';
	
	
	(get_sub_field('overlay'))?	$overlay='<div class="overlay-scr" '.$over_style.'></div>':'';

?>
<section  class="view wells  <?php echo $section_padd ?> <?php echo $section_marg ?>" 
	<?php if(get_sub_field('section_id')): ?>
		id="<?php the_sub_field('section_id'); ?>"
	<?php endif; ?>
	<?php echo $style ; ?>
>
<?php echo $overlay ?>
<div class="rel-sec" >
<div class="row header-title">
<div class="medium-9 columns">
	<?php if( get_sub_field('title')): ?>
	<h2 class="section-title ">
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
			<?php  echo wp_strip_all_tags(get_sub_field('subtitle'));  ?>
		</small>
		<?php endif; ?>
	<?php endif; ?>
	</h2>
<?php endif; ?>
</div>
<?php if(get_sub_field('see_all')!=''): ?>
		<div class="large-3 columns text-right">
			<a href="<?php the_sub_field('title_link'); ?>" class="see-all">

				<?php the_sub_field('see_all'); ?> <i class="fa fa-chevron-right" aria-hidden="true"></i>
			</a>
		</div>
		<?php endif; ?>
</div>
	
<?php if(have_rows('add_block')): $tablenum=1; ?>
<div class="row">
	<?php 
		$delay=200;
		while(have_rows('add_block')): the_row();?>
		<div data-aos="fade-up" data-aos-delay ="<?php echo $delay; ?>"  data-aos-duration ="500" class="large-6 columns content-column" style="padding-bottom:2em;" >

			<div class="row collapse">
			<div class="table-content table-<?php echo $tablenum ?>">
				<div class="medium-5  cell square-thumb" style=" ;background-image:url(<?php print_r(get_sub_field('block_img')['sizes']['img-800']) ?>);
						background-size:cover;
						background-position:center;
					" >
					
				</div>
				<div class="medium-7  cell well-c-block">
					<div class="wells-content">
						<h3 class="red-text">
							<a  href="<?php the_sub_field('cta_url') ?>" title="<?php echo wp_strip_all_tags(get_sub_field('title')); ?>">
								<?php  echo wp_strip_all_tags(get_sub_field('title')); ?>
							</a>
						</h3>
						<p><?php echo wp_strip_all_tags(get_sub_field('des')); ?></p>
						<p>
							<a class="button red wells-btn" href="<?php (get_sub_field('cta_url'))?the_sub_field('cta_url'):'#'; ?>" title="<?php the_sub_field('title') ?>">
								<?php the_sub_field('cta_btn_txt') ?>
							</a>
						</p>
					</div>
				</div>
			</div>
			</div>

		</div>
	<?php 
		$tablenum++;$delay+=300;
	endwhile; ?>
</div>
</div>
<?php endif; ?>
</section>