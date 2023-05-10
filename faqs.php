<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Faqs';

$contenidoPrincipal = <<<EOS
<div class="faqs">
	<div class="tituloFaqs">
		<h2>Ayuda</h2>
	</div>
	<nav class="menuFaqs">
		<ul>
			<li class="opcion">
				<button class="pregunta" type="submit" onclick="mostrarRespuesta()">
					¿CÓMO RECIBIRÉ EL IMPORTE DE MI DEVOLUCIÓN?
					<span><i class="fas fa-chevron-down"></i></span>
				</button>
				<div class="submenuFaqs">
					Una vez recibido/s el/los productos, La Quinta Caja verificará que están en buen
					estado, y de ser así, procederá al reembolso del importe en el mismo método de
					pago utilizado en la compra.
				</div>
			</li>
			<li class="opcion">
			<button class="pregunta" type="submit" onclick="mostrarRespuesta()">
					¿TENGO QUE PAGAR ALGO POR MI DEVOLUCIÓN?
					<span><i class="fas fa-chevron-down"></i></span>
				</button>
				<div class="submenuFaqs">
					Si realizas tu devolución en tienda, la devolución es gratuita, pero si tienes que realizar
					la devolución enviándolo a nuestro almacén, los gastos de envío serán a cargo del
					remitente.
				</div>
			</li>
			<li class="opcion">
				<button class="pregunta" type="submit" onclick="mostrarRespuesta()">
					¿CUÁL ES EL PLAZO PARA PODER REALIZAR UNA DEVOLUCIÓN?
					<span><i class="fas fa-chevron-down"></i></span>
				</button>
				<div class="submenuFaqs">
					Dispones de 15 días naturales desde la fecha de entrega para la devolución o cambio de un
					artículo, salvo en período de Navidades, ampliándose el período de devolución
					de las compras comprendidas entre el 20 de noviembre y el 25 de diciembre hasta el 8 de enero.
				</div>
			</li>
			<li class="opcion">
				<button class="pregunta" type="submit" onclick="mostrarRespuesta()">
					¿CÓMO PUEDO DEVOLVER UN ARTÍCULO?
					<span><i class="fas fa-chevron-down"></i></span>
				</button>
				<div class="submenuFaqs">
					Puedes acercar el producto y el formulario de devolución con su código a una tienda de La
					Quinta Caja.También puedes enviarlo a nuestro almacén online introduciendo las prendas
					y el formulario de devolución en su embalaje original o en uno de calidad similar
					y envíalo por correo.
				</div>
			</li>
			<li class="opcion">
				<button class="pregunta" type="submit" onclick="mostrarRespuesta()">
					¿CÓMO SE REALIZA UN PEDIDO?
					<span><i class="fas fa-chevron-down"></i></span>
				</button>
				<div class="submenuFaqs">
					Cuando veas un producto que te gusta, selecciona la talla y dale a "Añadir al Carrito".
					Comprueba que los productos que hay en la cesta son los que deseas. Si es así, te tienes que
					identificar y seguir los pasos que te indica el proceso de pago.
				</div>
			</li>
			<li class="opcion">
				<button class="pregunta" type="submit" onclick="mostrarRespuesta()">
					¿CUÁNDO RECIBIRÉ EL IMPORTE DE MI DEVOLUCIÓN?
					<span><i class="fas fa-chevron-down"></i></span>
				</button>
				<div class="submenuFaqs">
					Una vez recibido/s el/los productos, La Quinta Caja nos comprometemos a verificar
					el buen estado de las prendas lo más pronto posible. El proceso suele tardar entre
					1 a 2 semanas.
				</div>
			</li>
			<li class="opcion">
				<button class="pregunta" type="submit" onclick="mostrarRespuesta()">
					¿DÓNDE PUEDO RECIBIR MI PEDIDO?
					<span><i class="fas fa-chevron-down"></i></span>
				</button>
				<div class="submenuFaqs">
					Actualmente realizamos envíos a España, Portugal, Alemania, Austria, Bélgica, Francia,
					Irlanda, Italia, Países Bajos y Reino Unido. También puedes hacer una compra
					desde cualquier otro país, siempre y cuando la entrega se realice en alguno de 
					los lugares de la lista anterior.
				</div>
			</li>
			<li class="opcion">
				<button class="pregunta" type="submit" onclick="mostrarRespuesta()">
					¿PUEDEN EXISTIR VARIACIONES ENTRE LA FOTO Y EL PRODUCTO?
					<span><i class="fas fa-chevron-down"></i></span>
				</button>
				<div class="submenuFaqs">
					Las fotos las realizaremos teniendo en cuenta que el color se parezca lo más posible
					al producto en la realidad, sin embargo, debes tener en cuenta que la configuración
					de cada pantalla puede afectar a los colores con los que se visualicen.
				</div>
			</li>
		</ul>
	</nav>

</div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>