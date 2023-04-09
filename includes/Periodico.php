<?php 
namespace es\ucm\fdi\aw;

class Periodico {
    private $entradas;

    public function __construct() {
        $this->entradas = Blog::getBlog();
    }

    public function entradasEnBlog() {
        $html = <<<EOS
                <h2 class="titulo1">Una caja</h2>
                <h2 class="titulo2">de blogs</h2>
                <div id="blog">
            EOS;
        foreach($this->entradas as $ent){
            $link = 'entradaBlog.php?id='.$ent->getId();
            $titulo = $ent->getTitulo();
            $descripcion = $ent->getDescripcion();
            $idAutor = $ent->getAutor();
            $autor=Usuario::buscaPorId($idAutor)->getNombre();

            $html .= <<<EOS
                        <div id="rectangulo">
                            <a href='$link'>
                                <p class="t1">$titulo</p>
                                <p class="t2">$descripcion</p>
                                <p class="t3">Escrito por $autor</p>
                            </a>
                        </div>
                        <div id="etiqueta"></div>
                EOS;
        }

        $html .= <<<EOS
            </div>
        EOS;
        return $html;
    }

}

?>