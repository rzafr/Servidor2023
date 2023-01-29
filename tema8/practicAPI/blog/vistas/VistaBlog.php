<?php

    class VistaBlog {

        /**
         * Muestra un aviso si no hay posts en la BBDD
         */
        public static function sinPosts() {

            include("./vistas/cabecera.php");

            echo "<div class='row mt-5 d-flex justify-content-center'>
                        <div class='col-12 d-flex justify-content-center'>
                            <h1>Sin contenidos</h1>
                        </div>
                    </div>";

            include("./vistas/pie.php");

        }

        /**
         * Pinta los posts de la BBDD
         */
        public static function mostrarBlog($posts) {

            include("./vistas/cabecera.php");

            foreach ($posts as $post) {

                echo "<div class='row mt-5'>
                        <div class='col-12'>
                            <h1>".$post->getTitulo()."</h1>
                            <p><small class='text-muted'>Publicado el ".$post->getFecha()."</small></p>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-8'>
                            <p>".$post->getTexto()."</p>
                        </div>
                        <div class='col-3 ml-5'>
                            <img src='".$post->getImagen()."' alt='' width='300' height='300'>
                        </div>               
                    </div>";

            }

            include("./vistas/pie.php");
            
        }
    }

?>