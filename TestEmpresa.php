<?php

require_once 'Empresa.php';
require_once 'Moto.php';
require_once 'Cliente.php';
require_once 'Venta.php';



$objCliente1 = new Cliente("Franco", "Cabrera", "DNI", "12345678", "francocabrera@mail.com");
$objCliente2 = new Cliente("Azul", "Montiel", "DNI", "87654321", "azulmontiel@mail.com");

// Crear 3 objetos Moto
$obMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 0.85, true);
$obMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 0.70, true);
$obMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 0.55, false);

// Crear objeto Empresa
$colMotos = [$obMoto1, $obMoto2, $obMoto3];
$colClientes = [$objCliente1, $objCliente2];
$colVentas = [];

$objEmpresa = new Empresa("Symmetry Motors", "Av Argentina 505", $colClientes, $colMotos, $colVentas);

// Registrar venta con motos 
echo "----- REGISTRO VENTA 1 -----\n";
$venta1 = $objEmpresa->registrarVenta([11, 12, 13], $objCliente2);
echo $venta1 ? $venta1 : "No se pudo realizar la venta.\n";

// Registrar venta con moto [0] 
echo "----- REGISTRO VENTA 2 -----\n";
$venta2 = $objEmpresa->registrarVenta([0], $objCliente2);
echo $venta2 ? $venta2 : "No se pudo realizar la venta.\n";

//Registrar venta con moto [2] 
echo "----- REGISTRO VENTA 3 -----\n";
$venta3 = $objEmpresa->registrarVenta([2], $objCliente2);
echo $venta3 ? $venta3 : "No se pudo realizar la venta.\n";

// Ventas del cliente 1
echo "----- VENTAS CLIENTE 1 -----\n";
$ventasCliente1 = $objEmpresa->retornarVentasXCliente($objCliente1->getTipoDocumento(), $objCliente1->getNumeroDocumento());
echo $ventasCliente1 ? implode("\n", $ventasCliente1) : "No hay ventas para el cliente 1.\n";

// Ventas del cliente 2
echo "----- VENTAS CLIENTE 2 -----\n";
$ventasCliente2 = $objEmpresa->retornarVentasXCliente($objCliente2->getTipoDocumento(), $objCliente2->getNumeroDocumento());
echo $ventasCliente2 ? implode("\n", $ventasCliente2) : "No hay ventas para el cliente 2.\n";

//  Mostrar empresa
echo "----- INFORMACIÓN DE LA EMPRESA -----\n";
echo $objEmpresa;
?>
