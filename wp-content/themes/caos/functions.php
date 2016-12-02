<?php
/**
 * Caos functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Caos
 */

if ( ! function_exists( 'caos_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function caos_setup() {

	/*
	 * Defines Constant
	 */
	$caos_theme_data = wp_get_theme();
	define( 'QL_STORE_URL', 'https://www.quemalabs.com' );
	define( 'QL_THEME_NAME', $caos_theme_data['Name'] );
	define( 'QL_THEME_VERSION', $caos_theme_data['Version'] );
	define( 'QL_THEME_SLUG', sanitize_title( $caos_theme_data['Name'] ) );
	define( 'QL_THEME_AUTHOR', $caos_theme_data['Author'] );

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Caos, use a find and replace
	 * to change 'caos' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'caos', get_template_directory() . '/languages' );

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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	
	if ( function_exists( 'add_image_size' ) ) {
		//Blog
		add_image_size( 'caos_post', 953, 536, true );

	}

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'caos' ),
		'social' => esc_html__( 'Social Menu', 'caos' ),
	) );

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
	) );


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'caos_custom_background_args', array(
		'default-color' => '2a2a2a',
		'default-image' => '',
	) ) );

	// Styles for TinyMCE
	$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Lato:300,400,700' );
    add_editor_style( array( 'css/editor-style.css', 'css/bootstrap.css', $font_url )  );
	
}
endif; // caos_setup
add_action( 'after_setup_theme', 'caos_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function caos_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'caos_content_width', 953 );
}
add_action( 'after_setup_theme', 'caos_content_width', 0 );



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function caos_widgets_init() {

	require get_template_directory() . '/inc/widget-areas/widget-areas.php';

}
add_action( 'widgets_init', 'caos_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function caos_scripts() {

	/**
	 * Enqueue Stylesheets
	 */
	require get_template_directory() . '/inc/scripts/stylesheets.php';

	/**
	 * Enqueue Scripts
	 */
	require get_template_directory() . '/inc/scripts/scripts.php';

}
add_action( 'wp_enqueue_scripts', 'caos_scripts' );



/**
 * Custom CSS generated by the Theme.
 */
require get_template_directory() . '/inc/scripts/styles.php';



/**
 * Admin Styles
 *
 * Enqueue styles to the Admin Panel.
 */
function caos_wp_admin_style() {
        wp_register_style( 'caos_custom_wp_admin_css', get_template_directory_uri() . '/css/admin-styles.css', false, '1.0.0' );
        wp_enqueue_style( 'caos_custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'caos_wp_admin_style' );




/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';



/**
 * Extras
 *
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';



/**
 * Customizer
 *
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';



/**
 * Jetpack
 *
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



/**
 * Theme Functions
 *
 * Add Theme Functions
 */

	// Bootstrap Walker
	require get_template_directory() . '/inc/theme-functions/wp_bootstrap_navwalker.php';

	// Custom Header
	require get_template_directory() . '/inc/theme-functions/custom-header.php';

	// TGM Plugin Activation
	require get_template_directory() . '/inc/theme-functions/ql_tgm_plugin_activation.php';

	// Endpoints for Rest Api
	require get_template_directory() . '/inc/rest-api/endpoints.php';

	// Theme Info Page
	require get_template_directory() . '/inc/theme-functions/theme-info-page.php';