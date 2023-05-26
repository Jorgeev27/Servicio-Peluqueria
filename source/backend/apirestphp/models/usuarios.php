<?php
    require_once("connection/conexion.php");
    
    class Usuarios{
        function insert($nombre, $apellido, $dni, $email, $movil, $id_rol, $pass){
            try {
                // Encriptar la contraseña
                //$pass_encriptado = password_hash($pass, PASSWORD_DEFAULT);
                $consultaInsertar = "INSERT INTO usuarios (nombre,apellido,dni,email,movil,id_rol,pass) VALUES (:nombre,:apellido,:dni,:email,:movil,:id_rol,:pass)";
                $conexion = new ConexionBD();
                $stmt = $conexion::Conexion()->prepare($consultaInsertar);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':apellido', $apellido);
                $stmt->bindParam(':dni', $dni);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':movil', $movil);
                $stmt->bindParam(':id_rol', $id_rol);
                $stmt->bindParam(':pass', $pass);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                throw new Exception("No se pudo insertar el registro en la tabla de usuarios: " . $e->getMessage());
            }
        }

        function getAll(){
            $consulta = "SELECT * FROM usuarios";
            $datos=$this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        function getWhere($dni){
            $consulta = "SELECT * FROM usuarios WHERE dni = '$dni'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        function delete($id){
            $consulta = "DELETE FROM usuarios WHERE id = '$id'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        function update($id, $nombre, $apellido, $dni, $email, $movil, $id_rol){
            $consulta = "UPDATE USUARIOS SET NOMBRE = '$nombre' , APELLIDO = '$apellido', DNI = '$dni', EMAIL = '$email', MOVIL = '$movil', ID_ROL = '$id_rol' WHERE ID = '$id'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        function existeUsuario($dni) {
            $consulta= "SELECT * FROM usuarios WHERE dni = '$dni'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        function sentenciaOtenerTodosValores($consulta){
            $conexion = new ConexionBD();
            $query = $conexion::Conexion()->prepare($consulta);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($query);
            //  return $query->fetch(PDO::FETCH_ASSOC);
            return $result;
        }  

        /**
         * verificarUsuario
         *
         * @param  mixed $contrasena
         * @param  mixed $correoUsuario
         * @return void
         */
        function verificarUsuario($contrasena, $correoUsuario) {
            $consulta = "SELECT *, roles.rol FROM usuarios  left join roles on usuarios.id_rol = roles.id WHERE  email = :email";
            $conexion = new ConexionBD();
            $query = $conexion::Conexion()->prepare($consulta);
            $query->bindParam(":email", $correoUsuario, PDO::PARAM_STR);
            $query->execute();
            $usuarioBD = $query->fetch(PDO::FETCH_ASSOC);
            if ($usuarioBD) {
                $contrasenaBD = $usuarioBD['pass'];
                if (password_verify($contrasena, $contrasenaBD)) {
                    // La contraseña es correcta, devolver el usuario
                    return $usuarioBD;
                } else {
                    // La contraseña es incorrecta
                return false;
                }
            } else {
                // El usuario no existe en la base de datos
                return false;
            }
        }
    }
?>