<?php
use es\ucm\fdi\aw\CajaSuscripcion;
require_once __DIR__.'/includes/configuracion.php';
require_once __DIR__.'/includes/CajaSuscripcion.php';

$tituloPagina = 'Mi Perfil';
$contenidoPrincipal = '';

$id = $_SESSION['id'];
$nombre = $_SESSION['nombre'];
$apellido1 = $_SESSION['apellido1'];
$apellido2 = $_SESSION['apellido2'];
$email = $_SESSION['email'];
$direccion = $_SESSION['direccion'];

include("includes/comun/menuIzqCuenta.php");

if ($_SESSION['rol'] == 'U') {
    $suscripcionCabecera = '<h2>La Quinta Caja Free:</h2>';
    $suscripcionContenido = '<p>Información sobre la cuenta gratuita:</p>
                             <ul>
                                <li>Comprar en La Quinta Caja.</li>
                                <li>Acceso a la zona Mi Cuenta (favoritos, ver compras realizadas, perfil y plan de suscripción).</li>
                                <li>Dejar comentarios en los productos de la tienda y entradas del blog.</li>
                             </ul>
                             <a href="suscripcion.php" class="boton-suscripcion">Hazte premium</a>';
    $claseCabecera = "cabecera-free";

} elseif ($_SESSION['rol'] == 'P') {
    $caja = CajaSuscripcion::buscaPorUsuario($id);
    $idCaja = $caja->getId();
    $fechaCaja = $caja->getFechaCaja();
    $fechaActual = new DateTime();
    $fechaCajaFormato = DateTime::createFromFormat('Y-m-d H:i:s', $fechaCaja);
    
    if ($fechaActual->format('Y-m-d') === $fechaCajaFormato->format('Y-m-d')) {
      $fechaActualMasUnMes = $fechaActual->modify('+1 month')->format('Y-m-d H:i:s');
      CajaSuscripcion::edita($idCaja, $id, $fechaActualMasUnMes);
      $fechaCaja = $caja->getFechaCaja();
    }

    $suscripcionCabecera = '<h2>La Quinta Caja Premium:</h2>';
    $suscripcionContenido = '<p>Información sobre la cuenta premium:</p>
                         <ul>
                            <li>Ventajas de usuario La Quinta Caja Free.</li>
                            <li>10% de descuento en todas las compras.</li>
                            <li>Caja gratuita de forma mensual.</li>
                         </ul>
                         <p class="caja">Fecha de la próxima caja gratuita: ' . date("d/m/Y", strtotime($fechaCaja)) . '</p>
                         <a href="suscripcion.php" class="boton-suscripcion">Darse de baja</a>';
    $claseCabecera = "cabecera-premium";
} elseif ($_SESSION['rol'] == 'A') {
    $suscripcionCabecera = '<h2>La Quinta Caja Administrador</h2>';
    $suscripcionContenido = '<p>Información sobre la cuenta de administrador:</p>
                             <ul>
                                <li>Ventajas de usuario La Quinta Caja Free.</li>
                                <li>Añadir, editar y eliminar productos en la tienda.</li>
                                <li>Añadir, editar y eliminar entradas en el blog.</li>
                                <li>Ver compras realizadas por los clientes.</li>
                             </ul>
                             <a href="suscripcion.php" class="boton-suscripcion">Ver suscripciones</a>';
    $claseCabecera = "cabecera-admin";
}

$contenidoPrincipal = <<<EOS
<div class="perfil">
  <div class="perfil-contenedor">
    <h2>Perfil</h2>
    <h3>Información personal</h3>
    <br>
    <div>
      <label>Nombre</label>
      <span>$nombre</span>
    </div>
    <div>
      <label>Apellidos</label>
      <span>$apellido1 $apellido2</span>
    </div>
    <div>
      <label>Correo electrónico</label>
      <span>$email</span>
    </div>
    <div>
      <label>Dirección</label>
      <span>$direccion</span>
    </div>
    <div class="botones">
      <form action='editarUsuario.php'>
        <input type="hidden" name="id" value="$id">
        <button type="submit" class="boton-edicion">Editar</button>
      </form>
    </div>
    <h3>Plan usuario</h3>
  </div>
  <div class="tipos-suscripcion">
      <div class="suscripcion-contenedor-perfil">
        <div class=$claseCabecera>
          $suscripcionCabecera
        </div>
        <div class="cuenta">
          $suscripcionContenido
        </div>
    </div>
</div>
</div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>
