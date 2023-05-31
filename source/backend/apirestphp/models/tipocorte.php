<?php
    declare(strict_types=1);
    require_once "connection/conexion.php";

    class Tipocorte{
        function insert($nombre){
            try {
                $consultaInsertar = "INSERT INTO tipo_corte (nombre) VALUES (:nombre)";
                $conexion = new ConexionBD();
                $stmt = $conexion::Conexion()->prepare($consultaInsertar);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                throw new Exception("No se pudo insertar el registro en la tabla de tipo_corte: " . $e->getMessage());
            }
        }

        function getAll(): array{
            $consulta = "SELECT * FROM tipo_corte";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        function getWhere($id_tipo_corte){
            $consulta = "SELECT * FROM tipo_corte WHERE nombre = '$id_tipo_corte'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        function sentenciaOtenerTodosValores($consulta){
            $conexion = new ConexionBD();
            $datos = $conexion::consulta($consulta)->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }

        function delete($id_tipo_corte){
            $consulta = "DELETE FROM tipo_corte WHERE id_tipo_corte= '$id_tipo_corte'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        function update($id_tipo_corte, $nombre){
            $consulta = "UPDATE tipo_corte SET nombre = :nombre WHERE id_tipo_corte = :id_tipo_corte";
            $conexion = new ConexionBD();
            $stmt = $conexion::Conexion()->prepare($consulta);
            $stmt->bindParam(':id_tipo_corte', $id_tipo_corte);
            $stmt->bindParam(':nombre', $nombre);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        function existeTipoCorte($nombre){
            $sql = "SELECT * FROM tipo_corte WHERE nombre = '$nombre'";
            $conexion = new ConexionBD();
            $query = $conexion::Conexion()->prepare($sql);
            $query->execute();
            //Comprobamos si el dato dado por parametro existe en la bbdd
            $count = $query->fetch();
            return ($count);
        }
    }
?>