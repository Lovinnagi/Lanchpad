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
$has_thumb = "";
$over_bg_clr = (get_field('over_bg_clr'))? get_field('over_bg_clr'):'#000';
	$over_opct = (get_field('over_opct'))? get_field('over_opct') : ".5";	
	
	$over_style = 'style="';
	$over_style .= 'background-color:'.$over_bg_clr.';';
	$over_style .= 'opacity:'.$over_opct.';"';
	
	
	//(get_field('overlay'))?'':$overlay='<div class="overlay-scr" '.$over_style.'></div>';
	$overlay='<div class="overlay-scr" '.$over_style.'></div>';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php if(has_post_thumbnail()):  $has_thumb="has-thumb"; ?>
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
					<h6 class="pg-sub-title">
						<?php the_category(' ') ?>
					</h6>
				<h1 class="pg-title"><?php the_title() ?></h1>
				<small class="post-meta">
					<span class="avatar">
						<?php echo get_avatar( get_the_author_meta( 'ID' ) ,48 ); ?>
					</span>
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
</div>
</div>
	<?php endif; ?>
<div class="row ">
	<div class="large-8 columns">
	
		<div class="entry-content <?php echo $has_thumb ?>">
		<?php if(!has_post_thumbnail()): ?>
			<header class="page-header">
				<h1 class="page-title"><?php the_title(); ?></h1>
				<small class="post-meta">
				by <?php the_author_link() ?> <?php the_date() ?>
					
				</small>
			</header>
		<?php endif; ?>
		T
			<?php
				the_content();
			?>
		</div><!-- .entry-content -->
		<div class="entry-author">
			<div class="row ">
			
				<div class="medium-2 columns">
					<div class="circle-image text-center padd-25 ">
						<?php echo get_avatar( get_the_author_meta( 'ID' ) ,100 ); ?>
					</div>
				</div>
				<div class="medium-10 columns">
					<h4 class="author-title bold-text">Written By <?php the_author_link() ?></h4>
					<?php the_author_description() ?>
					<ul class="author-social">
						<?php if(get_the_author_meta('twitter')): ?>
						<li>
							<a href="<?php echo get_the_author_meta('twitter'  )?>">
							<i class="fa fa-twitter"></i>
							</a>
						</li>
						<?php endif; ?>
						<?php if(get_the_author_meta('facebook')): ?>
						<li>
							<a href="<?php echo get_the_author_meta('facebook'  )?>">
							<i class="fa fa-facebook"></i>
							</a>
						</li>
						<?php endif; ?>
						<?php if(get_the_author_meta('googleplus')): ?>
						<li>
							<a href="<?php echo get_the_author_meta('googleplus'  )?>">
							<i class="fa fa-google-plus"></i>
							</a>
						</li>
						<?php endif; ?>
					</ul>
				</div>
				
			</div>
		</div>
<?php comments_template( );  ?>

	<?php wp_link_pages(); ?>
	</div>
	<?php if(is_active_sidebar( 'sidebar-1' )): ?>
	<div class="large-3 columns"id="sidebar" role="Complementary" >
		<div class="sidebar-contents">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		
		</div>
	</div>
	<?php endif; ?>
</div>
</article><!-- #post-## -->
