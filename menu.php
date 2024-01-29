
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
</head>
<body >  
<nav class="navbar navbar-expand">


<img src="imgss\aso.png"  class="brand-image img-circle elevation-3" style="opacity: .8 max-width: 50px; max-height: 50px;">
                        <!-- Left navbar links -->
                        
                        <ul class="navbar-nav">
  
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">Menu</a>
                            </li>
                            <li class="nav-item" >
                                <a href="#" class="nav-link">Contacto</a>
                            </li>
                            <li class="nav-itema nav-link" style="color: red;">
                                <span>|</span>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?modulo=hombre" class="nav-link">Hombre</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?modulo=mujer" class="nav-link" >Mujer</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?modulo=niño" class="nav-link">Niño</a>
                            </li>
                        
                        </ul>

     
                    <ul class="navbar-nav ml-auto">
                                  <!-- SEARCH FORM -->
                    <form class="form-inline ml-3" action="index.php">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar bg-gray" type="search" placeholder="Search" aria-label="Search" name="nombre" value="<?php echo $_REQUEST['nombre'] ?? ''; ?>">
                            <input type="hidden" name="modulo" value="productos">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                        <!-- Messages Dropdown Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#" id="iconoCarrito">
                                <i class="fa fa-box-open" aria-hidden="true"></i>
                                <span class="badge badge-danger navbar-badge" id="badgeProducto" style="font-size: 8px;"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="listaCarrito">

                            </div>
                        </li>
                    
                        <!-- Notifications Dropdown Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                <?php
                                if (isset($_SESSION['idCliente']) == false) {
                                ?>
                                    <a href="login.php" class="dropdown-item">
                                        <i class="fas fa-door-open mr-2 text-primary"></i>Loguearse
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="registro.php" class="dropdown-item">
                                        <i class="fas fa-sign-in-alt mr-2 text-primary"></i>Registrarse
                                    </a>
                                <?php
                                } else {
                                ?>
                                   <a href="index.php?modulo=usuario&id=<?php echo $_SESSION['idCliente']; ?>" class="dropdown-item">
                                        <i class="fas fa-user text-primary mr-2"></i>Hola <?php echo $_SESSION['nombreCliente']; ?>
                                    </a>

                                    <form action="index.php" method="post">
                                        <button name="accion" class="btn btn-danger dropdown-item" type="submit" value="cerrar">
                                        <i class="fas fa-door-closed text-danger mr-2"></i>Cerrar sesion
                                        </button>
                                    </form>
                                <?php
                                }
                                ?>
                            </div>
                        </li>
                    </ul>               
                        </nav>
                            </body > 


                <?php
                $mensaje = $_REQUEST['mensaje'] ?? '';
                if ($mensaje) {
                ?>
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <?php echo $mensaje; ?>
                    </div>
                <?php
                }
                ?>
     

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
const scrollbar = document.querySelector(".scrollbar"); // Get the scrollbar element
const content = document.querySelector("body"); // Get the content element (body in this case)

// Listen for scroll events on the content
content.addEventListener("scroll", () => {
    // Get the current scroll position of the content
    const scrollPosition = content.scrollTop;

    // Update the scroll position of the scrollbar
    scrollbar.scrollTop = scrollPosition;
});
</script>

</body>
</html>	