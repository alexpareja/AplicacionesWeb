<?php
require_once __DIR__.'/includes/configuracion.php';

// Obtener porcentaje de descuento de la petición AJAX
if (isset($_GET['idCupon'])) {
  $descuento = $_GET['idCupon'];
  $_SESSION['cupon_descuento'] = $descuento;
}
?>