<?php
// Incluir el archivo de configuración
include 'config.php';

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $telefono = $_POST['phone'];
    $mensaje = $_POST['message'];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO invitados (nombre, email, telefono, mensaje) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $email, $telefono, $mensaje);

    if ($stmt->execute()) {
        echo "Datos guardados correctamente. <a href='index.html'>Volver</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>
