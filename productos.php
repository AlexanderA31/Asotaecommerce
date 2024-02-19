    
    
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
                    <img src="carrusel\zyro-image.jpg" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="carrusel\zyro-image(1).jpg" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="carrusel\zyro-image(4).jpg" class="d-block w-100" alt="Slide 3">
                </div>
            </div>
        </div><br><br>
        <div style="display: flex; justify-content: center; align-items: center;">
    <img src="imgss\Presentación_Lluvia_de_ideas_Scrapbook_Doodle_Azul_Amarillo-removebg-preview.png" style="width: 55%;">
</div>
    </div>
    </div>                  


<script>
document.addEventListener("DOMContentLoaded", function(){
    var element = document.getElementById("myCarousel");
    var myCarousel = new bootstrap.Carousel(element);
});

</script>


 


<div style="margin-left: 20px;">
  <h2 style="font-weight: ; color: black; "> Productos recientes </h2>
</div>

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
                            p.talla,
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

<div class="centradorri">
    <?php
    $res = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($res)) {
    ?>
        <a href="index.php?modulo=detalleproducto&id=<?php echo $row['id'] ?>" class="producto">
            <img src="<?php echo $row['web_path'] ?>" alt="<?php echo $row['nombre'] ?>">
            <div class="producto-info">
                <h2 class="card-title"><strong><?php echo $row['nombre'] ?></strong></h2>
                <p class="precio"><strong>Precio:</strong> $<?php echo $row['precio'] ?></p>
                <p class="talla"><strong>Talla:</strong> <?php echo $row['talla'] ?></p>
                <p class="existencia"><strong>Existencia:</strong> <?php echo $row['existencia'] ?></p>
            </div>
        </a>
    <?php
    }
    ?>
</div> 
</div> 
<div style="margin-left: 20px;">
  <h2 style="font-weight: ; color: black; "> Ropa de Temporada </h2>
  
</div>
<style>
    .containeru {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 60vh;
    }

    .text-container {
      max-width: 50%;
      padding: 20px;
      text-align: center;
      opacity: 0;
      animation: fadeIn 2s forwards;
      font-size: 23px;
    }

    .image-container {
      max-width: 20%;
      position: relative;
      overflow: hidden;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .image {
      max-width: 100%;
      height: auto;
      display: block;
      transition: transform 0.5s ease;
    }

    .image:hover {
      transform: scale(1.1);
    }
    @media (max-width: 768px) {
    .containeru {
      flex-direction: column;
      height: auto;
    }

    .text-container {
      max-width: 100%;
    }

    .image-container {
      max-width: 100%;
    }

    .image {
      width: 100%;
      height: auto;
    }

    .contenedor-imagenes {
      flex-direction: column;
    }

    .contenedor-imagenes a {
      margin: 10px 0;
    }
  }
    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }
</style>

<div class="containeru">
  <div class="text-container">

    <p>Sumérgete en la frescura y la elegancia de la primavera con la encantadora camisa "Flores de Asotaeco" de la prestigiosa Asociación Textil Artesanal Asotaeco. Esta prenda única combina la 
        maestría artesanal con la vibrante esencia de la naturaleza, creando un diseño que captura la belleza efímera de las flores en plena temporada.</p>
  </div>

  <div class="image-container">
    <img class="image" src="imgss\tempo.jpeg" alt="Imagen Grande">
  </div>
</div>

<div style="margin-left: 20px;">
  <h2 style="font-weight: ; color: black; "> ¿Para quien compras? </h2>
</div>
<style>
  .contenedor-imagenes {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .contenedor-imagenes a {
    margin: 0 30px; /* Ajusta el margen entre las imágenes según sea necesario */
  }

  .contenedor-imagenes img {
    max-width: 220px; /* Ajusta el tamaño máximo de las imágenes según sea necesario */
    height: auto;
    transition: transform 0.3s ease-in-out;
  }
  .contenedor-imagenes a:hover img {
    transform: scale(1.09); /* Ajusta la escala según sea necesario */
  }
</style>

<div class="contenedor-imagenes">
  <a href="index.php?modulo=hombre">
    <img src="categoriaimg\Hombreu.png" alt="Slide 1">
  </a>
  <a href="index.php?modulo=mujer">
    <img src="categoriaimg\Mujeru.png" alt="Slide 2">
  </a>
  <a href="index.php?modulo=niño">
    <img src="categoriaimg\Niño.png" alt="Slide 3">
  </a>
  <a href="index.php?modulo=estudiante">
    <img src="categoriaimg\estudiantes.png" alt="Slide 4">
  </a>
</div>

</body>

     