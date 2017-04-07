<?php
/**
 * Template part for displaying page content in posts.
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
	$overlay='<div class="overlay-scr" ></div>';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="post-container">
<?php if(has_post_thumbnail()): ?>

	
<div class="row     ">
	<div class="medium-12 columns" >
			<div class="medium-10 medium-offset-1 text-center dark columns loop big-image" style="background-image: url(<?php 
	echo $bgimg ;
	?> );  background-size:cover;" >
<?php echo $overlay; ?>
			<a href="<?php the_permalink() ?>"
			title="<?php echo $titles[0];?>" class="box-link">
				<span class="no-disp"><?php echo $titles[0];?></span>
			</a>
		<div class="table-content">
			<div class="cell">
				<div class="text-center header-img-cont">		
					<h6 class="pg-sub-title">
						<?php the_category(' ') ?>
					</h6>
				<h2 class="pg-title">
					<a href="<?php the_permalink() ?>" 
						title="<?php the_title() ?>">
						<?php the_title() ?>
					</a>
				</h2>
				<small class="post-meta">
					
					<span class="author-name">
					by <?php the_author_link() ?>
					</span>
					<span>
					<?php the_date() ?>
					</span>
				</small>
				</div>
			</div>
		</div>
			</div>
		

</div>
</div>

	<?php endif; ?>
<div class="row ">

<div class="medium-10 medium-offset-1 columns">
	
	<div class="entry-content">
	<?php if(!has_post_thumbnail()): ?>
		<header class="page-header">
			<h2 class=" post-loop-title">
				<a href="<?php the_permalink() ?>" 
						title="<?php the_title() ?>">
						<?php the_title() ?>
					</a>
			</h2>
		</header>
	<?php endif; ?>
		<?php
			the_excerpt();
		?>
		<a class="red-text read-more" href="<?php the_permalink() ?>" 
						title="<?php the_title() ?>">
			read more <i class="fa fa-arrow-right" aria-hidden="true"></i>
		</a>
	</div><!-- .entry-content -->
</div>

</div>
</div>
</article><!-- #post-## -->
