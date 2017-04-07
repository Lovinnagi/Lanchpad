
<?php 
include(locate_template('/views/padding-controller.php'));
$section_padd = "padd-1";
$color_scheme = get_sub_field('clr_sch');

//$block_scheme = get_sub_field('blc_sch');
$grid_size =get_sub_field('grid_size');
//echo "<pre>";var_dump($grid_size );die;
if($grid_size==3){
	$grid_size = "medium-up-3";
}elseif($grid_size==4){
	$grid_size = "medium-up-3 large-up-4";	
}

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
<section  class="<?php echo $section_padd ?> <?php echo $section_marg ?> pro-offers view four-desc-cols <?php echo ($color_scheme)?$color_scheme:''; ?>" 
	<?php if(get_sub_field('section_id')): ?>
		id="<?php the_sub_field('section_id'); ?>"
	<?php endif; ?>
	<?php echo $style ; ?>
>

<div class="rel-sec "  >
				<?php echo $overlay ?>
			<div class="section-content">
		<!--  heading -->
		<?php if( get_sub_field('title')): ?>
		<div class="row header-title">
		<div class="medium-9 columns">
			
			<h2 class="section-title ">
			<?php if( get_sub_field('title_link')): ?>
				<a  href="<?php the_sub_field('title_link') ?>"
				title="<?php echo wp_strip_all_tags(get_sub_field('title')); ?>">
					<span class="main">
						<?php  echo wp_strip_all_tags(get_sub_field('title'));  ?>
					</span>
				<?php if( get_sub_field('subtitle')): ?>
					<small class="crem-text sub">
						<?php  echo wp_strip_all_tags(get_sub_field('subtitle'));  ?>
					</small>
				<?php endif; ?>
				</a>
			<?php else: ?>
				<?php echo wp_strip_all_tags(get_sub_field('title'));  ?>
					<?php if( get_sub_field('subtitle')): ?>
				<small class="crem-text sub">
					<?php  echo wp_strip_all_tags(get_sub_field('subtitle')); ?>
				</small>
				<?php endif; ?>
			<?php endif; ?>
			</h2>
		
		</div>
		<?php if(get_sub_field('see_all')!=''): ?>
		<div class="large-3 columns text-right">
			<a href="<?php the_sub_field('title_link'); ?>" class="see-all">

				<?php the_sub_field('see_all'); ?> <i class="fa fa-chevron-right" aria-hidden="true"></i>
			</a>
		</div>
		<?php endif; ?>

	</div>
	<?php endif; ?>
		<!-- heading -->
			<?php if( have_rows('columns') ):
				$col_num = 1;
				//echo "<pre>";var_dump($grid_size);die;
			?>
			
				<div class="row small-up-1 content-columns <?php echo $grid_size; ?>" >
					
			<?php	$delay=200;
					while( have_rows('columns') ): the_row(); 
						
			?>
					<div data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="<?php echo $delay; ?>" class="column column-block descBox" style="position: relative;">
					<?php if(get_sub_field('column_url')): ?>
						<a href="<?php the_sub_field('column_url') ?>" title="<?php  echo wp_strip_all_tags(get_sub_field('title'));  ?>" class="box-link">
							<span class="no-disp">
								<?php  echo wp_strip_all_tags(get_sub_field('title'));  ?>
							</span>
						</a>
					<?php endif; ?>
						<!--  <div class="columns descBox end col-<?php echo $col_num ?> <?php 
							echo ($col_num=3)?'end':'';
						?>" style="position: relative;"> -->
						
							<!--<a href="#" class="fcLink">
									
								</a> -->

								<?php $col_img = get_sub_field('column_image'); 
								if(get_sub_field('column_image')) :
								?>		
								<div class="descImage">								
									<img src="<?php echo $col_img[sizes]['thumb-400'] ?>" alt="<?php the_sub_field('title') ?>"/>
								</div>
							<?php endif; ?>
								<div class="descText <?php if(get_sub_field('column_image')){ echo 'medium-9'; }else{echo 'medium-12';} ?>" >
									<h4><?php echo wp_strip_all_tags (get_sub_field('title')); ?></h4>
									<?php echo wp_strip_all_tags(get_sub_field('des')); ?>	
								</div>
						
							
								<?php /* <?php 								
									$col_img = get_sub_field('column_image');
								?>							
								<?php if(($col_img) && ($block_scheme == 'circle')): ?>
								<div class="circle-image">
								<img src="<?php echo $col_img[sizes]['thumb-400'] ?>" alt="<?php the_sub_field('title') ?>"/>
								<div class="circle-title text-center">
									<div class="table-content">
										<div class="cell">
											<h4><?php the_sub_field('title') ?></h4>
										</div>
									</div>
								</div>
								</div>
								<?php endif; ?>
								<?php if(($col_img) && ($block_scheme == 'round')): ?>
								<div class="square-image">
								<img src="<?php echo $col_img[sizes]['thumb-400'] ?>" alt="<?php the_sub_field('title') ?>"/>
								<div class="square-title text-center">
									<div class="table-content">
										<div class="cell">
											<h4><?php the_sub_field('title') ?></h4>
										</div>
									</div>
								</div>
								</div>
								<?php endif; ?>
								<h5 class="subtitle red-text"><?php the_sub_field('subtitle') ?></h5>
								<?php the_sub_field('des') ?>	*/ ?>				
						<!-- </div> -->
					
					</div>
			<?php $col_num++; $delay+=200; endwhile; ?>
				</div>
			<?php endif; ?>				
			</div>
			</div>


</section>