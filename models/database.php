<?php

if ( ! defined( 'ABSPATH' ) ) exit; 


function swb_database_gallery(){

  global $wpdb;

  $charset_collate = $wpdb->get_charset_collate();

  $sql_galeria = "CREATE TABLE IF NOT EXISTS  " . TABLE_GALLERY ."(

    id_gallery bigint(20) NOT NULL AUTO_INCREMENT,
    name_gallery longtext NOT NULL,
    title_gallery longtext NOT NULL,
    description_gallery longtext NOT NULL,
    type_gallery int(20) NOT NULL,
    ocultar_gallery int(20) NOT NULL,
    date_creation date NOT NULL,
    PRIMARY KEY (id_gallery)

) $charset_collate;";


  $sql_img_galeria = "CREATE TABLE IF NOT EXISTS  " . IMG_GALLERY ."(

    id_img_gallery bigint(20) NOT NULL AUTO_INCREMENT,

    id_gallery int(20) NOT NULL,

    title varchar(250) NOT NULL,

    description varchar(250) NOT NULL,

    name_img varchar(255) NOT NULL,

    id_img longtext NOT NULL,

    url_img longtext NOT NULL,

    descrip_img varchar(255) NOT NULL,

    date_upload date NOT NULL,

    PRIMARY KEY (id_img_gallery)

) $charset_collate;";


require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

dbDelta($sql_galeria);
dbDelta($sql_img_galeria);


}


add_action('init', 'swb_database_gallery');