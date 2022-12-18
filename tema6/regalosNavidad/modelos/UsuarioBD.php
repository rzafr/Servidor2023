<?php
    class UsuarioBD {

        public static function chequearLogin($email, $password, &$usuario) {
            $conexion = ConexionBD::conectar();
            
            $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = ? AND password = ?");
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $password);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Usuario');
            $usuario = $stmt->fetch();

            $filas = $stmt->rowCount();

            // Si no me devuelve ninguna fila el password es incorrecto
            if ($filas == 0) {
                return 0;
            } else {
                // Usuario existe y password correcto 
                ConexionBD::cerrar();
                return 1;
            }
        }


    }

?>