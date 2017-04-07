<?php
/**
 * Archives template
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package winemaker
 */

get_header(); ?>
<?php  
// Settings
$cat = get_query_var( 'cat' );  
		$cat = "category_".$cat;		
		$cat_img = get_field('cat_img',$cat);
		$bgimg = $cat_img['sizes']['img-4xl']; 
		$overlay='<div class="overlay-scr" ></div>';
		
if ( $cat_img ) : 
$has_thumb="has-thumb" ;
else:
	$bgimg = get_template_directory_uri()."/images/big_bg_fallback.jpg";
endif;
		?>
<div id="primary" class="content-area">
		<section id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>
			
			<div class="head-single-full" style="background-image: url(<?php 
	echo $bgimg ;
	?> );  ">
	<?php echo $overlay; ?>
<div class="row collapse  dark text-center ">
	<div class="medium-12 columns">
		<div class="row collapse">
			<div class="medium-12 columns big-image" >
		<div class="table-content">
			<div class="cell">
				<div class="text-center header-img-cont">		
					
				<h1 class="pg-title"><?php single_cat_title() ?></h1>
				<div class="circle-image text-center padd-05 "><?php echo get_avatar( get_the_author_meta( 'ID' ) ,100 ); ?></div>
				<h4 class="author-title bold-text">By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></h4>
				<?php 
								the_archive_description( '<div class="taxonomy-description">', '</div>' );
							?>
				
				</div>
			</div>
		</div>
			</div>
		</div>
	</div>
</div>
</div>
		
	<?php endif; ?>

		<?php if ( have_posts() ) : ?>
			<div class="entry-content <?php echo $has_thumb ?>">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'cats' );

			endwhile; 
			?>
			</div>
		<?php endif; ?>
			<div class="row">
				<div class="medium-10 medium-offset-1 text-right columns">
					<?php 
						the_posts_pagination( array(
								'mid_size'  => 2
							) );
					?>
				</div>
			</div>
		</section><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
?>
