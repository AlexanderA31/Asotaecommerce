<?php
include_once "db_ecommerce.php";

// Verificar si se ha enviado un ID de proveedor para eliminar
if (isset($_GET['id_proveedor'])) {
    // Obtener el ID del proveedor desde la URL
    $id_proveedor = $_GET['id_proveedor'];

    // Conectar a la base de datos
    $con = mysqli_connect($host, $user, $pass, $db);

    // Verificar la conexión a la base de datos
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Eliminar el proveedor de la base de datos
    $queryEliminar = "DELETE FROM proveedores WHERE id_proveedor = $id_proveedor";
    if (mysqli_query($con, $queryEliminar)) {
        // Redirigir a la página principal
        header("Location: panel.php?modulo=proveedores");
        exit();
    } else {
        echo "Error al eliminar el proveedor: " . mysqli_error($con);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($con);
} else {
    echo "ID de proveedor no proporcionado.";
}
?>
