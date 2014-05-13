<?php
/**
 * tyler functions and definitions
 *
 * @package tyler
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'tyler_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function theme_css() {
    wp_register_style( 'superslides', get_template_directory_uri() . '/css/superslides.css', array(), '20120208', 'all' );
    wp_enqueue_style( 'superslides' );
}

add_action( 'wp_enqueue_scripts', 'theme_css' );

function theme_js() {
    wp_register_script( 'main', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '', true );
    wp_register_script( 'superslides', get_template_directory_uri() . '/js/superslides.js', array('jquery'), '', true );
    wp_register_script( 'mixitup', get_template_directory_uri() . '/js/mixitup.js', array('jquery'), '', true );
    wp_enqueue_script( 'main' );
    wp_enqueue_script( 'superslides' );
    wp_enqueue_script( 'mixitup' );
}

add_action( 'wp_enqueue_scripts', 'theme_js');

function tyler_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on tyler, use a find and replace
	 * to change 'tyler' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'tyler', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'tyler' ),
	) );

    // Enable custom menus
    add_theme_support( 'menus' );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tyler_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // tyler_setup
add_action( 'after_setup_theme', 'tyler_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function tyler_widgets( $name, $id, $description ) {
	$args = array(
		'name'          => __( $name ),
		'id'            => $id,
        'description'   => $description,
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	);

    register_sidebar( $args );

}

tyler_widgets( 'Home Slider', 'home_slider', "Home page fullscreen slider of random work" );


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
