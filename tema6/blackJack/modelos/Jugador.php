<?php

    class Jugador {

        private $mano;

        /**
         * Constructor que crea un array vacio para el atributo mano
         */
        public function __construct() {
            $this->mano = array();
        }

        /**
         * Get the value of mano
         */ 
        public function getMano() {
                return $this->mano;
        }

        /**
         * Set the value of mano
         *
         * @return  self
         */ 
        public function setMano($mano) {
                $this->mano = $mano;
                return $this;
        }

        /**
         * Agrega una Carta pasada como parametro a la mano del jugador
         */
        public function nuevaCarta($unaCarta) {
            array_push($this->mano, $unaCarta);
        }

        /**
         * Muestra la mano del jugador
         */
        public function __toString() {
            $cadena = "";
            foreach ($this->mano as $carta) {
                $cadena .= $carta.", ";
            }
            return $cadena;
        }

        /**
         * Calcula el valor de la mano del jugador
         */
        public function valorMano() {
            $valorMano = 0;
            foreach ($this->mano as $carta) {
                $valorMano += $carta->getValor();
            }

            // Comprobamos ases
            foreach ($this->mano as $carta) {
                if ($carta->getFigura() == 1) {
                    if ($valorMano > 21) {
                        $valorMano = $valorMano - 10;                    }
                }
            }
            return $valorMano;
        }
    
    }

?>