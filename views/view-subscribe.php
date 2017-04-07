<?php 
	// Settings
	include(locate_template('/views/padding-controller.php'));	
	$subs_form_style = get_sub_field("subs_form_style");
	$color_scheme = get_sub_field('clr_sch');
	$align = get_sub_field('lay_alignment');
	
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

<section  class="subscribe view <?php echo $section_padd ?> <?php echo $section_marg ?>" 
	<?php if(get_sub_field('section_id')): ?>
		id="<?php the_sub_field('section_id'); ?>"
	<?php endif; ?>
	<?php echo $style ; ?>
>
	<?php echo $overlay ?>
<?php 
	switch($subs_form_style){
		case 'normal' :
			include(locate_template('/views/subs-normal.php')); 
		break;
		case 'sleek' :
			include(locate_template('/views/subs-sleek.php')); 
		break;
		default:
	}
?>
</section>