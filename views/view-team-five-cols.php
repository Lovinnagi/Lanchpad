<?php 
include(locate_template('/views/padding-controller.php'));
$color_scheme = get_sub_field('clr_sch');
$block_scheme = get_sub_field('blc_sch');

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
				$style.= ' background-image:url('.$bgimg[sizes]["img-3xl"].');';
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
<section  class="view five-cols team-cols <?php echo $section_padd ?>  <?php echo $section_marg ?>" <?php echo $style ; ?>  
	<?php if(get_sub_field('section_id')): ?>
		id="<?php the_sub_field('section_id'); ?>"
	<?php endif; ?>  
>

<div class="rel-sec <?php echo ($color_scheme)?$color_scheme:''; ?>" >
			<?php echo $overlay ?>
			<div class="section-content">

			<!-- heading -->
			<?php if( get_sub_field('title') != ''): ?>
		<div class="row header-title" style="margin-bottom: 1.2em;">
		<div class="medium-9 columns">
			
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
					<?php the_sub_field('subtitle') ?>
				</small>
				<?php endif; ?>
			<?php endif; ?>
			</h2>
		
		</div>
		
	</div>
	<?php endif; ?>
			<!-- heading -->
			<?php if( have_rows('columns') ):
				$col_num = 1;
				$i = 1;
			?>
				<div class="row small-up-2 medium-up-4 large-up-5 content-columns" >
					
			<?php	
				$animeTime=500;
				$delay=1000;
				while( have_rows('columns') ): the_row(); 
					
			?>
					<div data-aos="fade-up" data-aos-delay ="<?php echo $delay+=100; ?>"  data-aos-duration ="<?php echo $animeTime+=100; ?>" class="column column-block col-<?php echo $col_num ?> <?php 
						echo ($col_num=3)?'end':'';
					?>" style="position: relative;">
						<a href="<?php the_sub_field('column_url'); ?>" class="fcLink">
								
							</a>
						
							<?php 								
								$col_img = get_sub_field('column_image');
							?>							
							<?php if($block_scheme == 'circle'): ?>
							<?php if($col_img): ?>
							<div class="circle-image" style="background-image: url(<?php echo $col_img[sizes]['thumb-400'] ?>);">
							
							
							</div>
							<?php endif; ?>
							<?php if(get_sub_field('title')): ?>
							<div class="circle-title text-center">
								
								<h4><?php the_sub_field('title') ?></h4>
									
							</div>
							<?php endif; ?>
							<?php endif; ?>
							<?php if($block_scheme == 'round'): ?>
							<?php if($col_img): ?>
							<div class="square-image" style="background-image: url(<?php echo $col_img[sizes]['thumb-400'] ?>);">
							
							
							</div>
							<?php endif; ?>
							<?php if(get_sub_field('title')): ?>
							<div class="square-title text-center">
								
								<h4><?php the_sub_field('title') ?></h4>
									
							</div>
							<?php endif; ?>
							<?php endif; ?>
							<h5 class="subtitle red-text"><?php the_sub_field('subtitle') ?></h5>
							<?php the_sub_field('des') ?>	
							<p class="email_address">
							<?php the_sub_field('email_address') ?>					
							</p>
					</div>
					<?php endwhile; ?>
				</div>
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


</section>