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
	$precioF=round($precio * (100- $oferta) /100,2);
}
$form = new es\ucm\fdi\aw\FormularioAnadirCarrito();
$form->setProducto($producto);
$htmlFormRegistro = $form->gestiona();
$contenidoPrincipal .= <<<EOS
            <img class='imgProducto' src="$imagenProducto" alt='Imagen del producto'>
            <div class="infoProducto">
			<fieldset>
            <h2>$nombre</h2>
            <p>$desc</p>
			</fieldset>
            <div class="precioProducto">
EOS;
            if($oferta>0){
$contenidoPrincipal .= <<<EOS
			<span class="precioOriginal">$precio €</span>
            <span class="precioConOferta">$precioF €</span>
            <span class="oferta">($oferta% de descuento)</span>
EOS;
} else {
	$contenidoPrincipal .= <<<EOS
			<span class="precio">$precio €</span>
EOS;
}
$contenidoPrincipal .= <<<EOS
            </div>
            $htmlFormRegistro
            </div>
            <div class="comentarios">
            <div class="comentarios">
            <h3>Comentarios</h3>
            EOS;
            if (!isset($_SESSION['login'])) {
            $contenidoPrincipal .= <<<EOS
            <h5>Inicia sesion para enviar comentarios</h5>
            EOS;
            
            }
            else {
              $haComprado=es\ucm\fdi\aw\Compra::buscaPorProductoYUsuario($producto->getId(),$_SESSION['id']);
              if(!$haComprado){
              $contenidoPrincipal .= <<<EOS
              <h5>Debes haber comprado el producto para valorarlo</h5>
              EOS;
            }
            else{
            $fechaNuevoComentario=date('Y-m-d H:i:s');
            $contenidoPrincipal .= <<<EOS
            <form class="comentariosProd-form" method="post">
            <input type="hidden" name="id" value="{$_SESSION['id']}">
            <input type="hidden" name="autor" value="{$_SESSION['nombre']}">
            <input type="hidden" name="producto" value="{$producto->getId()}">
            <input type="hidden" name="fecha" value="{$fechaNuevoComentario}">
            <textarea class="comentarioProd" name="comentarioProd" required placeholder="Escribe aquí tu comentario"></textarea>
            <div class="estrellas">
            <input type="radio" name="valoracion" id="estrella1" value="1" />
            <label for="estrella1"><img src="img/estrellaVacia.png" /></label>
            <input type="radio" name="valoracion" id="estrella2" value="2" />
            <label for="estrella2"><img src="img/estrellaVacia.png" /></label>
            <input type="radio" name="valoracion" id="estrella3" value="3" />
            <label for="estrella3"><img src="img/estrellaVacia.png" /></label>
            <input type="radio" name="valoracion" id="estrella4" value="4" />
            <label for="estrella4"><img src="img/estrellaVacia.png" /></label>
            <input type="radio" name="valoracion" id="estrella5" value="5" />
            <label for="estrella5"><img src="img/estrellaVacia.png" /></label>
            </div>
            <button type="submit">Enviar comentario</button>
            </form>
            EOS;
            }
            $contenidoPrincipal .= <<<EOS
            <ul class="listaComentarios">
            </ul>
            </div>
            EOS;
          }
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
        <h2 class="titulo2">Sugerencias</h2>
    EOS;
    //Se muestran los porductos de la tienda
    $tienda = new es\ucm\fdi\aw\Tienda();
    $contenidoPrincipal .= $tienda->productosAleatoriosEnTienda();
    
require __DIR__.'/includes/plantillas/plantillaProducto.php';