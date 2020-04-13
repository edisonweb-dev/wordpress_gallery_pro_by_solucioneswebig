<?php

function gallery_1(){

	wp_enqueue_style( 'swb-style-general', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/css/style.css?a', false );
	wp_enqueue_style( 'swb-style-galeriab', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/css/galeria-bootstrap.css', false );
	wp_enqueue_style( 'swb-style-galeriaMd', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/css/galeria-mdb.css', false );
	wp_enqueue_style( 'swb-style-light', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/css/lightbox.min.css', false );

	wp_enqueue_script( 'jquery' );

	//Masonry
	wp_enqueue_style( 'swb-style-default',SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL. 'assets/css/default.css', false );
	wp_enqueue_style( 'swb-style-component',SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL. 'assets/css/component.css', false );

	wp_enqueue_script( 'swb-moderniz', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL .'assets/js/modernizr.custom.js' , array(), null , true );
	wp_enqueue_script( 'swb-masonry', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL .'assets/js/masonry.pkgd.min.js' , array(), null , true );
	wp_enqueue_script( 'swb-imageloaded', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL .'assets/js/imagesloaded.js' , array(), null , true );
	wp_enqueue_script( 'swb-classie', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL .'assets/js/classie.js' , array(), null , true );
	wp_enqueue_script( 'swb-animationScroll', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL .'assets/js/AnimOnScroll.js' , array(), null , true );

	//Fancy box
	wp_enqueue_style( 'fancy-boxs','https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css', false );
	wp_enqueue_script( 'swb-scripts-fancyss', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js' , array( 'jquery' ), null , true );



	wp_enqueue_style( 'light', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL. 'assets/lib/lightGallery/css/lightgallery.css', false );
	wp_enqueue_script( 'swb-scripts-pictures', 'https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js' , array( 'jquery' ), null , true );

	wp_enqueue_script( 'swb-scripts-picturefills', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL .'assets/lib/lightGallery/js/lightgallery-all.min.js' , array( 'jquery' ), null , true );

	wp_enqueue_script( 'swb-scripts-picturefills', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL .'assets/lib/lightGallery/js/jquery.mousewheel.min.js' , array( 'jquery' ), null , true );

	//bootstrap editado
	wp_enqueue_style( 'bootstrap-edit', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL. 'assets/css/galeria-bootstrap.css', false );

	wp_enqueue_style( 'datatable-public-css','//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css', false );
	wp_enqueue_style( 'datatable-public-responsive-css','https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css', false );
	wp_enqueue_style( 'datatable-buttons','https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css', false );


	
	//-----------SCRIPT EDITADOS------------
	wp_enqueue_script( 'swb-scripts-general', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/js/scripts.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/js/script2.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-light', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/js/lightbox-plus-jquery.min.js' , array( 'jquery' ), null , true );

}

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


