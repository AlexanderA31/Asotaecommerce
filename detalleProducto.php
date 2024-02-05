    
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
<?php

$id = mysqli_real_escape_string($con, $_REQUEST['id'] ?? '');
$queryProducto = "SELECT id,nombre,descripcion,precio,existencia,categoria,tipo,talla,colores FROM productos where id='$id';  ";
$resProducto = mysqli_query($con, $queryProducto);
$rowProducto = mysqli_fetch_assoc($resProducto);
?>
<!-- Default box -->
<div class="">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none"><?php echo $rowProducto['nombre'] ?></h3>
                <?php
                $queryImagenes = "SELECT 
                f.web_path
                FROM
                productos AS p
                INNER JOIN productos_files AS pf ON pf.producto_id=p.id
                INNER JOIN files AS f ON f.id=pf.file_id
                WHERE p.id='$id';
                ";
                
                $resPrimerImagen = mysqli_query($con, $queryImagenes);
                $rowPrimerImaen=mysqli_fetch_assoc($resPrimerImagen);
                
                ?>
                
                <div class="col-7  offset-2">
                    <img src="<?php echo $rowPrimerImaen['web_path'] ?>" class="product-image"id="PrimerImagen">
                </div>
                <div class="col-12 offset-2 product-image-thumbs">
                <?php
                    $resImagenes = mysqli_query($con, $queryImagenes);
                    while ($rowImagenes = mysqli_fetch_assoc($resImagenes)) {
                    ?>

                        <div class="product-image-thumb"><img src="<?php echo $rowImagenes['web_path'] ?>"onclick="changeImage(this)"></div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-12 col-sm-6">
            <h3 class="my-3"><?php echo $rowProducto['nombre'] ?></h3>
                <p><?php echo $rowProducto['descripcion'] ?></p>
                <p>Para: <?php echo $rowProducto['categoria'] ?></p>
                <p>Tipo: <?php echo $rowProducto['tipo'] ?></p>
                
                <hr>
                <p>Existencias: <?php echo $rowProducto['existencia'] ?></p>
                <p>Talla: <?php echo $rowProducto['talla'] ?></p>
                <p>Colores: <?php echo $rowProducto['colores'] ?></p>
                
              <div class="text-center">
                
                <h2 class="mb-0 text-success">
                    <?php 
                        $precio = $rowProducto['precio']; 
                        function asDollars($precio) {
                            if ($precio < 0) return "- " . asDollars(-$precio);
                            return '$' . number_format($precio, 2);
                        }
                        echo asDollars($precio);
                    ?>
                </h2>
                <p class="text-muted">Precio increíble</p>
            </div>
            <div >
                    <i class="fas fa-truck"></i>
                    <span>Envío a domicilio</span> &nbsp
                    <i class="fas fa-store"></i>
                    <span>Retiro en Tienda</span>
                </div>
                <hr>
            <div class="mt-4">
                    <label for="cantidadProducto">Cantidad</label>
                    <div class="input-group" style="max-width: 110px;">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button" onclick="decrementarCantidad()">-</button>
                        </div>
                        <input type="" class="form-control" id="cantidadProducto" value="1"  oninput="validarCantidad()">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" onclick="incrementarCantidad()">+</button>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                
                <style>
                    #agregarCarrito {
                        transition: transform 0.2s ease-in-out, background-color 0.3s ease-in-out, color 0.3s ease-in-out, border-color 0.3s ease-in-out;
                        background-color: #3498db;
                        color: #ffffff;
                        border: 2px solid #3498db;
                        border-radius: 5px; /* Esquinas redondeadas */
                        padding: 10px 20px; /* Ajusta el espaciado interno para que se vea más grande y cómodo */
                        cursor: pointer;
                        display: flex;
                        align-items: center;
                    }

                    #agregarCarrito:hover {
                        transform: scale(1.1);
                        background-color: #2980b9;
                        border-color: #2980b9;
                    }

                    #agregarCarrito i {
                        margin-right: 10px; /* Añade espacio entre el icono y el texto */
                    }
                </style>

                <button class="btn btn-primary btn-lg btn-flat" id="agregarCarrito" 
                        data-id="<?php echo $_REQUEST['id'] ?>"
                        data-nombre="<?php echo $rowProducto['nombre'] ?>"
                        data-web_path="<?php echo $rowPrimerImaen['web_path'] ?>"
                        data-precio="<?php echo $rowProducto['precio'] ?>"
                >
                    <i class="fas fa-cart-plus fa-lg"></i>
                    Agregar al carrito
                </button>

                </div>
               
            </div>
        </div>
    </div>
    <hr>

    <div class="col-12 text-center">
        <h2 style="font-weight: bold; color: black;  "> Te recomendamos</h2>
</div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

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
           // }
            ?>
    </div>
</div>

</body>


<script type="text/javascript">
   function changeImage(x){
    document.getElementById('PrimerImagen').src= x.src;
   }
</script>
<script>
        function incrementarCantidad() {
            var cantidadInput = document.getElementById('cantidadProducto');
            cantidadInput.value = parseInt(cantidadInput.value) + 1;
            validarCantidad();
        }

        function decrementarCantidad() {
            var cantidadInput = document.getElementById('cantidadProducto');
            if (parseInt(cantidadInput.value) > 1) {
                cantidadInput.value = parseInt(cantidadInput.value) - 1;
                validarCantidad();
            }
        }

        function validarCantidad() {
            var cantidadInput = document.getElementById('cantidadProducto');
            if (parseInt(cantidadInput.value) < 1) {
                cantidadInput.value = 1;
            }
        }
    </script>
      