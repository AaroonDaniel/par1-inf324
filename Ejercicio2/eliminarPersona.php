<?php
$conexion = mysqli_connect("localhost:3308", "root", "", "bddaniel");
$ci = $_POST['ci'];
mysqli_query($conexion, "DELETE FROM persona where ci = '$ci'") or die("error eliminar");

mysqli_close($conexion);
header("location:persona.php");
?>
