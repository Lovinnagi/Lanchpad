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
<section  class="pro-offers scroll view <?php echo $section_padd ?> <?php echo $section_marg ?>" 
	<?php if(get_sub_field('section_id')): ?>
		id="<?php the_sub_field('section_id'); ?>"
	<?php endif; ?>
	<?php echo $style ; ?>
>

				<?php echo $overlay ?>
<div class="rel-sec"  >
			<div class="section-content">

			<!-- heading -->
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
					<?php the_sub_field('subtitle') ?>
				</small>
				<?php endif; ?>
			<?php endif; ?>
			</h2>
		<?php endif; ?>
		</div>
		
	</div>
		<!-- heading -->
			<?php 
				if( have_rows('add_images') ): ?>
				<div class="row bottles">
				<div class="inner">
				 <div class="owl-carousel owl-carousel-slider">
				<?php	while( have_rows('add_images') ): the_row(); ?>
					<div class="item text-center">
					<?php
						if( get_sub_field('product_link') ):
					?>
						<a  class="box-link" href="<?php the_sub_field('product_link') ?>" <?php echo (get_sub_field('new_win'))?'target="_blank"':'';?>>
							<span class="no-disp"><?php the_sub_field('name') ?></span>
						</a>
					<?php endif; ?>
						<?php
						$pro_img = get_sub_field('product_img');
							$pro_bottle = $pro_img[sizes]["medium"];
						
						?>
						<div class='carousel-slider-image'><img class="probottle" src="<?php echo $pro_bottle  ?>" /></div>
						<h5 class="red-text"><?php the_sub_field('name') ?></h5>
                        <a href="<?php the_sub_field('product_link') ?>" class="carousel-slider-learnmore">Learn More</a>
					</div>
			<?php endwhile; ?>
					</div>
					
				</div>
				<div class="carousel-slider-nav next">
				<img src="<?php echo get_template_directory_uri(); ?>/images/arrow_left-01.png">
				</div>
					<div class="carousel-slider-nav prev">
					<img src="<?php echo get_template_directory_uri(); ?>/images/arrow_right-01.png">
					</div>
				</div>
			<?php endif;		?>
					<?php if(get_sub_field('see_all')!=''): ?>
					<div class="row">
		<div class="large-4 large-offset-4 columns text-center">
			<a href="<?php the_sub_field('title_link'); ?>" class="see-all">

				<?php the_sub_field('see_all'); ?> <i class="fa fa-chevron-right" aria-hidden="true"></i>
			</a>
		</div>
		</div>
		<?php endif; ?>	
			</div>
			</div>


</section>