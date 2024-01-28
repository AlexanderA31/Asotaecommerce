<?php
include_once "db_ecommerce.php";
$con = mysqli_connect($host, $user, $pass, $db);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productoId'])) {
    $productoId = mysqli_real_escape_string($con, $_POST['productoId']);

    // Realiza la lógica para activar/desactivar el producto en la base de datos
    $query = "UPDATE productos SET activo = CASE WHEN activo = 1 THEN 0 ELSE 1 END WHERE id = $productoId";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo 'Éxito';
    } else {
        echo 'Error al actualizar el estado del producto: ' . mysqli_error($con);
    }
} else {
    echo 'Solicitud no válida';
}
?>
