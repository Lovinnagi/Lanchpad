<div class="video-container" style=" background-image: url(<?php 
	echo $images[0];
	?> );">
<video autoplay loop muted id="home-video" class="full-video">
        <source src="<?php echo get_sub_field('mp4vid'); ?>" type="video/mp4" />
        <source style="width:100%; height:100%;" src="<?php echo get_sub_field('ogvvid'); ?>" type="video/ogg" />
      </video>
    <script>
    document.getElementById('home-video').play();
</script>
	<?php echo $overlay ?>
<div class="row collapse  dark text-center head-single">
	<div class="medium-12 columns">
		<div class="row collapse">
			<div class="medium-12 columns big-image" >
			<a href="<?php echo $links[0] ?>" title="<?php echo $titles[0];?>" class="box-link" 
				<?php echo ($new_win)?'target="_blank"':''; ?>
			>
				<span class="no-disp"><?php echo $titles[0];?></span>
			</a>

				<div class="table-content">
					<div class="cell">
						<div class="inner-padder-lr">
						<h6 class="cat-title"><?php echo $cat_names[0]; ?></h6>
						<h2><?php echo $titles[0];?></h2>
						<p class="show-for-medium"><?php echo $contents[0];?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>