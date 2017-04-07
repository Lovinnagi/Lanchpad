<?php 
include(locate_template('/views/padding-controller.php'));
$color_scheme = get_sub_field('clr_sch');

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
<section  class=" view three-cols <?php echo ($color_scheme)?$color_scheme:''; ?> <?php echo $section_padd ?> <?php echo $section_marg ?>" 
	<?php if(get_sub_field('section_id')): ?>
		id="<?php the_sub_field('section_id'); ?>"
	<?php endif; ?>
	<?php echo $style ; ?> 
>
<?php echo $overlay ?>
<div class="rel-sec <?php if(get_sub_field('custom_class')){the_sub_field('custom_class');} ?>" >
				
			<div class="section-content">
		<!-- heading -->
		<div class="row header-title">
		<div class="medium-12 columns">
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
					<?php the_sub_field('subtitle') ?>
				</small>
				<?php endif; ?>
			<?php endif; ?>
			</h2>
		<?php endif; ?>
		</div>
		
	</div>
			<!-- heading -->
			<?php if( have_rows('columns') ):
				$col_num = 1;
			?>
				<div class="row " >
			<?php		
					$delay=200;
					while( have_rows('columns') ): the_row(); ?>
					<div data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="<?php echo $delay; ?>" class="padd-top-2 medium-8 medium-offset-2 large-offset-0 large-4 columns  three-col col-<?php echo $col_num ?> <?php 
						echo ($col_num=3)?'end':'';
					?>">
					
							<?php 
								$col_img = get_sub_field('column_image');
							?>
							<?php if($col_img): ?>
							<div class="col-img padd-bot-2">
							<a  href="<?php the_sub_field('column_url'); ?>" title="<?php the_sub_field('title') ?>">
							<img class="radius-4" src="<?php echo $col_img['sizes']['thumb-400'] ?>" alt="<?php the_sub_field('title') ?>"/>
							</a>
							</div>
							
							<?php endif; ?>
							
							<?php if (get_sub_field('subtitle') ): ?>
							<h5 class="lgrey-text  ">
							<?php the_sub_field('subtitle') ?>
							</h5>
							<?php endif; ?>
							
							<?php if (get_sub_field('title') ): ?>
							<h3 class="five-title red-text">
							<?php if (get_sub_field('column_url') ): ?>
								<a 
								href="<?php the_sub_field('column_url'); ?>" 
								title ="<?php the_sub_field('title')
								?>" >
									<?php the_sub_field('title') ?>
								</a>
							<?php else: ?>
								<?php the_sub_field('title') ?>
							<?php endif; ?>
							</h3>
							<?php endif; ?>
							
							<div class="col-content">
							<?php echo wp_strip_all_tags(get_sub_field('des')); ?>
							</div>
							<?php if( get_sub_field('column_url') ):?>
								<a href="<?php the_sub_field('column_url'); ?>" class="red-text read-more">
									Read More <i class="fa fa-chevron-right" aria-hidden="true"></i>
								</a>
							<?php endif; ?>
							
						
					</div>
			<?php $col_num++; $delay+=300;endwhile; ?>
				</div>
			<?php endif; ?>	

<?php if(get_sub_field('see_all')!=''): ?>
		<div class="row">
		<div class="large-12 columns text-center">
			<a data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="200" href="<?php the_sub_field('title_link'); ?>" class="see-all">

				<?php the_sub_field('see_all'); ?> <i class="fa fa-chevron-right" aria-hidden="true"></i>
			</a>
		</div>
		</div>
		<?php endif; ?>			
			</div>
			</div>


</section>

