<?php
    class Fosil extends Coleccionable {
        private $conjunto;
        private $parte;
        
        public function __construct($idColeccionable, $nombre, $rutaIcono, $precio, $conjunto, $parte) {
            parent::__construct($idColeccionable, $nombre, $rutaIcono, $precio);
            $this->conjunto = $conjunto;
            $this->parte = $parte;
        }
        
        public function getConjunto() {
            return $this->conjunto;
        }

        public function getParte() {
            return $this->parte;
        }

        public function setConjunto($conjunto): void {
            $this->conjunto = $conjunto;
        }

        public function setParte($parte): void {
            $this->parte = $parte;
        }
    }
?>