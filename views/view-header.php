<?php 
include(locate_template('/views/padding-controller.php'));
$section_padd = "";
// View Setttings
$header_type = get_sub_field("header_style");
$head_source = get_sub_field("hd_img_src");
//$full_width = get_sub_field("full_width");
$section_bg = get_sub_field("sec_bg_clr");
$cat_names = array();
$titles =array();
$contents =array();
$images =array();
$links = array();
$button_text = array();


// Overlay Settings
	$over_bg_clr = (get_sub_field('ovr_clr'))? get_sub_field('ovr_clr'):'#000';
	$over_opct = (get_sub_field('ovr_opct'))? get_sub_field('ovr_opct') : ".5";	
	
	$over_style = 'style="';
	$over_style .= 'background-color:'.$over_bg_clr.';';
	$over_style .= 'opacity:'.$over_opct.';"';
	
	
	(get_sub_field('overlay'))?	$overlay='<div class="overlay-scr" '.$over_style.'></div>':'';

switch($head_source){
	case 'cats' :
		$counter = 1;
		$qr_args = array(
			'cat' =>get_sub_field("choose_cat"),
			'posts_per_page' => 3
		);
		$catloop = new WP_Query($qr_args);
		if($catloop->have_posts()):
			while($catloop->have_posts()):$catloop->the_post();
				$cat = get_the_category();
				array_push($cat_names,$cat[0]->name);
				array_push($titles , get_the_title());
				$content = get_the_excerpt();
				array_push($contents,$content);
				if($counter ==1){
					array_push($images , get_the_post_thumbnail_url(get_the_ID(),'img-900'));
				}elseif($counter ==2 && $header_type == 'double'){
					array_push($images , get_the_post_thumbnail_url(get_the_ID(),'img-900'));
					
				}else{
					array_push($images , get_the_post_thumbnail_url(get_the_ID(),'img-500'));
				}
				
				array_push($links ,  get_permalink());
				$counter++;
			endwhile;
			wp_reset_postdata();
			
		endif;
	break;
	case 'pages' :
		$counter = 1;
		if(have_rows('pick_pages')):
			while(have_rows('pick_pages')):the_row();
				$post_ids = get_sub_field('pp');
				$cat = get_the_category($post_ids);
				array_push($cat_names,$cat[0]->name);
				array_push($cat_names,$cat);
				array_push($titles , get_the_title($post_ids));
				$content = get_the_excerpt($post_ids);
				array_push($contents,$content);
				if($counter ==1){
					array_push($images , get_the_post_thumbnail_url($post_ids,'img-900'));
				}elseif($counter ==2 && $header_type == 'double'){
					array_push($images , get_the_post_thumbnail_url($post_ids,'img-900'));
					
				}else{
					array_push($images , get_the_post_thumbnail_url($post_ids,'img-500'));
				}
				
				array_push($links ,  get_permalink($post_ids));
				$counter++;
			endwhile;
		endif;
	break;
	case 'custom' :
		$counter = 1;
		if(have_rows('custom_images')):
			while(have_rows('custom_images')):the_row();
				$content = get_sub_field('des');
				array_push($contents,$content);	
				array_push($button_text,get_sub_field('button_text'));	
				
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
		endif;
	break;
	case 'posts' :
		$counter = 1;
		$qr_args = array(
			'posts_per_page' => 3
		);
		$catloop = new WP_Query($qr_args);
		if($catloop->have_posts()):
			while($catloop->have_posts()):$catloop->the_post();
				$cat = get_the_category();
				array_push($cat_names,$cat[0]->name);
				array_push($titles , get_the_title());
				$content = get_the_excerpt();
				array_push($contents,$content);
				if($counter ==1){
					array_push($images , get_the_post_thumbnail_url(get_the_ID(),'img-900'));
				}elseif($counter ==2 && $header_type == 'double'){
					array_push($images , get_the_post_thumbnail_url(get_the_ID(),'img-900'));
					
				}else{
					array_push($images , get_the_post_thumbnail_url(get_the_ID(),'img-500'));
				}
				
				array_push($links ,  get_permalink());
				$counter++;
			endwhile;
			wp_reset_postdata();
			
		endif;
	break;
	case 'cats3' :
		$taxos = get_sub_field("taxos");
		
		$ct_args1 = array(
			'cat' =>$taxos[0],
			'posts_per_page' => 1
		);
		$catloop1 = new WP_Query($ct_args1);
		if($catloop1->have_posts()):
			while($catloop1->have_posts()):$catloop1->the_post();
				$cat = get_the_category();
				array_push($cat_names,$cat[0]->name);
				array_push($titles , get_the_title());
				$content = get_the_excerpt();
				array_push($contents,$content);
	
					array_push($images , get_the_post_thumbnail_url(get_the_ID(),'img-900'));
				array_push($links ,  get_permalink());
			endwhile;
			wp_reset_postdata();
		endif;
		
		
		$ct_args2 = array(
			'cat' =>$taxos[1],
			'posts_per_page' => 1
		);
		$catloop2 = new WP_Query($ct_args2);
		if($catloop2->have_posts()):
			while($catloop2->have_posts()):$catloop2->the_post();
				$cat = get_the_category();
				array_push($cat_names,$cat[0]->name);
				array_push($titles , get_the_title());
				$content = get_the_excerpt();
				array_push($contents,$content);
				if( $header_type == 'double'){
					array_push($images , get_the_post_thumbnail_url(get_the_ID(),'img-900'));
				}else{
					array_push($images , get_the_post_thumbnail_url(get_the_ID(),'img-500'));
				}
				array_push($links ,  get_permalink());
			endwhile;
			wp_reset_postdata();
		endif;
		
		$ct_args3 = array(
			'cat' =>$taxos[2],
			'posts_per_page' => 1
		);
		$catloop3 = new WP_Query($ct_args3);
		if($catloop3->have_posts()):
			while($catloop3->have_posts()):$catloop3->the_post();
				$cat = get_the_category();
				array_push($cat_names,$cat[0]->name);
				array_push($titles , get_the_title());
				$content = get_the_excerpt();
				array_push($contents,$content);
				if( $header_type == 'double'){
					array_push($images , get_the_post_thumbnail_url(get_the_ID(),'img-900'));
				}else{
					array_push($images , get_the_post_thumbnail_url(get_the_ID(),'img-500'));
				}
				array_push($links ,  get_permalink());
			endwhile;
			wp_reset_postdata();
		endif;
		
		
	break;
	case 'vid':
		if(have_rows('video_content')):
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



<?php //echo get_sub_field('full-width'); ?>

<section  class="view head-banner <?php echo $section_padd ?> <?php echo $section_marg ?>"
	<?php if(get_sub_field('section_id')): ?>
		id="<?php the_sub_field('section_id'); ?>"
	<?php endif; ?>
	<?php if ($section_bg):?>
		style="background:<?php echo $section_bg ?>"
	<?php endif; ?>
>

<?php  
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
		case 'double' :
			if($head_source == 'rev_slider'){
				include(locate_template('/views/head-rev-double.php'));
			}else{
				include(locate_template('/views/head-double.php')); 
			}
			
		break;
		case 'triple' :
			if($head_source == 'rev_slider'){
				include(locate_template('/views/head-rev-triple.php'));
			}else{
				include(locate_template('/views/head-triple.php')); 
			}
		break;
		default:
	}
?>
</section>