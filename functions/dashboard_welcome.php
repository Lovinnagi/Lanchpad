<?php 
//Get Site Info define_syslog_variables
$siteName = get_bloginfo('name');
 ?>


	<div class="custom-welcome-panel-content">

	<h3><?php _e( 'Welcome to the new '.$siteName. ' website!' ); ?></h3>
	<p class="about-description"><?php _e( 'Managing your site is easy.  Let\'s get started.' ); ?></p>
	<div class="welcome-panel-column-container">
	<div class="welcome-panel-column">
		
		<a class="button button-primary button-hero hide-if-no-customize" href="<?php echo admin_url( 'options-general.php' ); ?>"><?php _e( 'Edit Site Settings' ); ?></a>


			<p class="hide-if-no-customize"><a href="/wp-admin/options-general.php">Manage Access</a> | <a href="/wp-admin/users.php">Manage Users</a></p>
	</div>

	<div class="welcome-panel-column">

		<h4><?php _e( 'Manage Content' ); ?></h4>
		<ul>

			<li><?php printf( '<a href="%s" class="welcome-icon welcome-write-blog">' . __( 'Add / Edit News Post' ) . '</a>', admin_url( 'edit.php' ) ); ?></li>

			<li><?php printf( '<a href="%s" class="welcome-icon 
dashicons-building">' . __( 'Add / Manage Categories' ) . '</a>', admin_url( 'edit-tags.php?taxonomy=category' ) ); ?></li>	
			
			<li><?php printf( '<a href="%s" class="welcome-icon dashicons-format-gallery">' . __( 'Manage Media' ) . '</a>', admin_url( 'upload.php' ) ); ?></li>
			
		</ul>

		<h4><?php _e( 'Navigation' ); ?></h4>
		<ul>

			<li><?php printf( '<a href="%s" class="welcome-icon dashicons-editor-justify">' . __( 'Edit Navigation Menus' ) . '</a>', admin_url( 'nav-menus.php' ) ); ?></li>
			
		</ul>

	</div>


	<div class="welcome-panel-column welcome-panel-last">
		<h4><?php _e( 'Edit Theme Options' ); ?></h4>
		<ul>
			<li>

				<div class="welcome-icon dashicons-star-filled">
					<a href="<?php echo admin_url( 'admin.php?page=theme-general-settings' ); ?>">Theme Options</a>
				</div>
				
		</ul>

	</div>
	</div>

	<div style="border-top: #ccc 1px solid; padding:20px 0; width:100%; margin-bottom:20px; clear:both;">

	<ul class="subsubsub">
		<li><a href="http://colourcode.hk/" target="_blank" style="display:inline-block; width:50px; height:40px; background:url(//colourcode.hk/wp-content/uploads/2016/03/cclogofinal2016.png) top center no-repeat; background-size:contain; margin-right:10px; vertical-align:middle;"></a> <strong style="display:inline-block; vertical-align:middle;">Design &amp; Development by Colourcode.hk</strong></li>
	</ul>
	
		
	</div>

	</div>