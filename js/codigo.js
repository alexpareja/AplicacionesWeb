//Mostrar el menu izquierdo de filtros
function mostrarMenu() {
  var menu = document.getElementById("menuIzqTienda");
  var tienda = document.getElementById("tienda");
  var pie = document.getElementById("pie");
  var botonFiltros = document.getElementById("boton-filtros");
  
    if (menu.classList.contains("mostrarMenu")) {
        botonFiltros.textContent = "Mostrar filtros";
      } else {
        botonFiltros.textContent = "Ocultar filtros";
      }
  
  menu.classList.toggle("mostrarMenu");
  tienda.classList.toggle("mostrarMenu");
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

  // Obtener la lista de productos y los elementos de la lista
  var listaProductos = document.getElementById("lista-productos");
  var elementosLista = listaProductos.getElementsByTagName("li");
  
  for (var i = 0; i < elementosLista.length; i++) {
    var elemento = elementosLista[i];
    var precio = parseFloat(elemento.getAttribute("data-precio"));

    // Mostrar u ocultar el elemento según el precio
    if (precio > precioMaximo) {
      elemento.style.display = "none";
    } else {
      elemento.style.display = "inline-block";
    }
  }
}