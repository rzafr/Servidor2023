<?php

    class BarajaInglesa extends Baraja {

        private static $palos = array("C", "D", "P", "T");
        private static $figuras = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13);

        /**
         * Constructor, llama al constructor del padre, a generarMazo() y a barajar()
         */
        public function __construct() {
            // Llamamos al constructor del padre para inicializar el mazo
            parent::__construct();
            // Llamamos al metodo que genera las 52 cartas y las mete en el mazo
            $this->generarMazo();
            // Barajamos el mazo
            $this->barajar();
        }

        /**
         * Devuelve la ultima carta del mazo, de la parte superior, y la elimina de la baraja
         */
        public function repartirCarta() {
            return array_shift($this->mazo);
        }

        /**
         * Genera las 52 cartas
         */
        private function generarMazo() {
            foreach (self::$palos as $palo) {
                foreach (self::$figuras as $figura) {
                    array_push($this->mazo, new Carta($palo, $figura));
                }
            }
        }
    }

?>