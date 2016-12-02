<?php
/**
** activation theme
**/
/* fichier functions.php de l'enfant chargé en premier */
/* puis fichier functions.php du parent chargé en second et qui charge le fichier css de l'enfant */

function theme_enqueue_styles() {
	// chargement du fichier css du parent
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

?>

