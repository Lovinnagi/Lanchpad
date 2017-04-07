<?php
/**
 * Template part for displaying page content in page-side.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package winemaker
 */
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
<?php if(has_post_thumbnail()): ?>
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
				<?php if(get_field('pg_subtitle')): ?>
					<h6 class="pg-sub-title">
						<?php the_field('pg_subtitle')?>
					</h6>
				<?php endif; ?>
				<h1 class="pg-title"><?php the_title() ?></h1>
				</div>
			</div>
		</div>
			</div>
		</div>
	</div>
</div>
</div>
	<?php endif; ?>
<div class="row ">
<div class="medium-8 columns">
	
	<div class="entry-content">
	<?php if(!has_post_thumbnail()): ?>
		<header class="page-header">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</header>
	<?php endif; ?>
		<?php
			the_content();
		?>
	</div><!-- .entry-content -->

</div>
<?php if(is_active_sidebar( 'sidebar-1' )): ?>
	<div class="medium-3 columns"id="sidebar" role="Complementary" >
		<div class="sidebar-contents">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		
		</div>
	</div>
				<?php endif; ?>
</div>
</article><!-- #post-## -->
