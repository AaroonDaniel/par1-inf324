<?php

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
    $conexion = mysqli_connect("localhost:3308", "root", "", "bddaniel");
    
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $zona = isset($_POST['zona']) ? $_POST['zona'] : '';
    $x_inicial = isset($_POST['x_inicial']) ? $_POST['x_inicial'] : '';
    $y_inicial = isset($_POST['y_inicial']) ? $_POST['y_inicial'] : '';
    $x_final = isset($_POST['x_final']) ? $_POST['x_final'] : '';
    $y_final = isset($_POST['y_final']) ? $_POST['y_final'] : '';
    $superficie = isset($_POST['superficie']) ? $_POST['superficie'] : '';
    $distrito = isset($_POST['distrito']) ? $_POST['distrito'] : '';

    $consulta = "INSERT INTO `catastro` (`id`, `zona`, `x_inicial`, `y_inicial`, `x_final`, `y_final`, `superficie`, `distrito`)
    VALUES ('$id', '$zona', '$x_inicial', '$y_inicial', '$x_final', '$y_final', '$superficie', '$distrito');";

    $resultado = mysqli_query($conexion, $consulta);
    
    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conexion));
    } else {
        echo "Registro exitoso";
    }
    
    mysqli_close($conexion);
?>
