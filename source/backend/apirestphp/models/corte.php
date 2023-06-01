<?php
    declare(strict_types=1);
    require_once "connection/conexion.php";

    class Corte{
        /**
         * Esta función inserta un registro en una tabla de base de datos denominada "corte" con el
         * nombre, la descripción y los valores de precio proporcionados.
         * 
         * @param nombre Este parámetro representa el nombre de un "corte" (que puede ser un tipo de
         * corte de carne o un plato elaborado con un corte de carne específico) que se está insertando
         * en una tabla de base de datos.
         * @param descripcion Este parámetro es una cadena que representa la descripción de un "corte"
         * (que podría ser un tipo de producto o servicio). Se utiliza en una consulta SQL para
         * insertar un nuevo registro en una tabla de base de datos llamada "corte".
         * @param precio precio es una variable que representa el precio de un producto o servicio. En
         * la función dada, se usa como parámetro para insertar un nuevo registro en la tabla "corte"
         * con el nombre, la descripción y el precio especificados.
         * 
         * @return un valor booleano de verdadero si el registro se insertó con éxito en la tabla
         * "corte" y lanzando una excepción con un mensaje de error si la inserción falla.
         */
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

        /**
         * Esta función de PHP recupera todos los datos de una tabla llamada "corte".
         * 
         * @return array Una matriz que contiene todos los datos de la tabla "corte" en la base de
         * datos.
         */
        function getAll(): array{
            $consulta = "SELECT * FROM corte";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        /**
         * Esta función de PHP recupera todos los datos de una tabla llamada "corte" donde la columna
         * "nombre" coincide con una identificación dada.
         * 
         * @param id_corte  es una variable que representa el nombre de un "corte" (corte) en
         * una tabla de base de datos. La función "getwhere" toma esta variable como parámetro y la
         * utiliza para construir una consulta SQL para recuperar todos los datos de la tabla "corte"
         * donde el "nombre
         * 
         * @return array Una matriz que contiene todas las filas de la tabla "corte" donde la columna
         * "nombre" coincide con el parámetro "" proporcionado.
         */
        function getWhere($id_corte): array{
            $consulta = "SELECT * FROM corte WHERE nombre = '$id_corte'";
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
         * @param id_corte  es una variable que representa el identificador único de un
         * registro en la tabla "corte" que debe eliminarse. La función "eliminar" toma este parámetro
         * y lo usa en una consulta SQL para eliminar el registro con el valor coincidente de id_corte
         * de la tabla.
         * 
         * @return el resultado de la consulta SQL para eliminar un registro de la tabla "corte" donde
         * "id_corte" coincide con el parámetro proporcionado. El valor devuelto no se especifica en el
         * código, pero es probable que sea un valor booleano que indique si la consulta se realizó
         * correctamente o no.
         */
        function delete($id_corte){
            $consulta = "DELETE FROM corte WHERE id_corte = '$id_corte'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        /**
         * Esta función de PHP actualiza el nombre, la descripción y el precio de un "corte" (corte) en
         * una base de datos en función de su ID.
         * 
         * @param id_corte El ID del "corte" (corte) que necesita ser actualizado en la base de datos.
         * @param nombre Se actualiza el nuevo nombre del "corte".
         * @param descripcion El parámetro "descripcion" es una variable de cadena que representa la
         * descripción de un "corte" (que podría ser un tipo de corte de pelo o peinado). Se utiliza en
         * la consulta SQL "ACTUALIZAR" para actualizar la descripción de un "corte" específico
         * identificado por su valor "id_corte".
         * @param precio precio es una variable que representa el precio de un producto o servicio. En
         * la función dada, se utiliza para actualizar el precio de un "corte" (que podría ser un tipo
         * de corte de pelo o peinado) en una tabla de base de datos llamada "corte".
         * 
         * @return el resultado de la consulta SQL que actualiza los valores de las columnas "nombre",
         * "descripcion" y "precio" en la tabla "corte" donde "id_corte" coincide con el parámetro
         * proporcionado. El resultado podría ser un valor booleano que indique si la actualización se
         * realizó correctamente o un mensaje de error si la actualización falló. Sin embargo, el
         * código está incompleto y no está claro cuál es el
         */
        function update($id_corte, $nombre, $descripcion, $precio){
            $consulta = "UPDATE corte SET nombre = '$nombre', descripcion = '$descripcion', precio = '$precio' WHERE id_corte = '$id_corte'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        /**
         * La función comprueba si existe un "corte" específico en una tabla de base de datos.
         * 
         * @param nombre El parámetro "nombre" es una variable de cadena que representa el ID de un
         * "corte" en una tabla de base de datos. La función "existeCorte" comprueba si existe un
         * registro con el ID dado en la tabla "corte" y devuelve los datos si existe.
         * 
         * @return La función `existeCorte` está devolviendo el resultado de la consulta SQL que
         * selecciona todas las filas de la tabla `corte` donde la columna `id_corte` coincide con el
         * parámetro de entrada ``. La función devuelve una matriz con todas las filas que
         * coinciden con la consulta.
         */
        function existeCorte($nombre){
            $consulta = "SELECT * FROM corte WHERE id_corte = '$nombre'";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }
    }
?>
