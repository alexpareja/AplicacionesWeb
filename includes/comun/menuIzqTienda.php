<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/menuIzqTienda.css" />
	<meta charset="utf-8">
	<title>Cabecera</title>
</head>


<div id="menuIzqTienda">
	<h3>Filtros</h3>
		<form>
			<ul class= "filtros">
				

				<li>Talla</li>
				<li>
					<ul class ="checkfiltros">
					<li><input type="checkbox" name="tamano" value="S">S</input></li>
					<li><input type="checkbox" name="tamano" value="M">M</input></li>
					<li><input type="checkbox" name="tamano" value="L">L</input></li>
					<li><input type="checkbox" name="tamano" value="XL">XL</input></li>
					</ul>
				</li>
				<li>Precio (menor que)</li>
				<li>
					<ul class ="checkfiltros">
					<li><input type="radio" name="menorque" value="25">25€</input></li>
					<li><input type="radio" name="menorque" value="50">50€</input></li>
					<li><input type="radio" name="menorque" value="75">75€</input></li>
					<li><input type="radio" name="menorque" value="100">100€</input></li>
					</ul>
				</li>
				<li>Filtro 3</li>
				<li>Filtro 4</li>
				<li>Filtro 5</li>
				<li>
					<button type="submit">Aplicar filtros</button>
				</li>
			</ul>
		</form>

		
</div>