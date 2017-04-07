<?php 
include(locate_template('/views/padding-controller.php'));
$color_scheme = get_sub_field('clr_sch');

// Styling
	$style="";
	if(get_sub_field('bg_clr')){
		$style= 'style="';
	
		
			
			get_sub_field('bg_clr')? $style.= 'background-color:'.get_sub_field('bg_clr').';':'';
		
		

		$style.= '"';
	}
	
	



?>
<section  class="view video-section <?php echo ($color_scheme)?$color_scheme:''; ?>  <?php echo $section_padd ?> <?php echo $section_marg ?>" 
	<?php if(get_sub_field('section_id')): ?>
		id="<?php the_sub_field('section_id'); ?>"
	<?php endif; ?>
	<?php echo $style ; ?>
>

				<?php echo $overlay ?>
<div class="rel-sec "  >


			<!-- Heading -->
		<div class="row header-title">
		<div class="medium-9 columns">
			<?php if( get_sub_field('title')): ?>
			<h2 class="section-title ">
			<?php if( get_sub_field('title_link')): ?>
				<a  href="<?php the_sub_field('title_link') ?>"
				title="<?php the_sub_field('title') ?>">
					<span class="main">
						<?php the_sub_field('title') ?>
					</span>
				<?php if( get_sub_field('subtitle')): ?>
					<small class="crem-text sub">
						<?php the_sub_field('subtitle') ?>
					</small>
				<?php endif; ?>
				</a>
			<?php else: ?>
				<?php the_sub_field('title') ?>
					<?php if( get_sub_field('subtitle')): ?>
				<small class="crem-text sub">
					<?php the_sub_field('subtitle') ?>
				</small>
				<?php endif; ?>
			<?php endif; ?>
			</h2>
		<?php endif; ?>
		</div>
		<?php if(get_sub_field('see_all')!=''): ?>
		<div class="large-3 columns text-right">
			<a href="<?php the_sub_field('title_link'); ?>" class="see-all">

				<?php the_sub_field('see_all'); ?> <i class="fa fa-chevron-right" aria-hidden="true"></i>
			</a>
		</div>
		<?php endif; ?>
	</div>
		<!-- Heading -->
		
		

		<?php if( have_rows('cols') ):  //if(have_rows)
		$head = 1;?>
				<div class="row " >
			
			<?php	while( have_rows('cols') ): the_row(); 
							//while(have_rows)
			?>			
		<!-- <div class=" videoSection" > -->
		

		<?php if(get_sub_field('category')): // if(category) ?>
			<?php 
			/*	$cat_name= get_cat_name( get_sub_field('col_cat') );
				$cat_link = get_term_link( get_sub_field('col_cat') ); */
				$qr_args = array(
					'cat' =>get_sub_field("category"),
					'posts_per_page' =>get_sub_field('number_of_posts')
				);
				$catloop = new WP_Query($qr_args);	
				if($catloop->have_posts()): //cat have_posts
				
				//$counter =1 ; ?>
					<?php while($catloop->have_posts()): $catloop->the_post(); // while(have_post)  ?>
						<?php $format = get_post_format(); 
							if($format=='video'): // if(video)
						?>
					<div class="medium-4 columns content-column">
						<div class="row collapse">
							<div class="table-content table-<?php echo $tablenum ?>">
						<a href="<?php the_permalink(); ?>" class="box-link">	</a>
							<?php 
								//$col_img = get_sub_field('column_image');
							?>
							<?php //if($col_img):videoImage ?>

							<div class="large-3 text-center cell square-thumb" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'img-452'); ?>)">
								
								<div class="overlay"></div>
								<div class="video-play-btn">
								<i class="fa fa-play-circle" 	aria-hidden="true"></i>
								</div>
							</div>
							<?php //endif;videoText ?>
							<div class="large-9  cell wells-c-block">
							<div class="wells-content">
								
								<h4 class="red-text">
									<?php 
						$limit = 6;
						$title = str_word_count(get_the_title(),1);

						if (count($title) > $limit) {

						$words = implode(" ", array_slice($title , 0, $limit) ) . '...';
						echo $words;
						}else{
							$words = implode(" ", array_slice($title , 0) );
							echo $words;
						} ?>
								</h4>
							
									<?php //echo limitWords(get_the_content(), 12); ?>
								
							</div>
							</div>
					
						</div>
						</div>
		</div>
					<?php  endif; // if(video)
					endwhile; // while(have_post) 
					wp_reset_postdata();
					endif; //cat have_posts ?>			
			
		<?php endif; // if(category) ?>
		
			
		<?php endwhile; //while(have_rows)
		endif; // if(have_rows) ?>
					
			</div>
					
						
							<?php 
								//$col_img = get_sub_field('column_image');
							?>
							<?php //if($col_img): ?>
							
							<?php //endif; ?>
							
						
					
			
			
				</div>
							

			</div>


</section>