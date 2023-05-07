<div id="accesibilidad">
  <button id="accesibilidad-btn" onclick="toggleAccesibilidad()"><i class="fas fa-hands-helping white"></i></i></button>
  <div id="divAccess" class= "accesibilidad">
	<button id="accessibility-menu-close" class="accessibility-close" onclick="toggleAccesibilidad()"><i class="fas fa-times white"></i></button>
    <h2>Accesibilidad</h2>

	<ul class="lista-acc">
      <li>
        <label for="alto-contraste"><input id="alto-contraste" type="checkbox" onchange="activarAltoContraste()"> Alto contraste</label>
      </li>
      <li>
        <label for="aumentar-tamano"><input id="aumentar-tamano" type="checkbox" onchange="aumentarTamanoFuente()"> Aumentar tamaño de fuente</label>
      </li>
      <li>
      </li>
    </ul>
  </div>
</div>