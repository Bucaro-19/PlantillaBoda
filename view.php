<?php
// Incluir el archivo de configuración
include 'config.php';

// Consultar los datos
$sql = "SELECT * FROM invitados";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Invitados</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Lista de Invitados</h1>
        <table class="table-custom">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Mensaje</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nombre']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['telefono']}</td>
                                <td>{$row['mensaje']}</td>
                                <td>{$row['fecha']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No hay datos disponibles.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="text-center">
            <a href="export_csv.php" class="btn buttono">Exportar a CSV</a>
        </div>
    </div>
</body>
</html>
