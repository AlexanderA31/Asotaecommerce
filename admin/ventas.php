<?php
include_once "db_ecommerce.php";
$con = mysqli_connect($host, $user, $pass, $db);
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Productos</h1>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                
                          <table id="tablaProductos" class="table table-bordered table-hover">
                        
                              <thead>
                            
                                  <tr>
                                      <th>Nombre</th>
                                      <th>Descripcion</th>
                                      <th>Precio</th>
                                      <th>Existencia</th>
                                      <th>Imagen(es)</th>
                                      <th>Categoría</th>
                                      <th>Talla</th>
                                      <th>Colores</th>
                                      <th>Tipo</th>
                                      <th>Acciones</th>
                                      
                                  </tr>
                                  <tbody>
                                  <?php

                                $query = "SELECT p.id, p.nombre, p.descripcion, p.precio, p.existencia, p.activo,  p.categoria, p.tipo, p.talla, p.colores,  COUNT(pf.file_id) AS num_imagenes
                                FROM productos AS p
                                LEFT JOIN productos_files AS pf ON pf.producto_id = p.id
                                GROUP BY p.id, p.nombre, p.descripcion, p.precio, p.existencia, p.activo,  p.categoria, p.tipo, p.talla, p.colores;";





                                        $res = mysqli_query($con, $query);
                                            
                                        
                                        while($row=mysqli_fetch_assoc($res) ){
                                        ?>

                                    <tr>
                                        <td><?php echo $row ['nombre']?></td>
                                        <td><?php echo $row ['descripcion']?></td>
                                        <td>$<?php echo $row ['precio']?></td>
                                        <td><?php echo $row ['existencia']?></td>
                                        <td><?php echo $row['num_imagenes']; ?></td>
                                        <td><?php echo $row['categoria']; ?></td>
                                        <td><?php echo $row['talla']; ?></td>
                                        <td><?php echo $row['colores']; ?></td>
                                        <td><?php echo $row['tipo']; ?></td>


                                        <td>
                                    
                                        <?php

                                        if ($row['activo'] == 1): ?>
                                            <button class="btn btn-warning btn-activar" data-producto-id="<?php echo $row['id']; ?>">
                                                Desactivar
                                            </button>
                                        <?php else: ?>
                                            <button class="btn btn-success btn-activar" data-producto-id="<?php echo $row['id']; ?>">
                                                Activar
                                            </button>
                                        <?php endif; ?>
                                    </td>

                                        
                                            
                                    </tr>
                                  
                                              
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    </tbody>

                              </thead>
                          </table>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

              </div>
              <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->
  </div>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>
$(document).ready(function() {
    // Manejar el clic en los botones de activar/desactivar
    $('.btn-activar').click(function() {
        var productoId = $(this).data('producto-id');
        $.ajax({
            type: 'POST',
            url: 'activar_desactivar_producto.php',
            data: { productoId: productoId },
            success: function(response) {
                if (response === 'Éxito') {
                    // Actualizar el estado del botón
                    var btn = $('.btn-activar[data-producto-id="' + productoId + '"]');
                    if (btn.hasClass('btn-success')) {
                        btn.removeClass('btn-success').addClass('btn-warning').text('Desactivar');
                    } else {
                        btn.removeClass('btn-warning').addClass('btn-success').text('Activar');
                    }
                } else {
                    // Manejar errores si es necesario
                    console.log('Error al activar/desactivar producto: ' + response);
                }
            }
        });
    });
});
</script>
