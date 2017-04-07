<?php 
	// Settings
	include(locate_template('/views/padding-controller.php'));	
	
?>
<section  class="post-cols view <?php echo $section_padd ?> <?php echo $section_marg ?>" 
	<?php if(get_sub_field('section_id')): ?>
		id="<?php the_sub_field('section_id'); ?>"
	<?php endif; ?>
>

<!-- heading -->
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
		
	</div>
	<!-- heading -->
		<?php if( have_rows('cols') ):  $head = 1; $col_counter=0;?>
			<?php 
				while( have_rows('cols') ){
					the_row(); 
					$col_counter ++;
				}
			?>
				<div class="row " >
			<?php	while( have_rows('cols') ): the_row(); 
							$no_feat = get_sub_field('no_feat');
							$delay=200;
			?>
				<?php 
					if($col_counter==1):
				?>
					<div data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="<?php echo $delay; ?>" class="medium-8 medium-offset-2 end large-6 large-offset-3 columns content-column">
							<h3 class="column-title"><?php the_sub_field('title') ?></h3>
							
							<?php 
								$cat_tag = get_sub_field('cat_tag');
								if($cat_tag =='cats'):
									$col_src = get_sub_field('col_cat');
								elseif($cat_tag =='tags'):
									$col_src = get_sub_field('post_tags');
								endif;
							?>
							<?php if($col_src):?>
								<?php 
							
									
									if($cat_tag =='cats'):
									$qr_args = array(
										'cat' =>$col_src,
										'posts_per_page' =>get_sub_field('num_posts')
									);
									elseif ($cat_tag =='tags'):
									$l_col_src =  str_replace(' ', '-', strtolower($col_src)); 
									$qr_args = array(
										'tag' =>$l_col_src,
										'posts_per_page' =>get_sub_field('num_posts')
									);
									endif;
									$catloop = new WP_Query($qr_args);	if($catloop->have_posts()):
									$counter =1 ;
								?>
										<?php while($catloop->have_posts()):$catloop->the_post(); ?>
										<?php if($counter ==1 && !$no_feat ):?>
											<?php if(has_post_thumbnail()): ?>
												<div class="width-thumb" style="background-image:url(<?php 
													echo get_the_post_thumbnail_url(get_the_ID(),'img-452');
												?>);">
												<a href="<?php the_permalink() ?>" title="<?php the_title()  ?>" class="box-link">
												<span class="no-disp">
													<?php the_title()  ?> 
												</span>
												</a>
												</div>
											<?php else: ?>
												<div class="width-thumb" style="background-image:url(<?php 
													echo get_template_directory_uri();
												?>/images/wine-fallback.jpg);">
												<a href="<?php the_permalink() ?>" title="<?php the_title()  ?>" class="box-link">
												<span class="no-disp">
													<?php the_title()  ?> 
												</span>
												</a>
												</div>
											<?php endif; ?>
										<div class="content-head head-<?php echo $head ?>">
											<h5 class="subtitle crem-text goth-text-bold">
												<?php the_category(' ') ?>
											</h5>
											
											<h4 class="red-text">
											<a href="<?php the_permalink() ?>" title="<?php the_title()  ?>" >
											<?php the_title() ?>
											</a>
											</h4>
										</div>
										<?php else:?>

									<div class="post-list">
										

										
										
										<div class="row " >
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="box-link">
					<span class="no-disp"><?php the_title(); ?></span>
				</a>
				<div class="small-12 columns table-content "  >
					<div class="small-3 medium-2 columns circle-image cell" style="padding-right:0;" >
						<?php the_post_thumbnail( 'thumb-50') ?>
					</div>
					<div class="small-9 medium-10 columns post-col-title cell"   >
						<h6 class="post-title">
						<?php 
								$trimmed = substr(get_the_title(),0,75);
								echo $trimmed;
							?>...
						</h6>
						<small class="post-meta">
							<?php the_date() ?>
						</small>
			
					</div>
			</div>
			</div>
			
									</div>
										<?php endif; $counter++ ; ?>
										<?php endwhile; ?>
								<?php
									wp_reset_postdata();
								endif; ?>
							<?php endif; ?>
				</div>
				<?php 
					elseif($col_counter==2):
				?>
					<div data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="<?php echo $delay; ?>" class="medium-8 medium-offset-2 end large-6 columns content-column large-offset-0 ">
							<h3 class="column-title"><?php the_sub_field('title') ?></h3>
							<?php 
								$cat_tag = get_sub_field('cat_tag');
								if($cat_tag =='cats'):
									$col_src = get_sub_field('col_cat');
								elseif($cat_tag =='tags'):
									$col_src = get_sub_field('post_tags');
								endif;
							?>
							<?php if($col_src):?>
								<?php 
							
									
									if($cat_tag =='cats'):
									$qr_args = array(
										'cat' =>$col_src,
										'posts_per_page' =>get_sub_field('num_posts')
									);
									elseif ($cat_tag =='tags'):
									$l_col_src =  str_replace(' ', '-', strtolower($col_src)); 
									$qr_args = array(
										'tag' =>$l_col_src,
										'posts_per_page' =>get_sub_field('num_posts')
									);
									endif;
									$catloop = new WP_Query($qr_args);	if($catloop->have_posts()):
									$counter =1 ;
								?>
										<?php while($catloop->have_posts()):$catloop->the_post(); ?>
										<?php if($counter ==1 && !$no_feat ):?>
											<?php if(has_post_thumbnail()): ?>
												<div class="width-thumb" style="background-image:url(<?php 
													echo get_the_post_thumbnail_url(get_the_ID(),'img-452');
												?>);">
												<a href="<?php the_permalink() ?>" title="<?php the_title()  ?>" class="box-link">
												<span class="no-disp">
													<?php the_title()  ?> 
												</span>
												</a>
												</div>
											<?php else: ?>
												<div class="width-thumb" style="background-image:url(<?php 
													echo get_template_directory_uri();
												?>/images/wine-fallback.jpg);">
												<a href="<?php the_permalink() ?>" title="<?php the_title()  ?>" class="box-link">
												<span class="no-disp">
													<?php the_title()  ?> 
												</span>
												</a>
												</div>
											<?php endif; ?>
										<div class="content-head head-<?php echo $head ?>">
											<h5 class="subtitle crem-text goth-text-bold">
												<?php the_category(' ') ?>
											</h5>
											
											<h4 class="red-text">
											<a href="<?php the_permalink() ?>" title="<?php the_title()  ?>" >
											<?php the_title() ?>
											</a>
											</h4>
										</div>
										<?php else:?>

									<div class="post-list">
										

										
										
										<div class="row " >
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="box-link">
					<span class="no-disp"><?php the_title(); ?></span>
				</a>
				<div class="small-12 columns "  >
					<div class="small-3 medium-2  columns circle-image" style="padding-right:0;" >
						<?php the_post_thumbnail( 'thumb-50') ?>
					</div>
					<div class="small-9 medium-10  columns post-col-title"  >
						<h6 class="post-title">
						<?php 
								$trimmed = substr(get_the_title(),0,75);
								echo $trimmed;
							?>...
						</h6>
						<small class="post-meta">
							<?php the_date() ?>
						</small>
					</div>
			</div>
			</div>
				
									</div>
										<?php endif; $counter++ ; ?>
										<?php endwhile; ?>
								<?php
									wp_reset_postdata();
								endif; ?>
							<?php endif; ?>
				</div>
				<?php 
					elseif($col_counter==3):
				?>
				<div data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="<?php echo $delay; ?>" class="medium-8 medium-offset-2 end large-offset-0 large-4 columns content-column">
							
							
							<?php 
								$cat_tag = get_sub_field('cat_tag');
								if($cat_tag =='cats'):
									$col_src = get_sub_field('col_cat');
								elseif($cat_tag =='tags'):
									$col_src = get_sub_field('post_tags');
								endif;
							?>
							<?php if($col_src):?>
								<?php 
							
									
									if($cat_tag =='cats'):
									$qr_args = array(
										'cat' =>$col_src,
										'posts_per_page' =>get_sub_field('num_posts')
									);
									elseif ($cat_tag =='tags'):
									$l_col_src =  str_replace(' ', '-', strtolower($col_src)); 
									$qr_args = array(
										'tag' =>$l_col_src,
										'posts_per_page' =>get_sub_field('num_posts')
									);
									endif;
									$catloop = new WP_Query($qr_args);	if($catloop->have_posts()):
									$counter =1 ;
								?>
								<h3 class="column-title"><?php the_sub_field('title') ?></h3>
										<?php while($catloop->have_posts()):$catloop->the_post(); ?>
										<?php if($counter ==1 && !$no_feat ):?>
											<?php if(has_post_thumbnail()): ?>
												<div class="width-thumb" style="background-image:url(<?php 
													echo get_the_post_thumbnail_url(get_the_ID(),'img-452');
												?>);">
												<a href="<?php the_permalink() ?>" title="<?php the_title()  ?>" class="box-link">
												<span class="no-disp">
													<?php the_title()  ?> 
												</span>
												</a>
												</div>
											<?php else: ?>
												<div class="width-thumb" style="background-image:url(<?php 
													echo get_template_directory_uri();
												?>/images/wine-fallback.jpg);">
												<a href="<?php the_permalink() ?>" title="<?php the_title()  ?>" class="box-link">
												<span class="no-disp">
													<?php the_title()  ?> 
												</span>
												</a>
												</div>
											<?php endif; ?>
										<div class="content-head head-<?php echo $head ?>">
											<h5 class="subtitle crem-text goth-text-bold">
												<?php the_category(' ') ?>
											</h5>
											
											<h4 class="red-text">
											<a href="<?php the_permalink() ?>" title="<?php the_title()  ?>" >
											<?php the_title() ?>
											</a>
											</h4>
										</div>
										<?php else:?>

									<div class="post-list">
										

										
										
										<div class="row " >
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="box-link">
					<span class="no-disp"><?php the_title(); ?></span>
				</a>
				<div class="small-12 columns "  >
					<div class="small-3 medium-2 columns circle-image" style="padding-right:0;" >
						<?php the_post_thumbnail( 'thumb-50') ?>
					</div>
					<div class="small-9 medium-10 columns post-col-title three"   >
						<h6 class="post-title">
							<?php 
								$trimmed = substr(get_the_title(),0,75);
								echo $trimmed;
							?>...
						
						</h6>
						<small>
							<?php// the_date(get_the_ID()) ?>
							<?php echo get_the_date( '', get_the_ID() ); ?>
						</small>
					</div>
			</div>
			</div>
			
									</div>
										<?php endif; $counter++ ; ?>
										<?php endwhile; ?>
								<?php
									wp_reset_postdata();
								endif; ?>
							<?php endif; ?>
				</div>
				<?php endif; ?>	
			<?php $head++; $delay+=100;
			endwhile; ?>
				</div>
				<?php endif; ?>	

				<?php if(get_sub_field('see_all')!=''): ?>
					<div class="row">
		<div class="large-4 large-offset-4 columns text-center">
			<a data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="200" href="<?php the_sub_field('title_link'); ?>" class="see-all">

				<?php the_sub_field('see_all'); ?> <i class="fa fa-chevron-right" aria-hidden="true"></i>
			</a>
		</div>
		</div>
		<?php endif; ?>	
		
</section>
			