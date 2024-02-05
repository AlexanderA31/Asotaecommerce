<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Asotaeco</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="admin\css\navar.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Pasarela de pago -->
    <link rel="stylesheet" href="admin/css/stripe.css">
    <link rel="stylesheet" href="admin\css\prod.css">
   <!-- Pasarela de pago  -->
   
   <link rel="stylesheet" href="admin\css\hdhdh.css">
   

   <!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    

   
    <?php
    session_start();
    $accion=$_REQUEST['accion']??'';
    if($accion=='cerrar'){
        session_destroy();
        header("Refresh:0");
    }
?>
</head>
          <!-- jQuery -->
    <script src="admin/plugins/jquery/jquery.min.js"></script>
<body>
<?php
include_once "admin/db_ecommerce.php";
$con = mysqli_connect($host, $user, $pass, $db);
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
               
                
                <?php
                  include_once "menu.php";
                  $modulo=$_REQUEST['modulo']??'';
                  if($modulo=="productos" || $modulo=="" ){
                      include_once "productos.php";
                  }
                  if( $modulo=="detalleproducto" ){
                      include_once "detalleProducto.php";
                }
                if( $modulo=="carrito" ){
                    include_once "carrito.php";
                }
                if( $modulo=="envio" ){
                    include_once "envio.php";
                }
                if( $modulo=="pasarela" ){
                    include_once "pasarela.php";
                }
                if( $modulo=="factura" ){
                    include_once "factura.php";
                }
                if( $modulo=="niño" ){
                    include_once "categorias\liño.php";
                }
                if( $modulo=="mujer" ){
                    include_once "categorias\mujer.php";
                }
                if( $modulo=="hombre" ){
                    include_once "categorias\hombre.php";
                }
                if( $modulo=="estudiante" ){
                    include_once "categorias\istudiante.php";
                }
                if( $modulo=="deportivo" ){
                    include_once "categorias\deportivo.php";
                }
                if( $modulo=="temporada" ){
                    include_once "categorias\iemporada.php";
                }
                if( $modulo=="usuario" ){
                    include_once "usuario.php";
                }
                if( $modulo=="informacion" ){
                    include_once "informacion.php";
                }
                if( $modulo=="reglamento" ){
                    include_once "reglamento.php";
                }
                if( $modulo=="resultados" ){
                    include_once "resultados.php";
                }
                ?>
            </div>
        </div>
    </div>
    <?php include_once "footer.php"; ?>
    <!-- jQuery UI 1.11.4 -->
    <script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- daterangepicker -->
    <script src="admin/plugins/moment/moment.min.js"></script>
    <script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- AdminLTE App -->
    <script src="admin/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="admin/dist/js/pages/dashboard.js"></script>
    <script src="admin/js/ecommerce.js"></script>
    <!-- Pasarela de pago-->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="admin/js/stripe.js"></script>

     
</body>
</html>