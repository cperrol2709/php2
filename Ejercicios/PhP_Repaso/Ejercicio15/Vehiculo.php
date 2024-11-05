<?php
class Vehiculo {
    private static $vehiculosCreados = 0;
    private static $kmTotales = 0;
    private $kmRecorridos = 0;

    public function __construct() {
        self::$vehiculosCreados++;
    }

    public function anda($kilometros) {
        $this->kmRecorridos += $kilometros;
        self::$kmTotales += $kilometros;
    }

    public static function getVehiculosCreados() {
        return self::$vehiculosCreados;
    }

    public static function getKmTotales() {
        return self::$kmTotales;
    }

    public function getKmRecorridos() {
        return $this->kmRecorridos;
    }
}

class Bicicleta extends Vehiculo {
   
    public function hacerCaballito() {
        return "La bicicleta está haciendo un caballito.";
    }
}

class Coche extends Vehiculo {
    
    public function quemarRueda() {
        return "El coche está quemando rueda.";
    }
}
