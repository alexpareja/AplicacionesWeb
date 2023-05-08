<?php
include_once ("includes/configuracion.php");

$comentario = trim( $_POST['textoRespuesta']?? '');
$comentario = filter_var($comentario, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id = $_POST['id'];
$entrada = $_POST['entrada'];
$respuesta = $_POST['respuesta'];
$nuevoComentario=es\ucm\fdi\aw\ComentariosBlog::responde($entrada,$id,$comentario,$respuesta);
$response = array(
    'id' => $nuevoComentario->getId(),
    'respuesta' => $comentario
);
echo json_encode($response);
?>