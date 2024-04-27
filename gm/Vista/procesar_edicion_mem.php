<?php
// Verificar si se reciben datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se proporciona un ID de cliente
    if (isset($_POST['id_mem']) && !empty($_POST['id_mem'])) {
        // Obtener el ID del cliente
        $id_mem = $_POST['id_mem'];

        // Conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "Lamagiaazul1";
        $database = "gym_market";

        $conn = new mysqli($servername, $username, $password, $database);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Obtener los datos del formulario
        $nivel = $_POST['nivel'];
        $tipo = $_POST['tipo'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];
        $id_cliente = $_POST['id_cliente'];
    
        // Consulta SQL para actualizar los datos del cliente
        $sql = "UPDATE membresias SET nivel='$nivel', tipo='$tipo', fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin', id_cliente='$id_cliente' WHERE id_mem=$id_mem";

        if ($conn->query($sql) === TRUE) {
            // Redireccionar a la página de lista de clientes después de la actualización exitosa
            header("Location: Lista_membresia.php");
            exit();
        } else {
            echo "Error al actualizar el cliente: " . $conn->error;
        }

        // Cierra la conexión a la base de datos
        $conn->close();
    } else {
        // Si no se proporciona un ID de cliente, muestra un mensaje de error
        echo "ID de cliente no proporcionado.";
    }
} else {
    // Si no se recibe una solicitud POST, redirecciona a la página principal
    header("Location: Lista_membresia.php");
    exit();
}
?>
