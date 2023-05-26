<?php
    declare(strict_types=1);
    //ACCEDEMOS A LA DEFINICION DE LAS VARIABLES QUE TENEMOS EN CONFIG.PHP 
    require("config.php");

    class ConexionBD{
            // protected $conexion;
            private static $lastAffectedRows;
            public static function Conexion() :PDO{
                $conexion = null;
                try {
                    $conexion = new PDO(
                        'mysql:host='.HOST.
                        ';dbname='.DB.";charset=utf8",
                        USUARIO, 
                        CLAVE
                    );
                    //Configuramos pdo para que lance excepciones en casos de errores
                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e)  {
                    echo "No se ha podido conectar a la BBDD, causa PDOException: ".$e->getMessage();
                }
                return $conexion;      
            }

            public static function consulta(string $sql) : PDOStatement | int {
                try {                
                    $conexion = self::Conexion(); 
                    if (str_starts_with(strtolower(trim($sql)), "select")) {
                        $resultado = $conexion->query($sql);
                    } else {
                        $resultado = $conexion->exec($sql); 
                    }
                    unset($conexion);
                    return $resultado;
                } catch (Exception $ex) {
                    die("Error en la consulta. ".$ex->getMessage());
                }
            }

            public static function getLastAffectedRows() : int {
                return self::$lastAffectedRows;
            }
        }
        //aqui comprobamos si la conexion a tenido exito
        $conexion = new ConexionBD();
?>