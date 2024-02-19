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
<div class="centradorr">
<form action="index.php?modulo=factura" method="post" id="payment-form">
    <table class="table table-striped table-inverse" id="tablaPasarela">
        <thead class="thead-inverse">
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table><form action="realizar_compra.php" method="post" id="payment-form">
    <!-- Agrega tus campos e información de productos aquí -->
    <table class="table table-striped table-inverse" id="tablaPasarela">
        <!-- Contenido de la tabla con los productos a comprar -->
    </table>
    
    <div class="payment-section">
        <div class="card-details">
            <!-- Campos para los detalles de la tarjeta -->
            <h4 class="section-title">Datos de su tarjeta</h4>
            <div id="card-element" class="card-element">
                <!-- A Stripe Element will be inserted here. -->
            </div>
            <!-- Used to display form errors. -->
            <div id="card-errors" class="error-message" role="alert"></div>
        </div>

        <div class="terms-and-conditions mt-3">
            <!-- Términos y condiciones -->
            <h4 class="section-title">Términos y condiciones</h4>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit...</p>
            <div class="form-check mt-2">
                <input type="checkbox" class="form-check-input" id="termsCheckbox" value="checkedValue" checked>
                <label class="form-check-label" for="termsCheckbox">Acepto los términos y condiciones</label>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        <!-- Botón para ir a la sección de envío -->
        <a class="btn btn-warning mr-2" href="index.php?modulo=envio" role="button">
            <i class="fas fa-truck"></i> Ir a envío
        </a>

        <!-- Botón de pago -->
        <button type="submit" class="btn btn-primary">
            Pagar <i class="fas fa-credit-card"></i>
        </button>
    </div>
</form>
</div>
</body>