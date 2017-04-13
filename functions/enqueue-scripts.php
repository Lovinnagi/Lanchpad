<?php
/**
 * Enqueue all styles and scripts.
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style}
 */
if (!function_exists('cc_scripts')) :
    function cc_scripts()
    {
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
    // Enqueue the main Stylesheet.
	wp_enqueue_script("jquery");

    wp_enqueue_style('main-stylesheet', get_stylesheet_directory_uri().'/compiled/css/main.min.css');


wp_enqueue_style( 'style', get_stylesheet_uri() );

   /* wp_enqueue_style('icons','//cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css?hash=bc6f4b309f855b9c66168bc39723443e', array(), '1.0.0', 'all');*/

    // Deregister the jquery version bundled with WordPress.
   // wp_deregister_script('jquery');

    // CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.

   # wp_enqueue_script('modern', get_stylesheet_directory_uri().'/assets/js/modernizr-custom.js', array(), false, false);

   // wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-2.2.4.min.js', array(), '2.2.4', false);
    wp_enqueue_script('icons', 'https://use.fontawesome.com/3d5fdb9544.js', array(), '4.6.2', false);

	wp_enqueue_script('appjs', get_stylesheet_directory_uri().'/compiled/js/app.min.js', array(), '1.0.0', true);
   // wp_enqueue_script('tinymce', get_template_directory_uri().'/assets/js/tiny_mce.js', array(), '1.0.0', true);

	}

    add_action('wp_enqueue_scripts', 'cc_scripts');
endif;

// Add attributes to enqueued scripts <script> tag.
if (!function_exists('edit_scripts')) {
    function edit_scripts($url)
    {
        if (false === strpos($url, '.js')) {
            return $url;
        }
    /*
     * Use "integrity" and "crossorigin" attributes for jQuery CDN
     * The integrity and crossorigin attributes are used for Subresource Integrity (SRI) checking.
     * This allows browsers to ensure that resources hosted on third-party servers have not been tampered with.
     * Use of SRI is recommended as a best-practice, whenever libraries are loaded from a third-party source. Read more at srihash.org
     */
  if (strpos($url, 'jquery-3.0.0.min.js')) {
      return "$url' integrity='sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44='
			  crossorigin='anonymous";
  }

        return $url;
    }
    add_filter('clean_url', 'edit_scripts', 11, 1);
};


/* Function Google Analytics */
add_action('wp_head','ganalytics');
function ganalytics(){
?>
<script>
 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');  ga('create', 'UA-71196546-3', 'auto');
 ga('send', 'pageview');</script>

<?php
}
/* Function Kiss Matrics */
#add_action('wp_head','kiss_mat');
function kiss_mat(){
?>
<script type="text/javascript">var _kmq = _kmq || [];
var _kmk = _kmk || '1a5fc02f1207a3c34408ee1efe615f2e92fd6467';
function _kms(u){
 setTimeout(function(){
   var d = document, f = d.getElementsByTagName('script')[0],
   s = d.createElement('script');
   s.type = 'text/javascript'; s.async = true; s.src = u;
   f.parentNode.insertBefore(s, f);
 }, 1);
}
_kms('//i.kissmetrics.com/i.js');
_kms('//scripts.kissmetrics.com/' + _kmk + '.2.js');
</script>
<?php
}
