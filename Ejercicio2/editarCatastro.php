
<?php

$con = mysqli_connect("localhost:3308", "root", "", "bddaniel");

if (!$con) {
    die("Error de conexión: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM catastro WHERE id = '$id'";
    $resultado = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($resultado) > 0) {
        $catastro = mysqli_fetch_assoc($resultado);
    } else {
        die("No se encontró la persona.");
    }
} else {
    die("No se ha proporcionado un ID.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $zona = $_POST['zona'];
    $x_inicial = $_POST['x_inicial'];
    $y_inicial = $_POST['y_inicial'];
    $x_final = $_POST['x_final'];
    $y_final = $_POST['y_final'];
    $superficie = $_POST['superficie'];
    $distrito = $_POST['distrito'];

    $sql_update = "UPDATE catastro SET id='$id', zona='$zona', x_inicial='$x_inicial', y_inicial='$y_inicial', x_final='$x_final', y_final='$y_final', superficie='$superficie', distrito='$distrito' WHERE id='$id'";
    
    if (mysqli_query($con, $sql_update)) {
        header("Location: catastro.php");
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
        <h2>Editar Catastro</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="id">Id</label>
                <input type="text" class="form-control" name="id" value="<?php echo $catastro['id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="zona">Zona<</label>
                <input type="text" class="form-control" name="zona" value="<?php echo $catastro['zona']; ?>" required>
            </div>
            <div class="form-group">
                <label for="x_inicial">X_Inicial</label>
                <input type="text" class="form-control" name="x_inicial" value="<?php echo $catastro['x_inicial']; ?>" required>
            </div>
            <div class="form-group">
                <label for="y_inicial">Y_Inicial</label>
                <input type="text" class="form-control" name="y_inicial" value="<?php echo $catastro['y_inicial']; ?>" required>
            </div>
            <div class="form-group">
                <label for="x_final">X_Final</label>
                <input type="text" class="form-control" name="x_final" value="<?php echo $catastro['x_final']; ?>" required>
            </div>
            <div class="form-group">
                <label for="y_final">Y_Final</label>
                <input type="text" class="form-control" name="y_final" value="<?php echo $catastro['y_final']; ?>" required>
            </div>
            <div class="form-group">
                <label for="superficie">Superficie</label>
                <input type="text" class="form-control" name="superficie" value="<?php echo $catastro['superficie']; ?>" required>
            </div>
            <div class="form-group">
                <label for="distrito">Distrito</label>
                <input type="text" class="form-control" name="distrito" value="<?php echo $catastro['distrito']; ?>" required>
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
