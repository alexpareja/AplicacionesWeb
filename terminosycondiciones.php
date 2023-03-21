<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'terminosycondiciones';

$contenidoPrincipal = <<<EOS
<div id="terminosycondiciones">
	<h1>Términos y condiciones</h1>
	<p>¡Bienvenido a La Quinta Caja!</p>
	<p>Al realizar una compra en nuestra tienda, usted acepta los siguientes términos y condiciones:</p>
	<ul>Precios: Todos los precios están en la moneda local y pueden estar sujetos a cambios sin previo aviso.</ul>
	<ul>Pagos: Aceptamos pagos en efectivo.</ul>
	<ul>Envíos: Nos esforzamos por enviar todos los pedidos en un plazo de 24 a 48 horas. El plazo de entrega dependerá del destino y del tipo de envío elegido.</ul>
	<ul>Devoluciones: Si no está satisfecho con su compra, aceptamos devoluciones en un plazo de 30 días a partir de la fecha de entrega. Todos los productos devueltos deben estar en su estado original y con su embalaje original.</ul>
	<ul>Garantía: Ofrecemos una garantía limitada de 1 año en todos nuestros productos.</ul>
	<ul>Privacidad: Nos compremetemos a proteger su privacidad y no compartimos su información personal con terceros.</ul>
	<p>Al realizar una compra en nuestra tienda, usted acepta estos términos y condiciones. Si tiene alguna pregunta o inquietud, no dude en ponerse en contacto con nosotros.</p>
</div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>