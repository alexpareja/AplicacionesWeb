<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'La Quinta Caja';

$contenidoPrincipal = <<<EOS
<div class="Inicio">
	<section class="content header">
		<h2 class="tituloInicio">La Quinta Caja</h2>
		<p>
			Nos dedicamos a la venta de cajas sorpresa. ¡De segunda mano!¡Sostenibles!
			Podéis comprar las cajas individualmente o mediante suscripciones mensuales...
			¡En la Quinta Caja, encajamos contigo!
		</p>
		<div class="btn-home">
			<a href="contacto.php" class="btnInicio">Contáctanos</a>
EOS;

if(isset($_SESSION['login'])){
	$contenidoPrincipal .= <<<EOS
			<a href="miCuenta.php" class="btnInicio">Mi cuenta</a>
EOS;
}

else {
	$contenidoPrincipal .= <<<EOS
			<a href="registro.php" class="btnInicio">Suscríbete</a>
EOS;
} 

$contenidoPrincipal .= <<<EOS
		</div>
	</section>
	<section class="content sau">
        <h2 class="tituloInicio">Cajas</h2>
        <p>
            Hoy en día la contaminación provocada por el
            fast fashion está en aumento, naciendo así esta empresa sostenible,
            dedicada a la venta de cajas de segunda mano
        </p>
        <div class="box-container">
            <div class="boxInicio">
                <i class="fas fa-plus"></i>
                <h3>Caja normal</h3>
                <p>Caja disponible con la suscripción básica</p>
            </div>
            <div class="boxInicio">
                <i class="fas fa-star-of-david"></i>
                <h3>Caja especial</h3>
                <p>Caja disponible con la suscripción premium</p>
            </div>
        </div>
        <a href="tienda.php" class="btnInicio">Ir a la tienda</a>
    </section>
	<section class="content about">
        <h2 class="tituloInicio">Nosotros</h2>
        <p>
            Somos un grupo de jovenes apasionados por la moda y el reciclaje,
            siempre teniendo en cuenta las tendencias del momento
        </p>
        <a href="sobrenosotros.php" class="btnInicio">Saber más</a>
    </section>
	<section class="content price">
		<article class="contain">
			<h2 class="tituloInicio">Suscripciones</h2>
			<p>
				Tenemos dos tipos de suscripciones, la normal
				y la premium
			</p>
			<a href="detalles.php" class="btnInicio">Saber más</a>
		</article>
    </section>
	<section class="content news">
        <h2 class="tituloInicio">Blog</h2>
        <p>
            También contamos con un blog donde estarán
            las noticias favoritas de nuestro equipo creativo
        </p>
        <div class="blogear">
            <img src="img/content-news.jpg" class="inicioBlog" alt="blogear">
            <a href="blog.php" class="btnImagen">Ir al blog</a>
        </div>
    </section>
</div>

EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>