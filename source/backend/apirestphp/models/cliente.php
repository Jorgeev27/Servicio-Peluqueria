<?php
    declare(strict_types=1);
    require_once "connection/conexion.php";

    class Cliente{
        function insert($nombre, $apellido, $dni, $email, $movil){
            try {
                $consultaInsertar = "INSERT INTO clientes (nombre,apellido,dni,email,movil) VALUES (:nombre,:apellido,:dni,:email,:movil)";
                $conexion = new ConexionBD();
                $stmt = $conexion::Conexion()->prepare($consultaInsertar);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':apellido', $apellido);
                $stmt->bindParam(':movil', $movil);
                $stmt->bindParam(':dni', $dni);
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                throw new Exception("No se pudo insertar el registro en la tabla de clientes: " . $e->getMessage());
            }
        }

        function getAll(): array{
            $consulta = "SELECT * FROM clientes";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        function getWhere($id_cliente): array{
            $consulta = "SELECT * FROM clientes WHERE id = '$id_cliente'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        function sentenciaOtenerTodosValores($consulta){
            $conexion = new ConexionBD();
            $datos = $conexion::consulta($consulta)->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }

        function delete($id_cliente){
            $consulta = "DELETE FROM clientes WHERE id = '$id_cliente'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        function update($id, $nombre, $apellido, $dni, $email, $movil){
            $consulta = "UPDATE clientes SET NOMBRE = $nombre, APELLIDO = $apellido, DNI = $dni, EMAIL = $email, MOVIL = $movil WHERE ID = $id";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        function existeCliente($dni){
            $consulta = "SELECT * FROM clientes WHERE dni = '$dni'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }
    }
?>