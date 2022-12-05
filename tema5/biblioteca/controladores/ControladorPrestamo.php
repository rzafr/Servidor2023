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

        /**
         * Muestra todos los prestamos asociados al DNI pasado como parametro
         */
        public static function buscarPrestamosDNI($dni) {
            //LLamar al modelo para obtener los objetos de prestamos con ese DNI
            $prestamos = PrestamoBD::buscarPrestamosDNI($dni);

            // Llama a la vista para pintar los prestamos
            VistaPrestamosTodos::render($prestamos);
        }

        /**
         * Muestra todos los prestamos asociados al estado pasado como parametro
         */
        public static function buscarPrestamosEstado($estado) {
            //LLamar al modelo para obtener los objetos de prestamos con ese estado
            $prestamos = PrestamoBD::buscarPrestamosEstado($estado);

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

        /**
         * Llama al modelo para insertar un prestamo nuevo con los datos insertados en el formulario
         */
        public static function nuevoPrestamo($usuario, $libro, $fechaInicio, $fechaFin, $estado) {
            PrestamoBD::insertPrestamo($usuario, $libro, $fechaInicio, $fechaFin, $estado);
            ControladorPrestamo::mostrarPrestamos();
        }

        /**
         * Modifica de un prestamo existente la fecha y/o el estao
         */
        public static function modificarPrestamo($id, $fechaFin, $estado) {
            PrestamoBD::updatePrestamo($id, $fechaFin, $estado);
            ControladorPrestamo::mostrarPrestamos();
        }

        /**
         * Llama al modelo para eliminar un prestamo por id
         */
        public static function eliminarPrestamo($id) {
            PrestamoBD::deletePrestamo($id);
            ControladorPrestamo::mostrarPrestamos();
        }
    }



?>