<?php
// Incluir el archivo de conexión a la base de datos
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
                    <h1>Publicidad: Ropa que debes conocer </h1>
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

                        <table id="tablaPublicidad" class="table table-bordered table-hover">
                            <thead>

                                <tr>
                                    <th>Imagen</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                                <tbody>
                                    <?php

                                    $query = "SELECT * FROM publicidad";

                                    $res = mysqli_query($con, $query);

                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>

                                        <tr>
                                            <td><img src="<?php echo $rutaImagenes . $row['imagen']; ?>" alt="Publicidad" style="max-width: 100px;"></td>
                                            <td><?php echo $row['descripcion']; ?></td>
                                            <td>
                                                <button class="btn btn-info btn-sm btn-editar" data-toggle="modal" data-target="#editarPublicidadModal_<?php echo $row['id']; ?>">
                                                    <i class="fas fa-edit"></i> Editar
                                                </button>
                                            
                                            </td>

                                            <!-- Modal para editar publicidad -->
                                            <div class="modal fade" id="editarPublicidadModal_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Editar Publicidad</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Formulario para editar publicidad -->
                                                            <form action="editar_publicidad.php" method="post" enctype="multipart/form-data">
                                                                <input type="hidden" name="publicidad_id" value="<?php echo $row['id']; ?>">
                                                                <div class="form-group">
                                                                    <label for="descripcion">Descripción:</label>
                                                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?php echo $row['descripcion']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="imagen">Nueva Imagen:</label>
                                                                    <input type="file" class="form-control-file" id="imagen" name="imagen">
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

                            </thead>
                        </table>
                    </div>
                    <!-- /.card-body -->
