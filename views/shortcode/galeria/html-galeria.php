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


