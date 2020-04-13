<?php



add_action('wp_enqueue_scripts', 'gallery_1'); 


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


