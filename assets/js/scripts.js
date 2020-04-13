(function( $ ) {
 
 			if($(window).width() < 768 ){
            $('#tabla-general').DataTable( {
            responsive: true
        	} );
 			}else{
				 // var tablet =  $('#tabla-general').DataTable();
				 

			}
			

			$("#listado_imagen").on("click", function(event){
		
				let id_imagen = this.dataset.id;
				// console.log(id_imagen)
		
				let data = {
					action: 'ajax_busqueda',
					id_imagen: id_imagen,
					buscar_lista_imagen: 1
				};
		
		
				$.ajax({
					url : busqueda_vars.ajaxurl,
					type: 'post',
					data: data,
					beforeSend: function(){
						
					},
					success: function(result){
						// console.log(result);
						
						let resp = JSON.parse( result.slice(0, -1) );
						
						$("#mostrar-imagen").empty();
						
						resp.map(function(element){

							$html = '<div class="galeriacol-md-3">'
							$html += '<img src="'+element.descrip_img+'" class="galeriaimg-fluid galeria-img">'
              $html += '</div>'

              $html += '<div class="galeriacol-md-3 galeriad-flex galeriaalign-items-center">'
							$html += '<div class="galeriaform-group">'
							$html += '<label for="titulo_imagen">Título</label>'
							$html += '<input '
              $html += ' type="text" '
              $html += ' name="titulo_imagen" '
              $html += ' class="titulo_imagen galeriaform-control" '
              $html += ' data-id="'+element.id_img_gallery+'" '
              $html += ' value="'+element.title+'" '
              $html += ' > '
              $html += '</div>'
              $html += '</div>'

							$html += '<div class="galeriacol-md-3 galeriad-flex galeriaalign-items-center">'  
              $html += ' <div class="galeriaform-group">'
              $html += '    <label for="descripcion_imagen">Descripción</label>'
              $html += '    <input '
              $html += '      type="text" '
              $html += '      name="descripcion_imagen" '
              $html += '      class="descripcion_imagen galeriaform-control" '
              $html += '      data-id="'+element.id_img_gallery+'"  '
              $html += '      value="'+element.description+'"  '
              $html += '    > '
              $html += '  </div> '
              $html += ' </div> '

              $html += '<div class="galeriacol-md-3 galeriad-flex galeriaalign-items-center ">'
                
							$html += '   <a href="'+element.descrip_img+'"  target="_blank" class="galeriabtn galeriabtn-success galeriatext-white"> '
							$html += '   <span class="dashicons dashicons-download"></span> '
              $html += '    </a> '
              $html += '    <button type="button" class="galeriabtn galeriabtn-danger eliminar-image-gallery" data-id="'+element.id_img_gallery+'" data-id_img="'+element.id_img+'" data-id_gallery="'+element.id_gallery+'"> '
              $html += '    <span class="dashicons dashicons-no"></span>'
              $html += '    </button>'
                
              $html += '</div>' 

		
						$("#mostrar-imagen").append($html);
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
					
				
			});


			$(document).on("click",".eliminar-image-gallery", function(event){
				event.preventDefault();
		
				const id = this.dataset.id;
				const id_img = this.dataset.id_img;
				// console.log(id);
		
				let data = {
					action: 'ajax_busqueda',
					id: id,
					id_img:id_img,
					eliminar_imagen_gallery: 1
				};
		
		
				let id_gallery = this.dataset.id_gallery;
				let data2 = {
					action: 'ajax_busqueda',
					id_imagen: id_gallery,
					buscar_lista_imagen: 1
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
		
									// location.reload();
									
									$.ajax({
										url : busqueda_vars.ajaxurl,
										type: 'post',
										data: data2,
										beforeSend: function(){
											
										},
										success: function(result){
											// console.log(result);
											
											let resp = JSON.parse( result.slice(0, -1) );
											
											$("#mostrar-imagen").empty();
											
											resp.map(function(element){
							
												$html = '<div class="galeriacol-md-3">'
												$html += '<img src="'+element.descrip_img+'" class="galeriaimg-fluid galeria-img">'
												$html += '</div>'

												$html += '<div class="galeriacol-md-3 galeriad-flex galeriaalign-items-center">'
												$html += '<div class="galeriaform-group">'
												$html += '<label for="titulo_imagen">Título</label>'
												$html += '<input '
												$html += ' type="text" '
												$html += ' name="titulo_imagen" '
												$html += ' class="titulo_imagen galeriaform-control" '
												$html += ' data-id="'+element.id_img_gallery+'" '
												$html += ' value="'+element.title+'" '
												$html += ' > '
												$html += '</div>'
												$html += '</div>'

												$html += '<div class="galeriacol-md-3 galeriad-flex galeriaalign-items-center">'  
												$html += ' <div class="galeriaform-group">'
												$html += '    <label for="descripcion_imagen">Descripción</label>'
												$html += '    <input '
												$html += '      type="text" '
												$html += '      name="descripcion_imagen" '
												$html += '      class="descripcion_imagen galeriaform-control" '
												$html += '      data-id="'+element.id_img_gallery+'"  '
												$html += '      value="'+element.description+'"  '
												$html += '    > '
												$html += '  </div> '
												$html += ' </div> '

												$html += '<div class="galeriacol-md-3 galeriad-flex galeriaalign-items-center ">'
													
												$html += '   <a href="'+element.descrip_img+'"  target="_blank" class="galeriabtn galeriabtn-success galeriatext-white"> '
												$html += '   <span class="dashicons dashicons-download"></span> '
												$html += '    </a> '
												$html += '    <button type="button" class="galeriabtn galeriabtn-danger eliminar-image-gallery" data-id="'+element.id_img_gallery+'" data-id_img="'+element.id_img+'" data-id_gallery="'+element.id_gallery+'"> '
												$html += '    <span class="dashicons dashicons-no"></span>'
												$html += '    </button>'
													
												$html += '</div>' 
							
												
							
											$("#mostrar-imagen").append($html);
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
		
				});//fin then
		
		
		
				
		
				
		
			});// fin eliminar jornada diaria	

		
			$(document).on("keydown",".titulo_imagen", function(event){
				// event.preventDefault();
				// console.log(this.value)

				const id = this.dataset.id
				

				let data = {
					action: 'ajax_busqueda',
					id: id,
					titulo: this.value,
					guardar_titulo_imagen_gallery: 1
				};

				$.ajax({
					url : busqueda_vars.ajaxurl,
					type: 'post',
					data: data,
					beforeSend: function(){
						
					},
					success: function(result){

					}

				})		

			})

			$(document).on("keydown",".descripcion_imagen", function(event){
				// event.preventDefault();
				// console.log(this.value)

				const id = this.dataset.id
				

				let data = {
					action: 'ajax_busqueda',
					id: id,
					descripcion: this.value,
					guardar_descripcion_imagen_gallery: 1
				};

				$.ajax({
					url : busqueda_vars.ajaxurl,
					type: 'post',
					data: data,
					beforeSend: function(){
						
					},
					success: function(result){

					}

				})		

			})
			

 
})(jQuery);