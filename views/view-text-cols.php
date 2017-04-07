<?php 
// Settings
/* $section_padd = "padd-3";
$section_marg = ""; */
include(locate_template('/views/padding-controller.php'));
$overlay = "";
$image_right = "";
$content_left = "";
if(get_sub_field('img_right')){
	$image_right = 'medium-push-6';
	$content_left = 'medium-pull-6';
}
if(get_sub_field('remove_padd')){
	$section_padd = "";
	if(get_sub_field('padd_typ')=="top"){
		$section_padd = "padd-bot-3";
	}elseif(get_sub_field('padd_typ')=="bottom"){
		$section_padd = "padd-top-3";
	}
}
if(get_sub_field('add_padd')){
	$padd_amt = get_sub_field('padd_amt');
	if(get_sub_field('add_padd_typ')=="both"){
		$section_padd = "padd-".$padd_amt;
	}elseif(get_sub_field('add_padd_typ')=="top"){
		$section_padd = "padd-top-".$padd_amt;
	}elseif(get_sub_field('add_padd_typ')=="bottom"){
		$section_padd = "padd-bot-".$padd_amt;
	}
}
if(get_sub_field('add_marg')){
	$marg_amt = get_sub_field('marg_amt');
	if(get_sub_field('marg_type')=="both"){
		$section_marg = "marg-".$marg_amt;
	}elseif(get_sub_field('marg_type')=="top"){
		$section_marg = "marg-top-".$marg_amt;
	}elseif(get_sub_field('marg_type')=="bottom"){
		$section_marg = "marg-bot-".$marg_amt;
	}
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
<section  class="wells two-cols view <?php echo $section_padd ?> <?php echo $section_marg ?>" 
	<?php if(get_sub_field('section_id')): ?>
		id="<?php the_sub_field('section_id'); ?>"
	<?php endif; ?>
	<?php echo $style ; ?>
>
<?php echo $overlay ?>
<div class="rel-sec" >

	

<div class="row collapse two-col-block">

		<div class="large-12 columns" >

			<div class="row collapse">
			<div class="table-content">
				<div class="medium-6  cell square-thumb <?php echo $image_right ?>">
					<? echo get_sub_field('content');  ?>
				</div>
				<div class="medium-6 cell <?php echo $content_left ?>">
					<div data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="200" class="two-cols-content">
						<h3 class="red-text bold-text">
						
								<?php the_sub_field('title') ?>
							
						</h3>
						<?php the_sub_field('description')  ?>
						
					</div>
				</div>
				
			</div>
			</div>

		</div>



</div>
</div>

</section>