<div class="row collapse head-container  dark">
	<div class="medium-12 large-8 columns big-image triple"  >
	<div class="overlay" style="background-image:url( <?php  echo $images[0]; ?>) ; ">
	<?php echo $overlay ?></div>
		<a data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="200" href="<?php echo $links[0] ?>" title="<?php echo $titles[0];?>" class="box-link">
			<span class="no-disp"><?php echo $titles[0];?></span>
		</a>
	
		<div data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="200" class="table-content">
			<div class="cell ">
				<div class="header-img-cont">
				<?php if($cat_names[0]): ?>
				<h6 class="pg-sub-title"><?php echo $cat_names[0]; ?></h6>
				<?php endif; ?>
				<h2 class="pg-title"><?php echo $titles[0];?></h2>
				<p class="post-info  "><?php echo $contents[0];?></p>
				<p class="margin-top-1">
					<a href="<?php echo $links[0] ?>" title="<?php echo $titles[0];?>" class="read-more" >Read More ></a>
				</p>
				</div>
			</div>
		</div>
		
	</div>
	<div class="medium-12 large-4 columns " >
		<div class="medium-6 large-12 columns small-image" >
		<div class="overlay" style="background-image:url( <?php  echo $images[1]; ?>) ; ">
			<?php echo $overlay ?>
		</div>
		<a data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="400" href="<?php echo $links[1] ?>" title="<?php echo $titles[1];?>" class="box-link">
			<span class="no-disp"><?php echo $titles[1];?></span>
		</a>
	
		<div data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="400" class="table-content">
			<div class="cell">
				
				<?php if($cat_names[1]): ?>
				<h6 class="pg-sub-title"><?php echo $cat_names[1]; ?></h6>
				<?php endif; ?>
				<h3 class="pg-title"><?php echo $titles[1];?></h3>
				
			</div>
		</div>
		</div>
		<div class="medium-6 large-12 columns small-image" >
		<div class="overlay" style="background-image:url( <?php  echo $images[2]; ?>) ; ">
			<?php echo $overlay ?>
		</div>
		<a data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="600" href="<?php echo $links[2] ?>" title="<?php echo $titles[2];?>" class="box-link">
			<span class="no-disp"><?php echo $titles[2];?></span>
		</a>
		<div data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="600" class="table-content">
			<div class="cell ">
				
				<?php if($cat_names[2]): ?>
				<h6 class="pg-sub-title"><?php echo $cat_names[2]; ?></h6>
				<?php endif; ?>
				<h3 class="pg-title"><?php echo $titles[2];?></h3>
				
			</div>
		</div>
		</div>
	</div>


</div>