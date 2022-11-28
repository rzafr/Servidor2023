<?php

    class UsuarioBD {

        public static function getUsuarios() {

            $conexion = ConexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM usuarios");

            $stmt->execute();

            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $usuarios = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Usuario');

            ConexionBD::cerrar();

            return $usuarios;
        }

        // public static function getPelicula($id) {
        //     $conexion = ConexionBD::conectar();

        //     //Consulta BBDD
        //     $stmt = $conexion->prepare("SELECT * FROM peliculas WHERE id = ?");
        //     $stmt->bindValue(1, $id);
        //     $stmt->execute();

        //     $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Pelicula');
        //     //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        //     $pelicula = $stmt->fetch();

        //     ConexionBD::cerrar();

        //     return $pelicula;
        // }




    }

?>