<!DOCTYPE html>
<html lang="es">
<head>
  <title>La Quinta Caja Contacto</title>
  <link href="css/contacto.css" rel="stylesheet" type="text/css">
  <meta charset="UTF-8">
</head>
<body>
	<?php
		include("includes/comun/cabecera.php");
	?>
  <div id="contact-form">
    <h1>Contacto</h1>
    <form action="mailto:laquintacaja@gmail.com" method="post">
      <label for="name">Nombre:</label>
      <input type="text" id="name" name="name" required>
      <br>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <br>
      <label>Motivo de la consulta:</label><br>
      <input type="radio" id="evaluacion" name="motivo"     value="Evaluación">
	  <label for="evaluacion" class="izq">Evaluación</label><br>
      <input type="radio" id="sugerencias" name="motivo" value="Sugerencias">
      <label for="sugerencias" class="izq">Sugerencias</label><br>
      <input type="radio" id="criticas" name="motivo" value="Críticas">
      <label for="criticas" class="izq">Críticas</label><br>
      <br>
      <label for="message">Mensaje:</label>
      <br>
      <textarea id="message" name="message" required></textarea>
      <br>
      <input type="checkbox" id="terminos" name="terminos" required>
      <label for="terminos" class="izq">Marque esta casilla para verificar que ha leído nuestros términos y condiciones del servicio</label>
      <br>
      <input type="submit" value="Enviar">
    </form>
  </div>
</body>
</html>