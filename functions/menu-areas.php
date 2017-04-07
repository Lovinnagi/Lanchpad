<?php
/**
 * Register navigation menus
 *
 * @link https://codex.wordpress.org/Function_Reference/register_nav_menus
 * @since winemaker  1.0.0
 */
add_action( 'after_setup_theme', 'register_theme_menus' );
function register_theme_menus() {
    register_nav_menus( array(
        'topmenu' => __( 'Top Bar Menu', 'winemaker' ),
        'mobile' => __( 'Top Mobile Menu', 'winemaker' ),
        'primary' => __( 'Primary Menu', 'winemaker' ),
        'footer_menu' => __( 'Footer Menu', 'winemaker' ),
        'copyrt_menu' => __( 'Copyright Menu', 'winemaker' )
    ) );
}

