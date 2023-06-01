<?php
    require_once("connection/conexion.php");
    
    class Usuarios{
        /**
         * La función inserta datos de usuario en una tabla de base de datos con manejo de errores.
         * 
         * @param nombre El nombre del usuario que se inserta en la base de datos.
         * @param apellido Apellido o apellido del usuario.
         * @param dni DNI significa "Documento Nacional de Identidad", que es un número de
         * identificación único asignado a personas en algunos países, como España y Argentina. Es
         * similar a un número de seguro social en los Estados Unidos.
         * @param email El correo electrónico del usuario que desea insertar en la base de datos.
         * @param movil Es una variable que representa el número de teléfono móvil del usuario que se
         * está insertando en la base de datos.
         * @param id_rol Este parámetro representa el ID de rol del usuario que se inserta en la base
         * de datos. Es probable que sea una clave externa que haga referencia a una tabla de roles en
         * la base de datos.
         * @param pass Este parámetro es la contraseña del usuario que debe insertarse en la base de
         * datos. Se pasa a la función como una cadena.
         * 
         * @return un valor booleano de verdadero si el registro se insertó correctamente en la tabla
         * de "usuarios", y lanzando una excepción con un mensaje de error si hubo un error durante el
         * proceso de inserción.
         */
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

        /**
         * Esta función de PHP recupera todos los datos de una tabla llamada "usuarios".
         * 
         * @return todos los datos de la tabla "usuarios" de la base de datos.
         */
        function getAll(){
            $consulta = "SELECT * FROM usuarios";
            $datos=$this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        /**
         * La función recupera todos los datos de la tabla "usuarios" donde la columna "dni" coincide
         * con el valor proporcionado.
         * 
         * @param dni El parámetro "dni" es una cadena que representa el DNI (Documento Nacional de
         * Identidad) de un usuario. Se utiliza en una consulta SQL para recuperar toda la información
         * de la tabla de "usuarios" donde el DNI coincide con el valor dado.
         * 
         * @return todos los datos de la tabla "usuarios" donde la columna "dni" coincide con el
         * parámetro de entrada "".
         */
        function getWhere($dni){
            $consulta = "SELECT * FROM usuarios WHERE dni = '$dni'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        /**
         * Esta función de PHP elimina a un usuario de una base de datos en función de su ID.
         * 
         * @param id El parámetro "id" es una variable que representa el identificador único de un
         * usuario en una tabla de base de datos llamada "usuarios". La función "eliminar" está
         * diseñada para eliminar la fila que coincide con el valor "id" dado de la tabla "usuarios".
         * 
         * @return el resultado de la consulta SQL para eliminar una fila de la tabla "usuarios" donde
         * la columna "id" coincide con el parámetro proporcionado. El valor devuelto no se especifica
         * en el código, pero es probable que sea un valor booleano que indique si la consulta se
         * realizó correctamente o no.
         */
        function delete($id){
            $consulta = "DELETE FROM usuarios WHERE id = '$id'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        /**
         * Esta función actualiza la información del usuario en una tabla de base de datos.
         * 
         * @param id El ID del usuario que se actualizará en la base de datos.
         * @param nombre El primer nombre del usuario.
         * @param apellido Apellido del usuario a actualizar en la base de datos.
         * @param dni DNI significa Documento Nacional de Identidad, que es un número de identificación
         * único asignado a personas en algunos países, como España y Argentina. En esta función, es un
         * parámetro que representa el DNI de un usuario en una base de datos.
         * @param email El parámetro de correo electrónico es una variable de cadena que representa la
         * dirección de correo electrónico de un usuario. Se utiliza en la consulta SQL para actualizar
         * el campo de correo electrónico de un usuario en la base de datos.
         * @param movil Este parámetro representa el número de teléfono móvil de un usuario en una base
         * de datos. Se está actualizando en la consulta "ACTUALIZAR" junto con otra información del
         * usuario como nombre, apellido, número de DNI, correo electrónico e ID de rol.
         * @param id_rol El ID del rol asignado al usuario.
         * 
         * @return el resultado de la consulta SQL que actualiza los valores del usuario especificado
         * en la base de datos. No devuelve ningún valor o mensaje específico.
         */
        function update($id, $nombre, $apellido, $dni, $email, $movil, $id_rol){
            $consulta = "UPDATE USUARIOS SET NOMBRE = '$nombre' , APELLIDO = '$apellido', DNI = '$dni', EMAIL = '$email', MOVIL = '$movil', ID_ROL = '$id_rol' WHERE ID = '$id'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        /**
         * La función comprueba si existe un usuario con un determinado DNI en una tabla de la base de
         * datos denominada "usuarios".
         * 
         * @param dni El parámetro "dni" es probablemente una variable de cadena que representa el
         * número de identificación de un usuario, como un número de identificación nacional o un
         * número de pasaporte. Se utiliza en una consulta SQL para buscar un usuario en una tabla de
         * base de datos denominada "usuarios".
         * 
         * @return resultado de una consulta a la base de datos que comprueba si en la tabla de
         * "usuarios" existe un usuario con un determinado DNI. La función devuelve los datos
         * recuperados de la consulta.
         */
        function existeUsuario($dni) {
            $consulta= "SELECT * FROM usuarios WHERE dni = '$dni'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        /**
         * La función recupera todos los valores de una consulta de base de datos utilizando PDO en
         * PHP.
         * 
         * @param consulta El parámetro "consulta" es una variable de cadena que representa una
         * consulta SQL para ser ejecutada en una base de datos. Se pasa como argumento a la función
         * "sentenciaOtenerTodosValores".
         * 
         * @return array matriz de matrices asociativas, donde cada matriz asociativa representa una fila
         * de datos del conjunto de resultados de la consulta ejecutada.
         */
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
         * Esta función verifica la contraseña y el correo electrónico de un usuario en una base de
         * datos y devuelve la información del usuario si existe.
         * 
         * @param contrasena Este parámetro es una cadena que representa la contraseña ingresada por el
         * usuario que intenta iniciar sesión.
         * @param correoUsuario La dirección de correo electrónico del usuario que intenta iniciar
         * sesión.
         * 
         * @return ya sea la información del usuario (si la contraseña es correcta), o falsa (si la
         * contraseña es incorrecta o el usuario no existe en la base de datos).
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