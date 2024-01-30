
<?php
$id = mysqli_real_escape_string($con, $_REQUEST['id'] ?? '');
$queryProducto = "SELECT id,nombre,descripcion,precio,existencia,categoria,talla,tipo FROM productos where id='$id';  ";
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
                
                <div class="col-8  offset-2">
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
                <p>Talla: <?php echo $rowProducto['talla'] ?></p>
                <p>Tipo: <?php echo $rowProducto['tipo'] ?></p>
                
                <hr>
                <p>Existencias: <?php echo $rowProducto['existencia'] ?></p>
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
            <div class="mt-4">
                    Cantidad
                    <input type="number" class="form-control" id="cantidadProducto" value="1" style="width: 70px;">
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
    <!-- /.card-body -->
</div>
<!-- /.card -->
<script type="text/javascript">
   function changeImage(x){
    document.getElementById('PrimerImagen').src= x.src;
   }
</script>
