<?php
// Clase RegistroCamion que extiende de RegistroVehiculo
class RegistroCamion extends RegistroVehiculo {

    private $peso;
    private $ejes;
   
    public function __construct($numeroPatente, $peso, $ejes) {
        parent::__construct($numeroPatente);
        $this->peso = $peso;
        $this->ejes = $ejes;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function getEjes() {
        return $this->ejes;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function setEjes($ejes) {
        $this->ejes = $ejes;
    }
 public function __toString() {
        return parent::__toString() .
               "Tipo: Camión\nPeso: {$this->getPeso()} toneladas\nEjes: {$this->getEjes()}\n";
    }
    public function valorPeaje() {
        $base = $this->getTarifaPeaje();
        $costoEjes = 100 * $this->getEjes();
        $costoPeso = 15 * $this->getPeso();

        $subtotal = $base + $costoEjes + $costoPeso;

        $impuesto = ($this->getPeso() < 5) ? 0.02 : 0.05;

        return $subtotal + ($subtotal * $impuesto);
    }

    
}
?>