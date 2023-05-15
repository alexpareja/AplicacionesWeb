//mostrar previsualizacion imagen del producto en los formularios
	function changeHandler(ev) {
		var archivo = ev.target.files[0];
		var subirArchivo1 = document.getElementById('subir-archivo1');
		var reader = new FileReader();
		reader.onload = function(event) {
			var imagen = document.createElement('img');
			imagen.src = event.target.result;
			subirArchivo1.innerHTML = '';
			subirArchivo1.appendChild(imagen);
			var nombreArchivo = document.createElement('p');
			nombreArchivo.innerHTML = archivo.name;
			subirArchivo1.appendChild(nombreArchivo);
			imagenPrevia = imagen;
		}
  reader.readAsDataURL(archivo);
    }

	$(document).ready(function(){
		var urlParams = new URLSearchParams(window.location.search);
		var id = urlParams.get('id');
		var comentarios=[];
		var listaComentarios=$('.listaComentarios');
		var numComentariosMostrados=0;
		const botonMostrarMas = document.createElement('button');
		
		$.ajax({
			url:"procesaComentariosBlog.php?id="+id,
			contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
			method:"GET",
		  }).done(function(res){
			comentarios=JSON.parse(res);
			var comentariosTotal=comentarios.length;
			numComentariosMostrados = Math.min(5,comentariosTotal);
			
			for (let i = 0; i < numComentariosMostrados;i++) {
				var comentario = comentarios[i];
				mostrarComentario(comentario,listaComentarios);
			}
			if (comentariosTotal > numComentariosMostrados) {
				botonMostrarMas.classList.add("comentario-mostrarMas");
				botonMostrarMas.textContent = 'Mostrar más comentarios';
				botonMostrarMas.setAttribute("type", "submit");
				listaComentarios.after(botonMostrarMas);
				botonMostrarMas.style.display = 'block';
			  }
		  });
		
		  $(document).on('click', '.comentario-mostrarMas', function() {
			// Código para mostrar más comentarios
				const comentariosRestantes = comentarios.slice(numComentariosMostrados);
				var numComentariosRestantes=comentariosRestantes.length;
				var comentariosAMostrar = Math.min(5,numComentariosRestantes);
			
				for (let i = 0; i < comentariosAMostrar;i++) {
					var comentario = comentariosRestantes[i];
					mostrarComentario(comentario,listaComentarios);
				}
				numComentariosMostrados+=comentariosAMostrar;
				// Ocultar el botón "Mostrar más" si ya se mostraron todos
				if (comentarios.length == numComentariosMostrados) {
					botonMostrarMas.style.display = 'none';
				}
		  
		});

		$(document).on('click', '.comentario-mostrarRespuestas', function() {
			const comentarioPadre = this.parentNode;
			const ulRespuestas = document.createElement('ul');
			ulRespuestas.classList.add('respuestas');
			const idPadre = comentarioPadre.getAttribute("idComentario");
			var encontrado=false;
			for (let i = 0; i < comentarios.length;i++) {
				var comentario = comentarios[i];
				if(comentario.id==idPadre){
					encontrado=true;
					break;
				}
			}
			if(encontrado)
			{
			var respuestas=comentario.respuestas;
			for (let i = 0; i < respuestas.length;i++) {
				var respuesta = respuestas[i];
				mostrarRespuestas(respuesta,ulRespuestas);
			}
			comentarioPadre.append(ulRespuestas);
			comentarioPadre.querySelector('.comentario-ocultarRespuestas').style.display = 'block';
			this.style.display = 'none';
			}
			else{
			var comentario = buscaPadre(idPadre,comentarios);
			var respuestas=comentario.respuestas;
			for (let i = 0; i < respuestas.length;i++) {
				var respuesta = respuestas[i];
				mostrarRespuestas(respuesta,ulRespuestas);
			}
			comentarioPadre.append(ulRespuestas);
			comentarioPadre.querySelector('.comentario-ocultarRespuestas').style.display = 'block';
			this.style.display = 'none';
			}
		});

		$(document).on('click', '.comentario-ocultarRespuestas', function() {
			const comentarioPadre = this.parentNode;
			if(comentarioPadre.querySelector('.respuestas')!=null)
			{comentarioPadre.querySelector('.respuestas').remove();}
 			comentarioPadre.querySelector('.comentario-mostrarRespuestas').style.display = 'block';
  			this.style.display = 'none';
		});

		$(".comentariosBlog-form").submit(function(event) {
			event.preventDefault(); // evita el envío del formulario por defecto
			
			var formData = $(this).serialize(); // serializa los datos del formulario
			$.ajax({
			  type: "POST",
			  url: "creaComentariosBlog.php",
			  contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
			  data: formData,
			  success: function(response) {

				var nuevoComentario = {
					id: response,
					usuario: $('input[name="autor"]').val(),
					contenido: $('textarea[name="comentarioBlog"]').val(),
					respuestas: Array(),
					fecha: $('input[name="fecha"]').val()
				  };
				  
				insertaNuevoComentario(nuevoComentario,listaComentarios);  
				comentarios.push(nuevoComentario);
				alert("Tu comentario ha sido enviado con éxito");
				$('textarea[name="comentarioBlog"]').val("");
			  },
			  error: function(jqXHR, textStatus, errorThrown) {
				
				alert("Ha ocurrido un error al enviar tu comentario: " + textStatus + " " + errorThrown);
			  }
			});
		  });


		  $(document).on('click', '.comentario-responder', function(){
			if (!$(this).parent().has('.responder-form').length) {
			var form = $("<form>");
			form.attr("class", "responder-form");
			form.attr("method", "post");
			const formulario = $('.comentariosBlog-form');

			// Obtener los valores de los campos
			const idValor = formulario.find('input[name="id"]').val();
			const autorValor = formulario.find('input[name="autor"]').val();
			const entradaValor = formulario.find('input[name="entrada"]').val();
			const fechaValor = formulario.find('input[name="fecha"]').val();
  			var id = $("<input>").attr("type", "hidden").attr("name", "id").val(idValor);
			var autor = $("<input>").attr("type", "hidden").attr("name", "autor").val(autorValor);
			var entrada = $("<input>").attr("type", "hidden").attr("name", "entrada").val(entradaValor);
			var fecha = $("<input>").attr("type", "hidden").attr("name", "fecha").val(fechaValor);
			var comentarioPadre=$(this).parent().attr("idcomentario");
			var respuesta = $("<input>").attr("type", "hidden").attr("name", "respuesta").val(comentarioPadre);
			var textarea = $("<textarea>").addClass("textoRespuesta").attr("name", "textoRespuesta").attr("required", true).attr("placeholder", "Escribe aquí tu comentario");
			var enviar = $("<button>").attr("type", "submit").text("Enviar comentario");
			var cancelar = $("<button>").attr("type", "button").text("Cancelar");
			
			// agrega los elementos al formulario
			form.append(id);
			form.append(autor);
			form.append(entrada);
			form.append(fecha);
			form.append(respuesta);
			form.append(textarea);
			form.append(enviar);
			form.append(cancelar);
			var mensajeError = $("<div>").addClass("mensajeError").css("display", "none");
			form.append(mensajeError);
			// agrega el formulario al DOM
			$(this).after(form);

			// agrega un evento para el botón de cancelar
			cancelar.click(function() {
				form.remove(); // oculta el formulario
			});

			enviar.click(function() {
				
				if(idValor==null){
					
					mensajeError.text('Debes iniciar sesión').show();
					return false;
				}
				else if ($('.textoRespuesta').val().trim() == '') {
					mensajeError.text('Debes ingresar un comentario').show();
					return false;
				} else {
					mensajeError.hide();
				}
			var formData = form.serialize(); // serializa los datos del formulario
			
			$.ajax({
			  type: "POST",
			  url: "creaRespuestasBlog.php",
			  contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
			  dataType: "json",
			  data: formData,
			  success: function(response) {
				
				var nuevaRespuesta = {
					id: response.id,
					usuario: $('input[name="autor"]').val(),
					contenido: response.respuesta,
					respuestas: Array(),
					fecha: $('input[name="fecha"]').val(),
					respuesta: $('input[name="respuesta"]').val()
				  };
				  
				  var divPadre = $('div[idcomentario=' + comentarioPadre + ']');
				  const ulRespuestas = document.createElement('ul');
				  ulRespuestas.classList.add('respuestas');
				  var encontrado=false;
				  for (let i = 0; i < comentarios.length;i++) {
					  var comentario = comentarios[i];
					  if(comentario.id==comentarioPadre){
						  encontrado=true;
						  break;
					  }
				  }
				  
				  if(encontrado)
				  {
				  comentario.respuestas.push(nuevaRespuesta);
				  var respuestas=comentario.respuestas;
				  divPadre.find('.comentario-ocultarRespuestas').css('display','block');
				  divPadre.find('.comentario-mostrarRespuestas').css('display','none');
				  for (let i = 0; i < respuestas.length;i++) {
					  var respuesta = respuestas[i];
					  mostrarRespuestas(respuesta,ulRespuestas);
				  }
				  divPadre.find('.respuestas').remove();
				  divPadre.append(ulRespuestas);
				  
				  }
				  else{
			
				  var comentario = buscaPadre(comentarioPadre,comentarios);
				
				  comentario.respuestas.push(nuevaRespuesta);
				  var respuestas=comentario.respuestas;
				  divPadre.find('.comentario-ocultarRespuestas').css('display','block');
				  divPadre.find('.comentario-mostrarRespuestas').css('display','none');
				  for (let i = 0; i < respuestas.length;i++) {
					  var respuesta = respuestas[i];
					  mostrarRespuestas(respuesta,ulRespuestas);
				  }
				  divPadre.find('.respuestas').remove();
				  divPadre.append(ulRespuestas);
				 
				
			  } 
			  alert("Tu respuesta ha sido enviada con éxito");
			  $('textarea[name="textoRespuesta"]').val("");
			},
			  error: function(jqXHR, textStatus, errorThrown) {
				
				alert("Ha ocurrido un error al enviar tu comentario: " + textStatus + " " + errorThrown);
			  }
			});
				form.remove(); 
			});
			}
		  });

		  
});

function mostrarComentario(comentario,listaComentarios) {
		const divComentario = document.createElement('div');
  		divComentario.classList.add('comentario');
  		divComentario.setAttribute('idComentario', comentario.id);

  		const divAutor = document.createElement('div');
  		divAutor.classList.add('comentario-autor');
  		divAutor.textContent = comentario.usuario;

  		const divCuerpo = document.createElement('div');
  		divCuerpo.classList.add('comentario-cuerpo');
  		divCuerpo.textContent = comentario.contenido;

  		const divFecha = document.createElement('div');
  		divFecha.classList.add('comentario-fecha');
  		divFecha.textContent = comentario.fecha;

  		const botonResponder = document.createElement('button');
  		botonResponder.classList.add('comentario-responder');
  		botonResponder.textContent = 'Responder';
		botonResponder.setAttribute("type", "submit");

  		// Agregar los elementos al comentario
  		divComentario.appendChild(divAutor);
  		divComentario.appendChild(divCuerpo);
  		divComentario.appendChild(divFecha);
  		divComentario.appendChild(botonResponder);

		  var respuestas=comentario.respuestas;
		  
		  const botonRespuestas= document.createElement('button');
		  const botonOcultarRespuestas= document.createElement('button');
		  botonRespuestas.classList.add('comentario-mostrarRespuestas');
		  botonRespuestas.textContent = 'Mostrar Respuestas';
		  divComentario.appendChild(botonRespuestas);
		  botonOcultarRespuestas.classList.add('comentario-ocultarRespuestas');
		  botonOcultarRespuestas.textContent = 'Ocultar Respuestas';
		  botonOcultarRespuestas.style.display="none";
		  divComentario.appendChild(botonOcultarRespuestas);
		  if(respuestas.length<=0){
			botonRespuestas.style.display="none";
		  }
		  

  		// Agregar el comentario a la lista de comentarios
  		listaComentarios.append(divComentario);
  }

  function insertaNuevoComentario(comentario,listaComentarios) {
	const divComentario = document.createElement('div');
	  divComentario.classList.add('comentario');
	  divComentario.setAttribute('idComentario', comentario.id);
	  divComentario.classList.add('resaltarComentario');

	  const divAutor = document.createElement('div');
	  divAutor.classList.add('comentario-autor');
	  divAutor.textContent = comentario.usuario;

	  const divCuerpo = document.createElement('div');
	  divCuerpo.classList.add('comentario-cuerpo');
	  divCuerpo.textContent = comentario.contenido;

	  const divFecha = document.createElement('div');
	  divFecha.classList.add('comentario-fecha');
	  divFecha.textContent = comentario.fecha;

	  const botonResponder = document.createElement('button');
  	  botonResponder.classList.add('comentario-responder');
  	  botonResponder.textContent = 'Responder';
	  botonResponder.setAttribute("type", "submit");

	  // Agregar los elementos al comentario
	  divComentario.appendChild(divAutor);
	  divComentario.appendChild(divCuerpo);
	  divComentario.appendChild(divFecha);
	  divComentario.appendChild(botonResponder);

	  const botonRespuestas= document.createElement('button');
	  const botonOcultarRespuestas= document.createElement('button');
	  botonRespuestas.classList.add('comentario-mostrarRespuestas');
	  botonRespuestas.textContent = 'Mostrar Respuestas';
	  divComentario.appendChild(botonRespuestas);
	  botonOcultarRespuestas.classList.add('comentario-ocultarRespuestas');
	  botonOcultarRespuestas.textContent = 'Ocultar Respuestas';
	  botonOcultarRespuestas.style.display="none";
	  divComentario.appendChild(botonOcultarRespuestas);
	  botonRespuestas.style.display="none";
	  // Agregar el comentario a la lista de comentarios
	  listaComentarios.prepend(divComentario);
}

  function mostrarRespuestas(comentario,listaComentarios) {
	const divComentario = document.createElement('div');
	  divComentario.classList.add('comentario');
	  divComentario.setAttribute('idComentario', comentario.id);

	  const divAutor = document.createElement('div');
	  divAutor.classList.add('comentario-autor');
	  divAutor.textContent = comentario.usuario;

	  const divCuerpo = document.createElement('div');
	  divCuerpo.classList.add('comentario-cuerpo');
	  divCuerpo.textContent = comentario.contenido;

	  const divFecha = document.createElement('div');
	  divFecha.classList.add('comentario-fecha');
	  divFecha.textContent = comentario.fecha;

	  const botonResponder = document.createElement('button');
	  botonResponder.classList.add('comentario-responder');
	  botonResponder.textContent = 'Responder';
	  botonResponder.setAttribute("type", "submit");


	  // Agregar los elementos al comentario
	  divComentario.appendChild(divAutor);
	  divComentario.appendChild(divCuerpo);
	  divComentario.appendChild(divFecha);
	  divComentario.appendChild(botonResponder);
	
	  var respuestas=comentario.respuestas;
	
	  const botonRespuestas= document.createElement('button');
		  const botonOcultarRespuestas= document.createElement('button');
		  botonRespuestas.classList.add('comentario-mostrarRespuestas');
		  botonRespuestas.textContent = 'Mostrar Respuestas';
		  divComentario.appendChild(botonRespuestas);
		  botonOcultarRespuestas.classList.add('comentario-ocultarRespuestas');
		  botonOcultarRespuestas.textContent = 'Ocultar Respuestas';
		  botonOcultarRespuestas.style.display="none";
		  divComentario.appendChild(botonOcultarRespuestas);
		  if(respuestas.length<=0){
			botonRespuestas.style.display="none";
		  }
		  
	  // Agregar el comentario a la lista de comentarios
	  listaComentarios.append(divComentario);
}

function buscaPadre(idComentario,comentarios) {
	// Buscamos el comentario con el id indicado
	
			for (let i = 0; i < comentarios.length;i++) {
				var comentario = comentarios[i];
				if(comentario.id==idComentario)
					{
						
						return comentario;
					}
				if(comentario.respuestas.length>0){
				
					comentario=buscaPadre(idComentario,comentario.respuestas);
					if(comentario!=null)
					{return comentario;}
				}
			}
			
	return null;
}


$(document).ready(function() {
  $('input').blur(function() {
    var valor = $(this).val();
    var id = $(this).attr('id');
    // Validamos el campo
    switch (id) {
      case 'emailUsuario':
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailRegex.test(valor)) {
          // Email válido, cambiamos el estilo del campo
          $(this).removeClass('input-error').addClass('input-correcto');
          $('#errorEmail').text('');
        } else {
          // Email inválido, cambiamos el estilo del campo
          $(this).removeClass('input-correcto').addClass('input-error');
          $('#errorEmail').text('Introduce un email válido.');
        }
        break;
      case 'password':
        if (valor.length >= 8) {
          // Contraseña válida, cambiamos el estilo del campo
          $(this).removeClass('input-error').addClass('input-correcto');
          $('#errorPass').text('');
        } else {
          // Contraseña inválida, cambiamos el estilo del campo
          $(this).removeClass('input-correcto').addClass('input-error');
          $('#errorPass').text('La contraseña debe tener al menos 8 caracteres.');
        }
        break;
      case 'password2':
        if (valor.length >= 8 && valor === $('#password').val()) {
          // Contraseñas coinciden y son válidas, cambiamos el estilo del campo
          $(this).removeClass('input-error').addClass('input-correcto');
          $('#errorPass2').text('');
        } else {
          // Contraseñas no coinciden o no son válidas, cambiamos el estilo del campo
          $(this).removeClass('input-correcto').addClass('input-error');
          $('#errorPass2').text('Las contraseñas no coinciden.');
        }
        break;
    }
  });
});

//canjear cupones de descuento
$(document).ready(function() {
	var cuponUtilizado = false;
	var descuentoSeleccionado = 0;
	var mensajeError = $("#mensaje_error");
	var mensajeCupon = $("#mensaje_cupon");

	var botonValidarCupon = $("#validar_cupon");
	var botonValidarCompra = $("#validar_compra");

	botonValidarCupon.click(function() {
		if (cuponUtilizado) {
			mostrarMensajeError("Solo se puede utilizar un cupón por compra.");
		}
		else{
			var codigo_cupon = $("#codigo_cupon").val();
			var url="verificar_cupon.php?codigo_cupon=" + codigo_cupon;
			$.get(url,canjearCupon);
		}
	});
	
	botonValidarCompra.click(function() {
			if(cuponUtilizado === true){
				var url="procesar_cupon.php?idCupon=" + descuentoSeleccionado;
				$.get(url,procesaCompra);
			}
	});
	
	function canjearCupon(response) {
		
		var cupon = JSON.parse(response);
		if (cupon.valido == true) {
			
			var fechaExpiracion = new Date(cupon.fechaExpiracion);
			
			if (fechaExpiracion < new Date()) {
				mostrarMensajeError("El cupón ha caducado.");
			}else{
				mostrarMensajeError("");
				mostrarDescuentoAplicado("Se aplicó un descuento del " + cupon.descuento + "%.");
				
				var totalActual = parseFloat($("#total_compra").text());
				var montoDescuento = totalActual * (cupon.descuento / 100);
				var totalConDescuento = totalActual - montoDescuento;
				totalConDescuento = totalConDescuento.toFixed(2);
				$("#total_compra").text(totalConDescuento);
				cuponUtilizado = true;
				descuentoSeleccionado = cupon.id;
			}

		} else {
			mostrarMensajeError("El cupón no es válido.");
		}
	}
	function procesaCompra(response) {
	}
	function mostrarMensajeError(mensaje) {
		mensajeError.text(mensaje);
	}
	function mostrarDescuentoAplicado(mensaje) {
		mensajeCupon.text(mensaje);
	}
});


//Ventana pago confirmado
function aceptarCompra(){
    window.alert("Pago confirmado");
}

//FAQS
window.onload = function(){mostrarRespuesta();}

function mostrarRespuesta(numero) {
  const menu = document.querySelector('.menuFaqs');
  const opciones = menu.querySelectorAll('.opcion');
  const respuestas = menu.querySelectorAll('.submenuFaqs');

  if (respuestas[numero].style.display === 'block') {
    respuestas[numero].style.display = 'none';
  } else {
    respuestas.forEach((respuesta) => {
      respuesta.style.display = 'none';
    });
    respuestas[numero].style.display = 'block';
  }
}


//Filtros Blog
window.onload = function () {
	mostrarFiltrosBlog();

	inicializarBuscador();
	ordenarBlogs();
	quitarFiltrosBlog();
	filtrarBlogs();
}

//barra lateral
function mostrarFiltrosBlog(){
	var menu = document.querySelector('.filBlog');
	
	if(menu.style.display === 'none' || menu.style.display === ''){
		menu.style.display = 'block';
	}
	else {
		menu.style.display = 'none';
	}

	inicializarBuscador();
	ordenarBlogs();
	quitarFiltrosBlog();
	filtrarBlogs();
}

//buscador por autor, titulo o descripcion
function inicializarBuscador(){
	const inputBusqueda = document.querySelector('#campo-busqueda-blog');
	const contenedorArticulos = document.querySelector('.panelBlog');
	
	inputBusqueda.addEventListener('input', () => {
		const busqueda = inputBusqueda.value.toLowerCase();
		const articulos = contenedorArticulos.querySelectorAll('.articulo');
		articulos.forEach((articulo) => {
			const titulo = articulo.querySelector('.tituloArt').textContent.toLowerCase();
			const descripcion = articulo.querySelector('.descripcionArt').textContent.toLowerCase();
			const autor = articulo.querySelector('.autorArt').textContent.toLowerCase();

			if(titulo.includes(busqueda) || descripcion.includes(busqueda) || autor.includes(busqueda)){
				articulo.style.display = 'flex';
			} else {
				articulo.style.display = 'none';
			}
		});
	});
}

//ordenar por titulo
function ordenarBlogs() {
	const selectorOrden = document.querySelector('#ordenar-blogs');
	const contenedorArticulos = document.querySelector('.panelBlog');
	const articulos = Array.from(contenedorArticulos.querySelectorAll('.articulo'));
	
	selectorOrden.addEventListener('change', () => {
		const opcionSeleccionada = selectorOrden.value;
	
		if (opcionSeleccionada === "nombreAB") {
			articulos.sort((a, b) => {
			const tituloA = a.querySelector('.tituloArt').textContent.toLowerCase();
			const tituloB = b.querySelector('.tituloArt').textContent.toLowerCase();
			return tituloA.localeCompare(tituloB);
			});
		} else if (opcionSeleccionada === "nombreZB") {
			articulos.sort((a, b) => {
			const tituloA = a.querySelector('.tituloArt').textContent.toLowerCase();
			const tituloB = b.querySelector('.tituloArt').textContent.toLowerCase();
			return tituloB.localeCompare(tituloA);
			});
		}
	
		articulos.forEach((articulo) => {
			contenedorArticulos.appendChild(articulo);
		});
	  	
	});
}

//quitar los filtros
function quitarFiltrosBlog(){
	const contenedorArticulos = document.querySelector('.panelBlog');
	
	const btn = document.querySelector('.botones-filtros-blog1');
	const campo = document.querySelector('#campo-busqueda-blog');
	btn.addEventListener(
		'click', ()=>{
			const checkboxes = document.querySelectorAll('input[name="cat"]');
			checkboxes.forEach(checkbox => checkbox.checked = false);
			
			campo.value="";
			const articulos = contenedorArticulos.querySelectorAll('.articulo');
			articulos.forEach((articulo) => {
				if(articulo.style.display === 'none'){
					articulo.style.display = 'flex';
				}
			});
		}
	);
}

//tipos de categoria blog
function filtrarBlogs(){
	const checkboxes = document.querySelectorAll('.filtro-categoria');
	const contenedorArticulos = document.querySelector('.panelBlog');

	checkboxes.forEach(checkbox => {
		checkbox.addEventListener('click', () => {
			var categorias = document.querySelectorAll('input[name="cat"]:checked');
			var articulos = contenedorArticulos.querySelectorAll('.articulo');

			for(var i = 0; i < articulos.length; i++){
				articulos[i].style.display = 'flex';

				const categoria = articulos[i].querySelector('.categoriaArt').textContent.toLowerCase();
				var encontrado = false;
				for(var j = 0; j < categorias.length; j++){
					if(categoria === categorias[j].value){
						encontrado=true;
						break;
					}
				}

				if(!encontrado && categorias.length > 0){
					articulos[i].style.display = 'none';
				}
			}
		});
	});
}


function seleccionarTalla(talla) {
  document.getElementById('tallaSeleccionada').value = talla;
}



function terminos(){
	const terminos = document.querySelectorAll('.ter');
	terminos.forEach(termino => {
		termino.addEventListener('click', () =>{
			if (termino.querySelector('.deUso').style.display==='none' || termino.querySelector('.deUso').style.display===''){
				termino.querySelector('.deUso').style.display='block';
			}
			else{
				termino.querySelector('.deUso').style.display='none';
			}
		});
	});
}
window.onload = function () {
	terminos();
}
function irLogin(){
	window.location.href = "login.php";
}