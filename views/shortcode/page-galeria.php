<?php


function page_galeria_imagen( $atts ){
    $atts = shortcode_atts( array(
            'id' => 0
    ), $atts);

    extract($atts);
    

    ob_start();
    


    // var_dump($atts);
    
    include "galeria/html-galeria.php";
	return ob_get_clean();	

}
add_shortcode( 'galeria' , 'page_galeria_imagen' );

