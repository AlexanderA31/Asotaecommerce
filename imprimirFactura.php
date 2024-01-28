<?php
session_start();
include_once "admin/db_ecommerce.php";
$con = mysqli_connect($host, $user, $pass, $db);

$queryRecibe = "SELECT nombre,email,direccion 
from recibe 
where idCli='" . $_SESSION['idCliente'] . "';";
$resRecibe = mysqli_query($con, $queryRecibe);
$rowRecibe = mysqli_fetch_assoc($resRecibe);

$queryCli = "SELECT nombre,email,direccion 
from clientes 
where id='" . $_SESSION['idCliente'] . "';";
$resCli = mysqli_query($con, $queryCli);
$rowCli = mysqli_fetch_assoc($resCli);

$idVenta = mysqli_real_escape_string($con, $_REQUEST['idVenta'] ?? '');
$queryVenta = "SELECT v.id,v.fecha
FROM ventas AS v
WHERE v.id = '$idVenta';";
$resVenta = mysqli_query($con, $queryVenta);
$rowVenta = mysqli_fetch_assoc($resVenta);
?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        div.header {
            text-align: center;
            margin-bottom: 20px;
        }

        div.header img {
            width: 40px;
        }

        div.header span {
            margin-left: 10px;
            font-size: 1.5em;
            font-weight: bold;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            vertical-align: top;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>

<div class="header">
    
    <span>Asotaeco</span>
</div>

<table>
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Recibe</th>
            <th>Datos de la factura</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <strong>Nombre:</strong><?php echo $rowCli['nombre'] ?><br>
                <strong>Email:</strong><?php echo $rowCli['email'] ?><br>
                <strong>Dirección:</strong><?php echo $rowCli['direccion'] ?><br>
            </td>
            <td>
                <strong>Nombre:</strong><?php echo $rowRecibe['nombre'] ?><br>
                <strong>Email:</strong><?php echo $rowRecibe['email'] ?><br>
                <strong>Dirección:</strong><?php echo $rowRecibe['direccion'] ?><br>
            </td>
            <td>
                <strong>Id:</strong><?php echo $rowVenta['id'] ?><br>
                <strong>Fecha:</strong><?php echo $rowVenta['fecha'] ?><br>
            </td>
        </tr>
    </tbody>
</table>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>SubTotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $queryDetalle = "SELECT
                    p.nombre,
                    dv.cantidad,
                    dv.precio,
                    dv.subTotal
                    FROM
                    ventas AS v
                    INNER JOIN detalleVentas AS dv ON dv.idVenta = v.id
                    INNER JOIN productos AS p ON p.id = dv.idProd
                    WHERE
                    v.id = '$idVenta'";
        $resDetalle = mysqli_query($con, $queryDetalle);
        $total = 0;
        while ($row = mysqli_fetch_assoc($resDetalle)) {
            $total = $total + $row['subTotal'];
        ?>
            <tr>
                <td><?php echo $row['nombre'] ?></td>
                <td><?php echo $row['cantidad'] ?></td>
                <td><?php echo "$".number_format($row['precio'],2); ?></td>
                <td><?php echo "$".number_format($row['subTotal']); ?></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="3" class="text-right">Total:</td>
            <td><?php echo "$".number_format($total,2); ?></td>
        </tr>
    </tbody>
</table>

</body>
</html>

<?php $html= ob_get_clean(); ?>
<?php
include_once "vendor\autoload.php";
use Dompdf\Dompdf;
$pdf=new Dompdf();
$pdf->loadHtml($html);
$pdf->setPaper("A4","landingscape");
$pdf->render();
$pdf->stream();
?>