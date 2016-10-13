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
	add_theme_support( 'advanced-image-compression' );

	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'ukrops' ),
		'footer' => esc_html__( 'Footer Menu', 'ukrops' ),
		'extra-nav' => esc_html__( 'Extra Nav Menu', 'ukrops' ),
	));

	$headerArgs= array(
		'default-image' 	=> get_template_directory_uri() . '/images/logo.png',
		'uploads'       	=> true,
		'random-default'	=> false,
		'header-text'    	=> false,
	);
	add_theme_support( 'custom-header', $headerArgs );

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

function create_product_taxonomy() {
	$labels = array(
		'name'                           => 'Products',
		'singular_name'                  => 'Product',
		'search_items'                   => 'Search Products',
		'all_items'                      => 'All Products',
		'edit_item'                      => 'Edit Product',
		'update_item'                    => 'Update Product',
		'add_new_item'                   => 'Add New Product',
		'new_item_name'                  => 'New Product Name',
		'menu_name'                      => 'Product',
		'view_item'                      => 'View Product',
		'popular_items'                  => 'Popular Product',
		'separate_items_with_commas'     => 'Separate products with commas',
		'add_or_remove_items'            => 'Add or remove products',
		'choose_from_most_used'          => 'Choose from the most used products',
		'not_found'                      => 'No products found'
	);

	register_taxonomy(
		'product',
		'post',
		array(
			'label' => __( 'Product' ),
			'hierarchical' => false,
			'labels' => $labels
		)
	);
}

add_action( 'init', 'create_product_taxonomy' );


/**
 * Enqueue scripts and styles.
 */
function ukrops_scripts() {
	wp_enqueue_style( 'ukrops-style', get_stylesheet_directory_uri() . '/style.min.css');

	wp_enqueue_script( 'ukrops-jquery', get_template_directory_uri() . '/js/jquery.min.js');
	wp_enqueue_script( 'ukrops-js', get_template_directory_uri() . '/js/index.js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	    wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'ukrops_scripts' );

require_once('my_walker.php');