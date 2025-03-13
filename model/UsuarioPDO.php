<?php
    class UsuarioPDO {
        
        public static function validarUsuario($idUsuario, $password) {
            $seleccionUsuario = <<<FIN
                select * from Usuario
                    where idUsuario = :idUsuario
                    and password = sha2(:contrasena, 256)
                ;
            FIN;
            
            $parametrosUsuario = [
                ':idUsuario' => $idUsuario,
                ':contrasena' => $idUsuario.$password
            ];
            
            $consultaUsuario = DBPDO::ejecutarConsulta($seleccionUsuario, $parametrosUsuario);
            
            if($consultaUsuario->rowCount() > 0) {
                $datosUsuario = $consultaUsuario->fetchObject();
                
                $seleccionTareas = <<<FIN
                    select * from Tarea
                        where idUsuario = '$idUsuario'
                    ;
                FIN;
                
                $tareas = [];
                $consultaTareas = DBPDO::ejecutarConsulta($seleccionTareas);
                while ($datosTarea = $consultaTareas->fetchObject()) {
                    $tareas[$datosTarea->idTarea] = new Tarea(
                        $datosTarea->descripcion,
                        new DateTime($datosTarea->fechaCreacion),
                        is_null($datosTarea->fechaTope)? null : new DateTime($datosTarea->fechaTope),
                        $datosTarea->complecion == 1
                    );
                }
                
                uasort($tareas, 'comparadorTareas');
                
                return new Usuario(
                    $datosUsuario->idUsuario,
                    $datosUsuario->password,
                    $tareas
                );
            } else {
                return false;
            }
        }
    }