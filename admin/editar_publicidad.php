<?php
include_once "db_ecommerce.php";
$con = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $publicidadId = $_POST["publicidad_id"];
    $descripcion = mysqli_real_escape_string($con, $_POST["descripcion"]);

    // Procesar la actualización de la descripción en la base de datos
    $updateQuery = "UPDATE publicidad SET descripcion = '$descripcion' WHERE id = $publicidadId";
    mysqli_query($con, $updateQuery);

    // Procesar la actualización de la imagen si se proporcionó una nueva
    if (!empty($_FILES["imagen"]["name"])) {
        // Ruta donde se guardarán las imágenes
        $rutaImagenes = 'imgpubli';

        // Crear un nuevo nombre para la imagen con el formato ID de la publicidad y extensión .jpg
        $nombreImagen = $publicidadId . '_1.jpg';

        // Ruta completa de la carpeta donde se guardará la imagen
        $carpetaDestino = 'imgpubli' . DIRECTORY_SEPARATOR;

        // Ruta completa de la imagen incluyendo el ID en el nombre y la extensión .jpg
        $rutaCompleta = $carpetaDestino . $nombreImagen;

        // Mover la imagen a la carpeta deseada
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaCompleta);

        // Actualizar la base de datos con la nueva ruta de la imagen
        $updateImagenQuery = "UPDATE publicidad SET imagen = '$nombreImagen' WHERE id = $publicidadId";
        mysqli_query($con, $updateImagenQuery);
    }

    // Redireccionar o realizar otras acciones después de la actualización
    header("Location: panel.php?modulo=publicidad");
    exit();
}
?>
