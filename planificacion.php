<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Planificacion';


$contenidoPrincipal = <<<EOS
<div id="planificacion">
	<h2>Planificación</h2>
	<h3>Tareas a realizar</h3>
	<p>Para comenzar, es necesario formar el grupo de trabajo y presentar una propuesta inicial del proyecto en formato de documento PDF breve. Esto permitirá establecer las bases del proyecto, incluyendo su alcance, objetivos y planificación, y establecer un acuerdo entre los miembros del grupo. Además, esta propuesta inicial proporcionará un marco de referencia para la implementación del proyecto y permitirá la toma de decisiones informadas en etapas posteriores.</p>
	<p>Después, presentaremos una descripción detallada del proyecto, creando una página web sencilla que incluya varios documentos descriptivos. Esta página web podría contener información sobre los objetivos, alcance, metodología, cronograma y recursos necesarios para llevar a cabo el proyecto.</p>
	<p>Para el diseño de la aplicación es necesario crear un esquema de arquitectura, el diseño en HTML y un prototipo funcional. Estas acciones son esenciales para tener una versión mínima del proyecto y evaluar su viabilidad, así como para realizar ajustes antes de continuar con el desarrollo completo de la aplicación.</p>
	<p>Se debe diseñar la apariencia de la aplicación mediante hojas de estilo y trabajar en el incremento de su funcionalidad. De esta manera, se pueden incorporar nuevas características que mejoren su rendimiento y utilidad, obteniendo como resultado una versión mejorada de la aplicación.</p>
	<p>Concluiremos la aplicación web completa y funcional cumpliendo con todas las funcionalidades planificadas y siendo rigurosamente probado para garantizar su correcto funcionamiento.</p>
	<p>Dentro de cada entrega, haremos un planning con las tareas necesarias para conseguir llegar a la culminación de cada una de ellas. También se contará con una fecha aproximada y el miembro del equipo responsable de cada tarea.</p>
	<p>Dentro de la primera entrega, lo importante fue crear cada página con el contenido que venía detallado en el campus, para lo cuál, cada miembro del equipo intervino en su realización.</p>
	<p>Dentro de la segunda entrega, se ha creado una base de datos y las tablas correspondientes para su correcto funcionamiento. Se ha tomado como referencia los bocetos de la entrega anterior para seguir añadiendo apartados y funcionalidades a la página. También se han corregido los errores correspondientes a la entrega anterior.</p>
	<p>Con respecto a la entrega número 3, se espera seguir añadiendo funcionalidades y solucionando errores no vistos en la entrega anterior. Y, lo mismo sucederá para la última entrega, además de conectar la página al servidor proporcionado por la Facultad de Informática.</p>

	<h3>Tabla resumen</h3>
	<table id="tabla-resumen">
		<tr>
			<th> Nombre de etapas </th>
			<th> Descripción </th>
			<th> Fecha de entrega </th>
			<th> Miembros </th>
		</tr>
		<tr>
			<td> Etapa 0 </td>
			<td> Formación de grupos y propuesta incial del proyecto </td>
			<td> 8 de febrero de 2023 </td>
			<td> TODOS </td>
		</tr>
		<tr>
			<td> Etapa 1.1 </td>
			<td> Creación página Miembros </td>
			<td> 9 de febrero de 2023 </td>
			<td> Sergio Atienza </td>
		</tr>
		<tr>
			<td> Etapa 1.2 </td>
			<td> Creación página Detalles </td>
			<td> 10 de febrero de 2023 </td>
			<td> Cristina Morillo </td>
		</tr>
		<tr>
			<td> Etapa 1.3 </td>
			<td> Creación página Planificación </td>
			<td> 11 de febrero de 2023 </td>
			<td> Lucero Abregú </td>
		</tr>
		<tr>
			<td> Etapa 1.4 </td>
			<td> Creación página Index </td>
			<td> 13 de febrero de 2023 </td>
			<td> Jesus Hernández </td>
		</tr>
		<tr>
			<td> Etapa 1.5 </td>
			<td> Creación página Bocetos </td>
			<td> 20 de febrero de 2023 </td>
			<td> Elena Basca </td>
		</tr>
		<tr>
			<td> Etapa 1.6 </td>
			<td> Validación HTML </td>
			<td> 22 de febrero de 2023 </td>
			<td> Alejandro Pareja </td>
		</tr>
		<tr>
			<td> Entrega práctica 1 </td>
			<td> Descripción detallada del proyecto </td>
			<td> 24 de febrero de 2023 </td>
			<td> TODOS </td>
		</tr>
		<tr>
			<td> Etapa 2.1 </td>
			<td> Creación includes </td>
			<td> 1 de marzo de 2023 </td>
			<td> Alejandro Pareja </td>
		</tr>
		<tr>
			<td> Etapa 2.2 </td>
			<td> Login y Registro </td>
			<td> 2 de marzo de 2023 </td>
			<td> Cristina Morillo </td>
		</tr>
		<tr>
			<td> Etapa 2.3 </td>
			<td> Funcionalidad: mostrar producto </td>
			<td> 5 de marzo de 2023 </td>
			<td> Sergio Atienza </td>
		</tr>
		<tr>
			<td> Etapa 2.4 </td>
			<td> Creación página Tienda </td>
			<td> 7 de marzo de 2023 </td>
			<td> Alejandro P y Elena B </td>
		</tr>
		<tr>
			<td> Etapa 2.5 </td>
			<td> Creación BBDD </td>
			<td> 12 de marzo de 2023 </td>
			<td> Sergio Atienza </td>
		</tr>
		<tr>
			<td> Etapa 2.6 </td>
			<td> Creación páginas en cabecera</td>
			<td> 14 de marzo de 2023 </td>
			<td> Lucero Abregú </td>
		</tr>
		<tr>
			<td> Etapa 2.7 </td>
			<td> Creación página Carrito </td>
			<td> 20 de marzo de 2023 </td>
			<td> Jesús Hernández </td>
		</tr>
		<tr>
			<td> Etapa 2.8 </td>
			<td> Corrección entrega 1 </td>
			<td> 21 de marzo de 2023 </td>
			<td> TODOS </td>
		</tr>
		<tr>
			<td> Entrega práctica 2 </td>
			<td> Diseño de la aplicación usando HTML, versión mínima del proyecto </td>
			<td> 23 de marzo de 2023 </td>
			<td> TODOS </td>
		</tr>
		<tr>
			<td> Etapa 3.1 </td>
			<td> Funcionalidad Blog </td>
			<td> 27 de marzo de 2023 </td>
			<td> Sergio Atienza </td>
		</tr>
		<tr>
			<td> Etapa 3.2 </td>
			<td> Corrección entrega 2 </td>
			<td> 1 de abril de 2023 </td>
			<td> TODOS </td>
		</tr>
		<tr>
			<td> Entrega práctica 3 </td>
			<td> Diseño de la apariencia de la app con hojas de estilo </td>
			<td> 14 de abril de 2023 </td>
			<td> TODOS </td>
		</tr>
		<tr>
			<td> Etapa 4.1 </td>
			<td> Corrección práctica 3 </td>
			<td> 25 de abril de 2023 </td>
			<td> TODOS </td>
		</tr>
		<tr>
			<td> Entrega final </td>
			<td> Aplicación Web completa y funcional </td>
			<td> 5 de marzo de 2023 </td>
			<td> TODOS </td>
		</tr>
	</table>
</div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>