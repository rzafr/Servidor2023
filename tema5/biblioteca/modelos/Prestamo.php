<?php

    class Prestamo {

        private $id;
        private $id_usuario;
        private $id_libro;
        private $fechaInicio;
        private $fechaFin;
        private $estado;


        public function __construct($id_usuario = "", $id_libro = "", $fechaInicio = "", $fechaFin = "", $estado = "") {
            $this->id_usuario = $id_usuario;
            $this->id_libro = $id_libro;            
            $this->fechaInicio = $fechaInicio;
            $this->fechaFin = $fechaFin;
            $this->estado = $estado;
        }

        /**
         * Get the value of id
         */ 
        public function getId() {
            return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id) {
            $this->id = $id;

            return $this;
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
         * Get the value of id_libro
         */ 
        public function getId_libro() {
            return $this->id_libro;
        }

        /**
         * Set the value of id_libro
         *
         * @return  self
         */ 
        public function setId_libro($id_libro) {
            $this->id_libro = $id_libro;

            return $this;
        }

        /**
         * Get the value of fechaInicio
         */ 
        public function getFechaInicio() {
            return $this->fechaInicio;
        }

        /**
         * Set the value of fechaInicio
         *
         * @return  self
         */ 
        public function setFechaInicio($fechaInicio) {
            $this->fechaInicio = $fechaInicio;

            return $this;
        }

        /**
         * Get the value of fechaFin
         */ 
        public function getFechaFin() {
            return $this->fechaFin;
        }

        /**
         * Set the value of fechaFin
         *
         * @return  self
         */ 
        public function setFechaFin($fechaFin) {
            $this->fechaFin = $fechaFin;

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

    }

?>