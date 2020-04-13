<?php 

global $wpdb;

include_once(ABSPATH . 'wp-includes/pluggable.php');
require_once( ABSPATH . 'wp-admin/includes/image.php' );
require_once( ABSPATH . 'wp-admin/includes/file.php' );
require_once( ABSPATH . 'wp-admin/includes/media.php' );



if(!empty($_FILES)){

  foreach ($_FILES as $file => $array) {
    $attachment_id = media_handle_upload($file, 0);
    // echo $attachment_id;
    
  }

  $name = $_FILES["file"]["name"];
   
  $attachment_url = wp_get_attachment_url( $attachment_id );

  $data = [
    'id_gallery'  => $_POST['id_gallery'],
    'name_img'    => $name,
    'id_img'      => $attachment_id,
    'url_img'     => $attachment_url,
    'descrip_img' => $attachment_url,
    'date_upload' => date("Y-m-d")
  ];

  $wpdb->insert(IMG_GALLERY, $data );

}





  


  



