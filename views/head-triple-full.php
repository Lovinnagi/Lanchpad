<div class="row collapse expanded columns head-container dark">
	<div class="medium-12 large-8 columns big-image" 
	style="background-image:url( <?php  echo $images[0]; ?>) ; ">
		<a href="<?php echo $links[0] ?>" title="<?php echo $titles[0];?>" class="box-link">
			<span class="no-disp"><?php echo $titles[0];?></span>
		</a>
	<?php echo $overlay ?>
		<div class="table-content">
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
		<div style="background-image:url( <?php echo $images[1]; ?>);"class="medium-6 large-12 columns small-image" >
		<a href="<?php echo $links[1] ?>" title="<?php echo $titles[1];?>" class="box-link">
			<span class="no-disp"><?php echo $titles[1];?></span>
		</a>
		<?php echo $overlay ?>
		<div class="table-content">
			<div class="cell">
				<div class="text-center">
				<?php if($cat_names[1]): ?>
				<h6 class="pg-sub-title"><?php echo $cat_names[1]; ?></h6>
				<?php endif; ?>
				<h3 class="pg-title"><?php echo $titles[1];?></h3>
				</div>
			</div>
		</div>
		</div>
		<div style="background-image:url( <?php echo $images[2]; ?>);" class="medium-6 large-12 columns small-image">
		<a href="<?php echo $links[2] ?>" title="<?php echo $titles[2];?>" class="box-link">
			<span class="no-disp"><?php echo $titles[2];?></span>
		</a>
		<?php echo $overlay ?>
		<div class="table-content">
			<div class="cell ">
				<div class="text-center">
				<?php if($cat_names[2]): ?>
				<h6 class="pg-sub-title"><?php echo $cat_names[2]; ?></h6>
				<?php endif; ?>
				<h3 class="pg-title"><?php echo $titles[2];?></h3>
				</div>
			</div>
		</div>
		</div>
	</div>


</div>