<?php
require_once __DIR__.'/includes/configuracion.php';
$tituloPagina = 'Mi Perfil';
$contenidoPrincipal = '';

    $id = $_SESSION['id'];
    $nombre = $_SESSION['nombre'];
    $apellido1 = $_SESSION['apellido1'];
    $apellido2 = $_SESSION['apellido2'];
    $email = $_SESSION['email'];
    $direccion = $_SESSION['direccion'];

    $contenidoPrincipal = <<<EOS
        <div class="cabecera-perfil">
            <h2>Mi perfil</h2>
            <br>
            <p>Aquí puedes encontrar tus datos personales</p>
        </div>
        <div class="perfil-contenedor">
            <div class="info-perfil">
                <h3>Información personal</h3>
                <br>
                <p class ="negrita">Nombre: $nombre</p>
                <p>Apellidos: $apellido1 $apellido2</p>
                <p>Correo electrónico: $email</p>
                <div class="botones">
                    <form action='editarUsuario.php'>
                        <input type="hidden" name="id" value="$id">
                        <button type="submit" class="boton-edicion">Editar</button>
                    </form>
                </div>
            </div>
            <div class="info-dir">
                <h3>Dirección de facturación</h3>
                <br>
                <p>Dirección: $direccion</p>
            </div>
        </div>
    EOS;

    $contenidoPrincipal .= <<<EOS
        <h2 class="titulo1">Sugerencias</h2>
        <h2 class="titulo2">de La Quinta Caja</h2>
    EOS;
    //Se muestran los porductos de la tienda
    $tienda = new es\ucm\fdi\aw\Tienda();
    $contenidoPrincipal .= $tienda->productosAleatoriosEnTienda();

require __DIR__.'/includes/plantillas/plantilla.php';
?>