<?php

    use MongoDB\Client;

    class ConexionBD {

        private static $conexion;

        /**
         * Conecta con la base de datos
         */
        public static function conectar($bd="regalos") {
            
            try {
                //CONEXIÓN A MONGODB CLOUD ATLAS. Comentar esta línea para conectar en local.
                $host = "mongodb+srv://admin:zungWN5An3JJLHic@cluster0.riicpti.mongodb.net/?retryWrites=true&w=majority";
                //$host = "mongodb://root:toor@mongo:27017/"; //MongoDB en Docker
                self::$conexion = (new Client($host))->{$bd};
            } catch (Exception $e){
                echo $e->getMessage();
            }

            return self::$conexion;
        }

        public static function cerrar() {
            self::$conexion = null;
        }


    }

?>