<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propiedades y Zonas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php 
        $conex = mysqli_connect("localhost:3308","root","","bddaniel"); 
        $distrito = $_GET['distrito'];
        $zona = $_GET['zona'];

        $consulta = "SELECT * 
                     FROM CATASTRO 
                     WHERE zona = '$zona' AND distrito = '$distrito'";
        $result = mysqli_query($conex, $consulta);

        if (!$result) {
            die("Error en la consulta de catastros: " . mysqli_error($conex));
        }
    ?>

    <div class="container mt-5">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white text-center">
                <h3>Catastros del distrito <?php echo htmlspecialchars($distrito); ?> y la zona <?php echo htmlspecialchars($zona); ?></h3>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>ZONA</th>
                        <th>X_INICIAL</th>
                        <th>Y_INICIAL</th>
                        <th>X_FINAL</th>
                        <th>Y_FINAL</th>
                        <th>SUPERFICIE</th>
                        <th>DISTRITO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr class="text-center">
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['zona']); ?></td>
                                <td><?php echo htmlspecialchars($row['x_inicial']); ?></td>
                                <td><?php echo htmlspecialchars($row['y_inicial']); ?></td>
                                <td><?php echo htmlspecialchars($row['x_final']); ?></td>
                                <td><?php echo htmlspecialchars($row['y_final']); ?></td>
                                <td><?php echo htmlspecialchars($row['superficie']); ?></td>
                                <td><?php echo htmlspecialchars($row['distrito']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">No se encontraron catastros para los criterios seleccionados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between mb-3">
            <a class="btn btn-secondary btn-lg" href="index.php">
                <i class="fas fa-sign-out-alt"></i> Salir
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
