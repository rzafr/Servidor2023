<?php

    class EnlaceBD {

        /**
         * Devuelve de la base de datos todos los enlaces del regalo cuya id se pasa por parametro
         */
        public static function getEnlaces($id_regalo) {
            $conexion = ConexionBD::conectar();

            $coleccion = $conexion->enlaces;

            $cursor = $coleccion->find(["id_regalo" => intVal($id_regalo)]);

            // Crear los objetos para devolverlos (MVC), Mongo me devuelve array asociativo
            $enlaces = array();
            foreach($cursor as $enlace) {
               $enlace_OBJ = new Enlace($enlace['id_regalo'], $enlace['nombre'], $enlace['enlace'], $enlace['precio'], $enlace['imagen'], $enlace['prioridad']);
               $enlace_OBJ->setId($enlace['id']);
               array_push($enlaces, $enlace_OBJ);
            }

            // Si no me devuelve nada no hay enlaces
            if ($cursor == null) {
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

            $coleccion = $conexion->enlaces;

            $cursor = $coleccion->find(
                ["id_regalo" => intVal($id_regalo)], 
                [
                    'sort' => ['precio' => 1],
                ]);

            // Crear los objetos para devolverlos (MVC), Mongo me devuelve array asociativo
            $enlaces = array();
            foreach($cursor as $enlace) {
               $enlace_OBJ = new Enlace($enlace['id_regalo'], $enlace['nombre'], $enlace['enlace'], $enlace['precio'], $enlace['imagen'], $enlace['prioridad']);
               $enlace_OBJ->setId($enlace['id']);
               array_push($enlaces, $enlace_OBJ);
            }


            ConexionBD::cerrar();

            return $enlaces;
        }

        /**
         * Inserta en la base de datos un enlace nuevo
         */
        public static function nuevoEnlace($enlace) {
            $conexion = ConexionBD::conectar();

            // Hacer el autoincrement
            // Ordeno por id y me quedo con el mayor
            $enlaceMayor = $conexion->enlaces->findOne(
                [],
                [
                    'sort' => ['id' => -1],
                ]);
            if (isset($enlaceMayor))
                $idValue = $enlaceMayor['id'];
            else
                $idValue = 0;

            // Colleccion enlaces
            $conexion->enlaces->insertOne([
                'id' => intVal($idValue + 1),
                'id_regalo' => $enlace->getId_regalo(),
                'nombre' => $enlace->getNombre(),
                'enlace' => $enlace->getEnlace(),
                'precio' => $enlace->getPrecio(),
                'imagen' => $enlace->getImagen(),
                'prioridad' => $enlace->getPrioridad()
            ]);

            ConexionBD::cerrar();
        }

         /**
         * Elimina un enlace de la base de datos
         */
        public static function deleteEnlace($id_enlace) {
            $conexion = ConexionBD::conectar();

            $conexion->enlaces->deleteOne(['id' => intVal($id_enlace)]);
            
            ConexionBD::cerrar();
        }
    }
?>