<?php
    class Obra extends Coleccionable {
        private $rutaFalsificacion;
        private $diferencia;
        
        public function __construct($nombre, $rutaIcono, $precio, $rutaFalsificacion, $diferencia) {
            parent::__construct($nombre, $rutaIcono, $precio);
            $this->rutaFalsificacion = $rutaFalsificacion;
            $this->diferencia = $diferencia;
        }
        
        public function getRutaFalsificacion() {
            return $this->rutaFalsificacion;
        }

        public function getDiferencia() {
            return $this->diferencia;
        }

        public function setRutaFalsificacion($rutaFalsificacion): void {
            $this->rutaFalsificacion = $rutaFalsificacion;
        }

        public function setDiferencia($diferencia): void {
            $this->diferencia = $diferencia;
        }
    }
?>