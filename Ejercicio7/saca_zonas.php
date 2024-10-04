<?php
$conexion = mysqli_connect("localhost:3308", "root", "", "bddaniel");
if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}
$xdistrito = $_GET['distrito'];
$queryZonas = "SELECT DISTINCT zona FROM CATASTRO WHERE distrito = ?";
$stmt = mysqli_prepare($conexion, $queryZonas);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, 's', $xdistrito);
    mysqli_stmt_execute($stmt);
    $resultadoZonas = mysqli_stmt_get_result($stmt);
    while ($fila = mysqli_fetch_assoc($resultadoZonas)) {
        $zona = htmlspecialchars($fila['zona']);
        echo "<option value='$zona'>$zona</option>";
    }
    mysqli_stmt_close($stmt);
} else {
    die("Error en la preparación de la consulta: " . mysqli_error($conexion));
}
mysqli_close($conexion);
?>
