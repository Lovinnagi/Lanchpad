<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package winemaker
 */

?>

</div><!-- #content -->

<footer id="site-footer" role="contentinfo">
<div class="foot-columns">
	<div class="row small-up-1 medium-up-2 large-up-4 content-columns">

		
				<?php if(is_active_sidebar( 'footer-1' )): ?>
				<div class="footer-widgets column column-block">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
				<?php endif; ?>
				<?php if(is_active_sidebar( 'footer-2' )): ?>
				<div class="footer-widgets column column-block">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
				<?php endif; ?>
				<?php if(is_active_sidebar( 'footer-3' )): ?>
				<div class="footer-widgets column column-block">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div>
				<?php endif; ?>
				<?php if(is_active_sidebar( 'footer-4' )): ?>
				<div class="footer-widgets column column-block">
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</div>
				<?php endif; ?>
			
		
	</div>
</div>
<div class="copyright">
	<div class="row">
		
<div class="large-4 large-push-4 columns">
			<a class="footer-logo" href="<?php echo esc_url( home_url() ) ; ?>" title="<?php bloginfo('name'); ?>">
			<?php if(get_field('foot_logo','option')):?>
				<img class="brand-logo" src="<?php the_field('foot_logo','option'); ?>" alt="<?php bloginfo('name'); ?>"/>
			<?php else:?>
				<img class="brand-logo" src="<?php echo get_template_directory_uri(); ?>/images/tfw_logo_white.svg" alt="<?php bloginfo('name'); ?>"/>
			<?php endif;?>
			</a>
		</div>
		<div class=" large-4  large-pull-4 columns copyrt-menu ">
		<?php
			if (has_nav_menu('copyrt_menu')) :
				wp_nav_menu(['theme_location' => 'copyrt_menu','container_class'=>'copy-menu' ]);
			endif;
		?>
		
		</div>

		
		<div class=" large-4  columns copy-txt">
				<?php the_field('copy_txt','option'); ?>
		</div>

		
	</div>
</div>
<a href="javascript:void(0);" id="pagescroller"  style="display:none; position: fixed; float: right; right: 2%; color: rgb(153, 51, 51); border-radius: 50%; font-size: 20px; z-index: 9999; background-color: rgb(255, 255, 255); padding: 5px; text-align: center; width: 40px; bottom: 14%; box-shadow: 0px 2px 20px rgba(0, 0, 0, 0.2);"><i class="fa fa-arrow-up" aria-hidden="true"></i> </a>
</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>
