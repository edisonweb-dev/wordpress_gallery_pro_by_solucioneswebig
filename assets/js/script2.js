(function( $ ) {

  if( $("#grid").length ){
    new AnimOnScroll( document.getElementById( 'grid' ), {
      minDuration : 0.4,
      maxDuration : 0.7,
      viewportFactor : 0.2
    });
  }

  

  // $(".fancy").fancybox({
  //   selector : '.imglist a:visible'
  // });

  // $('#lightgallery').lightGallery();

  function cargarTabla(){
    let data = {
      action: 'ajax_galeria',
    };  
  
    $.ajax({
      url : busqueda_vars.ajaxurl,
      type: 'post',
      data: data,
      beforeSend: function(){
        
      },
      success: function(result){
        
        let data = JSON.parse( result.slice(0, -1) );
        
        $('#tabla-general').DataTable({
          data
        })
      }
    })

  }//fin cargar tabla

  if ($('#tabla-general').length) {
    cargarTabla()
  }
  

  
  $("#form-guardar").submit(function(event){
    event.preventDefault();
    
    let data;

    data = {
      action: 'ajax_busqueda',
      guardar_imagen: 1,
      name_gallery: $("#name_gallery").val(),
      title_gallery: $("#title_gallery").val() ,
      type_gallery: $("#type_gallery").val(),
      ocultar_gallery: $("#ocultar_gallery").val(),
      description_gallery: $("#description_gallery").val()
    };
    
    // console.log(data);

    $.ajax({
      url : busqueda_vars.ajaxurl,
      type: 'post',
      data: data,
      beforeSend: function(){
        
      },
      success: function(result){
        // console.log(result);
        // let resp = JSON.parse( result.slice(0, -1) );

        Swal.fire(
          'Guardado!',
          'Su registro ha sido guardado.',
          'success'
        ).then( () =>{
          $("#form-guardar")[0].reset();
          $('#tabla-general').DataTable().destroy();
          cargarTabla()
        })

      },
      error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
        console.log(msg);
      }

    })	
    



  })//fin form-guardar


  $(document).on("click",".eliminar-galeria", function(event){
    event.preventDefault();
    const id = this.dataset.id;

    let data = {
      action: 'ajax_busqueda',
      id: id,
      eliminar_gallery: 1
    };


    Swal.fire({
      title: 'Estás seguro?',
      text: "¡No podrás revertir esto!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, bórralo!'
    }).then((result) => {

      if (result.value) {

        $.ajax({
          url : busqueda_vars.ajaxurl,
          type: 'post',
          data: data,
          beforeSend: function(){
            
          },
          success: function(resultado){
             
             Swal.fire(
              'Eliminado!',
              'Su registro ha sido eliminado.',
              'success'
            ).then( () =>{
              
              $('#tabla-general').DataTable().destroy();
              cargarTabla()

            });
          },
          error: function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            console.log(msg);
          }
          
    
        });// fin del ajax

      }

    })//fin then

  })// fin eliminar galeria

  
  $("#form-editar").submit(function(event){
    event.preventDefault();
    
    let data;

    data = {
      action: 'ajax_busqueda',
      editar_imagen: 1,
      name_gallery: $("#name_galleryE").val(),
      title_gallery: $("#title_galleryE").val() ,
      type_gallery: $("#type_galleryE").val(),
      ocultar_gallery: $("#ocultar_gallery").val(),
      description_gallery: $("#description_galleryE").val(),
      id:  $("#id_galeriaE").val() 
    };
    
    // console.log(data);

    $.ajax({
      url : busqueda_vars.ajaxurl,
      type: 'post',
      data: data,
      beforeSend: function(){
        
      },
      success: function(result){
        // console.log(result);
        // let resp = JSON.parse( result.slice(0, -1) );

        Swal.fire(
          'Editado!',
          'Su registro ha sido editado.',
          'success'
        ).then( () =>{
          // $("#form-guardar")[0].reset();
          // $('#tabla-general').DataTable().destroy();
          // cargarTabla()
        })

      },
      error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
        console.log(msg);
      }

    })	
    



  })//fin form-guardar
  
  $('.lightgallerys').lightGallery();

  $(function() {
    var selectedClass = "";
    $(".filter").click(function(){
    selectedClass = $(this).attr("data-rel");
    $("#gallery").fadeTo(100, 0.1);
    $("#gallery div").not("."+selectedClass).fadeOut().removeClass('animation');
    setTimeout(function() {
    $("."+selectedClass).fadeIn().addClass('animation');
    $("#gallery").fadeTo(300, 1);
    }, 300);
    });
    });

    

    

    


})(jQuery);