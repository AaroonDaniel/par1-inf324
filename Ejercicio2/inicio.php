<?php
$con = mysqli_connect("localhost:3308", "root", "", "bddaniel");
$sql = "
    SELECT 
    SUM(CASE WHEN c.id LIKE '1%' THEN 1 ELSE 0 END) AS cantidad_1,
    SUM(CASE WHEN c.id LIKE '2%' THEN 1 ELSE 0 END) AS cantidad_2,
    SUM(CASE WHEN c.id LIKE '3%' THEN 1 ELSE 0 END) AS cantidad_3,
    p.nombre AS propietario
FROM CATASTRO c
JOIN CAT_PER pc ON c.id = pc.id
JOIN PERSONA p ON pc.ci = p.ci
WHERE c.id LIKE '1%' OR c.id LIKE '2%' OR c.id LIKE '3%'
GROUP BY p.nombre;

";
$resultado = mysqli_query($con, $sql);
if ($resultado) {
    $fila = mysqli_fetch_assoc($resultado); 
} else {
    die("Error en la consulta: " . mysqli_error($con));
}
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Dashboard</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <h1>Contenido</h1>  
                <h3>Verificacion del numero de catastros que hay en la BD</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID = 1</th>
                            <th>ID = 2</th>
                            <th>ID = 3</th>
                            <th>Propietario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $fila['cantidad_1']; ?></td>
                            <td><?php echo $fila['cantidad_2']; ?></td>
                            <td><?php echo $fila['cantidad_3']; ?></td>
                            <td><?php echo $fila['propietario']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>       
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</body>
</html>
