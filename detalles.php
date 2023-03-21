<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Detalles';
$contenidoPrincipal = <<<EOS
<div id = "detalles">
    <h1> Detalles </h1>
    <h3> Concepto de la aplicación </h3>
    <p> Hoy en día la contaminación provocada por el fast fashion está en aumento, naciendo así La Quinta Caja, una empresa sostenible. La Quinta Caja es un e-Commerce dedicado a la venta de cajas sorpresa (especialmente de ropa de segunda mano). Las cajas se pueden comprar individualmente o mediante suscripciones mensuales. Cada producto se puede comprar en diferentes tallas y tamaños. Los usuarios registrados que compren podrán expresar su opinión en las reviews. Otro servicio que se ofrece dentro de la página es un blog en el que los administradores pueden escribir noticias y consejos relacionados con la empresa, pudiendo los usuarios comentar. En la página principal se podrán encontrar los artículos de temporada. La tienda se podrá mostrar mediante categorías (cajas de ropa, cajas de temporadas, cajas especiales…) y se podrán aplicar filtros. Los productos serán añadidos y modificados por los administradores y estos podrán ver las compras realizadas. </p>
    <p> Además, dentro de la web habrá una sección de contacto para que el cliente se pueda poner en comunicación con nuestra empresa en caso de que surja algún tipo de problema o inconveniente con su pedido o para poder dejar cualquier sugerencia que desee.</p>
    <p>Como hemos mencionado al principio, la Quinta Caja nace con una mentalidad comprometida con el medio ambiente, queremos demostrar que todos los productos que todavía se encuentran en un buen estado son totalmente utilizables y además queremos añadir un poco de emoción a su compra con el uso de las cajas misteriosas, haciendo que te lleves una sorpresa al abrir tu caja.</p>
    <h2 class = "centro"> ¡En la Quinta Caja, encajamos contigo! </h2>
    <h3> Tipos de usuarios </h3>
    <ul>
       <li><span class = "negrita"> Sin registrar: </span>es un usuario que accede a la página web sin tener una cuenta de usuario dentro de ella. Puede visualizar el contenido de la página web. Sin embargo, no puede efectuar compras ni dejar valoraciones y comentarios en los productos de la tienda y artículos del blog.</li>
       <li><span class = "negrita"> Registrado: </span>es un usuario que accede a la página web y tiene una cuenta de usuario en ella. A diferencia del usuario "sin registrar" este puede comprar, valorar y comentar. También, podrá guardar productos en una lista de deseos, a la que tendrá accesos desde la sección "Mi cuenta".</li>
       <li><span class = "negrita"> Registrado con suscripción premium: </span>es un usuario que, además de tener una cuenta de usuario en la página web, paga una suscripción que le otorga diversas ventajas, como acceso a productos exclusivos y descuentos. Del mismo modo, le llega mensualmente a su domicilio una caja sorpresa gratuita</li>
       <li><span class = "negrita"> Administrador: </span>es un usuario con acceso exclusivo a áreas de administración de la página web. Puede añadir, modificar y eliminar productos de la tienda, así como gestionar el inventario y los artículos del blog. Además, puede consultar un listado con las compras realizadas por los usuarios de la web.</li>
    </ul>
</div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';