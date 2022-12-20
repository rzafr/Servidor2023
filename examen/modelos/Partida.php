<?php

    class Partida {

        private $id;
        private $fecha;
        private $hora;
        private $ciudad;
        private $lugar;
        private $cubierta;
        private $estado;
        private $jugadores;
        private $id_jugador1;
        private $id_jugador2;
        private $id_jugador3;
        private $id_jugador4;


        /**
         * Constructor
         */
        public function __construct($fecha = "", $hora = "", $ciudad = "", $lugar = "", $cubierta = "", $estado = "", $id_jugador1 = "", $id_jugador2 = "", $id_jugador3 = "", $id_jugador4 = "") {
            $this->fecha = $fecha;
            $this->hora = $hora;            
            $this->ciudad = $ciudad;
            $this->lugar = $lugar;
            $this->cubierta = $cubierta;
            $this->estado = $estado;
            $this->jugadores = array();
            $this->id_jugador1 = $id_jugador1;
            $this->id_jugador2 = $id_jugador2;
            $this->id_jugador3 = $id_jugador3;
            $this->id_jugador4 = $id_jugador4;
                
        }

        /**
         * Agrega un Jugador al array de jugadores
         */
        public function addJugador($unJugador) {
            array_push($this->jugadores, $unJugador);
        }

        /**
         * Elimina un Jugador del array de jugadores
         */
        public function delJugador($unJugador) {
            foreach ($this->jugadores as $key => $jugador) {
                if($jugador == $unJugador){
                   unset($this->jugadores[$key]);
                }
              }
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of fecha
         */ 
        public function getFecha()
        {
                return $this->fecha;
        }

        /**
         * Set the value of fecha
         *
         * @return  self
         */ 
        public function setFecha($fecha)
        {
                $this->fecha = $fecha;

                return $this;
        }

        /**
         * Get the value of hora
         */ 
        public function getHora()
        {
                return $this->hora;
        }

        /**
         * Set the value of hora
         *
         * @return  self
         */ 
        public function setHora($hora)
        {
                $this->hora = $hora;

                return $this;
        }

        /**
         * Get the value of ciudad
         */ 
        public function getCiudad()
        {
                return $this->ciudad;
        }

        /**
         * Set the value of ciudad
         *
         * @return  self
         */ 
        public function setCiudad($ciudad)
        {
                $this->ciudad = $ciudad;

                return $this;
        }

        /**
         * Get the value of lugar
         */ 
        public function getLugar()
        {
                return $this->lugar;
        }

        /**
         * Set the value of lugar
         *
         * @return  self
         */ 
        public function setLugar($lugar)
        {
                $this->lugar = $lugar;

                return $this;
        }

        /**
         * Get the value of estado
         */ 
        public function getEstado()
        {
                return $this->estado;
        }

        /**
         * Set the value of estado
         *
         * @return  self
         */ 
        public function setEstado($estado)
        {
                $this->estado = $estado;

                return $this;
        }

        /**
         * Get the value of cubierta
         */ 
        public function getCubierta()
        {
                return $this->cubierta;
        }

        /**
         * Set the value of cubierta
         *
         * @return  self
         */ 
        public function setCubierta($cubierta)
        {
                $this->cubierta = $cubierta;

                return $this;
        }

        /**
         * Get the value of jugadores
         */ 
        public function getJugadores()
        {
                return $this->jugadores;
        }


        

        /**
         * Get the value of id_jugador1
         */ 
        public function getId_jugador1()
        {
                return $this->id_jugador1;
        }

        /**
         * Set the value of id_jugador1
         *
         * @return  self
         */ 
        public function setId_jugador1($id_jugador1)
        {
                $this->id_jugador1 = $id_jugador1;

                return $this;
        }

        /**
         * Get the value of id_jugador2
         */ 
        public function getId_jugador2()
        {
                return $this->id_jugador2;
        }

        /**
         * Set the value of id_jugador2
         *
         * @return  self
         */ 
        public function setId_jugador2($id_jugador2)
        {
                $this->id_jugador2 = $id_jugador2;

                return $this;
        }

        /**
         * Get the value of id_jugador3
         */ 
        public function getId_jugador3()
        {
                return $this->id_jugador3;
        }

        /**
         * Set the value of id_jugador3
         *
         * @return  self
         */ 
        public function setId_jugador3($id_jugador3)
        {
                $this->id_jugador3 = $id_jugador3;

                return $this;
        }

        /**
         * Get the value of id_jugador4
         */ 
        public function getId_jugador4()
        {
                return $this->id_jugador4;
        }

        /**
         * Set the value of id_jugador4
         *
         * @return  self
         */ 
        public function setId_jugador4($id_jugador4)
        {
                $this->id_jugador4 = $id_jugador4;

                return $this;
        }
    }


?>