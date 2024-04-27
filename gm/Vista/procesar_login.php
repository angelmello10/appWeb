<?php
// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    // Conexión a la base de datos
    $servidor = "localhost"; // Nombre del servidor MySQL (normalmente 'localhost')
    $username = "root"; // Nombre de usuario de la base de datos
    $password_base = "Lamagiaazul1"; // Contraseña de la base de datos
    $database = "gym_market"; // Nombre de la base de datos

    // Crear conexión
    $conn = new mysqli($servidor, $username, $password_base, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta SQL para verificar las credenciales del usuario de manera segura
    $consulta = "SELECT * FROM usuarios WHERE email=? AND contraseña=? ";
    $statement = $conn->prepare($consulta);
    $statement->bind_param("ss", $email, $contraseña);
    $statement->execute();
    $result = $statement->get_result();

    if ($result->num_rows == 1) {
        // Inicio de sesión exitoso
        // Redirigir al usuario a la página de inicio de sesión exitoso
        header ("Location: Perfil_empleado.html");
        exit(); // Asegura que el script PHP se detenga después de la redirección
    } else {
        // Credenciales incorrectas
        echo "Correo electrónico o contraseña incorrectos.";
    }

    // Cerrar la conexión
    $conn->close();
}
?>
