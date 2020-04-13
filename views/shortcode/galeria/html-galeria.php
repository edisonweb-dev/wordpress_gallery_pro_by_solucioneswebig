<?php

global $wpdb;

$id = esc_attr($atts['id']);

$galeria = $wpdb->get_results("
    SELECT *
    FROM " . TABLE_GALLERY . " as gallery
    LEFT JOIN " . IMG_GALLERY . " as img ON img.id_gallery = gallery.id_gallery
    WHERE gallery.id_gallery = " . $id . "
");

function gallery_1(){

	wp_enqueue_style( 'swb-style-general', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/css/style.css?a', false );
	wp_enqueue_style( 'swb-style-galeriab', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/css/galeria-bootstrap.css', false );
	wp_enqueue_style( 'swb-style-galeriaMd', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/css/galeria-mdb.css', false );
	wp_enqueue_style( 'swb-style-light', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/css/lightbox.min.css', false );

	wp_enqueue_script( 'jquery' );

	//Masonry
	wp_enqueue_style( 'swb-style-default',SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL. 'assets/css/default.css', false );
	wp_enqueue_style( 'swb-style-component',SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL. 'assets/css/component.css', false );

	wp_enqueue_script( 'swb-moderniz', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL .'assets/js/modernizr.custom.js' , array(), null , true );
	wp_enqueue_script( 'swb-masonry', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL .'assets/js/masonry.pkgd.min.js' , array(), null , true );
	wp_enqueue_script( 'swb-imageloaded', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL .'assets/js/imagesloaded.js' , array(), null , true );
	wp_enqueue_script( 'swb-classie', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL .'assets/js/classie.js' , array(), null , true );
	wp_enqueue_script( 'swb-animationScroll', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL .'assets/js/AnimOnScroll.js' , array(), null , true );

	//Fancy box
	wp_enqueue_style( 'fancy-boxs','https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css', false );
	wp_enqueue_script( 'swb-scripts-fancyss', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js' , array( 'jquery' ), null , true );



	wp_enqueue_style( 'light', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL. 'assets/lib/lightGallery/css/lightgallery.css', false );
	wp_enqueue_script( 'swb-scripts-pictures', 'https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js' , array( 'jquery' ), null , true );

	wp_enqueue_script( 'swb-scripts-picturefills', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL .'assets/lib/lightGallery/js/lightgallery-all.min.js' , array( 'jquery' ), null , true );

	wp_enqueue_script( 'swb-scripts-picturefills', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL .'assets/lib/lightGallery/js/jquery.mousewheel.min.js' , array( 'jquery' ), null , true );

	//bootstrap editado
	wp_enqueue_style( 'bootstrap-edit', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL. 'assets/css/galeria-bootstrap.css', false );

	wp_enqueue_style( 'datatable-public-css','//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css', false );
	wp_enqueue_style( 'datatable-public-responsive-css','https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css', false );
	wp_enqueue_style( 'datatable-buttons','https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css', false );


	
	//-----------SCRIPT EDITADOS------------
	wp_enqueue_script( 'swb-scripts-general', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/js/scripts.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-galeria', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/js/script2.js' , array( 'jquery' ), null , true );
	wp_enqueue_script( 'swb-scripts-light', SWB_SIMPLE_GALLERY_PLUGIN_DIR_URL . 'assets/js/lightbox-plus-jquery.min.js' , array( 'jquery' ), null , true );

}


add_action('wp_enqueue_scripts', 'gallery_1'); 

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