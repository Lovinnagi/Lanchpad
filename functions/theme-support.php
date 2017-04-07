<?php
/**
 * Register theme support for languages, menus, post-thumbnails, post-formats etc.
 *
 * @link https://codex.wordpress.org/Function_Reference/add_theme_support
 * @since winemaker 1.0.0
 */

if (!function_exists('winemaker_theme_support')) :
    function winemaker_theme_support()
    {
        

        // Add menu support
        add_theme_support('menus');

        // Let WordPress manage the document title
        add_theme_support('title-tag');

        // Add post thumbnail support: http://codex.wordpress.org/Post_Thumbnails
        add_theme_support('post-thumbnails');

        // RSS thingy
        add_theme_support('automatic-feed-links');

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
		add_image_size( 'thumb-50', 54,54, array( 'center', 'center' ) );
		add_image_size( 'thumb-100', 100,100, array( 'center', 'center' ) );
		add_image_size( 'thumb-200', 200,200, array( 'center', 'center' ) );
		add_image_size( 'thumb-250', 250,250, array( 'center', 'center' ) );
		add_image_size( 'thumb-300', 300,300, array( 'center', 'center' ) );
		add_image_size( 'thumb-350', 350,350, array( 'center', 'center' ) );
		add_image_size( 'thumb-400', 400,400, array( 'center', 'center' ) );
		add_image_size( 'thumb-450', 450,450, array( 'center', 'center' ) );
		add_image_size( 'thumb-500', 500,500, array( 'center', 'center' ) );
		add_image_size( 'img-250', 250,250, false );
		add_image_size( 'img-400', 400,400, false );
		add_image_size( 'img-450', 450,450, false );
		add_image_size( 'img-500', 500,500, false );
		add_image_size( 'img-600', 600,600, false );
		add_image_size( 'img-700', 700,700, false );
		add_image_size( 'img-800', 800,800, false );
		add_image_size( 'img-900', 900,900, false );
		add_image_size( 'img-1000', 1000,1000, false );
		add_image_size( 'img-127', 100,270, false );
		add_image_size( 'img-452', 450,220, false );
		add_image_size( 'img-524', 500,240, false );
		add_image_size( 'img-419', 400,190, false );
		add_image_size( 'img-xl', 1280 , 800, false );
		add_image_size( 'img-xxl', 1500 , 940, false );
		add_image_size( 'img-3xl', 2000 , 1500, false );
		add_image_size( 'img-4xl', 2600 , 1500, false );

        // Add post formarts support: http://codex.wordpress.org/Post_Formats
        add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

        // Declare WooCommerce support per http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
        add_theme_support('woocommerce');
        //  Add widget support shortcodes
        add_filter('widget_text', 'do_shortcode');

        // Custom Background
        /*add_theme_support('custom-background', array('default-color' => 'fff'));*/

        // Custom Header
        add_theme_support('custom-header', array(
            'default-image' => get_template_directory_uri() . '/images/tfw_brand_logo.png',
            'height' => '100',
            'flex-height' => true,
            'uploads' => true,
            'header-text' => false
        ));
    }

    add_action('after_setup_theme', 'winemaker_theme_support');
endif;





function favicon(){

    ?>
    <link rel="apple-touch-icon" sizes="57x57" href="<?php the_field('apple_icon_57','option'); ?>">
<link rel="apple-touch-icon" sizes="60x60" href="<?php the_field('apple_icon_60','option'); ?>">
<link rel="apple-touch-icon" sizes="72x72" href="<?php the_field('apple_icon_72','option'); ?>">
<link rel="apple-touch-icon" sizes="76x76" href="<?php the_field('apple_icon_76','option'); ?>">
<link rel="apple-touch-icon" sizes="114x114" href="<?php the_field('apple_icon_114','option'); ?>">
<link rel="apple-touch-icon" sizes="120x120" href="<?php the_field('apple_icon_120','option'); ?>">
<link rel="apple-touch-icon" sizes="144x144" href="<?php the_field('apple_icon_144','option'); ?>">
<link rel="apple-touch-icon" sizes="152x152" href="<?php the_field('apple_icon_152','option'); ?>">
<link rel="apple-touch-icon" sizes="180x180" href="<?php the_field('apple_icon_180','option'); ?>">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php the_field('android_icon_192','option'); ?>">

<link rel="icon" type="image/png" sizes="96x96" href="<?php the_field('desktop_icon_96','option'); ?>">
<?php /* <link rel="icon" type="image/png" sizes="32x32" href="<?php the_field('desktop_icon_32','option'); ?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?php the_field('desktop_icon_16','option'); ?>"> */ ?>
<?php 
}

add_action('wp_head', 'favicon');

//Change the login upper logo
function my_logo_wp(){
 echo '
		<style type="text/css">
#login h1 a {
background: url('. get_template_directory_uri() .'/images/tfw_brand_logo2.png) top center no-repeat !important;
display:block;
width:100% !important;
height:40px !important;
padding:0px !important;
}
</style>
		';}
add_action('login_head', 'my_logo_wp');
/* The link with the logo */
add_filter( 'login_headerurl', create_function('', 'return get_home_url();') );
/* Remove the title in the logo */
add_filter( 'login_headertitle', create_function('', 'return false;'));
