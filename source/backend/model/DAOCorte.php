<?php
    declare(strict_types = 1);
    require_once("../config/config.php");
    require_once("./BasePDOConnection.php");
    require_once("./CortePelo.php");
    require_once("./TipoCorte.php");
    class DAOCorte{
        public static function consulta(string $sql): PDOStatement | int{
            return BaseConnection::consulta($sql, DB_NAME, "mysql", DB_NAME, PASS);
        }

        public static function comprobarUsuario(string $usuario, string $password){
            $resultado = self::consulta("SELECT * FROM usuarios WHERE usuario = '$usuario'");
            if(($datos = $resultado->fetchObject()) != null){
                if(password_verify($password, $datos->contrasena)){
                    return true;
                }
            }
            return false;
        }
    }
?>