<?php

    class ComentarioBD {

        public static function apuntarComentario($idJuego, $comment) {
            $conexion = ConexionBD::conectar();

            $comentarios = ComentarioBD::getComentarios($idJuego);

            if ($comentarios != null) {
                $comentarios = $comentarios->getArrayCopy();
            }

            array_push($comentarios, $comment);
            
            $coleccion = $conexion->comments;

            // comentarios sería un array de comentarios

            $coleccion->updateOne(
                ['idJuego' => intVal($idJuego)],
                ['$set' => ['comentarios' => $comentarios] ],
                ['upsert' => true]  //Inserta si no encuentra. Modifica si lo encuentra
            );

            ConexionBD::cerrar();

        }

        public static function getComentarios($idJuego) {
            $conexion = ConexionBD::conectar();
            
            $coleccion = $conexion->comments;

            $comments = $coleccion->findOne(['idJuego' => intVal($idJuego)]);

            if ($comments == null) {
                $comments['comentarios'] = array();
                return $comments['comentarios'];
            } else {
                return $comments['comentarios'];
            }
                
        }
    }

?>