<?php

global $wpdb;

$galeria = $wpdb->get_results("
    SELECT *
    FROM " . TABLE_GALLERY . " as gallery
    LEFT JOIN " . IMG_GALLERY . " as img ON img.id_gallery = gallery.id_gallery
    WHERE gallery.id_gallery = 2
");

if ($galeria[0]->type_gallery == 1) {
add_action('wp_enqueue_scripts', 'gallery_1'); 
}

function page_galeria_imagen( $atts ){

    

	ob_start();
    $atts = shortcode_atts( array(
            'id' => 0
    ), $atts);

    extract($atts);

    // var_dump($atts);
    
    include "galeria/html-galeria.php";
	return ob_get_clean();	

}
add_shortcode( 'galeria' , 'page_galeria_imagen' );


