<?php
include_once ("includes/configuracion.php");

$contenidoPrincipal = <<<EOS
<div class="producto">
EOS; 
if(isset($_GET['id']) && !empty($_GET['id'])) {
$id=$_GET ["id"];
$producto=es\ucm\fdi\aw\Producto::buscaPorId($id);  
if($producto)
{
  if (isset($_SESSION['admin']) && $_SESSION['admin']) {
    $id=$_GET ["id"];
    $contenidoPrincipal .= <<<EOS
        <ul class='botones'>
          <li>
            <form action='editarProd.php'>
              <input type="hidden" name="id" value="$id">
              <button type="submit">Editar Producto</button>
              
            </form>
          </li>
        </ul>
    EOS;} 
$imagenProducto = "img/producto_" . $producto->getId() . ".png";
$nombre=$producto->getNombre();
$tituloPagina = $nombre;
$desc=$producto->getDescripcion();
$oferta= $producto->getOferta();
$precio=$producto->getPrecio();
if($oferta > 0) {
	$precio=$precio * (100- $oferta) /100;
}
$form = new es\ucm\fdi\aw\FormularioAnadirCarrito();
$form->setProducto($producto);
$htmlFormRegistro = $form->gestiona();
$contenidoPrincipal .= <<<EOS
    <img class='imgProducto' src="$imagenProducto" alt='Imagen del producto'>
    <div class="infoProducto">
    <h2>$nombre</h2>
    <p>$desc</p>
    <h3> $precio € </h3>
    </div>
    $htmlFormRegistro
    </div>
    <div class="comments">
    <ul>
    <!--aquí se incluirán los comentarios, sacados de la bbdd-->
    </ul>
    </div>
    EOS;
}
else{ //si no se encuentra el producto
  $tituloPagina = "Producto no encontrado";
  $contenidoPrincipal .= <<<EOS
  <h2 class="error"> No se encuentra el producto </h2>
  EOS;
}
}
else{ //si no está definido parámetro id en GET
  $tituloPagina = "Error de búsqueda";
  $contenidoPrincipal .= <<<EOS
  <h2 class="error"> Se ha producido un error </h2>
  EOS;
}
$contenidoPrincipal .= <<<EOS
        <h2 class="titulo1">Sugerencias</h2>
        <h2 class="titulo2">de La Quinta Caja</h2>
    EOS;
    //Se muestran los porductos de la tienda
    $tienda = new es\ucm\fdi\aw\Tienda();
    $contenidoPrincipal .= $tienda->productosAleatoriosEnTienda();
    
require __DIR__.'/includes/plantillas/plantilla.php';