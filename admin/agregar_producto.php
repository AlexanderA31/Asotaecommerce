<?php
include_once "db_ecommerce.php";
$con = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST['guardar'])) {
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);
    $precio = mysqli_real_escape_string($con, $_POST['precio']);
    $existencia = mysqli_real_escape_string($con, $_POST['existencia']);
    $categoria = mysqli_real_escape_string($con, $_POST['categoria']);
    $talla = mysqli_real_escape_string($con, $_POST['talla']);

    // Insertar datos del producto en la tabla 'productos'
    $query = "INSERT INTO productos (nombre, descripcion, precio, existencia,  categoria, talla) 
              VALUES ('$nombre', '$descripcion', '$precio', '$existencia','$categoria','$talla')";

    mysqli_query($con, $query);

    $producto_id = mysqli_insert_id($con);

    // Procesar imágenes si se proporcionaron
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

    // Redireccionar a la página principal después de agregar el producto
    header('Location: panel.php?modulo=productos');
}
?>
