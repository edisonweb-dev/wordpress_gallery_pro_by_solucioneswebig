<?php

if (!defined('ABSPATH')) exit;

global $wpdb;

$get_gallery = $wpdb->get_row("SELECT * FROM " . TABLE_GALLERY . " as gallery WHERE gallery.id_gallery = " . $_GET["edit"] . "");



?>
<div class="wrap">
  <h1 class="wp-heading-inline"><?php echo __('Edit', 'swb_simple_gallery'); ?> <?php echo esc_html($get_gallery->name_gallery); ?></h1>
  <br>
  <a href="admin.php?page=simple-gallery-by-solucioneswebig" class="galeriabtn galeriabtn-info"><?php echo __('Return', 'swb_simple_gallery'); ?></a>

  <hr class="wp-header-end">

  <br> <br> <br>

  <div id="galeriacontainer" class="wp-clearfix">

    <div class="galeriarow">
      <div class="galeriacol-md-6">
        <form action="admin.php?page=simple-gallery-by-solucioneswebig" method="post" class="galeriaform">
          <div class="shortcode">
            <p><strong><?php echo __('Copy', 'swb_simple_gallery'); ?> shortcode</strong></p>
            [swbsg id="<?php echo $get_gallery->id_gallery; ?>" type="<?php echo $get_gallery->type_gallery; ?>"]
          </div>
          <h2><?php echo __('Edit', 'swb_simple_gallery'); ?></h2>
          <div class="galeriaform-group">
            <label for="name_gallery"><?php echo __('Name gallery', 'swb_simple_gallery'); ?></label>
            <input type="text" name="name_gallery" value="<?php echo esc_html($get_gallery->name_gallery); ?>" class="galeriaform-control">
          </div>
          <div class="galeriaform-group">
            <label for="title_gallery"><?php echo __('Title gallery', 'swb_simple_gallery'); ?></label>
            <input type="text" name="title_gallery" value="<?php echo esc_html($get_gallery->title_gallery); ?>" class="galeriaform-control">
          </div>
          <div class="galeriaform-group">
            <label for="type_gallery"><?php echo __('Type design', 'swb_simple_gallery'); ?></label>
            <select name="type_gallery" id="" class="galeriaform-control">
              <option value="1" <?php if ($get_gallery->type_gallery == 1) {
                                  echo "SELECTED";
                                } ?>><?php echo __('Design Masonry', 'swb_simple_gallery'); ?></option>
              <option value="2" <?php if ($get_gallery->type_gallery == 2) {
                                  echo "SELECTED";
                                } ?>><?php echo __('Design Fancybox', 'swb_simple_gallery'); ?></option>
              <option value="3" <?php if ($get_gallery->type_gallery == 3) {
                                  echo "SELECTED";
                                } ?>><?php echo __('Design Lightbox', 'swb_simple_gallery'); ?></option>
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
            <label for="description_gallery"><?php echo __('Descripcion gallery', 'swb_simple_gallery'); ?></label>
            <textarea name="description_gallery" id="" class="galeriaform-control"><?php echo esc_html($get_gallery->description_gallery); ?></textarea>
          </div>
          <div class="galeriaform-group">
            <button type="submit" name="save_new_gallery" class="galeriabtn galeriabtn-success"><?php echo __('Modify', 'swb_simple_gallery'); ?></button>
          </div>
        </form>
      </div>

      <div class="galeriacol-md-6">
        <p>Al eliminar una categoría no se eliminan las entradas de esa categoría. En su lugar, las entradas que solo se asignaron a la categoría borrada, se asignan a la categoría por defecto Sin categoría. La categoría por defecto no se puede borrar.</p>
        <p>Al eliminar una categoría no se eliminan las entradas de esa categoría. En su lugar, las entradas que solo se asignaron a la categoría borrada, se asignan a la categoría por defecto Sin categoría. La categoría por defecto no se puede borrar.</p>

      </div>
    </div>




  </div>

</div>