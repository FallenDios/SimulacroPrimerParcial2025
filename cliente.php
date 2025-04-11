<?php

class Cliente {
    private $nombre;
    private $apellido;
    private $tipoDocumento;
    private $numeroDocumento; 
    private $otroDato;
    private $dadoDeBaja = false; 

    public function __construct($nombre, $apellido, $tipoDocumento, $numeroDocumento, $otroDato) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipoDocumento = $tipoDocumento;
        $this->numeroDocumento = $numeroDocumento;
        $this->otroDato = $otroDato;
    }

    // Getters
    public function getTipoDocumento() {
        return $this->tipoDocumento;
    }

    public function getNumeroDocumento() {
        return $this->numeroDocumento;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getDadoDeBaja() {
        return $this->dadoDeBaja;
    }

    // toString
    public function __toString() {
        $estado = $this->dadoDeBaja ? "Sí" : "No";
        return "Nombre: {$this->nombre} {$this->apellido}\n" .
               "Documento: {$this->tipoDocumento} {$this->numeroDocumento}\n" .
               "¿Dado de baja?: {$estado}\n";
    }
}

?>