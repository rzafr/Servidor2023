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

        /**
         * Devuelve de la base de datos todos los enlaces del regalo cuya id se pasa por parametro ordenados por precio ascendente
         */
        public static function getEnlacesPorPrecio($id_regalo) {
            $conexion = ConexionBD::conectar();

            // Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM enlaces WHERE id_regalo = ? ORDER BY precio ASC");
            $stmt->bindValue(1, $id_regalo);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Enlace');
            // Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $enlaces = $stmt->fetchAll();

            ConexionBD::cerrar();

            return $enlaces;
        }

        /**
         * Inserta en la base de datos un enlace nuevo
         */
        public static function nuevoEnlace($enlace) {
            $conexion = ConexionBD::conectar();

            // Consulta BBDD
            $stmt = $conexion->prepare("INSERT INTO enlaces (id_regalo, nombre, enlace, precio, imagen, prioridad) 
                        VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bindValue(1,$enlace->getId_regalo());
            $stmt->bindValue(2,$enlace->getNombre());
            $stmt->bindValue(3,$enlace->getEnlace());
            $stmt->bindValue(4,$enlace->getPrecio());
            $stmt->bindValue(5,$enlace->getImagen());
            $stmt->bindValue(6,$enlace->getPrioridad());

            //echo $stmt->debugDumpParams();
            $stmt->execute();

            ConexionBD::cerrar();
        }

         /**
         * Elimina un enlace de la base de datos
         */
        public static function deleteEnlace($id_enlace) {
            $conexion = ConexionBD::conectar();

            try {
                $stmt = $conexion->prepare("DELETE FROM enlaces WHERE id = ?");
                $stmt->bindValue(1, $id_enlace);
                $stmt->execute();
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
            
            ConexionBD::cerrar();
        }
    }
?>