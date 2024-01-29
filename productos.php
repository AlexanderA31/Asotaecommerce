    
    
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
        /* Ajustar el tamaño de las imágenes en el carrusel */
        #myCarousel img {
            max-height: 650px; /* Ajusta el tamaño según tus necesidades */
            margin: 0 auto; /* Centra la imagen horizontalmente */
        }
    </style>
</head>
    
    <body>
    <div class="container-lg my-3">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Carousel indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
        
            <!-- Wrapper for carousel items -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="carrusel/347278611_233366962888008_5933785908126596684_n.jpg" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="carrusel/347551709_233366936221344_5014648292933804628_n.jpg" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="carrusel/347583107_233366982888006_7008172701789967248_n.jpg" class="d-block w-100" alt="Slide 3">
                </div>
            </div>
        </div>
    </div>
                        
</body>
<script>
document.addEventListener("DOMContentLoaded", function(){
    var element = document.getElementById("myCarousel");
    var myCarousel = new bootstrap.Carousel(element);
});
</script>
<div style="margin-left: 30px;">
        <h2 style="font-weight: bold; color: black; "> ¿PARA QUIEN COMPRAS? </h2>
    </div>
<div class="image-container bodya">
    
    <img src="imgss\mujerAjpg.jpg">
    <div class="button">
    <a href="index.php?modulo=mujer">Comprar para mujer →</a>
  </div>

    <img src="imgss\curumim_tatiana-zanon-unsplash_capa-1000x620.webp">
    <div class="buttonN">
    <a href="index.php?modulo=niño">Comprar para niño →</a>
  </div>

    <img src="imgss\_DSF3942_ed.max-760x504.jpg">
    <div class="buttonH">
    <a href="index.php?modulo=hombre">Comprar para hombre →</a>
  </div>

</div>


<div style="margin-left: 30px;">
        <h2 style="font-weight: bold; color: black;  "> PRODUCTOS RECIENTES</h2>
    </div><br>
    
<div class="row mt-1">
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
                        GROUP BY p.id
                        ORDER BY p.id DESC
                        LIMIT 3";


    $res = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($res)) {
    ?>
    <div class="col-lg-3 col-md-6 col-sm-12" style="margin-left: 150px; margin-right: -130px;">
            <div class="" style="height: 600px; overflow: hidden;">
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
    ?>
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

