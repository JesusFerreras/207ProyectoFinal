<?php
    class Usuario {
        private $idUsuario;
        private $password;
        private $fechaHoraGuardada;
        private $ultimaConexion;
        private $listaColeccionables;
        
        public function __construct($idUsuario, $password, $fechaHoraGuardada, $ultimaConexion, $listaColeccionables) {
            $this->idUsuario = $idUsuario;
            $this->password = $password;
            $this->fechaHoraGuardada = $fechaHoraGuardada;
            $this->ultimaConexion = $ultimaConexion;
            $this->listaColeccionables = $listaColeccionables;
        }
        
        public function getIdUsuario() {
            return $this->idUsuario;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getFechaHoraGuardada() {
            return $this->fechaHoraGuardada;
        }

        public function getUltimaConexion() {
            return $this->ultimaConexion;
        }

        public function getListaColeccionables() {
            return $this->listaColeccionables;
        }

        public function setIdUsuario($idUsuario): void {
            $this->idUsuario = $idUsuario;
        }

        public function setPassword($password): void {
            $this->password = $password;
        }

        public function setFechaHoraGuardada($fechaHoraGuardada): void {
            $this->fechaHoraGuardada = $fechaHoraGuardada;
        }

        public function setUltimaConexion($ultimaConexion): void {
            $this->ultimaConexion = $ultimaConexion;
        }

        public function setListaColeccionables($listaColeccionables): void {
            $this->listaColeccionables = $listaColeccionables;
        }
        
        public function anadirColeccionable($idColeccionable) {
            array_push($this->listaColeccionables, $idColeccionable);
        }
        
        public function quitarColeccionable($idColeccionable) {
            if (($clave = array_search($idColeccionable, $this->listaColeccionables)) !== false) {
                unset($this->listaColeccionables[$clave]);
            }
        }
    }
?>