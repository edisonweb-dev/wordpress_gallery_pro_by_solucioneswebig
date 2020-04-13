<?php


if ( ! defined( 'ABSPATH' ) ) exit; 



if(isset($_POST['save_new_gallery'])){

	$data = [
		'name_gallery'        => $_POST['name_gallery'],
		'title_gallery' 	  	=> $_POST['title_gallery'],
		'description_gallery' => $_POST['description_gallery'],
		'type_gallery'        => $_POST['type_gallery'],
		'ocultar_gallery'     => $_POST['ocultar_gallery'],
		'date_creation'       => date("Y-m-d")
	];

	$guardar = $wpdb->insert(TABLE_GALLERY, $data);
}