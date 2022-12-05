<?php

    class Libro {

        private $id;
        private $isbn;
        private $titulo;
        private $subtitulo;
        private $descripcion;
        private $autor;
        private $editorial;
        private $categoria;
        private $imgPortada;
        private $numTotal;
        private $numDispo;

      
        public function __construct($isbn="", $titulo="", $subtitulo="", $descripcion="", $autor="", $editorial="", $categoria="", $imgPortada="", $numTotal="", $numDispo="") {
            $this->isbn = $isbn;
            $this->titulo = $titulo;
            $this->subtitulo = $subtitulo;
            $this->descripcion = $descripcion;
            $this->autor = $autor;
            $this->editorial = $editorial;
            $this->categoria = $categoria;
            $this->imgPortada = $imgPortada;
            $this->numTotal = $numTotal;
            $this->numDispo = $numDispo;
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
         * Get the value of isbn
         */ 
        public function getIsbn() {
                return $this->isbn;
        }

        /**
         * Set the value of isbn
         *
         * @return  self
         */ 
        public function setIsbn($isbn) {
                $this->isbn = $isbn;

                return $this;
        }

        /**
         * Get the value of titulo
         */ 
        public function getTitulo() {
                return $this->titulo;
        }

        /**
         * Set the value of titulo
         *
         * @return  self
         */ 
        public function setTitulo($titulo) {
                $this->titulo = $titulo;

                return $this;
        }

        /**
         * Get the value of subtitulo
         */ 
        public function getSubtitulo() {
                return $this->subtitulo;
        }

        /**
         * Set the value of subtitulo
         *
         * @return  self
         */ 
        public function setSubtitulo($subtitulo) {
                $this->subtitulo = $subtitulo;

                return $this;
        }

        /**
         * Get the value of descripcion
         */ 
        public function getDescripcion() {
                return $this->descripcion;
        }

        /**
         * Set the value of descripcion
         *
         * @return  self
         */ 
        public function setDescripcion($descripcion) {
                $this->descripcion = $descripcion;

                return $this;
        }

        /**
         * Get the value of autor
         */ 
        public function getAutor() {
                return $this->autor;
        }

        /**
         * Set the value of autor
         *
         * @return  self
         */ 
        public function setAutor($autor) {
                $this->autor = $autor;

                return $this;
        }

        /**
         * Get the value of editorial
         */ 
        public function getEditorial() {
                return $this->editorial;
        }

        /**
         * Set the value of editorial
         *
         * @return  self
         */ 
        public function setEditorial($editorial) {
                $this->editorial = $editorial;

                return $this;
        }

        /**
         * Get the value of categoria
         */ 
        public function getCategoria() {
                return $this->categoria;
        }

        /**
         * Set the value of categoria
         *
         * @return  self
         */ 
        public function setCategoria($categoria) {
                $this->categoria = $categoria;

                return $this;
        }

        /**
         * Get the value of imgPortada
         */ 
        public function getImgPortada() {
                return $this->imgPortada;
        }

        /**
         * Set the value of imgPortada
         *
         * @return  self
         */ 
        public function setImgPortada($imgPortada) {
                $this->imgPortada = $imgPortada;

                return $this;
        }

        /**
         * Get the value of numTotal
         */ 
        public function getNumTotal() {
                return $this->numTotal;
        }

        /**
         * Set the value of numTotal
         *
         * @return  self
         */ 
        public function setNumTotal($numTotal) {
                $this->numTotal = $numTotal;

                return $this;
        }

        /**
         * Get the value of numDispo
         */ 
        public function getNumDispo() {
                return $this->numDispo;
        }

        /**
         * Set the value of numDispo
         *
         * @return  self
         */ 
        public function setNumDispo($numDispo) {
                $this->numDispo = $numDispo;

                return $this;
        }
    }


?>