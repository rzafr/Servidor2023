<?php

    class RegaloBD {

        /**
         * Devuelve de la base de datos todos los regalos del usuario cuya id se pasa por parametro
         */
        public static function getRegalos($id_usuario) {
            $conexion = ConexionBD::conectar();

            $coleccion = $conexion->regalos;

            $cursor = $coleccion->find(["id_usuario" => $id_usuario]);

            // Crear los objetos para devolverlos (MVC), Mongo me devuelve array asociativo
            $regalos = array();
            foreach($cursor as $regalo) {
               $regalo_OBJ = new Regalo($regalo['id_usuario'], $regalo['nombre'], $regalo['destinatario'], $regalo['precio'], $regalo['estado'], $regalo['year']);
               $regalo_OBJ->setId($regalo['id']);
               array_push($regalos, $regalo_OBJ);
            }

            // Si no me devuelve nada no hay regalos
            if ($cursor == null) {
                return 0;
            } else {
                // El usuario tiene regalos
                ConexionBD::cerrar();
                return $regalos;
            }
        }

        /**
         * Inserta un regalo en la base de datos
         */
        public static function insertRegalo($regalo) {
            $conexion = ConexionBD::conectar();

            // Hacer el autoincrement
            // Ordeno por id y me quedo con el mayor
            $regaloMayor = $conexion->regalos->findOne(
                [],
                [
                    'sort' => ['id' => -1],
                ]);
            if (isset($regaloMayor))
                $idValue = $regaloMayor['id'];
            else
                $idValue = 0;


            // Colleccion regalos
            $conexion->regalos->insertOne([
                'id' => intVal($idValue + 1),
                'id_usuario' => $regalo->getId_usuario(),
                'nombre' => $regalo->getNombre(),
                'destinatario' => $regalo->getDestinatario(),
                'precio' => $regalo->getPrecio(),
                'estado' => $regalo->getEstado(),
                'year' => $regalo->getYear()
            ]);

            ConexionBD::cerrar();
        }

        /**
         * Modifica un regalo en la base de datos
         */
        public static function updateRegalo($regalo) {
            $conexion = ConexionBD::conectar();

            $conexion->regalos->updateOne(
                ['id' => intVal($regalo->getId())],
                ['$set' => [
                    'nombre' => $regalo->getNombre(),
                    'destinatario' => $regalo->getDestinatario(),
                    'precio' => $regalo->getPrecio(),
                    'estado' => $regalo->getEstado(),
                    'year' => $regalo->getYear()
                    ] ],
                ['upsert' => true]  //Inserta si no encuentra. Modifica si lo encuentra
            );
            
            ConexionBD::cerrar();
        }

        /**
         * Elimina un regalo de la base de datos
         */
        public static function deleteRegalo($id_regalo) {
            $conexion = ConexionBD::conectar();

            $conexion->regalos->deleteOne(['id' => intVal($id_regalo)]);
            
            ConexionBD::cerrar();
        }

        /**
         * Busca en la base de datos regalos por year
         */
        public static function buscarRegalosYear($id_usuario, $year) {
            $conexion = ConexionBD::conectar();

            $coleccion = $conexion->regalos;

            $cursor = $coleccion->find(["id_usuario" => $id_usuario, "year" => $year]);

            // Crear los objetos para devolverlos (MVC), Mongo me devuelve array asociativo
            $regalos = array();
            foreach($cursor as $regalo) {
               $regalo_OBJ = new Regalo($regalo['id_usuario'], $regalo['nombre'], $regalo['destinatario'], $regalo['precio'], $regalo['estado'], $regalo['year']);
               $regalo_OBJ->setId($regalo['id']);
               array_push($regalos, $regalo_OBJ);
            }

            ConexionBD::cerrar();

            return $regalos;
        }
    }



?>