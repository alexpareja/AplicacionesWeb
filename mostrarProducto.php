<?php
include_once ("includes/Producto.php");
include_once ("includes/configuracion.php");
$id=$_GET ["id"];
$producto=Producto::buscaPorId($id);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
    <title>La Quinta Caja</title>
    <link href="css/producto.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
  </head>
  <body>
	<?php
		include("includes/comun/cabecera.php");
	?>
  <?php
  $imagenProducto = "img/producto_" . $producto->getId() . ".png";
  echo "<img class='imgProducto' src=$imagenProducto alt='Imagen del producto'>";
  ?>
  
  <div class="producto">
    <?php
    $nombre=$producto->getNombre();
    $desc=$producto->getDescripcion();
    echo "<h2>$nombre</h2>";
    echo "<p>$desc</p>";
    ?>
    <form>
      <label for="talla">Talla:</label>
      <select id="talla" name="size"> <!--las tallas también se sacarán de la base de datos-->
        <option value="xs">XS</option>
        <option value="s">S</option>
        <option value="m">M</option>
        <option value="l">L</option>
        <option value="xl">XL</option>
      </select>
      <label for="cantidad">Cantidad:</label>
      <input type="number" id="quantity" name="quantity" value="1" min="1">
      <label for="price">Precio:</label>
      <?php
      $precio=$producto->getPrecio();
       echo "<input type='text' id='price' name='price' value=$precio readonly>";
      ?>
      
      <button type="submit">Agregar al carrito</button> <!--esto lo procesará una página de compra-->
      <img class='corazon' src="img/corazon.png" alt="Añadir a favoritos"><!--esto será procesado para añadir el producto a favs-->
    </form>
</div>
<div class="comments">
  <h3>Comentarios</h3>
  <ul>
  <!--aquí se incluirán los comentarios, sacados de la bbdd-->
  </ul>
</div>
<?php
	include("includes/comun/pie.php");
	?>
</html> 