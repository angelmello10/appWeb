<?php
// Verifica si se proporciona un ID de cliente en la URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Obtén el ID del cliente
    $cliente_id = $_GET['id'];

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

    // Consulta SQL para obtener los datos del cliente
    $sql = "SELECT * FROM clientes WHERE id = $cliente_id";
    $result = $conn->query($sql);

    // Verificar si se obtuvieron resultados
    if ($result->num_rows == 1) {
        // Obtener los datos del cliente
        $row = $result->fetch_assoc();
        $nombre = $row["nombre"];
        $apellido_paterno = $row["apellido_paterno"];
        $apellido_materno = $row["apellido_materno"];
        $correo = $row["correo"];
        $edad = $row["edad"];
        $telefono = $row["telefono"];
        $enfermedades = $row["enfermedades"];
    } else {
        // Si no se encuentra el cliente, redirecciona a la página principal o muestra un mensaje de error
        header("Location: Lista_de_clientes.php");
        exit();
    }

    // Cierra la conexión a la base de datos
    $conn->close();
} else {
    // Si no se proporciona un ID de cliente, redirecciona a la página principal o muestra un mensaje de error
    header("Location: Lista_de_clientes.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="Vista/editar_cliente.css">
    <script src="https://kit.fontawesome.com/354e9272a6.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <a href="Index.html"><img id="logogym"src="Imagenes/Logo.png" alt=""></a> 
        <div>
            <h1 class="h1h">Editar Cliente</h1>
        </div>             
         
        <div class="cerrar">
            <a href="Iniciar_Sesión.html" id="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar sesión</a>
        </div>
    </header>

    <div class="formulario">
        <h2>Editar Cliente</h2>
        <form action="procesar_edicion.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $cliente_id; ?>">
            <label for="nombre">Nombre(s):</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>"><br><br>
            <label for="apellido_paterno">Apellido Paterno:</label>
            <input type="text" id="apellido_paterno" name="apellido_paterno" value="<?php echo $apellido_paterno; ?>"><br><br>
            <label for="apellido_materno">Apellido Materno:</label>
            <input type="text" id="apellido_materno" name="apellido_materno" value="<?php echo $apellido_materno; ?>"><br><br>
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" value="<?php echo $correo; ?>"><br><br>
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" value="<?php echo $edad; ?>"><br><br>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo $telefono; ?>"><br><br>
            <label for="enfermedades">Enfermedades:</label>
            <textarea id="enfermedades" name="enfermedades"><?php echo $enfermedades; ?></textarea><br><br>
            <input type="submit" value="Guardar Cambios">
        </form>
    </div>
</body>
</html>
