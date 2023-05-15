<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Planificacion';


$contenidoPrincipal = <<<EOS
<div class="Planificacion">
        <div class="content plan">
            <h2 class="tituloPlan">Planificación</h2>
            <div class="contenidoPlan">
                <p>
                    Para la realización de esta página web, hemos
                    ido realizando las diversas entregas disponibles en
                    el campus virtual dentro de la fecha límite.
                </p>
                <p>
                    De momento, hemos realizado 3 entregas. Dentro de la primera,
                    lo importante fue crear cada página con el contenido que venía
                    detallado por el profesor. Con respecto a la segunda entrega, se creó una 
                    base de datos y las tablas correspondientes para su correcto funcionamiento.
                    Se tomó como referencia los bocetos de la entrega anterior para seguir
                    añadiendo apartados y funcionalidades a la página. También se corrigieron
                    los errores acarreados por la entrega anterior.
                </p>
                <p>
                    Dentro de la tercera entrega, se ha llegado a más del 70% del completo
                    funcionamiento de la página en su totalidad. Con respecto a la entrega número 4,
                    la última de todas, se espera terminar la página y corregir los errores 
                    correspondientes a esta entrega, además de conectar la página al servidor
                    proporcionado por la Facultad de Informática.
                </p>
            </div>
        </div>
        <section class="timeline-section">
            <div class="timeline-items">
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">8 feb</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 0</h3>
                        <p class="descripcionTime">Formación de grupos y realización de la propuesta inicial del proyecto</p>
                        <p class="miembrosTime">TODOS</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">9 feb</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 1.1</h3>
                        <p class="descripcionTime">Creación de la página con nombre "Miembros"</p>
                        <p class="miembrosTime">Sergio Atienza</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">10 feb</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 1.2</h3>
                        <p class="descripcionTime">Creación de la página con nombre "Detalles"</p>
                        <p class="miembrosTime">Cristina Morillo</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">11 feb</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 1.3</h3>
                        <p class="descripcionTime">Creación de la página con nombre "Planificacion"</p>
                        <p class="miembrosTime">Lucero Abregú</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">12 feb</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 1.4</h3>
                        <p class="descripcionTime">Creación de la página con nombre "Contacto"</p>
                        <p class="miembrosTime">Cristina Morillo</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">13 feb</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 1.5</h3>
                        <p class="descripcionTime">Creación de la página con nombre "Index"</p>
                        <p class="miembrosTime">Jesús Hernández</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">20 feb</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 1.6</h3>
                        <p class="descripcionTime">Creación de la página con nombre "Bocetos"</p>
                        <p class="miembrosTime">Elena Basca</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">22 feb</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 1.7</h3>
                        <p class="descripcionTime">Validación de HTML</p>
                        <p class="miembrosTime">Alejandro Pareja</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">24 feb</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Entrega práctica 1</h3>
                        <p class="descripcionTime">Descripción detallada del proyecto</p>
                        <p class="miembrosTime">TODOS</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">01 marzo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 2.1</h3>
                        <p class="descripcionTime">Creación includes</p>
                        <p class="miembrosTime">Alejandro Pareja</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">02 marzo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 2.2</h3>
                        <p class="descripcionTime">Login y Registro</p>
                        <p class="miembrosTime">Cristina Morillo</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">05 marzo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 2.3</h3>
                        <p class="descripcionTime">Funcionalidad: realizar compra</p>
                        <p class="miembrosTime">TODOS</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">06 marzo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 2.4</h3>
                        <p class="descripcionTime">Funcionalidad: añadir producto</p>
                        <p class="miembrosTime">TODOS</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">07 marzo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 2.5</h3>
                        <p class="descripcionTime">Creación página Tienda</p>
                        <p class="miembrosTime">Alejandro Pareja y Elena Basca</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">12 marzo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 2.6</h3>
                        <p class="descripcionTime">Creación BBDD</p>
                        <p class="miembrosTime">Sergio Atienza</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">14 marzo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 2.7</h3>
                        <p class="descripcionTime">Creación páginas en cabecera</p>
                        <p class="miembrosTime">Lucero Abregú</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">20 marzo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 2.8</h3>
                        <p class="descripcionTime">Creación página Carrito</p>
                        <p class="miembrosTime">Jesús Hernández</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">21 marzo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 2.9</h3>
                        <p class="descripcionTime">Corrección entrega 1</p>
                        <p class="miembrosTime">TODOS</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">23 marzo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Entrega práctica 2</h3>
                        <p class="descripcionTime">Diseño de la aplicación usando HTML, versión mínima del proyecto</p>
                        <p class="miembrosTime">TODOS</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">31 marzo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 3.1</h3>
                        <p class="descripcionTime">CSS de los filtros añadido JavaScript</p>
                        <p class="miembrosTime">Alejandro Pareja y Elena Basca</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">01 abril</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 3.2</h3>
                        <p class="descripcionTime">Creación de la sección de compras y usuario</p>
                        <p class="miembrosTime">Cristina Morillo</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">03 abril</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 3.3</h3>
                        <p class="descripcionTime">CSS de página Login terminado</p>
                        <p class="miembrosTime">Cristina Morillo</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">04 abril</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 3.4</h3>
                        <p class="descripcionTime">Creación de página Lista de deseos</p>
                        <p class="miembrosTime">Cristina Morillo y Jesús Hernández</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">05 abril</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 3.5</h3>
                        <p class="descripcionTime">Funcionalidad: Blog</p>
                        <p class="miembrosTime">Sergio Atienza y Lucero Abregú</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">07 abril</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 3.6</h3>
                        <p class="descripcionTime">Cabecera y Pie de página responsive</p>
                        <p class="miembrosTime">Lucero Abregú</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">08 abril</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 3.7</h3>
                        <p class="descripcionTime">Funcionalidad: Editar producto</p>
                        <p class="miembrosTime">Alejandro Pareja y Elena Basca</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">09 abril</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 3.8</h3>
                        <p class="descripcionTime">CSS de página Mi Cuenta</p>
                        <p class="miembrosTime">Cristina Morillo</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">10 abril</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 3.9</h3>
                        <p class="descripcionTime">CSS editar producto, tienda, carrito, compras</p>
                        <p class="miembrosTime">Alejandro Pareja y Elena Basca</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">11 abril</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 3.10</h3>
                        <p class="descripcionTime">CSS página Contacto, miPerfil, Miembros, Login, Registro, sugerencias</p>
                        <p class="miembrosTime">Cristina Morillo</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">12 abril</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 3.11</h3>
                        <p class="descripcionTime">CSS página Entrada de Blog</p>
                        <p class="miembrosTime">Sergio Atienza</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">13 abril</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 3.12</h3>
                        <p class="descripcionTime">Funcionalidad: editar y eliminar entrada, plantilla datos iniciales Blog</p>
                        <p class="miembrosTime">Sergio Atienza</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">14 abril</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 3.13</h3>
                        <p class="descripcionTime">Funcionalidad: añadir entrada, CSS páginas: index, sobrenosotros, faqs, blog, planificación</p>
                        <p class="miembrosTime">Lucero Abregú</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">15 abril</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 3.14</h3>
                        <p class="descripcionTime">CSS de página Carrito, pago, lista de deseos</p>
                        <p class="miembrosTime">Jesús Hernández</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">15 abril</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 3.15</h3>
                        <p class="descripcionTime">Funcionalidad: eliminar producto, CSS página de confirmación</p>
                        <p class="miembrosTime">Elena Basca</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">16 abril</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 3.16</h3>
                        <p class="descripcionTime">Validación HTML</p>
                        <p class="miembrosTime">TODOS</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">17 abril</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Entrega práctica 3</h3>
                        <p class="descripcionTime">Diseño visual del proyecto usando CSS, versión del 50% de la funcionalidad final</p>
                        <p class="miembrosTime">TODOS</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">20 abril</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 4.1</h3>
                        <p class="descripcionTime">Corrección práctica 3</p>
                        <p class="miembrosTime">TODOS</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">22 abril</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 4.2</h3>
                        <p class="descripcionTime">Finalización de la implementación de los filtros en la tienda</p>
                        <p class="miembrosTime">Alejandro Pareja</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">02 mayo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 4.3</h3>
                        <p class="descripcionTime">Añadir la implementación de los comentarios en las entradas del blog</p>
                        <p class="miembrosTime">Sergio Atienza</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">03 mayo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 4.4</h3>
                        <p class="descripcionTime">Añadir usuario premium y darse de baja del mismo</p>
                        <p class="miembrosTime">Cristina Morillo</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">04 mayo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 4.5</h3>
                        <p class="descripcionTime">Añadir responder a comentarios dentro del blog</p>
                        <p class="miembrosTime">Sergio Atienza</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">05 mayo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 4.6</h3>
                        <p class="descripcionTime">Añadir página de Suscripción</p>
                        <p class="miembrosTime">Cristina Morillo</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">06 mayo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 4.7</h3>
                        <p class="descripcionTime">Añadir códigos de descuento en la compra de productos</p>
                        <p class="miembrosTime">Alejandro Pareja y Elena Basca</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">07 mayo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 4.8</h3>
                        <p class="descripcionTime">Añadir la función de recibir una caja gratis al mes</p>
                        <p class="miembrosTime">Cristina Morillo</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">09 mayo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 4.10</h3>
                        <p class="descripcionTime">Mejora CSS página miPerfil y suscripción, y añadidos nuevos formularios</p>
                        <p class="miembrosTime">Cristina Morillo</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">09 mayo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 4.11</h3>
                        <p class="descripcionTime">Mejora CSS página mostrarProducto</p>
                        <p class="miembrosTime">Elena Basca</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">10 mayo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 4.12</h3>
                        <p class="descripcionTime">Mejora CSS páginas Términos y Condiciones, Bocetos y Propuesta</p>
                        <p class="miembrosTime">Lucero Abregú</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">10 mayo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 4.13</h3>
                        <p class="descripcionTime">Implementación de productos Premium</p>
                        <p class="miembrosTime">Cristina Morillo</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">11 mayo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 4.14</h3>
                        <p class="descripcionTime">Añadido blogs recomendados</p>
                        <p class="miembrosTime">Lucero Abregú</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">12 mayo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 4.15</h3>
                        <p class="descripcionTime">Añadidas ventanas emergentes al editar y borrar</p>
                        <p class="miembrosTime">Elena Basca</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">12 mayo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 4.16</h3>
                        <p class="descripcionTime">Añadida la opción de poder cambiar de contraseña</p>
                        <p class="miembrosTime">Cristina Morillo</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">12 mayo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 4.17</h3>
                        <p class="descripcionTime">Añadir gastos de envío en las compras y ventanas emergentes cabecera</p>
                        <p class="miembrosTime">Jesús Hernández</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">13 mayo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 4.18</h3>
                        <p class="descripcionTime">Añadir filtros en el blog y, añadir nuevos blogs y productos a la BBDD</p>
                        <p class="miembrosTime">Lucero Abregú</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">14 mayo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 4.19</h3>
                        <p class="descripcionTime">Añadir valoración a los productos</p>
                        <p class="miembrosTime">Sergio Atienza</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">14 mayo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 4.20</h3>
                        <p class="descripcionTime">Validar CSS y HTML</p>
                        <p class="miembrosTime">TODOS</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">15 mayo</div>
                    <div class="timeline-content">
                        <h3 class="tituloTime">Etapa 4.21</h3>
                        <p class="descripcionTime">Entrega FINAL</p>
                        <p class="miembrosTime">TODOS</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>