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
  <img class='imgProducto'src="img/producto_id.png" alt="Imagen del producto">
  <div class="producto">
    <h2>Nombre del producto</h2> <!--esto se sacará de la base de datos, mediante clase ProductoSA, que tendrá método obtener producto, que nos dará toda la información requerida-->
    <p>Descripción del producto</p>
    <form>
      <label for="talla">Talla:</label>
      <select id="talla" name="size"> <!--las tallas también se sacarán de la base de datos-->
        <option value="s">S</option>
        <option value="m">M</option>
        <option value="l">L</option>
        <option value="xl">XL</option>
      </select>
      <label for="cantidad">Cantidad:</label>
      <input type="number" id="quantity" name="quantity" value="1" min="1">
      <label for="price">Precio:</label>
      <input type="text" id="price" name="price" value="99.99" readonly>
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