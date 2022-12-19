<?php
    class ControladorRegalo {

        /**
         * LLama al metodo que saca todos los regalos de un id_usuario y los pinta
         */
        public static function mostrarRegalos($id_usuario) {
            $regalos = RegaloBD::getRegalos($id_usuario);

            if ($regalos == 0)
                VistaRegalos::sinRegalos();
            else
                VistaRegalos::mostrarRegalos($regalos);
        }

        /**
         * Llama al modelo para insertar un regalo nuevo con los datos insertados en el formulario
         */
        public static function nuevoRegalo($id_usuario, $nombre, $destinatario, $precio, $estado, $year) {
            RegaloBD::insertRegalo($id_usuario, $nombre, $destinatario, $precio, $estado, $year);
            ControladorRegalo::mostrarRegalos($id_usuario);
        }

        /**
         * Modifica de un regalo existente toda la informacion
         */
        public static function modificarRegalo($id, $nombre, $destinatario, $precio, $estado, $year) {
            $id_usuario = unserialize($_SESSION['usuario'])->getId();
            
            RegaloBD::updateRegalo($id, $nombre, $destinatario, $precio, $estado, $year);
            ControladorRegalo::mostrarRegalos($id_usuario);
        }

        /**
         * Llama al modelo para eliminar un regalo por id
         */
        public static function eliminarRegalo($id_regalo) {
            $id_usuario = unserialize($_SESSION['usuario'])->getId();

            RegaloBD::deleteRegalo($id_regalo);
            ControladorRegalo::mostrarRegalos($id_usuario);
        }

        /**
         * Muestra todos los regalos asociados al year pasado como parametro
         */
        public static function buscarRegalosYear($year) {
            $id_usuario = unserialize($_SESSION['usuario'])->getId();
            // Llamamos al modelo para obtener los objetos de regalos con ese year
            $regalos = RegaloBD::buscarRegalosYear($id_usuario, $year);

            // Llamamos a la vista para pintar los regalos
            VistaRegalos::mostrarRegalos($regalos);
        }

        public static function generarPDF($id_usuario) {
            // Llamamos al modelo para obtener los objetos de regalos con sus enlaces de este usuario
            $regalosConEnlaces = RegaloBD::getRegalosConEnlaces($id_usuario);

            if ($regalosConEnlaces == 0)
                VistaRegalos::sinRegalos();
            else {
                // Llamamos a la vista para generar PDF
                VistaRegalos::generarPDF($regalosConEnlaces);

                ControladorRegalo::mostrarRegalos($id_usuario);
            }
                
            
        }
    }

?>