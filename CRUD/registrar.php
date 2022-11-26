<?php
    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["Nombre"]) || empty($_POST["edad"]) || empty($_POST["sueldo"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $Nombre = $_POST["Nombre"];
    $edad = $_POST["edad"];
    $sueldo = $_POST["sueldo"];
    
    $sentencia = $bd->prepare("INSERT INTO persona(Nombre,edad,sueldo) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$Nombre,$edad,$sueldo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>