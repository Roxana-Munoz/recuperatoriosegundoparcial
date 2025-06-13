<?php
//Implementar dentro de la clase  RegistroVehículo , la definición de las variables instancias y el método contructor.
 //En los registros de  vehículos se almacena el número de patente

class RegistroVehiculo { 

    private $numeroPatente; // Numero de patente
    private $tarifaPeaje; // Tarifa de peaje por defecto, puede ser modificada en subclases


    // Método constructor
    public function __construct($numeroPatente) {
        $this->numeroPatente = $numeroPatente;
        $this->tarifaPeaje = 20; // Valor por defecto, puede ser modificado en subclases
    }

    // Métodos Getters
    public function getNumeroPatente() {
        return $this->numeroPatente;
    }
    public function getTarifaPeaje() {
        return $this->tarifaPeaje;
    }

    // Método Setters
    public function setNumeroPatente($numeroPatente) {
        $this->numeroPatente = $numeroPatente;
    }
    public function setTarifaPeaje($tarifaPeaje) {
        $this->tarifaPeaje = $tarifaPeaje;
    }   
    // Método __toString para mostrar información del registro
    public function __toString() {
        return "Número de Patente: " . $this->getNumeroPatente() . "\n";
    }

// Implementar   las clases correspondientes a la jerarquía de RegistroVehículo que puede identificar del enunciado
// Método a redefinir en subclases
    public function valorPeaje() {

        // Valor base por defecto
        return $this->getTarifaPeaje();
    }
}
?>