<?php
include_once ("includes/configuracion.php");
$comentario = trim( $_POST['comentarioBlog']?? '');
$comentario = filter_var($comentario, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id = $_POST['id'];
$entrada = $_POST['entrada'];
$nuevoComentario=es\ucm\fdi\aw\ComentariosBlog::crea($entrada,$id,$comentario);
echo $nuevoComentario->getId();
?>