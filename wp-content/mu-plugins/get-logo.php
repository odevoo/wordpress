<?php 
/* 
MU plugin: get-logo
Description: &lsaquo; Créé &rsaquo; un lien sur le logo quand on n'est pas sur la font-page
Version: 02 12 2016
 */
function get_logo(){
    if (is_front_page()) :
        $custom_logo_id = get_theme_mod('custom_logo');
        $image = wp_get_attachment_image( $custom_logo_id ,'full');
    else : 
        $image = get_custom_logo();

    endif;
    return $image;
}

 ?>