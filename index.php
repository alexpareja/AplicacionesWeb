<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Propuesta';

$contenidoPrincipal = <<<EOS
    <div id="propuesta-imagen">
        <img src="img/propuesta.jpg" alt="Imagen propuesta">
    </div>
    <div id="propuesta">
        <h2>Propuesta</h2>
        <p>Hoy en día la contaminación provocada por el fast fashion está en aumento, naciendo así La Quinta Caja, una empresa sostenible. La Quinta Caja es un e-Commerce dedicado a la venta de cajas sorpresa (especialmente de ropa de segunda mano). Las cajas se pueden comprar individualmente o mediante suscripciones mensuales. Cada producto se puede comprar en diferentes tallas y tamaños. Los usuarios registrados que compren podrán expresar su opinión en las reviews. Otro servicio que se ofrece dentro de la página es un blog en el que los administradores pueden escribir noticias y consejos relacionados con la empresa, pudiendo los usuarios comentar. En la página principal se podrán encontrar los artículos de temporada. La tienda se podrá mostrar mediante categorías (cajas de ropa, cajas de temporadas, cajas especiales…) y se podrán aplicar filtros. Los productos serán añadidos y modificados por los administradores y estos podrán ver las compras realizadas.</p>
    </div>
EOS;
require __DIR__.'/includes/plantillas/plantilla.php';
?>