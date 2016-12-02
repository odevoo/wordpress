<?php
function massalia_setup() {
	
	/* administrer une image d'entête */
	add_theme_support( 'custom-header' );
	/* administrer un logo */
	add_theme_support( 'custom-logo' );
	/* Générer la balise title */
	add_theme_support( 'title-tag' );
	/* administrer les images à la une */
	add_theme_support( 'post-thumbnails');
	/* administrer les menus */
	add_theme_support('menus');
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
}
add_action( 'after_setup_theme', 'massalia_setup' );


// insertion de style.css
	
function massalia_insert_css_in_head(){
    // On ajoute le css general du theme
	wp_enqueue_style( 'theme-de-base-style', get_stylesheet_uri() );
}
add_action('wp_enqueue_scripts', 'massalia_insert_css_in_head', 105);

// insertion fichier .js
function massalia_insert_js_in_footer(){
	wp_enqueue_script( 'menu', get_template_directory_uri().'/js/gestion-menus.js',array('jquery'),1.0,true);
}
add_action('wp_enqueue_scripts', 'massalia_insert_js_in_footer', 1);

// Widgets
function massalia_widgets_init() {
register_sidebar(array(
		'name' => 'Coordonnées',
		'id' => 'coordonnees',
		'before_widget' => false,
		'after_widget' => false
	));


	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'before_widget' => false,
		'after_widget' => false
	));

}
add_action( 'widgets_init', 'massalia_widgets_init' );

function massalia_remove_wordpress_version() {
	return '';
}
add_filter('the_generator', 'massalia_remove_wordpress_version');

/* génération code du logo */
function get_logo(){
	if (is_front_page()) :
		$custom_logo_id = get_theme_mod('custom_logo');
		$image = wp_get_attachment_image( $custom_logo_id ,'full');
	else :
		$image = get_custom_logo();
	endif;
	return $image;
}

/* balise title */

function change_wp_title($title) {
   global $post, $paged;

    if (!is_front_page()):
		$title['site'] = get_bloginfo( 'description', 'display' );
		$title['tagline'] = get_bloginfo( 'name', 'display' );
	endif;

    return $title;
}
add_filter('document_title_parts', 'change_wp_title');

?>