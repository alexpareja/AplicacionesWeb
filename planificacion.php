<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Planificacion';


$contenidoPrincipal = <<<EOS
<div class="Planificacion">
        <section class="content plan">
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
        </section>
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
            </div>
        </section>
    </div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>