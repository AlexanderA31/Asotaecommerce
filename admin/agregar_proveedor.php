<?php
// Incluir el archivo de conexión a la base de datos
include_once "db_ecommerce.php";
$con = mysqli_connect($host, $user, $pass, $db);

// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $nombre = mysqli_real_escape_string($con, $_POST["nombre"]);
    $telefono = mysqli_real_escape_string($con, $_POST["telefono"]);
    $categoria_producto = mysqli_real_escape_string($con, $_POST["categoria_producto"]);

    // Query para insertar el nuevo proveedor
    $query = "INSERT INTO proveedores (nombre_proveedor, telefono, categoria_producto) 
              VALUES ('$nombre', '$telefono', '$categoria_producto')";

    // Ejecutar la consulta
    if (mysqli_query($con, $query)) {
        // Redireccionar o mostrar un mensaje de éxito
        header("Location: panel.php?modulo=proveedores");
        exit();
    } else {
        // Manejar errores si es necesario
        echo "Error al agregar proveedor: " . mysqli_error($con);
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($con);
?>
