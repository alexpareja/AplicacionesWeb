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
}

//Slider precio se actualiza automáticamente
window.onload = function() {
  // Obtener el control deslizante de rango y el elemento de valor
  var slider = document.getElementById("slider");
  var valorPrecio = document.getElementById("valor-precio");

  // Inicializar el rango
  slider.oninput = function() {
    valorPrecio.innerText = this.value;
    filtrarProductos();
  };

  // Filtrar los productos iniciales
  filtrarProductos();
}

//filtrar Productos, de momento solo por el precio
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
	    for (var i = 0; i < elementosLista.length; i++) {
			var mostrar = true; 
			var elemento = elementosLista[i];
			var precio = parseFloat(elemento.getAttribute("data-precio"));
			var tallas = elemento.getAttribute("data-talla").split(",");

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
		for (var i = 0; i < elementosTabla.length; i++) {
			var mostrar = true; 
			var elemento = elementosTabla[i];
			var precio = parseFloat(elemento.getAttribute("data-precio"));
			var talla = elemento.getAttribute("data-talla");

			for (var j = 1; j < tallasSeleccionadas.length; j++) {
				if (talla !== tallasSeleccionadas[j] && talla !== null) {
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

function quitarFiltros(){
	var slider = document.getElementById("slider");
	var valorPrecio = document.getElementById("valor-precio");

	slider.value = 200;
	valorPrecio.innerText = slider.value;  
	
	var tallas = document.getElementsByName("tamano");
	for (var i = 0; i < tallas.length; i++) {
		tallas[i].checked = false;
	}
  
	document.getElementById("campo-busqueda").value = "";
  
  filtrarProductos();
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
	
	