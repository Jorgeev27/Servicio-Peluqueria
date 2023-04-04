<?php
    declare(strict_types = 1);
    require_once("./TipoCorte.php");

    class CortePelo extends TipoCorte{
        /* Creando un array con los atributos de la clase TipoCorte. */
        private $atributos = ['nombreCortePelo'=> "", 'precioCortePelo'=> 0];

        /**
         * Esta función es un constructor que toma 1 cadena y una cadena o un flotante. Además, hereda el constructor de TipoCorte. Establece los valores de las propiedades del objeto a
         * los valores de los parámetros.
         * @param string nombreCortePelo - El nombre del corte de pelo.
         * @param float | string precioCortePelo - El precio del corte de pelo.
         */
        public function __construct(string $nombreCortePelo = "", float | string $precioCortePelo = 0){
            parent::__construct($nombreCortePelo, $precioCortePelo);
            $this->nombreCortePelo = $nombreCortePelo;
            $this->precioCortePelo = $precioCortePelo;
        }

        /**
         * Toma un array asociativo y devuelve un objeto CortePelo.
         * @param array datosCortePelo - Array asociativo con los datos del CortePelo.
         * @return CortePelo - Objeto de tipo CortePelo.
         */
        public static function getCortePelFromAssoc(array $datosCortePelo): CortePelo{
            $cP = new CortePelo();
            foreach($datosCortePelo as $atributo=>$valor){
                $cP->$atributo = $valor;
            }
            return $cP;
        }

        /**
         * Toma un objeto stdClass y devuelve un objeto CortePelo.
         * @param stdClass cP - Objeto que contiene la información del CortePelo.
         * @return CortePelo - Nuevo objeto CortePelo.
         */
        public static function getProdFromStd(stdClass $cP): CortePelo{
            $cP = new CortePelo();
            foreach($cP as $atributo=>$valor){
                $cP->$atributo = $valor;
            }
            return $cP;
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