<?php
    declare(strict_types = 1);

    class Cliente{
        /* Creando un array con los atributos de la clase Cliente. */
        private $atributos = ['nombre'=> "", 'apellido1'=> "", 'apellido2'=> "", 'dni'=> "", 'telefonoMovil'=> "", 'nombreUsuarioCliente'=> "", 'correoElectronicoCliente'=> ""];

        /**
         * Esta función es un constructor que toma 7 cadenas. Establece los valores de las propiedades del objeto a
         * los valores de los parámetros.
         * @param string nombre - El nombre del cliente.
         * @param string apellido1 - El primer apellido del cliente.
         * @param string apellido2 - El segundo apellido del cliente.
         * @param string dni - El Documento Nacional de Identidad del cliente.
         * @param string telefonoMovil - El teléfono móvil del cliente.
         * @param string nombreUsuarioCliente - El nombre de usuario del cliente.
         * @param string correoElectronicoCliente - El correo electrónico del cliente.
         */
        public function __construct(string $nombre = "", string $apellido1 = "", string $apellido2 = "", string $dni = "", string $telefonoMovil = "", string $nombreUsuarioCliente = "", string $correoElectronicoCliente = ""){
            $this->nombre = $nombre;
            $this->apellido1 = $apellido1;
            $this->apellido2 = $apellido2;
            $this->dni = $dni;
            $this->telefonoMovil = $telefonoMovil;
            $this->nombreUsuarioCliente = $nombreUsuarioCliente;
            $this->nombreUsuarioCliente = $correoElectronicoCliente;
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
         * Toma un array asociativo y devuelve un objeto Cliente.
         * @param array datosCliente - Array asociativo con los datos del Cliente.
         * @return Cliente - Objeto de tipo Cliente.
         */
        public static function getCliFromAssoc(array $datosCliente): Cliente{
            $c = new Cliente();
            foreach($datosCliente as $atributo=>$valor){
                $c->$atributo = $valor;
            }
            return $c;
        }

        /**
         * Toma un objeto stdClass y devuelve un objeto Cliente.
         * @param stdClass c - Objeto que contiene la información del Cliente.
         * @return Cliente - Nuevo objeto Cliente.
         */
        public static function getCliFromStd(stdClass $c): Cliente{
            return new Cliente($c->nombre, $c->apellido1, $c->apellido2, $c->dni, $c->telefonoMovil, $c->nombreUsuarioCliente, $c->correoElectronicoCliente);
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