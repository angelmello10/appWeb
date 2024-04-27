<?php
// Verificar si se ha recibido un ID válido para el cliente a eliminar
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID de cliente no válido.";
    exit();
}

// Obtener el ID del cliente a eliminar
$id_cliente = $_GET['id'];

// Realizar la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "Lamagiaazul1";
$database = "gym_market";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Preparar la consulta SQL para eliminar el cliente
$sql = "DELETE FROM clientes WHERE id = $id_cliente";

// Ejecutar la consulta SQL
if ($conn->query($sql) === TRUE) {
    // Si la eliminación se realizó correctamente, redirigir a la página de lista de clientes
    header("Location: Lista_de_clientes.php");
    exit();
}

// Cerrar la conexión
$conn->close();
?>
