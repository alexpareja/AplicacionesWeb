<?php
include_once ("includes/configuracion.php");
$id = $_GET["id"];
$comentarios = es\ucm\fdi\aw\ComentariosBlog::buscaPorEntrada($id);

echo json_encode(parseaComentarios($comentarios));

function parseaComentario($comentario) {
    $respuestas = es\ucm\fdi\aw\ComentariosBlog::buscaPorRespuesta($comentario->getId());
    if ($respuestas) {
        return array(
            'id' => $comentario->getId(),
            'entradaBlog' => $comentario->getEntradaBlog(),
            'usuario' => es\ucm\fdi\aw\Usuario::buscaPorId($comentario->getUsuario())->getNombre(),
            'contenido' => $comentario->getContenido(),
            'fecha' => $comentario->getFecha(),
            'respuesta' => $comentario->getRespuesta(),
            'respuestas' => parseaComentarios($respuestas)
        );
    }
    return array(
        'id' => $comentario->getId(),
        'entradaBlog' => $comentario->getEntradaBlog(),
        'usuario' => es\ucm\fdi\aw\Usuario::buscaPorId($comentario->getUsuario())->getNombre(),
        'contenido' => $comentario->getContenido(),
        'fecha' => $comentario->getFecha(),
        'respuesta' => $comentario->getRespuesta(),
        'respuestas' => []
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