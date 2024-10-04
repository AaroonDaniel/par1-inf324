<?php
$con = mysqli_connect("localhost:3308", "root", "", "bddaniel");

if (!$con) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['agregar'])) {
        $zona = $_POST['zona'];
        $x_inicial = $_POST['x_inicial'];
        $y_inicial = $_POST['y_inicial'];
        $x_final = $_POST['x_final'];
        $y_final = $_POST['y_final'];
        $superficie = $_POST['superficie'];
        $distrito = $_POST['distrito'];

        $sql_insert = "INSERT INTO catastro (zona, x_inicial, y_inicial, x_final, y_final, superficie, distrito) VALUES ('$zona', '$x_inicial', '$y_inicial', '$x_final', '$y_final', '$superficie', '$distrito')";
        mysqli_query($con, $sql_insert);
    } elseif (isset($_POST['eliminar'])) {

        $id = $_POST['id'];
        $sql_delete = "DELETE FROM catastro WHERE id = '$id'";
        mysqli_query($con, $sql_delete);
    }
}

$sql = "SELECT * FROM catastro";
$resultado = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Dashboard</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ADMINISTRADOR</div>
            </a>
            <hr class="sidebar-divider my-0">
            <hr class="sidebar-divider">
            <div class="sidebar-heading">REGISTROS</div>
            <li class="nav-item">
                <a class="nav-link" href="inicio.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>INICIO</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="persona.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>PERSONA</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="catastro.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>CATASTRO</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>SALIR</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"></nav>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">TABLA CATASTRO</h1>
                    </div>
                    <?php
                        if (mysqli_num_rows($resultado) > 0) {
                            echo '<table class="table table-bordered">
                                    <tr>
                                        <th>ID</th>
                                        <th>ZONA</th>
                                        <th>X_INICIAL</th>
                                        <th>Y_INICIAL</th>
                                        <th>X_FINAL</th>
                                        <th>Y_FINAL</th>
                                        <th>SUPERFICIE</th>
                                        <th>DISTRITO</th>
                                        <th>ACCIONES</th>
                                    </tr>';

                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                echo "<tr>
                                        <td>" . $fila['id'] . "</td>
                                        <td>" . $fila['zona'] . "</td>
                                        <td>" . $fila['x_inicial'] . "</td>
                                        <td>" . $fila['y_inicial'] . "</td>
                                        <td>" . $fila['x_final'] . "</td>
                                        <td>" . $fila['y_final'] . "</td>
                                        <td>" . $fila['superficie'] . "</td>
                                        <td>" . $fila['distrito'] . "</td>
                                        <td>
                                            <a href='editarCatastro.php?id=" . $fila['id'] . "' class='btn btn-warning btn-sm'>Editar</a>
                                            <form action='eliminarCatastro.php' method='POST' style='display:inline-block;'>
                                                <input type='hidden' name='id' value='" . $fila['id'] . "'>
                                                <button type='submit' class='btn btn-danger btn-sm' name='eliminar'>Eliminar</button>
                                            </form>
                                        </td>
                                      </tr>";

                            }
                            echo "</table>";
                        } else {
                            echo "No se encontraron resultados.";
                        }
                        
                        // Formulario para añadir personas
                        //ID	ZONA	X_INICIAL	Y_INICIAL	X_FINAL	Y_FINAL	SUPERFICIE	DISTRITO
                                echo '<h2>Añadir Catastro</h2>
                                <form method="POST" class="mb-4" action="registroCatastro.php">
                                <div class="form-group">
                                    <label for="id">ID</label>
                                    <input type="text" class="form-control" name="id" required>
                                </div>
                                <div class="form-group">
                                    <label for="zona">Zona</label>
                                    <input type="text" class="form-control" name="zona" required>
                                </div>
                                <div class="form-group">
                                    <label for="x_inicial">X_Inicial</label>
                                    <input type="text" class="form-control" name="x_inicial" required>
                                </div>
                                <div class="form-group">
                                    <label for="y_inicial">Y_Inicial</label>
                                    <input type="text" class="form-control" name="y_inicial" required>
                                </div>
                                <div class="form-group">
                                    <label for="x_final">X_Final</label>
                                    <input type="text" class="form-control" name="x_final" required>
                                </div>
                                <div class="form-group">
                                    <label for="superficie">Superficie</label>
                                    <input type="text" class="form-control" name="superficie" required>
                                </div>
                                <div class="form-group">
                                    <label for="distrito">Distrito</label>
                                    <input type="text" class="form-control" name="distrito" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Agregar Catastro</button>
                                </form>';
                        mysqli_close($con);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</body>
</html>
