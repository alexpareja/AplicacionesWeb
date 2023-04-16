<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'terminosycondiciones';

$contenidoPrincipal = <<<EOS
<div class="terminosycondiciones">
	<h2>Términos y condiciones</h2>
	<br>
	<p>¡Bienvenido a La Quinta Caja!</p>
	<br>
	<p>Al realizar una compra en nuestra tienda, usted acepta los siguientes términos y condiciones:</p>
	<ul>
		<li>Precios: Todos los precios están en la moneda local y pueden estar sujetos a cambios sin previo aviso.</li>
		<li>Pagos: Aceptamos pagos en efectivo.</li>
		<li>Envíos: Nos esforzamos por enviar todos los pedidos en un plazo de 24 a 48 horas. El plazo de entrega dependerá del destino y del tipo de envío elegido.</li>
		<li>Devoluciones: Si no está satisfecho con su compra, aceptamos devoluciones en un plazo de 30 días a partir de la fecha de entrega. Todos los productos devueltos deben estar en su estado original y con su embalaje original.</li>
		<li>Garantía: Ofrecemos una garantía limitada de 1 año en todos nuestros productos.</li>
		<li>Privacidad: Nos compremetemos a proteger su privacidad y no compartimos su información personal con terceros.</li>
	</ul>
	<p>Al realizar una compra en nuestra tienda, usted acepta estos términos y condiciones. Si tiene alguna pregunta o inquietud, no dude en ponerse en contacto con nosotros.</p>
</div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>