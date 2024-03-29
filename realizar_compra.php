<?php
include_once "db_ecommerce.php";
$con = mysqli_connect($host, $user, $pass, $db);

if (isset($_POST['guardar'])) {
    // Obtener información del formulario
    $producto_id = $_POST['producto_id'];
    $cantidad = $_POST['cantidad'];

    // Verificar existencia suficiente
    $queryExistencia = "SELECT existencia FROM productos WHERE id = $producto_id";
    $resultExistencia = mysqli_query($con, $queryExistencia);
    $rowExistencia = mysqli_fetch_assoc($resultExistencia);

    if ($rowExistencia['existencia'] >= $cantidad) {
        // Realizar el pago (integra aquí la lógica de tu pasarela de pago, por ejemplo, Stripe)

        // Actualizar la existencia después de confirmar el pago
        $nuevaExistencia = $rowExistencia['existencia'] - $cantidad;
        $queryActualizarExistencia = "UPDATE productos SET existencia = $nuevaExistencia WHERE id = $producto_id";
        mysqli_query($con, $queryActualizarExistencia);

        // Aquí también puedes registrar la compra en una tabla de historial o ventas si lo necesitas

        echo "Compra realizada con éxito. Existencia actualizada.";
    } else {
        echo "No hay suficiente existencia para realizar la compra.";
    }
}
?>
