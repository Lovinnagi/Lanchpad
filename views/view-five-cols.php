<?php 
include(locate_template('/views/padding-controller.php'));
$color_scheme = get_sub_field('clr_sch');
$block_scheme = get_sub_field('blc_sch');
$grid_size =get_sub_field('grid_size');
$grid_value =get_sub_field('grid_size');
$text_alignment=get_sub_field('text_alignment');
if($text_alignment=="center"){
	$text_alignment = "text-center";
}elseif($text_alignment=="left"){
	$text_alignment = "";
}else{
	$text_alignment = "text-center";
}
if($grid_size==2){
	$grid_size = "medium-up-2";
}elseif($grid_size==3){
	$grid_size = "medium-up-3";
}elseif($grid_size==4){
	$grid_size = "medium-up-3 large-up-4";	
}elseif($grid_size==5){
	$grid_size = "small-up-2 medium-up-3 large-up-5";	
}elseif($grid_size==6){
	$grid_size = "small-up-2 medium-up-3 large-up-6";	
}else{
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
<section  class="view five-cols <?php echo $section_padd ?> <?php echo $section_marg ?>" 
	<?php if(get_sub_field('section_id')): ?>
		id="<?php the_sub_field('section_id'); ?>"
	<?php endif; ?> <?php echo $style ; ?> 
>
<?php echo $overlay ?>
<div class="rel-sec <?php echo ($color_scheme)?$color_scheme:''; ?> ">
			
			<div class="section-content">

			<!-- heading -->
			<?php if( get_sub_field('title')): ?>
		<div class="row header-title ">
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
			<?php $grid_value = get_sub_field('grid_size'); ?>
			<?php if( have_rows('columns') ):
				$col_num = 1;
				$i = 1;
			?>
				<div class="row  <?php echo $grid_size?> content-columns" >


					
					
			<?php	
					$delay=200;					
					while( have_rows('columns') ): the_row(); 					
					?>
					<div data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="<?php echo $delay; ?>" class="column column-block" style="position: relative;">
						<?php if(get_sub_field('column_url')){ ?>
						<?php if( get_sub_field('new_win') ) { $target="_blank"; } else { $target="_self"; } ?>
						<a href="<?php the_sub_field('column_url'); ?>" class="box-link" target="<?php echo $target; ?>">
								
							</a>
						<?php } ?>
						
							<?php 								
								$col_img = get_sub_field('column_image');
							?>							
							<?php if(($col_img) && ($block_scheme == 'circle')): ?>
							<div class="circled">
							<div class="circled-content">
							
							<img src="<?php echo $col_img['sizes']['thumb-400'] ?>"/>
							
							</div>
							</div>
							
							<?php endif; ?>
							<?php if(($col_img) && ($block_scheme == 'round')): ?>
							<div class="squarer">
							<div class="square-content marg-bot-1">
							<?php if($grid_value == 2):?>
								<img src="<?php echo $col_img['sizes']['img-600'] ?>"/>
							<?php elseif($grid_value == 3):?>
								<img src="<?php echo $col_img['sizes']['thumb-400'] ?>"/>
							<?php else:?>
								<img src="<?php echo $col_img['sizes']['thumb-250'] ?>"/>
							<?php endif;?>
							</div>
							</div>
							
							<?php endif; ?>

							<div class="colum-content <?php echo $text_alignment ?>">

							<?php if(get_sub_field('subtitle')): ?>
							<h5 class="lgrey-text">
							<?php the_sub_field('subtitle') ?>
							</h5>
							<?php endif?>

							<?php if (get_sub_field('title') ): ?>
							<h3 class="five-title red-text">
							<?php if (get_sub_field('column_url') ): ?>
							<?php if( get_sub_field('new_win') ) { $target="_blank"; } else { $target="_self"; } ?>
								<a 
								href="<?php the_sub_field('column_url'); ?>" 
								title ="<?php the_sub_field('title')
								?>" target="<?php echo $target; ?>">
									<?php the_sub_field('title') ?>
								</a>
							<?php else: ?>
								<?php the_sub_field('title') ?>
							<?php endif; ?>
							</h3>
							<?php endif; ?>

							<?php if(get_sub_field('des')): ?>
							 <?php echo apply_filters("the_content",get_sub_field('des')) ?>	
								<?php if( get_sub_field('column_url') ):?>
								<?php if( get_sub_field('new_win') ) { $target="_blank"; } else { $target="_self"; } ?>
									<a href="<?php the_sub_field('column_url'); ?>" class="red-text read-more" target="<?php echo $target; ?>">
									Read More <i class="fa fa-chevron-right" aria-hidden="true"></i>
									</a>
								<?php endif; ?>
							<?php endif?>
							</div>
					</div>
				<?php if($grid_value == 2 && $i==2): break; ?>
				<?php endif; ?>
				
			<?php $col_num++; $i++;$delay+=100; endwhile; ?>
				</div>
			<?php endif; ?>				
			</div>
			</div>
			<?php if(get_sub_field('see_all')!=''): ?>
				<div class="row">
		<div  class="large-4 text-center large-offset-4 columns">
			<a data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="200" href="<?php the_sub_field('title_link'); ?>" class="see-all">

				<?php the_sub_field('see_all'); ?> <i class="fa fa-chevron-right" aria-hidden="true"></i>
			</a>
		</div>
		</div>
		<?php endif; ?>

</section>