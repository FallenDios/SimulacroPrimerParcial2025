<?php
class Moto {
    // Atributos
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa;

    // Constructor
    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa) {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
        $this->activa = $activa;
    }

    // Getters
    public function getCodigo() {
        return $this->codigo;
    }

    public function getCosto() {
        return $this->costo;
    }

    public function getAnioFabricacion() {
        return $this->anioFabricacion;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPorcentajeIncrementoAnual() {
        return $this->porcentajeIncrementoAnual;
    }

    public function getActiva() {
        return $this->activa;
    }

    // Método toString
    public function __toString() {
        $estado = $this->activa ? "Disponible para venta" : "No disponible";
        return "Código: {$this->codigo}\n" .
               "Descripción: {$this->descripcion}\n" .
               "Año de fabricación: {$this->anioFabricacion}\n" .
               "Costo: {$this->costo}\n" .
               "Incremento anual: {$this->porcentajeIncrementoAnual}\n" .
               "Estado: {$estado}\n";
    }

    // Método para calcular precio de venta
    public function calcularPrecioVenta() {
        if (!$this->activa) {
            return -1;
        }

        $anioActual = date("Y");
        $aniosTranscurridos = $anioActual - $this->anioFabricacion;

        if ($this->porcentajeIncrementoAnual <= 0) {
            return $this->costo; // Sin incremento
        }

        $incremento = $this->costo * ($aniosTranscurridos * $this->porcentajeIncrementoAnual);
        $precioVenta = $this->costo + $incremento;
        return $precioVenta;
    }
}
?>