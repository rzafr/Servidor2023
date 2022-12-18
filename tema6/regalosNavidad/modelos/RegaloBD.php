<?php

    class RegaloBD {

        /**
         * Devuelve de la base de datos todos los regalos del usuario cuya id se pasa por parametro
         */
        public static function getRegalos($id_usuario) {
            $conexion = ConexionBD::conectar();

            // Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM regalos WHERE id_usuario = ?");
            $stmt->bindValue(1, $id_usuario);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Regalo');
            // Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $regalos = $stmt->fetchAll();

            // Comprobamos si hay regalos de este usuario
            $filas = $stmt->rowCount();

            // Si no me devuelve ninguna fila no hay regalos
            if ($filas == 0) {
                return 0;
            } else {
                // El usuario tiene regalos
                ConexionBD::cerrar();
                return $regalos;
            }
        }

        /**
         * Devuelve de la base de datos todos los regalos y sus enlaces del usuario cuya id se pasa por parametro
         */
        public static function getRegalosConEnlaces($id_usuario) {
            $conexion = ConexionBD::conectar();

            // Consulta BBDD
            $stmt = $conexion->prepare("SELECT regalos.nombre, regalos.destinatario, regalos.precio, regalos.estado, regalos.year, enlaces.id_regalo, enlaces.enlace, enlaces.prioridad FROM regalos JOIN enlaces WHERE regalos.id_usuario = ? AND regalos.id = enlaces.id_regalo");
            $stmt->bindValue(1, $id_usuario);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Regalo');
            // Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $regalosConEnlaces = $stmt->fetchAll();

            // Comprobamos si hay regalos de este usuario
            $filas = $stmt->rowCount();

            // Si no me devuelve ninguna fila no hay regalos
            if ($filas == 0) {
                return 0;
            } else {
                // El usuario tiene regalos
                ConexionBD::cerrar();
                return $regalosConEnlaces;
            }
        }

        /**
         * Inserta un regalo en la base de datos
         */
        public static function insertRegalo($id_usuario, $nombre, $destinatario, $precio, $estado, $year) {
            $conexion = ConexionBD::conectar();

            try {
                // Insertar
                $stmt = $conexion->prepare("INSERT INTO regalos (id_usuario, nombre, destinatario, precio, estado, year) VALUES (?, ?, ?, ?, ?, ?)");
                // Bind
                $stmt->bindValue(1, $id_usuario);
                $stmt->bindValue(2, $nombre);
                $stmt->bindValue(3, $destinatario);
                $stmt->bindValue(4, $precio);
                $stmt->bindValue(5, $estado);
                $stmt->bindValue(6, $year);
                // Ejecuta la consulta
                $stmt->execute();
            } catch (PDOException $e){
                echo $e->getMessage();
            }

            ConexionBD::cerrar();
        }

        /**
         * Modifica un regalo en la base de datos
         */
        public static function updateRegalo($id, $nombre, $destinatario, $precio, $estado, $year) {
            $conexion = ConexionBD::conectar();

            try {
                $stmt = $conexion->prepare("UPDATE regalos SET nombre = ?, destinatario = ?, precio = ?, estado = ?, year = ? WHERE id = ?");
                $stmt->bindValue(1, $nombre);
                $stmt->bindValue(2, $destinatario);
                $stmt->bindValue(3, $precio);
                $stmt->bindValue(4, $estado);
                $stmt->bindValue(5, $year);
                $stmt->bindValue(6, $id);
                $stmt->execute();
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
            
            ConexionBD::cerrar();
        }

        /**
         * Elimina un regalo de la base de datos
         */
        public static function deleteRegalo($id_regalo) {
            $conexion = ConexionBD::conectar();

            try {
                $stmt = $conexion->prepare("DELETE FROM regalos WHERE id = ?");
                $stmt->bindValue(1, $id_regalo);
                $stmt->execute();
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
            
            ConexionBD::cerrar();
        }

        /**
         * Busca en la base de datos regalos por year
         */
        public static function buscarRegalosYear($id_usuario, $year) {
            $conexion = ConexionBD::conectar();

            // Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM regalos WHERE id_usuario = ? AND year LIKE ?");
            // Bind
            $stmt->bindValue(1, $id_usuario);
            $stmt->bindValue(2, "%".$year."%");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Regalo');
            // Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $regalos = $stmt->fetchAll();

            ConexionBD::cerrar();

            return $regalos;
        }
    }



?>