<?php
// Verificar si se reciben datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se proporciona un ID de cliente
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Obtener el ID del cliente
        $cliente_id = $_POST['id'];

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
        $nombre = $_POST['nombre'];
        $apellido_paterno = $_POST['apellido_paterno'];
        $apellido_materno = $_POST['apellido_materno'];
        $correo = $_POST['correo'];
        $edad = $_POST['edad'];
        $telefono = $_POST['telefono'];
        $enfermedades = $_POST['enfermedades'];

        // Consulta SQL para actualizar los datos del cliente
        $sql = "UPDATE clientes SET nombre='$nombre', apellido_paterno='$apellido_paterno', apellido_materno='$apellido_materno', correo='$correo', edad='$edad', telefono='$telefono', enfermedades='$enfermedades' WHERE id=$cliente_id";

        if ($conn->query($sql) === TRUE) {
            // Redireccionar a la página de lista de clientes después de la actualización exitosa
            header("Location: Lista_de_clientes.php");
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
    header("Location: Lista_de_clientes.php");
    exit();
}
?>
