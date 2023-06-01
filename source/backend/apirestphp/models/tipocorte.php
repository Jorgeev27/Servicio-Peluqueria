<?php
    declare(strict_types=1);
    require_once "connection/conexion.php";

    class Tipocorte{
        /**
         * Esta función inserta un nuevo registro en la tabla "tipo_corte" con un nombre determinado.
         * 
         * @param nombre El parámetro "nombre" es una variable de cadena que representa el nombre de un
         * tipo de corte en una tabla de base de datos llamada "tipo_corte". Esta función inserta un
         * nuevo registro en la tabla "tipo_corte" con el nombre dado.
         * 
         * @return un valor booleano de verdadero si la inserción fue exitosa.
         */
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

        /**
         * Esta función de PHP recupera todos los datos de una tabla llamada "tipo_corte".
         * 
         * @return array Una matriz que contiene todas las filas de la tabla "tipo_corte".
         */
        function getAll(): array{
            $consulta = "SELECT * FROM tipo_corte";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        /**
         * La función recupera todos los datos de una tabla llamada "tipo_corte" donde el nombre
         * coincide con una entrada dada.
         * 
         * @param id_tipo_corte El parámetro "id_tipo_corte" es una variable que representa el nombre
         * de un tipo de corte en una tabla de base de datos llamada "tipo_corte". La función
         * "getwhere" recupera todos los datos de la tabla "tipo_corte" donde el nombre coincide con el
         * valor del "id_tipo_c
         * 
         * @return todos los datos de la tabla "tipo_corte" donde la columna "nombre" coincide con el
         * parámetro "" proporcionado.
         */
        function getWhere($id_tipo_corte){
            $consulta = "SELECT * FROM tipo_corte WHERE nombre = '$id_tipo_corte'";
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
         * Esta función de PHP elimina un registro de una tabla de base de datos según la ID
         * proporcionada.
         * 
         * @param id_tipo_corte El parámetro "id_tipo_corte" es una variable que representa el
         * identificador único de un registro de la tabla "tipo_corte" que se desea eliminar.
         * 
         * @return el resultado de la consulta SQL para eliminar una fila de la tabla "tipo_corte"
         * donde "id_tipo_corte" coincide con el parámetro proporcionado. El valor de retorno no se
         * especifica en el código, pero es probable que sea un valor booleano que indique si la
         * eliminación se realizó correctamente o no.
         */
        function delete($id_tipo_corte){
            $consulta = "DELETE FROM tipo_corte WHERE id_tipo_corte= '$id_tipo_corte'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        /**
         * La función actualiza el nombre de un tipo de corte en una base de datos en función de su ID.
         * 
         * @param id_tipo_corte El ID del tipo de corte (presumiblemente en una base de datos).
         * @param nombre El nuevo nombre que sustituirá el nombre actual del registro "tipo_corte" por
         * el correspondiente "id_tipo_corte".
         * 
         * @return un valor booleano. Si la consulta SQL se ejecuta con éxito, devolverá verdadero. De
         * lo contrario, devolverá falso.
         */
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

        /**
         * La función comprueba si existe un valor dado en una tabla de base de datos.
         * 
         * @param nombre El parámetro "nombre" es una variable de cadena que representa el nombre de un
         * tipo de corte en una tabla de base de datos llamada "tipo_corte". La función
         * "existeTipoCorte" comprueba si ya existe un registro con el nombre dado en la tabla.
         * 
         * @return el resultado de la consulta ejecutada sobre la base de datos para comprobar si
         * existe un valor dado en la tabla "tipo_corte". Si el valor existe, la función devolverá la
         * fila que contiene ese valor; de lo contrario, devolverá un valor nulo.
         */
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