<?php
    declare(strict_types=1);
    require_once "connection/conexion.php";

    class Roles{
        /**
         * Esta función de PHP recupera todos los datos de la tabla de "roles".
         * 
         * @return array Una matriz que contiene todas las filas de la tabla "roles" en la base de
         * datos.
         */
        function getAll(): array{
            $consulta = "SELECT * FROM roles";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        /**
         * La función recupera todos los datos de la tabla "roles" donde el ID coincide con el
         * parámetro de entrada.
         * 
         * @param id_rol El parámetro id_rol es un valor entero que representa el ID de un rol en una
         * tabla de base de datos.
         * 
         * @return array Una matriz de datos de la tabla "roles" en la base de datos donde la columna
         * "id" coincide con el parámetro "" proporcionado.
         */
        function getWhere($id_rol): array{
            $consulta = "SELECT * FROM roles WHERE id='$id_rol'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        /**
         * Esta función de PHP recupera todos los valores de una consulta de base de datos usando PDO.
         * 
         * @param consulta El parámetro "consulta" es una cadena que representa una consulta SQL a
         * ejecutar sobre una base de datos. Esta función utiliza la biblioteca PDO para ejecutar la
         * consulta y obtener todos los resultados como una matriz asociativa.
         * 
         * @return array array de todos los valores obtenidos al ejecutar la consulta SQL especificada en
         * el parámetro ``.
         */
        function sentenciaOtenerTodosValores($consulta){
            $conexion = new ConexionBD();
            $datos = $conexion::consulta($consulta)->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }

        /**
         * La función inserta un nuevo registro en la tabla de "roles" en una base de datos.
         * 
         * @param rol El parámetro "rol" es una variable de cadena que representa el nombre o la
         * descripción de un rol que se insertará en una tabla de base de datos llamada "roles".
         * 
         * @return Si la consulta tiene éxito, la función devolverá "verdadero". Si la consulta falla,
         * arrojará una excepción con el mensaje "No se pudo insertar el registro en la tabla de
         * roles".
         */
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

        /**
         * Esta función PHP actualiza el campo "rol" en la tabla "roles" para un "id_rol" dado.
         * 
         * @param id_rol El ID del rol que debe actualizarse en la base de datos.
         * @param rol El nuevo valor para el campo "rol" en la tabla "roles".
         * 
         * @return el resultado de la consulta SQL que actualiza el campo "rol" en la tabla "roles" con
         * el valor dado, para la fila con el "id_rol" especificado. El valor de retorno no se
         * especifica explícitamente en el código, pero es probable que sea un valor booleano que
         * indique si la actualización se realizó correctamente o no.
         */
        function update($id_rol, $rol){
            $consulta = "UPDATE roles SET rol = '$rol' WHERE id = '$id_rol'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        /**
         * Esta función de PHP elimina una fila de una tabla de base de datos según la ID
         * proporcionada.
         * 
         * @param id_rol El parámetro "id_rol" es el ID del rol que debe eliminarse de la tabla "roles"
         * en la base de datos. La función ejecuta una consulta SQL para eliminar la fila con el ID
         * especificado de la tabla.
         * 
         * @return el resultado de la consulta SQL para eliminar una fila de la tabla "roles" donde la
         * columna "id" coincide con el parámetro "" proporcionado. El valor devuelto no se
         * especifica en el código, pero es probable que sea un valor booleano que indique si la
         * consulta se realizó correctamente o no.
         */
        function delete($id_rol){
            $consulta = "DELETE FROM roles WHERE id = '$id_rol'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }
    }
?>