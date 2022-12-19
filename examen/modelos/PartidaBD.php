<?php

    class PartidaBD {

        /**
         * Devuelve de la base de datos todas las partidas
         */
        public static function getPartidas() {
            $conexion = ConexionBD::conectar();

            // Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM partidas WHERE fecha >= CURDATE() ORDER BY fecha ASC");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Partida');
            // Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $partidas = $stmt->fetchAll();

            // Agregamos los Jugadores que estan en la partida
            foreach ($partidas as $partida) {
                if ($partida->getId_jugador1() != NULL) {
                    // Consulta BBDD
                    $stmt = $conexion->prepare("SELECT * FROM jugadores WHERE id = ?");
                    // Bind
                    $stmt->bindValue(1, $partida->getId_jugador1());
                    $stmt->execute();

                    $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Jugador');
                    // Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
                    $jugador = $stmt->fetch();

                    // Agreagmos el jugador al array de jugadores
                    $partida->addJugador($jugador);
                }
                if ($partida->getId_jugador2() != NULL) {
                    // Consulta BBDD
                    $stmt = $conexion->prepare("SELECT * FROM jugadores WHERE id = ?");
                    // Bind
                    $stmt->bindValue(1, $partida->getId_jugador2());
                    $stmt->execute();

                    $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Jugador');
                    // Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
                    $jugador = $stmt->fetch();

                    // Agreagmos el jugador al array de jugadores
                    $partida->addJugador($jugador);
                }
                if ($partida->getId_jugador3() != NULL) {
                    // Consulta BBDD
                    $stmt = $conexion->prepare("SELECT * FROM jugadores WHERE id = ?");
                    // Bind
                    $stmt->bindValue(1, $partida->getId_jugador3());
                    $stmt->execute();

                    $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Jugador');
                    // Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
                    $jugador = $stmt->fetch();

                    // Agreagmos el jugador al array de jugadores
                    $partida->addJugador($jugador);
                }
                if ($partida->getId_jugador4() != NULL) {
                    // Consulta BBDD
                    $stmt = $conexion->prepare("SELECT * FROM jugadores WHERE id = ?");
                    // Bind
                    $stmt->bindValue(1, $partida->getId_jugador4());
                    $stmt->execute();

                    $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Jugador');
                    // Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
                    $jugador = $stmt->fetch();

                    // Agreagmos el jugador al array de jugadores
                    $partida->addJugador($jugador);
                }
            }
            
            ConexionBD::cerrar();
            return $partidas;
        }

        public static function getPartida($id_partida) {
            $conexion = ConexionBD::conectar();

            // Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM partidas WHERE id = ?");
            $stmt->bindValue(1, $id_partida);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Partida');
            // Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $partida = $stmt->fetch();

            ConexionBD::cerrar();
            return $partida;

        }

        /**
         * Inserta una partida en la base de datos
         */
        public static function insertPartida($id_jugador, $fecha, $hora, $ciudad, $lugar, $cubierta, $estado) {
            $conexion = ConexionBD::conectar();

            // Comprobamos la cubierta
            if ($cubierta == true)
                $cubierta = 1;
            else
                $cubierta = 0;

            try {
                // Insertar
                $stmt = $conexion->prepare("INSERT INTO partidas (fecha, hora, ciudad, lugar, cubierta, estado, id_jugador1) VALUES (?, ?, ?, ?, ?, ?, ?)");
                // Bind
                $stmt->bindValue(1, $fecha);
                $stmt->bindValue(2, $hora);
                $stmt->bindValue(3, $ciudad);
                $stmt->bindValue(4, $lugar);
                $stmt->bindValue(5, $cubierta);
                $stmt->bindValue(6, $estado);
                $stmt->bindValue(7, $id_jugador);
                // Ejecuta la consulta
                $stmt->execute();
            } catch (PDOException $e){
                echo $e->getMessage();
            }

            ConexionBD::cerrar();
        }

        /**
         * Elimina una partida de la base de datos si el Jugador esta en ella
         */
        public static function deletePartida($id_partida, $id_jugador) {
            $conexion = ConexionBD::conectar();

            try {
                $stmt = $conexion->prepare("DELETE FROM partidas WHERE id = ? AND id_jugador1 = ? OR id_jugador2 = ? OR id_jugador3 = ? OR id_jugador4 = ?");
                $stmt->bindValue(1, $id_partida);
                $stmt->bindValue(2, $id_jugador);
                $stmt->bindValue(3, $id_jugador);
                $stmt->bindValue(4, $id_jugador);
                $stmt->bindValue(5, $id_jugador);
                $stmt->execute();
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
            
            ConexionBD::cerrar();
        }

        /**
         * Busca en la base de datos partidas por fecha
         */
        public static function buscarPartidasFecha($fecha) {
            $conexion = ConexionBD::conectar();

            // Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM partidas WHERE fecha LIKE ? AND fecha >= CURDATE()");
            // Bind
            $stmt->bindValue(1, "%".$fecha."%");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Partida');
            // Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $partidas = $stmt->fetchAll();

            ConexionBD::cerrar();

            return $partidas;
        }

        /**
         * Busca en la base de datos partidas por ciudad
         */
        public static function buscarPartidasCiudad($ciudad) {
            $conexion = ConexionBD::conectar();

            // Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM partidas WHERE ciudad LIKE ? AND fecha >= CURDATE()");
            // Bind
            $stmt->bindValue(1, "%".$ciudad."%");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Partida');
            // Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $partidas = $stmt->fetchAll();

            ConexionBD::cerrar();

            return $partidas;
        }
    }



?>