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