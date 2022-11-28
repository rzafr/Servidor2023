<?php

    class ControladorPrestamo {

        /**
         * Muestra todos los prestamos de la base de datos
         */
        public static function mostrarPrestamos() {
            // LLama al modelo para obtener todas las pretamos en un array de Prestamo
            $prestamos = PrestamoBD::getPrestamos();

            // Llama a la vista para pintar los prestamos
            VistaPrestamosTodos::render($prestamos);
        }

        public static function mostrarPrestamo($dni) {
            //LLamar al modelo para obtener los objetos de prestamos con ese DNI
            $prestamos = PrestamoBD::buscarPrestamos($dni);

            // Llama a la vista para pintar los prestamos
            VistaPrestamosTodos::render($prestamos);
        }

        /**
         * Muestra el formulario para insertar prestamos nuevos
         */
        public static function mostrarFormularioNuevoPrestamo() {
            $usuarios = UsuarioBD::getUsuarios();
            $libros = LibroBD::getLibros();
            VistaFormularioNuevoPrestamo::render($usuarios, $libros);
        }

        public static function nuevoPrestamo($usuario, $libro, $fechaInicio, $fechaFin, $estado) {
            PrestamoBD::insertPrestamo($usuario, $libro, $fechaInicio, $fechaFin, $estado);
            ControladorPrestamo::mostrarPrestamos();
        }

        public static function modificarPrestamo($id, $fechaFin, $estado) {
            PrestamoBD::updatePrestamo($id, $fechaFin, $estado);
            ControladorPrestamo::mostrarPrestamos();
        }

        public static function eliminarPrestamo($id) {
            PrestamoBD::deletePrestamo($id);
            ControladorPrestamo::mostrarPrestamos();
        }
    }



?>