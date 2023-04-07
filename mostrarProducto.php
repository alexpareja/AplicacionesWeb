<?php
include_once ("includes/configuracion.php");

$contenidoPrincipal = <<<EOS
<div id="producto">
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
$precio=$producto->getPrecio();
$form = new es\ucm\fdi\aw\FormularioAnadirCarrito();
$form->setProducto($producto);
$htmlFormRegistro = $form->gestiona();
$contenidoPrincipal .= <<<EOS
    <img class='imgProducto' src="$imagenProducto" alt='Imagen del producto'>
    <div class="infoProducto">
    <h2>$nombre</h2>
    <p>$desc</p>
    <h3>$precio</h3>
    </div>
    $htmlFormRegistro
    </div>
    <div class="comments">
    <h3>Comentarios</h3>
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
require __DIR__.'/includes/plantillas/plantilla.php';