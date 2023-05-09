<?php
include_once ("includes/configuracion.php");
$comentario = trim( $_POST['comentarioBlog']?? '');
$comentario = htmlspecialchars($comentario, ENT_QUOTES, 'UTF-8');

$id = $_POST['id'];
$entrada = $_POST['entrada'];
$nuevoComentario=es\ucm\fdi\aw\ComentariosBlog::crea($entrada,$id,$comentario);

echo $nuevoComentario->getId();
?>