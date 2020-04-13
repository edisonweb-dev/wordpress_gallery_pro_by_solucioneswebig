<?php 

global $wpdb;

if(isset($_POST["buscar_lista_imagen"])){

	$listado_imagenes = $wpdb->get_results("
		SELECT * 
		FROM ".IMG_GALLERY." as gallery
		WHERE gallery.id_gallery = ".$_POST["id_imagen"]."
	");						

	echo json_encode($listado_imagenes);
	
}else if(isset($_POST["eliminar_imagen_gallery"])){


	include_once(ABSPATH . 'wp-includes/post.php');

  $borrar = wp_delete_attachment($_POST['id_img'], true); 

	$wpdb->delete( IMG_GALLERY, array( 'id_img_gallery' => $_POST['id']) );
		
}else if(isset($_POST["guardar_imagen"])){


	$data = [
		'name_gallery'      => $_POST['name_gallery'],
		'title_gallery' 	  => $_POST['title_gallery'],
		'description_gallery' => $_POST['description_gallery'],
		'type_gallery'      => $_POST['type_gallery'],
		'ocultar_gallery'      => $_POST['ocultar_gallery'],
		'date_creation'     => date("Y-m-d")
	];

	$guardar = $wpdb->insert(TABLE_GALLERY, $data);
	
		
}else if(isset($_POST["eliminar_gallery"])){

	include_once(ABSPATH . 'wp-includes/post.php');

	$listado_imagenes = $wpdb->get_results("
		SELECT * 
		FROM ".IMG_GALLERY." as gallery
		WHERE gallery.id_gallery = ".$_POST["id"]."
	");

	if(!empty($listado_imagenes)){
		foreach($listado_imagenes as $val){
			$borrar = wp_delete_attachment($val->id_img, true); 
			$wpdb->delete( IMG_GALLERY, array( 'id_img_gallery' => $val->id_img_gallery) );
		}
	}
	
	$wpdb->delete( TABLE_GALLERY, array( 'id_gallery' => $_POST['id']) );

	
}else if(isset($_POST["editar_imagen"])){


	$data = [
		'name_gallery'      => $_POST['name_gallery'],
		'title_gallery' 	  => $_POST['title_gallery'],
		'description_gallery' => $_POST['description_gallery'],
		'type_gallery'      => $_POST['type_gallery'],
		'ocultar_gallery'   => $_POST['ocultar_gallery'],
		'date_creation'     => date("Y-m-d")
	];

	$guardar = $wpdb->update(TABLE_GALLERY, $data , array( 'id_gallery' => $_POST["id"] )  );

}else if(isset($_POST["guardar_titulo_imagen_gallery"])){

	$data = [
		"title" => $_POST["titulo"]
	];

	$guardar = $wpdb->update(IMG_GALLERY, $data , array( 'id_img_gallery' => $_POST["id"] )  );

}else if(isset($_POST["guardar_descripcion_imagen_gallery"])){

	$data = [
		"description" => $_POST["descripcion"]
	];

	$guardar = $wpdb->update(IMG_GALLERY, $data , array( 'id_img_gallery' => $_POST["id"] )  );

}
