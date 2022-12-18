<?php
    class ControladorEnlace {

        /**
         * Muestra los enlaces de cada regalo
         */
        public static function mostrarEnlaces($id_regalo) {
            // Llamamos al modelo para obtener el objeto de enlace con id $id
            $enlaces = EnlaceBD::getEnlaces($id_regalo);

            if ($enlaces == 0)
                VistaEnlaces::sinEnlaces();
            else
                // Llamamos a la vista para pintar los enlaces
                VistaEnlaces::render($enlaces);

            
        }
    }

?>