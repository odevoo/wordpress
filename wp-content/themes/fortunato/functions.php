<?php
/**
 * fortunato functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fortunato
 */

if ( ! function_exists( 'fortunato_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fortunato_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on fortunato, use a find and replace
	 * to change 'fortunato' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'fortunato', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'fortunato-the-post' , 1920, 99999);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'fortunato' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'video', 'audio', 'gallery'
	) );

}
endif; // fortunato_setup
add_action( 'after_setup_theme', 'fortunato_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fortunato_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fortunato_content_width', 930 );
}
add_action( 'after_setup_theme', 'fortunato_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function fortunato_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'fortunato' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'fortunato_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fortunato_scripts() {
	wp_enqueue_style( 'fortunato-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.min.css');
	$query_args = array(
		'family' => 'Roboto+Condensed:300,400,700'
	);
	wp_register_style( 'fortunato-googlefonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
	wp_enqueue_style( 'fortunato-googlefonts' );

	wp_enqueue_script( 'fortunato-custom', get_template_directory_uri() . '/js/jquery.fortunato.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'fortunato-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'fortunato-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_enqueue_script( 'fortunato-html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js', array(), '3.7.3', false );
	wp_script_add_data( 'fortunato-html5shiv', 'conditional', 'lt IE 9' );
	
	/* Dequeue default WooCommerce Layout */
	wp_dequeue_style ( 'woocommerce-layout' );
	wp_dequeue_style ( 'woocommerce-smallscreen' );
	wp_dequeue_style ( 'woocommerce-general' );
}
add_action( 'wp_enqueue_scripts', 'fortunato_scripts' );

/**
 * WooCommerce Support
 */
if ( ! function_exists( 'fortunato_woocommerce_support' ) ) :
	function fortunato_woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}
	add_action( 'after_setup_theme', 'fortunato_woocommerce_support' );
endif; // fortunato_woocommerce_support

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Load Fortunato Dynamic.
 */
require get_template_directory() . '/inc/fortunato-dynamic.php';

/* Calling in the admin area for the Welcome Page */
if ( is_admin() ) {
	require get_template_directory() . '/inc/admin/fortunato-admin-page.php';
}