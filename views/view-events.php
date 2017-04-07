<?php 
include(locate_template('/views/padding-controller.php'));

// Settings
$event_list_title = get_sub_field('eve_title');
$eve_num = get_sub_field('num_of_eve');
$topevent =  get_sub_field('top_event');
$eventID = $topevent->ID;
$event_type = get_sub_field('event_type');
$num_of_events = get_sub_field('num_of_eve');
$single_event = get_sub_field('single_event');

?>
<section  class="events view <?php echo $section_padd ?> <?php echo $section_marg ?>" 
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
	<div class="row">
		<div  data-aos="fade-up" data-aos-duration ="500" data-aos-delay ="200"  class="large-8 columns content-column " >
			<?php if($single_event!=""): ?>
			<div class="row collapse">
				<div class="event-big">
					<div class="event-big-image" style="background-image:url(<?php echo get_the_post_thumbnail_url($single_event->ID,'img-800')  ?>);" >
						<a href="<?php echo get_permalink($single_event->ID) ?>" 
						title ="<?php echo $single_event->post_title; ?>" class="box-link">
							<span class="no-disp" ><?php echo $single_event->post_title; ?></span>
						</a>
						
					</div>
					
						<div class="big-event-content"style="padding:3em;" >
						
							<?php 
								$emv = get_post_custom($single_event->ID);
								$epoch=$emv['evcal_srow'][0];
								$dt = new DateTime("@$epoch");
								//echo $dt->format('d M Y  H:i'); 								
							?>
							<h5 class="event subtitle">
							Event Date: <?php echo $dt->format('d M Y ')." at ".$dt->format('H:i');  ?>
							</h5>
					
						<h3 class="big-event-title red-text">
							<a href="<?php echo get_permalink($single_event->ID) ?>" title="<?php echo esc_html($single_event->post_title); ?>" >
								<?php echo $single_event->post_title; ?>
							</a>
						</h3>
						
						
							<?php 
								$stripped = wp_strip_all_tags ($single_event->post_content);
								$trimmed = substr($stripped ,0,150);								
							?>
							<div class="col-content">
							<?php echo $trimmed."..."; ?>
							</div>

						
						
						<p class="padd-bot-none">
							
							<a href="<?php echo get_permalink($single_event->ID) ?>" title="<?php echo $single_event->post_title; ?>" class="red-text read-more">
							<?php echo (get_sub_field('read_more'))? get_sub_field('read_more') : "Read More ";?>
								 <i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</p>
						
						</div>
				
				</div>
			</div>
			<?php else: ?>
			<div class="row collapse">
				<div class="table-content event-big  ">
				Post Absent
				
				</div>
			</div>
			<?php endif; ?>
		</div>
		
		<div  class="large-4 columns content-column event-small" >
			<?php

				global $post;
				global $wpdb;
				$date=date("Y-m-d h:i:sa");
				$dt   = new DateTime($date);
				$today=date( 'F jS Y h:i:s A', strtotime( 'first day of ' . date( 'F Y')));
				//$today= strtotime($today);								
				$today= $dt->getTimestamp();
				$currentMonth=$dt->format('M');
				$args = array(
					'post_type'  => 'ajde_events',
					'post_status'=>'publish',
					'posts_per_page' => 5,  
					'meta_key'   => 'evcal_srow',
					'orderby'    => 'meta_value_num',
					'order'      => 'ASC',	
					'meta_query' => array(								
										array(
											'key'     => 'evcal_srow',
											'value'   => (int)$today,
											'compare' => '>=',
											'type' => 'NUMERIC'
										),
									),
				);
				
				if($event_type){
					$args['tax_query']=array(
											array (
												'taxonomy' => 'event_type',
												'field' => 'term_id',
												'terms' => $event_type,
											)
										);
				}
				$query = new WP_Query( $args );				
				$posts = $query->posts;							
				if($posts){
				?>
					<div id="evcal_list" class="eventon_events_list">
												<?php					
							$counter = 1;
						foreach ( $posts as $post ) :
						setup_postdata( $post );														
							$eventSDate=new DateTime();
							$eventSDate->setTimestamp($post->evcal_srow);
							
							$eventEDate=new DateTime();
							$eventEDate->setTimestamp($post->evcal_erow);														
							
							$location = wp_get_post_terms($post->ID, 'event_location');															
							if($location){
								$location = $location[0];					
								$location = $location->name;					
							}
							else{
								$location='';
							}
							
							
							$eventType = wp_get_post_terms($post->ID, 'event_type');
							if($eventType){
								$eventType=$eventType[0];
								$eventType=$eventType->name;																
							}
							else{
								$eventType='';
							}
							
												
							$eventLevel = wp_get_post_terms($post->ID, 'event_type_2');
							if($eventLevel){
								$eventLevel=$eventLevel[0];
								$eventLevel=$eventLevel->name; 	
							}
							else{
								$eventLevel='';
							}
							
							
							//echo $today."||".$post->evcal_srow;die;
							?>
							<div id="event_<?php echo $post->ID; ?>" class="eventon_list_event past_event event" data-event_id="<?php echo $post->ID; ?>" data-time="<?php echo $post->evcal_srow; ?>-<?php echo $post->evcal_erow; ?>" data-colr="#711f85" itemscope="" itemtype="http://schema.org/Event" >
							<?php
								if($counter==1):
									$style="padding: 0 ;";
								else:
									$style="padding: 3% 0 0 0;";
								endif;
							?>
								<p class="desc_trig_outter" style="<?php echo $style; ?>">
									<a data-gmtrig="1" data-exlk="1" href="<?php echo $post->guid; ?>" style="border-color: #711f85;" id="" class="desc_trig evo_in-house-events evo_beginner-level sin_val evcal_list_a" data-ux_val="4">
										<span class="evcal_cblock " data-bgcolor="#711f85" data-smon="march" data-syr="2017">					
											<em class="evo_date"><span class="start"><?php echo $eventSDate->format('d'); ?><em><?php echo $eventSDate->format('M'); ?></em></span></em>
											<!-- <span class="evo_time"><span class="start"><?php echo $eventSDate->format('h:i a'); ?></span><span class="end">- <?php echo $eventEDate->format('h:i a'); ?></span></span> -->
											<em class="clear"></em>
										</span>
										
										<span class="evcal_desc evo_info " data-latlng="" data-location_address="" data-location_type="lonlat" data-location_name="<?php echo $location; ?>" data-location_status="true">					
											<?php 
													$wooId=get_post_custom_values('tx_woocommerce_product_id', $post->ID);	
													
													$woometa=get_post_custom($wooId[0]);						
													//echo "<pre>";var_dump($woometa);die;
													if((!empty($woometa['_stock_status']) && $woometa['_stock_status'][0]=='outofstock') || (!empty($woometa['_stock']) && $woometa['_stock'][0]==0)):
											?>
													<span class="evo_above_title">
														<span class="evo_soldout">Sold Out!</span>
													</span>
											<?php 
													endif;													
											?>
											<!-- <span class="evo_above_title"><span class="eventover">Event Over</span></span> -->
											<span class="evcal_desc2 evcal_event_title" itemprop="name"><?php echo esc_html($post->post_title); ?></span>
											<span class="evo_below_title"></span>
											<span class="evcal_desc_info">
												<em class="evcal_time"><?php echo $eventSDate->format('h:i a'); ?> -<?php echo $eventEDate->format('h:i a'); ?> <em class="evo_etop_timezone">HKT</em></em>
												<em class="evcal_location" data-latlng="" data-add_str=""><em class="event_location_name"><?php echo $location; ?></em>, </em>
											</span>
											<span class="evcal_desc3">
												<span class="evcal_event_types ett1">
													<em><i>Event Type:</i></em>
													<em data-filter="event_type"><?php echo $eventType; ?></em>
													<i class="clear"></i>
												</span>
												<?php 
													if($eventLevel){
												?>		
													<span class="evcal_event_types ett2"><em><i>Level:</i></em><em data-filter="event_type_2"><?php echo $eventLevel; ?></em><i class="clear"></i></span>		
												<?php	}
												?>
												
											</span>
										</span>
											<em class="clear"></em>
									</a>
								</p>
							</div>
							<?php $counter++; ?>
							<?php endforeach; ?>
					</div>
				<?php 
					wp_reset_postdata(); 
				}?>
		</div>
	</div>
	

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