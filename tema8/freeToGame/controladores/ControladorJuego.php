<?php

    class ControladorJuego {

        public static function mostrarJuegos() {            
            VistaJuego::mostrarJuegosAPI();
        }

        public static function mostrarJuego($id) {
            $comments = ComentarioBD::getComentarios($id);
            VistaJuego::mostrarJuegoAPI($id, $comments);
        }

        public static function comentarJuego($id, $comment) {
            //Llamar al modelo para insertar esto
            ComentarioBD::apuntarComentario($id, $comment);
            $comments = ComentarioBD::getComentarios($id);
            VistaJuego::mostrarJuegoAPI($id, $comments);
        }

        public static function buscarJuegosCat($categoria) {            
            VistaJuego::mostrarJuegosAPICat($categoria);
        }
    }


?>