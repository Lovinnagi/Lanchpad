<?php 
$color_scheme = get_sub_field('clr_sch');
include(locate_template('/views/padding-controller.php'));
// Styling
	$style="";
	if(get_sub_field('bg_clr')){
		$style= 'style="';
			get_sub_field('bg_clr')? $style.= 'background-color:'.get_sub_field('bg_clr').';':'';
		$style.= '"';
	}
?>
<section  class="pro-offers view team <?php echo ($color_scheme)?$color_scheme:''; ?> <?php echo $section_padd ?> <?php echo $section_marg ?> " 
	<?php if(get_sub_field('section_id')): ?>
		id="<?php the_sub_field('section_id'); ?>"
	<?php endif; ?>
	<?php echo $style ; ?>
>

<div class="rel-sec "  >
				<?php echo $overlay ?>
			<div class="section-content">
			<!-- Heading -->
		<div class="row header-title">
		<div class="medium-9 columns">
			<?php if( get_sub_field('title')): ?>
			<h2 class="section-title ">
			<?php if( get_sub_field('title_link')): ?>
				<a href="<?php the_sub_field('title_link') ?>"
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
		<!-- Heading -->
		
		

		<?php if( have_rows('cols') ):  //if(have_rows)
		$head = 1; ?>
				<div class="row " >
			<?php	while( have_rows('cols') ): the_row(); 
							print_r( get_sub_field('cols') ); //while(have_rows)
			?>			
					<div class="medium-4 columns content-column">
						<div class="row collapse">
			<div class="table-content table-<?php echo $tablenum ?>">
							<div class="large-4  cell square-thumb" style="">
								<div class="teamImg" style="background-image: url(<?php the_sub_field('image') ?>)">
								  
								 </div>
							</div>
							<div class="large-8  cell well-c-block">
								<div class="wells-content">
								<h4 class="red-text">
									<?php 
						the_sub_field('title'); ?>

								</h4>
								<?php 
						the_sub_field('job_role'); ?>
								</div>
									<?php //echo limitWords(get_the_content(), 12); ?>
								
							</div>
						
						</div>
						</div>
		</div>
								
			
		<?php if($head%3==0){ ?>
		</div>
		<div class="row">

		<?php $head = 0; } ?>
		
			
		<?php $head++; endwhile; //while(have_rows) ?>
		</div>
		<?php endif; // if(have_rows) ?>
					
			
					
						
						
						
					
			
				</div>
							
			</div>
		


</section>