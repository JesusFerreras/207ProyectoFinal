<?php
    abstract class Coleccionable {
        private $idColeccionable;
        private $nombre;
        private $rutaIcono;
        private $precio;
        
        public function __construct($idColeccionable, $nombre, $rutaIcono, $precio) {
            $this->idColeccionable = $idColeccionable;
            $this->nombre = $nombre;
            $this->rutaIcono = $rutaIcono;
            $this->precio = $precio;
        }
        
        public function getIdColeccionable() {
            return $this->idColeccionable;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getRutaIcono() {
            return $this->rutaIcono;
        }

        public function getPrecio() {
            return $this->precio;
        }

        public function setIdColeccionable($idColeccionable): void {
            $this->idColeccionable = $idColeccionable;
        }

        public function setNombre($nombre): void {
            $this->nombre = $nombre;
        }

        public function setRutaIcono($rutaIcono): void {
            $this->rutaIcono = $rutaIcono;
        }

        public function setPrecio($precio): void {
            $this->precio = $precio;
        }
        
        public function getArrayDatos() {
            $datos = [];
            
            foreach ($this as $clave => $valor) {
                $datos[$clave] = $valor;
            }
            
            return $datos;
        }
    }
?>