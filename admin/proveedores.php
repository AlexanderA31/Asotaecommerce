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
                    <h1>Proveedores</h1>
                </div>
                <div class="col-sm-6">
                    <a href="#" class="btn btn-success float-right mb-3" data-toggle="modal" data-target="#agregarProveedorModal">Agregar Proveedor</a>
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

                        <table id="tablaProveedores" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Categoría</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM proveedores";
                                $res = mysqli_query($con, $query);

                                while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['nombre_proveedor']; ?></td>
                                        <td><?php echo $row['telefono']; ?></td>
                                        <td><?php echo $row['categoria_producto']; ?></td>
                                        <td>
                                        <button class="btn btn-info btn-sm btn-editar" data-toggle="modal" data-target="#editarProveedorModal_<?php echo $row['id_proveedor']; ?>">
                                                    <i class="fas fa-edit"></i> Editar
                                                </button>
                                                <a href="eliminar_proveedor.php?id_proveedor=<?php echo $row['id_proveedor']; ?>" class="text-danger borrar" onclick="return confirm('¿Estás seguro de que deseas eliminar este proveedor?');">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <button href="enviar_sms.php" class="btn btn-success btn-sm btn-enviar-sms" id="btnEnviarSMS">
                                                            <i class="fas fa-envelope"></i> Enviar SMS
                                                    </button>

                                                    <script>
                                                    document.getElementById('btnEnviarSMS').addEventListener('click', function() {
                                                        // Realizar una solicitud AJAX a enviarsms.php
                                                        var xhr = new XMLHttpRequest();
                                                        xhr.open('GET', 'enviar_sms.php', true);
                                                        xhr.onreadystatechange = function() {
                                                            if (xhr.readyState == 4 && xhr.status == 200) {
                                                                // Manejar la respuesta del servidor si es necesario
                                                                console.log(xhr.responseText);
                                                            }
                                                        };
                                                        xhr.send();
                                                    });
                                                </script>

                                        </td>
                                        
                                            <!-- Modal para editar proveedor -->
                                            <div class="modal fade" id="editarProveedorModal_<?php echo $row['id_proveedor']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Editar Proveedor</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Formulario para editar proveedor -->
                                                            <form action="editar_proveedor.php" method="post">
                                                                <input type="hidden" name="proveedor_id" value="<?php echo $row['id_proveedor']; ?>">
                                                                <div class="form-group">
                                                                    <label for="nombre">Nombre:</label>
                                                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['nombre_proveedor']; ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="telefono">Teléfono:</label>
                                                                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $row['telefono']; ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="categoria">Categoría:</label>
                                                                    <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo $row['categoria_producto']; ?>" required>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
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

<!-- Modal para agregar proveedor -->
<div class="modal fade" id="agregarProveedorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para agregar proveedor -->
                <form action="agregar_proveedor.php" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="categoria_producto">Categoría:</label>
                        <input type="text" class="form-control" id="categoria_producto" name="categoria_producto" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar Proveedor</button>
                </form>
            </div>
        </div>
    </div>
</div>
