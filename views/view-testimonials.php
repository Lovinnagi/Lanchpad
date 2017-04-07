<?php 
include(locate_template('/views/padding-controller.php'));
// Settings
$overlay = "";
$image_right = "";
$content_left = "";

// Styling
	$style="";
	if(get_sub_field('bg_clr')|| get_sub_field('bg_img')){
		$style= 'style="';
	
		if(get_sub_field('bg_clr')){
			get_sub_field('bg_clr')? $style.= 'background-color:'.get_sub_field('bg_clr').';':'';
		}
		if(get_sub_field('bg_img')){
			$bgimg = get_sub_field('bg_img');
			$style.= ' background-size:cover;';
			$style.= ' background-image:url('.$bgimg[sizes][large].');';
		}
		$style.= '"';
	}
	
	// Overlay Settings
	$over_bg_clr = (get_sub_field('over_bg_clr'))? get_sub_field('over_bg_clr'):'#000';
	$over_opct = (get_sub_field('over_opct'))? get_sub_field('over_opct') : ".5";	
	
	$over_style = 'style="';
	$over_style .= 'background-color:'.$over_bg_clr.';';
	$over_style .= 'opacity:'.$over_opct.';"';
	
	
	(get_sub_field('overlay'))?	$overlay='<div class="overlay-scr" '.$over_style.'></div>':'';

?>
<section  class="two-cols view <?php echo $section_padd ?> <?php echo $section_marg ?>" 
	<?php if(get_sub_field('section_id')): ?>
		id="<?php the_sub_field('section_id'); ?>"
	<?php endif; ?>
	<?php echo $style ; ?>
>
<?php echo $overlay ?>
<div class="rel-sec" >
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
		<?php if(get_sub_field('see_all')!=''): ?>
		<div class="large-3 columns text-right">
			<a href="<?php the_sub_field('title_link'); ?>" class="see-all">

				<?php the_sub_field('see_all'); ?> <i class="fa fa-chevron-right" aria-hidden="true"></i>
			</a>
		</div>
		<?php endif; ?>
	</div>
	<!-- heading -->
<?php 
	$test_num = get_sub_field('num_of_test');
	$args = array( 
		'post_type' => 'testimonials',
		'posts_per_page' => $test_num );
		$loop = new WP_Query( $args );
		if($loop->have_posts()):
		$counter = 1;
		$push = "";
		$pull = "";
		$right_side = "";
		?>
		<div class="row testimonials">
		<?php 
		while ( $loop->have_posts() ) : $loop->the_post();
			if($counter%2==1){
				$push = "medium-push-4";
				$pull = "medium-pull-8";
			}else{
				$push = "left";
				$pull = "right";
				$right_side = "right-side";
			}
		?>
		<div class="single-testimonial medium-10 medium-offset-1 large-6 large-offset-0 columns end <?php echo $right_side ?>">
			
				<div class="table-content">
				<div class="cell medium-8  <?php echo $push ?> test-content">
					<div class="testi-text">
						<h3><?php the_title() ?></h3>
						<?php echo wp_strip_all_tags(get_the_conetnt());  ?>
					</div>
					<div class="testi-meta text-center">
						<span class="client">
						- <?php the_field('clients_name') ?>
						</span>
						<span class="project">,
						<?php the_field('project_name') ?>
						</span>
					</div>
				</div>
				<div class="cell medium-4  <?php echo $pull ?> test-client-thumb">
					<?php the_post_thumbnail('thumbnail')?>
				</div>
				</div>
			
		</div>
		<?php 
			$counter++;
		endwhile;	?>
		</div>
		<?php 
			endif;
			wp_reset_postdata();
		?>

</div>

</section>