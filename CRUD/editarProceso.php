<?php
    //print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $Nombre = $_POST['Nombre'];
    $edad = $_POST['edad'];
    $sueldo = $_POST['sueldo'];

    $sentencia = $bd->prepare("UPDATE persona SET nombre = ?, edad = ?, sueldo = ? where codigo = ?;");
    $resultado = $sentencia->execute([$Nombre, $edad, $sueldo, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>