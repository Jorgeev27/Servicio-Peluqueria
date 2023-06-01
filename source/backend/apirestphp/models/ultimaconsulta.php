<?php
    require_once("connection/conexion.php");

    class UltimaConsulta{
        /**
         * La función recupera el último registro insertado de una tabla de base de datos llamada
         * "corte".
         * 
         * @return La función `ultimoInsert()` está devolviendo la última fila de la tabla `corte` en
         * la base de datos, que se obtiene ordenando la tabla en orden descendente por la columna
         * `id_corte` y limitando el resultado a una sola fila.
         */
        function ultimoInsert(){
            $consulta = "SELECT * FROM corte ORDER BY id_corte DESC LIMIT 1;";
            $datos = $this->sentenciaOtenerTodosValores($consulta);
            return $datos;
        }

        /**
         * Esta función de PHP recupera todos los valores de una consulta de base de datos usando PDO.
         * 
         * @param consulta La consulta SQL que se ejecutará para recuperar datos de la base de datos.
         * 
         * @return array array de todos los valores obtenidos de la consulta a la base de datos
         * especificada en el parámetro ``.
         */
        function sentenciaOtenerTodosValores($consulta){
            $conexion = new ConexionBD();
            $datos = $conexion::consulta($consulta)->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
        }

        /**
         * La función recupera datos de una base de datos en función de un ID de cliente dado.
         * 
         * @param id El parámetro "id" es un número entero que representa el ID de un cliente. Esta
         * función recupera información sobre los cortes que pertenecen al cliente con la
         * identificación especificada.
         * 
         * @return una matriz de objetos que contienen la identificación, el nombre y el identificador
         * de un "corte" (corte) que está asociado con un cliente con la identificación dada.
         */
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