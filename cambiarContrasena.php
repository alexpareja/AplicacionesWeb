<?php
require_once __DIR__.'/includes/configuracion.php';

	$tituloPagina = 'Cambiar Contraseña';
	$contenidoPrincipal = '';
	
	$id=$_SESSION['id'];
	$usuario=es\ucm\fdi\aw\Usuario::buscaPorId($id);  

	
	$nombre=$usuario->getNombre();
	$apellido1=$usuario->getApellido1();
	$apellido2=$usuario->getApellido2();
	$email=$usuario->getCorreo();
	$pass=$usuario->getPassword();
	$direccion=$usuario->getDireccion();
	$form = new es\ucm\fdi\aw\FormularioCambiarContrasena();
	$form->setUsuario($usuario);
	$htmlFormCPass = $form->gestiona();

	$contenidoPrincipal .= <<<EOS
	$htmlFormCPass
	EOS;
	
require __DIR__.'/includes/plantillas/plantillaFormulario.php';