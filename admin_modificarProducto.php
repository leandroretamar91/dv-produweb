<?php

require_once 'includes/dbconnect.php';
require_once 'modelos/infoAdicional.php';

if (isset($_POST['prodID'])) {
    $result = $conn->query("UPDATE productos SET
    nombre='".$_POST['nombre']."',
    marca='".$_POST['marca']."',
    modelo='".$_POST['modelo']."',
    precio='".$_POST['precio']."',
    stock='".$_POST['stock']."'
    WHERE id=" . $_POST['prodID']) . ";";

    if ($result) {
        echo 'Información base Actualizada. </br>';
    }
    
    $result = $conn->query(modificarDBAdicional($_POST));

    if ($result) {
        echo 'Información adicional Actualizada. </br>';
    }

    if ($result) {
        $result = $conn->query("UPDATE productos SET esHabilitado=1 WHERE id=".$_POST['prodID'].";");
        echo 'Producto habilitado. </br>';
        echo 'Finalizado! Volviendo... </br>';

        header("Location: admin.php");

    }    
}