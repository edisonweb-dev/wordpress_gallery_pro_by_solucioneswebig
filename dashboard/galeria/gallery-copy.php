<?php

if ( ! defined( 'ABSPATH' ) ) exit; 

global $wpdb;



$results_gallery = $wpdb->get_row("SELECT * FROM " . TABLE_GALLERY . " as gallery  WHERE gallery.id_gallery = ".$_GET["gallery"]."  ");

$get_gallery = $wpdb->get_row("SELECT * FROM ".TABLE_GALLERY." as gallery WHERE gallery.id_gallery = ".$_GET["gallery"]."");

// var_dump();


?>


<section class="galeriapr-4">
<div class="galeriacontainer-fluid galeriamt-5 galeriashadow-lg galeriapt-5 galeriapb-5  galeriapl-3 galeriapr-3"> 


<div class="galeriarow">
  <div class="galeriacol-md-12">
  <h3 class="galerialist-inline-item"><?php echo __('Simple Gallery','swb_simple_gallery'); ?></h3>
  <a href="admin.php?page=simple-gallery-by-solucioneswebig" class="galeriabtn galeriabtn-info galerialist-inline-item"><?php echo __('Return','swb_simple_gallery'); ?></a>
  </div>
</div>

<hr>

<div class="galeriarow"> 
<div class="galeriacol-md-3">
<form action="" method="post" class="swb_form" id="form-editar">
  <div class="shortcode">
  <p><strong><?php echo __('Copy','swb_simple_gallery'); ?> shortcode</strong></p>
   [galeria id="<?php echo $get_gallery->id_gallery; ?>"]
  </div>
  <h5><?php echo __('Edit','swb_simple_gallery'); ?></h5>
  <div class="galeriaform-group">
    <label for="name_gallery"><?php echo __('Name gallery','swb_simple_gallery'); ?></label>
    <input type="text" name="name_galleryE" id="name_galleryE" class="galeriaform-control" value="<?php echo esc_html( $get_gallery->name_gallery ); ?>">
  </div>
  <div class="galeriaform-group">
    <label for="title_gallery"><?php echo __('Title gallery','swb_simple_gallery'); ?></label>
    <input type="text" name="title_galleryE" class="galeriaform-control" id="title_galleryE" value="<?php echo esc_html( $get_gallery->title_gallery ); ?>">
  </div>
  <div class="galeriaform-group">
  <label for="type_gallery"><?php echo __('Type design','swb_simple_gallery'); ?></label>
  <select name="type_galleryE" id="type_galleryE" class="galeriaform-control">
    <option value="1" <?php if($get_gallery->type_gallery==1){ echo "SELECTED"; } ?>><?php echo __('Design Masonry','swb_simple_gallery'); ?></option>
    <option value="2" <?php if($get_gallery->type_gallery==2){ echo "SELECTED"; } ?>><?php echo __('Design Fancybox','swb_simple_gallery'); ?></option>
    <option value="3" <?php if($get_gallery->type_gallery==2){ echo "SELECTED"; } ?>><?php echo __('Design Lightbox','swb_simple_gallery'); ?></option>
    
  </select>    
  </div>
  <div class="galeriaform-group">
  <label for="description_gallery"><?php echo __('Descripcion gallery','swb_simple_gallery'); ?></label>  
  <textarea name="description_galleryE" class="galeriaform-control" id="description_galleryE"><?php echo esc_html( $get_gallery->description_gallery ); ?></textarea>    
  </div>
  <div class="galeriaform-group">
  <input type="hidden" name="id" id="id_galeriaE" value="<?php echo $_GET["gallery"] ?>">
  <button type="submit" name="edit-galeria" class="galeriabtn galeriabtn-primary galeriabtn-block"><?php echo __('Modify','swb_simple_gallery'); ?></button>    
  </div>
</form>

</div>
<div class="galeriacol-md-9">


<?php 
  $ruta = admin_url( 'admin-ajax.php' );
?>


    <div class="galeriaform-group">
    <label for=""><?php echo __('Upload the Documents:','swb_simple_gallery'); ?></label>
    <!-- <form action="/file-upload" class="dropzone" id="my-awesome-dropzone"></form> -->

    <form 
      action="<?php echo $ruta; ?>"
      class="dropzone"
      id="dropzoneForm"
      enctype="multipart/form-data"
      >
      <div class="fallback">
        <input name="file" type="file" multiple />
      </div>
      <input type="hidden" name="id_gallery" id="id_gallery" value="<?php echo $_GET["gallery"] ?>">
      <input type='hidden' name='action' value='submit_dropzonejs'>
    </form>

    <button type="button" id="listado_imagen" class="galeriabtn galeriabtn-success galeriamt-3" data-id="<?php echo $_GET["gallery"] ?>"><?php echo __('Send','swb_simple_gallery'); ?></button>


</div>



<!-- cominez listado de imagen  -->
<br>
<hr>
<br>
<div class="galeriarow" id="mostrar-imagen">

<?php

  $obtener_documentos = $wpdb->get_results("
                        SELECT * FROM " . IMG_GALLERY . " as gallery
                        where gallery.id_gallery = " .$_GET['gallery']. "
                      ");



  if(!$obtener_documentos):

?>

 <div class="galeriacol-md-12">

    <div class="galeriaalert galeriaalert-warning" role="alert">

      <?php echo __('No documents uploaded','swb_simple_gallery'); ?>

    </div>

 </div>

<?php

else:

foreach ($obtener_documentos as $key => $documento):   

  // var_dump($documento);
?>



<div class="galeriacol-md-4 galeriapy-2">

        <div class="galeriacard galeriatext-center">

          <div class="galeriacard-body">

            <img src="<?php echo $documento->descrip_img; ?>" classs="galeriaimg-fluid imgs" style="width: 100%; object-fit:cover; width: 100%;">   

            <h5 class="galeriacard-title"><a href="<?php echo $documento->descrip_img; ?>" target="_blank"><?php echo $documento->name_img; ?></a></h5>

            <p class="galeriacard-text">

            <div class="galeriacontainer">

              <div class="galeriarow">

                <div class="galeriacol-md-6">

                  <a href="<?php echo $documento->descrip_img; ?>"  target="_blank" class="galeriabtn galeriabtn-success galeriabtn-block galeriatext-white">
                  <span class="dashicons dashicons-download"></span>
                  </a>

                </div>

                <div class="galeriacol-md-6">

                  <button type="button" class="galeriabtn galeriabtn-danger galeriabtn-block eliminar-image-gallery" 
                    data-id="<?php echo $documento->id_img_gallery; ?>" 
                    data-id_img="<?php echo $documento->id_img ?>" 
                    data-id_gallery="<?php echo $_GET["gallery"] ?>"
                  >
                    <span class="dashicons dashicons-no"></span>
                  </button>

                </div>

              </div>

            </div>



            </p>

          </div>

        </div>

</div>



<?php 

endforeach;

endif; 

?>
</div>

</div>


</div>

</div>
<div class="galeriacontainer-fluid">
  <div class="galeriarow galeriafooter">
  <div class="galeriacol-md-12 galeriatext-right galeriapt-2 galeriapb-2">
    <?php echo __('Developed by','swb_solucio'); ?> <a href="https://solucioneswebig.com" target="_blank" class="galeriatext-white">solucioneswebig</a>
  </div>
</div>
</div>
</section>





