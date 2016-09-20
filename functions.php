<?php
/**
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package ukrops
 */

if (! function_exists( 'ukrops_setup' ) ) :

function ukrops_setup() {

	load_theme_textdomain( 'ukrops', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'ukrops' ),
		'footer' => esc_html__( 'Footer Menu', 'ukrops' ),
	) );

	$headerArgs= array(
		'default-image' 	=> get_template_directory_uri() . '/images/logo.png',
		'uploads'       	=> true,
		'random-default'	=> false,
		'header-text'    	=> false,
	);
	add_theme_support( 'custom-header', $headerArgs );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));
}
endif;
add_action( 'after_setup_theme', 'ukrops_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ukrops_sidebar_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ukrops' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ukrops' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget', 'ukrops' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Footer Widget Content', 'ukrops' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Copyright Widget', 'ukrops' ),
		'id'            => 'copyright',
		'description'   => esc_html__( 'Copyright Widget Content', 'ukrops' ),
		'before_widget' => '<div class="copyright">',
		'after_widget'  => '</div>',
	));

}
add_action( 'widgets_init', 'ukrops_sidebar_init' );

/**
 * Enqueue scripts and styles.
 */
function ukrops_scripts() {
	 wp_enqueue_style( 'ukrops-style', get_stylesheet_uri() );
	//wp_enqueue_script( 'ukrops-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	    wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'ukrops_scripts' );
