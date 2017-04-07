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
			<h2  class="section-title ">
			<?php if( get_sub_field('title_link')): ?>
				<a  href="<?php the_sub_field('title_link') ?>"
				title="<?php the_sub_field('title') ?>">
					<span  class="main">
						<?php the_sub_field('title') ?>
					</span>
				<?php if( get_sub_field('subtitle')): ?>
					<small   class="crem-text sub">
						<?php the_sub_field('subtitle') ?>
					</small>
				<?php endif; ?>
				</a>
			<?php else: ?>
				<?php the_sub_field('title') ?>
					<?php if( get_sub_field('subtitle')): ?>
				<small  class="crem-text sub">
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
				if( have_rows('add_bottle') ): ?>
				<div class="row bottles">
				<div class="inner">
				 <div  id="eventWines" class="owl-carousel">
				<?php	while( have_rows('add_bottle') ): the_row(); ?>										
					<div class="item text-center">
					<?php
						if( get_sub_field('pro_link') ){
							$proLink=get_sub_field('pro_link');							
						}
						else{
							$proLink='javascript:void(0);';							
						}
						if( get_sub_field('new_win') ){
							$proLinkNewTab='target="_blank"';							
						}
						else{
							$proLinkNewTab='';
						}
					?>
						<!-- <a  class="box-link" href="<?php the_sub_field('pro_link') ?>" <?php echo $proLinkNewTab;?>>
							<span class="no-disp"><?php the_sub_field('name') ?></span>
						</a> -->
					
						<?php 
							$col_img = get_sub_field('pro_img');
						?>
						<?php if($col_img)
								 $pro_bottle = wp_get_attachment_image_src( $col_img, 'medium' );
						?>
						<?php
							//$pro_img = get_sub_field('pro_img');
							//$pro_bottle = $pro_img[sizes]["medium"];
						
						?>
						<div id="featuredBottle" >
							<a href="<?php echo $proLink; ?>" <?php echo $proLinkNewTab;?>><img  class="probottle" src="<?php echo $pro_bottle[0];  ?>" /></a>
						</div>
						<div class="featuredBottleCaption" >
							<h5 class="red-text text-center"><?php the_sub_field('name') ?></h5>
							<a href="<?php echo $proLink; ?>" <?php echo $proLinkNewTab;?> class="hollow button tiny red-text featuredWineBtn" role="button">Learn More</a> 
						</div>	
					</div>					
			<?php endwhile; ?>
					</div>
					
				</div>
				<div class="next featuredWineRotors">
				<img src="<?php echo get_template_directory_uri(); ?>/images/arrow_left-01.png">
				</div>
					<div class="prev featuredWineRotors">
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