<?php
$conexion = mysqli_connect("localhost:3308", "root", "", "bddaniel");
$id = $_POST['id'];
mysqli_query($conexion, "DELETE FROM catastro where id = '$id'") or die("error eliminar");

mysqli_close($conexion);
header("location:persona.php");
?>
