<?php 
	include(locate_template('/views/padding-controller.php'));
	// Settings
	$full_width = false;
	$color_scheme = get_sub_field('clr_sch');
	$align = get_sub_field('lay_alignment');
	$offer_cta = get_sub_field('sp_offer_cta');
	$sec_bg = get_sub_field('sec_bg_clr');
	if($sec_bg){
		$sec_bg_style = "style='background-color:{$sec_bg}';";
	}
	// Styling
	$style= 'style="';
	get_sub_field('bg_clr')? $style.= 'background-color:'.get_sub_field('bg_clr').';':'';
	if(get_sub_field('bg_img')){
		$bgimg = get_sub_field('bg_img');
		if($full_width):
			$large_image = $bgimg[sizes]["img-xxl"];
		else:
			$large_image = $bgimg[sizes]["img-1000"];
		endif;
		$style.= ' background-size:cover;';
		$style.= ' background-image:url('.$large_image.');';
	}
	
	// Overlay Settings
	$over_bg_clr = (get_sub_field('over_bg_clr'))? get_sub_field('over_bg_clr'):'#000';
	$over_opct = (get_sub_field('over_opct'))? get_sub_field('over_opct') : ".5";	
	
	$over_style = 'style="';
	$over_style .= 'background-color:'.$over_bg_clr.';';
	$over_style .= 'opacity:'.$over_opct.';"';
	
	
	(get_sub_field('overlay'))?	$overlay='<div class="overlay-scr" '.$over_style.'></div>':'';
	
	$style .='"';
?>
<section  class="offers view <?php echo $section_padd ?> <?php echo $section_marg ?>" 
	<?php if(get_sub_field('section_id')): ?>
		id="<?php the_sub_field('section_id'); ?>"
	<?php endif; ?>
	<?php echo $sec_bg_style; ?>
>
<?php if($full_width):?>
	<?php include(locate_template('/views/offer-wide.php')); ?>
<?php else: ?>
	<?php include(locate_template('/views/offer-normal.php')); ?>
<?php endif; ?>
</section>