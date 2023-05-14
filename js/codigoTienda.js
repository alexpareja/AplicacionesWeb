//Mostrar el menu izquierdo de filtros
function mostrarMenu() {
  var menu = document.getElementById("menuIzqTienda");
  var tienda = document.getElementById("tienda");
  var pie = document.getElementById("pie");
  var botonFiltros = document.getElementById("boton-filtros");
	  
  menu.classList.toggle("mostrarMenu-not");
  menu.classList.toggle("mostrarMenu-izq");
  
  tienda.classList.toggle("mostrarMenu");
  botonFiltros.classList.toggle("mostrarMenu"); 
  pie.classList.toggle("mostrarMenu");
  var tablaCompras = document.getElementById("tabla-compras");
  
  if(tablaCompras !== null){
		var valoracion = document.getElementById("filtro-valoracion");
		valoracion.classList.add("ocultoFiltro");
  }; 
}
//Slider precio se actualiza automáticamente
window.onload = function() {
  // Obtener el control deslizante de rango y el elemento de valor
  var slider = document.getElementById("slider");
  var valorPrecio = document.getElementById("valor-precio");
  
  var listaProductos = document.getElementById("lista-productos");
  var tablaCompras = document.getElementById("tabla-compras");
  
  if(listaProductos !== null){
	var precios = Array.from(listaProductos.getElementsByTagName("li")).map(function(li) {
    return parseFloat(li.getAttribute("data-precio")) || 0;
  });
  }
  
  if(tablaCompras !== null){
	var precios = Array.from(tablaCompras.getElementsByTagName("tr")).map(function(tr) {
    return parseFloat(tr.getAttribute("data-precio")) || 0;
  });  
  }
  
  var precioMaximo = Math.max.apply(Math, precios);
  slider.max = (precioMaximo + 1) | 0;
  valorPrecio.innerText = (precioMaximo + 1) | 0;
  slider.value = (precioMaximo + 1) | 0;

  // Inicializar el rango
  slider.oninput = function() {
    valorPrecio.innerText = this.value;
    filtrarProductos();
  };

  // Filtrar los productos iniciales
  filtrarProductos();
}
//filtrar productos por talla y precio en Tienda y en Compras
function filtrarProductos() {
  // Obtener el valor máximo del precio
  var precioMaximo = document.getElementById("slider").value;
  
  // Obtener las tallas seleccionadas
	var tallasSeleccionadas = [];
	var opcionesTalla = document.getElementsByName("tamano");
	for (var i = 0; i < opcionesTalla.length; i++) {
		if (opcionesTalla[i].checked) {
			tallasSeleccionadas.push(opcionesTalla[i].value);
		}
	}

  // Obtener la lista de productos y los elementos de la lista
  var listaProductos = document.getElementById("lista-productos");
  // Obtener la lista de las compras
  var tablaCompras = document.getElementById("tabla-compras");
  
  if (listaProductos !== null) {
	var elementosLista = listaProductos.getElementsByTagName("li");
	var valoracionSeleccionada = "";
	var radiosValoracion = document.getElementsByName("valoracion");
	for (var i = 0; i < radiosValoracion.length; i++) {
		if (radiosValoracion[i].checked) {
			valoracionSeleccionada = radiosValoracion[i].value;
			break;
		}
	}  
	    for (var i = 0; i < elementosLista.length; i++) {
			var mostrar = true; 
			var elemento = elementosLista[i];
			var precio = parseFloat(elemento.getAttribute("data-precio"));
			var tallas = elemento.getAttribute("data-talla").split(",");
			var valoracionProducto = parseFloat(elemento.getAttribute("data-valoracion"));
			
			if (valoracionProducto < valoracionSeleccionada) {
				mostrar = false;
			}
			for (var j = 0; j < tallasSeleccionadas.length; j++) {
				if (!tallas.includes(tallasSeleccionadas[j])) {
				mostrar = false;
				}
				else{
					mostrar = true;
					break;
				}
			}
	
			if(precio > precioMaximo){
				mostrar=false;
			}
	
			// Mostrar u ocultar el elemento según el precio
			if (mostrar) {
				elemento.style.display =  "inline-block";
			} else {
				elemento.style.display = "none";
			}
		}  
	}
	if (tablaCompras !== null) {
	  var elementosTabla = tablaCompras.getElementsByTagName("tr");
		for (var i = 1; i < elementosTabla.length; i++) {
			var mostrar = true; 
			var elemento = elementosTabla[i];
			var precio = parseFloat(elemento.getAttribute("data-precio"));
			var tallas = elemento.getAttribute("data-talla");
			var tallasSeparadas = tallas.split("<br>");
			for (var j = 0; j < tallasSeleccionadas.length; j++) {
				if (!tallasSeparadas.includes(tallasSeleccionadas[j])) {
				mostrar = false;
				}
				else{
					mostrar = true;
					break;
				}
			}
	
			if(precio > precioMaximo){
				mostrar=false;
			}
	
			// Mostrar u ocultar el elemento según el precio
			if (mostrar) {
				elemento.style.display =  "table-row";
			} else {
				elemento.style.display = "none";
			}
		}
	}
}
//Buscador de productos en Tienda y en Compras
function buscarProductos() {
  var input = document.getElementById("campo-busqueda");
  var filtro = input.value.toUpperCase();
  
  var listaProductos = document.getElementById("lista-productos");
  var tablaCompras = document.getElementById("tabla-compras");

  if(listaProductos !== null){
	var elementosLista = listaProductos.getElementsByTagName("li");
	for (var i = 0; i < elementosLista.length; i++) {
		var elemento = elementosLista[i];
		var nombre = elemento.getAttribute("data-nombre").toUpperCase();
		if (nombre.indexOf(filtro) > -1) {
			elemento.style.display = "inline-block";
		} else {
			elemento.style.display = "none";
		}
	}
  }
  
  if(tablaCompras !== null){
	var elementosTabla = tablaCompras.getElementsByTagName("tr");
	for (var i = 1; i < elementosTabla.length; i++) {
		var elemento = elementosTabla[i];
		var nombre = elemento.getAttribute("data-nombre").toUpperCase();

		if (nombre.indexOf(filtro) > -1) {
			elemento.style.display = "table-row";
		} else {
			elemento.style.display = "none";
		}
	}
  }
}
//Resetear filtros
function quitarFiltros(){
	var slider = document.getElementById("slider");
	var valorPrecio = document.getElementById("valor-precio");

	slider.value = 200;
	valorPrecio.innerText = slider.value;  
	
	var tallas = document.getElementsByName("tamano");
	for (var i = 0; i < tallas.length; i++) {
		tallas[i].checked = false;
	}
	
	var valoracionRadios = document.getElementsByName("valoracion");
	for (var i = 0; i < valoracionRadios.length; i++) {
		valoracionRadios[i].checked = false;
	}
	$('.estrellas img').attr('src', 'img/estrellaVacia.png');
	var estrellasSeleccionadas = $('input[name="valoracion"]:checked').val();		
	for (var i = 1; i <= estrellasSeleccionadas; i++) {
		$('.estrellas img').eq(i - 1).attr('src', 'img/estrellaLlena.png');
  	}
  
	document.getElementById("campo-busqueda").value = "";
  
  filtrarProductos();
}

function ordenarProductos() {
  // Obtener la lista de productos y los elementos de la lista
  var listaProductos = document.getElementById("lista-productos");
  var tablaCompras = document.getElementById("tabla-compras");

  // Obtener el valor seleccionado en el menú desplegable "Ordenar por"
  var ordenSeleccionado = document.getElementById("ordenar-productos").value;

  // Convertir la lista de elementos a un array para poder ordenarla
  if(listaProductos !== null){
	var elementosLista = listaProductos.getElementsByTagName("li");
	var arrayElementos = Array.prototype.slice.call(elementosLista);
  }else{
  	var elementosTabla = tablaCompras.getElementsByTagName("tr");
	var arrayElementos = Array.prototype.slice.call(elementosTabla);
  }

  // Ordenar el array según el valor seleccionado en el menú desplegable
  switch (ordenSeleccionado) {
	case 'nombreA':
		arrayElementos.sort(function(a, b) {
			var nombreA = a.getAttribute("data-nombre");
			var nombreB = b.getAttribute("data-nombre");
			if (nombreA < nombreB) {
				return -1;
			}
			if (nombreA > nombreB) {
				return 1;
			}
			return 0;
		});
    break;
	case 'nombreZ':
		arrayElementos.sort(function(a, b) {
			var nombreA = a.getAttribute('data-nombre');
			var nombreB = b.getAttribute('data-nombre');
			if (nombreA > nombreB) {
				return -1;
			}
			if (nombreA < nombreB) {
				return 1;
			}
			return 0;
		});
    break;
	case 'precioA':
		arrayElementos.sort(function(a, b) {
			var precioA = parseFloat(a.getAttribute('data-precio'));
			var precioB = parseFloat(b.getAttribute('data-precio'));
			return precioA - precioB;
		});
    break;
  case 'precioD':
		arrayElementos.sort(function(a, b) {
			var precioA = parseFloat(a.getAttribute('data-precio'));
			var precioB = parseFloat(b.getAttribute('data-precio'));
			return precioB - precioA;
		});
    break;
  default:
    break;
}

  // Volver a agregar los elementos ordenados a la lista
  for (var i = 1; i < arrayElementos.length; i++) {
	if(listaProductos !== null){
		listaProductos.appendChild(arrayElementos[i]);
	}
	else{
		tablaCompras.appendChild(arrayElementos[i]);
	}
  }
}

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
			url:"procesaComentariosProd.php?id="+id,
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
			  if(comentarios.length>0)
			 {
			calcularMedia(comentarios);
			const estrellaLlena = '<img class="estrella" src="img/estrellaLlena.png">';
			$('.mediaProducto').append(estrellaLlena);
			
			}

		  });

		  $('input[type="radio"]').click(function() {
			$('.estrellas img').attr('src', 'img/estrellaVacia.png');
			var estrellasSeleccionadas = $('input[name="valoracion"]:checked').val();
			
			for (var i = 1; i <= estrellasSeleccionadas; i++) {
				$('.estrellas img').eq(i - 1).attr('src', 'img/estrellaLlena.png');
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

		$(".comentariosProd-form").submit(function(event) {
			event.preventDefault(); // evita el envío del formulario por defecto
			
			var formData = $(this).serialize(); // serializa los datos del formulario
			
			$.ajax({
			  type: "POST",
			  url: "creaComentariosProd.php",
			  contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
			  data: formData,
			  success: function(response) {
				
				var nuevoComentario = {
					id: response,
					usuario: $('input[name="autor"]').val(),
					contenido: $('textarea[name="comentarioProd"]').val(),
					review: $('input[name="valoracion"]:checked').val(),
					fecha: $('input[name="fecha"]').val()
				  };
				  
				insertaNuevoComentario(nuevoComentario,listaComentarios);  
				comentarios.push(nuevoComentario);
				alert("Tu review ha sido enviado con éxito");

				$('textarea[name="comentarioProd"]').val("");
				calcularMedia(comentarios);
				
				if(comentarios.length==1)
				{
					const estrellaLlena = '<img class="estrella" src="img/estrellaLlena.png">';
					$('.mediaProducto').append(estrellaLlena);
			   }
			  

			  },
			  error: function(jqXHR, textStatus, errorThrown) {
				
				alert("Ha ocurrido un error al enviar tu review: " + textStatus + " " + errorThrown);
			  }
			});
			
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

		const divReview = document.createElement('div');
		divReview.classList.add('comentario-review');
		divReview.innerHTML = generarEstrellas(comentario.review);
  	

  		// Agregar los elementos al comentario
  		divComentario.appendChild(divAutor);
  		divComentario.appendChild(divCuerpo);
  		divComentario.appendChild(divFecha);
  		divComentario.appendChild(divReview);
		  
  		// Agregar el comentario a la lista de comentarios
  		listaComentarios.append(divComentario);
  }

  function calcularMedia(comentarios) {
	var suma=0;
	for(var i=0;i<comentarios.length;i++)
	{
		suma+=parseInt(comentarios[i].review);
		
	}
	var media=suma/comentarios.length;
	media = Number(media.toFixed(2));
	$('.mediaProducto p').text(media+ "/5");
	estableceColor(media);
}

function estableceColor(media) {
	var r = Math.round(255 - (media / 5) * 255);
	var g = Math.round((media / 5) * 255);
	var b = 0;
	$('.mediaProducto p').css("backgroundColor","rgb(" + r + "," + g + "," + b + ")");
}


  function generarEstrellas(cantidad) {
	const estrellaVacia = '<img src="img/estrellaVacia.png">';
	const estrellaLlena = '<img src="img/estrellaLlena.png">';
	let estrellasHtml = '';
	
	for (let i = 1; i <= 5; i++) {
	  if (i <= cantidad) {
		estrellasHtml += estrellaLlena;
	  } else {
		estrellasHtml += estrellaVacia;
	  }
	}
	
	return estrellasHtml;
  }

  function insertaNuevoComentario(comentario,listaComentarios) {
	const divComentario = document.createElement('div');
	  divComentario.classList.add('comentario');
	  divComentario.setAttribute('idComentario', comentario.id);
	  divComentario.classList.add('nuevoComentario');

	  const divAutor = document.createElement('div');
	  divAutor.classList.add('comentario-autor');
	  divAutor.textContent = comentario.usuario;

	  const divCuerpo = document.createElement('div');
	  divCuerpo.classList.add('comentario-cuerpo');
	  divCuerpo.textContent = comentario.contenido;

	  const divFecha = document.createElement('div');
	  divFecha.classList.add('comentario-fecha');
	  divFecha.textContent = comentario.fecha;

	  const divReview = document.createElement('div');
	  divReview.classList.add('comentario-review');
	  divReview.innerHTML = generarEstrellas(comentario.review);
	

	  // Agregar los elementos al comentario
	  divComentario.appendChild(divAutor);
	  divComentario.appendChild(divCuerpo);
	  divComentario.appendChild(divFecha);
	  divComentario.appendChild(divReview);

	  // Agregar el comentario a la lista de comentarios
	  listaComentarios.prepend(divComentario);
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

//Ventana pago confirmado
function confirmarEditar(){
    window.alert("Has editado el producto con éxito");
}

//Ventana pago confirmado
function confirmarEliminar(){
    window.alert("Has elimado el producto con éxito. En caso de que existan compras de dicho producto se ha reducido el stock a 0 y solo será visible para los administradores");
}
