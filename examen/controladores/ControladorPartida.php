<?php

    class ControladorPartida {

        /**
         * LLama al metodo que saca todas las partidas de un id_jugador y las pinta
         */
        public static function mostrarPartidas() {
            $partidas = PartidaBD::getPartidas();

            VistaPartidas::mostrarPartidas($partidas);
                
        }

        /**
         * Llama al modelo para insertar una partida nueva con los datos insertados en el formulario
         */
        public static function nuevaPartida($id_jugador, $fecha, $hora, $ciudad, $lugar, $cubierta, $estado) {
            PartidaBD::insertPartida($id_jugador, $fecha, $hora, $ciudad, $lugar, $cubierta, $estado);
            ControladorPartida::mostrarPartidas();
        }

        /**
         * Llama al modelo para eliminar una partida por id 
         */
        public static function eliminarPartida($id_partida, $id_jugador) {
            PartidaBD::deletePartida($id_partida, $id_jugador);
            ControladorPartida::mostrarPartidas();
        }

        /**
         * LLama la modelo para mostrar los jugadores de cada partida
         */
        public static function mostrarJugadores($id_partida) {
            // Llamamos al modelo para obtener el objeto de enlace
            $partida = PartidaBD::getPartida($id_partida);

            VistaJugadores::render($partida);

            
        }

        /**
         * Muestra todas las partidas asociadas a la fecha pasada como parametro
         */
        public static function buscarPartidasFecha($fecha) {
            $partidas = PartidaBD::buscarPartidasFecha($fecha);
            VistaPartidas::mostrarPartidas($partidas);
        }

        /**
         * Muestra todas las partidas asociadas a la ciudad pasada como parametro
         */
        public static function buscarPartidasCiudad($ciudad) {
            $partidas = PartidaBD::buscarPartidasCiudad($ciudad);
            VistaPartidas::mostrarPartidas($partidas);
        }
    }

?>