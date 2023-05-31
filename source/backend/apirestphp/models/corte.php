<?php
    declare(strict_types=1);
    require_once "connection/conexion.php";

    class Corte{
        function insert($nombre, $descripcion, $precio){
            try {
                $consultaInsertar = "INSERT INTO corte (nombre, descripcion, precio) VALUES (:nombre, :descripcion, :precio)";
                $conexion = new ConexionBD();
                $stmt = $conexion::Conexion()->prepare($consultaInsertar);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':descripcion', $descripcion);
                $stmt->bindParam(':precio', $precio);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                throw new Exception("No se pudo insertar el registro en la tabla de corte: " . $e->getMessage());
            }
        }

        function getAll(): array{
            $consulta = "SELECT * FROM corte";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        function getWhere($id_corte): array{
            $consulta = "SELECT * FROM corte WHERE id_corte = '$id_corte'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        function sentenciaOtenerTodosValores($consulta){
            $conexion = new ConexionBD();
            $datos = $conexion::consulta($consulta)->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }

        function delete($id_corte){
            $consulta = "DELETE FROM corte WHERE id_corte = '$id_corte'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        function update($id_corte, $nombre, $descripcion, $precio){
            $consulta = "UPDATE corte SET nombre = '$nombre', descripcion = '$descripcion', precio = '$precio' WHERE id_corte = '$id_corte'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        function existeCorte($id_corte){
            $consulta = "SELECT * FROM corte WHERE id_corte = '$id_corte'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }
    }
?>
