<?php 
include(locate_template('/views/padding-controller.php'));
$color_scheme = get_sub_field('clr_sch');
$grid_size =get_sub_field('gallery_size');

if($grid_size==2 ){
	$columnClass="small-12 medium-6 large-6";
	$size=array(550,550);
	$dimensions="width:32em;height:32em;";
}	
elseif($grid_size==3 ){
	$columnClass="small-12 medium-4 large-4";
	$size='thumb-400';
	$dimensions="width:21em;height:21em;";
}
elseif($grid_size==4 ){
	$columnClass="small-6 medium-3 large-3";	
	$size='medium';
	$dimensions="width:15em;height:15em;";
}
elseif($grid_size==5 ){
	$columnClass="small-6 medium-2 large-2";
	$size='medium';
	$dimensions="width:21em;height:21em;";
}
elseif($grid_size==6 ){
	$columnClass="small-6 medium-2 large-2";
	$size='thumbnail';
	$dimensions="width:21em;height:21em;";
}
else{
	$columnClass='';
	$dimensions="width:15em;height:15em;";
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
	
				<div class="row" >
			<?php		
					$delay=200;
					$gridCounter=1;
					while( have_rows('columns') ): the_row(); ?>
					
						<div  data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="<?php echo $delay; ?>" class="column column-block  padd-bot-1 <?php echo $columnClass; ?>">		
							<?php 
								$col_img = get_sub_field('column_image');
							?>
							<?php if($col_img):
									 $image = wp_get_attachment_image_src( $col_img, $size );
							?>
							<div class="" style="background: transparent url('<?php echo $image[0]; ?>') no-repeat scroll 50% 50% / cover ;<?php echo $dimensions; ?>"></div>
							<!-- <div class="col-img padd-bot-2">
							<a  href="javascript:void(0);" title="<?php the_sub_field('title') ?>">
							<img class="radius-4" src="<?php echo $image[0]; ?>" alt="<?php the_sub_field('title') ?>"/>
							</a>
							</div>-->
							
							<?php endif; ?>																																										
						</div>
			<?php 	$col_num++; $delay+=300;
					if($gridCounter==$grid_size)
						break;
					$gridCounter++;
			endwhile; ?>
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

