<?php
// Clase RegistroVehiculoParticular que extiende de RegistroVehiculo
class RegistroVehiculoParticular extends RegistroVehiculo {
    private $nombrePropietario;

    public function __construct($numeroPatente, $nombrePropietario) {
        parent::__construct($numeroPatente);
        $this->nombrePropietario = $nombrePropietario;
    }

    public function getNombrePropietario() {
        return $this->nombrePropietario;
    }

    public function setNombrePropietario($nombrePropietario) {
        $this->nombrePropietario = $nombrePropietario;
    }

    public function __toString() {
        return parent::__toString() . "Nombre del Propietario: " . $this->getNombrePropietario() . "\n";
    }

    public function valorPeaje() {
        return parent::valorPeaje();
    }
}
?>