<?php
include_once ("includes/configuracion.php");

$comentario = trim( $_POST['textoRespuesta']?? '');
$comentario = htmlspecialchars($comentario, ENT_QUOTES, 'UTF-8');

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