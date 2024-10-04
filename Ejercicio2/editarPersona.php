
<?php
$con = mysqli_connect("localhost:3308", "root", "", "bddaniel");

if (!$con) {
    die("Error de conexión: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $ci = $_GET['id'];

    $sql = "SELECT * FROM persona WHERE ci = '$ci'";
    $resultado = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($resultado) > 0) {
        $persona = mysqli_fetch_assoc($resultado);
    } else {
        die("No se encontró la persona.");
    }
} else {
    die("No se ha proporcionado un ID.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $contraseña = $_POST['contraseña'];

    $sql_update = "UPDATE persona SET nombre='$nombre', paterno='$paterno', materno='$materno', contraseña='$contraseña' WHERE ci='$ci'";
    
    if (mysqli_query($con, $sql_update)) {
        header("Location: persona.php"); 
        exit();
    } else {
        echo "Error al actualizar los datos: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Editar Persona</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Persona</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="ci">CI</label>
                <input type="text" class="form-control" name="ci" value="<?php echo $persona['ci']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $persona['nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="paterno">Paterno</label>
                <input type="text" class="form-control" name="paterno" value="<?php echo $persona['paterno']; ?>" required>
            </div>
            <div class="form-group">
                <label for="materno">Materno</label>
                <input type="text" class="form-control" name="materno" value="<?php echo $persona['materno']; ?>" required>
            </div>
            <div class="form-group">
                <label for="contraseña">Contraseña</label>
                <input type="text" class="form-control" name="contraseña" value="<?php echo $persona['contraseña']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="persona.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
