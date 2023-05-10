<div id="menuIzqTienda" class='mostrarMenu-not'>
	<h2 class="tit-filtros">Filtros</h2>
			<ul class= "filtros">
				<li>Ordenar por:</li>
				<li><select id="ordenar-productos" name="ordenar-productos" onchange="ordenarProductos()">
						<option value="nombreA">Nombre (A -> Z)</option>
						<option value="nombreZ">Nombre (Z -> A)</option>
						<option value="precioA">Precio ascendente</option>
						<option value="precioD">Precio descendente</option>
					</select>
				</li>
				
				<li>Buscador de productos:</li>
				<li>
				<input type="text" id="campo-busqueda" class="campo-busqueda" placeholder="Buscar..." oninput="buscarProductos()">
				</li>
				
				<li>Talla:</li>
				<li>
					<ul class ="checkfiltros">
					<li><input type="checkbox" name="tamano" value="XS" onclick="filtrarProductos()">XS</li>
					<li><input type="checkbox" name="tamano" value="S" onclick="filtrarProductos()">S</li>
					<li><input type="checkbox" name="tamano" value="M" onclick="filtrarProductos()">M</li>
					<li><input type="checkbox" name="tamano" value="L" onclick="filtrarProductos()">L</li>
					<li><input type="checkbox" name="tamano" value="XL" onclick="filtrarProductos()">XL</li>
					</ul>
				</li>
				
				<li>
					<p>Precio máximo: <span id="valor-precio">200</span> euros</p>
					<input type="range" id="slider" min="0" step="1">
				</li>
				<li>
				<div id="filtro-valoracion">
					<p>Valoración mínima:</p>
					<div class="estrellas">
						<input type="radio" name="valoracion" id="estrella1" value="1" checked onclick="filtrarProductos()"/>
						<label for="estrella1"><img src="img/estrellaVacia.png" /></label>
						<input type="radio" name="valoracion" id="estrella2" value="2" onclick="filtrarProductos()"/>
						<label for="estrella2"><img src="img/estrellaVacia.png" /></label>
						<input type="radio" name="valoracion" id="estrella3" value="3" onclick="filtrarProductos()"/>
						<label for="estrella3"><img src="img/estrellaVacia.png" /></label>
						<input type="radio" name="valoracion" id="estrella4" value="4" onclick="filtrarProductos()"/>
						<label for="estrella4"><img src="img/estrellaVacia.png" /></label>
						<input type="radio" name="valoracion" id="estrella5" value="5"  onclick="filtrarProductos()"/>
						<label for="estrella5"><img src="img/estrellaVacia.png" /></label>
            </div>
				</div>
				</li>
				
				<li>
					<button type="submit" class="botones-filtros" onclick="quitarFiltros()">Resetear filtros</button>
				</li>
				
				<li>
					<button type="submit" class="botones-filtros" onclick="mostrarMenu()">Ocultar filtros</button>
				</li>
			</ul>
</div>

