<?php
    class JugadorBD {

        public static function chequearLogin($email, $password, &$jugador) {
            $conexion = ConexionBD::conectar();
            
            $stmt = $conexion->prepare("SELECT * FROM jugadores WHERE email = ? AND password = ?");
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $password);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Jugador');
            $jugador = $stmt->fetch();

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