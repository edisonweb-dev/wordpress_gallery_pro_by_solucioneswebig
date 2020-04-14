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

<div class="swb-container">
  <div class="swb-row">
    <div class="swb-col-md-12">
      <?php if($galeria[0]->ocultar_gallery == 1 || $galeria[0]->ocultar_gallery == 3){

      }else{ ?>
        <h3 class="swb-text-center"><?php echo $galeria[0]->title_gallery;?></h3>
      <?php } ?>

      <?php if($galeria[0]->ocultar_gallery == 2 || $galeria[0]->ocultar_gallery == 3){

      }else{ ?>
        <p class="swb-text-center"><?php echo $galeria[0]->description_gallery; ?></p>
      <?php } ?>  
    </div>
  </div>
</div>


<?php
if ($galeria[0]->type_gallery == 1) {

  do_action( "ejecutar_galeria_1");

?>
  <!-- Grid row -->
  <!-- masonry -->
  <ul class="grid effect-1 lightgallerys" id="grid">

    <?php
    foreach ($galeria as $key => $value) :
    ?>

      <li class="area" data-src="<?php echo $value->url_img ?>">
        <div class="contenido-galeria">
          <h6 class="swb-text-white"><?php echo $value->title ?></h6>
          <p class="swb-text-white"><?php echo $value->description ?></p>
        </div>  
        <a href="<?php echo $value->url_img ?>" class="example-image-link" data-lightbox="example-1"><img src="<?php echo $value->url_img ?>" class="swb-img-fluid"></a>
      
    </li>
    <?php
    endforeach;
    ?>
  </ul>

<?php
} else if ($galeria[0]->type_gallery == 2) {

  do_action( "ejecutar_galeria_2");
  
?>
  <!-- Fancybox   -->
  <section id="swb-portfolio" class="swb-portfolio">
      <div class="swb-container">
        <div class="swb-row swb-portfolio-container" data-aos="fade-up" data-aos-delay="100">
      <?php
      foreach ($galeria as $key => $value) :
      ?>

         <div class="swb-col-lg-4 swb-col-md-6 swb-portfolio-item">
            <a href="<?php echo $value->url_img ?>" data-gall="portfolioGallery" class="venobox preview-link" title="<?php echo $value->title ?> <?php echo $value->description ?>"><img src="<?php echo $value->url_img ?>" class="swb-img-fluid" alt=""></a>
            <div class="swb-portfolio-info">
              <h4><?php echo $value->title ?></h4>
              <p><?php echo $value->description ?></p>
              <a href="<?php echo $value->url_img ?>" data-gall="portfolioGallery" class="venobox preview-link" title="<?php echo $value->title ?> <?php echo $value->description ?>"><i class="bx bx-plus"></i></a>
               </div>
          </div>

      <?php
      endforeach;
      ?>
    </div>
  </div>
</section>




<?php
} else if ($galeria[0]->type_gallery == 3) {

do_action( "ejecutar_galeria_3");

?>
    <section id="swb-portfolio" class="swb-portfolio">
      <div class="swb-container">


        <div class="swb-row swb-portfolio-container" data-aos="fade-up">
      <?php
      foreach ($galeria as $key => $value) :
      ?>

         <div class="swb-col-lg-4 swb-col-md-6 swb-portfolio-item">
            <div class="swb-portfolio-wrap">
               <img src="<?php echo $value->url_img ?>" class="swb-img-fluid" alt="">
                <div class="swb-photo-text-more">
                   <h4 class="swb-text-white swb-font-weight-bold"><?php echo $value->title ?></h4>
                   <p class="swb-text-white swb-font-weight-bold"><?php echo $value->description ?></p>
                </div>
               <div class="swb-portfolio-links" style="background: rgba(0, 0, 0, 0.53);">
                 <a href="<?php echo $value->url_img ?>" data-gall="portfolioGallery" class="venobox" title="<?php echo $value->title ?> <?php echo $value->description ?>"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>

      <?php
      endforeach;
      ?>
  </div>
</div>
</section>


<?php
} else if ($galeria[0]->type_gallery == 4) {

do_action( "ejecutar_galeria_4");

?>

  <main class="main-content">

    <div class="swb-container-fluid">

      <section class="swb-row align-items-stretch photos" id="section-photos">
        <div class="swb-col-12 swb-col-md-12">
        <div class="swb-row align-items-stretch">
      <?php
      foreach ($galeria as $key => $value) :
      ?>
        <div class="swb-col-6 swb-col-md-6 swb-col-lg-4 swb-margen" data-aos="fade-up">
          <a href="<?php echo $value->url_img ?>" class="d-block photo-item" data-fancybox="gallery">
            <img src="<?php echo $value->url_img ?>" alt="Image" class="swb-img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
                   <h4 class="swb-text-white swb-font-weight-bold"><?php echo $value->title ?></h4>
                   <p class="swb-text-white swb-font-weight-bold"><?php echo $value->description ?></p>
            </div>
          </a>
        </div>

      <?php
      endforeach;
      ?>
  </div>
</div>
</section>
</div>
</main>

<?php
} else if ($galeria[0]->type_gallery == 5) {

do_action( "ejecutar_galeria_5");

?>

    <section id="portfolio" class="portfolio">
      <div class="swb-container">

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
      <?php
      foreach ($galeria as $key => $value) :
      ?>

          <div class="swb-col-lg-4 swb-col-md-6 portfolio-item">
            <a href="<?php echo $value->url_img ?>" data-gall="portfolioGallery" class="venobox preview-link" title="<?php echo $value->title ?> <?php echo $value->description ?>"><img src="<?php echo $value->url_img ?>" class="swb-img-fluid" alt=""></a>
            <div class="portfolio-info">
              <h4 class="tamano-fuente-title"><?php echo $value->title ?></h4>
              <p class="tamano-fuente-parrafo"><?php echo $value->description ?></p>
              <a href="<?php echo $value->url_img ?>" data-gall="portfolioGallery" class="venobox preview-link" title="<?php echo $value->title ?> <?php echo $value->description ?>"><i class="bx bx-plus"></i></a>
           </div>
          </div>

      <?php
      endforeach;
      ?>
  </div>
</div>
</section>




<?php
}
?>