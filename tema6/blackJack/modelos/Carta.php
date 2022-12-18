<?php

    class Carta {

        private $palo;
        private $figura;

        /**
         * Constructor al que se le pasa un palo y una figura y los asigna a los atributos
         */
        public function __construct($palo, $figura) {
            $this->palo = $palo;
            $this->figura = $figura;
        }

        /**
         * Get the value of palo
         */ 
        public function getPalo() {
            return $this->palo;
        }

        /**
         * Set the value of palo
         *
         * @return  self
         */ 
        public function setPalo($unPalo) {
            $this->palo = $unPalo;
            return $this;
        }

        /**
         * Get the value of figura
         */ 
        public function getFigura() {
            return $this->figura;
        }

        /**
         * Set the value of figura
         *
         * @return  self
         */ 
        public function setFigura($unaFigura) {
            $this->figura = $unaFigura;
            return $this;
        }

        /**
         * Devuelve la carta como una cadena
         */
        public function __toString() {
            return "".$this->figura."".$this->palo.".png";
        }

        /**
         * Devuelve el valor de la carta calculado segun las reglas
         */
        public function getValor() {
            if ($this->figura == "1")
                return 11;
            else if ($this->figura == "11" || $this->figura == "12" || $this->figura == "13")
                return 10;
            else
                return $this->figura;
        }
    }

?>