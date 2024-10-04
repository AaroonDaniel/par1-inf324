<?php

$conex = mysqli_connect("localhost:3308", "root", "", "bddaniel");

if (!$conex) {
    die("Error de conexión: " . mysqli_connect_error());
}

$consulta = "
    SELECT 
        SUM(CASE WHEN c.id LIKE '1%' THEN 1 ELSE 0 END) AS cantidad_1,
        SUM(CASE WHEN c.id LIKE '2%' THEN 1 ELSE 0 END) AS cantidad_2,
        SUM(CASE WHEN c.id LIKE '3%' THEN 1 ELSE 0 END) AS cantidad_3,
        p.nombre AS propietario
    FROM CATASTRO c
    JOIN CAT_PER pc ON c.id = pc.id
    JOIN PERSONA p ON pc.ci = p.ci
    WHERE c.id LIKE '1%' OR c.id LIKE '2%' OR c.id LIKE '3%'
    GROUP BY p.nombre
";

$result = mysqli_query($conex, $consulta);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($conex));
}
?>

<div class="table-responsive">
    <table class="table table-bordered table-hover mt-3">
        <thead class="table-dark">
            <tr>
                <th>Propietario</th>
                <th> ID = 1</th>
                <th> ID = 2</th>
                <th> ID = 3</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['propietario']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['cantidad_1']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['cantidad_2']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['cantidad_3']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4' class='text-center'>No se encontraron resultados.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
mysqli_close($conex);
?>
