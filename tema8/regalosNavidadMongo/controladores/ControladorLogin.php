<?php
    class ControladorLogin {

        /**
         * Muestra el formulario de login
         */
        public static function mostrarFormularioLogin() {
            VistaLogin::mostrarFormularioLogin("");
        }

        /**
         * Muestra si se produce un error en el formulario de login
         */
        public static function mostrarFormularioLoginError() {
            VistaLogin::mostrarFormularioLogin("Error de login, prueba otra vez");
        }

        /**
         * Comprueba si el email y la password existen en la base de datos
         */
        public static function chequearLogin($email, $password) {
            $usuario = null;
            $valido = UsuarioBD::chequearLogin($email, $password, $usuario);

            // Error login
            if ($valido == 0) {
                echo "<script>window.location='enrutador.php?accion=error';</script>";
            }

            // Login correcto
            if ($valido == 1) {
                $_SESSION['usuario'] = serialize($usuario);
                echo "<script>window.location='enrutador.php?accion=mostrarRegalos';</script>";
            }


        }

    }

?>