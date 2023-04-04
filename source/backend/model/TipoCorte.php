<?php
    declare(strict_types = 1);

    class TipoCorte{
        /* Creando un array con los atributos de la clase TipoCorte. */
        private $atributos = ['nombreTipoCorte'=> "", 'familiaTipoCorte'=> ""];

        /**
         * Esta función es un constructor que toma 2 cadenas. Establece los valores de las propiedades del objeto a
         * los valores de los parámetros.
         * @param string nombreTipoCorte - El nombre del tipo de corte.
         * @param string familiaTipoCorte - La familia a la que pertenece el tipo de corte (pelo liso, rizado, etc...).
         */
        public function __construct(string $nombreTipoCorte = "", string $familiaTipoCorte = ""){
            $this->nombreTipoCorte = $nombreTipoCorte;
            $this->familiaTipoCorte = $familiaTipoCorte;
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
         * Toma un array asociativo y devuelve un objeto TipoCorte.
         * @param array datosTipoCorte - Array asociativo con los datos del TipoCorte.
         * @return TipoCorte - Objeto de tipo TipoCorte.
         */
        public static function getTipoCorFromAssoc(array $datosTipoCorte): TipoCorte{
            $tC = new TipoCorte();
            foreach($datosTipoCorte as $atributo=>$valor){
                $tC->$atributo = $valor;
            }
            return $tC;
        }

        /**
         * Toma un objeto stdClass y devuelve un objeto TipoCorte.
         * @param stdClass tC - Objeto que contiene la información del TipoCorte.
         * @return TipoCorte - Nuevo objeto TipoCorte.
         */
        public static function getTipoCorFromStd(stdClass $tC): TipoCorte{
            return new TipoCorte($tC->nombreTipoCorte, $tC->familiaTipoCorte);
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