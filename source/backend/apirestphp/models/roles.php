<?php
    declare(strict_types=1);
    require_once "connection/conexion.php";

    class Roles{
        function getAll(): array{
            $consulta = "SELECT * FROM roles";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        function getWhere($id_rol): array{
            $consulta = "SELECT * FROM roles WHERE id='$id_rol'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        function sentenciaOtenerTodosValores($consulta){
            $conexion = new ConexionBD();
            $datos = $conexion::consulta($consulta)->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }

        function insert($rol){
            $consulta = "INSERT INTO roles (rol) VALUES ('$rol')";
            $conexion = new ConexionBD();
            $resultado = $conexion::consulta($consulta);
            if ($resultado) {
                return true;
            } else {
                throw new Exception("No se pudo insertar el registro en la tabla de roles.");
            }
        }

        function update($id_rol, $rol){
            $consulta = "UPDATE roles SET rol = '$rol' WHERE id = '$id_rol'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        function delete($id_rol){
            $consulta = "DELETE FROM roles WHERE id = '$id_rol'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }
    }
?>