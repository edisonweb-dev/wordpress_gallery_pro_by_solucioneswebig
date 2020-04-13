<?php 

//  ==========GESTION MENU CLIENTES==============

// el inicio del plugin vista principal
function admin_menu_de_galeria() {
  if (!current_user_can('manage_options'))  {
    wp_die( __('No tienes suficientes permisos para acceder a esta página.') );
  }elseif(isset($_GET['add'])){
    include "galeria/crear.php";
  }elseif(isset($_GET['edit'])){
    include "galeria/editar.php";
  }elseif(isset($_GET['gallery'])){
    include "galeria/gallery.php";  
  }else{
    include "galeria/listado.php";
  }
}



// if( $_GET["page"] == "menu_galeria" && $_GET["z"] == "crear"){

//   function listado_galeria() {
//     if (!current_user_can('manage_options'))  {
//       wp_die( __('No tienes suficientes permisos para acceder a esta página.') );
//     }else{
//       include "categoria/crear.php";
//     }
  
//   }//fin funcion categoria

// }else if( $_GET["page"] == "menu_galeria" && $_GET["z"] == "editar"){

//   function listado_galeria() {
//     if (!current_user_can('manage_options'))  {
//       wp_die( __('No tienes suficientes permisos para acceder a esta página.') );
//     }else{
//       include "categoria/editar.php";
//     }
  
//   }//fin funcion categoria

// }else if( $_GET["page"] == "menu_galeria" ){

//   function listado_galeria() {
//     if (!current_user_can('manage_options'))  {
//       wp_die( __('No tienes suficientes permisos para acceder a esta página.') );
//     }else{
//       include "categoria/listado.php";
//     }
  
//   }//fin funcion categoria

// }




