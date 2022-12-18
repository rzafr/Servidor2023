<?php

    class Regalo {

        private $id;
        private $id_usuario;
        private $nombre;
        private $destinatario;
        private $precio;
        private $estado;
        private $year;

        /**
         * Constructor con id_usuario, nombre, destinatario, precio, estado y year
         */
        public function __construct($id_usuario = "", $nombre = "", $destinatario = "", $precio = "", $estado = "", $year = "") {
            $this->id_usuario = $id_usuario;
            $this->nombre = $nombre;            
            $this->destinatario = $destinatario;
            $this->precio = $precio;
            $this->estado = $estado;
            $this->year = $year;
        }

        /**
         * Get the value of id
         */ 
        public function getId() {
                return $this->id;
        }

        /**
         * Get the value of id_usuario
         */ 
        public function getId_usuario() {
                return $this->id_usuario;
        }

        /**
         * Set the value of id_usuario
         *
         * @return  self
         */ 
        public function setId_usuario($id_usuario) {
                $this->id_usuario = $id_usuario;
                return $this;
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre() {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre) {
                $this->nombre = $nombre;
                return $this;
        }

        /**
         * Get the value of destinatario
         */ 
        public function getDestinatario() {
                return $this->destinatario;
        }

        /**
         * Set the value of destinatario
         *
         * @return  self
         */ 
        public function setDestinatario($destinatario) {
                $this->destinatario = $destinatario;
                return $this;
        }

        /**
         * Get the value of precio
         */ 
        public function getPrecio() {
                return $this->precio;
        }

        /**
         * Set the value of precio
         *
         * @return  self
         */ 
        public function setPrecio($precio) {
                $this->precio = $precio;
                return $this;
        }

        /**
         * Get the value of estado
         */ 
        public function getEstado() {
                return $this->estado;
        }

        /**
         * Set the value of estado
         *
         * @return  self
         */ 
        public function setEstado($estado) {
                $this->estado = $estado;
                return $this;
        }

        /**
         * Get the value of year
         */ 
        public function getYear() {
                return $this->year;
        }

        /**
         * Set the value of year
         *
         * @return  self
         */ 
        public function setYear($year) {
                $this->year = $year;
                return $this;
        }

        

        // El siguiente get se agrega para utilizar el enlace del join de regalos con enlaces

        /**
         * Get the value of enlade
         */ 
        public function getEnlace() {
                return $this->enlace;
        }
    }


?>