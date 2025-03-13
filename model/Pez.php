<?php
    class Pez extends Coleccionable {
        private $ubicacion;
        private $horario;
        private $meses;
        private $tamano;
        private $sombra;
        
        public function __construct($idColeccionable, $nombre, $rutaIcono, $precio, $ubicacion, $horario, $meses, $tamano, $sombra) {
            parent::__construct($idColeccionable, $nombre, $rutaIcono, $precio);
            $this->ubicacion = $ubicacion;
            $this->horario = $horario;
            $this->meses = $meses;
            $this->tamano = $tamano;
            $this->sombra = $sombra;
        }
        
        public function getUbicacion() {
            return $this->ubicacion;
        }

        public function getHorario() {
            return $this->horario;
        }

        public function getMeses() {
            return $this->meses;
        }

        public function getTamano() {
            return $this->tamano;
        }

        public function getSombra() {
            return $this->sombra;
        }

        public function setUbicacion($ubicacion): void {
            $this->ubicacion = $ubicacion;
        }

        public function setHorario($horario): void {
            $this->horario = $horario;
        }

        public function setMeses($meses): void {
            $this->meses = $meses;
        }

        public function setTamano($tamano): void {
            $this->tamano = $tamano;
        }

        public function setSombra($sombra): void {
            $this->sombra = $sombra;
        }
    }
?>