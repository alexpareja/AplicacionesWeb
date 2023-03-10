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
  <div id="contacto-form">
    <form action="mailto:laquintacaja@gmail.com" method="post">
      <fieldset>
      <legend>Contacto</legend>
      <div>
      <p><label for="name">Nombre:</label>
      <input type="text" id="name" name="name" required></p>
      </div>
      <div>
      <p><label for="email">Email:</label>
      <input type="email" id="email" name="email" required></p>
      </div>
      <div>
      <p><label>Motivo de la consulta:</label></p>  
      <p><input type="radio" id="evaluacion" name="motivo" value="Evaluación">
      <label for="evaluacion" class="izq">Evaluación</label></p>
      <p><input type="radio" id="sugerencias" name="motivo" value="Sugerencias">
      <label for="sugerencias" class="izq">Sugerencias</label></p>
      <p><input type="radio" id="criticas" name="motivo" value="Críticas">
      <label for="criticas" class="izq">Críticas</label></p>
      </div>
      <div>
      <p><label for="message">Mensaje:</label></p>
      <p><textarea id="message" name="message" required></textarea></p>
      </div>
      <div>
      <p><input type="checkbox" id="terminos" name="terminos" required>
      <label for="terminos" class="terminos">Marque esta casilla para verificar que ha leído nuestros <a href="terminosycondiciones.php">términos y condiciones</a> del servicio</label></p>
      </div>
      <div>
      <button type="submit">Enviar</button>
      </div>
    </fieldset>  
    </form>
  </div>
  <?php
    include("includes/comun/pie.php");
  ?>
</body>
</html>