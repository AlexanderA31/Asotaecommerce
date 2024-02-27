
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
    if (isset($_POST['guardarp'])) {
        $nombreCli = $_POST['nombreCli'] ?? '';
        $cedulaCli = $_POST['cedulaCli'] ?? '';
        $emailCli = $_POST['emailCli'] ?? '';
        $direccionCli = $_POST['direccionCli'] ?? '';

        // Evitar SQL Injection utilizando consultas preparadas
        $queryCli = "UPDATE clientes SET nombre=?, cedula=?, email=?, direccion=? WHERE id=?";
        $stmtCli = mysqli_prepare($con, $queryCli);
        mysqli_stmt_bind_param($stmtCli, "ssssi", $nombreCli, $cedulaCli, $emailCli, $direccionCli,  $_SESSION['idCliente']);
        $resCli = mysqli_stmt_execute($stmtCli);

        if ($resCli) {
            echo '<meta http-equiv="refresh" content="0; url=index.php" />';
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
                Error al actualizar la información del cliente.
            </div>
            <?php
        }
    }
}

// Realiza la consulta para obtener los datos del cliente
$queryCli = "SELECT nombre,  cedula, email, direccion FROM clientes WHERE id='" . $_SESSION['idCliente'] . "'";
$resCli = mysqli_query($con, $queryCli);

if ($resCli) {
    $rowCli = mysqli_fetch_assoc($resCli);
} else {
    // Manejar el error de la consulta según tus necesidades
    die("Error en la consulta: " . mysqli_error($con));
}
?>

<!-- Agrega el formulario para editar los datos del cliente -->

    <div class="container">
        <div class="">
            <div class="col-6">
                <h3>Datos del Usuario</h3>
                <div class="form-group">
                    <label for="nombreCli">Nombre</label>
                    <input type="text" name="nombreCli" id="nombreCli" class="form-control" value="<?php echo $rowCli['nombre'] ?>">
                </div>
                <div class="form-group">
                    <label for="cedulaCli">Cedula</label>
                    <input type="text" name="cedulaCli" id="cedulaCli" class="form-control" value="<?php echo $rowCli['cedula'] ?>">
                </div>
                <div class="form-group">
                    <label for="emailCli">Email</label>
                    <input type="email" name="emailCli" id="emailCli" class="form-control"value="<?php echo $rowCli['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="direccionCli">Dirección</label>
                    <textarea name="direccionCli" id="direccionCli" class="form-control" rows="3"><?php echo $rowCli['direccion'] ?></textarea>
                </div>
                <div class="form-group" id="btnGuardarGroup" style="display: none; ">
                    <button type="submit" class="btn btn-primary" name="guardarp" value="guardarp" style="background-color: #00B1AD;">
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Obtén referencias a los campos y al botón
        var nombreInput = document.getElementById('nombreCli');
        var cedulaInput = document.getElementById('cedulaCli');
        var emailInput = document.getElementById('emailCli');
        var direccionInput = document.getElementById('direccionCli');
        var btnGuardarGroup = document.getElementById('btnGuardarGroup');

        // Agrega eventos de cambio a los campos para activar el botón de guardar
        nombreInput.addEventListener('input', activarBotonGuardar);
        cedulaInput.addEventListener('input', activarBotonGuardar);
        emailInput.addEventListener('input', activarBotonGuardar);
        direccionInput.addEventListener('input', activarBotonGuardar);

        function activarBotonGuardar() {
            // Muestra el botón de guardar cuando se detecta un cambio en los campos
            btnGuardarGroup.style.display = 'block';
        }
    });
</script>

</body>

  

<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Id de Venta</th>
                    <th>Fecha</th>
                    <th>Nombre del Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>SubTotal</th>
                    
                   
                </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php

                      $query= "SELECT v.id AS idVenta, v.fecha, p.nombre AS nombreProducto, dv.cantidad, dv.precio, dv.subTotal
                      FROM ventas v
                      JOIN detalleventas dv ON v.id = dv.idVenta
                      JOIN productos p ON dv.idProd = p.id
                      WHERE v.idCli = '" . $_SESSION['idCliente'] . "'";
                      $res=mysqli_query($con, $query);
                      
                      while($row=mysqli_fetch_assoc($res) ){
                    ?>

                  <tr>
                    <td><?php echo $row ['idVenta']?></td>
                    <td><?php echo $row ['fecha']?></td>
                    <td><?php echo $row ['nombreProducto']?></td>
                    <td><?php echo $row ['cantidad']?></td>
                    <td>$<?php echo $row ['precio']?></td>
                    <td>$<?php echo $row ['subTotal']?></td>
                    
                    
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
      </div>
  </div>
