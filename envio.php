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

    </style>
</head>
<body>
<?php
if (isset($_SESSION['idCliente'])) {
    if(isset($_REQUEST['guardar'])){
        $nombreCli=$_REQUEST['nombreCli']??'';
        $emailCli=$_REQUEST['emailCli']??'';
        $direccionCli=$_REQUEST['direccionCli']??'';
        $queryCli="UPDATE clientes set nombre='$nombreCli',email='$emailCli',direccion='$direccionCli' where id='".$_SESSION['idCliente']."' ";
        $resCli=mysqli_query($con,$queryCli);

        $nombreRec=$_REQUEST['nombreRec']??'';
        $emailRec=$_REQUEST['emailRec']??'';
        $direccionRec=$_REQUEST['direccionRec']??'';
        $queryRec="INSERT INTO recibe (nombre,email,direccion,idCli) VALUES ('$nombreRec','$emailRec','$direccionRec','".$_SESSION['idCliente']."')
        ON DUPLICATE KEY UPDATE
        nombre='$nombreRec',email='$emailRec',direccion='$direccionRec'; ";
        $resRec=mysqli_query($con,$queryRec);
        if($resCli && $resRec){
            echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=pasarela" />';
        }
        else{
        ?>
            <div class="alert alert-danger" role="alert">
                Error
            </div>
            <?php
        }
    }
    $queryCli="SELECT nombre,email,direccion from clientes where id='".$_SESSION['idCliente']."';";
    $resCli=mysqli_query($con,$queryCli);
    $rowCli=mysqli_fetch_assoc($resCli);

    $queryRec="SELECT nombre,email,direccion from recibe where idCli='".$_SESSION['idCliente']."';";
    $resRec=mysqli_query($con,$queryRec);
    $rowRec=mysqli_fetch_assoc($resRec);

    $rowRec['nombre']=$rowRec['nombre']??''; 
    $rowRec['email']=$rowRec['email']??''; 
    $rowRec['direccion']=$rowRec['direccion']??''; 

?>
    <form class="centradorr">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h4>Datos del cliente</h4>
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="nombreCli" id="nombreCli" class="form-control" value="<?php echo $rowCli['nombre'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="emailCli" id="emailCli" class="form-control" readonly="readonly" value="<?php echo $rowCli['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Direccion</label>
                        <textarea name="direccionCli" id="direccionCli" class="form-control" row="3"><?php echo $rowCli['direccion'] ?></textarea>
                    </div>

                </div>
                <div class="col-6">
                    <h4>Datos del que recibe </h4>
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="nombreRec" id="nombreRec" class="form-control" value="<?php echo $rowRec['nombre'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="emailRec" id="emailRec" class="form-control" value="<?php echo $rowRec['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Direccion</label>
                        <textarea name="direccionRec" id="direccionRec" class="form-control" row="3"><?php echo $rowRec['direccion'] ?></textarea>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="jalar">&nbsp;
                            Mantener datos del cliente
                        </label>
                    </div>

        <div class="d-flex justify-content-center mt-4">
    <a class="btn btn-warning mr-2" href="index.php?modulo=carrito" role="button">
        <i class="fas fa-shopping-cart"></i> Regresar al carrito
    </a>

    <button type="submit" class="btn btn-primary" name="guardar" value="guardar">
        Ir a pagar <i class="fas fa-chevron-right"></i>
    </button>
</div><br>

    </form>
<?php
} else {
?>
    <div class="text-center centradorr">
    Para continuar, por favor <a href="login.php" style="text-decoration: underline; color: #007BFF;">inicie sesión</a> o <a href="registro.php" style="text-decoration: underline; color: #007BFF;">regístrese</a>
</div>


<?php

}
?>
</body>