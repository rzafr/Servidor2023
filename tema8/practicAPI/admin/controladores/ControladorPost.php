<?php

    class ControladorPost {

        /**
         * Muestra el formulario de generar post
         */
        public static function mostrarForm() {            
            VistaPost::mostarForm("");
        }

        /**
         * Muestra mensaje si el post se ha guardado correctamente
         */
        public static function mostrarFormPostGuardado() {            
            VistaPost::mostarForm("Post guardado correctamente");
        }

        /**
         * Muestra mensaje si el post se ha descartado
         */
        public static function mostrarFormDescarte() {            
            VistaPost::mostarForm("Post descartado");
        }

        /**
         * Muestra el post creado
         */
        public static function mostrarPost($titulo) {            
            VistaPost::mostrarPost($titulo);
        }

        /**
         * Llama al modelo para insertar un post nuevo 
         */
        public static function guardarPost($post) {
            PostBD::insertPost($post);
            ControladorPost::mostrarFormPostGuardado();
        }
    }
?>