<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Membresía</title>
    <link rel="stylesheet" href="Vista/lista_membresia.css">
    <script src="https://kit.fontawesome.com/354e9272a6.js" crossorigin="anonymous"></script>
</head> 
<body>
    <!--Encabezado, barra de navegacion-->
    <header>
        <a href="Index.html"><img id="logogym"src="Imagenes/Logo.png" alt=""></a> 
       <div>
        <h1 class="h1h">Registro de Membresías</h1>
    </div>             
         
    <div class="cerrar">
        <a href="Iniciar_Sesión.html" id="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar sesión</a>
    </div>
</header>
<div class="menu">
    <ul>
            <li><a href="Lista_instructor.php"><i class="fa-solid fa-dumbbell"></i> Intructores</a></li>
            <li><a href="Lista_de_clientes.php"><i class="fa-solid fa-users"></i> Clientes</a></li>
            <li><a href="Lista_membresia.php"><i class="fa-regular fa-address-card"></i> Membresías</a></li>
    </ul>
</div>
<div class="lcliente">
    <h2>Lista de Membresías</h2> 
    </div>   
    <div>
        <a href="Formulario_membresia.php" class="nuevo">
            <i class="fa-solid fa-user-plus fa-beat" style="color: #000000;">  Nuevo </i>
        </a>
      </div>
      
    <table class="tabla">
    <tr>
        <th>ID</th>
        <th>Nivel</th>
        <th>Tipo</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>ID_cliente</th>             
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
    $sql = "SELECT id_mem, nivel, tipo, fecha_inicio, fecha_fin ,id_cliente FROM membresias";
    $result = $conn->query($sql);

    // Verificar si se obtuvieron resultados
    if ($result->num_rows > 0) {
        // Mostrar los datos de los clientes en la tabla
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id_mem"] . "</td>";
            echo "<td>" . $row["nivel"] . "</td>";
            echo "<td>" . $row["tipo"] . "</td>";
            echo "<td>" . $row["fecha_inicio"] . "</td>";
            echo "<td>" . $row["fecha_fin"] . "</td>";
            echo "<td>" . $row["id_cliente"] . "</td>";
            echo "<td><a href='edit_mem.php?id=" . $row["id_mem"] . "'><i class='fa-solid fa-pen-to-square fa-fade' style='color: #000000;'></i></a></td>";
            echo "<td><a href='Eliminar_membresia.php?id=" . $row["id_mem"] . "'><i class='fa-solid fa-trash fa-fade' style='color: #000000;'></i></a></td>";            
        }
    } else {        
        echo "<tr><td colspan='9'>No se encontraron registros.</td></tr>";
    }
    $conn->close();
    ?>
    </table>
</body>
</html>
