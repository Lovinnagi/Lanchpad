<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function winemaker_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Mobile Menu', 'winemaker'),
        'id' => 'mobilemenu',
        'description' => esc_html__('Add widgets here.', 'winemaker'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="mobile-widget-title">',
        'after_title' => '</h3>',
    ));
	register_sidebar(array(
        'name' => esc_html__('Sidebar', 'winemaker'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'winemaker'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</div></aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3><div class="widget-content">',
    ));
	register_sidebar(array(
        'name' => esc_html__('Footer Widgets 1', 'winemaker'),
        'id' => 'footer-1',
        'description' => esc_html__('Add widgets here.', 'winemaker'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="foot-widget-title">',
        'after_title' => '</h3>',
    ));
	register_sidebar(array(
        'name' => esc_html__('Footer Widgets 2', 'winemaker'),
        'id' => 'footer-2',
        'description' => esc_html__('Add widgets here.', 'winemaker'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="foot-widget-title">',
        'after_title' => '</h3>',
    ));
	register_sidebar(array(
        'name' => esc_html__('Footer Widgets 3', 'winemaker'),
        'id' => 'footer-3',
        'description' => esc_html__('Add widgets here.', 'winemaker'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="foot-widget-title">',
        'after_title' => '</h3><div class="widg">',
    ));
	register_sidebar(array(
        'name' => esc_html__('Footer Widgets 4', 'winemaker'),
        'id' => 'footer-4',
        'description' => esc_html__('Add widgets here.', 'winemaker'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="foot-widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'winemaker_widgets_init');