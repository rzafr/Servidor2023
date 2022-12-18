<?php

    class EnlaceBD {

        /**
         * Devuelve de la base de datos todos los enlaces del regalo cuya id se pasa por parametro
         */
        public static function getEnlaces($id_regalo) {
            $conexion = ConexionBD::conectar();

            // Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM enlaces WHERE id_regalo = ?");
            $stmt->bindValue(1, $id_regalo);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Enlace');
            // Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $enlaces = $stmt->fetchAll();

            // Comprobamos si hay enlaces de este regalo
            $filas = $stmt->rowCount();

            // Si no me devuelve ninguna fila no hay enlaces
            if ($filas == 0) {
                return 0;
            } else {
                // El regalo tiene enlaces
                ConexionBD::cerrar();
                return $enlaces;
            }
        }
    }
?>