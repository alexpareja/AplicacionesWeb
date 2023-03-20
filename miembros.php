<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Miembros';
$contenidoPrincipal = <<<EOS
<div id = "miembros">
    <h1>Equipo de la Quinta Caja</h1>
    <ul>
      <li><a href="#lucero" class="ref">Lucero Abregú</a></li>
      <li><a href="#sergio" class="ref">Sergio Atienza</a></li>
      <li><a href="#elena" class="ref">Elena Basca</a></li>
      <li><a href="#jesus" class="ref">Jesús Hernández</a></li>
      <li><a href="#cristina" class="ref">Cristina Morillo</a></li>
      <li><a href="#alejandro" class="ref">Alejandro Pareja</a></li>
    </ul>
    <h3 id="lucero">Lucero Abregú</h3>
    <p>
      <img src="img/lucero.jpg" alt="Lucero" class="imagen">
      <br>
      <span class = "negrita"> Nombre completo: </span> Lucero Abregú Reátegui
      <br>
      <span class = "negrita"> Correo electrónico: </span> luabregu@ucm.es
      <br>
      <span class = "negrita"> Descripción: </span>
      En mi tiempo libre, me gusta cantar, dibujar, ir al gimnasio y a la iglesia. Además, disfruto sacar a pasear a mi perra, Lima, y hacer puzzles.  
    </p>

    <h3 id="sergio">Sergio Atienza</h3>
    <p>
      <img src="img/sergio.jpg" alt="Sergio" class="imagen">
      <br>
      <span class = "negrita"> Nombre completo: </span> Sergio Atienza Fuertes
      <br>
      <span class = "negrita"> Correo electrónico: </span> sergioat@ucm.es
      <br>
      <span class = "negrita"> Descripción: </span>
      Me gusta el fútbol, soy aficionado al Villarreal CF. También me gusta mucho leer y pasar el día en el transporte público yendo a la UCM.
    </p>
	
	  <h3 id="elena">Elena Basca</h3>
    <p>
      <img src="img/elena.jpg" alt="Elena" class="imagen">
      <br>
      <span class = "negrita"> Nombre completo: </span> Madalina Elena Basca
      <br>
      <span class = "negrita"> Correo electrónico: </span> mbasca@ucm.es
      <br>
      <span class = "negrita"> Descripción: </span>
      Me gusta ver series y visitar sitios nuevos. Mi principal hobbie es Eurovision. Me encanta jugar juegos de mesa con mis familiares y amigos. 
    </p>

    <h3 id="jesus">Jesús Hernández</h3>
    <p>
      <img src="img/jesus.jpg" alt="Jesús" class="imagen">
      <br>
      <span class = "negrita"> Nombre completo: </span> Jesús Hernández Guillamot
      <br>
      <span class = "negrita"> Correo electrónico: </span> jesuhe02@ucm.es
      <br>
      <span class = "negrita"> Descripción: </span> Me gusta el fútbol, la fiesta, conocer gente y Cuenca Club. Soy una persona abierta de mente y trato de respetar siempre a los demás.
    </p>

    <h3 id="cristina">Cristina Morillo</h3>
    <p>
      <img src="img/cristina.jpg" alt="Cristina" class="imagen">
      <br>
      <span class = "negrita"> Nombre completo: </span> Cristina Morillo Leal
      <br>
      <span class = "negrita"> Correo electrónico: </span> cmoril01@ucm.es
      <br>
      <span class = "negrita"> Descripción: </span>
      Me encanta la música, en mis tiempos libres me gusta tocar el piano y la guitarra. Soy una apasionada del fútbol, sobre todo del Atlético de Madrid. Me gusta perder el tiempo viendo series y películas.
    </p>
	
	<h3 id="alejandro">Alejandro Pareja</h3>
  <p>
    <img src="img/alejandro.jpg" alt="Alejandro" class="imagen">
    <br>
    <span class = "negrita"> Nombre completo: </span> Alejandro Pareja Arriaga
    <br>
    <span class = "negrita"> Correo electrónico: </span> aparej01@ucm.es
    <br>
    <span class = "negrita"> Descripción: </span>
    En mi tiempo libre me gusta viajar y descubrir sitios nuevos, así como ver fútbol. Me encanta escuchar música y tengo bastante interés en la informática y los ordenadores. Me apasiona aprender cosas nuevas, sobre todo del espacio exterior.
</div> 
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
