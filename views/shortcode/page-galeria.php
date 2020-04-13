<?php



function validar_direct($id){
global $wpdb;
$galeria = $wpdb->get_results("
    SELECT *
    FROM " . TABLE_GALLERY . " as gallery
    LEFT JOIN " . IMG_GALLERY . " as img ON img.id_gallery = gallery.id_gallery
    WHERE gallery.id_gallery = ".$id."
");

if ($galeria[0]->type_gallery == 1) {
add_action('wp_enqueue_scripts', 'gallery_1'); 
}
echo "<h1>AQUIIIIIIIIII ".$id."</h1>";

}



function page_galeria_imagen( $atts ){
    $atts = shortcode_atts( array(
            'id' => 0
    ), $atts);

    extract($atts);
    validar_direct($id);

    ob_start();
    


    // var_dump($atts);
    
    include "galeria/html-galeria.php";
	return ob_get_clean();	

}
add_shortcode( 'galeria' , 'page_galeria_imagen' );


