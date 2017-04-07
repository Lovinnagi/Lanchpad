<?php 
// Settings
include(locate_template('/views/padding-controller.php'));

$overlay = "";
$image_right = "";
$content_left = "";


?>
<section class="full-width-slider view" >


<?php if(have_rows('add_block')):  ?>
	<?php while(have_rows('add_block')): the_row(); ?>	
		

				<div class="fullwidth-slider-container cell square-thumb <?php echo $image_right ?>" style="background-color:#fff; position:relative;" >
		
					<?php $images = get_sub_field('block_slider_img'); ?>
						<?php if( $images ): ?>
							<ul class="slides">
							<?php foreach( $images as $image ): ?>
								<li style="background-image:url('<?php echo $image['sizes']['img-3xl'] ?>');"></li>
							<?php endforeach; ?>
							</ul>
						<?php endif; ?>	
				</div>


<?php endwhile; ?>
<?php endif; ?>


</section>