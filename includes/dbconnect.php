<?php

$servername = "localhost";
$username = "retabasse_view";
$password = "1234";
$dbname = "retabasse";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falló la conexión: " . $conn->connect_error);
}

// queries

$armador_cargarMothers = "

    SELECT 
        productos.id,
        productos.nombre,
        productos.marca,
        productos.modelo,
        productos_motherboard.socket,
        productos_motherboard.chipset,
        productos_motherboard.pciex16,
        productos_motherboard.pciex1,
        productos_motherboard.sata,
        productos_motherboard.m2
    FROM
        productos
    INNER JOIN
        productos_motherboard ON productos.id = productos_motherboard.cod_producto;
";

function cargarProducto($id) {
    return "SELECT * FROM productos WHERE id = " . $id;
}

function cargarDataExtra($categoria, $id) {
    return "SELECT * FROM productos_" . $categoria . " WHERE cod_producto = " . $id;
}

function cargarListadoPorCategoria($categoria) {
    return "SELECT * FROM productos WHERE categoria = '" . $categoria . "'";
}

function cargarListadoCompleto() {
    return "SELECT * FROM productos";
}

function cargarListadoHabilitados() {
    return "SELECT * FROM productos WHERE esHabilitado = 1";
}

function cargarListadoNoHabilitados() {
    return "SELECT * FROM productos WHERE esHabilitado = 0";
}