<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Membership</title>
    <link rel="stylesheet" href="Vista/formulario_cliente.css">
    <script src="https://kit.fontawesome.com/354e9272a6.js" crossorigin="anonymous"></script>
</head> 
<body>
    <!-- Encabezado, barra de navegacion -->
    <header>
        <a href="Index.html"><img id="logogym" src="Imagenes/Logo.png" alt=""></a> 
       <div>
        <h1 class="h1h">Agregar membresía</h1>
    </div>             
         
    <div class="cerrar">
        <a href="Iniciar_Sesión.html" id="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar sesión</a>
    </div>
</header>
<div class="menu">
    <ul>
            <li><a href="Lista_instructor.php"><i class="fa-solid fa-dumbbell"></i> Intructores</a></li>
            <li><a href="Lista_de_clientes.php"><i class="fa-solid fa-users"></i> Clientes</a></li>
            <li><a href="Lista_membresia.php"><i class="fa-solid fa-dollar-sign"></i> Membresías</a></li>
    </ul>
</div>


<h2>Registrar nueva membresía</h2>
<div class="formulario">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <style>
.seleccion {
  margin-bottom: 10px;
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
        <div class="seleccion">              
        <label for="nivel">Nivel:</label>
    <select id="nivel" name="nivel">
        <option value="Básico">Básico</option>
        <option value="Premium">Premium</option>
        <option value="Estudiante">Estudiante</option>
        <option value="Pro-Fit">Pro-Fit</option>
    </select>
    
    <label for="tipo" name="tipo">Tipo:</label>
    <select id="tipo" name="tipo">
        <option value="Mensual">Mensual</option>
        <option value="Trimestral">Trimestral</option>
        <option value="Semestral">Semestral</option>
        <option value="Anual">Anual</option>
    </select>
    </div>
        <label for="fecha_inicio">Fecha de inicio: DD/MM/AA</label>
        <input type="text" id="fecha_inicio" name="fecha_inicio" required>

        <label for="fecha_fin">Fecha Vencimiento: DD/MM/AA</label>
        <input type="text" id="fecha_fin" name="fecha_fin" required>

        <label for="id_cliente">Id de cliente:</label>
        <input type="text" id="id_cliente" name="id_cliente" required>

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
        $nivel =$_POST['nivel'];
        $tipo =$_POST['tipo'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];
        $id_cliente = $_POST['id_cliente'];  
        
        // Preparar la consulta SQL para insertar los datos en la base de datos
        $sql = "INSERT INTO membresias (nivel, tipo, fecha_inicio, fecha_fin, id_cliente)
                VALUES ('$nivel', '$tipo', '$fecha_inicio', '$fecha_fin', '$id_cliente')";

        // Ejecutar la consulta SQL
        if ($conn->query($sql) === TRUE) {
            // Si la consulta se ejecutó correctamente, mostrar mensaje de éxito
            echo "<div class='mensaje_exito'>Membresía registrada.</div>";
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
