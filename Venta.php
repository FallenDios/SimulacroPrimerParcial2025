<?php

class Venta {
    // Atributos
    private $numero;
    private $fecha;
    private $objCliente;
    private $colMotos;
    private $precioFinal;

    // Constructor
    public function __construct($numero, $fecha, $objCliente, $colMotos = []) {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->objCliente = $objCliente;
        $this->colMotos = $colMotos;
        $this->precioFinal = 0;

        foreach ($this->colMotos as $moto) {
            $this->incorporarMoto($moto);
        }
    }

    // Getters
    public function getNumero() {
        return $this->numero;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getObjCliente() {
        return $this->objCliente;
    }

    public function getColMotos() {
        return $this->colMotos;
    }

    public function getPrecioFinal() {
        return $this->precioFinal;
    }

    // Método para incorporar motos
    public function incorporarMoto($objMoto) {
        $puedoAgregar = false;

        if (!$this->objCliente->getDadoDeBaja()) {
            $precio = $objMoto->calcularPrecioVenta();
            if ($precio > 0) {
                $this->colMotos[] = $objMoto;
                $this->precioFinal += $precio;
                $puedoAgregar = true;
            }
        }

        return $puedoAgregar;
    }

    // Método toString
    public function __toString() {
        $info = "Venta N°: {$this->numero}\n" .
                "Fecha: {$this->fecha}\n" .
                "Cliente: {$this->objCliente}\n" .
                "Precio Total: {$this->precioFinal}\n" .
                "Motos vendidas:\n";

        if (count($this->colMotos) === 0) {
            $info .= "- No hay motos asociadas\n";
        } else {
            foreach ($this->colMotos as $moto) {
                $info .= "-" . $moto . "\n";
            }
        }

        return $info;
    }
}
?>