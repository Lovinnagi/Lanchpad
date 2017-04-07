<?php 
include(locate_template('/views/padding-controller.php'));
// Settings
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
<div class="row header-title">
		<?php

		// check if the repeater field has rows of data
		if( have_rows('accordion_tabs') ):
		?>
		<ul id="accordion" class="accordion" data-accordion data-allow-all-closed="true">		
		<?php	
			$counter=0;			
			while ( have_rows('accordion_tabs') ) : the_row();
			?>
				<li class="accordion-item " data-accordion-item> 
					<a href="#" class="accordion-title"><?php the_sub_field('tab_title'); ?></a>
					<div class="accordion-content" data-tab-content id="tab<?php echo $counter++;?>">
					  <?php the_sub_field('tab_content'); ?>
					</div>
				  </li>				
			<?php
			endwhile;
		?>
		</ul>	
		<?php
		/* else :
			//No rows */
		endif;

		?>		
		<script>
			jQuery(document).ready(function(){
				jQuery('#accordion').foundation();
			});
			
		</script>
		<?php if(get_sub_field('see_all')!=''): ?>
		<div class="large-3 columns text-right">
			<a href="<?php the_sub_field('title_link'); ?>" class="see-all">

				<?php the_sub_field('see_all'); ?> <i class="fa fa-chevron-right" aria-hidden="true"></i>
			</a>
		</div>
		<?php endif; ?>
	</div>
	<!-- heading -->

</div>

</section>
 