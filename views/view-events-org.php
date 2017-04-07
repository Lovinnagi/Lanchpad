<?php 
// Settings
include(locate_template('/views/padding-controller.php'));
$event_list_title = get_sub_field('eve_title');
$eve_num = get_sub_field('num_of_eve');
$topevent =  get_sub_field('top_event');
$eventID = $topevent->ID;
?>
<section  class="events view <?php echo $section_padd ?> <?php echo $section_marg ?>" 
	<?php if(get_sub_field('section_id')): ?>
		id="<?php the_sub_field('section_id'); ?>"
	<?php endif; ?>
>
<div class="row " >
			<div class="medium-12 columns">
				<?php if( get_sub_field('title')): ?>
				<h2 class="section-title text-center lines-title">
				<?php if( get_sub_field('title_link')): ?>
					<a href="<?php the_sub_field('title_link') ?>"
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
		<div class="row">
			<div class="large-8 columns content-column " >
				<?php echo do_shortcode("[eventon_slider slider_type='slider' lan='L1' orderby='ASC' map='no' details='no' date_out='1' date_in='1' id='slider_1' open_type='link' style_2='b']"); ?>
			</div>
			<div class="large-4 columns content-column event-small" >
				<?php echo do_shortcode('[add_eventon_list hide_month_headers="yes" event_count="3" show_et_ft_img="yes" ]'); ?>
			</div>
		</div>
<div class="row">
	<div class="large-8 columns content-column " >
		<div class="row collapse">
			<div class="table-content event-big  ">
				<div class="medium-5 cell square-thumb" style="background-image:url(<?php echo get_the_post_thumbnail_url($eventID,'img-500')  ?>);background-size:cover;" >
					&nbsp;
				</div>
				<div class=" medium-7 cell eve-c-block" >
					<div class="big-event-content" >
						<h5 class="crem-text subtitle"><?php the_sub_field('subtitle') ?></h5>
						<h3 class="big-event-title red-text">
							<a href="<?php echo get_permalink( $topevent->ID ); ?>" title="<?php echo $topevent->post_title ?>" >
								<?php echo $topevent->post_title ?>
							</a>
						</h3>
						<p class="big-event-content"><?php echo  $topevent->post_excerpt ; ?></p>
						<p>
							<a href="<?php echo get_permalink( $topevent->ID ); ?>" title="<?php echo $topevent->post_title ?>" class="red-text read-more">
							<?php echo (get_sub_field('read_more'))? get_sub_field('read_more') : "Read More ";?>
								 <i class="fa fa-arrow-right" aria-hidden="true"></i>
							</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="large-4 columns content-column event-small" >
		<div class="event-list">
		<div class="row">
			<div class="small-10 small-offset-1 columns event-list-title" >
				<h4 class="red-text subtitle"><?php echo $event_list_title; ?></h4>
			</div>
		</div>
		<?php 
			$args = array( 
				'post_type' => 'event',
				'posts_per_page' => $eve_num,
				'post__not_in' => array( $eventID )
			);
			$event_loop = new WP_Query( $args );
			while ( $event_loop->have_posts() ) : $event_loop->the_post();
			?>
			<div class="row collapse">
				<div class="small-12 columns event-row"  >
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="box-link">
					<span class="no-disp"><?php the_title(); ?></span>
				</a>
				<div class="row collapse">
					<div class="small-offset-1 small-2 columns thumb" >
						<?php the_post_thumbnail( 'thumb-50') ?>
					
					</div>
					<div class="small-8 columns end"  >
						<div class="event-text">
							<span class="event-title"><?php the_title(); ?>
							</span>
							<span class="event-meta crem-text block-disp"><?php the_field('eve_date');?></span>
						</div>
					</div>
					<div class="borderBot"></div>
				</div>
				
				
			</div>
			</div>
		<?php 
			endwhile;
			wp_reset_postdata();
			?>
			<div class="row">
			<div class="small-10 small-offset-1 columns" >
					<?php if(get_sub_field('all_eve_url')):?>
				<a class="all-eve-link" href="<?php echo(get_sub_field('all_eve_url'))?get_sub_field('all_eve_url'):'#'; ?>">
					<?php the_sub_field('all_eve_text') ?><i class="fa fa-arrow-right" aria-hidden="true"></i>

				</a>
			<?php endif; ?>
				
			</div>
		</div>
		
	</div>
	</div>
</div>
</section>