<?php
    class ColeccionablePDO {
        
        public static function buscarEnTablaPez() {
            $seleccion = <<<FIN
                select * from Pez p
                    inner join Coleccionable c
                    on p.idColeccionable = c.idColeccionable
                ;
            FIN;
            
            $consulta = DBPDO::ejecutarConsulta($seleccion);
            
            $coleccionables = [];
            
            while ($datos = $consulta->fetchObject()) {
                $coleccionables[$datos->idColeccionable] = new Pez(
                    $datos->nombre,
                    $datos->rutaIcono,
                    $datos->precio,
                    $datos->ubicacion,
                    self::transformarHorarioAArray($datos->horario),
                    self::transformarMesesAArray($datos->meses),
                    $datos->tamano,
                    $datos->sombra
                );
            }
            
            return $coleccionables;
        }
        
        public static function buscarEnTablaBicho() {
            
        }
        
        public static function buscarEnTablaFosil() {
            
        }
        
        public static function buscarEnTablaObra() {
            
        }
        
        public static function buscarObtencionesEnTabla($tabla) {
            $seleccion = <<<FIN
                select o.idColeccionable, count(idUsuario) from Obtencion o
                    inner join $tabla t
                    on o.idColeccionable = t.idColeccionable
                    group by o.idColeccionable
                ;
            FIN;
            
            $consulta = DBPDO::ejecutarConsulta($seleccion);
            
            $coleccionables = [];
            
            while ($datos = $consulta->fetchObject()) {
                $coleccionables[$datos->idColeccionable] = new Pez(
                    $datos->nombre,
                    $datos->rutaIcono,
                    $datos->precio,
                    $datos->ubicacion,
                    self::transformarHorarioAArray($datos->horario),
                    self::transformarMesesAArray($datos->meses),
                    $datos->tamano,
                    $datos->sombra
                );
            }
            
            return $coleccionables;
        }
        
        public static function obtenerColeccionablesObtenidos($idUsuario) {
            
        }
        
        public static function marcarColeccionable($idUsuario, $idColeccionable) {
            if (
                DBPDO::ejecutarConsulta(<<<FIN
                    select idColeccionable from Obtencion
                        where idUsuario = '$idUsuario'
                        and idColeccionable = '$idColeccionable'
                    ;
                FIN)->rowCount() == 0
            ) {
                DBPDO::ejecutarConsulta(<<<FIN
                    insert into Obtencion values
                        ('$idUsuario', '$idColeccionable')
                    ;
                FIN);
            }
        }
        
        public static function desmarcarColeccionable($idUsuario, $idColeccionable) {
            if (
                DBPDO::ejecutarConsulta(<<<FIN
                    select idColeccionable from Obtencion
                        where idUsuario = '$idUsuario'
                        and idColeccionable = '$idColeccionable'
                    ;
                FIN)->rowCount() != 0
            ) {
                DBPDO::ejecutarConsulta(<<<FIN
                    delete from Obtencion
                        where idUsuario = '$idUsuario'
                        and idColeccionable = '$idColeccionable'
                    ;
                FIN);
            }
        }
        
        private static function transformarHorarioAArray($cadena) {
            $array = [];
            
            $arrayCadena = explode(',', $cadena);
            for($i = 0; $i < 24; $i++) {
                $array[$i] = in_array($i, $arrayCadena);
            }
            
            return $array;
        }
        
        private static function transformarMesesAArray($cadena) {
            $array = [];
            
            $arrayCadena = explode(',', $cadena);
            for($i = 1; $i <= 12; $i++) {
                $array[$i] = in_array($i, $arrayCadena);
            }
            
            return $array;
        }
    }
?>