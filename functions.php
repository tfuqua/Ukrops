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


//This method helps keep get_excerpt() to 5 lines
function custom_excerpt_length( $length ) {
	return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_filter( 'body_class', 'custom_body_class' );

function custom_body_class( $classes ) {
    if (!is_main_site()) {
        $classes[] = 'child-site';
    }

		global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
		if($is_lynx) $classes[] = 'lynx';
		elseif($is_gecko) $classes[] = 'gecko';
		elseif($is_opera) $classes[] = 'opera';
		elseif($is_NS4) $classes[] = 'ns4';
		elseif($is_safari) $classes[] = 'safari';
		elseif($is_chrome) $classes[] = 'chrome';
		elseif($is_IE) {
						$classes[] = 'ie';
						if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
						$classes[] = 'ie'.$browser_version[1];
		} else $classes[] = 'unknown';
		if($is_iphone) $classes[] = 'iphone';
		if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
						 $classes[] = 'osx';
			 } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
						 $classes[] = 'linux';
			 } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
						 $classes[] = 'windows';
			 }
		return $classes;
}

/**
 * Enqueue scripts and styles.
 */
function ukrops_scripts() {
  wp_enqueue_style( 'google-font-vollkorn', 'https://fonts.googleapis.com/css?family=Vollkorn', false);
	wp_enqueue_style( 'ukrops-style', get_stylesheet_directory_uri() . '/style.min.css');

	wp_enqueue_script( 'ukrops-jquery', get_template_directory_uri() . '/js/jquery.min.js', null, '1.0', true);
	wp_enqueue_script( 'ukrops-slick', get_template_directory_uri() . '/js/slick.min.js', null, '1.0', true);
	wp_enqueue_script( 'ukrops-js', get_template_directory_uri() . '/js/index.js', null, '1.0', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	    wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'ukrops_scripts' );

function change_wp_search_size($queryVars) {
	if ( isset($_REQUEST['s']) )
		$queryVars['posts_per_page'] = 5;
	return $queryVars;
}
add_filter('request', 'change_wp_search_size');


add_action( 'pre_get_posts', 'my_change_sort_order');
function my_change_sort_order($query){
  if(is_archive()):
   //If you wanted it for the archive of a custom post type use: is_post_type_archive( $post_type )
     //Set the order ASC or DESC
     $query->set( 'order', 'ASC' );
     //Set the orderby
     $query->set( 'orderby', 'menu_order' );
  endif;
};

require_once('menu_walker.php');

function excerpt($num) {
    $limit = $num+1;
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt)."...";
    echo $excerpt;
}

function my_gallery_style() {
    return "
";
}
//add_filter( 'gallery_style', 'my_gallery_style', 99 );
add_filter( 'use_default_gallery_style', '__return_false' );
