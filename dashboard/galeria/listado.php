<?php

if ( ! defined( 'ABSPATH' ) ) exit; 
global $wpdb;
$results_gallery = $wpdb->get_row("SELECT MAX(id_gallery) AS maxnumber FROM " . TABLE_GALLERY . "");
?>


<section class="galeriapr-4">
<div class="galeriacontainer-fluid galeriamt-5 galeriashadow-lg galeriapt-5 galeriapb-5  galeriapl-3 galeriapr-3"> 


<div class="galeriarow">
  <div class="galeriacol-md-12">
  <h3 class="wp-heading-inline"><span class="dashicons dashicons-camera" style="font-size: 40px;margin-right: 20px;"></span> <?php echo __('Simple Gallery','swb_simple_gallery'); ?></h3>
  </div>
</div>

<hr>

<div class="galeriarow"> 
<div class="galeriacol-md-3" style="background: #dedede;padding-top: 20px;padding-bottom: 20px;">
 <form action="admin.php?page=simple-gallery-by-solucioneswebig" method="post" class="swb_form" id="form-guardar">
  <!--
  <div class="shortcode">
  <p><strong><?php echo __('Copy','swb_simple_gallery'); ?> shortcode</strong></p>
   [galeria id="<?php echo $results_gallery->maxnumber+1; ?>"]
  </div>
  -->
  <h5><span class="dashicons dashicons-plus-alt"></span> <?php echo __('Add new gallery','swb_simple_gallery'); ?></h5>
  <hr>
  <div class="galeriaform-group">
    <label for="name_gallery"><?php echo __('Name gallery','swb_simple_gallery'); ?></label>
    <input type="text" name="name_gallery" id="name_gallery" class="galeriamb-0 galeriaform-control" >
  </div>
  <div class="galeriaform-group">
    <label for="title_gallery"><?php echo __('Title gallery','swb_simple_gallery'); ?></label>
    <input type="text" name="title_gallery" id="title_gallery" class="galeriamb-0 galeriaform-control">
  </div>
  <div class="galeriaform-group">
  <label for="description_gallery"><?php echo __('Descripcion gallery','swb_simple_gallery'); ?></label>  
  <textarea name="description_gallery" id="description_gallery" class="galeriamb-0 galeriaform-control"></textarea>    
  </div>	 
  <div class="galeriaform-group">
  <label for="type_gallery"><?php echo __('Type design','swb_simple_gallery'); ?></label>
  <select name="type_gallery" id="type_gallery" class="galeriamb-0 galeriaform-control">
    <option value="1"><?php echo __('Design Masonry','swb_simple_gallery'); ?></option>
    <option value="2"><?php echo __('Design Fancybox','swb_simple_gallery'); ?></option>
    <option value="3"><?php echo __('Design Lightbox','swb_simple_gallery'); ?></option>
  </select>    
  </div>
  <div class="galeriaform-group">
  <label for="ocultar_gallery"><?php echo __('Ocultar Título o Descripción','swb_simple_gallery'); ?></label>
  <select name="ocultar_gallery" id="ocultar_gallery" class="galeriamb-0 galeriaform-control">
    <option value="0"><?php echo __('Ninguno','swb_simple_gallery'); ?></option>
    <option value="1"><?php echo __('Ocultar Título','swb_simple_gallery'); ?></option>
    <option value="2"><?php echo __('Ocultar Descripción','swb_simple_gallery'); ?></option>
    <option value="3"><?php echo __('Ocultar Titulo y Descripción','swb_simple_gallery'); ?></option>
  </select>    
  </div>

  <div class="galeriaform-group">
  <button type="submit" name="save_new_gallery" class="galeriabtn galeriabtn-primary galeriabtn-sm galeriabtn-block"><?php echo __('Save','swb_simple_gallery'); ?></button>    
  </div>
</form>
 
</div>
<div class="galeriacol-md-9">

<table class="wp-list-table widefat fixed striped pages" id="tabla-general">
  <thead>
  <tr>
      <td><?php echo __('Name Gallery','swb_simple_gallery'); ?></td>
      <td><?php echo __('Shortcode','swb_simple_gallery'); ?></td>      
      <td><?php echo __('Number items','swb_simple_gallery'); ?></td>
  
      <td><?php echo __('Actions','swb_simple_gallery'); ?></td>
  </tr>
  </thead>

  <tbody id="the-list">


  

  </tbody>


</table>  

</div>


</div>

<input type="hidden" id="ruta" value="<?php echo SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL ?>">

</div>
<div class="galeriacontainer-fluid">
  <div class="galeriarow galeriafooter">
  <div class="galeriacol-md-12 galeriatext-right galeriapt-2 galeriapb-2">
    <?php echo __('Developed by','swb_solucio'); ?> <a href="https://solucioneswebig.com" target="_blank" >solucioneswebig</a>
  </div>
</div>
</div>
</section>