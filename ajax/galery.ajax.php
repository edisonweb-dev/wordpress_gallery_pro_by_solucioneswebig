<?php


function busqueda(){

  global $wpdb;  
  
  $results_gallery = $wpdb->get_results("
          SELECT galeria.*, COUNT(img.id_gallery) as cantidad  
          FROM ".TABLE_GALLERY." galeria
          LEFT JOIN ".IMG_GALLERY." as img ON img.id_gallery = galeria.id_gallery
          GROUP BY galeria.id_gallery
      ");
  
  $datos = [];
  $dato1 = "";
  $dato2 = "";
  $dato3 = "";
  $dato4 = "";

  $i= 0;
  foreach ($results_gallery as $key => $value) {
    $dato1 = '
      <strong><a class="row-title" href="admin.php?page=simple-gallery-by-solucioneswebig&edit='.$value->id_gallery.'">'.$value->name_gallery.'</a></strong>
    ';

    $dato2 = '
      [galeria id="'.$value->id_gallery.'"]
    ';

    $dato3 = $value->cantidad;

    $dato4 = '<p>
        <a href="admin.php?page=simple-gallery-by-solucioneswebig&gallery='.$value->id_gallery.'" class="galeriabtn galeriabtn-primary galeriabtn-sm"><i class="fa fa-edit"></i> '. __('Gallery','swb_simple_gallery').'</a> 
        <button type="button" class="galeriabtn galeriabtn-danger galeriabtn-sm eliminar-galeria" data-id="'.$value->id_gallery.'"><i class="fa fa-trash"></i> '. __('Delete','swb_simple_gallery').'</button>
      </p>
    ';

    
    $datos[$i] = array($dato1,$dato2,$dato3,$dato4);

    $i++;
    
  }


  return $datos;

}



// function pruebas(){
//   $data = array(array("prueba1","prueba2","prueba3","prueba4"));
//   return $data;  
// }


// $data =  pruebas();
$data =  busqueda();

echo json_encode($data); 










