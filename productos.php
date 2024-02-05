    
    
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
<style>
  .swiper-container {
      border-radius: 50%; /* Redondea completamente el contenedor */
      overflow: hidden;
    }

    .swiper-slide {
      border-radius: 50%; /* Redondea completamente cada slide */
      overflow: hidden;
    }

    .swiper-slide img {
      width: 100%;
      border-radius: 20px; /* Ajusta el valor según tus preferencias para redondear los bordes de las imágenes */
    }
  </style>
<div style="margin-left: 20px;">
  <h2 style="font-weight: ; color: black; "> ¿Para quien compras? </h2>
</div>
<div class="container-lg my-3">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="d-flex justify-content-around">
                <a href="index.php?modulo=mujer">
                <img src="categoriaimg/11979635916830.webp" class="d-block w-100" alt="Slide 1">
            </a>
            <a href="index.php?modulo=hombre">
                <img src="categoriaimg/11979635916830.webp" class="d-block w-100" alt="Slide 2">
            </a>
            <a href="index.php?modulo=niño">
                <img src="categoriaimg/11979635916830.webp" class="d-block w-100" alt="Slide 3">
            </a>
            <a href="index.php?modulo=estudiante">
                <img src="categoriaimg/11979635916830.webp" class="d-block w-100" alt="Slide 4">
            </a>
                </div>
            </div>
            <!-- Agrega más elementos de carrusel según sea necesario -->
        </div>
    </div>
</div>

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
                        <p class="card-text"><strong>Precio:</strong><?php echo $row['precio'] ?>$</p>
                        <p class="card-text"><strong>Existencia:</strong><?php echo $row['existencia'] ?></p>
                        <a href="index.php?modulo=detalleproducto&id=<?php echo $row['id'] ?>" class="btn btn-primary">Ver</a>
                    </div>
                </div>
            </div>


        <?php
            }
        //}
        ?>

</div>
</div>
<style>
   /* Style for the contact section */
   #contact {
      background-color: #f8f8f8;
      padding: 60px 0;
   }

   /* Style for the Contact Us heading */
   .titlepage h2 span.green {
      color: #28a745; /* Green color */
   }

   /* Style for the form container */
   .main_form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
   }

   /* Style for the input fields */
   .contactus {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
   }

   /* Style for the submit button */
   .send_btn {
      background-color: #28a745; /* Green color */
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
   }

   .send_btn:hover {
      background-color: #218838; /* Darker green color on hover */
   }

   /* Style for the map container */
   .map_main {
      margin-top: 20px;
   }

   /* Responsive styling for the map */
   .map-responsive {
      overflow: hidden;
      padding-bottom: 56.25%;
      position: relative;
      height: 0;
   }

   .map-responsive iframe {
      left: 0;
      top: 0;
      height: 100%;
      width: 100%;
      position: absolute;
   }
</style>
<div id="contact" class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2><span class="green">Contáctanos</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form id="request" class="main_form">
                    <div class="row">
                        <div class="col-md-12">
                            <input class="contactus" placeholder="Nombre" type="text" name="Nombre">
                        </div>
                        <div class="col-md-12">
                            <input class="contactus" placeholder="Correo" type="text" name="Correo">
                        </div>
                        <div class="col-md-12">
                            <input class="contactus" placeholder="Número de teléfono" type="text" name="PhoneNumber">
                        </div>
                        <div class="col-md-12">
                            <button class="send_btn">Enviar</button>
                        </div>
                    </div>
                </form><br>
                <div class="social-icons">
                    <a href="https://www.facebook.com/margoty1987" target="_blank">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                    Facebook
                </div>

                <div class="reglamento">
                    <a href="pdf\ESTATUTO.pdf"  download="nombre-archivo.pdf">
                        <ion-icon name="document-text-outline"></ion-icon>
                    </a>
                    Estatuto
                </div>

                <div class="reglamento">
                    <a href="pdf\reglamento-interno (1).pdf" download="nombre-archivo.pdf">
                        <ion-icon name="document-text-outline"></ion-icon>
                    </a>
                    Reglamento Interno
                </div>

            </div>
            <div class="col-md-6">
                <div class="contact-info">
                   

                    <p class="icon-text" style="display: flex; align-items: center;">
                        <ion-icon name="mail-outline" style="margin-right: 5px;"></ion-icon>
                        <span>asotaec@hotmail.com</span>
                    </p>

                    <p class="icon-text" style="display: flex; align-items: center;">
                        <ion-icon name="call-outline" style="margin-right: 5px;"></ion-icon>
                        <span>099 523 6593</span>
                    </p>
                    <p class="icon-text" style="display: flex; align-items: center;">
                        <ion-icon name="location-outline" style="margin-right: 5px;"></ion-icon>
                        <span>Barrio “Las Palmas”, calle Ayahuaca</span>
                    </p>
                </div>

                <div class="map_main">
                    <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.2313560558673!2d-77.81956842526523!3d-0.9828160353692498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d6a5fdca06774d%3A0x5dbc3647ff4e1453!2sAsociaci%C3%B3n%20%22Asotaeco%22!5e0!3m2!1ses!2sec!4v1706770322235!5m2!1ses!2sec" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                
            </div>
        
        </div>
    </div>
</div>
</body>

     