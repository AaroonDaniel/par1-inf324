<?php
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
session_start();
$_SESSION['usuario'] = $usuario;
$conexion = mysqli_connect("localhost:3308", "root", "", "bddaniel");
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
$consulta = "SELECT * FROM persona WHERE nombre = '$usuario' AND contraseña = '$contraseña'";
$resultado = mysqli_query($conexion, $consulta);
if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}
$filas = mysqli_fetch_array($resultado);
if ($filas) {
    if ($filas['rol'] == 'admin') {
        header("Location: admin.php");
        exit(); 
    } elseif ($filas['rol'] == 'usuario') {
        header("Location: usuario.php");
        exit();
    } else {
        include("index.html");
        echo "<h1 class='bad'>Error en la autenticación</h1>";
    }
} else {
    include("index.html");
    echo "<h1 class='bad'>Error en la autenticación</h1>";
}
$_SESSION['ci'] = $filas['ci'];
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
