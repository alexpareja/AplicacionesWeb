<?php 
namespace es\ucm\fdi\aw;

class Periodico {
    private $entradas;

    public function __construct() {
        $this->entradas = Blog::getBlog();
    }

    public function entradasEnBlog() {
        $html = <<<EOS
                <section class="panelBlog">
            EOS;
        foreach($this->entradas as $ent){
            $link = 'entradaBlog.php?id='.$ent->getId();
            $src = 'img/blog_' . $ent->getId() . '.png';
            $alt = 'Imagen de Blog '.$ent->getId();
            $titulo = $ent->getTitulo();
            $descripcion = $ent->getDescripcion();
            $idAutor = $ent->getAutor();
            $autor=Usuario::buscaPorId($idAutor)->getNombre();

            $html .= <<<EOS
                        <div class="articulo">
                            <a href="$link">
                                <img src="$src" alt="$alt" class="imagenBlog">
                                <p class="tituloArt">$titulo</p>
                                <p class="descripcionArt">$descripcion</p>
                                <p class="autorArt">Escrito por $autor</p>
                            </a>
                        </div>
                EOS;
        }

        $html .= <<<EOS
            </section>
        EOS;
        return $html;
    }

}

?>