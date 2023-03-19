<?php
//Inicio del procesamiento
require_once __DIR__.'/includes/configuracion.php';

//Doble seguridad: unset + destroy
unset($_SESSION['login']);
unset($_SESSION['admin']);
unset($_SESSION['nombre']);
unset($_SESSION['apellido1']);
unset($_SESSION['apellido2']);
unset($_SESSION['email']);
unset($_SESSION['direccion']);


session_destroy(); 
?>