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
<section  class="video view dark <?php echo $section_padd ?> <?php echo $section_marg ?>" 
	<?php if(get_sub_field('section_id')): ?>
		id="<?php the_sub_field('section_id'); ?>"
	<?php endif; ?>
	<?php echo $style ; ?>
>
				<?php echo $overlay ?>
<div class="rel-sec "  >
<div class="row collapse">
	
	<div class="large-12 columns text-center table-content">
		<div class="cell">
			<?php if( get_sub_field('title')): ?>
				<?php if( get_sub_field('title_link')): ?>
					<?php if( get_sub_field('subtitle')): ?>
						<h6 data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="200" class="pg-sub-title">
							<?php the_sub_field('subtitle') ?>
						</h6>
					<?php endif; ?>
				<h2 data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="400" class="pg-title">
					<a class="" href="<?php the_sub_field('title_link') ?>"
					title="<?php the_sub_field('title') ?>">

							<?php the_sub_field('title') ?>

					</a>
				
				</h2>

				<?php else: ?>
					<?php if( get_sub_field('subtitle')): ?>
						<h6 data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="200"class="pg-sub-title">
							<?php echo wp_strip_all_tags(get_sub_field('subtitle'));  ?>
						</h6>
					<?php endif; ?>
					<h2 data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="400" class="pg-title">
						<?php echo wp_strip_all_tags(get_sub_field('title'));  ?>
					</h2>
				<?php endif; ?>
				
			<?php endif;
			 $video_type = get_sub_field('vid_type');
			 if( $video_type=='embeded'){
				// use preg_match to find iframe src
				preg_match('/src="(.+?)"/', get_sub_field('yt_vim'), $matches);
				$src = $matches[1];
				$src.="&autoplay=1";
			 } elseif($video_type=='custom') {
				 $src=get_sub_field('custom_video');
			 }
			
			?>
			<p>
				<a data-featherlight-iframe-width="640px" data-featherlight-iframe-height="360px" featherlight-iframe-max-width="70%" data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="500" href="<?php echo $src; ?>"  data-featherlight="iframe" class="play-btn">				
				<i style="padding-left:.2em;"class="fa fa-play"></i>
				</a>
			</p>
			<!-- <div id="<?php  echo $sectionid; ?>-video" class="lightbox" >
				<?php the_sub_field('yt_vim') ?>
			</div>-->
			
		</div>
	</div>

</div>
</div>
</section>
