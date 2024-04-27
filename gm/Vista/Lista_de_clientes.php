<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de clientes</title>
    <link rel="stylesheet" href="Vista/lista_clientes.css">
    <script src="https://kit.fontawesome.com/354e9272a6.js" crossorigin="anonymous"></script>
</head> 
<body>
    <!--Encabezado, barra de navegacion-->
    <header>
        <a href="Index.html"><img id="logogym"src="Imagenes/Logo.png" alt=""></a> 
       <div>
        <h1 class="h1h">Registro de clientes</h1>
    </div>             
         
    <div class="cerrar">
        <a href="Iniciar_Sesión.html" id="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar sesión</a>
    </div>
</header>
<div class="menu">
    <ul>
            <li><a href="Lista_instructor.php"><i class="fa-solid fa-dumbbell"></i> Intructores</a></li>
            <li><a href="Lista_de_clientes.php"><i class="fa-solid fa-users"></i> Clientes</a></li>
            <li><a href="Lista_membresia.php"><i class="fa-regular fa-address-card"></i> Membresias</a></li>
    </ul>
</div>
<div class="lcliente">
    <h2>Lista de clientes</h2> 
    </div>   
    <div>
        <a href="Formulario_cliente.php" class="nuevo">
            <i class="fa-solid fa-user-plus fa-beat" style="color: #000000;">  Nuevo </i>
        </a>
      </div>
      
    <table class="tabla">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>E-Mail</th>
        <th>Edad</th>
        <th>Teléfono</th>
        <th>Enfermedades</th>            
        <th colspan="2"> Opciones</th>
    </tr>
    <?php
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

    // Consulta SQL para obtener los datos de los clientes
    $sql = "SELECT id, apellido_paterno, apellido_materno, nombre, correo, edad, telefono, enfermedades FROM clientes";
    $result = $conn->query($sql);

    // Verificar si se obtuvieron resultados
    if ($result->num_rows > 0) {
        // Mostrar los datos de los clientes en la tabla
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["apellido_paterno"] . "</td>";
            echo "<td>" . $row["apellido_materno"] . "</td>";
            echo "<td>" . $row["correo"] . "</td>";
            echo "<td>" . $row["edad"] . "</td>";
            echo "<td>" . $row["telefono"] . "</td>";
            echo "<td>" . $row["enfermedades"] . "</td>";
            echo "<td><a href='editar_cliente.php?id=" . $row["id"] . "'><i class='fa-solid fa-pen-to-square fa-fade' style='color: #000000;'></i></a></td>";
            echo "<td><a href='Eliminar_cliente.php?id=" . $row["id"] . "'><i class='fa-solid fa-trash fa-fade' style='color: #000000;'></i></a></td>";            
        }
    } else {
        echo "<tr><td colspan='9'>No se encontraron clientes.</td></tr>";
    }
    $conn->close();
    ?>
    </table>
</body>
</html>
