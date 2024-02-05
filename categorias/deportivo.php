<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>


    
    </style>
</head>
<body>
    
    <?php
    $where = " where 1=1 ";
    $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre'] ?? '');
    if (empty($nombre) == false) {
        $where = "and nombre like '%" . $nombre . "%'";
    }
    $queryCuenta = 'SELECT COUNT(*) as cuenta FROM productos  $where ;';
    $resCuenta = mysqli_query($con, $queryCuenta);
    $rowCuenta = mysqli_fetch_assoc($resCuenta);
    $totalRegistros = $rowCuenta['cuenta'];

    $elementosPorPagina = 10;

    $totalPaginas = ceil($totalRegistros / $elementosPorPagina);

    $paginaSel = $_REQUEST['pagina'] ?? false;

    if ($paginaSel == false) {
        $inicioLimite = 0;
        $paginaSel = 1;
    } else {
        $inicioLimite = ($paginaSel - 1) * $elementosPorPagina;
    }
    $limite = " limit $inicioLimite,$elementosPorPagina ";
   
                        $query = "SELECT 
                        p.id,
                        p.nombre,
                        p.descripcion,
                        p.precio,
                        p.existencia,
                        f.web_path
                        FROM
                        productos AS p
                        INNER JOIN productos_files AS pf ON pf.producto_id=p.id
                        INNER JOIN files AS f ON f.id=pf.file_id
                        WHERE p.activo = 1
                        AND p.categoria = 'deportivo'
                        GROUP BY p.id
                        $limite
                        ";

?>
    <div class="centradorr">
        <?php
            $res = mysqli_query($con, $query);
            while ($row = mysqli_fetch_assoc($res)) {
                //for($i=0;$i<10;$i++){
            ?>


                <div class="" style=";">
                    <div class="" style="">
                        <img class="card-img-top img-thumbnail" style="object-fit: cover; width: 100%; height: 50%;" src="<?php echo $row['web_path'] ?>" alt="">
                        <div class="card-body">
                            <h2 class="card-title"><strong><?php echo $row['nombre'] ?></strong></h2>
                            <p class="card-text"><strong>Precio:</strong><?php echo $row['precio'] ?></p>
                            <p class="card-text"><strong>Existencia:</strong><?php echo $row['existencia'] ?></p>
                            <a href="index.php?modulo=detalleproducto&id=<?php echo $row['id'] ?>" class="btn btn-primary">Ver</a>
                        </div>
                    </div>
                </div>

            <?php
                }
            //}
            ?>
    </div>
</div>

<?php
if ($totalPaginas > 0) {
    //paginador del ecommerce
    ?>
        <nav aria-label="Page navigation "class="mt-4 mb-4 ml-2">
            <ul class="pagination ">
                <?php
                if ($paginaSel != 1) {
                ?>
                    <li class="page-item ">
                        <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo ($paginaSel - 1); ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                <?php
                }
                ?>

                <?php
                for ($i = 1; $i <= $totalPaginas; $i++) {
                ?>
                    <li class="page-item <?php echo ($paginaSel == $i) ? " active " : " "; ?>">
                        <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php
                }
                ?>
                <?php
                if ($paginaSel != $totalPaginas) {
                ?>
                    <li class="page-item">
                        <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo ($paginaSel + 1); ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </nav>
    <?php
}
?>

</body>

