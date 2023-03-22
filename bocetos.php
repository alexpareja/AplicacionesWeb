<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Bocetos';

$contenidoPrincipal = <<<EOS
<div id="bocetos">
	<h1> Bocetos </h1>
	<h3> Página Principal </h3>
	<p> Descripción : Página principal de la tienda. En este se mostrará en un lado las cajas de subscripción 
	 con un enlace a la página de registro en caso de que el usuario no esté registrado, o a la página de su cuenta en el caso de que este registrado, donde podrá editar su estado de subsripción (normal o premium). En el otro lado estará la caja de temporada, con un enlace a la tienda.</p>
	<img src="img/b_PPrincipal.png" alt="Boceto de la Pagina Principal">
	
	<h3> Página de Tienda (cliente) </h3>
	<p> Descripcion: Página de la tienda, donde se encontraran todos nuestro productos en orden. El cliente podrá navegar sobre esta, viendo los 
	distintos productos. En el lado izquierdo de la pagina encontraremos una sección con filtros, pudiendo el cliente seleccionar lo que el desee
	y mostrandose los productos según dichos criterios. Al seleccionar un producto se redigirá a la página concreta del producto.  
	</p>
	<img src="img/b_Tienda.png" alt="Boceto de la Tienda">
	
	<h3> Página de Tienda (administrador) </h3>
	<p> Descripcion: Se mostrará la página como se le muestra a un cliente normal, pero con un botón de "Añadir producto". Si se pulsa este botón se redigirá a la página de añadir producto. Aparte de este 
	se muestra el botón "Compras" que redirige al usuario a la página de compras.</p>
	<img src="img/b_TiendaAdmi.png" alt="Boceto de la Tienda Administrador">
	
	<h3> Página de Compras</h3>
	<p> Descripcion: Se muestran las compras en caso de que seas usuario administrador. </p>
	<img src="img/b_Compras.png" alt="Boceto de la Pagina de Compras">

	<h3> Página de Añadir Producto</h3>
	<p> Descripcion: Se muestra un formulario con los datos que el usuario administrador debe introducir para añadir un nuevo producto. Se deberá introducir el
	nombre del producto, la descripción de este, su precio y las unidades de cada talla (XS-XL) que se quieran añadir. Adicionalmente se deja buscar un archivo en el 
    dispositivo para añadir una imagen. Los campos de nombre, precio e imagen se deben introducir obligatoriamente.</p>
	<img src="img/b_AnnadirProducto.png" alt="Boceto de la Pagina de Añadir producto">
	
	<h3> Página de Producto </h3>
	<p> Descripción: Página que muestra un producto en concreto. Encontramos los detalles del producto, una imagen y su precio. Se puede elegir
		talla y unidades. Si se decide comprar se añade el producto al carrito, si el usuario esta registrado se añadirá al carrito, sino se redigirá
		a la página de login. Del mismo modo, si esta registrado podrá añadir el producto a la lista de deseos, sino serán redirigidos a la página de 
		login. En la parte inferior se encontrará la parte de comentarios, y se podrá añadir una review en caso de haber comprado el producto anteriormente.
    </p>
	<img src="img/b_PProducto.png" alt="Boceto de Pag de producto">
	
	<h3> Página de Producto (Administrador) </h3>
	<p> Descripción: Página que muestra un producto como en el caso del cliente, pero con un botón de editar que redirige al usurio administrador a la pagina de editar producto.
    </p>
	<img src="img/b_PProductoAdmi.png" alt="Boceto de Pag de producto admi">
	
	<h3> Página de Editar Producto  </h3>
	<p> Descripción: Se muestran los datos del producto elegido. Permite al usuario administrador editar todos los datos del producto (nombre, descripción, imagen, precio y stock de cada talla (XS-XL). Pulsando el botón volver se vuelve
a  la página del producto sin guardar los cambios y si se pulsa el botón de editar se aplican los cambios introducidos. 	
    </p>
	<img src="img/b_EditarProducto.png" alt="Boceto de Editar de producto">
	
	<h3> Página Sobre Nosotros </h3>
	<p> Descripción: Página en la que se muestra la información de la empresa “La Quinta Caja”. Si pulsas el botón contáctanos se redigirá a la página
	de Contacto.</p>
	<img src="img/b_SobreNosotros.png" alt="Boceto de Sobre Nosotros">
	
	<h3> Página de FAQs </h3>
	<p> Descripción: Página en la que se muestran las preguntas frecuentes y se da una respuesta a cada una de ellas. </p>
	<img src="img/b_PFAQs.png" alt="Boceto de la Pagina de FAQs">
	
	<h3> Página del Blog </h3>
	<p> Descripción: Blog de la web donde se muestran las entradas publicadas en orden cronológico con una pequeña previsualización.
		Al hacer click en una de las entradas se redirigirá a esta. </p>
	<img src="img/b_PBlog.png" alt="Boceto de la Pagina del Blog">
	
	<h3> Página del Blog (Administrador) </h3>
	<p> Descripción: Se muestra el blog de la web como en caso de un usuario normal, pero se muestra el botón de añadir nueva entrada, que redirige a la página de
	añadir entrada al blog. También se puede eliminar una entrada existente pulsando el botón con un ícono de papelera en la entrada que se desee.</p>
	<img src="img/b_PBlogAdmi.png" alt="Boceto de la Pagina del Blog Administrador">
	
	<h3> Página de Post del Blog</h3>
	<p> Descripcion: Se muestra la entrada del blog, con su texto e imágenes. En el lateral izquierdo se mostrarán los titulares de otras entradas, 
		siendo redirigido a esta en caso de que se desee. Después de la entrada, en la parte inferior existirá una opción de comentarios, 
		donde todos los usuarios registrados podrán comentar.</p>
	<img src="img/b_PPost.png" alt="Boceto de la Pagina de Post del Blog">
	
	<h3> Página de Post del Blog (Administrador)</h3>
	<p> Descripcion: Se muestra la entrada del blog como un usuario normal, pero se permite editar toda la información (imágen y textos). Pulsando el botón guardar se aplicaran todos los cambios
	No se muestran los comentarios.</p>
	<img src="img/b_PPostAdmi.png" alt="Boceto de la Pagina de Post del Blog Admi">
	
	<h3> Página de Mi Usuario</h3>
	<p> Descripción: En caso de estar registrado se mostrarán los datos del usuario (nombre, email, compras y su tipo de suscripción, 
	que podrá cambiar si desea en la misma página). Desde esta página se puede acceder a la lista de deseos del usuario.  </p>
	<img src="img/b_PUsuario.png" alt="Boceto de la Pagina de Mi Usuario">
	
	<h3> Página de Registro</h3>
	<p> Descripción: Se pide introducir los datos personales (nombre, apellidos, email, contraseña, dirección y la casilla de aceptar términos 
	y condiciones). Al pulsar el botón registrarse se registra el usuario (en caso de que no haya ningún error). Si no, se mostrará el error que 
	el usuario deberá corregir para poder registrarse.</p>
	<img src="img/b_PRegistro.png" alt="Boceto de la Pagina de Registro">
	
	<h3> Página de Carrito</h3>
	<p> Descripción: En esta página aparecerá una lista con los artículos que el usuario ha elegido comprar, con los precios y 
		características desglosadas.Si ya está registrado, aparecerá un mensaje de confirmación de la compra y se añadirá el pedido 
		a la lista de pedidos. Como solo aceptamos pagos en efectivo, no será necesario introducir la información de la tarjeta de crédito. En caso de no haer inciado sesión 
se redirige a la página de inicio de sesión, puesto que unicamente los usuario registrados pueden comprar.	</p>
	<img src="img/b_PCarrito.png" alt="Boceto de la Pagina de Carrito">
	
	<h3> Página de Lista de Deseos</h3>
	<p> Descripcion: Se muestran los productos añadidos en la lista de deseos de un usuario registrado. </p>
	<img src="img/b_PDeseos.png" alt="Boceto de la Pagina de Lista de Deseos">
	
	<h3> Página de Inicio Sesion</h3>
	<p> Descripcion: Se pide al usuario el mail y la contraseña para poder acceder a la página registrado. Cuando se pulsa el botón "Inicio 
	Sesión" se comprueban los datos y se inicia sesión. En caso de no estar registrado, pulsando el botón "Registrarse" se redirige a la página
    de registro.</p>
	<img src="img/b_PLogin.png" alt="Boceto de la Pagina de Inicio de Sesion">
	
	<h3> Página de Contacto</h3>
	<p> Descripcion: Página en la que cualquier usuario puede contactar con La Quinta Caja. Se deben introducir los datos necesarios (Nombre, Mail, 
	Motivo y Mensaje) y aceptar los términos y condiciones. Al pulsar enviar se envía la consulta a la Quinta Caja	</p>
	<img src="img/b_Contacto.png" alt="Boceto de la Pagina de Contacto">
	
	<h3> Página de Términos y Condiciones</h3>
	<p> Descripcion: Se muestran los términos y condiciones de la Quinta Caja.	</p>
	<img src="img/b_Terminos.png" alt="Boceto de la Pagina de Términos y Condiciones">
	
	
	<h3>Cabecera</h3>
	<p> Descripcion: Desde todas las páginas se podrá acceder a la cabecera. En esta hará varios botenes. El botón "Tienda" dirige al usuario a la página de la Tienda. El botón "Blog" dirige al usuario a la página del Blog
	El botón "Nosotros" dirige al usuario a la página de Sobre Nosotros. El ícono de interrogación ayuda a los usarios a acceder a la página de  FAQ's. El botón del carrito permite a los usuarios 
	acceder a su carrito. El bóton del usuario permite a los usuario que hayan iniciado sesión acceder a la página de su cuenta. En caso se no haber iniciado sesión se redirige a una página donde podrán elegir entre
	iniciar sesión o registrarse. El último ícono redirige a los usuario a inciar sesión, en caso de que no lo hayan hecho, o finalizar sesión en caso contrario. Finalmente si se pulsa sobre "LA QUINTA CAJA" se redirige al usuario
	a la página de Inicio </p>
	
	
	<h3>Pie de página</h3>
	<p> Descripcion: Desde todas las páginas se podrá acceder al pie de página. Este conterá distintos botones. Si se pulsa "Terminos y condiciones" se redirigé a la página de termino y condiciones. Si se pulsa sobre "@laquintacaja" se redirige al Instagram de La Quinta Caja. 
	Los botenes "Propuesta", "Detakkes", "Bocetos", "Miembros" y "Planificación" dirigen al usuario a dichas páginas que contienen el contenido de la entrega anterior. Finalmente el botón "Contacto" lleva a los usuarios a la 
	página de Contacto</p>
	<img src="img/b_CabeceraPie.png" alt="Boceto de pie de página">
</div>
EOS;
require __DIR__.'/includes/plantillas/plantilla.php';
?>