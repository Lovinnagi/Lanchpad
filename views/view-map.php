<?php 
// Settings
include(locate_template('/views/padding-controller.php'));
$section_padd = "";
?>

<section  class="map view <?php echo $section_padd ?> <?php echo $section_marg ?>" 
	<?php if(get_sub_field('section_id')): ?>
		id="<?php the_sub_field('section_id'); ?>"
	<?php endif; ?>
>


			<?php //the_sub_field('map') ?>
			
		<?php 	$location = get_sub_field('map');			 
		//echo $location['address'];die;
			if( !empty($location) ){?>
			<div class="acf-map">
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
					<p class="address crem-text sub"><?php echo $location['address']; ?></p>
				</div>
			</div>			
			<?php } ?>



</section>