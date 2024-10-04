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
                        <h1 class="h3 mb-0 text-gray-800">TABLA PERSONA</h1>   
                    </div>
                    <main class="content">
                        <h1>Datos</h1>
                        <div id="data-display">
                            <?php
                                $con = mysqli_connect("localhost:3308", "root", "", "bddaniel");

                                if (!$con) {
                                    die("Error de conexión: " . mysqli_connect_error());
                                }

                                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                    $ci = $_POST['ci'];
                                    $nombre = $_POST['nombre'];
                                    $paterno = $_POST['paterno'];
                                    $materno = $_POST['materno'];
                                    $contraseña = $_POST['contraseña'];

                                    $sql_insert = "INSERT INTO persona (ci, nombre, paterno, materno, contraseña) VALUES ('$ci', '$nombre', '$paterno', '$materno', '$contraseña')";
                                    mysqli_query($con, $sql_insert);
                                }

                                $sql = "SELECT * FROM persona";
                                $resultado = mysqli_query($con, $sql);

                                if (mysqli_num_rows($resultado) > 0) {
                                    echo '<table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>CI</th>
                                                    <th>Nombre</th>
                                                    <th>Paterno</th>
                                                    <th>Materno</th>
                                                    <th>Contraseña</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                    while ($fila = mysqli_fetch_assoc($resultado)) {
                                        echo "<tr>
                                                <td>" . $fila['ci'] . "</td>
                                                <td>" . $fila['nombre'] . "</td>
                                                <td>" . $fila['paterno'] . "</td>
                                                <td>" . $fila['materno'] . "</td>
                                                <td>" . $fila['contraseña'] . "</td>
                                                <td>
                                                    
                                                    
                                                    <a href='editarPersona.php?id=" . $fila['ci'] . "' class='btn btn-warning btn-sm'>Editar</a>

                                                    <form action='eliminarPersona.php' method='POST' style='display:inline-block;'>
                                                        <input type='hidden' name='ci' value='" . $fila['ci'] . "'>
                                                        <button type='submit' class='btn btn-danger btn-sm'>Eliminar</button>
                                                    </form>
                                                </td>
                                            </tr>";
                                    }
                                    echo '</tbody>
                                        </table>';
                                } else {
                                    echo '<div class="alert alert-warning" role="alert">No se encontraron resultados.</div>';
                                }
                                echo '<h2>Añadir Persona</h2>
                                      <form method="POST" class="mb-4" action="">
                                        <div class="form-group">
                                            <label for="ci">CI</label>
                                            <input type="text" class="form-control" name="ci" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="paterno">Paterno</label>
                                            <input type="text" class="form-control" name="paterno" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="materno">Materno</label>
                                            <input type="text" class="form-control" name="materno" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="contraseña">Contraseña</label>
                                            <input type="text" class="form-control" name="contraseña" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Agregar Persona</button>
                                      </form>';

                                mysqli_close($con);
                            ?>
                        </div>
                    </main>
                </div>     
            </div>       
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</body>
</html>
