
<?php
$con = mysqli_connect("localhost:3308", "root", "", "bddaniel");
$sql = "select * from persona";
$resultado = mysqli_query($con, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
    <body>
        <h1> hola admin</h1>
        <table class = "table"> 
            <thead>
                <tr>
                    <th scope = "col"></th>
                    <th scope = "col"></th>
                    <th scope = "col"></th>
                    <th scope = "col"></th>
                    <th scope = "col"></th>
                    <th scope = "col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        
                    </th>
                </tr>
            </tbody>

        </table>
        <?php

            if (!$con) {
                die("Error de conexión: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM persona";
            $resultado = mysqli_query($con, $sql);
            if (mysqli_num_rows($resultado) > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>CI</th>
                            <th>Nombre</th>
                            <th>Paterno</th>
                            <th>Materno</th>
                            <th>Contraseña</th>
                            
                        </tr>";
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>
                            <td>" . $fila['ci'] . "</td>
                            <td>" . $fila['nombre'] . "</td>
                            <td>" . $fila['paterno'] . "</td>
                            <td>" . $fila['materno'] . "</td>
                            <td>" . $fila['contraseña'] . "</td>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            
                        </tr>";
                }

                echo "</table>";
            } else {
                echo "No se encontraron resultados.";
            }
            mysqli_close($con);
            ?>

    </body>
</html>