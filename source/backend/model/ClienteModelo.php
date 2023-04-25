<?php
    require_once("./BasePDOConnection.php");
    class UsuariosModelo{
        //registrar usuarios
        public static function registrarUsuariosModelo($datosControlador,$tablaBD){
            $consultaInsertar=" INSERT INTO $tablaBD (nombre,apellido1,apellido2,dniUsuario,telefonoMovil,nombreUsuario,correoElectronico) VALUES (:nombre,:apellido1,:apellido2,:dniUsuario,:telefonoMovil,:nombreUsuario,:correoElectronico)";
            $conexion = BasePDOConnection::getConexion();       
            $query=$conexion::Conexion()->prepare($consultaInsertar);
            $query->bindParam(":nombre",$datosControlador["nombre"], PDO::PARAM_STR);
            $query->bindParam(":apellido1",$datosControlador["apellido1"], PDO::PARAM_STR);
            $query->bindParam(":apellido2",$datosControlador["apellido2"], PDO::PARAM_STR);
            $query->bindParam(":dniUsuario",$datosControlador["dniUsuario"], PDO::PARAM_STR);
            $query->bindParam(":telefonoMovil",$datosControlador["telefonoMovil"], PDO::PARAM_STR);
            $query->bindParam(":correoElectronico",$datosControlador["correoElectronico"], PDO::PARAM_STR);
            if($query->execute()){
                return true;
            }else{
                return false;
            }
        }
    }
?>