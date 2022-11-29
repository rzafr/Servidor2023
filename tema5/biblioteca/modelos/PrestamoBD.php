<?php

    class PrestamoBD {

        public static function getPrestamos() {
            $conexion = ConexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT prestamos.id, prestamos.id_usuario, prestamos.id_libro, prestamos.fechaInicio, prestamos.fechaFin, prestamos.estado, usuarios.dni, libros.titulo FROM prestamos join usuarios join libros WHERE prestamos.id_usuario = usuarios.id and prestamos.id_libro = libros.id ORDER BY prestamos.fechaInicio DESC");
            
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Prestamo');
            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $prestamos = $stmt->fetchAll();

            ConexionBD::cerrar();

            return $prestamos;
        }

        public static function buscarPrestamosDNI($dni) {
            $conexion = ConexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM prestamos JOIN usuarios JOIN libros WHERE prestamos.id_usuario = usuarios.id AND prestamos.id_libro = libros.id AND usuarios.dni LIKE ? ORDER BY prestamos.fechaInicio DESC");
            // Bind
            $stmt->bindValue(1, "%".$dni."%");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Prestamo');
            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $prestamos = $stmt->fetchAll();

            ConexionBD::cerrar();

            return $prestamos;
        }

        public static function buscarPrestamosEstado($estado) {
            $conexion = ConexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM prestamos JOIN usuarios JOIN libros WHERE prestamos.id_usuario = usuarios.id AND prestamos.id_libro = libros.id AND prestamos.estado LIKE ? ORDER BY prestamos.fechaInicio DESC");
            // Bind
            $stmt->bindValue(1, "%".$estado."%");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Prestamo');
            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $prestamos = $stmt->fetchAll();

            ConexionBD::cerrar();

            return $prestamos;
        }

        public static function insertPrestamo($usuario, $libro, $fechaInicio, $fechaFin, $estado) {
            $conexion = ConexionBD::conectar();

            try {
                //Insertar
                $stmt = $conexion->prepare("INSERT INTO prestamos (id_usuario, id_libro, fechaInicio, fechaFin, estado) VALUES (?, ?, ?, ?, ?)");
                // Bind
                $stmt->bindValue(1, $usuario);
                $stmt->bindValue(2, $libro);
                $stmt->bindValue(3, $fechaInicio);
                $stmt->bindValue(4, $fechaFin);
                $stmt->bindValue(5, $estado);
                // Ejecuta la consulta
                $stmt->execute();
            } catch (PDOException $e){
                echo $e->getMessage();
            }

            ConexionBD::cerrar();
        }


        public static function updatePrestamo($id, $fechaFin, $estado) {
            $conexion = ConexionBD::conectar();

            try {
                $stmt = $conexion->prepare("UPDATE prestamos SET fechaFin = ?, estado = ? WHERE id = ?");
                $stmt->bindValue(1, $fechaFin);
                $stmt->bindValue(2, $estado);
                $stmt->bindValue(3, $id);
                $stmt->execute();
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
            
            ConexionBD::cerrar();

        }

        // public static function deletePrestamo($id) {
        //     $conexion = ConexionBD::conectar();

        //     try {
        //         $stmt = $conexion->prepare("DELETE FROM prestamos WHERE id = ?");
        //         $stmt->bindValue(1, $id);
        //         $stmt->execute();
        //     } catch (PDOException $ex) {
        //         echo $ex->getMessage();
        //     }
            
        //     ConexionBD::cerrar();

        // }
    }

?>