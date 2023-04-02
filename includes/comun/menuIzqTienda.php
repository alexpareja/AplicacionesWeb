<div id="menuIzqTienda">
	<h3>Filtros</h3>
			<ul class= "filtros">
				

				<li>Talla:</li>
				<li>
					<ul class ="checkfiltros">
					<li><input type="checkbox" name="tamano" value="XS" id="tamano-filtro">XS</li>
					<li><input type="checkbox" name="tamano" value="S" id="tamano-filtro">S</li>
					<li><input type="checkbox" name="tamano" value="M" id="tamano-filtro">M</li>
					<li><input type="checkbox" name="tamano" value="L" id="tamano-filtro">L</li>
					<li><input type="checkbox" name="tamano" value="XL" id="tamano-filtro">XL</li>
					</ul>
				</li>
				<li>Precio:</li>
				<li>
					<p>Precio máximo: <span id="valor-precio"></span> euros</p>
					<input type="range" id="slider" min="0" max="100" value="100" step="1">
				</li>
				
				<li>
					<button type="submit" onclick="mostrarMenu()">Ocultar filtros</button>
				</li>
			</ul>
</div>

