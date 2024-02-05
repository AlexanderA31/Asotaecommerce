<?php
include_once "db_ecommerce.php";
$con = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if (isset($_REQUEST['guardar'])) {
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);
    $precio = mysqli_real_escape_string($con, $_POST['precio']);
    $existencia = mysqli_real_escape_string($con, $_POST['existencia']);    
    $categoria = mysqli_real_escape_string($con, $_POST['categoria']);
    $talla = mysqli_real_escape_string($con, $_POST['talla']);
    $colores = mysqli_real_escape_string($con, $_POST['colores']);

    $tipo = mysqli_real_escape_string($con, $_POST['tipo']);
    $producto_id = $_POST['id'];

    // Actualizar la información del producto
    $queryUpdate = "UPDATE productos SET 
        nombre='$nombre', 
        descripcion='$descripcion', 
        precio='$precio', 
        existencia='$existencia' ,
        categoria='$categoria',
        talla='$talla',
        colores='$colores',

        tipo='$tipo'
    WHERE id=$producto_id";

    $resultUpdate = mysqli_query($con, $queryUpdate);

    // Comprobar el resultado de la actualización
    if ($resultUpdate) {
        echo "Registro editado correctamente";

        // Subir imágenes si se proporcionaron
        if (!empty($_FILES['imagen']['name'][0])) {
            foreach ($_FILES['imagen']['tmp_name'] as $key => $tmp_name) {
                $imagen_extension = pathinfo($_FILES['imagen']['name'][$key], PATHINFO_EXTENSION);
                $imagen_nuevo_nombre = "upload/$producto_id" . "_$key.$imagen_extension";
                $imagen_ruta = "/ecommerce/$imagen_nuevo_nombre";
                $imagen_system_path = "C:/xampp/htdocs/ecommerce/$imagen_nuevo_nombre";

                move_uploaded_file($tmp_name, $imagen_system_path);

                // Insertar la ruta de la imagen en la tabla 'files'
                $queryInsert = "INSERT INTO files (filename, filesize, web_path, system_path) 
                                VALUES ('$imagen_nuevo_nombre', " . $_FILES['imagen']['size'][$key] . ", '$imagen_ruta', '$imagen_system_path')";
                mysqli_query($con, $queryInsert);

                $file_id = mysqli_insert_id($con);

                // Insertar la relación entre el producto y la imagen en la tabla 'productos_files'
                $queryRelacion = "INSERT INTO productos_files (producto_id, file_id) VALUES ($producto_id, $file_id)";
                mysqli_query($con, $queryRelacion);
            }
        }

        // Redireccionar a la página principal
        header('Location: panel.php?modulo=productos');
    } else {
        echo "Error al editar el registro";
    }
}

// Consultar un registro de la tabla productos
$query = "SELECT * FROM productos WHERE id = " . $_REQUEST['id'];
$result = mysqli_query($con, $query);

// Consultar imágenes asociadas al producto
$queryImagenes = "SELECT f.id AS file_id, f.filename, f.web_path
                  FROM productos_files AS pf
                  INNER JOIN files AS f ON pf.file_id = f.id
                  WHERE pf.producto_id = " . $_REQUEST['id'];

$resImagenes = mysqli_query($con, $queryImagenes);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Producto</h1>
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
                        <form action="editarp.php" method="post" enctype="multipart/form-data">
                            <?php
                            // consultar un registro de la tabla productos
                            $query = "SELECT * FROM productos WHERE id = " . $_REQUEST['id'];
                            //ejecutar la consulta
                            $result = mysqli_query($con, $query);
                            //recorrer el resultado de la consulta
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" value="<?php echo $row['nombre']; ?>">
                                <br>
                                <label for="descripcion">Descripción:</label>
                                <input type="text" name="descripcion" id="descripcion" value="<?php echo $row['descripcion']; ?>">
                                <br>
                                <label for="precio">Precio:</label>
                                <input type="text" name="precio" id="precio" value="<?php echo $row['precio']; ?>">
                                <br>
                                <label for="existencia">Existencia:</label>
                                <input type="text" name="existencia" id="existencia" value="<?php echo $row['existencia']; ?>">
                                <br>
                                <div class="form-group">
                                <label for="categoria">Categoría:</label>
                                <div class="btn-group  btn-sm" data-toggle="buttons">
                                    <label class="btn btn-secondary <?php echo ($row['categoria'] == 'hombre') ? 'active' : ''; ?>">
                                        <input type="radio" name="categoria" value="hombre" <?php echo ($row['categoria'] == 'hombre') ? 'checked' : ''; ?>> Hombre
                                    </label>
                                    <label class="btn btn-secondary <?php echo ($row['categoria'] == 'mujer') ? 'active' : ''; ?>">
                                        <input type="radio" name="categoria" value="mujer" <?php echo ($row['categoria'] == 'mujer') ? 'checked' : ''; ?>> Mujer
                                    </label>
                                    <label class="btn btn-secondary <?php echo ($row['categoria'] == 'niño') ? 'active' : ''; ?>">
                                        <input type="radio" name="categoria" value="niño" <?php echo ($row['categoria'] == 'niño') ? 'checked' : ''; ?>> Niño
                                    </label>
                                    <label class="btn btn-secondary <?php echo ($row['categoria'] == 'estudiante') ? 'active' : ''; ?>">
                                        <input type="radio" name="categoria" value="estudiante" <?php echo ($row['categoria'] == 'estudiante') ? 'checked' : ''; ?>> Estudiante
                                    </label>
                                    <label class="btn btn-secondary <?php echo ($row['categoria'] == 'temporada') ? 'active' : ''; ?>">
                                        <input type="radio" name="categoria" value="temporada" <?php echo ($row['categoria'] == 'temporada') ? 'checked' : ''; ?>> Temporada
                                    </label>
                                    <label class="btn btn-secondary <?php echo ($row['categoria'] == 'deportivo') ? 'active' : ''; ?>">
                                        <input type="radio" name="categoria" value="deportivo" <?php echo ($row['categoria'] == 'deportivo') ? 'checked' : ''; ?>> Deportivo
                                    </label>
                                </div>
                            </div>
                        

                            <div class="form-group">
                                <label for="tipo">Tipo:</label>
                                <div class="btn-group  btn-sm" data-toggle="buttons">
                                    <label class="btn btn-secondary <?php echo ($row['tipo'] == 'camisa') ? 'active' : ''; ?>">
                                        <input type="radio" name="tipo" value="camisa" <?php echo ($row['tipo'] == 'camisa') ? 'checked' : ''; ?>> Camisa
                                    </label>
                                    <label class="btn btn-secondary <?php echo ($row['tipo'] == 'pantalon') ? 'active' : ''; ?>">
                                        <input type="radio" name="tipo" value="pantalon" <?php echo ($row['tipo'] == 'pantalon') ? 'checked' : ''; ?>> Pantalon
                                    </label>
                                </div>
                            </div>
                            <br>
                            <label for="talla">Tallas:</label>
                                <input type="text" name="talla" id="talla" value="<?php echo $row['talla']; ?>">
                                <br>
                                <label for="colores">Colores:</label>
                                <input type="text" name="colores" id="colores" value="<?php echo $row['colores']; ?>">
                                <br>
                                <label for="imagen">Imagen:</label>
                                <input type="file" name="imagen[]" id="imagen" multiple>
                                <br>
                                <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>">
                                <br>
                                <input type="submit"class="btn btn-primary" value="Guardar" name="guardar">
                             <!-- Sección para mostrar imágenes existentes -->
                             <div class="mb-3">
                                    <h5>Imagenes existentes</h5>
                                    <?php while ($rowImagen = mysqli_fetch_assoc($resImagenes)) { ?>
                                        <div class="existing-image-thumbnail">
                                            <img src="<?php echo $rowImagen['web_path']; ?>" alt="Existing Image" width="50">
                                            <a href="eliminar_imagen.php?id=<?php echo $rowImagen['file_id']; ?>&producto_id=<?php echo $_REQUEST['id']; ?>" class="btn btn-sm btn-danger">Eliminar</a>
                                        </div>
                                    <?php } ?>
                                </div>

                            <?php
                            }
                            ?>
                            
                        </form>
                        
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
