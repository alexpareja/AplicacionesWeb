<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Detalles';
$contenidoPrincipal = <<<EOS
<div id = "detalles">
    <h1> Detalles </h1>
    <h3> Concepto de la aplicación </h3>
    <p> Hoy en día la contaminación provocada por el fast fashion está en aumento, naciendo así La Quinta Caja, una empresa sostenible. La Quinta Caja es un e-Commerce dedicado a la venta de cajas sorpresa (especialmente de ropa de segunda mano). Las cajas se pueden comprar individualmente o mediante suscripciones mensuales. Cada producto se puede comprar en diferentes tallas y tamaños. Los usuarios registrados que compren podrán expresar su opinión en las reviews. Otro servicio que se ofrece dentro de la página es un blog en el que los administradores pueden escribir noticias y consejos relacionados con la empresa, pudiendo los usuarios comentar. En la página principal se podrán encontrar los artículos de temporada. La tienda se podrá mostrar mediante categorías (cajas de ropa, cajas de temporadas, cajas especiales…) y se podrán aplicar filtros. Los productos serán añadidos y modificados por los administradores y estos podrán ver las compras realizadas. </p>
    <p> Además, dentro de la web habrá una sección de contacto para que el cliente se pueda poner en comunicación con nuestra empresa en caso de que surga algún tipo de problema o inconveniente con su pedido o para poder dejar cualquier sugerencia que desee.</p>
    <p>Como hemos mencionado al principio, la Quinta Caja nace con una mentalidad comprometida con el medio ambiente, queremos demostrar que todos los productos que todavía se encunentran en un buen estado son totalmente utilizables y además queremos añadir un poco de emoción a su compra con el uso de las cajas misteriosas, haciendo que te lleves una sorpresa al abrir tu caja.</p>
    <h2 class = "centro"> ¡En la Quinta Caja, encajamos contigo! </h2>
    <h3> Tipos de usuarios </h3>
    <ul>
       <li><span class = "negrita"> Sin registrar: </span>es la persona que entra a nuestra página sin registrarse como usuario para que pueda ver todo lo que tiene disponible sin que pueda valorar los productos ni comentar tanto estos como los artículos del blog.</li>
       <li><span class = "negrita"> Registrado: </span>a diferencia de los usuarios que no se han registrado, aparte de comprar también disponen de una lista de deseos, pueden valorar y comentar productos y artículos del blog.</li>
       <li><span class = "negrita"> Registrado con suscripción premium: </span>además de todas las ventajas de los usuarios registrados también tienen exclusividad para ventas anticipadas, reciben productos continuamente.</li>
       <li><span class = "negrita"> Administrador: </span>pueden añadir, modificar y eliminar tantos productos como artículos del blog. Podrán consultar la lista de compras realizadas por los usuarios para así poder administrar el inventario.</li>
    </ul>
</div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';