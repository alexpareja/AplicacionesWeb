<?php
include_once ("includes/configuracion.php");
$id = $_GET["id"];
$comentarios = es\ucm\fdi\aw\ComentariosProd::buscaPorProducto($id);

echo json_encode(parseaComentarios($comentarios));

function parseaComentario($comentario) {
    return array(
        'id' => $comentario->getId(),
        'entradaBlog' => $comentario->getEntradaBlog(),
        'usuario' => es\ucm\fdi\aw\Usuario::buscaPorId($comentario->getUsuario())->getNombre(),
        'contenido' => $comentario->getContenido(),
        'fecha' => $comentario->getFecha(),
        'review' => $comentario->getReview()
    );
}

function parseaComentarios($comentarios) {
    $data = array();
    foreach ($comentarios as $comentario) {
        $data[] = parseaComentario($comentario);
    }
    return $data;
}
?>