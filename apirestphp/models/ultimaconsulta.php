<?php
    require_once("connection/conexion.php");

    class UltimaConsulta{
        function ultimoInsert(){
            $consulta = "SELECT * FROM corte ORDER BY id_corte DESC LIMIT 1;";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        function sentenciaOtenerTodosValores($consulta){
            $conexion = new ConexionBD();
            $datos = $conexion::consulta($consulta)->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
        }

        function getWhere($id){
            $consulta = "SELECT corte.id_corte, corte.nombre, corte.identificador
            FROM corte LEFT JOIN tipo_corte ON corte.id_tipo_corte = tipo_corte.id_tipo_corte 
            LEFT JOIN clientes ON corte.id_cliente = clientes.id WHERE clientes.id=:id";
            $conexion = new ConexionBD();
            $query = $conexion::Conexion()->prepare($consulta);
            $query->bindParam(":id", $id, PDO::PARAM_INT);
            $query->execute();
            $datos = $query->fetchAll(PDO::FETCH_OBJ);
            return $datos;
        }
    }
?>