<?php
include_once "db_ecommerce.php";
$con = mysqli_connect($host, $user, $pass, $db);

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $producto_id = $_GET['id'];

    // Eliminar imágenes asociadas al producto en la tabla 'productos_files' y 'files'
    $queryEliminarImagenes = "DELETE FROM productos_files WHERE producto_id = $producto_id";
    mysqli_query($con, $queryEliminarImagenes);

    // Obtener rutas de imágenes desde la tabla 'files'
    $queryObtenerRutas = "SELECT system_path FROM files WHERE id IN (SELECT file_id FROM productos_files WHERE producto_id = $producto_id)";
    $resRutas = mysqli_query($con, $queryObtenerRutas);

    while ($rowRuta = mysqli_fetch_assoc($resRutas)) {
        // Eliminar archivos físicos
        unlink($rowRuta['system_path']);
    }

    // Eliminar registros de la tabla 'files'
    $queryEliminarFiles = "DELETE FROM files WHERE id IN (SELECT file_id FROM productos_files WHERE producto_id = $producto_id)";
    mysqli_query($con, $queryEliminarFiles);

    // Eliminar el producto de la tabla 'productos'
    $queryEliminarProducto = "DELETE FROM productos WHERE id = $producto_id";
    mysqli_query($con, $queryEliminarProducto);

    header('Location: panel.php?modulo=productos');
} else {
    echo "Error: ID de producto no válido.";
}
?>
