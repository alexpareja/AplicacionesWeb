<!DOCTYPE html>
<html lang="es">
<head>
  <title>La Quinta Caja Contacto</title>
  <meta charset="UTF-8">
</head>
<body>
  <?php
    include("includes/comun/cabecera.php");
  ?>
  <div id="contact-form">
    <form action="mailto:laquintacaja@gmail.com" method="post">
      <fieldset>
      <legend>Contacto</legend>
      <p><label for="name">Nombre:</label>
      <input type="text" id="name" name="name" required></p>
      <p><label for="email">Email:</label>
      <input type="email" id="email" name="email" required></p>
      <p><label>Motivo de la consulta:</label></p>  
      <p><input type="radio" id="evaluacion" name="motivo" value="Evaluación">
      <label for="evaluacion" class="izq">Evaluación</label></p>
      <p><input type="radio" id="sugerencias" name="motivo" value="Sugerencias">
      <label for="sugerencias" class="izq">Sugerencias</label></p>
      <p><input type="radio" id="criticas" name="motivo" value="Críticas">
      <label for="criticas" class="izq">Críticas</label></p>
      <p><label for="message">Mensaje:</label></p>
      <p><textarea id="message" name="message" required></textarea></p>
      <p><input type="checkbox" id="terminos" name="terminos" required>
      <label for="terminos" class="izq">Marque esta casilla para verificar que ha leído nuestros <a href="terminosycondiciones.php">términos y condiciones</a> del servicio</label></p>
      <p><input type="submit" value="Enviar"></p>
    </fieldset>  
    </form>
  </div>
  <?php
    include("includes/comun/pie.php");
  ?>
</body>
</html>