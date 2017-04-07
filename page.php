<?php
/**
 *
 * @package winemaker
 */

get_header(); ?>

<div id="primary" class="content-area">
		<section id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );

			endwhile; 
			?>

		</section><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
?>