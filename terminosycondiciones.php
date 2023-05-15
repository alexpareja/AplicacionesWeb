<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'terminosycondiciones';

$contenidoPrincipal = <<<EOS
<div class="terminosycondiciones">
	<div class="cabeceraTC">
		<h2>Términos y condiciones</h2>
		<p>Estos son los pasos que tomamos para garantizar su privacidad y protección con La Quinta Caja.</p>
	</div>
	<div class="panelTC">
		<ul class="terminos">
			<li><a href="#condicionesUso">Condiciones de uso</a></li>
			<li><a href="#politicaPrivacidad">Política de privacidad</a></li>
			<li><a href="#rgpd">RGPD</a></li>
			<li><a href="#seguridad">Seguridad</a></li>
			<li><a href="#avisoRetencion">Aviso de retención de datos</a></li>
			<li><a href="#terminosAPI">Términos de la API</a></li>
		</ul>
		<div class="contenidoTC">
			<div class="acercaDe">
				<h2>Acerca de</h2>
				<p>Estamos comprometidos con los derechos de privacidad
				de nuestros usuarios. Nos compremetemos a compartit
				de forma transparente todos los aspectos de cómo funcionan
				el producto y el sitio web La Quinta Caja en lo que 
				respecta a la privacidad, los términos y los datos 
				personales, y apoyamos plenamente los esfuerzos para 
				garantizar su protección en línea.</p>
				<p>La siguiente es una recopilación de información y recursos para ayudar a responder cualquier pregunta que tenga sobre su experiencia con La Quinta Caja. ¡Estamos agradecidos por su interés y orgullosos de tenerlo como parte de nuestra comunidad!</p>
			</div>
			<article id="condicionesUso" class="ter">
				<div class="termino">
					<h2>Condiciones de uso</h2>
					<span><i class="fas fa-chevron-down"></i></span>
				</div>
				<div class="deUso">
					<p>El Servicio proporciona una herramienta de tienda online que permite a los usuarios comprar cajas en un cualquier horario programado, además de otras herramientas de disfrute y análisis para ayudar a reforzar la experiencia de los usuarios.</p>
					<p>La Quinta Caja se reserva el derecho de modificar o descontinuar todo o parte del Servicio en cualquier momento (incluyendo la limitación o descontinuación de ciertas características del Servicio), temporal o permanentemente, sin previo aviso. La Quinta Caja no tendrá ninguna responsabilidad por ningún cambio en el Servicio, incluidas las funcionalidades pagadas del Servicio, o cualquier suspensión o terminación de su acceso o uso del Servicio. Las tarifas de servicio no son reembolsables. Debe conservar copias de cualquier Contenido de usuario que publique en el Servicio para tener copias permanentes en caso de que el Servicio se modifique de tal manera que pierda el acceso al Contenido de usuario que publicó en el Servicio.</p>
				</div>
			</article>
			<article id="politicaPrivacidad" class="ter">
				<div class="termino">
					<h2>Política de privacidad</h2>
					<span><i class="fas fa-chevron-down"></i></span>
				</div>
				<div class="deUso">
					<p>La Quinta Caja proporciona esta Política de privacidad para informarle sobre nuestras políticas y procedimientos con respecto a la recopilación, el uso, la protección y la divulgación de la Información personal recibida de su uso de este sitio web, así como todos los sitios web relacionados, incluidos nuestros subdominios, aplicaciones, extensiones de navegador y otros servicios proporcionados por nosotros (colectivamente, junto con el Sitio, nuestro "Servicio"), y en relación con nuestro cliente, proveedor, y relaciones de pareja. Esta Política de privacidad también le informa sobre sus derechos y opciones con respecto a su Información personal, y cómo puede comunicarse con nosotros para actualizar su información de contacto u obtener respuestas a las preguntas que pueda tener sobre nuestras prácticas de privacidad.</p>
					<p>Además de las actividades descritas en esta Política de privacidad, podemos procesar Información personal en nombre de nuestros clientes comerciales cuando utilizan el Servicio. Procesamos dicha Información personal como procesador de datos de nuestros clientes comerciales, que son las entidades responsables del procesamiento de datos. Para comprender cómo un cliente comercial procesa su información personal, consulte la política de privacidad de ese cliente.</p>
					<p>A los efectos de esta Política de privacidad, "Información personal" significa cualquier información relacionada con una persona identificada o identificable. Obtenemos información personal relacionada con usted de varias fuentes que se describen a continuación.</p>
					<p>En su caso, indicamos si y por qué debe proporcionarnos su información personal, así como las consecuencias de no hacerlo. Si no proporciona Información personal cuando se le solicita, es posible que no pueda beneficiarse de nuestro Servicio si esa información es necesaria para brindarle el servicio o si estamos legalmente obligados a recopilarla.</p>
				</div>
			</article>
			<article id="rgpd" class="ter">
				<div class="termino">
					<h2>RGPD</h2>
					<span><i class="fas fa-chevron-down"></i></span>
				</div>
				<div class="deUso">
					<p>El Reglamento General de Protección de Datos (GDPR) de la UE entrará en vigor el 25 de mayo, y estamos totalmente detrás del espíritu de estos reglamentos para una Internet segura y protegida. Aspiramos a adoptar la privacidad por diseño y, siempre que sea posible, no recopilar ni almacenar información de identificación personal.</p>
					<p>Nuestra Política de privacidad contiene menciones de los pocos casos en los que se requiere información de identificación personal. Por lo general, esto incluirá una dirección de correo electrónico para iniciar sesión en La Quinta Caja o un nombre de usuario de una red social para administrar su cuenta.</p>
					<p>En cualquier momento, puede solicitar que su información se exporte y se le envíe para su revisión, y cumpliremos de inmediato cualquier solicitud suya para que su información sea eliminada y olvidada.</p>
				</div>
			</article>
			<article id="seguridad" class="ter">
				<div class="termino">
					<h2>Seguridad</h2>
					<span><i class="fas fa-chevron-down"></i></span>
				</div>
				<div class="deUso">
					<p>¡Sabemos cuánto trabajo se dedica a las pruebas de penetración! Para evitar frustraciones, puede consultar estos no vulnerabilidades comunes que no califican para recompensas.</p>
					<p>Estamos eternamente agradecidos por todos aquellos que trabajaron arduamente para identificar las debilidades dentro de La Quinta Caja. Para informes que no son no vulnerabilidades comunes, nos gusta recompensar a aquellos que revelan vulnerabilidades de manera responsable con un reconocimiento, botín o dinero de recompensa.</p>
				</div>
			</article>
			<article id="avisoRetencion" class="ter">
				<div class="termino">
					<h2>Aviso de retención de datos</h2>
					<span><i class="fas fa-chevron-down"></i></span>
				</div>
				<div class="deUso">
					<p>Esta política cubre todos los datos personales de los clientes que tenemos o sobre los que tenemos control. Esto incluye datos personales físicos, como documentos impresos, contratos, cuadernos, cartas y facturas. También incluye datos personales electrónicos como correos electrónicos, documentos electrónicos, grabaciones de audio y video. En esta política nos referimos a esta información y estos registros colectivamente como "datos".</p>
					<p>Esta política no cubre los datos no personales, incluidos los datos anónimos. Dichos datos no están sujetos a un programa de retención de datos.</p>
					<p>Esta política cubre los datos que tienen terceros en nuestro nombre, por ejemplo, proveedores de almacenamiento en la nube o almacenamiento de registros fuera del sitio. También cubre datos que nos pertenecen pero que están en manos de empleados en dispositivos personales.</p>
				</div>
			</article>
			<article id="terminosAPI" class="ter">
				<div class="termino">
					<h2>Términos de la API</h2>
					<span><i class="fas fa-chevron-down"></i></span>
				</div>
				<div class="deUso">
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
			</article>
		</div>
	</div>
</div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>