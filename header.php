<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package winemaker
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
<meta name="google-site-verification" content="XUWliamSPNmXA1My5Mo44c9JpA8zdHuM66iGnl0xTTg" />

</head>

<body <?php body_class(); ?>>
<header class="banner">
	<div class="slide-mobile-menu show-for-small-only">
	
		<div class="row mobile-branding">
			<div class="small-8 columns ">
				<?php if(get_field('foot_logo','option')):?>
				<a class="logo" href="<?php echo esc_url( home_url() ); ?>" title="<?php bloginfo('name'); ?>">
				<img  src="<?php the_field('foot_logo','option'); ?>" alt="<?php bloginfo('name'); ?>"/>
				</a>
			<?php else:?>
				<a class="logo" href="<?php echo esc_url( home_url() ); ?>" title="<?php bloginfo('name'); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/images/tfw_logo_white.svg" alt="<?php bloginfo('name'); ?>"/>
				</a>
			<?php endif;?>
					<?php if(get_field('tagline','option')):?>
						<small class="blog-des crem-text">
							<?php the_field('tagline','option'); ?>
						</small>
					<?php endif;?>			
			</div>
			<div class="small-4 columns text-right ">
				<a href="#" class="closer"><i class="fa fa-times"></i></a>
			</div>
		</div>
		<!--div  id="MobileMenu"-->
			
		<?php
					if (has_nav_menu('mobile')) :
				#	wp_nav_menu(['theme_location' => 'mobile', 'container_id' => 'mobile-top-menu']);
							
					endif;
				?>
			
		<!--/div-->
		<?php if(is_active_sidebar( 'mobilemenu' )): ?>
				<div id = "MobileWidgets">
					<?php dynamic_sidebar( 'mobilemenu' ); ?>
				</div>
		<?php endif; ?>
	
	</div>
	<div class ="mobile-top-bar show-for-small-only">
		<div class="row collapse">
			<div class="small-4 columns text-center">
				<a href="#" class="toggler"><i class="fa fa-bars"></i></a>
			</div>
			<div class="small-4 columns text-center borders">
				<a href="https://shop.flyingwinemaker.com.hk/account/register"><i class="fa fa-user"></i></a>
			</div>
			<div class="small-4 columns text-center">
				<a href="https://shop.flyingwinemaker.com.hk/"><i class="fa fa-shopping-cart"></i></a>
			</div>
		</div>
	</div>
	<div class="head-top-bar show-for-medium ">
		<div class="row large-collapse">
					<div class="medium-12 columns top-bar-social">
						<?php
					if (has_nav_menu('topmenu')) :
					wp_nav_menu(['theme_location' => 'topmenu', 'container_id' => 'top-bar-menu','menu_class'=>'top-bar-menu']);
							
					endif;
				?>
						<?php if(have_rows('soc_pros','option')): ?>
							<ul class="social-menu">
							<?php while(have_rows('soc_pros','option')): the_row(); ?>
								<li>
									<a href="<?php 
										(get_sub_field('soc_link'))? the_sub_field('soc_link') : "#";
									?>" target="_blank">
									<?php the_sub_field('soc_icon') ?>
									</a>
								</li>
							<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					</div>
					
				
		</div>
		
	</div>
	
	<div class="brand-header" id="site-header" >
	<div class="row large-collapse  " >
			<div class="large-9 columns ">
				<a class="brand " style="" href="<?php echo esc_url( home_url() ); ?>" title="<?php bloginfo('name'); ?>">
					<?php if(get_field('site_logo','option')):?>
						<img class="brand-logo" src="<?php the_field('site_logo','option'); ?>" alt="<?php bloginfo('name'); ?>"/>
					<?php else:?>
						<img class="brand-logo" src="<?php echo get_template_directory_uri(); ?>/images/twf_logo.svg" alt="<?php bloginfo('name'); ?>"/>
					<?php endif;?>
					<?php if(get_field('tagline','option')):?>
						<small class="blog-des crem-text">
							<?php the_field('tagline','option'); ?>
						</small>
					<?php endif;?>
					</a>		
			</div>
			<div class="large-3 columns  shoppingCartContainer" >
			<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) :
 
			$count = WC()->cart->cart_contents_count;
			?>					
			<a href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'TICKETS IN CART' ); ?>" id="cartToggle" class="fa fa-ticket" aria-hidden="true" >
				<span class="first cartText" style=""><?php _e( 'TICKETS IN CART' ); ?></span>
				<span id="cartCount" class="customCartCount"><?php echo esc_html( $count ); ?></span>
			</a>
			<?php endif; ?>
			</div>
			
	</div>
	
	</div>
	<div class="top-nav-bar show-for-medium" id="top-nav-bar" data-sticky-container >
		<div data-sticky data-options="marginTop:0;" 
		style="background:#000; width:100%; " data-top-anchor="site-header:bottom" >
		<div class="row collapse "  >
			<div class="large-12 columns">
			<?php if(get_field('foot_logo','option')):?>
				<a style="" href="<?php echo esc_url( home_url() ); ?>" title="<?php bloginfo('name'); ?>">
				<img class="sticky-logo" src="<?php the_field('foot_logo','option'); ?>" alt="<?php bloginfo('name'); ?>"/>
				</a>
			<?php else:?>
				<a class="brand " style="" href="<?php echo esc_url( home_url() ); ?>" title="<?php bloginfo('name'); ?>">
				<img class="sticky-logo" src="<?php echo get_template_directory_uri(); ?>/images/tfw_logo_white.svg" alt="<?php bloginfo('name'); ?>"/>
				</a>
			<?php endif;?>
			<?php
					if (has_nav_menu('primary')) :
					wp_nav_menu(['theme_location' => 'primary', 'container_id' => 'top-menu']);
							
					endif;
				?>
			</div>
		</div>
	</div>
	</div>
	<!--div class="secondary-nav-bar" >
		<div class="row">
			<div class="large-12 columns">
		
			</div>
		</div>
	</div-->

</header><!-- .banner -->
<div id="content" class="site-content">
