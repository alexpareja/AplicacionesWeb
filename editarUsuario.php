<?php
require_once __DIR__.'/includes/configuracion.php';

	$tituloPagina = 'Editar Usuario';
	$contenidoPrincipal = '';
	
	$id=$_SESSION['id'];
	$usuario=es\ucm\fdi\aw\Usuario::buscaPorId($id);  

	
	$nombre=$usuario->getNombre();
	$apellido1=$usuario->getApellido1();
	$apellido2=$usuario->getApellido2();
	$email=$usuario->getCorreo();
	$pass=$usuario->getPassword();
	$direccion=$usuario->getDireccion();
	$form = new es\ucm\fdi\aw\FormularioEditarUsuario();
	$form->setUsuario($usuario);
	$htmlFormEUsur = $form->gestiona();
	
	$contenidoPrincipal .= <<<EOS
	$htmlFormEUsur
	EOS;
	
require __DIR__.'/includes/plantillas/plantillaFormulario.php';