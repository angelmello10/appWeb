<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New instructor</title>
    <link rel="stylesheet" href="Vista/formulario_cliente.css">
    <script src="https://kit.fontawesome.com/354e9272a6.js" crossorigin="anonymous"></script>
</head> 
<body>
    <!-- Encabezado, barra de navegacion -->
    <header>
        <a href="Index.html"><img id="logogym" src="Imagenes/Logo.png" alt=""></a> 
       <div>
        <h1 class="h1h">Nuevo Instructor</h1>
    </div>             
         
    <div class="cerrar">
        <a href="Iniciar_Sesión.html" id="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar sesión</a>
    </div>
</header>
<div class="menu">
    <ul>
            <li><a href="Lista_instructor.php"><i class="fa-solid fa-dumbbell"></i> Intructores</a></li>
            <li><a href="Lista_de_clientes.php"><i class="fa-solid fa-users"></i> Clientes</a></li>
            <li><a href="Lista_membresia.php"><i class="fa-solid fa-dollar-sign"></i> Membresias</a></li>
    </ul>
</div>


<h2>Ingresa los datos del nuevo instructor</h2>
<div class="formulario">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="nombre">Nombre(s):</label>
        <input type="text" id="nombre" name="nombre" required>
                        
        <label for="apellido_paterno">Apellido paterno:</label>
        <input type="text" id="apellido_paterno" name="apellidopaterno" required>

        <label for="apellido_materno">Apellido materno:</label>
        <input type="text" id="apellido_materno" name="apellidomaterno" required>

        <label for="edad">Edad:</label>
        <input type="text" id="edad" name="edad" required>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required>
                        
        <label for="Enfermedades">Enfermedades:</label>
        <input type="text" id="enfermedades" name="enfermedades" required>
        <div class="turno">
        <label for="turno">Turno:</label>
    <select id="turno" name="turno">
        <option value="mañana">Matutino</option>
        <option value="tarde">Intermedio</option>
        <option value="tarde">Vespertino</option>
    </select>
    </div>
    <style>
    .turno {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
}

select {
  width: 400px;
  padding: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
}
</style>
        <button type="submit">Enviar</button>
    </form>

    <?php
    // Procesar el formulario cuando se envía
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Configuración de la conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "Lamagiaazul1";
        $database = "gym_market";

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $database);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Recibir los datos del formulario
        $nombre = $_POST['nombre'];
        $apellido_paterno = $_POST['apellidopaterno'];
        $apellido_materno = $_POST['apellidomaterno'];
        $edad = $_POST['edad'];
        $telefono = $_POST['telefono'];
        $enfermedades = $_POST['enfermedades'];
        $turno = $_POST['turno'];
        
        // Preparar la consulta SQL para insertar los datos en la base de datos
        $sql = "INSERT INTO instructores (nombre, apellido_paterno, apellido_materno, edad, telefono, enfermedades, turno)
                VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$edad', '$telefono', '$enfermedades', '$turno')";

        // Ejecutar la consulta SQL
        if ($conn->query($sql) === TRUE) {
            // Si la consulta se ejecutó correctamente, mostrar mensaje de éxito
            echo "<div class='mensaje_exito'>Nuevo instructor registrado.</div>";
        } else {
            // Si hubo un error en la consulta, mostrar mensaje de error
            echo "<div class='mensaje_error'>Error al insertar datos, intente de nuevo. </div>";
        }

        // Cerrar la conexión
        $conn->close();
    }
    ?>
</div>
</body>
</html>
