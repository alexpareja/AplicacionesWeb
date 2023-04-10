<div id="menuIzqTienda">
	<h2>Filtros</h2>
			<ul class= "filtros">
				<li>Ordenar por:</li>
				<li><select id="ordenar-productos" name="ordenar-productos">
						<option value="nombreA">Nombre (A -> Z)</option>
						<option value="nombreZ">Nombre (Z -> A)</option>
						<option value="precioA">Precio ascendente</option>
						<option value="precioD">Precio descendente</option>
					</select>
				</li>
				<li>Buscar:</li>
				<li>
				<input type="text" id="campo-busqueda" placeholder="Buscar productos..." oninput="buscarProductos()">
				</li>
				<li>Talla:</li>
				<li>
					<ul class ="checkfiltros">
					<li><input type="checkbox" name="tamano" value="XS" id="tamano-filtro" onclick="filtrarProductos()">XS</li>
					<li><input type="checkbox" name="tamano" value="S" id="tamano-filtro" onclick="filtrarProductos()">S</li>
					<li><input type="checkbox" name="tamano" value="M" id="tamano-filtro" onclick="filtrarProductos()">M</li>
					<li><input type="checkbox" name="tamano" value="L" id="tamano-filtro" onclick="filtrarProductos()">L</li>
					<li><input type="checkbox" name="tamano" value="XL" id="tamano-filtro" onclick="filtrarProductos()">XL</li>
					</ul>
				</li>
				<li>
					<p>Precio máximo: <span id="valor-precio"></span> euros</p>
					<input type="range" id="slider" min="0" max="100" value="100" step="1">
				</li>
				<li>
					<button type="submit" onclick="quitarFiltros()">Resetear filtros</button>
				</li>
				<li>
					<button type="submit" onclick="mostrarMenu()">Ocultar filtros</button>
				</li>
			</ul>
</div>

