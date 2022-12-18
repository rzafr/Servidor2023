<?php

    abstract class Baraja {

        protected $mazo;

        /**
         * Metodo abstracto que heredara la clase hija BarajaInglesa
         */
        public abstract function repartirCarta();

        /**
         * Constructor, crea un array vacio para el mazo
         */
        public function __construct() {
            $this->mazo = array();
        }

        /**
         * Desordena el array del mazo
         */
        public function barajar() {
            shuffle($this->mazo);
        }

        /**
         * Muestra por pantalla el mazo de cartas
         */
        public function listar() {
            foreach ($this->mazo as $carta) {
                echo "".$carta."</br>";
            }
        }
    }

?>