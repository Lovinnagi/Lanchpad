<?php 
// Settings
include(locate_template('/views/padding-controller.php'));
/* $section_padd = "padd-3";
$section_marg = "marg-3"; */
$overlay = "";
$image_right = "";
$content_left = "";

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
<section  class="two-cols view <?php echo $section_padd ?> <?php echo $section_marg ?>" 
	<?php if(get_sub_field('section_id')): ?>
		id="<?php the_sub_field('section_id'); ?>"
	<?php endif; ?>
	<?php echo $style ; ?>
>
<?php echo $overlay ?>
<div class="rel-sec" >
<!-- heading -->
<div class="row collapse header-title">
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
		<?php if(get_sub_field('see_all')!=''): ?>
		<div class="large-3 columns text-right">
			<a href="<?php the_sub_field('title_link'); ?>" class="see-all">

				<?php the_sub_field('see_all'); ?> <i class="fa fa-chevron-right" aria-hidden="true"></i>
			</a>
		</div>
		<?php endif; ?>
	</div>
	<!-- heading -->
	
<?php if(have_rows('add_block')):  ?>
	<?php while(have_rows('add_block')): the_row();
			if(get_sub_field('img_right')){
				$image_right = 'medium-push-6';
				$content_left = 'medium-pull-6';
			}else{
				$image_right = '';
				$content_left = '';
			}
	?>	
				
	<div data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="200"   class="row collapse padd-2">

		<div class="large-12 columns" >

			<div class="row collapse">
			<div class="table-content">
            <?php $media_type = get_sub_field('select_media');
				 $background_img=get_sub_field('block_img');					
				  if($media_type=='single_img' || $media_type=='upload_images' || $media_type=='' ){
						$blockMediaImg=$background_img['sizes']['img-800'];						
				  }	
				 else{
					 $blockMediaImg=$background_img['sizes']['img-800'];	
				 }		
			?>
				<div class="medium-6 cell square-thumb <?php echo $image_right ?>" style="background-image:url('<?php echo $blockMediaImg; ?>');background-size:cover;background-position:center;background-color:#fff;" >
                
                
                <?php $auto_play_video= get_sub_field('auto_play'); ?>
				<?php $media_type = get_sub_field('select_media'); ?>
				<?php if($media_type=='video') { ?>
  
  <i style="padding-left:.2em;" class="fa fa-play video_play_btn playpause" aria-hidden="true"></i>
						<video <?php if($auto_play_video==1){ echo 'autoplay';}?> loop muted class="video">
                      
							<source src="<?php echo get_sub_field('block_video_mp4'); ?>" type="video/mp4">
							<source src="<?php echo get_sub_field('block_video_ogg'); ?>" type="video/ogg">
						</video>
                       
						
				<?php } elseif($media_type=='slider') { ?>
						<?php $images = get_sub_field('block_slider'); ?>
						<?php if( $images ) { ?>
							<ul class="slides">
							<?php foreach( $images as $image ): ?>
								<li style="background-image:url('<?php echo $image['sizes']['img-800'] ?>');"></li>
							<?php endforeach; ?>
							</ul>
						<?php } else { ?>
							<h2>Failed to load slider images</h2>
						<?php } ?>		
				<?php } 	
                
                elseif($media_type=='youtube_vimeo') { ?>
               
              
						<?php 
						
						// get iframe HTML
                         $iframe = get_sub_field('video_code_url');


                         // use preg_match to find iframe src
                          preg_match('/src="(.+?)"/', $iframe, $matches);
                          $src = $matches[1];


                            // add extra params to iframe src
                        $params = array(
                                      'controls'    => 0,
                                      'hd'        => 1,
                                      'autohide'    => 1,
									  'width' => 600
                                      );

                                   $new_src = add_query_arg($params, $src);

                                   $iframe = str_replace($src, $new_src, $iframe);


                                  // add extra attributes to iframe html
                                  $attributes = 'frameborder="0"';

                                $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
								?>                               
						
						
				
                        <div class="embed-container">
                        <?php echo $iframe;?>
                        </div>
                        			
				<?php } ?>	

				</div>
				<div class="medium-6 cell <?php echo $content_left ?>">
					<div class="two-cols-content">
						<h3 class="red-text bold-text">
						
								<?php the_sub_field('title') ?>
							
						</h3>
						
						<?php echo apply_filters( "the_content", get_sub_field('des') ); ?>
							
							<?php if(get_sub_field(cta_btn_txt)!=''): ?>
							<p>
								<a class="button red wells-btn" href="<?php (get_sub_field('cta_url'))?the_sub_field('cta_url'):'#'; ?>" title="<?php the_sub_field('title') ?>">
									<?php the_sub_field('cta_btn_txt') ?>
								</a>
							</p>
							<?php endif; ?>
						
					</div>
				</div>
				
			</div>
			</div>

		</div>



</div>
<?php endwhile; ?>
<?php endif; ?>
</div>

</section>