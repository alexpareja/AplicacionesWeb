<?php
require_once __DIR__.'/includes/configuracion.php';
$tituloPagina = 'Suscripción';
$contenidoPrincipal = <<<EOS
<div class="cabecera-perfil">
  <h2>Zona Suscripción</h2>
  <br>
  <p>Aquí puedes encontrar toda la información sobre tu suscripción</p>
</div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>