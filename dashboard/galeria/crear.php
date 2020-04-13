<?php

if ( ! defined( 'ABSPATH' ) ) exit; 

global $wpdb;



$results_gallery = $wpdb->get_row("SELECT MAX(id_gallery) AS maxnumber FROM " . TABLE_GALLERY . "");

// var_dump();


?>


<div class="wrap"> 



<div class="wrap"> 
<h1 class="wp-heading-inline"><?php echo __('New gallery','swb_simple_gallery'); ?></h1>

<a href="admin.php?page=simple-gallery-by-solucioneswebig" class="page-title-action"><?php echo __('Return','swb_simple_gallery'); ?></a>

<hr class="wp-header-end">

<br>  <br>  <br>

<div id="col-container" class="wp-clearfix">

<div id="col-left">
<div class="col-wrap">
<div class="form-wrap">


<form action="admin.php?page=simple-gallery-by-solucioneswebig" method="post" class="swb_form">
  <div class="shortcode">
  <p><strong><?php echo __('Copy','swb_simple_gallery'); ?> shortcode</strong></p>
   [galeria id="<?php echo $results_gallery->maxnumber; ?>"]
  </div>

  <h2><?php echo __('Add new gallery','swb_simple_gallery'); ?></h2>
  <div class="form-group-swbsg">
    <label for="name_gallery"><?php echo __('Name gallery','swb_simple_gallery'); ?></label>
    <input type="text" name="name_gallery">
  </div>
  <div class="form-group-swbsg">
    <label for="title_gallery"><?php echo __('Title gallery','swb_simple_gallery'); ?></label>
    <input type="text" name="title_gallery">
  </div>
  <div class="form-group-swbsg">
  <label for="type_gallery"><?php echo __('Type design','swb_simple_gallery'); ?></label>
  <select name="type_gallery" id="">
  <option value="1"><?php echo __('Design Masonry','swb_simple_gallery'); ?></option>
    <option value="2"><?php echo __('Design Fancybox','swb_simple_gallery'); ?></option>
    <option value="3"><?php echo __('Design Lightbox','swb_simple_gallery'); ?></option>
  </select>    
  </div>
  <div class="form-group-swbsg">
  <label for="description_gallery"><?php echo __('Descripcion gallery','swb_simple_gallery'); ?></label>  
  <textarea name="description_gallery" id=""></textarea>    
  </div>
  <div class="form-group-swbsg">
  <button type="submit" name="save_new_gallery"><?php echo __('Save','swb_simple_gallery'); ?></button>    
  </div>
</form>


</div>
</div>
</div>

<div id="col-right">
<div class="col-wrap">
<div class="form-wrap">

<!-- EL dropzone en esta zona -->

<p>Al eliminar una categoría no se eliminan las entradas de esa categoría. En su lugar, las entradas que solo se asignaron a la categoría borrada, se asignan a la categoría por defecto Sin categoría. La categoría por defecto no se puede borrar.</p>
<p>Al eliminar una categoría no se eliminan las entradas de esa categoría. En su lugar, las entradas que solo se asignaron a la categoría borrada, se asignan a la categoría por defecto Sin categoría. La categoría por defecto no se puede borrar.</p>
<p>Al eliminar una categoría no se eliminan las entradas de esa categoría. En su lugar, las entradas que solo se asignaron a la categoría borrada, se asignan a la categoría por defecto Sin categoría. La categoría por defecto no se puede borrar.</p>
<p>Al eliminar una categoría no se eliminan las entradas de esa categoría. En su lugar, las entradas que solo se asignaron a la categoría borrada, se asignan a la categoría por defecto Sin categoría. La categoría por defecto no se puede borrar.</p>
</div>
</div>
</div>


</div>

</div>