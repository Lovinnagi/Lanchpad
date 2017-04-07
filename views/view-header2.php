 <?php 
include(locate_template('/views/padding-controller.php'));
$section_padd = "";
// View Setttings
//$header_type = get_sub_field("header_style");
$header_type='single'; 
$head_source = get_sub_field("hd_img_src");
//$full_width = get_sub_field("full_width");
$section_bg = get_sub_field("sec_bg_clr");
$cat_names = array();
$titles =array();
$contents =array();
$images =array();
$links = array();
$button_text = array();
$flag=false;

// Overlay Settings
	$over_bg_clr = (get_sub_field('ovr_clr'))? get_sub_field('ovr_clr'):'#000';
	$over_opct = (get_sub_field('ovr_opct'))? get_sub_field('ovr_opct') : ".5";	
	
	$over_style = 'style="';
	$over_style .= 'background-color:'.$over_bg_clr.';';
	$over_style .= 'opacity:'.$over_opct.';"';
	
	
	(get_sub_field('overlay'))?	$overlay='<div class="overlay-scr" '.$over_style.'></div>':'';

switch($head_source){	
	case 'custom' :
		$counter = 1;
		if(have_rows('custom_images')){
			$flag=true;
			while(have_rows('custom_images')):the_row();
				$content = get_sub_field('des');
				array_push($contents,$content);	
				//array_push($button_text,get_sub_field('button_text'));	
				
				array_push($titles , get_sub_field('title'));
				array_push($cat_names , get_sub_field('subtitle'));
				
				$img = get_sub_field('image');
				if($counter ==1){
					array_push($images , $img['sizes']["img-900"]);
				}elseif($counter ==2 && $header_type == 'double'){
					array_push($images , $img['sizes']["img-900"]);
					
				}else{
					array_push($images , $img['sizes']["img-500"]);
				}
				
				array_push($links ,  get_sub_field('link'));
				$counter++;
			endwhile;
		}
		
	break;	
	case 'vid':
		if(have_rows('video_content')):
			$flag=true;
			while(have_rows('video_content')):the_row();
				array_push($contents,get_sub_field('des'));				array_push($titles , get_sub_field('title'));				array_push($cat_names , get_sub_field('subtitle'));				
				$img = get_sub_field('image');
				array_push($images , $img['sizes']["img-900"]);			
				array_push($links ,  get_sub_field('link'));
				$new_win = get_sub_field('new_win');
			endwhile;
		endif;
	break;
	default:
}
?>



<?php //echo get_sub_field('full-width'); 
if($flag):
?>

<section  class="view head-banner <?php echo $section_padd ?> <?php echo $section_marg ?>"
	<?php if(get_sub_field('section_id')): ?>
		id="<?php the_sub_field('section_id'); ?>"
	<?php endif; ?>
	<?php if ($section_bg):?>
		style="background:<?php echo $section_bg ?>"
	<?php endif; ?>
>

<?php  
	/* echo "here";
	echo $header_type;die; */
	switch($header_type){
		case 'single' :
			if($head_source == 'rev_slider'){
				include(locate_template('/views/head-rev-single.php'));
			}elseif($head_source == 'vid'){
				include(locate_template('/views/head-video.php')); 
			}else{
				include(locate_template('/views/head-single-full.php')); 
			}
		break;		
		default:
	}
?>
</section>
<?php endif; ?>