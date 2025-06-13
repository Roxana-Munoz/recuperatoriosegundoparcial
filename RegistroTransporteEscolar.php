<?php
// Clase RegistroTransporteEscolar que extiende de RegistroVehiculo
class RegistroTransporteEscolar extends RegistroVehiculo {
    private $cantidadPasajeros;

    public function __construct($numeroPatente, $cantidadPasajeros) {
        parent::__construct($numeroPatente);
        $this->cantidadPasajeros = $cantidadPasajeros;
    }   

    public function getCantidadPasajeros() {
        return $this->cantidadPasajeros;
    }

    public function setCantidadPasajeros($cantidadPasajeros) {
        $this->cantidadPasajeros = $cantidadPasajeros;
    }

    public function __toString() {
        return parent::__toString() . "Cantidad de Pasajeros: " . $this->getCantidadPasajeros() . "\n";
    }

 

    public function valorPeaje() {
        $base = $this->getTarifaPeaje(); // $20
        $costoCapacidad = 25 * $this->getCantidadPasajeros();

        return $base + $costoCapacidad;
    }

}
?>