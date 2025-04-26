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
                
                $seleccionObtencion = <<<FIN
                    select idColeccionable from Obtencion
                        where idUsuario = '$idUsuario'
                    ;
                FIN;
                
                $tareas = [];
                $consultaObtencion = DBPDO::ejecutarConsulta($seleccionObtencion);
                
                return new Usuario(
                    $datosUsuario->idUsuario,
                    $datosUsuario->password,
                    $consultaObtencion->fetchAll(PDO::FETCH_COLUMN, 0)
                );
            } else {
                return false;
            }
        }
    
        public function registrarUsuario($idUsuario, $contrasena) {

        }
        
        public function cambiarContrasena($idUsuario, $contrasena) {
            
        }
        
        public function darDeBaja($usuario) {
            
        }
        
        public function guardarUsuario($usuario) {
            
        }
    }
?>