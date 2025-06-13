<?php 
/*/Se crea 1 instancia de la clase CabinaPeaje. 
Se crean 3 instancias de RegistroVehículo , 1 correspondiente a un Scania, 1 a una Trafic que funciona como transporte escolar, 1 a un Toyota Corolla. Los demás atributos/características pueden contener los valores que defina
Invocar con cada instancia del inciso anterior al método valorPeaje() y visualizar el resultado.
*/
include_once 'RegistroVehiculo.php';
include_once 'RegistroVehiculoParticular.php';  
include_once 'RegistroCamion.php';
include_once 'RegistroTransporteEscolar.php';   
include_once 'Recibo.php';
include_once 'CabinaPeaje.php'; 


$objCabina = new CabinaPeaje();

// Crear vehículos
$scania = new RegistroCamion("AAA111", "Scania", 4);
$trafic = new RegistroTransporteEscolar("BBB222", "Renault");
$corolla = new RegistroVehiculoParticular("CCC333", "Toyota Corolla");

// Mostrar valores del peaje
echo $scania . "\n";
echo "Valor peaje: $" . $scania->valorPeaje() . "\n\n";

echo $trafic . "\n";
echo "Valor peaje: $" . $trafic->valorPeaje() . "\n\n";

echo $corolla . "\n";
echo "Valor peaje: $" . $corolla->valorPeaje() . "\n\n";