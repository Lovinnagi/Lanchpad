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
<section  class="pro-offers view <?php echo $section_padd ?> <?php echo $section_marg ?>" 
	<?php if(get_sub_field('section_id')): ?>
		id="<?php the_sub_field('section_id'); ?>"
	<?php endif; ?>
>

<div class="rel-sec" <?php echo $style ; ?> >
				<?php echo $overlay ?>
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
				if( have_rows('add_bottle') ): ?>
				<div class="row bottles">
				<div class="inner">
				 <div class="owl-carousel">
				<?php	while( have_rows('add_bottle') ): the_row(); ?>
					<div class="item text-center">
						<a class="box-link">
							<span class="no-disp"><?php the_sub_field('name') ?></span>
						</a>
						<?php $pro_img = get_sub_field('pro_img');
							$pro_bottle = $pro_img[sizes]["medium"];
						
						?>
						<img class="probottle" src="<?php echo $pro_bottle  ?>" />
						<h5 class="red-text"><?php the_sub_field('name') ?></h5>
					</div>
			<?php endwhile; ?>
					</div>
					
				</div>
				<div class="next">
					<i class="fa fa-long-arrow-left" aria-hidden="true"></i>
				</div>
					<div class="prev">
					<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
					</div>
				</div>
			<?php endif;		?>
			<?php if( have_rows('columns') ):
				$col_num = 1;
			?>
				<div class="row content-columns" >
			<?php		while( have_rows('columns') ): the_row(); ?>
					<div class="medium-8 medium-offset-2 large-offset-0 large-4 columns  col-<?php echo $col_num ?> <?php 
						echo ($col_num=3)?'end':'';
					?>">
					
							<?php 
								$col_img = get_sub_field('column_image');
							?>
							<?php if($col_img): ?>
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
							<?php the_sub_field('des') ?>
							<p>
							<a href="#" class="red-text read-more">
								Read More <i class="fa fa-arrow-right" aria-hidden="true"></i>
							</a>
							</p>
						
					</div>
			<?php $col_num++; endwhile; ?>
				</div>
			<?php endif; ?>
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