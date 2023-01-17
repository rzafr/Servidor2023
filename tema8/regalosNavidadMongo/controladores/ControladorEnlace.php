<?php
    class ControladorEnlace {

        /**
         * LLama la modelo para mostrar los enlaces de cada regalo
         */
        public static function mostrarEnlaces($id_regalo) {
            // Llamamos al modelo para obtener el objeto de enlace
            $enlaces = EnlaceBD::getEnlaces($id_regalo);

            if ($enlaces == 0)
                VistaEnlaces::sinEnlaces();
            else
                // Llamamos a la vista para pintar los enlaces
                VistaEnlaces::render($enlaces);

            
        }

        /**
         * LLama la modelo para mostrar los enlaces de cada regalo
         */
        public static function mostrarEnlacesPorPrecio($id_regalo) {
            // Llamamos al modelo para obtener el objeto de enlace
            $enlaces = EnlaceBD::getEnlacesPorPrecio($id_regalo);

            // Llamamos a la vista para pintar los enlaces
            VistaEnlaces::render($enlaces);
        }

        /**
         * LLama al modelo para insertar nuevo enlace
         */
        public static function nuevoEnlace($enlace) {
            EnlaceBD::nuevoEnlace($enlace);
            ControladorEnlace::mostrarEnlaces($enlace->getId_regalo());
        }

        /**
         * Llama al modelo para eliminar un enlace por id
         */
        public static function eliminarEnlace($id_enlace, $id_regalo) {
            EnlaceBD::deleteEnlace($id_enlace);
            ControladorEnlace::mostrarEnlaces($id_regalo);
        }

    }

?>