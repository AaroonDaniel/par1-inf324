<?php
$conexion = mysqli_connect("localhost:3308", "root", "", "bddaniel");
if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}
$queryDistritos = "SELECT DISTINCT distrito FROM CATASTRO";
$resultadoDistritos = mysqli_query($conexion, $queryDistritos);
if (!$resultadoDistritos) {
    die("Error en la consulta de distritos: " . mysqli_error($conexion));
}
while ($fila = mysqli_fetch_assoc($resultadoDistritos)) {
    $distrito = htmlspecialchars($fila['distrito']);
    echo "<option value='$distrito'>$distrito</option>";
}
mysqli_close($conexion);
?>
