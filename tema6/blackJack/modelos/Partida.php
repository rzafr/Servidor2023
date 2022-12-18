<?php

    class Partida {

        protected $baraja;
        protected $jugador;
        protected $crupier;

        /**
         * Constructor, crea objetos Jugador para jugador y crupier, y objeto BarajaInglesa
         */
        public function __construct() {
            // Inicializamos arrays de manos para jugador y crupier
            $this->jugador = new Jugador();
            $this->crupier = new Jugador();
            // Inicializamos, generamos y barajamos el mazo
            $this->baraja = new BarajaInglesa();
        }

        /**
         * Get the value of baraja
         */ 
        public function getBaraja() {
                return $this->baraja;
        }

        /**
         * Set the value of baraja
         *
         * @return  self
         */ 
        public function setBaraja($baraja) {
                $this->baraja = $baraja;
                return $this;
        }

        /**
         * Get the value of crupier
         */ 
        public function getCrupier() {
                return $this->crupier;
        }

        /**
         * Set the value of crupier
         *
         * @return  self
         */ 
        public function setCrupier($crupier) {
                $this->crupier = $crupier;
                return $this;
        }

        /**
         * Get the value of jugador
         */ 
        public function getJugador() {
                return $this->jugador;
        }

        /**
         * Set the value of jugador
         *
         * @return  self
         */ 
        public function setJugador($jugador) {
                $this->jugador = $jugador;
                return $this;
        }

        /**
         * Pinta las manos del crupier y del jugador
         */
        public function __toString() {
                $cadena = "";
                $cadena .= "Crupier: ".$this->crupier."<br>";
                $cadena .= "Jugador: ".$this->jugador."<br>";
                return $cadena;
        }
    }

?>