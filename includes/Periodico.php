<?php 
namespace es\ucm\fdi\aw;

class Periodico {
    private $entradas;

    public function __construct() {
        $this->entradas = Blog::getBlog();
    }

    public function entradasEnBlog() {
        $html = <<<EOS
                <div class="panelBlog">
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
            </div>
        EOS;
        return $html;
    }

    public function blogsAleatorios() {
        $html = <<<EOS
        <h2 class="tituloBlogRec">Sugerencias</h2>
        <div class="panelRecomendacionesBlog">
        EOS;
        
        // Obtener una lista aleatoria de tres productos
        $blogs_aleatorios = array_rand($this->entradas, 2);
        
        foreach($blogs_aleatorios as $key => $value) {
            $blog = $this->entradas[$value];
            $link = 'entradaBlog.php?id='.$blog->getId();
            $src = 'img/blog_'.$blog->getId().'.png';
            $alt = 'Imagen de Blog '.$blog->getId();
            $titulo = $blog->getTitulo();
            $idAutor = $blog->getAutor();
            $autor=Usuario::buscaPorId($idAutor)->getNombre();

            
            $html .= <<<EOS
                <div class="blogRecomendado">
                    <a href='$link'>
                        <img class='imagenRecBlog' src='$src' alt='$alt'>
                        <p class="tituloRecBlog">$titulo</p>
                        <p class="autorRecBlog">Escrito por $autor</p>
                    </a>
                </div>                 
            EOS;
        }
        
        $html .= <<<EOS
        </div>
        EOS;
        return $html;
    }
    

}

?>