<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package winemaker
 */

get_header(); ?>

<div id="primary" class="content-area">
		<section id="main" class="site-main" role="main">
<?php if ( have_posts() ) : ?>
		<?php
		
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );


			// If comments are open or we have at least one comment, load up the comment template.
			

		endwhile; // End of the loop.
		?>
<?php 
	// Related posts
	$tag_arr = array();
	$cat_arr = array();
	$crr_id = array(get_the_ID());
	$posttags =  get_the_tags() ;
	$postcats =  get_the_category() ;
	if($posttags ):
		foreach($posttags as $poastag){
			array_push($tag_arr, $poastag->term_id);
			 
		}
	endif;
	if($postcats):
		foreach($postcats as $postcat){
			array_push($cat_arr, $postcat->term_id);
		}
	endif;

?>
<?php endif; ?>
		</section><!-- #main -->
	</div><!-- #primary -->
	
<?php 
	include(locate_template('/template-parts/related.php'));
?>

<?php
get_footer();
