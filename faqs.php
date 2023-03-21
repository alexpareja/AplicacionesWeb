<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Faqs';

$contenidoPrincipal = <<<EOS
<div id="faqs">
<h class="t1">Una caja </h>
<h class="t2">de preguntas frecuentes</h>
</div>

<div id="faqs-etiqueta"></div>
<div id="faqs-rectangulo">
	<div id="faqs-preg"><p>¿Dónde está mi pedido?</p></div>
	<div id="faqs-resp">
		<p>Consulta los detalles de tus compras y conoce su estado en todo momento desde "Mi cuenta". Si ya tienes cuenta, accede con tu e-mail y contraseña. Si has iniciado como invitado, ponte en contacto con nosotros, te enviaremos un SMS con el estado de su pedido.</p>
	</div>
</div>

<div id="faqs-etiqueta"></div>
<div id="faqs-rectangulo">
	<div id="faqs-preg"><p>¿Cómo puedo cambiar o devolver una caja?</p></div>
	<div id="faqs-resp">
		<p>Tienes 30 días desde la fecha de envío de tu pedido para hacer cambio y devoluciones. Elige el tipo de devolución que mejor se adapte a tus necesidades: Devolución gratuita en punto de entrega o recogida gratuita a domicilio.</p>
	</div>
</div>

<div id="faqs-etiqueta"></div>
<div id="faqs-rectangulo">
	<div id="faqs-preg"><p>¿Cómo y cuándo recibiré mi reembolso?</p></div>
	<div id="faqs-resp">
		<p>Recibirás el reembolso en un plazo de 3 a 12 días laborales en el mismo método de pago desde que aceptemos la devolución en nuestros almacenes. Te enviaremos un e-mail al confirmar la devolución.</p>
	</div>
</div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>