<?php
    declare(strict_types = 1);

    class Empleado{
        /* Creando un array con los atributos de la clase Empleado. */
        private $atributos = ['nombre'=> "", 'apellido1'=> "", 'apellido2'=> "", 'dni'=> "", 'telefonoMovil'=> "", 'nombreUsuarioEmpleado'=> "", 'correoElectronicoEmpleado'=> ""];

        /**
         * Esta función es un constructor que toma 7 cadenas. Establece los valores de las propiedades del objeto a
         * los valores de los parámetros.
         * @param string nombre - El nombre del empleado.
         * @param string apellido1 - El primer apellido del empleado.
         * @param string apellido2 - El segundo apellido del empleado.
         * @param string dni - El Documento Nacional de Identidad del empleado.
         * @param string telefonoMovil - El teléfono móvil del empleado.
         * @param string nombreUsuarioEmpleado - El nombre de usuario del empleado.
         * @param string correoElectronicoEmpleado - El correo electrónico del empleado.
         */
        public function __construct(string $nombre = "", string $apellido1 = "", string $apellido2 = "", string $dni = "", string $telefonoMovil = "", string $nombreUsuarioEmpleado = "", string $correoElectronicoEmpleado = ""){
            $this->nombre = $nombre;
            $this->apellido1 = $apellido1;
            $this->apellido2 = $apellido2;
            $this->dni = $dni;
            $this->telefonoMovil = $telefonoMovil;
            $this->nombreUsuarioEmpleado = $nombreUsuarioEmpleado;
            $this->nombreUsuarioEmpleado = $correoElectronicoEmpleado;
        }

        /**
         * La función __set() es un método mágico que le permite establecer el valor de una propiedad que no existe.
         * @param string atributo - Nombre del atributo que desea establecer.
         * @param mixed valor - Valor que se asignará al atributo.
         */
        public function __set(string $atributo, mixed $valor){
            $this->atributos[$atributo] = $valor;
        }

        /**
         * Devuelve el valor del atributo.
         * @param string atributo - Nombre del atributo que desea obtener.
         * @return Valor del atributo.
         */
        public function __get(string $atributo){
            return $this->atributos[$atributo];
        }

        /**
         * Toma un array asociativo y devuelve un objeto Empleado.
         * @param array datosEmpleado - Array asociativo con los datos del Empleado.
         * @return Empleado - Objeto de tipo Empleado.
         */
        public static function getCliFromAssoc(array $datosEmpleado): Empleado{
            $e = new Empleado();
            foreach($datosEmpleado as $atributo=>$valor){
                $e->$atributo = $valor;
            }
            return $e;
        }

        /**
         * Toma un objeto stdClass y devuelve un objeto Empleado.
         * @param stdClass e - Objeto que contiene la información del Empleado.
         * @return Empleado - Nuevo objeto Empleado.
         */
        public static function getCliFromStd(stdClass $e): Empleado{
            return new Empleado($e->nombre, $e->apellido1, $e->apellido2, $e->dni, $e->telefonoMovil, $e->nombreUsuarioEmpleado, $e->correoElectronicoEmpleado);
        }

        /**
         * Convierte el objeto a una cadena.
         * @return Objeto que se está convirtiendo a una cadena JSON.
         */
        public function __toString(){
            return json_encode($this->atributos, JSON_UNESCAPED_UNICODE);
        }
    }
?>