<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
    $conexion = mysqli_connect("localhost:3308", "root", "", "bddaniel");
    
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    
    $ci = isset($_POST['ci']) ? $_POST['ci'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $paterno = isset($_POST['paterno']) ? $_POST['paterno'] : '';
    $materno = isset($_POST['materno']) ? $_POST['materno'] : '';
    $contraseña = isset($_POST['contraseña']) ? $_POST['contraseña'] : '';
    
    if (empty($ci) || empty($nombre) || empty($paterno) || empty($materno) || empty($contraseña)) {
        die("Error: Todos los campos son obligatorios.");
    }

    $consulta = "INSERT INTO `persona` (`ci`, `nombre`, `paterno`, `materno`, `contraseña`, `rol`)
                 VALUES ('$ci', '$nombre', '$paterno', '$materno', '$contraseña', 'usuario');";
    
    $resultado = mysqli_query($conexion, $consulta);
    
    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conexion));
    } else {
        echo "Registro exitoso";
    }
    
    mysqli_close($conexion);
?>
