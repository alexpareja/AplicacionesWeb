<?php
include_once ("includes/configuracion.php");
$comentario = trim( $_POST['comentarioProd']?? '');
$comentario = htmlspecialchars($comentario, ENT_QUOTES, 'UTF-8');

$id = $_POST['id'];
$producto = $_POST['producto'];
$review = $_POST['valoracion'];
$nuevoComentario=es\ucm\fdi\aw\ComentariosProd::crea($producto,$id,$comentario,$review);

echo $nuevoComentario->getId();
?>