<?php
// Incluir el archivo de configuración
include 'config.php';

// Configurar encabezados para la descarga del CSV
header("Content-Type: text/csv; charset=UTF-8");
header("Content-Disposition: attachment; filename=invitados.csv");
header("Pragma: no-cache");
header("Expires: 0");

// Agregar el BOM para que Excel reconozca UTF-8
echo "\xEF\xBB\xBF";

// Abrir la salida como archivo
$output = fopen('php://output', 'w');

// Escribir encabezados de columnas
fputcsv($output, ['ID', 'Nombre', 'Email', 'Teléfono', 'Mensaje', 'Fecha']);

// Consultar los datos
$sql = "SELECT * FROM invitados";
$result = $conn->query($sql);

// Escribir datos en el archivo CSV
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, [$row['id'], $row['nombre'], $row['email'], $row['telefono'], $row['mensaje'], $row['fecha']]);
    }
}

// Cerrar el flujo de salida
fclose($output);

// Cerrar la conexión a la base de datos
$conn->close();
?>


