<?php
// Verifica si se proporciona un ID de cliente en la URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Obtén el ID del cliente
    $id_mem = $_GET['id'];

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
    $sql = "SELECT * FROM membresias WHERE id_mem = $id_mem";
    $result = $conn->query($sql);

    // Verificar si se obtuvieron resultados
    if ($result->num_rows == 1) {
        // Obtener los datos del cliente
        $row = $result->fetch_assoc();
        $id_mem = $row["id_mem"];
        $nivel = $row["nivel"];
        $tipo = $row["tipo"];
        $fecha_inicio = $row["fecha_inicio"];
        $fecha_fin = $row["fecha_fin"];
        $id_cliente = $row["id_cliente"];
    } else {
        // Si no se encuentra el cliente, redirecciona a la página principal o muestra un mensaje de error
        header("Location: Lista_membresia.php");
        exit();
    }

    // Cierra la conexión a la base de datos
    $conn->close();
} else {
    // Si no se proporciona un ID de cliente, redirecciona a la página principal o muestra un mensaje de error
    header("Location: Lista_membresia.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Membresía</title>
    <link rel="stylesheet" href="Vista/editar_cliente.css">
    <script src="https://kit.fontawesome.com/354e9272a6.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <a href="Index.html"><img id="logogym"src="Imagenes/Logo.png" alt=""></a> 
        <div>
            <h1 class="h1h">Editar datos de Membresía</h1>
        </div>             
         
        <div class="cerrar">
            <a href="Iniciar_Sesión.html" id="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar sesión</a>
        </div>
    </header>

    <div class="formulario">
        <h2>Editar:</h2>
        <form action="procesar_edicion_mem.php" method="POST">
            <input type="hidden" name="id_mem" value="<?php echo $id_mem; ?>">
           <div class="opciones">
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
           <style>
.seleccion {
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 5px;
}

select {
  width: 460px;
  padding: 8px;
  border-radius: 5px;
  border: 1px solid #ccc;
}
</style>
            <label for="fecha_inicio">Fecha inicio: (dd/mm/aa)</label>
            <input type="text" id="fecha_inicio" name="fecha_inicio" value="<?php echo $fecha_inicio ?>"><br><br>
            <label for="fecha_fin">Fecha fin: (dd/mm/dd):</label>
            <input type="text" id="fecha_fin" name="fecha_fin" value="<?php echo $fecha_fin; ?>"><br><br>
            
            <label for="id_cliente">Id Cliente:</label>
            <input type="text" id="id_cliente" name="id_cliente" value="<?php echo $id_cliente; ?>"><br><br>
            <input type="submit" value="Guardar Cambios">
        </form>
 
    </div>
</body>
</html>
