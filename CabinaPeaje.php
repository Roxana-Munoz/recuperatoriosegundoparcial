<?php
//La cabina de peaje se encarga de almacenar y gestionar toda la información de los recibos y de los registros (se almacena una única colección con los registros de vehículos). Al final del día se analiza la información de cada cabina de peaje en función de los recibos que registró.

// clase  CabinaPeaje, la definición de las variables instancias y el método contructor.

class CabinaPeaje {
    //  Variables de instancia
    private  $colVehiculos; // Arreglo para los registros de vehículos
    private  $colRecibos;   // Arreglo para los recibos emitidos

    // METODO CONSTRUCTOR
    public function __construct() {
        $this->colVehiculos = [];
        $this->colRecibos = [];
    }
    //METODO GETERS
    public function getColVehiculos() {
        return $this->colVehiculos;
    }
    public function getColRecibos() {
        return $this->colRecibos;
    }

    //METODO SETERS
    public function setColVehiculos($colVehiculos) {
        $this->colVehiculos = $colVehiculos;
    }
    public function setColRecibos($colRecibos) {
        $this->colRecibos = $colRecibos;
    }
    //METODO __TO STRING
     public function __toString()
    {
        $str = "Cabina Peaje:\n";
        $str .= "Vehículos registrados:\n" . $this->mostrarColeccion($this->getColVehiculos()) . "\n";
        $str .= "Recibos emitidos: " . $this->mostrarColeccion($this->getColRecibos()) . "\n";
        return $str;
    }

    public function mostrarColeccion($coleccion)
    {
        $arregloStr = "";
        $array = $coleccion;
        $contador = count($array);

        for ($i = 0; $i < $contador; $i++) {
            $arregloStr .= $array[$i] . "\n";
            $arregloStr .= "---------------\n";
        }

        return $arregloStr;
    }
  //Incorporar vehiculo
    public function incorporarVehiculo($objVehiculo)
    {
        $this->colVehiculos[] = $objVehiculo;
    }
    //Incorporar recibo
    public function incorporarRecibo($objRecibo)
    {
        $this->colRecibos[] = $objRecibo;
    }
    public function obtenerRecibos()
    {
        return $this->colRecibos;
    }
    public function obtenerVehiculos()
    {
        return $this->colVehiculos;
    }
    public function generarRecibo($objVehiculo)
{
    $valor = $objVehiculo->valorPeaje(); // Usar lógica de cálculo real
    $recibo = new Recibo(
        count($this->colRecibos) + 1,
        $valor,
        $objVehiculo
    );
    $this->incorporarRecibo($recibo);
    return $recibo;
}
    
    public function registrarVehiculo($objVehiculo)
    { 
        $this->incorporarVehiculo($objVehiculo);
        return $objVehiculo;
    }
       
    public function analizarInformacion()
    {
        $totalRecibos = count($this->colRecibos);
        $totalVehiculos = count($this->colVehiculos);
        $totalMonto = 0;

        foreach ($this->colRecibos as $recibo) {
            $totalMonto += $recibo->getValor();
        }

        return [
            'total_recibos' => $totalRecibos,
            'total_vehiculos' => $totalVehiculos,
            'total_monto' => $totalMonto
        ];
    }
   // Implementar en la clase CabinaPeaje el método cobrarPeaje($unTipoRegistroVehículo, $info)﻿ que obtiene el valor del peaje del vehículo, genera y retorna el recibo correspondiente. 

   // La función recibe por parámetro un tipo que permite identificar el tipo de registro que corresponde y un arreglo asociativo $info con la información correspondiente según el tipo de registro. Crear el tipo de registro correspondiente, el recibo y retornarlo como resultado de la función

    public function cobrarPeaje($unTipoRegistroVehiculo, $info)
    {
        $objVehiculo = null;

        switch ($unTipoRegistroVehiculo) {
            case 'particular':
                $objVehiculo = new RegistroVehiculoParticular($info['numeroPatente'], $info['nombrePropietario']);
                break;
            case 'camion':
                $objVehiculo = new RegistroCamion($info['numeroPatente'], $info['peso'], $info['ejes']);
                break;
            default:
                throw new Exception("Tipo de registro de vehículo no reconocido.");
        }

        $this->registrarVehiculo($objVehiculo);
        return $this->generarRecibo($objVehiculo);
    }
//Implementar en la clase CabinaPeaje el método reciboMayorMonto($fecha) que retorna el recibo con mayor valor de peaje para una fecha dada.
    public function reciboMayorMonto($fecha)
    {
        $reciboMayor = null;

        foreach ($this->colRecibos as $recibo) {
            if ($recibo->getFecha() === $fecha) {
                if ($reciboMayor === null || $recibo->getValor() > $reciboMayor->getValor()) {
                    $reciboMayor = $recibo;
                }
            }
        }

        return $reciboMayor;
    }
    //Implementar en la clase CabinaPeaje el método recaudacionXTipoVehiculo($fecha,$tipoRegistroVehiculo) que retorna el monto total recaudado por la cabina, para una fecha y un tipo de vehículo dado. (Puede utilizar la función de PHP get_class($objeto) que retorna el nombre de la clase a la que pertenece el objeto. Por ejemplo get_class($unaInstanciaCamion) retorna el nombre 
// de la clase RegistroCamion).
    public function recaudacionXTipoVehiculo($fecha, $tipoRegistroVehiculo)
    {
        $totalRecaudado = 0;

        foreach ($this->colRecibos as $recibo) {
            if ($recibo->getFecha() === $fecha && get_class($recibo->getObjVehiculo()) === $tipoRegistroVehiculo) {
                $totalRecaudado += $recibo->getValor();
            }
        }

        return $totalRecaudado;
    }
    //Implementar en la clase CabinaPeaje el método totalRecaudado($fecha) que retorna el monto total recaudado por la cabina para una fecha dada.
    public function totalRecaudado($fecha)
    {
        $totalRecaudado = 0;

        foreach ($this->colRecibos as $recibo) {
            if ($recibo->getFecha() === $fecha) {
                $totalRecaudado += $recibo->getValor();
            }
        }

        return $totalRecaudado;
    }


}           