<?php

    class ControladorBlog {

        /**
         * LLama al metodo que saca todos los posts de la BBDD y los pinta
         */
        public static function mostrarBlog() {
            $posts = PostBD::getPosts();

            if ($posts == 0)
                VistaBlog::sinPosts();
            else
                VistaBlog::mostrarBlog($posts);
            
                
        }
    }

?>