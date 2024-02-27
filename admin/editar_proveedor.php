<?php
include_once "db_ecommerce.php";
$con = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $proveedorId = $_POST["proveedor_id"];
    $nombre = mysqli_real_escape_string($con, $_POST["nombre"]);
    $telefono = mysqli_real_escape_string($con, $_POST["telefono"]);
    $categoria = mysqli_real_escape_string($con, $_POST["categoria"]);

    // Procesar la actualización en la base de datos
    $updateQuery = "UPDATE proveedores SET nombre_proveedor = '$nombre', telefono = '$telefono', categoria_producto = '$categoria' WHERE id_proveedor = $proveedorId";
    $result = mysqli_query($con, $updateQuery);


    header('Location: panel.php?modulo=proveedores');
} else {
    echo "Error: ID de producto no válido.";
}
?>
