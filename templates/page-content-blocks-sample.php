<?php
/**
 * Template Name: Sample Page
 *
 * @package winemaker
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<section id="main" class="site-main" role="main">
			<?php 
			if( have_rows('template_block_2') ) { 

				while ( have_rows('template_block_2')) : the_row();
					$layout  = get_row_layout();					
					switch($layout){
						case 'header2' :
							get_template_part('/views/view', 'header2');
							break;			
					}
				endwhile; 	
			}			
?>
	<?php 
// Settings 
$bgimg = get_the_post_thumbnail_url(get_the_ID(),'img-4xl'); 

$over_bg_clr = (get_field('over_bg_clr'))? get_field('over_bg_clr'):'#000';
	$over_opct = (get_field('over_opct'))? get_field('over_opct') : ".5";	
	
	$over_style = 'style="';
	$over_style .= 'background-color:'.$over_bg_clr.';';
	$over_style .= 'opacity:'.$over_opct.';"';
	
	
	(get_field('overlay'))?	$overlay='<div class="overlay-scr" '.$over_style.'></div>':'';
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<div class="row ">
	<div class="medium-12 columns">
		
		<div class="entry-content">
		<?php if(!$flag): ?>
		<?php if(!has_post_thumbnail()): ?>
			<header class="page-header">
				<h1 class="page-title"><?php the_title(); ?></h1>
			</header>
		<?php endif; 
			endif;
		?>
			<?php
				the_content();
			?>
		</div><!-- .entry-content -->

	</div>
	</div>
	</article><!-- #post-## -->

		</section><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
?>