<?php

/*
Plugin Name: simple gallery by solucioneswebig 
Plugin URI:  
Description: A simple gallery for wordpress
Version:     001
Author:      Solucioneswebig
Author URI:  https://solucioneswebig.com/
Text Domain: swb_simple_gallery
Domain Path: /languages
License:     GPL2

*/

if ( ! defined( 'ABSPATH' ) ) exit;


global $wpdb;
$prefix_plugin_gn = "swbsw_";


define( 'SWB_SIMPLE_GALLERY_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );


define('TABLE_GALLERY' , $wpdb->prefix . $prefix_plugin_gn . 'gallery');
define('IMG_GALLERY' , $wpdb->prefix . $prefix_plugin_gn . 'img_gallery');



function swb_simple_gallery_styles(){


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

	//LightGallery
	// wp_enqueue_style( 'light', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL. 'assets/css/lightgallery.css', false );
	// wp_enqueue_script( 'swb-scripts-pictures', 'https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js' , array( 'jquery' ), null , true );
	// wp_enqueue_script( 'swb-scripts-lights', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL .'assets/js/lightgallery.min.js' , array( 'jquery' ), null , true );
	// wp_enqueue_script( 'swb-scripts-picturefills', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL .'assets/js/picturefill.min.js' , array( 'jquery' ), null , true );

	wp_enqueue_style( 'light', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL. 'assets/lib/lightGallery/css/lightgallery.css', false );
	wp_enqueue_script( 'swb-scripts-pictures', 'https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js' , array( 'jquery' ), null , true );

	wp_enqueue_script( 'swb-scripts-picturefills', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL .'assets/lib/lightGallery/js/lightgallery-all.min.js' , array( 'jquery' ), null , true );

	wp_enqueue_script( 'swb-scripts-picturefills', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL .'assets/lib/lightGallery/js/jquery.mousewheel.min.js' , array( 'jquery' ), null , true );

	//bootstrap editado
	wp_enqueue_style( 'bootstrap-edit', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL. 'assets/css/galeria-bootstrap.css', false );

	wp_enqueue_style( 'datatable-public-css','//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css', false );
	wp_enqueue_style( 'datatable-public-responsive-css','https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css', false );
	wp_enqueue_style( 'datatable-buttons','https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css', false );

	wp_enqueue_style( 'css-dropzone','https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css', false );
	wp_enqueue_script( 'script-dropzone','https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js' , array( 'jquery' ), '1.0.0' , true );

	wp_enqueue_script( 'sweet-alert','https://cdn.jsdelivr.net/npm/sweetalert2@8', array('jquery'), null, true );

	wp_enqueue_script( 'datatable-public-js','//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js', array('jquery'), '1.10.19', true );
	wp_enqueue_script( 'datatable-public-responsive-js','https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'datatable-buttons','https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'datatable-buttons-flash','https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'datatable-jszip','https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'datatable-pdfmake','https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'datatable-html5-buttons','https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'datatable-print-buttons','https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js', array('jquery'), null, true );
	
	//-----------SCRIPT EDITADOS------------
	wp_enqueue_script( 'swb-scripts-general', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/js/scripts.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/js/script2.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-light', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/js/lightbox-plus-jquery.min.js' , array( 'jquery' ), null , true );

	
	
	//-----------FUCNONES AJAX------------
	wp_localize_script('swb-scripts-general','busqueda_vars',['ajaxurl'=>admin_url('admin-ajax.php')]);
	wp_localize_script('swb-scripts-galeria','busqueda_vars',['ajaxurl'=>admin_url('admin-ajax.php')]);

}
//add_action('wp_enqueue_scripts', 'swb_simple_gallery_styles');
add_action('admin_head', 'swb_simple_gallery_styles');



function gallery_1(){

	wp_enqueue_style( 'swb-style-general', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/css/style.css?a', false );
	wp_enqueue_style( 'swb-style-galeriab', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/dist/css/bootstrap-custom.css', false );
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



	wp_enqueue_style( 'datatable-public-css','//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css', false );
	wp_enqueue_style( 'datatable-public-responsive-css','https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css', false );
	wp_enqueue_style( 'datatable-buttons','https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css', false );


	
	//-----------SCRIPT EDITADOS------------
	wp_enqueue_script( 'swb-scripts-general', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/js/scripts.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/js/script2.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-light', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/js/lightbox-plus-jquery.min.js' , array( 'jquery' ), null , true );

}

add_action("ejecutar_galeria_1","gallery_1");


function gallery_2(){

	wp_enqueue_style( 'swb-style-general-galeria-2', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_2/css/style.css', false );
	wp_enqueue_style( 'swb-style-boxicons-galeria-2', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_2/vendor/boxicons/css/boxicons.min.css', false );
	wp_enqueue_style( 'swb-style-icofont-galeria-2', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_2/vendor/icofont/icofont.min.css', false );
	wp_enqueue_style( 'swb-style-bootstrap-galeria-2', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/dist/css/bootstrap-custom.css', false );
    wp_enqueue_style( 'swb-style-owl-carousel-galeria-2', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_2/vendor/owl.carousel/assets/owl.carousel.min.css', false );
    wp_enqueue_style( 'swb-style-aos-galeria-2', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_2/vendor/aos/aos.css', false );
    wp_enqueue_style( 'swb-style-venobox-galeria-2', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_2/vendor/venobox/venobox.css', false );


	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'swb-scripts-galeria-2-general', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/js/scripts.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria-2-bootstrap', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/dist/js/bootstrap.min.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria-2-jquery-sticky', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_2/vendor/jquery-sticky/jquery.sticky.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria-2-venobox', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_2/vendor/venobox/venobox.min.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria-2-counterup', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_2/vendor/counterup/counterup.min.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria-2-owl-carousel', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_2/vendor/owl.carousel/owl.carousel.min.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria-2-aos', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_2/vendor/aos/aos.js' , array( 'jquery' ), null , true );
    wp_enqueue_script( 'swb-scripts-galeria-2-main', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_2/js/main.js' , array( 'jquery' ), null , true );
	

}

add_action("ejecutar_galeria_2","gallery_2");



function gallery_3(){

	wp_enqueue_style( 'swb-style-general-galeria-3', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_3/css/style.css', false );
	wp_enqueue_style( 'swb-style-boxicons-galeria-3', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_3/vendor/boxicons/css/boxicons.min.css', false );
	wp_enqueue_style( 'swb-style-icofont-galeria-3', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_3/vendor/icofont/icofont.min.css', false );
	wp_enqueue_style( 'swb-style-bootstrap-galeria-3', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/dist/css/bootstrap-custom.css', false );
    wp_enqueue_style( 'swb-style-owl-carousel-galeria-3', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_3/vendor/owl.carousel/assets/owl.carousel.min.css', false );
    wp_enqueue_style( 'swb-style-aos-galeria-3', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_3/vendor/aos/aos.css', false );
    wp_enqueue_style( 'swb-style-venobox-galeria-3', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_3/vendor/venobox/venobox.css', false );


	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'swb-scripts-galeria-3-general', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/js/scripts.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria-3-jquery-sticky', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_3/vendor/jquery-sticky/jquery.sticky.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria-3-venobox', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_3/vendor/venobox/venobox.min.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria-3-isotope', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_3/vendor/isotope-layout/isotope.pkgd.min.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria-3-counterup', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_3/vendor/counterup/counterup.min.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria-3-owl-carousel', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_3/vendor/owl.carousel/owl.carousel.min.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria-3-aos', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_3/vendor/aos/aos.js' , array( 'jquery' ), null , true );
    wp_enqueue_script( 'swb-scripts-galeria-3-main', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_3/js/main.js' , array( 'jquery' ), null , true );
	

}

add_action("ejecutar_galeria_3","gallery_3");



function gallery_4(){

	wp_enqueue_style( 'swb-style-general-icomoon-galeria-4', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_4/fonts/icomoon/style.css', false );
	wp_enqueue_style( 'swb-style-owl-carousel-galeria-4', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_4/css/owl.carousel.min.css', false ); 
	wp_enqueue_style( 'swb-style-bootstrap-galeria-4', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/dist/css/bootstrap-custom.css', false );
    wp_enqueue_style( 'swb-style-aos-galeria-4', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_4/css/aos.css', false );
    wp_enqueue_style( 'swb-style-fancybox-galeria-4', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_4/css/fancybox.min.css', false );
    wp_enqueue_style( 'swb-style-general-galeria-4', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_4/css/style.css', false );
     wp_enqueue_style( 'swb-style-custom-general-galeria-4', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_4/css/custom.css', false );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'swb-scripts-galeria-4-general', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_4/js/jquery-3.3.1.min.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria-4-bootstrap', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_4/js/bootstrap.min.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria-4-aos', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_4/js/aos.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria-4-owl-carousel', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_4/js/owl.carousel.min.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria-4-fancybox', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_4/js/jquery.fancybox.min.js' , array( 'jquery' ), null , true );
    wp_enqueue_script( 'swb-scripts-galeria-4-main', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_4/js/main.js' , array( 'jquery' ), null , true );
	

}

add_action("ejecutar_galeria_4","gallery_4");


function gallery_5(){

	wp_enqueue_style( 'swb-style-general-galeria-5', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_5/css/style.css', false );
	wp_enqueue_style( 'swb-style-boxicons-galeria-5', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_5/vendor/boxicons/css/boxicons.min.css', false );
	wp_enqueue_style( 'swb-style-icofont-galeria-5', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_5/vendor/icofont/icofont.min.css', false );
	wp_enqueue_style( 'swb-style-bootstrap-galeria-5', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/dist/css/bootstrap-custom.css', false );
    wp_enqueue_style( 'swb-style-owl-carousel-galeria-5', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_5/vendor/owl.carousel/assets/owl.carousel.min.css', false );
    wp_enqueue_style( 'swb-style-aos-galeria-5', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_5/vendor/aos/aos.css', false );
    wp_enqueue_style( 'swb-style-venobox-galeria-5', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_5/vendor/venobox/venobox.css', false );


	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'swb-scripts-galeria-5-general', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/js/scripts.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria-5-jquery-sticky', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_5/vendor/jquery-sticky/jquery.sticky.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria-5-venobox', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_5/vendor/venobox/venobox.min.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria-5-isotope', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_5/vendor/isotope-layout/isotope.pkgd.min.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria-5-counterup', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_5/vendor/counterup/counterup.min.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria-5-owl-carousel', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_5/vendor/owl.carousel/owl.carousel.min.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria-5-aos', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_5/vendor/aos/aos.js' , array( 'jquery' ), null , true );
    wp_enqueue_script( 'swb-scripts-galeria-5-main', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/gallery_5/js/main.js' , array( 'jquery' ), null , true );
	

}

add_action("ejecutar_galeria_5","gallery_5");


include SWB_SIMPLE_GALLERY_PLUGIN_DIR_PATH. "dashboard/index.php";
include SWB_SIMPLE_GALLERY_PLUGIN_DIR_PATH. "controllers/index.php";
include SWB_SIMPLE_GALLERY_PLUGIN_DIR_PATH. "models/index.php";
include SWB_SIMPLE_GALLERY_PLUGIN_DIR_PATH. "views/index.php";


/* CREAR lOS MENUS */
function admin_menu_galeria() {

	add_menu_page ( __('Simple Gallery','swb_simple_gallery'), __('Simple Gallery','swb_simple_gallery'), 'manage_options', 'simple-gallery-by-solucioneswebig', 'admin_menu_de_galeria', 'dashicons-camera', 9 );
 
	// add_submenu_page ( 'admin_menu_plugin', 'Galeria', 'Galeria', 'manage_options', 'menu_galeria', 'listado_galeria' );
 
}
add_action('admin_menu', 'admin_menu_galeria');



//Devolver datos a archivo js
add_action('wp_ajax_nopriv_ajax_busqueda','busqueda_ajax_gallery');
add_action('wp_ajax_ajax_busqueda','busqueda_ajax_gallery');


add_action('wp_ajax_nopriv_ajax_galeria','busqueda_galeria');
add_action('wp_ajax_ajax_galeria','busqueda_galeria');


function busqueda_ajax_gallery(){
  include "ajax/busqueda.ajax.php";
}

function busqueda_galeria(){
	
	include "ajax/galery.ajax.php";
}



add_action( 'wp_ajax_nopriv_submit_dropzonejs', 'dropzonejs_upload' ); //allow on front-end
add_action( 'wp_ajax_submit_dropzonejs', 'dropzonejs_upload' );

function dropzonejs_upload() {
	include "ajax/subirDocumentos.ajax.php";
}
