<?php
/**
 * winemaker functions and definitions.
 *
 * 
 */

// # Load modules
if ( ! isset( $content_width ) ) $content_width = 900;
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}
// Clean up theme
require_once __DIR__.'/functions/cleanup.php';

// Enqueue styles and scripts
require_once __DIR__.'/functions/enqueue-scripts.php';


// Load theme support options
require_once __DIR__.'/functions/theme-support.php';

// Load theme support options
#require_once __DIR__.'/functions/post-types.php';

// Load theme Shortcodes
#require_once __DIR__.'/functions/shortcodes.php';

// Custom template tags for this theme.
require_once __DIR__.'/functions/template-tags.php';

// Menu areas
require_once __DIR__.'/functions/menu-areas.php';

// Widget areas
require_once __DIR__.'/functions/widget-areas.php';

// Load Visual Composer shortcodes
#require_once __DIR__.'/functions/vc_shortcodes.php';



// Theme the TinyMCE editor
// You should create custom-editor-style.css in your theme folder
add_editor_style('custom-editor-style.css');


// Custom CSS for the login page
// Create wp-login.css in your theme folder
function loginCSS() {
    echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri('winemaker').'/wp-login.css"/>';
}
add_action('login_head', 'loginCSS');



function wp_has_sidebar($classes) {
    if (is_active_sidebar('sidebar')) {
        // add 'class-name' to the $classes array
        $classes[] = 'has_sidebar';
    }
    // return the $classes array
    return $classes;
}
add_filter('body_class','wp_has_sidebar');



// Remove the version number of WP
// Warning - this info is also available in the readme.html file in your root directory - delete this file!
remove_action('wp_head', 'wp_generator');


// Obscure login screen error messages
function wp_login_obscure(){ return '<strong>Error</strong>: wrong username or password';}
add_filter( 'login_errors', 'wp_login_obscure' );


// Disable the theme / plugin text editor in Admin
#define('DISALLOW_FILE_EDIT', true);


add_filter( 'tiny_mce_before_init', 'wpex_mce_custom_fonts_array' );
function wpex_mce_custom_fonts_array( $initArray ) {
    $theme_advanced_fonts = 'Chronicles=Chronicles,serif;';
    $theme_advanced_fonts .= 'Intrepid Book=Intrepid Book,sans-serif;';
    $theme_advanced_fonts .= 'Intrepid Light=Intrepid Light,sans-serif;';
    $theme_advanced_fonts .= 'Intrepid Mono=Intrepid Mono,monospace';
    $theme_advanced_fonts .= 'Lato=Lato;Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats';
    $initArray['font_formats'] = $theme_advanced_fonts;
    return $initArray;
}
add_filter('get_the_tags', 'strip_tags_from_feeds');
function strip_tags_from_feeds($terms) {
    if (is_feed())
      return array();
    return $terms;
}

add_action( 'show_user_profile', 'profile_linkedin' );
add_action( 'edit_user_profile', 'profile_linkedin' );

function profile_linkedin( $user ) { ?>



	<table class="form-table">

		<tr>
			<th><label for="linkedin">LinkedIn</label></th>

			<td>
				<input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your linkedin URL.</span>
			</td>
		</tr>

	</table>
<?php }

function nr_load_scripts() {
		
	wp_register_script('googlemaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCawf6G3LuM-n0-IaoOd7x41CA_ZDw7aPs',null,null,true);  
	wp_enqueue_script('googlemaps');
		
}
add_action( 'wp_enqueue_scripts', 'nr_load_scripts' );

add_filter( 'woocommerce_get_price_html', 'bbloomer_price_prefix_suffix', 100, 2 );
 
function bbloomer_price_prefix_suffix( $price, $product ){
    // To add suffix, go to /wp-admin/admin.php?page=wc-settings&tab=tax
    $price = 'HK ' . $price ."  ". $product->get_price_suffix();
    return apply_filters( 'woocommerce_get_price', $price );
}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +
 
function woo_custom_cart_button_text() {
 
        return __( 'BUY TICKET', 'woocommerce' );
 
}

function my_acf_flexible_content_layout_title( $title, $field, $layout, $i ) {	
	
	if( $BlockName = get_sub_field('title') ) {
		
		$title=sanitize_text_field($BlockName)."<b>-". $title."</b>";
		
	}
	
	return $title;	
}
add_filter('acf/fields/flexible_content/layout_title', 'my_acf_flexible_content_layout_title', 10, 4);

add_filter('evo_max_cmd_count','custom_function_2',10,1);
function custom_function_2($number){
return $number;
}


function remove_footer_admin () 
{
    echo '<span id="footer-thankyou">Design & Web Development by <a href="'.site_url('/').'" target="_blank">Colourcode HK</a></span>';
}
 
add_filter('admin_footer_text', 'remove_footer_admin');
/*function register_button( $buttons ) {
   array_push( $buttons, "|", "shortbtn" );
   return $buttons;
}
function add_plugin( $plugin_array ) {
   $plugin_array['shortbtn'] = get_template_directory_uri() . '/assets/js/tiny_mce.js';
   return $plugin_array;
}


function add_basic_buttons() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'add_plugin' );
      add_filter( 'mce_buttons', 'register_button' );
   }

}

add_action('init', 'add_basic_buttons');

function my_mce_buttons_2( $buttons ) {	
	/**
	 * Add in a core button that's disabled by default
	 
	$buttons[] = 'superscript';
	$buttons[] = 'subscript';
	$buttons[] = 'Link Button';

	return $buttons;
}
#add_filter( 'mce_buttons_3', 'my_mce_buttons_2' );


// Trying One more button
function register_button( $buttons ) {
   array_push( $buttons, "|", "linkbutton" );
   return $buttons;
}
function add_plugin( $plugin_array ) {
   $plugin_array['linkbutton'] = get_template_directory_uri() . '/assets/js/tiny.js';
   return $plugin_array;
}
function my_link_btn() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'add_plugin' );
      add_filter( 'mce_buttons', 'register_button' );
   }

}

add_action('init', 'my_link_btn');

*/
/*
 * Ensure cart contents update when products are added to the cart via AJAX
 */
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	
	ob_start();
	$count = WC()->cart->cart_contents_count;
	?>
	<a href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'TICKETS IN CART' ); ?>" id="cartToggle" class="fa fa-ticket" aria-hidden="true" >
		<span class="first cartText" style=""><?php _e( 'TICKETS IN CART' ); ?></span>
		<span id="cartCount" class="customCartCount"><?php echo esc_html( $count ); ?></span>
	</a>
	<?php
	
	$fragments['a#cartToggle'] = ob_get_clean();
	
	return $fragments;
	
}

if(function_exists('shortcode_ui_register_for_shortcode')) {
shortcode_ui_register_for_shortcode(
	'tfw_button',
	array(
		'label' => 'Add Button',
		'listItemImage' => 'dashicons-feedback',
		'attrs'          => array( array(
			'label'        => 'Title',
			'attr'         => 'text',
			'type'         => 'text',
			'description'  => 'Please enter the button text',
			),
			array(
			'label'        => 'Link',
			'attr'         => 'link',
			'type'         => 'text',
			'description'  => 'Add button link here',
			),
			array(
			'label'		=> 'Button Style',
			'attr'      => 'style',		
			'type'		=> 'select',
				'options' => array(
					''		=> 'Choose Style',
					'red'		=> 'Red',
					'transparent'	=> 'Transaprent',
				),
			),
			array(
			'label'		=> 'Button Size',
			'attr'      => 'size',		
			'type'		=> 'select',
				'options' => array(
					'big'		=> 'Big',
					'small'	=> 'Small',
				),
			),
			array(
			'label'		=> 'Open Link In New Window',
			'attr'      => 'target',

			
			'type'		=> 'select',
				'options' => array(
					''		=> 'Please Pick Option',
					'_blank'		=> 'Yes',
					'_self'	=> 'No',
				),
			),
		),

	
	)
);
}

