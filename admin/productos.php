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
                          <a href="#" class="btn btn-success float-right mb-3" data-toggle="modal" data-target="#agregarProductoModal">Agregar Producto</a>
                              <thead>
                            
                                  <tr>
                                      <th>Nombre</th>
                                      <th>Descripcion</th>
                                      <th>Precio</th>
                                      <th>Existencia</th>
                                      <th>Imagen(es)</th>
                                      <th>Categoría</th>
                                      <th>Talla</th>
                                      <th>Acciones</th>
                                      
                                  </tr>
                                  <tbody>
                                  <?php

                                                $query = "SELECT p.id, p.nombre, p.descripcion, p.precio, p.existencia, p.activo,  p.categoria, p.talla, COUNT(pf.file_id) AS num_imagenes
                                                FROM productos AS p
                                                LEFT JOIN productos_files AS pf ON pf.producto_id = p.id
                                                GROUP BY p.id, p.nombre, p.descripcion, p.precio, p.existencia, p.activo,  p.categoria, p.talla;";


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
                                        &nbsp;
                                        <a href="panel.php?modulo=editarp&id=<?php echo $row['id'] ?>" style="margin-right: 5px;"> <i class="fas fa-edit"></i> </a>
                                        &nbsp;
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarProductoModal_<?php echo $row['id']; ?>">
                                            <i class="fas fa-trash-alt"></i>
                                            &nbsp;
                                        
                                        </button>
                                    </td>

                                    <!-- Modal para eliminar producto -->
                                    <div class="modal fade" id="eliminarProductoModal_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Estás seguro de que quieres eliminar este producto?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <a href="eliminar_producto.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Eliminar Producto</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        
                                        
                                            </td>
                                    </tr>
                                    <!-- Modal para agregar producto -->
                                    <div class="modal fade" id="agregarProductoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Formulario para agregar producto -->
                                                    <form action="agregar_producto.php" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="nombre">Nombre:</label>
                                                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="descripcion">Descripción:</label>
                                                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="precio">Precio:</label>
                                                            <input type="number" class="form-control" id="precio" name="precio" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="existencia">Existencia:</label>
                                                            <input type="number" class="form-control" id="existencia" name="existencia" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="categoria">Categoría:</label>
                                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                                <label class="btn btn-secondary active">
                                                                    <input type="radio" name="categoria" id="categoriaHombre" value="hombre" checked> Hombre
                                                                </label>
                                                                <label class="btn btn-secondary">
                                                                    <input type="radio" name="categoria" id="categoriaMujer" value="mujer"> Mujer
                                                                </label>
                                                                <label class="btn btn-secondary">
                                                                    <input type="radio" name="categoria" id="categoriaNiño" value="niño"> Niño
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="talla">Talla:</label>
                                                            <div class="input-group" style="max-width: 60px;">
                                                                <select class="custom-select" id="talla" name="talla" required>
                                                                    <option value="S">S</option>
                                                                    <option value="M">M</option>
                                                                    <option value="L">L</option>
                                                                    <!-- Agrega más opciones según tus necesidades -->
                                                                </select>
                                                            </div>
                                                        </div>

                                                      
                                                        <div class="form-group">
                                                            <label for="imagen">Imagen:</label>
                                                            <input type="file" class="form-control-file" id="imagen" name="imagen[]" multiple required>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="guardar" class="btn btn-primary">Guardar Producto</button>
                                                    </form>
                                                </div>
                                            </div>
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
