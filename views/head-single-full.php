<div class="head-single-full" style="background-image: url(<?php 
	echo $images[0];
	?> );  ">
	<?php echo $overlay ?>
<div class="row collapse  dark text-center ">
	<div class="medium-12 columns">
		<div class="row collapse">
			<div class="medium-12 columns big-image" >
			<?php if($links[0]): ?>
			<a href="<?php echo $links[0] ?>"
			title="<?php echo $titles[0];?>" class="box-link">
				<span class="no-disp"><?php echo $titles[0];?></span>
			</a>
			<?php endif;  ?>
		<div class="table-content">
			<div class="cell">
				<div class="text-center header-img-cont">		
					<h6 data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="200"class="pg-sub-title">
						<?php echo $cat_names[0]; ?>
					</h6>
				<h2 data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="400" class="pg-title"><?php echo $titles[0];?></h2>
				<p class="post-info  " data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="500"><?php echo apply_filters("the_content", $contents[0]);?></p>

				<?php if($links[0]): ?>
					<a data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="600" href="<?php echo $links[0] ?>" class="button  transparent-btn">
					<?php 
					
					echo ($button_text[0])?$button_text[0]:"Learn More";
					?>
					 <i class="fa fa-chevron-right" aria-hidden="true"></i>
								</a>
							<?php endif; ?>
							
				</div>
				
			</div>
		</div>
			</div>
		</div>
	</div>
</div>
</div>