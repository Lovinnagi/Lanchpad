<?php
/**
 *
 * @package winemaker
 */

get_header(); ?>


    
    <?php  

	$overlay='<div class="overlay-scr" ></div>';
		

	$bgimg = get_template_directory_uri()."/images/rygidtavhkq-dave-lastovskiy.jpg";

		?>
<div id="primary" class="content-area">
		<section id="main" class="site-main" role="main">
		
			
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
					
				<h1 class="pg-title">OOP's! Something went wrong</h1>
				<div class="circle-image text-center padd-05 ">We can't seem to find the page you're looking for.<br>Please use the menus to navigate to other parts of the Website.
				
				
				
				</div>
			</div>
		</div>
			</div>
		</div>
	</div>
</div>
</div>
		
	

<?php

get_footer();
