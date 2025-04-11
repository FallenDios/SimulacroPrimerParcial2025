<?php

class Empresa {
    // Atributos
    private $denominacion;
    private $direccion;
    private $clientes;
    private $motos;
    private $ventas;

    // Constructor
    public function __construct($denominacion, $direccion, $clientes = [], $motos = [], $ventas = []) {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->clientes = $clientes;
        $this->motos = $motos;
        $this->ventas = $ventas;
    }

    // Getters
    public function getDenominacion() {
        return $this->denominacion;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getClientes() {
        return $this->clientes;
    }

    public function getMotos() {
        return $this->motos;
    }

    public function getVentas() {
        return $this->ventas;
    }

    // Método toString
    public function __toString() {
        return "Empresa: {$this->denominacion}\n" .
               "Dirección: {$this->direccion}\n" .
               "Clientes registrados: " . count($this->clientes) . "\n" .
               "Motos en stock: " . count($this->motos) . "\n" .
               "Ventas realizadas: " . count($this->ventas) . "\n";
    }

    // Retornar una moto por código
    public function retornarMoto($codigoMoto) {
        foreach ($this->motos as $moto) {
            if ($moto->getCodigo() == $codigoMoto) {
                return $moto;
            }
        }
        return null;
    }

    // Registrar una venta
    public function registrarVenta($colCodigosMoto, $objCliente) {
        $fecha = date("Y-m-d");
        $nroVenta = count($this->ventas) + 1;

        $venta = new Venta($nroVenta, $fecha, $objCliente, []);

        foreach ($colCodigosMoto as $codigo) {
            $moto = $this->retornarMoto($codigo);
            if ($moto !== null) {
                $venta->incorporarMoto($moto);
            }
        }

        $importeFinal = $venta->getPrecioFinal();

        if ($importeFinal > 0) {
            $this->ventas[] = $venta;
        }

        return $importeFinal;
    }

    // Retornar ventas por cliente
    public function retornarVentasXCliente($tipo, $numDoc) {
        $ventasCliente = [];

        foreach ($this->ventas as $venta) {
            $cliente = $venta->getObjCliente();
            if ($cliente->getTipoDocumento() == $tipo && $cliente->getNumeroDocumento() == $numDoc) {
                $ventasCliente[] = $venta;
            }
        }

        return $ventasCliente;
    }
}

?>