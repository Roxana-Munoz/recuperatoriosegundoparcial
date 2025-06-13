<?php
//Para ello se emiten recibos correspondientes al cobro del peaje. De los recibos de cobro del peaje se conoce el número del recibo, el valor, la fecha, hora y se almacena una referencia al registro del vehículo
class Recibo {
    private $numero;
    private $valor;
    private $fecha;
    private $hora;
    private $objVehiculo;
    //METODO CONSTRUCTOR
    public function __construct($numero, $valor, $objVehiculo) {
        $this->numero = $numero;
        $this->valor = $valor;
        $this->fecha = date('Y-m-d');
        $this->hora = date('H:i:s');
        $this->objVehiculo = $objVehiculo;
    }
    //METODO GETERS
    public function getNumero() {
        return $this->numero;
    }

    public function getValor() {
        return $this->valor;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    public function getObjVehiculo() {
        return $this->objVehiculo;
    }
    //METODO SETERS
    public function setNumero($numero) {
        $this->numero = $numero;
    }   
    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }
    public function setObjVehiculo($objVehiculo) {
        $this->objVehiculo = $objVehiculo;
    }
//METODO __TO STRING
    public function __toString() {
        return "Recibo No: " . $this->getNumero() . "\n" .
               "Valor: " . $this->getValor() . "\n" .
               "Fecha: " . $this->getFecha() . "\n" .
               "Hora: " . $this->getHora() . "\n" .
               "Vehiculo: " . $this->getObjVehiculo() . "\n";
    }
}

?>      