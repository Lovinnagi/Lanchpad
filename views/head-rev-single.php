
			<?php if(have_rows('rev_slider')):
			while(have_rows('rev_slider')):the_row(); 
				//echo the_sub_field('add_shortcode'); 
				echo do_shortcode( get_sub_field('rev_shortcode') );
			endwhile;
			endif;
			?>
