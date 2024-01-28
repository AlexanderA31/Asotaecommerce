<?php
include_once "db_ecommerce.php";
$con = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if (isset($_GET['id']) && isset($_GET['producto_id'])) {
    $file_id = mysqli_real_escape_string($con, $_GET['id']);
    $producto_id = mysqli_real_escape_string($con, $_GET['producto_id']);

    // Eliminar la relación en productos_files
    $queryEliminarRelacion = "DELETE FROM productos_files WHERE producto_id = $producto_id AND file_id = $file_id";
    mysqli_query($con, $queryEliminarRelacion);

    // Obtener la información de la imagen
    $queryObtenerImagen = "SELECT web_path, system_path FROM files WHERE id = $file_id";
    $resObtenerImagen = mysqli_query($con, $queryObtenerImagen);
    $rowImagen = mysqli_fetch_assoc($resObtenerImagen);

    // Eliminar la imagen del sistema de archivos
    if ($rowImagen) {
        unlink($rowImagen['system_path']);
    }

    // Eliminar la entrada en la tabla files
    $queryEliminarImagen = "DELETE FROM files WHERE id = $file_id";
    mysqli_query($con, $queryEliminarImagen);

    // Redirigir de nuevo a la página de edición
    header("Location: panel.php?modulo=editarp&id=$producto_id");
} else {
    echo "Error: No se proporcionó el ID de la imagen o el ID del producto.";
}
?>
