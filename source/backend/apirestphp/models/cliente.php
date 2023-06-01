<?php
    declare(strict_types=1);
    require_once "connection/conexion.php";

    class Cliente{
        /**
         * La función inserta un nuevo registro en una tabla de clientes con la información
         * proporcionada.
         * 
         * @param nombre El primer nombre del cliente que se insertará en la base de datos.
         * @param apellido Apellido del cliente.
         * @param dni DNI significa "Documento Nacional de Identidad", que es un número de
         * identificación único asignado a personas en algunos países, como España y Argentina. Es
         * similar a un número de seguro social en los Estados Unidos.
         * @param email El parámetro de correo electrónico es una cadena que representa la dirección de
         * correo electrónico de un cliente.
         * @param movil El parámetro "movil" es una variable que representa el número de teléfono móvil
         * de un cliente. Se está utilizando en la consulta SQL para insertar un nuevo registro en la
         * tabla de "clientes" junto con otra información del cliente como nombre, apellidos, correo
         * electrónico y DNI.
         * 
         * @return un valor booleano de verdadero si el registro se insertó con éxito en la tabla
         * "clientes", y lanzando una excepción con un mensaje de error si la inserción falla.
         */
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

        /**
         * Esta función de PHP recupera todos los datos de una tabla llamada "clientes".
         * 
         * @return array Una matriz que contiene todas las filas de la tabla "clientes" en la base de
         * datos.
         */
        function getAll(): array{
            $consulta = "SELECT * FROM clientes";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        /**
         * La función recupera todos los datos de la tabla "clientes" donde el ID coincide con el
         * parámetro de entrada.
         * 
         * @param id_cliente El parámetro `id_cliente` es una variable que representa el ID de un
         * cliente en una tabla de base de datos llamada "clientes". La función `getwhere` toma este ID
         * como entrada y devuelve una matriz de todos los datos asociados con ese cliente de la tabla
         * "clientes".
         * 
         * @return array Una matriz que contiene todos los datos de la tabla "clientes" donde la
         * columna "id" coincide con el parámetro "" proporcionado.
         */
        function getWhere($id_cliente): array{
            $consulta = "SELECT * FROM clientes WHERE id = '$id_cliente'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        /**
         * Esta función recupera todos los valores de una consulta de base de datos usando PDO en PHP.
         * 
         * @param consulta El parámetro "consulta" es una cadena que representa una consulta SQL a
         * ejecutar sobre una base de datos. Esta función utiliza la biblioteca PDO para ejecutar la
         * consulta y obtener todos los resultados como una matriz asociativa.
         * 
         * @return array matriz de todos los valores obtenidos al ejecutar la consulta SQL pasada como
         * parámetro a la función.
         */
        function sentenciaOtenerTodosValores($consulta){
            $conexion = new ConexionBD();
            $datos = $conexion::consulta($consulta)->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }

        /**
         * Esta función de PHP elimina una fila de la tabla "clientes" en una base de datos según el
         * parámetro "id_cliente" proporcionado.
         * 
         * @param id_cliente El parámetro "id_cliente" es una variable que representa el ID del cliente
         * que se debe eliminar de la tabla "clientes" en una base de datos. La función "eliminar" toma
         * este parámetro y lo usa para construir una consulta SQL que elimina la fila correspondiente
         * de la tabla.
         * 
         * @return el resultado de la consulta SQL para eliminar una fila de la tabla "clientes" donde
         * la columna "id" coincide con el parámetro "" proporcionado. El valor devuelto no
         * se especifica en el código, pero es probable que sea un valor booleano que indique si la
         * consulta se realizó correctamente o no.
         */
        function delete($id_cliente){
            $consulta = "DELETE FROM clientes WHERE id = '$id_cliente'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        /**
         * Esta función actualiza la información del cliente en una base de datos en función de su ID.
         * 
         * @param id El ID del cliente a actualizar en la base de datos.
         * @param nombre El primer nombre del cliente.
         * @param apellido Apellido del cliente.
         * @param dni DNI significa "Documento Nacional de Identidad", que es un número de
         * identificación único asignado a personas en algunos países, como España y Argentina. Es
         * similar a un número de seguro social en los Estados Unidos.
         * @param email El parámetro de correo electrónico es una variable que debe contener la
         * dirección de correo electrónico actualizada de un cliente en una base de datos.
         * @param movil Es probable que el parámetro "movil" se refiera a un número de teléfono móvil.
         * 
         * @return el resultado de la consulta SQL que actualiza los valores de la tabla "clientes"
         * para el ID dado con los valores proporcionados para "nombre", "apellido", "dni", "email" y
         * "movil". El valor devuelto no se especifica en el código, pero es probable que sea un valor
         * booleano que indique si la consulta se realizó correctamente o no.
         */
        function update($id, $nombre, $apellido, $dni, $email, $movil){
            $consulta = "UPDATE clientes SET NOMBRE = $nombre, APELLIDO = $apellido, DNI = $dni, EMAIL = $email, MOVIL = $movil WHERE ID = $id";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        /**
         * La función verifica si un cliente existe en una base de datos por su número de
         * identificación.
         * 
         * @param dni El parámetro "dni" es una cadena que representa el número de identificación de un
         * cliente. Se utiliza en la consulta SQL para buscar un cliente en la tabla "clientes" de una
         * base de datos.
         * 
         * @return La función `existeCliente` está devolviendo el resultado de una consulta SQL que
         * selecciona todas las columnas de la tabla `clientes` donde la columna `dni` coincide con el
         * parámetro de entrada ``. La función devuelve una matriz con todas las filas que
         * coinciden con la consulta.
         */
        function existeCliente($dni){
            $consulta = "SELECT * FROM clientes WHERE dni = '$dni'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }
    }
?>