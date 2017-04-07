<?php
/**
 * Template Name: Content Blocks
 *
 * @package winemaker
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<section id="main" class="site-main" role="main">
			<?php 
//Load Content Blocks
if( have_rows('content_blocks') ) { 

        while ( have_rows('content_blocks')) : the_row();
			$layout  = get_row_layout();
			switch($layout){
				case 'three_images_header' :
					get_template_part('/views/view', 'header');
					break;
				case 'logo_carousel' :
					get_template_part('/views/view', 'logo-carousel');
					break;	
				case 'image_gallery' :
					get_template_part('/views/view', 'image-gallery');
					break;	
				case 'map' :
					get_template_part('/views/view', 'map');
					break;
				case 'special_offers' :
					get_template_part('/views/view', 'offers');
					break;
				case 'products_&_offers' :
					get_template_part('/views/view', 'pro-offers');
					break;
				case 'pro_scroller' :
					get_template_part('/views/view', 'pro-scroll');
					break;
				
					
				case 'cont_cols' :
					get_template_part('/views/view', 'three-cols');
					break;
				case 'cont_five_cols' :
					get_template_part('/views/view', 'five-cols');
					break;
				case 'events' :
					get_template_part('/views/view', 'events');
					break;
				case 'video' :
					get_template_part('/views/view', 'video');
					break;
				case 'video_section' :
					get_template_part('/views/view', 'video-section');
					break;
				case 'accordion' :
					get_template_part('/views/view', 'accordion');
					break;	
				case 'team_five_cols' :
					get_template_part('/views/view', 'team-five-cols');
					break;					
				case 'team' :
					get_template_part('/views/view', 'team');
					break;
				case 'post_cols' :
					get_template_part('/views/view', 'post-cols');
					break;
				case 'subscribe' :
					get_template_part('/views/view', 'subscribe');
					break;
				case 'wells_block' :
					get_template_part('/views/view', 'wells');
					break;
				case 'text_col' :
					get_template_part('/views/view', 'text');
					break;
				case 'two_cols' :
					get_template_part('/views/view', 'two-cols');
					break;
				case 'text_cols' :
					get_template_part('/views/view', 'text-cols');
					break;
				case 'testimonials' :
					get_template_part('/views/view', 'testimonials');
					break;		
				case 'desc_four_cols' :
					get_template_part('/views/view', 'four-desc-cols');
					break;
			   case 'full_width_slider' :
					get_template_part('/views/view', 'full-width-slider');
					break;
			  case 'carousel_slider' :
					get_template_part('/views/view', 'carousel-slider');
					break;
				default:
			}

        

        endwhile;

      }

?>
		</section><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
?>