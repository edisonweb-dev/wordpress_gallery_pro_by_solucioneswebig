<?php

global $wpdb;

$id = esc_attr($atts['id']);

$galeria = $wpdb->get_results("
    SELECT *
    FROM " . TABLE_GALLERY . " as gallery
    LEFT JOIN " . IMG_GALLERY . " as img ON img.id_gallery = gallery.id_gallery
    WHERE gallery.id_gallery = " . $id . "
");

// var_dump($galeria);
// echo $galeria[0]->type_gallery;
?>

<div class="galeriacontainer">
  <div class="galeriarow">
    <div class="galeriacol-md-12">
      <?php if($galeria[0]->ocultar_gallery == 1 || $galeria[0]->ocultar_gallery == 3){

      }else{ ?>
        <h3 class="galeriatext-center"><?php echo $galeria[0]->title_gallery;?></h3>
      <?php } ?>

      <?php if($galeria[0]->ocultar_gallery == 2 || $galeria[0]->ocultar_gallery == 3){

      }else{ ?>
        <p class="galeriatext-center"><?php echo $galeria[0]->description_gallery; ?></p>
      <?php } ?>  
    </div>
  </div>
</div>


<?php
if ($galeria[0]->type_gallery == 1) {

//add_action('wp_enqueue_scripts', 'gallery_1'); 
?>
  <!-- Grid row -->
  <!-- masonry -->
  <ul class="grid effect-1 lightgallerys" id="grid">

    <?php
    foreach ($galeria as $key => $value) :
    ?>

      <li class="area" data-src="<?php echo $value->url_img ?>">
        <div class="contenido-galeria">
          <h6 class="text-white"><?php echo $value->title ?></h6>
          <p class="text-white"><?php echo $value->description ?></p>
        </div>  
        <a href="<?php echo $value->url_img ?>" class="example-image-link" data-lightbox="example-1"><img src="<?php echo $value->url_img ?>" class="galeriaimg-fluid"></a>
      
    </li>
    <?php
    endforeach;
    ?>
  </ul>

<?php
} else if ($galeria[0]->type_gallery == 2) {
?>
  <!-- Fancybox   -->
  <div class="galeriacontainer-fluid">
    <div class="galeriarow">
      <?php
      foreach ($galeria as $key => $value) :
      ?>
        <a href="<?php echo $value->url_img ?>" class="fancy galeriacol-xs-6 galeriacol-sm-4 galeriacol-md-4 galeriamb-2" data-fancybox="gallery" data-caption="Caption #<?php echo $i++ ?>">
          <img src="<?php echo $value->url_img ?>" alt="" class="h-content galeriaimg-fluid img-galeria-line" />
        </a>

      <?php
      endforeach;
      ?>
    </div>
  </div>




<?php
} else if ($galeria[0]->type_gallery == 3) {
?>
  <div class="galeriacontainer-fluid">

    <ul id="lightgallery" class="list-unstyled galeriarow">
      <?php
      foreach ($galeria as $key => $value) :
      ?>
        <li class="galeriacol-xs-6 galeriacol-sm-4 galeriacol-md-4" data-responsive="<?php echo $value->url_img ?>" data-src="<?php echo $value->url_img ?>" data-sub-html="<h4>Fading Light</h4><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
          <a href="<?php echo $value->url_img ?>" data-lightbox="image-1">
            <img class="galeriaimg-fluid img-galeria-line h-content" src="<?php echo $value->url_img ?>">
          </a>
        </li>
      <?php
      endforeach;
      ?>
    </ul>
  </div>

<?php
}
?>